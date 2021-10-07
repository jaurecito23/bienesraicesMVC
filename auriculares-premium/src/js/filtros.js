document.addEventListener("DOMContentLoaded",()=>{

    eventoFiltrarPorDescuento();


});


function eventoFiltrarPorDescuento(){

    let selectFiltro = document.querySelector(".filtrar-descuento");

    selectFiltro.addEventListener("change",(e)=>{

     if(e.target.value == 0){
       // filtra  por precio

        filtrarPorPrecio(e);

    }else{
        // filtra  por descuento

       filtrarPorDescuento(e);

     }



    });


}


function filtrarPorDescuento(e){

    let xhr = new XMLHttpRequest();

    xhr.open("")


}


function filtrarPorPrecio(e){


}