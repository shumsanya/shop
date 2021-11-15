//*
// ** Delete the selected item
// *
$(function ()
{
    $('.delete_item').on('click', deleteItem);

    function deleteItem()
    {
        current_id = $(this).attr('data-id');

        $(this).closest('.item_cart').remove();

        $.post('?api/deleteItem', {'delete': current_id})
            .done(function ( data )
            {


                $( ".unit_quantity" ).trigger( "input" );

                $.post('?api/GetStatusDelivery/', {'': ''})
                    .done(function (data)
                    {
                        console.log('StatusDelivery '+data);
                        if( data == 2 )
                        {
                            let totalPriceText = $('#totalPrice').text();
                            let number = parseFloat(totalPriceText) + 5;
                            $('#totalPrice').html(number.toFixed(2));
                            $('select[name=delivery]').val(2);
                            $('#delivery').html('delivery + $5.00')
                        }
                        if( data == 1 )
                        {
                            $('select[name=delivery]').val(1);
                            $('#delivery').html('Standard - FREE')
                        }

                    })
                if ( $('.item_cart').length == 0 )
                {
                    $('#totalPrice').html(0.00);
                }
            });
    }
});
