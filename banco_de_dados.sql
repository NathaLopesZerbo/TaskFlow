/*PhpMyadmin, criei o Banco: lista_de_tarefas, logo após inseri os scripts:
    tb_status: Preza se a tarefa está pendente ou já foi atualizada.
    tb_tarefas: Onde as tarefas estão inseridas.
    tb_usuarios: O sistema de login, cadastro para acessar a aplicação.
*/
create table tb_status(
	id int not null primary key auto_increment,
    status varchar(25) not null
);

insert into tb_status(status)values('pendente');
insert into tb_status(status)values('realizado');

create table tb_tarefas(
	id int not null primary key auto_increment,
    id_status int not null default 1,
    foreign key(id_status) references tb_status(id),
    titulo_tarefa varchar(25) not null,
	tarefa text not null,
    data_cadastrado datetime not null default current_timestamp
)
    
create table tb_usuarios(
	id int not null primary key auto_increment,
	nome varchar(50) not null,
	email varchar(100) not null,
	senha varchar(32) not null
);