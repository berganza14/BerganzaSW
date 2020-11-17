$(document).ready(function()
{
  refresh();
  //setInterval(refresh(), 100);
});

function refresh()
{
  $.ajax({
      type: "GET",
      url: "../xml/Questions.xml",
      cache: false,
      dataType: "xml",
      success: function(xml)
      {
            var correo = $('#correo').val();
            var userCont = $(xml).find("assessmentItem[author='"+correo+"']").length;
            var cont = $(xml).find("assessmentItem").length;
            $('#counter2').text("Mis preguntas/Todas las preguntas: " + userCont + "/" + cont);
      }
  });
}
