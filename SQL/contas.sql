-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2022 às 15:12
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `af`
--

CREATE TABLE `af` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `descricao` text DEFAULT NULL,
  `fornecedor` text DEFAULT NULL,
  `ano` year(4) NOT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  `af_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `af`
--

INSERT INTO `af` (`id`, `numero`, `data`, `descricao`, `fornecedor`, `ano`, `excluido`, `af_data_alteracao`) VALUES
(1, '2027/2022', '2022-08-10', 'Locação de Impressoras SMS por 5 meses.', 'X Paper', 2022, 0, '2022-08-19 18:41:23'),
(2, '2026/2022', '2022-08-10', 'Locação de Impressoras SMAS por 5 meses.', 'X Paper', 2022, 0, '2022-08-19 17:20:20'),
(3, '2025/2022', '2022-08-10', 'Locação de Impressoras SMED por 5 meses.', 'X Paper', 2022, 0, '2022-08-19 17:20:20'),
(4, '2024/2022', '2022-08-10', 'Locação de Impressoras SMA por 5 meses.', 'X Paper', 2022, 0, '2022-08-19 17:20:20'),
(5, '2023/2022', '2022-08-10', 'Locação de impressoras SMA(Dívida Ativa) por 5 meses.', 'X Paper', 2022, 0, '2022-08-19 17:20:20'),
(6, '2022/2022', '2022-08-10', 'Locação de impressoras SMF por 5 meses.', 'X Paper', 2022, 0, '2022-08-19 17:20:20'),
(7, '2021/2022', '2022-08-10', 'Locação de impressoras SMMAA por 5 meses.', 'X Paper', 2022, 0, '2022-08-19 17:20:20'),
(8, '1807/2022', '2022-07-11', 'serviços de hospedagem e e-mails da PMA', 'UOL', 2022, 0, '2022-08-19 17:20:20'),
(9, '1784/2022', '2022-07-01', 'Intenet da biblioteca municipal.', 'X Turbo', 2022, 0, '2022-08-19 17:20:20'),
(10, '1592/2022', '2022-06-06', 'Adobe Acrobat Dc Pro', 'CGK Sistemas de Informacao Ltda', 2022, 0, '2022-08-19 17:20:20'),
(11, '1116/2022', '2022-04-18', 'Locação de Impressoras por 12 meses.', 'Elo Forte', 2022, 0, '2022-08-19 17:20:20'),
(12, '1087/2022', '2022-03-30', 'Aquisição e instalação do gerador de energia.', 'Silmaquinas e Equipamentos Ltda', 2022, 0, '2022-08-19 17:20:20'),
(13, '588/2022', '2022-03-04', 'Link dedicado referente ao contrato 10/2019.', 'Telefonica', 2022, 0, '2022-08-19 17:20:20'),
(14, '545/2022', '2022-02-23', 'Locação de impressoras SMA(dívida ativa).', 'X Paper', 2022, 0, '2022-08-19 17:20:20'),
(15, '472/2022', '2022-02-15', 'Internet do Dti.', 'Claro(Net).', 2022, 0, '2022-08-19 17:20:20'),
(16, '471/2022', '2022-02-15', 'Chips de internet.', 'Telefonica', 2022, 0, '2022-08-19 17:20:20'),
(17, '382/2022', '2022-02-09', 'Serviço de Telefonia.', 'Telefonica', 2022, 0, '2022-08-19 17:20:20'),
(18, '344/2022', '2022-02-07', 'Monitoramento do Ganha Tempo.', 'Solutec', 2022, 0, '2022-08-19 17:20:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

CREATE TABLE `contratos` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `servico` varchar(255) DEFAULT NULL,
  `af` varchar(20) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `excluido` tinyint(1) DEFAULT 0,
  `contrato_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome_empresa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contratos`
--

INSERT INTO `contratos` (`id`, `numero`, `servico`, `af`, `data_inicio`, `data_fim`, `excluido`, `contrato_data_alteracao`, `nome_empresa`) VALUES
(1, '030/2019', 'Locação de Impressoras', '2024/2022', '2022-08-10', '2023-08-10', 0, '2022-09-02 19:31:33', 'X Paper'),
(2, '017/2020', 'Locação de Impressoras', '1116/2022', '2022-04-12', '2023-04-12', 0, '2022-09-02 17:53:02', 'Elo Forte'),
(3, '010/2019', 'Link de 150Mbps', '588/2022', '2022-02-26', '2023-02-26', 0, '2022-09-02 18:04:09', 'Telefonica'),
(4, '07/2020', 'Serviço de Telefonia', '382/2022', '2022-02-09', '2023-02-09', 0, '2022-09-02 18:09:05', 'Telefonica'),
(5, '023/2022', 'Iluminação', '3032/2022', '2022-02-02', '2023-02-02', 1, '2022-09-05 17:12:40', 'Nalli');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(255) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nome_empresa`, `excluido`) VALUES
(1, 'X Paper', 0),
(2, 'Uol', 0),
(3, 'Telefonica', 0),
(4, 'Net', 0),
(5, 'Solutec', 0),
(6, 'Insight', 0),
(7, 'Elo Forte', 0);

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
-- Estrutura da tabela `mensalidades`
--

CREATE TABLE `mensalidades` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `servico` varchar(100) NOT NULL,
  `af` varchar(20) NOT NULL,
  `ativa` int(11) NOT NULL,
  `data_vencto` varchar(12) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `processo` varchar(10) NOT NULL,
  `total_processo` varchar(20) NOT NULL,
  `periodo` varchar(30) NOT NULL,
  `contrato` varchar(20) DEFAULT NULL,
  `mensalidade_ultima_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `excluido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensalidades`
--

INSERT INTO `mensalidades` (`id_empresa`, `nome_empresa`, `servico`, `af`, `ativa`, `data_vencto`, `valor`, `tipo_documento`, `processo`, `total_processo`, `periodo`, `contrato`, `mensalidade_ultima_alteracao`, `excluido`) VALUES
(1, 'X Paper', 'Locação de Impressoras', '1941/2021,545/2022', 1, '22', '3690.10', 'Fatura', '1067/2019', '39853.08', '29/07/2021 a 29/07/2022', '030/2019', '2022-06-28 22:26:38', 0),
(2, 'Vivo', 'Link 150 Mb', '588/2022', 1, '15', '7710.92', 'Fatura', '2815/2018', '92531.03', '01/05/2022 a 01/05/2023', '010/2019', '2022-06-28 22:28:21', 0),
(3, 'Vivo', 'Link 500 Mb', '1000/2021', 1, '15', '33338.80', 'Fatura', '2309/2019', '661082.18', '01/02/2022 a 01/02/2023', '07/2020', '2022-06-28 22:28:21', 0),
(4, 'Vivo', 'Chip', '471/2022', 1, '17', '1230.72', 'Fatura', '256/2022', '11853.60', '01/04/2022 a 01/04/2023', '022/2021', '2022-06-28 22:30:16', 0),
(5, 'Elo Forte', 'Locação de Impressoras', '1116/2022', 1, '20', '12365.12', 'NFE', '178/2020', '148381.49', '01/04/2022 a 01/04/2023', '017/2020', '2022-06-28 22:30:16', 0),
(6, 'Elo Forte', 'Locação de Impressoras', '1836/2021', 1, '20', '7682.30', 'NFE', '1501/2018', '92187.60', '22/07/2021 a 22/07/2022', '056/2018', '2022-06-28 22:32:06', 0),
(7, 'Solutec', 'Alarme GT', '344/202', 1, '10', '138.00', 'NFSE', '194/2022', '1656.00', '07/02/2022 a 07/02/2023', NULL, '2022-06-28 22:32:06', 0),
(8, 'Vivo', 'Fibra Ótica', '1000/2021', 0, '20', '2110.00', 'Fatura', '2309/2019', '661082.18', '25/03/2020 a 24/03/2021', '07/2020', '2022-07-22 17:07:18', 0),
(9, 'Teste', 'Linhas', '222/2022', 0, '15', '500.00', 'Fatura', '29/2022', '6000', '01/02/2022 a 01/02/2023', '', '2022-07-22 17:42:50', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ramais_paco`
--

CREATE TABLE `ramais_paco` (
  `id` int(11) NOT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `ramal` varchar(4) DEFAULT NULL,
  `excluido` tinyint(1) DEFAULT 0,
  `ramal_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ramais_paco`
--

INSERT INTO `ramais_paco` (`id`, `departamento`, `ramal`, `excluido`, `ramal_data_alteracao`) VALUES
(1, '156-telefonistas', '1562', 0, '2022-09-08 18:13:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicoes`
--

CREATE TABLE `requisicoes` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL,
  `situacao` text DEFAULT NULL,
  `itens` text DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  `requisicao_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `requisicoes`
--

INSERT INTO `requisicoes` (`id`, `numero`, `data`, `descricao`, `situacao`, `itens`, `excluido`, `requisicao_data_alteracao`) VALUES
(1, '1/2022', '2022-01-07', 'Registro de preço de micro.', NULL, 'I3,I5,I7,Notebook,Monitor de 18,5.', 0, '2022-08-19 17:21:58'),
(2, '35/2022', '2022-01-11', 'Renovação do contrato n°010/2019.', NULL, 'Link de 150 Mb.', 0, '2022-08-19 17:21:58'),
(3, '36/2022', '2022-01-11', 'Renovação do contrato n°07/2020.', NULL, 'Telefonia.', 0, '2022-08-19 17:21:58'),
(4, '230/2022', '2022-01-17', 'Aquisição de rádios.', NULL, 'Rádio com frequência.', 0, '2022-08-19 17:21:58'),
(5, '279/2022', '2022-01-18', 'Aquisição de ar condicionado.', NULL, 'Ar condicionado.', 0, '2022-08-19 17:21:58'),
(6, '281/2022', '2022-01-18', 'Instalação de ar condicionado.', NULL, 'Instalação de ar condicionado.', 0, '2022-08-19 17:21:58'),
(7, '285/2022', '2022-01-18', 'Aquisição de equipamentos.', NULL, 'Kit de teclado e mouse.', 0, '2022-08-19 17:21:58'),
(8, '294/2022', '2022-01-19', 'Renovação do contrato n°022/2021.', NULL, 'Internet vivo chip.', 0, '2022-08-19 17:21:58'),
(9, '311/2022', '2022-01-19', 'Locação de impressoras.', NULL, 'Locação de impressoras.', 0, '2022-08-19 17:21:58'),
(10, '316/2022', '2022-01-20', 'Cabo de Rede.', NULL, 'Caixa de cabo de rede.', 0, '2022-08-19 17:21:58'),
(11, '329/2022', '2022-01-21', 'Impressora para a Dívida Ativa.', NULL, 'Locação de impressoras.', 0, '2022-08-19 17:21:58'),
(12, '434/2022', '2022-01-27', 'Fontes de energia.', NULL, 'Fonte de alimentação HP.', 0, '2022-08-19 17:21:58'),
(13, '458/2022', '2022-01-28', 'Hospedagem.', NULL, 'Hospedagem VPS CPanel. ', 0, '2022-08-19 17:21:58'),
(14, '465/2022', '2022-01-28', 'Fontes de energia.', NULL, 'Fonte de Alimentação HP.', 0, '2022-08-19 17:21:58'),
(15, '486/2022', '2022-01-31', 'Locação de impressoras.', NULL, 'Locação de impressoras.', 0, '2022-08-19 17:21:58'),
(16, '512/2022', '2022-02-01', 'Alarme do Ganha Tempo.', NULL, 'Alarme do Ganha Tempo.', 0, '2022-08-19 17:21:58'),
(17, '516/2022', '2022-02-02', 'Vivo Chip.\n', NULL, 'Pacote Internet 5GB 4G. ', 0, '2022-08-19 17:21:58'),
(18, '670/2022', '2022-02-08', 'Rádios.', NULL, 'Ponto de acesso com frequência de 5GHZ.', 0, '2022-08-19 17:21:58'),
(19, '1152/2022', '2022-03-14', 'Locação de impressoras.', NULL, 'Locação de impressoras.', 0, '2022-08-19 17:21:58'),
(20, '1353/2022', '2022-03-29', 'Renovação do contrato n°30/2019. ', NULL, 'Locação de impressoras.', 0, '2022-08-19 17:21:58'),
(21, '1364/2022', '2022-03-30', 'Locação de impressoras.', NULL, 'Locação de impressoras.', 0, '2022-08-19 17:21:58'),
(22, '1610/2022', '2022-04-27', 'LGPD.', NULL, 'LGPD.', 0, '2022-08-19 17:21:58'),
(23, '1640/2022', '2022-04-29', 'Software de gestão pública.\n', NULL, 'Módulos de gestão pública.', 0, '2022-08-19 17:21:58'),
(24, '1948/2022', '2022-05-27', 'Toner para impressoras HP 400.', NULL, 'Toner p/Imp.HP Laserjet Pro 400 M 401 DN Mod. CF280A.', 0, '2022-08-19 17:21:58'),
(25, '1950/2022', '2022-05-27', 'Locação de impressoras.', NULL, 'Locação de impressoras.', 0, '2022-08-19 17:21:58'),
(26, '1981/2022', '2022-06-01', 'Licenças Adobe Acrobat.', NULL, '260101282-Adobe Acrobat DC PRO.', 0, '2022-08-19 17:21:58'),
(27, '2095/2022', '2022-06-13', 'Internet wi-fi Delegacia.', NULL, '374700071-Internet Banda Larga.', 0, '2022-08-19 17:21:58'),
(28, '2157/2022', '2022-06-23', 'Internet wi-fi biblioteca municipal.', NULL, '374700071-Internet banda larga.', 0, '2022-08-19 17:21:58'),
(29, '2201/2022', '2022-06-27', 'Continuidade dos serviços da UOL. ', NULL, '374700179-Hospedagem', 0, '2022-08-19 17:21:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int(11) NOT NULL,
  `sistema_nome` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_email` varchar(255) DEFAULT NULL,
  `sistema_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_nome`, `sistema_site_url`, `sistema_email`, `sistema_data_alteracao`) VALUES
(1, 'Account System', 'http://accountsystem.com.br', 'dti@araras.sp.gov.br', '2022-09-08 19:25:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefonia`
--

CREATE TABLE `telefonia` (
  `id` int(11) NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `linha` varchar(10) DEFAULT NULL,
  `nrc` varchar(12) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(6) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `localidade` varchar(255) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `linha_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `excluido` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `telefonia`
--

INSERT INTO `telefonia` (`id`, `local`, `linha`, `nrc`, `cep`, `logradouro`, `numero`, `bairro`, `localidade`, `uf`, `linha_data_alteracao`, `excluido`) VALUES
(1, 'acessa são paulo', '1935417155', '1021040778', '13600040', 'Praça Barão de Araras', '70', 'Centro', 'Araras', 'SP', '2022-09-06 18:28:29', 0),
(2, 'almoxarifado educação', '1935447653', '3348637831', '13600061', 'Rua Júlio Mesquita', '1134', 'Centro', 'Araras', 'SP', '2022-09-14 16:15:23', 0),
(3, 'AMB. DA SAUDE MENTAL AG.BIANCHINI', '1935442674', '3097639758', '13607200', 'Avenida Loreto', '0', 'Jardim das Flores', 'Araras', 'SP', '2022-09-14 16:17:01', 0),
(4, 'ANEXO DE VIOLÊNCIA DOMÉSTICA E FAMILIAR CONTRA A MULHER', '1935411881', '1069415267', '13607-334', 'Avenida David Nasser', '326', 'Jardim Universitário', 'Araras', 'SP', '2022-09-14 16:18:09', 0),
(5, 'ANTONIO CASADEI', '1935426890', '3503509730', '13601-020', 'Avenida Zurita', '681', 'Jardim Belvedere', 'Araras', 'SP', '2022-09-14 16:22:02', 0),
(6, 'ARQUIVO GERAL', '1935426156', '4861131080', '13600080', 'Rua Visconde do Rio Branco', '414', 'Centro', 'Araras', 'SP', '2022-09-14 16:24:33', 0),
(7, 'BIANCHINI', '1935441878', '4879088306', '13607-200', 'Avenida Loreto', '1291', 'Jardim das Flores', 'Araras', 'SP', '2022-09-14 16:25:35', 0),
(8, 'BIBLIOTECA MUNICIPAL', '1935511534', '2120110659', '13600695', 'Praça Doutor Narciso Gomes', '0', 'Centro', 'Araras', 'SP', '2022-09-14 16:26:32', 0),
(9, 'BOMBEIRO', '1935413220', '1021034298', '13600001', 'Avenida Dona Renata', '270', 'Centro', 'Araras', 'SP', '2022-09-14 16:27:32', 0),
(10, 'C.E.U.&quot;JOSE OLAVO PAGANOTTI&quot;', '1935425373', '2257255920', '13606322', 'Rua da Tecelã', '631', 'Jardim José Ometto I', 'Araras', 'SP', '2022-09-14 16:28:41', 0),
(11, 'CAEE ETTORE ZUNTINI', '1935425772', '9587139521', '13607-213', 'Avenida José Marques da Silva', '0', 'Jardim das Flores', 'Araras', 'SP', '2022-09-14 16:29:52', 0),
(12, 'CANIL', '1935444413', '4641003130', '13600-970', 'Rua Tiradentes', '0', 'Centro', 'Araras', 'SP', '2022-09-14 16:31:13', 0),
(13, 'CAPS AD', '1935420905', '9210112968', '13601001', 'Avenida Washington Luiz', '545', 'Vila Michelin', 'Araras', 'SP', '2022-09-15 16:04:06', 0),
(14, 'CAPS INFANTIL', '1935510277', '2120103601', '13600-001', 'Avenida Dona Renata', '545', 'Centro', 'Araras', 'SP', '2022-09-15 16:05:22', 0),
(15, 'CARTORIO ELEITORAL', '1935422207', '6007505158', '13601020', 'Avenida Zurita', '681', 'Jardim Belvedere', 'Araras', 'SP', '2022-09-15 16:06:37', 0),
(16, 'CASA DA CULTURA', '1935448319', '3264835438', '13600-040', 'Praça Barão de Araras', '0', 'Centro', 'Araras', 'SP', '2022-09-15 16:07:32', 0),
(17, 'CASA DA MEMORIA', '1935448156', '6420108547', '13600-040', 'Praça Barão de Araras', '30', 'Centro', 'Araras', 'SP', '2022-09-15 16:08:38', 0),
(18, 'CASA DA MEMORIA', '1935427602', '9599454826', '13600-040', 'Praça Barão de Araras', '30', 'Centro', 'Araras', 'SP', '2022-09-15 16:09:59', 0),
(19, 'CASA DOS CONSELHOS', '1935446956', '9592950704', '13600-110', 'Rua Marechal Deodoro', '658', 'Centro', 'Araras', 'SP', '2022-09-15 16:10:56', 0),
(20, 'CASA DOS IDOSOS - SÃO JOÃO', '1935443730', '3261997135', '13604-030', 'Rua São Carlos', '281', 'Jardim São João', 'Araras', 'SP', '2022-09-15 16:11:58', 0),
(21, 'CASARÃO', '1935425112', '9388915530', '13600-040', 'Praça Barão de Araras', '70', 'Centro', 'Araras', 'SP', '2022-09-15 16:13:20', 0),
(22, 'CDI - CENTRO DIA DO IDOSO', '1935511073', '3224343860', '13609182', 'Avenida José Ometto', '2000', 'Jardim 8 de Abril', 'Araras', 'SP', '2022-09-15 16:14:16', 0),
(23, 'CEI EMEI &#039;&#039;NOÊMIA FABRICIO GATTO&#039;&#039;', '1935445269', '3097855884', '13604179', 'Rua José Wolf', '0', 'Parque das Árvores', 'Araras', 'SP', '2022-09-15 16:16:03', 0),
(24, 'CEI EMEIEF. &#039;&#039;PROF. MARIA ZELIA. P.MPEREIRA ( CAIC)', '1935422134', '6007504852', '13606664', 'Rua Wadih Georgeos Hoche', '300', 'Parque Tiradentes', 'Araras', 'SP', '2022-09-15 16:17:17', 0),
(25, 'CEI LUIZ HENRIQUE BORELLI', '1935446975', '9592949617', '13606-516', 'Rua Durval Belattini', '180', 'Jardim Morumbi', 'Araras', 'SP', '2022-09-15 16:18:37', 0),
(26, 'CEMITÉRIO MUNICIPAL', '1935412146', '1021030462', '13607061', 'Avenida da Saudade', '0', 'Jardim Nossa Senhora de Fátima', 'Araras', 'SP', '2022-09-15 16:19:40', 0),
(27, 'CENTRAL DE ABASTECIMENTO/ EDUCAÇÃO', '1935515836', '7410940108', '13600092', 'Rua Emílio Ferreira', '0', 'Centro', 'Araras', 'SP', '2022-09-15 16:20:41', 0),
(28, 'CENTRAL DE AMBULÂNCIAS - TERMINAL LESTE', '1935479831', '6184996448', '13606-020', 'Avenida Augusta Viola da Costa', '0', 'Jardim Celina', 'Araras', 'SP', '2022-09-15 16:21:54', 0),
(29, 'CENTRO CULTURAL', '1935425807', '3489695200', '13609-390', 'Avenida Ângelo Franzini', '0', 'Residencial Bosque de Versalles', 'Araras', 'SP', '2022-09-15 16:22:37', 0),
(30, 'CENTRO DE ATEN. PSICOSSOCIAL(CAPS)', '1935445874', '3097636309', '13607200', 'Avenida Loreto', '1291', 'Jardim das Flores', 'Araras', 'SP', '2022-09-15 16:23:39', 0),
(31, 'CENTRO DE CONVIVENCIA DA 3 IDADE', '1935421522', '3424179240', '13609182', 'Avenida José Ometto', '2000', 'Jardim 8 de Abril', 'Araras', 'SP', '2022-09-15 16:25:34', 0),
(32, 'CENTRO DE SAUDE DA MULHER', '1935421083', '9572247455', '13602006', 'Rua dos Girassóis', '0', 'Jardim Sobradinho', 'Araras', 'SP', '2022-09-15 16:35:50', 0),
(33, 'CENTRO ODONTOLOGICO A. F. DE OLIVEIRA', '1935417211', '1052123772', '13606-326', 'Avenida Lourenço Batistella', '0', 'Jardim José Ometto I', 'Araras', 'SP', '2022-09-15 16:38:29', 0),
(34, 'CENTRO POP', '1935476672', '3483931726', '13600-081', 'Rua Visconde do Rio Branco', '675', 'Centro', 'Araras', 'SP', '2022-09-15 16:39:53', 0),
(35, 'CESTA BÁSICA', '1935413208', '1021034107', '13600090', 'Rua Treze de Maio', '156', 'Centro', 'Araras', 'SP', '2022-09-15 16:40:54', 0),
(36, 'CLÍNICAS', '1935426164', '9210112887', '13601-140', 'Avenida Governador Garcez', '1021', 'Jardim Belvedere', 'Araras', 'SP', '2022-09-16 18:30:18', 0),
(37, 'COMTUR (SE. TURISMO)', '1935416802', '9574986670', '13606326', 'Avenida Lourenço Batistella', '0', 'Jardim José Ometto I', 'Araras', 'SP', '2022-09-16 18:31:22', 0),
(38, 'CONSELHO TUTELAR', '1935417451', '1021041740', '13600-073', 'Rua Doutor Ferdinando Delamain', '190', 'Centro', 'Araras', 'SP', '2022-09-16 18:32:38', 0),
(39, 'CRAS CENTRAL', '1935417651', '1021042398', '13600-450', 'Rua Padre Casemiro', '0', 'Vila Queiroz', 'Araras', 'SP', '2022-09-16 18:33:49', 0),
(40, 'CRAS CENTRAL', '1935421669', '4867895945', '13600-450', 'Rua Padre Casemiro', '0', 'Vila Queiroz', 'Araras', 'SP', '2022-09-16 18:34:41', 0),
(41, 'CRAS LAGO', '1935423538', '9666124187', '13600010', 'Rua Santa Cruz', '105', 'Centro', 'Araras', 'SP', '2022-09-16 18:35:48', 0),
(42, 'CRAS/LESTE', '1935423114', '6287068802', '13606322', 'Rua da Tecelã', '631', 'Jardim José Ometto I', 'Araras', 'SP', '2022-09-16 18:36:49', 0),
(43, 'CRAS/LESTE', '1935511829', '2120112864', '13606322', 'Rua da Tecelã', '631', 'Jardim José Ometto I', 'Araras', 'SP', '2022-09-16 18:38:39', 0),
(44, 'CRAS/SUL. IRMÃ ANNADORA SIRONI', '1935447345', '9592951433', '13601140', 'Avenida Governador Garcez', '658', 'Jardim Belvedere', 'Araras', 'SP', '2022-09-16 18:42:06', 0),
(45, 'CREAS', '1935479307', '3438917787', '13600081', 'Rua Visconde do Rio Branco', '675', 'Centro', 'Araras', 'SP', '2022-09-16 18:43:20', 0),
(46, 'CREAS', '1935479174', '9297981980', '13600081', 'Rua Visconde do Rio Branco', '675', 'Centro', 'Araras', 'SP', '2022-09-16 18:44:28', 0),
(47, 'DEMUTRAN - CENTRO', '1935515457', '7400781350', '13600-190', 'Rua Chico Pinto', '549', 'Centro', 'Araras', 'SP', '2022-09-16 18:45:43', 0),
(48, 'DESENVOLVIMENTO - BANCO DO POVO', '1935428743', '3212745390', '13600-170', 'Rua Barão de Arary', '540', 'Centro', 'Araras', 'SP', '2022-09-16 18:46:54', 0),
(49, 'DESENVOLVIMENTO - BANCO DO POVO - TRONCO PABX SÓ RECEBE', '1935449400', '3102128809', '13600-170', 'Rua Barão de Arary', '540', 'Centro', 'Araras', 'SP', '2022-09-16 18:48:01', 0),
(50, 'DISPENSARIO/ C. DIST. MEDICAMENTOS', '1935515840', '7410940370', '13603011', 'Rua Francisco Graziano', '58', 'Jardim Cândida', 'Araras', 'SP', '2022-09-16 18:49:07', 0),
(51, 'DTIM (OFICINA - MANO)', '1935411908', '1021029618', '13603-027', 'Rua Ciro Lagazzi', '267', 'Jardim Cândida', 'Araras', 'SP', '2022-09-16 18:50:16', 0),
(52, 'DTIM (RECEPÇÃO ADM)', '1935443476', '7270005274', '13603-027', 'Rua Ciro Lagazzi', '267', 'Jardim Cândida', 'Araras', 'SP', '2022-09-16 18:51:27', 0),
(53, 'EMEF &#039;&#039;ANTONIA MARQUES DAHMEN&#039;&#039;', '1935449962', '2261139300', '13606-641', 'Rua Darly Gandara', '280', 'Parque Tiradentes', 'Araras', 'SP', '2022-09-16 18:52:39', 0),
(54, 'EMEF &#039;&#039;PADRE HERCILIO BERTOLINI&#039;&#039;', '1935449998', '3221222442', '13606326', 'Avenida Lourenço Batistella', '711', 'Jardim José Ometto I', 'Araras', 'SP', '2022-09-16 18:54:09', 0),
(55, 'EMEF &#039;&#039;PADRE HERCILIO BERTOLINI&#039;&#039;', '1935443755', '3176977907', '13606326', 'Avenida Lourenço Batistella', '711', 'Jardim José Ometto I', 'Araras', 'SP', '2022-09-16 18:55:16', 0),
(56, 'EMEF. PROF&#039;&#039;. JULIO RIDOLFO&#039;&#039;', '1935417197', '1041642552', '13600-000', 'Natal Mussarelli', '150', 'Jardim São Luiz', 'Araras', 'SP', '2022-09-16 18:57:22', 0),
(57, 'EMEF. PROF&#039;&#039;. JULIO RIDOLFO&#039;&#039;', '1935445215', '3097644247', '13600-000', 'Natal Mussarelli', '150', 'Jardim São Luiz', 'Araras', 'SP', '2022-09-16 19:02:28', 0),
(58, 'EMEF. PROF&#039;&#039;. JULIO RIDOLFO&#039;&#039;', '1935427513', '9599454745', '13600-000', 'Rua Natal Mussarelli', '150', 'Jardim São Luiz', 'Araras', 'SP', '2022-09-16 19:35:20', 0),
(59, 'EMEF.&quot;MARIA TEREZINHA PIRES BARBOSA ULSON&quot;', '1935512214', '3224343275', '13604-173', 'Rua Emílio Pacagnella', '0', 'Parque das Árvores', 'Araras', 'SP', '2022-09-16 19:37:22', 0),
(60, 'EMEF.&#039;&#039;ADRIANO ADEMIR LOMBI&#039;&#039;', '1935424953', '3113483788', '13607568', 'Avenida Doutor Olindo Russolo', '900', 'Parque Terras de Santa Olívia', 'Araras', 'SP', '2022-09-16 19:38:53', 0);

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
  `ultima_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `ultima_alteracao`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$GQMAqSVZrkAZm3iorOf/MOKkNO7ZOHz7oIgs2IbamtjXta2gjkQN.', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1660137449, 1, 'Admin', 'istrator', 'ADMIN', '0', '2022-06-29 15:27:01'),
(2, '::1', 'mariasantos', '$2y$10$vnqR5lmzOFioVvvv8HNPou.bOKGCamkKXjyn9qz/n/N2Ie0BBOm2e', 'mariasantos@yahoo.com.br', NULL, NULL, NULL, NULL, NULL, '2ddc88997495c0a34933e2505dbbf07702a6bc3e', '$2y$10$9uMOXre8A923seN/FE51b./fBo./N88iMp3tWWA59qxLnZ44dOCle', 1656515948, 1662729090, 1, 'Maria', 'dos Santos', NULL, NULL, '2022-06-29 15:27:01'),
(3, '::1', 'adrieledemoraes', '$2y$10$gZo4heE5bx4Evftx2xDWoOf7niiu6OnJTSjvqrwfuAfjYzM9ucZZe', 'adrieledemoraes@gmail.com', NULL, NULL, NULL, NULL, NULL, '7529c3a0a1bedc3aff9e0ce7bb82c56c0ffdeaf0', '$2y$10$U2zb3jt0ipl.7TIibdEgZuBivWRijSkJhhAf0DM8Sv2t6bnx3ALMy', 1659979188, 1663601373, 1, 'Adriele', 'de Moraes', NULL, NULL, '2022-08-08 17:19:48');

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
(3, 2, 2),
(4, 3, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `af`
--
ALTER TABLE `af`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

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
-- Índices para tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `ramais_paco`
--
ALTER TABLE `ramais_paco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `requisicoes`
--
ALTER TABLE `requisicoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Índices para tabela `telefonia`
--
ALTER TABLE `telefonia`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `af`
--
ALTER TABLE `af`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `ramais_paco`
--
ALTER TABLE `ramais_paco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `requisicoes`
--
ALTER TABLE `requisicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `telefonia`
--
ALTER TABLE `telefonia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
