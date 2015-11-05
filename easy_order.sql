DROP DATABASE if exists easy_order;

CREATE DATABASE easy_order;
USE easy_order;

CREATE TABLE Usuario
(
	id int AUTO_INCREMENT PRIMARY KEY,
	
	username varchar(45) NOT NULL UNIQUE,
	full_name varchar(100) NOT NULL,
	password varchar(70) NOT NULL,
	phone varchar(18) NOT NULL,
	email varchar(85) NOT NULL,
	tipo int NOT NULL, -- 0: Usuario | 1: Chef | 2: Administrador

	remember_token varchar(100),
	updated_at timestamp, 
	created_at timestamp
);


-- Tipos de plato
CREATE TABLE Tipo
(
	id int AUTO_INCREMENT PRIMARY KEY,
	descripcion varchar(45) NOT NULL
);

-- Tipos por defecto
INSERT Tipo (descripcion) VALUES
('Entradas'),
('Segundos'),
('Postres'),
('Bebidas');


-- Información de cada plato (independiente)
CREATE TABLE Plato
(
	id int AUTO_INCREMENT PRIMARY KEY,

	tipo_id int,
	FOREIGN KEY (tipo_id) REFERENCES Tipo(id),

	nombre varchar(50) NOT NULL,
	descripcion varchar(255) NOT NULL,
	imagen varchar(60), -- path
	precio decimal(8,2) NOT NULL -- referencial
);

-- Detalles (un detalle puede asociarse a varios platos)
CREATE TABLE Detalle
(
	id int AUTO_INCREMENT PRIMARY KEY,

	nombre varchar(50) NOT NULL,
	descripcion varchar(255) NOT NULL,
	imagen varchar(60), -- path
	precio decimal(8,2) NOT NULL -- referencial
);

-- Detalles disponibles para 1 plato específico
CREATE TABLE PlatoDetalles
(
	id int AUTO_INCREMENT PRIMARY KEY,

	plato_id int NOT NULL,
	detalle_id int NOT NULL,

	FOREIGN KEY (plato_id) REFERENCES Plato(id),
	FOREIGN KEY (detalle_id) REFERENCES Detalle(id)
);


-- Cada menú con índice auto-incremental
CREATE TABLE Menu
(
	id int AUTO_INCREMENT PRIMARY KEY,
	fecha date NOT NULL
);

-- Detalle de cada menú
CREATE TABLE MenuPlatos
(
	id int AUTO_INCREMENT PRIMARY KEY,

	menu_id int NOT NULL,
	plato_id int NOT NULL,

	FOREIGN key (menu_id) REFERENCES Menu(id),
	FOREIGN key (plato_id) REFERENCES Plato(id)

);


-- Cada usuario puede crear sus propios combos
-- Los combos destacados son creados por el administrador
-- O bien es un clon del combo de algún usuario
CREATE TABLE Combo
(
	id int AUTO_INCREMENT PRIMARY KEY,
	
	usuario_id int NOT NULL,
	FOREIGN KEY (usuario_id) REFERENCES Usuario(id),

	fecha date NOT NULL,
	destacado tinyint -- 0: No | 1: Sí
);

-- Platos que incluye un combo
CREATE TABLE ComboPlatos
(
	id int AUTO_INCREMENT PRIMARY KEY,

	combo_id int NOT NULL,
	FOREIGN KEY (combo_id) REFERENCES Combo(id),

	plato_id int NOT NULL,
	FOREIGN KEY (plato_id) REFERENCES Plato(id)

);

-- Detalles que incluye un plato en un combo
CREATE TABLE ComboPlatoDetalles
(
	id int AUTO_INCREMENT PRIMARY KEY,

	comboplatos_id int NOT NULL,
	FOREIGN KEY (comboplatos_id) REFERENCES ComboPlatos(id),

	detalle_id int NOT NULL,
	FOREIGN KEY (detalle_id) REFERENCES Detalle(id)
);


-- Un combo nunca se guarda como detalle de una orden
-- Están propenso a cambios
-- Por eso los destacados son en realidad clones
-- En una orden, los combos seleccionados se juntan como platos
CREATE TABLE Orden
(
	id int AUTO_INCREMENT PRIMARY KEY,

	usuario_id int NOT NULL,
	FOREIGN KEY (usuario_id) REFERENCES Usuario(id),

	fecha date NOT NULL,
	importe decimal(8,2) NOT NULL,
	descuento decimal(8,2)
);

CREATE TABLE OrdenPlatos
(
	id int AUTO_INCREMENT PRIMARY KEY,

	orden_id int NOT NULL,
	FOREIGN KEY (orden_id) REFERENCES Orden(id),

	plato_id int NOT NULL,
	FOREIGN KEY (plato_id) REFERENCES Plato(id)
);

CREATE TABLE OrdenPlatoDetalles
(
	id int AUTO_INCREMENT PRIMARY KEY,

	ordenplatos_id int NOT NULL,
	FOREIGN KEY (ordenplatos_id) REFERENCES OrdenPlatos(id),

	detalle_id int NOT NULL,
	FOREIGN KEY (detalle_id) REFERENCES Detalle(id)
);
