$(function() {
    "use strict";
    
    imgResize();
    $(window).load(imgResize);
    $(window).resize(imgResize);
    
    /* front page function */
    (function() {
        var theBox = $(".box");
        theBox.matchHeight();
    })();
});

/* Responsive Img (CSS background: cover behaviour) */
function imgResize() {

    var imgContainer = $(".img-container");

    imgContainer.each(function() {
        // set size
        var th = $(this).height(), // wrapper height
            tw = $(this).width(), // wrapper width
            im = $(this).find("img"), // image
            ih = im.height(), // initial image height
            iw = im.width(); // initial image width

        if ((th/tw) > (ih/iw)) { 
            im.addClass('wh').removeClass('ww'); // set height 100%
        } else { 
            im.addClass('ww').removeClass('wh'); //set width 100%
        }
        // set offset
        var nh = im.height(), // new image height
            nw = im.width(), // new image width
            hd = (nh - th) / 2, // half dif img/box height
            wd = (nw - tw) / 2; //half dif img/box width

        if (hd < 1) {hd = 0;}
        if (wd < 1) {wd = 0;}

        im.css({marginLeft: '-'+wd+'px', marginTop: '-'+hd+'px'});//offset left
    });
}