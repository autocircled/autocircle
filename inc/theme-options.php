<?php
add_action('admin_menu', 'create_theme_settings_menu');

if( !function_exists( 'create_theme_settings_menu' ) ){
    function create_theme_settings_menu(){
        add_menu_page("AutoCircle", "AutoCircle", "manage_options", "autocircle-options", "autocircle_option_page", null, 25);
    }
}


if( !function_exists( 'autocircle_option_page' ) ){
    function autocircle_option_page(){
        
        $values = filter_input_array(INPUT_POST);
        $config = $values['ac_theme_option'];
        if( isset($values['submit']) ){
            
            update_option( 'autocircle_theme_settings', $config );
            
        }
        $get_option = get_option('autocircle_theme_settings');

        
        ?>
<div class="wrap">
    <div class="option-holder">
        <div class="ac-header clearfix">
            <div class="ac-container">
                <div class="ac-title">
                    <a href="#">AutoCircle</a>
                    <span class="ac-version">1.0.0</span>
                </div>
                <div class="ac-header-link">
                    <ul>
                        <li><a href="#">FAcebook</a></li>
                        <li><a href="#">FAcebook</a></li>
                        <li><a href="#">FAcebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <form method="post" action="">
            <table>
                <tr>
                    <th>Logo</th>
                    <td>
                        <input type="radio" id="show_logo_no" name="ac_theme_option[show_logo]" value="no" <?php echo isset($get_option['show_logo']) && $get_option['show_logo'] == 'no' ? 'checked' : ''; ?>><label for="show_logo_no">No</label>
                        <input type="radio" id="show_logo_yes" name="ac_theme_option[show_logo]" value="yes" <?php echo isset($get_option['show_logo']) && $get_option['show_logo'] == 'yes' ? 'checked' : ''; ?>><label for="show_logo_yes">Yes</label>
                    </td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>
                        <input type="radio" id="title_no" name="ac_theme_option[title]" value="no" <?php echo isset($get_option['title']) && $get_option['title'] == 'no' ? 'checked' : ''; ?>><label for="title_no">No</label>
                        <input type="radio" id="title_yes" name="ac_theme_option[title]" value="yes" <?php echo isset($get_option['title']) && $get_option['title'] == 'yes' ? 'checked' : ''; ?>><label for="title_yes">Yes</label>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <input type="radio" id="description_no" name="ac_theme_option[description]" value="no" <?php echo isset($get_option['description']) && $get_option['description'] == 'no' ? 'checked' : ''; ?>><label for="description_no">No</label>
                        <input type="radio" id="description_yes" name="ac_theme_option[description]" value="yes" <?php echo isset($get_option['description']) && $get_option['description'] == 'yes' ? 'checked' : ''; ?>><label for="description_yes">Yes</label>
                    </td>
                </tr>
                <tr>
                    <th>Background</th>
                    <td>
                        <input type="radio" id="background_no" name="ac_theme_option[background]" value="no" <?php echo isset($get_option['background']) && $get_option['background'] == 'no' ? 'checked' : ''; ?>><label for="background_no">No</label>
                        <input type="radio" id="background_yes" name="ac_theme_option[background]" value="yes" <?php echo isset($get_option['background']) && $get_option['background'] == 'yes' ? 'checked' : ''; ?>><label for="background_yes">Yes</label>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" class="button primary" value="Save Settings" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
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