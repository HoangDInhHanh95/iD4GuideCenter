<?php

// 1) Load tokens.css (toàn cục hoặc chỉ cho trang chủ)
wp_enqueue_style(
    'id4-globals',
    get_stylesheet_directory_uri() . '/assets/css/globals.css',
    [],
    filemtime(get_stylesheet_directory() . '/assets/css/globals.css')
);


// code css cho trang chủ iD4GuideCenter
$slug_trang_chu         = 'iD4GuideCenter'; // slug theo ảnh bạn gửi
$rel_path_trang_chu     = '/assets/css/trangchu/trang-chu.css';

$trang_chu_guide = get_stylesheet_directory() . $rel_path_trang_chu;

// Không phụ thuộc domain; chỉ dựa vào slug/page hiện tại
if (file_exists($trang_chu_guide) && is_page($slug_trang_chu)) {
    // css trang chủ 
    wp_enqueue_style(
        'id4-trang-chu-iD4GuideCenter',
        get_stylesheet_directory_uri() . $rel_path_trang_chu,
        array('id4-globals'),                      // nếu CSS này cần biến trong tokens.css
        filemtime($stackable_css_abs)             // cache-busting khi bạn sửa file
    );
}






// fiel css
// bs của id4 guide
$bs_id4_guide_js = get_stylesheet_directory() . '/assets/js/bs-id4-guide.js';
if (file_exists($bs_id4_guide_js)) {
    wp_enqueue_script(
        'id4-bs-guide-js',
        get_stylesheet_directory_uri() . '/assets/js/bs-id4-guide.js',
        ['jquery'], // có thể thêm ['jquery','gsap','swiper-cdn'] nếu cần
        filemtime($bs_id4_guide_js),
        true // load ở footer
    );
}
