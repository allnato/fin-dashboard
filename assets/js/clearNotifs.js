var notifIDs = new Array();
$('.dropdown.org').click(function(event) {
  notifIDs = new Array();
  getAllNotificationIDs();

  $.ajax({
    url: '/path/to/file',
    type: 'default GET (Other values: POST)',
    dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {param1: 'value1'}
  })
  .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

});


function getAllNotificationIDs(){
  var p = $('.notifications li').length;
  $('.notifications li').each(function(index, el) {
    notifIDs.push($(this).attr('id'));
  });
}
