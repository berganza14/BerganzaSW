$("enviar").click(function(){
  $.ajax({
      type: "GET",
      url: "../xml/Questions.xml",
      cache: false,
      dataType: "xml",
      success: function(xml) {
            $(xml).find("assessmentItem").each(function ()
            {
              var _name = 'Name: ' + $(this).find('name').text();
              console.log(_name);
          });
      }
  });
});
