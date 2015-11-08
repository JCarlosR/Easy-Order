insert into Plato (tipo_id,nombre,descripcion,imagen,precio) values
	(1,
	'Caldo de Gallina',
	'El plato constara de la presa de gallina y caldo',
	'caldogallina', -- path
	5),
	(1,
	'Shambar',
	'El plato constará del pellejo, caldo y menestras',
	'shambar', -- path
	5),
	(1,
	'Papa a la Huancaina',
	'El plato constara de crema Huancaina, huevo y papa',
	'papahuancaina', -- path
	3),
	(2,
	'Arroz con Pato',
	'El plato constara del pato, guiso y arroz',
	'pato', -- path
	5),
	(2,
	'Lomito saltado',
	'El plato constara del lomito tradicional y papa frita',
	'lomito', -- path
	5),
	(3,
	'Mazamorra',
	'El platillo constara de un vaso de mazamorra',
	'mazamorra', -- path
	5),
	(3,
	'Ensalada de Fruta',
	'El plato constara del porciones de platano, papaya y mandarina',
	'ensaladaf', -- path
	5),
	(4,
	'Jugo especial',
	'El jugo constara de papaya y piña', 
	'jugoespecial', -- path
	5);

insert into Detalle (nombre,descripcion,imagen,precio) values
	(
		'Huevo sancochado',
		'Huevo de gallina cocido o duro',
		'huevosancochado', -- path
		0.5 -- referencial
	),
	(
		'Pan de manteca',
		'Tres panes de manteca',
		'panmanteca', -- path
		0.5 -- referencial
	),
	(
		'Mote',
		'Porción de mote caliente',
		'mote', -- path
		0.3 -- referencial
	),
	(
		'Cancha perla',
		'Porción de cancha perla',
		'cancha', -- path
		0.3 -- referencial
	),
	(
		'Lechuga',
		'Porción de lechuga fresca',
		'lechuga', -- path
		0.2 -- referencial
	),
	(
		'Aceituna',
		'Una aceituna fresca',
		'aceituna', -- path
		0.2 -- referencial
	),
	(
		'Papa Sancochada',
		'Dos papas sancochadas',
		'papasancochada', -- path
		0.9 -- referencial
	),
	(
		'Menestra',
		'Porción de Menestra estandar',
		'menestra', -- path
		0.5 -- referencial
	),
	(
		'Garbanzillo',
		'Porción de garbancillo estandar',
		'garbancillo', -- path
		0.5 -- referencial
	),
	(
		'Crema Huancaina',
		'Porción de crema huancaina',
		'cremahuancaina', -- path
		0.5 -- referencial
	),
	(
		'Canelita en polvo',
		'Canelita en polvo',
		'canelita', -- path
		0.2 -- referencial
	),
	(
		'Guindon extra',
		'Un guindon',
		'guindon', -- path
		0.2 -- referencial
	),
	(
		'Leche condensada',
		'Dos cucharadas de leche condensada',
		'lechecondensada', -- path
		0.2 -- referencial
	),
	(
		'Fresas',
		'Una porción de fresas',
		'fresas', -- path
		0.4 -- referencial
	),
	(
		'Extracto de fresas',
		'Un extracto de fresas',
		'extfresa', -- path
		0.5 -- referencial
	)
	,
	(
		'Extracto de plátano',
		'Un extracto de plátano',
		'extplatano', -- path
		0.5 -- referencial
	);

-- Detalles disponibles para 1 plato específico
insert into PlatoDetalles (plato_id,detalle_id) values (1,1),(1,2),(1,3),(2,2),(2,4),(3,5),(3,6),(4,7),(4,8),(4,9),
	(5,10),(5,7),(6,11),(6,12),(7,13),(7,14),(8,15),(8,16);


insert into Menu(fecha)VALUES('2015-11-7');
insert into MenuPlatos(menu_id,plato_id) VALUES
(1,1),(1,2),(1,4),(1,6),(1,8);

insert into `usuario` (`id`, `username`, `full_name`, `password`, `phone`, `email`, `tipo`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'administrador', 'Administrador Easy-Order', '$2y$10$9sL.j10Zg9FQUZj.iLvk3uf/VKLcgQoPGksbhAMW0V.EyC1KKvXbq', '555555555', 'admin@admin.com', 2, NULL, '2015-11-05 02:07:01', '2015-11-05 02:07:01'),
(2, 'chef', 'Chef Easy-Order', '$2y$10$9sL.j10Zg9FQUZj.iLvk3uf/VKLcgQoPGksbhAMW0V.EyC1KKvXbq', '555555555', 'chef@chef.com', 1, NULL, '2015-11-05 02:07:01', '2015-11-05 02:07:01');