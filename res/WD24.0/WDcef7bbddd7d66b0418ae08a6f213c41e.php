<?php
//24.0.30.0 FMK/Exception/Erreur.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 define('FMK_Exception_Erreur',true); define('errPile' , 20); define('errMessage' , 1); define('errMessageSysteme' , 17); define('errCode' , 0); define('errComplet' , 19); define('OP_REESSAYER', 0x80000000); define('OP_ANNULER', 0x80000001); define('OP_TERM_RETOUR', 0x80000002); define('OP_TERM_REPRISESAISIE', 0x80000003); define('OP_TERM_FINPROGRAMME', 0x80000004); define('OP_TERM_RELANCEPROGRAMME', 0x80000008); if (!defined('__INC__FMK/Chaine.php')) { define('__INC__FMK/Chaine.php',true); include_once(WB_INCLUDE_PATH.'WD55acb2e708e26f23cb8956cd93e98123.php'); } $_FMK_Exception_Erreur = null; class FMK_Exception_Erreur { var $m_tableauMessages = null; var $m_tableauMessagesArchives = null; var $m_nNombreErreur = 0; function FMK_Exception_Erreur() { $this->raz(); } function raz() { if ( $this->m_nNombreErreur == 0 ) return; if (!isset($this->m_tableauMessagesArchives)) { $this->m_tableauMessagesArchives = array(); } if (!isset($this->m_tableauMessagesArchives[0][2])) { $this->m_tableauMessagesArchives[0][2]=0; } else { $this->m_tableauMessagesArchives[0][2]++; } $nNb = $this->m_tableauMessagesArchives[0][2]; $this->m_tableauMessagesArchives[$nNb][0] = $this->m_tableauMessages; $this->m_tableauMessagesArchives[$nNb][1] = $this->m_nNombreErreur; $this->m_nNombreErreur = 0; $this->m_tableauMessages = array(); } function F8a7232c6($nPos = -1, $nTypeInformation = errMessage) { $nNbMessages = $this->Fbd9b84b1(); if ($nNbMessages === 0) { return ''; } if ( ($nPos == -1) || (!isset($this->m_tableauMessages[$nPos])) ) $nPos = $nNbMessages-1; if (!isset($nTypeInformation) || $nTypeInformation === errMessage) { if (!isset($this->m_tableauMessages[$nPos]['MSG_WL']) && isset($this->m_tableauMessages[$nPos]['MSG_SYS'])) { return FMK_ChaineConstruit(F1ac3f040("ERR_SYS_INCONNUE"),$this->m_tableauMessages[$nPos]['MSG_SYS']); } return $this->m_tableauMessages[$nPos]['MSG_WL']; } else { $sReturn = ''; switch ($nTypeInformation) { case errComplet : case errPile : $sReturn .= (isset($this->m_tableauMessages[$nPos]['DEBUG_INFO'])) ?$this->m_tableauMessages[$nPos]['DEBUG_INFO']:''; if ($nTypeInformation!==errComplet) return $sReturn; $sReturn .= RC; case errMessageSysteme : $sReturn .= (isset($this->m_tableauMessages[$nPos]['MSG_SYS'])) ?$this->m_tableauMessages[$nPos]['MSG_SYS']:''; if ($nTypeInformation!==errComplet) return $sReturn; $sReturn .= RC; default : $sReturn .= (isset($this->m_tableauMessages[$nPos]['MSG_WL'])) ?$this->m_tableauMessages[$nPos]['MSG_WL']:''; } return $sReturn; } } function Feda00d5c($nTypeInformation = errMessage) { $nNbMessages = $this->Fbd9b84b1(); return $this->F8a7232c6($nNbMessages-1,$nTypeInformation); } function Fbd9b84b1() { return $this->m_nNombreErreur; } function Fa66b1dbb($nTypeInformation = errMessage) { $tabTmp = $this->m_tableauMessages; $iArchive = 0; if (isset($this->m_tableauMessagesArchives[0][2])) $iArchive=$this->m_tableauMessagesArchives[0][2]; $sRetour = ''; while ( isset($this->m_tableauMessages) ) { if ($this->m_nNombreErreur > 0) { if ($sRetour!='') $sRetour.=RC; $sRetour .= $this->F8a7232c6(0,$nTypeInformation); for($i=1; $i<$this->m_nNombreErreur;$i++) { $sRetour .= RC . $this->F8a7232c6($i,$nTypeInformation); } } if (isset($this->m_tableauMessagesArchives[$iArchive])) { $this->m_tableauMessages = $this->m_tableauMessagesArchives[$iArchive][0]; $this->m_nNombreErreur = $this->m_tableauMessagesArchives[$iArchive][1]; --$iArchive; if ( (utf8_strpos($sRetour,"archives")===false) && (utf8_strlen($this->F8a7232c6(0,$nTypeInformation))>0) ) { if ($sRetour!='') $sRetour.=RC; $sRetour .= Fd7624002("Erreurs précédentes dans les archives :"); } } else $this->m_tableauMessages = null; } $this->m_tableauMessages = $tabTmp; return $sRetour; } function F7455d57a($sMsg,$nType = errMessage) { $nNb = $this->Fbd9b84b1(); if (isset($this->m_tableauMessages[$nNb-1])) { $sIndice = 'MSG_WL'; switch($nType) { case errMessage : $sIndice = 'MSG_WL'; break; case errMessageSysteme : $sIndice = 'MSG_SYS'; break; case errPile : $sIndice = 'DEBUG_INFO'; break; } if (!isset($this->m_tableauMessages[$nNb-1][$sIndice])) $this->Fc1ab198d($sMsg,$nType,$nNb-1); else $this->F61e52eab($sMsg,$nType); } else $this->F61e52eab($sMsg,$nType); } function Ff646c411($sMessage, $sMsgSys = '') { $this->F61e52eab($sMessage); $this->F7455d57a($sMsgSys,errMessageSysteme); } function Fc1ab198d($sNouveauMessage, $nTypeErreur = errMessage, $nPosition = -1) { if ($nPosition == -1) { $nPosition = $this->Fbd9b84b1(); $this->m_tableauMessages[$nPosition] = array(); } switch ($nTypeErreur) { case errMessageSysteme : $this->m_tableauMessages[$nPosition]['MSG_SYS'] = $sNouveauMessage; break; case errPile : $this->m_tableauMessages[$nPosition]['DEBUG_INFO'] = $this->Ff637da78($sNouveauMessage); break; default : $this->m_tableauMessages[$nPosition]['MSG_WL'] = $sNouveauMessage; } } function F61e52eab($sNouveauMessage, $nTypeErreur = errMessage) { if (utf8_strpos($sNouveauMessage,RC)!==false) { $tableauMessage = explode(RC,$sNouveauMessage); foreach ($tableauMessage as $nIndice => $sValeur) { $this->Fc1ab198d($sValeur,$nTypeErreur); } } else { $this->Fc1ab198d($sNouveauMessage,$nTypeErreur); } $this->m_nNombreErreur++; $this->Fc1ab198d(null,errPile,$this->Fbd9b84b1()-1); } function Ff637da78($tabTrace = null) { if (!function_exists('debug_backtrace')) return ''; if (!isset($tabTrace)) $tabTrace = debug_backtrace(); $sMessageTrace = ''; $nCountTabTrace = count($tabTrace); for ($i=$nCountTabTrace-1; $i>=0; $i--) { $tabCoucheCourante = $tabTrace[$i]; if ( ( (isset($tabCoucheCourante['class'])) && (utf8_strpos(utf8_strtolower($tabCoucheCourante['class']),'fmk_') !== false) ) || ( (isset($tabCoucheCourante['function'])) && (utf8_strpos(utf8_strtolower($tabCoucheCourante['function']),'_initerreurinfo') !== false) ) ) continue; $sCeMessage = ''; if (isset($tabCoucheCourante['class'])) { $sCeMessage .= 'Object method '.$tabCoucheCourante['class'].'->'.$tabCoucheCourante['function']; } elseif (isset($tabCoucheCourante['function'])) { $sCeMessage .= 'Function '.$tabCoucheCourante['function']; } if (isset($tabCoucheCourante['line'])) $sCeMessage .= ' (line '.$tabCoucheCourante['line'].')'; $sMessageTrace.= ($sMessageTrace=='') ? $sCeMessage : TAB . $sCeMessage; } return $sMessageTrace; } } ?>