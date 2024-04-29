-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Abr-2024 às 20:10
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helponpets`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adocao`
--

CREATE TABLE `adocao` (
  `id` int(11) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `nome_adotante` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `nome_animal` varchar(30) DEFAULT NULL,
  `sexo_animal` varchar(10) DEFAULT NULL,
  `tipo_animal` varchar(30) DEFAULT NULL,
  `data_adocao` date DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT 'SP',
  `excluido` tinyint(1) DEFAULT 0,
  `observacao` varchar(255) DEFAULT NULL,
  `ultima_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adocao`
--

INSERT INTO `adocao` (`id`, `cpf`, `nome_adotante`, `email`, `celular`, `nome_animal`, `sexo_animal`, `tipo_animal`, `data_adocao`, `cep`, `logradouro`, `numero`, `bairro`, `localidade`, `uf`, `excluido`, `observacao`, `ultima_alteracao`) VALUES
(1, '638.382.308-68', 'Felipe da Silva', 'felipesilva@gmail.com', '1999325-8698', 'Floquinho', 'Macho', 'Cão', '2024-04-10', '13609-506', 'Rua Benedito Corrente', '20', 'Jardim Residencial Flamboyant', 'Araras', 'SP', 1, '', '2024-04-26 11:52:37'),
(2, '139.761.658-08', 'Lavinia Da Cruz', 'laviniacruz@hotmail.com', '(19)99236-0487', 'Brutus', 'Macho', 'Cão', '2024-04-10', '13600-709', 'Praça Vereadora Yolanda Sebastião Loglis', '732', 'Centro', 'Araras', 'SP', 0, '', '2024-04-23 19:47:31'),
(3, '032.298.688-54', 'Patricia dos Santos', 'patriciasantos@yahoo.com.br', '1999832-6589', 'Sheerra', 'Macho', 'Gato', '2024-04-02', '13604-303', 'Rua José Bedo', '35', 'Jardim Residencial Alvorada', 'Araras', 'SP', 0, '', '2024-04-23 12:35:14'),
(4, '065.249.360-27', 'Leticia Pietro Souza', 'leticiapsouza@yahoo.com.br', '1999763-5687', 'Belinha', 'Fêmea', 'Cão', '2024-03-29', '13600-709', 'Praça Vereadora Yolanda Sebastião Loglis', '100', 'Centro', 'Araras', 'SP', 0, '', '2024-04-16 18:07:38'),
(5, '147.754.655-03', 'Pedro dos Santos', 'pedrosantos@gmail.com', '(19)99236-0487', 'Ash', 'Macho', 'Gato', '2024-04-08', '13609-518', 'Praça João Romeu de Oliveira', '10', 'Jardim Residencial Flamboyant', 'Araras', 'SP', 0, '', '2024-04-23 19:48:00'),
(6, '636.623.608-96', 'Larissa Gonçalves', 'larissagoncalves@hotmail.com', '(19)99758-9874', 'Zeus', 'Macho', 'Cão', '2024-04-22', '13604-197', 'Rua Victor Mazon', '50', 'Parque das Árvores', 'Araras', 'SP', 1, '', '2024-04-26 12:08:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `raca` varchar(20) DEFAULT NULL,
  `cor` varchar(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT 'macho',
  `porte` varchar(10) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `excluido` tinyint(1) DEFAULT 0,
  `ultima_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `castrado` tinyint(1) DEFAULT 0,
  `tipo_animal` varchar(40) DEFAULT NULL,
  `foto` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id_animal`, `nome`, `raca`, `cor`, `sexo`, `porte`, `data_cadastro`, `observacao`, `excluido`, `ultima_alteracao`, `castrado`, `tipo_animal`, `foto`) VALUES
(1, 'Floquinho', 'Pinscher', 'Preto', 'Macho', 'Pequeno', '2024-04-09', 'Cachorro abandonado em uma praça na Vila Dona Rosa Zurita.', 1, '2024-04-26 11:51:40', 1, NULL, 'assets/img/animais/floquinho.jpg'),
(2, 'Plutão', 'N/D', 'Marrom', 'Macho', 'Pequeno', '2024-03-06', 'Animal Dócil', 1, '2024-04-26 12:07:38', 1, NULL, 'assets/img/animais/plutao.jpg'),
(3, 'Belinha', 'N/D', 'Preta', 'Fêmea', 'Pequeno', '2024-03-26', 'muito dócil', 0, '2024-04-24 17:13:06', 1, 'Cão', 'assets/img/animais/belinha.jpg'),
(4, 'Brutus', 'N/D', 'Preto', 'Macho', 'Grande', '2024-04-03', NULL, 0, '2024-04-24 17:13:16', 1, 'Gato', 'assets/img/animais/brutus.jpg'),
(5, 'Sansão', 'N/D', 'preto e branco', 'Macho', 'Grande', '2024-04-11', '', 0, '2024-04-24 17:13:28', 1, 'Cão', 'assets/img/animais/sansao.jpg'),
(6, 'Penélope', 'N/D', 'branca', 'Fêmea', 'Pequeno', '2024-04-11', '', 0, '2024-04-24 17:13:38', 1, 'Gato', 'assets/img/animais/penelope.jpg'),
(7, 'Zeus', 'N/D', 'cinza', 'Macho', 'Pequeno', '2024-04-11', '', 0, '2024-04-24 17:13:49', 1, 'Cão', 'assets/img/animais/zeus.jpg'),
(8, 'Luke', 'Poodle', 'teste', 'Macho', 'Pequeno', '2024-04-11', '', 0, '2024-04-24 17:14:02', 1, 'Cão', 'assets/img/animais/luke.jpg'),
(9, 'Ash', 'Siamês', 'creme', 'Macho', 'Pequeno', '2024-04-10', NULL, 0, '2024-04-24 17:14:14', 1, 'Gato', 'assets/img/animais/ash.jpg'),
(10, 'Sheerra', 'Pelo Curto', 'cinza', 'Macho', 'Pequeno', '2024-04-11', '', 0, '2024-04-25 15:44:34', 1, NULL, 'assets/img/animais/sheerra.jpg'),
(11, 'teste', 'teste', 'tttt', 'Macho', 'Pequeno', '2024-04-23', '', 1, '2024-04-24 18:12:54', 1, NULL, '/uploads/'),
(12, 'vini', 'n/d', 'cinza', 'Macho', 'Pequeno', '2024-04-24', '', 0, '2024-04-24 17:22:43', 1, 'gato', 'assets/img/animais/vini.jpg'),
(13, 'ttt', 'dnan', 'fmkasf', 'Fêmea', 'Médio', '2024-04-24', '', 1, '2024-04-26 11:32:16', 0, 'teste', NULL),
(14, 'félix', 'n/d', 'caramelo', 'Macho', 'Pequeno', '2024-04-25', '', 0, '2024-04-25 13:53:30', 1, NULL, 'assets/img/animais/felix.jpg'),
(15, 'marrie', 'n/d', 'branca', 'Macho', 'Pequeno', '2024-04-25', '', 0, '2024-04-25 16:13:35', 1, NULL, 'assets/img/animais/marrie1.jpg'),
(16, 'felino', 'n/d', 'caramelo', 'Macho', 'Pequeno', '2024-04-25', '', 1, '2024-04-26 11:32:23', 1, NULL, 'assets/img/animais/'),
(17, 'Sheerra', 'Pelo Curto', 'cinza', 'Macho', 'Pequeno', '2024-04-11', '', 1, '2024-04-25 16:35:55', 1, NULL, 'assets/img/animais/'),
(18, 'Sheerra', 'Pelo Curto', 'cinza', 'Macho', 'Pequeno', '2024-04-11', '', 1, '2024-04-25 16:36:02', 1, NULL, 'assets/img/animais/'),
(19, 'Sheerra', 'Pelo Curto', 'cinza', 'Macho', 'Pequeno', '2024-04-11', '', 1, '2024-04-25 16:35:47', 1, NULL, 'assets/img/animais/'),
(20, 'shakira', 'Pelo Curto', 'cinza', 'Macho', 'Pequeno', '2024-04-11', '', 1, '2024-04-25 16:35:40', 1, NULL, 'assets/img/animais/'),
(21, 'shakira', 'Pelo Curto', 'cinza', 'Fêmea', 'Pequeno', '2024-04-11', '', 0, '2024-04-26 11:33:04', 1, NULL, 'assets/img/animais/sheerra.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `excluido` tinyint(1) DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `data_doacao` date DEFAULT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doacao`
--

INSERT INTO `doacao` (`id`, `nome`, `valor`, `cpf`, `excluido`, `email`, `data_doacao`, `ultima_alteracao`) VALUES
(1, 'ana maria dos santos', '1000.00', '734.315.128-28', 1, 'anamariasantos24@gmail.com.br', '2024-03-27', '2024-04-26 11:54:12'),
(2, 'Cristiane Pinheiro de Souza', '300.00', '746.913.798-00', 1, 'crispinheiro@hotmail.com', '2024-04-03', '2024-04-26 12:09:02'),
(3, 'Marcelo costa de souza', '500.00', '061.186.558-04', 0, 'marcelocsouza@gmail.com', '2024-04-11', NULL),
(4, 'Isabela Cristina Albuquerque', '100.00', '316.920.318-56', 0, 'isaalbuquerque@yahoo.com.br', '2024-04-10', NULL),
(5, 'Joana Augusta da Conceição', '300.00', '487.431.768-52', 0, 'joanaconceicao@hotmail.com', '2024-04-01', NULL),
(6, 'Jean Pablo Ribeiro', '1000.00', '775.474.938-66', 0, 'jeanpribeiro@gmail.com', '2024-03-29', NULL),
(7, 'Manoel ribeiro', '300.00', '308.755.538-00', 0, 'manoelribeiro@yahoo.com.br', '2024-04-16', NULL),
(8, 'paulo gonçalves', '300.00', '363.456.688.02', 1, 'paulogoncalves@gmail.com', '2024-04-17', '2024-04-24 16:32:37'),
(9, 'Maria ribeiro', '150.00', '326.568.794-01', 0, 'mariaribeiro@hotmail.com', '2024-04-26', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `ultima_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `excluido` tinyint(1) DEFAULT 0,
  `voluntario` tinyint(1) DEFAULT 0,
  `observacao` varchar(3000) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `foto` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `cpf`, `nome`, `sexo`, `celular`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `localidade`, `uf`, `data_cadastro`, `ultima_alteracao`, `excluido`, `voluntario`, `observacao`, `data_nascimento`, `foto`) VALUES
(1, '704.726.038-20', 'Maria Luiza Batista', 'feminino', '(19)99236-5874', 'marialbatista24@gmail.com', '02170-980', 'Avenida Morvan Dias de Figueiredo', '5845', '', 'Parque Novo Mundo', 'São Paulo', 'SP', '2024-04-08', '2024-04-25 18:56:22', 1, 0, NULL, '2000-01-04', NULL),
(2, '734.315.128-28', 'Ana Maria dos Santos', 'Feminino', '(19)99345-1622', 'anamariasantos@gmail.com.br', '13600-210', 'Rua Cândida Lacerda', '120', '', 'Centro', 'Araras', 'SP', '2024-04-10', '2024-04-26 11:50:37', 1, 1, NULL, '1992-06-08', 'assets/img/pessoas/5.jpg'),
(3, '306.482.458-96', 'Fernando Costa da Silva', 'Masculino', '(19)99243-1889', 'fercostasilva@gmail.com', '13601-130', 'Rua Padre Anchieta', '350', '', 'Jardim Belvedere', 'Araras', 'SP', '2024-03-20', '2024-04-26 12:06:27', 1, 1, NULL, '1983-03-04', 'assets/img/pessoas/2.jpg'),
(4, '122.689.218-32', 'Alice Cardoso', 'Feminino', '(19)99345-7898', 'alicecardoso@gmail.com', '13604-011', 'Rua Pirassununga', '210', '', 'Jardim Nossa Senhora Aparecida', 'Araras', 'SP', '2024-04-10', '2024-04-24 16:44:49', 1, 0, NULL, '2000-10-15', NULL),
(5, '32372268501', 'Felipe luiz da silva', 'Masculino', '1999352-8978', 'felipesilva@hotmail.com', '13600790', 'Rua Pedro Álvares Cabral', '56', '', 'Centro', 'Araras', 'SP', '2024-03-14', '2024-04-25 18:46:29', 0, 1, NULL, '1998-10-02', 'assets/img/pessoas/3.jpg'),
(6, '434.067.638-12', 'pedro ribeiro', 'Masculino', '(19)99349-7896', 'pedroribeiro@gmail.com.br', '13609-546', 'Rua José Humberto Boza', '100', '', 'Jardim Dalla Costa', 'Araras', 'SP', '2024-04-23', '2024-04-25 18:49:02', 0, 1, NULL, '1965-04-05', 'assets/img/pessoas/4.jpg'),
(7, '105.467.070-68', 'Pietro da silva', 'Masculino', '(19)99263-4512', 'pietrosilva01@gmail.com', '13607-271', 'Rua Moacyr Matthiesen', '50', '', 'Jardim Buzolin', 'Araras', 'SP', '2024-04-23', '2024-04-25 18:56:33', 1, 0, NULL, '1986-02-16', NULL),
(8, '347.361.418-16', 'Bruno pedro marques', 'Masculino', '(19)99345-6987', 'brunomarques@hotmail.com', '13609-379', 'Rua Amadeu Luiz Conte', '25', '', 'Residencial Bosque de Versalles', 'Araras', 'SP', '2024-04-24', '2024-04-25 18:45:37', 0, 1, NULL, '2001-02-06', 'assets/img/pessoas/1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resgate_animal`
--

CREATE TABLE `resgate_animal` (
  `id` int(11) NOT NULL,
  `animal` varchar(30) DEFAULT NULL,
  `data_resgate` date DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT 'SP',
  `excluido` tinyint(1) DEFAULT 0,
  `observacao` varchar(255) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `ultima_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `resgate_animal`
--

INSERT INTO `resgate_animal` (`id`, `animal`, `data_resgate`, `cep`, `logradouro`, `numero`, `bairro`, `localidade`, `uf`, `excluido`, `observacao`, `sexo`, `ultima_alteracao`) VALUES
(1, 'Cão', '2024-03-27', '13600970', 'Rua Tiradentes', '53', 'Centro', 'Araras', 'SP', 1, 'Animal encontrado com ferimentos na pata diateira direita', 'Fêmea', '2024-04-26 11:55:02'),
(2, 'Gato', '2024-04-09', '13607-740', 'Rua Doutor Jair Appolari', '20', 'Jardim Santa Olívia II', 'Araras', 'SP', 1, 'Próximo ao número 32, animal atende pelo nome de Sheerra', 'Macho', '2024-04-26 12:09:48'),
(3, 'Cão', '2024-04-18', '13604-122', 'Rua Orpheu Ghirardello', '320', 'Jardim Alto das Araras', 'Araras', 'SP', 0, 'Cão abandonado próximo ao número mencionado', 'Macho', '2024-04-23 11:15:08'),
(4, 'Cão', '2024-03-01', '13606-699', 'Avenida João Alfredo Graf', '55', 'Parque Tiradentes', 'Araras', 'SP', 0, 'Cão abandonado próximo ao número mencionado', 'Macho', '2024-04-19 12:23:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int(11) NOT NULL,
  `sistema_nome` varchar(100) DEFAULT NULL,
  `sistema_email` varchar(255) DEFAULT NULL,
  `excluido` tinyint(1) DEFAULT 0,
  `sistema_site_url` varchar(255) DEFAULT NULL,
  `sistema_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_nome`, `sistema_email`, `excluido`, `sistema_site_url`, `sistema_data_alteracao`) VALUES
(1, 'Helponpets', 'helponpets@gmail.com', 0, '', '2024-04-09 17:51:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ultima_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `ultima_alteracao`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$Y.T1fmbtNLKKkHohAs2ks.8OzZlBFdinTdZeShZkORwSkeDEBb6Zm', 'admin@admin.com', NULL, '', NULL, NULL, NULL, '4eb7ca73ef1b9b6e41c19a2e4b1382c80fd7517b', '$2y$10$NH/XF3sZOwPoHvAYp23VyO9Rj7/NEeeRIYISOmQ58V/FyLk3Xf1V6', 1268889823, 1713870676, 1, 'Admin', 'istrator', 'ADMIN', '0', '2024-04-23 11:11:16'),
(2, '127.0.0.1', 'adrieleestrafili', '$2y$10$nnl7kLbleYNn0s7pAc8XvuEEhlOzmV4A.BXQp74Z/OukG6Va4PqqC', 'adrieledemoraes011@gmail.com', NULL, NULL, NULL, NULL, NULL, '7635d9d32d9d44d30dbba85b8093ebd4c4078d79', '$2y$10$NcIklGkf4Sh6mDr89NfY2e/EDEo3ij7W2UGTHy1l.Ny7s8Q.rBssa', 1712249625, 1713201190, 1, 'Adriele', 'de Moraes Estrafili', NULL, NULL, '2024-04-15 17:13:10'),
(5, '127.0.0.1', 'arianesantos', '$2y$10$/Y7g4w.RB766ugz2n/tfgeislwo.jfJHIa8Ly3AR2ZohmwFbYoW1W', 'arianesantos24@gmail.com', NULL, NULL, NULL, NULL, NULL, '12a469d20228db83e81369b864b679c43450bfa2', '$2y$10$S8I.yRiP/bfr4ocy0k8RFuBkqvV49Iwl/H2qofw/APimeI6xHPkj.', 1713877476, 1714396049, 1, 'Ariane', 'dos Santos', NULL, NULL, '2024-04-29 13:07:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(6, 5, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adocao`
--
ALTER TABLE `adocao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`);

--
-- Índices para tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resgate_animal`
--
ALTER TABLE `resgate_animal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adocao`
--
ALTER TABLE `adocao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `doacao`
--
ALTER TABLE `doacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `resgate_animal`
--
ALTER TABLE `resgate_animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
