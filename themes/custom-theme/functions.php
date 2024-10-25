<?php

// Register scripts and stylesheets.
add_action('init', function() {
    $asset_url = trailingslashit(get_template_directory_uri()) . 'assets/build/';
    $asset_dir = trailingslashit(get_template_directory()) . 'assets/build/';

    // Scan for *.asset.php files and register them.
    $asset_files = glob($asset_dir . '*.asset.php');

    foreach($asset_files as $asset_file) {
        $asset_script = require($asset_file);

        $asset_filename = basename($asset_file);

        $asset_parts = explode('.asset.php', $asset_filename);
        $asset_slug = array_shift($asset_parts);

        $asset_handle = sprintf("custom-theme/%s", $asset_slug);

        $stylesheet_path = $asset_dir . $asset_slug . '.css';
        $stylesheet_url = $asset_url . $asset_slug . '.css';

        if (true === is_readable($stylesheet_path)) {
            wp_register_style(
                $asset_handle,
                $stylesheet_url,
                [],
                $asset_script['version']
            );
        }

        $javascript_path = $asset_dir . $asset_slug . '.js';
        $javascript_url = $asset_url . $asset_slug . '.js';

        if (true === is_readable($javascript_path)) {
            wp_register_script(
                $asset_handle,
                $javascript_url,
                $asset_script['dependencies'],
                $asset_script['version']
            );
        }
    }

}, 1);

// Enqueue scripts (while magically including dependencies!)
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('custom-theme/main');
    wp_enqueue_style('custom-theme/main');
});