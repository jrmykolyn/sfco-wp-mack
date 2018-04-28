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
