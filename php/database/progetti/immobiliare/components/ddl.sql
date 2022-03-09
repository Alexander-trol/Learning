CREATE TABLE proprietari(
    CF varchar(16),
    nome varchar(30) not null,
    cognome varchar(30) not null,
    telefono integer not null,
    email varchar(30) not null,

    primary key(CF)
)

CREATE TABLE intestazioni(
    Id integer unsigned AUTO_INCREMENT,
    data date not null,
    versamento integer not null,
    IdProp varchar(16),
    IdImmob integer unsigned,

    primary key(Id),
    foreign key(IdProp) references proprietari(CF),
    foreign key(IdImmob) references immobili(Id)
)

CREATE TABLE immobili(
    Id integer unsigned AUTO_INCREMENT,
    nome varchar(30) not null,
    via varchar(30) not null,
    civico varchar(30) not null,
    metratura varchar(30) not null,
    piano varchar(30) not null,
    nLocali varchar(30) not null,
    IdTipo integer unsigned,
    IdZona integer unsigned,

    primary key(Id),
    foreign key(IdTipo) references tipoImm(Id),
    foreign key(IdZona) references tipoZona(Id)
)

CREATE TABLE tipoZona(
    Id integer unsigned AUTO_INCREMENT,
    zona varchar(30),

    primary key(Id)
)

CREATE TABLE tipoImm(
    Id integer unsigned AUTO_INCREMENT,
    tipo varchar(30),

    primary key(Id)
)

CREATE TABLE login (
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    
    PRIMARY KEY(id),
    foreign key(IdCF) references proprietari(CF)
);