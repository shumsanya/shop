//*
// ** Delete the selected item
// *
$(function ()
{
    $('#quantity').on('input', changeQuantity);

    function changeQuantity()
    {
        let quantity = $(this).val();
        let current_id = $(this).attr('data-id');
        console.log(current_id);

        $.post('?api/changeQuantity/', {'current_id': current_id, 'quantity': quantity})
            .done(function (data)
            {
                console.log(data);
            })
    }
})