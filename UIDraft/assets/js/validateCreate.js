$(document).ready(function() {

  $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
  }, "Value must not equal arg.");

  var $formValidator = $('#createForm').validate({
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
      },
      PRSno: {
        required: true,
        digits: true
      },
      budget: {
        required: true,
        number: true
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

    var details = false;
    var proc = false;
    var type = '';

    $('.theWizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'onNext': function(tab, navigation, index) {
        var check = false;
        if(index == 1){
          console.log('Checking Details');
          check = checkDetails();
          console.log(check);
          if(!check){
            $formValidator.focusInvalid();
            return false;
          }
          type = $("#processType").val();
          filterForm(type);
          details = true;
        }
        else if(index == 2){
          console.log('Checking Process: ' + type);
          check = checkPRSForm();
          if(!check){
            $formValidator.focusInvalid();
            return false;
          }
        }
      },
      'onPrevious': function(tab, navigation, index) {
        console.log(index);
        if(index == 1 && (type == "LEA" || type == "NE")){
          $('.theWizard').bootstrapWizard('show', 0);
        }
      },
      'onTabClick': function(tab, navigation, index){
          return false;
      }
    });

    function checkDetails(){
      var $valid = $("#title").valid() && $("#submittedBy").valid() && $("#processType").valid() && $("#dateDesc").valid()
      && $("#beginDate").valid()
      && $("#endDate").valid();
      return $valid;
    }

    function checkPRSForm(){
      var $valid = $("#FRAno").valid() &&
      $("#expRevenue").valid() &&
      $("#expDisburse").valid() &&
      $("#actualRevenue").valid() &&
      $("#netIncome").valid() &&
      $("#PRSno").valid() &&
      $("#payTo").valid() &&
      $("#PCVno").valid() &&
      $("#DORno").valid() &&
      $("#budget").valid() &&
      $("#particular").valid();
      return $valid;
    }

    function filterForm(type){
      // Check if PRS form
      if(type == 'CA' || type == 'DP' || type == 'RM' ||
          type == "BT" || type == 'CP' || type == 'COC'){
        $('.withPRS').show();
        $('.withFRA').hide();
        $('.payTo').show();
        $('.DORno').hide();
        $('.PCVno').hide();
        $('.PRSno').attr('class', 'PRSno col-sm-12');
      } else if(type == 'PCR'){
        $('.withPRS').show();
        $('.withFRA').hide();
        $('.PCVno').show();
        $('.payTo').show();
        $('.DORno').hide();
        $('.PRSno').attr('class', 'PRSno col-sm-6');
        $('.PCVno').attr('class', 'PCVno col-sm-6');
      } else if(type == 'LQ'){
        $('.withPRS').show();
        $('.withFRA').hide();
        $('.DORno').show();
        $('.payTo').hide();
        $('.PCVno').hide();
        $('.PRSno').attr('class', 'PRSno col-sm-6');
        $('.DORno').attr('class', 'DORno col-sm-6');
      } else if(type == 'NE' || type == 'LEA'){
        console.log('here');
        $('.theWizard').bootstrapWizard('show', 2);
      } else if(type == 'FRA'){
        $('.withFRA').show();
        $('.withPRS').hide();
      }

    }

    $('.finish').click(function(event) {
      $('#createForm').submit();
      console.log('YEAHH');
    });

});
