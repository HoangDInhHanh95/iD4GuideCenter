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

    // css footer
    $iD4_footer = get_stylesheet_directory() . '/assets/css/footer.css';
    if (file_exists($iD4_footer)) {
        wp_enqueue_style(
            'id4-footer-css',
            get_stylesheet_directory_uri() . '/assets/css/footer.css',
            array(),
            filemtime($iD4_footer)
        );
    }




    // Chỉ load chỉ TRANG CHỦ
    if (is_front_page()) {
        // CSS TRANG CHỦ
        $home = get_stylesheet_directory() . '/assets/css/trangchu/trang-chu.css';
        if (file_exists($home)) {
            wp_enqueue_style(
                'id4-home-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/trang-chu.css',
                array('id4-global-css'), // ← global load trước
                filemtime($home)
            );
        }

        // về chúng tôi
        $ve_chung_toi = get_stylesheet_directory() . '/assets/css/trangchu/ve-chung-toi.css';
        if (file_exists($ve_chung_toi)) {
            wp_enqueue_style(
                'id4-ve-chung-toi-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/ve-chung-toi.css',
                array('id4-global-css'), // ← global load trước
                filemtime($ve_chung_toi)
            );
        }

        // TẠI SAO NÊN CHỌN ID-4 GUIDE CENTER
        $tsnc_iD4_guide_center = get_stylesheet_directory() . '/assets/css/trangchu/TSNC-ID-4-GUIDE-CENTER.css';
        if (file_exists($tsnc_iD4_guide_center)) {
            wp_enqueue_style(
                'id4-TSNC-ID-4-GUIDE-CENTER-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/TSNC-ID-4-GUIDE-CENTER.css',
                array('id4-global-css'), // ← global load trước
                filemtime($tsnc_iD4_guide_center)
            );
        }

        // Quy trình đơn giản để phẫu thuật cấy ghép implant có hướng dẫn
        $QTPTCG_impplant = get_stylesheet_directory() . '/assets/css/trangchu/QTPTCG_impplant.css';
        if (file_exists($QTPTCG_impplant)) {
            wp_enqueue_style(
                'id4-QTPTCG-impplant-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/QTPTCG_impplant.css',
                array('id4-global-css'), // ← global load trước
                filemtime($QTPTCG_impplant)
            );
        }

        //2 block iD-4 guide và stacktable guide center
        $guide_stacktable_guide = get_stylesheet_directory() . '/assets/css/trangchu/guide-stacktable-guide.css';
        if (file_exists($guide_stacktable_guide)) {
            wp_enqueue_style(
                'id4-guide-stacktable-guide-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/guide-stacktable-guide.css',
                array('id4-global-css'), // ← global load trước
                filemtime($guide_stacktable_guide)
            );
        }

        //2 block iD-4 guide và stacktable guide center
        $BDCG_Implant_chi_vs = get_stylesheet_directory() . '/assets/css/trangchu/BDCG-Implant-chi-vs.css';
        if (file_exists($BDCG_Implant_chi_vs)) {
            wp_enqueue_style(
                'id4-BDCG-Implant-chi-vs-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/BDCG-Implant-chi-vs.css',
                array('id4-global-css'), // ← global load trước
                filemtime($BDCG_Implant_chi_vs)
            );
        }


        //2 ĐỘI NGŨ BÁC SĨ VÀ KỸ THUẬT VIÊN DNBS_kT_iD_4_guide 
        $DNBS_kT_iD_4_guide = get_stylesheet_directory() . '/assets/css/trangchu/DNBS_kT_iD_4_guide.css';
        if (file_exists($DNBS_kT_iD_4_guide)) {
            wp_enqueue_style(
                'id4-DNBS_kT_iD_4_guide-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/DNBS_kT_iD_4_guide.css',
                array('id4-global-css'), // ← global load trước
                filemtime($DNBS_kT_iD_4_guide)
            );
        }

        // NXBS-Trai-nghiệm-id4-guide Chuyên gia nói gì về ID-4 Solution
        $NXBS_Trai_nghiệm_id4_guide = get_stylesheet_directory() . '/assets/css/trangchu/NXBS-Trai-nghiệm-id4-guide.css';
        if (file_exists($NXBS_Trai_nghiệm_id4_guide)) {
            wp_enqueue_style(
                'id4-NXBS-Trai-nghiệm-id4-guide-css',
                get_stylesheet_directory_uri() . '/assets/css/trangchu/NXBS-Trai-nghiệm-id4-guide.css',
                array('id4-global-css'), // ← global load trước
                filemtime($NXBS_Trai_nghiệm_id4_guide)
            );
        }


        // JS TRANG CHỦ guide-stacktable-guide 
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

        // bác sĩ nói gì về id4 guide center
        $NXBS_Trai_nghiem_id4_guide = get_stylesheet_directory() . '/assets/js/trangchu/NXBS-Trai-nghiệm-id4-guide.js';
        if (file_exists($NXBS_Trai_nghiem_id4_guide)) {
            wp_enqueue_script(
                'id4-NXBS_Trai_nghiem_id4_guide-js',
                get_stylesheet_directory_uri() . '/assets/js/trangchu/NXBS-Trai-nghiệm-id4-guide.js',
                array('jquery'),                 // nếu cần jQuery – có thể bỏ nếu không dùng
                filemtime($NXBS_Trai_nghiem_id4_guide),           // cache-busting
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