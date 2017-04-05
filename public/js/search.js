$(function() {
  $(document).on("click",function (e) {
    // click the input box...
    if (e.target.id == 'canteen-select-input') {
      inputFunction();
    } else {
      // click anywhere else...
      if ($('#suggestion-box').is(':visible')) {
        $('#suggestion-box').fadeOut(200);
      }
    }
  });
});
var buttonTimer;
var typingTimer;                //timer identifier
var doneTypingInterval = 1500;  //time in ms (5 seconds)

function inputFunction() {
  $('#canteen-select-input').keypress(function() {
    var findButton = $('#find-button');
    clearTimeout(buttonTimer);
    findButton.button('loading');
    buttonTimer = setTimeout(function() {
      findButton.button('reset');
    }, 3000);
  })
  $('#canteen-select-input').keyup(function() {
    clearTimeout(typingTimer);
    if ($('#canteen-select-input').val()) {
      // if there is input... show the input
      typingTimer = setTimeout('doneTyping()', doneTypingInterval);
      //hmm.stopPropagation();
      //return false;
    }
  });
};
//on keyup, start the countdown

//user is "finished typing," do something
function doneTyping () {
  if ($('#suggestion-box').is(':visible')) {
  } else {
    var input = $('#canteen-select-input').val();
    $.get("fuzzy/", {
      query: input
    }, function(resp) {
      alert(resp);
    });
    $('#find-button').button('reset');
    $('#suggestion-box').fadeToggle(200);
  }
};
