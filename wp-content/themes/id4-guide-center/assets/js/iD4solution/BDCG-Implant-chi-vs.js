// CSS Utility for text toggling
const style = document.createElement("style");
style.innerHTML = `
                .desktop-text { display: inline; }
                .mobile-text { display: none; }
                @media (max-width: 768px) {
                    .desktop-text { display: none; }
                    .mobile-text { display: inline; }
                }
            `;
document.getElementById("iD4_guide_CXCMC_impant_wrapper").appendChild(style);
// --- DỮ LIỆU VIDEO LOCAL ---
const iD4_guide_CXCMC_impant_stackableIntroVideoUrl =
    "media/videos/stackable_intro.mp4";
const iD4_guide_CXCMC_impant_guideIntroVideoUrl = "media/videos/guide_intro.mp4";
const iD4_guide_CXCMC_impant_guideData = [{
    title: "Thu thập dữ liệu",
    content: `
                  <p>Mọi điều trị thành công đều bắt đầu từ việc thu thập thông tin đầy đủ và chính xác. Với ID-4 Guide chúng ta cần 2 thông tin quan trọng là:</p>

                  <p><strong>Phim Cone Beam CT (CBCT):</strong><br>
                  Cung cấp hình ảnh chi tiết về xương, răng, thần kinh và xoang hàm.</p>

                  <p><strong>File Scan trong miệng hoặc mẫu hàm thạch cao:</strong><br>
                  Có các thông tin về răng, mô mềm và khớp cắn</p>
                `,
    videoUrl: "media/videos/guide_step1.mp4",
}, {
    title: "Lập kế hoạch ảo",
    content: "Bác sĩ giả lập vị trí Implant trên phần mềm chuyên dụng.",
    videoUrl: "media/videos/guide_step2.mp4",
}, {
    title: "In 3D Máng",
    content: "Sản xuất máng in 3D với vật liệu an toàn sinh học.",
    videoUrl: "media/videos/guide_step3.mp4",
}, {
    title: "Phẫu thuật",
    content: "Đặt Implant chính xác qua lỗ hướng dẫn (Sleeve).",
    videoUrl: "media/videos/guide_step4.mp4",
}, {
    title: "Phục hình",
    content: "Lắp răng sứ thẩm mỹ trên Implant.",
    videoUrl: "media/videos/guide_step5.mp4",
}, ];
const iD4_guide_CXCMC_impant_stackableData = [{
    title: "Khảo sát toàn hàm",
    content: "Đánh giá mật độ xương và thiết kế nụ cười tổng thể.",
    videoUrl: "media/videos/stackable_step1.mp4",
}, {
    title: "Thiết kế bộ máng",
    content: "Thiết kế hệ thống 3 máng chồng lên nhau (Stackable).",
    videoUrl: "media/videos/stackable_step2.mp4",
}, {
    title: "Cố định Máng nền",
    content: "Ghim chốt Pin vào xương để tạo điểm tựa vững chắc.",
    videoUrl: "media/videos/stackable_step3.mp4",
}, {
    title: "Xử lý & Đặt Implant",
    content: "Mài xương và khoan Implant hàng loạt.",
    videoUrl: "media/videos/stackable_step4.mp4",
}, {
    title: "Gắn răng tức thì",
    content: "Gắn hàm răng tạm ngay sau phẫu thuật.",
    videoUrl: "media/videos/stackable_step5.mp4",
}, ];
let iD4_guide_CXCMC_impant_guideIndex = 0;
let iD4_guide_CXCMC_impant_stackableIndex = 0;
// --- TAB LOGIC ---
function iD4_guide_CXCMC_impant_openTab(tabId) {
    document
        .querySelectorAll(".iD4_guide_CXCMC_impant_tab-content")
        .forEach((c) => c.classList.remove("active"));
    document
        .querySelectorAll(".iD4_guide_CXCMC_impant_tab-btn")
        .forEach((b) => b.classList.remove("active"));
    document.getElementById(tabId).classList.add("active");
    const buttons = document.querySelectorAll(".iD4_guide_CXCMC_impant_tab-btn");
    if (tabId === "iD4_guide_CXCMC_impant_tab_guide")
        buttons[0].classList.add("active");
    else buttons[1].classList.add("active");
}
// --- SLIDER LOGIC ---
function iD4_guide_CXCMC_impant_updateUI(type) {
    let data, index, prefix, navClass;
    if (type === "guide") {
        data = iD4_guide_CXCMC_impant_guideData;
        index = iD4_guide_CXCMC_impant_guideIndex;
        prefix = "iD4_guide_CXCMC_impant_g-";
        navClass = ".iD4_guide_CXCMC_impant_g-step-item";
    } else {
        data = iD4_guide_CXCMC_impant_stackableData;
        index = iD4_guide_CXCMC_impant_stackableIndex;
        prefix = "iD4_guide_CXCMC_impant_s-";
        navClass = ".iD4_guide_CXCMC_impant_s-step-item";
    }
    // Update Text
    document.getElementById(`${prefix}step-count`).innerText = `Bước ${index + 1
                }/5`;
    document.getElementById(`${prefix}step-title`).innerText = data[index].title;
    document.getElementById(`${prefix}step-desc`).innerHTML = data[index].content;
    // Update Thumbnail
    const thumb = document.getElementById(`${prefix}video-thumb`);
    if (thumb)
        thumb.src = `https://placehold.co/600x400/000/fff?text=Video+${encodeURIComponent(
                    data[index].title
                )}`;
    // Update Active Icon
    const icons = document.querySelectorAll(navClass);
    icons.forEach((icon, i) => {
        if (i === index) icon.classList.add("active");
        else icon.classList.remove("active");
    });
    // Update Dots
    const dotsContainer = document.getElementById(`${prefix}dots`);
    if (dotsContainer) {
        const dots = dotsContainer.children;
        Array.from(dots).forEach((dot, i) => {
            if (i === index) dot.classList.add("active");
            else dot.classList.remove("active");
        });
    }
    // Button Logic
    const prevBtn = document.getElementById(`${prefix}prev-btn`);
    const nextBtn = document.getElementById(`${prefix}next-btn`);
    // Visibility
    if (prevBtn) prevBtn.style.visibility = index === 0 ? "hidden" : "visible";
    // Text Update
    if (nextBtn) {
        const isLast = index === data.length - 1;
        const dText = nextBtn.querySelector(".desktop-text");
        const mText = nextBtn.querySelector(".mobile-text");
        if (dText) dText.innerText = isLast ? "Hoàn tất" : "Tiếp theo >";
        if (mText) mText.innerHTML = isLast ? "Hoàn tất" : "Tiếp theo >";
    }
}

function iD4_guide_CXCMC_impant_setStep(stepNum, type) {
    if (type === "guide") {
        iD4_guide_CXCMC_impant_guideIndex = stepNum - 1;
        iD4_guide_CXCMC_impant_updateUI("guide");
    } else {
        iD4_guide_CXCMC_impant_stackableIndex = stepNum - 1;
        iD4_guide_CXCMC_impant_updateUI("stackable");
    }
}
// --- VIDEO MODAL LOGIC ---
const iD4_guide_CXCMC_impant_modal = document.getElementById(
    "iD4_guide_CXCMC_impant_video-modal"
);
const iD4_guide_CXCMC_impant_videoTag = document.getElementById(
    "iD4_guide_CXCMC_impant_modal-video-tag"
);

function iD4_guide_CXCMC_impant_openVideoModal(source) {
    let videoUrl;
    if (source === "stackable_intro")
        videoUrl = iD4_guide_CXCMC_impant_stackableIntroVideoUrl;
    else if (source === "intro_guide")
        videoUrl = iD4_guide_CXCMC_impant_guideIntroVideoUrl;
    else if (source === "guide")
        videoUrl =
        iD4_guide_CXCMC_impant_guideData[iD4_guide_CXCMC_impant_guideIndex]
        .videoUrl;
    else if (source === "stackable")
        videoUrl =
        iD4_guide_CXCMC_impant_stackableData[iD4_guide_CXCMC_impant_stackableIndex]
        .videoUrl;
    iD4_guide_CXCMC_impant_videoTag.src = videoUrl;
    iD4_guide_CXCMC_impant_modal.style.display = "flex";
    iD4_guide_CXCMC_impant_videoTag
        .play()
        .catch((e) => console.log("Auto-play prevented"));
}

function iD4_guide_CXCMC_impant_closeVideoModal() {
    iD4_guide_CXCMC_impant_modal.style.display = "none";
    iD4_guide_CXCMC_impant_videoTag.pause();
    iD4_guide_CXCMC_impant_videoTag.src = "";
}
window.onclick = function(event) {
    if (event.target == iD4_guide_CXCMC_impant_modal) {
        iD4_guide_CXCMC_impant_closeVideoModal();
    }
};
// --- BUTTON LISTENERS ---
const btns = [{
    id: "iD4_guide_CXCMC_impant_g-next-btn",
    type: "guide",
    action: "next",
}, {
    id: "iD4_guide_CXCMC_impant_g-prev-btn",
    type: "guide",
    action: "prev",
}, {
    id: "iD4_guide_CXCMC_impant_s-next-btn",
    type: "stackable",
    action: "next",
}, {
    id: "iD4_guide_CXCMC_impant_s-prev-btn",
    type: "stackable",
    action: "prev",
}, ];
btns.forEach((btnInfo) => {
    const btn = document.getElementById(btnInfo.id);
    if (btn) {
        btn.addEventListener("click", () => {
            let idx =
                btnInfo.type === "guide" ?
                iD4_guide_CXCMC_impant_guideIndex :
                iD4_guide_CXCMC_impant_stackableIndex;
            let len =
                btnInfo.type === "guide" ?
                iD4_guide_CXCMC_impant_guideData.length :
                iD4_guide_CXCMC_impant_stackableData.length;
            if (btnInfo.action === "next" && idx < len - 1) idx++;
            else if (btnInfo.action === "prev" && idx > 0) idx--;
            if (btnInfo.type === "guide") {
                iD4_guide_CXCMC_impant_guideIndex = idx;
                iD4_guide_CXCMC_impant_updateUI("guide");
            } else {
                iD4_guide_CXCMC_impant_stackableIndex = idx;
                iD4_guide_CXCMC_impant_updateUI("stackable");
            }
        });
    }
});
// Initialize
document.addEventListener("DOMContentLoaded", function() {
    iD4_guide_CXCMC_impant_updateUI("guide");
    iD4_guide_CXCMC_impant_updateUI("stackable");
});