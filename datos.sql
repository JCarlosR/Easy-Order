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