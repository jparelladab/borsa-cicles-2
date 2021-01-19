require('./bootstrap');


$(document).ready(function(){


//Add more studies

  $('#add-study').on('click', function(e){
    e.preventDefault();
    while ($('.studies input').length < 2){
      let i = $('.studies input').length +1;
      console.log('hola');
      $('.studies').append("\
        <div class='form-rows mb-2'>\
          <input id='other_studies" + i + "' type='text' class='form-control form-input'  name='other_studies" + i +"'>\
        </div>\
        ");
    }
  });



//Change avatar onclick
$('#avatar-click').on('click', function(e){
  e.preventDefault();
  $('#avatar-input').trigger('click');
  $('#avatar-submit').show();
});

  $("#avatar-submit").on('click', function(){
    $(this).hide();
  });










});
