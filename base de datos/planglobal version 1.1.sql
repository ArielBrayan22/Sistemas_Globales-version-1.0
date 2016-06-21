-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2016 a las 06:38:42
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `planglobal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliografia`
--

CREATE TABLE `bibliografia` (
  `Id_Bibliografia` int(11) NOT NULL,
  `texto` text CHARACTER SET latin1 NOT NULL,
  `ID_PG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bibliografia`
--

INSERT INTO `bibliografia` (`Id_Bibliografia`, `texto`, `ID_PG`) VALUES
(2, 'Donald Eran, Pauline Baker, "COMPUTER GRAPHICS", Prentice Hall (1994). como los bucaneros', 4),
(3, 'M. E. Mortenson, "COMPUTER GRAPHICS An introduction to the mathematics and\r\nGeometry", Industrial Press\r\n', 1),
(4, 'Heinz-Otto Peitgen, Hartmut Jürgens, Dietmar Saupe, "FRACTALS FOR THE\r\nCLASSROOM Introduction to Fractals and Chaos", Springer Verlag (1993)\r\n', 1),
(5, 'Craig A. Lindley, "PRACTICAL RAY TRACING IN C", John Wiley and Sons (1992)\r\n', 1),
(6, 'los loros son magicos', 4),
(7, 'los loritos cantan', 4),
(8, 'Los Kramers son judios', 4),
(9, 'MARCK MAX ', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID_Carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(200) NOT NULL,
  `facultad` varchar(100) NOT NULL,
  `id_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID_Carrera`, `nombre_carrera`, `facultad`, `id_facultad`) VALUES
(1, 'Ingenieria De Sistemas', 'Tecnologia', 1),
(2, 'Ingenieria Civil', 'Tecnologia', 1),
(3, 'Nutricion', 'Medicina', 3),
(4, 'Medicina', 'Medicina', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `ID_Contenido` int(11) NOT NULL,
  `nombre_unidad` varchar(200) NOT NULL,
  `numero_unidad` int(11) NOT NULL,
  `objetivo` text NOT NULL,
  `contenido` text NOT NULL,
  `ID_PG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`ID_Contenido`, `nombre_unidad`, `numero_unidad`, `objetivo`, `contenido`, `ID_PG`) VALUES
(1, 'UNIDAD 1.- INTRODUCCIÓN A LAS GRÁFICAS POR COMPUTADORA', 1, 'Realizar una revisión histórica de la Infografía.\r\n\r\nPresentar las múltiples aplicaciones de la Infografía.\r\n\r\nPresentar los fundamentos de la Infografía.\r\n', 'Introducción a las Gráficas por Computadora\r\n\r\nAplicaciones\r\n\r\nHistoria de las Gráficas por Computadora\r\n\r\nDispositivos de Despliegue\r\n\r\nFundamentos gráficos\r\n', 1),
(2, 'UNIDAD 2.- FUNDAMENTOS MATEMATICOS PARA LA INFOGRAFIA\r\n', 2, 'Establecer claramente la relación entre algebra-geometría-código.\r\n\r\nProporcionar los fundamentos matemáticos usados en las Gráficas por Computadora.\r\n\r\nLograr un entendimiento geométrico de los conceptos matemáticos para su\r\nimplementación en software.', 'El álgebra Lineal y las Gráficas por Computadora\r\n\r\nSistemas de Coordenadas\r\n\r\nVectores y Matrices\r\n\r\nMatrices y las Transformaciones Lineales\r\n\r\nCoordenadas Homogéneas\r\n\r\nTransformaciones Afines\r\n\r\nMatrices Avanzadas y Proyecciones\r\n\r\nOrientación y Desplazamiento Angular en 3D\r\n\r\nGeneralización de las Transformaciones\r\n\r\nTransformaciones Window-Viewport\r\n\r\nVerificaciones Geométricas\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio`
--

CREATE TABLE `criterio` (
  `ID_Criterio` int(11) NOT NULL,
  `Criterio` text NOT NULL,
  `ID_PG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `criterio`
--

INSERT INTO `criterio` (`ID_Criterio`, `Criterio`, `ID_PG`) VALUES
(1, 'Los parciales y el Examen final se evaluarán con un examen escrito y una práctica cada uno. El\r\ntrabajo práctico servirá para reforzar los conocimientos adquiridos y para lograr la relación\r\nalgebra-geometría.', 1),
(2, 'Para el examen final, se desarrollará un proyecto que ponga en práctica todos los conceptos\r\ndesarrollados en el curso. La defensa será en computadora. Dependiendo de la cantidad de\r\nalumnos se puede considerar el trabajo en grupos de dos personas.', 2),
(4, 'UN MUNDO GRISS DE SENIORES PINGUINOS', 4),
(5, 'HOLA COMO ESTAS HODOR a', 2),
(6, 'EL CRITERIO SERIA EL SIGUIENTE', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma`
--

CREATE TABLE `cronograma` (
  `Id_Cronograma` int(11) NOT NULL,
  `ID_PG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cronograma`
--

INSERT INTO `cronograma` (`Id_Cronograma`, `ID_PG`) VALUES
(1, 4),
(2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `ID_Docente` int(11) NOT NULL,
  `Nombre_Completo` varchar(200) NOT NULL,
  `Apellido_Paterno` varchar(200) NOT NULL,
  `Apellido_Materno` varchar(200) NOT NULL,
  `Profesion` text NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Celular` int(11) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `User_Login` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ID_Docente`, `Nombre_Completo`, `Apellido_Paterno`, `Apellido_Materno`, `Profesion`, `Telefono`, `Celular`, `Correo`, `Direccion`, `User_Login`, `Password`) VALUES
(1, 'Jaime Christian   ', 'Villazon ', 'Alcocer', 'Ing. De Sistemas, Ing Electrico, Ing Electronico    ', 4543241, 77974363, 'christian@umss.edu.bo   ', 'av. America y Juan de La Rosa #132', 'angelito22', 'arcangel'),
(2, 'Ariel Brayan ', 'Ferrel ', 'Salvatierra', 'Ing. De Sistemas ', 4432412, 77902769, 'arielbrayan22@gmail.com ', '', 'reyben22', '123456'),
(3, 'Gustabo Augusto', 'Fernandez', 'Jimenes', 'Ing. De Sistemas', 4567378, 6754785, 'gustago_Augusto@gmail.com', 'zona Condebamba y calle Segunda', '', ''),
(4, 'Isrrael Cesar', 'Lobo', 'Vargas', 'Ing. De Sistemas', 567890, 78900, 'loba@gmail.com', '', 'lobo', '12345'),
(7, 'Augusto  ', 'Frut  ', 'Postre', 'Ing. De Sistemas ', 35523, 376476, 'augusto@gmail.com ', 'Calle cirvulanda entre hispana #154  ', '', ''),
(8, 'Juan Jose', 'Aquimedes', 'Gutierres', 'Ing. De Sistemas,Ing. En Informatica', 4567897, 77902769, 'juanca2016@gmail.com', 'Av. Siles # 196 ', 'juanAG', '2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `ID_Facultad` int(11) NOT NULL,
  `Facultad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`ID_Facultad`, `Facultad`) VALUES
(1, 'Facultad de Ciencias y Tecnologia'),
(2, 'Facultad de Ciencias Economicas'),
(3, 'Facultad de Medicina'),
(4, 'Facultad de Humanidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificacion`
--

CREATE TABLE `justificacion` (
  `Id_Justificacion` int(11) NOT NULL,
  `Justificacion` text NOT NULL,
  `ID_PG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `justificacion`
--

INSERT INTO `justificacion` (`Id_Justificacion`, `Justificacion`, `ID_PG`) VALUES
(1, 'Durante las últimas décadas, el campo de la Graficación por Computadora ha evolucionado de\r\nuna manera continua y rápida aplicándose a diversas áreas del saber humano que van desde la\r\nsimulación hasta el entretenimiento, muchas de las cuales han maravillado e impactado a la\r\nsociedad.\r\nEntre las numerosas aplicaciones, podemos mencionar las siguientes: Interfaces GUI, Industria\r\ndel Entretenimiento, Aplicaciones Comerciales, Diseño Asistido, Aplicaciones Científicas,\r\nMedicina, Cartografía y GIS.\r\nTodos estos sistemas, utilizados para fines tan diversos, tienen un fundamento subyacente que\r\nconsiste en una seria de técnicas derivadas de la aplicación de la Graficación por Computadora.\r\nEn este contexto se hace necesario un estudio de los algoritmos y técnicas gráficas que\r\npermitan el desarrollo de nuevas aplicaciones para solucionar diversos problemas que se\r\npresentan.\r\na\r\n', 1),
(2, 'Durante las últimas décadas, el campo de la Graficación por Computadora ha evolucionado de\r\nuna manera continua y rápida aplicándose a diversas áreas del saber humano que van desde la\r\nsimulación hasta el entretenimiento, muchas de las cuales han maravillado e impactado a la\r\nsociedad.\r\nEntre las numerosas aplicaciones, podemos mencionar las siguientes: Interfaces GUI, Industria\r\ndel Entretenimiento, Aplicaciones Comerciales, Diseño Asistido, Aplicaciones Científicas,\r\nMedicina, Cartografía y GIS.\r\nTodos estos sistemas, utilizados para fines tan diversos, tienen un fundamento subyacente que\r\nconsiste en una seria de técnicas derivadas de la aplicación de la Graficación por Computadora.\r\nEn este contexto se hace necesario un estudio de los algoritmos y técnicas gráficas que\r\npermitan el desarrollo de nuevas aplicaciones para solucionar diversos problemas que se\r\npresentan.\r\n', 3),
(20, 'Un nuevo horizonte', 5),
(21, 'LA METODOLOGIA ROBINSON 123142', 6),
(25, 'aaaa', 4),
(32, 'aaaaaaaaaaascdsadcfsdavsd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID_Materia` int(11) NOT NULL,
  `Nombre_Materia` varchar(200) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Grupo` varchar(10) NOT NULL,
  `Nivel_Materia` varchar(10) NOT NULL,
  `Carga_Horaria` varchar(100) NOT NULL,
  `Materias_Relacionadas` text NOT NULL,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_Materia`, `Nombre_Materia`, `Codigo`, `Grupo`, `Nivel_Materia`, `Carga_Horaria`, `Materias_Relacionadas`, `ID_Carrera`) VALUES
(1, 'GRAFICACION POR COMPUTADORA', 20100421, '1', 'D', '23 hrs/mes', 'Algoritmos Avanzados,\r\nProgramacion Web, \r\nTeoria de Grafos', 1),
(2, 'INTRODUCCION A LA PROGRAMACION', 2001020, '1', 'A', '23 hrs/mes', 'ELEMENTOS DE PROGRAMACION Y ESTRUCTURA DE DATOS,TALLER DE PROGRAMACION Y ESTRUCTURA DE DATOS', 1),
(3, 'ELEMENTOS DE PROGRAMACION Y ESTRUCTURA DE DATOS', 2001030, '1', 'B', '23 hrs/mes', 'BASE DE DATOS I,TALLER DE PROGRAMACION Y ESTRUCTURA DE DATOS', 1),
(4, 'TALLER DE PROGRAMACION Y ESTRUCTURA DE DATOS', 2001040, '1', 'C', '24 hrs/mes', 'BASE DE DATOS I,BASE DE DATOS II,SISTEMAS DE INFORMACION I', 1),
(5, 'SISTEMAS DE INFORMACION I', 2001060, '1', 'E', '30 hrs/mes', 'SISTEMAS DE INFORMACION II, INGENIERIA DE SOFTWARE', 1),
(6, 'FISICA I', 2001021, '1', 'A', '20 hrs/mes', 'FISCA II, FISICA III, ELECTROTECNIA', 1),
(8, 'INGENIERA DE SOFTWARE', 2019923, '1', 'G', '24 hrs/mes', 'SISTEMAS DE INFORMACION, TALLER DE INGENIERIA DE SOFTWARE', 1),
(10, 'QUIMICA', 2894098, '1', 'A', '24 hrs/mes', 'QUIMICA II, ', 1),
(11, 'SISTEMAS DE INFORMACION I', 2001060, '2', 'E', '24 hrs/mes', 'ELEMENTOS DE PROGRAMACION Y ESTRUCTURA DE DATOS,TALLER DE PROGRAMACION Y ESTRUCTURA DE DATOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodologia`
--

CREATE TABLE `metodologia` (
  `ID_Metod` int(11) NOT NULL,
  `Metodologia` text NOT NULL,
  `ID_PG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `metodologia`
--

INSERT INTO `metodologia` (`ID_Metod`, `Metodologia`, `ID_PG`) VALUES
(1, 'Los cursos estarán compuestos de clases magistrales en aula, complementados por ejercicio,\r\ndonde el alumno podrá poner en práctica los conceptos aprendidos. El curso tendrá sesiones\r\nprácticas en laboratorio, donde el alumno debe participar con sus dudas y resultados de los\r\nejercicios propuestos.\r\n', 4),
(2, 'En las clases, los alumnos deberán mostrarse participativos, y deberán mostrar creatividad e\r\niniciativa en la resolución de los ejercicios planteados\r\n', 1),
(3, 'un mundo lleno de alegria y sin egoismo nesecitamos todos', 4),
(6, 'ROMEO VALIENTE PELEO CONTRA LA MUERTE', 4),
(7, 'SE REALIZAR DOS EXAMENES PARA APROBAR LA MATERIA\r\nEN CASO DE NO APROBAR DEBERA APLICAR EL EXAMEN FINAL', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivo`
--

CREATE TABLE `objetivo` (
  `ID_Objetivos` int(11) NOT NULL,
  `ID_PG` int(11) NOT NULL,
  `Texto_Obj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `objetivo`
--

INSERT INTO `objetivo` (`ID_Objetivos`, `ID_PG`, `Texto_Obj`) VALUES
(1, 3, 'Tener los suficientes fundamentos matemáticos, geométricos y de programación para\r\ndesarrollar aplicaciones gráficas.'),
(2, 3, 'Introducir los algoritmos y estructura de datos necesarios para presentar datos gráficamente\r\nen una computadora.'),
(3, 1, 'Estudiar la generación de las primitivas básicas y su correspondiente manipulación.'),
(4, 3, 'Desarrollar modelos 3D, junto con su representación, visualización y transformación.'),
(5, 3, 'Generar imágenes con realismo fotográfico.'),
(6, 3, 'Aprender algoritmos y técnicas para el modelamiento geométrico.'),
(7, 4, 'Tener conocimiento sobre los modelos Fractales y su aplicación.'),
(11, 4, 'hjhjhjhj'),
(12, 4, 'objetos conocidos'),
(20, 4, 'hola clariza como estas'),
(21, 4, 'una manta'),
(22, 4, 'una manta'),
(24, 5, 'hola mam');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planglobal`
--

CREATE TABLE `planglobal` (
  `ID_PG` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planglobal`
--

INSERT INTO `planglobal` (`ID_PG`, `tipo`, `ID_Materia`, `ID_Docente`) VALUES
(1, 'Normal', 1, 2),
(3, 'Titular', 2, 1),
(4, 'Titular', 3, 4),
(5, 'Titular', 4, 2),
(6, 'Titular', 5, 2),
(13, 'Normal', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_contenido`
--

CREATE TABLE `seccion_contenido` (
  `ID_Contenido` int(11) NOT NULL,
  `Contenido` text NOT NULL,
  `ID_Unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion_contenido`
--

INSERT INTO `seccion_contenido` (`ID_Contenido`, `Contenido`, `ID_Unidad`) VALUES
(1, 'Introducción a las Gráficas por Computadora\r\na', 1),
(3, 'Historia de las Gráficas por Computadora', 1),
(4, 'Dispositivos de Despliegue', 1),
(5, 'Fundamentos gráficos', 1),
(6, 'knfkjvnskjnkjfnvsf', 2),
(7, 'kdnslkdnlskdnlkds', 2),
(8, 'knfkjvnskjnkjfnvsf', 3),
(10, 'LA FUERZA DE LOS PARACENTIOS DEL QUARTS', 2),
(11, 'habita el horizonte', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_objetivo`
--

CREATE TABLE `seccion_objetivo` (
  `ID_Objetivo` int(11) NOT NULL,
  `Objetivo` text NOT NULL,
  `ID_Unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion_objetivo`
--

INSERT INTO `seccion_objetivo` (`ID_Objetivo`, `Objetivo`, `ID_Unidad`) VALUES
(1, 'Presentar las múltiples aplicaciones de la Infografia', 1),
(2, 'Realizar una revisión histórica de la Infografía.', 1),
(3, 'Presentar los fundamentos de la Infografía. ', 1),
(4, 'ksdnfksandfkjsnfkjns', 2),
(5, 'sdfsagsafgdfadfvd', 2),
(6, 'CONCEPTO DE SECUENCIAS', 3),
(8, 'aaa', 16),
(9, ' EL TIEMPO ES VALIOSO', 17),
(10, ' EL TIEMPO ES VALIOSO 2', 17),
(11, ' adsdfd', 17),
(12, ' ', 18),
(13, ' ', 18),
(14, ' OIL', 23),
(15, ' MATAMBA', 23),
(16, ' ANOTHER', 26),
(18, ' AMBLIAR EL MAR', 27),
(20, ' son mamiferos', 27),
(22, ' la historia de jack froz', 34),
(23, ' habita el mar azil', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `ID_Unidad` int(11) NOT NULL,
  `Unidad` text NOT NULL,
  `Numero_Unidad` int(11) NOT NULL,
  `Hora_Academica` int(11) NOT NULL,
  `Cant_Semana` int(11) NOT NULL,
  `ID_PG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`ID_Unidad`, `Unidad`, `Numero_Unidad`, `Hora_Academica`, `Cant_Semana`, `ID_PG`) VALUES
(1, 'INTRODUCCIÓN Aa LAS GRÁFICAS POR COMPUTADORA', 1, 11, 12, 3),
(2, 'FUNDAMENTOS MATEMATICOS PARA LA INFOGRAFIA', 2, 12, 23, 3),
(3, 'ALGORITMOS Y CONCEPTOS BASICOS', 3, 23, 45, 3),
(23, ' LACUNA COIL', 7, 0, 0, 3),
(24, ' EL BOSQUE DE LOS LAMENTOS CIEGOS Y OSCUROS', 1, 21, 2, 4),
(25, ' EL BOSQUE DE LAS ADAS ENCANTADAS', 2, 24, 3, 4),
(26, 'UN NUEVO HOTIZONTE', 1, 10, 2, 4),
(27, 'EL Gran barco', 1, 11, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_User` int(11) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `ID_Docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_User`, `alias`, `password`, `Cargo`, `ID_Docente`) VALUES
(1, 'AdminCS', '12345', 'Administrador', 2),
(2, 'reyben22', '12345', 'Docente', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bibliografia`
--
ALTER TABLE `bibliografia`
  ADD PRIMARY KEY (`Id_Bibliografia`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_Carrera`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`ID_Contenido`);

--
-- Indices de la tabla `criterio`
--
ALTER TABLE `criterio`
  ADD PRIMARY KEY (`ID_Criterio`);

--
-- Indices de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`Id_Cronograma`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`ID_Docente`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`ID_Facultad`);

--
-- Indices de la tabla `justificacion`
--
ALTER TABLE `justificacion`
  ADD PRIMARY KEY (`Id_Justificacion`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_Materia`);

--
-- Indices de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  ADD PRIMARY KEY (`ID_Metod`);

--
-- Indices de la tabla `objetivo`
--
ALTER TABLE `objetivo`
  ADD PRIMARY KEY (`ID_Objetivos`);

--
-- Indices de la tabla `planglobal`
--
ALTER TABLE `planglobal`
  ADD PRIMARY KEY (`ID_PG`);

--
-- Indices de la tabla `seccion_contenido`
--
ALTER TABLE `seccion_contenido`
  ADD PRIMARY KEY (`ID_Contenido`);

--
-- Indices de la tabla `seccion_objetivo`
--
ALTER TABLE `seccion_objetivo`
  ADD PRIMARY KEY (`ID_Objetivo`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`ID_Unidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bibliografia`
--
ALTER TABLE `bibliografia`
  MODIFY `Id_Bibliografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `ID_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `ID_Contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `criterio`
--
ALTER TABLE `criterio`
  MODIFY `ID_Criterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `Id_Cronograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `ID_Docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `ID_Facultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `justificacion`
--
ALTER TABLE `justificacion`
  MODIFY `Id_Justificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  MODIFY `ID_Metod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `objetivo`
--
ALTER TABLE `objetivo`
  MODIFY `ID_Objetivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `planglobal`
--
ALTER TABLE `planglobal`
  MODIFY `ID_PG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `seccion_contenido`
--
ALTER TABLE `seccion_contenido`
  MODIFY `ID_Contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `seccion_objetivo`
--
ALTER TABLE `seccion_objetivo`
  MODIFY `ID_Objetivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `ID_Unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
