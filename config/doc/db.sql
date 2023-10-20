create database sistema_aposta;

use sistema_aposta;

create table utilizador (
    id_utilizador int primary key auto_increment not null,
    nome_utilizador varchar(50),
    sobrenome_utilizador varchar(50),
    email_utilizador varchar(30),
    senha_utilizador varchar(25),
    nascimento_utilizador date,
    genero_utilizador enum('M', 'F'),
    n_bi_utilizador varchar(12),
    acesso_utilizador enum('adiminstrador', 'gestor', 'publicador', 'apostador')
);

create table equipa(
    id_equipa int primary key auto_increment not null,
    nome_equipa varchar(50)
);

create table partida(
    id_partida int primary key auto_increment not null,
    id_equipaA int,
    foreign key (id_equipaA) references equipa(id_equipa) on delete cascade,
    id_equipaB int,
    foreign key (id_equipaB) references equipa(id_equipa) on delete cascade,
    id_utilizador int,
    foreign key (id_utilizador) references utilizador(id_utilizador) on delete cascade
);

create table partida_publicada(
    id_partida_pub int primary key auto_increment not null,
    id_partida int,
    foreign key (id_partida) references partida(id_partida) on delete cascade,
    data_partida date,
    hora_partida time,
    data_publicada date,
    hora_publicada time,
    id_utilizador int,
    foreign key (id_utilizador) references utilizador(id_utilizador) on delete cascade
);

create table resultado_publicado(
    id_resultado_pub int primary key auto_increment not null,
    id_partida_pub int,
    foreign key (id_partida_pub) references partida_publicada(id_partida_pub) on delete cascade,
    golos_equipaA int,
    golos_equipaB int,
    data_publicada date,
    hora_publicada time,
    id_utilizador int,
    foreign key (id_utilizador) references utilizador(id_utilizador) on delete cascade
);

create table aposta(
    id_aposta int primary key auto_increment not null,
    id_utilizador int,
    foreign key (id_utilizador) references utilizador(id_utilizador) on delete cascade,
    id_partida_pub int,
    foreign key (id_partida_pub) references partida_publicada(id_partida_pub) on delete cascade,
    golos_equipaA int,
    golos_equipaB int,
    data_aposta date,
    hora_aposta time,
    valor_apostado int
);

create table rendimento(
    id_rendimento int primary key auto_increment not null,
    valor_apostado int,
    valor_ganho int
);