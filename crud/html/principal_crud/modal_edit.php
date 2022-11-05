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
							<label>ID animal</label>
							<input type="number" name="edit_id"  id="edit_id" class="form-control" required>
							<input type="hidden" name="edit_id2"  id="edit_id2" >
							
							</div>
							
							<div class="form-group">
							<label>HBP_fuego</label>
							<input type="text" name="fuego_edit"  id="fuego_edit" class="form-control" >
							</div>
							
						 <div class="form-group">
							<label>Pelaje</label>
							<select name="pelaje_edit"  id="pelaje_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM pelaje");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_pelaje].'">'.$valores[id_pelaje].'-'.$valores[color_pelaje].'</option>';
          						}
          						?>
      						</select>
			
						</div>
                        <div class="form-group">
							<label>Cuerno</label>
							<select name="cuerno_edit"  id="cuerno_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM cuerno");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_cuerno].'">'.$valores[id_cuerno].'-'.$valores[tipo_cuerno].'</option>';
          						}
          						?>
      						</select>
							
						</div>
                        <div class="form-group">
							<label>Carimbo</label>
							<input type="number" name="carimbo_edit"  id="carimbo_edit" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>Marca</label>
							<select name="marca_edit"  id="marca_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM marca");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_marca].'">'.$valores[id_marca].'-'.$valores[propietario_marca].'</option>';
          						}
          						?>
      						</select>
							
						</div>
                      	<div class="form-group">
							<label>Raza</label>
							<select name="raza_edit"  id="raza_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM raza");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_raza].'">'.$valores[id_raza].'-'.$valores[nom_raza].'</option>';
          						}
          						?>
      						</select>
							
						</div>
                        <div class="form-group">
							<label>Padre</label>
							<input type="number" name="padre_edit"  id="padre_edit" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>Madre</label>
							<input type="number" name="madre_edit"  id="madre_edit" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>Obs.</label>
							<input type="text" name="observacion_edit"  id="observacion_edit" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>P. cárnico</label>
							<input type="number" name="carne_edit"  id="carne_edit" class="form-control" required>
							
						</div>
                        
                        <div class="form-group">
							<label>P. lácteo</label>
							<input type="number" name="leche_edit"  id="leche_edit" class="form-control" required>
							
						</div>
						  <div class="form-group">
							<label>Sexo</label><br>
                            
                            <label class="radio-inline"><input type="hidden" name="sexo_edit" id="sexo_edit" value="Macho" required ></label>
                            <label class="radio-inline"><input type="radio" name="sexo_edit" id="sexo_edit" value="Macho" required >Macho</label>
                            <label class="radio-inline" ><input type="radio" name="sexo_edit" id="sexo_edit" value="Hembra" required>Hembra</label>
                            
             
							
						</div>
						<div class="form-group">
							<label>F. de nacimineto</label>
							<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required>
						</div>
						  <div class="form-group">
							<label>Estado</label><br>
                            
                            <label class="radio-inline"><input type="hidden" name="estado_edit" id="estado_edit" value="Vivo" required ></label>
                            <label class="radio-inline"><input type="radio" name="estado_edit" id="estado_edit" value="Vivo" required >Vivo</label>
                            <label class="radio-inline" ><input type="radio" name="estado_edit" id="estado_edit" value="Muerto" required>Muerto</label>
                            <label class="radio-inline" ><input type="radio" name="estado_edit" id="estado_edit" value="Externo" required>Externo</label>
                            
             
							
						</div>
                        <div class="form-group">
							<label>Foto</label>
							<input type="text" name="foto_edit"  id="foto_edit" class="form-control" required>
							
						</div>
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>