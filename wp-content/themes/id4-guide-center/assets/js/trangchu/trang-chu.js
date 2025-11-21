document.addEventListener("DOMContentLoaded", () => {
  // Sử dụng .iD4_guide-actions làm nhóm để lắng nghe sự kiện mouseleave
  const buttonGroup = document.querySelector(".iD4_guide-actions");
  const buttons = document.querySelectorAll(
    ".iD4_guide-actions .iD4_guide-btn"
  );

  // Hàm áp dụng trạng thái primary/secondary cho một nút
  const applyState = (button, isPrimary) => {
    if (isPrimary) {
      button.classList.add("iD4_guide-btn-primary");
      button.classList.remove("iD4_guide-btn-secondary");
    } else {
      button.classList.add("iD4_guide-btn-secondary");
      button.classList.remove("iD4_guide-btn-primary");
    }
  };

  // Hàm để thiết lập trạng thái mặc định (Nút 1 Primary, Nút 2 Secondary)
  const setDefaultState = () => {
    buttons.forEach((button) => {
      // Nút có data-default-primary="true" sẽ là Primary
      const isDefaultPrimary = button.dataset.defaultPrimary === "true";
      applyState(button, isDefaultPrimary);
    });
  };

  // 1. Thiết lập trạng thái mặc định khi tải trang
  setDefaultState();

  // 2. Thêm lắng nghe sự kiện hover (mouseenter)
  buttons.forEach((button) => {
    button.addEventListener("mouseenter", () => {
      // Khi hover vào một nút: Nút đang hover là Primary, nút còn lại là Secondary
      buttons.forEach((otherButton) => {
        const isThisButton = otherButton === button;
        applyState(otherButton, isThisButton);
      });
    });
  });

  // 3. Khi con trỏ chuột rời khỏi nhóm nút (mouseleave), quay về trạng thái mặc định
  if (buttonGroup) {
    buttonGroup.addEventListener("mouseleave", () => {
      setDefaultState();
    });
  }
});
