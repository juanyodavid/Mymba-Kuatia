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
							<label>Id</label>
							<input type="number" name="id_add"  id="id_add" class="form-control" required>
							<!-- <input type="number" name="id_add2"  id="id_add2"class="form-control" required> -->
						</div>
						<div class="form-group">
							<label>Propietario</label>
							<input type="text" name="propietario_add"  id="propietario_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Lugar de expedición</label>
							<input type="text" name="lugar_add" id="lugar_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha de expedicion</label>
							<input type="date" name="fecha_add" id="fecha_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Diseño</label>
							<input type="text" name="diseno_add"  id="diseno_add" class="form-control" required>
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