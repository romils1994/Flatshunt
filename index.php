<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FlatsHunt - One place to find your dream HOME...</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nouislider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="http://maps.google.com/maps/api/js?libraries=places&region=uk&language=en&sensor=false"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/nouislider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/main.js"></script>
    <script type="text/JavaScript">
    google.maps.event.addDomListener(window, 'load', function () {
        var locality_options = {
            types: ['geocode'],
            componentRestrictions: {country:"in"}
        }
        var buy_locality = new google.maps.places.Autocomplete(document.getElementById('buy_location'),locality_options);
        var rent_locality = new google.maps.places.Autocomplete(document.getElementById('rent_location'),locality_options);
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
                <a class="btn-floating blue tooltipped smoothScroll" data-position="bottom" data-delay="50" data-tooltip="CONTACT US" href="#contact">
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
    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <div class="row">
                <div class="col s12 m12">
                    <h2 class="white-text wow fadeIn" data-wow-delay="2s">FLATSHUNT</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs" style="background-color:transparent;">
                            <li class="tab col s3"><a class="active lime-text flow-text" href="#buy">BUY</a></li>
                            <li class="tab col s3"><a class="lime-text flow-text" href="#rent">RENT</a></li>
                        </ul>
                    </div>
                </div>
                <div id="buy" class="col s12 animated bounceInLeft">
                    <form action="buylisting.php" method="get" class="col s12 buy_form" id="buy_form" name="buy_form" novalidate="novalidate">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <label for="buy_location">Location</label>
                                <input id="buy_location" name="buy_location" type="text" class="white-text validate[required] initialized" data-error=".errorTxt1" required="required" aria-required="true" placeholder="">
                                <div class="errorTxt1 amber-text left-align"></div>
                            </div>
                            <div class="input-field col s12 m6">
                                <div class="select-wrapper">
                                    <select name="buy_room[]" id="buy_room" multiple class="white-text validate[required] initialized" data-val="true" data-val-required="OOPS!!! You forgot to enter number of bedrooms..." required="required" aria-required="true" data-error=".errorTxt2">
                                        <option value="" disabled selected class="chip">Choose your option</option>
                                        <option value="1 RK">1 RK</option>
                                        <option value="1 BHK">1 BHK</option>
                                        <option value="2 BHK">2 BHK</option>                                            
                                        <option value="3 BHK">3 BHK</option>
                                        <option value="4 BHK">4 BHK</option>
                                        <option value="4+ BHK">4+ BHK</option>
                                    </select>
                                    <div class="errorTxt2 amber-text left-align"></div>
                                </div>
                                <label for="buy_room">Number of Bedrooms</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <div class="select-wrapper">
                                    <select name="buy_budget" id="buy_budget" class="white-text validate[required] initialized" data-val="true" data-val-required="OH!!! You forgot to enter your budget..." required="required" aria-required="true" data-error=".errorTxt3">
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="1000000">Below 10 Lacs</option>
                                        <option value="2000000">Between 10 to 20 Lacs</option>
                                        <option value="5000000">Between 20 to 50 Lacs</option>
                                        <option value="7500000">Between 50 to 75 Lacs</option>
                                        <option value="10000000">Between 75 Lacs to 1 Cr</option>
                                        <option value="12000000">Between 1 Cr to 1.2 Cr</option>
                                        <option value="12000000+">Above 1.2 Cr</option>
                                    </select>
                                    <div class="errorTxt3 amber-text left-align"></div>
                                </div>
                                <label for="buy_budget">Budget</label>
                            </div>
                            <div class="range-field col s12 m4">
                                <label>Area</label>
                                <div id="buy_area"></div>
                            </div>
                            <div class="input-field col s6 m2">
                                <label>Minimum Area:</label>
                                <input type="text" id="min_buy_area" name="min_buy_area" class="white-text" readonly placeholder="">
                            </div>
                            <div class="input-field col s6 m2">
                                <label>Maximum Area:</label>
                                <input type="text" id="max_buy_area" name="max_buy_area" class="white-text" readonly placeholder="">
                            </div>
                            <script>
                            var mini;
                            var maxi;
                            $(document).ready(function(){
                                jQuery.ajax({
                                    url:'minmaxsale.php',
                                    data:'',
                                    dataType: 'json',
                                    success: function(data){
                                        var mini = data[0];
                                        var maxi = data[1];
                                        var slider = document.getElementById('buy_area');
                                        noUiSlider.create(slider, {
                                            start: [mini, maxi],
                                            connect: true,
                                            margin:100,
                                            step: 100,
                                            range: {
                                                'min': parseInt(mini),
                                                'max': parseInt(maxi),
                                            },
                                            format: wNumb({
                                                decimals: 3,
                                                thousand: '.',
                                                postfix: ' sq. ft.',
                                            })
                                        });
                                        var min_buy_area = document.getElementById('min_buy_area');
                                        var max_buy_area = document.getElementById('max_buy_area');
                                        slider.noUiSlider.on('update', function( values, handle ) {
                                            min_buy_area.value = values[0];
                                            max_buy_area.value = values[1];
                                        });
                                    },
                                });
                            });
                            $.validator.setDefaults({
                                   ignore: []
                            });
                           $('.select-wrapper input').attr("required", "required").each(function (index, item) {
                                $selectSibling = $(item).siblings('select');
                                $(item).attr("id", "material" + $selectSibling.attr("id"));
                                $(item).attr("name", "material" + $selectSibling.attr("name"));
                            }).addClass("required");
                                    
                            $("#buy_form").validate({
                                rules:{
                                    buy_location:"required",
                                    'buy_room[]':"required",
                                    buy_budget:"required",
                                },
                                messages:{
                                    buy_location:"OOPS !!! You forgot to enter locality...",
                                    'buy_room[]':"OOPS !!! You forgot to enter number of bedrooms...",
                                    buy_budget:"OH !!! You forgot to enter your budget...",
                                },
                                errorElement : 'div',
                                errorPlacement: function(error, element) {
                                    var placement = $(element).data('error');
                                    if (placement) {
                                        $(placement).append(error)
                                    } else {
                                        error.insertAfter(element);
                                    }
                                }
                            });
                            </script>
                        </div>
                        <div class="row"><br/>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="buy_submit">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="rent" class="col s12 animated bounceInLeft">
                    <form class="col s12 rent_form" id="rent_form" name="rent_form" action="rentlisting.php" method="get" novalidate="novalidate">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <label for="rent_location">Location</label>
                                <input id="rent_location" name="rent_location" type="text" class="white-text validate[required] initialized" data-error=".errorTxt4" required="required" aria-required="true" placeholder="">
                                <div class="errorTxt4 amber-text left-align"></div>
                            </div>
                            <div class="input-field col s12 m6">
                                <div class="select-wrapper">
                                    <select name="rent_room[]" id="rent_room" multiple class="white-text validate[required] initialized" data-val="true" data-val-required="OOPS!!! You forgot to enter number of bedrooms..." required="required" aria-required="true" data-error=".errorTxt5">
                                        <option value="" disabled>Choose your option</option>
                                        <option value="1 RK">1 RK</option>
                                        <option value="1 BHK">1 BHK</option>
                                        <option value="2 BHK">2 BHK</option>                                            
                                        <option value="3 BHK">3 BHK</option>
                                        <option value="4 BHK">4 BHK</option>
                                        <option value="4+ BHK">4+ BHK</option>
                                    </select>
                                    <div class="errorTxt5 amber-text left-align"></div>
                                </div>
                                <label for="rent_room">Number of Bedrooms</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <div class="select-wrapper">
                                    <select name="rent_budget" id="rent_budget" class="white-text validate[required] initialized" data-val="true" data-val-required="OH!!! You forgot to enter your budget..." required="required" aria-required="true" data-error=".errorTxt6">
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="10000">Below 10 Thousand</option>
                                        <option value="20000">Between 10 to 20 Thousand</option>
                                        <option value="50000">Between 20 to 50 Thousand</option>
                                        <option value="75000">Between 50 to 75 Thousand</option>
                                        <option value="100000">Between 75 Thousand to 1 Lac</option>
                                        <option value="100000+">Above 1 Lac</option>
                                    </select>
                                    <div class="errorTxt6 amber-text left-align"></div>
                                </div>
                                <label for="rent_budget">Monthly Rent</label>
                            </div>
                            <div class="range-field col s12 m4">
                                <label>Area</label>
                                <div id="rent_area"></div>                                
                            </div>
                            <div class="input-field col s6 m2">
                                <label>Minimum Area:</label>
                                <input type="text" id="min_rent_area" name="min_rent_area" class="white-text" readonly placeholder="">
                            </div>
                            <div class="input-field col s6 m2">
                                <label>Maximum Area:</label>
                                <input type="text" id="max_rent_area" name="max_rent_area" class="white-text" readonly placeholder="">
                            </div>
                            <script>
                            var minir;
                            var maxir;
                            $(document).ready(function(){
                                jQuery.ajax({
                                    url:'minmaxrent.php',
                                    data:'',
                                    dataType: 'json',
                                    success: function(data){
                                        var minir = data[0];
                                        var maxir = data[1];
                                        var slider2 = document.getElementById('rent_area');
                                        noUiSlider.create(slider2, {
                                            start: [minir, maxir],
                                            connect: true,
                                            margin:100,
                                            step: 50,
                                            range: {
                                                'min': parseInt(minir),
                                                'max': parseInt(maxir),
                                            },
                                            format: wNumb({
                                                decimals: 3,
                                                thousand: '.',
                                                postfix: ' sq. ft.',
                                            })
                                        });
                                        var min_rent_area = document.getElementById('min_rent_area');
                                        var max_rent_area = document.getElementById('max_rent_area');
                                        slider2.noUiSlider.on('update', function( values, handle ) {
                                            min_rent_area.value = values[0];
                                            max_rent_area.value = values[1];
                                        });
                                    },
                                });
                            });

                            $.validator.setDefaults({
                               ignore: []
                            });
                            $('.select-wrapper input').attr("required", "required").each(function (index, item) {
                                $selectSibling = $(item).siblings('select');
                                $(item).attr("id", "material" + $selectSibling.attr("id"));
                                $(item).attr("name", "material" + $selectSibling.attr("name"));                                
                            }).addClass("required");
                                    
                            $("#rent_form").validate({
                                rules:{
                                    rent_location:"required",
                                    'rent_room[]':"required",
                                    rent_budget:"required",
                                },
                                messages:{
                                    rent_location:"OOPS !!! You forgot to enter locality...",
                                    'rent_room[]':"OOPS !!! You forgot to enter number of bedrooms...",
                                    rent_budget:"OH !!! You forgot to enter your budget...",                                            
                                },
                                errorElement : 'div',
                                errorPlacement: function(error, element) {
                                    var placement = $(element).data('error');
                                    if (placement) {
                                        $(placement).append(error)
                                    } else {
                                        error.insertAfter(element);
                                    }
                                }
                            });
                            </script>
                        </div>
                        <div class="row"><br/>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="rent_submit">Submit
                                    <i class="material-icons right mdi mdi-send">send</i>
                                </button>
                            </div>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col s12 center-align">
                    <div class="strike">
                        <span><h1 class="red-text flow-text">Why Use FLATSHUNT?</h1></span>
                    </div>
                </div>
            </div>
            <div class="row flexbox">
                <div class="col s12 m4" >
                    <div class="card hoverable  wow slideInLeft" id="cols" data-wow-duration="2s">
                        <div class="card-image">
                            <img src="images/realtor-512.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title black-text">Avoid Brokers</span>
                            <p>We directly connect you to verified owners to save brokerage.</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4" >
                    <div class="card hoverable wow fadeIn" id="cols" data-wow-duration="2s">
                        <div class="card-image">
                            <img src="images/list-512.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title black-text">Free Listing</span>
                            <p>No hidden charges, Easy listing process and thus it's Absolutely Free!</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card hoverable wow slideInRight" id="cols" data-wow-duration="2s">
                        <div class="card-image">
                            <img src="images/home-512.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title black-text">Shortlist without visit</span>
                            <p>Extensive information makes it easy to shortlist your dream home.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>

    <section class="contact">
        <div class="container">
            <div class="row center-align">
                <div class="col s12 m12 l12" id="contact">
                    <h1 class="white-text">Contact Us</h1>
                    <hr/>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row flexbox">
                <div class="col s12 m6">
                    <div class="card hoverable wow fadeInLeft" id="cols" data-wow-duration="2s">
                        <div class="card-content">
                            <div id='contact-status'></div>
                            <form class="contact_form" id="contact_form" name="contact_form" action=""  method="" novalidate="novalidate">
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <input id="contact_name" name="contact_name" maxlength="25" length="25" type="text" class="validate validate[required] initialized" data-error=".errorTxt7" required="required" aria-required="true">
                                        <label for="contact_name">Name</label>
                                        <div class="errorTxt7 red-text"></div>
                                    </div>
                                </div>                                    
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <input id="contact_phone" name="contact_phone" type="tel" pattern="/^[0-9]\d{2,4}-\d{6,8}$/" maxlength="10" length="10" class="validate validate[required] initialized" data-error=".errorTxt8" required="required" aria-required="true">
                                        <label for="contact_phone">Phone No.</label>
                                        <div class="errorTxt8 red-text"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12">                                            
                                        <input id="contact_mail" name="contact_mail" type="email" class="validate validate[required] initialized" data-error=".errorTxt9" required="required" aria-required="true">
                                        <label for="contact_mail">Email-Id</label>
                                        <div class="errorTxt9 red-text"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <textarea id="contact_msg" name="contact_msg" length="500" maxlength="500" class="validate materialize-textarea validate[required] initialized" data-error=".errorTxt10" required="required" aria-required="true"></textarea>
                                        <label for="contact_msg">Message</label>
                                        <div class="errorTxt10 red-text"></div>
                                    </div>                                    
                                </div>
                                <script>
                                $.validator.setDefaults({
                                    ignore: []
                                });

                                $("#contact_form").validate({
                                    rules:{
                                        contact_name:{
                                            required:true,
                                            digits:false,
                                        },
                                        contact_phone:{
                                            required:true,
                                            number:true,
                                            maxlength:10,
                                        },
                                        contact_mail:{
                                            required:true,
                                            email:true
                                        },
                                        contact_msg:{
                                            required:true,
                                            maxlength:500,
                                        }
                                    },
                                    messages:{
                                        contact_name:{
                                            required:"OOPS !!! You forgot to enter your NAME...",
                                            digits:"I thought Name doesn't contain digits"
                                        },
                                        contact_phone:{
                                            required:"OOPS !!! You forgot to enter phone number...",
                                            number:"I think phone number doesn't contain alphabets",
                                            maxlength:"YOUR Contact No is DAMN BIGG"
                                        },
                                        contact_mail:{
                                            required:"OH !!! You forgot to enter your Email-Id...",
                                            email:"OOPS !!! I think your email is incorrect...",
                                        },
                                        contact_msg:{
                                            required:"Your message will help us to be better...",
                                            maxlength:"Please Don't write an essay",
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
                                        jQuery.ajax({
                                            url: "feedback.php",
                                            data: new FormData($('#contact_form')[0]),
                                            processData: false,
                                            contentType:false,
                                            type: "POST",
                                            success:function(data){
                                                $("#contact-status").html(data);
                                                 equalheight('.flexbox #cols');
                                            },
                                            error:function (){}
                                        });
                                    }
                                });
                                </script>
                                <div class="row">
                                    <div class="input-field col s12 m12 center-align">
                                        <button class="btn waves-effect waves-light" type="submit" name="action" id="contact_submit">Submit
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card hoverable wow fadeInRight" id="cols" data-wow-duration="2s">
                        <div class="card-content blue-grey-text">
                            <span class="card-title blue-grey-text">Write to Us at</span>
                            <p>908, Thadomal Shahani Engineering College,</p>
                            <p> PG Kher Marg, TPS-III Off Linking Road, </p>
                            <p>Bandra West, Mumbai, Maharashtra 400050.</p>                               
                            <span class="card-title">Walk-IN</span>
                            <div class="row">
                                <iframe width="100%" height="330" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJByw5MBHJ5zsRMemNHDm_Rzw&key=AIzaSyDv0ccQg8wSrUUnsoV3w-aIkIGn6Cfn7_A" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
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
