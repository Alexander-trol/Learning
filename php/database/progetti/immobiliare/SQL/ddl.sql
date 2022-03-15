CREATE TABLE proprietari(
    CF varchar(16),
    nome varchar(30) not null,
    cognome varchar(30) not null,
    telefono integer not null,
    email varchar(30) not null,

    primary key(CF)
)

CREATE TABLE intestazioni(
    id integer unsigned AUTO_INCREMENT,
    data date not null,
    versamento integer not null,
    idProp varchar(16),
    idImmob integer unsigned,

    primary key(id),
    foreign key(idProp) references proprietari(CF),
    foreign key(idImmob) references immobili(id)
)

CREATE TABLE immobili(
    id integer unsigned AUTO_INCREMENT,
    nome varchar(30) not null,
    via varchar(30) not null,
    civico varchar(30) not null,
    metratura varchar(30) not null,
    piano varchar(30) not null,
    nLocali varchar(30) not null,
    IdTipo integer unsigned,
    IdZona integer unsigned,

    primary key(id),
    foreign key(idtipo) references tipoimm(id),
    foreign key(idzona) references tipozona(id)
)

CREATE TABLE tipoZona(
    id integer unsigned AUTO_INCREMENT,
    zona varchar(30),

    primary key(id)
)

CREATE TABLE tipoImm(
    id integer unsigned AUTO_INCREMENT,
    tipo varchar(30),

    primary key(id)
)