<?php
add_action('admin_menu', 'create_theme_settings_menu');

if( !function_exists( 'create_theme_settings_menu' ) ){
    function create_theme_settings_menu(){
        add_menu_page("AutoCircle", "AutoCircle", "manage_options", "theme-options", "autocircle_option_page", null, 25);
    }
}


if( !function_exists( 'autocircle_option_page' ) ){
    function autocircle_option_page(){
        ?>
<div class="wrap">
    <h1>Custom Theme Options Page</h1>
    <form method="post" action="options.php">
    <?php
    ?>
    </form>
</div>
<?php
    }
}