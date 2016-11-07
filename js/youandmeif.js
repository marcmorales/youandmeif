$(document).ready(function() {
    var navUl = $("nav .menu");
    
    //main navigation menu toggle for mobile and tablet
    $(".navMenu").click(function() {
        navUl.toggleClass("navScroll");
        
        //navbar collapse when mouse leaves navbar
//        $(this).parent().mouseleave(function() {
//            navUl.removeClass("navScroll");
//        });
    });
    
    
    function navResponsive() {   
        var menuItem = $(".menu-item"),
            subMenu = menuItem.children(".sub-menu"); //find $('li ul')
    
        //adds icon beside <li> that has sub-links inside
        subMenu.siblings("a").after("<div class='subMenuIcon'><span>+</span></div>");
        var subMenuIcon = $(".subMenuIcon span");
        
        //expand and contract sub-item list
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
});
