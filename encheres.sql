-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 09:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encheres`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwrd` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nom`, `prenom`, `email`, `passwrd`) VALUES
('AMRAOUI', 'soufiane1', 'elamraou@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `current_price` int(15) NOT NULL,
  `new_price` int(15) NOT NULL,
  `date_bid` date NOT NULL
  FOREIGN KEY (client_id) REFERENCES client(id_client)
  FOREIGN KEY (product_id) REFERENCES produits(id_produit)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwrd` varchar(20) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`nom`, `prenom`, `email`, `passwrd`, `id_client`) VALUES
('Soufiane', 'client', 'client@gmail.com', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_client` int(6) NOT NULL,
  `id_produit` int(6) NOT NULL,
  `num_commande` int(6) NOT NULL,
  `prix` int(10) NOT NULL,
  `date_commande` date NOT NULL DEFAULT current_timestamp()
  FOREIGN KEY (id_client) REFERENCES client(id_client)
  FOREIGN KEY (id_produit) REFERENCES produits(id_produit)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_msg` int(100) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_msg`, `name`, `email`, `subject`, `message`) VALUES
(1, 'soufiane', 'elamr@gmail.', 'stagier', 'hello everyone'),
(2, 'yassine', 'elamra@gmail.', 'stagier', 'hello please contact me'),
(4, 'soufiane', 'elamrao@gmail', 'stagier', 'hii'),
(5, 'soufiane', 'elamraou@gmail', 'stagier', 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(10) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produit`, `image`, `nom`, `prix`, `description`) VALUES
(8, 'https://imgs.search.brave.com/v0t_XWqdT8xmSFyzCIEwJL0JXbB6eaVARpb5FAUihmg/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/Y29sbGluc2RpY3Rp/b25hcnkuY29tL2lt/YWdlcy90aHVtYi9o/YW5kYmFnXzMzODIz/MTA5MF8yNTAuanBn/P3ZlcnNpb249NC4w/LjMyMA', 'Sac louis vuitton', 4200, 'Le second, côté passager, s\'empare alors du sac à main et le vide de son contenu.\r\nMétropolitain (2020)\r\nOccasion de rappeler que ce sont deux fondamentaux du luxe, lequel est trop souvent réduit à sa dimension matérielle, ses produits, ses sacs à main, ses collections...\r\nL\'Opinion (2020)\r\nBijoux, sac à main, escarpins...Les vêtements de la victime sont aussi expertisés, notamment ses chaussures et son sac à main, retrouvés à distance du corps.\r\nMarianne (2020)\r\nC\'est la rencontre entre un holster et un sac à main.\r\nAllociné (2020)\r\nAu total les gendarmes ont pu saisir pour près de 107.000 € d\'avoirs criminels (argent liquide, comptes bancaires, multimédia, vêtements, sacs à mains et montres de luxe).\r\nAngers Info (2020)'),
(9, 'https://imgs.search.brave.com/8bPIbHfBHlUI6DzafiIrLK66n-MJCnxXaPxIEvOHfPw/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5hdWNoYW4uZnIv/ZTNkMjcyYjAtODEy/MS00NTc0LWI0NWIt/ODc1NzI0ZjdkMWU3/XzEyMDB4MTIwMC9C/MkNELw', 'sac a dos vert', 1476, 'Léger et confortable, ce grand sac à dos noir Minecraft de 42 cm reprend les codes du célèbre jeu vidéo éponyme. Sa taille est adaptée pour les enfants dès la classe de CM2. Doté d’une grande capacité de rangement, ce sac multipoches fermé par glissières possède une poche intérieure en maille filet, un compartiment premier compartiment spatieux et un second compartiment pour les plus petites affaires. Sur le devant, une poche zippée récupère les ajouts de dernière minute grâce à son organiseur pratique. Fonctionnel sur toute la ligne, ce sac à dos Minecraft est équipé d&#039;un dos matelassé en mesh pour une meilleure respirabilité et de bretelles ajustables par sangles. La poignée haute rembourrée permet de le tenir confortablement à la main ou de le suspendre à une patère. Confectionné dans une toile en polyester, son revêtement résiste à l’usure, aux éraflures et aux accrocs du quotidien. Dès 10 ans.'),
(11, 'https://imgs.search.brave.com/WJ62moQCIp6mjUDCTPIUj6_I07KGkYGUdlZP5WysGzs/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuaW50ZXJuZXRz/dG9yZXMuZGUvcHJv/ZHVjdHMvMTUyOTQ2/OC8wMi85OTMxZGEv/ZGV1dGVyLWNsaW1i/ZXItYmFja3BhY2st/MjJsLWtpZHMtZmVy/bi1pbmstMS5qcGc_/Zm9yY2VTaXplPXRy/dWUmZm9yY2VBc3Bl/Y3RSYXRpbz10cnVl/JnVzZVRyaW09dHJ1/ZSZzaXplPTMwMHgz/MDA', 'deuter Climber Sac à dos 22l E', 8913, 'Conçu pour l&#039;aventure. De par son design simple et inventif, le Renn 65 est un sac à dos très innovant conçu pour un niveau supérieur de confort et de commodité.\r\n\r\nLe Renn 65 comprend un système dorsal ventilé ultra réglable doté d&#039;un maillage AirSpeed suspendu au-dessus d&#039;une grande cavité permettant le passage de l&#039;air. Ce design permet au corps d&#039;épouser la forme de la ceinture et de la partie lombaire du sac à dos, pour un confort renforcé et un port de charge encore plus stable et assisté. Le réglage de la hauteur des bretelles est très intuitif grâce au système innovant d&#039;ajustement vertical sur rails. Le Renn 65 se règle rapidement et aisément pour vous convenir parfaitement. Pour correspondre à une plus grande variété de longueurs de dos, ces sacs sont équipés de sangles de rappel de charge sur les bretelles qui garantissent le confort du sac peu importe sa position. Une ceinture large et ultra rembourrée procure une sensation agréable sur les hanches et assiste le transport de charges plus lourdes. Le Renn bénéficie par ailleurs d&#039;un système dorsal adapté à la morphologie féminine.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`,`passwrd`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`num_commande`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_msg` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
