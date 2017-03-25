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
            console.log('reply success');
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
          html += '<li class="media"><div class="media-body"><a class="pull-left" href=""><img class="media-object img-circle"src="https:\/\/image.flaticon.com/icons/png/512/78/78373.png" height="60px" width="60px" style="margin-right: 10px"/></a><div class="media-body">' + result.sender_name + '<br/>' + result.message + '</div></div></li><hr/>'
          last_time_id = result.message_id;
          $('#message-list').append(function() {
              return $(html).hide().fadeIn();
          });
          $(".panel-body").stop().animate({ scrollTop: $(".panel-body")[0].scrollHeight}, 1000);
      }
    }

  });

}
