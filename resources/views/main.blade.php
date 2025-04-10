<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Nimara Catering &#8211; Delight in every bite, Elegance in every Moment">
    <title>Nimara Catering</title>

    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" id="blocksy-fonts-font-source-google-css" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;600;700&#038;display=swap" media="all" />

    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/css/color.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/css/typography.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/css/layout.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/css/custom.css" rel="stylesheet" />
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
            <li><i class="fas fa-home"></i><a href="#/" class="nav-link" data-url="home">Beranda</a></li>
            <li><i class="fas fa-info-circle"></i><a href="#/about" class="nav-link" data-url="about">Tentang Nimara</a></li>
            <li><i class="fas fa-book"></i><a href="#/menu" class="nav-link" data-url="menu">Menu</a></li>
            <li><i class="fas fa-newspaper"></i><a href="#/news" class="nav-link" data-url="news">Artikel</a></li>
            <li><i class="fas fa-headset"></i><a href="#/contact" class="nav-link" data-url="contact">Nimara Care</a></li>
        </ul>
    </div>

    <div id="content">
        <div class="wrapper">
            <main>
                <div id="app"></div>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/')}}/plugins/jquery.min.js"></script>
    <script src="{{asset('assets/js/')}}/config.js"></script>
    <script src="{{asset('assets/js/')}}/constants.js"></script>
    <script src="{{asset('assets/js/')}}/global.js"></script>
    <script src="{{asset('assets/js/')}}/router.js"></script>
    <script src="{{asset('assets/js/')}}/app.js"></script>
    <script src="{{asset('assets/js/')}}/custom.js"></script>

    <script>
        $("body").append('<div id="loading-screen"><div class="spinner"></div></div>');

        $(".nav-link").click(function(e) {
            $("#loading-screen").css("display", "flex").hide().fadeIn(200);

            // Tutup menu navigasi
            $("#close-btn").trigger("click");

            setTimeout(function() {
                $("#loading-screen").fadeOut(200, function() {
                    $(this).css("display", "none");
                });
            }, 300);
        });
    </script>

</body>

</html>