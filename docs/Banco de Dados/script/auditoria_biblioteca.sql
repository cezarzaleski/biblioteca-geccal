/*aditoria autor*/
DROP TABLE IF EXISTS biblioteca_auditoria.autor
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE biblioteca_auditoria.autor (
  id_autor int(11) NOT NULL,
  no_autor varchar(45) NOT NULL,
  st_ativo tinyint(1) NOT NULL,
  dt_cadastro datetime NOT NULL,
  tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=364 DEFAULT CHARSET=latin1;

/*aditoria autor_livro*/
DROP TABLE IF EXISTS biblioteca_auditoria.autor_livro;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE biblioteca_auditoria.autor_livro (
  id_autor int(11) NOT NULL,
  id_livro int(11) NOT NULL,
  tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*aditoria baixa_livro*/
CREATE TABLE biblioteca_auditoria.baixa_livro (
  id_baixa_livro int(11) NOT NULL,
  dt_baixa datetime NOT NULL,
  no_motivo_baixa text NOT NULL,
  st_ativo tinyint(1) NOT NULL,
  dt_retorno datetime DEFAULT NULL,
  no_motivo_retorno text,
  id_usuario int(11) NOT NULL,
  id_livro int(11) NOT NULL,
  tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*aditoria colaborador*/
DROP TABLE IF EXISTS biblioteca_auditoria.colaborador;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE biblioteca_auditoria.colaborador (
  id_colaborador int(11) NOT NULL,
  no_colaborador text NOT NULL,
  st_ativo tinyint(1) NOT NULL,
  no_endereco varchar(45) DEFAULT NULL,
  no_bairro varchar(20) DEFAULT NULL,
  no_cidade varchar(45) DEFAULT NULL,
  nu_cep varchar(9) DEFAULT NULL,
  dt_cadastro datetime DEFAULT NULL,
  no_sexo varchar(10) DEFAULT NULL,
  nu_fone_res varchar(14) DEFAULT NULL,
  nu_fone_cel varchar(14) DEFAULT NULL,
  no_email varchar(45) DEFAULT NULL,
  id_func int(11) NOT NULL,
  tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS biblioteca_auditoria.colaborador_turma;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE biblioteca_auditoria.colaborador_turma (
  id_colaborador_turma int(11) NOT NULL,
  data_cadastro datetime NOT NULL,
  st_ativo tinyint(1) NOT NULL,
  id_turma int(11) NOT NULL,
  id_colaborador int(11) NOT NULL,
  id_usuario int(11) NOT NULL,
  tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS biblioteca_auditoria.evangelizando;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE biblioteca_auditoria.evangelizando (
  id_evangelizando int(11) NOT NULL,
  no_evangelizando text NOT NULL,
  dt_cadastro datetime NOT NULL,
  st_ativo tinyint(1) NOT NULL,
  no_sexo varchar(45) NOT NULL,
  no_pai text,
  no_mae text,
  no_endereco text,
  no_bairro varchar(20) DEFAULT NULL,
  no_cidade varchar(45) DEFAULT NULL,
  nu_cep varchar(9) DEFAULT NULL,
  dt_nascimento datetime DEFAULT NULL,
  nu_fone_res varchar(14) DEFAULT NULL,
  nu_fone_cel varchar(14) DEFAULT NULL,
  no_obs text,
 tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS biblioteca_auditoria.evangelizando_turma;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE biblioteca_auditoria.evangelizando_turma (
  id_evangelizando_turma int(11) NOT NULL,
  st_ativo tinyint(1) NOT NULL,
  dt_cadastro datetime NOT NULL,
  id_turma int(11) NOT NULL,
  id_evangelizando int(11) NOT NULL,
  id_usuario int(11) NOT NULL,
  tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=521 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS biblioteca_auditoria.turma;
CREATE TABLE biblioteca_auditoria.turma (
  id_turma int(11),
  dt_inicio datetime NOT NULL,
  dt_fim datetime NOT NULL,
  nu_idade_minima int(11) NOT NULL,
  nu_idade_maxima int(11) NOT NULL,
  nu_ano int(11) NOT NULL,
  st_ativo tinyint(1) NOT NULL,
  no_obs text,
  id_ciclo int(11) NOT NULL,
  id_usuario int(11) NOT NULL,
   tp_operacao_log CHAR(1) NOT NULL,
  dt_operacao_log TIMESTAMP NOT NULL,
  no_usuario_banco_log VARCHAR(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;


------------------------------triguer
/**
TRIGUER INSERT
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_ins_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_ins_turma AFTER INSERT
ON develtec_bibliotecainfantil.turma
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_turma (id_turma, dt_inicio, dt_fim, nu_idade_minima, nu_idade_maxima,  nu_ano, st_ativo, no_obs,
id_ciclo, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_turma, NEW.dt_inicio, NEW.dt_fim, NEW.nu_idade_minima, NEW.nu_idade_maxima, NEW.nu_ano, NEW.st_ativo, NEW.no_obs, NEW.id_ciclo, NEW.id_usuario,
            'I', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER UPDATE
**/

DROP TRIGGER develtec_bibliotecainfantil.tg_upd_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_upd_turma AFTER UPDATE
ON develtec_bibliotecainfantil.turma
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_turma (id_turma, dt_inicio, dt_fim, nu_idade_minima, nu_idade_maxima,  nu_ano, st_ativo, no_obs,
id_ciclo, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_turma, NEW.dt_inicio, NEW.dt_fim, NEW.nu_idade_minima, NEW.nu_idade_maxima, NEW.nu_ano, NEW.st_ativo, NEW.no_obs, NEW.id_ciclo, NEW.id_usuario,
            'I', sysdate(), session_user());
  END$$

DELIMITER ;


/**
TRIGUER DELETE
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_del_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_del_turma AFTER DELETE
ON develtec_bibliotecainfantil.turma
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_turma (id_turma, dt_inicio, dt_fim, nu_idade_minima, nu_idade_maxima,  nu_ano, st_ativo, no_obs,
id_ciclo, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (OLD.id_turma, OLD.dt_inicio, OLD.dt_fim, OLD.nu_idade_minima, OLD.nu_idade_maxima, OLD.nu_ano, OLD.st_ativo, OLD.no_obs, OLD.id_ciclo, OLD.id_usuario,
            'D', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER INSERT
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_ins_evangelizando_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_ins_evangelizando_turma AFTER INSERT
ON develtec_bibliotecainfantil.evangelizando_turma
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_evangelizando_turma (id_evangelizando_turma,
  st_ativo, dt_cadastro,id_turma, id_evangelizando, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_evangelizando_turma,
  NEW.st_ativo, NEW.dt_cadastro,NEW.id_turma, NEW.id_evangelizando, NEW.id_usuario,
            'I', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER UPDATE
**/

DROP TRIGGER develtec_bibliotecainfantil.tg_upd_evangelizando_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_upd_evangelizando_turma AFTER UPDATE
ON develtec_bibliotecainfantil.evangelizando_turma
FOR EACH ROW
  BEGIN
        INSERT INTO biblioteca_auditoria.lg_evangelizando_turma (id_evangelizando_turma,
  st_ativo, dt_cadastro,id_turma, id_evangelizando, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_evangelizando_turma,
  NEW.st_ativo, NEW.dt_cadastro,NEW.id_turma, NEW.id_evangelizando, NEW.id_usuario,
            'U', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER DELETE
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_del_evangelizando_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_del_evangelizando_turma AFTER DELETE
ON develtec_bibliotecainfantil.evangelizando_turma
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_evangelizando_turma (id_evangelizando_turma,
  st_ativo, dt_cadastro,id_turma, id_evangelizando, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (OLD.id_evangelizando_turma,
  OLD.st_ativo, OLD.dt_cadastro,OLD.id_turma, OLD.id_evangelizando, OLD.id_usuario,
            'D', sysdate(), session_user());
  END$$

DELIMITER ;
/**
TRIGUER INSERT
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_ins_evangelizando;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_ins_evangelizando AFTER INSERT
ON develtec_bibliotecainfantil.evangelizando
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_evangelizando (id_evangelizando,
  no_evangelizando, dt_cadastro, st_ativo, no_sexo, no_pai, no_mae, no_endereco, no_bairro, no_cidade, nu_cep, dt_nascimento, nu_fone_res,
  nu_fone_cel, no_obs, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_evangelizando,
  NEW.no_evangelizando, NEW.dt_cadastro, NEW.st_ativo, NEW.no_sexo, NEW.no_pai, NEW.no_mae, NEW.no_endereco, NEW.no_bairro, NEW.no_cidade, NEW.nu_cep, NEW.dt_nascimento, NEW.nu_fone_res,
  NEW.nu_fone_cel, NEW.no_obs,
            'I', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER UPDATE
**/

DROP TRIGGER develtec_bibliotecainfantil.tg_upd_evangelizando;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_upd_evangelizando AFTER UPDATE
ON develtec_bibliotecainfantil.evangelizando
FOR EACH ROW
  BEGIN
        INSERT INTO biblioteca_auditoria.lg_evangelizando (id_evangelizando,
  no_evangelizando, dt_cadastro, st_ativo, no_sexo, no_pai, no_mae, no_endereco, no_bairro, no_cidade, nu_cep, dt_nascimento, nu_fone_res,
  nu_fone_cel, no_obs, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_evangelizando,
  NEW.no_evangelizando, NEW.dt_cadastro, NEW.st_ativo, NEW.no_sexo, NEW.no_pai, NEW.no_mae, NEW.no_endereco, NEW.no_bairro, NEW.no_cidade, NEW.nu_cep, NEW.dt_nascimento, NEW.nu_fone_res,
  NEW.nu_fone_cel, NEW.no_obs,
            'U', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER DELETE
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_del_evangelizando;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_del_evangelizando AFTER DELETE
ON develtec_bibliotecainfantil.evangelizando
FOR EACH ROW
  BEGIN
       INSERT INTO biblioteca_auditoria.lg_evangelizando (id_evangelizando,
  no_evangelizando, dt_cadastro, st_ativo, no_sexo, no_pai, no_mae, no_endereco, no_bairro, no_cidade, nu_cep, dt_nascimento, nu_fone_res,
  nu_fone_cel, no_obs, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (OLD.id_evangelizando,
  OLD.no_evangelizando, OLD.dt_cadastro, OLD.st_ativo, OLD.no_sexo, OLD.no_pai, OLD.no_mae, OLD.no_endereco, OLD.no_bairro, OLD.no_cidade, OLD.nu_cep, OLD.dt_nascimento, OLD.nu_fone_res,
  OLD.nu_fone_cel, OLD.no_obs,
            'D', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER INSERT
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_ins_colaborador;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_ins_colaborador AFTER INSERT
ON develtec_bibliotecainfantil.colaborador
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_colaborador (id_colaborador,
  no_colaborador, st_ativo, no_endereco, no_bairro, no_cidade, nu_cep, dt_cadastro, no_sexo, nu_fone_res,nu_fone_cel, no_email, id_func,  tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_colaborador,
  NEW.no_colaborador, NEW.st_ativo, NEW.no_endereco, NEW.no_bairro, NEW.no_cidade, NEW.nu_cep, NEW.dt_cadastro, NEW.no_sexo, NEW.nu_fone_res, NEW.nu_fone_cel, NEW.no_email, NEW.id_func,
            'I', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER UPDATE
**/


DROP TRIGGER develtec_bibliotecainfantil.tg_upd_colaborador;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_upd_colaborador AFTER UPDATE
ON develtec_bibliotecainfantil.colaborador
FOR EACH ROW
  BEGIN
        INSERT INTO biblioteca_auditoria.lg_colaborador (id_colaborador,
  no_colaborador, st_ativo, no_endereco, no_bairro, no_cidade, nu_cep, dt_cadastro, no_sexo, nu_fone_res,nu_fone_cel, no_email, id_func,  tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_colaborador,
  NEW.no_colaborador, NEW.st_ativo, NEW.no_endereco, NEW.no_bairro, NEW.no_cidade, NEW.nu_cep, NEW.dt_cadastro, NEW.no_sexo, NEW.nu_fone_res, NEW.nu_fone_cel, NEW.no_email, NEW.id_func,
            'U', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER DELETE
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_del_colaborador;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_del_colaborador AFTER DELETE
ON develtec_bibliotecainfantil.colaborador
FOR EACH ROW
  BEGIN
               INSERT INTO biblioteca_auditoria.lg_colaborador (id_colaborador,
  no_colaborador, st_ativo, no_endereco, no_bairro, no_cidade, nu_cep, dt_cadastro, no_sexo, nu_fone_res,nu_fone_cel, no_email, id_func,  tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (OLD.id_colaborador,
  OLD.no_colaborador, OLD.st_ativo, OLD.no_endereco, OLD.no_bairro, OLD.no_cidade, OLD.nu_cep, OLD.dt_cadastro, OLD.no_sexo, OLD.nu_fone_res, OLD.nu_fone_cel, OLD.no_email, OLD.id_func,
            'D', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER INSERT
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_ins_colaborador_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_ins_colaborador_turma AFTER INSERT
ON develtec_bibliotecainfantil.colaborador_turma
FOR EACH ROW
  BEGIN
    INSERT INTO biblioteca_auditoria.lg_colaborador_turma (id_colaborador_turma,
  data_cadastro, st_ativo, id_turma, id_colaborador, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_colaborador_turma,
  NEW.data_cadastro, NEW.st_ativo, NEW.id_turma, NEW.id_colaborador, NEW.id_usuario,
            'I', sysdate(), session_user());
  END$$

DELIMITER ;


/**
TRIGUER UPDATE
**/


DROP TRIGGER develtec_bibliotecainfantil.tg_upd_colaborador_turma;
DELIMITER $$
CREATE TRIGGER develtec_bibliotecainfantil.tg_upd_colaborador_turma AFTER UPDATE
ON develtec_bibliotecainfantil.colaborador_turma
FOR EACH ROW
  BEGIN
        INSERT INTO biblioteca_auditoria.lg_colaborador_turma (id_colaborador_turma,
  data_cadastro, st_ativo, id_turma, id_colaborador, id_usuario, tp_operacao_log, dt_operacao_log, no_usuario_banco_log)
    VALUES (NEW.id_colaborador_turma,
  NEW.data_cadastro, NEW.st_ativo, NEW.id_turma, NEW.id_colaborador, NEW.id_usuario,
            'U', sysdate(), session_user());
  END$$

DELIMITER ;

/**
TRIGUER DELETE
**/
DROP TRIGGER develtec_bibliotecainfantil.tg_del_colaborador_turma;
	
