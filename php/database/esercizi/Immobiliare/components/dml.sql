INSERT INTO immobili(nome, via, civico, metratura, piano, nLocali, IdTipo, IdZona) VALUES ('Villa', 'Voglia', '32', '900mq', '1', '7', 1, 3);
INSERT INTO immobili(nome, via, civico, metratura, piano, nLocali, IdTipo, IdZona) VALUES ('Arci', 'Pascoli', '15', '700mq', '2', '5', 3, 2);
INSERT INTO immobili(nome, via, civico, metratura, piano, nLocali, IdTipo, IdZona) VALUES ('CGIL', 'Andreotti', '3A', '500mq', '0', '4', 2, 1);

INSERT INTO proprietari(CF, nome, cognome, telefono, email) VALUES('DUIFV348756Y', 'Alessandro', 'Popa', '1523173796', 'pippo@baudo.com')
INSERT INTO proprietari(CF, nome, cognome, telefono, email) VALUES('DFHG4576452', 'Alessio', 'Ganzarolli', '9362057291', 'baluba@sauro.com')
INSERT INTO proprietari(CF, nome, cognome, telefono, email) VALUES('OIDFJGEUR948', 'Simone', 'Acuti', '9462973796', 'blip@sasso.com')

INSERT INTO intestazioni (data, versamento, IdProp, IdImmob) VALUES ('2022/01/02', 450000, 'DUIFV348756Y', 1);
INSERT INTO intestazioni (data, versamento, IdProp, IdImmob) VALUES ('2022/07/12', 600000, 'DFHG4576452', 3);
INSERT INTO intestazioni (data, versamento, IdProp, IdImmob) VALUES ('2022/04/11', 900000, 'OIDFJGEUR948', 2);

INSERT INTO `tipoimm`(`tipo`) VALUES ('Abitazione');
INSERT INTO `tipoimm`(`tipo`) VALUES ('Ufficio');
INSERT INTO `tipoimm`(`tipo`) VALUES ('Negozio');

INSERT INTO `tipozona`(`zona`) VALUES ('A');
INSERT INTO `tipozona`(`zona`) VALUES ('B');
INSERT INTO `tipozona`(`zona`) VALUES ('C');