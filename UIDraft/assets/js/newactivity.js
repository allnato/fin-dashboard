$(document).ready(function() {

  $('#processType').change(function(event) {
    $(this).valid();
  });

  $('#dateDesc').change(function(event) {
    $(this).valid();
  });

  // Get the current Date.
  var currDate = new Date();


  $('.beginDate').datepicker({
    startDate: currDate
  }).on('changeDate', function(){
    $('.beginDate').valid();
     $('.endDate').datepicker('setStartDate', new Date($(this).val()));
  });;

  $('.endDate').datepicker({
    startDate: currDate
  }).on('changeDate', function(){
    $('.endDate').valid();
  });


  var tabHeight = $('#details').height();
  $('.form-navigation').css('height', tabHeight);

  $('#details').css('min-height', tabHeight);
  $('#process').css('min-height', tabHeight);
  $('#finish').css('min-height', tabHeight);



  });

  $('.btn-process').click(function() {
    $('#process-btn').trigger('click');
  });

  $('.btn-detail').click(function() {
    $('#detail-btn').trigger('click');
  });
