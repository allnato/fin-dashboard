$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
  $('.fa.fa-users.pull-left').each(function() {
    $(this).css('color', randomColor({luminosity: 'dark'}));
  });
  $orgList.isotope('updateSortData').isotope({
  sortBy: 'name',
  sortAscending: true
  });
  // Sort Order Button is Clicked
  // Change the direction of the arrow
  $('#sortOrderBtn').click(function(event) {

    if($('#sortOrder').val() == 'asc'){
      $('#sortOrderIcon').removeClass('fa-long-arrow-up');
      $('#sortOrderIcon').addClass('fa-long-arrow-down')
      $('#sortOrder').val('desc').trigger('change');
      $orgList.isotope('updateSortData').isotope({
      sortAscending: true
      });
    }else {
      $('#sortOrderIcon').removeClass('fa-long-arrow-down');
      $('#sortOrderIcon').addClass('fa-long-arrow-up')
      $('#sortOrder').val('asc').trigger('change');
      $orgList.isotope('updateSortData').isotope({
      sortAscending: false
      });
    }
    console.log($('#sortOrder').val());
  });


});

var qsRegex;

var $orgList = $('.org-list').isotope({
  itemSelector: '.col-xs-3',
  layout: 'fitRows',
  filter: function() {
    return qsRegex ? $(this).text().match( qsRegex ) : true;
  }
});

// use value of search field to filter
var $quicksearch = $('.quicksearch').keyup( debounce( function() {
  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
  $orgList.isotope();
}, 200 ) );

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  }
}
