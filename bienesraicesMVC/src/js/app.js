document.addEventListener("DOMContentLoaded", function() {

    eventListeners();
    darkMove();

})


function darkMove() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-sheme: dark)');
    //Se fija en las configuraciones de los usuarios
    if (prefiereDarkMode.matches) {
        document.body.classList.add("dark-mode");
    }
    prefiereDarkMode.addEventListener("change", function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add("dark-mode");
        } else {
            document.body.classList.remove("dark-mode");
        }
    })


    const botonDarkMove = document.querySelector(".dark-move-boton")

    botonDarkMove.addEventListener("click", function() {


        document.body.classList.toggle("dark-move");

    })

}




function eventListeners() {

    const mobileMenu = document.querySelector(".mobile-menu")

    mobileMenu.addEventListener("click", navegacionResponsive)

    // Muestra campos adicionales

    //SELECTOR DE atributo
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');


    metodoContacto.forEach(input => input.addEventListener("click" , mostrarMetodosContacto))






}





function navegacionResponsive() {


    const navegacion = document.querySelector(".navegacion")

    // navegacion.classList.toggle("mostrar")

    if (navegacion.classList.contains("mostrar")) {


        navegacion.classList.remove("mostrar")

    } else {

        navegacion.classList.add("mostrar")

    }

}



function mostrarMetodosContacto(e){
const contactoDiv = document.querySelector('#contacto');

contactoDiv.textContent = "Diste click";

if(e.target.value === "telefono"){

    contactoDiv.innerHTML =`


    <label for="telefono">Numero de Telefono</label>
    <input data-cy="input-telefono" name="contacto[telefono]" id="telefono" type="tel" placeholder="Tu Telefono">


    <p> Elija la fecha y la hora para ser contactado</p>
    <label for="fecha">Fecha</label>
    <input data-cy="input-fecha" name="contacto[fecha]" type="date" id="fecha">
    <label for="hora">Hora</label>
    <input data-cy="input-hora" name="contacto[hora]" type="time" min="09:00" max="18:00" id="hora">

    `

}else{


    contactoDiv.innerHTML = `

    <label for="email">Su Email</label>
    <input data-cy="input-email" name="contacto[email]" id=" email" type="email" placeholder="Tu Email">

    `;

}

}