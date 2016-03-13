var $booksFormat = $('#books').hide();
var $musicFormat = $('#music').hide();
var $moviesFormat = $('#movies').hide();
toggleFields();

function toggleFields() {

  $('#format optgroup').hide();
  $('#genre optgroup').hide();

  switch (true) {
    case ($("#category").val() == "Books"):
      $('#format optgroup#books').show();
      $('#genre optgroup#books').show();
      break;
    case ($("#category").val() == "Movies"):
      $('#format optgroup#movies').show();
      $('#genre optgroup#movies').show();
      break;
    case ($("#category").val() == "Music"):
      $('#format optgroup#music').show();
      $('#genre optgroup#music').show();
      break;
  }

}

$("#category").on("change", toggleFields);
