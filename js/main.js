// makes sure the whole site is loaded
jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery("#loader").delay(300).fadeOut("slow");
        // will fade out the whole DIV that covers the website.
    jQuery("#loader-wrapper").delay(300).fadeOut("slow");
})

$( document ).ready(function() {
      $('select').not('.disabled').material_select();
});

$('#contact_msg').val('New Text');
  $('#contact_msg').trigger('autoresize');

wow = new WOW(
    {
        offset:       50,          
        mobile:       true,
        live:         true  
    }
)
wow.init();

var options = [
    {selector: '.header', offset: 0, callback: 'Materialize.toast("Welcome to FlatsHunt!", 1500 )' },
  ];
  Materialize.scrollFire(options);

  smoothScroll.init({
    offset: 0,
  })

equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.flexbox #cols');
});


$(window).resize(function(){
  equalheight('.flexbox #cols');
});

var nVer = navigator.appVersion;
    var nAgt = navigator.userAgent;
    var browserName  = navigator.appName;
    var fullVersion  = ''+parseFloat(navigator.appVersion); 
    var majorVersion = parseInt(navigator.appVersion,10);
    var nameOffset,verOffset,ix;

    if (navigator.userAgent.indexOf('MSIE') != -1)
        var detectIEregexp = /MSIE (\d+\.\d+);/ //test for MSIE x.x
    else // if no "MSIE" string in userAgent
        var detectIEregexp = /Trident.*rv[ :]*(\d+\.\d+)/ //test for rv:x.x or rv x.x where Trident string exists
    if (detectIEregexp.test(navigator.userAgent)){ //if some form of IE
            var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
            browserName = "Microsoft Internet Explorer"
        if (ieversion>=10){}
        else{
            document.execCommand('Stop');
            document.write("Outdated Browser");
        }
    }

    // In Opera 15+, the true version is after "OPR/" 
    if ((verOffset=nAgt.indexOf("OPR/"))!=-1) {
     browserName = "Opera";
     fullVersion = nAgt.substring(verOffset+4);
    }

    // In MSIE, the true version is after "MSIE" in userAgent
    else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
     browserName = "Microsoft Internet Explorer";
     fullVersion = nAgt.substring(verOffset+5);
    }

    else if ((verOffset=nAgt.indexOf("Edge"))!=-1) {
     browserName = "Microsoft Edge";
     fullVersion = nAgt.substring(verOffset+5);
    }

    // In Chrome, the true version is after "Chrome" 
    else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
     browserName = "Chrome";
     fullVersion = nAgt.substring(verOffset+7);
    }
    // In Safari, the true version is after "Safari" or after "Version" 
    else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
     browserName = "Safari";
     fullVersion = nAgt.substring(verOffset+7);
     if ((verOffset=nAgt.indexOf("Version"))!=-1) 
       fullVersion = nAgt.substring(verOffset+8);
    }
    // In Firefox, the true version is after "Firefox" 
    else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
     browserName = "Firefox";
     fullVersion = nAgt.substring(verOffset+8);
    }

    // trim the fullVersion string at semicolon/space if present
    if ((ix=fullVersion.indexOf(";"))!=-1)
       fullVersion=fullVersion.substring(0,ix);
    if ((ix=fullVersion.indexOf(" "))!=-1)
       fullVersion=fullVersion.substring(0,ix);

    majorVersion = parseInt(''+fullVersion,10);
    if (isNaN(majorVersion)) {
     fullVersion  = ''+parseFloat(navigator.appVersion); 
     majorVersion = parseInt(navigator.appVersion,10);
    }
    
    switch (browserName){
        case "Chrome":if(majorVersion>=35){}
                      else {
                        window.stop();
                        document.execCommand('stop');
                        alert("Your Browser is outdated \n We Support Google Chrome 35+, Mozilla Firefox 31+, Safari 7+, Internet Explorer 10+, Microsoft Edge 12+, Opera 25+.");
                    }
                      break;
        case "Firefox":if(majorVersion>=31){}
                      else {
                        window.stop();
                        document.execCommand('stop');
                        alert("Your Browser is outdated \n We Support Google Chrome 35+, Mozilla Firefox 31+, Safari 7+, Internet Explorer 10+, Microsoft Edge 12+, Opera 25+.");
                    }
                      break;
        case "Safari":if(majorVersion>=7){}
                      else{
                        window.stop();
                        document.execCommand('stop');
                        alert("Your Browser is outdated \n We Support Google Chrome 35+, Mozilla Firefox 31+, Safari 7+, Internet Explorer 10+, Microsoft Edge 12+, Opera 25+.");
                      }
                      break;
        case "Microsoft Internet Explorer":if(ieversion>=10){}
                                           else {
                                            document.execCommand('stop');
                                            alert("Your Browser is outdated \n We Support Google Chrome 35+, Mozilla Firefox 31+, Safari 7+, Internet Explorer 10+, Microsoft Edge 12+, Opera 25+.");
                                           }
                                           break;
        case "Microsoft Edge":if(majorVersion>=12){}
                              else {
                                document.execCommand('stop');
                                window.stop();
                                alert("Your Browser is outdated \n We Support Google Chrome 35+, Mozilla Firefox 31+, Safari 7+, Internet Explorer 10+, Microsoft Edge 12+, Opera 25+.");
                              }
                              break;
        case "Opera":if(majorVersion>=25){}
                     else {
                        window.stop();
                        document.execCommand('stop');
                        alert("Your Browser is outdated \n We Support Google Chrome 35+, Mozilla Firefox 31+, Safari 7+, Internet Explorer 10+, Microsoft Edge 12+, Opera 25+.");
                    }
                     break;
        default:window.stop();
                document.execCommand('stop');
                alert("Your Browser is outdated \n We Support Google Chrome 35+, Mozilla Firefox 31+, Safari 7+, Internet Explorer 10+, Microsoft Edge 12+, Opera 25+.");
                break;
    }