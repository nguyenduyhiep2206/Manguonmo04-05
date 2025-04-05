<div class="demo-content">
	<?php 
    // Check if the demo import has been completed
    $the_fashion_woocommerce_demo_import_completed = get_option('the_fashion_woocommerce_demo_import_completed', false);

    // If the demo import is completed, display the "View Site" button
    if ($the_fashion_woocommerce_demo_import_completed) {
      echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'the-fashion-woocommerce') . '</p>';
      echo '<a href="' . esc_url(home_url()) . '" class="view-btn" target="_blank">' . esc_html__('VIEW SITE', 'the-fashion-woocommerce') . '</a>';
    }

    if (isset($_POST['submit'])) {

        // Check if woocommerce is installed and activated
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            // Install the plugin if it doesn't exist
            $the_fashion_woocommerce_plugin_slug = 'woocommerce';
            $the_fashion_woocommerce_plugin_file = 'woocommerce/woocommerce.php';

            // Check if plugin is installed
            $the_fashion_woocommerce_installed_plugins = get_plugins();
            if (!isset($the_fashion_woocommerce_installed_plugins[$the_fashion_woocommerce_plugin_file])) {
            include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
            include_once(ABSPATH . 'wp-admin/includes/file.php');
            include_once(ABSPATH . 'wp-admin/includes/misc.php');
            include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

            // Install the plugin
            $the_fashion_woocommerce_upgrader = new Plugin_Upgrader();
            $the_fashion_woocommerce_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
            }
            // Activate the plugin
            activate_plugin($the_fashion_woocommerce_plugin_file);
        }

        // --- Menu ---
        $the_fashion_woocommerce_primary_menu_name = 'Main Menu';
        $the_fashion_woocommerce_primary_menu_location = 'primary';
        $the_fashion_woocommerce_primary_menu_exists = wp_get_nav_menu_object($the_fashion_woocommerce_primary_menu_name);

        if (!$the_fashion_woocommerce_primary_menu_exists) {
            // Create the left menu
            $the_fashion_woocommerce_primary_menu_id = wp_create_nav_menu($the_fashion_woocommerce_primary_menu_name);

            // Create and assign the Home page
            $the_fashion_woocommerce_home_page_id = wp_insert_post(array(
                'post_type'     => 'page',
                'post_title'    => 'Home',
                'post_content'  => '',
                'post_status'   => 'publish',
                'post_author'   => 1,
                'post_name'     => 'home'
            ));
            // Assign template and set as front page
            add_post_meta($the_fashion_woocommerce_home_page_id, '_wp_page_template', 'page-template/custom-front-page.php');
            update_option('page_on_front', $the_fashion_woocommerce_home_page_id);
            update_option('show_on_front', 'page');

            // Add Home page to the left menu
            wp_update_nav_menu_item($the_fashion_woocommerce_primary_menu_id, 0, array(
                'menu-item-title'     => __('Home', 'the-fashion-woocommerce'),
                'menu-item-classes'   => 'home',
                'menu-item-url'       => home_url('/'),
                'menu-item-status'    => 'publish',
                'menu-item-object-id' => $the_fashion_woocommerce_home_page_id,
                'menu-item-object'    => 'page',
                'menu-item-type'      => 'post_type',
            ));

            // Create and assign the About Us page
            $the_fashion_woocommerce_about_us_page_id = wp_insert_post(array(
                'post_type'     => 'page',
                'post_title'    => 'About Us',
                'post_content'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',
                'post_status'   => 'publish',
                'post_author'   => 1,
                'post_name'     => 'about-us'
            ));

            // Add About Us page to the left menu
            wp_update_nav_menu_item($the_fashion_woocommerce_primary_menu_id, 0, array(
                'menu-item-title'     => __('About Us', 'the-fashion-woocommerce'),
                'menu-item-classes'   => 'about-us',
                'menu-item-url'       => home_url('/about-us/'),
                'menu-item-status'    => 'publish',
                'menu-item-object-id' => $the_fashion_woocommerce_about_us_page_id,
                'menu-item-object'    => 'page',
                'menu-item-type'      => 'post_type',
            ));

            // Assign left menu to its location
            $the_fashion_woocommerce_locations = get_theme_mod('nav_menu_locations', array());
            $the_fashion_woocommerce_locations[$the_fashion_woocommerce_primary_menu_location] = $the_fashion_woocommerce_primary_menu_id;
            set_theme_mod('nav_menu_locations', $the_fashion_woocommerce_locations);
        }         

        // Set the demo import completion flag
        update_option('the_fashion_woocommerce_demo_import_completed', true);

        // Display success message and "View Site" button
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'the-fashion-woocommerce') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="view-btn" target="_blank">' . esc_html__('VIEW SITE', 'the-fashion-woocommerce') . '</a></span>';

        //end 

        // Topbar Section
        set_theme_mod( 'the_fashion_woocommerce_location_text', '42 Puffin street 12345 Puffinville France' );
        set_theme_mod( 'the_fashion_woocommerce_phone_text', 'Phone' );    
        set_theme_mod( 'the_fashion_woocommerce_phone_number', '123-456-7890' );
        set_theme_mod( 'the_fashion_woocommerce_email_text', 'Mail' );
        set_theme_mod( 'the_fashion_woocommerce_email_address', 'xyz123@example.com' );

        // Social Icon
        set_theme_mod( 'the_fashion_woocommerce_facebook_url', '#' );    
        set_theme_mod( 'the_fashion_woocommerce_twitter_url', '#' );
        set_theme_mod( 'the_fashion_woocommerce_pintrest_url', '#' );
        set_theme_mod( 'the_fashion_woocommerce_youtube_url', '#' );


        // slider section start // 
        set_theme_mod( 'the_fashion_woocommerce_slider_small_title', 'Hello, Welcome To The Fashion Designer' );
        
        for($the_fashion_woocommerce_i=1;$the_fashion_woocommerce_i<=4;$the_fashion_woocommerce_i++){
           $the_fashion_woocommerce_slider_title = 'make custom made suits';
           $the_fashion_woocommerce_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took.';
              // Create post object
           $my_post = array(
           'post_title'    => wp_strip_all_tags( $the_fashion_woocommerce_slider_title ),
           'post_content'  => $the_fashion_woocommerce_slider_content,
           'post_status'   => 'publish',
           'post_type'     => 'page',
           );

           // Insert the post into the database
           $the_fashion_woocommerce_post_id = wp_insert_post( $my_post );

           if ($the_fashion_woocommerce_post_id) {
             // Set the theme mod for the slider page
             set_theme_mod('the_fashion_woocommerce_slider_page' . $the_fashion_woocommerce_i, $the_fashion_woocommerce_post_id);

              $the_fashion_woocommerce_image_url = get_template_directory_uri().'/images/slider'.$the_fashion_woocommerce_i.'.png';

            $the_fashion_woocommerce_image_id = media_sideload_image($the_fashion_woocommerce_image_url, $the_fashion_woocommerce_post_id, null, 'id');

                if (!is_wp_error($the_fashion_woocommerce_image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($the_fashion_woocommerce_post_id, $the_fashion_woocommerce_image_id);
                }
            }
        }

        // Best Category Section
        set_theme_mod( 'the_fashion_woocommerce_service_button_label', 'View All Categories' );
        set_theme_mod( 'the_fashion_woocommerce_fashion_btn_link', '#' );

        set_theme_mod( 'the_fashion_woocommerce_category_cat_', 'wedding' );
        set_theme_mod( 'the_fashion_woocommerce_category_cat2_', 'kids' );
        set_theme_mod( 'the_fashion_woocommerce_category_cat3_', 'categories' );
        set_theme_mod( 'the_fashion_woocommerce_category_cat4_', 'womens fashion' );
        set_theme_mod( 'the_fashion_woocommerce_category_cat5_', 'office' );

        set_theme_mod( 'the_fashion_woocommerce_cat_small_title', 'collection' );
        set_theme_mod( 'the_fashion_woocommerce_cat_small_title2', 'collection' );
        set_theme_mod( 'the_fashion_woocommerce_cat_small_title3', 'collection' );
        set_theme_mod( 'the_fashion_woocommerce_cat_small_title4', 'collection' );
        set_theme_mod( 'the_fashion_woocommerce_cat_small_title5', 'collection' );
    
        // Define default categories with images, icons, and text
        $the_fashion_woocommerce_categories_data = array(
            'wedding' => array(
                'image' => get_template_directory_uri() . '/images/category1.png',
                'text'  => 'collection'
            ),
            'kids' => array(
                'image' => get_template_directory_uri() . '/images/category2.png',
                'text'  => 'collection'
            ),
            'categories' => array(
                'image' => get_template_directory_uri() . '/images/category3.png',
                'text'  => 'collection'
            ),
            'womens fashion' => array(
                'image' => get_template_directory_uri() . '/images/category4.png',
                'text'  => 'collection'
            ),
            'office' => array(
                'image' => get_template_directory_uri() . '/images/category5.png',
                'text'  => 'collection'
            )
        );

        $the_fashion_woocommerce_counter = 1;
        foreach ($the_fashion_woocommerce_categories_data as $the_fashion_woocommerce_category_name => $the_fashion_woocommerce_data) {
            $the_fashion_woocommerce_term = term_exists($the_fashion_woocommerce_category_name, 'category');
            if ($the_fashion_woocommerce_term === 0 || $the_fashion_woocommerce_term === null) {
                $the_fashion_woocommerce_term = wp_insert_term($the_fashion_woocommerce_category_name, 'category');
                if (!is_wp_error($the_fashion_woocommerce_term)) {
                    $the_fashion_woocommerce_category_id = $the_fashion_woocommerce_term['term_id'];
                    // Assign category image
                    update_term_meta($the_fashion_woocommerce_category_id, 'category_image', $the_fashion_woocommerce_data['image']);
                    error_log("Category '{$the_fashion_woocommerce_category_name}' created with image '{$the_fashion_woocommerce_data['image']}'.");
                } else {
                    error_log("Error creating category '{$the_fashion_woocommerce_category_name}': " . $the_fashion_woocommerce_term->get_error_message());
                    continue;
                }
            } else {
                error_log("Category '{$the_fashion_woocommerce_category_name}' already exists.");
                $the_fashion_woocommerce_category_id = $the_fashion_woocommerce_term['term_id'];
            }

            $the_fashion_woocommerce_counter++;
            if ($the_fashion_woocommerce_counter > 5) { // Limit to 5 categories
                break;
            }
        }   
    }
    ?>

	<p><strong><?php esc_html_e('Reminder : ', 'the-fashion-woocommerce'); ?></strong><?php esc_html_e('Backup your site before importing. This process will overwrite existing The Fashion Woocommerce settings.', 'the-fashion-woocommerce'); ?></p>

    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=the_fashion_woocommerce_guide" method="POST" onsubmit="return validate(this);">
    <?php if (!get_option('the_fashion_woocommerce_demo_import_completed')) : ?>
        <form method="post">
            <input class= "run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer','the-fashion-woocommerce'); ?>" class="button button-primary button-large">
        </form>
    <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
			 if(confirm("Do you really want to import the theme demo content?")){
			    document.forms[0].submit();
			}
		    else {
			    return false;
		    }
		}
	</script>
</div>
