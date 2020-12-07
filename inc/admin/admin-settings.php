<h1><?php _e('Форма для Контактов', 'theme_language'); ?></h1>

<form method="post" action="options.php">
    <?php settings_fields( 'customize-contact-group' ); // function-admin-menu => function customize_theme_settings() ?>
    <?php do_settings_sections( 'customize_contact_form_page' ); //имя страницы на которой выводим поля ?>
    <?php submit_button(); ?>
</form>