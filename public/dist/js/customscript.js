$(function(){

  $('[data-toggle="tooltip"]').tooltip();

  $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
  });
});

// Alert Message Using Ajax
function alertMessage(selector,message_status,message_data){
  message = "<div class='alert alert-sm alert-" +message_status+ " alert-ajax'>"
  +"<button type='button' class='close' data-dismiss='alert'>×</button>"
  + message_data + " </div>";
  $(selector).html(message);
  $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
  });
}