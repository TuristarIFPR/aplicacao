CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `nome_completo` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `data_nasc` DATE NULL,
  `telefone` VARCHAR(45) NULL,
  `tipo` ENUM('ADMIN', 'USUARIO') NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `cidades` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `estado_sigla` VARCHAR(2) NOT NULL,
  `estado_nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `pontos_turisticos` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `cidades_id` INT NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `imagem` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_pontos_turisticos_cidades`
    FOREIGN KEY (`cidades_id`)
    REFERENCES `cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE IF NOT EXISTS `noticias` (
  `id` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `texto` VARCHAR(1000) NOT NULL,
  `data` DATE NOT NULL,
  `pontos_turisticos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_noticias_pontos_turisticos1`
    FOREIGN KEY (`pontos_turisticos_id`)
    REFERENCES `pontos_turisticos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


CREATE TABLE IF NOT EXISTS `avaliações` (
  `id` INT NOT NULL,
  `nota` ENUM("1", "2", "3", "4", "5") NOT NULL,
  `comentario` VARCHAR(500) NULL,
  `pontos_turisticos_id` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  `data` DATETIME NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_avaliações_pontos_turisticos1`
    FOREIGN KEY (`pontos_turisticos_id`)
    REFERENCES `pontos_turisticos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliações_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


INSERT INTO usuarios (email, nome_completo, senha, data_nasc,	telefone,	tipo)
VALUES ('admin@gmail.com', 'Administrador', '$2y$10$ZMIHawl3J2sSZ635U.D6heK88kxJkQfTDyAz9zPruGuS6oFeTO8Bm', '1948-04-30', '49456456456', 'ADMIN'); /* Senha: 123 */
