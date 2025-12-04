<?php
/**
 * Header
 *
 * Main header file for the theme.
 * php version 8.1.12
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Why_Are_We_Waiting
 * @author     Clark Alford <clark@clarka.me>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since      1.0.0
 */
?>
<!doctype html>
<!--
    "You cannot (as creator) create yourself until
        you un-create yourself.  Upon entering the physical
            universe you relinquished your remembrance of yourself.
                This allows you to choose to be Who You Are."

                                    Technology of Light (Vision)
                                    Optitron

    -->
<html <?php language_attributes(); ?>>
    <head>
        <!-- Meta Elements -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- Always force latest IE rendering engine -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- shrink-to-fit addresses problem with iOS Safari-->
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <?php if (!is_404() ) { ?>
        <meta name="keywords" content="The Nation of Islam,The Kingdom of Islam,Allah in the Person of,Allah in Person,Allah,Master Fard Muhammad,Fard,The Honorable Elijah Muhammad,Elijah Muhammad,The Messenger of Allah,The Messenger">
        <!-- kwds,comma,separated,no,spaces. Good for search other than google. Use on pages only -->
        <?php } ?>
        <?php if (is_404() ) { ?>
        <meta name="robots" content="noindex, nofollow">
        <?php } else { ?>
        <meta name="robots" content="index, follow">
        <?php } ?>
        <?php if (is_front_page() ) { ?>
        <meta name="abstract" content="And to those who live in that time it shall be binding upon them to serve and obey One God: Fard Muhammad the Great Mahdi, or Allah in Person. The Mahdi must restore the Kingdom of Islam and He must weed out from the kingdom of Islam all disbelievers. This He will do in His time.">
        <!-- a very short description of your website; just need on index page -->
        <?php } ?>
        <meta name="copyright" content="Mahdi">
        <!-- name of owner -->
        <meta name="no-email-collection" content="https://www.projecthoneypot.org/law_of_harvesting.php">
        <!-- legal warning not to harvest emails from site -->
        <meta name="rating" content="general">
        <!-- general, mature, restricted, 14 years, safe for kids -->
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <!-- link to the RSS Feed of my website -->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <!-- link for the Pingback URL of my site -->

        <!-- Bing Geo Meta Tags -->
        <meta name="DC.title" content="Nicodemus, KS, USA" />
        <meta name="geo.region" content="US-KS" />
        <meta name="geo.placename" content="nicodemus" />
        <meta name="geo.position" content="39.78373;-100.445882" />
        <meta name="ICBM" content="39.78373, -100.445882" />

        <!-- humans.txt we are people, not machines -->
        <link type="text/plain" rel="author" href="<?php echo get_theme_file_uri(); ?>/humans.txt" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="<?php echo get_theme_file_uri(); ?>/assets/images/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <!-- JS -->
        <!-- IE 9 or less -->
        <!--[if IE]>
            <script type="text/javascript">
                window.location = "http://browsehappy.com/";
            </script>
        <![endif]-->

        <?php wp_head(); ?>
    </head>
