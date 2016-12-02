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
    startDate: currDate,
    autoclose: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){

      }
    }
  }).on('changeDate', function(){
    $('.beginDate').valid();
     $('.endDate').datepicker('setStartDate', new Date($(this).val()));
  });;

  $('.endDate').datepicker({
    startDate: currDate,
    autoclose: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){

      }
    }
  }).on('changeDate', function(){
    $('.endDate').valid();
  });


  var tabHeight = $('#details').height();
  $('.form-navigation').css('height', tabHeight);

  $('#details').css('min-height', tabHeight);
  $('#process').css('min-height', tabHeight);
  $('#finish').css('min-height', tabHeight);
  $('.finish-message').css('min-height', tabHeight);



  });

  $('.btn-process').click(function() {
    $('#process-btn').trigger('click');
  });

  $('.btn-detail').click(function() {
    $('#detail-btn').trigger('click');
  });

  $('#finishBTN').click(function() {
    var a = $('#beginDate').val();
    var b = $('#endDate').val();
    var newbeginDate = moment(new Date(a)).format('YYYY-MM-DD');
    var newendDate = moment(new Date(b)).format('YYYY-MM-DD');
    $('#beginDate').val(newbeginDate);
    $('#endDate').val(newendDate);

    $('#createForm').submit();
  });
