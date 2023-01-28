/*** CRIANDO A TABELA PARA CADASTRO DE USUÁRIOS  ***/

CREATE TABLE usuarios (us_id integer not null auto_increment, 
	us_user varchar(100) not null,
	us_nome varchar(255) not null,
	us_contato varchar(12) not null,
	us_senha varchar(255) not null,
	us_email varchar(100),
	us_data date,
	us_ativo integer default 1,
	primary key (us_id)

);

/*** ADICIONADO UM USUÁRIO NA TEBELA DE USUÁRIOS  ***/
insert into usuarios (us_user,us_nome,us_contato,us_senha,us_email)
	values ('admin','administrador','19 3939-6000','123456','contato@rcti.com.br');