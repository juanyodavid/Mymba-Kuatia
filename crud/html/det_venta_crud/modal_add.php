<?php  require_once ("conexion.php"); ?>
<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>N° de factura</label>
							<input type="text" name="fact_add"  id="fact_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tara de desbaste</label> <br>
                            <input type="radio" id="des_add" name="des_add" value="1" required>
							<label for="des">Sí</label><br>
							<input type="radio" id="des_add2" name="des_add" value="0" required>
							<label for="des_add2">No</label><br>
						</div>
						<div class="form-group">
							<label>Precio por kilo(sin puntos, ni comas)</label>
							<input type="number" name="prec_add"  id="prec_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Id Animal</label>
							<select name="peso_add"  id="peso_add" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM pesaje");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_pesaje].'">'.'N°:'.$valores[id_animal].' || P:'.$valores[peso].'kg || F:'.$valores[fecha_pesaje].'</option>';
          						}
          						?>
      						</select>
						</div>
						<div class="form-group">
							<label>Categoría</label>
							<select name="cat_add"  id="cat_add" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM categoria");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_categoria].'">'.$valores[categoria].'-'.$valores[descripcion].'</option>';
          						}
          						?>
      						</select>
						</div>									
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>