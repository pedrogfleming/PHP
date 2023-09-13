1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.
SELECT * FROM Usuarios
2. Obtener los detalles completos de todos los productos líquidos.
SELECT * FROM Productos WHERE tipo = 'liquido'
3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.
SELECT * FROM Ventas WHERE cantidad >= 6 AND cantidad <= 10
4. Obtener la cantidad total de todos los productos vendidos.
SELECT SUM(cantidad) AS TOTAL_PRODUCTOS_VENDIDOS FROM Ventas
5. Mostrar los primeros 3 números de productos que se han enviado.
SELECT TOP(3) id_producto FROM Ventas
6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
SELECT u.nombre,u.apellido,p.nombre FROM Ventas v
INNER JOIN Usuarios u ON v.id_usuario = u.id_usuario
INNER JOIN Productos p ON v.id_producto = p.id
7. Indicar el monto (cantidad * precio) por cada una de las ventas.
SELECT (v.cantidad * p.precio) as Monto FROM Ventas V
INNER JOIN Productos p ON v.id_producto = p.id
8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.
SELECT SUM(v.cantidad) FROM Ventas V
INNER JOIN Productos p ON v.id_producto = p.id
WHERE p.id = 1003 AND v.id_usuario = 104
9. Obtener todos los números de los productos vendidos por algún usuario de‘Avellaneda’.
SELECT p.codigo_de_barra FROM Ventas v
INNER JOIN Productos p ON v.id_producto = p.id
INNER JOIN Usuarios U ON v.id_usuario = u.id_usuario
WHERE u.localidad = 'Avellaneda'
10.Obtener los datos completos de los usuarios cuyos nombres contengan la letra ‘u’.
SELECT * FROM Usuario u WHERE u.nombre LIKE '%[u]%'
11. Traer las ventas entre junio del 2020 y febrero 2021.
SELECT * FROM Ventas v WHERE v.fecha_de_venta > '20200601' AND v.fecha_de_venta < '20210201'
12. Obtener los usuarios registrados antes del 2021.
SELECT * FROM Usuario u WHERE fecha_de_registro < '20210101'
13.Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.
INSERT INTO Productos (nombre,tipo,precio) VALUES('Chocolate','solido',25.35)
14.Insertar un nuevo usuario .
INSERT INTO Usuarios VALUES ('Pedro','Fleming','7916','pgf@gmail.com','20220418','San Cristobal')
15.Cambiar los precios de los productos de tipo sólido a 66,60.
UPDATE Productos
SET precio = 66.60
WHERE tipo = 'solido'
16.Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menoresa 20 inclusive.
UPDATE Productos
SET stock = 0
WHERE stock <= 20
17.Eliminar el producto número 1010.
DELETE FROM Productos WHERE id = 1010
18.Eliminar a todos los usuarios que no han vendido productos.
DELETE
FROM Usuario 
WHERE NOT EXISTS(SELECT 1 FROM Ventas v  WHERE v.id_usuario = Usuario.id_territorio )
