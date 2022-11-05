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
							<label>Cantidad</label>
							<input type="number" step="any" name="cantidad_add"  id="cantidad_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Peso de compra</label>
							<input type="number" step="any" name="pesok_add" id="pesok_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio por kilo</label>
							<input type="number" step="any" name="precio_add" id="precio_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Suma total</label>
							<input type="number" step="any" name="total_add" id="total_add" class="form-control" required>
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