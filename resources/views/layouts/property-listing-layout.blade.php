<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listing</title>
    <link rel="icon" href="/img/logo/logo-1.svg" type="image/icon type">
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
                    <label for="name">Prefered Contact Method :</label>
                    <div class="form-check">
                        <input class="form-check-input" name="contact_method[]" type="checkbox" value="Email" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Email
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="contact_method[]" type="checkbox" value="Phone" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Phone
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" name="contact_method[]" type="checkbox" value="WhatsApp" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          WhatsApp
                        </label>
                    </div>
                    <label for="country">Nationality :</label>
                    <select class="form-control mb-2" name="country">
                        <option value="" disabled selected>Choose one</option>
                        <option value="afghan">Afghan</option>
                        <option value="albanian">Albanian</option>
                        <option value="algerian">Algerian</option>
                        <option value="american">American</option>
                        <option value="andorran">Andorran</option>
                        <option value="angolan">Angolan</option>
                        <option value="antiguans">Antiguans</option>
                        <option value="argentinean">Argentinean</option>
                        <option value="armenian">Armenian</option>
                        <option value="australian">Australian</option>
                        <option value="austrian">Austrian</option>
                        <option value="azerbaijani">Azerbaijani</option>
                        <option value="bahamian">Bahamian</option>
                        <option value="bahraini">Bahraini</option>
                        <option value="bangladeshi">Bangladeshi</option>
                        <option value="barbadian">Barbadian</option>
                        <option value="barbudans">Barbudans</option>
                        <option value="batswana">Batswana</option>
                        <option value="belarusian">Belarusian</option>
                        <option value="belgian">Belgian</option>
                        <option value="belizean">Belizean</option>
                        <option value="beninese">Beninese</option>
                        <option value="bhutanese">Bhutanese</option>
                        <option value="bolivian">Bolivian</option>
                        <option value="bosnian">Bosnian</option>
                        <option value="brazilian">Brazilian</option>
                        <option value="british">British</option>
                        <option value="bruneian">Bruneian</option>
                        <option value="bulgarian">Bulgarian</option>
                        <option value="burkinabe">Burkinabe</option>
                        <option value="burmese">Burmese</option>
                        <option value="burundian">Burundian</option>
                        <option value="cambodian">Cambodian</option>
                        <option value="cameroonian">Cameroonian</option>
                        <option value="canadian">Canadian</option>
                        <option value="cape verdean">Cape Verdean</option>
                        <option value="central african">Central African</option>
                        <option value="chadian">Chadian</option>
                        <option value="chilean">Chilean</option>
                        <option value="chinese">Chinese</option>
                        <option value="colombian">Colombian</option>
                        <option value="comoran">Comoran</option>
                        <option value="congolese">Congolese</option>
                        <option value="costa rican">Costa Rican</option>
                        <option value="croatian">Croatian</option>
                        <option value="cuban">Cuban</option>
                        <option value="cypriot">Cypriot</option>
                        <option value="czech">Czech</option>
                        <option value="danish">Danish</option>
                        <option value="djibouti">Djibouti</option>
                        <option value="dominican">Dominican</option>
                        <option value="dutch">Dutch</option>
                        <option value="east timorese">East Timorese</option>
                        <option value="ecuadorean">Ecuadorean</option>
                        <option value="egyptian">Egyptian</option>
                        <option value="emirian">Emirian</option>
                        <option value="equatorial guinean">Equatorial Guinean</option>
                        <option value="eritrean">Eritrean</option>
                        <option value="estonian">Estonian</option>
                        <option value="ethiopian">Ethiopian</option>
                        <option value="fijian">Fijian</option>
                        <option value="filipino">Filipino</option>
                        <option value="finnish">Finnish</option>
                        <option value="french">French</option>
                        <option value="gabonese">Gabonese</option>
                        <option value="gambian">Gambian</option>
                        <option value="georgian">Georgian</option>
                        <option value="german">German</option>
                        <option value="ghanaian">Ghanaian</option>
                        <option value="greek">Greek</option>
                        <option value="grenadian">Grenadian</option>
                        <option value="guatemalan">Guatemalan</option>
                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                        <option value="guinean">Guinean</option>
                        <option value="guyanese">Guyanese</option>
                        <option value="haitian">Haitian</option>
                        <option value="herzegovinian">Herzegovinian</option>
                        <option value="honduran">Honduran</option>
                        <option value="hungarian">Hungarian</option>
                        <option value="icelander">Icelander</option>
                        <option value="indian">Indian</option>
                        <option value="indonesian">Indonesian</option>
                        <option value="iranian">Iranian</option>
                        <option value="iraqi">Iraqi</option>
                        <option value="irish">Irish</option>
                        <option value="israeli">Israeli</option>
                        <option value="italian">Italian</option>
                        <option value="ivorian">Ivorian</option>
                        <option value="jamaican">Jamaican</option>
                        <option value="japanese">Japanese</option>
                        <option value="jordanian">Jordanian</option>
                        <option value="kazakhstani">Kazakhstani</option>
                        <option value="kenyan">Kenyan</option>
                        <option value="kittian and nevisian">Kittian and Nevisian</option>
                        <option value="kuwaiti">Kuwaiti</option>
                        <option value="kyrgyz">Kyrgyz</option>
                        <option value="laotian">Laotian</option>
                        <option value="latvian">Latvian</option>
                        <option value="lebanese">Lebanese</option>
                        <option value="liberian">Liberian</option>
                        <option value="libyan">Libyan</option>
                        <option value="liechtensteiner">Liechtensteiner</option>
                        <option value="lithuanian">Lithuanian</option>
                        <option value="luxembourger">Luxembourger</option>
                        <option value="macedonian">Macedonian</option>
                        <option value="malagasy">Malagasy</option>
                        <option value="malawian">Malawian</option>
                        <option value="malaysian">Malaysian</option>
                        <option value="maldivan">Maldivan</option>
                        <option value="malian">Malian</option>
                        <option value="maltese">Maltese</option>
                        <option value="marshallese">Marshallese</option>
                        <option value="mauritanian">Mauritanian</option>
                        <option value="mauritian">Mauritian</option>
                        <option value="mexican">Mexican</option>
                        <option value="micronesian">Micronesian</option>
                        <option value="moldovan">Moldovan</option>
                        <option value="monacan">Monacan</option>
                        <option value="mongolian">Mongolian</option>
                        <option value="moroccan">Moroccan</option>
                        <option value="mosotho">Mosotho</option>
                        <option value="motswana">Motswana</option>
                        <option value="mozambican">Mozambican</option>
                        <option value="namibian">Namibian</option>
                        <option value="nauruan">Nauruan</option>
                        <option value="nepalese">Nepalese</option>
                        <option value="new zealander">New Zealander</option>
                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                        <option value="nicaraguan">Nicaraguan</option>
                        <option value="nigerien">Nigerien</option>
                        <option value="nigerian">Nigerian</option>
                        <option value="north korean">North Korean</option>
                        <option value="northern irish">Northern Irish</option>
                        <option value="norwegian">Norwegian</option>
                        <option value="omani">Omani</option>
                        <option value="pakistani">Pakistani</option>
                        <option value="palauan">Palauan</option>
                        <option value="panamanian">Panamanian</option>
                        <option value="papua new guinean">Papua New Guinean</option>
                        <option value="paraguayan">Paraguayan</option>
                        <option value="peruvian">Peruvian</option>
                        <option value="polish">Polish</option>
                        <option value="portuguese">Portuguese</option>
                        <option value="qatari">Qatari</option>
                        <option value="romanian">Romanian</option>
                        <option value="russian">Russian</option>
                        <option value="rwandan">Rwandan</option>
                        <option value="saint lucian">Saint Lucian</option>
                        <option value="salvadoran">Salvadoran</option>
                        <option value="samoan">Samoan</option>
                        <option value="san marinese">San Marinese</option>
                        <option value="sao tomean">Sao Tomean</option>
                        <option value="saudi">Saudi</option>
                        <option value="scottish">Scottish</option>
                        <option value="senegalese">Senegalese</option>
                        <option value="serbian">Serbian</option>
                        <option value="seychellois">Seychellois</option>
                        <option value="sierra leonean">Sierra Leonean</option>
                        <option value="singaporean">Singaporean</option>
                        <option value="slovakian">Slovakian</option>
                        <option value="slovenian">Slovenian</option>
                        <option value="solomon islander">Solomon Islander</option>
                        <option value="somali">Somali</option>
                        <option value="south african">South African</option>
                        <option value="south korean">South Korean</option>
                        <option value="spanish">Spanish</option>
                        <option value="sri lankan">Sri Lankan</option>
                        <option value="sudanese">Sudanese</option>
                        <option value="surinamer">Surinamer</option>
                        <option value="swazi">Swazi</option>
                        <option value="swedish">Swedish</option>
                        <option value="swiss">Swiss</option>
                        <option value="syrian">Syrian</option>
                        <option value="taiwanese">Taiwanese</option>
                        <option value="tajik">Tajik</option>
                        <option value="tanzanian">Tanzanian</option>
                        <option value="thai">Thai</option>
                        <option value="togolese">Togolese</option>
                        <option value="tongan">Tongan</option>
                        <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                        <option value="tunisian">Tunisian</option>
                        <option value="turkish">Turkish</option>
                        <option value="tuvaluan">Tuvaluan</option>
                        <option value="ugandan">Ugandan</option>
                        <option value="ukrainian">Ukrainian</option>
                        <option value="uruguayan">Uruguayan</option>
                        <option value="uzbekistani">Uzbekistani</option>
                        <option value="venezuelan">Venezuelan</option>
                        <option value="vietnamese">Vietnamese</option>
                        <option value="welsh">Welsh</option>
                        <option value="yemenite">Yemenite</option>
                        <option value="zambian">Zambian</option>
                        <option value="zimbabwean">Zimbabwean</option>
                    </select>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- swiper -->
    <script type="text/javascript" src="/js/multiselect/bootstrap-multiselect.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="/js/product-listing.js"></script>
    <script type="text/javascript" src="/js/jquery.easeScroll.js"></script>
    
    {{-- <script>
        $("html").easeScroll();
    </script> --}}
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

              // These options are needed to round to whole numbers if that's what you want.
              minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
              maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
            });
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 1000000,
                values: [ 0, 200000 ],
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

    <script>
        $(document).ready(function () {
            
            $("#filter_by").change(function(){
                $("#formRecent").submit();
                // alert("Hello! I am an alert box!!");
            });
        });
    </script>

</body>
</html>