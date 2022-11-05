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
							<label>Producto</label>
							<input type="text" name="producto_add"  id="producto_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Dosis</label>
							<input type="text" name="dosis_add"  id="dosis_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Indicación</label>
							<input type="text" name="ind_add"  id="ind_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="obs_add"  id="obs_add" class="form-control" >
							
						</div>



						<div class="form-group">
							<label>Nº de lote</label>
							<select name="lote_add"  id="lote_add" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM lote");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_lote].'">'.$valores[id_lote].' - '.$valores[nombre_lote].' - '.$valores[fecha_lote].' - '.$valores[observ_lote].'</option>';
          						}
          						?>
      						</select>
						</div>
						<div class="form-group">
							<label>Fecha de sanitación</label>
							<input type="date" name="fecha_add" id="fecha_add" class="form-control" required>
						</div>
						
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" accesskey = "s" class="btn btn-success" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>