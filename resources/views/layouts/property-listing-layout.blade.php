<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listing</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- MDB -->
    <link href="/css/mdb/mdb.min.css" rel="stylesheet" />
    <!-- swiper -->
    <link rel="stylesheet" href="/css/swiperjs/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/multiselect/bootstrap-multiselect.css" type="text/css"/>
     <!-- Style -->
    <link rel="stylesheet" href="/css/product-listing.css" />
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
                            <span class="text-success">[{{ $details['code'] }}] {{ $details['name'] }}, </span>
                            @else
                                <span class="text-success">[{{ $details['code'] }}] {{ $details['name'] }} </span>
                            @endif
                            <input type="hidden" name="list[]" value="[{{ $details['code'] }}] {{ $details['name'] }}">
                        @endforeach
                        </p>
                    @else
                        <p>Your inquiry list : <span class="text-success" id="list-text"></span></p>
                        <input type="hidden" name="list" id="list" value=""/>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- swiper -->
    <script type="text/javascript" src="/js/multiselect/bootstrap-multiselect.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="/js/product-listing.js"></script>
    <script type="text/javascript" src="/js/jquery.easeScroll.js"></script>
    
    <script>
        $("html").easeScroll();
    </script>
    <!-- Initialize the plugin: -->
    <script>
        $(document).on("click", ".inquiry-btn", function () {
            var listStore = $(this).data('id');
            var listText = $(this).data('id');
            $(".modal-body #list").val( listStore );
            $(".modal-body #list-text").text( listText );
            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>

    <script>
        $( function() {
            // Create our number formatter.
            var formatter = new Intl.NumberFormat('id-ID', {
              style: 'currency',
              currency: 'IDR',

              // These options are needed to round to whole numbers if that's what you want.
              minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
              maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
            });
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 1000000,
                values: [ 0, 100 ],
                slide: function( event, ui ) {
                    $("#minPrice").val(ui.values[0]);
                    $("#maxPrice").val(ui.values[1]);
                    if (ui.values[ 0 ] == 0 && ui.values[ 1 ]==0) {
                        $('#search-btn').prop("disabled", true);
                    }else{
                        $('#search-btn').prop("disabled", false);
                    }
                    $( "#amount" ).val( "USD " + formatter.format(ui.values[ 0 ]) + " - USD " + formatter.format(ui.values[ 1 ]));
                }
            });
            $( "#amount" ).val("Move the slider below");
        } );
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

    <script>
        function successLoc() {
         if(document.getElementById("location").value==="") { 
                document.getElementById('search-btn').disabled = true; 
            } else { 
                document.getElementById('search-btn').disabled = false;
            }
        }
    </script>

    <script>
        function successCode() {
         if(document.getElementById("code").value==="") { 
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