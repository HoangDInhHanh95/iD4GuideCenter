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

    // css button header
    $button_header = get_stylesheet_directory() . '/assets/css/iD4header.css';
    if (file_exists($button_header)) {
        wp_enqueue_style(
            'id4-iD4header-css',
            get_stylesheet_directory_uri() . '/assets/css/iD4header.css',
            array(),
            filemtime($button_header)
        );
    }


    // js button header
    $button_header_js = get_stylesheet_directory() . '/assets/js/button-header.js';
    if (file_exists($button_header_js)) {
        wp_enqueue_script(
            'id4-button-header-js',
            get_stylesheet_directory_uri() . '/assets/js/button-header.js',
            array('jquery'),                 // nếu cần jQuery – có thể bỏ nếu không dùng
            filemtime($button_header_js),           // cache-busting
            true                             // load ở footer
        );
    }

    //2 block iD-4 guide và stacktable guide center
    $BDCG_Implant_chi_vs = get_stylesheet_directory() . '/assets/css/BDCG-Implant-chi-vs.css';
    if (file_exists($BDCG_Implant_chi_vs)) {
        wp_enqueue_style(
            'id4-BDCG-Implant-chi-vs-css',
            get_stylesheet_directory_uri() . '/assets/css/BDCG-Implant-chi-vs.css',
            array('id4-global-css'), // ← global load trước
            filemtime($BDCG_Implant_chi_vs)
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
    // Chỉ load trang iD4 SOLUTION
    // iD4 SOLUTION CSS and JS
    if (is_page('id4-solution')) {

        // CSS iD4 SOLUTION lập kế hoach điều trị 
        $iD4_solution_css = get_stylesheet_directory() . '/assets/css/iD4solution/iD4-solution.css';
        if (file_exists($iD4_solution_css)) {
            wp_enqueue_style(
                'id4-solution-css',
                get_stylesheet_directory_uri() . '/assets/css/iD4solution/iD4-solution.css',
                array('id4-global-css'), // ← global load trước
                filemtime($iD4_solution_css)
            );
        }

        // ID-4 Solution: Chính xác cho mọi ca Implant
        $iD4_chinh_xac_moi_ca_implant = get_stylesheet_directory() . '/assets/css/iD4solution/iD-4-chinh-xac-moi-ca.css';
        if (file_exists($iD4_chinh_xac_moi_ca_implant)) {
            wp_enqueue_style(
                'iD-4-chinh-xac-moi-ca-css',
                get_stylesheet_directory_uri() . '/assets/css/iD4solution/iD-4-chinh-xac-moi-ca.css',
                array('id4-global-css'), // ← global load trước
                filemtime($iD4_chinh_xac_moi_ca_implant)
            );
        }

        // ID-4 Solution: Chính xác cho mọi ca Implant JS
        $iD4_chinh_xac_moi_ca_implant_js = get_stylesheet_directory() . '/assets/js/iD4solution/BDCG-Implant-chi-vs.js';
        if (file_exists($iD4_chinh_xac_moi_ca_implant_js)) {
            wp_enqueue_script(
                'iD-4-chinh-xac-moi-ca-js',
                get_stylesheet_directory_uri() . '/assets/js/iD4solution/BDCG-Implant-chi-vs.js',
                array('jquery'),                 // nếu cần jQuery – có thể bỏ nếu không dùng
                filemtime($iD4_chinh_xac_moi_ca_implant_js),           // cache-busting
                true                             // load ở footer
            );
        }
    }
}, 20); // <-- đóng hook