insert into tb_banco (codigo, nome) values (104,'Caixa Econômica Federal');
insert into tb_banco (codigo, nome) values (033,'Santander');
insert into tb_convenio  (codigo, convenio, verba, banco) values (1,'Amil',2000,104);
insert into tb_convenio  (codigo, convenio, verba, banco) values (2,'Unimed',3000,033);
insert into tb_convenio_servico (codigo, convenio, servico) values (1, 1, 'Parto Normal');
insert into tb_convenio_servico (codigo, convenio, servico) values (2, 2, 'Parto Normal');
insert into tb_contrato  (codigo, prazo, valor, data_inclusao, convenio_servico) 
values (1000, 36, 1200, '2024-03-21', 1);
insert into tb_contrato  (codigo, prazo, valor, data_inclusao, convenio_servico) 
values (2000, 36, 2500, '2024-03-21', 2);