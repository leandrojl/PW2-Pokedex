-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 09:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokedex`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
                           `id` int(11) NOT NULL,
                           `nro_id_unico` int(11) NOT NULL,
                           `imagen` varchar(255) DEFAULT NULL,
                           `nombre` varchar(100) NOT NULL,
                           `descripcion` text DEFAULT NULL,
                           `tipo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`id`, `nro_id_unico`, `imagen`, `nombre`, `descripcion`, `tipo_id`) VALUES
                                                                                               (1, 1, 'Charmander', 'Charmander', 'Pequeño lagarto que escupe fuego.', 1),
                                                                                               (2, 2, 'Vulpix', 'Vulpix', 'Zorro con seis colas que controla el fuego.', 1),
                                                                                               (3, 3, 'Growlithe', 'Growlithe', 'Leal y valiente, siempre alerta.', 1),
                                                                                               (4, 4, 'Magmar', 'Magmar', 'Pokémon envuelto en llamas intensas.', 1),
                                                                                               (5, 5, 'Torchic', 'Torchic', 'Polluelo que lanza llamas desde su pico.', 1),
                                                                                               (6, 6, 'Squirtle', 'Squirtle', 'Tortuga que lanza chorros de agua.', 2),
                                                                                               (7, 7, 'Psyduck', 'Psyduck', 'Sufre de dolores de cabeza y usa poderes psíquicos.', 2),
                                                                                               (8, 8, 'Vaporeon', 'Vaporeon', 'Su cuerpo puede disolverse en agua.', 2),
                                                                                               (9, 9, 'Seel', 'Seel', 'Nadó por los mares del hielo durante años.', 2),
                                                                                               (10, 10, 'Totodile', 'Totodile', 'Pequeño cocodrilo que usa potentes mandíbulas.', 2),
                                                                                               (11, 11, 'Bulbasaur', 'Bulbasaur', 'Planta que crece en su espalda.', 3),
                                                                                               (12, 12, 'Oddish', 'Oddish', 'Planta que absorbe nutrientes bajo tierra.', 3),
                                                                                               (13, 13, 'Chikorita', 'Chikorita', 'Libera un aroma calmante desde su hoja.', 3),
                                                                                               (14, 14, 'Treecko', 'Treecko', 'Lagartija que puede escalar árboles con facilidad.', 3),
                                                                                               (15, 15, 'Turtwig', 'Turtwig', 'Su caparazón es como una pequeña colina.', 3),
                                                                                               (16, 16, 'Pichu', 'Pichu', 'Un pequeño Pokémon eléctrico que crece al establecer un vínculo con su entrenador.', 4),
                                                                                               (17, 17, 'Pikachu', 'Pikachu', 'Un Pokémon eléctrico muy popular, conocido por su habilidad para lanzar rayos.', 4),
                                                                                               (18, 18, 'Raichu', 'Raichu', 'Evoluciona de Pikachu, con una mayor capacidad para generar electricidad.', 4),
                                                                                               (19, 19, 'Magnemite', 'Magnemite', 'Pokémon eléctrico de tipo Acero, que usa magnetismo para atraer objetos metálicos.', 4),
                                                                                               (20, 20, 'Electrode', 'Electrode', 'Pokémon eléctrico que explota con un estallido eléctrico cuando está en peligro.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
                        `id` int(11) NOT NULL,
                        `descripcion` varchar(100) NOT NULL,
                        `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id`, `descripcion`, `imagen`) VALUES
                                                       (1, 'Fuego', NULL),
                                                       (2, 'Agua', NULL),
                                                       (3, 'Hierba', NULL),
                                                       (4, 'Electrico', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
                           `id` int(11) NOT NULL,
                           `nombre` varchar(50) NOT NULL,
                           `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`) VALUES
    (1, 'administrador', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo` (`tipo_id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pokemon`
--
ALTER TABLE `pokemon`
    ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
