window.onload = function(){
    
    var cuantosLi = document.getElementById("cs-featurelisted-car").getElementsByTagName("li").length;
    
    var wrapper = document.getElementById("wrapper");

    if(cuantosLi<2){
        wrapper.style.height = "100vh";
        wrapper.style.display = "flex";
        wrapper.style.flexFlow  = "column nowrap";
        wrapper.style.justifyContent = "space-between";
    }
}