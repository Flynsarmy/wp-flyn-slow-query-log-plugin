<?php
/*
Plugin Name: Slow Query Log
Description: Adds a Network Dashboard page for MySQL slow queries
Version: 1.01
Plugin URI: https://www.flynsarmy.com/
Author: Flyn San
Author URI: https://www.flynsarmy.com
Network: True
*/

if ( !defined( 'ABSPATH' ) ) {
    die();
}

function fsql_get_queries()
{
    global $wpdb;

    return $wpdb->get_results("
        SELECT start_time, query_time, sql_text
        FROM mysql.slow_log
        ORDER BY start_time DESC
        LIMIT 100;
    ", ARRAY_A);
}

add_action('network_admin_menu', function() {
    add_submenu_page(
        'index.php',
        'Flyn Slow Query Log | W3 Total Cache',
        'Slow Query Log',
        'manage_options',
        'fsql',
        function() {
            require_once __DIR__.'/vendor/jdorn/sql-formatter/lib/SqlFormatter.php';

            echo mp_require_with(__DIR__.'/partials/list.php', [
                'queries' => fsql_get_queries(),
            ]);
        }
    );
}, 11);