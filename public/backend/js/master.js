console.log('master js file');
$(document).ready(function () {
    $(".show-sidebar-btn").click(function () {
        console.log('click show sidebar btn');
        $(".sidebar").animate({ marginLeft: 0 });
        $(".nav-brand").animate({ marginLeft: 0 });
    });
    
    $(".hide-sidebar-btn").click(function () {
        console.log('hide button click');
        $(".sidebar").animate({ marginLeft: "-100%" });
        $(".nav-brand").animate({ marginLeft: "-100%" });
    });
})

let screenHeight = $(window).height();
let currentMenuHeight = $(".nav-menu .active").offset().top;

if (currentMenuHeight > screenHeight * 0.8) {
    $(".sidebar").animate({
        scrollTop: currentMenuHeight - 100
    }, 1000)
}





