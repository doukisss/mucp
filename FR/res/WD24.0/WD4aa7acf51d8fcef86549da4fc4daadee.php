<?php
//24.0.30.0 TYPE/Tableau.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 if (!defined('__INC__TYPE/Modele.php')) { define('__INC__TYPE/Modele.php',true); include_once(WB_INCLUDE_PATH.'WD6ee9539c0ad66df976b95a68703645fb.php'); } if (!defined('__INC__FMK/Compat/xsystem.php')) { define('__INC__FMK/Compat/xsystem.php',true); include_once(WB_INCLUDE_PATH.'WD14183cc5dbbd843da831afdd3bf106e4.php'); } if (!defined('__INC__Engine.php')) { define('__INC__Engine.php',true); include_once(WB_INCLUDE_PATH.'WD8589e5d7289954bc5ad75ef5011e44ad.php'); } class CTableau extends CTypeComparable { var $m_TypeReference; var $m_TypeReferenceOption = null; var $m_TypeReferenceGetType = null; var $m_TypeReferenceValeurDefaut = null; var $m_nIndiceWLElementCourant = 0; var $m_tabDimensions; var $m_tabOptionTri = null; var $m_bEstNull = false; function CTableau($Valeur = null) { if (is_object($Valeur)) { parent::CTypeAvecPropriete($Valeur); return; } if ( (!is_array($Valeur)) || (!isset($Valeur[0])) || (!is_array($Valeur[0]))) { if ( (isset($Valeur[0])) &&(!isset($Valeur[1])) && (is_object($Valeur[0])) ) { $this->m_TypeReference = _clone( $Valeur[0] ); } else { CreerType($this->m_TypeReference,$this->m_sNomWL,TYPEWL_VARIANT); } $this->m_tabDimensions = array(0); $this->F1fb82254(); parent::CTypeAvecPropriete($Valeur); } else { if ( (count($Valeur[0])>1) && isset($Valeur[0][1]) ) { if (is_array($Valeur[1]) && ( $Valeur[1][0] == 0 )) { $this->m_TypeReferenceOption = $Valeur[0][1]; $this->m_TypeReferenceGetType = $Valeur[0][0]; $this->m_TypeReferenceValeurDefaut = null; $this->m_TypeReference = null; } else { $this->m_TypeReferenceOption = $Valeur[0][1]; $tabParamsTypeReferece = array_slice($Valeur[0],1); $tabParamsTypeReferece[] = null; CreerType($this->m_TypeReference,$this->m_sNomWL,$Valeur[0][0],$tabParamsTypeReferece); } } else { CreerType($this->m_TypeReference,$this->m_sNomWL,$Valeur[0][0]); } $this->F1fb82254(); array_shift($Valeur); $nNbDimension = count($Valeur) - 1; $this->m_tabDimensions = array(); for($i=0; $i<$nNbDimension; $i++) { $this->m_tabDimensions[] = (!isset($Valeur[$i])) ? 0 : $Valeur[$i]; } parent::CTypeAvecPropriete($Valeur[$nNbDimension]); } $this->Ffec98bdb(); } function F983ca123() {return true;} function Ffe0e1b50() {return true;} function F8d048918() {return true;} function F511ca179() {return true;} function F14d02808() {return true;} function F1fb82254() { if (isset($this->m_TypeReference)) { $this->m_TypeReferenceGetType = $this->m_TypeReference->__GetType(); $this->m_TypeReferenceValeurDefaut = $this->m_TypeReference->F9d1a8478(); } } function F6571e3e1() { $tabDeps = array($this->__GetType()); $tabDeps[] = $this->m_TypeReferenceGetType; if (isset($this->m_TypeReference)) { $tabDeps = array_merge($tabDeps,$this->m_TypeReference->F6571e3e1()); } return $tabDeps; } function F832cba51( $key ) { return (array_key_exists(intval($key-1),$this->m_Valeur)); } function F9d1a8478() { $nNbDimensions = count($this->m_tabDimensions); $nNbInit = $this->m_tabDimensions[$nNbDimensions-1]; $tabInit = array(); if ($nNbInit > 0) { $tmpDefaut = $this->m_TypeReferenceValeurDefaut; for($i=1; $i<=$nNbInit; $i++) { $tabInit[] = (isset($this->m_TypeReference))?$this->m_TypeReference->F9d1a8478():$tmpDefaut; } } $tabDimensionPrecedente = $tabInit; for($i=$nNbDimensions-2; $i>=0; $i--) { $tabDimensionEnCours = array(); for($j=1; $j<=$this->m_tabDimensions[$i]; $j++) { $tabDimensionEnCours[] = $tabDimensionPrecedente; } $tabDimensionPrecedente = $tabDimensionEnCours; } return $tabDimensionPrecedente; } function F39f2478a() { Ffa91ebfd($this->m_Valeur); return true; } function F27be7c2f( $option ) { $this->m_tabOptionTri = $option; } function F2a24efcc( ) { return $this->m_tabOptionTri; } function& Fe7e633f2(&$variable, $init = null) { if (!isset($this->m_TypeReference)){ if (isset($this->m_TypeReferenceOption)) { return CreerType($variable,$this->m_sNomWL,$this->m_TypeReferenceGetType,array($this->m_TypeReferenceOption,$init)); } else { return CreerType($variable,$this->m_sNomWL,$this->m_TypeReferenceGetType,$init); } } else { $variable = _clone($this->m_TypeReference); Operateur(95,$variable,$init); return $variable; } } function SetValeur($Valeur) { parent::SetValeur($Valeur); if ($this->__GetType() !== TYPEWL_TABLEAU_ASSOCIATIF) { if (isset($this->m_tabDimensions[0]) && $this->m_tabDimensions[0]>count($this->m_Valeur,COUNT_NORMAL)) { $this->m_Valeur = array_pad($this->m_Valeur,$this->m_tabDimensions[0],((isset($this->m_TypeReference)?$this->m_TypeReference->F9d1a8478():$this->m_TypeReferenceValeurDefaut))); $this->Ffec98bdb(); } else if(is_array($Valeur)) { $this->Ffec98bdb(); } } } function F1b8e122c($Valeur) { if (is_object($Valeur)) { if ($Valeur->m_nIsXXX !== 0) { return $this->F1b8e122c(GetValeur($Valeur)); } switch ($Valeur->__GetType()) { case TYPEWL_TABLEAU: case TYPEWL_TABLEAU_FIXE: return $Valeur->m_Valeur; default: return $this->F9d1a8478(); } } else { if (is_array($Valeur)) { return $Valeur; } else { return $this->F9d1a8478(); } } } function Ffec98bdb() { $bVide = true; foreach ($this->m_Valeur as $nIndice => $valeur) { if (is_array($valeur) && ( count($this->m_tabDimensions,COUNT_NORMAL)>1 ) ) { $this->m_Valeur[$nIndice] = new CTableau(array(array($this->m_TypeReferenceGetType,$this->m_TypeReferenceOption),count($valeur,COUNT_NORMAL),null)); $this->m_Valeur[$nIndice]->m_Valeur = $valeur; $this->m_Valeur[$nIndice]->m_tabDimensions = array_slice($this->m_tabDimensions,1); $this->m_Valeur[$nIndice]->Ffec98bdb(); } elseif (!is_object($valeur)) { $this->Fe7e633f2($this->m_Valeur[$nIndice],$valeur); } $bVide = false; } $this->m_bEstNull = ($bVide && (!array_key_exists(0,$this->m_tabDimensions)||$this->m_tabDimensions[0]===0) ); } function& __GetType() { $t = TYPEWL_TABLEAU; return $t; } function& Fc424b461(){ Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('CONVERSION_IMPOSSIBLE'),$this->F3b9ec4ca(),Fc34ec142('TYPEWL_NOM_'.TYPEWL_CHAINE))); } function& Fcc4f5b5d($comparaison) { if ( ($comparaison->__GetType() !== TYPEWL_TABLEAU) && ($comparaison->__GetType() !== TYPEWL_TABLEAU_FIXE) ) { Fe81a7f9e('TYPE_INCOMPATIBLE',F3b9ec4ca($this),F3b9ec4ca($comparaison)); } if (isset($this->m_TypeReference) && isset($comparaison->m_TypeReference) && $comparaison->m_TypeReference->__GetType() != $this->m_TypeReference->__GetType() ) { $this->m_Valeur = array(); foreach ($comparaison->m_Valeur as $key => $value) { $this->F4df46aea($comparaison->m_Valeur[$key]); } } else $this->m_Valeur = $comparaison->m_Valeur; $this->m_tabDimensions = $comparaison->m_tabDimensions; $this->m_tabOptionTri = $comparaison->m_tabOptionTri; $this->m_bEstNull = $comparaison->m_bEstNull; $this->m_TypeReferenceOption = $comparaison->m_TypeReferenceOption; $this->m_TypeReferenceGetType = $comparaison->m_TypeReferenceGetType; $this->m_TypeReferenceValeurDefaut = $comparaison->m_TypeReferenceValeurDefaut; $this->m_TypeReference = $comparaison->m_TypeReference; return $this->m_Valeur; } function& operateurSub( $nIndice ) { $n = F075ca95b($nIndice); if ($n<1) { Fe81a7f9e('ERR_INDICE_TABLEAU_COMMENCE_1',$n,$this->m_sNomWL); } if (!isset($this->m_Valeur[$n - 1])) { Fe81a7f9e('ERR_INDICE_TABLEAU',count($this->m_Valeur,COUNT_NORMAL),$n,$this->m_sNomWL); } $this->m_nIndiceWLElementCourant = $n; return $this->m_Valeur[$n - 1]; } function& Fa2a5d851( $Valeur, $nIndice1, $nIndice2 ) { $clElement =& $this->operateurSub($nIndice1); return $clElement->Fc91f0eb7($Valeur,$nIndice2); } function& Fc986b390( $nIndice1 , $nIndice2 ) { $SousType =& $this->operateurSub($nIndice1); return GetValeur(SousType($SousType,$nIndice2)); } function& Fa4014e81( $compare ) { $nRetour = ( (serialize($this) === serialize($compare)) ? 0 : 1 ); return $nRetour; } function& F4df46aea( $SousElement = null ) { if ( (!isset($SousElement)) && ($this->Fc30d7e5d()) ) { $tabValeurDefaut = $this->F9d1a8478(); if ( !array_key_exists(0,$tabValeurDefaut) || ($tabValeurDefaut[0] == null) ) { $tabValeurDefaut[0] = array(); } $this->m_Valeur[] = $tabValeurDefaut[0]; $this->Ffec98bdb(); $nPositionAjout = count($this->m_Valeur,COUNT_NORMAL); return $nPositionAjout; } if (!isset($SousElement)) { $SousElement = $this->m_TypeReferenceValeurDefaut; } if ( (!is_array(GetValeur($SousElement))) || (!$this->Fc30d7e5d() &&($this->m_TypeReferenceGetType == TYPEWL_STRUCTURE)) ) { if (isset($SousElement)) { if (isset($this->m_TypeReference)) { $pclClone =& _clone($this->m_TypeReference); Operateur(95,$pclClone,$SousElement); $this->m_Valeur[]=$pclClone; } else { $this->m_Valeur[]=_clone($SousElement); } $nTaille = count($this->m_Valeur,COUNT_NORMAL); } else { $this->m_Valeur[] = 0; $nTaille = count($this->m_Valeur,COUNT_NORMAL); $this->Fe7e633f2($this->m_Valeur[$nTaille-1]); } } else { $this->m_Valeur[] = array(); $nTaille = count($this->m_Valeur,COUNT_NORMAL); $i=0; $tabSousElement = $SousElement->m_Valeur; foreach ($tabSousElement as $Feuille) { $this->m_Valeur[$nTaille-1][] = 0; $this->Fe7e633f2($this->m_Valeur[$nTaille-1][$i]); Operateur(95,$this->m_Valeur[$nTaille-1][$i],$Feuille); ++$i; if ( (isset($this->m_tabDimensions[1])) && ($this->m_tabDimensions[1]>0) && ($i >= $this->m_tabDimensions[1]) ) break; } } $this->Ffec98bdb(); return $nTaille; } function& Fdd5e85f8( ) { $bReussite = true; $this->m_Valeur = array_slice($this->m_Valeur,0,-1); return $bReussite; } function& Fc91f0eb7( $Valeur, $nIndice ) { $n = intval( F075ca95b($nIndice) ); if (array_key_exists($n - 1,$this->m_Valeur)) { $this->m_Valeur[ $n - 1 ]->Fcc4f5b5d($Valeur); } else { Erreur('ErreurGenerique',FMK_ChaineConstruit(F1ac3f040('ERR_INDICE_TABLEAU'),count($this->m_Valeur),$n,$this->m_sNomWL)); } return $this->m_Valeur[ $n - 1 ]; } function& F6bbd4334() { $bRetour = $this->m_bEstNull; return $bRetour; } function WB_InstructionLiberer() { $this->Fe551cca4(); $this->m_bEstNull = ($this->m_tabDimensions[0] === 0); } function F2e68cd7d($nIndice) { if (is_array($nIndice)) { return $this->m_Valeur[$nIndice[0]-1]->F2e68cd7d(array_slice($nIndice,1)); } else { if (!isset($this->m_Valeur[$nIndice-1])) return 0; array_splice($this->m_Valeur, $nIndice-1,1); return 1; } } function Fe551cca4() { $this->m_Valeur = array(); } function& GetOccurrence() { $nTotalOccurrence = 0; if (empty($this->m_Valeur)) return $nTotalOccurrence; if (!isset($this->m_Valeur[0]) || !F1bb79b96($this->m_Valeur[0])) { $nTotalOccurrence = count($this->m_Valeur,COUNT_NORMAL); return $nTotalOccurrence; } $nTotal = 0; $pclSousElement =& $this; $tmp = _array_map($this->m_Valeur); while((is_array($tmp) && array_key_exists(0,$tmp)) && (F1bb79b96($pclSousElement))) { if ($nTotal===0) $nTotal = 1; $nTotal *= count($tmp,COUNT_NORMAL); $pclSousElement =& SousType($pclSousElement,1); $tmp = $tmp[0]; } return $nTotal; } function Fc30d7e5d() { return (count($this->m_tabDimensions) > 1); } function Fa6cd7f2a() { return count($this->m_tabDimensions,COUNT_NORMAL); } function Ffe33562a() { return true; } function F5b70a1d3( &$serialiseur) { $strNbElementParDimension = ''; if(!$this->Fc30d7e5d()) { $strNbElementParDimension = $this->GetOccurrence(); } else { $nNbDimensions =$this->Fa6cd7f2a(); $nOccurrence = count($this->m_Valeur,COUNT_NORMAL); $bEstVide = ($nOccurrence===0); for($i=0;$i<$nNbDimensions;$i++) { if($i > 0) { $strNbElementParDimension .= ','; } $nDim = $this->m_tabDimensions[$i]; if ($i>0) { if ( ($nDim===0) ) { if (!$bEstVide) { $pclPremierElement =& $this->m_Valeur[ 0 ]; $nDim = count($pclPremierElement->m_Valeur,COUNT_NORMAL); } } } else { { if (!$bEstVide) { $nDim = max($nDim,$nOccurrence); } } } $strNbElementParDimension .= $nDim; } } $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_TABLEAU, $this->m_sNomWL , $strNbElementParDimension)); $serialiseur->Fbc6d6ee7(); $i = 0; for($element =& WB_Boucle_Pour_Tout_Element($Boucle, $this,getRef(null),$i,null,DepuisDebut); $Boucle->bContinuer(); $Boucle->continuer() ) { if (isset($element)) { $serialiseur->F9deb726c(TAG_ITEM_TABLEAU, GetValeur($element)); } } unset($Boucle); $serialiseur->F6a6846f4(); $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_FIN_ELEMENT,$this->m_sNomWL)); } function F81cf9784( &$serialiseur) { $serialiseur->m_writer.= '['; $bPremier=true; $nNbElements = count($this->m_Valeur,COUNT_NORMAL); for($i=0; $i<$nNbElements; ++$i) { if (!isset($this->m_Valeur[$i])) continue; if (F1bb79b96($this->m_Valeur[$i])) { if (!$bPremier) $serialiseur->m_writer.= ','; $this->m_Valeur[$i]->F81cf9784($serialiseur); } else { $serialiseur->F22e76fc5('', $this->m_Valeur[$i],$bPremier); } $bPremier=false; } $serialiseur->m_writer.= ']'; unset($Boucle); } function F1b864c68( &$deserialiseur,&$docJSON) { $tabNbElementParDimension = array(); $tabCourant = & $docJSON; $nNbDim = 0; while(is_array($tabCourant)) { ++$nNbDim; $tabNbElementParDimension[$nNbDim-1] = count($tabCourant,COUNT_NORMAL); $tabCourant =& $tabCourant[0]; } if(empty($tabNbElementParDimension)) { Fe81a7f9e('ERR_FORMAT_SERIALISATION_INCORRECT'); } if (!$deserialiseur->m_bConstructionReference) $this->F39f2478a(); $strNomClasse = $this->m_TypeReferenceOption; if (!$deserialiseur->m_bConstructionReference) { $tabInfoConstructeur = array(array($this->m_TypeReferenceGetType,$strNomClasse)); $tabInfoConstructeur = array_merge($tabInfoConstructeur,$tabNbElementParDimension); $tabInfoConstructeur[] = null; $this->CTableau($tabInfoConstructeur); } $nIndex = 1; $i = 0; $element =& WB_Boucle_Pour_Tout_Element($Boucle, $this,getRef(null),$i,null,DepuisDebut); for($nIndex=0; $nIndex<$tabNbElementParDimension[0]; ++$nIndex) { $valeur =& $docJSON[$nIndex]; if(isset($valeur)) { $pclValeurElement =& GetValeur($element); if ($element->Ffe33562a()) { $pclValeurElement->F1b864c68($deserialiseur,$valeur); } else { $sChaine = VersPrimitif($valeur); $sChaine = utf8_html_entity_decode($deserialiseur->m_bDoubleEncodageChaine ? json_decode($sChaine) : $sChaine,ENT_QUOTES); $pclValeurElement->F4629642a( (($deserialiseur->m_bUTF8 && !UNICODE_PAGE_UTF8) ? _cp1252_utf8_to_iso($sChaine) : $sChaine) ); } } $Boucle->continuer(); } } function F76c9fb0a( &$deserialiseur, &$docXML) { $sNomDoc = $docXML->F8a7479ce(); if(XMLRecherche($sNomDoc,ATT_TYPE_TABLEAU,XML_ATTRIBUT+XML_SOUS_ELEMENT,XML_EXACT)) { XMLAnnuleRecherche($sNomDoc); $tabNbElementParDimension = null; $strDescription = $docXML->ElementCourant->getValeur(); $nDebut= utf8_strpos($strDescription,'['); if($nDebut!==false) { $nFin = utf8_strpos($strDescription,']', $nDebut); if($nFin !== false) { $strDescription = utf8_substr($strDescription,$nDebut +1, $nFin); $tabDimensions = utf8_explode(',',$strDescription); $nNbDim = count($tabDimensions,COUNT_NORMAL); $tabNbElementParDimension = array_fill(0,$nNbDim,0); for ($i = 0; $i < $nNbDim; $i++) { $tabNbElementParDimension[$i] = intval($tabDimensions[$i]); if ( ($i>0) && ($tabNbElementParDimension[0]===0)) { $tabNbElementParDimension[0]=1; } } } } if(!isset($tabNbElementParDimension)) { Fe81a7f9e('ERR_FORMAT_SERIALISATION_INCORRECT'); } if (!$deserialiseur->m_bConstructionReference) $this->F39f2478a(); $strNomClasse = $this->m_TypeReferenceOption; if (!$deserialiseur->m_bConstructionReference) { $tabInfoConstructeur = array(array($this->m_TypeReferenceGetType,$strNomClasse)); $tabInfoConstructeur = array_merge($tabInfoConstructeur,$tabNbElementParDimension); $tabInfoConstructeur[] = null; $this->CTableau($tabInfoConstructeur); } $nIndex = 1; $i = 0; $element =& WB_Boucle_Pour_Tout_Element($Boucle, $this,getRef(null),$i,null,DepuisDebut); while($docXML->F32669fba()) { if($docXML->ElementCourant->Ffb92bfbf() == XML_BALISE && ($docXML->ElementCourant->F74438c68() == TAG_ITEM_TABLEAU)) { $valeur =& $deserialiseur->F7a69eba6($docXML); if(isset($valeur)) { if(is_object($valeur) && ($valeur->m_nIsXXX & 64)) { { if ($Boucle->bContinuer()) { Operateur(95,GetValeur($element),$valeur); } } } else { { if ($Boucle->bContinuer()) { $element->F4629642a(VersPrimitif($valeur)); } } } } ++$nIndex; $Boucle->continuer(); } } } else { Fe81a7f9e('ERR_FORMAT_SERIALISATION_INCORRECT'); } } } class CTableauFixe extends CTableau { function CTableauFixe($Valeur = null) { parent::CTableau($Valeur); } function& __GetType() { $t = TYPEWL_TABLEAU_FIXE; return $t; } function F3b9ec4ca() { $t = F83ff700b( TYPEWL_TABLEAU_FIXE ); return $t; } function& operateur($sTypeOperateur, $PartieDroite = null, $Valeur = null) { switch ($sTypeOperateur) { case 8281 : Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('OPERATEUR_INDISPONIBLE'),F9dbbbee0(8281),$this->F3b9ec4ca())); default : return parent::operateur($sTypeOperateur,$PartieDroite,$Valeur); } } } class CTableauAssociatif extends CTableau { var $m_bAvecDoublon; var $m_nOptionComparaison; var $m_ValeurSiInexistant; var $m_nTypeCle; var $m_tabOrdreAjout = array(); function CTableauAssociatif($Valeur = null) { if (!isset($Valeur[0])) { $tabInit = $Valeur; parent::CTableau(array(array(TYPEWL_VARIANT),count($tabInit),null)); foreach ($tabInit as $Cle => $ValeurAssociee) { Operateur(8253,$this,$Cle,$ValeurAssociee); } } else { $tabParametresTableauAssociatif = $Valeur[0]; $this->m_nOptionComparaison = $tabParametresTableauAssociatif[0]; $this->m_bAvecDoublon = Fdef56c7f($this->m_nOptionComparaison , 0x40000000); $this->m_ValeurSiInexistant = $tabParametresTableauAssociatif[1]; $this->m_nTypeCle = $tabParametresTableauAssociatif[2]; $tabInit = null; if (isset($Valeur[1][2])) { $tabInit = $Valeur[1][2]; $Valeur[1][2] = null; } parent::CTableau($Valeur[1]); if (isset($tabInit)) { if (is_object($tabInit) && ($this->__GetType() == $tabInit->__GetType())) { Operateur(95,$this,$tabInit); return; } foreach ($tabInit as $nIndice => $tabDuo) { if (!is_array($tabDuo)) { $Cle = $nIndice; $ValeurAssociee = $tabDuo; } else { $Cle = $tabDuo[0]; $ValeurAssociee = $tabDuo[1]; } Operateur(8253,$this,$Cle,$ValeurAssociee); } } } } function F9d1a8478() { return array(); } function& Fc424b461(){ Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('CONVERSION_IMPOSSIBLE'),Fc34ec142('TYPEWL_NOM_'.TYPEWL_TABLEAU),Fc34ec142('TYPEWL_NOM_'.TYPEWL_CHAINE))); } function& __GetType() { $t = TYPEWL_TABLEAU_ASSOCIATIF; return $t; } function Fc0527048() { return $this->m_bAvecDoublon; } function& GetDefaut() { return $this->m_ValeurSiInexistant; } function& GetVide() { $Vide = ($this->GetOccurrence() == 0); return $Vide; } function& GetOccurrence() { $nTotalOccurrence = 0; if (count($this->m_Valeur) == 0) return $nTotalOccurrence; foreach ($this->m_Valeur as $Element) { if (isset($Element->m_Valeur)) { $nTotalOccurrence += $Element->GetOccurrence(); } } return $nTotalOccurrence; } function& Fcc4f5b5d($comparaison) { if ($this->__GetType() != ($nTypeComparaison=$comparaison->__GetType())) { if ( ($nTypeComparaison === TYPEWL_TABLEAU) || ($nTypeComparaison === TYPEWL_TABLEAU_FIXE) ) { if ($comparaison->Fa6cd7f2a() === 2) { $this->Fe551cca4(); $nNbElements = $comparaison->GetOccurrence(); for($i=1; $i<=$nNbElements; ++$i) Operateur(8253, $this, Operateur(8252, Operateur(PHP_INTERF_OPERATEUR_SUB, $comparaison, $i ) , 1 ), Operateur(8252, Operateur(PHP_INTERF_OPERATEUR_SUB, $comparaison, $i ) , 2 ) ); return $this->m_Valeur; } } else { return Fe81a7f9e('TYPE_INCOMPATIBLE',F3b9ec4ca($this),F3b9ec4ca($comparaison)); } } $this->m_Valeur = _clone( $comparaison->m_Valeur ); $this->m_tabOrdreAjout = _clone( $comparaison->m_tabOrdreAjout ); return $this->m_Valeur; } function& operateurSub( $Indice ) { $v = GetValeur($Indice); if (isset($this->m_Valeur[$v])) return $this->m_Valeur[$v]; else { $tmp = new CElementAssociatif(array($this->m_bAvecDoublon,$v,$this->Fe7e633f2($tmp,$this->m_ValeurSiInexistant))); $tmp->F39f2478a(); return $tmp; } } function& Fc91f0eb7( $Valeur, $Indice ) { $v = GetValeur($Indice); if ($Valeur->m_nIsXXX & 128) { if (isset($this->m_Valeur[$v]) && ($this->m_bAvecDoublon))$this->m_Valeur[ $v ]->m_bElementTemporaire = true; return $this->Fc91f0eb7($Valeur->m_Valeur,$Indice); } if (isset($this->m_Valeur[$v])) { if ($this->m_Valeur[ $v ]->m_bElementTemporaire) { if ($this->m_bAvecDoublon) { $this->m_tabOrdreAjout[] = array($v,count($this->m_Valeur[ $v ]->m_Valeur->m_Valeur,COUNT_NORMAL)); } else { $this->m_tabOrdreAjout[] = array($v); } $this->m_Valeur[ $v ]->m_bElementTemporaire=false; } $this->m_Valeur[ $v ]->Fcc4f5b5d($Valeur); } else { if (($Valeur->__GetType() === TYPEWL_TABLEAU)&&($this->m_bAvecDoublon)) { $tmp=null; $this->m_Valeur[ $v ] = new CElementAssociatif(array($this->m_bAvecDoublon,$v,$this->Fe7e633f2($tmp,GetValeur($Valeur->m_TypeReference)))); $this->m_Valeur[ $v ]->m_bElementTemporaire = false; $this->m_Valeur[ $v ]->m_Valeur = $Valeur; $nMax = count($Valeur->m_Valeur,COUNT_NORMAL); for ($i=1;$i<=$nMax;$i++) { $this->m_tabOrdreAjout[] = array($v,$i); } } else { if ($this->m_bAvecDoublon) { $this->m_tabOrdreAjout[] = array($v,1); } else { $this->m_tabOrdreAjout[] = array($v); } $this->m_Valeur[ $v ] = new CElementAssociatif(array($this->m_bAvecDoublon,$v,$this->Fe7e633f2($tmp,$Valeur))); $this->m_Valeur[ $v ]->Fcc4f5b5d($Valeur); } } return $this->operateurSub( $Indice ); } function F2e68cd7d($Indice) { $v = GetValeur($Indice); if (!isset($this->m_Valeur[$v])) return 0; foreach ($this->m_tabOrdreAjout as $i => $e){ if ($e[0]==$v) { unset($this->m_tabOrdreAjout[$i]); } } $this->m_tabOrdreAjout = array_values($this->m_tabOrdreAjout); unset($this->m_Valeur[$v]); return 1; } function Fe551cca4() { $this->m_Valeur = array(); $this->m_tabOrdreAjout = array(); } function F5b70a1d3( &$serialiseur) { $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_DEBUT_ELEMENT,$this->m_sNomWL)); $serialiseur->Fbc6d6ee7(); $i = 0; for($entreeCourante =& WB_Boucle_Pour_Tout_Element($Boucle, $this,getRef(null),$i); $Boucle->bContinuer(); $Boucle->continuer() ) { $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_DEBUT_ELEMENT, TAG_ITEM_TABLEAU)); $serialiseur->Fbc6d6ee7(); $pclEntreeCourante =& GetValeur($entreeCourante); $cle = $pclEntreeCourante->m_Clef; if(isset($cle)) { CreerType($clCle,null,$cle,$cle,true); $strType = $clCle->F0a8d83f4(); if(!empty($strType)) { $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_CLE_TABLEAU_ASSOC,$strType, $cle)); } else { $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_CLE_TABLEAU_ASSOC,$cle)); } unset($clCle); } $valeur = $pclEntreeCourante->GetValeur(); if(isset($valeur)) { $serialiseur->F9deb726c(TAG_VALEUR_TABLEAU_ASSOC, $valeur); } $serialiseur->F6a6846f4(); $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_FIN_ELEMENT,TAG_ITEM_TABLEAU)); } unset($Boucle); $serialiseur->F6a6846f4(); $serialiseur->F2fa48b0e(FMK_ChaineConstruit(BALISE_FIN_ELEMENT, $this->m_sNomWL)); } function F81cf9784( &$serialiseur) { $i = 0; $serialiseur->m_writer .= '{'; $tabClefValeur=array(); $nNbClefValeur=0; for($entreeCourante =& WB_Boucle_Pour_Tout_Element($Boucle, $this,getRef(null),$i); $Boucle->bContinuer(); $Boucle->continuer() ) { if (!isset($entreeCourante)) continue; $sClef = VersChaine($entreeCourante->m_Indice1); if (!isset($sClef)) continue; if (!isset($tabClefValeur[$sClef])) { $tabClefValeur[$sClef] = array(); } $tabClefValeur[$sClef][]=$entreeCourante->GetValeur(); ++$nNbClefValeur; } $bPremier=true; $bPremierDoublon=true; foreach($tabClefValeur as $sClefValeur => $tabUneCleValeur) { if ($this->m_bAvecDoublon) { if (!$bPremierDoublon) { $serialiseur->m_writer .= ','; } $serialiseur->m_writer .= '"'.$sClefValeur . '": ['; $bPremier=true; $bPremierDoublon=false; } $nNbValPourCetteClef = count($tabUneCleValeur,COUNT_NORMAL); for($iValParClef=0; $iValParClef<$nNbValPourCetteClef; ++$iValParClef) { $serialiseur->F22e76fc5($this->m_bAvecDoublon ? "" : $sClefValeur,$tabUneCleValeur[$iValParClef],$bPremier); $bPremier=false; } if ($this->m_bAvecDoublon) { $serialiseur->m_writer .= ']'; } } $serialiseur->m_writer .= '}'; unset($Boucle); } function F76c9fb0a( &$deserialiseur, &$docXML) { $sNomDoc = $docXML->F8a7479ce(); $this->F39f2478a(); if($docXML->F399fc126()) { do { $nPositionXML= XMLSauvePosition($sNomDoc); $cle = null; $valeur = null; if($docXML->F399fc126()) { do { if($docXML->ElementCourant->Ffb92bfbf() == XML_BALISE && ($docXML->ElementCourant->F74438c68() == TAG_CLE_TABLEAU_ASSOC)) { $nTypeCle = constant('TYPEVAR_' . $this->m_nTypeCle); $nPositionXMLAvantRecherche = XMLSauvePosition($sNomDoc); XMLRecherche($sNomDoc,ATT_TYPE_CLE,XML_ATTRIBUT+XML_SOUS_ELEMENT,XML_EXACT); if(XMLSuivant($sNomDoc)) { $nTypeCle = F05685153($docXML->ElementCourant->getValeurElement()); } XMLAnnuleRecherche($sNomDoc); XMLRetourPosition($sNomDoc,$nPositionXMLAvantRecherche); CreerType($cle,'',constant('TYPEVAR_VERS_WL_' . $nTypeCle)); $cle->SetValeur($docXML->ElementCourant->getValeur()); } else if(!isset($cle) && ($docXML->ElementCourant->Ffb92bfbf() == XML_BALISE) && ($docXML->ElementCourant->F74438c68() == TAG_VALEUR_TABLEAU_ASSOC)) { $obj = $deserialiseur->F7a69eba6($docXML); if(isset($obj)) { if(is_object($obj)) { $valeur =& $obj; } else { $valeur = $this->Fe7e633f2($valeur); $valeur->F4629642a(VersPrimitif($obj)); } } } if(isset($cle) && isset($valeur)) { Operateur(8253,$this,$cle,$valeur); break; } }while($docXML->F32669fba()); $cle = null; $valeur = null; XMLRetourPosition($sNomDoc,$nPositionXML); } }while($docXML->F32669fba()); } } function F1b864c68( &$deserialiseur,&$docJSON) { $this->F39f2478a(); $cle=null; CreerType($cle,'',constant("TYPEVAR_VERS_WL_".$this->m_nTypeCle)); foreach (array_keys(get_object_vars($docJSON)) as $key) { $valeur =& $docJSON->$key; if(isset($valeur)) { $cle->SetValeur($key); if ($this->m_bAvecDoublon) { $nNbDoublons=count($valeur,COUNT_NORMAL); for($iDoublon=0; $iDoublon<$nNbDoublons; ++$iDoublon) { Operateur(95,SousType($this,$key),$valeur[$iDoublon]); } } else { $element =& SousType($this,$cle); $pclElement =& GetValeur($element); if (isset($pclElement->m_ObjetReference) && $pclElement->m_ObjetReference->Ffe33562a()) { $pclElement->m_ObjetReference->F1b864c68($deserialiseur,$valeur); } else { $sChaine = VersPrimitif($valeur); $sChaine = utf8_html_entity_decode($deserialiseur->m_bDoubleEncodageChaine ? json_decode($sChaine) : $sChaine,ENT_QUOTES); $pclElement->m_ObjetReference->F4629642a( (($deserialiseur->m_bUTF8 && !UNICODE_PAGE_UTF8) ? _cp1252_utf8_to_iso($sChaine) : $sChaine) ); } Operateur(8253,$this,$cle,$pclElement->m_ObjetReference); } } } } } class CElementAssociatif extends CTypeComparable { var $m_Clef; var $m_bAvecDoublon; var $m_ObjetReference; var $m_bElementTemporaire; function CElementAssociatif($Valeur = null) { $this->m_nIsXXX = 128; $this->m_bAvecDoublon = $Valeur[0]; $this->m_Clef = $Valeur[1]; $this->m_ObjetReference = $Valeur[2]; $this->m_bElementTemporaire = true; $this->m_Valeur = null; } function& __GetType() { return $this->m_ObjetReference->__GetType(); } function& GetVide() { return $this->m_bElementTemporaire; } function& Fba8109a7() { return! $this->GetVide(); } function F1b8e122c($Valeur) { if (!isset($Valeur)) return $Valeur; if ($this->m_bAvecDoublon) { if (F1bb79b96($Valeur)) { if (!is_object($Valeur)) CreerType($Valeur,$this->m_sNomWL,TYPEWL_TABLEAU,$Valeur); } else { CreerType($Valeur,$this->m_sNomWL,TYPEWL_TABLEAU,array($Valeur)); } return $Valeur; } return $this->m_ObjetReference->F1b8e122c($Valeur); } function& Fc424b461(){ if (!$this->m_bAvecDoublon) { return VersChaine($this->m_Valeur); } Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('CONVERSION_IMPOSSIBLE'),Fc34ec142('TYPEWL_NOM_'.TYPEWL_TABLEAU),Fc34ec142('TYPEWL_NOM_'.TYPEWL_CHAINE))); } function& Fcc4f5b5d($comparaison) { $this->m_bElementTemporaire = false; if (is_object($comparaison) && ($comparaison->__GetType() === TYPEWL_TABLEAU) ) { $this->m_Valeur = $comparaison; return $comparaison->GetValeur(); } else { CreerType($tmp,$this->m_sNomWL,$this->m_ObjetReference, $this->m_ObjetReference->F1b8e122c($comparaison) ); if ($this->m_bAvecDoublon) { if (!isset($this->m_Valeur)) { CreerType($this->m_Valeur,$this->m_sNomWL,TYPEWL_TABLEAU,array($this->m_ObjetReference)); $this->m_Valeur->m_Valeur[0]->Fcc4f5b5d( $tmp ); } else { $this->m_Valeur->F4df46aea( $tmp ); } } else { $this->m_Valeur = $tmp; } return $tmp->GetValeur(); } } function& GetValeur() { if (isset($this->m_Valeur)) { if ($this->m_bAvecDoublon) { if ($this->m_Valeur->GetOccurrence()>0) { return $this->m_Valeur->operateur(8252,1); } } else { return $this->m_Valeur; } } $Retour = GetValeur( $this->m_ObjetReference ); return $Retour; } function& operateurSub( $Indice ) { if ($this->m_bAvecDoublon) { CreerType($v,null,TYPEWL_ENTIER,$Indice); $v = GetValeur($v) ; if (isset($this->m_Valeur)&&($this->m_Valeur->F832cba51($v))) { return $this->m_Valeur->operateurSub($v); } else { Fe81a7f9e('ERR_ELEMENT_TABLEAU_INEXISTANT',$this->m_Clef.','.$v); } } else { if (!isset($this->m_Valeur)) { CreerType($this->m_Valeur,$this->m_sNomWL,$this->m_ObjetReference, $this->m_ObjetReference ); } return $this->m_Valeur->operateur(8252,$Indice); } } function& Fc91f0eb7( $Valeur, $Indice ) { $this->m_bElementTemporaire = false; if ($this->m_bAvecDoublon) { CreerType($v,null,TYPEWL_ENTIER,$Indice); $v = GetValeur($v) ; if (isset($this->m_Valeur)&&($this->m_Valeur->F832cba51($v))) { $this->m_Valeur->Fc91f0eb7($Valeur,$Indice); } else { Fe81a7f9e('ERR_ELEMENT_TABLEAU_INEXISTANT',$this->m_Clef.','.$v); } } else { $pclSub =& $this->operateurSub($Indice); return $pclSub->operateur(95,$Valeur); } return $this->operateurSub( $Indice ); } function& GetOccurrence() { if (!$this->m_bAvecDoublon) { $nOccurrence = 1; return $nOccurrence; } $nOccurrence = count( GetValeur( $this->m_Valeur ) ); return $nOccurrence; } function Ffe33562a() { return isset($this->m_Valeur) && $this->m_Valeur->Ffe33562a(); } function F35be7f7f($bPourJSON=false) { if (!isset($this->m_Valeur)) return $this->GetValeur(); return $this->m_Valeur->F35be7f7f($bPourJSON); } function F4629642a($s) { if (isset($this->m_Valeur)) $this->m_Valeur->SetValeur($s); } } function Ffa91ebfd(&$tab) { foreach ($tab as $nIndice => $CopieValeur) { if (is_array($CopieValeur)){ Ffa91ebfd($tab[$nIndice]); } else { $tab[$nIndice]->F39f2478a(); } } } ?>