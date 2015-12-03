-- Se crearon los seeders para platos, detalles y usuarios
-- Además de las relaciones entre platos y detalles, y un menú
-- Pronto lo demás

insert into Combo(usuario_id,fecha) values
	(1,'10/9/2015'),(1,'11/9/2015'),
	(2,'12/9/2015'),(2,'13/9/2015');

insert into ComboPlatos (combo_id,plato_id) values
	(1,1),(1,4),(1,6),(1,8),
	(2,2),(2,4),(2,7),(2,8),
	(3,3),(3,5),(3,6),(3,8),
	(4,1),(4,5),(4,7),(4,8);

insert into ComboPlatoDetalles(comboplatos_id,detalle_id) values
	(1,2),(2,7),(3,12),(4,15),
	(5,2),(6,8),(7,14),(8,16),
	(9,5),(10,10),(11,11),(11,15),
	(12,3),(13,7),(14,13),(15,16);

<<<<<<< HEAD
insert into Orden(usuario_id,fecha,importe,descuento,estado,combo_name, tipo_orden) values
	(3,'10/10/2015',80.5,0,'confirmado','Megacomb'),
	(3,'11/10/2015',70.5,0,'pendiente','Estelar'),
	(3,'4/11/2015',80,0,'pendiente',NULL),
	(3,'6/11/2015',90.3,0,'confirmado',NULL),
  (3,'10/10/2015',80.5,0,'confirmado',NULL),
  (3,'11/10/2015',70.5,0,'pendiente',NULL),
  (3,'4/11/2015',80,0,'pendiente',NULL),
  (3,'6/11/2015',90.3,0,'confirmado','SummerCombo');
=======
>>>>>>> 0209d6763c97eeda51667823e9475187b0d64a2f

insert into OrdenPlatos(orden_id,plato_id) values (1,1),(1,4),(1,6),(1,8),
	(2,2),(2,4),(2,7),(2,8),
	(3,3),(3,5),(3,6),(3,8),
	(4,1),(4,5),(4,7),(4,8),
	(5,1),(5,5),(5,7),(5,8),
	(6,3),(6,5),(6,6),(6,8),
	(7,2),(7,4),(7,7),(7,8),
	(8,1),(8,4),(8,6),(8,8);

insert into OrdenPlatoDetalles(ordenplatos_id,detalle_id) values 
	(1,2),(2,8),(3,11),(4,16),
	(5,2),(6,7),(7,13),(8,15),
	(9,5),(10,10),(11,12),(12,16),
	(13,3),(14,7),(15,14),(16,15),
	(17,2),(18,7),(19,14),(20,15),
	(21,5),(22,10),(23,11),(24,16),
	(25,4),(26,7),(27,13),(28,15),
	(29,3),(30,8),(31,12),(32,16);
