<?php
// --------------------------------------------------
// MISC. FILTERS
// --------------------------------------------------
add_filter( 'get_the_archive_title', 'sanitize_taxonomy_title' );

// --------------------------------------------------
// IMAGE FILTERS
// --------------------------------------------------
// Override default max `srcset` value.
add_filter( 'max_srcset_image_width', 'set_max_srcset_image_width', 10, 2 );

// Filter `srcset` attribute: remove reference to full size image if greater than theme-specific max size.
add_filter( 'wp_calculate_image_srcset', 'override_image_srcset_defaults' );

// Filter `sizes` attribute: remove reference to full size image if greater than theme-specific max size.
add_filter( 'wp_calculate_image_sizes', 'override_image_sizes_defaults', 10, 2 );

// Remove image size attributes from post thumbnails.
// NOTE: Filter is applied on post save.
add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );

// Remove image size attributes from images added to a WordPress post.
// NOTE: Filter is applied on post save.
add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );
