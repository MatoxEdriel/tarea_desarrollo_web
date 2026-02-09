CREATE DATABASE IF NOT EXISTS CandlesYou_db;
USE CandlesYou_db;

CREATE TABLE IF NOT EXISTS empanada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS disco_empanada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_empanada INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NULL,
    aroma VARCHAR(255) NULL,
    color VARCHAR(255) NULL,
    precio DECIMAL(10, 2) NOT NULL,
   
    stock INT NOT NULL DEFAULT 0,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT fk_vela_categoria
    FOREIGN KEY (id_categoria) 
    REFERENCES categorias(id_categoria)
    ON DELETE RESTRICT 
    ON UPDATE CASCADE
) ENGINE=InnoDB;