<main class="contenedor sección contenido-centrado">

    <h2 data-cy="heading-login">Iniciar Sesion</h2>

    <?php  foreach ($errores as $error):?>

    <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>

    <?php endforeach;?>
    <form data-cy="formulario-login" method="POST" action="login" class="formulario">
        <!-- novalidate permite que HTML no valide nada-->

        <fieldset>
            <legend>Email y Contraseña</legend>
            <label for="email">Correo</label>
            <input name="email" type="email" placeholder="Tu Email" id="email" require>

            <label for="password">Contraseña</label>
            <input name="password" type="password" if="password" placeholder="Tu Contraseña" require>
            <!--require Permite que no se envie vacio ,                                                                                                            validacion HTML-->
        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde ">
    </form>

</main>