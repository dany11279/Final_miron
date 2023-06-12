create table especialidades(
    esp_id serial not null,
    esp_nom varchar(60) not null,
    esp_situacion smallint not null default 1,
    primary key (esp_id)
)
create table clinicas(
    cli_id serial not null,
    cli_nom varchar(60) not null,
    cli_situacion smallint not null default 1,
    primary key (cli_id)
)
create table pacientes(
    pac_id serial not null,
    pac_nom varchar(60) not null,
    pac_dpi varchar(20) not null,
    pac_tel varchar(20) not null,
    pac_situacion smallint not null default 1,
    primary key (pac_id)
)
create table medicos(
    med_id serial not null,
    med_nom varchar(60) not null,
    med_esp integer not null,
    med_cli integer not null,
    med_situacion smallint not null default 1,
    primary key (med_id),
    foreign key (med_esp) REFERENCES especialidades (esp_id),
    foreign key (med_cli) REFERENCES clinicas (cli_id)
)
create table citas(
    cita_id serial not null,
    cita_pac integer not null,
    cita_med integer not null,
    cita_fecha DATETIME YEAR TO MINUTE NOT NULL,
    cita_hora TIME HOUR TO MINUTE NOT NULL,
    cita_referencia varchar(10) not null,
    cita_situacion smallint not null default 1,
    primary key (cita_id),
    foreign key (cita_pac) REFERENCES pacientes (pac_id),
    foreign key (cita_med) REFERENCES medicos (med_id)
)
create table recetas(
    rec_id serial not null,
    rec_cita integer not null,
    rec_medicamentos varchar(60) not null,
    rec_situacion smallint not null default 1,
    primary key (rec_id),
    foreign key (rec_cita) REFERENCES citas (cita_id)
)
create table diagnosticos(
    diag_id serial not null,
    diag_cita integer not null,
    diag_descripcion varchar(150) not null,
    diag_situacion smallint not null default 1,
    primary key (diag_id),
    foreign key (diag_cita) REFERENCES citas (cita_id)
)
create table detalles(
    det_id serial not null,
    det_cita integer not null,
    det_pac integer not null,
    det_med integer not null,
    det_situacion smallint not null default 1,
    primary key (det_id),
    foreign key (det_cita) REFERENCES citas (cita_id),
    foreign key (det_pac) REFERENCES pacientes (pac_id),
    foreign key (det_med) REFERENCES medicos (med_id)
)