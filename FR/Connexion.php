<?php
//#24.0.156.0 MUCP_VTCCI
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='MUCP_VTCCI	PAGE_CONNEXION	20230517030129';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD24.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CSaisie');
IHM_Include('CBouton');
IHM_Include('CImage');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('WL/HF/HF.php');
WB_Include('HF.php');
WB_Include('WL/STD/Std.php');
WB_Include('WL/PAGE/Page.php');
// Equivalent de [%URL()%]
$gszURL='Connexion.php';
$j=1;$i=1;
session_start();
// protection contre register_globals = on
unset($PAGE_CONNEXION);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(1,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_WHATAPP']=array(5=>array('NOM'=>'whatapp','URL'=>'./'));
$gtabCheminPage['PAGE_UTILISATEURS']=array(5=>array('NOM'=>'Utilisateurs','URL'=>'./'));
$gszCheminPageInverse='./';
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
RechargementPageSiBesoin('PAGE_CONNEXION');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_CONNEXION']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_CONNEXION= $gTabVarSession['PAGE_CONNEXION'];
	$PAGE_CONNEXION->WB_RestaureContexte();
$MaPage = &$PAGE_CONNEXION;
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_CONNEXION)) {
$PAGE_CONNEXION= new CPage(false);
$PAGE_CONNEXION->Nom = 'PAGE_Connexion';
$PAGE_CONNEXION->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_CONNEXION->Alias = 'PAGE_CONNEXION';
$PAGE_CONNEXION->m_sNomPHP = 'PAGE_CONNEXION';
$PAGE_CONNEXION->Libelle = 'Connexion';
$PAGE_CONNEXION->bUTF8 = true;
$PAGE_CONNEXION->bHTML5 = true;
$PAGE_CONNEXION->bAvecContexte = true;
$PAGE_CONNEXION->sFichierPalette = '.\\res\\BlueGreeniumn.wpc';
$PAGE_CONNEXION->Plan = 1;
$PAGE_CONNEXION->ImageFond = '';
$MaPage = &$PAGE_CONNEXION;
$A2_SAI_Email=&CreerChamp('CSaisie');$PAGE_CONNEXION->WB_AjouteChamp('SAI_Email','A2',$A2_SAI_Email,'A2_SAI_Email');
$A2_SAI_Email->SetATTMISEABLANC(true);
$A2_SAI_Email->SetChampFormate(false);
$A2_SAI_Email->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A2_SAI_Email->m_eBarreOutilsMode = 0;
$A2_SAI_Email->m_bLibelleRiche=true;

$A3_SAI_Mot_de_passe=&CreerChamp('CSaisie');$PAGE_CONNEXION->WB_AjouteChamp('SAI_Mot_de_passe','A3',$A3_SAI_Mot_de_passe,'A3_SAI_Mot_de_passe');
$A3_SAI_Mot_de_passe->SetATTMISEABLANC(true);
$A3_SAI_Mot_de_passe->SetChampFormate(false);
$A3_SAI_Mot_de_passe->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A3_SAI_Mot_de_passe->m_eBarreOutilsMode = 0;
$A3_SAI_Mot_de_passe->m_bLibelleRiche=true;

$A4_BTN_CONNEXION=&CreerChamp('CBouton');$PAGE_CONNEXION->WB_AjouteChamp('BTN_CONNEXION','A4',$A4_BTN_CONNEXION,'A4_BTN_CONNEXION');
$A4_BTN_CONNEXION->m_bLibelleRiche=true;

$M6_IMG_Logo_Personnalise_2=&CreerChamp('CImage',207,57,15790320);$PAGE_CONNEXION->WB_AjouteChamp('IMG_Logo_Personnalisé_2','M6',$M6_IMG_Logo_Personnalise_2,'M6_IMG_Logo_Personnalise_2');
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

$M5_IMG_Logo=&CreerChamp('CImage',853,241,15790320);$PAGE_CONNEXION->WB_AjouteChamp('IMG_Logo','M5',$M5_IMG_Logo,'M5_IMG_Logo');
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
$A2_SAI_Email->Couleur = 0x403628;
$A2_SAI_Email->CouleurInitiale = 0x403628;
$A2_SAI_Email->CouleurFond = 0xFFFFFF;
$A2_SAI_Email->CouleurFondInitiale = 0xFFFFFF;
$A2_SAI_Email->Valeur = '';
$A2_SAI_Email->Libelle = function_exists("construireTexteRiche_A2_SAI_Email") ? null : 'Email';
$A2_SAI_Email->Masque = '0';
$A2_SAI_Email->m_nHauteur = 23;
$A2_SAI_Email->m_nLargeur = 351;
$A2_SAI_Email->m_nOpacite = 100;
$A2_SAI_Email->m_nCadrageHorizontal = -1;
$A2_SAI_Email->m_nCadrageVertical = 1;
$A2_SAI_Email->m_Police->m_bGras = false;
$A2_SAI_Email->m_Police->m_bItalique = false;
$A2_SAI_Email->m_Police->m_bSouligne = false;
$A2_SAI_Email->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A2_SAI_Email->m_Police->m_nTaille = '9';
$A2_SAI_Email->m_nX = 361;
$A2_SAI_Email->m_nY = 545;
$A2_SAI_Email->m_clCouleurJauge = 0x000000;
$A2_SAI_Email->BoutonCalendrier = 0;
$A2_SAI_Email->EtatInitial = 0;
$A2_SAI_Email->VisibleInitial = 1;
$A2_SAI_Email->YInitial = 0;
$A2_SAI_Email->NombreColonne = 0;
$A2_SAI_Email->BulleTitre = '';
$A2_SAI_Email->JetonActif = false;
$A2_SAI_Email->JetonListeSeparateur = '';
$A2_SAI_Email->JetonAutoriseDoublon = false;
$A2_SAI_Email->JetonSupprimable = true;


$A2_SAI_Email->lierVM('PAGE_Connexion','SAI_Email','A2_SAI_Email');
$A3_SAI_Mot_de_passe->Couleur = 0x403628;
$A3_SAI_Mot_de_passe->CouleurInitiale = 0x403628;
$A3_SAI_Mot_de_passe->CouleurFond = 0xFFFFFF;
$A3_SAI_Mot_de_passe->CouleurFondInitiale = 0xFFFFFF;
$A3_SAI_Mot_de_passe->Valeur = '';
$A3_SAI_Mot_de_passe->Libelle = function_exists("construireTexteRiche_A3_SAI_Mot_de_passe") ? null : 'Mot de passe';
$A3_SAI_Mot_de_passe->Masque = '0';
$A3_SAI_Mot_de_passe->m_nHauteur = 23;
$A3_SAI_Mot_de_passe->m_nLargeur = 351;
$A3_SAI_Mot_de_passe->m_nOpacite = 100;
$A3_SAI_Mot_de_passe->m_nCadrageHorizontal = -1;
$A3_SAI_Mot_de_passe->m_nCadrageVertical = 1;
$A3_SAI_Mot_de_passe->m_Police->m_bGras = false;
$A3_SAI_Mot_de_passe->m_Police->m_bItalique = false;
$A3_SAI_Mot_de_passe->m_Police->m_bSouligne = false;
$A3_SAI_Mot_de_passe->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A3_SAI_Mot_de_passe->m_Police->m_nTaille = '9';
$A3_SAI_Mot_de_passe->m_nX = 361;
$A3_SAI_Mot_de_passe->m_nY = 594;
$A3_SAI_Mot_de_passe->m_clCouleurJauge = 0x000000;
$A3_SAI_Mot_de_passe->BoutonCalendrier = 0;
$A3_SAI_Mot_de_passe->EtatInitial = 0;
$A3_SAI_Mot_de_passe->VisibleInitial = 1;
$A3_SAI_Mot_de_passe->YInitial = 0;
$A3_SAI_Mot_de_passe->NombreColonne = 0;
$A3_SAI_Mot_de_passe->BulleTitre = '';
$A3_SAI_Mot_de_passe->JetonActif = false;
$A3_SAI_Mot_de_passe->JetonListeSeparateur = '';
$A3_SAI_Mot_de_passe->JetonAutoriseDoublon = false;
$A3_SAI_Mot_de_passe->JetonSupprimable = true;


$A3_SAI_Mot_de_passe->lierVM('PAGE_Connexion','SAI_Mot_de_passe','A3_SAI_Mot_de_passe');
$A4_BTN_CONNEXION->Libelle = function_exists("construireTexteRiche_A4_BTN_CONNEXION") ? null : 'CONNEXION';
$A4_BTN_CONNEXION->JetonActif = false;


$A4_BTN_CONNEXION->lierVM('PAGE_Connexion','BTN_CONNEXION','A4_BTN_CONNEXION');
$M6_IMG_Logo_Personnalise_2->Valeur = '../ext/logo (Personnalisé) (2).jpg';
$M6_IMG_Logo_Personnalise_2->JetonActif = false;


$M6_IMG_Logo_Personnalise_2->lierVM('PAGE_Connexion','IMG_Logo_Personnalisé_2','M6_IMG_Logo_Personnalise_2');
$M5_IMG_Logo->Valeur = '../ext/logo.jpg';
$M5_IMG_Logo->JetonActif = false;


$M5_IMG_Logo->lierVM('PAGE_Connexion','IMG_Logo','M5_IMG_Logo');


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
function& PAGE_Connexion28_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Connexion','PAGE_Connexion');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page
function& PAGE_Connexion151_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Connexion','PAGE_Connexion');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& PAGE_Connexion151()
{
	ExecuteAncetre('PAGE_Connexion151_0');
	$WB_NIVEAU_PILE=empileVM('PAGE_Connexion','PAGE_Connexion');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_CONNEXION (serveur) :: (PCode de Clic sur %1!s!)
function& A4_BTN_CONNEXION16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Connexion','A4_BTN_CONNEXION');
	global $A2_SAI_Email;
	global $A3_SAI_Mot_de_passe;
	
	
	HLitRecherchePremier(getRef('Utilisateurs'),Rubrique('Utilisateurs','email'),VersPrimitif($A2_SAI_Email),getRef(524288));
	if (VersBooleen(HTrouve(getRef('Utilisateurs'))))
	{
		CreerType($sPasse,'sPasse',TYPEWL_CHAINE,'');
		if (VersBooleen(Operateur(24866,Rubrique('Utilisateurs','mdp'),$A3_SAI_Mot_de_passe)))
		{
			CookieEcrit(getRef('CookieConnexion'),VersPrimitif(Rubrique('Utilisateurs','IDUtilisateurs')),getRef(1));
			Operateur(95,GetGlobal('_gnid'),Rubrique('Utilisateurs','IDUtilisateurs'));
			PageAffiche(VersPrimitif('PAGE_inscrption_membres'));
		}
		else 
		{
			Info(getRef('Mot de passe incorrecte'));
			return _return ($_PHP_VAR_RETURN_);
		}
	}
	else 
	{
		Info(getRef('Utilisateur inexistant.Veuillez contacter l\'administrateur pour avoir un droit d\'accès. Sinon réessayez !'));
		return _return ($_PHP_VAR_RETURN_);
	}
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_CONNEXION','PAGE_Connexion');

// Code de déclaration des globales de page
function& PAGE_Connexion0_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Connexion','PAGE_Connexion');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_Connexion
	PAGE_Connexion0_0();
function& PAGE_Connexion0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Connexion','PAGE_Connexion');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_Connexion
	PAGE_Connexion0();



// Code d'initialisation de page
	PAGE_Connexion28_0();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_CONNEXION','PAGE_Connexion');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_CONNEXION)){
$_BTNACTION = TrouveBouton( $PAGE_CONNEXION );
if ($_BTNACTION=='A4') { 
//-------------------------------------------------------------------
//  PCodes de A4_BTN_CONNEXION
//-------------------------------------------------------------------
	A4_BTN_CONNEXION16();

}

}
if ( !bRenvoitCodeHTML($PAGE_CONNEXION,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_Connexion 17/05/2023 03:01 WEBDEV 24 24.0.206.1 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal; color:#1b9174;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}*::-moz-selection{color:#283640;background-color:#D1DCE3;}::selection{color:#283640;background-color:#D1DCE3;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001d59b7de3">
<link rel="stylesheet" type="text/css" href="res/static.css?100027ffa6337">
<link rel="stylesheet" type="text/css" href="Spatiumn230SpatiumnBlueGreeniumn.css?100006a654128">
<link rel="stylesheet" type="text/css" href="MUCP_VTCCI230SpatiumnBlueGreeniumn.css?10000b78ad86f">
<link rel="stylesheet" type="text/css" href="palette-BlueGreeniumn.css?100008c22b6e0">
<link rel="stylesheet" type="text/css" href="PAGE_Connexion_style.css?10000809fc3e5">
<style type="text/css">
body{line-height:normal;width:100%;margin:0 auto;width:100%;height:1402px;position:relative; color:#283640;} body{}html,body {background-color:#f0f0f0;position:relative;}#page{position:relative; background-color:#ffffff;min-height:1402px;height:auto !important; height:1402px; min-width:980px;width:auto !important;width:980px;}.l-6{background-color:#FFC040;}#M2,#tzM2{font-family:'Open Sans', Helvetica, Arial, sans-serif;background-color:#FFFFFF;}.dzM6{width:207px;height:57px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.dzM5{width:853px;height:241px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_CONNEXION',15,'_COM')(event); " onunload="clWDUtil.pfGetTraitement('PAGE_CONNEXION',16,'_COM')(event); "><form name="PAGE_CONNEXION" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_CONNEXION',18,void 0)(event); " method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_CONNEXION->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value="A4"><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:980px"><tr style="height:100%"><td><table style="width:980px;height:1402px"><tr style="height:1402px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  id="page" class="clearfix pos1"><table style="width:100.00%;height:1402px"><tr style="height:1119px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  class="pos2"><div  class="pos3"><table id="M3">
<tr><td style=" height:1119px; width:980px;"><div  class="pos4"><div  class="pos5"><div  class="pos6"><div class="lh0 dzSpan dzM6" id="dzM6" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo%20%28Personnalis%C3%A9%29%20%282%29.jpg" alt="" id="M6" class="Image padding" style=" width:207px; height:57px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div><div  class="pos7"><table style=" background-color:#ffc040;" id="M1">
<tr><td style=" height:317px; width:980px; background-color:#ffc040;"><div  class="pos8"><div  class="lh0 pos9"><table style=" width:678px;"><tr><td id="M2" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 2.3125rem;"><strong style="color: rgb(0, 255, 0);">MUTUELLE DE CONDUCTEUR PROFESSIONNEL DE VTC</strong></p></td></tr></table></div></div></td></tr></table></div><div  class="pos10"><div  class="lh0 pos11"><table style=" width:191px;"><tr><td id="A1" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 1.6875rem;">CONNEXION</p></td></tr></table></div></div><div  class="pos12"><div  class="pos13"><TABLE style=" width:351px;border-collapse:separate;">
<TR><TD style=" width:351px;"><table id="czA2">
<tr><td style=" height:23px; width:351px;"><ul style=" width:351px;" class="wbLibChamp wbLibChampA2">
<li style=" height:23px;"><table style=" width:351px;height:23px;"><tr><td id="lzA2" class="Normal padding webdevclass-riche"><?php echo $A2_SAI_Email->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:251px;border-spacing:0;height:23px;border-collapse:separate;border:0;outline:none;" id="bzA2"><tr><td style="border:none;" id="tzA2" class="valignmiddle"><INPUT TYPE="text" SIZE="25" NAME="A2" VALUE="<?php echo $A2_SAI_Email->GetValeurHTML(); ?>" id="A2" class="SAI A2 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos14"><div  class="pos15"><TABLE style=" width:351px;border-collapse:separate;">
<TR><TD style=" width:351px;"><table id="czA3">
<tr><td style=" height:23px; width:351px;"><ul style=" width:351px;" class="wbLibChamp wbLibChampA3">
<li style=" height:23px;"><table style=" width:351px;height:23px;"><tr><td id="lzA3" class="Normal padding webdevclass-riche"><?php echo $A3_SAI_Mot_de_passe->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:251px;border-spacing:0;height:23px;border-collapse:separate;border:0;outline:none;" id="bzA3"><tr><td style="border:none;" id="tzA3" class="valignmiddle"><INPUT TYPE="text" SIZE="25" NAME="A3" VALUE="<?php echo $A3_SAI_Mot_de_passe->GetValeurHTML(); ?>" id="A3" class="SAI A3 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos16"><div  class="pos17"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_CONNEXION',18,void 0)()){_JSL(_PAGE_,'A4','_self','','');} " id="A4" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:68px;width:auto;min-width:351px;width:351px\9;height:auto;min-height:68px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;">CONNEXION</button></div></div></div></td></tr></table></div></div></div></td></tr><tr style="height:283px"><td class="ancragecenter" style="width:100.00%"><table style="margin:0 auto;;width:980px;height:283px"><tr style="height:283px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><table style=" background-color:#2c3c46;" id="M4">
<tr><td style=" height:283px; width:980px;"><div  class="pos18"><div  class="pos19"><div class="lh0 dzSpan dzM5" id="dzM5" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo.jpg" alt="" id="M5" class="Image padding" style=" width:853px; height:241px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div></td></tr></table></div></td></tr></table></td></tr></table></div></div></td></tr></table></td></tr></table><?php function construireTexteRiche_A3_SAI_Mot_de_passe(){ global $A3_SAI_Mot_de_passe,$A3_SAI_Mot_de_passe;$s="Mot de passe";return $s;}function construireTexteRiche_A2_SAI_Email(){ global $A2_SAI_Email,$A2_SAI_Email;$s="Email";return $s;} ?>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?3fffe8f3e2d2f"></script>
<script type="text/javascript" src="./res/WDUtil.js?3ffff9b98d7a2"></script>
<script type="text/javascript" src="./res/StdAction.js?30000c29f1e24"></script>
<script type="text/javascript" src="./res/WD.js?30028d23c8a89"></script>
<script type="text/javascript">
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/MUCP_VTCCI_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PAGE_=document["PAGE_CONNEXION"];
<!--
var _COL={9:"#ffc3b9",66:"#ca232a"};
clWDUtil.DeclareTraitementEx("PAGE_CONNEXION",true,[18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_CONNEXION",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript">function chfocus(){window.focus();if(_PAGE_["A2"]!=null)try{_PAGE_["A2"].focus();}catch(e){}}</script>
<script type="text/javascript" src="res/jquery-3.js?20000cd554760"></script><script type="text/javascript" src="res/jquery-ui.js?2000680761b69"></script><script type="text/javascript" src="res/jquery-effet.js?200044659718a"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200058ec00af2"></script><style type="text/css">.wbTooltip{font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:9pt;color:#FFFFFF;text-align:left;vertical-align:middle;background-color:#1B9174;border-radius:2px;padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ 	items: "[title]", position : {my: 'left top+20',collision: 'flip'},	track : true, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_11=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_11); ?>