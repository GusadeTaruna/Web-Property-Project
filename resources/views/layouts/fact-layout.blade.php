<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta name="viewport" content="width=device-width, user-scalable=false;">
    <title>Facts Page</title>

    <link rel="icon" href="/img/logo/logo-1.svg" type="image/icon type">
    <!-- MDB -->
    <link href="/css/mdb/mdb.min.css" rel="stylesheet" />
    <!-- swiper -->
    <link rel="stylesheet" href="/css/swiperjs/swiper-bundle.min.css" />
     <!-- Style -->
    <link rel="stylesheet" href="/css/blog.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>

    @yield('content')

    <!-- Jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <!-- Bootstrap core Javascript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- swiper -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script type="text/javascript" src="/js/jquery.easeScroll.js"></script>
    
    {{-- <script>
        $("html").easeScroll();
    </script> --}}

    <script>
        var swiper = new Swiper('#about-slider .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: true,
            },
        });

        var swiper = new Swiper('#agent-slider .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: true,
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
    
            breakpoints: {
                280: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                360: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            }
        });

        var swiper = new Swiper('#banner-image .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: true,
            slidesPerView: 1,
            centeredSlides: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
        });
    </script>


</body>
</html>