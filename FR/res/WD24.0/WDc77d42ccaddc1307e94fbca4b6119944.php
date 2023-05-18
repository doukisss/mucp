<?php
//24.0.30.0 IHM/Champ/Saisie/SaisieDate.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 if (!defined('__INC__IHM/Champ/Saisie/Saisie.php')) { define('__INC__IHM/Champ/Saisie/Saisie.php',true); include_once(WB_INCLUDE_PATH.'WD2d958d85e220e9ca486c6dac5b41bd02.php'); } if (!defined('__INC__WL/PAGE/Page.php')) { define('__INC__WL/PAGE/Page.php',true); include_once(WB_INCLUDE_PATH.'WD76227464d26f2611a8dc19c62cf44751.php'); } class CSaisieDate extends CSaisieFormat { var $Masque; var $m_pclCalendrier; function CSaisieDate() { parent::CSaisieFormat(); $this->Masque = "JJ/MM/AAAA"; $this->FormatDefaut = "AAAAMMJJ"; $this->m_pclCalendrier=null; } function lierVM($sNomVM, $sNomWL, $sNomPHP) { if (isset($this->m_pclCalendrier)) { $this->m_pclCalendrier=&$GLOBALS[$this->m_pclCalendrier]; $this->m_pclCalendrier->m_pclChampParent =& $this; } parent::lierVM($sNomVM, $sNomWL, $sNomPHP); } function lierCalendrier($sNomPHPCalendrier) { $this->m_pclCalendrier=$sNomPHPCalendrier; } function Fb9088766($pszMemorise) { if ($pszMemorise==='') return ''; if ($pszMemorise===null) return null; $sHeure = substr(F0feb2aff( $pszMemorise, $this->FormatMemorise.'mm'),0,-2); if ($sHeure !== '') $sHeure = utf8_str_pad($sHeure,8,'0',STR_PAD_RIGHT); return F65c1519c( utf8_substr($pszMemorise,0,utf8_strlen($this->FormatMemorise)), $this->FormatMemorise ) . $sHeure; } function F3355e5f9($pszValeur) { if ($pszValeur==='') return ''; if ($pszValeur===null) return null; $sHeure = utf8_substr($pszValeur,8); $sFormatMemorise = (empty($sHeure)) ? $this->FormatMemorise : F7819245b($sHeure, $this->FormatMemorise); return F8212ac28( utf8_substr($pszValeur,0,8), $sFormatMemorise ); } function F301cc296($pszValeur) { if ($pszValeur==='') return ''; if ($pszValeur===null) return null; $sHeure = utf8_substr($pszValeur,8); $sMasque = (empty($sHeure)||intval($sHeure)==0) ? $this->Masque : substr(F7819245b($sHeure, $this->Masque.'mm'),0,-2); return F8212ac28(($sMasque == szMASKDATEHEURE_DUREEERELATIVE) ? utf8_substr($pszValeur,0,14) : utf8_substr($pszValeur,0,8), $sMasque ); } function F6e84afe6($pszAffichee) { if ($pszAffichee==='') return ''; if ($pszAffichee===null) return null; $sHeure = F0feb2aff( $pszAffichee, $this->Masque ); if ($sHeure !== '') $sHeure = utf8_str_pad($sHeure,8,'0',STR_PAD_RIGHT); return F65c1519c( $pszAffichee, $this->Masque ) . $sHeure; } function F21766077() { if (is_object($this->m_pclCalendrier)) { $this->m_pclCalendrier->SetValeur($this->Valeur); } parent::F21766077(); } function& GetType() { return getRef(20002); } function& __GetType() { if ((F0feb2aff( $this->GetValeurMemorisee(), $this->FormatMemorise))!='') { $t = TYPEWL_DATEHEURE; } else { $t = TYPEWL_DATE; } return $t; } } ?>