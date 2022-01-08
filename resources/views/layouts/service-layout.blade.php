<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Services</title>

    <link rel="icon" href="/img/logo/icon.svg" type="image/icon type">
    <!-- MDB -->
    <link href="/css/mdb/mdb.min.css" rel="stylesheet" />
    <!-- swiper -->
    <link rel="stylesheet" href="/css/swiperjs/swiper-bundle.min.css" />
     <!-- Style -->
    <link rel="stylesheet" href="/css/services.css" />
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
        $(document).ready(function(){
        $('.filter-button').click(function(){
            // reset active class
            $('.filter-button').removeClass("active");
            // add active class to selected
            $(this).addClass("active");
            // return needed to make function work
            return false;
        });
        
        
        $(function() {
            // create an empty variable
            var selectedClass = "";
            // call function when item is clicked
            $(".filter-button").click(function(){
                // assigns class to selected item
                selectedClass = $(this).attr("data-rel");
                // fades out all portfolio items
                $(".filter-content").fadeOut(0);
                // fades in selected category
                $(".filter-content." + selectedClass).fadeIn(500);
            });
        });
    
    }); // document ready
    </script>

    <script>
        var swiper = new Swiper('.service-slide-button .swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            observer: true,
            observeParents: true,
            centeredSlides: true,
            slidesPerView: 2,
            spaceBetween: 20,

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            keyboard: {
                enabled: true,
                onlyInViewport: false,
            },

            breakpoints: {
                280: {
                    slidesPerView: 1,
                    spaceBetween: 5,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 5,
                },
                360: {
                    slidesPerView: 1,
                    spaceBetween: 5,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 5,
                },
                712: {
                    slidesPerView: 1.2,
                    spaceBetween: 5,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                1500: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            }
        });

        var swiper = new Swiper('#banner-image .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: false,
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