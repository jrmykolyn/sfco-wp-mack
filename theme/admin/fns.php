<?php
/**
 * ...
 */
function registerMenus() {
    register_nav_menus(
        array(
            'header-nav' => __( 'Header Navigation' )
        )
    );
}

/**
 * ...
 *
 * @param {Number} `$id`
 * @return {String}
 */
function getTheFirstCategory( $id=-1, $nameOnly=true) {
    $categories = get_the_category( $id );
    $category = $categories[ 0 ];

    if ( $category && strtolower( $category->name ) != 'uncategorized'  ) {
        return $nameOnly ? $category->name : $category;
    } else {
        return '';
    }
} // /getTheFirstCategory()

/**
 * Function returns the singular, undecorated named of the matched taxonomy term.
 *
 * eg. 'Category: <Category Name>' becomes '<Category Name>'.
 *
 * @param string $title
 * @return string
 */
function sanitize_taxonomy_title( $title ) {
    if ( is_category() ) {
        return single_cat_title();
    } else if ( is_tag() ) {
        return single_tag_title();
    } else {
        return $title;
    }
}

/**
 * If the width of the image is greater than the theme-specific max image size, set the max `srcset` value to the max image size.
 *
 * Otherwise, return the default value.
 *
 * @param int $max_width
 * @param Array<int> $size_array
 * @return int
 */
function set_max_srcset_image_width( $max_width, $size_array ) {
    $width = $size_array[ 0 ];

    if ( $width > MAX_IMAGE_SIZE ) {
        return MAX_IMAGE_SIZE;
    } else {
        return $max_width;
    }
}

/**
 * If the native width of the image is greater than the theme-specific max image size, remove it from `srcset`.
 *
 * @param Array $sources
 * @param Array
 */
function override_image_srcset_defaults( $sources ) {
    if ( ! isset( $sources ) || count( $sources ) <= 1 ) {
        return $sources;
    }

    $keys = array_keys( $sources );

    if ( $keys[ 0 ] > MAX_IMAGE_SIZE ) {
        array_shift( $sources );
    }

    return $sources;
}

/**
 * If the native width of the image is greater than the theme-specific max image size, remove it from `sizes`.
 *
 * @param string $sizes
 * @param Array<int> $size_array
 * @return string
 */
function override_image_sizes_defaults( $sizes, $size_array ) {
    $width = $size_array[ 0 ];

    if ( $width > MAX_IMAGE_SIZE ) {
        $sizes = preg_replace( '/' . $width . '/', MAX_IMAGE_SIZE, $sizes );
    }

    return $sizes;
}

/**
 * Removes width and height attributes from image tags.
 *
 * https://wpscholar.com/blog/remove-wp-image-size-attributes/
 *
 * @param string $html
 * @return string
 */
function remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
}
