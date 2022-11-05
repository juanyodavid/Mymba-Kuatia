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
							<label>Nombre</label>
							<input type="text" name="nombre_add"  id="nombre_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Ruc</label>
							<input type="text" name="ruc_add"  id="ruc_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Celular</label>
							<input type="text" name="cel_add"  id="cel_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Dirección</label>
							<input type="text" name="dir_add"  id="dir_add" class="form-control" >
						</div>
						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="obs_add"  id="obs_add" class="form-control" >
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