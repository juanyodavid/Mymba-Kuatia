#database NAME AN CREATION
CREATE DATABASE IF NOT EXISTS mymba_database;
#select in the database
USE mymba_database;
#activa el uso de eventos
SET GLOBAL event_scheduler = ON;
#creation of tables

#POTREROS
create table if  not exists potrero(
	id_potrero INT NOT NULL AUTO_INCREMENT, # id of the paddock
	nombre_pot varchar(50), # name of paddock
	tamanho int(11),
	putil int(11),
	desc_pot varchar(50), # descripcion
    index(id_potrero),
	primary key(id_potrero)# principal element
)ENGINE=INNODB;

#RAZA
create table if  not exists raza(
	id_raza INT NOT NULL AUTO_INCREMENT,
	nom_raza varchar(50),
	desc_raza varchar(50),
    index(id_raza),
    primary key(id_raza)
)ENGINE=INNODB;

#COMPRA
create table if  not exists compra(
	id_compra int not null AUTO_INCREMENT ,
 	cantidad_compra varchar(50),
	peso_compra float,
    precio_kilo float,
	valor_compra float,
	fecha_compra date,
    primary key(id_compra)
)ENGINE=INNODB;

#PELAJE
create table if  not exists pelaje(
	id_pelaje INT NOT NULL AUTO_INCREMENT,
	color_pelaje varchar(50),
	index(id_pelaje),
    primary key(id_pelaje)
)ENGINE=INNODB;

#CUERNO
create table if  not exists cuerno(
	id_cuerno INT NOT NULL AUTO_INCREMENT,
	tipo_cuerno varchar(50),
	index(id_cuerno),
    primary key(id_cuerno)
)ENGINE=INNODB;

#LOTE
create table if  not exists lote(
	id_lote INT NOT NULL AUTO_INCREMENT, 
	nombre_lote varchar(50),
	fecha_lote date,
	observ_lote varchar(50),
    index(id_lote),
    primary key(id_lote)
)ENGINE=INNODB;

#MARCA
create table if  not exists marca(
	id_marca INT NOT NULL , 
    propietario_marca varchar(50),
	lugar_marca varchar(50),
	fecha_marca date,
    tipo_marca varchar(50),
	diseno_marca varchar(50),
    index(id_marca),
    primary key(id_marca)
)ENGINE=INNODB;

#CATEGORIA
create table if  not exists categoria(
	id_categoria int not null auto_increment,
	categoria  varchar(50),
	descripcion  varchar(50),
    index(id_categoria),
    primary key(id_categoria)
    
)ENGINE=INNODB;
#aqui agregar las categorias por precarga
INSERT INTO `categoria` (`id_categoria`, `categoria`, `descripcion`) 
VALUES 
						(1, 'Vaca', ''), 
						(2, 'Vaquilla', ''),
						(3, 'Novillo', ''),
						(4, 'Toro', ''),
						(5, 'Desmamante macho', ''),
						(6, 'Desmamante hembra', ''),
						(7, 'Ternero macho', ''),
						(8, 'Ternero hembra', ''),
						(9, 'Buey', '')




#COMPRADORES
create table if  not exists comprador(
	id_comprador int not null auto_increment,
	nombre varchar(50),
	ruc  varchar(50),
	celular  int(11),
	direccion  varchar(50),
	obs  varchar(50),
    index(id_comprador),
    primary key(id_comprador)
    
)ENGINE=INNODB;

#EMPLEADOS
create table if  not exists empleado(
	id_empleado int not null auto_increment,
	nombre varchar(50),
	ciudad  varchar(50),
	ult_ref  varchar(50),
	celular  int(11),
	obs  varchar(50),
    index(id_empleado),
    primary key(id_empleado)
    
)ENGINE=INNODB;

#PRINCIPAL
create TABLE IF NOT EXISTS principal(
	id_animal INT NOT NULL, #animal number
    hbp_fuego varchar(50),			#number of mark by fire
    carimbo INT NOT NULL, #NUMBER OF STAMP
    padre int, # father
    madre int,# mother
    observacion varchar(50), # posible observations
	perfil_carnico float, # meet profile
	perfil_lechero float,# milk profile
	sexo varchar(50), # animal sex
	fecha_nac date, # date
	estado varchar(50), #status
	foto varchar(50), #picture
    index (id_animal),
	primary key(id_animal), # principal element
    id_marca int , # mark of animal
    id_raza int not null ,
	id_pelaje int NOT NULL,# skin color
    id_cuerno int not null,
	constraint ppal_pelaje
	foreign key(id_pelaje)
    references pelaje(id_pelaje) on delete no action on update cascade,
    constraint ppal_cuerno
	foreign key(id_cuerno)
    references cuerno(id_cuerno) on delete no action on update cascade,
    constraint ppal_raza
	foreign key(id_raza)
    references raza(id_raza) on delete no action on update cascade,
    constraint ppal_marca
	foreign key(id_marca)
    references marca(id_marca) on delete no action on update cascade
)ENGINE=INNODB; 

#EVENTOS  
create table if  not exists evento(
	id_evento int not null auto_increment,
	fecha_evento date,
	desc_evento varchar(50),
	primary key (id_evento),
	id_animal  INT NOT NULL,
	constraint evento_animal
    foreign key(id_animal)
    references principal(id_animal) on delete no action on update cascade
)ENGINE=INNODB;
#EVENTOS  ANTIGUOS
create table if  not exists evento_antiguo(
	id_evento int not null auto_increment,
	fecha_evento date,
	desc_evento varchar(50),
	primary key (id_evento),
	id_animal  INT NOT NULL,
	constraint evento_antiguo_animal
    foreign key(id_animal)
    references principal(id_animal) on delete no action on update cascade
)ENGINE=INNODB;

#PESAJE
create table if  not exists pesaje(
	id_pesaje int not null auto_increment,
	peso float,
	fecha_pesaje date,
    index(id_pesaje),
    primary key(id_pesaje),
	id_animal  INT NOT NULL,
	constraint pesaje_animal
    foreign key (id_animal)
    references principal(id_animal) on delete no action on update cascade
)ENGINE=INNODB;
#PESAJE ANTIGUOS
create table if  not exists pesaje_antiguo(
	id_pesaje int not null auto_increment,
	peso float,
	fecha_pesaje date,
    index(id_pesaje),
    primary key(id_pesaje),
	id_animal  INT NOT NULL,
	constraint pesaje_antiguo_animal
    foreign key (id_animal)
    references principal(id_animal) on delete no action on update cascade
)ENGINE=INNODB;

#DETALLE DE VENTAS
create table if  not exists det_venta(
	id_det_venta int not null auto_increment,
	factura varchar(50),
	precio_kilo float, #precio por kilo
	precio_total float, # precio por kilo por tara_desv
    index(factura),
    primary key(id_det_venta),
	id_pesaje  int NOT NULL,
	id_categoria int not null,
	constraint detalle_pesaje
    foreign key (id_pesaje)
    references pesaje(id_pesaje) on delete no action on update cascade,
	constraint detalle_categoria
    foreign key (id_categoria)
    references categoria(id_categoria) on delete no action on update cascade
)ENGINE=INNODB;
#DETALLE DE VENTAS ANTIGUO
create table if  not exists det_venta_antiguo(
	id_det_venta int not null auto_increment,
	factura varchar(50),
	precio_kilo float, #precio por kilo
	precio_total float, # precio por kilo por tara_desv
    index(factura),
    primary key(id_det_venta),
	id_pesaje  int NOT NULL,
	id_categoria int not null,
	constraint detalle_pesaje_ant
    foreign key (id_pesaje)
    references pesaje(id_pesaje) on delete no action on update cascade,
	constraint detalle_categoria_ant
    foreign key (id_categoria)
    references categoria(id_categoria) on delete no action on update cascade
)ENGINE=INNODB;


#VENTA
create table if  not exists venta(
	id_venta int not null auto_increment,
	factura varchar(50),
	cant_cat int(11), # la cantidad de animales en la factura
	prec_tot float,
	prec_unit float,
	obs varchar(50),
	fecha date,
    primary key(id_venta),
	id_comprador int not null,
	id_categoria int not null,
	constraint venta_compradorr
    foreign key (id_comprador)
    references comprador(id_comprador) on delete no action on update cascade,
	constraint venta_categoriar
    foreign key (id_categoria)
    references categoria(id_categoria) on delete no action on update cascade
)ENGINE=INNODB;
#VENTA
create table if  not exists venta_antiguo(
	id_venta int not null auto_increment,
	factura varchar(50),
	cant_cat int(11), # la cantidad de animales en la factura
	prec_tot float,
	prec_unit float,
	obs varchar(50),
	fecha date,
    primary key(id_venta),
	id_comprador int not null,
	id_categoria int not null,
	constraint venta_compradorrr
    foreign key (id_comprador)
    references comprador(id_comprador) on delete no action on update cascade,
	constraint venta_categoriarr
    foreign key (id_categoria)
    references categoria(id_categoria) on delete no action on update cascade
)ENGINE=INNODB;

#INSEMINACION
create table if not exists inseminacion(
	id_inseminacion int not null auto_increment,
    fecha_servicio date,
    obs varchar(50),
    primary key (id_inseminacion),
    madre_id int not null,
    padre_id int not null,
	constraint inseminacion_madre
	foreign key(madre_id)
    references principal(id_animal) on delete no action on update cascade,
	constraint inseminacion_padre
	foreign key(padre_id)
    references principal(id_animal) on delete no action on update cascade
)ENGINE=INNODB;

#PARICION
create table if  not exists paricion(
	id_paricion int not null auto_increment,
    id_cria int not null,
    carimbo_cria varchar(50),
    sexo_cria varchar(50),
    fecha_par date,
   	observ_paricion varchar(50), 
    estado varchar(50),
    primary key(id_paricion),
    madre_id int NOT NULL, # mark of animal
	padre_id int not null, # complementary mark
    id_raza int not null ,
    id_pelaje int NOT NULL,# skin color
	constraint paricion_pelaje
	foreign key(id_pelaje)
    references pelaje(id_pelaje) on delete no action on update cascade,
    constraint paricion_raza
	foreign key(id_raza)
    references raza(id_raza) on delete no action on update cascade,
    constraint paricion_madre
	foreign key(madre_id)
    references principal(id_animal) on delete no action on update cascade,
	constraint paricion_padre
	foreign key(padre_id)
    references principal(id_animal) on delete no action on update cascade
)ENGINE=INNODB;

#SANITACION
create table if  not exists sanitacion(
	id_sanitacion int not null auto_increment,
	fecha_sanit date,
	producto varchar(50),
	dosis  varchar(50),
	indicacion  varchar(50),
	obser_sanit  varchar(50),
    primary key(id_sanitacion),	
    id_animal  INT NOT NULL,
    constraint sanitacion_animal
    foreign key (id_animal)
    references principal(id_animal)on delete no action on update cascade
)ENGINE=INNODB;
#SANITACION ANTIGUOS
create table if  not exists sanitacion_antiguo(
	id_sanitacion int not null auto_increment,
	fecha_sanit date,
	producto varchar(50),
	dosis  varchar(50),
	indicacion  varchar(50),
	obser_sanit  varchar(50),
    primary key(id_sanitacion),	
    id_animal  INT NOT NULL,
    constraint sanitacion_antiguo_animal
    foreign key (id_animal)
    references principal(id_animal)on delete no action on update cascade
)ENGINE=INNODB;


#VACUNACION  
create table if  not exists vacunacion(
	id_vacunacion int not null auto_increment,
	fecha_vacunacion date,
	producto varchar(50),
	dosis  varchar(50),
	indicacion  varchar(50),
	observacion  varchar(50),
    index(id_vacunacion),
    primary key(id_vacunacion)
    
)ENGINE=INNODB;
#VACUNACION  ANTIGUOS
create table if  not exists vacunacion_antiguo(
	id_vacunacion int not null auto_increment,
	fecha_vacunacion date,
	producto varchar(50),
	dosis  varchar(50),
	indicacion  varchar(50),
	observacion  varchar(50),
    index(id_vacunacion),
    primary key(id_vacunacion),
    id_animal  INT NOT NULL
)ENGINE=INNODB;

#UBICACION
create table if  not exists ubicacion(
	id_ubicacion int not null auto_increment,
    observacion_ubic varchar(50),
    fecha_entrada date,
    primary key(id_ubicacion),
	id_animal int not null,
    id_potrero int not null,
	id_lote int not null,
	constraint ubi_potrero
    foreign key(id_potrero)
    references potrero(id_potrero) on delete no action on update cascade,
    constraint ubi_animal
	foreign key(id_animal)
    references principal(id_animal) on delete no action on update cascade,
    constraint ubi_lote
	foreign key(id_lote)
    references lote(id_lote) on delete no action on update cascade
)ENGINE=INNODB;
#UBICACION ANTIGUOS
create table if  not exists ubicacion_antiguo(
	id_ubicacion int not null auto_increment,
    observacion_ubic varchar(50),
    fecha_entrada date,
    primary key(id_ubicacion),
	id_animal int not null,
    id_potrero int not null,
	id_lote int not null,
	constraint ubi_antiguo_potrero
    foreign key(id_potrero)
    references potrero(id_potrero) on delete no action on update cascade,
    constraint ubi_antiguo_animal
	foreign key(id_animal)
    references principal(id_animal) on delete no action on update cascade,
    constraint ubi_antiguo_lote
	foreign key(id_lote)
    references lote(id_lote) on delete no action on update cascade
)ENGINE=INNODB;


-- DELIMITER $$
-- CREATE EVENT if not exists eliminar_ubicacion
--     ON SCHEDULE
--       EVERY 1 DAY  #Puedes escoger cada cuanto tiempo se ejecuta el evento 
--     DO
--     BEGIN
--       DELETE FROM ubicacion WHERE `fecha_entrada` < DATE_SUB(NOW(), INTERVAL 5 month);
--          #Donde dice `fecha_entrada` pones la columna de la fecha que tiene tu tabla y donde dice " -6*3600" es el tiempo que quieres definir para eliminar el registro (eliminar el registro si cumplió las 6 horas de estar subido) 
-- 	END $$
-- DELIMITER ;

--  ##funciona perfectamente para eliminar los que tienen mas de cinco meses

-- DELIMITER $$
-- CREATE EVENT if not exists eliminar_vacunacion
--     ON SCHEDULE
--       EVERY 1 DAY  #Puedes escoger cada cuanto tiempo se ejecuta el evento 
--     DO
--     BEGIN
--       DELETE FROM ubicacion WHERE `fecha_entrada` < DATE_SUB(NOW(), INTERVAL 5 month);
--          #Donde dice `fecha_entrada` pones la columna de la fecha que tiene tu tabla y donde dice " -6*3600" es el tiempo que quieres definir para eliminar el registro (eliminar el registro si cumplió las 6 horas de estar subido) 
-- 	END $$
-- DELIMITER ;


-- DELIMITER $$
-- CREATE EVENT if not exists eliminar_sanitacion
--     ON SCHEDULE
--       EVERY 1 DAY  #Puedes escoger cada cuanto tiempo se ejecuta el evento 
--     DO
--     BEGIN
--       DELETE FROM ubicacion WHERE `fecha_entrada` < DATE_SUB(NOW(), INTERVAL 5 month);
--          #Donde dice `fecha_entrada` pones la columna de la fecha que tiene tu tabla y donde dice " -6*3600" es el tiempo que quieres definir para eliminar el registro (eliminar el registro si cumplió las 6 horas de estar subido) 
-- 	END $$
-- DELIMITER ;

-- DELIMITER $$
-- CREATE EVENT if not exists eliminar_eventos
--     ON SCHEDULE
--       EVERY 1 DAY  #Puedes escoger cada cuanto tiempo se ejecuta el evento 
--     DO
--     BEGIN
--       DELETE FROM ubicacion WHERE `fecha_entrada` < DATE_SUB(NOW(), INTERVAL 5 month);
--          #Donde dice `fecha_entrada` pones la columna de la fecha que tiene tu tabla y donde dice " -6*3600" es el tiempo que quieres definir para eliminar el registro (eliminar el registro si cumplió las 6 horas de estar subido) 
-- 	END $$
-- DELIMITER ;

-- DELIMITER $$
-- CREATE EVENT if not exists eliminar_pesaje
--     ON SCHEDULE
--       EVERY 1 DAY  #Puedes escoger cada cuanto tiempo se ejecuta el evento 
--     DO
--     BEGIN
--       DELETE FROM ubicacion WHERE `fecha_entrada` < DATE_SUB(NOW(), INTERVAL 5 month);
--          #Donde dice `fecha_entrada` pones la columna de la fecha que tiene tu tabla y donde dice " -6*3600" es el tiempo que quieres definir para eliminar el registro (eliminar el registro si cumplió las 6 horas de estar subido) 
-- 	END $$
-- DELIMITER ;

-- DELIMITER $$
-- CREATE EVENT if not exists eliminar_det_venta
--     ON SCHEDULE
--       EVERY 1 DAY  #Puedes escoger cada cuanto tiempo se ejecuta el evento 
--     DO
--     BEGIN
--       DELETE FROM det_venta WHERE `fecha_entrada` < DATE_SUB(NOW(), INTERVAL 5 month);
--     END $$
-- DELIMITER ;

-- DELIMITER $$
-- CREATE EVENT if not exists eliminar_venta
--     ON SCHEDULE
--       EVERY 1 DAY  #Puedes escoger cada cuanto tiempo se ejecuta el evento 
--     DO
--     BEGIN
--       DELETE FROM venta WHERE `fecha` < DATE_SUB(NOW(), INTERVAL 5 month);
-- 	END $$
-- DELIMITER ;