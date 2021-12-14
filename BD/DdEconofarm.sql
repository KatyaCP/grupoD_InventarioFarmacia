/*drop database BdFarmaciaAzul;*/
create database BdFarmaciaAzul;
use BdFarmaciaAzul;
/*-----------------------------------------*/
create table Tmedicamento(
IdMedic int auto_increment not null,
NombreMedic varchar(60) not null,
TipoMedic varchar(35) not null,
Descripcion varchar(80)null,
Marca varchar(25)not null,
primary key (IdMedic)
)engine=InnoDB;

create table Tproveedor(
IdProv int auto_increment not null,
RazonSocial varchar(60) not null,
RUC varchar(12) not null,
Celular int not null,
Email varchar(82)null,
primary key (IdProv)
)engine=InnoDB;

create table Tcargo(
IdCargo int auto_increment not null,
Cargo varchar(45)not null,
primary key(IdCargo)
)engine=InnoDB;

create table Ttrabajador(
IdTrabaj int auto_increment not null,
Nombre varchar(50) not null,
Apellidos varchar(90) not null,
DNI int(8)not null,
fechaNac date not null,
Sexo varchar(25)not null,
Email varchar(80)null,
Direccion varchar(90) not null,
Celular int not null,
IdCargo int not null,
primary key (IdTrabaj),
foreign key (IdCargo) references Tcargo (IdCargo)
)engine=InnoDB;

create table Tusuario(
idUser int auto_increment not null,
IdTrabaj int not null,
usuario varchar(55),
contrasena varchar(100),
primary key(idUser),
foreign key (IdTrabaj) references Ttrabajador (IdTrabaj)
)engine=InnoDB;

create table TingresoMedic(
IdIngreso varchar(5) not null,
IdTrabaj int not null,
IdProv int not null,
NroLote varchar(15),
fechaVenci date not null,
FechaIngreso datetime not null,
Estado varchar(55),
MotivoIngreso varchar (55) not null,
primary key(IdIngreso),
foreign key (IdTrabaj) references Ttrabajador (IdTrabaj),
foreign key (IdProv) references Tproveedor (IdProv)
)engine=InnoDB;

create table TdetalleIngreso(
IdIngreso varchar(5) not null,
IdMedic int not null,
Cantidad int not null,
foreign key (IdIngreso) references TingresoMedic (IdIngreso),
foreign key (IdMedic) references Tmedicamento (IdMedic)
)engine=InnoDB;

create table TsalidaMedic(
IdSalida varchar(5) not null,
IdTrabajAlmacen int not null,
IdTrabaj int not null,
NroLote varchar(15),
FechaSalida datetime not null,
estado varchar(55) not null,
MotivoSalida varchar (55) not null,
primary key(IdSalida),
foreign key (IdTrabajAlmacen) references Ttrabajador (IdTrabaj),
foreign key (IdTrabaj) references Ttrabajador (IdTrabaj)
)engine=InnoDB;

create table TdetalleSalida(
IdSalida varchar(5) not null,
IdMedic int not null,
Cantidad int not null,
foreign key (IdMedic) references Tmedicamento (IdMedic),
foreign key (IdSalida) references TsalidaMedic (IdSalida)
)engine=InnoDB;
