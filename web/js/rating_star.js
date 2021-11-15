//*
// ** Displays the current rating of goods. You can ask your rating once.
// *
$(function ()
{
    $("#rateYo").rateYo({
        rating: $("#rateYo").attr('data-rating'),
        starWidth: "25px",
        fullStar: true
    });

    var rating;
    var product_id = $("#rateYo").attr('data-id');

    $("#rateYo").rateYo()
        .on("rateyo.set", function (e, data) {

            rating = data.rating;

            console.log('rating -'+rating+'  product_id -'+product_id);

            $.post('?api/setRating/', {'rating': rating, 'product_id': product_id})
                .done(function (data)
                {
                    if (data)
                    {
                        $("#rateYo").next().text('your mark '+rating);
                    }
                    else
                    {
                        $("#rateYo").next().text('You have already rated this item');
                    }
                    $("#rateYo").rateYo("option", "readOnly", true); //returns a jQuery Element
                })
        });
});