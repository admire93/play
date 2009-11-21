$("document").ready(function(){
  $("body").append("<div id=\"test\">testing div box</div>");
  $("#test").click(function(){
    $.post(
      "/play/reserved",
      { 
        'name': 'hyojun',
        'body': 'hello'
      },
      function(write){
        if(write) {
          alert(true);
        } else {
          alert(false);
        }
      }
    );
  });
});
