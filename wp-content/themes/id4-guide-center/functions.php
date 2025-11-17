<?php
// Add custom Theme Functions here
$slug              = 'id-4-stackable-guide'; // slug theo ảnh bạn gửi


$stackable_css_abs = get_stylesheet_directory() . '/assets/css/ID4STACKABLEGUIDE/id4-stackable-guide.css';

// Không phụ thuộc domain; chỉ dựa vào slug/page hiện tại
if (file_exists($stackable_css_abs) && is_page($slug)) {
    // css trang chủ 
    wp_enqueue_style(
        'id4-stackable-guide-css',
        get_stylesheet_directory_uri() . '/assets/css/ID4STACKABLEGUIDE/id4-stackable-guide.css',
        array('id4-tokens'),                      // nếu CSS này cần biến trong tokens.css
        filemtime($stackable_css_abs)             // cache-busting khi bạn sửa file
    );
}
