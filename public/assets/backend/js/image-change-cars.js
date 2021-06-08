function readURL(input) {
    
    for (var i = 0; i < input.files.length; i++) {

        if (input.files && input.files[i]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $("#fotos").append('<img src="' + e.target.result + '" alt="" width="200px""/>&nbsp;&nbsp&nbsp&nbsp&nbsp');
            };
    
            reader.readAsDataURL(input.files[i]);
        }
    }
}

function borrar($foto) {
    document.getElementById('#botonBorrar').value = $foto;
    document.getElementById('botonBorrar').click();
};

function borrarA($foto) {
    document.getElementById('#botonBorrar').value = $foto;
    document.getElementById('botonBorrar').click();
};