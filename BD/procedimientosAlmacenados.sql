use BdEconofarm;
DELIMITER //
CREATE PROCEDURE Eliminar_Medicamento(
IN _IdMedic int
)
BEGIN
    delete from Tdetalleingreso where IdMedic = _IdMedic;
    delete from Tdetallesalida where IdMedic = _IdMedic;
    delete from Tmedicamento where IdMedic = _IdMedic;
END
//

DELIMITER //
CREATE PROCEDURE Consultar_Stock()
BEGIN
    SELECT m.IdMedic,m.NombreMedic,m.TipoMedic,m.Marca,IFNULL(di.stockI,0) - IFNULL(ds.stockS, 0) as stock,m.Descripcion
FROM   tmedicamento m
LEFT   JOIN (
  SELECT IdMedic,SUM(Cantidad) AS stockI
  FROM   Tdetalleingreso
  GROUP  BY IdMedic
  ) as di ON di.IdMedic = m.IdMedic
LEFT   JOIN (
  SELECT IdMedic,SUM(Cantidad) AS stockS
  FROM   tdetallesalida
  GROUP  BY IdMedic
  ) as ds ON ds.IdMedic = m.IdMedic;
END
//
/*CALL Consultar_Stock();*/










