<?php
/**
 * The template for displaying all single posts
 * php version 8.1.11
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Why_Are_We_Waiting
 * @author     Clark Alford <clark@clarka.me>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since      1.0.0
 */
get_header();

// Start the loop.
if (have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_content();
    }
}

get_footer(); ?>
