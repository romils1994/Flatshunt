<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="asd.jpg">
    <title>List Your Property FOR RENT at FLATSHUNT...</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nouislider.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/dropify.css">
    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="font/material-design-icons/Material-Design-Icons.woff2">
    <link rel="stylesheet" href="fonts/materialdesignicons-webfont.woff2">
    <link rel="stylesheet" href="css/materialdesignicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
    #rent_map {
        height: 100%;
    }
    </style>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAB9itOCse1a9IYHHNbYd0MDPw_ZzZTc90&libraries=places&region=uk&language=en"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/dropify.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    var map;
    var marker;
    var myLatlng = new google.maps.LatLng(22.2892572,79.8907553);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    function initialize() {

        var map_options = {
            center: myLatlng,
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('rent_map'),map_options);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map:map,
            draggable:true,
            animation: google.maps.Animation.BOUNCE,
            icon:'images/home_marker.png',
        });
        var city_options = {
            types: ['(cities)'],
            componentRestrictions: {country: "in"}
        }
        var locality_options = {
            componentRestrictions: {country:"in"}
        }
        var city = new google.maps.places.Autocomplete(document.getElementById('rent_city'),city_options);
        var locality = new google.maps.places.Autocomplete(document.getElementById('rent_locality'),locality_options);
        locality.bindTo('bounds',map);
        google.maps.event.addListener(city,'place_changed',function(){
            var place = city.getPlace();
            var bounds = new google.maps.LatLngBounds();
            console.log(place.geometry,location);
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
            map.fitBounds(bounds);
            map.setZoom(15);
            marker.setAnimation(google.maps.Animation.DROP);
        });
        google.maps.event.addListener(locality,'place_changed',function(){
            var place = locality.getPlace();
            var bounds = new google.maps.LatLngBounds();
            console.log(place.geometry.location);
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
            map.fitBounds(bounds);
            map.setZoom(17);
            marker.setAnimation(google.maps.Animation.DROP);
            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#rent_latitude,#rent_longitude').show();
                    $('#rent_address').val(results[0].formatted_address);
                    $('#rent_latitude').val(marker.getPosition().lat());
                    $('#rent_longitude').val(marker.getPosition().lng());
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });
        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#rent_address').val(results[0].formatted_address);
                        $('#rent_latitude').val(marker.getPosition().lat());
                        $('#rent_longitude').val(marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
        });
    };
    google.maps.event.addDomListener(window, "load", initialize); 

    $(document).ready(function(){
        $('.dropify').dropify({
            messages: {
                'default': "<p class='center'>Upload Image of the Room</p>",
            }
        });

        var wrapper         = $("#input_room"); //Fields wrapper
        var add_button      = $("#add_room"); //Add button ID
    
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            $(wrapper).append('<div id="other_room"><div class="row"><div class="col m9 s9"><input type="hidden" name="house[]" value="Other Room'+x+'" id="other_room'+x+'"><label for="image_room'+x+'" class="flow-text">Other Room'+x+' Image</label><input type="file" class="dropify" accept="image/*" data-height="100" id="image_room'+x+'" name="rent_image[]"></div><div class="input-field col m3 s3"><input type="text" id="room_area'+x+'" name="rent_area[]" class="areas"><label for="room_area'+x+'">Area of Room'+x+'</label></div></div><div align="right"><a class="btn-floating waves-effect waves-light" href="#" id="remove_room" title="Remove Room" align="right"><i class="large mdi-content-remove"></i></a></div></div>'); //add input box
            x++; //text box increment
            $('.dropify').dropify({
                messages: {
                    'default': "<p class='center'>Upload Image of the Room</p>",
                }
            });
            $('.areas').keyup(function () {
                var sum = 0;
                $('.areas').each(function() {
                    sum += Number($(this).val());
                    $('#rent_total_area').attr("value",sum);
                });     
            });
        });
    
        $(wrapper).on("click","#remove_room", function(e){ //user click on remove text
            e.preventDefault(); 
            $(this).parents('div#other_room').remove(); 
            x--;
        });
        
        $('#rent_rooms').change(function(){
            var selection = $(this).val();
            switch(selection){
                case "1 RK":
                    $("#1_RK").show()
                    $("#1_BHK").hide()
                    $("#2_BHK").hide()
                    $("#3_BHK").hide()
                    $("#4_BHK").hide()
                    $("#5_BHK").hide()
                    $("#image_living").attr("required","required");
                    $("#image_kitchen").attr("required","required");
                    $("#living").removeAttr("disabled","disabled");
                    $("#image_living").removeAttr("disabled","disabled");
                    $("#living_area").removeAttr("disabled","disabled");
                    $("#kitchen").removeAttr("disabled","disabled");
                    $("#image_kitchen").removeAttr("disabled","disabled");
                    $("#kitchen_area").removeAttr("disabled","disabled");
                    $("#add_room").show()
                    $('.dropify').dropify();
                    break;
                case "1 BHK":
                    $("#1_RK").show()
                    $("#1_BHK").show()
                    $("#2_BHK").hide()
                    $("#3_BHK").hide()
                    $("#4_BHK").hide()
                    $("#5_BHK").hide()
                    $("#image_living").attr("required","required");
                    $("#image_kitchen").attr("required","required");
                    $("#image_bedroom1").attr("required","required");
                    $("#living").removeAttr("disabled","disabled");
                    $("#image_living").removeAttr("disabled","disabled");
                    $("#living_area").removeAttr("disabled","disabled");
                    $("#kitchen").removeAttr("disabled","disabled");
                    $("#image_kitchen").removeAttr("disabled","disabled");
                    $("#kitchen_area").removeAttr("disabled","disabled");
                    $("#bedroom1").removeAttr("disabled","disabled");
                    $("#image_bedroom1").removeAttr("disabled","disabled");
                    $("#bedroom1_area").removeAttr("disabled","disabled");
                    $("#add_room").show()
                    $('.dropify').dropify();
                    break;
                case "2 BHK":
                    $("#1_RK").show()
                    $("#1_BHK").show()
                    $("#2_BHK").show()
                    $("#3_BHK").hide()
                    $("#4_BHK").hide()
                    $("#5_BHK").hide()
                    $("#image_living").attr("required","required");
                    $("#image_kitchen").attr("required","required");
                    $("#image_bedroom1").attr("required","required");
                    $("#image_bedroom2").attr("required","required");
                    $("#living").removeAttr("disabled","disabled");
                    $("#image_living").removeAttr("disabled","disabled");
                    $("#living_area").removeAttr("disabled","disabled");
                    $("#kitchen").removeAttr("disabled","disabled");
                    $("#image_kitchen").removeAttr("disabled","disabled");
                    $("#kitchen_area").removeAttr("disabled","disabled");
                    $("#bedroom1").removeAttr("disabled","disabled");
                    $("#image_bedroom1").removeAttr("disabled","disabled");
                    $("#bedroom1_area").removeAttr("disabled","disabled");
                    $("#bedroom2").removeAttr("disabled","disabled");
                    $("#image_bedroom2").removeAttr("disabled","disabled");
                    $("#bedroom2_area").removeAttr("disabled","disabled");
                    $("#add_room").show()
                    $('.dropify').dropify();
                    break;
                case "3 BHK":
                    $("#1_RK").show()
                    $("#1_BHK").show()
                    $("#2_BHK").show()
                    $("#3_BHK").show()
                    $("#4_BHK").hide()
                    $("#5_BHK").hide()
                    $("#image_living").attr("required","required");
                    $("#image_kitchen").attr("required","required");
                    $("#image_bedroom1").attr("required","required");
                    $("#image_bedroom2").attr("required","required");
                    $("#image_bedroom3").attr("required","required");
                    $("#living").removeAttr("disabled","disabled");
                    $("#image_living").removeAttr("disabled","disabled");
                    $("#living_area").removeAttr("disabled","disabled");
                    $("#kitchen").removeAttr("disabled","disabled");
                    $("#image_kitchen").removeAttr("disabled","disabled");
                    $("#kitchen_area").removeAttr("disabled","disabled");
                    $("#bedroom1").removeAttr("disabled","disabled");
                    $("#image_bedroom1").removeAttr("disabled","disabled");
                    $("#bedroom1_area").removeAttr("disabled","disabled");
                    $("#bedroom2").removeAttr("disabled","disabled");
                    $("#image_bedroom2").removeAttr("disabled","disabled");
                    $("#bedroom2_area").removeAttr("disabled","disabled");
                    $("#bedroom3").removeAttr("disabled","disabled");
                    $("#image_bedroom3").removeAttr("disabled","disabled");
                    $("#bedroom3_area").removeAttr("disabled","disabled");
                    $("#add_room").show()
                    $('.dropify').dropify();
                    break;
                case "4 BHK":
                    $("#1_RK").show()
                    $("#1_BHK").show()
                    $("#2_BHK").show()
                    $("#3_BHK").show()
                    $("#4_BHK").show()
                    $("#5_BHK").hide()
                    $("#image_living").attr("required","required");
                    $("#image_kitchen").attr("required","required");
                    $("#image_bedroom1").attr("required","required");
                    $("#image_bedroom2").attr("required","required");
                    $("#image_bedroom3").attr("required","required");
                    $("#image_bedroom4").attr("required","required");
                    $("#living").removeAttr("disabled","disabled");
                    $("#image_living").removeAttr("disabled","disabled");
                    $("#living_area").removeAttr("disabled","disabled");
                    $("#kitchen").removeAttr("disabled","disabled");
                    $("#image_kitchen").removeAttr("disabled","disabled");
                    $("#kitchen_area").removeAttr("disabled","disabled");
                    $("#bedroom1").removeAttr("disabled","disabled");
                    $("#image_bedroom1").removeAttr("disabled","disabled");
                    $("#bedroom1_area").removeAttr("disabled","disabled");
                    $("#bedroom2").removeAttr("disabled","disabled");
                    $("#image_bedroom2").removeAttr("disabled","disabled");
                    $("#bedroom2_area").removeAttr("disabled","disabled");
                    $("#bedroom3").removeAttr("disabled","disabled");
                    $("#image_bedroom3").removeAttr("disabled","disabled");
                    $("#bedroom3_area").removeAttr("disabled","disabled");
                    $("#bedroom4").removeAttr("disabled","disabled");
                    $("#image_bedroom4").removeAttr("disabled","disabled");
                    $("#bedroom4_area").removeAttr("disabled","disabled");
                    $("#add_room").show()
                    $('.dropify').dropify();
                    break;
                case "4+ BHK":
                    $("#1_RK").show()
                    $("#1_BHK").show()
                    $("#2_BHK").show()
                    $("#3_BHK").show()
                    $("#4_BHK").show()
                    $("#5_BHK").show()
                    $("#image_living").attr("required","required");
                    $("#image_kitchen").attr("required","required");
                    $("#image_bedroom1").attr("required","required");
                    $("#image_bedroom2").attr("required","required");
                    $("#image_bedroom3").attr("required","required");
                    $("#image_bedroom4").attr("required","required");
                    $("#image_bedroom5").attr("required","required");
                    $("#living").removeAttr("disabled","disabled");
                    $("#image_living").removeAttr("disabled","disabled");
                    $("#living_area").removeAttr("disabled","disabled");
                    $("#kitchen").removeAttr("disabled","disabled");
                    $("#image_kitchen").removeAttr("disabled","disabled");
                    $("#kitchen_area").removeAttr("disabled","disabled");
                    $("#bedroom1").removeAttr("disabled","disabled");
                    $("#image_bedroom1").removeAttr("disabled","disabled");
                    $("#bedroom1_area").removeAttr("disabled","disabled");
                    $("#bedroom2").removeAttr("disabled","disabled");
                    $("#image_bedroom2").removeAttr("disabled","disabled");
                    $("#bedroom2_area").removeAttr("disabled","disabled");
                    $("#bedroom3").removeAttr("disabled","disabled");
                    $("#image_bedroom3").removeAttr("disabled","disabled");
                    $("#bedroom3_area").removeAttr("disabled","disabled");
                    $("#bedroom4").removeAttr("disabled","disabled");
                    $("#image_bedroom4").removeAttr("disabled","disabled");
                    $("#bedroom4_area").removeAttr("disabled","disabled");
                    $("#bedroom5").removeAttr("disabled","disabled");
                    $("#image_bedroom5").removeAttr("disabled","disabled");
                    $("#bedroom5_area").removeAttr("disabled","disabled");
                    $("#add_room").show()
                    $('.dropify').dropify();
                    break;
                default:
                    $("#1_RK").hide()
                    $("#1_BHK").hide()
                    $("#2_BHK").hide()
                    $("#3_BHK").hide()
                    $("#4_BHK").hide()
                    $("#5_BHK").hide()
                    $("#add_room").hide()
            }
        });
    });
    </script>
    <!-- Custom Theme JavaScript -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body data-spy="scroll" data-offset="0">
        <div id="loader-wrapper">
            <div id="loader"></div> 
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    <!-- Navigation -->
        <div class="fixed-action-btn horizontal click-to-toggle" style="top: 45px; right: 24px;">
            <a class="btn-floating btn-large red" id="navigation">
                <i class="large material-icons">menu</i>
            </a>
            <ul>
                <li>
                    <a class="btn-floating red tooltipped" data-position="bottom" data-delay="50" data-tooltip="HOME" href="index.php">
                        <i class="material-icons">home</i>
                    </a>
                </li>
                <li>
                    <div class="click-to-toggle">
                        <a class="btn-floating green tooltipped" id="list" data-position="top" data-delay="50" data-tooltip="LIST YOUR PROPERTY FOR" >
                            <i class="material-icons">create</i>
                        </a>
                        <ul>
                            <li>
                                <a class="btn-floating teal tooltipped" id="sell" style="display:none; top: 50px; right:-48px" data-position="right" data-delay="50" data-tooltip="SALE" href="sell.php">
                                    SALE 
                                </a>
                                 <a class="btn-floating teal tooltipped" id="rent_nav" style="display:none; top: 92px; right:-8px" data-position="right" data-delay="50" data-tooltip="RENT" href="rent.php">
                                    RENT
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="btn-floating blue tooltipped smoothScroll" data-position="bottom" data-delay="50" data-tooltip="CONTACT US" href="index.php#contact">
                        <i class="material-icons">message</i>
                    </a>
                </li>
            </ul>
        </div>
        <script>
        $("#navigation").click(function(){
            $("#sell").hide()
            $("#rent_nav").hide()
        });
        $("#list").click(function(){
            $("#sell").show()
            $("#rent_nav").show()
        });
        </script>
        <header id="top" class="sellheader">
            <div class="content">
                <div class="centered-content">
                    <div class="row">
                        <div class="col s12 m12">
                            <h1 class="white-text wow fadeIn" data-wow-delay="2s">FLATSHUNT</h1>
                            <h1 class="white-text wow fadeIn" data-wow-delay="2s">List Your Property FOR RENT</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header><br>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div id="rent" class="col s12 animated bounceInLeft">
                                        <form id="rent_form" novalidate="novalidate" name="rent_form" class="rent_form " action="" enctype="multipart/form-data">
                                            <div class="card col s12">
                                                <div class="card-content row">
                                                    <span class="card-title">Contact Details</span>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="rent_name" name="rent_name" type="text" autocomplete="off" class="validate validate[required] initialized" data-error=".errorTxt1" required="required" aria-required="true">
                                                            <label for="rent_name">Name</label>
                                                            <div class="errorTxt1 red-text left-align"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="rent_mail" name="rent_mail" type="email" autocomplete="off" class="validate validate[required] initialized" data-error=".errorTxt2" required="required" aria-required="true">
                                                            <label for="rent_mail">Email Id</label>
                                                            <div class="errorTxt2 red-text left-align"></div>
                                                        </div> 
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="rent_no" name="rent_no" type="tel" autocomplete="off" pattern="/^[0-9]\d{2,4}-\d{6,8}$/" maxlength="10" length="10" class="validate validate[required] initialized" data-error=".errorTxt3" required="required" aria-required="true">
                                                            <label for="rent_no">Contact No</label>
                                                            <div class="errorTxt3 red-text left-align"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col s12">
                                                <div class="card-content row">
                                                    <span class="card-title">Location Details</span>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="rent_city" name="rent_city" type="text" autocomplete="off" class="validate validate[required] initialized" data-error=".errorTxt4" required="required" aria-required="true" placeholder="" onfocusin="check_location()" onfocusout="check_location()">
                                                            <label for="rent_city">City</label>
                                                            <div class="errorTxt4 red-text left-align"></div>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="rent_locality" name="rent_locality" type="text" autocomplete="off" class="validate validate[required] initialized" data-error=".errorTxt5" required="required" aria-required="true" autocomplete="on" placeholder="" onfocusin="check_location()" onfocusout="check_location()">
                                                            <label for="rent_locality">Locality</label>
                                                            <div class="errorTxt5 red-text left-align"></div>
                                                            <p id="locality_error" class="red-text left-align"></p>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                    var local = document.getElementById('rent_locality');
                                                    function check_location()
                                                    {
                                                        var local = document.getElementById('rent_locality').value;
                                                        var city = document.getElementById('rent_city').value;
                                                        local = String(local);
                                                        city = String(city);
                                                        var n = local.indexOf(city);
                                                        //document.getElementById('locality_error').innerHTML = local+''+city+''+n;
                                                        if(n == -1){
                                                            document.getElementById('locality_error').innerHTML = 'This locality is not in the entered city...'
                                                            return false;
                                                        }
                                                        else{
                                                            document.getElementById('locality_error').innerHTML = '';
                                                            return true;
                                                        }
                                                        check_location();
                                                    }
                                                    </script>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="rent_address" name="rent_address" type="text" autocomplete="off" class="validate validate[required] initialized" data-error=".errorTxt6" required aria-required="true" placeholder="" required>
                                                            <label for="rent_address">Address</label>
                                                            <div class="errorTxt6 red-text left-align"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="rent_map" class="col s12" style="height:380px;"></div>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input type="hidden" id="rent_latitude" name="rent_latitude" placeholder="Latitude"/>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input type="hidden" id="rent_longitude" name="rent_longitude" placeholder="Longitude"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col s12">
                                                <div class="card-content row">
                                                    <span class="card-title">Property Details</span>
                                                    <div class="row">
                                                        <div class="input-field col s4">
                                                            <div class="select-wrapper">
                                                                <select name="rent_rooms" id="rent_rooms" class=" validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt7">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <option value="1 RK">1 RK</option>
                                                                    <option value="1 BHK">1 BHK</option>
                                                                    <option value="2 BHK">2 BHK</option>
                                                                    <option value="3 BHK">3 BHK</option>
                                                                    <option value="4 BHK">4 BHK</option>
                                                                    <option value="4+ BHK">4+ BHK</option>
                                                                </select>
                                                                <div class="errorTxt7 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_rooms">Number of Bedrooms</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <div class="select-wrapper">
                                                                <select name="rent_bath" id="rent_bath" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt8">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="4+">4+</option>
                                                                </select>
                                                                <div class="errorTxt8 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_bath">Number of Bathrooms</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <div class="select-wrapper">
                                                                <select name="rent_balcony" id="rent_balcony" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt9">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="4+">4+</option>
                                                                </select>
                                                                <div class="errorTxt9 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_balcony">Number of Balconies</label>
                                                        </div>
                                                    </div>
                                                    <div id="1_RK" style="display:none;">
                                                        <div class="row">
                                                            <div class="col m9 s9">
                                                                <input type="hidden" name="house[]" value="Living Room" id="living" disabled>
                                                                <label for="image_living" class="flow-text">Living Room Image</label>
                                                                <input type="file" class="dropify" accept="image/*" data-height="100" id="image_living" name="rent_image[]" disabled>
                                                            </div>
                                                            <div class="input-field col m3 s3">
                                                                <input type="text" id="living_area" name="rent_area[]" class="areas" disabled>
                                                                <label for="living_area">Area of Living Room</label>
                                                            </div>                                                    
                                                        </div>
                                                        <div class="row">
                                                            <div class="col m9 s9">
                                                                <input type="hidden" name="house[]" value="Kitchen" id="kitchen" disabled>
                                                                <label for="image_kitchen" class="flow-text">Kitchen Image</label>
                                                                <input type="file" class="dropify" accept="image/*" data-height="100" id="image_kitchen" name="rent_image[]" disabled>
                                                            </div>
                                                            <div class="input-field col m3 s3">
                                                                <input type="text" id="kitchen_area" name="rent_area[]" class="areas" disabled>
                                                                <label for="kitchen_area">Area of Kitchen</label>
                                                            </div>                                                    
                                                        </div>
                                                    </div>
                                                    <div class="row" id="1_BHK" style="display:none;">
                                                        <div class="col m9 s9">
                                                            <input type="hidden" name="house[]" value="Bedroom1" id="bedroom1" disabled>
                                                            <label for="image_bedroom1" class="flow-text">Bedroom1 Image</label>
                                                            <input type="file" class="dropify" accept="image/*" data-height="100" id="image_bedroom1" name="rent_image[]" disabled>
                                                        </div>
                                                        <div class="input-field col m3 s3">
                                                            <input type="text" id="bedroom1_area" name="rent_area[]" class="areas" disabled>
                                                            <label for="bedroom1_area">Area of Bedroom1</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="2_BHK" style="display:none;">
                                                        <div class="col m9 s9">
                                                            <input type="hidden" name="house[]" value="Bedroom2" id="bedroom2" disabled>
                                                            <label for="image_bedroom2" class="flow-text">Bedroom2 Image</label>
                                                            <input type="file" class="dropify" accept="image/*" data-height="100" id="image_bedroom2" name="rent_image[]" disabled>
                                                        </div>
                                                        <div class="input-field col m3 s3">
                                                            <input type="text" id="bedroom2_area" name="rent_area[]" class="areas" disabled>
                                                            <label for="bedroom2_area">Area of Bedroom2</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="3_BHK" style="display:none;">
                                                        <div class="col m9 s9">
                                                            <input type="hidden" name="house[]" value="Bedroom3" id="bedroom3" disabled>
                                                            <label for="image_bedroom3" class="flow-text">Bedroom3 Image</label>
                                                            <input type="file" class="dropify" accept="image/*" data-height="100" id="image_bedroom3" name="rent_image[]" disabled>
                                                        </div>
                                                        <div class="input-field col m3 s3">
                                                            <input type="text" id="bedroom3_area" name="rent_area[]" class="areas" disabled>
                                                            <label for="bedroom3_area">Area of Bedroom3</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="4_BHK" style="display:none;">
                                                        <div class="col m9 s9">
                                                            <input type="hidden" name="house[]" value="Bedroom4" id="bedroom4" disabled>
                                                            <label for="image_bedroom4" class="flow-text">Bedroom4 Image</label>
                                                            <input type="file" class="dropify" accept="image/*" data-height="100" id="image_bedroom4" name="rent_image[]" disabled>
                                                        </div>
                                                        <div class="input-field col m3 s3">
                                                            <input type="text" id="bedroom4_area" name="rent_area[]" class="areas" disabled>
                                                            <label for="bedroom4_area">Area of Bedroom4</label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="5_BHK" style="display:none;">
                                                        <div class="col m9 s9">
                                                            <input type="hidden" name="house[]" value="Bedroom5" id="bedroom5" disabled>
                                                            <label for="image_bedroom5" class="flow-text">Bedroom5 Image</label>
                                                            <input type="file" class="dropify" accept="image/*" data-height="100" id="image_bedroom5" name="rent_image[]" disabled>
                                                        </div>
                                                        <div class="input-field col m3 s3">
                                                            <input type="text" id="bedroom5_area" name="rent_area[]" class="areas" disabled>
                                                            <label for="bedroom5_area">Area of Bedroom5</label>
                                                        </div>
                                                    </div>
                                                    <div align="right">
                                                        <a class="btn-floating waves-effect waves-light" id="add_room" style="display:none;">
                                                            <i class="large material-icons">add</i>
                                                        </a>
                                                    </div>
                                                    <div id="input_room"></div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <input type="text" id="rent_total_area" name="rent_total_area" autocomplete="off" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt10" placeholder="">
                                                            <label for="rent_total_area">Covered Area(Sq.ft.)</label>
                                                            <div class="errorTxt10 red-text left-align"></div>
                                                        </div>
                                                        <script type="text/javascript">
                                                        $('.areas').keyup(function () {
                                                            var sum = 0;
                                                            $('.areas').each(function() {
                                                                sum += Number($(this).val());
                                                                $('#rent_total_area').attr("value",sum);
                                                            });
                                                        });
                                                        </script>
                                                        <div class="input-field col m6 s12">
                                                            <input type="text" id="rent_price" name="rent_price" autocomplete="off" oninput="test_skill()" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt11">
                                                            <label for="rent_price">Monthly Rent(&#8377;)</label>
                                                            <div class="errorTxt11 red-text left-align"></div>
                                                            <p id="container"></p>
                                                            <script type="text/javascript">
                                                            function test_skill() {
                                                                var junkVal=document.getElementById('rent_price').value;
                                                                junkVal=Math.floor(junkVal);
                                                                var obStr=new String(junkVal);
                                                                numReversed=obStr.split("");
                                                                actnumber=numReversed.reverse();

                                                                if(Number(junkVal) >=0){
                                                                    //do nothing
                                                                }
                                                                else{
                                                                    $("#container").addClass("red-text");
                                                                    $("#container").addClass("text-darken-4");
                                                                    document.getElementById('container').innerHTML=''+'Oops!!! you entered incorrect number...';
                                                                    return false;
                                                                }
                                                                if(Number(junkVal)==0){
                                                                    $("#container").addClass("red-text");
                                                                    $("#container").addClass("text-darken-4");
                                                                    document.getElementById('container').innerHTML=''+"Enter the Rent..I'm sure you won't give it for free";
                                                                    return false;
                                                                }
                                                                if(actnumber.length>9){
                                                                    $("#container").addClass("red-text");
                                                                    $("#container").addClass("text-darken-4");
                                                                    document.getElementById('container').innerHTML=''+'Ughh!!! you are quoting a very high Rent...';
                                                                    return false;
                                                                }
                                                                var iWords=["Zero", " One", " Two", " Three", " Four", " Five", " Six", " Seven", " Eight", " Nine"];
                                                                var ePlace=['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
                                                                var tensPlace=['dummy', ' Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety' ];

                                                                var iWordsLength=numReversed.length;
                                                                var totalWords="";
                                                                var inWords=new Array();
                                                                var finalWord="";
                                                                j=0;
                                                                for(i=0; i<iWordsLength; i++){
                                                                    switch(i)
                                                                    {
                                                                        case 0:
                                                                            if(actnumber[i]==0 || actnumber[i+1]==1 ) {
                                                                                inWords[j]='';
                                                                            }
                                                                            else {
                                                                                inWords[j]=iWords[actnumber[i]];
                                                                            }
                                                                            inWords[j]=inWords[j]+'';
                                                                            break;
                                                                        case 1:
                                                                            tens_complication();
                                                                            break;
                                                                        case 2:
                                                                            if(actnumber[i]==0) {
                                                                                inWords[j]='';
                                                                            }
                                                                            else if(actnumber[i-1]!=0 && actnumber[i-2]!=0) {
                                                                                inWords[j]=iWords[actnumber[i]]+' Hundred and';
                                                                            }
                                                                            else {
                                                                                inWords[j]=iWords[actnumber[i]]+' Hundred';
                                                                            }
                                                                            break;
                                                                        case 3:
                                                                            if(actnumber[i]==0 || actnumber[i+1]==1) {
                                                                                inWords[j]='';
                                                                            }
                                                                            else {
                                                                                inWords[j]=iWords[actnumber[i]];
                                                                            }
                                                                            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                                                                                inWords[j]=inWords[j]+" Thousand";
                                                                            }
                                                                            break;
                                                                        case 4:
                                                                            tens_complication();
                                                                            break;
                                                                        case 5:
                                                                            if(actnumber[i]==0 || actnumber[i+1]==1) {
                                                                                inWords[j]='';
                                                                            }
                                                                            else {
                                                                                inWords[j]=iWords[actnumber[i]];
                                                                            }
                                                                            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                                                                                inWords[j]=inWords[j]+" Lakh";
                                                                            }
                                                                            break;
                                                                        case 6:
                                                                            tens_complication();
                                                                            break;
                                                                        case 7:
                                                                            if(actnumber[i]==0 || actnumber[i+1]==1 ){
                                                                                inWords[j]='';
                                                                            }
                                                                            else {
                                                                                inWords[j]=iWords[actnumber[i]];
                                                                            }
                                                                            inWords[j]=inWords[j]+" Crore";
                                                                            break;
                                                                        case 8:
                                                                            tens_complication();
                                                                            break;
                                                                        default:
                                                                            break;
                                                                    }
                                                                    j++;
                                                                }

                                                                function tens_complication() {
                                                                    if(actnumber[i]==0) {
                                                                        inWords[j]='';
                                                                    }
                                                                    else if(actnumber[i]==1) {
                                                                        inWords[j]=ePlace[actnumber[i-1]];
                                                                    }
                                                                    else {
                                                                        inWords[j]=tensPlace[actnumber[i]];
                                                                    }
                                                                }
                                                                inWords.reverse();
                                                                for(i=0; i<inWords.length; i++) {
                                                                    finalWord+=inWords[i];
                                                                }
                                                                $("#container").removeClass("red-text");
                                                                $("#container").removeClass("text-darken-4");
                                                                $("#container").addClass("green-text");
                                                                document.getElementById('container').innerHTML=finalWord;
                                                            }
                                                            </script>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s6">
                                                            <div class="select-wrapper">
                                                                <select name="rent_floor" id="rent_floor" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt12">
                                                                    <option disabled selected>Choose your option</option>')
                                                                    <option value="Basement">Basement</option>
                                                                    <option value="Ground Floor">Ground Floor</option>
                                                                    <script type="text/javascript">
                                                                    select = document.getElementById('rent_floor');
                                                                    for (var i = 1; i<=99; i++){
                                                                        var opt = document.createElement('option');
                                                                        opt.value = i;
                                                                        opt.innerHTML = i;
                                                                        select.appendChild(opt);
                                                                    }
                                                                    </script>
                                                                    <option value="99+">99+</option>
                                                                </select>
                                                                <div class="errorTxt12 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_floor">Situated on Floor</label>
                                                        </div>
                                                        <div class="input-field col m6 s6">
                                                            <div class="select-wrapper">
                                                                <select name="rent_total_floor" id="rent_total_floor" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt13" onchange="check_floor()">
                                                                    <option disabled selected>Choose your option</option>')
                                                                    <option value="Basement">Basement</option>
                                                                    <option value="Ground Floor">Ground Floor</option>
                                                                    <script type="text/javascript">
                                                                    select = document.getElementById('rent_total_floor');
                                                                    for (var i = 1; i<=99; i++){
                                                                        var opt = document.createElement('option');
                                                                        opt.value = i;
                                                                        opt.innerHTML = i;
                                                                        select.appendChild(opt);
                                                                    }
                                                                    </script>
                                                                    <option value="99+">99+</option>
                                                                </select>
                                                                <div class="errorTxt13 red-text left-align" id="rent_floor_error"></div>
                                                                <script type="text/javascript">
                                                                function check_floor(){
                                                                    var x = document.getElementById("rent_floor").selectedIndex;
                                                                    var y = document.getElementById("rent_total_floor").selectedIndex;
                                                                    if(y<x){
                                                                        document.getElementById('rent_floor_error').innerHTML = 'The total floors must be greater than or equal to the situated floor..';
                                                                        return false;
                                                                    }
                                                                    else{
                                                                        document.getElementById('rent_floor_error').innerHTML = '';
                                                                        return true;
                                                                    }
                                                                    check_floor();
                                                                }
                                                                </script>
                                                            </div>
                                                            <label for="rent_total_floor">Outoff Floor</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <div class="select-wrapper">
                                                                <select name="rent_amenities[]" id="rent_amenities" multiple class="icons" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt14">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <option value="Car Parking" data-icon="images/Car Parking.png">Car Parking</option>
                                                                    <option value="CCTV" data-icon="images/CCTV.png">CCTV</option>
                                                                    <option value="Club" data-icon="images/Club.png"> Club</option>
                                                                    <option value="Children Play Area" data-icon="images/Children Play Area.png">Children Play Area</option>
                                                                    <option value="Fire Safety" data-icon="images/Fire Safety.png">Fire Safety</option>
                                                                    <option value="Gym" data-icon="images/Gym.png">Gym</option>
                                                                    <option value="Intercom" data-icon="images/Intercom.png">Intercom</option>
                                                                    <option value="Internet Provider" data-icon="images/Internet Provider.png">Internet Provider</option>
                                                                    <option value="Lift" data-icon="images/Lift.png">Lift</option>
                                                                    <option value="Park" data-icon="images/Park.png">Park</option>
                                                                    <option value="Power Backup" data-icon="images/Power Backup.png">Power Backup</option>
                                                                    <option value="Security" data-icon="images/Security.png">Security</option>
                                                                    <option value="Shopping Center" data-icon="images/Shopping Center.png">Shopping Center</option>
                                                                    <option value="Swimming" data-icon="images/Swimming.png">Swimming</option>
                                                                    <option value="Temple" data-icon="images/Temple.png">Temple</option>
                                                                    <option value="Water Supply" data-icon="images/Water Supply.png">Water Supply</option>
                                                                    <option value="Visitors Parking" data-icon="images/Visitors Parking.png">Visitor's Parking</option>
                                                                </select>
                                                                <div class="errorTxt14 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_amenities">Amenities</label>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <div class="select-wrapper">
                                                                <select name="rent_furnish" id="rent_furnish" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt15">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <option value="Furnished">Furnished</option>
                                                                    <option value="Semi Furnished">Semi Furnished</option>
                                                                    <option value="Not Furnished">Not Furnished</option>
                                                                </select>
                                                                <div class="errorTxt15 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_furnish">Furnishing</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <div class="select-wrapper">
                                                                <select name="rent_age" id="rent_age" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt16">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <option value="New Construction">New Construction</option>
                                                                    <option value="Less than 5 years">Less than 5 years</option>
                                                                    <option value="5 to 10 years">5 to 10 years</option>
                                                                    <option value="10 to 15 years">10 to 15 years</option>
                                                                    <option value="15 to 20 years">15 to 20 years</option>
                                                                    <option value="Above 20 years">Above 20 years</option>
                                                                </select>
                                                                <div class="errorTxt16 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_age">Age of Construction</label>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <div class="select-wrapper">
                                                                <select name="rent_tenant" id="rent_tenant" class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt17">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <option value="Family">Family</option>
                                                                    <option value="Bachelors">Bachelor's</option>
                                                                    <option value="Company">Company</option>
                                                                    <option value="Doesnt Matter">Doesn't Matter</option>
                                                                </select>
                                                                <div class="errorTxt17 red-text left-align"></div>
                                                            </div>
                                                            <label for="rent_tenant">Preferred Tenants</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m12 s12">
                                                            <textarea id="rent_description" name="rent_description" class="materialize-textarea" maxlength="5000" length="5000" placeholder="Write few lines about your property like amenities, near by facilities, friendly neighbourhood and proximity to railways and bus stops..." class="validate validate[required] initialized" data-val="true" required="required" aria-required="true" data-error=".errorTxt18"></textarea>
                                                            <label for="rent_description">Description</label>
                                                            <div class="errorTxt18 red-text left-align"></div>
                                                        </div>
                                                        <script type="text/javascript">
                                                        $('.select-wrapper input').attr("required", "required").each(function (index, item) {
                                                        $selectSibling = $(item).siblings('select');
                                                        $(item).attr("id", "material" + $selectSibling.attr("id"));
                                                        $(item).attr("name", "material" + $selectSibling.attr("name"));
                                                        }).addClass("required");

                                                        $.validator.setDefaults({
                                                            ignore: []
                                                        });
                                                        
                                                        $("#rent_form").validate({
                                                            rules:{
                                                                rent_name:{
                                                                    required:true,                                                                            
                                                                    number:false,
                                                                    digits:false
                                                                },
                                                                rent_no:{
                                                                    required:true,
                                                                    digits:true,
                                                                    maxlength:10,
                                                                    minlength:10,
                                                                },
                                                                rent_mail:{
                                                                    required:true,
                                                                    email:true
                                                                },
                                                                rent_city:"required",
                                                                rent_locality:"required",
                                                                rent_address:"required",
                                                                rent_rooms:"required",
                                                                rent_bath:"required",
                                                                rent_balcony:"required",
                                                                'rent_area[]':{
                                                                    digits:true,
                                                                    minlength: 2,
                                                                    maxlength: 5,
                                                                    alphanumeric: false
                                                                },
                                                                rent_total_area:{
                                                                    required:true,
                                                                    digits:true,
                                                                    maxlength:6,
                                                                },
                                                                rent_price:{
                                                                    required:true,
                                                                    digits:true,
                                                                    maxlength:9,
                                                                },
                                                                rent_floor:"required",
                                                                rent_total_floor:"required",
                                                                'rent_amenities[]':"required",
                                                                rent_furnish:"required",
                                                                rent_age:"required",
                                                                rent_tenant:"required",
                                                                rent_description:{
                                                                    required:true,
                                                                    minlength:75,
                                                                }
                                                            },
                                                            messages:{
                                                                rent_name:{
                                                                    required:"OOPS !!! You forgot to enter your NAME...",
                                                                    number:"No name in the world contains numbers...",
                                                                    digits:"No name in the world contains numbers..."
                                                                },
                                                                rent_no:{
                                                                    required:"OOPS !!! You forgot to enter phone number...",
                                                                    digits:"I think phone number doesn't contain alphabets",
                                                                    maxlength:"The Mobile No. is of 10 digits..",
                                                                    minlength:"The Mobile No. is of 10 digits..",
                                                                },
                                                                rent_mail:{
                                                                    required:"OH !!! You forgot to enter your Email-Id...",
                                                                    email:"OOPS !!! I think your email is incorrect...",
                                                                },
                                                                rent_city:"Ughh!!! You didn't entered city",
                                                                rent_locality:"OOPS!!! You forgot to enter locality",
                                                                rent_address:"OH!!! The address field is empty",
                                                                rent_rooms:"How big is your house??",
                                                                rent_bath:"How many bathrooms does your house have??",
                                                                rent_balcony:"Does your house have any balcony?If yes then enter!!",
                                                                'rent_image[]':{
                                                                    required:"<p class='red-text center'>I would like to see images of your HOME..</p>"
                                                                },
                                                                'rent_area[]':{
                                                                    digits: "<p class='red-text'>I don't think there should be characters other than numbers</p>",
                                                                    minlength: "<p class='red-text'>Your room is DAMN SMALL..</p>",
                                                                    maxlength: "<p class='red-text'>Your room is DAMN BIGG</p>",
                                                                    alphanumeric:"<p class='red-text'>I don't think there should be characters other than numbers</p>"
                                                                },
                                                                rent_total_area:{
                                                                    required:"The area of your STARK APARTMENT is???",
                                                                    digits:"I think area should be numeric",
                                                                    maxlength:"Your house is damn BIGG!!!",
                                                                },
                                                                rent_price:{
                                                                    required:"Enter the price..I'm sure you won't give it for free",
                                                                    digits:"The price should be numeric",
                                                                    maxlength:"Ughh!!! you are quoting a very high price...",
                                                                },  
                                                                rent_floor:"Does it take pain to select floor??",
                                                                rent_total_floor:"We just want to know how tall is your building!!",
                                                                'rent_amenities[]':"Choose None if there are no amenities.",
                                                                rent_furnish:"I would like to know how good is your house..",
                                                                rent_age:"OOPS!!! How old is your apartment..",
                                                                rent_tenant:"Choose Doesn't Matter if it's not a matter of concern for you",
                                                                rent_description:{
                                                                    required:"Just few lines on your HOME SWEET HOME...",
                                                                    minlength:"Don't Just write a line or two."
                                                                }
                                                            },
                                                            errorElement : 'div',
                                                            errorPlacement: function(error, element) {
                                                                var placement = $(element).data('error');                                        
                                                                if (placement) {                                                
                                                                    $(placement).append(error)
                                                                } else {
                                                                    error.insertAfter(element);
                                                                }
                                                            },
                                                            submitHandler:function(form){
                                                                $('.rent-trigger').leanModal();
                                                                $('#rent_modal').openModal();
                                                                jQuery.ajax({
                                                                    url: "rententry.php",
                                                                    data: new FormData($('#rent_form')[0]),
                                                                    processData: false,
                                                                    contentType:false,
                                                                    type: "POST",
                                                                    success:function(data){
                                                                        $("#rent-status").html(data);
                                                                    },
                                                                    error:function (){}
                                                                });
                                                            }
                                                        });
                                                        function rent_insert(){
                                                            jQuery.ajax({
                                                                url: "rentinsert.php",
                                                                data:new FormData($('#rent_form')[0]),
                                                                processData: false,
                                                                contentType: false,
                                                                type:"POST",
                                                                success:function(data){
                                                                    $("#rent_entered").html(data);
                                                                    //$("#rent_confirm").prop('disabled', true);
                                                                    //$("#rent_submit").prop('disabled', true);
                                                                },
                                                                error:function(){}
                                                            });
                                                        }
                                                        </script>
                                                        <div class="row">
                                                            <div class="col s12" align="center">
                                                                <div class="g-recaptcha" data-sitekey="6Lc_oBoTAAAAAPkz1x40xnPgc0pAOtelPs6rtW3g"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12 center">
                                                                <button class="btn waves-effect waves-light rent-trigger" value="Submit" type="submit" name="rent_submit" id="rent_submit" data-target="rent_modal">Submit
                                                                    <i class="material-icons right">send</i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="rent_modal" class="modal bottom-sheet">
                <div class="modal-content">
                    <div id="rent-status"></div>
                    <div id="rent_entered"></div>                                                    
                </div>
                <div class="modal-footer">
                    <button class="modal-action waves-effect waves-green btn-flat" onclick="rent_insert()" id="rent_confirm" name="rent_confirm" value="Confirm">Confirm</button>
                    <button class="modal-action modal-close waves-effect waves-green btn-flat ">Close</button>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer class="page-footer" style="margin-top:0px">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">FLATSHUNT</h5>
                        <p class="grey-text text-lighten-4">FLATSHUNT helps Buyer, Seller as well as Tenant to communicate with ease which in turn results the smooth Real Estate Businesss Transaction.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="index.php">HOME</a></li>
                            <li><a class="grey-text text-lighten-3" href="sell.php">List Your Property for SALE</a></li>
                            <li><a class="grey-text text-lighten-3" href="rent.php">List Your Property for RENT</a></li>
                            <li><a class="grey-text text-lighten-3" href="#contact">CONTACT US</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Copyright Flatshunt
                    <a class="grey-text text-lighten-4 right tooltipped" data-position="top" data-delay="50" data-tooltip="Like Us On" href="https://www.facebook.com/Flatshunt"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                    <a class="grey-text text-lighten-4 right tooltipped" data-position="top" data-delay="50" data-tooltip="Follow Us On" href="https://plus.google.com/u/2/113890744562354327120"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
                    <a class="grey-text text-lighten-4 right tooltipped" data-position="top" data-delay="50" data-tooltip="Follow Us On" href="https://www.instagram.com/flatshunt/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    <a class="grey-text text-lighten-4 right tooltipped" data-position="top" data-delay="50" data-tooltip="Follow Us On" href="https://twitter.com/FlatsHunt16"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
        </footer>
    </body>
</html>    