    console.log('eh cuk')
    let currentIndex = 0;
    const slides = document.querySelector(".carousel-slide");
    const dots = document.querySelectorAll(".dot");

    function moveSlide(index) {
        currentIndex = index;
        slides.style.transform = `translateX(${-index * 100}%)`;
        updateDots();
    }

    function updateDots() {
        dots.forEach((dot) => dot.classList.remove("active"));
        dots[currentIndex].classList.add("active");
    }
