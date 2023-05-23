-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Maio-2023 às 22:56
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pw_trabalhosemestral`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `Admin_Id` int(11) NOT NULL,
  `Admin_Nome` varchar(40) NOT NULL,
  `Admin_Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`Admin_Id`, `Admin_Nome`, `Admin_Password`) VALUES
(1, 'paunde', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carousel`
--

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carousel`
--

INSERT INTO `carousel` (`id_carousel`, `imagem`) VALUES
(1, 'ghghgh'),
(2, 'ghghgh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id_contactos` int(11) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `telefone1` bigint(20) NOT NULL,
  `telefone2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`id_contactos`, `endereco`, `gmap`, `telefone1`, `telefone2`, `email`, `fecebook`, `instagram`, `iframe`) VALUES
(1, 'minha casa', 'https://goo.gl/maps/pyUwHmtSTmRdmsQn8', 2588505550101, 855502221, 'ritopaunde@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28715.94547701005!2d32.423769!3d-25.886153!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ee689417fd409ab:0x17d0430fdca3d078!2sCondomínio Malhampsene Village!5e0!3m2!1spt-PT!2smz!4v1683474018840!5m2!1spt-PT!2smz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `definicoes`
--

CREATE TABLE `definicoes` (
  `id_pagina` int(11) NOT NULL,
  `titulo_pagina` varchar(50) NOT NULL,
  `sobre_pagina` varchar(250) NOT NULL,
  `encerrar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `definicoes`
--

INSERT INTO `definicoes` (`id_pagina`, `titulo_pagina`, `sobre_pagina`, `encerrar`) VALUES
(1, 'mnmnmna', 'klkllklk', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe_admin`
--

CREATE TABLE `equipe_admin` (
  `id_team` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE `quartos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `sofas` int(11) NOT NULL,
  `banheiro` int(11) NOT NULL,
  `varanda` int(11) NOT NULL,
  `instalacoes` varchar(255) NOT NULL,
  `adultos` int(11) NOT NULL,
  `criancas` int(11) NOT NULL,
  `avaliacao` decimal(2,1) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `reservado` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`id`, `nome`, `preco`, `sofas`, `banheiro`, `varanda`, `instalacoes`, `adultos`, `criancas`, `avaliacao`, `descricao`, `reservado`, `foto`) VALUES
(1, 'sdad', '0.00', 0, 0, 0, '', 0, 0, '0.0', 'sads', 0, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0'),
(2, 'felix', '4.00', 3, 4, 5, '4', 3, 2, '5.0', 'gfdg', 0, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0'),
(3, 'yhhgh', '100.00', 1, 1, 1, '1', 1, 1, '1.0', 'ytyt', 0, 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0'),
(4, 'rito', '2323.00', 4, 2, 2, '2', 2, 2, '2.0', 'gfg', 0, ''),
(5, 'felix', '121.00', 1, 1, 1, '1', 1, 1, '1.0', 'gfbvb', 0, ''),
(6, 'felix', '121.00', 1, 1, 1, '1', 1, 1, '1.0', 'gfbvb', 0, ''),
(7, 'aaaaa', '121.00', 1, 1, 1, '1', 1, 1, '1.0', 'gfbvb', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `id_teste` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id_teste`, `nome`, `foto`, `email`, `senha`, `token`) VALUES
(1, '0', 'd3f82d703950dd13bb24748268007002.webp', 'ritopaunde@gmail.com', '12', 0),
(2, '0', 'd3f82d703950dd13bb24748268007002.webp', 'ritopaunde@gmail.com', '12', 0),
(3, '0', 'si_panafricano.webp', 'ritopaunde@gmail.com', '12', 0),
(4, 'felix', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', 'ritopaunde@gmail.com', '41', 0),
(5, 'felix', 'si_panafricano.webp', 'ritopaunde@gmail.com', 'a', 0),
(6, 'felix', 'si_panafricano.webp', 'ritopaunde@gmail.com', 'a', 0),
(7, 'felix', '', 'ritopaunde@gmail.com', '1', 0),
(8, 'felix', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', 'ritopaunde@gmail.com', 'a', 0),
(9, 'felix', 'si_panafricano.webp', 'ritopaunde@gmail.com', '1', 0),
(10, 'fgfgfgff', 'IMG-20230402-WA0000.jpg', 'ritojoao@gmail.com', '1', 0),
(11, 'felixa', 'si_panafricano.webp', 'ritoapaunde@gmail.com', 'dd', 0),
(12, 'vvvvvv', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', 'ritopaunde@gmail.com', 'v', 0),
(13, 'felixui', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', 'ritopaunde@gmail.com', 'i', 0),
(14, 'aaaaa', 'si_panafricano.webp', 'ritopaunde@gmail.com', 'a', 0),
(15, 'aaaaad', 'si_panafricano.webp', 'ritopaunde@gmail.com', 'd', 0),
(16, 'joaoaaa', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', 'ritopaundre@gmail.com', 'a', 0),
(17, 'rito paunde', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', 'ritopaunde@gmail.com', 'a', 0),
(18, 'rito jj', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', 'ritopaunde@gmail.com', 'a', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_consultas`
--

CREATE TABLE `user_consultas` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `assunto` varchar(200) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `visto` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_consultas`
--

INSERT INTO `user_consultas` (`id_user`, `nome`, `email`, `assunto`, `mensagem`, `date`, `visto`) VALUES
(18, 'rito', 'ritopaunde@gmail.com', 'gdddddd', 'uuuuuuuuuuuuuuuuuuuuuuuuuuu', '2023-05-15', 1),
(19, 'felix', 'dinhopaunde@gmail.com', 'kuuuuu', 'ooooooooooooooo', '2023-05-15', 1),
(20, 'jorge', 'fidelis.kassamo@gmail.com', 'gdddddd', 'xxxxxxxxxxxxxxxx', '2023-05-15', 1),
(21, 'joao', 'fidelis.kassamo@gmail.com', 'nao recebi', 'qqqqqqqqqqqqqqqqqqq', '2023-05-15', 1),
(22, 'jorge', 'fidelis.kassamo@gmail.com', 'kuuuuu', 'oooooooo', '2023-05-15', 1),
(23, 'joao', 'ritopaunde@gmail.com', 'tyyty', 'uuuuuuuuuuugtgggggggg', '2023-05-15', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_cred`
--

CREATE TABLE `user_cred` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `telefone` int(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `data_Nascimento` varchar(50) NOT NULL,
  `fperfil` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `is_verifed` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_cred`
--

INSERT INTO `user_cred` (`id_user`, `nome`, `email`, `endereco`, `telefone`, `pincode`, `data_Nascimento`, `fperfil`, `senha`, `is_verifed`, `token`, `t_expire`, `status`, `datentime`) VALUES
(1, 'felix', 'ritopaunde@gmail.com', '2023-05-31', 454545, 7787878, '0000-00-00', 'hghghhghg', 'si_panafricano.webp', 0, NULL, NULL, 1, '2023-05-20'),
(2, 'felix', 'ritopaunde@gmail.com', '2023-05-31', 454545, 7787878, '1', 'hghghhghg', 'si_panafricano.webp', 0, NULL, NULL, 1, '2023-05-20'),
(3, 'felix', 'ritopaunde@gmail.com', '2023-05-31', 454545, 7787878, '1', 'hghghhghg', 'si_panafricano.webp', 0, NULL, NULL, 1, '2023-05-20'),
(4, 'ggfgffggf', 'fidelis.kassamo@gmail.com', 'gfgf', 54545, 545, '2023-05-24', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', '4', 0, NULL, NULL, 1, '2023-05-20'),
(5, 'felixaaaa', 'ritaaopaunde@gmail.com', 'fdfd', 54545, 6565, '2023-05-25', 'si_panafricano.webp', '6', 0, NULL, NULL, 1, '2023-05-20'),
(6, 'aaaaafgfg', 'dinhopaunde@gmail.com', 'ghghgh', 444, 444, '2023-05-23', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', '4', 0, NULL, NULL, 1, '2023-05-21'),
(7, 'dsdsfdfdgdg', 'ritojoao0@gmail.com', 'bhghg', 74, 14, '2023-05-21', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', '1', 0, NULL, NULL, 1, '2023-05-21'),
(8, 'kjk', 'ritopaunde1@gmail.com', 'uyuy', 44, 4, '2023-05-15', 'conhec3a7a-os-dois-c3banicos-pac3adses-africanos-nc3a3o-colonizados-por-europeus-facebook-1.webp', '4', 0, NULL, NULL, 1, '2023-05-21');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Índices para tabela `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Índices para tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contactos`);

--
-- Índices para tabela `definicoes`
--
ALTER TABLE `definicoes`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Índices para tabela `equipe_admin`
--
ALTER TABLE `equipe_admin`
  ADD PRIMARY KEY (`id_team`);

--
-- Índices para tabela `quartos`
--
ALTER TABLE `quartos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`id_teste`);

--
-- Índices para tabela `user_consultas`
--
ALTER TABLE `user_consultas`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contactos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `definicoes`
--
ALTER TABLE `definicoes`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `equipe_admin`
--
ALTER TABLE `equipe_admin`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `quartos`
--
ALTER TABLE `quartos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `teste`
--
ALTER TABLE `teste`
  MODIFY `id_teste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `user_consultas`
--
ALTER TABLE `user_consultas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
