$(document).ready(function() {
  // Sort Order Button is Clicked
  // Change the direction of the arrow
  $('#sortOrderBtn').click(function(event) {

    if($('#sortOrder').val() == 'asc'){
      $('#sortOrderIcon').removeClass('fa-long-arrow-up');
      $('#sortOrderIcon').addClass('fa-long-arrow-down')
      $('#sortOrder').val('desc').trigger('change');
      $orgList.isotope('updateSortData').isotope({
      sortBy: 'name',
      sortAscending: true
      });
    }else {
      $('#sortOrderIcon').removeClass('fa-long-arrow-down');
      $('#sortOrderIcon').addClass('fa-long-arrow-up')
      $('#sortOrder').val('asc').trigger('change');
      $orgList.isotope('updateSortData').isotope({
      sortBy: 'name',
      sortAscending: false
      });
    }
    console.log($('#sortOrder').val());
  });


});

var $orgList = $('.org-list').isotope({
  itemSelector: '.col-sm-3',
  layout: 'fitRows',
  getSortData: {
    name: '.org_name'
  }
});
