$('.add-to-cart-btn').click(function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
        type: 'GET',
        url : '/add-to-cart',
        data: { id: id },

        success: function(response){
            let cart_count = Object.keys(response.cart).length;

            if(response.msg == 'success'){
                toastr.success('Item Added to Your Cart Successfully &nbsp;<i class="fa fa-check-circle"></i>', 'SUCCESS', {
                    closeButton: true,
                    progressBar: true,
                });
            }else{
                toastr.error('Item Already Exist in Your Cart &nbsp;<i class="fa fa-exclamation-circle"></i>', 'WARNING', {
                    closeButton: true,
                    progressBar: true,
                });
            }

            $('.cart-count').html(cart_count);
        }
    })
})