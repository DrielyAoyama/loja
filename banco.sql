-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Abr-2016 às 20:29
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(13, 'Peças', '2016-04-11 15:55:54', '2016-04-11 16:07:42'),
(14, 'Máquinas', '2016-04-11 16:23:14', '2016-04-11 16:23:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `razao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cnpjcpf` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `liberado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `razao`, `nome`, `cnpjcpf`, `liberado`, `created_at`, `updated_at`) VALUES
(0, 'administrador', 'administrador', '00.000.000/000-00', 'S', NULL, '2016-04-06 06:41:38'),
(4, 'cliente padrão', 'Cliente Padrão', '00.000.000/1000-00', 'S', '2016-04-07 14:59:59', '2016-04-07 14:59:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `id` int(10) UNSIGNED NOT NULL,
  `produto` int(11) DEFAULT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `capa` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `liberado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_08_163914_produtos', 2),
('2016_04_08_163915_imagem_produto', 3),
('2016_04_08_163915_imagemproduto', 4),
('2016_04_08_163917_categoria', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `qtde` double(8,2) NOT NULL,
  `preco` double(8,2) NOT NULL,
  `custo` double(8,2) NOT NULL,
  `qtde_vendida` double(8,2) NOT NULL,
  `liberado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `qtde`, `preco`, `custo`, `qtde_vendida`, `liberado`, `created_at`, `updated_at`) VALUES
(1, 'produto teste 1', 560.00, 15.90, 12.70, 0.00, 'S', '2016-04-08 20:50:16', '2016-04-08 23:09:19'),
(2, 'produto teste 2', 0.00, 10.90, 7.70, 0.00, 'S', '2016-04-08 20:50:37', '2016-04-08 23:38:02'),
(3, 'produto teste 3', 5.00, 10.05, 5.65, 0.00, 'S', '2016-04-08 20:56:51', '2016-04-08 20:56:51'),
(4, 'produto teste 4', 28.00, 79.50, 10.00, 0.00, 'S', '2016-04-08 21:09:07', '2016-04-08 21:09:07'),
(6, 'produto teste 5', 50.00, 60.00, 10.00, 0.00, 'S', '2016-04-08 22:33:00', '2016-04-08 22:33:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 14, 'Moedores', '2016-04-11 17:02:07', '2016-04-11 17:02:07'),
(2, 14, 'Desentupidores', '2016-04-11 17:02:46', '2016-04-11 17:02:46'),
(3, 13, 'Tampas', '2016-04-11 17:03:06', '2016-04-11 17:03:06'),
(6, 0, 'teste 2', '2016-04-11 19:29:05', '2016-04-11 19:29:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subsubcategorias`
--

CREATE TABLE `subsubcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `subsubcategorias`
--

INSERT INTO `subsubcategorias` (`id`, `subcategoria`, `descricao`, `created_at`, `updated_at`) VALUES
(2, 2, 'teste', '2016-04-11 20:52:21', '2016-04-11 20:52:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `liberado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `administrador` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cliente`, `nome`, `email`, `senha`, `tipo_usuario`, `liberado`, `administrador`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 0, 'administrador', 'root', '7b24afc8bc80e548d66c4e7ff72171c5', 'ADMIN', 'S', 'S', 'WojXdC7LtjH21tQCUfZb8r1UYr1vRBnWXEHlEX2sKz98U2W5gD0SYslYBOFJ', NULL, '2016-04-08 22:31:34'),
(5, 4, 'teste', 'alive@alive.inf.com', '698dc19d489c4e4db73e28a713eab07b', 'CLIENTE', 'S', 'S', '', '2016-04-07 15:22:18', '2016-04-07 15:23:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_cnpj_unique` (`cnpjcpf`);

--
-- Indexes for table `imagem_produto`
--
ALTER TABLE `imagem_produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsubcategorias`
--
ALTER TABLE `subsubcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `imagem_produto`
--
ALTER TABLE `imagem_produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subsubcategorias`
--
ALTER TABLE `subsubcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
