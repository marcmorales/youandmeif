$(document).ready(function() {
    
    function youAndMeGen() {
        var navUl = $("nav .menu"),
        myWindow = $(window),
        windowWidth = myWindow.innerWidth;

        //main nav menu toggle for mobile and tablet
        $(".navMenu").click(function() {
            navUl.toggleClass("navScroll");

//            navbar collapse when mouse leaves navbar
//                $(this).parent().mouseleave(function() {
//                    navUl.removeClass("navScroll");
//                });
        });
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
    youAndMeGen();
    
});
