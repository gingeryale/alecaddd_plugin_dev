<?php

/**
 * Trigger file on unistall
 * 
 * @package AlecadddPlugin
 */

if (!defined('WP_UNISTALL_PLUGIN')) {
    die;
}

// clear database stored post type data
// $books = get_posts(array('post_type' => 'book', 'numberposts' => -1));
// foreach ($books as $book) {
//     wp_delete_posts($book->ID, true);
// }

// access db via SQL
$global $wpdb;
$wpdb->query(" DELETE FROM wp_posts WHERE post_type = 'book' ");
$wpdb->query(" DELETE FROM wp_postmeta WHERE post_id NOT in (SELECT id FROM wp_posts)");
$wpdb->query(" DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");