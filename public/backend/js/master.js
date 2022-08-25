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

    $('.pagination').addClass('clearfix');

    $('.counter-up').counterUp({
        delay: 10,
        time: 1000
    });

    $(document).on('click', '.del-product-btn', function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $('.productDeleteForm' + id).submit();
            }
        })
    });
    $(document).on('click', '.del-category-btn', function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $('.categoryDeleteForm' + id).submit();
            }
        })
    });
})

let screenHeight = $(window).height();
let currentMenuHeight = $(".nav-menu .active").offset().top;

if (currentMenuHeight > screenHeight * 0.8) {
    $(".sidebar").animate({
        scrollTop: currentMenuHeight - 100
    }, 1000)
}





