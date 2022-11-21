create database db_empregosetimB;
use db_empregosetimB;

create table tbl_Empregos(
Registro int primary key,
Nome varchar(80) not null,
Cargo varchar(20) not null,
Area varchar(25) not null,
Salario decimal(10,2) not null,
Status varchar(8) not null
);

select * from tbl_Empregos;
describe tbl_Empregos;