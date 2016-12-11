$('#remarks').click(function(event) {
  /* Act on the event */
  var remarkTabHeight = $('#remarksCSO').height();
  var panelHeight = $('#CSOpanel').height();
  $('#remarksSLIFE').css('min-height', remarkTabHeight);
  $('#remarksACCT').css('min-height', remarkTabHeight);
  $('#SLIFEpanel').css('min-height', panelHeight);
  $('#ACCTpanel').css('min-height', panelHeight);
})

$('.editDetailBTN').click(function(event) {
  $('.saveDetailBTN').css('display', 'inline-block');
  $('#editDetailsForm .form-control').each(function(index, el) {
    $(this).removeAttr('disabled')
  });
});

$('.editProcessBTN').click(function(event) {
  $('.saveProcessBTN').css('display', 'inline-block');
});

$('#saveDetailsModalBtn').click(function(event) {
  $('.saveDetailsBTN').css('display', 'none');
  var newBeginDate = moment(new Date($('#beginDate').val())).format('YYYY-MM-DD');
  var newEndDate = moment(new Date($('#endDate').val())).format('YYYY-MM-DD');
  $('#beginDate').val(newBeginDate);
  $('#endDate').val(newEndDate);
  $('#editDetailsForm').submit();
});

$('#saveProcessModalBtn').click(function(event) {
  $('.saveProcessBTN').css('display', 'none');
  $('#editProcessForm').submit();
});

$('#contEdit').click(function(event) {
  $('#confirmModal').modal('hide');
  $('#saveDetailsModal').modal('hide');
  $('#saveProcessModal').modal('hide');
});

$('.reviseBTN').click(function(event) {
  $('.tabremark').trigger('click');
});

$('#submitBTN').click(function() {
  var a = $('#dateAudited').val();
  var b = $('#datePendedCSO').val();
  var c = $('#dateEncoded').val();
  var d = $('#dateReceivedSLIFE').val();
  var e = $('#datePendedSLIFE').val();
  var f = $('#dateReceivedAcc').val();
  var g = $('#datePendedAcc').val();
  console.log(a,b,c,d,e,f,g);
  var newdateAudited = moment(new Date(a)).format('YYYY-MM-DD');
  var newdatePendedCSO = moment(new Date(b)).format('YYYY-MM-DD');
  var newdateEncoded = moment(new Date(c)).format('YYYY-MM-DD');
  var newdateReceivedSLIFE = moment(new Date(d)).format('YYYY-MM-DD');
  var newdatePendedSLIFE = moment(new Date(e)).format('YYYY-MM-DD');
  var newdateReceivedAcc = moment(new Date(f)).format('YYYY-MM-DD');
  var newdatePendedAcc = moment(new Date(g)).format('YYYY-MM-DD');
  console.log(newdateAudited,newdatePendedCSO, newdateEncoded, newdateReceivedSLIFE, newdatePendedSLIFE, newdateReceivedAcc, newdatePendedAcc );
  if($('#dateAudited').val().length > 1) {
    $('#dateAudited').val(newdateAudited);
    console.log('a okay ', $('#dateAudited').text(newdateAudited));
  }
  if($('#datePendedCSO').val().length > 1) {
    $('#datePendedCSO').val(newdatePendedCSO);
    console.log('b okay ', $('#datePendedCSO').text(newdatePendedCSO));
  }
  if($('#dateEncoded').val().length > 1) {
    $('#dateEncoded').val(newdateEncoded);
    console.log('c okay ', $('#dateEncoded').text(dateEncoded));
  }
  if($('#dateReceivedSLIFE').val().length > 1) {
    $('#dateReceivedSLIFE').val(newdateReceivedSLIFE);
    console.log('d okay ', $('#dateReceivedSLIFE').text(newdateReceivedSLIFE));
  }
  if($('#datePendedSLIFE').val().length > 1) {
    $('#datePendedSLIFE').val(newdatePendedSLIFE);
    console.log('e okay ', $('#datePendedSLIFE').text(newdatePendedSLIFE));
  }
  if($('#dateReceivedAcc').val().length > 1) {
    $('#dateReceivedAcc').val(newdateReceivedAcc);
    console.log('f okay ',   $('#dateReceivedAcc').text(newdateReceivedAcc));
  }
  if($('#datePendedAcc').val().length > 1) {
    $('#datePendedAcc').val(newdatePendedAcc);
    console.log('g okay ', $('#datePendedAcc').text(newdatePendedAcc));
  }


  $('#remarksSubmit').submit();
});

function clearInvalid(){
  $('#remarks input').each(function(index){
    if($(this).val() == "" || $(this).val() == "Invalid date"){
      $(this).val("");
    }
  })
}

function convertDatetoReadable(){
  $('#beginDate').val(moment($('#beginDate').val()).format('MMM D, YYYY'));
  $('#endDate').val(moment($('#endDate').val()).format('MMM D, YYYY'));
  $('#datePendedCSO').val(moment($('#datePendedCSO').val()).format('MMM D, YYYY'));
  $('#dateAudited').val(moment($('#dateAudited').val()).format('MMM D, YYYY'));
  $('#dateEncoded').val(moment($('#dateEncoded').val()).format('MMM D, YYYY'));
  $('#dateReceivedSLIFE').val(moment($('#dateReceivedSLIFE').val()).format('MMM D, YYYY'));
  $('#datePendedSLIFE').val(moment($('#datePendedSLIFE').val()).format('MMM D, YYYY'));
  $('#dateReceivedAcc').val(moment($('#dateReceivedAcc').val()).format('MMM D, YYYY'));
  $('#datePendedAcc').val(moment($('#datePendedAcc').val()).format('MMM D, YYYY'));
}

function initDatePicker(){
  $('#beginDate').datepicker({
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
  $('#endDate').datepicker({
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

function disableAllFields(){
  $('#remarks input').each(function(index){
    $(this).attr('disabled', 'disabled');
  });

  $('#remarks textarea').each(function(index){
    $(this).attr('disabled', 'disabled');
  });
}
