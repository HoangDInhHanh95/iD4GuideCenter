document.addEventListener("DOMContentLoaded", function () {
  const sliderContainer = document.querySelector(
    ".id4-guide-cg-noi-gi-testimonial-slider"
  );
  if (!sliderContainer) return;

  const grid = sliderContainer.querySelector(
    ".id4-guide-cg-noi-gi-testimonials-section__grid"
  );
  const nextBtn = document.querySelector(
    ".id4-guide-cg-noi-gi-slider-btn.id4-guide-cg-noi-gi-next"
  );
  const prevBtn = document.querySelector(
    ".id4-guide-cg-noi-gi-slider-btn.id4-guide-cg-noi-gi-prev"
  );
  const paginationContainer = document.querySelector(
    ".id4-guide-cg-noi-gi-slider-pagination"
  );

  if (!grid || !nextBtn || !prevBtn || !paginationContainer) {
    console.warn("Slider components not found. Slider will not initialize.");
    return;
  }

  let originalItems = Array.from(
    grid.querySelectorAll(".id4-guide-cg-noi-gi-testimonial-item")
  );
  if (originalItems.length <= 1) return;

  const AUTOPLAY_DELAY = 4000;
  let currentIndex = 1;
  let autoPlayInterval;
  let isTransitioning = false;
  let sliderInitialized = false;

  let startX = 0;
  let moveX = 0;
  let isSwiping = false;

  function handleTouchStart(e) {
    if (isTransitioning) return;
    startX = e.touches[0].clientX;
    isSwiping = true;
    moveX = 0;
    grid.classList.remove("id4-guide-cg-noi-gi-is-transitioning");
  }

  function handleTouchMove(e) {
    if (!isSwiping || isTransitioning) return;
    let currentX = e.touches[0].clientX;
    moveX = currentX - startX;
    grid.style.transform = `translateX(calc(-${
      currentIndex * 100
    }% + ${moveX}px))`;
  }

  function handleTouchEnd() {
    if (isTransitioning || !isSwiping) return;
    isSwiping = false;

    const SWIPE_THRESHOLD = 50;

    if (moveX < -SWIPE_THRESHOLD) {
      moveToNext();
      resetAutoplay();
    } else if (moveX > SWIPE_THRESHOLD) {
      moveToPrev();
      resetAutoplay();
    } else {
      moveToSlide();
    }
  }

  function setupSlider() {
    const firstClone = originalItems[0].cloneNode(true);
    const lastClone = originalItems[originalItems.length - 1].cloneNode(true);
    grid.appendChild(firstClone);
    grid.prepend(lastClone);

    grid.style.transform = `translateX(-${currentIndex * 100}%)`;

    originalItems.forEach((_, index) => {
      const dot = document.createElement("div");
      dot.classList.add("id4-guide-cg-noi-gi-dot");
      dot.addEventListener("click", () => {
        if (isTransitioning) return;
        currentIndex = index + 1;
        moveToSlide();
        resetAutoplay();
      });
      paginationContainer.appendChild(dot);
    });

    nextBtn.addEventListener("click", () => {
      if (isTransitioning) return;
      moveToNext();
      resetAutoplay();
    });
    prevBtn.addEventListener("click", () => {
      if (isTransitioning) return;
      moveToPrev();
      resetAutoplay();
    });
    grid.addEventListener("transitionend", handleTransitionEnd);

    sliderContainer.addEventListener("touchstart", handleTouchStart);
    sliderContainer.addEventListener("touchmove", handleTouchMove);
    sliderContainer.addEventListener("touchend", handleTouchEnd);

    startAutoplay();
    sliderContainer.addEventListener("mouseenter", stopAutoplay);
    sliderContainer.addEventListener("mouseleave", startAutoplay);

    updatePagination();
  }

  function moveToSlide() {
    isTransitioning = true;
    grid.classList.add("id4-guide-cg-noi-gi-is-transitioning");
    grid.style.transform = `translateX(-${currentIndex * 100}%)`;
    updatePagination();
  }

  function moveToNext() {
    currentIndex++;
    moveToSlide();
  }

  function moveToPrev() {
    currentIndex--;
    moveToSlide();
  }

  function handleTransitionEnd() {
    isTransitioning = false;
    if (currentIndex === 0) {
      grid.classList.remove("id4-guide-cg-noi-gi-is-transitioning");
      currentIndex = originalItems.length;
      grid.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
    if (currentIndex === originalItems.length + 1) {
      grid.classList.remove("id4-guide-cg-noi-gi-is-transitioning");
      currentIndex = 1;
      grid.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
  }

  function updatePagination() {
    let activeIndex = currentIndex - 1;
    if (currentIndex === 0) {
      activeIndex = originalItems.length - 1;
    } else if (currentIndex === originalItems.length + 1) {
      activeIndex = 0;
    }

    const dots = paginationContainer.querySelectorAll(
      ".id4-guide-cg-noi-gi-dot"
    );
    dots.forEach((dot, index) => {
      dot.classList.toggle("id4-guide-cg-noi-gi-active", index === activeIndex);
    });
  }

  function startAutoplay() {
    stopAutoplay();
    autoPlayInterval = setInterval(() => {
      if (!isTransitioning) moveToNext();
    }, AUTOPLAY_DELAY);
  }

  function stopAutoplay() {
    clearInterval(autoPlayInterval);
  }

  function resetAutoplay() {
    stopAutoplay();
    startAutoplay();
  }

  function destroySlider() {
    stopAutoplay();

    const newNextBtn = nextBtn.cloneNode(true);
    nextBtn.parentNode.replaceChild(newNextBtn, nextBtn);
    const newPrevBtn = prevBtn.cloneNode(true);
    prevBtn.parentNode.replaceChild(newPrevBtn, prevBtn);

    grid.removeEventListener("transitionend", handleTransitionEnd);
    sliderContainer.removeEventListener("mouseenter", stopAutoplay);
    sliderContainer.removeEventListener("mouseleave", startAutoplay);

    sliderContainer.removeEventListener("touchstart", handleTouchStart);
    sliderContainer.removeEventListener("touchmove", handleTouchMove);
    sliderContainer.removeEventListener("touchend", handleTouchEnd);

    grid.innerHTML = "";
    originalItems.forEach((item) => grid.appendChild(item));
    paginationContainer.innerHTML = "";

    grid.style.transform = "";
    grid.classList.remove("id4-guide-cg-noi-gi-is-transitioning");
  }

  const mobileMediaQuery = window.matchMedia("(max-width: 767px)");

  function handleDeviceChange(e) {
    if (e.matches) {
      if (!sliderInitialized) {
        setupSlider();
        sliderInitialized = true;
      }
    } else {
      if (sliderInitialized) {
        destroySlider();
        sliderInitialized = false;
      }
    }
  }

  mobileMediaQuery.addEventListener("change", handleDeviceChange);
  handleDeviceChange(mobileMediaQuery);
});

document.addEventListener("DOMContentLoaded", function () {
  function animateCounter(element, duration = 2000) {
    const target = +element.getAttribute("data-target");
    if (isNaN(target)) return;
    let current = 0;
    const increment = target / (duration / 16);

    const updateCounter = () => {
      current += increment;
      if (current < target) {
        element.innerText = Math.ceil(current).toLocaleString("en-US");
        requestAnimationFrame(updateCounter);
      } else {
        element.innerText = target.toLocaleString("en-US");
      }
    };

    requestAnimationFrame(updateCounter);
  }

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const counters = entry.target.querySelectorAll(
            ".id4-stats-counter__number"
          );
          counters.forEach((counter) => {
            if (!counter.hasAttribute("data-animated")) {
              animateCounter(counter);
              counter.setAttribute("data-animated", "true");
            }
          });

          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.1,
    }
  );

  const counterSection = document.querySelector(".id4-stats-counter");
  if (counterSection) {
    observer.observe(counterSection);
  }
});
