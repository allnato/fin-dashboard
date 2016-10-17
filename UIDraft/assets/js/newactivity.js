$(document).ready(function() {
  // Get the current Date.
  var currDate = moment().format('MM/DD/YYYY');
  $('.beginDate').val(currDate);

  $('.beginDate').datepicker({
   weekStart:1
  });

  $('.endDate').datepicker({
   weekStart:1
  });

  $('.form-navigation').css('height', $('.form-main').height());

  var tabHeight = Math.max($('#details').height(),$('#process').height());

  $('#details').css('min-height', tabHeight);
  $('#process').css('min-height', tabHeight);

  });

  $('.btn-process').click(function() {
    $('#process-btn').trigger('click');
  });

  $('.btn-detail').click(function() {
    $('#detail-btn').trigger('click');
  });
