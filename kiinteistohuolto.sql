-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2023 at 09:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiinteistohuolto`
--

-- --------------------------------------------------------

--
-- Table structure for table `asukas`
--

CREATE TABLE `asukas` (
  `asukasID` int(11) NOT NULL,
  `asukasnimi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rooliID` int(11) NOT NULL,
  `asukassposti` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `asukassalasana` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `asukaspuhnro` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `taloyhtioID` int(11) NOT NULL,
  `huoneisto` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asukas`
--

INSERT INTO `asukas` (`asukasID`, `asukasnimi`, `rooliID`, `asukassposti`, `asukassalasana`, `asukaspuhnro`, `taloyhtioID`, `huoneisto`) VALUES
(6, 'Alava Katja', 1, 'alava.katja@viiriainen.com', '$2y$10$fVq5McfJNj1lCpkM.Tvas.LMQCbYt2hIepx201IUNMVkMG6xr85t2', '+358409283904', 1, 'A2'),
(7, 'Ahvenjärvi Jouni', 1, 'ahvenjarvi.jouni@viiriainen.com', '$2y$10$/xCwfePFUjESMcg7NevSxu1.QTzL6wOp9XfFnOKoabg2nfG0tMuwS', '+35840958234', 1, 'A1'),
(8, 'Häyrinen Tommi', 1, 'hayrinen.tommi@viiriainen.com', '$2y$10$C5PkRcJ.0U/iYgWQux0pJul9mIb4XiLWNTmEXSHc9EfDAfKG9rYYG', '+358509483723', 1, 'A3'),
(9, 'Barck Milan', 1, 'barck.milan@viiriainen.com', '$2y$10$cfLTdVCPel/V3LbpRASrMeABEg5WQ2btt9ClaifkHJGBHJLnlhr.q', '+35840293823', 1, 'A4'),
(10, 'Hakala Olavi', 1, 'hakala.olavi@viiriainen.com', '$2y$10$ZdqmhibzsjbX6z2YOIpXqeJtCU6Bwlkm7yV.h7oEROgO1N33Kpxkm', '+35840958372', 1, 'A5'),
(11, 'Hakala Kirsti', 1, 'hakala.kirsti@viiriainen.com', '$2y$10$hTUbIWSVDsz/nynMgV3mHexwZHa3nZIENa0GYG8wUKOfX.NG1T1d6', '+35850493821', 1, 'A5'),
(12, 'Kauhanen Herman', 1, 'kauhanen.herman@viiriainen.com', '$2y$10$qu6hGH1VVrar3yAG6nyqNOSw18hI/kIADjAYdGPMrN12WzySA6eKS', '+35840993827', 1, 'B1'),
(13, 'Korpela Hannaleena', 1, 'korpela.hannaleena@viiriainen.com', '$2y$10$pkSslnzb/qbEDFVJWkGXYOXB9gYykMtpnjbXtAjfK8MyV0IV51B5.', '+35840193823', 1, 'B2'),
(14, 'Kosunen Jaakko', 1, 'kosunen.jaakko@viiriainen.com', '$2y$10$sJKsiLjHTBdUZGcx9nb.puSaT6aaEj.HAGty5D6Y2c.S2ytBEWYKO', '+358504839182', 1, 'B3'),
(15, 'Kopra Markku', 1, 'kopra.markku@viiriainen.com', '$2y$10$h3IaSWOOZRpW/hcKxW6H0eTGfBTpARXk0Tup/ze/6wQPdsrWK.3jy', '+35845039238', 1, 'B4'),
(16, 'Laine Saara', 1, 'laine.saara@viiriainen.com', '$2y$10$XNF2L2/uusH0O0xCcSRxKekXA9sAsN/YXdvE0Dk.ar96FToDq4mUC', '+35845029381', 1, 'B5'),
(17, 'Virtanen Tuula', 1, 'virtanen.tuula@teeri.com', '$2y$10$PcxVfypMZkT7rtVCYBQqCuy0U1RabmT55Bn8XpSU15r78Tct7cXD.', '+358504934133', 2, 'A1'),
(18, 'Virtanen Antti', 1, 'virtanen.antti@teeri.com', '$2y$10$CbRrgG0C7JN/dk9fx6T6c.dlMLiNXtrnlgS5CiCnDxsRmaFj5Yl66', '+3584509281', 2, 'A1'),
(19, 'Salmela Timo', 1, 'salmela.timo@teeri.com', '$2y$10$SZKo365zvBz0DKrlbXP9C.Q6HmlvanzzU1gxnQWgVKWutDadkOpGO', '+35845992382', 2, 'A2'),
(20, 'Skog Jesse', 1, 'skog.jesse@teeri.com', '$2y$10$SJ3JPPGPC6gOljXYSEecteiRD0D/hliWq1Cnlcr9Hd/gKqExNiiJ.', '+35845009238', 2, 'A3'),
(21, 'Närhi Harri', 1, 'narhi.harri@teeri.com', '$2y$10$1zxpE87JxCVDUECZEO80.ePSN7gB6UNpEOLtUa2B8NF/Oqsfju466', '+35840958222', 2, 'B1'),
(22, 'Närhi Lotta', 1, 'narhi.lotta@teeri.com', '$2y$10$EO9l9Z/UxF941QoFz/Tz6OnIB4cO8DnqGcARtDxciXNlnq/LPOt6q', '+35845019222', 2, 'B1'),
(23, 'Sipola Jaakko', 1, 'sipola.jaakko@teeri.com', '$2y$10$KQlNWrvFIEpsAmNwQCSwn.OzxOR72fdJWdmuqsFTtS3blergtaxjS', '+35845559232', 2, 'B2'),
(24, 'Soini Riitta', 1, 'soini.riitta@teeri.com', '$2y$10$fORJ6TSEtlgyStupvsOf9.GpaztcDRI1iFV.czcdRCF46P8ttpv8u', '+35850553432', 2, 'B3'),
(25, 'Bauer Jack', 1, 'bauer.jack@teeri.com', '$2y$10$R41EInMukNaoTzFwxAAYlebS4FwzLp8EsNw4eZna416O6QbxqXPpK', '+35850499932', 2, 'B4'),
(26, 'Vuorinen Mari', 1, 'vuorinen.mari@teeri.com', '$2y$10$Xf1wW1Wvnz.IpC3rp73I4el3scNVI8i2hEj3XF6wu/Hr/HguW8Uu2', '+35850443342', 2, 'B5'),
(27, 'Kämäräinen Anni', 1, 'kamarainen.anni@kuikka.com', '$2y$10$OaNkqiVnEFL/plMhxQNtfO.AKu6vnz6tQbeOK79nxuk2gHK9ZjImu', '+358503323948', 3, 'A1'),
(28, 'Kauhanen Mirja', 1, 'kauhanen.mirja@kuikka.com', '$2y$10$gojeM7ieXPjo.otByf/iIOXoBoopoNUghDKnKdUR0c..0VRlwk.kq', '+35845999342', 3, 'A2'),
(29, 'Kauhanen Esko', 1, 'kauhanen.esko@kuikka.com', '$2y$10$Pt7.JyiYm/1X.Vknb0.gTe741YEtcfv95eHtqS1yBJRA0Y0v6SjkO', '+35840992232', 3, 'A2'),
(30, 'Reid Jacqueline', 1, 'reid.jacqueline@kuikka.com', '$2y$10$ZrzZ29IoNDk4.qbb3C3Ly.YgXyk2OP5AnJ0Zqp2mMBGHgYwtjUyVy', '+35845029382', 3, 'A4'),
(31, 'Mack Karsyn', 1, 'mack.karsyn@kuikka.com', '$2y$10$yFkQlzi8HwRLoyhjTNZnM.1dfevSNVZfW4OUeTQAIDeuQzRtPg43.', '+35850999283', 3, 'A5'),
(32, 'Penttinen Jorma', 1, 'penttinen.jorma@kuikka.com', '$2y$10$wUdIuBSIIVUqV7tanAxsKuf.kpyoxUzAomujFX0p9g1oVpJLGTxsW', '+35845012232', 3, 'A6'),
(33, 'Raijanen Ritva', 1, 'raijanen.ritva@kuikka.com', '$2y$10$ZOaOIxBmF20ijvfBXV/cuOw.vtbEG3vTwo9/FxzzsHM8ufErt6vY.', '+35845012223', 3, 'A7'),
(34, 'Raijanen Teppo', 1, 'raijanen.teppo@kuikka.com', '$2y$10$TIPDwOY8t9Y./MRKeiSp1eVu9wVRLuupGINPxJBGBJpniOADMgYX2', '+35850394823', 3, 'A7'),
(35, 'Isometsä Jyri', 1, 'isometsa.jyri@kuikka.com', '$2y$10$9VkPeHUNsw8Et3QlQ7qAC.l4x.KmzEJ2JuB3ijm/q0o5t/LHwX6tG', '+35850492833', 3, 'A8'),
(36, 'Bergbom Taina', 1, 'bergbom.taina@kuikka.com', '$2y$10$g8PATcVLS1nivFPQOJACveLeYNvhelDrx/T8.QH9RmolMktLq6YAa', '+35850555334', 3, 'A9'),
(37, 'Bergbom Kasper', 1, 'bergbom.kasper@kuikka.com', '$2y$10$gEK.mUghPWWBWxvJGF8LDerfhwdRZYpgc5KOf24xUcxM2lVCG1gm.', '+35840222394', 3, 'A9'),
(38, 'Itkonen Elsa', 1, 'itkonen.elsa@kottarainen.com', '$2y$10$F7nhYh5brA6ac6l0AqtprekMz.vJgc03usTCV06In5H6Nbl7EQvO2', '+35850344423', 4, 'A1'),
(39, 'Korpela Paavo', 1, 'korpela.paavo@kottarainen.com', '$2y$10$QpisHdjPkfrSZef58albiuJ6/.Baz0uAqDxHESdzVGCb02ez/d4pu', '+35850112339', 4, 'A2'),
(40, 'Koponen Paula', 1, 'koponen.paula@kottarainen.com', '$2y$10$PdlAzrcwOEjgUSA/OrdVaebW5I/NQ3DvfchaCLvqIHnbnvHBv8QHq', '+35850443423', 4, 'A2'),
(41, 'Tienhaara Atso', 1, 'tienhaara.atso@kottarainen.com', '$2y$10$/eUVUKUzS/yfprRnp9Z90eXpeYYpKPx3dqKN/zDmJ76z0yH5PZtMq', '+35850921323', 4, 'A3'),
(42, 'Tiihonen Jari', 1, 'tiihonen.jari@kottarainen.com', '$2y$10$UsIK0M/39P3PS008KvTHWedTmZnwsxdAfwkYOmWsses6poonDFll6', '+3581032938', 4, 'A4'),
(43, 'Isokari Tommi', 1, 'isokari.tommi@kottarainen.com', '$2y$10$V8TUoEUMeUSacBDyOKbw/O5pYiq/iudvZ1GH7pHPh6DaoEemApY/u', '+35822302492', 4, 'B1'),
(44, 'Nicholson Jack', 1, 'nicholson.jack@kottarainen.com', '$2y$10$ypw5/sVcl6YKrP7M95doVOR2TK2lUrRyIfiyJD9j7tV5iW2.6TVwK', '+358503324434', 4, 'B2'),
(45, 'Uusivirta Kalevi', 1, 'uusivirta.kalevi@kottarainen.com', '$2y$10$YT5hKudsWT.8oFLLqEFScOSr.IecTbng5E9LMaljwo4EruvQxoOcm', '+35840233132', 4, 'C1'),
(46, 'Virtanen Maija', 1, 'virtanen.maija@kottarainen.com', '$2y$10$Ipd.30nLI2.QpUhA1TJ62ezj2ClWRz6kCT6IYGMqvjM7/AozHjr82', '+358504910239', 4, 'C2'),
(47, 'Penttilä Jarmo', 1, 'penttila.jarmo@teeri.com', '$2y$10$Mcd.E7sjl8iM7AzqCAxAdObtSwkOYgmq7Th20/.TuZe87OU4vt53G', '+35845819232', 2, 'B6');

-- --------------------------------------------------------

--
-- Table structure for table `isannoitsija`
--

CREATE TABLE `isannoitsija` (
  `isannoitsijaID` int(11) NOT NULL,
  `rooliID` int(11) NOT NULL,
  `isannoitsijanimi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isannoitsijasposti` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isannoitsijasalasana` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isannoitsijapuh` varchar(50) NOT NULL,
  `taloyhtioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `isannoitsija`
--

INSERT INTO `isannoitsija` (`isannoitsijaID`, `rooliID`, `isannoitsijanimi`, `isannoitsijasposti`, `isannoitsijasalasana`, `isannoitsijapuh`, `taloyhtioID`) VALUES
(3, 4, 'Isännöitsijä Viiriäinen', 'isannoitsija@viiriainen.com', '$2y$10$pEH0Cjvl1SoCuvV4fU4F/.BZAxqXTaIAAcBsN7LGPb9D.ZB9Jc9e6', '+35833442423', 1),
(4, 4, 'Isännöitsijä Teeri', 'isannoitsija@teeri.com', '$2y$10$MmBK5uSyqKkLU4gPRinUG.qJtQc4ggM2.C.lJXqXm6quHtAx3IS0y', '+358504392382', 2),
(5, 4, 'Isännöitsijä Kuikka', 'isannoitsija@kuikka.com', '$2y$10$wT4brDpklDt.0QG0T6XFEOVM1zbq3CtoW2VmheJIZIHc4TIgGWzZ.', '+35812302394', 3),
(6, 4, 'Isännöitsijä Kottarainen', 'isannoitsija@kottarainen.com', '$2y$10$aUnXJ.JesO4CTdjk7iOnjO8OLtE5wQzO/DskchietT/JptRs9wfQ2', '+358402933321', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kaytettavyys`
--

CREATE TABLE `kaytettavyys` (
  `kaytettavyysID` int(11) NOT NULL,
  `kaytettavyys` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kaytettavyys`
--

INSERT INTO `kaytettavyys` (`kaytettavyysID`, `kaytettavyys`) VALUES
(1, 'kaytettavissa'),
(2, 'keikalla'),
(3, 'tauolla'),
(4, 'poissa');

-- --------------------------------------------------------

--
-- Table structure for table `roolit`
--

CREATE TABLE `roolit` (
  `rooliID` int(11) NOT NULL,
  `rooli` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roolit`
--

INSERT INTO `roolit` (`rooliID`, `rooli`) VALUES
(1, 'Asukas'),
(2, 'Tyontekija'),
(3, 'Tyonjohtaja'),
(4, 'Isännöitsijä');

-- --------------------------------------------------------

--
-- Table structure for table `talotyyppi`
--

CREATE TABLE `talotyyppi` (
  `talotyyppiID` int(11) NOT NULL,
  `talotyyppi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `talotyyppi`
--

INSERT INTO `talotyyppi` (`talotyyppiID`, `talotyyppi`) VALUES
(1, 'Rivitalo'),
(2, 'Kerrostalo'),
(3, 'Paritalo'),
(4, 'Omakotitalo');

-- --------------------------------------------------------

--
-- Table structure for table `taloyhtio`
--

CREATE TABLE `taloyhtio` (
  `taloyhtioID` int(11) NOT NULL,
  `taloyhtionnimi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `talotyyppiID` int(11) NOT NULL,
  `osoite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taloyhtio`
--

INSERT INTO `taloyhtio` (`taloyhtioID`, `taloyhtionnimi`, `talotyyppiID`, `osoite`) VALUES
(1, 'Viiriäinen', 2, 'Viiriäisenkatu'),
(2, 'Teeri', 1, 'Teeritie'),
(3, 'Kuikka', 4, 'Kuikkatie'),
(4, 'Kottarainen', 3, 'Kottaraisenkatu');

-- --------------------------------------------------------

--
-- Table structure for table `tila`
--

CREATE TABLE `tila` (
  `tila` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tyontekija`
--

CREATE TABLE `tyontekija` (
  `tyontekijaID` int(11) NOT NULL,
  `tyontekijanimi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tyontekijapuhnro` varchar(20) NOT NULL,
  `tyontekijasposti` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tyontekijasalasana` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kaytettavyysID` int(11) NOT NULL,
  `rooliID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tyontekija`
--

INSERT INTO `tyontekija` (`tyontekijaID`, `tyontekijanimi`, `tyontekijapuhnro`, `tyontekijasposti`, `tyontekijasalasana`, `kaytettavyysID`, `rooliID`) VALUES
(12, 'William Lönnberg', '+3585023948443', 'william.lonnberg@kiinteistohuolto.com', '$2y$10$Otov9.KiiRDaaPiUnk2dMO8O67jrFVAnvYS7FuF4ZT0we/6XIKUdu', 1, 2),
(13, 'Joonas Piispanen', '+358402234234', 'joonas.piispanen@kiinteistohuolto.com', '$2y$10$sgTTlphU2vme7RXPGY5doe43/BNBOoilNnMtMf0lBgS7MyNPn90RG', 3, 2),
(15, 'Työnjohto', '+35811122343', 'tj@kiinteistohuolto.com', '$2y$10$lbFrJH3.We1TyixgkVZEheQJGBfEibV7HedjaXzhPaYULxGiATaP6', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tyontekijatehtavat`
--

CREATE TABLE `tyontekijatehtavat` (
  `tehtavaID` int(20) NOT NULL,
  `vikailmoitusID` int(20) NOT NULL,
  `tyontekijaID` int(11) NOT NULL,
  `ratkaisu` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tyontekijatehtavat`
--

INSERT INTO `tyontekijatehtavat` (`tehtavaID`, `vikailmoitusID`, `tyontekijaID`, `ratkaisu`) VALUES
(10, 12, 1, 'vitun jees'),
(11, 6, 1, 'Missää muualla ei mitään vialla kun Ahvenjärven päässä. Sanokaa sille että painuu vittuun tai poistakaa sen tunnukset. En jaska käydä jokapäivä ihmettelemässä jounin persereikää tai genitaaleja.'),
(12, 2, 1, 'päädyttiin tuukan kanssa siihen ratkaisuun että hän koittaa jutella asiasta kulokorven kanssa kahdestaan'),
(13, 1, 2, 'Paska haisi liian pahalle, en pystynyt suorittamaan työtä loppuun. Lähettää Wiliam paikalle kaasunaamarin kanssa. Otan loparit älä ota');

-- --------------------------------------------------------

--
-- Table structure for table `vikailmoitus`
--

CREATE TABLE `vikailmoitus` (
  `vikailmoitusID` int(20) NOT NULL,
  `asukasID` int(20) NOT NULL,
  `taloyhtionID` int(11) NOT NULL,
  `vikaotsikko` varchar(50) NOT NULL,
  `vikaasia` varchar(1000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tyontekijaID` int(11) DEFAULT NULL,
  `ratkaisu` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vikailmoitus`
--

INSERT INTO `vikailmoitus` (`vikailmoitusID`, `asukasID`, `taloyhtionID`, `vikaotsikko`, `vikaasia`, `tyontekijaID`, `ratkaisu`) VALUES
(13, 6, 1, 'Ei lämmintä vettä', 'Minulta ei tule lämmintä vettä hanasta. Olisin kiitollinen, jos voisitte tutkia, mistä tämä johtuu.', NULL, NULL),
(14, 13, 1, 'Hissi rikki', 'Hissi ei toimi ja joudun käyttämään portaita. Olisiko mahdollista saada hissi korjattua?', NULL, NULL),
(15, 17, 2, 'Katto vuotaa', 'Havaitsimme että meidän asunnon katto vuotaa ja haluaisimme, että sitä tutkitaan ja korjataan mahdollisimman pian.', NULL, NULL),
(16, 23, 2, 'Ilmanvaihto huono', 'Ilmanvaihto ei toimi ja huoneistomme ovat tunkkaisia ja ilmassa on paha haju. Toivoisin, että voitte korjata tämän ongelman.', NULL, NULL),
(17, 22, 2, 'Ovi ei toimi', 'Meidän ovi ei toimi kunnolla. Se on rikkoutunut ja haluaisimme sen korjattavan mahdollisimman pian.', NULL, NULL),
(18, 27, 3, 'Lattialämmitys', 'Lattialämmitys ei toimi meidän asunnossamme. Olisiko mahdollista tutkia, mistä tämä johtuu?', NULL, NULL),
(19, 34, 3, 'Kylppärin kosteus', 'Meidän kylpyhuoneen lattia on jatkuvasti kostea tai märkä. Olisiko mahdollista tutkia, mistä tämä johtuu? Saattaa olla, että suihku vuotaa tai kylpyhuoneen lattiarakenteessa on vesivaurio.', NULL, NULL),
(20, 39, 4, 'Ikkuna ei lukitu', 'Meidän ikkunamme ei lukitu kunnolla, mikä aiheuttaa turvallisuusriskejä ja mahdollisia lämpöhävikkejä. Vähän paleltaa öisin myös.', NULL, NULL),
(21, 41, 4, 'Kellarissa vettä', 'Meidän kellaritilassa on vettä, joka on joko tulvinut sisään tai on kondensoitunut kylmästä. Voitteko selvittää asian?? ', NULL, NULL),
(22, 45, 4, 'Roskahuone tukossa', 'Roskahuone on täynnä roskia ja tukossa, mikä haittaa roskien asianmukaista hävittämistä. Tämä tuntuu olevan viikottain toistuvaa...', NULL, NULL),
(23, 28, 3, 'Sähkön latauspiste autolle', 'Havaitsimme, että meidän autopaikan sähköautojen latauspiste ei toimi. Sähköautosta akku loppu ja pitäisi päästä töihin.', NULL, NULL),
(24, 43, 4, 'WC-pönttö ei vedä', 'Huomasin, että wc-pönttöni ei vedä kunnolla. Yritin käyttää sitä useita kertoja, mutta joka kerta vesi nousee ylös ja laskee hitaasti. En tiedä, mikä voisi olla vian syynä, joten tarvitsen jonkun huoltomiehen tarkistamaan sen.', NULL, NULL),
(25, 15, 1, 'Parvekkeen ovi ei sulkeudu', 'Olen yrittänyt sulkea parvekkeen ovea useita kertoja, mutta se ei vain mene kiinni. Olen yrittänyt säätää lukkoa, mutta se ei auta. Toivon, että joku voisi tulla korjaamaan oven mahdollisimman pian, koska pelkään, että joku voisi päästä asuntooni, jos ovi ei sulkeudu kunnolla.', NULL, NULL),
(26, 16, 1, 'Hissi ei toimi', 'Yritin käyttää hissiä päästäkseni kerrokseeni, mutta hissi ei liiku. Olen varma, että olen painanut oikeaa nappia, joten uskon, että hississä on tekninen vika. Olisi hienoa, jos huolto voisi tulla korjaamaan hissin niin pian kuin mahdollista.', NULL, NULL),
(27, 24, 2, 'Vesihana vuotaa', 'Huomasin, että keittiön vesihana vuotaa ja vesipisarat tippuvat jatkuvasti lavuaarin päälle. En ole pystynyt korjaamaan vuotoa itse, joten pyydän huoltomiestä tulemaan korjaamaan sen mahdollisimman pian.', NULL, NULL),
(28, 9, 1, 'Parkkipaikan valo ei toimi', 'Huomasin, että autopaikkani yläpuolella oleva valo ei syty, joten parkkipaikalla on pimeää illalla. Se voisi olla vaarallista, jos joku kompastuisi johonkin pimeässä. Tulkaa korjaamaan kun pystytte.', NULL, NULL),
(29, 39, 4, 'Ulko-ovi', 'Korpelan ulko-ovi ei sulkeudu kunnolla, kävisittekö tarkistamassa?', NULL, NULL),
(30, 25, 2, 'Tiskikone ei tyhjennä vesiä', 'Tiskikone ei tyhjennä vesiä, voitteko käydä katsomassa?', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yhteydenotto`
--

CREATE TABLE `yhteydenotto` (
  `yhteydenottoID` int(20) NOT NULL,
  `yhtnimi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `yhtotsikko` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `yhtasia` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `yhtpuhnro` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `yhtsposti` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yhteydenotto`
--

INSERT INTO `yhteydenotto` (`yhteydenottoID`, `yhtnimi`, `yhtotsikko`, `yhtasia`, `yhtpuhnro`, `yhtsposti`) VALUES
(1, 'Jorma Ollila', 'Moro jätkät', 'Ootte kyllä vitun hyviä koodareita. Ehdottaisin teille työpaikkaa ja 20k liksaa kuukaudessa. Palataan!', '401112223', 'jorma.ollila@nokia.com'),
(19, 'gsg', 'gsegs', 'segsegse', 'segse', 'gsegs'),
(22, 'dw', 'dwd', 'w', 'dw', 'dw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asukas`
--
ALTER TABLE `asukas`
  ADD PRIMARY KEY (`asukasID`),
  ADD KEY `rooliID` (`rooliID`,`taloyhtioID`),
  ADD KEY `taloyhtioID` (`taloyhtioID`);

--
-- Indexes for table `isannoitsija`
--
ALTER TABLE `isannoitsija`
  ADD PRIMARY KEY (`isannoitsijaID`),
  ADD KEY `rooliID` (`rooliID`,`taloyhtioID`),
  ADD KEY `taloyhtioID` (`taloyhtioID`);

--
-- Indexes for table `kaytettavyys`
--
ALTER TABLE `kaytettavyys`
  ADD PRIMARY KEY (`kaytettavyysID`);

--
-- Indexes for table `roolit`
--
ALTER TABLE `roolit`
  ADD PRIMARY KEY (`rooliID`);

--
-- Indexes for table `talotyyppi`
--
ALTER TABLE `talotyyppi`
  ADD PRIMARY KEY (`talotyyppiID`);

--
-- Indexes for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  ADD PRIMARY KEY (`taloyhtioID`),
  ADD KEY `talotyyppiID` (`talotyyppiID`);

--
-- Indexes for table `tyontekija`
--
ALTER TABLE `tyontekija`
  ADD PRIMARY KEY (`tyontekijaID`),
  ADD KEY `kaytettavyysID` (`kaytettavyysID`,`rooliID`),
  ADD KEY `rooliID` (`rooliID`);

--
-- Indexes for table `tyontekijatehtavat`
--
ALTER TABLE `tyontekijatehtavat`
  ADD PRIMARY KEY (`tehtavaID`),
  ADD KEY `vikailmoitusID` (`vikailmoitusID`,`tyontekijaID`),
  ADD KEY `tyontekijaID` (`tyontekijaID`);

--
-- Indexes for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  ADD PRIMARY KEY (`vikailmoitusID`),
  ADD KEY `asukasID` (`asukasID`,`taloyhtionID`,`tyontekijaID`),
  ADD KEY `taloyhtionID` (`taloyhtionID`),
  ADD KEY `tyontekijaID` (`tyontekijaID`);

--
-- Indexes for table `yhteydenotto`
--
ALTER TABLE `yhteydenotto`
  ADD PRIMARY KEY (`yhteydenottoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asukas`
--
ALTER TABLE `asukas`
  MODIFY `asukasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `isannoitsija`
--
ALTER TABLE `isannoitsija`
  MODIFY `isannoitsijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kaytettavyys`
--
ALTER TABLE `kaytettavyys`
  MODIFY `kaytettavyysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roolit`
--
ALTER TABLE `roolit`
  MODIFY `rooliID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `talotyyppi`
--
ALTER TABLE `talotyyppi`
  MODIFY `talotyyppiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  MODIFY `taloyhtioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tyontekija`
--
ALTER TABLE `tyontekija`
  MODIFY `tyontekijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tyontekijatehtavat`
--
ALTER TABLE `tyontekijatehtavat`
  MODIFY `tehtavaID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  MODIFY `vikailmoitusID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `yhteydenotto`
--
ALTER TABLE `yhteydenotto`
  MODIFY `yhteydenottoID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asukas`
--
ALTER TABLE `asukas`
  ADD CONSTRAINT `asukas_ibfk_1` FOREIGN KEY (`taloyhtioID`) REFERENCES `taloyhtio` (`taloyhtioID`),
  ADD CONSTRAINT `asukas_ibfk_2` FOREIGN KEY (`rooliID`) REFERENCES `roolit` (`rooliID`);

--
-- Constraints for table `isannoitsija`
--
ALTER TABLE `isannoitsija`
  ADD CONSTRAINT `isannoitsija_ibfk_1` FOREIGN KEY (`taloyhtioID`) REFERENCES `taloyhtio` (`taloyhtioID`),
  ADD CONSTRAINT `isannoitsija_ibfk_2` FOREIGN KEY (`rooliID`) REFERENCES `roolit` (`rooliID`);

--
-- Constraints for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  ADD CONSTRAINT `taloyhtio_ibfk_1` FOREIGN KEY (`talotyyppiID`) REFERENCES `talotyyppi` (`talotyyppiID`);

--
-- Constraints for table `tyontekija`
--
ALTER TABLE `tyontekija`
  ADD CONSTRAINT `tyontekija_ibfk_1` FOREIGN KEY (`kaytettavyysID`) REFERENCES `kaytettavyys` (`kaytettavyysID`),
  ADD CONSTRAINT `tyontekija_ibfk_2` FOREIGN KEY (`rooliID`) REFERENCES `roolit` (`rooliID`);

--
-- Constraints for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  ADD CONSTRAINT `vikailmoitus_ibfk_1` FOREIGN KEY (`asukasID`) REFERENCES `asukas` (`asukasID`),
  ADD CONSTRAINT `vikailmoitus_ibfk_2` FOREIGN KEY (`taloyhtionID`) REFERENCES `taloyhtio` (`taloyhtioID`),
  ADD CONSTRAINT `vikailmoitus_ibfk_3` FOREIGN KEY (`tyontekijaID`) REFERENCES `tyontekija` (`tyontekijaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
