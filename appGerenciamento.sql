create database appGerenciamento;
use appGerenciamento;
create table rotas(
	id int primary key auto_increment,
	nomeRota varchar(100),
    pontoInicial varchar(60),
    pontoFinal varchar(60)

);

create table horario(
	codigo varchar(50),
    linha varchar(50),
    poi varchar(40),
    pof varchar(40),
    hi varchar(10),
    hf varchar(10)
);

create table onibus(
	id int primary key auto_increment,
	numero varchar(20),
    codigo varchar(50),
    nomeRota varchar(60)
    
);
select * from horario;

drop database appGerenciamento;