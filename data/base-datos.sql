CREATE DATABASE rio

	DEFAULT CHARACTER SET utf8;



USE rio;



CREATE TABLE administradores (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	nombre VARCHAR(25) NOT NULL,
	email VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	fecha_registro DATETIME NOT NULL,
	activo TINYINT NOT NULL,
	PRIMARY KEY (id)
);


/* blog */

CREATE TABLE blog(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	autor_id INT NOT NULL,
	url VARCHAR(255) NOT NULL,
	imagen VARCHAR(255),
	url_externa VARCHAR(255) NOT NULL,
	titulo VARCHAR(255),
	texto TEXT CHARACTER SET utf8,
	etiqueta TEXT CHARACTER SET utf8,
	fecha DATETIME NOT NULL,
	activa TINYINT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(autor_id)
		REFERENCES administradores(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT	
)ENGINE=InnoDB AUTO_INCREMENT=1000;



/* tienda */

CREATE TABLE tienda(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	autor_id INT NOT NULL,
	url VARCHAR(255) NOT NULL,
	imagen VARCHAR(255),
	url_externa VARCHAR(5000) NOT NULL,
	precio VARCHAR(255),
	titulo VARCHAR(255),
	texto TEXT CHARACTER SET utf8,
	etiqueta TEXT CHARACTER SET utf8,
	fecha DATETIME NOT NULL,
	activa TINYINT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(autor_id)
		REFERENCES administradores(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT	
)ENGINE=InnoDB AUTO_INCREMENT=1000;



CREATE TABLE usuarios (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	nombre VARCHAR(255),
	email VARCHAR(255) UNIQUE,
	fecha_registro DATETIME NOT NULL,
	activo TINYINT NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1000;





CREATE TABLE editar_datos(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	usuario_id INT NOT NULL,
	url_secreta VARCHAR(255) NOT NULL,
	fecha DATETIME NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(usuario_id)
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
);



CREATE TABLE recuperacion_clave(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	usuario_id INT NOT NULL,
	url_secreta VARCHAR(255) NOT NULL,
	fecha DATETIME NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(usuario_id)
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
);





CREATE TABLE comentarios (

        id INT NOT NULL UNIQUE AUTO_INCREMENT,
        autor_id INT NOT NULL,
        entrada_id INT NOT NULL,
        titulo VARCHAR(255) NOT NULL,
        texto TEXT CHARACTER SET utf8 NOT NULL,
        fecha DATETIME NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(autor_id)
            REFERENCES usuarios(id)
            ON UPDATE CASCADE
            ON DELETE RESTRICT
);





