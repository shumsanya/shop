//*
// ** The event (input) launches for price calculations.
// *
$(function ()
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
})

