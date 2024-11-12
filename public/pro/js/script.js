window.addEventListener("scroll", () => {
    const navbar = document.querySelector("nav");
    const navLinks = navbar.querySelectorAll('.nav-menu li a');
    const scrollThreshold = 50; // กำหนดระยะที่ต้องการให้เปลี่ยนพื้นหลัง

    if (window.scrollY > scrollThreshold) {
        // เมื่อเลื่อนลง ให้เพิ่มคลาสพื้นหลัง
        navbar.classList.add('scrolled');
        navLinks.forEach(link => link.style.color = "#fff"); // เปลี่ยนสีของลิงค์เมื่อเลื่อน
    } else {
        // เมื่ออยู่ด้านบนสุด ให้เอาพื้นหลังออก
        navbar.classList.remove('scrolled');
        navLinks.forEach(link => link.style.color = "#fff"); // สีลิงค์ตอนโปร่งใส
    }
});


// Fade-in Effect for About Section
document.addEventListener("DOMContentLoaded", () => {
    const aboutSection = document.querySelector('#About');
    const aboutImage = document.querySelector('.about-img');
    const observerOptions = { threshold: 0.1 };

    // ใช้ IntersectionObserver เพื่อแสดงผลเมื่อเข้าสู่หน้าจอ
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                aboutSection.classList.add('about-section-visible');
                aboutImage.classList.add('visible');
            }
        });
    }, observerOptions);

    observer.observe(aboutSection); // เริ่มการตรวจสอบการเลื่อน
});

// Menu Group Slider
function initializeSlider(slider, prevBtn, nextBtn) {
    const sliderItems = slider.querySelectorAll('.menu-group-item-col');
    if (!sliderItems.length) return;

    let currentIndex = 0;
    const itemWidth = sliderItems[0].offsetWidth + 20;

    // ฟังก์ชันอัพเดทตำแหน่งของสไลเดอร์
    function updateSliderPosition() {
        slider.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
    }

    nextBtn.addEventListener('click', () => {
        if (currentIndex < sliderItems.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateSliderPosition();
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = sliderItems.length - 1;
        }
        updateSliderPosition();
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const sliders = document.querySelectorAll('.slider');
    sliders.forEach(slider => {
        const sliderId = slider.getAttribute('data-slider-id');
        const prevBtn = document.querySelector(`.prevBtn[data-slider-id="${sliderId}"]`);
        const nextBtn = document.querySelector(`.nextBtn[data-slider-id="${sliderId}"]`);

        if (prevBtn && nextBtn) {
            initializeSlider(slider, prevBtn, nextBtn);
        }
    });
});
