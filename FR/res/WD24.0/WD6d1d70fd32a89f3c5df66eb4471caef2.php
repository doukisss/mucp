<?php
//24.0.30.0 FMK/Date/Duree.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 define('FMK_Date_Duree',true); if (!defined('__INC__FMK/Date.php')) { define('__INC__FMK/Date.php',true); include_once(WB_INCLUDE_PATH.'WD97af71f4453b9d548e8ff90b4bbaba9f.php'); } define('_NB_JOURS_PAR_AN_' , 364.25 ); define('_NB_HEURES_PAR_AN_' , _NB_JOURS_PAR_AN_ * 24 ); define('_NB_MINUTES_PAR_AN_' , _NB_HEURES_PAR_AN_ * 60 ); define('_NB_SECONDES_PAR_AN_' , _NB_MINUTES_PAR_AN_ * 60 ); define('_NB_MILLISECONDES_PAR_AN_' , _NB_SECONDES_PAR_AN_ * 1000 ); class FMK_Date_Duree extends FMK_Date { var $m_bValeurOk = false; var $m_bPositif = true; function FMK_Date_Duree($sChaine='', $sFormat=''){ if( ($sChaine==='') && ($sFormat==='')) return; if ( (is_object($sChaine)) && (is_object($sFormat)) ) { $this->Fae167100($sChaine,$sFormat); return; } if (!is_numeric($sChaine)) { $sChaine = date('His'); $sFormat = FormatHeureMinuteSeconde; } else $sFormat = utf8_strtoupper($sFormat); if ( ($sFormat[0] == '-') || (($sFormat[0] == '+')&&$sChaine[0]=='-')) { $this->m_bPositif = false; if ($sFormat[0] == '+') $sFormat = substr($sFormat,1); if (($sChaine[0] == '+') || ($sChaine[0]=='-')) $sChaine = substr($sChaine,1); } $sChaine = F04e7ba0d($sChaine,utf8_strlen($sFormat)); if (utf8_strpos ($sFormat,'J')!==false) { $nEnversPosJ = utf8_strlen(utf8_strrchr($sFormat,'J')); $nPosJ = utf8_strlen($sChaine) - $nEnversPosJ; $sJour = utf8_substr($sChaine,0,$nPosJ+1); $this->m_nJour = intval($sJour); $sChaine = utf8_substr($sChaine,utf8_strlen($sJour),utf8_strlen($sChaine)-utf8_strlen($sJour)); $sFormat = utf8_substr($sFormat,utf8_strlen($sFormat)-utf8_strlen($sChaine),utf8_strlen($sChaine)); } $tableauChaineARemplacer = array('LLL'=>'Milliseconde','LL'=>'Milliseconde','L'=>'Milliseconde', 'SS'=>'Seconde','MM'=>'Minute','HH'=>'Heure'); $nCoeffMilli = 1; if (utf8_strpos($sFormat,'LLL')===false) { if (utf8_strpos($sFormat,'LL')!==false) { $nCoeffMilli = 10; } else if (utf8_strpos($sFormat,'L')!==false) { $nCoeffMilli = 100; } } foreach ($tableauChaineARemplacer as $sChaineARemplacer => $sNomDuMembre){ if (utf8_strpos ($sFormat,$sChaineARemplacer)!==false) { $nLongueurChaineARemplacer = utf8_strlen($sChaineARemplacer); $this->{'m_n'.$sNomDuMembre} = intval(utf8_substr($sChaine,utf8_strpos ($sFormat,$sChaineARemplacer),$nLongueurChaineARemplacer)); $sChaineDebut = utf8_substr($sChaine,0,utf8_strpos ($sFormat,$sChaineARemplacer)); $sChaineFin = utf8_substr($sChaine,utf8_strpos ($sFormat,$sChaineARemplacer)+$nLongueurChaineARemplacer,utf8_strlen($sChaine)-utf8_strlen($sChaineDebut)-$nLongueurChaineARemplacer); $sChaine = $sChaineDebut . $sChaineFin; $sFormat = utf8_str_replace($sChaineARemplacer,'',$sFormat); } } $this->m_nMilliseconde*=$nCoeffMilli; $this->F98777a9b(); if (!$this->m_bPositif) { $this->m_nJour*=-1; $this->m_nHeure*=-1; $this->m_nMinute*=-1; $this->m_nSeconde*=-1; $this->m_nMilliseconde*=-1; } } function Raz() { $this->m_nJour=0; $this->m_nHeure=0; $this->m_nMinute=0; $this->m_nSeconde=0; $this->m_nMilliseconde=0; } function F1fc6a77e($sFormat) { $sResultat = ''; $sFormat = utf8_str_replace('C','L',$sFormat); if ( ($sFormat[0]==='+') && (is_numeric(utf8_substr($sFormat,1)) ) ) { $nNombreSignificatif = intval(utf8_substr($sFormat,1,1)); $nTaille = utf8_strlen($sFormat); $sTexteSeparateur = ''; $sSymboleEnCours = ''; $sPrefixeSuivant = ''; $sSuffixeFinal = ''; $nValeurSymboleEnCours = 0; for($i=2; $i<$nTaille; $i++) { switch (utf8_substr($sFormat,$i,1)) { case 'J': { if (($nNombreSignificatif>0) && ($nValeurSymboleEnCours>0)) { if (!empty($sTexteSeparateur)) { if (empty($sSuffixeFinal)) $sSuffixeFinal = ' j'; --$nNombreSignificatif; $sResultat .= $sSymboleEnCours . $sTexteSeparateur; } } if ($nNombreSignificatif===0) { $sTexteSeparateur = ''; break; } $nValeurSymboleEnCours = $this->getJour(); $sSymboleEnCours = utf8_substr($sFormat,$i); $sTexteSeparateur = ''; } break; case 'H': { if (($nNombreSignificatif>0) && ($nValeurSymboleEnCours>0)) { --$nNombreSignificatif; if ($sTexteSeparateur===':') { if (empty($sSuffixeFinal)) $sSuffixeFinal = ' j'; $sResultat .= $sPrefixeSuivant . $sSymboleEnCours; $sPrefixeSuivant = $sTexteSeparateur; $sTexteSeparateur=''; } else { $sResultat .= $sPrefixeSuivant . $sSymboleEnCours . $sTexteSeparateur; } } if ($nNombreSignificatif===0) { $sTexteSeparateur = ''; break; } $sSymboleEnCours = utf8_substr($sFormat,$i). ((((string)utf8_substr($sFormat,$i+1,1))===utf8_substr($sFormat,$i)) ? utf8_substr($sFormat,$i): ''); $sTexteSeparateur =''; if (($nTaille>$i+1)&&(utf8_substr($sFormat,$i,1)===utf8_substr($sFormat,$i+1,1))) { $nValeurSymboleEnCours = $this->F387e0cb8(2,true); ++$i; } else { $nValeurSymboleEnCours = $this->getHeure(); } } break; case 'M': { if (($nNombreSignificatif>0) && ($nValeurSymboleEnCours>0)) { --$nNombreSignificatif; if ($sTexteSeparateur===':') { if (empty($sSuffixeFinal)) $sSuffixeFinal = ' h'; $sResultat .= $sPrefixeSuivant . $sSymboleEnCours; $sPrefixeSuivant = $sTexteSeparateur; $sTexteSeparateur=''; } else { $sResultat .= $sPrefixeSuivant . $sSymboleEnCours . $sTexteSeparateur; } } if ($nNombreSignificatif===0) { $sTexteSeparateur = ''; break; } $sSymboleEnCours = utf8_substr($sFormat,$i,1). ((((string)utf8_substr($sFormat,$i+1,1))===utf8_substr($sFormat,$i,1)) ? utf8_substr($sFormat,$i,1): ''); $sTexteSeparateur = ''; if (($nTaille>$i+1)&&(utf8_substr($sFormat,$i,1)===utf8_substr($sFormat,$i+1,1))) { $nValeurSymboleEnCours = $this->F4dccb29e(2,true); ++$i; } else { $nValeurSymboleEnCours = $this->getMinute(); } } break; case 'S': { if (($nNombreSignificatif>0) && ($nValeurSymboleEnCours>0)) { --$nNombreSignificatif; if ($sTexteSeparateur===':') { if (empty($sSuffixeFinal)) $sSuffixeFinal = ' m'; $sResultat .= $sPrefixeSuivant . $sSymboleEnCours; $sPrefixeSuivant = $sTexteSeparateur; $sTexteSeparateur=''; } else { $sResultat .= $sPrefixeSuivant . $sSymboleEnCours . $sTexteSeparateur; } } if ($nNombreSignificatif===0) { $sTexteSeparateur = ''; break; } $sSymboleEnCours = utf8_substr($sFormat,$i,1). ((((string)utf8_substr($sFormat,$i+1,1))===utf8_substr($sFormat,$i,1)) ? utf8_substr($sFormat,$i,1): ''); $sTexteSeparateur = ''; if (($nTaille>$i+1)&&(utf8_substr($sFormat,$i,1)===utf8_substr($sFormat,$i+1,1))) { $nValeurSymboleEnCours = $this->Fcf5775ce(2,true); ++$i; } else { $nValeurSymboleEnCours = $this->getSeconde(); } } break; case 'L': { if (($nTaille>$i+1)&&(utf8_substr($sFormat,$i,1)===utf8_substr($sFormat,$i+1,1))) { if (($nNombreSignificatif>0) && ($nValeurSymboleEnCours>0)) { --$nNombreSignificatif; if ($sTexteSeparateur===':') { if (empty($sSuffixeFinal)) $sSuffixeFinal = ' s'; $sResultat .= $sPrefixeSuivant . $sSymboleEnCours; $sPrefixeSuivant = $sTexteSeparateur; $sTexteSeparateur=''; } else { $sResultat .= $sPrefixeSuivant . $sSymboleEnCours . $sTexteSeparateur; } } if ($nNombreSignificatif===0) { $sTexteSeparateur = ''; break; } $sSymboleEnCours = 'LL'; $sSuffixePotentiel = ' cs'; if (($nTaille>$i+2)&&(utf8_substr($sFormat,$i+2,1)===utf8_substr($sFormat,$i+1,1))) { $nValeurSymboleEnCours = $this->F217e7cc7(3,true); $sSymboleEnCours .= 'L'; $sSuffixePotentiel = ' ms'; ++$i; } else { $nValeurSymboleEnCours = $this->F217e7cc7(2,true); } if (($nValeurSymboleEnCours>0) && ($sTexteSeparateur===':') && (empty($sSuffixeFinal))) $sSuffixeFinal = $sSuffixePotentiel; $sTexteSeparateur = ''; ++$i; } } break; default: $sTexteSeparateur.= utf8_substr($sFormat,$i,1); } } if ( ($nValeurSymboleEnCours>0) && !empty($sSymboleEnCours) && ($nNombreSignificatif>0)) { $sResultat .= $sPrefixeSuivant . $sSymboleEnCours; } if (($nNombreSignificatif>0) && ($nValeurSymboleEnCours>0)) $sResultat .= $sTexteSeparateur; $sResultat = '+' . $sResultat . $sSuffixeFinal ; } else { $sResultat = $sFormat; } return $sResultat; } function Fae167100($dateAnterieure,$datePosterieure) { $this->m_nJour = (int)Fb48b30e3($dateAnterieure,$datePosterieure); $this->m_nHeure = (int)$datePosterieure->getHeure() - $dateAnterieure->getHeure(); $this->m_nMinute = (int)$datePosterieure->getMinute() - $dateAnterieure->getMinute(); $this->m_nSeconde = (int)$datePosterieure->getSeconde() - $dateAnterieure->getSeconde(); $this->m_nMilliseconde = (int)$datePosterieure->getMilliseconde() - $dateAnterieure->getMilliseconde(); $this->F98777a9b(); } function Ffae07732($bAutoriseFinMoisAuto=true) { $this->F98777a9b(); } function F98777a9b() { $nSecDiff = floor($this->m_nMilliseconde/1000); if ($nSecDiff<>0) { $this->m_nSeconde+= $nSecDiff; $this->m_nMilliseconde-= 1000*$nSecDiff; } $nMinuteDiff = floor($this->m_nSeconde/60); if ($nMinuteDiff<>0) { $this->m_nMinute+= $nMinuteDiff; $this->m_nSeconde-= 60*$nMinuteDiff; } $nHeureDiff = floor($this->m_nMinute/60); if ($nHeureDiff<>0) { $this->m_nHeure+= $nHeureDiff; $this->m_nMinute-= 60*$nHeureDiff; } $nJourDiff = floor($this->m_nHeure/24); if ($nJourDiff<>0) { $this->m_nJour+= $nJourDiff; $this->m_nHeure-= 24*$nJourDiff; } $this->m_bValeurOk = true; } function Fc0d82be7() { return ( ($this->m_nJour < 0) || ($this->m_nHeure < 0) || ($this->m_nMinute < 0) || ($this->m_nSeconde < 0) || ($this->m_nMilliseconde < 0) || ($this->m_nAnnee < 0) || ($this->m_nMois < 0) || (!$this->m_bPositif) ) ? '-' : '' ; } function F97dc9065() { if (!$this->m_bValeurOk) $this->F98777a9b(); return $this->Fc0d82be7().abs($this->getJour()).$this->F387e0cb8().$this->F4dccb29e().$this->Fcf5775ce().$this->F217e7cc7(); } function F89a4730d() { return $this->Fc0d82be7().F04e7ba0d(floor(abs($this->m_nAnnee) / 100)).F04e7ba0d(abs($this->m_nAnnee),2,true,false).F04e7ba0d(abs($this->m_nMois)).F04e7ba0d(abs($this->m_nJour)); } function Fd3a4fbaa($fmkDuree) { $nCompare = $this->m_nAnnee - $fmkDuree->m_nAnnee; if ($nCompare!=0) return ($nCompare>0) ? 1 : -1; $nCompare = $this->m_nMois - $fmkDuree->m_nMois; if ($nCompare!=0) return ($nCompare>0) ? 1 : -1; $nCompare = $this->m_nJour - $fmkDuree->m_nJour; if ($nCompare!=0) return ($nCompare>0) ? 1 : -1; $nCompare = $this->m_nHeure - $fmkDuree->m_nHeure; if ($nCompare!=0) return ($nCompare>0) ? 1 : -1; $nCompare = $this->m_nMinute - $fmkDuree->m_nMinute; if ($nCompare!=0) return ($nCompare>0) ? 1 : -1; $nCompare = $this->m_nSeconde - $fmkDuree->m_nSeconde; if ($nCompare!=0) return ($nCompare>0) ? 1 : -1; $nCompare = $this->m_nMilliseconde - $fmkDuree->m_nMilliseconde; if ($nCompare!=0) return ($nCompare>0) ? 1 : -1; return 0; } function Fc87a5201() { return $this->F22097d71() / _NB_JOURS_PAR_AN_; } function F22097d71() { return $this->F1ba6a9e4() / (_NB_MILLISECONDES_PAR_AN_/_NB_JOURS_PAR_AN_); } function F031293c7() { return $this->F1ba6a9e4() / (_NB_MILLISECONDES_PAR_AN_/_NB_HEURES_PAR_AN_); } function F531a6f4e() { return $this->F1ba6a9e4() / (_NB_MILLISECONDES_PAR_AN_/_NB_MINUTES_PAR_AN_); } function Fdcc4b3c2() { return $this->F1ba6a9e4() / (_NB_MILLISECONDES_PAR_AN_/_NB_SECONDES_PAR_AN_); } function F1ba6a9e4() { return ( $this->m_nJour * (_NB_MILLISECONDES_PAR_AN_/_NB_JOURS_PAR_AN_) + $this->m_nHeure * (_NB_MILLISECONDES_PAR_AN_/_NB_HEURES_PAR_AN_) + $this->m_nMinute * (_NB_MILLISECONDES_PAR_AN_/_NB_MINUTES_PAR_AN_) + $this->m_nSeconde * (_NB_MILLISECONDES_PAR_AN_/_NB_SECONDES_PAR_AN_) + $this->m_nMilliseconde * (_NB_MILLISECONDES_PAR_AN_/_NB_MILLISECONDES_PAR_AN_) ) ; } } function Fb48b30e3($wddateNaissance, $wddateCalcul) { $diff = mktime(0, 0, 0, $wddateCalcul->getMois(), $wddateCalcul->getJour(), $wddateCalcul->getAnnee()) - mktime(0, 0, 0, $wddateNaissance->getMois(), $wddateNaissance->getJour(), $wddateNaissance->getAnnee()); return ($diff / 86400); } function F7c839cd9($wddateNaissance, $wddateCalcul) { $nNbAnnees = $wddateCalcul->getAnnee() - $wddateNaissance->getAnnee(); $nNbMois = 0; if ($wddateCalcul->getMois() >= $wddateNaissance->getMois()) { $nNbMois = $wddateCalcul->getMois() - $wddateNaissance->getMois(); } else { --$nNbAnnees; $nNbMois = 12 - $wddateNaissance->getMois() + $wddateCalcul->getMois(); } $nNbJours = 0; if($wddateCalcul->getJour() >= $wddateNaissance->getJour()) { $nNbJours = $wddateCalcul->getJour() - $wddateNaissance->getJour(); } else { $nMoisPrecedent = $wddateCalcul->getMois() - 1; if($nMoisPrecedent == 0) { $nMoisPrecedent = 12; } $tabJourParMois = array(31,28,31,30,31,30,31,31,30,31,30,31); if ($nMoisPrecedent===2 && $wddateCalcul->Fc2d9312d() ) { $tabJourParMois[1] = 29; } $nNbJours = $tabJourParMois[ $nMoisPrecedent-1 ] - $wddateNaissance->getJour(); if ($nNbJours<0) { $nNbJours = $wddateCalcul->getJour() - 1; } else { $nNbJours += $wddateCalcul->getJour(); } if($nNbMois!=0) { --$nNbMois; } else { --$nNbAnnees; $nNbMois=11; } } $Retour = new FMK_Date_Duree('',''); $Retour->m_nAnnee = $nNbAnnees; $Retour->m_nMois = $nNbMois; $Retour->m_nJour = $nNbJours; return $Retour; } ?>