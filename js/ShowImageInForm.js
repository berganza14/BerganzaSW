$(document).ready(function() 
{
    $('#imagen').change(function() 
    {
        verImagen(this);
    });
});

function verImagen(input)
{
    if (input.files && input.files[0]) 
    {
        var reader = new FileReader();

        reader.onload = function (e) 
        {
            console.log("Añadiendo imagen");
            var picture = '<img src="' + e.target.result + '" style="width:200px;height:200px;" >'
            $(".newImagen").empty().append(picture);
        }
        reader.readAsDataURL(input.files[0]);
    }
}