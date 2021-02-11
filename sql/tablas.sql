drop table Usuarios;
drop table Camareros;
drop table Productos;
drop table BarDeCopas;
drop table Restaurante;
drop table AlquilerBicicletas;
drop table Bicicletas;
drop table Eventos;
drop table Empresas;
drop table Habitaciones;
drop table CamarerosDeLimpieza;
drop table Reservas;
drop table Clientes;
drop table DirectorRestaurante;
drop table DirectorAdministrativo;
drop table DirectorDeHabitaciones;
drop table DirectorDeMarketing;
drop table DirectorGeneral;

create table DirectorGeneral (
    id_Dir_G            integer not null,
    DNI                 char(9) not null unique,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    telefono            varchar2(9) not null,
    contraseña          varchar(75) not null,
                    
    primary key (id_Dir_G)
);
create table DirectorDeMarketing (
    id_Dir_Mark         integer not null,
    DNI                 char(9) not null unique,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    jefe                integer not null,
    telefono            varchar2(9) not null, 
    turno               varchar(20)
                            check(turno in ('mañana', 'tarde', 'diurno', 'nocturno')) not null,                   
    despacho            char(5) not null,                 
    primary key (id_Dir_Mark),
    foreign key (jefe) references DirectorGeneral 
    
);

create table DirectorDeHabitaciones (
    id_Dir_Hab          integer not null,
    DNI                 char(9) not null unique,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    jefe                integer not null,
    telefono            varchar2(9) not null,
    turno               varchar(20)
                            check(turno in ('mañana', 'tarde', 'diurno', 'nocturno')) not null,
    despacho            char(5) not null,
    
                            
    primary key (id_Dir_Hab),
    foreign key (jefe) references DirectorGeneral
);

create table DirectorAdministrativo (
    id_Dir_Admin        integer not null,
    DNI                 char(9) not null unique,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    jefe                integer not null,
    telefono            varchar2(9) not null,
    turno               varchar(20)
                                check(turno in ('mañana', 'tarde', 'diurno', 'nocturno')) not null,  
    despacho            char(5) not null,
                                      
    primary key (id_Dir_Admin),
    foreign key (jefe) references DirectorGeneral
);

create table DirectorRestaurante (
    id_Dir_Res          integer not null,
    DNI                 char(9) not null unique,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    jefe                integer not null,
    telefono            varchar2(9) not null,
    turno               varchar(20)
                            check(turno in ('mañana', 'tarde', 'diurno', 'nocturno')) not null, 
    despacho            char(5) not null,
                   
    primary key (id_Dir_Res),
    foreign key (jefe) references DirectorGeneral
);


create table Clientes (
    DNI                 char(9) not null,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    telefono            varchar2(9) not null,
    supervisor          integer not null,
    
    primary key (DNI),
    foreign key (supervisor) references DirectorDeMarketing
);

create table Reservas (
    id_Reservas         integer not null,
    fechaInicio         date default sysdate,
    fechaFin            date not null,
    cliente             char(9) not null,

    constraint fechaReserva check (fechaFin > fechaInicio),
    primary key (id_Reservas),
    foreign key (cliente) references Clientes
);

create table CamarerosDeLimpieza (
    id_Cam_Limp         integer not null,
    DNI                 char(9) not null unique,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    telefono            varchar2(9) not null,
    jefe                integer not null,
    turno               varchar(20)
                            check(turno in ('mañana', 'tarde', 'diurno', 'nocturno')) not null,
                                     
    primary key (id_Cam_Limp),
    foreign key(jefe) references DirectorGeneral
);

create table Habitaciones(
    numero          integer not null,
    limpieza        char(2) not null
                    check (limpieza in ('Si','No')),
    terraza           char(2) not null
                    check (terraza in ('Si','No')),
    reservada        char(2) not null
                    check (reservada in ('Si','No')),
    supervisor      integer not null,
    ocupada          char(2) not null
                    check (ocupada in ('Si','No')),
    tipo            varchar(50) not null
                        check(tipo in ('cuadruple', 'doble', 'individual', 'triple', 'suite', 'conectadas')),                  
    id_Reservas     integer not null,
    camLimpAsignado integer not null,
    
    primary key (numero),
    foreign key (id_Reservas) references Reservas,
    foreign key (supervisor) references DirectorDeHabitaciones,
    foreign key (camLimpAsignado) references CamarerosDeLimpieza
);

create table Empresas (
    cif             char(9) not null,
    nombre          varchar2(50) not null,
    direccion       varchar2(50),
    email           varchar2(50) not null,
    telefono        number(9) not null,
    subcontratada    char(2) not null
                    check (subcontratada in ('Si','No')),
    organizadora     char(2) not null
                    check (organizadora in ('Si','No')),
    activa          char(2) not null
                    check (activa in ('Si','No')),
    supervisor      integer not null,

    primary key (cif),
    foreign key (supervisor) references DirectorAdministrativo
);

create table Eventos (
    id_Eventos          integer not null, 
    nombre              varchar2(50) not null,
    fecha               date not null,
    horaInicio          char(5),
    horaFin             char(5),
    lugar               varchar2(50) not null,
    numeroAsistentes    varchar2(50),
    tipo                varchar(20) not null
                            check (tipo in ('conferencia', 'grupo musical', 'mago')),               
    cif                 char(9) not null,
    supervisor          integer not null,
    
    constraint horarioEvento check (horaFin > horaInicio),
    primary key(id_Eventos),
    foreign key(cif) references Empresas,
    foreign key(supervisor) references DirectorDeMarketing
);

create table Bicicletas (
    id_bicicleta    integer not null,
    estado          varchar(20) not null
                        check (estado in ('operativo', 'en mal estado')),                  
    
    primary key(id_bicicleta)
);
create table AlquilerBicicletas (
    id_Alq_Bicis        integer not null,
    horaInicio          char(5) not null,
    horaFin             char(5) not null,
    numeroDeBicicletas  integer not null,
    cif                 char(9) not null,
    supervisor          integer not null,
    id_bicicleta        integer not null,
    
    constraint horarioAlquiler check (horaFin > horaInicio),
    primary key(id_Alq_Bicis),
    foreign key(supervisor) references DirectorAdministrativo,
    foreign key(cif) references Empresas,
    foreign key (id_bicicleta) references Bicicletas
);


create table Restaurante (
    id_Restaurante      integer not null,
    numeroMesas         integer not null,
    numeroReservas      integer,
    horaApertura        char(5) not null,
    horaCierre          char(5) not null,
    cif                 char(9) not null,
    jefe                integer not null,
    
    constraint horarioRestaurante check (horaCierre > horaApertura),
    primary key (id_Restaurante),
    foreign key (cif) references Empresas,
    foreign key (jefe) references DirectorRestaurante
); 

create table BarDeCopas (
    id_Bar_C            integer not null,
    numeroMesas         integer not null,
    numeroReservas      integer,
    horaApertura        char(5) not null,
    horaCierre          char(5) not null,
    cif                 char(9) not null,
    jefe                integer not null,
    
    primary key (id_Bar_C),
    foreign key (cif) references Empresas,
    foreign key (jefe) references DirectorRestaurante
);

create table Productos (
    id_Producto         integer not null,
    nombre              varchar2(50) not null,
    tipo                varchar(15) not null
                            check (tipo in ('mantenimiento', 'alimento', 'bebidas')),                     
    cantidad            integer,
    umbral              integer,
    supervisor          integer not null,
    cifProveedor        char(9) not null,
    id_restaurante      integer,
    id_barDeCopas       integer,
    
    primary key (id_Producto),
    foreign key (supervisor) references DirectorAdministrativo,
    foreign key (cifProveedor) references Empresas,
    foreign key (id_restaurante) references Restaurante,
    foreign key (id_barDeCopas) references BarDeCopas
);

create table Camareros (
    id_Camareros        integer not null,
    DNI                 char(9) not null unique,
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    telefono            varchar2(9) not null,
    turno               varchar(20)
                            check(turno in ('mañana', 'tarde', 'diurno', 'nocturno')) not null,                       
    jefe                integer not null,
    id_restaurante      integer,
    id_barDeCopas       integer,
                         
    primary key (id_Camareros),
    foreign key (jefe) references DirectorGeneral,
    foreign key (id_restaurante) references Restaurante,
    foreign key (id_barDeCopas) references BarDeCopas
);

create table Usuarios (
    nombre              varchar2(50) not null,
    apellidos           varchar2(50) not null,
    email               varchar2(50) not null,
    contraseña          varchar2(75) not null,
    
    primary key (email)
);

