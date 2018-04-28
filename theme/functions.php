<?php
// Config.
require_once( __DIR__ . '/admin/config.php' );

// Admin.
require_once( __DIR__ . '/admin/wp-appearance-customize.php' );

// Theme
require_once( __DIR__ . '/admin/defaults.php' );
require_once( __DIR__ . '/admin/fns.php' );
require_once( __DIR__ . '/admin/resources.php' );
// NOTE: 'actions' and 'filters' must be included after 'fns'.
require_once( __DIR__ . '/admin/actions.php' );
require_once( __DIR__ . '/admin/filters.php' );
?>
