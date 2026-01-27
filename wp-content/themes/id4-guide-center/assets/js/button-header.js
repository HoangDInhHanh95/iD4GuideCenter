document.addEventListener("DOMContentLoaded", () => {
    // Cập nhật tên ID ở đây
    const container = document.getElementById("id4_btn_header_container");
    const btnLeft = document.getElementById("id4_btn_header_left");
    const btnRight = document.getElementById("id4_btn_header_right");

    // Kiểm tra tồn tại
    if (container && btnLeft && btnRight) {
        // Logic Nút Trái
        btnLeft.addEventListener("mouseenter", () => {
            container.classList.add("hovering-left");
        });
        btnLeft.addEventListener("mouseleave", () => {
            container.classList.remove("hovering-left");
        });

        // Logic Nút Phải
        btnRight.addEventListener("mouseenter", () => {
            container.classList.add("hovering-right");
        });
        btnRight.addEventListener("mouseleave", () => {
            container.classList.remove("hovering-right");
        });
    }
});

/* ======================================================
--- IGNORE ---
   PHẦN 2: STYLE RIÊNG CHO "ID4 MENU" (Độ ưu tiên cao)
--- IGNORE ---
   ====================================================== */
/* File: assets/js/id4-menu-link.js */

jQuery(document).ready(function($) {

    // --- CẤU HÌNH LINK GOOGLE DRIVE TẠI ĐÂY ---
    // Bạn hãy dán link Drive của bạn vào giữa 2 dấu ngoặc kép ""

    // Link cho nút "Liên hệ tư vấn" (Viền)
    const linkDriveLienHe = "https://drive.google.com/drive/folders/LINK-CUA-BAN-1";

    // Link cho nút "Đặt máng ngay" (Nền đặc)
    const linkDriveDatMang = "https://docs.google.com/forms/d/e/1FAIpQLSeveLdr5y5nTa6x9Kkr_Wr6lJ94Bo1I01QhqEIPRqvRASl9sA/viewform?pli=1";


    // ---------------------------------------------
    // LOGIC GÁN LINK (Tự động thay thế)
    // ---------------------------------------------

    // 1. Xử lý nút Liên hệ tư vấn (.id4-menu-btn-outline)
    $('.id4-menu-btn-outline > a').attr('href', linkDriveLienHe);
    $('.id4-menu-btn-outline > a').attr('target', '_blank'); // Mở tab mới cho Drive


    // 2. Xử lý nút Đặt máng ngay (.id4-menu-btn-solid)
    $('.id4-menu-btn-solid > a').attr('href', linkDriveDatMang);
    $('.id4-menu-btn-solid > a').attr('target', '_blank'); // Mở tab mới cho Drive

    console.log("Updated Menu Links to Google Drive");
});