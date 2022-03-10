// edit model
$('#m-edit').on('click', function(){
  $('#myedit').modal(show);
  var[id,nama,foto,jumlah,harga,deskrip]=[$(this).attr('data-id'), $(this).attr('data-nama'), $(this).attr('data-foto'), $(this).attr('data-jumlah'), $(this).attr('data-harga'), $(this).attr('data-deskripsi')];

  $('input#id').val(id);
  $('input#namae').val(nama);
  $('input#jumlah').val(jumlah);
  $('input#harga').val(harga);
  $('input#deskripsi').val(deskrip);
});

// jquery load
$(document).ready(function () {
  $(".preloader").fadeOut('2');
})

