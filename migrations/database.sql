-- phpMyAdmin SQL Dump


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `title`, `content`, `created_at`, `category_id`, `image`) VALUES
(1, 'sortie réussie dans l’espace pour Thomas Pesquet', 'L’astronaute français Thomas Pesquet a regagné sans encombre dimanche 20 juin l’intérieur de la Station spatiale internationale (ISS) après une nouvelle sortie dans l’espace de plus de six heures, consacrée à l’installation de nouveaux panneaux solaires sur l’ISS.\r\n\r\nC’est la quatrième sortie de Thomas Pesquet dans l’espace, et la deuxième lors de cette mission, menée avec son coéquipier américain Shane Kimbrough. A 11 h 42 GMT, les deux hommes, arrivés à bord de la Station à la fin d’avril, ont mis en route la batterie interne de leur combinaison, puis ont ouvert l’écoutille du sas de décompression de l’ISS.', '2021-06-21 10:44:44', 4, 'la-nasa-quiere-aliarse-contra-el-cambio-climatico-334891-1-76860fa94297ba2b.jpeg'),
(2, 'Euro 2021', 'Dans un groupe B très ouvert, le Danemark va tenter de grappiller ses premiers points dans cet Euro face à la Russie. Auteurs d’une très belle prestation contre la Belgique malgré la défaite, les coéquipiers de Christian Eriksen, qui est sorti de l’hôpital après son malaise cardiaque, peuvent toujours espérer se qualifier. Mais cela passe forcément par une victoire contre la Russie. Dans l’autre match du groupe, la Belgique (6 points) affronte la Finlande (3 points), qui peut, elle aussi, espérer se qualifier.\r\n\r\nDans le groupe C, la deuxième place se jouera entre l’Autriche et l’Ukraine, qui possèdent chacune trois points. Un match nul et ce sont les joueurs d’Andreï Chevtchenko qui valideraient leur billet pour les huitièmes. Dans l’autre match du groupe, les Pays-Bas, assurés de finir premiers, pourront faire tourner l’effectif face à la Macédoine (0 point).', '2021-06-02 10:46:36', 3, 'foot60fa96f1132f6.jpeg'),
(3, 'Lutte contre le réchauffement climatique : comment l’Agence internationale de l’énergie s’est convertie à la neutralité carbone', '« Ce n’est pas nous qui le disons, ni même les scientifiques… C’est l’Agence internationale de l’énergie ! » Il y a quelques semaines encore, la « caution » Agence internationale de l’énergie (AIE) était brandie par des compagnies pétrolières pour justifier de nouveaux projets. Désormais, c’est par des militants pour le climat prônant la fin de l’industrie fossile que l’argument est utilisé. Un virage à 180 degrés, à la mesure de la mutation opérée par l’organisation dépendant de l’Organisation de coopération et de développement économiques (OCDE).\r\n\r\nLe 26 mai, l’AIE a publié un rapport qui détaille l’une des trajectoires possibles pour parvenir à la neutralité carbone d’ici à 2050 et ainsi limiter le réchauffement planétaire à 1,5 °C. Un document qui « bouleverse le monde de l’énergie », selon les mots de l’hebdomadaire américain Times. Créée en 1974 par les Etats-Unis et leur secrétaire d’Etat de l’époque, Henry Kissinger, peu après l’embargo des pays arabes, l’agence avait pour mission de défendre les intérêts des pays importateurs d’or noir. Elle affirme désormais que les investissements dans de nouvelles installations pétrolières et gazières doivent cesser. Non pas au cours de la prochaine décennie, mais dès aujourd’hui.\r\nPublié en pleine période d’assemblées générales des majors du pétrole, ce scénario décrit un système énergétique dominé par le photovoltaïque et dans lequel 90 % de l’électricité est issue de sources renouvelables. Il pose aussi une série de jalons pour atteindre cet horizon en moins de trente ans, comme l’interdiction des ventes de chaudières au fioul et de voitures à moteur thermique, ou le développement des lignes de train à grande vitesse.', '2021-07-14 10:47:45', 1, 'carbone614db19f92092.jpeg'),
(4, 'La Guinée a officiellement vaincu le virus Ebola', 'Quelques mois après la réapparition du virus Ebola en Guinée, l’Organisation mondiale de la santé (OMS) et le ministre de la santé guinéen ont officiellement annoncé, samedi 19 juin, la fin de la deuxième vague d’Ebola dans ce pays. L’épidémie est partie de la Guinée forestière, comme en 2013-2016, période durant laquelle le virus avait fait plus de 11 300 morts, principalement en Guinée (2 500 morts), au Liberia et en Sierra Leone, trois des pays les plus pauvres du monde.\r\n\r\nAprès la détection des premiers cas à Gouécké, dans la préfecture de Nzérékoré, au début de 2021, « les autorités sanitaires nationales ont rapidement mis en œuvre la riposte, avec le soutien de l’OMS et ses partenaires, en s’appuyant sur l’expertise accumulée » dans la lutte contre Ebola dans le pays et en République démocratique du Congo, selon un communiqué de l’OMS publié samedi. Seize cas confirmés et sept cas probables ont été recensés. Onze patients ont survécu et douze sont morts, poursuit l’organisation internationale.\r\n\r\nLe dernier cas guéri déclaré remonte au 8 mai, a affirmé un responsable du ministère de la santé. Selon les règles internationales, l’épidémie est donc circonscrite, après avoir atteint vendredi les quarante-deux jours sans nouveau cas, soit deux fois la durée maximale d’incubation.\r\nEn 2021, grâce notamment à « une implication de la communauté, des mesures de santé publique efficaces et une utilisation équitable des vaccins, la Guinée a réussi à contrôler l’épidémie et à prévenir sa propagation au-delà des frontières », a déclaré le directeur général de l’OMS, Tedros Adhanom Ghebreyesus. L’OMS dit avoir aidé à expédier environ 24 000 doses de vaccin et avoir soutenu la vaccination de près de 11 000 personnes à haut risque, parmi lesquelles plus de 2 800 travailleurs de santé en première ligne.', '2021-06-18 10:50:11', 2, 'ebola-vaincue614db05649478.jpeg'),
(20, 'DISNEYLAND PARIS FÊTE SON 30E ANNIVERSAIRE', '30 ans, ça se fête ! À l\'occasion de son 30e anniversaire, qui débute dans ses parcs dès le 6 mars 2022, Disneyland Paris met les petits plats dans les grands et promet une programmation à la hauteur de l\'événement.\r\nFans de Disney, préparez-vous à un anniversaire unique en son genre ! Disneyland Paris fête officiellement son 30e anniversaire dès le 6 mars 2022 et promet tout un tas de surprises pour les visiteurs venant séjourner sur le resort ou passer la journée dans les parcs. \r\nPour son 30e anniversaire, Disneyland Paris entend donc marquer le coup avec tout un tas de surprises, mettant à l\'honneur \"le passé enchanteur et l\'avenir prometteur de la destination\", tout en invitant les visiteurs \"à entrer dans une nouvelle ère scintillante, où ils rêveront plus grand et riront plus fort\". Au programme donc, de \"nouvelles expériences conçues sur mesure\" au sein du parc Disneyland Paris, du parc Walt Disney Studios et de l\'ensemble du resort. À noter que les cast members seront particulièrement à l\'honneur à l\'occasion de ce 30e anniversaire.\r\n\r\nEt concernant le détail de cette programmation spéciale, il faudra attendre encore un peu. En revanche, on peut espérer une ouverture, officielle, d\'Avengers Campus pendant cet anniversaire, les travaux ayant pris du retard en raison de la crise sanitaire. Une ouverture qui, si l\'on en croit l\'avancée des travaux, pourrait arriver courant 2022. Une belle façon de célébrer, quoiqu\'on en pense, cet anniversaire si particulier pour la destination. On se programme un week-end, les amis ?', '2021-09-15 12:06:19', 2, 'disneyland614db12b4c727.jpeg'),
(21, 'Les grands événements sportifs de l’année 2021', 'Après de nombreux reports en raison du coronavirus, le calendrier de l’année sportive s’annonce très riche en 2021, avec notamment l’Euro de foot et les Jeux olympiques de Tokyo. Certaines dates pourraient toutefois changer en fonction de l’évolution de la situation sanitaire.\r\nUne année impaire avec un Euro et des Jeux olympiques, c’est du jamais vu depuis des décennies. En raison du coronavirus, les deux compétitions phares de 2020 ont en effet été reportées et se tiendront l’été prochain. Certains événements pourraient également être décalés en fonction de la situation sanitaire, alors que le retour du public dans les stades et les salles du monde entier ne se fait pour l’instant qu’avec parcimonie. Europe 1 vous donne la liste des grands rendez-vous sportifs de l’année 2021.\r\n\r\nFÉVRIER 2021\r\n8 février : Open d\'Australie (jusqu\'au 21). Comme d’habitude, le premier tournoi du Grand Chelem de l’année en tennis aura lieu à Melbourne. Mais contrairement à d\'habitude, pandémie oblige, il se tiendra en février et non en janvier. Le Serbe Novak Djokovic et l’Américaine Sofia Kenin en sont les tenants du titre.\r\n8 février : championnats du monde de ski alpin. Les meilleurs skieurs de la planète auront rendez-vous à Cortina d’Ampezzo, en Italie. Le clan français avait décroché trois médailles en 2019, dont une en or pour Alexis Pinturault.\r\n\r\nAVRIL 2021\r\n13 avril : finales de la Fed Cup (jusqu\'au 18). Cette Fed Cup nouvelle formule va se tenir sur une semaine à Budapest, en Hongrie. Les Françaises, qui avaient réalisé un immense exploit en finale en Australie en 2019, vont remettre leur titre en jeu.\r\n\r\nMAI 2021\r\n23 mai : Roland-Garros (jusqu\'au 6 juin). Décalé en septembre en 2020, le tournoi de Roland-Garros espère se dérouler fin mai, comme lors d’une année \"normale\". Pour Rafael Nadal, peu importe le contexte, il reste le roi incontesté de la terre battue. Et s’il remportait le tournoi parisien pour la 14e fois ?\r\nFinale de la Ligue des champions : le Bayern Munich, impressionnant vainqueur l’an passé après avoir battu le PSG en finale (1-0), devrait encore une fois faire partie des prétendants à la victoire. La finale aura lieu à Istanbul, à une date qui reste à déterminer.\r\n\r\nJUIN 2021\r\n11 juin : coup d’envoi de l’Euro de foot. Prévu sur tout le continent, le championnat d’Europe de football va se tenir après un report d’un an. L’UEFA pourrait cependant décider de réduire le nombre de pays organisateurs, en fonction de l’évolution de la situation sanitaire.\r\n\r\n12 juin : Copa America (jusqu\'au 12 juillet). Le gratin du foot sud-américain se retrouvera en Colombie, deux ans après la victoire du Brésil.\r\n\r\n26 juin : départ du Tour de France (jusqu\'au 18 juillet). Initialement prévu à Copenhague, le Grand Départ aura finalement lieu à Brest, en raison du coronavirus. Le jeune prodige slovène Tadej Pogacar, incroyable vainqueur l’an passé, devrait être en lice pour le doublé.\r\n\r\n28 juin : tournoi de Wimbledon (jusqu\'au 11 juillet). Le plus prestigieux tournoi du Grand Chelem, annulé l’an passé en raison du coronavirus, devrait être de retour en 2021. Du gazon, du beau jeu : c’est tout ce qu’on espère.\r\n\r\nJUILLET 2021\r\n11 juillet : finale de l’Euro de foot. Pas la peine de vous rappeler que le Portugal avait battu les Bleus en finale au Stade de France en 2016… Les champions du monde vont-ils prendre leur revanche ? Il faudra, avant d’y penser, survivre à un premier tour terrible, dans le groupe de l’Allemagne, de la Hongrie et… du Portugal.\r\n\r\n23 juillet : cérémonie d’ouverture des Jeux Olympiques d\'été. Reportés en raison de la pandémie, les JO se déroulent comme prévu à Tokyo. En revanche, de nombreuses incertitudes demeurent, notamment sur la présence ou non de spectateurs.\r\n\r\nAOÛT 2021\r\n8 août : cérémonie de clôture des JO de Tokyo. Après la capitale japonaise, les JO auront lieu à Paris en 2024.\r\n\r\n30 août : début de l’US Open (jusqu’au 12 septembre). L’édition 2020 de l’US Open avait été chaotique, avec de nombreux incidents liés à la \"bulle sanitaire\" décrétée pour lutter contre le coronavirus. La levée 2021 du tournoi du Grand Chelem devrait être plus sereine, alors que Dominic Thiem chez les hommes et Naomi Osaka chez les femmes remettront leurs titres en jeu.\r\n\r\nSEPTEMBRE 2021\r\n18 septembre : coupe du monde de rugby féminin (finale le 16 octobre). La Coupe du monde de rugby féminin va se disputer en Nouvelle-Zélande, sur près d’un mois. Les Françaises espèrent parvenir à enfin briser leur plafond de verre, eux qui se sont qualifiées à sept reprises en demi-finales (sur 8 éditions !) sans parvenir à aller en finale.\r\n\r\n24 septembre : Ryder Cup (jusqu\'au 26). Trois ans après la victoire de l’Europe sur le Golf national de Saint-Quentin-en-Yvelines, en France, l’édition 2021 de la compétition créée en 1927 aura lieu aux États-Unis. Des Américains qui espèrent bien prendre leur revanche.', '2021-01-02 12:14:24', 3, 'sport614db3104d83d.jpeg'),
(22, 'La découverte d’empreintes humaines vieilles de 23 000 ans réécrit l’histoire du peuplement de l’Amérique', 'Des traces de pas datant d’environ 23 000 ans ont été découvertes dans le sud-ouest des Etats-Unis, révèle une étude jeudi 23 septembre, suggérant que le peuplement de l’Amérique du Nord par l’espèce humaine était déjà entamé bien avant la fin du dernier âge de glace, censée avoir permis cette migration. Ces empreintes de pas ont été laissées à l’époque dans la boue des berges d’un lac aujourd’hui asséché qui a cédé la place à un désert de gypse blanc situé au Nouveau-Mexique, dans le parc national de White Sands.\r\n\r\nAvec le temps, les sédiments ont comblé les empreintes et ont durci, les protégeant jusqu’à ce que l’érosion dévoile de nouveau ces témoignages du passé, pour le plus grand plaisir des scientifiques. « De nombreuses traces semblent être celles d’adolescents et d’enfants ; les grandes empreintes de pas d’adultes sont moins fréquentes », écrivent les auteurs de l’étude publiée dans la revue américaine Science. Des traces d’animaux, mammouths et loups préhistoriques ont également été identifiées. Certaines, comme celles de paresseux géants, sont même contemporaines et voisines d’empreintes humaines sur les bords du lac.\r\nAu-delà de l’émotion et de l’anecdote, la découverte est déterminante pour le débat qui fait rage sur les origines de l’arrivée d’Homo sapiens en Amérique, le dernier continent peuplé par notre espèce. Car la datation de traces de White Sands « signifie que des humains étaient présents dans le paysage voici au moins 23 000 ans, avec des preuves d’occupation s’étendant approximativement sur deux millénaires », souligne l’étude.\r\n\r\nLa théorie du détroit de Béring remise en cause\r\nPendant des décennies, la thèse la plus communément acceptée a été celle d’un peuplement provenant de Sibérie orientale : nos ancêtres auraient franchi un pont terrestre – l’actuel détroit de Béring – pour débarquer en Alaska, puis se répandre plus au sud. Des preuves archéologiques, dont des pointes de lance servant à tuer les mammouths, ont longtemps suggéré un peuplement vieux de 13 500 ans associé à une culture dite « de Clovis » – du nom d’une ville du Nouveau-Mexique –, considérée comme la première culture américaine, d’où sont issus les ancêtres des Amérindiens.', '2021-09-23 12:16:30', 4, 'f0b42a1-de4d44cfc5364a80ab50c9754ddd3f08-de4d44cfc5364a80ab50c9754ddd3f08-0614db38eb766a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `label` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `label`) VALUES
(1, 'nature'),
(2, 'international'),
(3, 'sport'),
(4, 'science');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `content`, `created_at`, `article_id`, `user_id`) VALUES
(4, 'vive la science !!', '2021-06-22 14:12:01', 4, 0),
(6, 'Enfin !! vive la science :)', '2021-06-23 14:14:29', 4, 3),
(7, 'Allez les sportifs !!', '2021-09-24 12:24:00', 21, 8),
(8, 'happy birthday disneyland :D', '2021-09-24 12:24:57', 20, 9),
(9, 'merci à la vaccination', '2021-09-24 12:30:02', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `email`, `password`, `created_at`, `role`) VALUES
(3, 'rokridi', 'landolsi', 'a@f.fr', '$2y$10$uBq7rqWkHDxY3SEdyzmNnu29HJgzFDbZOkxLp1o6LCbJg83sku/Ga', '2021-06-22 16:53:44', 'ROLE_USER'),
(8, 'Hela', 'Chatti', 'admin@admin.com', '$2y$10$0uzQqWswnnULNErTaBVskunzghomKuXoTLx7htCz8gW6zWz80Y.ze', '2021-07-23 14:44:24', 'ROLE_ADMIN'),
(9, 'Lina', 'Chatti', 'loulou@gmail.com', '$2y$10$wzp5h0n0ChCKCNukL8IwjuGUduJcco3jX955YaGzQLBdZhYCcZtsu', '2021-09-23 14:21:33', 'ROLE_USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
