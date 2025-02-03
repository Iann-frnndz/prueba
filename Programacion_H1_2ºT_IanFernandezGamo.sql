create database StreamWeb;

use StreamWeb;

create table Usuarios(
id_usuario int auto_increment primary key,
nombre varchar (50),
apellidos varchar (150),
edad int,
correo varchar (100),
contraseña varchar(100)
);
    
create table paquetes_adicionales(
id_paquete int auto_increment primary key,
nombre_paquete enum("Deporte","Cine", "Infantil") not null,
precio decimal(10,2)
);
    
    
create table planes(
id_plan int auto_increment primary key,
tipo_de_plan enum("Plan Básico", "Plan Estándar", "Plan Premium ") not null,
precio decimal(10,2),
duracion_suscripcion enum("Mensual","Anual") not null
);

create table completo(
id_usuario int,
id_plan int,
id_paquete int,
foreign key (id_usuario) references usuarios (id_usuario),
foreign key (id_plan) references planes (id_plan),
foreign key (id_paquete) references paquetes_adicionales (id_paquete)
);


INSERT INTO Usuarios (nombre, apellidos, edad, correo, contraseña)
VALUES
('Juan', 'Pérez Gómez', 28, 'juan.perez@example.com', 'Jp@1234!'),
('María', 'Rodríguez López', 35, 'maria.rodriguez@example.com', 'M@r!a4567'),
('Carlos', 'García Fernández', 16, 'carlos.garcia@example.com', 'C@r10s789'),
('Ana', 'Martínez Ruiz', 40, 'ana.martinez@example.com', 'A!na1020R'),
('Lucía', 'Torres García', 27, 'lucia.torres@example.com', 'L*ci@T2021'),
('David', 'Hernández Pérez', 30, 'david.hernandez@example.com', 'D@v1d103!'),
('Elena', 'López Ramírez', 15, 'elena.lopez@example.com', 'El#na1045'),
('Javier', 'Martín Sánchez', 33, 'javier.martin@example.com', 'J@v13r!20S'),
('Sofía', 'Gómez Ortega', 29, 'sofia.gomez@example.com', 'S0f!@1068');


INSERT INTO planes (tipo_de_plan, precio, duracion_suscripcion)
VALUES
('Plan Básico', 9.99, 'Mensual'),
('Plan Estándar', 13.99, 'Mensual'),
('Plan Premium ', 17.99, 'Mensual'),
('Plan Básico', 99.99, 'Anual'),
('Plan Estándar', 139.99, 'Anual'),
('Plan Premium ', 179.99, 'Anual');

INSERT INTO paquetes_adicionales (nombre_paquete, precio)
VALUES
('Deporte', 6.99),
('Cine', 7.99 ),
('Infantil', 4.99 ),
('Deporte', 69.99),
('Cine', 79.99 ),
('Infantil', 49.99 );

ALTER TABLE Usuarios
RENAME COLUMN contraseña to contrasena;


