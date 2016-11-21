$(document).ready(function() {
    
    "use strict";
    
     var myWindow,
         youandmeBlog;

    myWindow = $(window);
    
    /*
    ===============================
        Navigation functions
    ===============================
    */
    // Header navigation
    function youAndMeHeadNav() {
        
        var navUl = $("nav .menu");
        
        
        //main nav menu toggle for mobile and tablet
        $(".navMenu").click(function() {
            navUl.toggleClass("navScroll");

//            navbar collapse when mouse leaves navbar
//                $(this).parent().mouseleave(function() {
//                    navUl.removeClass("navScroll");
//                });
        });
        
        // collapse functionality for sub-menu-items
        function navResponsive() {
            var menuItem = $(".menu-item"),
                subMenu = menuItem.children(".sub-menu");

            //adds icon beside <li> that has sub-links inside
            subMenu.siblings("a").after("<div class='subMenuIcon'><span>+</span></div>");
            var subMenuIcon = $(".subMenuIcon span");

            //insert icons for sub-menu
            subMenuIcon.click(function() {
                $(this).parent().siblings(".sub-menu").toggleClass("navScroll");

                if ($(this).text() === "+") {
                    $(this).text("-");
                }else{
                    $(this).text("+");
                }
            });
        }
        navResponsive();                
    }
    youAndMeHeadNav();
    
    // Page navigation
    function youandmePageNav() {
        var childPageTitle = $(".child-page-title"),
            childPageList = $(".child-page-list"),
            childPageTitleRow = childPageTitle.parent(),
            childPageListRow = childPageList.parent();
        
        childPageTitleRow.prependTo(".page-content");
        childPageListRow.prependTo(".page-content");
        childPageList.children().each(function() {
            $(this).addClass("col-xs-12 col-sm-6 col-md-3");
        });
        
    }
    youandmePageNav();
    
    // footer navigation
    function youandmeFooterNav() {
        var widget = $(".secondary-column .widget");
        
        widget.each(function() {
            $(this).addClass("col-md-6");
            $(this).addClass("clearfix");
        });
    }
    youandmeFooterNav();
    /*
    ===============================
            Blog functions
    ===============================
    */
    youandmeBlog = $(".youandmeBlog");
    var newBlog = youandmeBlog.first(),
        blogImgWrap = $(".thumbnail-img");
    
    // resize latest post to full width of it's container class
    function blogMediumLayout() {
        
        if(window.innerWidth >= 992) {
            newBlog.removeClass("col-md-4");
            newBlog.addClass("col-md-12");
        }
        else {
            newBlog.removeClass("col-md-12");
            newBlog.addClass("col-md-4");
        }
        
        // imitate background-size:cover for featured imgs
        blogImgWrap.each(function() {
            // set size
            var th = $(this).height(), // wrapper height
                tw = $(this).width(), // wrapper width
                im = $(this).children('img'), // image
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
    //init setup
    blogMediumLayout();
    //listen to resize
    myWindow.resize(blogMediumLayout);
    
    
});