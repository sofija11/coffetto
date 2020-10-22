-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 02:55 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffetto`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(5) NOT NULL,
  `imePrezime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`idAutor`, `imePrezime`, `opis`) VALUES
(3, 'Sofija Vitorovic', 'My name is Sofija Vitorovic, I am student, who studies at ICT College, with number of index 171 17'),
(4, 'Sofija Vitorovic', 'My name is Sofija Vitorovic, I am student, who studies at ICT College, with number of index 17117');

-- --------------------------------------------------------

--
-- Table structure for table `blogovi`
--

CREATE TABLE `blogovi` (
  `idBlog` int(5) NOT NULL,
  `src` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datum` date DEFAULT NULL,
  `naslov` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` text NOT NULL,
  `idKorisnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogovi`
--

INSERT INTO `blogovi` (`idBlog`, `src`, `alt`, `datum`, `naslov`, `opis`, `idKorisnik`) VALUES
(10, 'assets/images/blog/vis.jpg', 'sll2', '2019-06-08', 'Swedish scientists studied the behavior of a mixtu', 'Get some ice in your drink ', 5),
(12, 'assets/images/blog/kaf.jpg', 'sl33', '2019-06-11', 'COFFEE WAKES YOU UP', 'It is proven, than most cofee drink students,witch wakes them up, and help them to pass exams', 8),
(13, 'assets/images/blog/cake.jpg', 'sl9', '2019-06-01', 'LITTLE BITE OF CAKE, BRINGS ZOU HAPPINESS', 'All kind of sweets, brings us joy, especialy one bite of choocholate sweet cake', 8),
(14, 'assets/images/blog/coc.jpg', 'sl09', '2019-06-12', 'COCKTAIL KNOWN AS AN EASY MEDICINE AGAINST A HANGO', 'You had amazing night, but you hangovered,nothing wrong, take one coctail', 6),
(15, 'assets/images/blog/maca.jpg', 'sl900', '2019-06-10', 'OLDEST CAT IN THE WORLD DRANK                     ', 'When she wakes up,she drink cappucino with her patron', 5);

-- --------------------------------------------------------

--
-- Table structure for table `glavnimeni`
--

CREATE TABLE `glavnimeni` (
  `idMeni` int(5) NOT NULL,
  `href` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glavnimeni`
--

INSERT INTO `glavnimeni` (`idMeni`, `href`, `naziv`) VALUES
(1, 'index.php?page=pocetna', 'Home'),
(2, 'index.php?page=about', 'About'),
(3, 'index.php?page=menu', 'Menu'),
(4, 'index.php?page=blog', 'Blog'),
(5, 'index.php?page=contact', 'Contact');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idKategorije` int(5) NOT NULL,
  `nazivKategorija` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idKategorije`, `nazivKategorija`) VALUES
(1, 'coffee'),
(2, 'milk'),
(4, 'cocktail'),
(5, 'beverages'),
(6, 'tea'),
(7, 'cake');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(5) NOT NULL,
  `ime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datum` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `ulogaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `korisnicko`, `lozinka`, `email`, `datum`, `ulogaId`) VALUES
(5, 'Milica', 'Vitorovic', 'mia_15', '5612a24581b75d540132f2e1e3fff65e', 'mia@gmail.com', '2019-06-05 00:24:26.330959', 1),
(6, 'Petar', 'Markovic', 'pero_345678', '64ce5d8186f634d075fd22ef8a3daa8c', 'pero@gmail.com', '2019-06-05 17:37:13.306162', 1),
(7, 'Snezana', 'Joksic', 'sneki_sava56', '09e09fad961ded45701fb43a78baa7f8', 'sneki@hotmail.com', '2019-06-05 20:59:45.770500', 2),
(8, 'Sofija', 'Vitorovic', 'sofi_0610', 'dc36069a284431f2225297aba3328d9d', 'sofija_vitorovic@hotmail.com', '2019-06-05 21:39:29.185738', 1),
(9, 'Aleksandar', 'Radovanovic', 'dzengiBubica', 'c8adb3cb117357d7ffc48df1249d9fc8', 'dzengi@gmail.com', '2019-06-09 23:02:52.109934', 2),
(13, 'Sofija', 'Vitorovic', 'solesole_', 'f419f308bc0f922c11a1aba7d5db7fa5', 'sofija.vitorovic.171.17@ict.edu.rs', '2019-06-12 19:21:36.131733', 2);

-- --------------------------------------------------------

--
-- Table structure for table `krugovi`
--

CREATE TABLE `krugovi` (
  `idKrug` int(5) NOT NULL,
  `nazivKrug` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opisKrug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krugovi`
--

INSERT INTO `krugovi` (`idKrug`, `nazivKrug`, `opisKrug`) VALUES
(1, 'Coffee', 'Coffee preparation is the process of turning coffee beans into a beverage.\r\n										 The process includes four basic steps'),
(2, 'Cocktail', 'A cocktail is an alcoholic mixed drink, \r\n										which is combination of one or more mixed with other ingredients'),
(3, 'Cake', 'Cake is a form of sweet food that is usually baked'),
(4, 'Milk', 'Milk is baby food which give as a strenght'),
(5, 'Beverages', 'Drinking alcohol plays an important social role in many cultures.');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idPice` int(5) NOT NULL,
  `slika` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nazivPica` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `opis` text NOT NULL,
  `idKategorije` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idPice`, `slika`, `nazivPica`, `cena`, `opis`, `idKategorije`) VALUES
(3, 'assets/images/menus/coffee1.png', 'Coffee ice', 15, 'Our selection of coffee beans have been rigorously tested with every different type of coffee machine to make.', 1),
(4, 'assets/images/menus/coffee2.png', 'Coffee ice milk', 25, 'Coffee ice milk is the process that slowly and gradually releases the purest of essence.', 1),
(5, 'assets/images/menus/coffee3.png', 'Hot Coffee', 14.5, 'Grown traditionally, harvested naturally and roasted lovingly, they\'re the star of every cup.', 1),
(6, 'assets/images/menus/coffee4.png', 'Coffee Sola', 15.5, 'It\'s coming from Africa and it feels like heaven', 1),
(7, 'assets/images/menus/milkli1.png', 'Fresh milk', 39, 'Add Kahlua creme de cacao, milk and ice to a blender and blend on low speed until smooth.', 2),
(8, 'assets/images/menus/milkli2.png', 'Milk ice', 45, 'There should be some ice crystals in the glass and the drink will be light and frothy.', 2),
(9, 'assets/images/menus/milkli3.png', 'Mudslide Recipe Milk', 29, 'White creme de cacao and milk, and served blended in a chilled highball glass topped with whipped cream and a small cookie', 2),
(10, 'assets/images/menus/milkli4.png', 'Sarati Lassi Milk', 40, 'Get the mixers out and shape your Saturday night party like an Aspri Spirits night!', 2),
(11, 'assets/images/menus/coctail1.png', 'Cocktaila Moscow Mule', 29, 'Top with ginger beer and garnish with a lime wedge and a mint sprig.', 4),
(12, 'assets/images/menus/coctail2.png', 'Bluefrog Cocktail', 33, 'Add Cocktail Vodka Grapefruit and lime juice. Top up with ginger ale. Garnish with a lime wedge.', 4),
(13, 'assets/images/menus/coctail3.png', 'Cocktail Oranges', 33, 'Top up with orange juice. Garnish with a Maraschino cherry and an orange wedge.', 4),
(14, 'assets/images/menus/coctail4.png', 'Cocktail dessert', 45, 'Impress your guests with a summer cocktail dessert recipe by Cava restaurant’s master chef, Christopher McDonald.', 4),
(15, 'assets/images/menus/br1.png', 'Orange Ice', 33, 'While I\'m not generally into overly themed parties, especially the typical orange.', 5),
(16, 'assets/images/menus/br2.png', 'Milk ice', 15.5, 'There should be some ice crystals in the glass and the drink will be light and frothy.', 5),
(17, 'assets/images/menus/br3.png', 'Calyer royale', 33, 'Strawberries make a perfect choice because they\'re naturally sweet.', 5),
(18, 'assets/images/menus/br4.png', 'Lemon ice', 25.58, 'Shake over ice, strain into a shot glass and garnish with a small orange slice.', 5),
(19, 'assets/images/menus/cake1.png', 'Cakes cocoa', 10, 'Indispensable for lovers of coffee tiramisu dessert ... Special cake with cream and cocoa. powder lovers the choice of mild, sweet.', 7),
(20, 'assets/images/menus/cake2.png', 'Chocolate Guinness Cupcakes', 15.35, 'The top of the cheesecake was covered in chocolate. Who wants to wake up from such a sweet dream.', 7),
(21, 'assets/images/menus/cake3.png', 'Brickle cake', 29, 'Brickle cake, chocolate taste the great passion of lovers.', 7),
(22, 'assets/images/menus/cake4.png', 'Chocolate particle cake', 29, 'Orodispersible dough with chocolate chips and delicious flavor you will be addicted.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `idPoruka` int(3) NOT NULL,
  `poruka` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `poslato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idKorisnik` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`idPoruka`, `poruka`, `poslato`, `idKorisnik`) VALUES
(2, 'Bravo kraljice', '0000-00-00 00:00:00', 5),
(3, 'Svidja mi se sajt', '2019-06-14 02:22:13', 13);

-- --------------------------------------------------------

--
-- Table structure for table `slikepocetna`
--

CREATE TABLE `slikepocetna` (
  `idSlika` int(5) NOT NULL,
  `src` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slikepocetna`
--

INSERT INTO `slikepocetna` (`idSlika`, `src`, `alt`) VALUES
(1, 'assets/images/home/gallery/2.png', 'sl1'),
(2, 'assets/images/home/gallery/4.png', 'sl2'),
(3, 'assets/images/home/gallery/5.png', 'sl3'),
(4, 'assets/images/home/gallery/1.png', 'sl98'),
(5, 'assets/images/home/gallery/3.png', 'sl33'),
(6, 'assets/images/home/gallery/6.png', 'sl5');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `ulogaId` int(5) NOT NULL,
  `nazivUloga` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`ulogaId`, `nazivUloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indexes for table `blogovi`
--
ALTER TABLE `blogovi`
  ADD PRIMARY KEY (`idBlog`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `glavnimeni`
--
ALTER TABLE `glavnimeni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD KEY `ulogaId` (`ulogaId`);

--
-- Indexes for table `krugovi`
--
ALTER TABLE `krugovi`
  ADD PRIMARY KEY (`idKrug`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idPice`),
  ADD KEY `idKategorije` (`idKategorije`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`idPoruka`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `slikepocetna`
--
ALTER TABLE `slikepocetna`
  ADD PRIMARY KEY (`idSlika`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`ulogaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogovi`
--
ALTER TABLE `blogovi`
  MODIFY `idBlog` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `glavnimeni`
--
ALTER TABLE `glavnimeni`
  MODIFY `idMeni` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idKategorije` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `krugovi`
--
ALTER TABLE `krugovi`
  MODIFY `idKrug` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idPice` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `idPoruka` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slikepocetna`
--
ALTER TABLE `slikepocetna`
  MODIFY `idSlika` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `ulogaId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogovi`
--
ALTER TABLE `blogovi`
  ADD CONSTRAINT `blogovi_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`ulogaId`) REFERENCES `uloga` (`ulogaId`);

--
-- Constraints for table `meni`
--
ALTER TABLE `meni`
  ADD CONSTRAINT `meni_ibfk_1` FOREIGN KEY (`idKategorije`) REFERENCES `kategorije` (`idKategorije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
