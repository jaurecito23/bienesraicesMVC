

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="/auriculares-premium/auriculares-premium">Home</a></li>
							<li><a href="/auriculares-premium/auriculares-premium">Categorias</a></li>
							<li><a href="/auriculares-premium/auriculares-premium/tienda?categoria=<?php echo $categoria_actual["id"];?>"><?php echo $categoria_actual["nombre"];?></a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categorias</h3>
							<div class="checkbox-filter">

                            <?php  foreach ($categorias as $cat):?>
								<div class="input-checkbox">
									<input type="checkbox" id="categoria-<?php echo $cat["id"]; ?>">
									<label for="categoria-<?php echo $cat["id"];?>">
										<span></span>
										<?php echo $cat["nombre"]; ?>
										<small><?php  echo $cantidad_productos[$cat["id"]]["count(nombre)"] ?> </small>
									</label>
								</div>
                                <?php endforeach; ?>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Precio</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Marcas</h3>
							<div class="checkbox-filter">

                            <?php foreach ($marca_productos as $marca):?>

                                <div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										<?php echo $marca["marca"]; ?>
										<small>(<?php echo $marca["count(id_producto)"]?>)</small>
									</label>
								</div>
                                <?php endforeach; ?>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Productos de Calidad</h3>



                            <?php foreach($productos_calidad as $producto_calidad){

                            $prod_calidad = $producto_calidad[0];

                            $imagenes = $prod_calidad->obtenerImagenes(); ?>

                            <!-- aside Widget -->

                                    <div class="product-widget">
                                    <div class="product-img">
                                    <img src="../imagenes_productos/<?php echo $imagenes[0]?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?php foreach ($categorias as $cat){
                                                if($cat["id"]==$prod_calidad->id_categoria){
                                                    echo $cat["nombre"];
                                                } } ?></p>
                                        <h3 class="product-name"><a href="/auriculares-premium/auriculares-premium/producto?id=<?php echo $prod_calidad->id;?>"><?php echo $prod_calidad->nombre; ?></a></h3>
                                        <h4 class="product-price">$<?php echo $prod_calidad->precio; ?> <del class="product-old-price">$<?php echo $prod_calidad->precio_anterior; ?></del></h4>
                                    </div>
                                </div>

                                <?php	} ?>

						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Filtrar Por:
									<select class="input-select filtrar-descuento">
										<option value="0">Precio</option>
										<option value="1">Descuento</option>
									</select>
								</label>

								<label>
									Mostrar:
									<select class="input-select ">
										<option value="0">5</option>
										<option value="1">10</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<!-- <li><a href="#"><i class="fa fa-th-list"></i></a></li> -->
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">


                            <?php foreach($productos as $producto):?>

                            <?php

                            $imagenes = $producto->obtenerImagenes();

                            ?>
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                            <div class="product">
                            <div class="product-img">
                                <img src="../imagenes_productos/<?php echo $imagenes[0]?>"  data-id="<?php echo $producto->id; ?>" alt="">
                                <div class="product-label">
                                    <span class="sale">-<?php echo $producto->descuento; ?>%</span>
                                    <span class="new">OFERTA</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">Auriculares</p>
                                <h3 class="product-name"><a href="producto?id=<?php echo  $producto->id; ?>"><?php echo $producto->nombre; ?></a></h3>
                                <h4 class="product-price">$<?php echo $producto->precio; ?> <del class="product-old-price">$<?php echo $producto->precio_anterior; ?></del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Añadir a Favoritos</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Comparar</span></button>
                                    <button class="quick-view" data-id="<?php echo $producto->id; ?>"><i class="fa fa-eye"></i><span class="tooltipp">Vista Rapida</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn" data-id="<?php echo $producto->id; ?>"><i class="fa fa-shopping-cart"></i> Añadir al Carrito </button>
                            </div>
                            </div>
                            </div>
                            <!-- /product -->
                            <div class="clearfix visible-sm visible-xs"></div>
                            <?php endforeach; ?>



						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
