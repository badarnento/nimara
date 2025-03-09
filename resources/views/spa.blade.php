<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nimara Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" id="blocksy-fonts-font-source-google-css"
        href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;600;700&#038;display=swap" media="all" />
    <link href="{{asset('template')}}/assets/style.css" rel="stylesheet" />
    <link href="{{asset('template')}}/assets/custom.css" rel="stylesheet" />
    <link href="{{asset('template')}}/assets/color.css" rel="stylesheet" />
    <link href="{{asset('template')}}/assets/typography.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #222;
            padding: 10px;
            color: white;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }
    </style>

    <style>
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: none;
            /* Supaya tersembunyi saat awal */
            justify-content: center;
            align-items: center;
        }

        /* Spinner */
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-top-color: #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Animasi Spinner */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-light px-3">
        <a href="javascript:void(0)"><span class="navbar-toggler border-0" id="menu-btn"><i class="fas fa-bars"></i></span></a>
        <a class="navbar-brand mx-auto" href="#">
            <img src="{{asset('template')}}/assets/nimara/logo.png" alt="Nimara" height="50" />
        </a>
    </nav>
    <div class="offcanvas-menu" id="menu">
        <span class="close-btn" id="close-btn"><i class="fas fa-arrow-left"></i></span>
        <h5 class="menu-header">Selamat Datang<br />di Nimara Catering</h5>
        <ul class="menu-list list-unstyled">
            <li><i class="fas fa-home"></i><a href="/home" class="nav-link" data-url="home">Beranda</a></li>
            <li><i class="fas fa-info-circle"></i><a href="/about" class="nav-link" data-url="about">Tentang Nimara</a></li>
            <li><i class="fas fa-book"></i><a href="/menu" class="nav-link" data-url="menu">Menu</a></li>
            <li><i class="fas fa-newspaper"></i><a href="/news" class="nav-link" data-url="news">Artikel</a></li>
            <li><i class="fas fa-headset"></i><a href="/contact" class="nav-link" data-url="contact">Nimara Care</a></li>
        </ul>
    </div>

    <div id="content">
        <div class="wrapper">
            @include('pages.' . $page) {{-- Menambahkan "pages." di sini --}}
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Tambahkan loading screen & spinner ke dalam body
            $("body").append('<div id="loading-screen"><div class="spinner"></div></div>');

            history.replaceState({
                page: "{{ $page ?? 'home' }}"
            }, "", "/{{ $page ?? 'home' }}");

            $(".nav-link").click(function(e) {
                e.preventDefault();
                let url = $(this).data("url");

                // Tampilkan loading screen
                // $("#loading-screen").fadeIn(200);
                $("#loading-screen").css("display", "flex").hide().fadeIn(200);


                // Tutup menu navigasi
                $("#close-btn").trigger("click");

                // Tunggu animasi menu sebelum memuat konten baru
                setTimeout(function() {
                    $.get(url, function(data) {
                        $("#content").html(data);
                        history.pushState({
                            page: url
                        }, "", "/" + url);

                        // Hilangkan loading screen
                        // $("#loading-screen").fadeOut(300);
                        $("#loading-screen").fadeOut(200, function() {
                            $(this).css("display", "none"); // Supaya kembali ke default setelah fadeOut
                        });
                    });
                }, 300);
            });

            window.onpopstate = function(event) {
                let url = location.pathname.substring(1); // Remove leading "/"
                if (url === "") url = "home"; // Default ke home jika kosong

                // $("#loading-screen").fadeIn(200); // Tampilkan loading screen
                $("#loading-screen").css("display", "flex").hide().fadeIn(200);

                $.get(url, function(data) {
                    $("#content").html(data);
                    // $("#loading-screen").fadeOut(300); // Hilangkan loading screen
                    $("#loading-screen").fadeOut(200, function() {
                        $(this).css("display", "none");
                    });
                });
            };
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>