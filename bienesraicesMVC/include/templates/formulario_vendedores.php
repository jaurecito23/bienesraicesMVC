
                    <fieldset>
                        <legend>Vendedores</legend>

                        <label for="titulo">Nombre</label>
                        <input id="vendedor" name="vendedor[nombre]" type="text" placeholder="Nombre Vendedor" value="<?php echo san($vendedor->nombre);?>">
                        <label for="titulo">Apellido</label>
                        <input id="apellido" name="vendedor[apellido]" type="text" placeholder="Apellido Vendedor" value="<?php echo san($vendedor->apellido)?>" >
                    </fieldset>

                    <fieldset>
                        <legend>Informacion Extra</legend>

                        <label for="titulo">Telefono</label>
                        <input id="telefono" name="vendedor[telefono]" type="tel" placeholder="Telefono Vendedor" value="<?php echo san($vendedor->telefono)?>" >
<!--
                        <label for="titulo">Email</label>
                        <input id="email" name="vendedor[email]" type="email" placeholder="Email Vendedor"> -->


                    </fieldset>