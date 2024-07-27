CREATE DATABASE circuito_oscar_crespo;

USE circuito_oscar_crespo;

CREATE TABLE coche (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    nombre_piloto VARCHAR(100) NOT NULL,
    nombre_copiloto VARCHAR(100),
    detalles_coche TEXT
);

CREATE TABLE carrera (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    numero_vueltas INT NOT NULL,
    fecha DATE NOT NULL
);

CREATE TABLE vuelta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coche_id INT NOT NULL,
    carrera_id INT NOT NULL,
    numero_vuelta INT NOT NULL,
    hora_salida TIME NOT NULL,
    hora_llegada TIME NOT NULL,
    tiempo_vuelta TIME NOT NULL,
    velocidad FLOAT,
    tiempo_acumulado TIME,
    FOREIGN KEY (coche_id) REFERENCES coche(id),
    FOREIGN KEY (carrera_id) REFERENCES carrera(id)
);
