CREATE DATABASE aerolinea;
USE aerolinea;


CREATE TABLE Idiomas(
    codigoIdioma SERIAL NOT NULL,
    nombreIdioma varchar(20) NOT NULL,
    PRIMARY KEY (codigoIdioma)
);



CREATE TABLE Aeropuerto(
    codigoAeropuerto VARCHAR(3) NOT NULL,
    nombreAeropuerto VARCHAR(50) NOT NULL,
    ciudad VARCHAR(50) NOT NULL,
    pais VARCHAR(50) NOT NULL,
    PRIMARY KEY (codigoAeropuerto),
	UNIQUE (nombreAeropuerto)
);


CREATE TABLE Empleados(
    codigoEmpleado SERIAL NOT NULL,
    nombreDatos VARCHAR(60) NOT NULL,
    puesto VARCHAR(50) NOT NULL,
    horasDeVuelo int NOT NULL,
    contactoDeEmergencia varchar(60) NOT NULL,
    tiempoEnEmpresa int NOT NULL,
    nacionalidad VARCHAR(50) NOT NULL,
    PRIMARY KEY (codigoEmpleado)
);


CREATE TABLE EmpleadoXIdioma(
	codigoEmpleado int NOT NULL,
	codigoIdioma int NOT NULL,
	PRIMARY KEY(codigoEmpleado, codigoIdioma),
	FOREIGN KEY (codigoEmpleado) REFERENCES Empleados(codigoEmpleado),
	FOREIGN KEY (codigoIdioma) REFERENCES Idiomas(codigoIdioma)
);


CREATE TABLE Rutas(
    numeroVuelo INT NOT NULL,
    tiempoVuelo FLOAT NOT NULL,
    horaSalida TIME NOT NULL,
    distancia int NOT NULL,
    aeropuertoOrigen VARCHAR(3) NOT NULL,
    aeropuertoDestino VARCHAR(3) NOT NULL,
    PRIMARY KEY (numeroVuelo),
	FOREIGN KEY (aeropuertoOrigen) REFERENCES Aeropuerto(codigoAeropuerto),
	FOREIGN KEY (aeropuertoDestino) REFERENCES Aeropuerto(codigoAeropuerto),
	CHECK (numeroVuelo >= 100 AND numeroVuelo < 1000)
);

CREATE TABLE Aeronave(
    matricula varchar(10) NOT NULL,
    marca varchar(40) NOT NULL,
    capacidadPasajeros int NOT NULL,
    capacidadPeso FLOAT NOT NULL,
    modelo INT NOT NULL,
    PRIMARY KEY (matricula)
);


CREATE TABLE Viaje(
	codigoViaje SERIAL NOT NULL,
	precio MONEY NOT NULL,
	fecha DATE NOT NULL,
	numeroVuelo INT NOT NULL,
	matricula VARCHAR(10) NOT NULL,
	PRIMARY KEY (codigoViaje),
	FOREIGN KEY (numeroVuelo) REFERENCES Rutas(numeroVuelo),
	FOREIGN KEY (matricula) REFERENCES Aeronave(matricula)
);


CREATE TABLE ViajeXEmpleado(
	codigoEmpleado int NOT NULL,
	codigoViaje INT NOT NULL,
	PRIMARY KEY(codigoEmpleado, codigoViaje),
	FOREIGN KEY (codigoEmpleado) REFERENCES Empleados(codigoEmpleado),
	FOREIGN KEY (codigoViaje) REFERENCES Viaje(CodigoViaje)
);

CREATE TABLE Boletos(
	numeroBoleto SERIAL NOT NULL,
	nombrePasajero VARCHAR(50) NOT NULL,
	fila INT NOT NULL,
	posicion CHAR(1) NOT NULL,
	codigoViaje INT NOT NULL,
	PRIMARY KEY(numeroBoleto),
	FOREIGN KEY (codigoViaje) REFERENCES Viaje(codigoViaje),
	CHECK (Fila > 0 AND Fila <= 20),
	CHECK (Posicion IN ('A','B','C','D'))
);

INSERT INTO Aeropuerto VALUES ('SJO', 'Aeropuerto Internacional Juan Santamaría', 'San José', 'Costa Rica');
INSERT INTO Aeropuerto VALUES ('SAL', 'Aeropuerto Monseñor Oscar Arnulfo Romero', 'San Salvador', 'El Salvador');
INSERT INTO Aeropuerto VALUES ('HOU', 'Aeropuerto William P. Hobby', 'Houston', 'Estados Unidos');
INSERT INTO Aeropuerto VALUES ('JFK', 'Aeropuerto Internacional John F. Kennedy', 'Nueva York', 'Estados Unidos');
INSERT INTO Aeropuerto VALUES ('LAX', 'Aeropuerto Internacional de Los Angeles', 'Los Angeles', 'Estados Unidos');
INSERT INTO Aeropuerto VALUES ('MIA', 'Aeropuerto de Miami', 'Miami', 'Estados Unidos');
INSERT INTO Aeropuerto VALUES ('GUA', 'Aeropuerto Internacional La Aurora', 'Ciudad de Guatemala', 'Guatemala');
INSERT INTO Aeropuerto VALUES ('TGU', 'Aeropuerto de Toncontín', 'Tegucigalpa', 'Honduras');
INSERT INTO Aeropuerto VALUES ('MEX', 'Aeropuerto Internacional Benito Juárez', 'Ciudad de México', 'México');
INSERT INTO Aeropuerto VALUES ('MGA', 'Aeropuerto Internacional C. Sandino', 'Managua', 'Nicaragua');
INSERT INTO Aeropuerto VALUES ('PTY', 'Aeropuerto Internacional de Tocumen', 'Ciudad de Panamá', 'Panamá');