//*
// ** When you click the event button (Add To Cart), the goods are added to the basket.
// *
$(function()
{
    let btn_add_to_cart = $(".add-to-cart");
    let cart_icon = $("#cart_count");


    btn_add_to_cart.on('click', addToCart);

    // проверка есть ли такой 'id' в $_SESSION['cart_list']
    function addToCart()
    {
        let current_id = $(this).attr('data-id');

        if($('#quantity').val() > 0 || $('#quantity').val() == null)
        {
            let quantity = $('#quantity').val();
            if (quantity == null)
            {
                quantity = 1;
            }

        console.log('current_id ' + current_id);

        $.post('?api/addToCart/', {'current_id': current_id, 'quantity': quantity})
            .done(function (data) {

                if ( data == 'product isset')
                {

                    if (navigator.appName == "Opera")
                    {
                        $('#exampleModal').removeClass('fade');
                    }

                    alert('This item has already been added to the cart. The quantity of goods can be changed in the shopping cart.');

                    //*** MODAL WINDOWS
                    $('#exampleModal').modal({
                        keyboard: false
                    });

                } else {
                     cart_icon.html( data );

                    //***
                    console.log(' product ok ')
                }

            })
        }
        else
        {
            alert('You must add a quantity greater than zero.');
        }
    }
})
