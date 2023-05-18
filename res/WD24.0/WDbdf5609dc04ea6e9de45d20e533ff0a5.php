<?php
//24.0.30.0 FMK/Sql/HF.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 define('FMK_SQL_HF',true); if (!defined('__INC__FMK/Sql.php')) { define('__INC__FMK/Sql.php',true); include_once(WB_INCLUDE_PATH.'WD4b9c73b07be5742abf5273cd830e12f9.php'); } define("TAG_ANALYSE", "ANALYSE"); define("ATT_VERSIONSTRUCTURE", "VersionStructure"); define("TAG_CONNEXION", "CONNEXION"); define("TAG_SOURCE", "SOURCE"); define("TAG_USER", "USER"); define("TAG_MDP", "MDP"); define("TAG_DB", "DB"); define("TAG_FICHIER", "FICHIER"); define("TAG_RUBRIQUE", "RUBRIQUE"); define("TAG_RUB_NOM", "RUBRIQUE_NOM"); define("TAG_TYPE", "TYPE"); define("TAG_TAILLE", "TAILLE"); define("TAG_TYPE_CLE", "TYPE_CLE"); define("TAG_SENS", "SENS_PARCOURS"); define("TAG_CLE_COMP", "COMPOSEE"); define("TAG_COMPOSANTE", "COMPOSANTE"); define("TAG_INDICE_RUB", "INDICERUBRIQUE"); define("TAG_EXTENDED", "INFOS_ETENDUES"); define("TAG_MASQUE", "MASQUE"); define("ATT_NULL_SUPPORTE" , "FICNULLSUPPORTE");define("ATT_NOM_DANS_BDD" , "NomLogiqueDataBase");define("ATT_NOMPHYSIQUE" , "NOMPHYSIQUE"); define("ATT_NOM" , "NOM"); define("ATT_TYPE" , "TYPE"); define("ATT_VALEUR" , "VALEUR"); define("ATT_NULL" , "NULL"); define("ATT_NULL_RUB_SUPPORTE" , "RUBNULLSUPPORTE"); define("ATT_CONNEXION" , "CONNEXION"); define("ATT_ABREVIATION" , "ABREVIATION"); define ("NON_CLE", 0); define ("CLE_UNIQUE", 1); define ("CLE_AVEC_DOUBLON", 2); define ("CLE_PRIMAIRE", 3); define("TYPE_CHAINE", 2); define("TYPE_CARACTERE", 12); define("TYPE_MEMO_TEXTE", 29); define("TYPE_ENTIER_1", 4); define("TYPE_ENTIER_2", 3); define("TYPE_ENTIER_4", 5); define("TYPE_ENTIER_8", 25); define("TYPE_ENTIER_NON_SIGNE_1", 36); define("TYPE_ENTIER_NON_SIGNE_2", 9); define("TYPE_ENTIER_NON_SIGNE_4", 26); define("TYPE_ENTIER_NON_SIGNE_8", 27); define("TYPE_REEL_4", 6); define("TYPE_REEL_8", 7); define("TYPE_MONETAIRE", 17); define("TYPE_DATE", 14); define("TYPE_DATE_HEURE", 34); define("TYPE_DUREE", 35); define("TYPE_HEURE", 11); define("TYPE_BOOLEEN", 37); define("TYPE_BINAIRE", 28); define("TYPE_MEMO_BINAIRE", 30); define("TYPE_ID_AUTO", 24); define("TYPE_ID_AUTO_4", 38); define("TYPE_CLE_COMPOSEE", 99); define("TYPE_CALCULE", 100); define("TYPE_DECIMAL", 41); define("TYPE_UNICODE", 39); define("TYPE_MEMO_TEXTE_UNICODE", 40); define("PARCOURS_PREMIER_SUIVANT",1); define("PARCOURS_DERNIER_PRECEDENT",0); define("H_GENERIQUE", 4096); define("H_SANS_RAFRAICHIR", 8192); define("H_LIMITE_PARCOURS", 2097152); define("H_IDENTIQUE", 524288); define("H_RP_CONSERVE", 2); define("H_RP_FILTRE", 8); define("H_FIXE_ID_AUTO", 256); define("H_FORCE_ID_AUTO", 1024); define("H_ECRITURE_DEFAUT", 128); define("H_AFFECTE_PARCOURS", 64); define("H_NUM_EN_COURS", 0); define("H_ERR_BASE", 1083); define("H_ERR_COMPLET", 1089); define("H_ERR_FICHIER", 1071); define("H_ERR_INFO_CLIENT", 1090); define("H_ERR_INFO_SERVEUR", 1091); define("H_ERR_MESSAGE", 1070); define("H_ERR_MESSAGE_BASE", 1086); define("H_ERR_RUBRIQUE", 1072); define("H_ERR_WDD", 1073); define("H_RESPECTE_FILTRE", 16384); define("H_LST_DETAIL", 128); define("H_LST_NORMAL", 256); define("H_LST_OUVERT", 65536); define("H_LST_TOUT", 32); define("H_LST_TRIEE", 64); define("H_REQUETE_DEFAUT", 0); define("H_REQUETE_SANS_CORRECTION", 4); define("H_VAL_MIN", utf8_chr(0)); define("H_VAL_MAX", (UNICODE_PAGE_UTF8 ? (chr(0xEF).chr(0xBF).chr(0xBF)) : chr(0xFF))); define("TYPE_COMP_EGAL",1); define("TYPE_COMP_COMMENCE_PAR",2); define("TYPE_COMP_SUP",4); define("TYPE_COMP_INF",8); define("TYPE_COMP_SUP_EGAL",16); define("TYPE_COMP_INF_EGAL",32); define("TYPE_COMP_CONTIENT",64); define("CODE_ERR_PHP_MYSQL", 73002); define("SEPARATEUR_COMPOSANTE", utf8_chr(29)); define("SEPARATEUR_VALEUR", utf8_chr(31)); define("ID_CLE_COMP", utf8_chr(2)); define("WD_EXPRESSION", "WD_EXPRESSION"); class FMK_ErreurHF { var $sMessage = ""; var $sMessageBase = ""; var $nNumErreur = 0; var $sNomFichier = ""; var $sNomRubrique = ""; var $sNomFonction = ""; function FMK_ErreurHF($sMessage, $nNumErreur = 0, $sMessageBase="", $sFichier="", $sRubrique="") { $this->sMessage = $sMessage; if (utf8_strpos($sMessage,'Client does not support authentification protocol')!==false) { $sMessage .= RC . '(http://faq.pcsoft.fr/faqread.awp?idfaq=3432)'; } $this->nNumErreur = $nNumErreur; $this->sMessageBase = $sMessageBase; $this->sNomFichier = $sFichier; $this->sNomRubrique = $sRubrique; global $sLastFunction; $this->sNomFonction = $sLastFunction; } function F2479047c($sMessage) { $this->sMessageBase = $sMessage; } function F4125f3ee($sFichier) { $this->sNomFichier = $sFichier; } function F9387d660($sRubrique) { $this->sNomRubrique = $sRubrique; } function F4b3597dc() { $Fichier =& F80229053($this->sNomFichier,false,false); if (isset($Fichier)){ $gclContexteHF =& FMK_ContextHF(); $pclConnexion =& $gclContexteHF->getConnexion($Fichier->sNomConnexion); if (isset($pclConnexion)) { return $pclConnexion->F4b3597dc(); } } return null; } function F5218fab1() { $Fichier =& F80229053($this->sNomFichier,false,false); if (isset($Fichier)){ $gclContexteHF =& FMK_ContextHF(); $pclConnexion =& $gclContexteHF->getConnexion($Fichier->sNomConnexion); if (isset($pclConnexion)) { return $pclConnexion->F5218fab1(); } } return null; } } class FMK_WDR_CHARGEUR { var $m_tabInformationComplet; var $m_pclArbreRequete = null; function FMK_WDR_CHARGEUR($sNomWDR, $sCodeSQL = null,$nMode = null) { if (isset($nMode) && isset($sCodeSQL) && ($nMode==H_REQUETE_SANS_CORRECTION)) { $this->F9128fb85($sCodeSQL); return; } $sCheminFichierACP = WB_RES_DIR . F9486bf1a(F03771b65($sNomWDR)) . '.sql'; if (!isset($sCodeSQL) && file_exists($sCheminFichierACP)){ DebutErreurAttendue(); $this->m_tabInformationComplet = parse_ini_file( $sCheminFichierACP ,true); if ( ($this->m_tabInformationComplet ===false) || (!is_array($this->m_tabInformationComplet)) || (count($this->m_tabInformationComplet,COUNT_NORMAL)==0) ) { $this->F9128fb85($sCodeSQL); } else { if (isset($this->m_tabInformationComplet['CONFIG'])) { $bSansDoubleEscape = (!isset($this->m_tabInformationComplet['CONFIG']['DOUBLE_ESCAPE'])) ? ((version_compare(PHP_VERSION,'5.3')!==-1)) : ($this->m_tabInformationComplet['CONFIG']['DOUBLE_ESCAPE'] != 1); $bSansEncodage = (!isset($this->m_tabInformationComplet['CONFIG']['ENCODAGE'])) || ($this->m_tabInformationComplet['CONFIG']['ENCODAGE'] != 1); foreach (array_keys($this->m_tabInformationComplet) as $key) { if ($key === 'CONFIG') continue; if (!$bSansEncodage) { $this->m_tabInformationComplet[$key] = array_map('base64_decode',$this->m_tabInformationComplet[$key]); if (!UNICODE_PAGE_UTF8) $this->m_tabInformationComplet[$key] = array_map('_cp1252_utf8_to_iso',$this->m_tabInformationComplet[$key]); } if (!$bSansDoubleEscape) $this->m_tabInformationComplet[$key] = array_map('stripslashes',$this->m_tabInformationComplet[$key]); } } else { if ((version_compare(PHP_VERSION,'5.3')===-1)) { foreach (array_keys($this->m_tabInformationComplet) as $key) { $this->m_tabInformationComplet[$key] = array_map('stripslashes',$this->m_tabInformationComplet[$key]); } } } if (isset($nMode) && ($nMode==H_REQUETE_SANS_CORRECTION)) { FinErreurAttendue(); return; } if ($this->Fb96834e7()==0) { if ($this->F5b17b436() != '') { $this->Fc0095711(); } } } FinErreurAttendue(); } else { $this->F9128fb85($sCodeSQL); FMK_Charge('FMK/Pear/SQL/Parser.php',false); DebutErreurAttendue(); $clParser = new SQL_Parser(); $result = $clParser->F2e88eca8($sCodeSQL); FinErreurAttendue(); if (!is_array($result)) { $this->Fc0095711(); return; } $clContexte =& FMK_ContextHF(); if (isset($result['column_names'])) { $nNbFichiers = $this->m_tabInformationComplet['FICHIERS']['NB'] = count($result['table_names']); for($i=0; $i<$nNbFichiers; $i++) { $sFichier = $result['table_names'][$i]; $this->m_tabInformationComplet['FICHIERS']['FICHIER' . $i ] = $sFichier; if ($clContexte->bAnalyseChargee) { $sNomConnexionAssociee = $clContexte->Fbd5edfbf($sFichier); if (isset($sNomConnexionAssociee)) { $this->m_tabInformationComplet['FICHIERS']['FICHIERCONNEXION' . $i ] = $sNomConnexionAssociee; } } } } $nNbRubs = $this->m_tabInformationComplet['RUBRIQUES']['NB'] = count($result['column_names']); for($i=0; $i<$nNbRubs; $i++) { $this->m_tabInformationComplet['RUBRIQUES']['RUBRIQUE' . $i ] = $result['column_names'][$i]; $this->m_tabInformationComplet['RUBRIQUES']['FICHIER' . $i ] = ''; $this->m_tabInformationComplet['RUBRIQUES']['ALIAS' . $i ] = (isset($result['column_aliases'][$i])) ? $result['column_aliases'][$i] : $result['column_names'][$i]; } if (isset($result['sort_order'])) { $this->m_tabInformationComplet['TRIS']['NB'] = count($result['sort_order']); $i=0; foreach ($result['sort_order'] as $sNomRub => $sSens) { $this->m_tabInformationComplet['TRIS']['TRI' . $i ] = $sNomRub; $this->m_tabInformationComplet['TRIS']['SENS' . $i ] = utf8_strtoupper($sSens); ++$i; } } } } function Fc0095711($pszCodeSQL = null) { $sCodeSQL = (isset($pszCodeSQL)) ? $pszCodeSQL : $this->F5b17b436(); if(preg_match("/.+FROM\s(.+)((\s+(WHERE)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(GROUP BY)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(HAVING)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(UNION)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(ORDER BY)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(COMPUTE)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(FOR BROWSE)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(OPTION)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)((\s+(LIMIT)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+UPDATE\s(.+)((\s+(SET)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+UPDATE\s(.+)((\s+(WHERE)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+INSERT(\t|\s)+INTO\s(.+)((\s+(VALUES)\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+INSERT(\t|\s)+INTO\s(.+)((\s+(\()\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+ALTER(\t|\s)+TABLE\s(.+)((\s+(\()\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+DROP(\t|\s)+TABLE\s(.+)((\s+(\()\s.+))/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0 || preg_match("/.+FROM\s(.+)$/".UNICODE_REGEXP."i", $sCodeSQL, $result) > 0) { $sFROM = utf8_trim($result[1]); $tab = utf8_explode(',', $sFROM); $i=0; foreach($tab as $sNomFichier) { $sNomFichier = utf8_trim($sNomFichier,'`'); if ( utf8_strpos($sNomFichier,"JOIN") !== false) { $tabFrom = utf8_explode("JOIN ",$sNomFichier); foreach ($tabFrom as $cel) { $sFichierCourant = utf8_substr($cel,0,utf8_strpos($cel,' ')); $Fichier = &Fbad7a601(utf8_trim($sFichierCourant)); $this->m_tabInformationComplet['FICHIERS']['FICHIERCONNEXION' . $i ] = $Fichier->sNomConnexion; $this->m_tabInformationComplet['FICHIERS']['FICHIER' . $i ] = $Fichier->sNom; ++$i; } } else if(preg_match("/(.+)\s+AS\s+(.+)/".UNICODE_REGEXP."i", utf8_trim($sNomFichier), $result) > 0 || preg_match("/(.+)\s+(.+)/".UNICODE_REGEXP."i", utf8_trim($sNomFichier), $result) > 0) { $Fichier = &Fbad7a601(utf8_trim($result[1])); $this->m_tabInformationComplet['FICHIERS']['FICHIERCONNEXION' . $i ] = $Fichier->sNomConnexion; $this->m_tabInformationComplet['FICHIERS']['FICHIER' . $i ] = $Fichier->sNom; ++$i; } else { $Fichier = &Fbad7a601(utf8_trim($sNomFichier)); $this->m_tabInformationComplet['FICHIERS']['FICHIERCONNEXION' . $i ] = $Fichier->sNomConnexion; $this->m_tabInformationComplet['FICHIERS']['FICHIER' . $i ] = $Fichier->sNom; ++$i; } } $this->m_tabInformationComplet['FICHIERS']['NB' ] = $i; return true; } return false; } function F9128fb85($sCodeSQL = null) { $this->m_tabInformationComplet = array(); $this->m_tabInformationComplet['REQUETE'] = array(); $this->m_tabInformationComplet['REQUETE']['SQL'] = (isset($sCodeSQL)) ? $sCodeSQL : ''; $this->m_tabInformationComplet['PARAMETRES'] = array(); $this->m_tabInformationComplet['PARAMETRES']['NB'] = 0; $this->m_tabInformationComplet['FICHIERS'] = array(); $this->m_tabInformationComplet['FICHIERS']['NB'] = 0; $this->m_tabInformationComplet['RUBRIQUES'] = array(); $this->m_tabInformationComplet['RUBRIQUES']['NB'] = 0; $this->m_tabInformationComplet['TRIS'] = array(); $this->m_tabInformationComplet['TRIS']['NB'] = 0; } function& F7361f67d() { if (isset($this->m_pclArbreRequete)) return $this->m_pclArbreRequete; if (isset($this->m_tabInformationComplet['REQUETE']['ARBRE_CACHE'])) { if ( bReloadFrom($this->m_pclArbreRequete,$this->m_tabInformationComplet['REQUETE']['ARBRE_CACHE']) ) { return $this->m_pclArbreRequete; } } if (isset($this->m_tabInformationComplet['REQUETE']['ARBRE'])) { eval( $this->m_tabInformationComplet['REQUETE']['ARBRE'] ); $this->m_pclArbreRequete =& $clRequete; } return $this->m_pclArbreRequete; } function F1e28af81() { $nNbFichiers = $this->Fb96834e7(); if ($nNbFichiers===0){ return false; } $sPremiereConnexion = null; for($i=0; $i<$nNbFichiers; $i++) { $sConnexionCourante = $this->F78bc4cb0($i); if (!isset($sConnexionCourante) || ($sConnexionCourante=='')) { continue; } if ($sPremiereConnexion===null) {$sPremiereConnexion = $sConnexionCourante;} if (strcmp($sConnexionCourante,$sPremiereConnexion)!==0) { return false; } } return $sPremiereConnexion; } function F78bc4cb0( $i ) { $pclFichier =& F80229053($this->Fafa7a454($i),false,false); if (!isset($pclFichier) || empty($pclFichier->sNomConnexion)) { if (isset($this->m_tabInformationComplet['FICHIERS']['FICHIERCONNEXION' . $i])) { return $this->m_tabInformationComplet['FICHIERS']['FICHIERCONNEXION' . $i]; } } else { return $pclFichier->sNomConnexion; } return null; } function F5b17b436() { return $this->m_tabInformationComplet['REQUETE']['SQL']; } function Fe24f74db() { return (isset($this->m_tabInformationComplet['PARAMETRES']) && isset($this->m_tabInformationComplet['PARAMETRES']['NB'])) ? $this->m_tabInformationComplet['PARAMETRES']['NB'] : 0; } function F97b838ac($i) { return $this->m_tabInformationComplet['PARAMETRES']['PARAMETRE' . $i]; } function Fb96834e7() { return $this->m_tabInformationComplet['FICHIERS']['NB']; } function Fafa7a454($i) { return $this->m_tabInformationComplet['FICHIERS']['FICHIER' . $i]; } function Fd0a8b34d() { return $this->m_tabInformationComplet['RUBRIQUES']['NB']; } function F790930e8($i) { return $this->m_tabInformationComplet['RUBRIQUES']['RUBRIQUE' . $i]; } function F56263717($i) { return $this->m_tabInformationComplet['RUBRIQUES']['ALIAS' . $i]; } function F4b91a9e9($i) { return $this->m_tabInformationComplet['RUBRIQUES']['FICHIER' . $i]; } function F4d68ebe1() { return $this->m_tabInformationComplet['TRIS']['NB']; } function F4b258a96($i) { return $this->m_tabInformationComplet['TRIS']['TRI' . $i]; } function F3f046208($i) { return (isset($this->m_tabInformationComplet['TRIS']['SENS' . $i])) ? $this->m_tabInformationComplet['TRIS']['SENS' . $i] : 'ASC'; } function Fafdb1f0a($pclRubrique) { $nNbTris = $this->F4d68ebe1(); for($i=0; $i<$nNbTris; ++$i) if (utf8_strcasecmp($this->F4b258a96($i) , $pclRubrique->sNom ) === 0) return ($this->F3f046208($i) == 'ASC'); return null; } } ?>