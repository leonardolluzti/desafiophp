select b.nome as banco, tc2.verba, tc.codigo as contrato, tc.data_inclusao, tc.valor, tc.prazo 
from tb_banco b, tb_contrato tc, tb_convenio tc2, tb_convenio_servico tcs 
where tcs.convenio  = tc2.codigo and tc.convenio_servico =tcs.codigo and b.codigo =tc2.banco;