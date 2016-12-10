$('#remarks').click(function(event) {
  /* Act on the event */
  var remarkTabHeight = $('#remarksCSO').height();
  var panelHeight = $('#CSOpanel').height();
  $('#remarksSLIFE').css('min-height', remarkTabHeight);
  $('#remarksACCT').css('min-height', remarkTabHeight);
  $('#SLIFEpanel').css('min-height', panelHeight);
  $('#ACCTpanel').css('min-height', panelHeight);
})

function clearInvalid(){
  $('#remarks input').each(function(index){
    if($(this).val() == "" || $(this).val() == "Invalid date"){
      $(this).val("");
    }
  })
}

function convertDatetoReadable(){
  $('#datePendedCSO').val(moment($('#datePendedCSO').val()).format('MMM D, YYYY'));
  $('#dateAudited').val(moment($('#dateAudited').val()).format('MMM D, YYYY'));
  $('#dateEncoded').val(moment($('#dateEncoded').val()).format('MMM D, YYYY'));
  $('#dateReceivedSLIFE').val(moment($('#dateReceivedSLIFE').val()).format('MMM D, YYYY'));
  $('#datePendedSLIFE').val(moment($('#datePendedSLIFE').val()).format('MMM D, YYYY'));
  $('#dateReceivedAcc').val(moment($('#dateReceivedAcc').val()).format('MMM D, YYYY'));
  $('#datePendedAcc').val(moment($('#datePendedAcc').val()).format('MMM D, YYYY'));
}

function initDatePicker(){
  $('#datePendedCSO').datepicker({
    autoclose: true,
    forceParse: false,
    todayHighlight: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){
        return moment(new Date(date)).format('YYYY-MM-DD');
      }
    }
  });
  $('#dateAudited').datepicker({
    autoclose: true,
    forceParse: false,
    todayHighlight: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){
      }
    }
  });
  $('#dateEncoded').datepicker({
    autoclose: true,
    forceParse: false,
    todayHighlight: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){
      }
    }
  });
  $('#dateReceivedSLIFE').datepicker({
    autoclose: true,
    forceParse: false,
    todayHighlight: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){
      }
    }
  });
  $('#datePendedSLIFE').datepicker({
    autoclose: true,
    forceParse: false,
    todayHighlight: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){
      }
    }
  });
  $('#dateReceivedAcc').datepicker({
    autoclose: true,
    forceParse: false,
    todayHighlight: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){
      }
    }
  });
  $('#datePendedAcc').datepicker({
    autoclose: true,
    forceParse: false,
    todayHighlight: true,
    format: {
      toDisplay: function(date, format, language){
        return moment(new Date(date)).format('MMM DD, YYYY');
      },
      toValue: function(date, format, language){
      }
    }
  });

}
