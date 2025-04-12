-- MySQL dump 10.13  Distrib 8.0.32, for macos13 (x86_64)
--
-- Host: 167.179.69.38    Database: biblioteca_infantil_geccal
-- ------------------------------------------------------
-- Server version	5.7.37

USE geccal;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
                       `id_autor` int(11) NOT NULL AUTO_INCREMENT,
                       `no_autor` varchar(45) NOT NULL,
                       `st_ativo` tinyint(1) NOT NULL,
                       `dt_cadastro` datetime NOT NULL,
                       PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=555 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `autor_livro`
--

DROP TABLE IF EXISTS `autor_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor_livro` (
                             `id_autor` int(11) NOT NULL,
                             `id_livro` int(11) NOT NULL,
                             PRIMARY KEY (`id_autor`,`id_livro`),
                             KEY `fk_autor_has_livro_livro1_idx` (`id_livro`),
                             KEY `fk_autor_has_livro_autor1_idx` (`id_autor`),
                             CONSTRAINT `fk_autor_has_livro_autor1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                             CONSTRAINT `fk_autor_has_livro_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `baixa_livro`
--

DROP TABLE IF EXISTS `baixa_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `baixa_livro` (
                             `id_baixa_livro` int(11) NOT NULL AUTO_INCREMENT,
                             `dt_baixa` datetime NOT NULL,
                             `no_motivo_baixa` text NOT NULL,
                             `st_ativo` tinyint(1) NOT NULL,
                             `dt_retorno` datetime DEFAULT NULL,
                             `no_motivo_retorno` text,
                             `id_usuario` int(11) NOT NULL,
                             `id_livro` int(11) NOT NULL,
                             PRIMARY KEY (`id_baixa_livro`),
                             KEY `fk_baixa_livro_usuario1` (`id_usuario`),
                             KEY `fk_baixa_livro_livro1` (`id_livro`),
                             CONSTRAINT `fk_baixa_livro_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                             CONSTRAINT `fk_baixa_livro_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1263 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ciclo`
--

DROP TABLE IF EXISTS `ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciclo` (
                       `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
                       `no_ciclo` varchar(45) NOT NULL,
                       `st_ativo` tinyint(1) NOT NULL,
                       PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclo`
--

LOCK TABLES `ciclo` WRITE;
/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
INSERT INTO `ciclo` VALUES (1,'Maternal',1),(2,'Jardim',1),(3,'1º Ciclo',1),(4,'2º Ciclo',1),(5,'3º Ciclo',1),(12,'Pré Juventude',1),(13,'1º Ciclo B',1);
/*!40000 ALTER TABLE `ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colaborador` (
                             `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
                             `no_colaborador` text NOT NULL,
                             `st_ativo` tinyint(1) NOT NULL,
                             `no_endereco` varchar(45) DEFAULT NULL,
                             `no_bairro` varchar(20) DEFAULT NULL,
                             `no_cidade` varchar(45) DEFAULT NULL,
                             `nu_cep` varchar(9) DEFAULT NULL,
                             `dt_cadastro` datetime DEFAULT NULL,
                             `no_sexo` varchar(10) DEFAULT NULL,
                             `nu_fone_res` varchar(14) DEFAULT NULL,
                             `nu_fone_cel` varchar(14) DEFAULT NULL,
                             `no_email` varchar(45) DEFAULT NULL,
                             `id_func` int(11) NOT NULL,
                             PRIMARY KEY (`id_colaborador`),
                             KEY `fk_colaborador_funcao_atividade1` (`id_func`),
                             CONSTRAINT `fk_colaborador_funcao_atividade1` FOREIGN KEY (`id_func`) REFERENCES `funcao_atividade` (`id_func`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaborador`
--

LOCK TABLES `colaborador` WRITE;
/*!40000 ALTER TABLE `colaborador` DISABLE KEYS */;
INSERT INTO `colaborador` VALUES (1,'Cezar Zaleski',1,'','','','','2013-01-01 00:00:00','Masculino','','(61) 9999-9999','',1),(5,'Marília',1,NULL,NULL,NULL,'','2013-03-26 14:33:53','Feminino','','','',6),(6,'Kelly ',1,NULL,NULL,NULL,'','2013-03-26 14:34:06','Feminino','','','',6),(7,'André Guilherme',1,NULL,NULL,NULL,'','2013-03-26 14:34:22','Masculino','','','',6),(8,'Nathália',1,NULL,NULL,NULL,'','2013-03-26 14:35:09','Feminino','','','',6),(9,'Wagner',1,NULL,NULL,NULL,'','2013-03-26 14:35:21','Masculino','','','',6),(10,'Izadora ',1,NULL,NULL,NULL,'','2013-03-26 14:35:33','Feminino','','','',6),(11,'João',1,NULL,NULL,NULL,'','2013-03-26 14:35:44','Masculino','','','',6),(12,'Beatriz ',1,NULL,NULL,NULL,'','2013-03-26 14:36:24','Feminino','','','',6),(13,'Sara',1,NULL,NULL,NULL,'','2013-03-26 14:36:35','Feminino','','','',6),(14,'Cristina',1,NULL,NULL,NULL,'','2013-03-26 14:36:56','Feminino','','','',6),(15,'Cristiane',1,NULL,NULL,NULL,'','2013-03-26 14:37:12','Feminino','','','',6),(16,'Kleber',1,NULL,NULL,NULL,'','2013-03-26 14:37:25','Masculino','','','',6),(17,'Grazielle',1,NULL,NULL,NULL,'','2013-03-26 14:37:50','Feminino','','','',6),(18,'Simone',1,NULL,NULL,NULL,'','2013-03-26 14:38:05','Feminino','','','',6),(19,'Karina',1,NULL,NULL,NULL,'','2013-03-26 14:38:36','Feminino','','','',6),(20,'Jessyca',1,NULL,NULL,NULL,'','2013-03-26 14:38:53','Feminino','','','',6),(21,'Grupo Espírita Cristão a Caminho da Luz',1,NULL,NULL,NULL,'','2013-05-10 11:58:37','Masculino','','','',1),(22,'Priscila',1,NULL,NULL,NULL,'','2013-09-21 10:55:22','Feminino','','','',1),(23,'Jussara',1,NULL,NULL,NULL,'','2014-04-19 10:00:50','Feminino','','','',6),(24,'Kilma',1,NULL,NULL,NULL,'','2014-05-24 11:03:11','Feminino','','','',1),(25,'Nayane',1,NULL,NULL,NULL,'','2015-03-10 20:39:14','Feminino','','','',6),(26,'André Guilherme ',0,NULL,NULL,NULL,'','2015-03-10 20:56:19','Masculino','','','',6),(27,'Daniel Freitas',1,NULL,NULL,NULL,'','2015-03-10 20:57:03','Masculino','','','',6),(28,'Guilherme ',1,NULL,NULL,NULL,'','2015-03-11 19:09:37','Masculino','','','',6),(29,'Lyvia Morais ',1,NULL,NULL,NULL,'','2015-03-11 19:33:00','Feminino','','','',6),(30,'Lidía Alexandrina Maia',1,NULL,NULL,NULL,'','2015-03-28 11:00:21','Feminino','','','',6),(31,'Guilherme Ferreira',1,NULL,NULL,NULL,'','2016-02-23 23:32:10','Masculino','','','',6),(32,'Caio Chaves',1,NULL,NULL,NULL,'','2016-02-23 23:33:25','Masculino','','','',6),(33,'Amanda Gabriela de Oliveira Sousa',1,NULL,NULL,NULL,'','2016-03-19 10:26:00','Feminino','','','',1),(34,'Adriana Pereira Lemos de São José',1,'','','','','2016-04-16 10:06:24','Feminino','','','',7),(35,'Daniela Angelo',1,'','','','','2016-04-16 10:07:44','Feminino','','','',7),(36,'Raquel',1,NULL,NULL,NULL,'','2016-05-07 10:48:29','Feminino','','','',6),(37,'Daniele Maia',1,NULL,NULL,NULL,'','2016-05-07 11:07:56','Feminino','','','',7),(38,'Jussara',1,NULL,NULL,NULL,'','2016-10-08 09:34:36','Feminino','','','',7),(39,'Deise Andrade ',1,NULL,NULL,NULL,'','2016-11-05 10:27:34','Feminino','','','',7),(40,'Ruth Rodrigues Mendes Ferreira',1,NULL,NULL,NULL,'','2016-11-05 10:42:46','Feminino','','','',7),(41,'Larissa Ventura',1,NULL,NULL,NULL,'','2017-04-29 10:55:21','Feminino','','','',6),(42,'Alley Morrissey Oliveira',1,NULL,NULL,NULL,'','2018-06-16 09:54:15','Masculino','','','',6),(43,'Luciene ',1,NULL,NULL,NULL,'','2019-03-06 21:47:26','Feminino','','','',6),(44,'Andréia',1,NULL,NULL,NULL,'','2019-03-06 21:49:28','Feminino','','','',6),(45,'Ana Maria Rabelo ',1,NULL,NULL,NULL,'','2019-03-06 21:50:11','Feminino','','','',6),(52,'Luciana Stein',1,NULL,NULL,NULL,'','2020-03-06 20:56:59','Feminino','','','',6),(62,'Ana Maria Rabelo',1,NULL,NULL,NULL,'','2020-03-06 20:58:50','Feminino','','','',6),(72,'Talita Queiroz',1,NULL,NULL,NULL,'','2020-03-06 20:59:16','Feminino','','','',6),(73,'Camila souza',1,NULL,NULL,NULL,'','2022-11-05 10:48:22','Feminino','','','',6),(74,'Maria Clara',1,NULL,NULL,NULL,'','2022-11-12 11:15:36','Feminino','','','',7),(75,'Emanuelle Santos',1,NULL,NULL,NULL,'','2022-11-12 11:16:40','Feminino','','','',7),(76,'Vera',1,NULL,NULL,NULL,'','2022-11-12 11:17:21','Feminino','','','',7),(77,'Ana Cristina',1,NULL,NULL,NULL,'','2022-11-12 11:18:09','Feminino','','','',7),(78,'Ângelo',1,NULL,NULL,NULL,'','2022-11-12 11:19:10','Feminino','','','',7),(79,'Eumar',1,NULL,NULL,NULL,'','2022-11-12 11:21:44','Feminino','','','',7),(80,'Diogo',1,NULL,NULL,NULL,'','2022-11-12 11:22:29','Masculino','','','',7),(81,'Laura',1,NULL,NULL,NULL,'','2023-03-02 23:47:46','Feminino','','','',6),(82,'Letícia',1,NULL,NULL,NULL,'','2023-03-02 23:48:02','Feminino','','','',6),(83,'Marina',1,NULL,NULL,NULL,'','2023-03-02 23:48:25','Feminino','','','',6),(84,'Lorena Rios',1,NULL,NULL,NULL,'','2023-03-02 23:59:03','Feminino','','','',6),(85,'Luciene',1,NULL,NULL,NULL,'','2023-03-02 23:59:20','Feminino','','','',6),(86,'Débora',1,NULL,NULL,NULL,'','2023-03-25 09:42:43','Feminino','','','',7),(87,'Sarah Marinho',1,NULL,NULL,NULL,'','2023-03-25 09:44:03','Feminino','','','',7);
/*!40000 ALTER TABLE `colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaborador_turma`
--

DROP TABLE IF EXISTS `colaborador_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colaborador_turma` (
                                   `id_colaborador_turma` int(11) NOT NULL AUTO_INCREMENT,
                                   `data_cadastro` datetime NOT NULL,
                                   `st_ativo` tinyint(1) NOT NULL,
                                   `id_turma` int(11) NOT NULL,
                                   `id_colaborador` int(11) NOT NULL,
                                   `id_usuario` int(11) NOT NULL,
                                   PRIMARY KEY (`id_colaborador_turma`),
                                   KEY `fk_colaborador_turma_turma1_idx` (`id_turma`),
                                   KEY `fk_colaborador_turma_colaborador1_idx` (`id_colaborador`),
                                   KEY `fk_colaborador_turma_usuario1_idx` (`id_usuario`),
                                   CONSTRAINT `fk_colaborador_turma_colaborador1` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                   CONSTRAINT `fk_colaborador_turma_turma1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                   CONSTRAINT `fk_colaborador_turma_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `controller`
--

DROP TABLE IF EXISTS `controller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `controller` (
                            `id_controller` int(11) NOT NULL AUTO_INCREMENT,
                            `no_controller` text NOT NULL,
                            `no_submodulo` varchar(45) NOT NULL,
                            `dt_cadastro` datetime NOT NULL,
                            `st_ativo` tinyint(1) NOT NULL,
                            `id_modulo` int(11) NOT NULL,
                            PRIMARY KEY (`id_controller`),
                            KEY `fk_controller_modulo1_idx` (`id_modulo`),
                            CONSTRAINT `fk_controller_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controller`
--

LOCK TABLES `controller` WRITE;
/*!40000 ALTER TABLE `controller` DISABLE KEYS */;
INSERT INTO `controller` VALUES (1,'editora','Editora','2013-01-15 00:00:00',1,4),(2,'autor','Autor','2013-01-15 00:00:00',1,4),(3,'funcao-atividade','Função/Atividade','2013-01-15 00:00:00',1,2),(4,'colaborador','Colaborador','2013-01-15 00:00:00',1,3),(5,'perfil','Perfil','2013-01-19 00:00:00',1,2),(6,'usuario','Usuário','2013-01-25 00:00:00',1,2),(7,'livro','Livro','2013-01-28 00:00:00',1,4),(8,'evangelizando','Evangelizando','2013-02-04 00:00:00',1,3),(9,'turma','Turma','2013-02-04 00:00:00',1,2),(10,'matricula','Matricula','2013-02-06 00:00:00',1,3),(11,'emprestimo','Emprestimo','2013-02-08 00:00:00',1,4);
/*!40000 ALTER TABLE `controller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editora` (
                         `id_editora` int(11) NOT NULL AUTO_INCREMENT,
                         `no_editora` varchar(45) NOT NULL,
                         `dt_cadastro` datetime NOT NULL,
                         `st_ativo` tinyint(1) NOT NULL,
                         PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimo` (
                            `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
                            `dt_emprestimo` datetime NOT NULL,
                            `dt_prev_devolucao` datetime NOT NULL,
                            `nu_ano` int(11) NOT NULL,
                            `st_ativo` tinyint(1) NOT NULL,
                            `dt_devolucao` datetime DEFAULT NULL,
                            `id_colaborador` int(11) DEFAULT NULL,
                            `id_evangelizando_turma` int(11) DEFAULT NULL,
                            `id_usuario` int(11) NOT NULL,
                            `id_livro` int(11) NOT NULL,
                            `observacao` varchar(200) DEFAULT NULL,
                            PRIMARY KEY (`id_emprestimo`),
                            KEY `fk_emprestimo_colaborador1_idx` (`id_colaborador`),
                            KEY `fk_emprestimo_evangelizando_turma1_idx` (`id_evangelizando_turma`),
                            KEY `fk_emprestimo_usuario1_idx` (`id_usuario`),
                            KEY `fk_emprestimo_livro1_idx` (`id_livro`),
                            CONSTRAINT `fk_emprestimo_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9543 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emprestimo_baixa_pandemia`
--

DROP TABLE IF EXISTS `emprestimo_baixa_pandemia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimo_baixa_pandemia` (
                                           `id_emprestimo` int(11) NOT NULL DEFAULT '0',
                                           `dt_emprestimo` datetime NOT NULL,
                                           `dt_prev_devolucao` datetime NOT NULL,
                                           `nu_ano` int(11) NOT NULL,
                                           `st_ativo` tinyint(1) NOT NULL,
                                           `dt_devolucao` datetime DEFAULT NULL,
                                           `id_colaborador` int(11) DEFAULT NULL,
                                           `id_evangelizando_turma` int(11) DEFAULT NULL,
                                           `id_usuario` int(11) NOT NULL,
                                           `id_livro` int(11) NOT NULL,
                                           `devolvido` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `evangelizando`
--

DROP TABLE IF EXISTS `evangelizando`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evangelizando` (
                               `id_evangelizando` int(11) NOT NULL AUTO_INCREMENT,
                               `no_evangelizando` text NOT NULL,
                               `dt_cadastro` datetime NOT NULL,
                               `st_ativo` tinyint(1) NOT NULL,
                               `no_sexo` varchar(45) NOT NULL,
                               `no_pai` text,
                               `no_mae` text,
                               `no_endereco` text,
                               `no_bairro` varchar(20) DEFAULT NULL,
                               `no_cidade` varchar(45) DEFAULT NULL,
                               `nu_cep` varchar(9) DEFAULT NULL,
                               `dt_nascimento` datetime DEFAULT NULL,
                               `nu_fone_res` varchar(14) DEFAULT NULL,
                               `nu_fone_cel` varchar(14) DEFAULT NULL,
                               `no_obs` text,
                               PRIMARY KEY (`id_evangelizando`)
) ENGINE=InnoDB AUTO_INCREMENT=699 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Table structure for table `evangelizando_turma`
--

DROP TABLE IF EXISTS `evangelizando_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evangelizando_turma` (
                                     `id_evangelizando_turma` int(11) NOT NULL AUTO_INCREMENT,
                                     `st_ativo` tinyint(1) NOT NULL,
                                     `dt_cadastro` datetime NOT NULL,
                                     `id_turma` int(11) NOT NULL,
                                     `id_evangelizando` int(11) NOT NULL,
                                     `id_usuario` int(11) NOT NULL,
                                     PRIMARY KEY (`id_evangelizando_turma`),
                                     KEY `fk_evangelizando_turma_turma1_idx` (`id_turma`),
                                     KEY `fk_evangelizando_turma_evangelizando1_idx` (`id_evangelizando`),
                                     KEY `fk_evangelizando_turma_usuario1_idx` (`id_usuario`),
                                     CONSTRAINT `fk_evangelizando_turma_evangelizando1` FOREIGN KEY (`id_evangelizando`) REFERENCES `evangelizando` (`id_evangelizando`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                     CONSTRAINT `fk_evangelizando_turma_turma1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                     CONSTRAINT `fk_evangelizando_turma_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2020 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `funcao_atividade`
--

DROP TABLE IF EXISTS `funcao_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcao_atividade` (
                                  `id_func` int(11) NOT NULL AUTO_INCREMENT,
                                  `no_funcao` varchar(45) NOT NULL,
                                  `st_ativo` tinyint(1) NOT NULL,
                                  PRIMARY KEY (`id_func`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcao_atividade`
--

LOCK TABLES `funcao_atividade` WRITE;
/*!40000 ALTER TABLE `funcao_atividade` DISABLE KEYS */;
INSERT INTO `funcao_atividade` VALUES (1,'Bibliotecario',1),(6,'Evangelizador(a)',1),(7,'Pai',1);
/*!40000 ALTER TABLE `funcao_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionalidade`
--

DROP TABLE IF EXISTS `funcionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionalidade` (
                                `id_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
                                `no_funcionalidade` varchar(45) NOT NULL,
                                `dt_cadastro` datetime NOT NULL,
                                `st_ativo` tinyint(1) NOT NULL,
                                `no_menu` varchar(45) DEFAULT NULL,
                                `id_tipo_funcionalidade` int(11) NOT NULL,
                                `id_controller` int(11) NOT NULL,
                                PRIMARY KEY (`id_funcionalidade`),
                                KEY `fk_funcionalidade_tipo_funcionalidade1_idx` (`id_tipo_funcionalidade`),
                                KEY `fk_funcionalidade_controller1_idx` (`id_controller`),
                                CONSTRAINT `fk_funcionalidade_controller1` FOREIGN KEY (`id_controller`) REFERENCES `controller` (`id_controller`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                CONSTRAINT `fk_funcionalidade_tipo_funcionalidade1` FOREIGN KEY (`id_tipo_funcionalidade`) REFERENCES `tipo_funcionalidade` (`id_tipo_funcionalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionalidade`
--

LOCK TABLES `funcionalidade` WRITE;
/*!40000 ALTER TABLE `funcionalidade` DISABLE KEYS */;
INSERT INTO `funcionalidade` VALUES (1,'listar_editora','2013-01-01 00:00:00',1,'Listar Editora',3,1),(2,'cadastrar_editora','2013-01-02 00:00:00',1,'Cadastrar Editora',1,1),(3,'editar_editora','2013-01-11 00:00:00',1,'',2,1),(4,'excluir_editora','2013-01-14 00:00:00',1,'',4,1),(5,'cadastrar_autor','2013-01-14 00:00:00',1,'Cadastrar Autor',1,2),(6,'listar_autor','2013-01-14 00:00:00',1,'Listar Autor',3,2),(7,'editar_autor','2013-01-14 00:00:00',1,'',2,2),(8,'excluir_autor','2013-01-14 00:00:00',1,'',4,2),(9,'cadastrar_funcao_atividade','2013-01-14 00:00:00',1,'Cadastrar Função/Atividade',1,3),(10,'listar_funcao_atividade','2013-01-15 00:00:00',1,'Listar Função/Atividade',3,3),(11,'editar_funcao_atividade','2013-01-15 00:00:00',1,'',2,3),(12,'excluir_funcao_atividade','2013-01-15 00:00:00',1,'',4,3),(13,'cadastrar_colaborador','2013-01-15 00:00:00',1,'Cadastrar Colaborador',1,4),(14,'listar_colaborador','2013-01-19 00:00:00',1,'Listar Colaborador',3,4),(15,'editar_colaborador','2013-01-17 00:00:00',1,'',2,4),(16,'excluir_colaborador','2013-01-19 00:00:00',1,'',4,4),(17,'cadastrar_perfil','2013-01-19 00:00:00',1,'Cadastrar Perfil',1,5),(18,'listar-perfil','2013-01-24 00:00:00',1,'Listar Perfil',3,5),(19,'editar_perfil','2013-01-24 00:00:00',1,NULL,2,5),(20,'excluir_perfil','2013-01-25 00:00:00',1,NULL,4,5),(21,'cadastrar_usuario','2013-01-25 00:00:00',1,'Cadastrar Usuário',1,6),(22,'listar_usuario','2013-01-26 00:00:00',1,'Listar Usuário',3,6),(23,'editar_usuario','2013-01-28 00:00:00',1,NULL,2,6),(24,'excluir_usuario','2013-01-28 00:00:00',1,NULL,4,6),(25,'cadastrar_livro','2013-01-28 00:00:00',1,'Cadastrar Livro',1,7),(26,'listar_livro','2013-01-30 00:00:00',1,'Listar Livro',3,7),(28,'editar_livro','2013-02-04 00:00:00',1,NULL,2,7),(29,'excluir_livro','2013-02-04 00:00:00',1,NULL,4,7),(30,'cadastrar_evangelizando','2013-02-04 00:00:00',1,'Cadastrar Evangelizando',1,8),(31,'listar_evangelizando','2013-02-04 00:00:00',1,'Listar Evangelizando',3,8),(32,'editar_evangelizando','2013-02-04 00:00:00',1,NULL,2,8),(33,'excluir_evangelizando','2013-02-04 00:00:00',1,NULL,4,8),(34,'cadastrar_turma','2013-02-04 00:00:00',1,'Cadastrar Turma',1,9),(35,'listar_turma','2013-02-05 00:00:00',1,'Listar Turma',3,9),(36,'editar_tuma','2013-02-05 00:00:00',1,NULL,2,9),(37,'excluir_turma','2013-02-05 00:00:00',1,NULL,4,9),(38,'cadastrar_matricula','2013-02-06 00:00:00',1,'Matricular Evangelizando',1,10),(39,'listar_matricula','2013-02-06 00:00:00',1,'Listar Matrícula',3,10),(40,'editar_matricula','2013-02-08 00:00:00',1,NULL,2,10),(41,'excluir_matricula','2013-02-08 00:00:00',1,NULL,4,10),(42,'cadastrar_emprestimo','2013-02-08 00:00:00',1,'Cadastrar Empréstimo',1,11),(43,'listar_emprestimo','2013-02-18 00:00:00',1,'Listar Empréstimo',3,11),(44,'editar_emprestimo','2013-04-29 00:00:00',1,NULL,2,11),(45,'excluir_emprestimo','2013-04-29 00:00:00',1,NULL,4,11);
/*!40000 ALTER TABLE `funcionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionalidade_perfil`
--

DROP TABLE IF EXISTS `funcionalidade_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionalidade_perfil` (
                                       `id_funcionalidade` int(11) NOT NULL,
                                       `id_perfil` int(11) NOT NULL,
                                       PRIMARY KEY (`id_funcionalidade`,`id_perfil`),
                                       KEY `fk_funcionalidade_has_perfil_perfil1` (`id_perfil`),
                                       KEY `fk_funcionalidade_has_perfil_funcionalidade1` (`id_funcionalidade`),
                                       CONSTRAINT `fk_funcionalidade_has_perfil_funcionalidade1` FOREIGN KEY (`id_funcionalidade`) REFERENCES `funcionalidade` (`id_funcionalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                       CONSTRAINT `fk_funcionalidade_has_perfil_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionalidade_perfil`
--

LOCK TABLES `funcionalidade_perfil` WRITE;
/*!40000 ALTER TABLE `funcionalidade_perfil` DISABLE KEYS */;
INSERT INTO `funcionalidade_perfil` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(1,5),(6,5),(10,5),(14,5),(18,5),(22,5),(26,5),(31,5),(35,5),(39,5),(43,5);
/*!40000 ALTER TABLE `funcionalidade_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
                       `id_livro` int(11) NOT NULL AUTO_INCREMENT,
                       `no_livro` text NOT NULL,
                       `nu_exemplar` varchar(10) NOT NULL,
                       `dt_cadastro` datetime NOT NULL,
                       `st_ativo` tinyint(1) NOT NULL,
                       `nu_edicao` varchar(11) DEFAULT NULL,
                       `nu_ano` int(11) DEFAULT NULL,
                       `no_obs` text,
                       `id_editora` int(11) NOT NULL,
                       `id_usuario` int(11) NOT NULL,
                       `id_origem_livro` int(11) NOT NULL,
                       PRIMARY KEY (`id_livro`),
                       KEY `fk_livro_editora1` (`id_editora`),
                       KEY `fk_livro_usuario1` (`id_usuario`),
                       KEY `fk_livro_origem_livro1_idx` (`id_origem_livro`),
                       CONSTRAINT `fk_livro_editora1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                       CONSTRAINT `fk_livro_origem_livro1` FOREIGN KEY (`id_origem_livro`) REFERENCES `origem_livro` (`id_origem_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                       CONSTRAINT `fk_livro_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1458 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modulo` (
                        `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
                        `no_modulo` varchar(45) NOT NULL,
                        `no_menu` varchar(45) NOT NULL,
                        `st_ativo` tinyint(1) NOT NULL,
                        `dt_cadastro` datetime NOT NULL,
                        `no_img` text NOT NULL,
                        PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'padrao','Home',0,'2013-01-01 00:00:00','home.png'),(2,'admin','Administracao',1,'2013-01-14 00:00:00','admin.png'),(3,'pessoa','Pessoa',1,'2013-01-14 00:00:00','pessoa.png'),(4,'livro','Livro',1,'2013-01-15 00:00:00','livro.png');
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origem_livro`
--

DROP TABLE IF EXISTS `origem_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `origem_livro` (
                              `id_origem_livro` int(11) NOT NULL AUTO_INCREMENT,
                              `no_origem` text NOT NULL,
                              `st_ativo` tinyint(1) NOT NULL,
                              PRIMARY KEY (`id_origem_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origem_livro`
--

LOCK TABLES `origem_livro` WRITE;
/*!40000 ALTER TABLE `origem_livro` DISABLE KEYS */;
INSERT INTO `origem_livro` VALUES (1,'Doação',1),(2,'Aquisição GECCAL',1),(3,'Sem Informação',1),(4,'Confecção GECCAL',1);
/*!40000 ALTER TABLE `origem_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil` (
                        `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
                        `no_perfil` varchar(45) NOT NULL,
                        `st_ativo` tinyint(1) NOT NULL,
                        PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador',1),(5,'Consulta',1);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recadastramento_livro`
--

DROP TABLE IF EXISTS `recadastramento_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recadastramento_livro` (
                                       `id_recadastramento_livro` int(11) NOT NULL AUTO_INCREMENT,
                                       `id_livro` int(11) NOT NULL,
                                       `nu_exemplar` int(11) NOT NULL,
                                       `date` date NOT NULL,
                                       PRIMARY KEY (`id_recadastramento_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recadastramento_livro`
--

LOCK TABLES `recadastramento_livro` WRITE;
/*!40000 ALTER TABLE `recadastramento_livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `recadastramento_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_controle_livro`
--

DROP TABLE IF EXISTS `tb_controle_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_controle_livro` (
                                   `id_livro` int(11) NOT NULL,
                                   `dt_controle` date NOT NULL,
                                   `st_encontrou` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_controle_livro`
--

LOCK TABLES `tb_controle_livro` WRITE;
/*!40000 ALTER TABLE `tb_controle_livro` DISABLE KEYS */;
INSERT INTO `tb_controle_livro` VALUES (517,'2016-05-01','S'),(390,'2016-05-01','N'),(136,'2016-05-01','S'),(319,'2016-05-01','S'),(70,'2016-05-01','N'),(560,'2016-05-01','N'),(595,'2016-05-01','S'),(127,'2016-05-01','S'),(78,'2016-05-01','S'),(62,'2016-05-01','S'),(764,'2016-05-01','S'),(278,'2016-05-01','N'),(279,'2016-05-01','N'),(722,'2016-05-01','S'),(419,'2016-05-01','S'),(409,'2016-05-01','N'),(725,'2016-05-01','S'),(726,'2016-05-01','S'),(573,'2016-05-01','S'),(76,'2016-05-01','N'),(646,'2016-05-01','N'),(661,'2016-05-01','N'),(408,'2016-05-01','N'),(719,'2016-05-01','S'),(563,'2016-05-01','N'),(481,'2016-05-01','S'),(284,'2016-05-01','S'),(625,'2016-05-01','N'),(626,'2016-05-01','N'),(731,'2016-05-01','S'),(732,'2016-05-01','S'),(615,'2016-05-01','S'),(158,'2016-05-01','S'),(693,'2016-05-01','S'),(369,'2016-05-01','S'),(664,'2016-05-01','S'),(192,'2016-05-01','S'),(640,'2016-05-01','N'),(151,'2016-05-01','S'),(476,'2016-05-01','S'),(505,'2016-05-01','S'),(698,'2016-05-01','S'),(373,'2016-05-01','S'),(374,'2016-05-01','S'),(375,'2016-05-01','S'),(91,'2016-05-01','S'),(586,'2016-05-01','S'),(587,'2016-05-01','S'),(83,'2016-05-01','S'),(201,'2016-05-01','N'),(202,'2016-05-01','N'),(205,'2016-05-01','S'),(222,'2016-05-01','S'),(223,'2016-05-01','S'),(340,'2016-05-01','S'),(341,'2016-05-01','N'),(613,'2016-05-01','N'),(184,'2016-05-01','S'),(185,'2016-05-01','N'),(410,'2016-05-01','N'),(411,'2016-05-01','S'),(194,'2016-05-01','N'),(195,'2016-05-01','N'),(181,'2016-05-01','N'),(63,'2016-05-01','N'),(584,'2016-05-01','S'),(163,'2016-05-01','N'),(146,'2016-05-01','S'),(182,'2016-05-01','N'),(183,'2016-05-01','S'),(440,'2016-05-01','S'),(683,'2016-05-01','N'),(588,'2016-05-01','N'),(526,'2016-05-01','S'),(107,'2016-05-01','N'),(259,'2016-05-01','S'),(605,'2016-05-01','S'),(678,'2016-05-01','S'),(161,'2016-05-01','S'),(511,'2016-05-01','S'),(147,'2016-05-01','S'),(612,'2016-05-01','S'),(165,'2016-05-01','S'),(166,'2016-05-01','N'),(167,'2016-05-01','N'),(249,'2016-05-01','N'),(532,'2016-05-01','N'),(527,'2016-05-01','S'),(324,'2016-05-01','S'),(597,'2016-05-01','S'),(74,'2016-05-01','S'),(157,'2016-05-01','S'),(403,'2016-05-01','N'),(404,'2016-05-01','S'),(310,'2016-05-01','N'),(311,'2016-05-01','N'),(123,'2016-05-01','S'),(553,'2016-05-01','N'),(172,'2016-05-01','S'),(758,'2016-05-01','N'),(148,'2016-05-01','N'),(418,'2016-05-01','N'),(740,'2016-05-01','S'),(741,'2016-05-01','S'),(252,'2016-05-01','S'),(253,'2016-05-01','S'),(254,'2016-05-01','N'),(255,'2016-05-01','N'),(407,'2016-05-01','S'),(247,'2016-05-01','N'),(189,'2016-05-01','S'),(557,'2016-05-01','S'),(337,'2016-05-01','S'),(312,'2016-05-01','S'),(574,'2016-05-01','N'),(228,'2016-05-01','N'),(230,'2016-05-01','N'),(231,'2016-05-01','N'),(232,'2016-05-01','N'),(233,'2016-05-01','N'),(234,'2016-05-01','S'),(235,'2016-05-01','S'),(236,'2016-05-01','S'),(89,'2016-05-01','S'),(701,'2016-05-01','S'),(757,'2016-05-01','S'),(651,'2016-05-01','S'),(109,'2016-05-01','S'),(494,'2016-05-01','S'),(576,'2016-05-01','S'),(599,'2016-05-01','S'),(387,'2016-05-01','S'),(654,'2016-05-01','N'),(742,'2016-05-01','S'),(551,'2016-05-01','S'),(743,'2016-05-01','N'),(745,'2016-05-01','N'),(464,'2016-05-01','S'),(465,'2016-05-01','N'),(556,'2016-05-01','N'),(269,'2016-05-01','S'),(606,'2016-05-01','N'),(134,'2016-05-01','S'),(454,'2016-05-01','S'),(620,'2016-05-01','N'),(627,'2016-05-01','S'),(704,'2016-05-01','S'),(150,'2016-05-01','N'),(507,'2016-05-01','N'),(508,'2016-05-01','N'),(509,'2016-05-01','S'),(510,'2016-05-01','N'),(607,'2016-05-01','S'),(512,'2016-05-01','S'),(699,'2016-05-01','S'),(131,'2016-05-01','N'),(67,'2016-05-01','S'),(218,'2016-05-01','S'),(680,'2016-05-01','S'),(735,'2016-05-01','S'),(747,'2016-05-01','S'),(713,'2016-05-01','S'),(155,'2016-05-01','S'),(288,'2016-05-01','S'),(714,'2016-05-01','S'),(145,'2016-05-01','N'),(211,'2016-05-01','N'),(212,'2016-05-01','N'),(213,'2016-05-01','N'),(436,'2016-05-01','S'),(594,'2016-05-01','S'),(631,'2016-05-01','S'),(473,'2016-05-01','S'),(371,'2016-05-01','S'),(68,'2016-05-01','S'),(130,'2016-05-01','S'),(344,'2016-05-01','S'),(682,'2016-05-01','N'),(534,'2016-05-01','S'),(335,'2016-05-01','S'),(442,'2016-05-01','S'),(443,'2016-05-01','S'),(566,'2016-05-01','S'),(82,'2016-05-01','N'),(399,'2016-05-01','S'),(124,'2016-05-01','S'),(402,'2016-05-01','S'),(737,'2016-05-01','S'),(738,'2016-05-01','S'),(639,'2016-05-01','S'),(762,'2016-05-01','N'),(756,'2016-05-01','S'),(695,'2016-05-01','S'),(727,'2016-05-01','S'),(689,'2016-05-01','S'),(301,'2016-05-01','N'),(549,'2016-05-01','S'),(472,'2016-05-01','N'),(125,'2016-05-01','S'),(753,'2016-05-01','S'),(435,'2016-05-01','S'),(641,'2016-05-01','N'),(66,'2016-05-01','S'),(521,'2016-05-01','S'),(313,'2016-05-01','N'),(712,'2016-05-01','S'),(190,'2016-05-01','S'),(191,'2016-05-01','S'),(589,'2016-05-01','S'),(544,'2016-05-01','S'),(206,'2016-05-01','N'),(208,'2016-05-01','N'),(209,'2016-05-01','S'),(210,'2016-05-01','N'),(437,'2016-05-01','N'),(441,'2016-05-01','S'),(608,'2016-05-01','S'),(397,'2016-05-01','S'),(398,'2016-05-01','S'),(86,'2016-05-01','N'),(178,'2016-05-01','S'),(720,'2016-05-01','S'),(582,'2016-05-01','S'),(61,'2016-05-01','S'),(118,'2016-05-01','S'),(342,'2016-05-01','S'),(623,'2016-05-01','N'),(624,'2016-05-01','N'),(632,'2016-05-01','N'),(603,'2016-05-01','N'),(156,'2016-05-01','S'),(546,'2016-05-01','N'),(482,'2016-05-01','S'),(483,'2016-05-01','S'),(276,'2016-05-01','N'),(142,'2016-05-01','S'),(591,'2016-05-01','S'),(592,'2016-05-01','N'),(438,'2016-05-01','N'),(439,'2016-05-01','N'),(456,'2016-05-01','N'),(457,'2016-05-01','N'),(458,'2016-05-01','N'),(459,'2016-05-01','N'),(460,'2016-05-01','N'),(461,'2016-05-01','N'),(462,'2016-05-01','N'),(516,'2016-05-01','S'),(580,'2016-05-01','S'),(707,'2016-05-01','S'),(761,'2016-05-01','N'),(600,'2016-05-01','S'),(110,'2016-05-01','S'),(422,'2016-05-01','S'),(656,'2016-05-01','S'),(345,'2016-05-01','S'),(358,'2016-05-01','N'),(121,'2016-05-01','S'),(697,'2016-05-01','S'),(621,'2016-05-01','N'),(622,'2016-05-01','N'),(635,'2016-05-01','S'),(637,'2016-05-01','S'),(84,'2016-05-01','S'),(270,'2016-05-01','N'),(602,'2016-05-01','S'),(596,'2016-05-01','S'),(87,'2016-05-01','N'),(378,'2016-05-01','S'),(590,'2016-05-01','S'),(536,'2016-05-01','S'),(578,'2016-05-01','S'),(711,'2016-05-01','S'),(361,'2016-05-01','S'),(542,'2016-05-01','N'),(451,'2016-05-01','N'),(275,'2016-05-01','S'),(708,'2016-05-01','S'),(152,'2016-05-01','S'),(329,'2016-05-01','S'),(700,'2016-05-01','S'),(92,'2016-05-01','S'),(649,'2016-05-01','S'),(392,'2016-05-01','N'),(718,'2016-05-01','S'),(246,'2016-05-01','S'),(176,'2016-05-01','N'),(237,'2016-05-01','S'),(238,'2016-05-01','N'),(760,'2016-05-01','S'),(763,'2016-05-01','S'),(164,'2016-05-01','S'),(377,'2016-05-01','S'),(108,'2016-05-01','S'),(122,'2016-05-01','S'),(502,'2016-05-01','S'),(468,'2016-05-01','N'),(522,'2016-05-01','N'),(412,'2016-05-01','N'),(135,'2016-05-01','S'),(294,'2016-05-01','N'),(295,'2016-05-01','N'),(296,'2016-05-01','N'),(297,'2016-05-01','N'),(298,'2016-05-01','N'),(299,'2016-05-01','S'),(367,'2016-05-01','N'),(643,'2016-05-01','N'),(754,'2016-05-01','S'),(280,'2016-05-01','N'),(618,'2016-05-01','S'),(545,'2016-05-01','N'),(466,'2016-05-01','S'),(709,'2016-05-01','S'),(111,'2016-05-01','S'),(393,'2016-05-01','N'),(394,'2016-05-01','S'),(642,'2016-05-01','S'),(214,'2016-05-01','N'),(215,'2016-05-01','S'),(216,'2016-05-01','N'),(217,'2016-05-01','N'),(433,'2016-05-01','N'),(434,'2016-05-01','N'),(659,'2016-05-01','S'),(256,'2016-05-01','N'),(220,'2016-05-01','S'),(221,'2016-05-01','S'),(289,'2016-05-01','S'),(290,'2016-05-01','S'),(291,'2016-05-01','S'),(292,'2016-05-01','S'),(293,'2016-05-01','N'),(449,'2016-05-01','S'),(160,'2016-05-01','S'),(384,'2016-05-01','S'),(567,'2016-05-01','S'),(414,'2016-05-01','N'),(351,'2016-05-01','N'),(352,'2016-05-01','N'),(391,'2016-05-01','N'),(405,'2016-05-01','S'),(585,'2016-05-01','S'),(346,'2016-05-01','N'),(149,'2016-05-01','S'),(703,'2016-05-01','S'),(486,'2016-05-01','S'),(322,'2016-05-01','S'),(535,'2016-05-01','S'),(426,'2016-05-01','N'),(175,'2016-05-01','S'),(85,'2016-05-01','S'),(112,'2016-05-01','N'),(645,'2016-05-01','S'),(755,'2016-05-01','S'),(427,'2016-05-01','N'),(428,'2016-05-01','N'),(429,'2016-05-01','N'),(444,'2016-05-01','N'),(445,'2016-05-01','N'),(446,'2016-05-01','N'),(448,'2016-05-01','N'),(487,'2016-05-01','N'),(353,'2016-05-01','N'),(93,'2016-05-01','N'),(354,'2016-05-01','N'),(355,'2016-05-01','S'),(356,'2016-05-01','S'),(614,'2016-05-01','S'),(630,'2016-05-01','S'),(658,'2016-05-01','S'),(339,'2016-05-01','S'),(430,'2016-05-01','S'),(431,'2016-05-01','S'),(348,'2016-05-01','N'),(450,'2016-05-01','S'),(687,'2016-05-01','S'),(647,'2016-05-01','N'),(750,'2016-05-01','N'),(565,'2016-05-01','S'),(598,'2016-05-01','S'),(168,'2016-05-01','S'),(132,'2016-05-01','S'),(114,'2016-05-01','S'),(401,'2016-05-01','S'),(488,'2016-05-01','S'),(694,'2016-05-01','S'),(400,'2016-05-01','S'),(283,'2016-05-01','S'),(272,'2016-05-01','S'),(386,'2016-05-01','S'),(144,'2016-05-01','S'),(736,'2016-05-01','S'),(746,'2016-05-01','S'),(154,'2016-05-01','N'),(475,'2016-05-01','S'),(359,'2016-05-01','N'),(267,'2016-05-01','N'),(320,'2016-05-01','N'),(321,'2016-05-01','N'),(467,'2016-05-01','S'),(58,'2016-05-01','S'),(343,'2016-05-01','S'),(187,'2016-05-01','N'),(629,'2016-05-01','S'),(333,'2016-05-01','N'),(452,'2016-05-01','S'),(611,'2016-05-01','N'),(686,'2016-05-01','S'),(561,'2016-05-01','N'),(77,'2016-05-01','N'),(733,'2016-05-01','N'),(655,'2016-05-01','N'),(302,'2016-05-01','N'),(303,'2016-05-01','N'),(638,'2016-05-01','N'),(692,'2016-05-01','S'),(315,'2016-05-01','N'),(316,'2016-05-01','N'),(117,'2016-05-01','S'),(73,'2016-05-01','N'),(543,'2016-05-01','N'),(80,'2016-05-01','S'),(609,'2016-05-01','N'),(668,'2016-05-01','S'),(669,'2016-05-01','N'),(138,'2016-05-01','S'),(197,'2016-05-01','S'),(224,'2016-05-01','N'),(225,'2016-05-01','N'),(226,'2016-05-01','N'),(227,'2016-05-01','N'),(395,'2016-05-01','N'),(489,'2016-05-01','N'),(141,'2016-05-01','S'),(69,'2016-05-01','S'),(240,'2016-05-01','S'),(241,'2016-05-01','S'),(529,'2016-05-01','S'),(326,'2016-05-01','S'),(350,'2016-05-01','N'),(325,'2016-05-01','S'),(420,'2016-05-01','S'),(474,'2016-05-01','S'),(72,'2016-05-01','S'),(94,'2016-05-01','S'),(653,'2016-05-01','N'),(314,'2016-05-01','S'),(644,'2016-05-01','S'),(519,'2016-05-01','S'),(304,'2016-05-01','S'),(149,'2016-05-01','S'),(469,'2016-05-01','S'),(492,'2016-05-01','S'),(413,'2016-05-01','S'),(513,'2016-05-01','S'),(702,'2016-05-01','S'),(506,'2016-05-01','S'),(751,'2016-05-01','S'),(154,'2016-05-01','S'),(662,'2016-05-01','N'),(186,'2016-05-01','N'),(389,'2016-05-01','N'),(455,'2016-05-01','N'),(538,'2016-05-01','N'),(766,'2016-05-01','S');
/*!40000 ALTER TABLE `tb_controle_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_funcionalidade`
--

DROP TABLE IF EXISTS `tipo_funcionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_funcionalidade` (
                                     `id_tipo_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
                                     `no_tipo_funcionalidade` varchar(45) NOT NULL,
                                     `st_ativo` tinyint(1) NOT NULL,
                                     PRIMARY KEY (`id_tipo_funcionalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_funcionalidade`
--

LOCK TABLES `tipo_funcionalidade` WRITE;
/*!40000 ALTER TABLE `tipo_funcionalidade` DISABLE KEYS */;
INSERT INTO `tipo_funcionalidade` VALUES (1,'cadastrar',1),(2,'editar',1),(3,'listar',1),(4,'excluir',1);
/*!40000 ALTER TABLE `tipo_funcionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turma` (
                       `id_turma` int(11) NOT NULL AUTO_INCREMENT,
                       `dt_inicio` datetime NOT NULL,
                       `dt_fim` datetime NOT NULL,
                       `nu_idade_minima` int(11) NOT NULL,
                       `nu_idade_maxima` int(11) NOT NULL,
                       `nu_ano` int(11) NOT NULL,
                       `st_ativo` tinyint(1) NOT NULL,
                       `no_obs` text,
                       `id_ciclo` int(11) NOT NULL,
                       `id_usuario` int(11) NOT NULL,
                       PRIMARY KEY (`id_turma`),
                       KEY `fk_turma_ciclo1_idx` (`id_ciclo`),
                       KEY `fk_turma_usuario1_idx` (`id_usuario`),
                       CONSTRAINT `fk_turma_ciclo1` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                       CONSTRAINT `fk_turma_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
                         `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
                         `no_usuario` varchar(45) NOT NULL,
                         `no_senha` text NOT NULL,
                         `dt_cadastro` datetime NOT NULL,
                         `st_ativo` tinyint(1) NOT NULL,
                         `dt_ult_visita` datetime DEFAULT NULL,
                         `dt_desativacao` datetime DEFAULT NULL,
                         `id_perfil` int(11) NOT NULL,
                         `id_colaborador` int(11) NOT NULL,
                         PRIMARY KEY (`id_usuario`),
                         KEY `fk_usuario_perfil1` (`id_perfil`),
                         KEY `fk_usuario_colaborador1` (`id_colaborador`),
                         CONSTRAINT `fk_usuario_colaborador1` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                         CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'cezar.zaleski','da9b323cb0fd4da2ed31959a5bef3b6d','2013-01-01 00:00:00',1,'2015-10-10 00:30:16','0000-00-00 00:00:00',1,1),(4,'geccal','284a473caa005d862632a055244edadf','2013-05-10 11:59:03',1,'2023-04-22 15:01:35',NULL,1,21);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-22 23:14:55
