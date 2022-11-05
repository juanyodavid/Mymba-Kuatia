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
							<label>Peso</label>
							<input type="number" name="peso_add" id="peso_add" class="form-control" required>
      		
						</div>
						<div class="form-group">
							<label>Id animal</label>
							<select name="anim_add"  id="anim_add" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM principal");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_animal].'">'.$valores[id_animal].'</option>';
          						}
          						?>
      						</select>
			
						</div>
						 						
						<div class="form-group">
							<label>Fecha de pesaje</label>
							<input type="date" name="fecha_add" id="fecha_add" class="form-control" required>
						</div>
												 				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" accesskey="s" class="btn btn-success" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>