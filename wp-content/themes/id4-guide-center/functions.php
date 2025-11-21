<?php

add_action('wp_enqueue_scripts', function () {

    // Load GLOBAL CSS
    $global = get_stylesheet_directory() . '/assets/css/global.css';
    if (file_exists($global)) {
        wp_enqueue_style(
            'id4-global-css',
            get_stylesheet_directory_uri() . '/assets/css/global.css',
            array(),
            filemtime($global)
        );
    }

    // Chỉ load TRANG CHỦ
    if (is_front_page()) {


        $home = get_stylesheet_directory() . '/assets/css/trangchu/trang-chu.css';
        if (file_exists($home)) {
            wp_enqueue_style(
                'id4-home-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/trang-chu.css',
                array('id4-global-css'), // ← global load trước
                filemtime($home)
            );
        }

        // JS TRANG CHỦ
        $home_js = get_stylesheet_directory() . '/assets/js/trangchu/trang-chu.js';

        if (file_exists($home_js)) {

            wp_enqueue_script(
                'id4-trang-chu-js',
                get_stylesheet_directory_uri() . '/assets/js/trangchu/trang-chu.js',
                array('jquery'),                 // nếu cần jQuery – có thể bỏ nếu không dùng
                filemtime($home_js),           // cache-busting
                true                             // load ở footer
            );
        }
    }

    // JS GUIDE
    // $bs_id4_guide_js = get_stylesheet_directory() . '/assets/js/bs-id4-guide.js';

    // if (file_exists($bs_id4_guide_js)) {
    //     wp_enqueue_script(
    //         'id4-bs-guide-js',
    //         get_stylesheet_directory_uri() . '/assets/js/bs-id4-guide.js',
    //         ['jquery'],
    //         filemtime($bs_id4_guide_js),
    //         true
    //     );
    // }
}, 20); // <-- đóng hook