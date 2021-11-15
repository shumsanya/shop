//*
// ** When the number of changes, the event works for price calculations.
// *
$(function ()
{
    // Triggers when changing the number of goods
    $('.unit_quantity').on('input', changePrice);

    function changePrice()
    {
        if ($(this).val() > 0)
        {
            // id product
            let current_id = $(this).attr('data-id');

            // New quantity product
            let quantity = $(this).val();

            let parent = $(this).closest('.item_cart');

            $.post('?api/changePrice/', {'current_id': current_id, 'quantity': quantity})
                .done(function (data)
                {
                    let obj = $.parseJSON(data);
                    let productPrice = parseFloat( obj.productPrice );
                    let totalPrice = parseFloat( obj.totalPrice );

                    parent.find('.price').html(productPrice.toFixed(2));
                    $('#totalPrice').html(totalPrice.toFixed(2));

                    changeTotalPrice();
                })
        }
        else
        {
            let v = 1;
            alert('You must add a quantity greater than zero.');
            $(this).val(parseInt(v));
            $( ".unit_quantity" ).trigger( "input" );
        }
    }


    // triggered when the type of delivery
    $('select[name=delivery]').on('change', changeTotalPrice);

    function changeTotalPrice()
    {
        var delivery = $('select[name=delivery]');
        var totalPriceText = $('#totalPrice').text();

        if( delivery.val() == 2 )
        {
            let number = parseFloat(totalPriceText) + 5;
            $('#totalPrice').html(number.toFixed(2));
            $('#delivery').html('delivery + $5.00')

            $.post('?api/changeStatusDelivery/', {'status': 2})
                .done(function (data)
                {
                    console.log('status '+data);
                })
        }

        if ( delivery.val() == 1 )
        {
            $.post('?api/getStatusDelivery/', {'': ''})
                .done(function (data)
                {
                    if(data == 2)
                    {
                        let number = parseFloat(totalPriceText) - 5;
                        $('#totalPrice').html(number.toFixed(2));
                        $('#delivery').html('Standard - FREE');
                    }
                    else
                    {
                        $('#delivery').html('Standard - FREE');
                    }

                })

            $.post('?api/changeStatusDelivery/', {'status': 1})
                .done(function (data)
                {
                    console.log('status cheng '+data);
                })
        }
    }
})

