<?php

	// Exit if accessed directly
	defined( 'ABSPATH' ) || exit;

	// Define Plugin Directory
	define('TCBD_GOOGLE_MAP_PLUGIN_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );	

	function tcbd_auto_refresh_settings() {
		add_plugins_page( 'TCBD Auto Refresher Settings', 'TCBD Auto Refresher', 'update_core', 'tcbd_auto_refresh_settings', 'tcbd_auto_refresh_settings_page');
	}
	add_action( 'admin_menu', 'tcbd_auto_refresh_settings' );
	
	function tcbd_auto_refresh_register_settings() {
		register_setting( 'tcbd_auto_refresh_register_setting', 'tcbd_auto_refresh_time' );
		register_setting( 'tcbd_auto_refresh_register_setting', 'tcbd_auto_screen' );
		register_setting( 'tcbd_auto_refresh_register_setting', 'tcbd_auto_refresh_custom' );
	}
	add_action( 'admin_init', 'tcbd_auto_refresh_register_settings' );
		
	function tcbd_auto_refresh_settings_page(){ // settings page function
	
		if(get_option('tcbd_auto_refresh_time')){
			$tcbd_time = get_option('tcbd_auto_refresh_time');
		} else {
			$tcbd_time = "5";
		}
		
		if(get_option('tcbd_auto_screen')){
			$add_auto_refresher = get_option('tcbd_auto_screen');
		} else {
			$add_auto_refresher = "full";
		}
		
		
		if(get_option('tcbd_auto_refresh_custom')){
			$tcbd_custom = get_option('tcbd_auto_refresh_custom');
		} else {
			$tcbd_custom = "www.tcoderbd.com";
		}
		
		
		
		?>
			<div class="wrap">
				<h2>TCBD Auto Refresher Settings</h2>
                
				<?php if( isset($_GET['settings-updated']) && $_GET['settings-updated'] ){ ?>
					<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
						<p><strong>Settings saved.</strong></p>
                        <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
					</div>
				<?php } ?>
                
            	<form method="post" action="options.php">
                	<?php settings_fields( 'tcbd_auto_refresh_register_setting' ); ?>
                    
                	<table class="form-table">
                		<tbody>
                        
                    		<tr>
                        		<th scope="row"><label for="tcbd_auto_refresh_time">Auto Refresh Time(Secends):</label></th>
                            	<td>
                                    <input class="regular-text" name="tcbd_auto_refresh_time" type="text" id="tcbd_auto_refresh_time" value="<?php echo esc_attr( $tcbd_time ); ?>">
                                    <p class="description">How much secends you want to refresh your pages?</a></p>
								</td>
                        	</tr>
							
                            <tr>
                                <th scope="row">Add Auto Refresher:</th>
                                <td>
                                    <?php
                                        $add_auto_refresher = get_option( 'tcbd_auto_screen' );
                                    ?>
                                    <fieldset>
                                        <legend class="screen-reader-text"><span>Add Auto Refresher</span></legend>
                                        <label title="Add Auto Refresher in full website like home page, posts, pages, categories, tags, attachment, etc..">
                                            <input type="radio" name="tcbd_auto_screen" value="full" <?php checked( $add_auto_refresher, 'full' ); ?>>In Full Website
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in home page">
                                            <input type="radio" name="tcbd_auto_screen" value="homepage" <?php checked( $add_auto_refresher, 'homepage' ); ?>>In Home Page Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in front page">
                                            <input type="radio" name="tcbd_auto_screen" value="frontpage" <?php checked( $add_auto_refresher, 'frontpage' ); ?>>In Front Page Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in posts only">
                                            <input type="radio" name="tcbd_auto_screen" value="posts" <?php checked( $add_auto_refresher, 'posts' ); ?>>In Posts Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in pages only">
                                            <input type="radio" name="tcbd_auto_screen" value="pages" <?php checked( $add_auto_refresher, 'pages' ); ?>>In Pages Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in categories only">
                                            <input type="radio" name="tcbd_auto_screen" value="cats" <?php checked( $add_auto_refresher, 'cats' ); ?>>In Categories Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in tags only">
                                            <input type="radio" name="tcbd_auto_screen" value="tags" <?php checked( $add_auto_refresher, 'tags' ); ?>>In Tags Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in attachment only">
                                            <input type="radio" name="tcbd_auto_screen" value="attachment" <?php checked( $add_auto_refresher, 'attachment' ); ?>>In Attachment Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher in 404 error page">
                                            <input type="radio" name="tcbd_auto_screen" value="404error" <?php checked( $add_auto_refresher, '404error' ); ?>>In 404 Error Page Only
                                        </label>
                                        <br>
                                        <label title="Add Auto Refresher custom page">
                                            <input type="radio" name="tcbd_auto_screen" value="custom" <?php checked( $add_auto_refresher, 'custom' ); ?>>In custom page
											<input class="regular-text" name="tcbd_auto_refresh_custom" type="text" id="tcbd_auto_refresh_custom" value="<?php echo esc_attr( $tcbd_custom ); ?>">
											<p class="description">Your custom page url.</a></p>
                                        </label>
                                    </fieldset>
                                </td>
                            </tr>
							
                    	</tbody>
                    </table>
                    
                    <p class="submit"><input id="submit" class="button button-primary" type="submit" name="submit" value="Save Changes"></p>
                </form>
                
            </div>
        <?php
	} // settings page function

?>