<?php


if (!class_exists('ACF_Unique_Field_Guard')) {
	class ACF_Unique_Field_Guard
	{

		public function __construct()
		{
			// add_filter('acf/load_field', array($this, 'check_unique_field'));
			// add_filter('acf/update_field', array($this, 'check_unique_field'));
			// add_filter('acf/update_value', array($this, 'check_unique_field'));
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
			add_action('acf/render_field_settings', array($this, 'add_unique_field_setting'));
			add_filter('acf/validate_value', array($this, 'validate_unique_meta_field'), 10, 4);


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
			if (!in_array($field['type'], array('text', 'textarea', 'number', 'email', 'url'))) {
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
					'class' => 'field-unique',
					'width' => '',
				),
				'placement' => 'validation',
			));


		}








	}
}
