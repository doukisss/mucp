<?php
//#24.0.156.0 MUCP_VTCCI
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='MUCP_VTCCI	PAGE_WHATAPP	20230517030129';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD24.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CBouton');
IHM_Include('CImage');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
// Equivalent de [%URL()%]
$gszURL='whatapp.php';
$j=1;$i=1;
session_start();
// protection contre register_globals = on
unset($PAGE_WHATAPP);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(1,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gszCheminPageInverse='./';
$gtabCheminPage['PAGE_WHATAPP']=array(5=>array('NOM'=>'whatapp','URL'=>'./'));
$gtabCheminPage['PAGE_UTILISATEURS']=array(5=>array('NOM'=>'Utilisateurs','URL'=>'./'));
$gtabCheminPage['PAGE_CONNEXION']=array(5=>array('NOM'=>'Connexion','URL'=>'./'));
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
RechargementPageSiBesoin('PAGE_WHATAPP');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_WHATAPP']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_WHATAPP= $gTabVarSession['PAGE_WHATAPP'];
	$PAGE_WHATAPP->WB_RestaureContexte();
$MaPage = &$PAGE_WHATAPP;
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_WHATAPP)) {
$PAGE_WHATAPP= new CPage(false);
$PAGE_WHATAPP->Nom = 'PAGE_whatapp';
$PAGE_WHATAPP->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_WHATAPP->Alias = 'PAGE_WHATAPP';
$PAGE_WHATAPP->m_sNomPHP = 'PAGE_WHATAPP';
$PAGE_WHATAPP->Libelle = 'whatapp';
$PAGE_WHATAPP->bUTF8 = true;
$PAGE_WHATAPP->bHTML5 = true;
$PAGE_WHATAPP->bAvecContexte = true;
$PAGE_WHATAPP->sFichierPalette = '.\\res\\BlueGreeniumn.wpc';
$PAGE_WHATAPP->Plan = 1;
$PAGE_WHATAPP->ImageFond = '';
$MaPage = &$PAGE_WHATAPP;
$A3_BTN_Lien_WhatsApp=&CreerChamp('CBouton');$PAGE_WHATAPP->WB_AjouteChamp('BTN_Lien_WhatsApp','A3',$A3_BTN_Lien_WhatsApp,'A3_BTN_Lien_WhatsApp');
$A3_BTN_Lien_WhatsApp->m_bLibelleRiche=true;

$M6_IMG_Logo_Personnalise_2=&CreerChamp('CImage',207,57,15790320);$PAGE_WHATAPP->WB_AjouteChamp('IMG_Logo_Personnalisé_2','M6',$M6_IMG_Logo_Personnalise_2,'M6_IMG_Logo_Personnalise_2');
$M6_IMG_Logo_Personnalise_2->m_bDefilementAutomatique=false;
$M6_IMG_Logo_Personnalise_2->m_nDefilementTemporisation=1000;
$M6_IMG_Logo_Personnalise_2->m_bDefilementLancementAutomatique=true;
$M6_IMG_Logo_Personnalise_2->m_bDefilementModeRepertoire=true;
$M6_IMG_Logo_Personnalise_2->m_bDefilementTriActif=false;
$M6_IMG_Logo_Personnalise_2->m_nDefilementTriOptions=-1;
$M6_IMG_Logo_Personnalise_2->eTypeImage=4;
$M6_IMG_Logo_Personnalise_2->nModeAffichage=15;
$M6_IMG_Logo_Personnalise_2->nTransparence=1;
$M6_IMG_Logo_Personnalise_2->bForceTailleReelle=true;
$M6_IMG_Logo_Personnalise_2->sConteneurAliasOuFond=0xFFFFFF;

$M5_IMG_Logo=&CreerChamp('CImage',853,241,15790320);$PAGE_WHATAPP->WB_AjouteChamp('IMG_Logo','M5',$M5_IMG_Logo,'M5_IMG_Logo');
$M5_IMG_Logo->m_bDefilementAutomatique=false;
$M5_IMG_Logo->m_nDefilementTemporisation=1000;
$M5_IMG_Logo->m_bDefilementLancementAutomatique=true;
$M5_IMG_Logo->m_bDefilementModeRepertoire=true;
$M5_IMG_Logo->m_bDefilementTriActif=false;
$M5_IMG_Logo->m_nDefilementTriOptions=-1;
$M5_IMG_Logo->eTypeImage=4;
$M5_IMG_Logo->nModeAffichage=15;
$M5_IMG_Logo->nTransparence=1;
$M5_IMG_Logo->bForceTailleReelle=true;
$M5_IMG_Logo->sConteneurAliasOuFond=0x463C2C;



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A3_BTN_Lien_WhatsApp->Libelle = function_exists("construireTexteRiche_A3_BTN_Lien_WhatsApp") ? null : '<span class="" style="font-size: 1.6875rem;">Lien WhatsApp</span>';
$A3_BTN_Lien_WhatsApp->JetonActif = false;


$A3_BTN_Lien_WhatsApp->lierVM('PAGE_whatapp','BTN_Lien_WhatsApp','A3_BTN_Lien_WhatsApp');
$M6_IMG_Logo_Personnalise_2->Valeur = '../ext/logo (Personnalisé) (2).jpg';
$M6_IMG_Logo_Personnalise_2->JetonActif = false;


$M6_IMG_Logo_Personnalise_2->lierVM('PAGE_whatapp','IMG_Logo_Personnalisé_2','M6_IMG_Logo_Personnalise_2');
$M5_IMG_Logo->Valeur = '../ext/logo.jpg';
$M5_IMG_Logo->JetonActif = false;


$M5_IMG_Logo->lierVM('PAGE_whatapp','IMG_Logo','M5_IMG_Logo');


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
function& PAGE_whatapp28_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_whatapp','PAGE_whatapp');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page
function& PAGE_whatapp151_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_whatapp','PAGE_whatapp');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& PAGE_whatapp151()
{
	ExecuteAncetre('PAGE_whatapp151_0');
	$WB_NIVEAU_PILE=empileVM('PAGE_whatapp','PAGE_whatapp');
	
	
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_WHATAPP','PAGE_whatapp');

// Code de déclaration des globales de page
function& PAGE_whatapp0_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_whatapp','PAGE_whatapp');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_whatapp
	PAGE_whatapp0_0();
function& PAGE_whatapp0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_whatapp','PAGE_whatapp');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_whatapp
	PAGE_whatapp0();



// Code d'initialisation de page
	PAGE_whatapp28_0();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_WHATAPP','PAGE_whatapp');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_WHATAPP)){
$_BTNACTION = TrouveBouton( $PAGE_WHATAPP );

}
if ( !bRenvoitCodeHTML($PAGE_WHATAPP,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_whatapp 17/05/2023 03:01 WEBDEV 24 24.0.206.1 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal; color:#1b9174;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}*::-moz-selection{color:#283640;background-color:#D1DCE3;}::selection{color:#283640;background-color:#D1DCE3;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001d59b7de3">
<link rel="stylesheet" type="text/css" href="res/static.css?100027ffa6337">
<link rel="stylesheet" type="text/css" href="Spatiumn230SpatiumnBlueGreeniumn.css?100006a654128">
<link rel="stylesheet" type="text/css" href="MUCP_VTCCI230SpatiumnBlueGreeniumn.css?10000b78ad86f">
<link rel="stylesheet" type="text/css" href="palette-BlueGreeniumn.css?100008c22b6e0">
<link rel="stylesheet" type="text/css" href="PAGE_whatapp_style.css?10000df1efa46">
<style type="text/css">
body{line-height:normal;width:100%;margin:0 auto;width:100%;height:1402px;position:relative; color:#283640;} body{}html,body {background-color:#f0f0f0;position:relative;}#page{position:relative; background-color:#ffffff;min-height:1402px;height:auto !important; height:1402px; min-width:980px;width:auto !important;width:980px;}.l-7{background-color:#FFC040;}#A2,#tzA2{font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:18pt;color:#FF0000;}#A3{font-family:'Open Sans', Helvetica, Arial, sans-serif;background-color:#00FF00;}#M2,#tzM2{font-family:'Open Sans', Helvetica, Arial, sans-serif;background-color:#FFFFFF;}.dzM6{width:207px;height:57px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.dzM5{width:853px;height:241px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_WHATAPP',15,'_COM')(event); " onunload="clWDUtil.pfGetTraitement('PAGE_WHATAPP',16,'_COM')(event); "><form name="PAGE_WHATAPP" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_WHATAPP',18,void 0)(event); " method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_WHATAPP->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:980px"><tr style="height:100%"><td><table style="width:980px;height:1402px"><tr style="height:1402px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  id="page" class="clearfix pos1"><table style="width:100.00%;height:1402px"><tr style="height:1119px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  class="pos2"><div  class="pos3"><table id="M3">
<tr><td style=" height:1119px; width:980px;"><div  class="pos4"><div  class="pos5"><div  class="pos6"><div class="lh0 dzSpan dzM6" id="dzM6" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo%20%28Personnalis%C3%A9%29%20%282%29.jpg" alt="" id="M6" class="Image padding" style=" width:207px; height:57px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div><div  class="pos7"><table style=" background-color:#ffc040;" id="M1">
<tr><td style=" height:317px; width:980px; background-color:#ffc040;"><div  class="pos8"><div  class="lh0 pos9"><table style=" width:678px;"><tr><td id="M2" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 2.3125rem;"><strong style="color: rgb(0, 255, 0);">MUTUELLE DE CONDUCTEUR PROFESSIONNEL DE VTC</strong></p></td></tr></table></div></div></td></tr></table></div><div  class="pos10"><div  class="lh0 pos11"><table style=" width:407px;"><tr><td id="A1" class="TXT-Normal padding webdevclass-riche"><p class="" style="font-size: 1.5rem;"><span style="color: rgb(0, 255, 0);">Félicitation vous aves bien été inscrit&nbsp;</span></p></td></tr></table></div></div><div  class="pos12"><div  class="lh0 pos13"><table style=" width:534px;"><tr><td id="A4" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 1.1875rem;">Si vous n'êstes pas encore sur le groupe whatsApp,</p></td></tr></table></div></div><div  class="pos14"><div  class="pos15"><table style=" width:747px;height:32px;"><tr><td id="tzA2" class="LIEN-Gauche-Non-Souligne"><a href="https://chat.whatsapp.com/F5wgJtd64js9o9ys8Zf0te" target="_self" id="A2" class="LIEN-Gauche-Non-Souligne wblienHorsZTR padding">Veuillez cliquez sur ce lien pour&nbsp;&#32;rejoindre le groupe WhatsApp</a></td></tr></table></div></div><div  class="pos16"><div  class="pos17"><a href="https://chat.whatsapp.com/F5wgJtd64js9o9ys8Zf0te" id="A3" class="BTN-Defaut wblien padding webdevclass-riche" style="_height:60px;text-decoration:none;width:auto;min-width:252px;width:252px\9;height:auto;min-height:60px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;"><span class="wbBtnSpan" id="z_A3_IMG" style="display:table;_display:block;width:100%;width:252px;height:60px;overflow:hidden;cursor:pointer;"><span class="btnvalignmiddle" style="line-height:16px;"><span class="" style="font-size: 1.6875rem;">Lien WhatsApp</span></span></span></a></div></div></div></td></tr></table></div></div></div></td></tr><tr style="height:283px"><td class="ancragecenter" style="width:100.00%"><table style="margin:0 auto;;width:980px;height:283px"><tr style="height:283px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><table style=" background-color:#2c3c46;" id="M4">
<tr><td style=" height:283px; width:980px;"><div  class="pos18"><div  class="pos19"><div class="lh0 dzSpan dzM5" id="dzM5" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo.jpg" alt="" id="M5" class="Image padding" style=" width:853px; height:241px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div></td></tr></table></div></td></tr></table></td></tr></table></div></div></td></tr></table></td></tr></table>
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
var _PAGE_=document["PAGE_WHATAPP"];
<!--
var _COL={9:"#ffc3b9",66:"#ca232a"};
clWDUtil.DeclareTraitementEx("PAGE_WHATAPP",true,[18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_WHATAPP",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript" src="res/jquery-3.js?20000cd554760"></script><script type="text/javascript" src="res/jquery-ui.js?2000680761b69"></script><script type="text/javascript" src="res/jquery-effet.js?200044659718a"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200058ec00af2"></script><style type="text/css">.wbTooltip{font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:9pt;color:#FFFFFF;text-align:left;vertical-align:middle;background-color:#1B9174;border-radius:2px;padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ 	items: "[title]", position : {my: 'left top+20',collision: 'flip'},	track : true, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_12=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_12); ?>