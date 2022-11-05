<?php  require_once ("conexion.php"); ?>
<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>N° de factura</label>
							<input type="text" name="fact_edit"  id="fact_edit" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Tara de desbaste</label> <br>
                            <input type="radio" id="des_edit" name="des_edit" value="1" required>
							<label for="des">Sí</label><br>
							<input type="radio" id="des_edit2" name="des_edit" value="0" required>
							<label for="des_edit2">No</label><br>
						</div>
						<div class="form-group">
							<label>Precio por kilo</label>
							<input type="number" name="prec_edit"  id="prec_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Id Animal</label>
							<select name="animal_edit"  id="animal_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM pesaje");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_animal].'">'.'N°:'.$valores[id_animal].' || P:'.$valores[peso].'kg || F:'.$valores[fecha_pesaje].'</option>';
          						}
          						?>
      						</select>
						</div>
						<div class="form-group">
							<label>Categoría</label>
							<select name="cat_edit"  id="cat_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM categoria");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[categoria].'">'.$valores[categoria].'-'.$valores[descripcion].'</option>';
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