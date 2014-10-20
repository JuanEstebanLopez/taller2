<?php
// $nombre
// $foto
// $info
// $compras
// $precio
// $producto
// $compra
// $pg
echo '<div class="span3">
	<div class="producto">
		
		<div class="fondo_producto">
			'.$nombre.'
		</div>

		<div class="ima ima_mensaje"> 
			<figure>
				<img src="data/'.$foto.'"> 
			</figure> 
		</div>

		<div class="fondo_producto">
			'.$info.'
		
			<div class="row">
				<div class="span1"> 

					<a  class="carrito" href="includes/agregarcarrito.php?producto='.$producto.' & compra='.$compra.' & pg='.$pg.'">
					compras: '.$compras.'</a>
				</div>
				<div class="span1"> 
					$'.$precio.'
				</div>
			</div>
		</div>
	</div>
</div>';
?>
