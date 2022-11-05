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
							<label>Potrero </label>
							<input type="text" name="nombre_add"  id="nombre_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Tamaño (has.)</label>
							<input type="number" name="tam_add"  id="tam_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Área útil (%)</label>
							<input type="number" name="area_add"  id="area_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Descripción</label>
							<input type="text" name="name" id="name" class="form-control" required>
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