<?php
//#24.0.156.0 MUCP_VTCCI
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='MUCP_VTCCI	PAGEMOD_UTILISATEURS	20230515222036';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD24.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
// Equivalent de [%URL()%]
$gszURL='PAGEMOD-Utilisateurs.php';
$j=1;$i=1;
session_start();
// protection contre register_globals = on
unset($PAGEMOD_UTILISATEURS);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(1,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_INSCRPTION_MEMBRES']=array(5=>array('NOM'=>'index','URL'=>'./'));

EnvSet('JOURSSEMAINE',array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche"));
EnvSet('MOIS',array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"));
EnvSet('HCreationAutoActive',true);
EnvSet('FORMATDATESYSTEME','JJ/MM/AAAA');
EnvSet('FORMATHEURESYSTEME','HH:MM');
EnvSet('UNITESTAILLESFICHIER',array("o","Ko","Mo","Go","To","Po"));
$_gszSEPDEVISE = "€";
$_gszSEPDEC = ",";
$_gszSEPMIL = " ";
//-----------------------------------------------------------------------
//  Restauration de contexte 
//-----------------------------------------------------------------------
RechargementPageSiBesoin('PAGEMOD_UTILISATEURS');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGEMOD_UTILISATEURS']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGEMOD_UTILISATEURS= $gTabVarSession['PAGEMOD_UTILISATEURS'];
	$PAGEMOD_UTILISATEURS->WB_RestaureContexte();
$MaPage = &$PAGEMOD_UTILISATEURS;
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGEMOD_UTILISATEURS)) {
$PAGEMOD_UTILISATEURS= new CPage(false);
$PAGEMOD_UTILISATEURS->Nom = 'PAGEMOD_Utilisateurs';
$PAGEMOD_UTILISATEURS->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGEMOD_UTILISATEURS->Alias = 'PAGEMOD_UTILISATEURS';
$PAGEMOD_UTILISATEURS->m_sNomPHP = 'PAGEMOD_UTILISATEURS';
$PAGEMOD_UTILISATEURS->Libelle = '';
$PAGEMOD_UTILISATEURS->bUTF8 = true;
$PAGEMOD_UTILISATEURS->bHTML5 = true;
$PAGEMOD_UTILISATEURS->bAvecContexte = true;
$PAGEMOD_UTILISATEURS->sFichierPalette = '.\\res\\BlueGreeniumn.wpc';
$PAGEMOD_UTILISATEURS->Plan = 1;
$PAGEMOD_UTILISATEURS->ImageFond = '';
$MaPage = &$PAGEMOD_UTILISATEURS;


//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------


// fin de bloc pour 'if (isset())' qui gère le cas ou session.bug_compat_42 est à VRAI
}
if (!$_bContexteProjetExiste) {
	// Pas de contexte, il faut initialiser le conctexte globlal
	$MonProjet= new CProjet();
//  Ouverture de l'analyse 
	HOuvreAnalyse($CheminRepRes.'MUCP_VTCCI.xdd');
	// on charge le code du projet, 
	if (	Res_Include('MUCP_VTCCI-prj.php',RES_PROJET)) {DeclMonProjet(); }
	$MonProjet->InitProjet('MUCP_VTCCI');
}
 else { 
	Res_Include('MUCP_VTCCI-prj.php',RES_PROJET);
}
//-----------------------------------------------------------------------
// Implémentation des Traitements 
//-----------------------------------------------------------------------
//-----------------------------------------------------------------------
// Procédures locales de la page
//-----------------------------------------------------------------------
// Code d'initialisation de page
function& PAGEMOD_Utilisateurs28_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGEMOD_Utilisateurs','PAGEMOD_Utilisateurs');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page
function& PAGEMOD_Utilisateurs151_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGEMOD_Utilisateurs','PAGEMOD_Utilisateurs');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& PAGEMOD_Utilisateurs151()
{
	ExecuteAncetre('PAGEMOD_Utilisateurs151_0');
	$WB_NIVEAU_PILE=empileVM('PAGEMOD_Utilisateurs','PAGEMOD_Utilisateurs');
	
	
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGEMOD_UTILISATEURS','PAGEMOD_Utilisateurs');

// Code de déclaration des globales de page



// Code d'initialisation de page
	PAGEMOD_Utilisateurs28_0();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGEMOD_UTILISATEURS','PAGEMOD_Utilisateurs');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGEMOD_UTILISATEURS)){
$_BTNACTION = TrouveBouton( $PAGEMOD_UTILISATEURS );

}
if ( !bRenvoitCodeHTML($PAGEMOD_UTILISATEURS,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGEMOD_Utilisateurs 15/05/2023 22:20 WEBDEV 24 24.0.206.1 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal; color:#1b9174;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}*::-moz-selection{color:#283640;background-color:#D1DCE3;}::selection{color:#283640;background-color:#D1DCE3;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001d59b7de3">
<link rel="stylesheet" type="text/css" href="res/static.css?100027ffa6337">
<link rel="stylesheet" type="text/css" href="Spatiumn230SpatiumnBlueGreeniumn.css?100002fc63caf">
<link rel="stylesheet" type="text/css" href="MUCP_VTCCI230SpatiumnBlueGreeniumn.css?1000092fa8d52">
<link rel="stylesheet" type="text/css" href="palette-BlueGreeniumn.css?100005c15a51b">
<link rel="stylesheet" type="text/css" href="PAGEMOD_Utilisateurs_style.css?10000d034fa69">
<style type="text/css">
body{line-height:normal;width:100%;margin:0 auto;width:100%;height:1132px;position:relative; color:#283640;} body{}html,body {background-color:#f0f0f0;position:relative;}#page{position:relative; background-color:#ffffff;min-height:1132px;height:auto !important; height:1132px; min-width:980px;width:auto !important;width:980px;}.l-5{background-color:#FFC040;}#M2,#tzM2{font-family:'Open Sans', Helvetica, Arial, sans-serif;background-color:#FFFFFF;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGEMOD_UTILISATEURS',15,'_COM')(event); " onunload="clWDUtil.pfGetTraitement('PAGEMOD_UTILISATEURS',16,'_COM')(event); "><form name="PAGEMOD_UTILISATEURS" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGEMOD_UTILISATEURS',18,void 0)(event); " method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGEMOD_UTILISATEURS->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:980px"><tr style="height:100%"><td><table style="width:980px;height:1132px"><tr style="height:1132px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  id="page" class="clearfix pos1"><table style="width:100.00%;height:1132px"><tr style="height:879px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  class="pos2"><div  class="pos3"><table id="M3">
<tr><td style=" height:879px; width:980px;"><div  class="pos4"><table style=" background-color:#ffc040;" id="M1">
<tr><td style=" height:317px; width:980px; background-color:#ffc040;"><div  class="pos5"><div  class="lh0 pos6"><table style=" width:678px;"><tr><td id="M2" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 2.3125rem;"><strong style="color: rgb(0, 255, 0);">MUTUELLE DE CONDUCTEUR PROFESSIONNEL DE VTC</strong></p></td></tr></table></div></div></td></tr></table></div></td></tr></table></div></div></div></td></tr><tr style="height:253px"><td class="ancragecenter" style="width:100.00%"><table style="margin:0 auto;;width:980px;height:253px"><tr style="height:253px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><table style=" background-color:#2c3c46;" id="M4">
<tr><td style=" height:253px; width:980px;"><div  class="pos7"><div  class="lh0 pos8"><table style=" width:198px;"><tr><td id="M5" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 2rem;"><span style="color: rgb(255, 255, 255);">MUCP-VTC</span></p></td></tr></table></div></div></td></tr></table></div></td></tr></table></td></tr></table></div></div></td></tr></table></td></tr></table>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?3fffe8f3e2d2f"></script>
<script type="text/javascript" src="./res/WDUtil.js?3ffff9b98d7a2"></script>
<script type="text/javascript" src="./res/WD.js?30028d23c8a89"></script>
<script type="text/javascript">
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/MUCP_VTCCI_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PAGE_=document["PAGEMOD_UTILISATEURS"];
<!--
var _COL={9:"#ffc3b9",66:"#ca232a"};
clWDUtil.DeclareTraitementEx("PAGEMOD_UTILISATEURS",true,[18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGEMOD_UTILISATEURS",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript" src="res/jquery-3.js?20000cd554760"></script><script type="text/javascript" src="res/jquery-ui.js?2000680761b69"></script><script type="text/javascript" src="res/jquery-effet.js?200044659718a"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200058ec00af2"></script><style type="text/css">.wbTooltip{font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:9pt;color:#FFFFFF;text-align:left;vertical-align:middle;background-color:#1B9174;border-radius:2px;padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ 	items: "[title]", position : {my: 'left top+20',collision: 'flip'},	track : true, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_30=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_30); ?>