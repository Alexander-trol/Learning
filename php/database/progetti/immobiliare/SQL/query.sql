query:

1. inserisco IMMOBILE, ricevo chi lo possiede e i suoi dati anagrafici;
2. inserisco VIA, ricevo elenco degli immobili presenti e i loro proprietari;   
3. inserisco TIPO IMMOBILE, ricevo caratteristiche di ogni immobile che vi appartiene.

query 1:
SELECT prop.*
FROM proprietari AS prop, immobili AS imm, intestazioni AS inte
WHERE imm.Id = inte.IdImmob AND prop.CF = inte.IdProp AND imm.nome = 'Auser';

query 2:
SELECT inte.*
FROM intestazioni AS inte, immobili AS imm
WHERE imm.via = "Via Auser" AND imm.Id = inte.IdImmob

query 3:
SELECT imm.*
FROM immobili AS imm, tipoimm as tipo
WHERE tipo.tipo = "Negozi" AND tipo.Id = imm.IdTipo