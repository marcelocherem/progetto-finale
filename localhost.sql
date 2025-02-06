-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Gen 22, 2025 alle 11:28
-- Versione del server: 8.0.35
-- Versione PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto_finale`
--
DROP DATABASE IF EXISTS `progetto_finale`;
CREATE DATABASE IF NOT EXISTS `progetto_finale` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `progetto_finale`;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id_cat` int NOT NULL,
  `nome_cat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nome_cat`) VALUES
(1, 'Novita'),
(2, 'occhiali da sole'),
(3, 'occhiali da vista'),
(4, 'uomo'),
(5, 'donna'),
(6, 'sale'),
(7, 'unissex');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

DROP TABLE IF EXISTS `ordini`;
CREATE TABLE `ordini` (
  `id_ordine` int NOT NULL,
  `id_utente` int NOT NULL,
  `importo_ordine` float NOT NULL,
  `num_ordine` int NOT NULL,
  `status_ordine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_ordine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id_ordine`, `id_utente`, `importo_ordine`, `num_ordine`, `status_ordine`, `cur_ordine`) VALUES
(1, 2, 46.99, 1001, 'in attesa di pagamento', 'procedura'),
(2, 2, 25.33, 1002, 'cancellato', 'procedura'),
(3, 2, 92.52, 1003, 'Spedito', 'in_transito'),
(4, 2, 41.59, 1004, 'cancellato', 'cancellato');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
CREATE TABLE `prodotti` (
  `id_pdt` int NOT NULL,
  `nome_pdt` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr_breve` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezzo` float NOT NULL,
  `cat_pdt` int NOT NULL,
  `immagine` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_dettagliate` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantita_pdt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id_pdt`, `nome_pdt`, `descr_breve`, `prezzo`, `cat_pdt`, `immagine`, `info_dettagliate`, `quantita_pdt`) VALUES
(60, 'HAWKERS Occhiali da sole ACTIVE per uomini', 'In ONE DREAM, la nostra montatura più venduta di tutti i tempi è combinata con una lente a maschera senza montatura monopezzo. ', 28.99, 2, '../immagini/sole/glass01.jpg', 'In ONE DREAM, la nostra montatura più venduta di tutti i tempi è combinata con una lente a maschera senza montatura monopezzo. Questo modello oro miele trasparente presenta una lente effetto specchio oro. Modello unisex Lente polarizzata: riduce i riflessi superficiali e l\'affaticamento degli occhi fornendo nitidezza e contrasti superiori. Materiale delle lenti: Lente in policarbonato polarizzata che garantisce grande resistenza, ideale per l\'uso sportivo e per i bambini. Protezione UV 1%. Categoria filtro 3, colore abbastanza scuro da poter essere utilizzato all\'aperto in pieno sole. Assorbono tra l\'82% e il 92% della luce solare. Aspetto della lente: specchio Colore lente: oro Materiale del telaio: TR9 Colore montatura: Oro Colore asta: oro Misure: Frontale 142 mm, Aste 139,5 mm, Ponte 18,5 mm, Altezza 5,4 mm', 10),
(61, 'Hawkers Boost Occhiali Unisex-Adulto', 'Montatura squadrata nera e lenti specchiate verdi.', 29.74, 2, '../immagini/sole/glass02.jpg', 'Montatura squadrata nera e lenti specchiate verdi. Modello unisex Materiale lenti: lenti TR18 con sigillo Eastman, ottima qualità ottica e resistenza. Ecologico. Protezione UV 1%. Categoria filtro 3, colore abbastanza scuro da poter essere utilizzato all\'aperto in pieno sole. Assorbono tra l\'82% e il 92% della luce solare. Aspetto della lente: specchio Colore lente: verde Materiale del telaio: TR9 Colore montatura: nero Colore asta: nero Misure: Frontale 141,5 mm, Aste 14 mm, Ponte 14 mm, Altezza 43 mm', 198),
(62, 'X-LAB occhiali da sole 8004 stile moscot Occhiali da sole uomo Unisex', 'Occhiali da sole in acetato di cellulosa pantografata, materiale solido al tatto e nello stesso tempo di raffinata presentazione visiva .', 49.99, 2, '../immagini/sole/glass03.jpg', 'Occhiali da sole di classe superiore, realizzati con cura artigianale utilizzando acetato di cellulosa pantografato. Questo materiale pregiato è ottenuto da lastre di acetato di cellulosa che subiscono un processo di invecchiamento, seguito da una levigatura attenta per conferire un\'elegante lucentezza. La forma Pantos si presta a varie forme del viso, garantendo un equilibrio armonioso tra stile e funzionalità. Il modello 8004 incarna l\'eleganza senza tempo, adattandosi con grazia sia a lineamenti più delicati che a quelli più marcati. Il modello 8004 è disponibile in due taglie: S con diametro da 48mm e M con diametro da 50mm.', 54),
(63, 'XLAB Occhiali da sole mod. HOKKAIDO, Occhiali unisex', 'Occhiali da sole in acetato di cellulosa pantografata, materiale solido al tatto e nello stesso tempo di raffinata presentazione visiva.', 59.99, 2, '../immagini/sole/glass04.jpg', 'La montatura del modello Hokkaido è creata con precisione da lastre di acetato di cellulosa, un materiale che offre una solidità tangibile. Attraverso un processo di stagionatura e abile burattatura, ogni paio di occhiali brilla con una superficie lucida e vibrante. Questo tocco artigianale aggiunge un\'eleganza senza tempo, paragonabile ai migliori brand del settore eyewear.\r\n\r\nLa forma Pantos, versatile e alla moda, si adatta armoniosamente a varie forme del viso, offrendo un equilibrio tra stile e funzionalità. Disponibile in due taglie, S con un diametro da 47mm e M con un diametro da 49mm, per garantire la perfetta vestibilità.', 25),
(64, 'LINVO Occhiali da Sole da Uomo Donna Polarizzati Guida Protezione 100%', '100% PROTEZIONE UV400 E LENTI POLARIZZATE HD', 18.99, 2, '../immagini/sole/glass05.jpg', '100% PROTEZIONE UV400 E LENTI POLARIZZATE HD: Le lenti si avvalgono di una filtrazione a 9 strati leader nel settore. Il rivestimento di protezione UV400 può proteggere ottimamente i tuoi occhi bloccando al 100% i dannosi raggi UVA, UVB e UVC. Le lenti polarizzate HD possono filtrare i riflessi della luce solare e ridurre l\'affaticamento degli occhi. Restituisce il vero colore, elimina la luce riflessa e la luce diffusa, aiutandoti a vedere meglio.\r\nMATERIALI DI ALTA QUALITÀ: La montatura in PC premium con elevata resistenza agli urti e coefficiente di elasticità è più delicata per la pelle, leggera e durevole. Le lenti in PC di alta qualità sono resistenti agli urti e ai graffi. Il materiale PC è utilizzato ampiamente nel settore aerospaziale e militare e la sua forza è pari a 60 volte quella delle lenti in vetro, 20 volte quella delle lenti in TAC e 10 volte quella delle lenti in resina. È considerato il materiale più sicuro al mondo.\r\nSTILE CLASSICO: Occhiali dal design di marca classico, dalla montatura moderna ed ergonomica. Sono la scelta perfetta per tutti i giorni nonché una necessità delle celebrità. Indossali quando esci, sia che tu voglia guidare, viaggiare, pescare, fare escursioni, arrampicarti o altre attività all\'aperto, mostra semplicemente la tua personalità e il tuo fascino!\r\nCOMODI DA INDOSSARE: Lo speciale design ergonomico assicura un\'esperienza confortevole. Il materiale PC Premium rende la montatura piacevole e leggera. I naselli integrali sono a contatto con la superficie della pelle, quindi non scivolano facilmente e non esercitano alcuna pressione. Il vantaggio è una forma particolarmente stabile, poiché la forza esterna non può deformarli facilmente. Speriamo che questi possano offrirti una sensazione unica indossandoli!\r\nSODDISFAZIONE GARANTITA: LINVO fornisce un servizio post-vendita senza pensieri ai nostri clienti. Poniamo grande attenzione all\'esperienza d\'acquisto dei clienti. In caso di problemi, contatta il nostro servizio clienti in qualsiasi momento e ti aiuteremo a risolvere il problema finché non sarai soddisfatto. Siamo al tuo servizio, ovunque!', 64),
(65, 'Occhiali da Sole POLAROID PLD 2050/S 807 BLACK 55/15/140 Uomo\r\n', 'Gli occhiali da sole polarizzati hanno un filtro che riduce l\'abbagliamento da superfici riflettenti, offendo una visione più rilassata quando sei all\'esterno.', 30.72, 2, '../immagini/sole/glass06.jpg', '…Tutto è iniziato nel 1929, con Edwin H. Land, il nostro coraggioso e carismatico fondatore. Alla giovane età di 20 anni, Land ha brevettato il primo materiale polarizzante sintetico al mondo per uso commerciale. 8 anni dopo nasce Polaroid, l\'inventore delle lenti polarizzate originali.\r\n\r\nNel corso dei decenni, gli occhiali Polaroid hanno sempre avuto un ruolo pionieristico e la tecnologia rivoluzionaria di Land rimane alla base di tutti gli occhiali polarizzati, di lenti fotografiche e gli schermi.', 16),
(66, 'ZENOTTIC Occhiali da Sole Polarizzati per Donne Protezione UV400', 'Protezione UV400: Le lenti polarizzate bloccano il 100% dei dannosi raggi UVA, UVB e UVC fino a 400 nm. ', 21.99, 2, '../immagini/sole/glass07.jpg', 'Protezione UV400: Le lenti polarizzate bloccano il 100% dei dannosi raggi UVA, UVB e UVC fino a 400 nm. Ripristinano il vero colore, eliminano la luce riflessa o dispersa, migliorano il contrasto. Le lenti polarizzate TAC sono resistenti agli urti e ai graffi, leggere e durevoli.\r\nMontatura con Occhi di Gatto alla Moda: Gli occhiali da sole con montatura cateye, unici e classici, con una forma morbida, rappresentano un\'interpretazione moderna dello stile classico cateye. Gli occhiali cateye lasceranno un\'impressione sorprendente e duratura. Questo è un accessorio indispensabile per chi cerca moda ed eleganza.\r\nPerfetto Poliedrico: Questi occhiali da sole sono la scelta perfetta per attività all\'aperto come guidare, pescare, fare shopping, viaggiare, pedalare, andare in barca e sono adatti come accessorio di alta moda e per l\'uso quotidiano in ogni stagione dell\'anno. Questi occhiali da sole sono adatti agli stili degli anni \'70, \'80 e \'90.\r\nDimensioni del Prodotto: Larghezza della lente: 55mm | Altezza della lente: 48mm | Ponte nasale: 19mm | Larghezza della montatura: 132mm | Lunghezza del tempio: 140mm.\r\nPacchetto Idee Regalo: Occhiali da sole*1, custodia in microfibra*1, carta di test polarizzata*1, scatola per occhiali*1. È anche pronto per essere regalato, rendendolo un\'idea regalo meravigliosa e al contempo pratica per amici e familiari!', 38),
(67, 'Long Keeper Occhiali da Sole Rettangolari Vintage Donna', 'Long Keeper si concentra sempre sul design, segue la tendenza della moda moderna e si dedica a portare al nostro più caro cliente gli occhiali da sole di alta qualità alla moda, belli e funzionali.', 11.99, 2, '../immagini/sole/glass08.jpg', 'Long Keeper si concentra sempre sul design, segue la tendenza della moda moderna e si dedica a portare al nostro più caro cliente gli occhiali da sole di alta qualità alla moda, belli e funzionali. Forniamo diversi stili di occhiali da sole con più colori per soddisfare le tue esigenze personalizzate, mentre per l\'uso quotidiano forniamo anche una protezione a tutto tondo con un aspetto eccezionale.\r\n\r\nCon leggerezza, comfort per adattarsi alle tue attività all\'aperto, i nostri occhiali da sole rettangolari alla moda possono filtrare efficacemente i dannosi raggi UVA e UVB. E non ci concentriamo solo sulla funzione di protezione, ma perseguiamo anche l\'aspetto alla moda, queste tonalità alla moda danno un aspetto vintage alla moda proteggendo gli occhi dai raggi ultravioletti a lungo termine.', 85),
(68, 'Tommy Hilfiger Occhiali da Sole Uomo', 'TOMMY HILFIGER è uno dei più importanti brand di lifestyle al mondo.', 65.45, 2, '../immagini/sole/glass09.jpg', 'TOMMY HILFIGER è uno dei più importanti brand di lifestyle al mondo. Fondato nel 1985, Tommy Hilfiger offre a consumatori di tutto il mondo stile, qualità e valori di prima qualità. Le montature di Tommy Hilfiger hanno uno design inconfondibile, che possa riflettere lo stile di vita di chi li indossa. Le collezioni Eyewear presentano dettagli moderni per le montature, unendo la che uniscono i grandi spazi aperti con l\'iconica tradizione americana di Tommy Hilfiger. La selezione di occhiali da sole e montature da vista si basa su combinazioni di colori urbani e stili audaci.', 53),
(69, 'Hawkers Occhiali da sole WARWICK per uomini e donne', 'Il nostro iconico e sempre popolare design Warwick, con le sue lenti arrotondate e il ponte a forma di buco della serratura...', 39.99, 2, '../immagini/sole/glass10.jpg', 'Il nostro iconico e sempre popolare design Warwick, con le sue lenti arrotondate e il ponte a forma di buco della serratura, è ora realizzato nella nostra prima fabbrica in Spagna utilizzando le ultime tecnologie, risultando in una montatura ancora più leggera e resistente. Presentazione RAW, la nostra prima collezione con marchio di qualità Made In Spain. Questo modello dispone di lenti polarizzate.\r\nOcchiali da sole polarizzati: offre una visione senza riflessi e contrasto naturale dei colori. Lenti categoria 3 realizzate con materiale bio tac polarizzato e protezione UV400.\r\nOcchiali da sole realizzati in TR90 con sigillo EMS, considerato il miglior nylon per montature al mondo che offre maggiore flessibilità e resistenza. Cerniera a doppia azione per una chiusura sicura e durevole. Design più ampio del terminale della base per migliorare l\'ergonomia e il comfort\r\nProdotto ufficiale Hawkers. Include: custodia in microfibra e scatola.\r\nModello unisex. Dimensioni: frontale 142 mm; aste 140 mm; ponte 20 mm; diametro lente 51,9 mm', 13),
(70, 'FOURCHEN Occhiali da sole quadrati oversize per donne uomini', 'Occhiali da sole alla moda con lenti siamesi, da donna e da uomo, design unico di alta qualità, design senza cornice, lenti a specchio...', 14.99, 2, '../immagini/sole/glass11.jpg', 'Occhiali da sole alla moda con lenti siamesi, da donna e da uomo, design unico di alta qualità, design senza cornice, lenti a specchio, cerniere in metallo solido, aste squisite e tutti i dettagli rendono questi occhiali da sole abbastanza resistenti per un uso prolungato e garantiscono prestazioni perfette.\r\nLenti UV400: questi occhiali da sole possono bloccare il 100% dei raggi UVA e UVB. Ripristina il vero colore, elimina la luce riflessa e la luce diffusa e protegge perfettamente gli occhi.\r\nQuesti occhiali da sole alla moda sono progettati per camminare, viaggiare, scattare foto ed è adatto come accessorio di alta moda e abbigliamento quotidiano.\r\nLunghezza del tempio: 141 mm. Ponte del naso: 18 mm, Lunghezza totale telaio: 142 mm. La misurazione manuale, la ricevuta in natura prevalgono.', 32),
(71, 'MG.Haus Occhiali da Sole Rettangolari Vintage Donna', 'MATERIALE: questi occhiali da sole rettangolari retrò sono realizzati in plastica PC di alta qualità, ecologica e delicata sulla pelle.', 16.99, 6, '../immagini/sale/glass01.jpg', '\r\nMATERIALE: questi occhiali da sole rettangolari retrò sono realizzati in plastica PC di alta qualità, ecologica e delicata sulla pelle. Gli occhiali da sole rettangolari sono realizzati in policarbonato di alta qualità, ultraleggeri, flessibili ma resistenti e durevoli.\r\nLENTE DI PROTEZIONE UV400: gli occhiali da sole quadrati vintage possono proteggere gli occhi dai danni UV a lungo termine, scelta perfetta per attività all\'aperto come guidare, pescare, viaggiare, ecc.\r\nDIMENSIONE OCCHIALI DA SOLE: La lunghezza della montatura è 147 mm, l\'altezza della montatura è 40 mm, la larghezza dell\'obiettivo è 61 mm, la larghezza del ponte nasale è 21 mm, la lunghezza della gamba è 136 mm, 5,35 pollici.\r\nDESIGN VINTAGE - Il design semplice e compatto non solo rende la montatura spessa molto delicata, ma anche la montatura rettangolare rende l\'aspetto generale degli occhiali da sole retrò.\r\nAMPIO UTILIZZO: gli occhiali da sole rettangolari sono adatti per accessori di fascia alta e per l\'uso quotidiano. È la scelta perfetta per fare shopping, viaggiare, scattare foto, festeggiare, ballare, camminare, guidare, pescare, andare in bicicletta e così via.', 22),
(72, 'SOJOS Occhiali da sole Donna Uomo Retrò Ovale Metallo', 'Questi occhiali da sole SOJOS per uomo e donna sono dotati di lenti HD che riducono il riverbero del sole e proteggono gli occhi dai pericolosi raggi UVA e UVB per evitare danni a lungo termine.\r\n', 19.99, 6, '../immagini/sale/glass02.jpg', '[Lenti ad alta definizione UV400] Questi occhiali da sole SOJOS per uomo e donna sono dotati di lenti HD che riducono il riverbero del sole e proteggono gli occhi dai pericolosi raggi UVA e UVB per evitare danni a lungo termine.\r\n[Occhiali da sole alla moda] Questi occhiali da sole ovali di tendenza sono pensati per uomini e donne che apprezzano stile e individualità. A partire dal caratteristico frontale e dalle lenti leggermente avvolgenti. Lasciate trasparire il vostro senso di stile unico.\r\n[Ideale per l\'outdoor] Per le attività all\'aperto come scattare selfie, fare shopping, guidare, viaggiare, andare in bicicletta, arrampicarsi e pescare, questi occhiali da sole ovali retrò di SOJOS sono la scelta ideale. Sono ottimi anche come accenti e come abbigliamento quotidiano per tutto l\'anno.', 66),
(73, 'Occhiali da Sole POLAROID PLD 1013/S V08 HAVANA 50/22/150 Uomo', 'Gli occhiali da sole polarizzati hanno un filtro che riduce l\'abbagliamento da superfici riflettenti, offendo una visione più rilassata quando sei all\'esterno.', 26.99, 6, '../immagini/sale/glass03.jpg', '…Tutto è iniziato nel 1929, con Edwin H. Land, il nostro coraggioso e carismatico fondatore. Alla giovane età di 20 anni, Land ha brevettato il primo materiale polarizzante sintetico al mondo per uso commerciale. 8 anni dopo nasce Polaroid, l\'inventore delle lenti polarizzate originali.\r\n\r\nNel corso dei decenni, gli occhiali Polaroid hanno sempre avuto un ruolo pionieristico e la tecnologia rivoluzionaria di Land rimane alla base di tutti gli occhiali polarizzati, di lenti fotografiche e gli schermi.\r\n\r\nOggi Polaroid produce due linee di lenti polarizzate:\r\n\r\n\r\nLENTI TERMOFORMATE composte da 9 strati di plastica, ciascuno pensato per garantire protezione, colore, filtraggio della luce e polarizzazione.\r\nLENTI INIETTATE con grande precisione ottica ed estrema resistenza agli urti.', 64),
(88, 'wearPro Occhiali da sole pilota polarizzati per uomini e donne', 'I nostri occhiali da sole polarizzati da uomo sono realizzati con lenti TAC, che sono di alta qualità!', 19.99, 6, '../immagini/sale/glass04.jpg', '[Protezione da polarizzazione TAC] I nostri occhiali da sole polarizzati da uomo sono realizzati con lenti TAC, che sono di alta qualità! Robusto, resistente ai graffi e agli urti. Gli occhiali polarizzati possono ridurre l\'abbagliamento riflesso da strade, corpi idrici, neve e altre superfici orizzontali, proteggere gli occhiali dalla luce solare diretta durante le attività all\'aperto e convertire la luce disordinata in luce parallela.\r\n[Materiale di alta qualità] Gli occhiali da sole rotondi da uomo stile Hippie sono fatti di montatura metallica leggera, che è confortevole e in forma. Il design flessibile della cerniera metallica consente di regolare le braccia per adattarsi a diverse dimensioni della testa e forme del viso.\r\n[Fashion design] Occhiali polarizzati rotondi, naselli regolabili che non sono facili da cadere, cerniere elastiche sicure e confortevoli e stile Cyberpunk leggero ed elegante. In particolare, al telaio metallico viene aggiunta una cerniera elastica migliorata a molla, che può espandersi di circa 20 ° a seconda dei diversi tipi di superficie. È durevole e flessibile in contrazione.', 43),
(89, 'ATTCL, Occhiali da sole polarizzati da uomo con protezione UV', 'Lenti UV polarizzate avanzate: prova la massima protezione per gli occhi con i nostri occhiali da sole con lenti con rivestimento UV400 di alta qualità che bloccano efficacemente i raggi UVA, UVB e UVC fino a 400 nm.', 27.99, 6, '../immagini/sale/glass05.jpg', 'Lenti UV polarizzate avanzate: prova la massima protezione per gli occhi con i nostri occhiali da sole con lenti con rivestimento UV400 di alta qualità che bloccano efficacemente i raggi UVA, UVB e UVC fino a 400 nm. Le lenti TAC polarizzate migliorano la chiarezza della visuale, riducono i riflessi e migliorano i contrasti. Progettati per resistere agli urti, leggeri e resistenti, garantiscono una protezione per gli occhi affidabile durante tutte le attività all\'aperto.\r\nArtigianato italiano di prima qualità: abbraccia lo stile e il comfort della nostra montatura TR90 esagonale realizzata con precisione. Combinando il design italiano e la tecnologia avanzata, offre resistenza e una vestibilità comoda. Il design del nasello monopezzo garantisce una vestibilità sicura che non causa pressione, anche durante un uso prolungato.\r\nVersatili e sportivi: migliora il tuo stile per svolgere qualsiasi attività. I nostri occhiali da sole esagonali aggiungono un tocco alla moda e sportivo a qualsiasi outfit, adatti per guida, pesca, trekking, sci, ecc. Sono un regalo perfetto per appassionati di moda di tutte le età.\r\n', 32),
(90, 'Hawkers Occhiali da sole ONE POLARIZED per uomini e donne', 'Occhiali da Sole polarizzati: dotano di una visione senza riflessi, e un contrasto naturale di colori', 27.79, 6, '../immagini/sale/glass06.jpg', '\r\nONE, il nostro modello di occhiali da sole più iconico e più venduto di sempre, ora viene prodotto nella nostra prima fabbrica in Spagna con l\'aiuto delle ultime tecnologie e il risultato è una montatura ancora più leggera e resistente. Vi presentiamo RAW, la nostra prima collezione con il marchio di qualità Made In Spain. Questo modello presenta un\'elevata brillantezza, una montatura nera e delle lenti scure POLARIZZATE.\r\nOcchiali da Sole polarizzati: dotano di una visione senza riflessi, e un contrasto naturale di colori\r\nOcchiali da sole realizzati in TR90 con sigillo EMSCH, considerato un\'ottimo Nylon per montature al mondo che offre un\'ottima flessibilità e resistenza. Design della punta delle tempie più ampio per un\'ottima l\'ergonomia e il comfort e cerniera a doppia azione per fornire un supporto ottimo in ogni momento\r\nProdotto ufficiale HAWKERS progettato e fabbricato in SPAGNA. Include: copertura in microfibra. Scatola e set di adesivi decorativi\r\nModello unisex. Dimensioni: frontale 141 mm; aste 140 mm; ponte 17 mm; diametro lente 55,7 mm', 78),
(91, 'ZENOTTIC Occhiali da Sole Polarizzati Retrò Classici Rotondi Vintage', 'Montatura Robusta: La montatura in PC ad alta resistenza garantisce l\'integrità e una forte resistenza alla compressione in caso di caduta', 15.99, 6, '../immagini/sale/glass07.jpg', 'Lenti con protezione UV: Questi occhiali da sole con lenti polarizzate sono realizzati in materiale TAC, possono bloccare il 100% dei raggi UV e offrono un\'ottima protezione per gli occhi\r\nStile retrò classico: Stile retrò rotondo unisex, 6 diversi colori alla moda, la forma classica è adatta per tutte le età e tutte le forme di viso\r\nMontatura Robusta: La montatura in PC ad alta resistenza garantisce l\'integrità e una forte resistenza alla compressione in caso di caduta\r\nAccessori: Includono borsetta per occhiali e la bellissima confezione di cartone\r\nShopping senza preoccupazioni: Se avete domande o dubbi, non esitate a contattarci via e-mail. Siamo dedicati a servirvi\r\n', 12),
(92, 'OJIRRU Occhiali da sole da uomo', 'Le lenti polarizzate con proprietà di polarizzazione eliminano efficacemente la luce riflessa e la luce diffusa, bloccando al contempo i pericolosi raggi UV.', 17.99, 6, '../immagini/sale/glass08.jpg', 'LENTI POLARIZZATE - Le lenti polarizzate con proprietà di polarizzazione eliminano efficacemente la luce riflessa e la luce diffusa, bloccando al contempo i pericolosi raggi UV. In questo modo, gli occhiali eviteranno l’affaticamento degli occhi in presenza di forti fonti di luce e miglioreranno la chiarezza visiva, offrendo ai tuoi occhi una protezione duratura e affidabile.\r\nPROTEZIONE UV400 OCCHIALI SPORTIVI - I nostri occhiali da sole possono bloccare più del 90% dei raggi UV e possono ridurre efficacemente la trasmittanza della luce. Per quanto riguarda i raggi UV del valore di 400nm o inferiore, la trasmittanza della luce può essere limitata al 5% o meno. Una minore esposizione ai raggi UV ti protegge da malattie degli occhi come cataratta, congiuntivite corneale, retinite ecc. I occhiali da sole polarizzati perfetti sia per uomo che per donna.\r\nMONTATURA AVANZATA E LEGGERA - La montatura degli occhiali da sole sportivi è professionalmente ideata per adattarsi alle forme del tuo viso e ciò può proteggere gli occhi da vento o da altri corpi estranei durante le attività all’aperto in maniera efficace. Il materiale delle lenti polarizzate e la flessibilità della montatura sono stati attentamente pensati per evitare qualsiasi danno indesiderato durante il tuo esercizio.\r\nOCCHIALI DA SOLE POLARIZZATI ALLA DUREVOLI - Capiamo bene che qualsiasi peso extra durante le attività sportive può causare conseguenze successive e cumulative ai risultati. Per affrontare questo problema, abbiamo scelto per i nostri occhiali sportivi, adatti sia alle donne che agli uomini ideali per pesca, canottaggio, guida, ciclismo, attività fisica, navigazione, vita quotidiana e varie altre occasioni.\r\nECCEZIONALE PER LE ATTIVITÀ ALL\'APERTO - Mentre il design leggero si adatta comodamente al viso, le gambe degli occhiali da sole sportivi appositamente progettati si adattano perfettamente alle orecchie negli sport per uomini e donne, il che gli consente un paio di occhiali da sole ideali per correre, andare in bicicletta, camminare, moto, bicicletta, cricket, guida, pesca, corsa, arrampicata, golf o altre attività all\'aperto', 53),
(93, 'YAMEIZE Rettangolari Quadrati Occhiali da Sole-da Uomo', 'Gli occhiali da sole rettangolo sono anti-abbagliamento, non solo possono prevenire le radiazioni UVA UVB per proteggere gli occhi, ma anche fornire una visione chiara', 13.99, 6, '../immagini/sale/glass09.jpg', '[PROTEZIONE UV400] Gli occhiali da sole rettangolo sono anti-abbagliamento, non solo possono prevenire le radiazioni UVA UVB per proteggere gli occhi, ma anche fornire una visione chiara\r\n[MATERIALI DI ALTA QUALITÀ] Questi occhiali da sole vintage sono fatti di qualità durevole e cerniere rinforzate, combinati con design unico delle aste, forniscono usura senza bava per lungo tempo\r\n[SQUARE FRAME DESIGN] Gli occhiali da sole moda anni \'90 utilizzano il design della montatura spessa, si adatta alla curva del viso. Il design retrò è facile da abbinare con il vostro vestito, evidenziare il vostro fascino e alla moda nel corvo\r\n[ADATTO A QUALSIASI OCCASIONE] Gli occhiali da sole donna alla moda sono adatti a qualsiasi occasione, come il partito, Raving, Club, abbigliamento quotidiano, fotografia, guida, ciclismo, pesca, golf, travaglio, escursionismo e così via. Gli occhiali da sole party sono anche una buona scelta come regalo per la famiglia e gli amici\r\n[TAGLIA SOLARE & PACCHETTO] Len altezza: 38 mm (1.5 inch), Len larghezza: 54 mm (2.13 inch), larghezza ponte: 18 mm (0.71 inch), larghezza telaio: 147 mm (5.79 inch), lunghezza gamba: 146 mm (5.75 inch).Il PACCHETTO COMPRENDE: 1 panno per la pulizia & 1 borsa morbida per occhiali da sole & 1 occhiali da sole quadrati YAMEIZE', 86),
(94, 'Vans Spicoli 4 Shades, Occhiali da sole', 'I nostri occhiali da sole polarizzati da uomo sono realizzati con lenti TAC, che sono di alta qualità!', 19.29, 6, '../immagini/sale/glass10.jpg', 'LENTI POLARIZZATE - Le lenti polarizzate con proprietà di polarizzazione eliminano efficacemente la luce riflessa e la luce diffusa, bloccando al contempo i pericolosi raggi UV. In questo modo, gli occhiali eviteranno l’affaticamento degli occhi in presenza di forti fonti di luce e miglioreranno la chiarezza visiva, offrendo ai tuoi occhi una protezione duratura e affidabile.\r\nPROTEZIONE UV400 OCCHIALI SPORTIVI - I nostri occhiali da sole possono bloccare più del 90% dei raggi UV e possono ridurre efficacemente la trasmittanza della luce. Per quanto riguarda i raggi UV del valore di 400nm o inferiore, la trasmittanza della luce può essere limitata al 5% o meno. Una minore esposizione ai raggi UV ti protegge da malattie degli occhi come cataratta, congiuntivite corneale, retinite ecc. I occhiali da sole polarizzati perfetti sia per uomo che per donna.\r\nMONTATURA AVANZATA E LEGGERA - La montatura degli occhiali da sole sportivi è professionalmente ideata per adattarsi alle forme del tuo viso e ciò può proteggere gli occhi da vento o da altri corpi estranei durante le attività all’aperto in maniera efficace. Il materiale delle lenti polarizzate e la flessibilità della montatura sono stati attentamente pensati per evitare qualsiasi danno indesiderato durante il tuo esercizio.\r\nOCCHIALI DA SOLE POLARIZZATI ALLA DUREVOLI - Capiamo bene che qualsiasi peso extra durante le attività sportive può causare conseguenze successive e cumulative ai risultati. Per affrontare questo problema, abbiamo scelto per i nostri occhiali sportivi, adatti sia alle donne che agli uomini ideali per pesca, canottaggio, guida, ciclismo, attività fisica, navigazione, vita quotidiana e varie altre occasioni.\r\nECCEZIONALE PER LE ATTIVITÀ ALL\'APERTO - Mentre il design leggero si adatta comodamente al viso, le gambe degli occhiali da sole sportivi appositamente progettati si adattano perfettamente alle orecchie negli sport per uomini e donne, il che gli consente un paio di occhiali da sole ideali per correre, andare in bicicletta, camminare, moto, bicicletta, cricket, guida, pesca, corsa, arrampicata, golf o altre attività all\'aperto', 62);

-- --------------------------------------------------------

--
-- Struttura della tabella `rapporti`
--

DROP TABLE IF EXISTS `rapporti`;
CREATE TABLE `rapporti` (
  `id_rapporto` int NOT NULL,
  `id_pdt` int NOT NULL,
  `id_ordine` int NOT NULL,
  `nome_pdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezzo` float NOT NULL,
  `quantita_pdt` int NOT NULL,
  `status_ordine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `rapporti`
--

INSERT INTO `rapporti` (`id_rapporto`, `id_pdt`, `id_ordine`, `nome_pdt`, `prezzo`, `quantita_pdt`, `status_ordine`) VALUES
(1, 4, 2, 'test', 12, 2, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

DROP TABLE IF EXISTS `utenti`;
CREATE TABLE `utenti` (
  `id_utente` int NOT NULL,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datanasc` date DEFAULT NULL,
  `via` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numciv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cap` int DEFAULT NULL,
  `citta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regione` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruolo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `username`, `firstname`, `surname`, `datanasc`, `via`, `numciv`, `cap`, `citta`, `regione`, `password`, `ruolo`) VALUES
(1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(2, 'test', NULL, 'test', '2000-09-12', 'via test', '12', 25321, 'citta test', 'sud', 'test', 'utente'),
(10, 'm.bianchi', 'Marco', 'Bianchi', '1985-04-12', 'Via Roma', '10', 100, 'Roma', 'Lazio', 'password1', 'utente'),
(11, 'g.rossi', 'Giulia', 'Rossi', '1990-07-23', 'Via Milano', '25', 20100, 'Milano', 'Lombardia', 'password2', 'utente'),
(12, 'l.verdi', 'Luca', 'Verdi', '1978-11-05', 'Via Torino', '34', 10100, 'Torino', 'Piemonte', 'password3', 'utente'),
(13, 'm.russo', 'Maria', 'Russo', '1982-02-14', 'Via Firenze', '15', 50100, 'Firenze', 'Toscana', 'password4', 'utente'),
(14, 'd.conti', 'Davide', 'Conti', '1993-09-30', 'Via Bologna', '5', 40100, 'Bologna', 'Emilia-Romagna', 'password5', 'utente'),
(15, 'f.gallo', 'Francesca', 'Gallo', '1988-05-16', 'Via Venezia', '22', 30100, 'Venezia', 'Veneto', 'password6', 'utente'),
(16, 'a.ferrari', 'Alessandro', 'Ferrari', '1975-08-19', 'Via Napoli', '7', 80100, 'Napoli', 'Campania', 'password7', 'utente'),
(17, 'e.colombo', 'Elisa', 'Colombo', '1995-12-03', 'Via Genova', '18', 16100, 'Genova', 'Liguria', 'password8', 'utente'),
(18, 'm.esposito', 'Matteo', 'Esposito', '1987-10-25', 'Via Siena', '2', 53100, 'Siena', 'Toscana', 'password9', 'utente'),
(19, 'l.romano', 'Laura', 'Romano', '1992-03-08', 'Via Palermo', '30', 90100, 'Palermo', 'Sicilia', 'password10', 'utente'),
(20, 'marcelocherem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'senha123', 'admin'),
(21, 'joseesempio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'senha321', 'utente'),
(22, 'matilde', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'schifosa', 'utente');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id_ordine`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id_pdt`);

--
-- Indici per le tabelle `rapporti`
--
ALTER TABLE `rapporti`
  ADD PRIMARY KEY (`id_rapporto`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id_ordine` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id_pdt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT per la tabella `rapporti`
--
ALTER TABLE `rapporti`
  MODIFY `id_rapporto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
