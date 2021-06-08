function readURL(input) {
    
    for (var i = 0; i < input.files.length; i++) {

        if (input.files && input.files[i]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $("#fotos").append('<li><a onclick="borrarA(event)" data-toggle="tooltip" data-placement="top" title="Borrar imagen"><img src="' + e.target.result + '" alt="" onclick="borrar(event)"/></a></li>');
            };
    
            reader.readAsDataURL(input.files[i]);
        }
    }
}


function borrar(event) {
    if(event.target.nodeName == "IMG"){
        event.target.parentNode.parentNode.removeChild(event.target.parentNode);
    }
};

function borrarA(event) {
    if(event.target.nodeName == "A"){
        event.target.parentNode.removeChild(event.target);
    }
};

function borrarImg(foto) {
    var boton = document.getElementById('botonBorrar' + foto);
    boton.click();
};

function borrarAImg(foto) {
    var boton = document.getElementById('botonBorrar' + foto);
    boton.click();
};

function borrarPortada() {
    var boton = document.getElementById('borrarFotoPortada');
    boton.click();
};

function borrarAPortada() {
    var boton = document.getElementById('borrarFotoPortada');
    boton.click();
};