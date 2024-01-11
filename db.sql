-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for app
CREATE DATABASE IF NOT EXISTS `app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `app`;

-- Dumping structure for table app.circuits
CREATE TABLE IF NOT EXISTS `circuits` (
  `idCircuit` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`idCircuit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table app.circuits: ~5 rows (approximately)
INSERT INTO `circuits` (`idCircuit`, `title`, `subTitle`, `icon`) VALUES
	(1, 'Parking', '', 'icon-parking.svg'),
	(2, 'Circuit', 'Circuit ornithologique', 'icon-circuit.svg'),
	(3, 'test', 'subtitle test', 'test.svg'),
	(4, 'update test', 'update subtitle', 'update icon.svg'),
	(5, 'test', '', '2665593.jpg');

-- Dumping structure for table app.circuitsdetails
CREATE TABLE IF NOT EXISTS `circuitsdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCircuits` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pinmap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `circuitsdetails_ibfk_1` (`idCircuits`),
  CONSTRAINT `circuitsdetails_ibfk_1` FOREIGN KEY (`idCircuits`) REFERENCES `circuits` (`idCircuit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table app.circuitsdetails: ~5 rows (approximately)
INSERT INTO `circuitsdetails` (`id`, `idCircuits`, `title`, `desc`, `tel`, `email`, `pinmap`, `image`) VALUES
	(1, 1, 'Parking 1', '', '06 03 14 86 84', 'youssef.jebbari@gmail.com', '30.293862319332938, -9.56183897631182', '1.jpg'),
	(2, 1, 'Parking 2', '', '06 03 14 86 00', 'youssef@gmail.com', '30.293862319332931, -9.56183897631180', '2.jpg'),
	(3, 2, 'Parking 3', '', '06 03 14 86 00', 'driss@gmail.com', '30.293862319332921, -9.56183897631140', '3.jpg'),
	(5, 4, 'title1', 'desc', 'tel', 'dghoughizakaria0@gmail.com', '367238143934902', 'image.jpg'),
	(6, 4, 'update', 'update', '0979098', 'dghoughizakaria0@gmail.com', 'update', 'image update.jpg');

-- Dumping structure for table app.especes
CREATE TABLE IF NOT EXISTS `especes` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table app.especes: ~4 rows (approximately)
INSERT INTO `especes` (`idType`, `espece`, `image`, `type`) VALUES
	(1, 'faune', 'faune-1.jpg', 'Oiseaux'),
	(2, 'faune', 'faune-2.jpg', 'Reptiles'),
	(3, 'faune', 'faune-3.jpg', 'Mammifères'),
	(4, 'flore', 'flore-1.jpg', 'Végétation');

-- Dumping structure for table app.especesdetails
CREATE TABLE IF NOT EXISTS `especesdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idType` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subDesc` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `especesdetails_ibfk_1` (`idType`),
  CONSTRAINT `especesdetails_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `especes` (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table app.especesdetails: ~33 rows (approximately)
INSERT INTO `especesdetails` (`id`, `idType`, `name`, `desc`, `subDesc`, `image`, `color`) VALUES
	(1, 1, 'Ibis chauve', 'L’Ibis chauve est un oiseau de 70 à 80 cm de hauteur, de 115 à 130 cm d’envergure, d’un poids compris entre 1 000 et 1 500 g. L’adulte a la tête nue et rougeâtre, avec un collier de longues plumes hérissées sur la nuque et le haut du cou et des taches pourpre-violacées sur les épaules et sur les couvertures des ailes sans dimorphisme sexuel au niveau du plumage. L’ibis chauve possède un long bec incurvé vers le bas de couleur rouge. \r\nSes pattes sont également rouges, de longues plumes pourpre-bleuâtres couvrent le reste du corps, et présentent des reflets métalliques verts. ', '(Photo. M. Aourir)', '1.jpg', ''),
	(2, 1, 'Tchagra à tête noire', 'Passereau de taille moyenne (21-24 cm). Son chant mélodieux est une suite mélancolique de notes flûtées et puissantes. Il vit dans les milieux semi-désertiques parsemés de buissons.\r\nIl parade souvent en vol, tout en chantant ; la femelle prend régulièrement part à la parade et elle peut chanter en duo avec le mâle. C’est dans ces conditions qu’il est le plus facile à voir. Autrement, c’est un oiseau discret. ', '(Photo. Y. Tamraoui)', '2.jpg', ''),
	(3, 1, 'Flaman rose', 'Le flamant rose est la plus grande espèce de flamants avec une hauteur moyenne de 120 à 140 cm. Son plumage, auquel il doit son nom, est blanc rosâtre. Ce sont les couvertures alaires qui, chez le flamant rose, revêtent une couleur rose intense, avec des rémiges primaires et secondaires noires. Les pattes, longues et fines, sont roses chez l’adulte. Le bec est également rose lui aussi avec une pointe noire bien définie, la forme et l\'étendue de ce noircissement variant d\'un individu à un autre. Les flamants se rassemblent dans les eaux saumâtres, salées ou alcalines, où les espèces de crustacés qu\'ils mangent prospèrent en grand nombre. ', '(Photo. M. Aourir)', '3.jpg', ''),
	(4, 1, 'Sarcelle marbrée', 'La Sarcelle marbrée, également appelée Marmaronette marbrée, est un petit canard au plumage brun-gris, mesurant 39 à 48 cm de longueur pour une envergure de 63 à 67 cm et un poids de 450 à 590 g. Son plumage argenté et la couleur de sa tête le rendent très reconnaissable. Ce canard recherche les étendues d’eau peu profondes et les zones humides temporaires.', '(Photo. M. Aourir)', '4.jpg', ''),
	(5, 1, 'Grand cormoran Marocain', 'C’est une espèce d’oiseaux aquatique piscivore d’une taille de 100 cm, d’une envergure de 130 à 160 cm et d’un poids de 2 à 2,5 kg. L’adulte de la forme endémique marocaine (sous-espèce : maroccanus) est caractérisé par le blanc pur de la gorge, alors que l’avant du cou et le haut de la poitrine sont blancs avec plus ou moins du noir au bout des plumes.  L’espèce se nourrit principalement de poissons et niche, en colonie, sur les falaises maritimes atlantiques marocaines. Quand il ne pêche pas, il se perche très souvent sur un support en bois, tout au long de l’oued Massa et sur les dunes de sable de l’embouchure où il se fait sécher son plumage.', '(Photo. M. Aourir)', '5.jpg', ''),
	(6, 1, 'Ibis falcinelle', 'Cet échassier de taille moyenne avec un long bec recourbé vers le bas en forme de faucille (d’où son nom) a des pattes longues et un plumage brun-vert à reflets bronzés et brillants. En vol, il se reconnaît à sa silhouette, à ses ailes arrondies, tandis que le cou est tendu et les pattes légèrement pendantes. L’espèce peut s’observer, toute l’année, au niveau de l’embouchure de l’oued Massa et dans les champs de la palmeraie, où il se nourrit de larves d’insectes aquatiques divers, de libellules en particulier, de criquets, de  sauterelles, mais aussi de vers de terre, de sangsues, et d’autres macroinvertébrés comme les  mollusques (moules) ou des Crustacés. L’espèce niche en colonie dans la végétation dense sur les deux rives de l’oued Massa.', '(Photo. M. Aourir)', '6.jpg', ''),
	(7, 1, 'Balbuzard pêcheur', 'Espèce présente toute l’année sur le site. C’est un rapace diurne d’une taille moyenne d\'environ 50 à 66 cm qui montre un plumage brun brillant au-dessus, des ailes longues et étroites à extrémités digitées, ce qui lui donne un aspect caractéristique. La tête et les parties inférieures sont blanches. Cette espèce piscivore spécialisée peut s’observer en vol, perchée et le plus souvent en train de consommer un poisson sur les rives de l’oued.', '(Photo.Yathin S Krishnappa - CC BY-NC 3.0)', '7.jpg', ''),
	(8, 1, 'Tadorne casarca', 'Gros canard d’un poids de 1 à 1,5 kg au plumage roux, fauve orangé à l\'exception de la tête qui est beaucoup plus claire. La transition tête-corps s\'effectue par un petit collier noir en ce qui concerne le mâle. Ce collier est absent chez la femelle. \r\nLes ailes sont noires et blanches avec un petit miroir vert dans sa partie centrale. Bec, pattes et croupion sont noirs. Le Tadorne casarca lance des cris sonores « aakh » répétés. Cet oiseau est bruyant quand les groupes se rassemblent en hiver. Cette espèce est plutôt liée à l’eau douce et se nourrit sur le sol en broutant et en picorant ici et là tout en marchant.\r\nL’espèce s’observe sur le site Massa plutôt en hiver. ', '(Photo. M. Aourir)', '8.jpg', ''),
	(9, 1, 'Les Goélands', 'En période hivernale, le cordon sableux de l’embouchure de l’oued Massa accueille des contingents de goélands (Goéland brun, Goéland d’Audouin et Goéland leucophée) de plusieurs centaines d’individus. Les goélands trouvent dans la plage des reposoirs favorables.', '(Photo. M. Aourir)', '9.jpg', ''),
	(10, 1, 'Rougequeue de Moussier\r\n(Rubiette de Moussier)', 'Présent toute l’année sur le site, ce petit oiseau trapu de 20 g à une tête relativement grosse et une queue courte. Le mâle est reconnaissable entre tous par sa gorge et ses parties inférieures orange, une bande blanche très voyante sur la tête s’étendant du front jusqu’aux côtés du cou et une grande tache blanche sur les ailes. La femelle est moins distinctive. L’espèce se reproduit sur les deux rives de l’oued Massa, dans les plantations et les jardins de la palmeraie. Son cri est un sifflement clair et aigu combiné à un bourdonnement, Pi, pi, pi, zzzzzzzzz.', '(Photo. M. Aourir)', '10.jpg', ''),
	(11, 1, 'Œdicnème criard', 'Oiseau de taille moyenne (40-45 cm) et d’un poids de 370 - 450 g avec un bec robuste jaune à la base et noir à la pointe. Il a de grands yeux jaunes (qui lui donnent un air reptilien, ou une apparence étonnée) et un plumage brun clair comportant des stries noires sur le dos lui permettant de se dissimuler.  Il se nourrit d\'invertébrés (tels que des criquets, des forficules, des mouches, des chenilles, des coléoptères, des limaces ou des escargots) et niche au ras du sol (deux œufs). Sur le site de Massa, la ponte a lieu de mars à juillet. Plusieurs sites d’hivernage sont situés dans le PNSM.', '(Photo. M. Aourir)', '11.jpg', ''),
	(12, 1, 'Héron cendré', 'Oiseau majestueux par sa silhouette particulière, le Héron cendré possède un long cou et un grand bec jaune en forme de gros poignard. Son plumage gris, sauf sur sa tête, et ses parties inférieures sont blanches. On le reconnaît facilement à ses pattes jaunes et son vol lent, avec le cou replié « en S ». Son cri habituel, celui qu\'il pousse par exemple à l\'envol, est un "waarr" très rude et râpeux. Il se nourrit de Poissons, d\'Amphibiens, de Reptiles, de Crustacés, de petits Mammifères (musaraignes et rats) et d\'oiseaux.\r\nL’espèce peut s’observer tout au long de l’oued Massa et plus particulièrement sur la rive gauche et au niveau de l’estuaire.', '(Photo. M. Aourir)', '12.jpg', ''),
	(13, 1, 'Limicoles', 'Plusieurs espèces de petits échassiers (huîtriers, échasses, avocettes, pluviers, barges, courlis, chevaliers, tournepierres et bécasseaux) fréquentent le site, durant la période d’hivernage. Ils s’alimentent de petits invertébrés qu’ils trouvent en surface ou dans la vase.', '(Photo. M. Aourir)', '11-ma.jpg', ''),
	(14, 2, 'Tortue grecque', 'Cette tortue terrestre du Maghreb ne dépasse guère 20 cm de longueur. Elle présente un plastron postérieurement concave, une queue relativement longue. La dossière est modérément bombée et son contour est quadrangulaire ou elliptique. Cette tortue est herbivore et consomme essentiellement herbes, feuilles, bourgeons, graines et fruits.', '(Photo. M. Aourir)', '13.jpg', ''),
	(15, 2, 'Tortue aux yeux bleus (aquatique)', 'Également appelée Emyde lépreuse, c’est une tortue dulçaquicole de taille moyenne qui atteint une longueur de 25 cm pour un poids de 1,5 kg. Le mâle est plus petit et moins lourd que la femelle. Sa coloration générale est marron clair à olivâtre. Certaines populations appartenant à la sous-espèce saharica ont l’iris de couleur bleue plus ou moins intense en fonction des populations considérées.', '(Photo. M. Aourir)', '14.jpg', ''),
	(16, 2, 'Couleuvre à Capuchon', 'Cette couleuvre, quasi menacée, est très cryptique et aux mœurs nocturnes. Elle se rencontre dans des habitats steppiques relativement peu perturbés au sein du parc. Cette espèce pond trois à cinq œufs tous les deux ans. C’est est un prédateur spécialisé des scinques et des amphisbènes.', '(Photo. A. Elbahi)', '15.jpg', ''),
	(17, 2, 'Couleuvre de Schokar (Psammophis schokari)\r\n', 'D’une longueur habituelle entre 60 cm et 100 cm, cet élégant serpent diurne est très agile et se caractérise par une bande sombre sur le côté de la tête avant et après l’œil. Il a une coloration dorsale brunâtre avec des bandes longitudinales plus ou moins marquées. Il chasse sur le sol des lézards qui constituent sa nourriture principale.', '(Photo. A. Elbahi)', '16.jpg', ''),
	(18, 2, 'Eumeces d’Algérie', 'Ce petit lézard fouisseur fréquente la steppe sèche et les zones côtières protégées au sein du PNSM ainsi que les terres agricoles avoisinantes. Il creuse son terrier dans le substrat sous les touffes de végétation. Il peut également se réfugier sous les pierres.', '(Photo. A. Elbahi)', '17.jpg', ''),
	(19, 2, 'Acanthodactyle doré', 'Petit lézard d’une longueur totale ne dépassant pas 22 cm. Il est associé aux régions à climat aride soumises à une forte influence océanique. De ce fait, il est très abondant sur le littoral du PNSM. Actif le jour, il se nourrit de petits insectes, particulièrement de fourmis et constitue également l’une des principales proies de l’ibis chauve sur le site.', '(Photo. A. Elbahi)', '18.jpg', ''),
	(20, 2, 'Seps mionecton', 'Cette espèce se rencontre sur le cordon sableux et les dunes sableuses à végétation clairsemée du littoral. Elle se rencontre aussi bien dans les zones à arganier que sur les sols meubles et légèrement humides de la palmeraie de Massa, où elle peut trouver abris sous les cailloux.', '(Photo. A. Elbahi)', '19.jpg', ''),
	(21, 3, 'Mangouste Ichneumon', 'L’ichneumon est considéré comme l’une des plus grandes Mangoustes. Elle a la taille d’un petit chien avec un poids pouvant atteindre les cinq kg. Son corps est allongé mais assez trapu est couvert de longs poils, un peu hirsute, brun-gris, qui cachent presque les pieds. Cette mangouste possède une petite tête et un cou fin et allongé, avec un museau long et pointu se terminant par un nez noir. Elle a un régime omnivore composé de rongeurs, de reptiles, d’arthropodes et de végétaux etc.., ', '(Photo. A. Irizi)', '20.jpg', ''),
	(22, 3, 'Renard roux', 'D’une taille de 105 à 120 cm, dont 35 à 40 cm de queue et un poids de 6 à 10 kg, le renard roux est un carnivore de la famille des Canidés, de pelage à dominance rousse. Le pourtour des lèvres, le menton et le ventre étant blancs. \r\nComme les autres canidés sauvages, le renard se caractérise par un museau allongé, des oreilles pointues, ou encore une longue queue touffue. C’est un redoutable prédateur de petits mammifères, notamment des rongeurs. Mais il est avant tout omnivore.', '(Photo. A. Irizi)', '21.jpg', ''),
	(23, 3, 'Écureuil de Gétulie', 'Espèce endémique de l\'ouest du Maghreb, ce petit rongeur 20 à 25 cm et possède une grande queue touffue de 15 à 20 cm, également appelé Écureuil de Barbarie, il est facilement reconnaissable grâce à ses courtes oreilles et à son pelage de couleur dorée comme le sable des dunes désertiques. Son alimentation est essentiellement composée de graines, de glands, de noix…, de fruits charnus, et de diverses racines ou tubercules, etc. ', '(Photo. A. Irizi)', '22.jpg', ''),
	(24, 3, 'Écureuil de Sénégal', 'Espèce présente au PNSM, un rongeur de 30 à 40 cm de long, pour un poids de 500 g à 1 kg. Une bande blanche, allant de l’épaule à la croupe. Il possède de petites oreilles et un long museau. Deux lignes blanches encadrent ses yeux.', '', '31.jpg', ''),
	(25, 4, 'Traganum moquinii', 'Arbrisseau ou arbuste formant de gros buissons très denses, rameaux très épais 3-6 mm, densément feuillés.\r\nEndémique des sables du littoral océanique.', '(Photo. J-P Peltier - CC BY-NC 4.0)', '23.jpg', ''),
	(26, 3, 'Sarcocorania parennis', 'Arbrisseau de 15-50 cm de hauteur, étalé en cercle, à tiges rayonnantes peu épaisses et très ramifiées. Les feuilles sont composées et les inflorescences sont sommitales et latérales. Plante halophile, elle pousse sur les vases salées sur les rives de l’oued Massa.', '(Photo. M. Aourir)', '24.jpg', ''),
	(27, 4, 'Typha angustufolia', 'Vivace pouvant atteindre 2 m de hauteur, feuilles glauques, d’une largeur 4-10 mm, planes ou un peu concaves sur la face interne, épis mâles et femelles distants 3-5 cm.', '(Photo. Wikimedia - CC BY-NC 3.0)', '25.jpg', ''),
	(28, 4, 'Juncus acutus', 'Vivace, rhizome épais, tiges densément, cespiteuses, très raides.', '(Photo. M. Aourir)', '26.jpg', ''),
	(29, 4, 'Tamarix gallica', 'Arbuste de 2-6 m, à feuilles en écailles acuminées, à inflorescences terminales, à fleurs petites globuleuses dans le bourgeon.', ' (Photo. M. Aourir)', '27.jpg', ''),
	(30, 4, 'Phragmites altissima', 'Arbuste haut de 2 à 10m, d’un vert gai et très rameux se présente en « forêt » clair.', ' (Photo. M. Aourir)', '28.jpg', ''),
	(31, 4, 'Sueada vera', 'Arbrisseau de 20 à 70 cm, dressé à tiges jeunes blanchâtres et très rameuses. L’inflorescence raide dressée et les fleurs petites (1-1,5 mm de diamètre). Sur le site de Massa, cette plante halophile fleurit entre mars-septembre, après les pluies.', '( Photo. H. Bakali. CC BY-NC 4.0)', '29.jpg', ''),
	(32, 4, 'Frankenia sp', 'D’une hauteur de 30 à 40 cm, cette plante vivace en touffe plate, étalée ou rampante couvre le sol et présente de petites feuilles persistantes linéaires de couleur vert sombre. Elle produit d’abondantes fleurs roses en avril-mai. (Photo. A. El Aboudi.', '(Photo. A. El Aboudi. CC BY-NC 4.0)', '30.jpg', ''),
	(94, 1, '', '', '', '', 'red');

-- Dumping structure for table app.localisation
CREATE TABLE IF NOT EXISTS `localisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pinmap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table app.localisation: ~1 rows (approximately)
INSERT INTO `localisation` (`id`, `title`, `subtitle`, `description`, `pinmap`, `image`) VALUES
	(1, 'Ma Position', 'Activie le service GPS sur votre telephone', '', '45.521563, -122.677433', '');

-- Dumping structure for table app.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table app.pages: ~4 rows (approximately)
INSERT INTO `pages` (`id`, `page`, `title`, `subtitle`, `description`, `icon`, `image`) VALUES
	(1, 'intro', 'PNSM', 'Parc national de Sous Massa', 'Le parc est considéré comme un patrimoine naturel préservé, caractérisé par une faune et flore diversifiée.', '', 'intro.jpg'),
	(2, 'presentation', 'Présentation du Parc', 'Parc national Sous Massa', 'Le Parc National de Souss Massa s\'étend sur une superficie de 34 000 ha, entre l\'oued Souss au Nord et Sidi Moussa Aglou (Tiznit) au Sud.  Il constitue une bande côtière ...', '', 'parc-1.jpg'),
	(3, 'localisation', 'Localisation', 'Ma localisation GPS', 'Activie le service GPS sur votre telephone', 'icon-localisation.svg', ''),
	(4, 'circuits', 'Circuits', 'Circuit ornithologique', '', 'icon-circuit.svg', '');

-- Dumping structure for table app.presentation
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table app.presentation: ~2 rows (approximately)
INSERT INTO `presentation` (`id`, `title`, `subtitle`, `description`, `image`) VALUES
	(1, 'Le parc en général', '', 'Le Parc National de Souss Massa s’étend sur une superficie de 34 000 ha, entre l’oued Souss au Nord et Sidi Moussa Aglou (Tiznit) au Sud. Il constitue une bande côtière d’une longueur de 65 km et d’une largeur moyenne de 5 km. Ce parc protège des milieux continentaux et marins. Le Parc National de Souss Massa tient son importance, depuis sa création en 1991, de la diversité de ses biotopes, la richesse et l\'originalité de sa faune et de sa flore. Il abrite plus de 275 espèces d’Oiseaux dont la dernière population mondiale d\'Ibis chauve, 46 espèces de Mammifères, 40 espèces de Reptiles et Amphibiens et 9 espèces de poissons et de nombreuses espèces d’Insectes, notamment des lépidoptères. Le Parc renferme deux zones humides d’importance mondiale qui sont classées comme sites RAMSAR. Il s’agit des embouchures des oueds Souss et Massa. Ces deux zones représentent des espaces d’importance internationale pour 70 espèces d’oiseaux migrateurs. Elles sont situées sur leur voie de migration le long de la côte atlantique marocaine.', 'parc-a.jpg'),
	(2, 'L\'embouchure de Massa', '', 'L’embouchure de l’oued Massa est la partie la plus intéressante du PNSM en termes de biodiversité. C’est une zone marécageuse d’eau douce à saumâtre, entourée d’une végétation luxuriante et offrant à la faune des habitats très favorables. Le site accueille une trentaine d’espèces d’oiseaux d’eau, en hivernage, dont certaines sont parmi les plus rares et remarquables ; Les spatules blanches et les flamants roses fréquentent régulièrement les eaux saumâtres. Les grues cendrées connaissent dans ce site la station la plus méridionale pour leur hivernage. La sarcelle marbrée, espèce vulnérable au niveau mondiale, trouve dans le site un lieu de reproduction et un quartier d’hivernage avec une importante concentration de plus de 350 oiseaux, constituant un événement rare.\r\nLe site accueille également des espèces parmi les plus menacées du monde, telles que l’Ibis chauve (espèce emblématique du PNSM) en danger d’extinction à l’état sauvage.', 'parc-b.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
