<?php


if (!class_exists('ACF_Unique_Field_Guard')) {
	class ACF_Unique_Field_Guard
	{

		public function __construct()
		{
			add_action('plugins_loaded', array($this, 'check_acf_active'));
		}
		/**
		 * Check if ACF is installed and active.
		 * If not, display an admin notice.
		 * @return void
		 */
		public function check_acf_active()
		{
			if (!class_exists('ACF')) {
				add_action('admin_notices', array($this, 'acf_missing_notice'));
				return;
			}

			//add actions and filters if ACF is active
			add_action('acf/field_group/render_field_settings_tab/validation', array($this, 'add_unique_field_setting'));
			add_filter('acf/validate_value', array($this, 'validate_unique_meta_field'), 10, 4);

		}

		function render_field_validation_settings($field){

			acf_render_field_setting($field, array(
				'label' => __('Unique', 'acf'),
				'instructions' => __('Ensure this field has a unique value across posts.', 'acf'),
				'name' => 'unique',
				'type' => 'true_false',
				'ui' => 1,
				'default_value' => 0,
				'wrapper' => array(
					'class' => 'field-unique',
					'width' => '',
				),
			), true);
		}
		/**
		 * Display an admin notice if ACF is not installed or active.
		 */
		public function acf_missing_notice()
		{
			echo '<div class="notice notice-error"><p>';
			_e('ACF Unique Field Guard requires Advanced Custom Fields (ACF) to be installed and active.', 'acf-unique-meta-field');
			echo '</p></div>';
		}


		/**
		 * Add the "Unique" checkbox option in the Validation tab of each custom field.
		 *
		 * @param array $field The field array.
		 */
		public function add_unique_field_setting($field)
		{

			// Only add the option if the field is text-based
			if (!in_array($field['type'], array('text', 'textarea'))) {
				return;
			}


			// Add "Unique" checkbox setting in the Validation tab
			acf_render_field_setting($field, array(
				'label' => __('Unique', 'acf'),
				'instructions' => __('Ensure this field has a unique value across posts.', 'acf'),
				'name' => 'unique',
				'type' => 'true_false',
				'ui' => 1,
				'default_value' => 0,
				'wrapper' => array(
					'class' => 'field-unique-acf-guard',
					'width' => '',
				),
			true
			));
		}


		public function validate_unique_meta_field($valid, $value, $field, $input)
		{
			// If the "Unique" setting is not checked, skip validation
			if (empty($field['unique'])) {
				return $valid;
			}

			// Skip validation if the value is empty
			if (empty($value)) {
				return $valid;
			}

			// Get the post ID
			$post_id = isset($_POST['post_ID']) ? $_POST['post_ID'] : null;

			// Query the database to check if the value already exists
			$existing_posts = new WP_Query(array(
				'post_type' => 'any',
				'meta_query' => array(
					array(
						'key' => $field['name'],
						'value' => $value,
						'compare' => '='
					),
				),
				'post__not_in' => $post_id ? array($post_id) : array(),
				'fields' => 'ids',
				'posts_per_page' => 1,
			));

			// If a post with the same value exists, return an error
			if ($existing_posts->have_posts()) {
				$valid = __('The value "' . $value . '" for the field "' . $field['label'] . '" already exists.', 'acf');
			}

			return $valid;
		}
	}

}
