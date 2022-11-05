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
							<label>ID animal</label>
							<input type="number" name="id_add"  id="id_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>HBP_fuego</label>
							<input type="text" name="fuego_add"  id="fuego_add" class="form-control">
							
						</div>
                       
						 <div class="form-group">
							<label>Pelaje</label>
							<select name="pelaje_add"  id="pelaje_add" class="form-control" required>
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
							<select name="cuerno_add"  id="cuerno_add" class="form-control" required>
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
							<input type="number" name="carimbo_add"  id="carimbo_add" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>Marca</label>
							<select name="marca_add"  id="marca_add" class="form-control" required>
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
							<select name="raza_add"  id="raza_add" class="form-control" required>
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
							<input type="number" name="padre_add"  id="padre_add" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>Madre</label>
							<input type="number" name="madre_add"  id="madre_add" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>Obs.</label>
							<input type="text" name="observacion_add"  id="observacion_add" class="form-control" required>
							
						</div>
                        <div class="form-group">
							<label>P. cárnico</label>
							<input type="number" name="carne_add"  id="carne_add" class="form-control" required>
							
						</div>
                        
                        <div class="form-group">
							<label>P. lácteo</label>
							<input type="number" name="leche_add"  id="leche_add" class="form-control" required>
							
						</div>
						  <div class="form-group">
							<label>Sexo</label><br>
                            
                            <label class="radio-inline"><input type="radio" name="sexo_add" id="sexo_add" value="Macho" required >Macho</label>
                            <label class="radio-inline" ><input type="radio" name="sexo_add" id="sexo_add" value="Hembra" required>Hembra</label>
                            
             
							
						</div>
						<div class="form-group">
							<label>F. de nacimineto</label>
							<input type="date" name="fecha_add" id="fecha_add" class="form-control" required>
						</div>
						  <div class="form-group">
							<label>Estado</label><br>
                            
                            <label class="radio-inline"><input type="radio" name="estado_add" id="estado_add" value="Vivo" required >Vivo</label>
                            <label class="radio-inline" ><input type="radio" name="estado_add" id="estado_add" value="Muerto" required>Muerto</label>
                            <label class="radio-inline" ><input type="radio" name="estado_add" id="estado_add" value="Externo" required>Externo</label>
                            
             
							
						</div>
                        <div class="form-group">
							<label>Foto</label>
							<input type="text" name="foto_add"  id="foto_add" class="form-control" required>
							
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