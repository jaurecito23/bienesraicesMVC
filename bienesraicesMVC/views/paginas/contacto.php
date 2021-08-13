<main class="contenedor sección">

    <h1 data-cy="heading-contacto">Contacto</h1>
    <?php
                if($mensaje){

                    echo "<p data-cy='alerta-envio-form' class='alerta exito'>". $mensaje ."</p>";

                };


            ?>



    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" loading="lazy" alt="imagen contacto">
    </picture>

    <h2 data-cy="heading-formulario">LLene el Formulario de Contacto</h2>

    <form data-cy="formulario-contacto" class="formulario" action="contacto" method="POST">
        <fieldset>

            <legend>Información Personal</legend>
            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" name="contacto[nombre]" id="nombre" type="text" placeholder="Tu Nombre">


            <label for="mensaje">Mensaje</label>
            <textarea data-cy="input-mensaje" name="contacto[mensaje]" id="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la Propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select data-cy="input-opciones" name="contacto[tipo]" id="opciones">

                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            <label for="presupuesto">Precio o Presupuesto</label>
            <input data-cy="input-precio" name="contacto[precio]" type="number" placeholder="Tu precio o Presupuesto" id="presupuesto">

        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p> Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input data-cy="forma-contacto" name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono">
                <label for="contactar-email">Email</label>
                <input data-cy="forma-contacto" name="contacto[contacto]" type="radio" value="email" id="contactar-email">
            </div>

            <div id="contacto">




            </div>



        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">

    </form>

</main>