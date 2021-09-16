
-- `php-test`.endereco definition

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `uf` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cep` (`cep`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;