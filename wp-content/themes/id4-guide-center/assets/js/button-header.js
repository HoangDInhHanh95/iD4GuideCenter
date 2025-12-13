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
