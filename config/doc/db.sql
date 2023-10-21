create database sistema_aposta;

use sistema_aposta;

create table gestor(
    id_gestor int primary key auto_increment not null,
    nome_gestor varchar(50),
    sobrenome_gestor varchar(50),
    email_gestor varchar(30),
    senha_gestor varchar(25),
    nascimento_gestor date,
    genero_gestor enum('M', 'F'),
    n_bi_gestor varchar(20)
);
create table publicador(
    id_publicador int primary key auto_increment not null,
    nome_publicador varchar(50),
    sobrenome_publicador varchar(50),
    email_publicador varchar(30),
    senha_publicador varchar(25),
    nascimento_publicador date,
    genero_publicador enum('M', 'F'),
    n_bi_publicador varchar(20)
);

create table apostador(
    id_apostador int primary key auto_increment not null,
    nome_apostador varchar(50),
    sobrenome_apostador varchar(50),
    email_apostador varchar(30),
    senha_apostador varchar(25),
    nascimento_apostador date,
    genero_apostador enum('M', 'F'),
    n_bi_apostador varchar(20)
);
create table adiminstrador(
    id_adiminstrador int primary key auto_increment not null,
    nome_adiminstrador varchar(50),
    sobrenome_adiminstrador varchar(50),
    email_adiminstrador varchar(30),
    senha_adiminstrador varchar(25),
    nascimento_adiminstrador date,
    genero_adiminstrador enum('M', 'F'),
    n_bi_adiminstrador varchar(20)
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
    id_gestor int,
    foreign key (id_gestor) references gestor(id_gestor) on delete cascade
);

create table partida_publicada(
    id_partida_pub int primary key auto_increment not null,
    id_partida int,
    foreign key (id_partida) references partida(id_partida) on delete cascade,
    data_partida date,
    hora_partida time,
    data_publicada date,
    hora_publicada time,
    id_publicador int,
    foreign key (id_publicador) references publicador(id_publicador) on delete cascade
);

create table resultado_publicado(
    id_resultado_pub int primary key auto_increment not null,
    id_partida_pub int,
    foreign key (id_partida_pub) references partida_publicada(id_partida_pub) on delete cascade,
    golos_equipaA int,
    golos_equipaB int,
    data_publicada date,
    hora_publicada time,
    id_publicador int,
    foreign key (id_publicador) references publicador(id_publicador) on delete cascade
);

create table aposta(
    id_aposta int primary key auto_increment not null,
    id_apostador int,
    foreign key (id_apostador) references apostador(id_apostador) on delete cascade,
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