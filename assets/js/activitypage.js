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
  $('#editProcessForm .form-control').each(function(index, el) {
    $(this).removeAttr('disabled')
  });
});

$('.saveDetailBTN').click(function(event) {
  var check = false;
  check = checkDetails();
  if(!check){
    $detailValidator.focusInvalid();
  }
  else {
    $('#saveDetailsModal').modal('show');
  }
});

$('.saveProcessBTN').click(function(event) {
  var check = false;
  check = $('#editProcessForm').valid();
  if(!check){
    $processValidator.focusInvalid();
  }
  else {
    $('#saveProcessModal').modal('show');
  }
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

$('.contEdit').click(function() {
  $('#confirmModal').modal('hide');
  $('#remarkModal').modal('hide');
  $('#declineModal').modal('hide');
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


$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
}, "Value must not equal arg.");


var $processValidator = $('#editProcessForm').validate({
  rules: {
    PRSno: {
      required: true,
      digits: true
    },
    budget: {
      required: true,
      number: true,
      min: 0.0
    },
    particular: {
      required: true,
      maxlength: 500
    },
    payTo: {
      required: true,
      maxlength: 100
    },
    PCVno: {
      required: true,
      digits: true
    },
    DORno: {
      required: true,
      digits: true
    },
    actualRevenue: {
      required: true,
      number: true
    },
    expRevenue: {
      required: true,
      number: true
    },
    expDisburse: {
      required: true,
      number: true
    },
    netIncome: {
      required: true,
      number: true
    },
    FRAno: {
      required: true,
      digits: true
    }
  },
  errorElement: 'div',
  errorPlacement: function(error, element) {
    error.addClass('help-block');


    if (element.prop('type') === 'checkbox') {
      error.insertAfter('element.parent("label")');
    } else {
      error.insertAfter(element);
    }

    if (!element.next('span')[0]) {
      $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
    }

  },
  success: function(label, element) {
    // Add the span element, if doesn't exists, and apply the icon classes to it.
    if (!$(element).next("span")[0]) {
      $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
    }
  },
  highlight: function(element, errorClass, validClass) {
    $(element).parents(".form-group.has-feedback").addClass("has-error").removeClass("has-success");
    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
  },
  unhighlight: function(element, errorClass, validClass) {
    $(element).parents(".form-group.has-feedback").addClass("has-success").removeClass("has-error");
    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
    if($(element).val() == ""){
      $(element).parents(".form-group.has-feedback").removeClass("has-success");
      $(element).next("span").removeClass("glyphicon-ok");
    }
  }

});

var $detailValidator = $('#editDetailsForm').validate({
  rules: {
    title: {
      required: true,
      maxlength: 99
    },
    beginDate: {
      required: true,
      date: true
    },
    dateDesc: {
      required: true
    },
    endDate: {
      required: true,
      date: true
    },
    description: {
      maxlength: 499
    },
    submittedBy: {
      required: true
    },
    processType: {
      valueNotEquals: "-1",
      required: true,
    }
  },
  messages: {
    description: {
      maxlength: "Max character is 99"
    },
    title: {
      required: "Please enter a Title"
    },
    processType: {
      valueNotEquals: "Please select an item!"
    }

  },
  errorElement: 'div',
  errorPlacement: function(error, element) {
    error.addClass('help-block');


    if (element.prop('type') === 'checkbox') {
      error.insertAfter('element.parent("label")');
    } else {
      error.insertAfter(element);
    }

    if (!element.next('span')[0]) {
      $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
    }

  },
  success: function(label, element) {
    // Add the span element, if doesn't exists, and apply the icon classes to it.
    if (!$(element).next("span")[0]) {
      $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
    }
  },
  highlight: function(element, errorClass, validClass) {
    $(element).parents(".form-group.has-feedback").addClass("has-error").removeClass("has-success");
    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
  },
  unhighlight: function(element, errorClass, validClass) {
    $(element).parents(".form-group.has-feedback").addClass("has-success").removeClass("has-error");
    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
    if($(element).val() == ""){
      $(element).parents(".form-group.has-feedback").removeClass("has-success");
      $(element).next("span").removeClass("glyphicon-ok");
    }
  }

});

function checkDetails(){
  var $valid = $("#title").valid() && $("#submittedBy").valid() && $("#processType").valid() && $("#dateDesc").valid()
  && $("#beginDate").valid()
  && $("#endDate").valid() && $("#description").valid();
  return $valid;
}
