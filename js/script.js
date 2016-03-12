var $booksFormat = $('#books').hide();
var $musicFormat = $('#music').hide();
var $moviesFormat = $('#movies').hide();
toggleFields();

function toggleFields() {
  $('#format optgroup').hide();
  $('#genre optgroup').hide();

  if ($("#category").val() == "Books") {
    $('#format optgroup#books').show();
    $('#genre optgroup#books').show();
  }

  if ($("#category").val() == "Movies") {
    $('#format optgroup#movies').show();
    $('#genre optgroup#movies').show();
  }

  if ($("#category").val() == "Music") {
    $('#format optgroup#music').show();
    $('#genre optgroup#music').show();
  }
}

$("#category").on("change", toggleFields);
