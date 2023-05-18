<?php
//24.0.30.0 FMK/SQL/Requete.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 if (!defined('__INC__FMK/Disque.php')) { define('__INC__FMK/Disque.php',true); include_once(WB_INCLUDE_PATH.'WD99bd5984d9c78e9239c729a52b83e562.php'); } define('eSELECT',1); define('eSELECTUNION',2); define('eUPDATE',3); define('eINSERT',4); define('eDELETE',5); define('eCREATE_TABLE',6); define('eDROP_TABLE',7); define('eDISTINCT',0); define('eALL',1); define('eEVERY',0); define('eTOP',1); define('eBOTTOM',2); define('eLIMIT_MYSQL',3); define('eLIMIT_POSTGRESQL',4); define('eOPJOIN_NORMAL',0); define('eOPJOIN_FULL',1); define('eOPJOIN_RIGHT',2); define('eOPJOIN_LEFT',3); define('eCROISSANT',0); define('eDECROISSANT',1); $eOPEXPRESSION = -1; define('eCALC_PLUS',++$eOPEXPRESSION); define('eCALC_PLUS_UNAIRE',++$eOPEXPRESSION); define('eCALC_MOINS',++$eOPEXPRESSION); define('eCALC_MOINS_UNAIRE',++$eOPEXPRESSION); define('eCALC_MUL',++$eOPEXPRESSION); define('eCALC_DIV',++$eOPEXPRESSION); define('eCALC_NVL',++$eOPEXPRESSION); define('eCALC_ISNULL',++$eOPEXPRESSION); define('eCALC_IFNULL',++$eOPEXPRESSION); define('eCOMP_EGAL',++$eOPEXPRESSION); define('eCOMP_DIF',++$eOPEXPRESSION); define('eCOMP_INF',++$eOPEXPRESSION); define('eCOMP_INF_EGAL',++$eOPEXPRESSION); define('eCOMP_SUP',++$eOPEXPRESSION); define('eCOMP_SUP_EGAL',++$eOPEXPRESSION); define('eCOMP_COMMENCE',++$eOPEXPRESSION); define('eCOMP_NOT_COMMENCE',++$eOPEXPRESSION); define('eCOMP_CONTIENT',++$eOPEXPRESSION); define('eCOMP_NOT_CONTIENT',++$eOPEXPRESSION); define('eCOMP_ENVEGAL',++$eOPEXPRESSION); define('eCOMP_ENVCONTIENT',++$eOPEXPRESSION); define('eCOMP_EGALSOUPLE',++$eOPEXPRESSION); define('eCOMP_IN',++$eOPEXPRESSION); define('eCOMP_BETWEEN',++$eOPEXPRESSION); define('eLOGI_AND',++$eOPEXPRESSION); define('eLOGI_OR',++$eOPEXPRESSION); define('eLOGI_NOT',++$eOPEXPRESSION); define('eFONC_AVG',++$eOPEXPRESSION); define('eFONC_SUM',++$eOPEXPRESSION); define('eFONC_MIN',++$eOPEXPRESSION); define('eFONC_MAX',++$eOPEXPRESSION); define('eFONC_COUNT',++$eOPEXPRESSION); define('eLIKE',++$eOPEXPRESSION); define('eNULL',++$eOPEXPRESSION); define('eMATH_SIN',++$eOPEXPRESSION); define('eMATH_COS',++$eOPEXPRESSION); define('eMATH_TAN',++$eOPEXPRESSION); define('eMATH_ACOS',++$eOPEXPRESSION); define('eMATH_ASIN',++$eOPEXPRESSION); define('eMATH_ATAN',++$eOPEXPRESSION); define('eMATH_VARIANCE',++$eOPEXPRESSION); define('eMATH_ECARTTYPE',++$eOPEXPRESSION); define('eSTRING_LEFT',++$eOPEXPRESSION); define('eSTRING_RIGHT',++$eOPEXPRESSION); define('eSTRING_MID',++$eOPEXPRESSION); define('eSTRING_UPPER',++$eOPEXPRESSION); define('eSTRING_LOWER',++$eOPEXPRESSION); define('eOP_COL',++$eOPEXPRESSION); define('eOP_LIT',++$eOPEXPRESSION); define('eOP_PARAM',++$eOPEXPRESSION); define('eSTRING_SUBSTR',++$eOPEXPRESSION); define('eSTRING_SUBSTRING',++$eOPEXPRESSION); define('eSTRING_LTRIM',++$eOPEXPRESSION); define('eSTRING_RTRIM',++$eOPEXPRESSION); define('eSTRING_LENGTH',++$eOPEXPRESSION); define('eSTRING_LEN',++$eOPEXPRESSION) ; define('eSTRING_INSTR',++$eOPEXPRESSION); define('eSTRING_PATINDEX',++$eOPEXPRESSION); define('eREQ_SOUSREQ',++$eOPEXPRESSION); define('eMATH_ROUND',++$eOPEXPRESSION); define('eMATH_SQRT',++$eOPEXPRESSION); define('eMATH_ABS',++$eOPEXPRESSION); define('eMATH_EXP',++$eOPEXPRESSION); define('eMATH_FLOOR',++$eOPEXPRESSION); define('eMATH_LN',++$eOPEXPRESSION); define('eMATH_LOG',++$eOPEXPRESSION); define('eMATH_MOD',++$eOPEXPRESSION); define('eMATH_PI',++$eOPEXPRESSION); define('eMATH_POWER',++$eOPEXPRESSION); define('eMATH_SIGN',++$eOPEXPRESSION); define('eMATH_TRUNC',++$eOPEXPRESSION); define('eMATH_LOG10',++$eOPEXPRESSION); define('eMATH_CEILING',++$eOPEXPRESSION); define('eWL_FUNCTION',++$eOPEXPRESSION); define('eSTORED_FUNCTION',++$eOPEXPRESSION); define('eSTRING_MID_FROMFOR',++$eOPEXPRESSION); define('eSTRING_SUBSTRING_FROMFOR',++$eOPEXPRESSION); define('eSTRING_CHARACTER_LENGTH',++$eOPEXPRESSION); define('eSTRING_CHAR_LENGTH',++$eOPEXPRESSION); define('eSTRING_OCTET_LENGTH',++$eOPEXPRESSION); define('eSTRING_TRIM',++$eOPEXPRESSION); define('eSTRING_TRIM_BOTH',++$eOPEXPRESSION); define('eSTRING_TRIM_LEADING',++$eOPEXPRESSION); define('eSTRING_TRIM_TRAILING',++$eOPEXPRESSION); define('eSTRING_REPLACE',++$eOPEXPRESSION); define('eSTRING_TRANSLATE',++$eOPEXPRESSION); define('eSTRING_LPAD',++$eOPEXPRESSION); define('eSTRING_RPAD',++$eOPEXPRESSION); define('eSTRING_CONCAT',++$eOPEXPRESSION); define('eSTRING_POSITION',++$eOPEXPRESSION); define('eSTRING_ASCII',++$eOPEXPRESSION); define('eSTRING_BIN',++$eOPEXPRESSION); define('eSTRING_HEX',++$eOPEXPRESSION); define('eSTRING_OCT',++$eOPEXPRESSION); define('eSTRING_DECODE',++$eOPEXPRESSION); define('eSTRING_SOUNDEX',++$eOPEXPRESSION); define('eSTRING_SOUNDEX2',++$eOPEXPRESSION); define('eDATE_SYSDATE',++$eOPEXPRESSION); define('eDATE_ADDMONTH',++$eOPEXPRESSION); define('eDATE_LASTDAY',++$eOPEXPRESSION); define('eDATE_MONTHBETWEEN',++$eOPEXPRESSION); define('eDATE_NEXTDAY',++$eOPEXPRESSION); define('eDATE_NEWTIME',++$eOPEXPRESSION); define('eCOALESCE',++$eOPEXPRESSION); define('eDATE_TO_DATE',++$eOPEXPRESSION); define('eFULLTEXT',++$eOPEXPRESSION); define('eCASE1',++$eOPEXPRESSION); define('eCASE2',++$eOPEXPRESSION); define('eSTRING_UNICODE',++$eOPEXPRESSION); define('eDATE_CURRENTDATE',++$eOPEXPRESSION); define('eMATH_CEIL',++$eOPEXPRESSION); define('eMATH_CBRT',++$eOPEXPRESSION); define('eMATH_DEGREES',++$eOPEXPRESSION); define('eMATH_DIV',++$eOPEXPRESSION); define('eMATH_RADIANS',++$eOPEXPRESSION); define('eMATH_RANDOM',++$eOPEXPRESSION); define('eMATH_UUID',++$eOPEXPRESSION); define('eLAST_INSERT_ID',++$eOPEXPRESSION); unset($eOPEXPRESSION); define('TYPE_SOUSREQUETE_UNKNOWN',-1); define('TYPE_SOUSREQUETE_COMPARAISON',0); define('TYPE_SOUSREQUETE_EXISTS',1); define('TYPE_SOUSREQUETE_ALL',2); define('TYPE_SOUSREQUETE_ANY',3); define('TYPE_SOUSREQUETE_EXP_SCAL',4); function CSQLParserInfo_s_bIsFunction( $eExp) { $bRet=false; switch($eExp) { case eCALC_PLUS : case eCALC_PLUS_UNAIRE : case eCALC_MOINS : case eCALC_MOINS_UNAIRE : case eCALC_MUL : case eCALC_DIV : case eCOMP_EGAL : case eCOMP_DIF : case eCOMP_INF : case eCOMP_INF_EGAL : case eCOMP_SUP : case eCOMP_SUP_EGAL : case eCOMP_COMMENCE : case eCOMP_NOT_COMMENCE : case eCOMP_CONTIENT : case eCOMP_NOT_CONTIENT : case eCOMP_ENVEGAL : case eCOMP_ENVCONTIENT : case eCOMP_EGALSOUPLE : case eCOMP_IN : case eCOMP_BETWEEN : case eLOGI_AND : case eLOGI_OR : case eLOGI_NOT : case eCASE1: case eCASE2: case eLIKE : case eNULL : case eOP_COL : case eOP_LIT : case eOP_PARAM : case eMATH_PI: break; case eFONC_AVG : case eFONC_SUM : case eFONC_MIN : case eFONC_MAX : case eFONC_COUNT : case eSTRING_SUBSTR : case eSTRING_SUBSTRING : case eSTRING_LTRIM : case eSTRING_RTRIM : case eSTRING_LENGTH : case eSTRING_LEN : case eSTRING_INSTR : case eSTRING_PATINDEX : case eSTRING_SOUNDEX: case eMATH_SIN : case eMATH_COS : case eMATH_TAN : case eMATH_ACOS : case eMATH_ASIN : case eMATH_ATAN : case eMATH_VARIANCE : case eMATH_ECARTTYPE : case eMATH_ROUND: case eMATH_SQRT: case eMATH_ABS: case eMATH_EXP: case eMATH_FLOOR: case eMATH_LN: case eMATH_LOG: case eMATH_LOG10: case eMATH_MOD: case eMATH_POWER: case eMATH_SIGN: case eMATH_TRUNC: case eMATH_CEILING : case eSTRING_MID_FROMFOR : case eSTRING_SUBSTRING_FROMFOR : case eSTRING_CHARACTER_LENGTH : case eSTRING_CHAR_LENGTH : case eSTRING_OCTET_LENGTH : case eSTRING_TRIM : case eSTRING_TRIM_BOTH : case eSTRING_TRIM_LEADING : case eSTRING_TRIM_TRAILING : case eSTRING_REPLACE : case eSTRING_TRANSLATE : case eSTRING_LPAD : case eSTRING_RPAD : case eSTRING_CONCAT : case eSTRING_POSITION : case eSTRING_ASCII : case eSTRING_BIN : case eSTRING_HEX : case eSTRING_OCT : case eSTRING_LEFT : case eSTRING_RIGHT : case eSTRING_MID : case eSTRING_UPPER : case eSTRING_LOWER : case eCALC_NVL: case eCALC_ISNULL: case eCALC_IFNULL: case eDATE_SYSDATE: case eDATE_ADDMONTH: case eDATE_LASTDAY: case eDATE_MONTHBETWEEN: case eDATE_NEXTDAY: case eDATE_NEWTIME: case eCOALESCE: case eSTRING_DECODE: $bRet=true; break; } return $bRet; } define('FMK_SQL_CLASSE_INVALIDE',0); define('FMK_SQL_CLASSE_REQUETE',1); define('FMK_SQL_CLASSE_PARAM',2); define('FMK_SQL_CLASSE_FICHIER',3); define('FMK_SQL_CLASSE_RUBRIQUE',4); define('FMK_SQL_CLASSE_KW',5); define('FMK_SQL_CLASSE_EXPRESSION',6); define('FMK_SQL_CLASSE_ITEM',7); define('FMK_SQL_CLASSE_JOINTURE',8); class FMK_SQL_Base { var $m_nClasse; var $m_nPosDebut; var $m_nPosFin; } class FMK_SQL_Requete extends FMK_SQL_Item { var $m_nTypeRequete; var $m_tabParams = null; var $m_pszCodeSQLEnCours; var $m_pszClauseEnCours = null; var $m_sCodeOriginel; var $m_clSelect; var $m_clFrom; var $m_clWhere; var $m_clGroupBy; var $m_clHaving; var $m_clOrderBy; var $m_clLimit; var $m_clSet; var $m_tabItems = array(); var $m_tabItemsUnion = array(); var $m_pclOperande; function FMK_SQL_Requete($nTypeRequete) { $this->m_nTypeRequete = $nTypeRequete; $this->m_nClasse = FMK_SQL_CLASSE_REQUETE; $this->m_pclOperande = null; } function term($sFichier) { if (HF_CACHE_WDR && !file_exists($sFichierACP=F9486bf1a($sFichier))) { $sRep = dirname($sFichier); $sFichierRev = utf8_strrev($sFichier); $sNomRequete = utf8_strrev( utf8_substr($sFichierRev,utf8_strpos($sFichierRev,'_')) ); F6b1e3687(); $resDossier = opendir(F9486bf1a($sRep)); F1e7b0563(); if ($resDossier!==false) { while ( ($sFichierEnCoursACP = readdir($resDossier)) !== false ) { $sFichierEnCours = F8df7b692($sFichierEnCoursACP); if ( utf8_strpos($sFichierEnCours,$sNomRequete) ) { Fc0adeacb(F0ac3fb91($sRep) . $sFichierEnCours); } } } $f = fopen($sFichierACP,'w+'); fwrite($f,serialize($this)); fclose($f); } } function add($pclObj) { $this->m_tabItems[] =& $pclObj; } function addUnion($pclObj) { $this->m_tabItemsUnion[] =& $pclObj; } function Ffaa5b6f5(&$pclAN,$TabParam) { if (!isset($pclAN)) { return null; } $this->m_tabParams = $TabParam; return $pclAN->F8b1e2536($this); } } function bReloadFrom(&$pclRequete,$sFichier) { if (HF_CACHE_WDR && file_exists($sFichierACP=F9486bf1a($sFichier))) { $pclRequete = unserialize(file_get_contents($sFichierACP)); return is_object($pclRequete); } return false; } function Ffaa5b6f5(&$pclSQLBase,&$pclAN,$bSansFormattageItemOuParam=false) { switch($pclSQLBase->m_nClasse) { case FMK_SQL_CLASSE_REQUETE: $pclSQLBase->m_tabParams = $pclAN->m_pclRequeteEnCours->m_tabParams; $pszCodeSQL = $pclAN->F8b1e2536($pclSQLBase); break; case FMK_SQL_CLASSE_PARAM: $pszCodeSQL = $pclAN->Fc0f43b5f($pclSQLBase,$bSansFormattageItemOuParam); if (!$bSansFormattageItemOuParam && ($pclAN->m_pclItemEnCours->m_nClasse == FMK_SQL_CLASSE_RUBRIQUE)) { $pszCodeSQL = $pclAN->Fdc8698c9($pclAN->Fae15aba3($pclAN->m_pclItemEnCours->m_sNomFichier,$pclAN->m_pclItemEnCours->m_sNom) ,$pszCodeSQL); } break; case FMK_SQL_CLASSE_FICHIER: $pszCodeSQL = $pclAN->F518ae2fe($pclSQLBase); break; case FMK_SQL_CLASSE_RUBRIQUE: $pclAN->m_pclItemEnCours =& $pclSQLBase; $pszCodeSQL = $pclAN->F93ec5569($pclSQLBase); break; case FMK_SQL_CLASSE_EXPRESSION: $pszCodeSQL = $pclAN->F4500afc6($pclSQLBase); break; case FMK_SQL_CLASSE_ITEM: $pszCodeSQL = $pclSQLBase->m_sNom; if (!$bSansFormattageItemOuParam && ($pclAN->m_pclItemEnCours->m_nClasse == FMK_SQL_CLASSE_RUBRIQUE)) { $pclFichierAnalyse = F80229053($pclAN->m_pclItemEnCours->m_sNomFichier,false,false); if (isset($pclFichierAnalyse)) { $sNomRubrique = $pclAN->m_pclItemEnCours->m_sNom; if (($nPos=utf8_strpos($sNomRubrique,'.'))!==false) { $sNomRubrique = utf8_substr($sNomRubrique,$nPos+1); } $pclRubriqueAnalyse =& F2b6640f3($pclFichierAnalyse,$sNomRubrique); if (isset($pclRubriqueAnalyse)) { $pszCodeSQL = $pclAN->Fdc8698c9($pclRubriqueAnalyse,$pclSQLBase->m_sNom); } } } break; case FMK_SQL_CLASSE_JOINTURE: $pszCodeSQL = $pclAN->F79056dd0($pclSQLBase); break; case FMK_SQL_CLASSE_KW: return null; break; case FMK_SQL_CLASSE_INVALIDE: default: return null; } return $pszCodeSQL; } class FMK_SQL_Item extends FMK_SQL_Base { var $m_sNom; var $m_sAlias; var $m_tabOptions = array(); function FMK_SQL_Item() { $this->m_nClasse = FMK_SQL_CLASSE_ITEM; } } class FMK_SQL_Param extends FMK_SQL_Item { var $m_pszNomParametre = null; var $m_nTypeParam = null; function FMK_SQL_Param() { $this->m_nClasse = FMK_SQL_CLASSE_PARAM; } } class FMK_SQL_Fichier extends FMK_SQL_Item { function FMK_SQL_Fichier() { $this->m_nClasse = FMK_SQL_CLASSE_FICHIER; } } class FMK_SQL_Rubrique extends FMK_SQL_Item { var $m_sNomFichier; var $m_sAliasFichier; var $m_nIndiceTableau; function FMK_SQL_Rubrique() { $this->m_nIndiceTableau=-1; $this->m_nClasse = FMK_SQL_CLASSE_RUBRIQUE; } } class FMK_SQL_KW extends FMK_SQL_Base { var $m_tabItems = array(); function add($pclObj) { $this->m_tabItems[] =& $pclObj; } function FMK_SQL_KW() { $this->m_nClasse = FMK_SQL_CLASSE_KW; } } class FMK_SQL_OpExpression extends FMK_SQL_KW { var $m_nOpExpression; var $m_sOpExpression; var $m_sExpressionComplete; var $m_tabOptionsExpression = array(); var $m_sAlias; function FMK_SQL_OpExpression($nOp,$sOp,$sExpression) { $this->m_nOpExpression = $nOp; $this->m_sOpExpression = $sOp; $this->m_sExpressionComplete = $sExpression; $this->m_nClasse = FMK_SQL_CLASSE_EXPRESSION; } } class FMK_SQL_Set extends FMK_SQL_KW { } class FMK_SQL_Select extends FMK_SQL_KW { var $m_eOPTIONSELECT = eALL; } class FMK_SQL_From extends FMK_SQL_KW { } class FMK_SQL_Where extends FMK_SQL_KW { } class FMK_SQL_Having extends FMK_SQL_KW { } class FMK_SQL_GroupBy extends FMK_SQL_KW { } class FMK_SQL_OrderBy extends FMK_SQL_KW { } class FMK_SQL_Limit extends FMK_SQL_KW { var $m_nType; var $m_nNombreEnregs; var $m_pclNombreEnregs = null; var $m_nDepuis; var $m_pclDepuis = null; } class FMK_SQL_Jointure extends FMK_SQL_Item { var $m_bFilsGaucheEstTable; var $m_piFilsGauche; var $m_bFilsDroiteEstTable; var $m_piFilsDroite; var $m_piConditionOn; var $m_eTypeJointure; function FMK_SQL_Jointure() { $this->m_nClasse = FMK_SQL_CLASSE_JOINTURE; } } ?>