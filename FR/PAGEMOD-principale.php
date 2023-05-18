<?php
//#24.0.156.0 MUCP_VTCCI
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='MUCP_VTCCI	PAGEMOD_PRINCIPALE	20230516043102';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD24.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CImage');

WB_Include('HF.php');

Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
// Equivalent de [%URL()%]
$gszURL='PAGEMOD-principale.php';
$j=1;$i=1;
session_start();
// protection contre register_globals = on
unset($PAGEMOD_PRINCIPALE);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(1,false);
ChangeNation(1,1);
$gtabCheminPage = array();
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
RechargementPageSiBesoin('PAGEMOD_PRINCIPALE');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGEMOD_PRINCIPALE']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGEMOD_PRINCIPALE= $gTabVarSession['PAGEMOD_PRINCIPALE'];
	$PAGEMOD_PRINCIPALE->WB_RestaureContexte();
$MaPage = &$PAGEMOD_PRINCIPALE;
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGEMOD_PRINCIPALE)) {
$PAGEMOD_PRINCIPALE= new CPage(false);
$PAGEMOD_PRINCIPALE->Nom = 'PAGEMOD_principale';
$PAGEMOD_PRINCIPALE->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGEMOD_PRINCIPALE->Alias = 'PAGEMOD_PRINCIPALE';
$PAGEMOD_PRINCIPALE->m_sNomPHP = 'PAGEMOD_PRINCIPALE';
$PAGEMOD_PRINCIPALE->Libelle = '';
$PAGEMOD_PRINCIPALE->bUTF8 = true;
$PAGEMOD_PRINCIPALE->bHTML5 = true;
$PAGEMOD_PRINCIPALE->bAvecContexte = true;
$PAGEMOD_PRINCIPALE->sFichierPalette = '.\\res\\BlueGreeniumn.wpc';
$PAGEMOD_PRINCIPALE->Plan = 1;
$PAGEMOD_PRINCIPALE->ImageFond = '';
$MaPage = &$PAGEMOD_PRINCIPALE;
$M6_IMG_Logo_Personnalise_2=&CreerChamp('CImage',207,57,15790320);$PAGEMOD_PRINCIPALE->WB_AjouteChamp('IMG_Logo_Personnalisé_2','M6',$M6_IMG_Logo_Personnalise_2,'M6_IMG_Logo_Personnalise_2');
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

$M5_IMG_Logo=&CreerChamp('CImage',853,241,15790320);$PAGEMOD_PRINCIPALE->WB_AjouteChamp('IMG_Logo','M5',$M5_IMG_Logo,'M5_IMG_Logo');
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
$M6_IMG_Logo_Personnalise_2->Valeur = '../ext/logo (Personnalisé) (2).jpg';
$M6_IMG_Logo_Personnalise_2->JetonActif = false;


$M6_IMG_Logo_Personnalise_2->lierVM('PAGEMOD_principale','IMG_Logo_Personnalisé_2','M6_IMG_Logo_Personnalise_2');
$M5_IMG_Logo->Valeur = '../ext/logo.jpg';
$M5_IMG_Logo->JetonActif = false;


$M5_IMG_Logo->lierVM('PAGEMOD_principale','IMG_Logo','M5_IMG_Logo');


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
function& PAGEMOD_principale28()
{
	$WB_NIVEAU_PILE=empileVM('PAGEMOD_principale','PAGEMOD_principale');
	
	
	if (VersBooleen(Operateur(24866,Rubrique('Utilisateurs','admin'),getRef(false))))
	{
		// 
		{
			Erreur('ErreurCodeCompileAvecErreur','Initialisation de PAGEMOD_principale (serveur)',"L\'élément \'TABLE_Membres\' est inconnu ou inaccessible.");
		}
	}
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGEMOD_PRINCIPALE','PAGEMOD_principale');

// Code de déclaration des globales de page



// Code d'initialisation de page
	PAGEMOD_principale28();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGEMOD_PRINCIPALE','PAGEMOD_principale');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGEMOD_PRINCIPALE)){
$_BTNACTION = TrouveBouton( $PAGEMOD_PRINCIPALE );

}
if ( !bRenvoitCodeHTML($PAGEMOD_PRINCIPALE,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGEMOD_principale 16/05/2023 04:31 WEBDEV 24 24.0.206.1 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal; color:#1b9174;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}*::-moz-selection{color:#283640;background-color:#D1DCE3;}::selection{color:#283640;background-color:#D1DCE3;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001d59b7de3">
<link rel="stylesheet" type="text/css" href="res/static.css?100027ffa6337">
<link rel="stylesheet" type="text/css" href="Spatiumn230SpatiumnBlueGreeniumn.css?100002fc63caf">
<link rel="stylesheet" type="text/css" href="MUCP_VTCCI230SpatiumnBlueGreeniumn.css?1000092fa8d52">
<link rel="stylesheet" type="text/css" href="palette-BlueGreeniumn.css?100005c15a51b">
<link rel="stylesheet" type="text/css" href="PAGEMOD_principale_style.css?100008858219f">
<style type="text/css">
body{line-height:normal;width:100%;margin:0 auto;width:100%;height:1402px;position:relative; color:#283640;} body{}html,body {background-color:#f0f0f0;position:relative;}#page{position:relative; background-color:#ffffff;min-height:1402px;height:auto !important; height:1402px; min-width:980px;width:auto !important;width:980px;}.l-2{background-color:#FFC040;}#M2,#tzM2{font-family:'Open Sans', Helvetica, Arial, sans-serif;background-color:#FFFFFF;}.dzM6{width:207px;height:57px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.dzM5{width:853px;height:241px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGEMOD_PRINCIPALE',15,'_COM')(event); "><form name="PAGEMOD_PRINCIPALE" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGEMOD_PRINCIPALE',18,void 0)(event); " method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGEMOD_PRINCIPALE->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:980px"><tr style="height:100%"><td><table style="width:980px;height:1402px"><tr style="height:1402px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  id="page" class="clearfix pos1"><table style="width:100.00%;height:1402px"><tr style="height:1119px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  class="pos2"><div  class="pos3"><table id="M3">
<tr><td style=" height:1119px; width:980px;"><div  class="pos4"><div  class="pos5"><div  class="pos6"><div class="lh0 dzSpan dzM6" id="dzM6" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo%20%28Personnalis%C3%A9%29%20%282%29.jpg" alt="" id="M6" class="Image padding" style=" width:207px; height:57px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div><div  class="pos7"><table style=" background-color:#ffc040;" id="M1">
<tr><td style=" height:317px; width:980px; background-color:#ffc040;"><div  class="pos8"><div  class="lh0 pos9"><table style=" width:678px;"><tr><td id="M2" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 2.3125rem;"><strong style="color: rgb(0, 255, 0);">MUTUELLE DE CONDUCTEUR PROFESSIONNEL DE VTC</strong></p></td></tr></table></div></div></td></tr></table></div></div></td></tr></table></div></div></div></td></tr><tr style="height:283px"><td class="ancragecenter" style="width:100.00%"><table style="margin:0 auto;;width:980px;height:283px"><tr style="height:283px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><table style=" background-color:#2c3c46;" id="M4">
<tr><td style=" height:283px; width:980px;"><div  class="pos10"><div  class="pos11"><div class="lh0 dzSpan dzM5" id="dzM5" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo.jpg" alt="" id="M5" class="Image padding" style=" width:853px; height:241px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div></td></tr></table></div></td></tr></table></td></tr></table></div></div></td></tr></table></td></tr></table>
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
var _PAGE_=document["PAGEMOD_PRINCIPALE"];
<!--
var _COL={9:"#ffc3b9",66:"#ca232a"};
clWDUtil.DeclareTraitementEx("PAGEMOD_PRINCIPALE",true,[18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGEMOD_PRINCIPALE",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript" src="res/jquery-3.js?20000cd554760"></script><script type="text/javascript" src="res/jquery-ui.js?2000680761b69"></script><script type="text/javascript" src="res/jquery-effet.js?200044659718a"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200058ec00af2"></script><style type="text/css">.wbTooltip{font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:9pt;color:#FFFFFF;text-align:left;vertical-align:middle;background-color:#1B9174;border-radius:2px;padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ 	items: "[title]", position : {my: 'left top+20',collision: 'flip'},	track : true, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_105=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_105); ?>