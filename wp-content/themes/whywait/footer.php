
<?php
/**
 * Footer
 *
 * Main footer file for the theme.
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
        <!-- Footer Section -->
        <div class="container is-fluid">
            <div class="notification is-white">
                <h4 class="footerspan">All Rights Reserved © Copyright 2022-<script>document.write(new Date().getFullYear());</script> Made in the <span class="bolder">Kingdom of Islam</span></h4>
            </div>
        </div>
        <!-- JS at bottom for fast loading -->
        <?php wp_footer(); ?>
        <!-- Non Javascript Warning -->
        <noscript>
            <div class="nojs">
                <style type="text/css">
                    .content {
                        display: none;
                    }
                </style>
                <div id="noscript-warning">This website works best with JavaScript enabled
                    <br>
                    <a href="http://www.enable-javascript.com/" target="_blank">Click here for instructions</a> on how to enable JavaScript in your web browser.
                </div>
            </div>
        </noscript>
    </body>
</html>
