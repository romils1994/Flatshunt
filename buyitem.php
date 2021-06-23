<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nouislider.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/dropify.css">
    
    <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="font/material-design-icons/Material-Design-Icons.woff2">
    <link rel="stylesheet" href="fonts/materialdesignicons-webfont.woff2">
    <link rel="stylesheet" href="css/materialdesignicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAB9itOCse1a9IYHHNbYd0MDPw_ZzZTc90&libraries=places&region=uk&language=en"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.collagePlus.js"></script>
    <script src="js/jquery.collageCaption.js"></script>
    <script src="js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript" src="js/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script src="js/materialize.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javaScript">
    $(window).load(function () {
        $(document).ready(function(){
            collage();
            $(".fancybox").fancybox({
                openEffect  : 'none',
                closeEffect : 'none',
                helpers : {overlay : {css : {'background' : 'rgba(58, 42, 45, 0.95)'}}},
                beforeShow: function () {
                    /* Disable right click */
                    $.fancybox.wrap.bind("contextmenu", function (e) {
                        return false; 
                    });
                },
                margin      : [20, 60, 20, 60],
                padding:0
            });
        });
    });
    function collage() {
        $('.Collage').collagePlus({
            'fadeSpeed' : 2000,
            'targetHeight' : 200
        }).collageCaption();
    };
    var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.Collage .Image_Wrapper').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });
    </script>
    <style>
    #buy_map {
        height: 100%;
    }
    #room{
        color:white;
    }
    .fancybox-nav {
    width: 60px;       
}

.fancybox-nav span {
    visibility: visible;
    opacity: 0.5;
}

.fancybox-nav:hover span {
    opacity: 1;
}

.fancybox-next {
    right: -60px;
}

.fancybox-prev {
    left: -60px;
}
    </style>
    <script type='text/javascript'>
    $(document).ready(function(){
        jQuery.ajax({
            url:'buymap.php',
            data:new FormData($('#contact_form')[0]),
            dataType: 'json',
            processData: false,
            contentType:false,
            type: "POST",
            success: function(data){
                var map;
                var marker;
                var myLatlng = new google.maps.LatLng(data[0],data[1]);
                var infowindow = new google.maps.InfoWindow();
                $(document).ready(function(){
                    var map_options = {
                        center: myLatlng,
                        zoom: 18,
                        draggable: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById('buy_map'),map_options);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map:map,
                        draggable:true,
                        //animation: google.maps.Animation.DROP,
                        icon:'images/home_marker.png',
                    });
                    infowindow.setContent(data[2]);
                    infowindow.open(map, marker);
                });
            }
        });
    });
</script>
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
    <div class="fixed-action-btn click-to-toggle" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red tooltipped" data-position="left" data-delay="50" data-tooltip="Contact Owner">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul style="left:-300%; bottom:0px">
            <div class="card m12">
                <div class="card-title">Contact Owner</div>
                <div id="mail-status"></div>
                <form class="contact_form" id="contact_form" name="contact_form" novalidate="novalidate">
                    <input type="hidden" name="buy_id" value="<?php echo $_GET['id']?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="contact_name" name="contact_name" maxlength="25" length="25" type="text" class="validate validate[required] initialized" data-error=".errorTxt7" required="required" aria-required="true">
                            <label align="left" for="contact_name">Name</label>
                            <div class="errorTxt7 red-text"></div>
                        </div>
                        <div class="input-field col s12">
                            <input id="contact_phone" name="contact_phone" type="tel" length="10" class="validate validate[required] initialized" data-error=".errorTxt8" required="required" aria-required="true">
                            <label align="left" for="contact_phone">Phone No.</label>
                            <div class="errorTxt8 red-text"></div>
                        </div>
                        <div class="input-field col s12">                                            
                            <input id="contact_mail" name="contact_mail" type="email" class="validate validate[required] initialized" data-error=".errorTxt9" required="required" aria-required="true">
                            <label align="left" for="contact_mail">Email-Id</label>
                            <div class="errorTxt9 red-text"></div>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="contact_msg" name="contact_msg" length="500" maxlength="500" class="validate materialize-textarea validate[required] initialized" data-error=".errorTxt10" required="required" aria-required="true"></textarea>
                            <label align="left" for="contact_msg">Message</label>
                            <div class="errorTxt10 red-text"></div>
                        </div>
                        <script>
                        $.validator.setDefaults({
                            ignore: []
                        });

                        $("#contact_form").validate({
                            rules:{
                                contact_name:{
                                    required:true,
                                    digits:false
                                },
                                contact_phone:{
                                    required:true,
                                    number:true,
                                },
                                contact_mail:{
                                    required:true,
                                    email:true
                                },
                                contact_msg:{
                                    required:true,
                                    maxlength:500
                                },
                            },
                            messages:{
                                contact_name:{
                                    required:"OOPS !!! You forgot to enter your NAME...",
                                    digits:"I thought name doesn't contain Digits",
                                },
                                contact_phone:{
                                    required:"OOPS !!! You forgot to enter phone number...",
                                    number:"I think phone number doesn't contain alphabets",
                                },
                                contact_mail:{
                                    required:"OH !!! You forgot to enter your Email-Id...",
                                    email:"OOPS !!! I think your email is incorrect...",
                                },
                                contact_msg:{
                                    required:"Your message will help us to be better...",
                                    maxlength:"Please Don't write an essay"
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
                                    url: "buymail.php",
                                    data: new FormData($('#contact_form')[0]),
                                    processData: false,
                                    contentType:false,
                                    type: "POST",
                                    success:function(data){
                                        $("#mail-status").html(data);
                                    },                                        
                                    error:function (){}
                                });
                            }
                        });
                        </script>
                        <div class="input-field col s12 center-align row">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
    <?php
        $id = $_GET['id'];
        $link = mysqli_connect("ec2-18-222-153-228.us-east-2.compute.amazonaws.com","root","root","Flatshunt");
        $query = mysqli_query($link,"SELECT * from sale_table where ID = '$id'");
        while($row = mysqli_fetch_array($query)){
            $image = unserialize($row['Image_Path']);
            $room = unserialize($row['Room']);
            $area = unserialize($row['Area']);
            $amenities = unserialize($row['Amenities']);
            echo "<div class='container'>
                    <div class='card hoverable'>
                        <div class='card-image'>
                            <div class='Collage'>";
                                $i=0;
                                foreach($image as $img){
                                    echo "<div class='Image_Wrapper white-text' data-caption='<h6>".$room[$i]."</h6>'>
                                            <a class='fancybox' rel='gallery1' href='$img' title='".$room[$i]."'>
                                                <img src='$img'>
                                            </a>
                                        </div>";
                                    $i++;
                                }
                            echo "
                            </div>
                        </div>
                    </div>
                    <div class='card hoverable'>
                        <div class='card-content'>
                            <div class='card-title'>General Details</div>
                            <div class='col m12 s12'>
                                <div class='row'>
                                    <div class='col m3 s9'>
                                        <label>No. of Bathrooms:</label>
                                    </div>
                                    <div class='col m3 s3'>"
                                        .$row['Bathrooms']."
                                    </div>
                                    <div class='col m3 s9'>
                                        <label>No. of Balconies:</label>
                                    </div>
                                    <div class='col m3 s3'>"
                                        .$row['Balconies']."
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col m3 s9'>
                                        <label>Total Area:</label>
                                    </div>
                                    <div class='col m3 s3'>"
                                        .$row['Total_Area']." sqft.
                                    </div>
                                    <div class='col m3 s9'>
                                        <label>Furnishing:</label>
                                    </div>
                                    <div class='col m3 s3'>"
                                        .$row['Furnishing']."
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='card hoverable'>
                        <div class='card-content'>
                            <div class='card-title'>Description</div>
                            <div class='col m12 s12'>
                                <div class='row'>"
                                    .$row['Description'].
                                "</div>
                            </div>
                        </div>
                    </div>
                    <div class='card hoverable'>
                        <div class='card-content'>
                            <div class='card-title'>Amenities</div>
                            <div class='row'>";
                                foreach ($amenities as $amen) {
                                    echo "<div class='col s11 m5'>".$amen."</div><div class='col s1 m1'><img src='images/".$amen.".png'></div>";
                                }
                    echo    "</div>
                        </div>
                    </div>
                    <div class='card hoverable'>
                        <div class='card-content'>
                            <div class='card-title'>Apartment Details</div>
                            <div class='row'>
                                <div class='col m3 s9'>
                                    <label>Situated On Floor:</label>
                                </div>
                                <div class='col m3 s3'>"
                                    .$row['Floor']."
                                </div>
                                <div class='col m3 s9'>
                                    <label>Outoff Floor:</label>
                                </div>
                                <div class='col m3 s3'>"
                                    .$row['Total_Floor']."
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col s9 m3'>
                                    <label>Transaction Type:</label>
                                </div>
                                <div class='col s3 m3'>"
                                    .$row['Transaction'].
                                "</div>
                                <div class='col s9 m3'>
                                    <label>Possession Status:</label>
                                </div>
                                <div class='col s3 m3'>"
                                    .$row['Possession'].
                                "</div>
                            </div>
                        </div>
                    </div>
                    <div class='card hoverable'>
                        <div class='card-content'>
                            <div class='card-title'>Location Details</div>
                            <div class='col s12 m12' id='buy_map' style='height:380px;'></div>
                        </div>
                    </div>
                </div>
                <title>".$row['Bedrooms']." at ".$row['Locality']."</title>";
        }
    ?>
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