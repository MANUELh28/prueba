USE pruebaa


SELECT * 
FROM servicios

SELECT * 
FROM cita

SELECT * 
FROM historial

INSERT INTO cliente (idcliente,NomUser,status,Correo,Contraseña,Value) VALUES (1,'/<Baldemar Cruz/<' ,'Tracking', '60349238','','02206953-3' )


INSERT INTO cita (idcita,fecha,hora,idservicio,idcliente,direccion)VALUES(1,'2020-06-25','18:43:00',1,1,'gkadkgkjzb')

INSERT INTO historial(idhistorial,hora,fecha,idcita)VALUES(1,'18:43:00','2020-06-25',1);
INSERT INTO historial(idhistorial,hora,fecha,idcita)VALUES(2,'18:43:00','2020-06-25',1);
SELECT COUNT(*) 
FROM cliente

SELECT * FROM cita 
WHERE hora = "18:43:0
