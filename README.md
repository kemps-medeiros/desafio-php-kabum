# desafioKabum

Para iniciar o projeto é necessário utilizar o XAMPP e deixar ativado o "Apache" e o "MySQL".

Foi utilizado o phpmyadmin para criar o banco de dados e as tabelas  
 
Antes de rodar é necessário criar um banco de dados com o nome 'project' 

e executar os comandos SQL abaixo para criação de três tabelas:

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `birthDate` date NOT NULL,
  `CPF` varchar(150) NOT NULL,
  `RG` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estrutura da tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `rua` varchar(250) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(250) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `clientid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


<strong>Para iniciar o projeto é necessário acessar a página .../login.html  e clicar em registrar para criar um usuário e acessar os dados do gerenciador de clientes</strong>

