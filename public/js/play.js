$("document").ready(function(){
  $(".rounded").corner;    
  form.init();
  form.hideFile();
  /*
  $(".comment-write").hide();
  $(".comment-view").click(function(){
    $(this).parent().css("width","490px");
    var 
      comments = $.post("/comment/get_comment/",{
                        { created_at: $(this).parent().parent().attr("id") },
                         function(comment) {
                           alert(comment);
                         },"json");
    $(this).parent().append("<div class\"ajax-viwer\">comment-ajax</div>");
    return false;
  });
  */
});

