<?php
/**
 * Plugin Name: Booking Button Shortcode
 * Description: Simple Bootstrap CTA button via shortcode
 * Version: 0.1
 * Author: Chris Cline
 * Author URI: http://www.christiancline.com
 */

// Exit if this wasn't accessed via WordPress (aka via direct access)
if (!defined('ABSPATH')) exit;

class BookButton {
    public function __construct() {
        // Add CSS - if needed
        add_action('wp_enqueue_scripts', array($this,'enqueue'));
        //add the shortcode
        add_shortcode('book_button', array($this,'shortcode'));
    }

    // shortcode function
    public function shortcode($atts) {
        //class if needed for css overrides
        $btnClass = isset($atts['class'])  ? $atts['class']  : 'red';
        //button text option with default
        $btnTetx = isset($atts['text']) ? $atts['text'] : 'Book Now';
        // Url to page with default
        $btnUrl = isset($atts['class']) ? $atts['url']  : site_url() . '/book-now/';

        $output = '';

        return $output .= '<a href="'. $btnUrl .'" class="btn btn-primary">' . $btnTetx . '</a>';
    }

    // enqueue function for numbers css - if needed
    public function enqueue() {
        wp_enqueue_style('bs-button-styles', plugins_url('css/test.css', __FILE__), null, '1.0');
    }

}
// Let's do this thing!
$bkBttn = new BookButton();
