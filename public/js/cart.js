$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$('.amount-btn').on('click', function() {
    var $button = $(this);
    var oldValue = $button.parent().find('a').text();

    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
    // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        }
    }

    var id = $button.attr("id");
    var formData = {
        food_id: id,
        amount: newVal,
    }
    $.ajax({
        type: "POST",
        url: "/cart/update",
        data: formData,
        success: function(data) {
            var jsonData = JSON.parse(data);
            $('#total_price').text('$' + jsonData.price);
            $button.parent().find("a").text(newVal);
        },
        error: function(data) {
            console.log('Error: ', data);
        }
    });
/*
    var formData = {
        item_id: thread_id,
        message: $('#message_input').val(),
    }
    $.ajax({
        type: "POST",
        url: "dosomething.php?id=" + id + "&newvalue=" + newVal,
        success: function() {
            $button.parent().find("input").val(newVal);
        }
    });
    */
})
