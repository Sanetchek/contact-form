<?php
/*
===================================================================
          Add Customize Menu
===================================================================
*/
function customize_add_admin_page () {
    $siteName = strval( get_bloginfo( 'name' ) );
    // Создаем меню в админке
    add_submenu_page( 
        'options-general.php',
        __('Форма Контактов', 'theme_language'),
        __('Форма Контактов', 'theme_language'),
        'edit_pages',
        'contact_form_page',
        'contact_form_create_page'
    );

    // Включить пользовательские настройки
    add_action( 'admin_init', 'customize_contact_form_settings' );
}
add_action( 'admin_menu', 'customize_add_admin_page' );


/* Admin Banner settings and custom fields */
function customize_contact_form_settings() {
    // Contact form Option
    register_setting( 'customize-contact-group', 'activate_contact' );

    add_settings_section( 'customize-contact-section', '', 'customize_contact_form_section', 'customize_contact_form_page' );

    add_settings_field( 'activate-form', __( 'Включить форму', 'theme_language'), 'customize_contact_form_activete', 'customize_contact_form_page', 'customize-contact-section' );
}

function customize_contact_form_activete() {
    $options = get_option( 'activate_contact' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '. $checked .' /></label>';
}

function customize_contact_form_section() {
    echo __( 'Включите или выключите настройки Формы Контактов', 'theme_language');
}


function contact_form_create_page () {
    // Генерация Админ Страницы
    require_once('admin/admin-settings.php');
}