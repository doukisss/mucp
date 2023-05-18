<?php
//24.0.30.0 TYPE/Date.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 if (!defined('__INC__TYPE/Modele.php')) { define('__INC__TYPE/Modele.php',true); include_once(WB_INCLUDE_PATH.'WD6ee9539c0ad66df976b95a68703645fb.php'); } if (!defined('__INC__FMK/Date.php')) { define('__INC__FMK/Date.php',true); include_once(WB_INCLUDE_PATH.'WD97af71f4453b9d548e8ff90b4bbaba9f.php'); } if (!defined('__INC__FMK/Date/Duree.php')) { define('__INC__FMK/Date/Duree.php',true); include_once(WB_INCLUDE_PATH.'WD6d1d70fd32a89f3c5df66eb4471caef2.php'); } class CHeure extends CTypeComparable { var $m_nHeure = null; var $m_nMinute = null; var $m_nSeconde = null; var $m_nMilliseconde = null; function CHeure($valeur=null) { parent::CTypeAvecPropriete($valeur); } function Maintenant(&$pclMaintenant) { return $pclMaintenant->Fe630dfec(); } function Fb4045538() {return true;} function F321fae39() {return true;} function F1b8e122c($Valeur) { if (is_object($Valeur)) { if ($Valeur->m_nIsXXX == 32) { return $this->F1b8e122c($Valeur->F92cbba97($this)); } switch( $Valeur->__GetType()) { case TYPEWL_HEURE: case TYPEWL_DATEHEURE: $Retour = new FMK_Date($Valeur->m_Valeur->Fff545aaa(),'HHmmssLLL'); default : return $this->F1b8e122c($Valeur->GetValeur()); } } elseif ( is_string($Valeur)) { if (strpos($Valeur,'-') !== false) { $Retour = new FMK_Date($Valeur,'ISO8601'); return $Retour; } $sFormat=''; $nTaille = utf8_strlen($Valeur); if ($nTaille >= 2) { $sFormat.='HH'; } if ($nTaille >= 4) { $sFormat.='mm'; } if ($nTaille >= 6) { $sFormat.='ss'; } if ($nTaille >= 8) { $sFormat.='LL'; } if ($nTaille >= 9) { $sFormat.='L'; $Valeur = utf8_substr($Valeur,0,9); } $Retour = new FMK_Date($Valeur,$sFormat); } elseif ( is_integer($Valeur)) { $Retour = new FMK_Date('000000000','HHmmssLLL'); $Retour->setMilliseconde($Valeur * 10); } else { $clContexte =& FMK_Contexte(); $sHeureDefaut=$clContexte->F239ddeda(Fd7624002('HeureParDéfaut')); if (!isset($sHeureDefaut)) $sHeureDefaut = date('His'). (round(floatval(microtime())*1000,0)); $Retour = new FMK_Date($sHeureDefaut,'HHmmssLLL',true); } return $Retour; } function& __GetType() { $t = TYPEWL_HEURE; return $t; } function F98b975d6() { $this->m_nHeure = (int)$this->m_Valeur->getHeure(); $this->m_nMinute = (int)$this->m_Valeur->getMinute(); $this->m_nSeconde = (int)$this->m_Valeur->getSeconde(); $this->m_nMilliseconde = (int)$this->m_Valeur->getMilliseconde(); } function& GetHeure(){ return $this->m_nHeure;} function SetHeure($valeur) { $clNbJours = intval($valeur); $this->m_Valeur->setHeure($clNbJours); $this->F98b975d6(); } function& GetMinute(){ return $this->m_nMinute;} function SetMinute($valeur) { $clNbJours = intval($valeur); $this->m_Valeur->setMinute($clNbJours); $this->F98b975d6(); } function& GetSeconde(){ return $this->m_nSeconde;} function SetSeconde($valeur) { $clNbJours = intval($valeur); $this->m_Valeur->setSeconde($clNbJours); $this->F98b975d6(); } function& GetMilliseconde(){ return $this->m_nMilliseconde;} function SetMilliseconde($valeur) { $clNbJours = intval($valeur); $this->m_Valeur->setMilliseconde($clNbJours); $this->F98b975d6(); } function& GetValeur() { $Retour = $this->m_Valeur->Fff545aaa(); return $Retour; } function SetValeur($val) { $this->m_Valeur = $this->F1b8e122c($val); $this->F98b975d6(); } function& Fcc4f5b5d($comparaison) { $this->SetValeur($comparaison); return $this->GetValeur(); } function& F791b7c6d($param=null) { if (!isset($param)) { return $this->GetValeur(); } switch ($param->__GetType()) { case TYPEWL_DATE : case TYPEWL_HEURE : case TYPEWL_DATEHEURE : $Retour = $this->Fc424b461() . $param->Fc424b461(); break; case TYPEWL_DUREE : case TYPEWL_ENTIER : $this->m_Valeur->F265229a9($param->m_Valeur); $Retour = $this->Fc424b461(); break; default: $Retour = $this->Fc424b461() . $param->Fc424b461(); break; } return $Retour; } function& F66d4f961($param=null) { if (!isset($param)) { Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('OPERATEUR_INDISPONIBLE'),F9dbbbee0(6168),F3b9ec4ca($this))); } switch ($param->__GetType()) { case $this->__GetType() : $Resultat = new FMK_Date_Duree($param->m_Valeur,$this->m_Valeur); $Retour = $Resultat->F97dc9065(); break; case TYPEWL_DUREE : case TYPEWL_ENTIER: $this->m_Valeur->F805106da($param->m_Valeur); $Retour = $this->Fc424b461(); break; default: $this->m_Valeur->F805106da(F075ca95b($param)); $Retour = $this->Fc424b461(); } return $Retour; } function& Fa4014e81( $compare ) { switch ($compare==null ? TYPEWL_NULL : $compare->__GetType()) { case TYPEWL_HEURE : case TYPEWL_DATEHEURE : return $this->F260fa579($compare->m_Valeur); case TYPEWL_DATE : case TYPEWL_DUREE : Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('TYPE_INCOMPATIBLE'),F3b9ec4ca($this),F3b9ec4ca($compare))); return null; default : return $this->F260fa579($this->F1b8e122c($compare)); } } function& F260fa579($Heure) { $Resultat = F4f4d91fe($this->m_Valeur->F0a6804f3()) - F4f4d91fe($Heure->F0a6804f3()); if ($Resultat == 0) $Resultat = 0; elseif ($Resultat > 0) $Resultat = 1; else $Resultat = -1; return $Resultat; } function F35be7f7f($bPourJSON=false) { $return = $this->m_Valeur->F387e0cb8() . ':' . $this->m_Valeur->F4dccb29e() . ':' . $this->m_Valeur->Fcf5775ce() . '.' . $this->m_Valeur->F217e7cc7(); if ($bPourJSON) { $return = '"'.utf8_html_entity_decode($return,ENT_QUOTES).'"'; } return $return; } function F4629642a($strDate) { $tabHeure = utf8_explode(':',$strDate); $tabSecMill = utf8_explode('.',$tabHeure[2]); $this->m_Valeur->setHeure(intval($tabHeure[0])); $this->m_Valeur->setMinute(intval($tabHeure[1])); $this->m_Valeur->setSeconde(intval($tabSecMill[0])); $this->m_Valeur->setMilliseconde(intval($tabSecMill[1])); } function F0a8d83f4() { return TYPE_XML_HEURE; } } class CDateHeure extends CHeure { var $m_nJour = null; var $m_nMois = null; var $m_nAnnee = null; function CDateHeure($valeur=null) { parent::CTypeAvecPropriete($valeur); } function Maintenant(&$pclMaintenant) { return $pclMaintenant->F1b9bf8b8(); } function Fb4045538() {return false;} function Fc2195344() {return true;} function F321fae39() {return false;} function F952a23f2() {return true;} function F1b8e122c($Valeur) { if (is_object($Valeur)) { if ($Valeur->m_nIsXXX == 32) { return $this->F1b8e122c($Valeur->F92cbba97($this)); } return $this->F1b8e122c($Valeur->GetValeur()); } if (is_string($Valeur)) { if (strpos($Valeur,'-') !== false) { $Retour = new FMK_Date($Valeur,'ISO8601'); return $Retour; } $sFormat=''; $nTaille = utf8_strlen($Valeur); if ($nTaille >= 4) { $sFormat.='AAAA'; } if ($nTaille >= 6) { $sFormat.='MM'; } if ($nTaille >= 8) { $sFormat.='JJ'; } if ($nTaille >= 10) { $sFormat.='HH'; } if ($nTaille >= 12) { $sFormat.='mm'; } if ($nTaille >= 14) { $sFormat.='ss'; } if ($nTaille >= 16) { $sFormat.='LL'; } if ($nTaille >= 17) { $sFormat.='L'; $Valeur = utf8_substr($Valeur,0,17); } $clDate = new FMK_Date($Valeur,$sFormat); } elseif (is_integer($Valeur)) { $clDate = new FMK_Date('18000100','AAAAMMJJ',true); $clDuree = new FMK_Date_Duree(abs($Valeur),'J'); if ($Valeur < 0 ) $clDate->F805106da($clDuree); else $clDate->F265229a9($clDuree); $clDate->Ffae07732(); } else { $clContexte =& FMK_Contexte(); $sDateDefaut=$clContexte->F239ddeda(Fd7624002('DateParDéfaut')); $sHeureDefaut=$clContexte->F239ddeda(Fd7624002('HeureParDéfaut')); if (!isset($sDateDefaut) || !isset($sHeureDefaut)) $sDateHeureDefaut = date('YmdHis'). (round(floatval(microtime())*1000,0)); else $sDateHeureDefaut = $sDateDefaut . $sHeureDefaut; $clDate = new FMK_Date($sDateHeureDefaut,'AAAAMMJJHHmmssLLL',true); } return $clDate; } function& __GetType() { $t = TYPEWL_DATEHEURE; return $t; } function F98b975d6() { $this->m_nAnnee = (int)$this->m_Valeur->getAnnee(); $this->m_nMois = (int)$this->m_Valeur->getMois(); $this->m_nJour = (int)$this->m_Valeur->getJour(); parent::F98b975d6(); } function& GetJour(){ return $this->m_nJour;} function SetJour($valeur) { $clNbJours = intval($valeur); $this->m_Valeur->setJour($clNbJours,$this->m_sTypeOperateurEnCours == 95); $this->F98b975d6(); } function& GetMois(){ return $this->m_nMois;} function SetMois($valeur) { $clNbMois = intval($valeur); $this->m_Valeur->setMois($clNbMois); $this->F98b975d6(); } function& GetAnnee(){ return $this->m_nAnnee;} function SetAnnee($valeur) { $clNbAn = intval($valeur); $this->m_Valeur->setAnnee($clNbAn ); $this->F98b975d6(); } function& GetPartieDate() { $sValeur = $this->m_Valeur->Fe8fc8ad8(); if (CreerType($return,null,TYPEWL_DATE,$sValeur) == null) { $return = $sValeur; } return $return; } function SetPartieDate($valeur) { switch(utf8_strlen($valeur)) { case 4: $sFormat = 'AAAA'; break; case 6: $sFormat = 'AAAAMM'; break; case 8: default: $valeur = utf8_substr($valeur,0,8); $sFormat = 'AAAAMMJJ'; } $fmkDate = new FMK_Date($valeur,$sFormat); $this->m_Valeur->setAnnee($fmkDate->getAnnee()); $this->m_Valeur->setMois($fmkDate->getMois()); $this->m_Valeur->setJour($fmkDate->getJour()); $this->F98b975d6(); } function& GetPartieHeure() { $sValeur = $this->m_Valeur->Fff545aaa(); if (CreerType($return,null,TYPEWL_HEURE,$sValeur) == null) { $return = $sValeur; } return $return; } function SetPartieHeure($valeur) { switch(utf8_strlen($valeur)) { case 2: $sFormat = 'HH'; break; case 4: $sFormat = 'HHmm'; break; case 6: $sFormat = 'HHmmss'; break; case 8: $sFormat = 'HHmmssLL'; break; case 9: default: $valeur = utf8_substr($valeur,0,9); $sFormat = 'HHmmssLLL'; } $fmkDate = new FMK_Date($valeur,$sFormat); $this->m_Valeur->setHeure($fmkDate->getHeure()); $this->m_Valeur->setMinute($fmkDate->getMinute()); $this->m_Valeur->setSeconde($fmkDate->getSeconde()); $this->m_Valeur->setMilliseconde($fmkDate->getMilliseconde()); $this->F98b975d6(); } function& GetValeur() { $Retour = $this->m_Valeur->Ff6ae0492(); return $Retour; } function SetValeur($val) { $this->m_Valeur = $this->F1b8e122c($val); $this->F98b975d6(); } function& Fa4014e81( $compare ) { switch ($compare==null ? TYPEWL_NULL : $compare->__GetType()) { case TYPEWL_DUREE : Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('TYPE_INCOMPATIBLE'),F3b9ec4ca($this),F3b9ec4ca($compare))); return null; case TYPEWL_HEURE : case TYPEWL_DATEHEURE : case TYPEWL_DATE : default : return $this->F31c5681a($this->F1b8e122c($compare)); } } function& Fcc4f5b5d($comparaison) { $pclRetour =& parent::Fcc4f5b5d($comparaison); return $pclRetour; } function& F31c5681a($DateHeure) { $Resultat = F0a38f5ec($this->m_Valeur->F680c1c4a()) - F0a38f5ec($DateHeure->F680c1c4a()); if ($Resultat == 0) $Resultat = 0; elseif ($Resultat > 0) $Resultat = 1; else $Resultat = -1; return $Resultat; } function F35be7f7f($bPourJSON=false) { $return = $this->m_Valeur->Ff24ae73f() . '-' . $this->m_Valeur->F48243084() . '-' . $this->m_Valeur->Faf9d9b0c() . 'T' . $this->m_Valeur->F387e0cb8() . ':' . $this->m_Valeur->F4dccb29e() . ':' . $this->m_Valeur->Fcf5775ce() . '.' . $this->m_Valeur->F217e7cc7(); if ($bPourJSON) { $return = '"'.utf8_html_entity_decode($return,ENT_QUOTES).'"'; } return $return; } function F4629642a($strDateheure) { $nPosT = utf8_strpos($strDateheure,'T'); $strDate = utf8_substr($strDateheure,0,$nPosT); $strHeure = utf8_substr($strDateheure,$nPosT+1); $tabDate= utf8_explode('-',$strDate); $this->m_Valeur = new FMK_Date(); $this->m_Valeur->setAnnee(intval($tabDate[0])); $this->m_Valeur->setMois(intval($tabDate[1])); $this->m_Valeur->setJour(intval($tabDate[2])); $tabHeure = utf8_explode(':',$strHeure); $tabSecMill = utf8_explode('.',$tabHeure[2]); unset($tabHeure[2]); $this->m_Valeur->setHeure(intval($tabHeure[0])); $this->m_Valeur->setMinute(intval($tabHeure[1])); $this->m_Valeur->setSeconde(intval($tabSecMill[0])); $this->m_Valeur->setMilliseconde(intval($tabSecMill[1])); } function F0a8d83f4() { return TYPE_XML_DATEHEURE; } } class CDate extends CDateHeure { function CDate($valeur=null) { parent::CDateHeure($valeur); } function& __GetType() { $t = TYPEWL_DATE; return $t; } function Maintenant(&$pclMaintenant) { return $pclMaintenant->F3e79cd3a(); } function F1b8e122c($Valeur) { if (is_object($Valeur)) { if ($Valeur->m_nIsXXX == 32) { return $this->F1b8e122c($Valeur->F92cbba97($this)); } return $this->F1b8e122c($Valeur->GetValeur()); } if (is_string($Valeur)) { if (strpos($Valeur,'-') !== false) { $Retour = new FMK_Date($Valeur,'ISO8601'); return $Retour; } $Valeur = utf8_substr(utf8_str_pad($Valeur,8),0,8); $clDate = new FMK_Date($Valeur,'AAAAMMJJ'); } elseif (is_numeric($Valeur)) { $clDate = new FMK_Date('18000100','AAAAMMJJ',true); $clDuree = new FMK_Date_Duree(abs($Valeur),'J'); if ($Valeur < 0 ) $clDate->F805106da($clDuree); else $clDate->F265229a9($clDuree); } else { $clContexte =& FMK_Contexte(); $sDateDefaut=$clContexte->F239ddeda(Fd7624002('DateParDéfaut')); if (!isset($sDateDefaut)) $sDateDefaut = date('Ymd'); $clDate = new FMK_Date($sDateDefaut,'AAAAMMJJ',true); } return $clDate; } function F98b975d6() { $this->m_nAnnee = (int)$this->m_Valeur->getAnnee(); $this->m_nMois = (int)$this->m_Valeur->getMois(); $this->m_nJour = (int)$this->m_Valeur->getJour(); } function F7a6b3ce4($sNomPropriete) { Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142("PROPRIETE_INDISPONIBLE"),Fc34ec142($sNomPropriete),$this->F3b9ec4ca())); } function& GetHeure(){ return $this->F7a6b3ce4('PROP_NOM_HEURE'); } function SetHeure($valeur){ return $this->F7a6b3ce4('PROP_NOM_HEURE'); } function& GetMinute(){ return $this->F7a6b3ce4('PROP_NOM_MINUTE'); } function SetMinute($valeur){ return $this->F7a6b3ce4('PROP_NOM_MINUTE'); } function& GetSeconde(){ return $this->F7a6b3ce4('PROP_NOM_SECONDE'); } function SetSeconde($valeur){ return $this->F7a6b3ce4('PROP_NOM_SECONDE'); } function& GetPartiedate(){ return $this->F7a6b3ce4('PROP_NOM_PARTIEDATE'); } function SetPartiedate($valeur){ return $this->F7a6b3ce4('PROP_NOM_PARTIEDATE'); } function& GetPartieheure(){ return $this->F7a6b3ce4('PROP_NOM_PARTIEHEURE'); } function SetPartieheure($valeur){ return $this->F7a6b3ce4('PROP_NOM_PARTIEHEURE'); } function& GetValeur() { $Retour = $this->m_Valeur->Fe8fc8ad8(); return $Retour; } function SetValeur($val) { $this->m_Valeur = $this->F1b8e122c($val); $this->F98b975d6(); } function& Fa4014e81( $compare ) { switch ($compare==null ? TYPEWL_NULL : $compare->__GetType()) { case TYPEWL_DATEHEURE : case TYPEWL_DATE : return $this->F5059e955($compare->m_Valeur); case TYPEWL_DUREE : case TYPEWL_HEURE : Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('TYPE_INCOMPATIBLE'),F3b9ec4ca($this),F3b9ec4ca($compare))); return null; default : return $this->F5059e955($this->F1b8e122c($compare)); } } function& F791b7c6d($param=null) { if (isset($param) && $param->__GetType()==TYPEWL_ENTIER) { $paramDuree = new CDuree(); $paramDuree->SetJour($param->m_Valeur); return parent::F791b7c6d($paramDuree); } else { return parent::F791b7c6d($param); } } function& F66d4f961($param=null) { if (isset($param) && $param->__GetType()==TYPEWL_ENTIER) { $paramDuree = new CDuree(); $paramDuree->SetJour($param->m_Valeur); return parent::F66d4f961($paramDuree); } else { return parent::F66d4f961($param); } } function& F5059e955($compare) { $Resultat = F0a38f5ec($this->m_Valeur->F680c1c4a()) - F0a38f5ec($compare->F680c1c4a()); if ($Resultat == 0) $Resultat = 0; elseif ($Resultat > 0) $Resultat = 1; else $Resultat = -1; return $Resultat; } function F35be7f7f($bPourJSON=false) { $return = $this->m_Valeur->Ff24ae73f() . '-' . $this->m_Valeur->F48243084() . '-' . $this->m_Valeur->Faf9d9b0c(); if ($bPourJSON) { $return = '"'.utf8_html_entity_decode($return,ENT_QUOTES).'"'; } return $return; } function F4629642a($strDate) { $tabDate= utf8_explode('-',$strDate); $this->m_Valeur = new FMK_Date(); $this->m_Valeur->setAnnee(intval($tabDate[0])); $this->m_Valeur->setMois(intval($tabDate[1])); $this->m_Valeur->setJour(intval($tabDate[2])); } function F0a8d83f4() { return TYPE_XML_DATE; } } class CDuree extends CTypeComparable { var $m_nJour = null; var $m_nHeure = null; var $m_nMinute = null; var $m_nSeconde = null; var $m_nMilliseconde = null; function CDuree($valeur=null) { parent::CTypeAvecPropriete($valeur); } function F1d658c0c() {return true;} function F1b8e122c($Valeur) { if (is_object($Valeur)) { if ($Valeur->__GetType() === TYPEWL_DUREE) { if ($Valeur->m_nIsXXX === 8) { $pclDuree =& GetValeur($Valeur); return _clone($pclDuree->m_Valeur); } return _clone($Valeur->m_Valeur); } return $this->F1b8e122c($Valeur->GetValeur()); } $Valeur = (string)$Valeur; $Valeur = preg_replace('/[^\+\-0-9]/','',substr($Valeur,0,1)) . preg_replace('/[^0-9]/','',substr($Valeur,1)); if (is_numeric($Valeur)) { return new FMK_Date_Duree($Valeur,FormatDureeMillieme); } return new FMK_Date_Duree('0000000000',FormatDureeMillieme); } function& __GetType() { $t = TYPEWL_DUREE; return $t; } function F98b975d6() { $this->m_nJour = (int)$this->m_Valeur->getJour(); $this->m_nHeure = (int)$this->m_Valeur->getHeure(); $this->m_nMinute = (int)$this->m_Valeur->getMinute(); $this->m_nSeconde = (int)$this->m_Valeur->getSeconde(); $this->m_nMilliseconde = (int)$this->m_Valeur->getMilliseconde(); } function& GetEnJours() { $nbJours = $this->m_Valeur->F22097d71(); return $nbJours; } function SetEnJours($valeur) { $this->SetJour($valeur); $Decimaux = $valeur - intval($valeur); if ($Decimaux>0){ $this->SetEnHeures($Decimaux * 24); } } function& GetEnHeures() { $nbHeures = $this->m_Valeur->F031293c7(); return $nbHeures; } function SetEnHeures($valeur) { $this->SetHeure($valeur); $Decimaux = $valeur - intval($valeur); if ($Decimaux>0){ $this->SetEnMinutes($Decimaux * 60); } } function& GetEnMinutes() { $nbMinutes = $this->m_Valeur->F531a6f4e(); return $nbMinutes; } function SetEnMinutes($valeur) { $this->SetMinute($valeur); $Decimaux = $valeur - intval($valeur); if ($Decimaux>0){ $this->SetEnSecondes($Decimaux * 60); } } function& GetEnSecondes() { $nbSecondes = $this->m_Valeur->Fdcc4b3c2(); return $nbSecondes; } function SetEnSecondes($valeur) { $this->SetSeconde($valeur); $Decimaux = $valeur - intval($valeur); if ($Decimaux>0){ $this->SetEnMillisecondes($Decimaux * 1000); } } function& GetEnMillisecondes() { $nbMillisecondes = $this->m_Valeur->F1ba6a9e4(); return $nbMillisecondes; } function SetEnMillisecondes($valeur) { $this->SetMilliseconde($valeur); } function& GetJour(){ return $this->m_nJour; } function SetJour($valeur) { $clValeurEntiere = intval($valeur); $this->m_Valeur->setJour($clValeurEntiere); $this->F98b975d6(); } function& GetHeure(){ return $this->m_nHeure;} function SetHeure($valeur) { $clValeurEntiere = intval($valeur); $this->m_Valeur->setHeure($clValeurEntiere); $this->F98b975d6(); } function& GetMinute(){ return $this->m_nMinute;} function SetMinute($valeur) { $clValeurEntiere = intval($valeur); $this->m_Valeur->setMinute($clValeurEntiere); $this->F98b975d6(); } function& GetSeconde(){ return $this->m_nSeconde;} function SetSeconde($valeur) { $clValeurEntiere = intval($valeur); $this->m_Valeur->setSeconde($clValeurEntiere); $this->F98b975d6(); } function& GetMilliseconde(){ return $this->m_nMilliseconde;} function SetMilliseconde($valeur) { $clValeurEntiere = intval($valeur); $this->m_Valeur->setMilliseconde($clValeurEntiere); $this->F98b975d6(); } function& GetValeur() { $Retour = $this->m_Valeur->F97dc9065(); return $Retour; } function SetValeur($val) { $this->m_Valeur = $this->F1b8e122c($val); $this->F98b975d6(); } function& F791b7c6d($param=null) { if (!isset($param)) { return $this; } switch ($param->__GetType()) { case TYPEWL_DATE : case TYPEWL_HEURE : case TYPEWL_DATEHEURE : $Retour = new CDuree($this); $Retour->SetValeur( $param->F791b7c6d($this) ); break; case TYPEWL_CHAINE: $Retour = $this->Fc424b461() . $param->Fc424b461(); break; case TYPEWL_VARIANT: $xValeur = VersPrimitif($param); if (is_string($xValeur)) { $Retour = $this->Fc424b461() . $xValeur; break; } default: $Retour = new CDuree($this); $Retour->m_Valeur->F265229a9($param->m_Valeur); $Retour->F98b975d6(); break; } return $Retour; } function& F66d4f961($param=null) { if (!isset($param)) { Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('OPERATEUR_INDISPONIBLE'),F9dbbbee0(6168),F3b9ec4ca($this))); } $Retour = new CDuree($this); switch ($param->__GetType()) { case TYPEWL_DATE : case TYPEWL_HEURE : case TYPEWL_DATEHEURE : $Retour->SetValeur( $param->F66d4f961($this) ); break; case TYPEWL_DUREE : $Retour->m_Valeur->F805106da($param->m_Valeur); $Retour->F98b975d6(); break; default: $this->m_Valeur->F805106da( $this->F1b8e122c($param) ); $Retour->F98b975d6(); break; } return $Retour; } function& Faac9bb4c($param) { $Resultat = new CDuree( intval( Faac9bb4c($this->m_Valeur->F1ba6a9e4(), VersPrimitif($param)) ) ); return $Resultat; } function& F856992a1($param) { $Resultat = new CDuree( intval( F856992a1($this->m_Valeur->F1ba6a9e4(), VersPrimitif($param)) ) ); return $Resultat; } function& Fa4014e81( $compare ) { switch ($compare==null ? TYPEWL_NULL : $compare->__GetType()) { case TYPEWL_DUREE : $Resultat = $this->m_Valeur->Fd3a4fbaa($compare->m_Valeur); return $Resultat; case TYPEWL_DATEHEURE : case TYPEWL_DATE : case TYPEWL_HEURE : default : $Resultat = $this->m_Valeur->Fd3a4fbaa($this->F1b8e122c($compare)); } return $Resultat; } function F0a8d83f4() { return TYPE_XML_DUREE; } } ?>