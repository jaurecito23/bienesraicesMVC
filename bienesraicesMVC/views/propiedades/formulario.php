
                    <fieldset>
                        <legend>Información General</legend>

                        <label for="titulo">Titulo:</label>
                        <input id="titulo" name="propiedad[titulo]" type="text" placeholder="Titulo Propiedad" value="<?php echo san($propiedad->titulo);?>">

                <!-- creo un atributo que va atener un vlaor  -->

                        <label for="precio">Precio:</label>
                        <input id="precio" name="propiedad[precio]" type="number" placeholder="Precio Propiedad" value="<?php echo san($propiedad->precio);?>">

                        <label for="imagen">Imagen:</label>
                        <input id="imagen"  type="file" accept="image/jpeg, image/png" value="<?php echo san($propiedad->imagen) ?>" name="propiedad[imagen]">

                        <?php  if($propiedad->imagen): ?>

                            <img src="../../imagenes/<?php echo $propiedad->imagen?>" class="imagen-pequeña">

                         <?php endif ?>

                        <label for="descripcion">Descripcion: </label>
                        <textarea id="descripcion" name="propiedad[descripcion]" ><?php echo san($propiedad->descripcion);?></textarea>

                    </fieldset>

                    <fieldset>
                        <legend>Información de la Propiedad</legend>
                           <label for="habitaciones">Habitaciones</label>
                        <input id="habitaciones" type="number" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" step="1" value="<?php echo san($propiedad->habitaciones)?>">
                           <label for="baños">Baños</label>
                        <input id="wc" type="number" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" step="1" value="<?php echo san($propiedad->wc);?>">

                           <label for="estacionamiento">Estacionamientos</label>
                        <input id="estacionamiento" type="number" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" step="1" value="<?php echo san($propiedad->estacionamiento);?>">


                    </fieldset>

                    <fieldset>
                        <legend>Vendedor</legend>

                            <label for="vendedor"></label>
                            <select name="propiedad[vendedorId]" id="vendedor">
                                <option selected value="">-- Seleccione --</option>
                            <?php    foreach($vendedores as $vendedor ): ?>

                                    <option
                                    <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''?>
                                    value="<?php echo san($vendedor->id)?>" ><?php echo san($vendedor->nombre) . " " . san($vendedor->apellido);?> </option>

                            <?php endforeach; ?>
                            </select>


                    </div>

                        </select>
                    </fieldset>