<?php
/**
 * Front Page
 *
 * Front Page file for the theme.
 * php version 8.1.12
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Why_Are_We_Waiting
 * @author     Clark Alford <clark@clarka.me>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://developer.wordpress.org/themes/basics/template-files/
 * @since      1.0.0
 */
?>

<?php get_header(); ?>

    <body>
        <div class="container is-fluid">&nbsp;</div>
        <div class="container is-fluid">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="<?php echo site_url(); ?>"><image src="<?php echo get_theme_file_uri(); ?>/assets/images/logo2.png"></a>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <a class="koimenu" href="https://www.kingdomofislam.org">Kingdom of Islam website</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container is-fluid">
            <div class="notification is-white">
                <image class="headerimage" src="<?php echo get_theme_file_uri(); ?>/assets/images/headerimage.jpg">
            </div>
        </div>
        <div class="container is-fluid">&nbsp;</div>
        <div class="container is-fluid">
            <?php echo do_shortcode( '[forum]' ); ?>
        </div>

<?php get_footer(); ?>
