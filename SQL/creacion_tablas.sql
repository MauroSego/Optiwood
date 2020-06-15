create table optiwood.pedido 
	(idPedido int auto_increment PRIMARY KEY,
		fechaCreacion Date,
		idProducto int not null,
		cantidad int not null,
		idPersona int not null,
		idEstadoPedido int not null,
		idDomicilio int not null,
		idTipoPedido int);

create table optiwood.producto (
	idProducto int auto_increment PRIMARY KEY,
	dscProducto varchar(75),
	idCategoria int, 
	stock int not null,
	pasilloDeposito int
);

create table optiwood.tipoPedido (
	idTipoPedido int PRIMARY KEY,
	dscTipoPedido varchar(50)
);

create table optiwood.persona (
	idPersona int auto_increment PRIMARY KEY,
	nombre varchar(70),
	apellido varchar(70),
	personaContacto varchar(90),
	dni int,
	fechaNacimiento date,
	telefono int,
	mail varchar(150),
	idTipoPersona int,
	idDomicilio int
);
create table optiwood.tipoPersona (
	idTipoPersona int PRIMARY KEY,
	dscTipoPersona varchar(50)
);

create table optiwood.domicilio (
	idDomicilio int PRIMARY KEY, 
	calle varchar(70) not null,
	altura int not null, 
	piso int,
	departamento varchar(2),
	codigo_postal varchar(10),
	idBarrio int
);

create table optiwood.barrio (
	idBarrio int PRIMARY KEY,
	dscBarrio varchar(120),
	idLocalidad int
);

create table optiwood.localidad (
	idLocalidad int PRIMARY KEY,
	dscLolidad varchar(120),
	idProvincia int
)
create table optiwood.provincia (
	idProvincia int PRIMARY KEY,
	dscProvincia varchar(120)
);