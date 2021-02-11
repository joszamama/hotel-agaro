drop sequence sec_Reservas;
drop sequence sec_Camareros;
drop sequence sec_Camareros_Limpieza;
drop sequence sec_id_Eventos;
drop sequence sec_Productos;
drop sequence sec_Bicicletas;
drop sequence sec_AlquilerBicicletas;


create sequence sec_Reservas
START WITH 1 INCREMENT BY 1 NOMAXVALUE;


create or replace trigger crea_id_Reservas
before insert on Reservas
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT sec_Reservas.NEXTVAL INTO :NEW.id_Reservas FROM DUAL;
END;
/

create sequence sec_Camareros
START WITH 1 INCREMENT BY 1 NOMAXVALUE;


create or replace trigger crea_id_Camareros
before insert on Camareros
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT sec_Camareros.NEXTVAL INTO :NEW.id_Camareros FROM DUAL;
END;
/



create sequence sec_Camareros_Limpieza
START WITH 1 INCREMENT BY 1 NOMAXVALUE;


create or replace trigger crea_id_Cam_Limp
before insert on CamarerosDeLimpieza
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT sec_Camareros_Limpieza.NEXTVAL INTO :NEW.id_Cam_Limp FROM DUAL;
END;
/

create sequence sec_id_Eventos
START WITH 1 INCREMENT BY 1 NOMAXVALUE;


create or replace trigger crea_id_Eventos
before insert on Eventos
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT sec_id_Eventos.NEXTVAL INTO :NEW.id_Eventos FROM DUAL;
END;
/

create sequence sec_Productos
START WITH 1 INCREMENT BY 1 NOMAXVALUE;


create or replace trigger crea_id_Producto
before insert on Productos
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT sec_Productos.NEXTVAL INTO :NEW.id_Producto FROM DUAL;
END;
/

create sequence sec_Bicicletas
START WITH 1 INCREMENT BY 1 NOMAXVALUE;


create or replace trigger crea_id_Bicis
before insert on Bicicletas
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT sec_Bicicletas.NEXTVAL INTO :NEW.id_bicicleta FROM DUAL;
END;
/

create sequence sec_AlquilerBicicletas
START WITH 1 INCREMENT BY 1 NOMAXVALUE;


create or replace trigger crea_id_Alq_Bicis
before insert on AlquilerBicicletas
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT sec_AlquilerBicicletas.NEXTVAL INTO :NEW.id_Alq_Bicis FROM DUAL;
END;
/

--NO MAS DE 10 HABITACIONES POR CAMARERO DE LIMPIEZA
CREATE OR REPLACE TRIGGER HabitacionPorCamarerosLimpieza
BEFORE
INSERT ON Habitaciones
FOR EACH ROW
DECLARE
limpia INTEGER;
BEGIN
SELECT count(*) INTO limpia
FROM Habitaciones WHERE camLimpAsignado = :NEW.camLimpAsignado;
IF (limpia > 9)
THEN raise_application_error
(-20600,:NEW.camLimpAsignado||'Un camarero de limpieza no puede tener mas de 10 habitaciones asignadas');
END IF;
END; 
/

--NO MAS DE UN DIRECTOR GENERAL
create or replace trigger noMasDeUnDirGeneral
before insert on DirectorGeneral
for each row
declare 
    numero integer;
begin
    select count (*) into numero from DirectorGeneral;
if (numero>0)
    THEN raise_application_error (-20600,:new.id_dir_g||'no puede haber más de 1 director general');
END IF;
END;
/ 