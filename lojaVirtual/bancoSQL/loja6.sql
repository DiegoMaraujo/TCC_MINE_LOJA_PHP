

CREATE DATABASE  loja6;
USE loja6;

CREATE TABLE `cliente` (
  `id_Cliente` int(11) PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(45)NOT  NULL,
  `senha` varchar(32)NOT  NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(50)NOT  NULL,
  `telefone` varchar(15)NOT NULL,
  `rua` varchar(45)NOT  NULL,
  `numero` varchar(32) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


CREATE TABLE `produto` (
  `id_produto` int(11) PRIMARY KEY AUTO_INCREMENT, 
  `nome_pro` varchar(255) NOT NULL,
  `preco` double(20,2) NOT NULL,
  `imagem` varchar(50)  NULL,
  `quantidade` int (20) NOT null
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


create table pedidos(
  id_pedido int(11) PRIMARY KEY AUTO_INCREMENT,
  fk_id_produto int(11) ,
  quantidade varchar(250),
  preco float(10.2),
  total float(10.2),
  fk_id_cliente int(11),
  data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)ENGINE=InnoDB DEFAULT CHARACTER SET utf8;;


create table vendas(
  id_vendas int(11) PRIMARY KEY AUTO_INCREMENT,
  fk_id_pedidos int(11),
  status varchar(150),
  pagamento varchar(150),
  data_venda datetime NOT NULL DEFAULT CURRENT_TIMESTAMP

)ENGINE=InnoDB DEFAULT CHARACTER SET utf8;;

INSERT INTO `produto` (`id_produto`, `nome_pro`, `preco`, `imagem`,quantidade) VALUES
(1, 'Apple iPhone 11 pro Max 512gb',  8447.00, 'img1.jpg',10),
(2, ' Samsung Galaxy A9 SM-A920F 128GB', 1709.00, 'img2.jpg',10),
(3, ' Samsung Galaxy A30 SM-A305GZ 64GB', 999.00 , 'img3.jpg',10),
(4, 'Xiaomi Redmi Note 7 64GB Android',  1019.00, 'img4.jpg',10),
(5, 'Apple iPhone XR 64GB iOS',3219.00, 'img5.jpg',10),
(6, 'Xiaomi Redmi Note 8 64GB ',  1007.00 , 'img6.jpg',10),
(7, 'Apple iPhone 8 Plus 64GB iOS',  2879.00 , 'img7.jpg',10),
(8, 'Samsung Galaxy S9 SM-G9600 128GB',  1919.00, 'img8.jpg',10),
(9, 'Samsung Galaxy S9 Plus SM-G9650 128GB',  2249.00 , 'img9.jpg',10),
(10, 'Motorola MotorolaOne Action XT2013-1 128GB Android',  1274.00 , 'img10.jpg',10),
(11, 'Motorola MotorolaOne Action 128GB Android',  1104.00 , 'img11.jpg',10),
(12, 'Asus Zenfone 5 ZE620KL 64GB',  999.00 , 'img12.jpg',10),
(13, 'LG K9 TV LMX210B 16GB Android', 394.00, 'img13.jpg',10),
(14, 'Samsung Galaxy A80 SM-A805FZ 128GB',  1848.00, 'img14.jpg',10),
(15, 'Samsung Galaxy Note 9 128GB Nano', 3299.00 , 'img15.png',10),
(16, 'Samsung Galaxy M20 SM-M205M 64GB',  699.99 , 'img16.jpg',10),
(17, 'Samsung Galaxy Note 10 Plus SM-N970F 256GB',  5279.00 , 'img17.jpg',10),
(18, 'Samsung Galaxy Note 10 256GB Android',  4549.00, 'img18.jpg',10),
(19, ' Samsung Galaxy S8 Plus SM-G955FZ 64GB',  1994.00, 'img19.jpg',10),
(20, 'Sony Xperia XZ2 64GB',  3886.00 , 'img20.jpg',10),
(21,'Sony Xperia L2 32GB Android',1135.00,'img21.jpg',10);



ALTER TABLE pedidos  ADD CONSTRAINT fk_id_cliente FOREIGN  KEY  (fk_id_cliente)REFERENCES cliente(id_Cliente) ON DELETE CASCADE ON UPDATE CASCADE;



