CREATE DATABASE aerolinea;
USE aerolinea;


CREATE TABLE IdiomasDomina(
    codigoIdioma SERIAL NOT NULL,
    nombreIdioma varchar(20) NOT NULL,
    PRIMARY KEY (codigoIdioma)
);

CREATE TABLE Aeropuerto(
    codigoAeropuerto SERIAL NOT NULL,
    nombreAeropuerto VARCHAR(50),
    ciudad VARCHAR(50),
    PRIMARY KEY (codigoAeropuerto)
);

CREATE TABLE Rutas(
    codigoAerolinea SERIAL NOT NULL,
    numeroVuelo SERIAL NOT NULL,
    tiempoVuelo float NOT NULL,
    horaSalida TIME NOT NULL,
    distancia float NOT NULL,
    aereopuertoOrigen int NOT NULL,
    aeropuertoDestino int NOT NULL,
    PRIMARY KEY (codigoAerolinea),
    FOREIGN KEY (aereopuertoOrigen) REFERENCES Aeropuerto(codigoAeropuerto),
    FOREIGN KEY (aeropuertoDestino) REFERENCES Aeropuerto(codigoAeropuerto)
);


CREATE TABLE Empleados(
    codigoEmpleado SERIAL NOT NULL,
    nombreDatos VARCHAR(60) NOT NULL,
    puesto VARCHAR(50) NOT NULL,
    horasDeVuelo int NOT NULL,
    contactoDeEmergencia varchar(60) NOT NULL,
    tiempoEnEmpresa int NOT NULL,
    codigoIdioma int NOT NULL,
    PRIMARY KEY (codigoEmpleado),
    FOREIGN KEY (codigoIdioma) REFERENCES IdiomasDomina(codigoIdioma)
);

CREATE TABLE Aeronave(
    matricula SERIAL NOT NULL,
    marca varchar(40) NOT NULL,
    capacidadPasajero int NOT NULL,
    capacidadPeso int NOT NULL,
    modelo VARCHAR(40),
    PRIMARY KEY (matricula)
);

CREATE TABLE Viaje(
    codigoViaje SERIAL NOT NULL,
    fecha varchar(10) NOT NULL,
    precio int NOT NULL,
    matricula int NOT NULL,
    codigoEmpleado int NOT NULL,
    codigoAerolinea int NOT NULL,
    PRIMARY KEY (codigoViaje),
    FOREIGN KEY (matricula) REFERENCES Aeronave(matricula),
    FOREIGN KEY (codigoEmpleado) REFERENCES Empleados(codigoEmpleado),
    FOREIGN KEY (codigoAerolinea) REFERENCES Rutas(codigoAerolinea)
);

CREATE TABLE BoletosAereos(
	numeroBoleto SERIAL NOT NULL,
	nombrePasajero VARCHAR(100) NOT NULL,
	numeroFila int NOT NULL,
	numeroPosicion int NOT NULL,
    codigoViaje int NOT NULL,
	PRIMARY KEY (numeroBoleto),
    FOREIGN KEY (codigoViaje) REFERENCES Viaje (codigoViaje)
);
