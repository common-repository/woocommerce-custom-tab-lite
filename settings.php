<?php

/**
 * this is use for change the settings for Tab Manager is disable or enable 
*/

   function pctm_change_settings(){
  
   $plugin_dir_url =  plugin_dir_url( __FILE__ );
   
   add_option( 'enable_tab', 'checked' );
   if(isset($_REQUEST['save_set'])){
    $value=sanitize_text_field($_REQUEST['enable_tab']);
    if(!empty($value)){
    update_option( 'enable_tab', 'checked' );
            echo "<div class='updated'><p>Your Plugin is Successfully Enabled</p></div>";
    }
    else{
       update_option( 'enable_tab', $value );
       echo "<div class='error'><p>Your Plugin is Successfully Disabled</p></div>";
     }
   } 
	if( isset( $_GET['tab'] ) ) {
	
		$tab = sanitize_text_field( $_GET['tab'] );
		
	}
	else
	{
		$tab = '';
	}
	
       ?>
       <div class="wrap">
        <h2 id="add-new-user"> Settings For Tab <br /></h2>
		<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
			<a class="nav-tab <?php if($tab == 'general' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pctm-change-settings&amp;tab=general">General</a>
			
			<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=pctm-change-settings&amp;tab=premium">Premium</a>
		</h2>
		<?php 
			if($tab == 'general' || $tab == '')
			{
				
			?>
				<div class="meta-box-sortables" id="normal-sortables">
				<div class="postbox " id="pho_wcpc_box">
					<h3><span class="upgrade-heading">Upgrade to the PREMIUM VERSION</span></h3>
					<div class="inside">
						<div class="pho_premium_box">

							<div class="column two">
								<!-----<h2>Get access to Pro Features</h2>----->

								<p>Switch to the premium version of WooCommerce Custom Tab Lite to get the benefit of all features!</p>

									<div class="pho-upgrade-btn">
										<a target="_blank" href="http://www.phoeniixx.com/product/woocommerce-custom-tabs-plugin/?utm_source=Wordpress.org&utm_medium=CPC&utm_campaign=Wordpress.org"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
										<a target="blank" href="http://customtab.phoeniixxdemo.com/?product=demo-product"><img src="<?php echo $plugin_dir_url; ?>images/button2.png" /></a>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="phoe_video_main">
			<h3>How to set up plugin</h3> 
			<iframe width="800" height="360"src="https://www.youtube.com/embed/ZmJC5mQAJIw" allowfullscreen></iframe>
		</div>
			
           <p>Enable Tab for All Products</p>
			<form  method="post">
				  <p><input type="checkbox" name="enable_tab" id="enable_tab" <?php echo get_option('enable_tab');?> />Enable Custom Tab plugin </p>
				  <p class="submit"><a href="<?php echo get_admin_url()."admin.php"; ?>" class="button button-primary">Back</a> <input type="submit" value="Save Settings" class="button button-primary" id="save_set" name="save_set"></p>
			</form>
     </div>
	 <style>
				.form-table th {
					width: 270px;
					padding: 25px;
				}
				.form-table td {
					
					padding: 20px 10px;
				}
				.form-table {
					background-color: #fff;
				}
				h3 {
					padding: 10px;
				}

				.px-multiply{ color:#ccc; vertical-align:bottom;}

				.long{ display:inline-block; vertical-align:middle; }

				.wid{ display:inline-block; vertical-align:middle;}

				.up{ display:block;}

				.grey{ color:#b0adad;}
				a:focus {
					box-shadow: none;
				}
				
				.phoe_video_main {
					padding: 20px;
					text-align: center;
				}
				
				.phoe_video_main h3 {
					color: #02c277;
					font-size: 28px;
					font-weight: bolder;
					margin: 20px 0;
					text-transform: capitalize
					display: inline-block;
				}

	</style>
    
<?php  
}

if($tab == 'premium')
{
	
	require_once('wctm_premium.php');
}
}
  ?>