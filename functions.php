<?php
function load_stylesheets()
{
  wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', array(), false, 'all');
  wp_enqueue_style('stylesheet');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function include_jquery(){
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', '', 1, true);
  add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');


function loadjs(){
  wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
  wp_enqueue_script('customjs');

  // stores template url into a global variable that can be used in javascript
  $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
  wp_localize_script( 'customjs', 'mainTheme', $translation_array );

}
add_action('wp_enqueue_scripts', 'loadjs');

if ( !function_exists( 'yourtheme_setup' ) ) {
    function yourtheme_setup() {
add_theme_support( 'responsive-embeds' );
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo' );
 add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'yourtheme_setup' );
}

register_nav_menus(
  array(
      'top-menu' => __("Top Menu", 'theme'),
      'footer-menu' => __("Footer Menu", 'theme'),
  )
);
add_image_size('smallest', 300, 300, false);
add_image_size('largest', 800, 800, false);

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function add_favicon() {
echo '<link rel="shortcut icon" type="image/png" href="'.get_template_directory_uri().'/img/seal.png" />';
}
add_action('wp_head', 'add_favicon');

function mytheme_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here

    $wp_customize->add_section( 'my_site_logo' , array(
        'title'      => __( 'My Site Logo', 'mytheme' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
               'label'      => __( 'Upload a logo', 'theme_name' ),
               'section'    => 'my_site_logo',
               'settings'   => 'my_site_logo_id'
            )
        )
    );

}
add_action( 'customize_register', 'mytheme_customize_register' );

// disable authorbox styles
function disable_authorbox_styles() {
 	wp_deregister_style('author-bio-box-styles');

 }
 add_action('wp_enqueue_scripts', 'disable_authorbox_styles');

// display only posts on search query
function search_filter($query) {
  if ( ! is_admin() && $query->is_main_query() ) {
    if ( $query->is_search ) {
       $query->set( 'post_type', 'post' );
    }
  }
}
add_action( 'pre_get_posts', 'search_filter' );

// $caid = '-1';
// function exclude_category_all_content( $query ) {
//     if ( ! is_admin() ){
//     global $caid;
//         $query->set( 'cat', $caid );
//         }
// }
// add_action( 'pre_get_posts', 'exclude_category_all_content' );

// allow HTML in author bio for formatting
remove_filter('pre_user_description', 'wp_filter_kses');

// Add user contact methods
add_filter( 'user_contactmethods','wpse_user_contactmethods', 10, 1 );
function wpse_user_contactmethods( $contact_methods ) {
    $contact_methods['emailcb']  = __( 'Display Email', 'checkbox' );
    $contact_methods['web2']  = __( 'Website 2', 'text_domain' );
    $contact_methods['web3']  = __( 'Website 3', 'text_domain' );
    $contact_methods['twitter']  = __( 'Twitter URL', 'text_domain' );
    $contact_methods['facebook'] = __( 'Facebook URL', 'text_domain'    );
    $contact_methods['googleplus'] = __( 'Google+ URL', 'text_domain'    );
    $contact_methods['instagram'] = __( 'Instagram URL', 'text_domain'    );
    $contact_methods['linkedin'] = __( 'LinkedIn URL', 'text_domain'    );
    $contact_methods['youtube']  = __( 'YouTube URL', 'text_domain' );
    $contact_methods['bitchute']  = __( 'BitChute URL', 'text_domain' );
    $contact_methods['lbry']  = __( 'LBRY URL', 'text_domain' );

    return $contact_methods;
}

add_action( 'user_new_form', 'wporg_myplugin_add_registration_fields' );

function wporg_myplugin_add_registration_fields() {


    // Get and set any values already sent
    $user_extra = ( isset( $_POST['user_extra'] ) ) ? $_POST['user_extra'] : '';
    ?>

    <p>
        <label for="user_extra"><?php _e( 'Extra Field', 'myplugin_textdomain' ) ?><br />
        <input type="text" name="user_extra" id="user_extra" class="input" value="<?php echo esc_attr( stripslashes( $user_extra ) ); ?>" size="25" /></label>
    </p>

    <?php
}

// custom login Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/seal.png);
		height:65px;
		width:320px;
		background-size: contain;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );




?>
