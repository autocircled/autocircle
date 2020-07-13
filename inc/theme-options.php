<?php
add_action('admin_menu', 'create_theme_settings_menu');

if( !function_exists( 'create_theme_settings_menu' ) ){
    function create_theme_settings_menu(){
        add_menu_page("AutoCircle", "AutoCircle", "manage_options", "autocircle-options", "autocircle_option_page", null, 25);
    }
}


if( !function_exists( 'autocircle_option_page' ) ){
    function autocircle_option_page(){
        ?>
<div class="wrap">
    <h1>Custom Theme Options Page</h1>
    <form method="post" action="options.php">
    <?php
    // display settings field on theme-option page
    settings_fields("theme-options-grp");
    
    // display all sections for theme-options page
    do_settings_sections("autocircle-options");
    submit_button();
    ?>
    </form>
</div>
<?php
    }
}

function theme_section_description(){
echo '<p>Theme Option Section</p>';
}
//admin-init hook to create settings section with title “New Theme Options Section”.
function test_theme_settings(){
add_settings_section( 'first_section', 'New Theme Options Section',
'theme_section_description','autocircle-options');
}
add_action('admin_init','test_theme_settings');