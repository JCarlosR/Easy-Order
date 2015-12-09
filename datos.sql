-- Se crearon los seeders para platos, detalles y usuarios
-- Además de las relaciones entre platos y detalles, y un menú
-- Pronto lo demás

insert into OrdenPlatos(orden_id,plato_id) values
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
