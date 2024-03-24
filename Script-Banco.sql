create table Tb_banco (
codigo int not null primary key unique,
nome varchar(100) not null
);


create table Tb_convenio(
codigo int not null primary key unique,
convenio varchar(100) not null,
verba float,
banco int,
FOREIGN KEY (banco) REFERENCES Tb_banco (codigo)
);

create table Tb_convenio_servico (
codigo int not null primary key unique,
convenio int not null,
servico varchar(100) not null,
FOREIGN KEY (convenio) REFERENCES Tb_convenio (codigo)
);

create table Tb_contrato(
codigo int not null primary key unique,
prazo int not null,
valor float not null,
data_inclusao date not null,
convenio_servico int,
FOREIGN KEY (convenio_servico) REFERENCES Tb_convenio_servico (codigo)
);
