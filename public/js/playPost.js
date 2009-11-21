$("document").ready(function(){
});

/*
  var inputBox = $("#post-form input[type=file]");
  var form = $("#post-form");
  var fileButtonText = "File Attach?";
  var span = "<span id=\"file-attach-ask\">"+fileButtonText+"</span>";

  inputBox.remove();
  form.append(span);

  var fileAttachAskButton = $("#file-attach-ask");
  fileAttachAskButton.click(function(){
    if($(this).text() == fileButtonText) {
      $(this).empty();
      $(this).append("Cancled File Attach");
      form.append(inputBox);
    } else {
      $(this).empty();
      $(this).append(fileButtonText);
      inputBox.remove();
    }
  });
  $("#submit").click(function(){
    var url = location.href.split("/");
    var formVal = $("#post-form").serialize();
    $.ajax({
      type: "POST",
      url: "/post/create/"+url[5],
      data: formVal;
      success: function()
               {
                 form.after("<div id=\"notice\">Create</div>");
               },
      error: function()
             {
               form.after("<div id=\"notice\">error</div>");
             }
    });
  });*/

