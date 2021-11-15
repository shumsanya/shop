//*
// ** Listen change to the DOM, for the correct calculation of the price
// *
$(function ()
{
       $('#totalPrice').bind('DOMSubtreeModified', function(e)
       {
           let btnPay = $('#btn');

           $.post('?api/getPurse/', {'': ''})
               .done(function (data)
               {
                   let purse = parseFloat( data );
                   let TotalPrice = $('#totalPrice');

                   console.log(parseFloat( TotalPrice.text() ));

                   if ( purse < parseFloat( TotalPrice.text() ) )
                   {
                       btnPay.addClass('disabled');
                       alert('You lack money for this purchase.');
                   }
                   else
                   {
                       btnPay.removeClass('disabled');
                   }

                   if ($('.item_cart').length == 0)
                   {
                       btnPay.addClass('disabled');
                   }
               })
       });
})