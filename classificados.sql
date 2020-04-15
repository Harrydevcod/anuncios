-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Abr-2020 às 17:32
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `classificados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `titulo`, `descricao`, `valor`, `estado`) VALUES
(3, 1, 1, 'Hublot Editado', 'Algum produto de anúncio legal', 300, 1),
(4, 1, 2, 'Casaco de Fulano', 'Descrição luxuosa do casaco', 100, 0),
(5, 1, 4, 'Ferrari', 'Carro esportivo muito barato', 50, 1),
(6, 1, 1, 'luis', 'aaa', 100, 0),
(7, 2, 3, 'telemóveis', 'Samsung galaxy A20', 18000, 0),
(8, 7, 1, 'sss', '', 0, 0),
(9, 1, 2, 'Camisas', 'Camisa de manga comprida: um clássico da moda masculina que a Emporio Armani escolheu para reinterpretar novo estilo. Sempre na moda, vai apreciar a sua forma e a sua cor branca. Não há dúvidas que todos os homens apreciam este modelo.', 5000, 0),
(10, 1, 1, 'Chevrolet', 'Carro com todos os documentos em dias', 600000, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios_imagens`
--

CREATE TABLE `anuncios_imagens` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios_imagens`
--

INSERT INTO `anuncios_imagens` (`id`, `id_anuncio`, `url`) VALUES
(5, 3, 'ce22b99a632571fc5ff345eafa252a67.jpg'),
(6, 3, 'c38581766dff46f000ae243330ead1a8.jpg'),
(7, 3, 'fe31ef89de0c785c24e2007719241763.jpg'),
(8, 4, 'ef9b88ad9e74cd9b4f1510653da291a2.jpg'),
(9, 5, '04bd9d8ac92c267405cfa7682d59049b.jpg'),
(12, 6, 'f71dc41a82bd9d2916ec07bd52bdbc68.jpg'),
(14, 7, 'f4b008d41f56d48e98a56a1694c55cb7.jpg'),
(15, 10, '4effad047b1a3c908f9cbabc6f5aae49.jpg'),
(17, 9, '14bcf23e6f1ae82fa3d2f597de5e94e4.jpg'),
(29, 5, 'bd0679aee17a1fa3cb14acea6b0caee0.jpg'),
(30, 5, '6123013f1edd3c04ba9a38b78219e0a8.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Relógios'),
(2, 'Roupas'),
(3, 'Eletrônicos'),
(4, 'Carros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(32) NOT NULL DEFAULT '',
  `telefone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Ernani', 'ernani.fonseca@cmsv.gov.cv', '202cb962ac59075b964b07152d234b70', '9726488'),
(2, 'ernani', 'nanzfonseca@gmail.com', '202cb962ac59075b964b07152d234b70', '972'),
(3, 'joao', 'joao@gmail.com', '202cb962ac59075b964b07152d234b70', '12'),
(4, 'ssss', 's@gmail.com', '202cb962ac59075b964b07152d234b70', 'aaa'),
(5, 'Elenise Joelma', 'elenisepires@gmail.com', '202cb962ac59075b964b07152d234b70', '5978291');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_imagens`
--

CREATE TABLE `usuarios_imagens` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
