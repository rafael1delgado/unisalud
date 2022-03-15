## Observaciones 28 febrero 2022

- [x] En Despacho |Orden de salida|Móvil|Tipo de móvil|Estado actual (disponible o en emergencia)
- [x] Automatizar la rotación de salida
- [ ] Movil en secado (30 mintos largo), (40 noche) 
- [x] Colación, pausar.
- [x] Permitir otra comuna

- [x] En vez de llamadas sin cometido asosciado, cambiar a llamadas pendientes.
- [x] Al guardar y cerrar se va a la otra hoja el cometido.
- [z] Quitar la s a OT
- [x] Agregar detalle al establecimiento de entrega de paciente. (establishment_details)

Cometidos Abiertos
- Móvil,
- Tipo de movil,
- Dirección (QTH)
- Información telefónica.

- [x] Crear un despacho en base a una llamada, y con la dirección copiada en los datos del cometido.

Codificación de colores:
Rojo: Aviso de salida.

hora es de "Salia movil" estado es "Navegación"
Hora "Llegada al lugar" Estado actual "Contacto"
Hora ruta centro asistencial ,también navegación pero de distinto color.
"Centro asistencial" estado actual "AP".
"Retorno a base" -> "Retorno a base"
"Movil en base" -> Disponible.
Recepción de paciente -> Estado actual "

- [x] En llamada, quitar "hora" y agregar "Cómuna", "Sexo" (Masculino, Femenino, Indeterminado, Otro)", - "Edad" (incluir meses), "Intervención de carabinero" (si/no)


## Observaciones segundo día puesta en marcha
- [x] Cambiar número por qtc
- [x] Eventos no se pueden cerrar
- [x] Temperatura, fraccionaria
- [x] Separar los cometidos cerrados
- [x] Impresión de informe

## Permisos 
- Visor
- Regulador
- Operador y despachador
- Administrador

- [ ] Colación, termine en forma automática (y pausar)
- [ ] Tiempo de secado por cometido (30 min)


## Observaciones 27-01-2022
- [X] Que salga la dirección de la emergencia en el despacho (QTH)
- [X] Cambiar evento por despacho en el menú
- [ ] En el listado de eventos, cambiar º de evento por QTC
- [X] El filtrado en una página a parte y que se pueda filtrar por QTH y clave.
- [X] No todos los cometidos se cierran a las 8AM del día siguiente, pero necesito abrir otro turno desde las 8AM
- [X] En listado de moviles de Despacho, Los Móviles tenga una indicación de clave actual.( 45 minutos) modo de Click y que se registre la hora desde que se da el click y que indique la hora de termino del almuerzo, que este sombreado
- [X] Agregar Oxigeno central
- [X] Eliminar columna turno de listado de eventos
- [X] Corregir PA que permita "/"


## Observaciones 30-12-2021
### Pestaña turnos
- [AT] Observaciones (en caso de ausencia o reemplazo de personal) editar
- [AT] Eliminar personal (error en el sistema)
- [GZ] Listado personal para darle el atributo de ingresar usuarios

- [AT] En el listado de eventos (index) no muestra los moviles rurales.
- [AT] Solo registro de llamada en una sola hoja planilla

- [ ] Regular una llamada sólo por médico o enfermera reguladora (clasificación y clave médica)
- [ ] Médico clasifica la llamada (T1, T2, OT, NM)

- [AT] Hora de recepción de llamada quede registrado automaticamente (depende de cuando se carga la página).
- [AT] Evento cuadro informativo con colores
- [AT] QTC -> Eventos

- [AT] Call center (todas las ot en una pestaña aparte)
- [AT] Asignar o crear evento solo despacho en una pestaña aparte
- [ ] Call center solo llamados de dia ¿sólo los del turno?

### Filtros 
- [GZ] Filtro de call center por fecha, (hora), Nº event, ¿dirección, telefono?, personal

- [ ] Impresion de informes (de un Evento)
- [ ] Historial de cambios sólo para dra Astudillo
- [AT] Orden de salida de los moviles (listado de moviles) de acuerdo al orden de salida
- [ ] Estadisticas (enfermero, coordinador)

## Pendientes
- [x] Listar al crear un turno, los usuarios que tenga los permisos, operador o regulador o despachador y que no tenga el permiso auditor.
- [ ] Perfil de conductor solo pueda ver el sub menú de conductor.
# Notas Sistema SAMU
- Tripulación registrar movimientos, fecha en que asume
- Ubicación de las ambulancias
- Bloquear QTC si no tiene mobiles en servicio
