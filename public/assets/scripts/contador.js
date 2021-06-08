window.onload = function(){
    
    var p = document.getElementById("descripcion");
    p.innerHTML = 0;

    function calculoPalabras(){
        var total = 0;
        var cuantasLetras = document.getElementById("comentario").value.length;
        if(cuantasLetras < 3001){
            p.innerHTML = total + cuantasLetras;
        }
    }

    document.getElementById("comentario").addEventListener("keyup", calculoPalabras);
    
}