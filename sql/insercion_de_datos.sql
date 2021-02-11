delete Usuarios;
delete Camareros;
delete Productos;
delete BarDeCopas;
delete Restaurante;
delete AlquilerBicicletas;
delete Bicicletas;
delete Eventos;
delete Empresas;
delete Habitaciones;
delete CamarerosDeLimpieza;
delete Reservas;
delete Clientes;
delete DirectorRestaurante;
delete DirectorAdministrativo;
delete DirectorDeHabitaciones;
delete DirectorDeMarketing;
delete DirectorGeneral;

--DIRECTOR GENERAL
execute creaDirectorGeneral(1, '12345678F', 'Manuel', 'García Moreno', 'manuelgarcia@hotel.com', '123456789', 'Hola1234');


--DIRECTORES
execute creaDirectorDeMarketing(1, '12345678G', 'Fernando', 'Garcia González', 'fergargon@hotel.com', 1, '147852369','mañana', 'B0.1');
execute creaDirectorDeMarketing(2, '12345678Z', 'María', 'Viñuela Ayllón', 'marviñayl@hotel.com', 1, '852369741','tarde', 'B0.1');

execute creaDirectorDeHabitaciones(1, '12345678H', 'Carlos', 'Agudo Pardo', 'caragupar@hotel.com', 1, '987563214','mañana', 'A0.1');
execute creaDirectorDeHabitaciones(2, '12345678W', 'Sergio', 'Álvarez Moreno', 'seralvmor@hotel.com', 1, '963258741','tarde', 'A0.1');

execute creaDirectorAdministrativo(1, '12345678I', 'Carlos', 'Babiano Benito', 'carbabben@hotel.com', 1, '321654987','mañana', 'B1.1');
execute creaDirectorAdministrativo(2, '12345678X', 'Blanca', 'Baselga Pastor', 'blabaspas@hotel.com', 1, '625893147','tarde', 'B1.1');

execute creaDirectorRestaurante(1, '12345678J', 'María', 'Santos López', 'marsanlop@hotel.com', 1, '654789321','mañana', 'A1.1');
execute creaDirectorRestaurante(2, '12345678Y', 'Gloria', 'Troca Gudiño', 'glotrogud@hotel.com', 1, '025896314','tarde', 'A1.1');

    
    
--CLIENTES    
execute creaClientes('12345678A', 'Miguel', 'Albenca Muñoz', 'migalbmuñ@gmail.com', '123456789', 1);
execute creaClientes('12345678B', 'Manuel', 'Hormeño Blanco', 'manhorbla@gmail.com', '147258369',1);
execute creaClientes('12345678C', 'Francisco José', 'Payán Tagua', 'frapaytag@gmail.com', '123789456',1);
execute creaClientes('12345678D', 'Alicia', 'Redondo Redondo', 'aliredred@gmail.com', '321654987',1);
execute creaClientes('12345678E', 'Paula', 'Rebollo Gómez', 'paurebgom@gmail.com', '963852741',2);
execute creaClientes('12345678F', 'Pablo', 'Aguilar Zazo', 'pabaguzaz@gmail.com', '365214789',1);
execute creaClientes('12345678G', 'Juan Carlos', 'López Espino', 'jualopesp@gmail.com', '985632147',2);
execute creaClientes('12345678H', 'Saúl', 'Roa Infante', 'sauroainf@gmail.com', '025896314',1);
execute creaClientes('12345678I', 'Julio', 'Barrero Sánchez', 'julbarsan@gmail.com', '254136987',2);
execute creaClientes('12345678J', 'Ignacio', 'Molina Bautista', 'ignmolbau@gmail.com', '852364917',2);
execute creaClientes('12345678K', 'Fernando', 'Carrasco Giralt', 'fercargir@gmail.com', '159632478',1);
    

--RESERVAS
execute creaReservas(to_date('10/06/2020','dd/mm/yyyy'), to_date('13/06/2020','dd/mm/yyyy'), '12345678A');
execute creaReservas(to_date('30/05/2020','dd/mm/yyyy'), to_date('02/06/2020','dd/mm/yyyy'), '12345678B');
execute creaReservas(to_date('01/06/2020','dd/mm/yyyy'), to_date('06/06/2020','dd/mm/yyyy'), '12345678C');
execute creaReservas(to_date('31/05/2020','dd/mm/yyyy'), to_date('03/06/2020','dd/mm/yyyy'), '12345678D');
execute creaReservas(to_date('31/05/2020','dd/mm/yyyy'), to_date('05/06/2020','dd/mm/yyyy'), '12345678E');
execute creaReservas(to_date('06/06/2020','dd/mm/yyyy'), to_date('15/06/2020','dd/mm/yyyy'), '12345678F');
execute creaReservas(to_date('29/05/2020','dd/mm/yyyy'), to_date('01/06/2020','dd/mm/yyyy'), '12345678G');
execute creaReservas(to_date('30/05/2020','dd/mm/yyyy'), to_date('03/06/2020','dd/mm/yyyy'), '12345678H');
execute creaReservas(to_date('06/06/2020','dd/mm/yyyy'), to_date('09/06/2020','dd/mm/yyyy'), '12345678I');
execute creaReservas(to_date('10/06/2020','dd/mm/yyyy'), to_date('15/06/2020','dd/mm/yyyy'), '12345678J');

    
--CAMAREROS DE LIMPIEZA
execute CREACAMAREROSDELIMPIEZA('23456789A', 'Javi', 'Gómez Hernández', 'javgomher@hotelagaro.com', '678945123', 1, 'mañana');
execute CREACAMAREROSDELIMPIEZA('23456789B', 'Manuel', 'Vázquez Chacón', 'manvazcha@hotelagaro.com', '678945123', 1, 'mañana');
execute CREACAMAREROSDELIMPIEZA('23456789C', 'Alejandro', 'López Cascón', 'alelopcas@hotelagaro.com', '678945123', 1, 'mañana');
execute CREACAMAREROSDELIMPIEZA('23456789D', 'Julio', 'Hernández Soleto', 'julhersol@hotelagaro.com', '678945123', 1, 'mañana');
execute CREACAMAREROSDELIMPIEZA('23456789E', 'Jesús', 'Piñero Martín', 'jespiñmar@hotelagaro.com', '678945123', 1, 'mañana');


--HABITACIONES
execute creaHabitaciones(1, 'Si', 'No', 'Si', 1, 'No', 'individual', 1, 2);
execute creaHabitaciones(2, 'No', 'Si', 'Si', 1, 'Si', 'doble', 2, 2);
execute creaHabitaciones(3, 'Si', 'No', 'Si', 1, 'No', 'triple', 3, 2);
execute creaHabitaciones(4, 'Si', 'No', 'Si', 1, 'No', 'cuadruple', 4, 2);
execute creaHabitaciones(5, 'No', 'No', 'No', 1, 'Si', 'suite', 5, 2);
execute creaHabitaciones(6, 'Si', 'Si', 'No', 1, 'Si', 'individual', 6, 2);
execute creaHabitaciones(7, 'Si', 'No', 'No', 1, 'No', 'individual', 7, 2);
execute creaHabitaciones(8, 'No', 'Si', 'No', 1, 'Si', 'doble', 8, 2);
execute creaHabitaciones(9, 'Si', 'Si', 'Si', 1, 'Si', 'triple', 9, 2);
execute creaHabitaciones(10, 'Si', 'No', 'Si', 1, 'No', 'doble', 10, 2);

execute creaHabitaciones(11, 'Si', 'Si', 'No', 1, 'No', 'triple', 1, 1);
execute creaHabitaciones(12, 'No', 'Si', 'No', 1, 'Si', 'cuadruple', 2, 1);
execute creaHabitaciones(13, 'No', 'Si', 'Si', 1, 'No', 'triple', 3, 1);
execute creaHabitaciones(14, 'No', 'No', 'No', 1, 'No', 'suite', 4, 1);
execute creaHabitaciones(15, 'No', 'No', 'No', 1, 'Si', 'suite', 5, 1);
execute creaHabitaciones(16, 'No', 'Si', 'Si', 1, 'Si', 'individual', 6, 1);
execute creaHabitaciones(17, 'Si', 'No', 'Si', 1, 'No', 'triple', 7, 1);
execute creaHabitaciones(18, 'No', 'No', 'No', 1, 'Si', 'conectadas', 8, 1);
execute creaHabitaciones(19, 'Si', 'Si', 'Si', 1, 'Si', 'triple', 9, 1);
execute creaHabitaciones(20, 'Si', 'No', 'Si', 1, 'No', 'individual', 10, 1);

execute creaHabitaciones(21, 'No', 'No', 'Si', 1, 'No', 'individual', 1, 3);
execute creaHabitaciones(22, 'No', 'No', 'Si', 1, 'Si', 'doble', 2, 3);
execute creaHabitaciones(23, 'Si', 'Si', 'Si', 1, 'No', 'doble', 3, 3);
execute creaHabitaciones(24, 'No', 'No', 'No', 1, 'No', 'doble', 4, 3);
execute creaHabitaciones(25, 'No', 'No', 'No', 1, 'Si', 'suite', 5, 3);
execute creaHabitaciones(26, 'Si', 'Si', 'No', 1, 'Si', 'triple', 6, 3);
execute creaHabitaciones(27, 'Si', 'No', 'Si', 1, 'No', 'cuadruple', 7, 3);
execute creaHabitaciones(28, 'Si', 'Si', 'No', 1, 'Si', 'cuadruple', 8, 3);
execute creaHabitaciones(29, 'No', 'Si', 'Si', 1, 'Si', 'triple', 9, 3);
execute creaHabitaciones(30, 'Si', 'No', 'Si', 1, 'No', 'cuadruple', 10, 3);

execute reservarHabitacion(2, 'Si');
execute ocuparHabitacion(2, 'No');


--EMPRESAS
execute creaEmpresas('123456789', 'RentBike', 'C/Calle Bicicleta 1', 'service_rent@rentbike.com', '693852741', 'Si', 'No', 'Si', 1);
execute creaEmpresas('123456788', 'Estrella Galicia', 'C/Calle Estrella 1', 'service_estrella@estrellagal.com', '693852741', 'No', 'No', 'Si', 1);
execute creaEmpresas('123456787', 'Mercadona', 'C/Mercadona 1', 'service_rent@mercadona.com', '693852741', 'No', 'No', 'Si', 1);
execute creaEmpresas('123456786', 'Don Limpio', 'C/Limpieza 1', 'service_limpieza@donlimpio.com', '693852741', 'No', 'No', 'Si', 1);
execute creaEmpresas('123456785', 'GoodLife', 'C/Buena Vida 1', 'goodlife@gmail.com', '693852741', 'No', 'Si', 'Si', 1);
execute creaEmpresas('123456784', 'Natos y Waor', 'C/Música 1', 'nwmusic@gmail.com', '693852741', 'No', 'Si', 'Si', 1);
execute creaEmpresas('123456783', 'VivaMagia', 'C/Magia 1', 'vivalamagia@gmail.com', '693852741', 'No', 'Si', 'Si', 1);
execute creaEmpresas('123456782', 'Restaurante Costa Bonita', 'C/Comida Bonita 1', 'costa_bonita_rest@gmail.com', '693852741', 'No', 'Si', 'Si', 1);
execute creaEmpresas('123456781', 'Copas San Juan', 'C/San Juan 1', 'copas_san_juan@gmail.com', '693852741', 'No', 'Si', 'Si', 1);
execute cambiaractividadempresa('123456789', 'No');


--EVENTOS
execute creaEventos('The Good Life', to_date('10/03/2020','dd/mm/yyyy'), '18:00', '21:00','Salon de Actos' , 500, 'conferencia', '123456785', 1);
execute creaEventos('Cicatrices Tour', to_date('11/03/2020','dd/mm/yyyy'), '21:00', '23:30', 'Patio', 500, 'grupo musical', '123456784', 1);
execute creaEventos('Viva la Magia', to_date('12/03/2020','dd/mm/yyyy'), '21:00', '22:30', 'Bar de copas', 500, 'mago', '123456783', 1);   


--BICICLETAS
execute creaBicicletas('operativo');
execute creaBicicletas('operativo');
execute creaBicicletas('en mal estado');
execute creaBicicletas('operativo');
execute creaBicicletas('operativo');
execute creaBicicletas('operativo');
execute creaBicicletas('en mal estado');
execute creaBicicletas('operativo');
execute creaBicicletas('en mal estado');
execute creaBicicletas('operativo');


--ALQUILER BICICLETAS
execute creaAlquilerBicicletas('11:00', '14:00', 10, '123456789', 1, 1);
execute creaAlquilerBicicletas('13:00', '14:00', 10, '123456789', 1, 2);
execute creaAlquilerBicicletas('10:30', '12:00', 10, '123456789', 1, 3);


--RESTAURANTE
execute creaRestaurante(1, 20, 12, '07:00', '23:00', 123456782, 1);


--BAR DE COPAS
execute creaBarDeCopas(1, 10, 5, '20:00', '04:00', 123456782, 1);
 

--PRODUCTOS
execute creaProductos('Fregona', 'mantenimiento', 15, 10, 1, 123456786, null, null);
execute creaProductos('Lejía', 'mantenimiento', 25, 5, 1, 123456786, null, null);
execute creaProductos('Escoba', 'mantenimiento', 10, 10, 1, 123456786, null, null);
execute creaProductos('Queso', 'alimento', 24, 25, 1, 123456787, 1, null);
execute creaProductos('Croquetas', 'alimento', 50, 45, 1, 123456787, 1, null);
execute creaProductos('Patas de Jamón', 'alimento', 10, 5, 1, 123456787, 1, null);
execute creaProductos('Caña de Lomo', 'alimento', 25, 10, 1, 123456787, 1, null);
execute creaProductos('Cerveza Estrella Galicia', 'bebidas', 500, 250, 1, 123456788, 1, 1);
execute creaProductos('Coca Cola', 'bebidas', 750, 400, 1, 123456781, 1, 1);
execute creaProductos('Fanta de Naranja', 'bebidas', 150, 80, 1, 123456781, 1, 1);
execute creaProductos('Agua', 'bebidas', 800, 500, 1, 123456781, 1, 1);
execute creaProductos('Ambientador', 'mantenimiento', 50, 20, 1, 123456786, null, null);
execute creaProductos('Desinfectante', 'mantenimiento', 100, 60, 1, 123456786, null, null);
execute creaProductos('Insecticida', 'mantenimiento', 60, 30, 1, 123456786, null, null);
execute creaProductos('Salchichas', 'alimento', 300, 50, 1, 123456787, 1, null);
execute creaProductos('Manzana', 'alimento', 120, 45, 1, 123456787, 1, null);
execute creaProductos('Chocolate', 'alimento', 60, 15, 1, 123456787, 1, null);
execute creaProductos('Cerveza Cruzcampo', 'bebidas', 500, 250, 1, 123456781, 1, 1);
execute creaProductos('Sprite', 'bebidas', 300, 100, 1, 123456781, 1, 1);
execute creaProductos('Tinto de Verano', 'bebidas', 150, 80, 1, 123456781, 1, 1);
    
    
--CAMAREROS
execute creaCamareros('23456789F', 'Federico', 'López Giralt', 'fedlopgir@hotelagaro.com', '678945123', 'mañana', 1, 1, null);
execute creaCamareros('23456789G', 'Manuel', 'Rodríguez Bonete', 'manrodbon@hotelagaro.com', '678945123', 'mañana', 1, 1, null);
execute creaCamareros('23456789H', 'Adrián', 'Martín Piñero', 'adrmarpiñ@hotelagaro.com', '678945123', 'mañana', 1, null, 1);
execute creaCamareros('23456789I', 'Javier', 'Roldán Marín', 'javrolmar@hotelagaro.com', '678945123', 'tarde', 1, null, 1);
execute creaCamareros('23456789J', 'Juan', 'Pastor Carrasco', 'ginpascar@hotelagaro.com', '678945123', 'nocturno', 1, 1, null);

--execute eliminaCamarero('23456789F');
--execute modificaCamarero('23456789G', 'manurodribonet@hotelagaro.com', '678945167', 'tarde');

--USUARIOS
execute creaUsuarios('Manuel', 'García Moreno', 'manuelgarcia@hotelagaro.com', 'Hola1234');





--PRUEBA NO MAS DE UN DIR GENERAL

execute creaDirectorGeneral(2, '12345678L', 'Manuel', 'Perez Gomez', 'mapego@hotel.com', '123456789', 'Hola2345');

--PRUEBA NO MAS DE 10 HABITACIONES POR CAMARERO DE LIMPIEZA
execute creaHabitaciones(11, 'Si', 'Si', 'Si', 1, 'Si', 'cuadruple', 22, 2);

