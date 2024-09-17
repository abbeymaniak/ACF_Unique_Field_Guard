# ACF Unique Field Guard

## Description

**ACF Unique Field Guard** is a WordPress plugin designed to ensure the uniqueness of Advanced Custom Fields (ACF) values. By automatically checking for duplicates during post saves, this plugin helps maintain data integrity and prevents the reuse of the same values across your site for fields that needs to be unique.

### Key Features

- **Uniqueness Verification:** Automatically checks for duplicate values in specified ACF fields.
- **Admin Notices:** Displays clear notifications if a duplicate value is found, guiding users to resolve the issue.
- **Seamless Integration:** Works with ACF and is compatible with both custom post types and standard WordPress posts.
- **Customizable Settings:** Configure which ACF fields require uniqueness checks through the plugin’s settings.
- **Secure and Reliable:** Uses WordPress best practices for validation and redirection.

### Installation

1. Upload the `acf-unique-field-guard` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the ACF custom field under validation tab and activate the checkbox.

### Usage

- Once activated, the plugin will automatically check for duplicate values in the ACF fields you configure.
- If a duplicate is detected, the user will be redirected back to the edit page with an admin notice informing them of the issue.

### Support

For support or feature requests, please contact us via [Support Page URL] or create an issue on [GitHub Repository URL].

### Changelog

#### 1.0.0
- Initial release with core functionality to check for duplicate ACF field values.

### License

This plugin is licensed under the [GPL-2.0 License](https://opensource.org/licenses/GPL-2.0).

---

Thank you for using **ACF Unique Field Guard**. Your feedback and suggestions are welcome!
