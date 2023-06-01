-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: hospital
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aseguradora`
--

DROP TABLE IF EXISTS `aseguradora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aseguradora` (
  `numhistoria` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(32) DEFAULT NULL,
  `nombre_aseguradora` varchar(32) DEFAULT NULL,
  `numero_tarjeta` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`numhistoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historias`
--

DROP TABLE IF EXISTS `historias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historias` (
  `numhistoria` int(11) DEFAULT NULL,
  `num_autorizacion` varchar(32) DEFAULT NULL,
  `prestacion` varchar(32) DEFAULT NULL,
  `historia` varchar(1536) DEFAULT NULL,
  `peticiones` varchar(1536) DEFAULT NULL,
  `prescripciones` varchar(1536) DEFAULT NULL,
  `informes` varchar(1536) DEFAULT NULL,
  `hoja` varchar(1536) DEFAULT NULL,
  `infoquirofano` varchar(1536) DEFAULT NULL,
  `enfermeria` varchar(1536) DEFAULT NULL,
  `urgencia` varchar(1536) DEFAULT NULL,
  `documentacion` varchar(1536) DEFAULT NULL,
  `servicio` varchar(32) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `otradocumentacion` varchar(1536) DEFAULT NULL,
  `medico` varchar(32) DEFAULT NULL,
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(64) DEFAULT NULL,
  `imagen2` varchar(64) DEFAULT NULL,
  `imagen3` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `nombre` varchar(32) DEFAULT NULL,
  `1apellido` varchar(32) DEFAULT NULL,
  `2apellido` varchar(32) DEFAULT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `tipodoc` varchar(12) DEFAULT NULL,
  `documento` varchar(32) NOT NULL,
  `direccion` varchar(64) DEFAULT NULL,
  `localidad` varchar(32) DEFAULT NULL,
  `provincia` varchar(32) DEFAULT NULL,
  `codigopostal` varchar(32) DEFAULT NULL,
  `telefonom` varchar(32) DEFAULT NULL,
  `telefonof` varchar(32) DEFAULT NULL,
  `correoelectronico` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-01 12:24:59
