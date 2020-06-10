USE pruebaa


SELECT * 
FROM servicios

SELECT * 
FROM cita

SELECT * 
FROM historial

INSERT INTO cliente (idcliente,nombrecliente,apellidocliente,tel,direccion,dui) VALUES (1,'manuel' ,'hernandez', '79295427','aqui','02206953-3' )
INSERT INTO cliente (idcliente,nombrecliente,apellidocliente,tel,direccion,dui) VALUES (2,'alberto' ,'melendez', '79295427','aqui','02206953-3' )

INSERT INTO servicios (idservicios,nombreservicio,serviciodescript)VALUES(1,'depilacion','jhgsjgc')
INSERT INTO servicios (idservicios,nombreservicio,serviciodescript)VALUES(2,'manicura','akhdal')
INSERT INTO servicios (idservicios,nombreservicio,serviciodescript) VALUES ('3', 'spa', 'safa')


INSERT INTO cita (idcita,fecha,hora,idservicio,idcliente,direccion)VALUES(1,'2020-06-25','18:43:00',1,1,'gkadkgkjzb')

INSERT INTO historial(idhistorial,hora,fecha,idcita)VALUES(1,'18:43:00','2020-06-25',1);
INSERT INTO historial(idhistorial,hora,fecha,idcita)VALUES(2,'18:43:00','2020-06-25',1);
SELECT COUNT(*) 
FROM cliente

SELECT * FROM cita 
WHERE hora = "18:43:00"

