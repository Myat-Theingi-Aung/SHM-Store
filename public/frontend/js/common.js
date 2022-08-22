$(document).ready(function () {
  $('.menu-icon').click(function () {
    $(this).toggleClass('active');
    $('.gnav').toggleClass('active');
  });

 
})

// $(document).ready(function () {
//   $('.item-list:first').show()
//   $('.ttl-box li:first').addClass('active')
//   $('.ttl-box li').click(function (event) {
//       index = $(this).index();
//       $('.ttl-box li').removeClass('active')
//       $(this).addClass('active')
//       $('.item-list').hide();
//       $('.item-list').eq(index).show();
//       event.preventDefault();
//   })
// 
// });