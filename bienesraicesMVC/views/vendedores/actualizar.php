
			<main class="contenedor sección">



				<h2>Actualizar Vendedor</h2>
                <a href="/bienesraicesMVC/public/propiedades/admin" class="boton boton-verde">Volver</a>

                    <?php foreach($errores as $error):?>

                        <div class="alerta error">

                        <?php echo $error?>

                        </div>

                            <?php endforeach?>



                <form class="formulario" method="POST" >

                                <!--Form enctype  permite subir archivoos-->
                                <!-- GET Agrega la variable al name de cada input, expone datos en la parte superior-->
                                <!-- POST no expone nada , -->
                                <!-- GET se utiliza cuando tienes que compartir una URL de producto o algo asi , para traer datos de servidor -->
                                <!-- POST se utiliza para enviar datos de forma segura  -->

                                <!--Cuando revisas una URL , es de tipo GET-->
                                <!--Cuando envias datos se convierte en POST-->

                            <?php include 'formulario.php'?>

                        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
                </form>

			</main>



