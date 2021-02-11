create or replace procedure creaDirectorGeneral (
    w_id_Dir_G in DirectorGeneral.id_Dir_G%type,
    w_DNI in DirectorGeneral.DNI%type,
    w_nombre in DirectorGeneral.nombre%type,
    w_apellidos in DirectorGeneral.apellidos%type,
    w_email in DirectorGeneral.email%type,
    w_telefono in DirectorGeneral.telefono%type,
    w_contraseña in DirectorGeneral.contraseña%type
) is
begin
insert into DirectorGeneral (id_Dir_G, DNI, nombre, apellidos, email, telefono, contraseña)
values (w_id_Dir_G, w_DNI, w_nombre, w_apellidos, w_email, w_telefono, w_contraseña);
commit;
end creaDirectorGeneral;
/

create or replace procedure creaDirectorDeMarketing (
    w_id_Dir_Mark in DirectorDeMarketing.id_Dir_Mark%type,
    w_DNI in DirectorDeMarketing.DNI%type,
    w_nombre in DirectorDeMarketing.nombre%type,
    w_apellidos in DirectorDeMarketing.apellidos%type,
    w_email in DirectorDeMarketing.email%type,
    w_jefe in DirectorDeMarketing.jefe%type,
    w_telefono in DirectorDeMarketing.telefono%type,
    w_turno in DirectorDeMarketing.turno%type,
    w_despacho in DirectorDeMarketing.despacho%type
) is
begin
insert into DirectorDeMarketing (id_Dir_Mark, DNI, nombre, apellidos, email, jefe, telefono, turno, despacho)
values (w_id_Dir_Mark, w_DNI, w_nombre, w_apellidos, w_email, w_jefe, w_telefono, w_turno, w_despacho);
commit;
end creaDirectorDeMarketing;
/

create or replace procedure creaDirectorDeHabitaciones (
    w_id_Dir_Hab in DirectorDeHabitaciones.id_Dir_Hab%type,
    w_DNI in DirectorDeHabitaciones.DNI%type,
    w_nombre in DirectorDeHabitaciones.nombre%type,
    w_apellidos in DirectorDeHabitaciones.apellidos%type,
    w_email in DirectorDeHabitaciones.email%type,
    w_jefe in DirectorDeHabitaciones.jefe%type,
    w_telefono in DirectorDeHabitaciones.telefono%type,
    w_turno in DirectorDeHabitaciones.turno%type,
    w_despacho in DirectorDeHabitaciones.despacho%type
) is
begin
insert into DirectorDeHabitaciones (id_Dir_Hab, DNI, nombre, apellidos, email, jefe, telefono, turno, despacho)
values (w_id_Dir_Hab, w_DNI, w_nombre, w_apellidos, w_email, w_jefe, w_telefono, w_turno, w_despacho);
commit;
end creaDirectorDeHabitaciones;
/

create or replace procedure creaDirectorAdministrativo (
    w_id_Dir_Admin in DirectorAdministrativo.id_Dir_Admin%type,
    w_DNI in DirectorAdministrativo.DNI%type,
    w_nombre in DirectorAdministrativo.nombre%type,
    w_apellidos in DirectorAdministrativo.apellidos%type,
    w_email in DirectorAdministrativo.email%type,
    w_jefe in DirectorAdministrativo.jefe%type,
    w_telefono in DirectorAdministrativo.telefono%type,
    w_turno in DirectorAdministrativo.turno%type,
    w_despacho in DirectorAdministrativo.despacho%type
) is
begin
insert into DirectorAdministrativo (id_Dir_Admin, DNI, nombre, apellidos, email, jefe, telefono, turno, despacho)
values (w_id_Dir_Admin, w_DNI, w_nombre, w_apellidos, w_email, w_jefe, w_telefono, w_turno, w_despacho);
commit;
end creaDirectorAdministrativo;
/

create or replace procedure creaDirectorRestaurante (
    w_id_Dir_Res in DirectorRestaurante.id_Dir_Res%type,
    w_DNI in DirectorRestaurante.DNI%type,
    w_nombre in DirectorRestaurante.nombre%type,
    w_apellidos in DirectorRestaurante.apellidos%type,
    w_email in DirectorRestaurante.email%type,
    w_jefe in DirectorRestaurante.jefe%type,
    w_telefono in DirectorRestaurante.telefono%type,
    w_turno in DirectorRestaurante.turno%type,
    w_despacho in DirectorRestaurante.despacho%type
) is
begin
insert into DirectorRestaurante (id_Dir_Res, DNI, nombre, apellidos, email, jefe, telefono, turno, despacho)
values (w_id_Dir_Res, w_DNI, w_nombre, w_apellidos, w_email, w_jefe, w_telefono, w_turno, w_despacho);
commit;
end creaDirectorRestaurante;
/

create or replace procedure creaClientes (
    w_DNI in Clientes.DNI%type,
    w_nombre in Clientes.nombre%type,
    w_apellidos in Clientes.apellidos%type,
    w_email in Clientes.email%type,
    w_telefono in Clientes.telefono%type,
    w_supervisor in Clientes.supervisor%type
) is
begin
insert into Clientes (DNI, nombre, apellidos, email, telefono, supervisor)
values (w_DNI, w_nombre, w_apellidos, w_email, w_telefono, w_supervisor);
commit;
end creaClientes;
/

create or replace procedure creaReservas (
    w_fechaInicio in Reservas.fechaInicio%type,
    w_fechaFin in Reservas.fechaFin%type,
    w_cliente in Reservas.cliente%type
) is
begin
insert into Reservas (fechaInicio, fechaFin, cliente)
values (w_fechaInicio, w_fechaFin, w_cliente);
commit;
end creaReservas;
/

create or replace procedure creaCamarerosDeLimpieza (
    w_DNI in CamarerosDeLimpieza.DNI%type,
    w_nombre in CamarerosDeLimpieza.nombre%type,
    w_apellidos in CamarerosDeLimpieza.apellidos%type,
    w_email in CamarerosDeLimpieza.email%type,
    w_telefono in CamarerosDeLimpieza.telefono%type,
    w_jefe in CamarerosDeLimpieza.jefe%type,
    w_turno in CamarerosDeLimpieza.turno%type
) is
begin
insert into CamarerosDeLimpieza (DNI, nombre, apellidos, email, jefe, telefono, turno)
values (w_DNI, w_nombre, w_apellidos, w_email, w_jefe, w_telefono, w_turno);
commit;
end creaCamarerosDeLimpieza;
/

create or replace procedure creaHabitaciones (
    w_numero in Habitaciones.numero%type,
    w_limpieza in Habitaciones.limpieza%type,
    w_terraza in Habitaciones.terraza%type,
    w_reservada in Habitaciones.reservada%type,
    w_supervisor in Habitaciones.supervisor%type,
    w_ocupada in Habitaciones.ocupada%type,
    w_tipo in Habitaciones.tipo%type,
    w_id_Reservas in Habitaciones.id_Reservas%type,
    w_camLimpAsignado in Habitaciones.camLimpAsignado%type
) is
begin
insert into Habitaciones (numero, limpieza, terraza, reservada, supervisor, ocupada, tipo, id_Reservas, camLimpAsignado)
values (w_numero, w_limpieza, w_terraza, w_reservada, w_supervisor, w_ocupada, w_tipo, w_id_Reservas, w_camLimpAsignado);
commit;
end creaHabitaciones;
/

create or replace procedure creaEmpresas (
    w_cif in Empresas.cif%type,
    w_nombre in Empresas.nombre%type,
    w_direccion in Empresas.direccion%type,
    w_email in Empresas.email%type,
    w_telefono in Empresas.telefono%type,
    w_subcontratada in Empresas.subcontratada%type,
    w_organizadora in Empresas.organizadora%type,
    w_activa in Empresas.activa%type,
    w_supervisor in Empresas.supervisor%type
) is
begin
insert into Empresas (cif, nombre, direccion, email, telefono, subcontratada, organizadora, activa, supervisor)
values (w_cif, w_nombre, w_direccion, w_email, w_telefono, w_subcontratada, w_organizadora, w_activa, w_supervisor);
commit;
end creaEmpresas;
/

create or replace procedure creaEventos (
    w_nombre in Eventos.nombre%type,
    w_fecha in Eventos.fecha%type,
    w_horaInicio in Eventos.horaInicio%type,
    w_horaFin in Eventos.horaFin%type,
    w_lugar in Eventos.lugar%type,
    w_numeroAsistentes in Eventos.numeroAsistentes%type,
    w_tipo in Eventos.tipo%type,
    w_cif in Eventos.cif%type,
    w_supervisor in Eventos.supervisor%type
) is
begin
insert into Eventos (nombre, fecha, horaInicio, horaFin, lugar, numeroAsistentes, tipo, cif, supervisor)
values (w_nombre, w_fecha, w_horaInicio, w_horaFin, w_lugar, w_numeroAsistentes, w_tipo, w_cif, w_supervisor);
commit;
end creaEventos;
/

create or replace procedure creaBicicletas (
    w_estado in Bicicletas.estado%type
) is 
begin
insert into Bicicletas (estado)
values (w_estado);
commit;
end creaBicicletas;
/

create or replace procedure creaAlquilerBicicletas (
    w_horaInicio in AlquilerBicicletas.horaInicio%type,
    w_horaFin in AlquilerBicicletas.horaFin%type,
    w_numeroDeBicicletas in AlquilerBicicletas.numeroDeBicicletas%type,
    w_cif in AlquilerBicicletas.cif%type,
    w_supervisor in AlquilerBicicletas.supervisor%type,
    w_id_bicicleta in AlquilerBicicletas.id_bicicleta%type
) is
begin
insert into AlquilerBicicletas (horaInicio, horaFin, numeroDeBicicletas, cif, supervisor, id_bicicleta)
values (w_horaInicio, w_horaFin, w_numeroDeBicicletas, w_cif, w_supervisor, w_id_bicicleta);
commit;
end creaAlquilerBicicletas;
/

create or replace procedure creaRestaurante (
    w_id_Restaurante in Restaurante.id_Restaurante%type,
    w_numeroMesas in Restaurante.numeroMesas%type,
    w_numeroReservas in Restaurante.numeroReservas%type,
    w_horaApertura in Restaurante.horaApertura%type,
    w_horaCierre in Restaurante.horaCierre%type,
    w_cif in Restaurante.cif%type,
    w_jefe in Restaurante.jefe%type
) is
begin
insert into Restaurante (id_Restaurante, numeroMesas, numeroReservas, horaApertura, horaCierre, cif, jefe)
values (w_id_Restaurante, w_numeroMesas, w_numeroReservas, w_horaApertura, w_horaCierre, w_cif, w_jefe);
commit;
end creaRestaurante;
/

create or replace procedure creaBarDeCopas (
    w_id_Bar_C in BarDeCopas.id_Bar_C%type,
    w_numeroMesas in BarDeCopas.numeroMesas%type,
    w_numeroReservas in BarDeCopas.numeroReservas%type,
    w_horaApertura in BarDeCopas.horaApertura%type,
    w_horaCierre in BarDeCopas.horaCierre%type,
    w_cif in BarDeCopas.cif%type,
    w_jefe in BarDeCopas.jefe%type
) is
begin
insert into BarDeCopas (id_Bar_C, numeroMesas, numeroReservas, horaApertura, horaCierre, cif, jefe)
values (w_id_Bar_C, w_numeroMesas, w_numeroReservas, w_horaApertura, w_horaCierre, w_cif, w_jefe);
commit;
end creaBarDeCopas;
/

create or replace procedure creaProductos (
    w_nombre in Productos.nombre%type,
    w_tipo in Productos.tipo%type,
    w_cantidad in Productos.cantidad%type,
    w_umbral in Productos.umbral%type,
    w_supervisor in Productos.supervisor%type,
    w_cifProveedor in Productos.cifProveedor%type,
    w_id_restaurante in Productos.id_restaurante%type,
    w_id_barDeCopas in Productos.id_barDeCopas%type
) is
begin
insert into Productos (nombre,
tipo,
cantidad,
umbral,
supervisor
, cifProveedor,
id_restaurante,
id_barDeCopas)
values (w_nombre, w_tipo, w_cantidad, w_umbral, w_supervisor, w_cifProveedor, w_id_restaurante, w_id_barDeCopas);
commit;
end creaProductos;
/

create or replace procedure creaCamareros (
    w_DNI in Camareros.DNI%type,
    w_nombre in Camareros.nombre%type,
    w_apellidos in Camareros.apellidos%type,
    w_email in Camareros.email%type,
    w_telefono in Camareros.telefono%type,  
    w_turno in Camareros.turno%type,
    w_jefe in Camareros.jefe%type,
    w_id_restaurante in Camareros.id_restaurante%type,
    w_id_barDeCopas in Camareros.id_barDeCopas%type
) is
begin
insert into Camareros (DNI, nombre, apellidos, email, jefe, telefono, turno, id_restaurante, id_barDeCopas)
values (w_DNI, w_nombre, w_apellidos, w_email, w_jefe, w_telefono, w_turno, w_id_restaurante, w_id_barDeCopas);
commit;
end creaCamareros;
/

create or replace procedure creaUsuarios (
    w_nombre in Usuarios.nombre%type,
    w_apellidos in Usuarios.apellidos%type,
    w_email in Usuarios.email%type,
    w_contraseña in Usuarios.contraseña%type 
) is
begin
insert into Usuarios (nombre, apellidos, email, contraseña)
values (w_nombre, w_apellidos, w_email, w_contraseña);
commit;
end creaUsuarios;
/

CREATE OR REPLACE PROCEDURE eliminaCamarero (dni_a_quitar IN Camareros.DNI%TYPE) IS
BEGIN
    DELETE FROM Camareros WHERE DNI = dni_a_quitar;
END;
/

CREATE OR REPLACE PROCEDURE modificaCamarero(dni_del_modificado IN Camareros.DNI%TYPE, email_modificado IN Camareros.email%TYPE,
telefono_modificado IN Camareros.telefono%TYPE, turno_modificado IN Camareros.turno%TYPE) IS
BEGIN
  UPDATE Camareros SET email=email_modificado  WHERE DNI = dni_del_modificado;
  UPDATE Camareros SET telefono=telefono_modificado  WHERE DNI = dni_del_modificado;
  UPDATE Camareros SET turno=turno_modificado  WHERE DNI = dni_del_modificado;
END;
/
----------------------------------------------------------------------------------------------------------------
CREATE OR REPLACE PROCEDURE eliminaCamareroDeLimpieza (dni_a_quitar IN CamarerosDeLimpieza.DNI%TYPE) IS
BEGIN
    DELETE FROM CamarerosDeLimpieza WHERE DNI = dni_a_quitar;
END;
/

CREATE OR REPLACE PROCEDURE modificaCamareroLimpieza(dni_del_modificado IN CamarerosDeLimpieza.DNI%TYPE, email_modificado 
IN CamarerosDeLimpieza.email%TYPE,
telefono_modificado IN CamarerosDeLimpieza.telefono%TYPE, turno_modificado IN CamarerosDeLimpieza.turno%TYPE) IS
BEGIN
  UPDATE CamarerosDeLimpieza SET email=email_modificado  WHERE DNI = dni_del_modificado;
  UPDATE CamarerosDeLimpieza SET telefono=telefono_modificado  WHERE DNI = dni_del_modificado;
  UPDATE CamarerosDeLimpieza SET turno=turno_modificado  WHERE DNI = dni_del_modificado;
END;
/
--------------------------------------------------------------------------------------
CREATE OR REPLACE PROCEDURE eliminaCliente (dni_a_quitar IN Clientes.DNI%TYPE) IS
BEGIN
    DELETE FROM Clientes WHERE DNI = dni_a_quitar;
END;
/
-------------------------------------------------------------------------------------------------------
CREATE OR REPLACE PROCEDURE modificaReserva(id_del_modificado IN Reservas.id_reservas%TYPE,  fechainicio_modificada IN Reservas.fechainicio%TYPE,
fechafin_modificada IN Reservas.fechafin%TYPE) IS
BEGIN
  UPDATE Reservas SET fechainicio=fechainicio_modificada  WHERE id_reservas = id_del_modificado;
  UPDATE Reservas SET fechafin=fechafin_modificada  WHERE id_reservas = id_del_modificado;
  
END;
/

CREATE OR REPLACE PROCEDURE eliminaReserva(id_a_quitar IN  Reservas.id_reservas%TYPE) IS
BEGIN
    DELETE FROM Reservas WHERE id_reservas = id_a_quitar;
END;
/
-----------------------------------------------------------------------------
CREATE OR REPLACE PROCEDURE modificaProducto(id_del_modificado IN productos.id_producto%TYPE, 
cantidad_mofificada in productos.cantidad%TYPE, umbral_modificado in productos.umbral%TYPE) IS
BEGIN
  UPDATE Productos SET cantidad=cantidad_mofificada  WHERE id_producto = id_del_modificado;
  UPDATE Productos SET umbral=umbral_modificado  WHERE id_producto = id_del_modificado;
END;
/

CREATE OR REPLACE PROCEDURE eliminaProducto(id_a_quitar IN  productos.id_producto%TYPE) IS
BEGIN
    DELETE FROM Productos WHERE id_producto = id_a_quitar;
END;
/
---------------------------------------------------------------------------------------------
CREATE OR REPLACE PROCEDURE modificaEvento(id_del_modificado IN eventos.id_eventos%TYPE,  fecha_modificada IN eventos.fecha%TYPE,
horainicio_modificada IN eventos.horainicio%TYPE, horafin_modificada In eventos.horafin%TYPE, lugar_modificado in eventos.lugar%TYPE,
supervisor_modificado in eventos.supervisor%TYPE) IS
BEGIN
  UPDATE Eventos SET fecha=fecha_modificada  WHERE id_eventos = id_del_modificado;
  UPDATE Eventos SET horainicio=horainicio_modificada  WHERE id_eventos = id_del_modificado;
  UPDATE Eventos SET horafin=horafin_modificada  WHERE id_eventos = id_del_modificado;
  UPDATE Eventos SET lugar=lugar_modificado  WHERE id_eventos = id_del_modificado;
  UPDATE Eventos SET supervisor=supervisor_modificado  WHERE id_eventos = id_del_modificado;
  
END;
/

CREATE OR REPLACE PROCEDURE eliminaEvento(id_a_quitar IN eventos.id_eventos%TYPE) IS
BEGIN
    DELETE FROM Eventos WHERE id_eventos = id_a_quitar;
END;
/
---------------------------------------------------------------
CREATE OR REPLACE PROCEDURE cambiarActividadEmpresa(cif_empresa IN empresas.cif%TYPE, actividad IN empresas.activa%TYPE) IS
BEGIN
  UPDATE Empresas SET activa = actividad  WHERE cif = cif_empresa;
END;
/

CREATE OR REPLACE PROCEDURE reservarHabitacion(numero_hab IN habitaciones.numero%TYPE, reservada_hab IN habitaciones.reservada%TYPE) IS
BEGIN
  UPDATE Habitaciones SET reservada = reservada_hab  WHERE numero = numero_hab;
END;
/

CREATE OR REPLACE PROCEDURE ocuparHabitacion(numero_hab IN habitaciones.numero%TYPE, ocupada_hab IN habitaciones.ocupada%TYPE) IS
BEGIN
  UPDATE Habitaciones SET ocupada = ocupada_hab  WHERE numero = numero_hab;
END;
/

CREATE OR REPLACE PROCEDURE modificaRestaurante(id_del_modificado IN restaurante.id_Restaurante%TYPE,  reserva_rest_mod IN restaurante.numeroReservas%TYPE) IS
BEGIN
  UPDATE Restaurante SET numeroReservas=reserva_rest_mod  WHERE id_Restaurante = id_del_modificado;
END;
/

CREATE OR REPLACE PROCEDURE modificaBarCopas(id_del_modificado IN BarDeCopas.id_Bar_C%TYPE,  reserva_mod IN BarDeCopas.numeroReservas%TYPE) IS
BEGIN
  UPDATE BarDeCopas SET numeroReservas=reserva_mod  WHERE id_Bar_C = id_del_modificado;
END;
/
