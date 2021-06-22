<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buy Property at FLATSHUNT...</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nouislider.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/dropify.css">
    
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
    <script src="js/nouislider.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/main.js"></script>
    <script type="text/JavaScript">
    google.maps.event.addDomListener(window, 'load', function () {
        var locality_options = {
            types: ['geocode'],
            componentRestrictions: {country:"in"}
        }
        var buy_locality = new google.maps.places.Autocomplete(document.getElementById('buy_location'),locality_options);
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
    <header id="top" class="buyheader">
        <div class="content">
            <div class="centered-content">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12">
                            <h2 class="white-text wow fadeIn" data-wow-delay="2s">FLATSHUNT</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="col s12 buy_form" id="buy_form" name="buy_form" novalidate="novalidate">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <label for="buy_location">Location</label>
                                        <input id="buy_location" name="buy_location" type="text" value="<?php if(isset($_GET['buy_submit'])){echo $_GET['buy_location'];}?>" class="white-text validate[required] initialized" data-error=".errorTxt1" required="required" aria-required="true" placeholder="">
                                        <div class="errorTxt1 amber-text left-align"></div>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <div class="select-wrapper">
                                            <select name="buy_room[]" id="buy_room" multiple class="white-text validate[required] initialized" data-val="true" data-val-required="OOPS!!! You forgot to enter number of bedrooms..." required="required" aria-required="true" data-error=".errorTxt2">
                                                <option value="" selected disabled class="chip">Choose your option</option>
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
                                                <option value="" selected disabled>Choose your option</option>
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
                                                    step: 50,
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
                    </div>
                </div>
            </div>
        </div>    
    </header>
    <?php
        if(isset($_GET['buy_submit'])){
            $link = mysqli_connect("localhost","root","root","Flatshunt");
            $room = $_GET['buy_room'];
            $locality = mysqli_real_escape_string($link, $_GET['buy_location']);
            $budget = mysqli_real_escape_string($link, $_GET['buy_budget']);
            $min_area = mysqli_real_escape_string($link, $_GET['min_buy_area']);
            $max_area = mysqli_real_escape_string($link, $_GET['max_buy_area']);
            $result = array();
            foreach ($room as $value){
                switch($budget){
                    case "1000000": $query = mysqli_query($link,"SELECT ID,Bedrooms,Bathrooms,Balconies,Total_Area,Furnishing,Description,Locality,Price,Image_Path from sale_table where Locality like '%{$locality}%'  Price<='$budget' AND Total_Area>='$min_area' AND Total_Area<='$max_area' AND Bedrooms='$value'");
                                    while($row=mysqli_fetch_array($query)){
                                        $image = unserialize($row['Image_Path']);
                                        $result[] = "<div class='container'>
                                                <a href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>
                                                    <div class='card hoverable'>
                                                        <div class='row'>
                                                            <div class='col m4'>
                                                                <div class='card-image waves-effect waves-block waves-light'>
                                                                    <img src='$image[0]' style='height:200px;' class='responsive-img'>
                                                                </div>
                                                            </div>
                                                            <div class='card-content valign-wrapper'>
                                                                <div class='col m12 s12'>
                                                                    <div style='text-overflow:ellipsis; white-space:nowrap; overflow:hidden;' class='card-title text-darken-4'>".$row['Bedrooms']." at ".$row['Locality']."</div>
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
                                                                    <p style='font-weight:600;'><label style='font-weight:600;'>Price (&#8377;):&nbsp;</label>".$row['Price']."/-<a class='right' href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>Read More</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                    }
                                    break;
                    case "2000000": $query = mysqli_query($link,"SELECT ID,Bedrooms,Bathrooms,Balconies,Total_Area,Furnishing,Description,Locality,Price,Image_Path from sale_table where Locality like '%{$locality}%' AND Price>='1000000' AND Price<='$budget' AND Total_Area>='$min_area' AND Total_Area<='$max_area' AND Bedrooms='$value'");
                                    while($row=mysqli_fetch_array($query)){
                                        $image = unserialize($row['Image_Path']);
                                        $result[]= "<div class='container'>
                                                <a href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>
                                                    <div class='card hoverable'>
                                                        <div class='row'>
                                                            <div class='col m4'>
                                                                <div class='card-image waves-effect waves-block waves-light'>
                                                                    <img src='$image[0]' style='height:200px;' class='responsive-img'>
                                                                </div>
                                                            </div>
                                                            <div class='card-content valign-wrapper'>
                                                                <div class='col m12 s12'>
                                                                    <div style='text-overflow:ellipsis; white-space:nowrap; overflow:hidden;' class='card-title text-darken-4'>".$row['Bedrooms']." at ".$row['Locality']."</div>
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
                                                                    <p style='font-weight:600;'><label style='font-weight:600;'>Price (&#8377;):&nbsp;</label>".$row['Price']."/-<a class='right' href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>Read More</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                    }
                                    break;
                    case "5000000": $query = mysqli_query($link,"SELECT ID,Bedrooms,Bathrooms,Balconies,Total_Area,Furnishing,Description,Locality,Price,Image_Path from sale_table where Locality like '%{$locality}%' AND Price>='2000000' AND Price<='$budget' AND Total_Area>='$min_area' AND Total_Area<='$max_area' AND Bedrooms='$value'");
                                    while($row=mysqli_fetch_array($query)){
                                        $image = unserialize($row['Image_Path']);
                                        $result[]= "<div class='container'>
                                                <a href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>
                                                    <div class='card hoverable'>
                                                        <div class='row'>
                                                            <div class='col m4'>
                                                                <div class='card-image waves-effect waves-block waves-light'>
                                                                    <img src='$image[0]' style='height:200px;' class='responsive-img'>
                                                                </div>
                                                            </div>
                                                            <div class='card-content valign-wrapper'>
                                                                <div class='col m12 s12'>
                                                                    <div style='text-overflow:ellipsis; white-space:nowrap; overflow:hidden;' class='card-title text-darken-4'>".$row['Bedrooms']." at ".$row['Locality']."</div>
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
                                                                    <p style='font-weight:600;'><label style='font-weight:600;'>Price (&#8377;):&nbsp;</label>".$row['Price']."/-<a class='right' href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>Read More</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                    }
                                    break;
                    case "7500000": $query = mysqli_query($link,"SELECT ID,Bedrooms,Bathrooms,Balconies,Total_Area,Furnishing,Description,Locality,Price,Image_Path from sale_table where Locality like '%{$locality}%' AND Price>='5000000' AND Price<='$budget' AND Total_Area>='$min_area' AND Total_Area<='$max_area' AND Bedrooms='$value'");
                                    while($row=mysqli_fetch_array($query)){
                                        $image = unserialize($row['Image_Path']);
                                        $result[] = "<div class='container'>
                                                <a href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>
                                                    <div class='card hoverable'>
                                                        <div class='row'>
                                                            <div class='col m4'>
                                                                <div class='card-image waves-effect waves-block waves-light'>
                                                                    <img src='$image[0]' style='height:16em;' class='responsive-img'>
                                                                </div>
                                                            </div>
                                                            <div class='card-content valign-wrapper'>
                                                                <div class='col m12 s12'>
                                                                    <div style='text-overflow:ellipsis; white-space:nowrap; overflow:hidden;' class='card-title text-darken-4'>".$row['Bedrooms']." at ".$row['Locality']."</div>
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
                                                                    <p style='font-weight:600;'><label style='font-weight:600;'>Price (&#8377;):&nbsp;</label>".$row['Price']."/-<a class='right' href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>Read More</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                    }
                                    break;
                    case "10000000": $query = mysqli_query($link,"SELECT ID,Bedrooms,Bathrooms,Balconies,Total_Area,Furnishing,Description,Locality,Price,Image_Path from sale_table where Locality like '%{$locality}%' AND Price>='7500000' AND Price<='$budget' AND Total_Area>='$min_area' AND Total_Area<='$max_area' AND Bedrooms='$value'");
                                    while($row=mysqli_fetch_array($query)){
                                        $image = unserialize($row['Image_Path']);
                                        $result[] = "<div class='container'>
                                                <a href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>
                                                    <div class='card hoverable'>
                                                        <div class='row'>
                                                            <div class='col m4'>
                                                                <div class='card-image waves-effect waves-block waves-light'>
                                                                    <img src='$image[0]' height='200px'>
                                                                </div>
                                                            </div>
                                                            <div class='card-content valign-wrapper'>
                                                                <div class='col m12 s12'>
                                                                    <div style='text-overflow:ellipsis; white-space:nowrap; overflow:hidden;' class='card-title text-darken-4'>".$row['Bedrooms']." at ".$row['Locality']."</div>
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
                                                                    <p style='font-weight:600;'><label style='font-weight:600;'>Price (&#8377;):&nbsp;</label>".$row['Price']."/-<a class='right' href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>Read More</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                    }
                                    break;
                    case "12000000": $query = mysqli_query($link,"SELECT ID,Bedrooms,Bathrooms,Balconies,Total_Area,Furnishing,Description,Locality,Price,Image_Path from sale_table where Locality like '%{$locality}%' AND Price>='10000000' AND Price<='$budget' AND Total_Area>='$min_area' AND Total_Area<='$max_area' AND Bedrooms='$value'");
                                    while($row=mysqli_fetch_array($query)){
                                        $image = unserialize($row['Image_Path']);
                                        $result[]= "<div class='container'>
                                                <a href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>
                                                    <div class='card hoverable'>
                                                        <div class='row'>
                                                            <div class='col m4'>
                                                                <div class='card-image waves-effect waves-block waves-light'>
                                                                    <img src='$image[0]'style='height:200px;' class='responsive-img'>
                                                                </div>
                                                            </div>
                                                            <div class='card-content valign-wrapper'>
                                                                <div class='col m12 s12'>
                                                                    <div style='text-overflow:ellipsis; white-space:nowrap; overflow:hidden;' class='card-title text-darken-4'>".$row['Bedrooms']." at ".$row['Locality']."</div>
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
                                                                    <p style='font-weight:600;'><label style='font-weight:600;'>Price (&#8377;):&nbsp;</label>".$row['Price']."/-<a class='right' href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>Read More</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                    }
                                    break;
                    case "12000000+": $query = mysqli_query($link,"SELECT ID,Bedrooms,Bathrooms,Balconies,Total_Area,Furnishing,Description,Locality,Price,Image_Path from sale_table where Locality like '%{$locality}%' AND Price>='12000000' AND Total_Area>='$min_area' AND Total_Area<='$max_area'");
                                    while($row=mysqli_fetch_array($query)){
                                        $image = unserialize($row['Image_Path']);
                                        $result[]= "<div class='container'>
                                                <a href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>
                                                    <div class='card hoverable'>
                                                        <div class='row'>
                                                            <div class='col m4'>
                                                                <div class='card-image waves-effect waves-block waves-light'>
                                                                    <img src='$image[0]' style='height:200px;' class='responsive-img'>
                                                                </div>
                                                            </div>
                                                            <div class='card-content valign-wrapper'>
                                                                <div class='col m12 s12'>
                                                                    <div style='text-overflow:ellipsis; white-space:nowrap; overflow:hidden;' class='card-title text-darken-4'>".$row['Bedrooms']." at ".$row['Locality']."</div>
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
                                                                    <p style='font-weight:600;'><label style='font-weight:600;'>Price (&#8377;):&nbsp;</label>".$row['Price']."/-<a class='right' href='buyitem.php?id=".$row['ID']."' style='text-decoration:none'>Read More</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                    }   
                                    break;
                }
            }
            if(count($result)>1)
                echo "<div class='container-fluid'><div class='row'><p class='green-text text-darken-3 flow-text'>".count($result)." Results Found.! </p></div></div>";
            if(count($result)==1)
                echo "<div class='container-fluid'><div class='row'><p class='green-text text-darken-3 flow-text'>".count($result)." Result Found.! </p></div></div>";
            if(count($result)==0)
                echo "<div class='container-fluid'><div class='row'><p class='green-text text-darken-3 flow-text'>No Results Found.!</p></div></div>";
            foreach($result as $res)
                echo $res ;
        }
    ?>
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