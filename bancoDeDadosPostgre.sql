

create table pessoa(
	id_pessoa NUMERIC primary key not null,
	nome VARCHAR(200) not null,
	email VARCHAR(200) not null,
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);

create table usuario(
	id_usuario NUMERIC primary key not null,
	id_pessoa_user NUMERIC,
	loginn varchar(200) not null,
	senha varchar(100) not null,
	foreign key (id_pessoa_user) references pessoa(id_pessoa),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);


create table editor(
	id_editor NUMERIC primary key not null,
	permissao_edt boolean,
	foreign key (id_editor) references usuario(id_usuario),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);



create table contatoLab(
	id_contatoLab NUMERIC primary key,
	nome VARCHAR(200),
	endereco VARCHAR(200),
	horaFunc VARCHAR(100),
	email VARCHAR(200),
	coodenador VARCHAR(200),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);


create table administrador(
	id_admin NUMERIC primary key not null,
	permissao_admin boolean,
	id_contatoLab NUMERIC,
	foreign key (id_admin) references usuario(id_usuario),
	foreign key (id_contatoLab) references contatoLab(id_contatoLab),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);

create table noticia(
	id_noticia NUMERIC primary key not null,
	titulo varchar(200) not null,
	descricao varchar(200) not null,
	autor varchar(100),
	data date,
	anexo varchar(200),
	foreign key (id_noticia) references editor(id_editor),
	foreign key (id_noticia) references administrador(id_admin),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);


CREATE TABLE gerencia_notica(
	id_geren_noticia NUMERIC,
	id_editor_g NUMERIC,
	id_adm_g NUMERIC,
	id_noticia_g NUMERIC,
	FOREIGN KEY (id_editor_g) REFERENCES editor(id_editor),
	FOREIGN KEY (id_adm_g) REFERENCES administrador(id_admin),
	FOREIGN KEY (id_noticia_g) REFERENCES noticia(id_noticia),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);

create table noticiaGeral(
	id_noticiaGeral NUMERIC primary key not null,
	foreign key (id_noticiaGeral) references noticia(id_noticia),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);

create table sobreNos(
	id_sobreProjeto NUMERIC primary key not null,
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);


create table membro(
	id_membro NUMERIC primary key,
	curso VARCHAR(200),
	descricao VARCHAR(200),
	foto VARCHAR(200),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);

create table bolsista (
	id_bolsista NUMERIC primary key,
	foreign key (id_bolsista) references membro(id_membro),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);
create table estagiario (
	id_estagiario NUMERIC primary key,
	foreign key (id_estagiario) references membro(id_membro),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);
create table professor (
	id_professor NUMERIC primary key,
	foreign key (id_professor) references membro(id_membro),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);

create table projeto (
	id_projeto NUMERIC primary key,
	nome varchar(200) not null,
	descricao varchar(200),
	dataInicio date not null,
	dataFim date not null,
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);


create table participa_projeto (
	id_projeto_p NUMERIC,
	id_membro_p NUMERIC,
	foreign key (id_projeto_p) references projeto(id_projeto),
	foreign key (id_membro_p) references membro(id_membro),
	nomePapel VARCHAR(200),
	descricao VARCHAR(200)
);


create table timeLineMembro (
	id_timeline NUMERIC primary key,
	nomeDoPapel VARCHAR(200),
	dataInicio date,
	dataFim date,	
	foreign key (id_timeline) references membro(id_membro),
	updated_at TIMESTAMP,
	created_at TIMESTAMP
);


