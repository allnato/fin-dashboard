
$('#createBTN').click(function(event) {
  // Validate Here
  var check = false;
  check = checkDetails();
  if(!check){
    $billingValidator.focusInvalid();
  }
  else {
    $('#createModal').modal('show');
  }
});

$('#contEdit').click(function(event) {
  $('#createModal').modal('hide');
});


$('#createModalBTN').click(function(event) {
  var newDate = moment(new Date($('#activityDate').val())).format('YYYY-MM-DD');
  $('#activityDate').val(newDate);
  $('#billingForm').submit();
});

$('#activityDate').datepicker({
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

function checkDetails(){
  var $valid = $("#activityTitle").valid() && $("#orgAcronym").valid() && $("#activityDate").valid() &&
  $("#status").valid() && $("#payableTo").valid() && $("#amount").valid() ;
  return $valid;
}

$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
}, "Value must not equal arg.");

var $billingValidator = $('#billingForm').validate({
  rules: {
    activityTitle: {
      required: true,
      maxlength: 99
    },
    activityDate: {
      required: true,
      date: true
    },
    payableTo: {
      required: true
    },
    amount: {
      required: true,
      number: true
    },
    status: {
      valueNotEquals: "-1",
      required: true
    },
    orgAcronym: {
      valueNotEquals: "-1",
      required: true
    }
  },
  messages: {
    acativityTitle: {
      required: "Please enter a Title"
    },
    status: {
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
