$(document).ready(function() {
    setInterval( function() { refreshOffers(); }, 10000);
});

function refreshOffers() {
    $.ajax({
        type: "GET",
        url: "/order/" + orderId + "/refresh",
        success: function(data) {
            console.log('Retrieve success');
        },
        error: function(data) {
            console.log('Error: ', data);
        }
    }).done(function(data) {
        var jsonData = JSON.parse(data);
        var jsonLength = jsonData.results.length;
        $('#offer_table tbody').empty();
        for (var i = 0; i < jsonLength; i++) {
            var html = "";
            var result = jsonData.results[i];
            html += '<tr><td>' + (i + 1) + '</td><td><a href="/profile/' + result.offerer_id + '">' + result.offerer_name + '</a></td><td><a href="/chat/' + result.offerer_id + '"><img src="/img/icons/chatwithdeliverer.jpg" style="width:130px;height:35px;box-shadow: 2px 2px 2px #888888;"></a></td><td>$' + parseFloat(result.price).toFixed(2) + '</td><td></td>';
            if (!isBuyer) {
                html += '<td></td></tr>';
            } else {
                html += '<td><form method="POST" action="' + window.location.hostname + '/order/' + orderId + '" accept-charset="UTF-8"><input name="_token" type="hidden" value="' + token + '"><button name="offer_id" id="btn-submit" type="submit" class="btn btn-success ao" value="' + result.offer_id + '">Accept Offer</button></form></td></tr>';
            }
            $('#offer_table tbody').append(function() {
                return $(html).hide().fadeIn();
            });
        }

    });
}
