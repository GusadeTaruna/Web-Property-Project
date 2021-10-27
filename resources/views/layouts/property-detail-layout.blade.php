<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Single</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- MDB -->
    <link href="/css/mdb/mdb.min.css" rel="stylesheet" />
    <!-- swiper -->
    <link rel="stylesheet" href="/css/swiperjs/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/multiselect/bootstrap-multiselect.css" type="text/css"/>
     <!-- Style -->
    <link rel="stylesheet" href="/css/product-single.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>

    @yield('content')

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Listing inquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form method="POST" action="{{ route('inquiry.send') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @if(session('inquiry'))
                            <p>Your inquiry list : 
                            @foreach(session('inquiry') as $id => $details)
                                @if( !$loop->last)
                                    <span class="text-success">{{ $details['name'] }}, </span>
                                @else
                                    <span class="text-success">{{ $details['name'] }} </span>
                                @endif
                                <input type="hidden" name="list[]" value="{{ $details['name'] }}">
                            @endforeach
                            </p>
                        @endif
                        <label for="name">Name :</label>
                        <input type="text" class="form-control mb-2" placeholder="Input your name here" name="name">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control mb-2" placeholder="Input your email here" name="email">
                        <label for="name">Phone :</label>
                        <input type="phone" class="form-control mb-2" placeholder="Input your phone number here" name="phone">
                        <label for="country">Country :</label>
                        <input type="text" class="form-control mb-2" placeholder="Input your country here" name="country">
                        <label for="message">Message :</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Enter your messages here..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-inquiry">Save changes</button>
                    </div>
                </form>
            </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- swiper -->
    <script type="text/javascript" src="/js/multiselect/bootstrap-multiselect.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="/js/product-listing.js"></script>
    <!-- Initialize the plugin: -->

    <script>
        var swiper = new Swiper('#image-slider .swiper', {
            // Optional parameters
            loop: true,
            slidesPerView: 4,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 4000,
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
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2.5,
                    spaceBetween: 3,
                },
            }
        });
    </script>

    <script>
        $(".readmore-link").click( function(e) {
        // record if our text is expanded
        var isExpanded =  $(e.target).hasClass("expand");
        
        //close all open paragraphs
        $(".readmore.expand").removeClass("expand");
        $(".readmore-link.expand").removeClass("expand");
        
        // if target wasn't expand, then expand it
        if (!isExpanded){
            $( e.target ).parent( ".readmore" ).addClass( "expand" );
            $(e.target).addClass("expand");  
        } 
        });

    </script>

</body>
</html>