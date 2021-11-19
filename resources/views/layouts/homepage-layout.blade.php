<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- MDB -->
    <link href="/css/mdb/mdb.min.css" rel="stylesheet" />
    <!-- swiper -->
    <link rel="stylesheet" href="/css/swiperjs/swiper-bundle.min.css" />
     <!-- Style -->
    <link rel="stylesheet" href="/css/homepage.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    {{-- jquery --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

</head>

<body>

    @yield('content')

    {{-- Advanced Search Modal --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Advanced Search</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form" method="get" action="{{ route('search.property') }}">
                <div class="modal-body">
                    <select name="type" id="select-type" class="custom-select mb-3">
                        <option selected disabled>Property Type</option>
                        <option value="1">Property Building</option>
                        <option value="2">Land</option>
                    </select>
                    <input type="text" name="code" id="code" placeholder="Property Code" class="form-control mb-3">
                    <input type="text" name="location" id="location" placeholder="Location area" class="form-control mb-3">
                    <label for="price" class="text-center" style="font-weight: bold; width:100%">Price range:</label>
                    <input type="hidden" name="minPrice" id="minPrice">
                    <input type="hidden" name="maxPrice" id="maxPrice">
                    <input type="text" name="" class="text-center mb-3" id="amount" readonly style="border:0; color:#a5876a; font-weight:bold;width:100%;">
                    <div id="slider-range" class="mb-4"></div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-theme w-100" id="search-btn" >Search</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    {{-- Advanced Search Modal --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
        var swiper = new Swiper('#property-slider .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: false,
            slidesPerView: 4,
            spaceBetween: 30,
            centeredSlides: true,
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            keyboard: {
                enabled: true,
                onlyInViewport: false,
            },
            autoplay: {
                delay: 2000,
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
                    slidesPerView: 1.5,
                    spaceBetween: 10,
                },
                712: {
                    slidesPerView: 1.5,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 2.5,
                    spaceBetween: 10,
                },
                1500: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }
        });
    
        var swiper = new Swiper('#hero-banner .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: false,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper('#about-section .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: false,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper('#testimonial-slider .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper('#work-section .swiper', {
            // Optional parameters
            observer: true,
            observeParents: true,
            loop: false,
            slidesPerView: 2,
            spaceBetween: 30,
            centeredSlides: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            keyboard: {
                enabled: true,
                onlyInViewport: false,
            },
            autoplay: {
                delay: 2000,
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
                    slidesPerView: 1.5,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 30,
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

    <script>
        $( function() {
            // Create our number formatter.
            var formatter = new Intl.NumberFormat('id-ID', {

              // These options are needed to round to whole numbers if that's what you want.
              minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
              maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
            });
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 1000000,
                values: [ 0, 90000 ],
                slide: function( event, ui ) {
                    $("#minPrice").val(ui.values[0]);
                    $("#maxPrice").val(ui.values[1]);
                    $( "#amount" ).val( "USD " + formatter.format(ui.values[ 0 ]) + " - USD " + formatter.format(ui.values[ 1 ]));
                }
            });
            $( "#amount" ).val("Move the slider below");
        } );
    </script>

    <script>
        function success() {
         if(document.getElementById("location").value==="") { 
                document.getElementById('search-btn').disabled = true; 
            } else { 
                document.getElementById('search-btn').disabled = false;
            }
        }
    </script>

    <script>
        $(document).ready(function () {
          $('#select-type').val("0");
          
          $('#select-type').change(function () {
            selectVal = $('#select-type').val();
           
            if (selectVal == 0) {
               $('#search-btn').prop("disabled", true);
            }
            else {
              $('#search-btn').prop("disabled", false);
            }
          })
          
        });
    </script>
</body>
</html>