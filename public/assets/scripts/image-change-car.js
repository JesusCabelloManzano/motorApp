function readURL(input) {
    
    for (var i = 0; i < input.files.length; i++) {

        if (input.files && input.files[i]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $("#cs-upload-ul").html("");
                $("#cs-upload-ul").append('<li><a onclick="borrarA(event)"><img src="' + e.target.result + '" alt="" onclick="borrar(event)" /></a></li>');
            };
    
            reader.readAsDataURL(input.files[i]);
        }
    }
}


function borrar(event) {
    if(event.target.nodeName == "IMG"){
        event.target.parentNode.parentNode.removeChild(event.target.parentNode);
        $("#cs-upload-ul").html("");
    }
};

function borrarA(event) {
    if(event.target.nodeName == "A"){
        event.target.parentNode.removeChild(event.target);
        $("#cs-upload-ul").html("");
    }
};