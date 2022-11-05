
<?php session_start();
    if(isset($_SESSION['usuario'])){}
    else{header ('location: login.php'); }
?>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mymba Kuaaha</title>
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="stylesheet" href="css/letra.css">
<link rel="stylesheet" href="css/icon.css">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/menu_bubble.css" />
<script src="css/js/jquery.min.js"></script>
<script src="css/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css"><!-- hasta aca carga las librerias -->
<script src="js/menu/snap.svg-min.js"></script>
</head>
<body>
	<div class="menu-wrap">
		<nav class="menu">
			<div class="icon-list">
			<a href="principal.php" class="nounderline"><i class="fa fa-fw fa-tags"></i><span>Animales</spam></a>
				<a href="categoria.php" class="nounderline"><i class="fa fa-fw fa-list-ol"></i><span>Categorias</spam></a>
				<a href="comprador.php" class="nounderline"><i class="fa fa-fw fa-briefcase"></i><span>Compradores</spam></a>
				<a href="det_venta.php" class="nounderline"><i class="fa fa-fw fa-ticket"></i><span>Detalles de venta</spam></a>
				<a href="empleados.php" class="nounderline"><i class="fa fa-fw fa-users"></i><span>Empleados </spam></a>
				<a href="evento.php" class="nounderline"><i class="fa fa-fw fa-comments"></i><span>Eventos</spam></a>
				<a href="inseminacion.php" class="nounderline"><i class="fa fa-fw fa-flask"></i><span>Inseminaciones</spam></a>
				<a href="lote.php" class="nounderline"><i class="fa fa-fw fa-sitemap"></i><span>Lotes</spam></a>
				<a href="marca.php" class="nounderline"><i class="fa fa-fw fa-fire"></i><span>Marcas</spam></a>
				<a href="paricion.php" class="nounderline"><i class="fa fa-fw fa-user-md"></i><span>Pariciones</spam></a>
				<a href="pesaje.php" class="nounderline"><i class="fa fa-fw fa-bar-chart"></i><span>Pesajes</spam></a>
				<a href="potrero.php" class="nounderline"><i class="fa fa-fw fa-location-arrow"></i><span>Potreros</spam></a>
				<a href="sanitacion.php" class="nounderline"><i class="fa fa-fw fa-medkit"></i><span>Sanitaciones</spam></a>
				<a href="cuerno.php" class="nounderline"><i class="fa fa-fw fa-list-alt"></i><span>Tipos de cuerno</spam></a>
				<a href="pelaje.php" class="nounderline"><i class="fa fa-fw fa-list-alt"></i><span>Tipos de pelaje</spam></a>
				<a href="raza.php" class="nounderline"><i class="fa fa-fw fa-list-alt"></i><span>Tipos de razas</spam></a>
				<a href="ubicacion.php" class="nounderline"><i class="fa fa-fw fa-map-marker"></i><span>Ubicaciones</spam></a>
				<a href="vacunacion.php" class="nounderline"><i class="fa fa-fw fa-eyedropper"></i><span>Vacunaciones</spam></a>
				<a href="venta.php" class="nounderline"><i class="fa fa-fw fa-money"></i><span>Ventas</spam></a>
			</div>
		</nav>
		<button class="close-button" id="close-button">Cerrar Menú</button>
		<div class="morph-shape" id="morph-shape" data-morph-open="M-7.312,0H15c0,0,66,113.339,66,399.5C81,664.006,15
					,800,15,800H-7.312V0z;M-7.312,0H100c0,0,0,113.839,0,400c0,264.506,0,400,0,400H-7.312V0z">
			<svg xmlns="#" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
				<path d="M-7.312,0H0c0,0,0,113.839,0,400c0,264.506,0,400,0,400h-7.312V0z"/>
			</svg>
		</div>
	</div>
		

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<button class="menu-button" id="open-button"><i class="fa fa-list" aria-hidden="true"></i>
</button>
						<h2 >Tabla: <b>Compras</b></h2>	
					</div>						
					<div class="col-sm-6">
						<a href="../cerrar.php" class="btn btn-danger" ><i class="material-icons">power_settings_new</i> <span>Cerrar sesión</span></a>
						<a href="../principal.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">keyboard_backspace</i> <span>Atrás</span></a>
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span></a>
                    </div>
                </div>
            </div>
			<div class='col-sm-3 pull-right'>
				<div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                        <button class="btn btn-info" type="button" onclick="load(1);"><i class="fa fa-fw fa-search"></i></button>
                    </div>
                </div>
			</div>
			<div class='clearfix'></div>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include("html/compra_crud/modal_add.php");?>
	<!-- Edit Modal HTML -->
	<?php include("html/compra_crud/modal_edit.php");?>
	<!-- Delete Modal HTML -->
	<?php include("html/compra_crud/modal_delete.php");?>
	<script src="js/compra_script.js"></script>
	<script src="js/menu/classie.js"></script>
	<script src="js/menu/main4.js"></script>
</body>
</html>