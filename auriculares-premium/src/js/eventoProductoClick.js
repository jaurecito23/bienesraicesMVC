// Redirige cuando pinchameos en la imagen

function eventoClickAroductos(){


    let productos = document.querySelectorAll(".product-img img");

    productos.forEach((pro)=>{


        pro.addEventListener("click",(e)=>{

            id = e.target.getAttribute("data-id");

            window.location.href = `/auriculares-premium/auriculares-premium/producto?id=${id}`;

        })

    })

}