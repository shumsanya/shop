//*
// ** When you click on the Buy button, the choice of delivery of goods is checked.
// *
$(function ()
{
    $('#btn').on('click', changePurse);

    function changePurse(event)
    {
        if ($('select[name=delivery]').val() < 1)
        {
            event.preventDefault();
            alert('Select delivery method');
        }
        else
        {
            let total_price = $('#totalPrice').text();

            $.ajax({
                type: "POST",
                async: false,
                url: '?api/changePurse/',
                data: { 'total_price': total_price }
            })
        }
    }
})