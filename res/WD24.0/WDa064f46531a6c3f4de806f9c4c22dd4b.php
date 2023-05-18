<?php
//24.0.30.0 TYPE/Police.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 if (!defined('__INC__TYPE/Modele.php')) { define('__INC__TYPE/Modele.php',true); include_once(WB_INCLUDE_PATH.'WD6ee9539c0ad66df976b95a68703645fb.php'); } if (!defined('__INC__FMK/Chaine.php')) { define('__INC__FMK/Chaine.php',true); include_once(WB_INCLUDE_PATH.'WD55acb2e708e26f23cb8956cd93e98123.php'); } class LOGFONT { var $lfHeight; var $lfWidth; var $lfEscapement; var $lfOrientation; var $lfWeight; var $lfItalic; var $lfUnderline; var $lfStrikeOut; var $lfCharSet; var $lfOutPrecision; var $lfClipPrecision; var $lfQuality; var $lfPitchAndFamily; var $lfFaceName; function LOGFONT() { $this->lfFaceName = ''; } } class CPolice extends CTypeComparable { var $m_sNom; var $m_bGras; var $m_bItalique; var $m_bSouligne; var $m_nTaille; var $m_bBarree = false; var $m_stFontInfo; var $m_czTailleCSS; var $m_czPoliceCSS; var $m_clCouleur; function CPolice($Copie = null) { parent::CTypeAvecPropriete($Copie); } function F1b8e122c($Valeur) { if (!isset($Valeur)) { $this->m_bGras = false; $this->m_bItalique = false; $this->m_bSouligne = false; $this->m_nTaille = 0; $this->m_sNom = ""; $this->m_stFontInfo = new LOGFONT(); $this->m_czPoliceCSS = ''; $this->m_czTailleCSS = ''; $this->m_clCouleur = new CCouleur(); return true; } if (is_object($Valeur)) { if ($Valeur->F0e7f32a4(TYPEWL_POLICE)) { $this->m_bGras = $Valeur->m_bGras; $this->m_bItalique = $Valeur->m_bItalique; $this->m_bSouligne = $Valeur->m_bSouligne; $this->m_nTaille = $Valeur->m_nTaille; $this->m_sNom = $Valeur->m_sNom; $this->m_stFontInfo = $Valeur->m_stFontInfo; $this->m_czPoliceCSS = $Valeur->m_czPoliceCSS; $this->m_czTailleCSS = $Valeur->m_czTailleCSS; $this->m_clCouleur = $Valeur->m_clCouleur; return true; } Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('TYPE_INCOMPATIBLE'),$this->F3b9ec4ca(),$Valeur->F3b9ec4ca())); } Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('TYPE_INCOMPATIBLE'),$this->F3b9ec4ca(),gettype($Valeur))); return false; } function& Fc424b461() { Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('CONVERSION_IMPOSSIBLE'),$this->F3b9ec4ca(),Fc34ec142('TYPEWL_NOM_'.TYPEWL_CHAINE))); } function& __GetType() { $t = TYPEWL_POLICE; return $t; } function GetGrasHTML() { if (Feef890d7()) return $this->Fe71b8b89(); else return (!$this->GetGras()) ? "normal" : "bold"; } function Fe71b8b89() { return (!$this->GetGras()) ? "400" : "700"; } function GetItaliqueHTML() { return (!$this->GetItalique()) ? "normal" : "italic"; } function F89f32acc() { return (!$this->F5ba9d7d4()) ? "none" : "underline"; } function GetTailleHTML() { $sTaille = $this->GetTaille(); $nLong = utf8_strlen($sTaille); if ($nLong==0) return ''; if (is_numeric($sTaille[$nLong-1])) $sTaille .= 'pt'; return $sTaille; } function& GetNom(){return $this->m_sNom;} function& GetGras(){return $this->m_bGras;} function& GetItalique(){return $this->m_bItalique;} function& F5ba9d7d4(){return $this->m_bSouligne;} function& F35508fce(){return $this->m_bBarree;} function& GetTaille(){return $this->m_nTaille;} function SetNom($sNom) { $this->m_sNom = $sNom; } function SetGras($bGras) { $this->m_bGras = $bGras; } function SetItalique($bItalique) { $this->m_bItalique = $bItalique; } function Fd1a8d4a6($bSouligne) { $this->m_bSouligne = $bSouligne; } function SetTaille($nTaille) { $this->m_nTaille = $nTaille; } function Fcd625ef5($bBarree) { $this->m_bBarree = $bBarree; } function& Ffa55b887(){return $this->Condense;} function SetCondense($p){$this->Condense = $p;} function& F9ff4749a(){return $this->Etendu;} function SetEtendu($p){$this->Etendu = $p;} function& F49320921(){return $this->Large;} function SetLarge($p){$this->Large = $p;} function& Fcc4f5b5d($comparaison) { $bRetour = $this->F1b8e122c($comparaison); return $bRetour; } function& GetValeur() { return Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('CONVERSION_IMPOSSIBLE'),$this->F3b9ec4ca(),Fc34ec142('TYPEWL_NOM_'.TYPEWL_CHAINE))); } function F7089a297( $pstLogFont, $pczTailleCSS, $pczPoliceCSS) { Fc5d10cc7($pstLogFont, $this->m_stFontInfo); if (isset($pczTailleCSS)) { if (empty($this->m_czTailleCSS) == false) { $pczTailleCSS = $this->m_czTailleCSS; } else { $pczTailleCSS=''; } } if (isset($pczPoliceCSS)) { if (empty($this->m_czPoliceCSS) == false){ $pczPoliceCSS = $this->m_czPoliceCSS; } else if (!empty($this->m_stFontInfo->lfFaceName)) { $pczPoliceCSS = $this->m_stFontInfo->lfFaceName; } else { $pczPoliceCSS=''; } } } function Ff6beb937( $stLogFont, $pszTailleCSS, $pszPoliceCSS) { Fc5d10cc7($this->m_stFontInfo, $stLogFont, sizeof($this->m_stFontInfo)); if ((isset($pszTailleCSS)) && ($pszTailleCSS != '')) { $this->m_stFontInfo->lfHeight = 0; $this->m_czTailleCSS = $pszTailleCSS; } else { $this->m_czTailleCSS=''; } $this->F22549ff0($this->m_stFontInfo->lfFaceName, $pszPoliceCSS); } function F22549ff0( $pszPolice, $pszPoliceCSS) { if (F8b98af41($pszPoliceCSS)) { $this->m_czPoliceCSS = $pszPoliceCSS; } else if (!empty($pszPolice)) $this->m_czPoliceCSS = $pszPolice; else $this->m_czPoliceCSS=''; } function SetCouleur($Couleur) { if (!is_object($Couleur)) $this->m_clCouleur = new CCouleur($Couleur); else $this->m_clCouleur = $Couleur; } function& GetCouleur() { return $this->m_clCouleur->m_dwColor; } } ?>