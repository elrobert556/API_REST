-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2023 a las 02:49:58
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_rest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(75) NOT NULL,
  `token` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `user_password` varchar(75) NOT NULL,
  `estado_usuario` varchar(50) NOT NULL,
  `privilegio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `token`, `salt`, `user_password`, `estado_usuario`, `privilegio`) VALUES
(1, 'joel@gmail.com', '$2y$10$k32PONTj193WCAwff5M2x.mr3eieaveLttc8dH6iVXk7fWmxYMd3i', '����\"j�����a�=g)#o�?123', 'a58646012b945777b303dbd357badf4351d61c705987d5c3065b0d0c800aa723', 'Activo', 'Admin'),
(2, 'fulano@gmail.com', '$2y$10$GOHYLwW1TxpFSEW7KSQKHupvhFyHFFuHjLvZR7rqb5HKPsKYtlkB.', '(L��z� AN�le*���˗x;�\'321', '6b87dbc3af2fa6aa5795e7c582ff98d46a379bc2ba51385f7e27da92ad6ba5f5', 'Inactivo', 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
