var 
    notice = new Array("alias required","email required","WriteDown Tag here",
                       "file name required","typing name that used in url",
                       "typing title that used in title","write your content"),
    form = {
      'init': function(){
                if($("#email").val() == "") {
                  $("#email").attr("value",notice[1]);
                }
                $("#alias").attr("value",notice[0]);
                $("#tag").attr("value",notice[2]);
                $("#file-name").attr("value",notice[3]);
                $("#url-name").attr("value",notice[4]);
                $("#title").attr("value",notice[5]);
                $("#hit-body").attr("value",notice[6]);
                this.event();
              },
      'event': function(){
                 $("input,textarea").click(function(){
                   for(i=0; i<=notice.length; i++) {
                     if($(this).val() == notice[i]) {
                       $(this).attr("value","");
                       $(this).css('color','#000');
                     }
                   }
                 });
                 $("submit").submit(function(){
                   for(i=0; i<=notice.length; i++) {
                     if($("input,textarea").val() == notice[i]) {
                       $("input,textarea").attr("value","");
                     }
                   }
                 });
               },
      'hideFile': function() {
                      $("#file-name").before("<button id=\"file-view\">FileAttach</button>");
                      $("#file-name").hide();
                      $("#userfile").hide();

                      $("#file-view").click(function(){
                        $("#file-name").show();
                        $("#userfile").show();
                        $("#file-view").hide();
                        return false;
                      });
                    }
    };

