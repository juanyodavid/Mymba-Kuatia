<?php require_once ("conexion.php");// conecta con la base de datos ?>
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
							<input type="text"  name="fact_add"  id="fact_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Obs.</label>
							<input type="text"name="obs_add" id="obs_add" class="form-control" >
						</div>
						<div class="form-group">
							<label>Comprador</label>
							<select name="comp_add"  id="comp_add" class="form-control" >
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM comprador");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_comprador].'">'.$valores[nombre].'-'.$valores[ruc].'</option>';
          						}
          						?>
      						</select>
						</div>
						<div class="form-group">
							<label>Fecha</label>
							<input type="date" name="fecha_add" id="fecha_add" class="form-control" required>
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