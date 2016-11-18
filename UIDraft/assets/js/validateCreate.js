$('#createForm').validate({
    rules: {
      title: {
        required: true,
        maxlength: 99
      },
      beginDate: {
        required: true,
        date: true
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
        required: true,
        maxlength: 99
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
        maxlength: 500
      },
      payTo: {
        maxlength: 100
      },
      PCVno: {
        digits: true
      },
      DORno: {
        digits: true
      },
      actualRevenue: {
        number: true
      },
      expRevenue: {
        number: true
      },
      expDisburse: {
        number: true
      },
      netIncome: {
        number: true
      },
      FRAno: {
        digits: true
      }
    },
    messages: {
      description: {
        maxlength: "Max character is 99"
      },
      title: {
        required: "Please enter a Title"
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
