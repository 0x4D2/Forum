-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Dez 2021 um 13:51
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `forum`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblbeitraege`
--

CREATE TABLE `tblbeitraege` (
  `p_beiID` int(10) UNSIGNED NOT NULL,
  `beiErstellDatum` datetime NOT NULL,
  `beiInhalt` text NOT NULL,
  `f_tID` int(10) UNSIGNED NOT NULL,
  `f_benID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblbeitraege`
--

INSERT INTO `tblbeitraege` (`p_beiID`, `beiErstellDatum`, `beiInhalt`, `f_tID`, `f_benID`) VALUES
(1, '2021-12-16 13:31:47', 'Das ist ein Testinhalt', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblbenutzer`
--

CREATE TABLE `tblbenutzer` (
  `p_benID` int(10) UNSIGNED NOT NULL,
  `benName` varchar(30) NOT NULL,
  `benPasswd` varchar(32) NOT NULL,
  `benMail` varchar(100) NOT NULL,
  `benGebDatum` date NOT NULL,
  `benGeschlecht` char(1) NOT NULL,
  `benRegDatum` datetime NOT NULL,
  `benBild` varchar(255) DEFAULT NULL,
  `benUeberMich` text DEFAULT NULL,
  `benIsBanned` tinyint(1) DEFAULT NULL,
  `f_beGrupID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblbenutzer`
--

INSERT INTO `tblbenutzer` (`p_benID`, `benName`, `benPasswd`, `benMail`, `benGebDatum`, `benGeschlecht`, `benRegDatum`, `benBild`, `benUeberMich`, `benIsBanned`, `f_beGrupID`) VALUES
(1, 'Administator', 'admin', 'admin@forum.de', '2021-12-01', 'x', '2021-12-16 13:28:48', NULL, 'Ich habe die Macht.', 0, 1),
(2, 'Memo', 'wasistlos1', 'h@h.de', '2021-12-16', 'm', '2021-12-16 13:45:42', NULL, NULL, NULL, 3),
(4, 'Dennis', 'wasistlos1', 'test@test.de', '2021-12-16', 'm', '2021-12-16 13:47:51', NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblbenutzergruppe`
--

CREATE TABLE `tblbenutzergruppe` (
  `p_beGrupID` int(10) UNSIGNED NOT NULL,
  `beGrupName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblbenutzergruppe`
--

INSERT INTO `tblbenutzergruppe` (`p_beGrupID`, `beGrupName`) VALUES
(1, 'Administator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbllogins`
--

CREATE TABLE `tbllogins` (
  `p_logID` int(10) UNSIGNED NOT NULL,
  `logZeitVon` datetime NOT NULL,
  `logZeitBis` datetime DEFAULT NULL,
  `logIP` varchar(15) NOT NULL,
  `f_benID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbloberkategorien`
--

CREATE TABLE `tbloberkategorien` (
  `p_okatID` int(10) UNSIGNED NOT NULL,
  `okatName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tbloberkategorien`
--

INSERT INTO `tbloberkategorien` (`p_okatID`, `okatName`) VALUES
(1, 'Autos'),
(2, 'Autos');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblstati`
--

CREATE TABLE `tblstati` (
  `p_stID` int(10) UNSIGNED NOT NULL,
  `stBezeichnung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblstati`
--

INSERT INTO `tblstati` (`p_stID`, `stBezeichnung`) VALUES
(1, 'Offen'),
(2, 'Offen'),
(3, 'Geschlossen'),
(4, 'Geschlossen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblthemen`
--

CREATE TABLE `tblthemen` (
  `p_tID` int(10) UNSIGNED NOT NULL,
  `tErstellDatum` datetime NOT NULL,
  `tTitel` varchar(30) NOT NULL,
  `f_stdID` int(10) UNSIGNED NOT NULL,
  `f_ukatID` int(10) UNSIGNED NOT NULL,
  `f_benID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblthemen`
--

INSERT INTO `tblthemen` (`p_tID`, `tErstellDatum`, `tTitel`, `f_stdID`, `f_ukatID`, `f_benID`) VALUES
(1, '2021-12-16 13:30:55', 'A3', 1, 1, 1),
(2, '2021-12-16 13:30:55', 'A3', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblunterkategorie`
--

CREATE TABLE `tblunterkategorie` (
  `p_ukatID` int(10) UNSIGNED NOT NULL,
  `ukatname` varchar(30) NOT NULL,
  `f_okatID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblunterkategorie`
--

INSERT INTO `tblunterkategorie` (`p_ukatID`, `ukatname`, `f_okatID`) VALUES
(1, 'Audi', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tblbeitraege`
--
ALTER TABLE `tblbeitraege`
  ADD PRIMARY KEY (`p_beiID`),
  ADD KEY `f_tID` (`f_tID`),
  ADD KEY `f_benID` (`f_benID`);

--
-- Indizes für die Tabelle `tblbenutzer`
--
ALTER TABLE `tblbenutzer`
  ADD PRIMARY KEY (`p_benID`),
  ADD UNIQUE KEY `benName` (`benName`),
  ADD UNIQUE KEY `benMail` (`benMail`),
  ADD KEY `f_beGrupID` (`f_beGrupID`);

--
-- Indizes für die Tabelle `tblbenutzergruppe`
--
ALTER TABLE `tblbenutzergruppe`
  ADD PRIMARY KEY (`p_beGrupID`);

--
-- Indizes für die Tabelle `tbllogins`
--
ALTER TABLE `tbllogins`
  ADD PRIMARY KEY (`p_logID`),
  ADD KEY `f_benID` (`f_benID`);

--
-- Indizes für die Tabelle `tbloberkategorien`
--
ALTER TABLE `tbloberkategorien`
  ADD PRIMARY KEY (`p_okatID`);

--
-- Indizes für die Tabelle `tblstati`
--
ALTER TABLE `tblstati`
  ADD PRIMARY KEY (`p_stID`);

--
-- Indizes für die Tabelle `tblthemen`
--
ALTER TABLE `tblthemen`
  ADD PRIMARY KEY (`p_tID`),
  ADD KEY `f_stdID` (`f_stdID`),
  ADD KEY `f_ukatID` (`f_ukatID`),
  ADD KEY `f_benID` (`f_benID`);

--
-- Indizes für die Tabelle `tblunterkategorie`
--
ALTER TABLE `tblunterkategorie`
  ADD PRIMARY KEY (`p_ukatID`),
  ADD KEY `f_okatID` (`f_okatID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tblbeitraege`
--
ALTER TABLE `tblbeitraege`
  MODIFY `p_beiID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `tblbenutzer`
--
ALTER TABLE `tblbenutzer`
  MODIFY `p_benID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tblbenutzergruppe`
--
ALTER TABLE `tblbenutzergruppe`
  MODIFY `p_beGrupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tbllogins`
--
ALTER TABLE `tbllogins`
  MODIFY `p_logID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbloberkategorien`
--
ALTER TABLE `tbloberkategorien`
  MODIFY `p_okatID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `tblstati`
--
ALTER TABLE `tblstati`
  MODIFY `p_stID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tblthemen`
--
ALTER TABLE `tblthemen`
  MODIFY `p_tID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `tblunterkategorie`
--
ALTER TABLE `tblunterkategorie`
  MODIFY `p_ukatID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tblbeitraege`
--
ALTER TABLE `tblbeitraege`
  ADD CONSTRAINT `tblbeitraege_ibfk_1` FOREIGN KEY (`f_tID`) REFERENCES `tblthemen` (`p_tID`),
  ADD CONSTRAINT `tblbeitraege_ibfk_2` FOREIGN KEY (`f_benID`) REFERENCES `tblbenutzer` (`p_benID`);

--
-- Constraints der Tabelle `tblbenutzer`
--
ALTER TABLE `tblbenutzer`
  ADD CONSTRAINT `tblbenutzer_ibfk_1` FOREIGN KEY (`f_beGrupID`) REFERENCES `tblbenutzergruppe` (`p_beGrupID`);

--
-- Constraints der Tabelle `tbllogins`
--
ALTER TABLE `tbllogins`
  ADD CONSTRAINT `tbllogins_ibfk_1` FOREIGN KEY (`f_benID`) REFERENCES `tblbenutzer` (`p_benID`);

--
-- Constraints der Tabelle `tblthemen`
--
ALTER TABLE `tblthemen`
  ADD CONSTRAINT `tblthemen_ibfk_1` FOREIGN KEY (`f_stdID`) REFERENCES `tblstati` (`p_stID`),
  ADD CONSTRAINT `tblthemen_ibfk_2` FOREIGN KEY (`f_ukatID`) REFERENCES `tblunterkategorie` (`p_ukatID`),
  ADD CONSTRAINT `tblthemen_ibfk_3` FOREIGN KEY (`f_benID`) REFERENCES `tblbenutzer` (`p_benID`);

--
-- Constraints der Tabelle `tblunterkategorie`
--
ALTER TABLE `tblunterkategorie`
  ADD CONSTRAINT `tblunterkategorie_ibfk_1` FOREIGN KEY (`f_okatID`) REFERENCES `tbloberkategorien` (`p_okatID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
