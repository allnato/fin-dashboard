$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
  // Sort Order Button is Clicked
  // Change the direction of the arrow
  $('#sortOrderBtn').click(function(event) {

    if($('#sortOrder').val() == 'asc'){
      $('#sortOrderIcon').removeClass('fa-long-arrow-up');
      $('#sortOrderIcon').addClass('fa-long-arrow-down')
      $('#sortOrder').val('desc').trigger('change');
    }else {
      $('#sortOrderIcon').removeClass('fa-long-arrow-down');
      $('#sortOrderIcon').addClass('fa-long-arrow-up')
      $('#sortOrder').val('asc').trigger('change');
    }
    console.log($('#sortOrder').val());
  });

  // Sort field Button is Clicked
  $('.sortFieldBtn').click(function(event) {
    $('#sortFieldTxt').text($(this).text());
    $('#sortField').val($(this).data('field')).trigger('change');
    console.log($('#sortField').val());
  });

  // Sort Table when sortField Changes
  $('#sortField').change(function() {
    sortTable();
  });

  $('#sortOrder').change(function() {
    sortTable();
  });


});

function sortTable(){
  console.log('hi');
  var order = $('#sortOrder').val(),
      field = $('#sortField').val();

  var table = $('#activityTable'),
      targetTH = table.find('th[data-field="' + field + '"]'),
      targetTHInner = targetTH.children('.sortable');

  if(table.bootstrapTable('getOptions').sortName === field && targetTH.data('order') === order){
    	console.log('Already sorted');
      return;
  }

  if (order === 'asc') {
    	targetTH.data('order', 'desc');
    } else {
    	targetTH.data('order', 'asc');
    }

    targetTHInner.click();

}
