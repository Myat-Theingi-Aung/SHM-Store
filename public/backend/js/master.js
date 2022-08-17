console.log('master js file');
$(document).ready(function () {
    $(".show-sidebar-btn").click(function () {
        console.log('click show sidebar btn');
        $(".sidebar").animate({marginLeft:0});
    });
    
    $(".hide-sidebar-btn").click(function () {
        console.log('hide button click');
        $(".sidebar").animate({marginLeft:"-100%"});
    });
})





