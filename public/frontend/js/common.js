$(document).ready(function () {
  $('.menu-icon').click(function () {
    $(this).toggleClass('active');
    $('.gnav').toggleClass('active');
  });

 
})

/* For Product Tab */
// $(document).ready(function () {
// 
//   $('.ttl-box li').click(function (e) {
//       $(".ttl-box li.active").removeClass("active");
//       $(this).addClass("active");
//       $('.item-box').hide();
//       $('#' + $(this).attr('data-id')).show();
//       e.preventDefault();
//   })
// 
// });
/* End Product tab */
