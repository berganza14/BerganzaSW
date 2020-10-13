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
            $('#placeholder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}