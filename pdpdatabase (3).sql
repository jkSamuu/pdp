-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2023 alle 11:50
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdpdatabase`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anniscolastici`
--

CREATE TABLE `anniscolastici` (
  `idASc` int(11) NOT NULL,
  `desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `anniscolastici`
--

INSERT INTO `anniscolastici` (`idASc`, `desc`) VALUES
(1, '2022-23'),
(2, '2023-24'),
(3, '2024-25'),
(4, '2025-26'),
(5, '2026-27'),
(6, '2027-28');

-- --------------------------------------------------------

--
-- Struttura della tabella `classi`
--

CREATE TABLE `classi` (
  `idCoord` int(11) DEFAULT NULL,
  `idCls` int(11) NOT NULL,
  `sigla` varchar(255) NOT NULL,
  `idAsc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `classi`
--

INSERT INTO `classi` (`idCoord`, `idCls`, `sigla`, `idAsc`) VALUES
(0, 1, '1AT', 1),
(0, 2, '1BT', 1),
(0, 3, '1CT', 1),
(0, 4, '1DT', 1),
(0, 5, '1ET', 1),
(0, 6, '1FT', 1),
(0, 7, '1GT', 1),
(0, 8, '1HT', 1),
(0, 9, '2AT', 1),
(0, 10, '2BT', 1),
(0, 11, '2CT', 1),
(0, 12, '2DT', 1),
(0, 13, '2ET', 1),
(0, 14, '2FT', 1),
(0, 15, '2GT', 1),
(0, 16, '2HT', 1),
(0, 17, '3AII', 1),
(0, 18, '3BII', 1),
(0, 19, '3CII', 1),
(0, 20, '3AEA', 1),
(0, 21, '3BEA', 1),
(0, 22, '3CEA', 1),
(0, 23, '3DIT', 1),
(0, 24, '4AII', 1),
(0, 25, '4BII', 1),
(0, 26, '4CII', 1),
(0, 27, '4AEA', 1),
(0, 28, '4BEA', 1),
(0, 29, '4CEA', 1),
(0, 30, '4DIT', 1),
(6, 31, '5AII', 1),
(0, 32, '5BII', 1),
(0, 33, '5AEA', 1),
(0, 34, '5BEA', 1),
(0, 35, '5CEA', 1),
(0, 36, '5DIT', 1),
(0, 37, '1AL', 1),
(0, 38, '1BL', 1),
(0, 39, '1CL', 1),
(0, 40, '1DL', 1),
(0, 41, '2AL', 1),
(0, 42, '2BL', 1),
(0, 43, '2CL', 1),
(0, 44, '2DL', 1),
(0, 45, '3AL', 1),
(0, 46, '3BL', 1),
(0, 47, '3CL', 1),
(0, 48, '3DL', 1),
(0, 49, '4AL', 1),
(0, 50, '4BL', 1),
(0, 51, '4CL', 1),
(0, 52, '4DL', 1),
(0, 53, '5AL', 1),
(0, 54, '5BL', 1),
(0, 55, '5CL', 1),
(0, 56, '5DL', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `consiglidiclasse`
--

CREATE TABLE `consiglidiclasse` (
  `idCls` int(11) NOT NULL,
  `idDoc` int(11) NOT NULL,
  `idMat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `consiglidiclasse`
--

INSERT INTO `consiglidiclasse` (`idCls`, `idDoc`, `idMat`) VALUES
(31, 1, 1),
(31, 2, 2),
(31, 3, 3),
(31, 4, 4),
(31, 5, 5),
(31, 5, 6),
(31, 6, 7),
(31, 7, 10),
(31, 8, 8),
(31, 9, 9),
(31, 10, 11),
(31, 10, 12),
(31, 11, 13),
(31, 11, 14),
(31, 12, 0),
(31, 13, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `diagnosi`
--

CREATE TABLE `diagnosi` (
  `idPdp` int(11) NOT NULL,
  `idDia` int(11) NOT NULL,
  `descr` text NOT NULL,
  `altreRel` text,
  `intervRiab` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `diagnosi`
--

INSERT INTO `diagnosi` (`idPdp`, `idDia`, `descr`, `altreRel`, `intervRiab`) VALUES
(4, 1, 'Disturbo aggressivo compulsivo ', 'Tende a essere cleptomane', 'Cucitura mani'),
(9, 3, 'Nero', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti`
--

CREATE TABLE `docenti` (
  `idDoc` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `docenti`
--

INSERT INTO `docenti` (`idDoc`, `nome`, `cognome`, `email`, `password`) VALUES
(0, 'Test', 'Test', 'test@calvino.edu.it', 'test'),
(1, 'Luigi', 'Ferrari', 'luigi.ferrari@calvino.edu.it', 'luigi.ferrari'),
(2, 'nomedocente2', 'docente2', 'docente2@calvino.edu.it', ''),
(3, 'docente3', 'docente3', '', ''),
(4, 'docente4', 'docente4', 'docente4@calvino.edu.it', 'docente4'),
(5, 'docente5', 'docente5', 'docente5@calvino.edu.it', 'docente5'),
(6, 'docente6', 'docente6', 'docente6@calvino.edu.it', 'docente6'),
(7, 'docente7', 'docente7', 'docente7s@calvino.edu.it', 'docente7'),
(8, 'Maria Grazia', 'Cornolti', 'grazia.cornolti@calvino.edu.it', 'mariagrazia.cornolti'),
(9, 'docente9', 'docente9', 'docente9@calvino.edu.it', 'docente9'),
(10, 'docente10', 'docente10', 'docente10a@calvino.edu.it', 'docente10'),
(11, 'Paolo', 'Landolina', 'paolo.landolina@calvino.edu.it', 'paolo.landolina'),
(12, 'docente12', 'docente12', 'docente12@calvino.edu.it', 'docente12'),
(13, 'Giulia', 'Gobbi', 'giulia.gobbi@calvino.edu.it', 'samuelemanteroamoremio'),
(14, 'Maria Grazia', 'Cornolti', 'referente.dsa@calvino.edu.it', 'referente');

-- --------------------------------------------------------

--
-- Struttura della tabella `domande`
--

CREATE TABLE `domande` (
  `idDom` int(11) NOT NULL,
  `testo` text NOT NULL,
  `idTab` int(11) NOT NULL,
  `istruzioni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `funzioni`
--

CREATE TABLE `funzioni` (
  `idDoc` int(11) NOT NULL,
  `idRuo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `funzioni`
--

INSERT INTO `funzioni` (`idDoc`, `idRuo`) VALUES
(0, 1),
(1, 3),
(2, 3),
(6, 3),
(9, 4),
(10, 1),
(13, 1),
(14, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `informazionipers`
--

CREATE TABLE `informazionipers` (
  `idInfo` int(11) NOT NULL,
  `presento` text NOT NULL,
  `forzaP` text NOT NULL,
  `fragilitaP` text NOT NULL,
  `idPdp` int(11) NOT NULL,
  `bisogni` text NOT NULL,
  `clima` text NOT NULL,
  `extrascuola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `informazionipers`
--

INSERT INTO `informazionipers` (`idInfo`, `presento`, `forzaP`, `fragilitaP`, `idPdp`, `bisogni`, `clima`, `extrascuola`) VALUES
(1, '', '', '', 4, '', '', ''),
(3, 'ciao sono giovanni', 'nessuno', 'tutti', 9, 'essere ammesso all\'esame', 'banane\r\n', 'cipresso\r\n');

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `idMat` int(11) NOT NULL,
  `descMateria` text NOT NULL,
  `hasDettaglio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`idMat`, `descMateria`, `hasDettaglio`) VALUES
(0, 'sostegno', 0),
(1, 'informatica', 1),
(2, 'matematica', 1),
(3, 'inglese', 1),
(4, 'GPOI', 1),
(5, 'italiano', 1),
(6, 'storia', 1),
(7, 'sistemi e reti', 1),
(8, 'TPSIT', 1),
(9, 'scienze motorie', 1),
(10, 'religione', 1),
(11, 'lab. sistemi e reti', 0),
(12, 'lab. GPOI', 0),
(13, 'lab. informatica', 0),
(14, 'lab. TPSIT', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `pdp`
--

CREATE TABLE `pdp` (
  `idStud` int(11) NOT NULL,
  `idCls` int(11) NOT NULL,
  `idPdp` int(11) NOT NULL,
  `numProg` int(11) NOT NULL DEFAULT '1',
  `stato` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pdp`
--

INSERT INTO `pdp` (`idStud`, `idCls`, `idPdp`, `numProg`, `stato`) VALUES
(9, 1, 4, 1, 1),
(14, 31, 9, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `rispossibili`
--

CREATE TABLE `rispossibili` (
  `idRis` int(11) NOT NULL,
  `idDom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `risposte`
--

CREATE TABLE `risposte` (
  `risposta` text NOT NULL,
  `idRis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `rispostedate`
--

CREATE TABLE `rispostedate` (
  `idRis` int(11) NOT NULL,
  `idMat` int(11) DEFAULT NULL,
  `idPdp` int(11) NOT NULL,
  `idDom` int(11) NOT NULL,
  `testoLibero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ruoli`
--

CREATE TABLE `ruoli` (
  `idRuo` int(11) NOT NULL,
  `descRuolo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ruoli`
--

INSERT INTO `ruoli` (`idRuo`, `descRuolo`) VALUES
(1, 'Amministratore'),
(2, 'Responsabile'),
(3, 'Coordinatore'),
(4, 'Docente');

-- --------------------------------------------------------

--
-- Struttura della tabella `sezioni`
--

CREATE TABLE `sezioni` (
  `idSez` int(11) NOT NULL,
  `titolo` varchar(70) NOT NULL,
  `sigla` char(2) NOT NULL,
  `descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `idStud` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `matricola` int(4) NOT NULL,
  `luogoNascita` varchar(255) NOT NULL,
  `nazionalita` varchar(255) NOT NULL,
  `dataNascita` date NOT NULL,
  `linguaMadre` varchar(255) NOT NULL,
  `secondaLingua` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`idStud`, `nome`, `cognome`, `matricola`, `luogoNascita`, `nazionalita`, `dataNascita`, `linguaMadre`, `secondaLingua`) VALUES
(9, 'Aaron', 'Alcivar', 1, 'Genova', 'Ecuadoriano', '2023-05-13', 'Ecuadoriano', 'Italiano'),
(14, 'Giovanni', 'Trivino', 2, 'Quito', 'Ecuadoriano', '2023-04-27', 'Ecuadoriano', 'Italiano'),
(15, 'Gianluca', 'Tramparulo', 15, 'Scampia', 'Aramaico', '2023-06-03', 'Aramaico', 'napoletano');

-- --------------------------------------------------------

--
-- Struttura della tabella `tabelle`
--

CREATE TABLE `tabelle` (
  `idDia` int(11) NOT NULL,
  `idTab` int(11) NOT NULL,
  `titolo` varchar(30) NOT NULL,
  `idSez` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `anniscolastici`
--
ALTER TABLE `anniscolastici`
  ADD PRIMARY KEY (`idASc`);

--
-- Indici per le tabelle `classi`
--
ALTER TABLE `classi`
  ADD PRIMARY KEY (`idCls`),
  ADD KEY `classi_anniscolastici_idASc_fk` (`idAsc`),
  ADD KEY `classi_docenti_idDoc_fk` (`idCoord`);

--
-- Indici per le tabelle `consiglidiclasse`
--
ALTER TABLE `consiglidiclasse`
  ADD PRIMARY KEY (`idDoc`,`idCls`,`idMat`),
  ADD KEY `consigliDiClasse_classi_idCls_fk` (`idCls`),
  ADD KEY `consigliDiClasse_docenti_idDoc_fk` (`idDoc`),
  ADD KEY `consigliDiClasse_materie_idMat_fk` (`idMat`);

--
-- Indici per le tabelle `diagnosi`
--
ALTER TABLE `diagnosi`
  ADD PRIMARY KEY (`idDia`),
  ADD KEY `fkpdp` (`idPdp`);

--
-- Indici per le tabelle `docenti`
--
ALTER TABLE `docenti`
  ADD PRIMARY KEY (`idDoc`);

--
-- Indici per le tabelle `domande`
--
ALTER TABLE `domande`
  ADD PRIMARY KEY (`idDom`),
  ADD KEY `fktb` (`idTab`);

--
-- Indici per le tabelle `funzioni`
--
ALTER TABLE `funzioni`
  ADD PRIMARY KEY (`idDoc`,`idRuo`),
  ADD KEY `funzioni___fk` (`idRuo`),
  ADD KEY `funzioni_docenti_idDoc_fk` (`idDoc`);

--
-- Indici per le tabelle `informazionipers`
--
ALTER TABLE `informazionipers`
  ADD PRIMARY KEY (`idInfo`),
  ADD KEY `idpdpp` (`idPdp`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`idMat`);

--
-- Indici per le tabelle `pdp`
--
ALTER TABLE `pdp`
  ADD PRIMARY KEY (`idPdp`,`numProg`),
  ADD KEY `pdp_studenti_idStu_fk` (`idStud`),
  ADD KEY `pdp_ibfk_1` (`idCls`);

--
-- Indici per le tabelle `rispossibili`
--
ALTER TABLE `rispossibili`
  ADD PRIMARY KEY (`idDom`,`idRis`),
  ADD KEY `rispossibili_ibfk_2` (`idRis`);

--
-- Indici per le tabelle `risposte`
--
ALTER TABLE `risposte`
  ADD PRIMARY KEY (`idRis`);

--
-- Indici per le tabelle `rispostedate`
--
ALTER TABLE `rispostedate`
  ADD PRIMARY KEY (`idRis`),
  ADD KEY `idDom` (`idDom`),
  ADD KEY `fk_pdp` (`idPdp`),
  ADD KEY `fk_mat` (`idMat`);

--
-- Indici per le tabelle `ruoli`
--
ALTER TABLE `ruoli`
  ADD PRIMARY KEY (`idRuo`);

--
-- Indici per le tabelle `sezioni`
--
ALTER TABLE `sezioni`
  ADD PRIMARY KEY (`idSez`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`idStud`);

--
-- Indici per le tabelle `tabelle`
--
ALTER TABLE `tabelle`
  ADD PRIMARY KEY (`idTab`),
  ADD KEY `idDia` (`idDia`),
  ADD KEY `fksezione` (`idSez`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `anniscolastici`
--
ALTER TABLE `anniscolastici`
  MODIFY `idASc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `classi`
--
ALTER TABLE `classi`
  MODIFY `idCls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `diagnosi`
--
ALTER TABLE `diagnosi`
  MODIFY `idDia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `docenti`
--
ALTER TABLE `docenti`
  MODIFY `idDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `domande`
--
ALTER TABLE `domande`
  MODIFY `idDom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `informazionipers`
--
ALTER TABLE `informazionipers`
  MODIFY `idInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `idMat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `pdp`
--
ALTER TABLE `pdp`
  MODIFY `idPdp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `rispostedate`
--
ALTER TABLE `rispostedate`
  MODIFY `idRis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ruoli`
--
ALTER TABLE `ruoli`
  MODIFY `idRuo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `sezioni`
--
ALTER TABLE `sezioni`
  MODIFY `idSez` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `idStud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `tabelle`
--
ALTER TABLE `tabelle`
  MODIFY `idTab` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `classi`
--
ALTER TABLE `classi`
  ADD CONSTRAINT `classi_anniscolastici_idASc_fk` FOREIGN KEY (`idAsc`) REFERENCES `anniscolastici` (`idASc`),
  ADD CONSTRAINT `classi_docenti_idDoc_fk` FOREIGN KEY (`idCoord`) REFERENCES `docenti` (`idDoc`);

--
-- Limiti per la tabella `consiglidiclasse`
--
ALTER TABLE `consiglidiclasse`
  ADD CONSTRAINT `consigliDiClasse_classi_idCls_fk` FOREIGN KEY (`idCls`) REFERENCES `classi` (`idCls`),
  ADD CONSTRAINT `consigliDiClasse_docenti_idDoc_fk` FOREIGN KEY (`idDoc`) REFERENCES `docenti` (`idDoc`),
  ADD CONSTRAINT `consigliDiClasse_materie_idMat_fk` FOREIGN KEY (`idMat`) REFERENCES `materie` (`idMat`);

--
-- Limiti per la tabella `diagnosi`
--
ALTER TABLE `diagnosi`
  ADD CONSTRAINT `fkpdp` FOREIGN KEY (`idPdp`) REFERENCES `pdp` (`idPdp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `domande`
--
ALTER TABLE `domande`
  ADD CONSTRAINT `domande_ibfk_1` FOREIGN KEY (`idDom`) REFERENCES `rispossibili` (`idDom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fktb` FOREIGN KEY (`idTab`) REFERENCES `tabelle` (`idTab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `funzioni`
--
ALTER TABLE `funzioni`
  ADD CONSTRAINT `funzioni___fk` FOREIGN KEY (`idRuo`) REFERENCES `ruoli` (`idRuo`),
  ADD CONSTRAINT `funzioni_docenti_idDoc_fk` FOREIGN KEY (`idDoc`) REFERENCES `docenti` (`idDoc`);

--
-- Limiti per la tabella `informazionipers`
--
ALTER TABLE `informazionipers`
  ADD CONSTRAINT `idpdpp` FOREIGN KEY (`idPdp`) REFERENCES `pdp` (`idPdp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `pdp`
--
ALTER TABLE `pdp`
  ADD CONSTRAINT `pdp_ibfk_1` FOREIGN KEY (`idCls`) REFERENCES `classi` (`idCls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pdp_ibfk_2` FOREIGN KEY (`idStud`) REFERENCES `studenti` (`idStud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `rispossibili`
--
ALTER TABLE `rispossibili`
  ADD CONSTRAINT `rispossibili_ibfk_1` FOREIGN KEY (`idDom`) REFERENCES `domande` (`idDom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rispossibili_ibfk_2` FOREIGN KEY (`idRis`) REFERENCES `risposte` (`idRis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `risposte`
--
ALTER TABLE `risposte`
  ADD CONSTRAINT `fkrisp` FOREIGN KEY (`idRis`) REFERENCES `rispostedate` (`idRis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `rispostedate`
--
ALTER TABLE `rispostedate`
  ADD CONSTRAINT `fk_mat` FOREIGN KEY (`idMat`) REFERENCES `materie` (`idMat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pdp` FOREIGN KEY (`idPdp`) REFERENCES `pdp` (`idPdp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rispostedate_ibfk_1` FOREIGN KEY (`idDom`) REFERENCES `domande` (`idDom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `tabelle`
--
ALTER TABLE `tabelle`
  ADD CONSTRAINT `fksezione` FOREIGN KEY (`idSez`) REFERENCES `sezioni` (`idSez`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabelle_ibfk_1` FOREIGN KEY (`idDia`) REFERENCES `diagnosi` (`idDia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
