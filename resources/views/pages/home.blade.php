<div class="container">
    <div class="search-bar">
        <i class="fas fa-search"></i>
        <input type="text" class="form-control" placeholder="Search" />
    </div>

    <div class="carousel-container">
        <div class="carousel-slide">
            <img src="{{asset('template')}}/assets/nimara/banner1.png" class="d-block" alt="Promo 1" />
            <img src="{{asset('template')}}/assets/nimara/banner2.jpg" class="d-block" alt="Promo 1" />
            <img src="{{asset('template')}}/assets/nimara/banner3.jpg" class="d-block" alt="Promo 1" />
        </div>
    </div>
    <div class="dots-container">
        <span class="dot active" onclick="moveSlide(0)"></span>
        <span class="dot" onclick="moveSlide(1)"></span>
        <span class="dot" onclick="moveSlide(2)"></span>
    </div>

    <div class="menu-section">
        <h5>Tema Menu</h5>
        <div class="row">
            <div class="col-6">
                <div class="menu-card">Rasa Asli Indonesia</div>
            </div>
            <div class="col-6">
                <div class="menu-card">World on a Plate</div>
            </div>
        </div>
        <h5 class="mt-3">Pilihan Menu</h5>
        <div class="row">
            <div class="col-6">
                <div class="menu-card">Prasmanan Istimewa</div>
            </div>
            <div class="col-6">
                <div class="menu-card">Nasi Box Andalan</div>
            </div>
            <div class="col-6 mt-2">
                <div class="menu-card">Cemilan Lezat</div>
            </div>
            <div class="col-6 mt-2">
                <div class="menu-card">Gubukan Rasa</div>
            </div>
            <div class="col-6 mt-2">
                <div class="menu-card">Tumpeng Nusantara</div>
            </div>
            <div class="col-6 mt-2">
                <div class="menu-card">Suguhan Manis</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-4">
            <div class="p-4 rounded-4 text-center bg-dark text-white">
                <h4 class="fw-bold text-warning">Diskon Spesial Menanti Anda!</h4>
                <p class="mb-3 font-size-12">
                    Ingin menghadirkan hidangan istimewa dengan harga hemat? Ini saatnya! <br>
                    Kami siapkan <span class="fw-bold text-uppercase">DISKON SPESIAL</span> hanya untuk Anda
                    yang mengisi data sekarang.
                </p>
                <a href="#" class="btn btn-warning fw-bold px-4 py-2 rounded-pill font-size-14">
                    Dapatkan Sekarang <span class="ms-2">→</span>
                </a>
            </div>
        </div>
    </div>
    <div class="spacer-30">&nbsp;</div>

</div>
<section class="best-deals bg-light-blue">

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold">Desember Best Deals</h4>
            <a href="#" class="text-primary text-decoration-none fw-semibold">Lihat Semua</a>
        </div>
        <div class="row g-3">
            <!-- Card 1 -->
            <div class="col-6">
                <div class="card deals border-0 shadow-sm rounded-4 d-flex flex-column h-100">
                    <img src="{{asset('template')}}/assets/nimara/deals1.jpg" class="card-img-top rounded-4" alt="Wedding Delight">
                    <div class="card-body d-flex flex-column h-100">
                        <p class="text-primary fw-semibold mb-1">200 Pax</p>
                        <h6 class="fw-bold">Wedding Delight Deal</h6>
                        <p class="text-decoration-line-through text-muted small">Rp 20.000.000</p>
                        <p class="text-primary fw-bold fs-5 mt-auto">Rp 18.375.000</p>
                        <div class="text-end mt-auto">
                            <a href="#" class="btn btn-primary rounded-circle align-items-center border-0"
                                style="width: 48px; height: 48px;background:url('/template/assets/nimara/arrow.png') !important; background-size: cover !important;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-6">
                <div class="card deals border-0 shadow-sm rounded-4 d-flex flex-column h-100">
                    <img src="{{asset('template')}}/assets/nimara/deals2.jpg" class="card-img-top rounded-4" alt="Corporate Meeting">
                    <div class="card-body d-flex flex-column h-100">
                        <p class="text-primary fw-semibold mb-1">300 Pax</p>
                        <h6 class="fw-bold">Corporate Meeting</h6>
                        <p class="text-decoration-line-through text-muted small">Rp 12.500.000</p>
                        <p class="text-primary fw-bold fs-5 mt-auto">Rp 9.750.000</p>
                        <div class="text-end mt-auto">
                            <a href="#" class="btn btn-primary rounded-circle align-items-center border-0"
                                style="width: 48px; height: 48px;background:url('/template/assets/nimara/arrow.png') !important; background-size: cover !important;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-6">
                <div class="card deals border-0 shadow-sm rounded-4 d-flex flex-column h-100">
                    <img src="{{asset('template')}}/assets/nimara/deals3.jpg" class="card-img-top rounded-4" alt="Family Feast Package">
                    <div class="card-body d-flex flex-column h-100">
                        <p class="text-primary fw-semibold mb-1">50 Pax</p>
                        <h6 class="fw-bold">Family Feast Package</h6>
                        <p class="text-decoration-line-through text-muted small">Rp 1.750.000</p>
                        <p class="text-primary fw-bold fs-5 mt-auto">Rp 1.250.000</p>
                        <div class="text-end mt-auto">
                            <a href="#" class="btn btn-primary rounded-circle align-items-center border-0"
                                style="width: 48px; height: 48px;background:url('/template/assets/nimara/arrow.png') !important; background-size: cover !important;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-6">
                <div class="card deals border-0 shadow-sm rounded-4 d-flex flex-column h-100">
                    <img src="{{asset('template')}}/assets/nimara/deals4.jpg" class="card-img-top rounded-4" alt="Menu Box Combo">
                    <div class="card-body d-flex flex-column h-100">
                        <p class="text-primary fw-semibold mb-1">100 Pax</p>
                        <h6 class="fw-bold">Menu Box Combo</h6>
                        <p class="text-decoration-line-through text-muted small">Rp 2.500.000</p>
                        <p class="text-primary fw-bold fs-5 mt-auto">Rp 2.000.000</p>
                        <div class="text-end mt-auto">
                            <a href="#" class="btn btn-primary rounded-circle align-items-center border-0"
                                style="width: 48px; height: 48px;background:url('/template/assets/nimara/arrow.png') !important; background-size: cover !important;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<div class="spacer-30">&nbsp;</div>
<section class="product">
    <div class="spacer-30">&nbsp;</div>
    <div class="spacer-30">&nbsp;</div>
    <div class="spacer-30">&nbsp;</div>
    <div class="spacer-30">&nbsp;</div>
    <div class="spacer-30">&nbsp;</div>
    <div class="spacer-30">&nbsp;</div>
    <div class="spacer-30">&nbsp;</div>
    <div class="spacer-30">&nbsp;</div>

</section>



<script>
    const menu = document.getElementById("menu");
    const menuBtn = document.getElementById("menu-btn");
    const closeBtn = document.getElementById("close-btn");

    menuBtn.addEventListener("click", () => {
        menu.classList.add("active");
    });
    closeBtn.addEventListener("click", () => {
        menu.classList.remove("active");
    });

    let startX = 0;
    menu.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
    });
    menu.addEventListener("touchmove", (e) => {
        let moveX = e.touches[0].clientX;
        if (startX - moveX > 50) {
            menu.classList.remove("active");
        }
    });
</script>

<script>
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
</script>