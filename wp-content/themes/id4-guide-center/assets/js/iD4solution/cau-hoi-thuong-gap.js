document.addEventListener("click", function(e) {
    // 1. Kiểm tra xem người dùng có click vào nút FAQ (hoặc icon bên trong nó) không
    const iD4_solution_CHTG_btnClicked = e.target.closest(".iD4-solution-CHTG-q");

    // Nếu click ra ngoài nút FAQ thì thoát ngay, không làm gì cả
    if (!iD4_solution_CHTG_btnClicked) return;

    // 2. Tìm thẻ cha chứa nút và câu trả lời (Dùng closest cực kỳ an toàn)
    const iD4_solution_CHTG_itemParent = iD4_solution_CHTG_btnClicked.closest(".iD4-solution-CHTG-item");
    if (!iD4_solution_CHTG_itemParent) return;

    // 3. Từ thẻ cha, tìm xuống câu trả lời (Bỏ qua mọi thẻ p, br mà WP tự thêm)
    const iD4_solution_CHTG_panel = iD4_solution_CHTG_itemParent.querySelector(".iD4-solution-CHTG-a");
    if (!iD4_solution_CHTG_panel) return;

    // 4. Xử lý logic đóng/mở
    const iD4_solution_CHTG_container = document.getElementById("iD4-solution-CHTG-wrapper");
    const iD4_solution_CHTG_isOpen = iD4_solution_CHTG_btnClicked.classList.contains("iD4-active");

    // --- Logic: Đóng tất cả các câu khác khi mở câu mới ---
    if (iD4_solution_CHTG_container) {
        const iD4_solution_CHTG_allBtns = iD4_solution_CHTG_container.querySelectorAll(".iD4-solution-CHTG-q");

        iD4_solution_CHTG_allBtns.forEach(btn => {
            // Nếu nút này KHÔNG PHẢI nút đang bấm -> thì đóng nó lại
            if (btn !== iD4_solution_CHTG_btnClicked) {
                btn.classList.remove("iD4-active");

                // Tìm panel tương ứng của nút đó để đóng
                const btnParent = btn.closest(".iD4-solution-CHTG-item");
                if (btnParent) {
                    const panelToClose = btnParent.querySelector(".iD4-solution-CHTG-a");
                    if (panelToClose) panelToClose.classList.remove("iD4-open");
                }
            }
        });
    }

    // --- Logic: Toggle (Bật/Tắt) câu hiện tại ---
    if (!iD4_solution_CHTG_isOpen) {
        // Nếu đang đóng -> Mở ra
        iD4_solution_CHTG_btnClicked.classList.add("iD4-active");
        iD4_solution_CHTG_panel.classList.add("iD4-open");
    } else {
        // Nếu đang mở -> Đóng lại
        iD4_solution_CHTG_btnClicked.classList.remove("iD4-active");
        iD4_solution_CHTG_panel.classList.remove("iD4-open");
    }
});