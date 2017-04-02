$(document).ready(function() {
    setInterval( function() { getChatText(); }, 1000);
    $(".panel-body").stop().animate({ scrollTop: $(".panel-body")[0].scrollHeight}, 0);
    $('#btn-send-reply').on("click", function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
            thread_id: thread_id,
            message: $('#message_input').val(),
        }
        var type = "POST";
        var url = "reply";
        $.ajax({
            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            success: function(data) {
                console.log('reply success');
                getChatText();
            },
            error: function(data) {
                console.log('Error: ', data);
            }
        });
        $('#message_input').val("");
    });

});

function getChatText() {
    $.ajax({
        type: "GET",
        url: "/refreshmessages/" + thread_id,
        success: function(data) {
            console.log('Retrieve success');
        },
        error: function(data) {
            console.log('Error: ', data);
        }
    }).done( function(data) {
    var jsonData = JSON.parse(data);
    var jsonLength = jsonData.results.length;
    var html = "";
    for (var i = 0; i < jsonLength; i++) {
      var result = jsonData.results[i];
      if (result.message_id > last_time_id) {
          if(result.sender_name==receiverName){
            html += '<li class="media"><div class="media-body row"><a class="pull-left col-xs-1" style="min-width: 80px;" href=""><img class="media-object img-circle" src="https://image.flaticon.com/icons/png/512/78/78373.png" height="60px" width="60px" style="margin-right: 10px"/></a><div class="col-xs-8 chatMsg receiver">' + result.sender_name + ':<br/>' + result.message + '</div></div></li>'
          }else{
            html += '<li class="media"><div class="media-body row"><div class="col-xs-2"></div><div class="col-xs-8 chatMsg self">' + result.sender_name + ':<br/>' + result.message + '</div><a class="pull-left col-xs-1" href=""><img class="media-object img-circle" src="https://image.flaticon.com/icons/png/512/78/78373.png" height="60px" width="60px" style="margin-right: 10px"/></a></div></li>'
          }
          last_time_id = result.message_id;
          $('#message-list').append(function() {
              return $(html).hide().fadeIn();
          });
          $(".panel-body").stop().animate({ scrollTop: $(".panel-body")[0].scrollHeight}, 1000);
      }
    }

  });

}
