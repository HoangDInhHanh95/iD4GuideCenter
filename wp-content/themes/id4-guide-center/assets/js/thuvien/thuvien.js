window.initID4Slider = function(wrapperId) {
    const wrapper = document.getElementById(wrapperId);
    if (!wrapper) return;

    const track = wrapper.querySelector('.id4_slider_track');
    const dotsContainer = wrapper.querySelector('.id4_slider_dots');
    const cards = wrapper.querySelectorAll('.id4_slider_card');

    // Lấy thông số cấu hình từ HTML
    const perPage = parseInt(track.getAttribute('data-per-page')) || 3;
    const maxDots = parseInt(track.getAttribute('data-max-dots')) || 5;

    let currentPage = 0;
    let totalPages = 0;

    function setup() {
        // Kiểm tra xem có đang ở Mobile không (dựa trên CSS display của dots hoặc width)
        // Ở đây ta check width < 768px (khớp với Media Query CSS)
        const isMobile = window.innerWidth < 768;

        if (isMobile) {
            // Mobile: Reset style để CSS Native Scroll hoạt động
            track.style.transform = 'none';
            dotsContainer.style.display = 'none';
            return;
        }

        // Desktop/Tablet: Tính toán
        dotsContainer.style.display = 'flex';
        totalPages = Math.ceil(cards.length / perPage);

        // Giới hạn số dot hiển thị
        if (totalPages > maxDots) totalPages = maxDots;

        renderDots();
        goToPage(currentPage);
    }

    function renderDots() {
        dotsContainer.innerHTML = '';

        // Nếu chỉ có 1 trang thì không cần hiện dot
        if (totalPages <= 1) return;

        for (let i = 0; i < totalPages; i++) {
            const btn = document.createElement('button');
            btn.className = `id4_dot ${i === currentPage ? 'active' : ''}`;
            btn.ariaLabel = `Go to page ${i + 1}`;

            btn.onclick = () => {
                currentPage = i;
                goToPage(i);
                updateDots();
            };

            dotsContainer.appendChild(btn);
        }
    }

    function updateDots() {
        const dots = dotsContainer.querySelectorAll('.id4_dot');
        dots.forEach((dot, index) => {
            if (index === currentPage) dot.classList.add('active');
            else dot.classList.remove('active');
        });
    }

    function goToPage(index) {
        // Desktop Logic: Sử dụng Transform Translate
        // Công thức: index * 100% + (index * gap)
        // Tuy nhiên, vì width track là 100%, ta dùng calc đơn giản:

        const gap = 20; // Phải khớp với var(--id4-gap) trong CSS

        // Dịch chuyển: - (100% + gap) * index
        track.style.transform = `translateX(calc(-100% * ${index} - ${gap * index}px))`;
    }

    // Lắng nghe sự kiện thay đổi kích thước màn hình
    window.addEventListener('resize', setup);

    // Khởi chạy lần đầu
    setup();
};