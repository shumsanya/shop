//*
// ** Displays the current rating of goods.
// *
$(function ()
{
    $(".rateYo").each( function() {
        let rating = $(this).attr("data-rating");

        $(this).rateYo(
            {
                rating: rating,
                fullStar: true,
                readOnly: true
            });
    })
})