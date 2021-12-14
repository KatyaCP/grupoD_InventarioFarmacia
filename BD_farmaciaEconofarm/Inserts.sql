use bdfarmaciaAzul;
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("BSfarm","20745812475",924814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Maxin Farma Asociados ","20745512475",933814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("GAG Logistics & Purchasing","20745952475",900814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Abundance and Health","20615812475",922814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Laboratorios Ubiopharma","20885812475",984814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Fansifarm","20995812475",991814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Cecofar","20555812475",901814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Riofarco","20445812475",905814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Farmalíder","20335812475",927814753,"@gmail.com");
insert into Tproveedor (RazonSocial,RUC,Celular,Email) values ("Distrifarma","20105812475",999814753,"@gmail.com");
/*-----------------------------------------------------------------------------------------------------------------------------*/
insert into Tcargo (Cargo) values ("Almacenero");
insert into Tcargo (Cargo) values ("Tecnico Farmaceutico");
insert into Tcargo (Cargo) values ("Gerente");
insert into Tcargo (Cargo) values ("Cajero");
/**********************************************************************************************************************************/
insert into Ttrabajador (Nombre,Apellidos,DNI,fechaNac,Sexo,Email,Direccion,Celular,IdCargo) 
values ("Katya","Canari Paiva",75789635,"1995-04-25","Femenino","Katyca@gmail.com","Av. la cultura 1500",947812346,1);

insert into Ttrabajador (Nombre,Apellidos,DNI,fechaNac,Sexo,Email,Direccion,Celular,IdCargo) 
values ("Jack Henry","Gutierrez Huallpa",45789635,"1995-04-25","Masculino","gut@gmail.com","Urb. Manahuanunca",958421452,1);

insert into Ttrabajador (Nombre,Apellidos,DNI,fechaNac,Sexo,Email,Direccion,Celular,IdCargo) 
values ("Lucho","Dami Rodriguez",45789635,"1978-04-25","Masculino","juan@gmail.com","Av. la cultura",947812346,2);

insert into Ttrabajador (Nombre,Apellidos,DNI,fechaNac,Sexo,Email,Direccion,Celular,IdCargo) 
values ("Juan","Rodrigues Farfan",85289635,"1980-04-25","Masculino","Juan@gmail.com","Av. la cultura S/N",999812346,3);

insert into Ttrabajador (Nombre,Apellidos,DNI,fechaNac,Sexo,Email,Direccion,Celular,IdCargo) 
values ("Fany","Ceballos Ariza",55789635,"1989-04-25","Femenino","fanyca@gmail.com","Av. la cultura S/N",929812346,4);

/**********************************************************************************************************************************/
insert into TUsuario (IdTrabaj,usuario,contrasena) values (1,"kCanari",aes_encrypt('123','admin'));
insert into TUsuario (IdTrabaj,usuario,contrasena) values (2,"jgutierrez",aes_encrypt('admin','admin'));
insert into TUsuario (IdTrabaj,usuario,contrasena) values (3,"rLucho",aes_encrypt('admin','admin'));
/*desencriptar 
select idUser, IdTrabaj,usuario,convert(aes_decrypt(contrasena,'admin')using utf8) as contraDescencrip from Tusuario; 
*/
/*select * from Tusuario where IdTrabaj=1 and usuario='jgutierrez'and contrasena=aes_encrypt('admin','admin');*/
