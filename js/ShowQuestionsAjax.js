XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function()
{
  if (XMLHttpRequestObject.readyState == 4)
  {
    var xml = XMLHttpRequestObject.responseXML;
    var tabla = "<tr><th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th></tr>";
    var items = xml.getElementsByTagName("assessmentItem");
    console.log(items.length);
    for(i=0;i<items.length;i++)
    {
      tabla = tabla + "<tr><td>" + items[i].getAttribute('author') + "</td><td>" +
      items[i].childNodes[0].textContent + "</td><td>" +
      items[i].childNodes[1].textContent + "</td></tr>";
    }
    document.getElementById("preguntas").innerHTML = tabla;
    console.log(tabla);
  }
}

function pedirPreguntas()
{
  XMLHttpRequestObject.open("GET", "../xml/Questions.xml");
  XMLHttpRequestObject.send(null);
}
