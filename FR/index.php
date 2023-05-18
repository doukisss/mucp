<?php
//#24.0.156.0 MUCP_VTCCI
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='MUCP_VTCCI	PAGE_INSCRPTION_MEMBRES	20230517031807';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD24.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CSaisie');
IHM_Include('CSaisieNumerique');
IHM_Include('CBouton');
IHM_Include('CTableAjax');
IHM_Include('CImage');

WB_Include('HF.php');

Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('WL/PAGE/Page.php');
WB_Include('WL/HF/HF.php');
WB_Include('IHM/Champ/Liste/Table/Table.php');
WB_Include('Engine.php');
// Equivalent de [%URL()%]
$gszURL='index.php';
$j=1;$i=1;
session_start();
// protection contre register_globals = on
unset($PAGE_INSCRPTION_MEMBRES);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(1,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_WHATAPP']=array(5=>array('NOM'=>'whatapp','URL'=>'./'));
$gtabCheminPage['PAGE_UTILISATEURS']=array(5=>array('NOM'=>'Utilisateurs','URL'=>'./'));
$gtabCheminPage['PAGE_CONNEXION']=array(5=>array('NOM'=>'Connexion','URL'=>'./'));
$gszCheminPageInverse='./';
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
RechargementPageSiBesoin('PAGE_INSCRPTION_MEMBRES');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_INSCRPTION_MEMBRES']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_INSCRPTION_MEMBRES= $gTabVarSession['PAGE_INSCRPTION_MEMBRES'];
	$PAGE_INSCRPTION_MEMBRES->WB_RestaureContexte();
$MaPage = &$PAGE_INSCRPTION_MEMBRES;
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_INSCRPTION_MEMBRES)) {
$PAGE_INSCRPTION_MEMBRES= new CPage(true);
$PAGE_INSCRPTION_MEMBRES->Nom = 'PAGE_inscrption_membres';
$PAGE_INSCRPTION_MEMBRES->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_INSCRPTION_MEMBRES->Alias = 'PAGE_INSCRPTION_MEMBRES';
$PAGE_INSCRPTION_MEMBRES->m_sNomPHP = 'PAGE_INSCRPTION_MEMBRES';
$PAGE_INSCRPTION_MEMBRES->Libelle = 'inscrption_membres';
$PAGE_INSCRPTION_MEMBRES->bUTF8 = true;
$PAGE_INSCRPTION_MEMBRES->bHTML5 = true;
$PAGE_INSCRPTION_MEMBRES->bAvecContexte = true;
$PAGE_INSCRPTION_MEMBRES->sFichierPalette = '.\\res\\BlueGreeniumn.wpc';
$PAGE_INSCRPTION_MEMBRES->Plan = 1;
$PAGE_INSCRPTION_MEMBRES->ImageFond = '';
$MaPage = &$PAGE_INSCRPTION_MEMBRES;
$A2_SAI_Nom=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Nom','A2',$A2_SAI_Nom,'A2_SAI_Nom');
$A2_SAI_Nom->SetATTMISEABLANC(true);
$A2_SAI_Nom->SetChampFormate(false);
$A2_SAI_Nom->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A2_SAI_Nom->m_eBarreOutilsMode = 0;
$A2_SAI_Nom->m_bLibelleRiche=true;

$A3_SAI_Prenom=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Prenom','A3',$A3_SAI_Prenom,'A3_SAI_Prenom');
$A3_SAI_Prenom->SetATTMISEABLANC(true);
$A3_SAI_Prenom->SetChampFormate(false);
$A3_SAI_Prenom->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A3_SAI_Prenom->m_eBarreOutilsMode = 0;
$A3_SAI_Prenom->m_bLibelleRiche=true;

$A4_SAI_Contact_mobile=&CreerChamp('CSaisieNumerique');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Contact_mobile','A4',$A4_SAI_Contact_mobile,'A4_SAI_Contact_mobile');
$A4_SAI_Contact_mobile->SetATTMISEABLANC(true);
$A4_SAI_Contact_mobile->SetChampFormate(false);
$A4_SAI_Contact_mobile->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A4_SAI_Contact_mobile->m_eBarreOutilsMode = 0;
$A4_SAI_Contact_mobile->m_bLibelleRiche=true;

$A5_SAI_Contact_domicile=&CreerChamp('CSaisieNumerique');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Contact_domicile','A5',$A5_SAI_Contact_domicile,'A5_SAI_Contact_domicile');
$A5_SAI_Contact_domicile->SetATTMISEABLANC(true);
$A5_SAI_Contact_domicile->SetChampFormate(false);
$A5_SAI_Contact_domicile->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A5_SAI_Contact_domicile->m_eBarreOutilsMode = 0;
$A5_SAI_Contact_domicile->m_bLibelleRiche=true;

$A6_SAI_Proprietaire=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Proprietaire','A6',$A6_SAI_Proprietaire,'A6_SAI_Proprietaire');
$A6_SAI_Proprietaire->SetATTMISEABLANC(true);
$A6_SAI_Proprietaire->SetChampFormate(false);
$A6_SAI_Proprietaire->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A6_SAI_Proprietaire->m_eBarreOutilsMode = 0;
$A6_SAI_Proprietaire->m_bLibelleRiche=true;

$A7_SAI_Titulaire=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Titulaire','A7',$A7_SAI_Titulaire,'A7_SAI_Titulaire');
$A7_SAI_Titulaire->SetATTMISEABLANC(true);
$A7_SAI_Titulaire->SetChampFormate(false);
$A7_SAI_Titulaire->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A7_SAI_Titulaire->m_eBarreOutilsMode = 0;
$A7_SAI_Titulaire->m_bLibelleRiche=true;

$A8_SAI_Second=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Second','A8',$A8_SAI_Second,'A8_SAI_Second');
$A8_SAI_Second->SetATTMISEABLANC(true);
$A8_SAI_Second->SetChampFormate(false);
$A8_SAI_Second->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A8_SAI_Second->m_eBarreOutilsMode = 0;
$A8_SAI_Second->m_bLibelleRiche=true;

$A9_SAI_Sans_vehicule=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Sans_vehicule','A9',$A9_SAI_Sans_vehicule,'A9_SAI_Sans_vehicule');
$A9_SAI_Sans_vehicule->SetATTMISEABLANC(true);
$A9_SAI_Sans_vehicule->SetChampFormate(false);
$A9_SAI_Sans_vehicule->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A9_SAI_Sans_vehicule->m_eBarreOutilsMode = 0;
$A9_SAI_Sans_vehicule->m_bLibelleRiche=true;

$A10_SAI_Yango=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Yango','A10',$A10_SAI_Yango,'A10_SAI_Yango');
$A10_SAI_Yango->SetATTMISEABLANC(true);
$A10_SAI_Yango->SetChampFormate(false);
$A10_SAI_Yango->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A10_SAI_Yango->m_eBarreOutilsMode = 0;
$A10_SAI_Yango->m_bLibelleRiche=true;

$A11_SAI_Heetch=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Heetch','A11',$A11_SAI_Heetch,'A11_SAI_Heetch');
$A11_SAI_Heetch->SetATTMISEABLANC(true);
$A11_SAI_Heetch->SetChampFormate(false);
$A11_SAI_Heetch->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A11_SAI_Heetch->m_eBarreOutilsMode = 0;
$A11_SAI_Heetch->m_bLibelleRiche=true;

$A12_SAI_Uber=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Uber','A12',$A12_SAI_Uber,'A12_SAI_Uber');
$A12_SAI_Uber->SetATTMISEABLANC(true);
$A12_SAI_Uber->SetChampFormate(false);
$A12_SAI_Uber->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A12_SAI_Uber->m_eBarreOutilsMode = 0;
$A12_SAI_Uber->m_bLibelleRiche=true;

$A13_SAI_Photo_du_permis=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Photo_du_permis','A13',$A13_SAI_Photo_du_permis,'A13_SAI_Photo_du_permis');
$A13_SAI_Photo_du_permis->SetATTMISEABLANC(true);
$A13_SAI_Photo_du_permis->SetChampFormate(false);
$A13_SAI_Photo_du_permis->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A13_SAI_Photo_du_permis->m_eBarreOutilsMode = 0;
$A13_SAI_Photo_du_permis->m_bLibelleRiche=true;

$A14_SAI_Piece_identite=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Piece_identite','A14',$A14_SAI_Piece_identite,'A14_SAI_Piece_identite');
$A14_SAI_Piece_identite->SetATTMISEABLANC(true);
$A14_SAI_Piece_identite->SetChampFormate(false);
$A14_SAI_Piece_identite->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A14_SAI_Piece_identite->m_eBarreOutilsMode = 0;
$A14_SAI_Piece_identite->m_bLibelleRiche=true;

$A15_SAI_Photo=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('SAI_Photo','A15',$A15_SAI_Photo,'A15_SAI_Photo');
$A15_SAI_Photo->SetATTMISEABLANC(true);
$A15_SAI_Photo->SetChampFormate(false);
$A15_SAI_Photo->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A15_SAI_Photo->m_eBarreOutilsMode = 0;
$A15_SAI_Photo->m_bLibelleRiche=true;

$A16_BTN_ENVOYER=&CreerChamp('CBouton');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('BTN_ENVOYER','A16',$A16_BTN_ENVOYER,'A16_BTN_ENVOYER');
$A16_BTN_ENVOYER->m_bLibelleRiche=true;

$A17_BTN_MODIFIER=&CreerChamp('CBouton');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('BTN_MODIFIER','A17',$A17_BTN_MODIFIER,'A17_BTN_MODIFIER');
$A17_BTN_MODIFIER->m_bLibelleRiche=true;

$A18_BTN_SUPPRIMER=&CreerChamp('CBouton');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('BTN_SUPPRIMER','A18',$A18_BTN_SUPPRIMER,'A18_BTN_SUPPRIMER');
$A18_BTN_SUPPRIMER->m_bLibelleRiche=true;

$A20_TABLE_Membres=&CreerChamp('CTableAjax');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('TABLE_Membres','A20',$A20_TABLE_Membres,'A20_TABLE_Membres');
$A20_TABLE_Membres->m_bHauteurLigneVariable=true;
$A20_TABLE_Membres->m_nNbColonnesOuAttributs=15;
$A20_TABLE_Membres->Visible=1;
$A20_TABLE_Membres->Etat=0;
$A20_TABLE_Membres->nModeSelection=1;

$A21_COL_IDMembres=&CreerChamp('CSaisieNumerique');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_IDMembres','A21',$A21_COL_IDMembres,'A21_COL_IDMembres');
$A20_TABLE_Membres->AjouteColonne('A21_COL_IDMembres','COL_IDMembres','A21', 5601, 0,'Membres','IDMembres');
$A20_TABLE_Membres->TabColonnes[1]->ChampFormat->Masque='+9 999 999 999 999 999 999';
$A20_TABLE_Membres->TabColonnes[1]->Visible=1;
$A20_TABLE_Membres->TabColonnes[1]->Etat=0;
$A20_TABLE_Membres->TabColonnes[1]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[1]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[1]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[1]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[1]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[1]->m_sBulle='';
$A21_COL_IDMembres->m_eAction=6;
$A21_COL_IDMembres->m_sPageAction='';
$A21_COL_IDMembres->m_bLibelleRiche=true;

$A22_COL_Nom=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Nom','A22',$A22_COL_Nom,'A22_COL_Nom');
$A20_TABLE_Membres->AjouteColonne('A22_COL_Nom','COL_Nom','A22', 5600, 1,'Membres','Nom');
$A20_TABLE_Membres->TabColonnes[2]->Visible=1;
$A20_TABLE_Membres->TabColonnes[2]->Etat=0;
$A20_TABLE_Membres->TabColonnes[2]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[2]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[2]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[2]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[2]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[2]->m_sBulle='';
$A22_COL_Nom->m_eAction=6;
$A22_COL_Nom->m_sPageAction='';
$A22_COL_Nom->m_bLibelleRiche=true;

$A23_COL_Prenom=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Prenom','A23',$A23_COL_Prenom,'A23_COL_Prenom');
$A20_TABLE_Membres->AjouteColonne('A23_COL_Prenom','COL_Prenom','A23', 5600, 2,'Membres','Prenom');
$A20_TABLE_Membres->TabColonnes[3]->Visible=1;
$A20_TABLE_Membres->TabColonnes[3]->Etat=0;
$A20_TABLE_Membres->TabColonnes[3]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[3]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[3]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[3]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[3]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[3]->m_sBulle='';
$A23_COL_Prenom->m_eAction=6;
$A23_COL_Prenom->m_sPageAction='';
$A23_COL_Prenom->m_bLibelleRiche=true;

$A24_COL_Contact_mobile=&CreerChamp('CSaisieNumerique');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Contact_mobile','A24',$A24_COL_Contact_mobile,'A24_COL_Contact_mobile');
$A20_TABLE_Membres->AjouteColonne('A24_COL_Contact_mobile','COL_Contact_mobile','A24', 5601, 3,'Membres','contact_mobile');
$A20_TABLE_Membres->TabColonnes[4]->ChampFormat->Masque='+9 999 999 999';
$A20_TABLE_Membres->TabColonnes[4]->Visible=1;
$A20_TABLE_Membres->TabColonnes[4]->Etat=0;
$A20_TABLE_Membres->TabColonnes[4]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[4]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[4]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[4]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[4]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[4]->m_sBulle='';
$A24_COL_Contact_mobile->m_eAction=6;
$A24_COL_Contact_mobile->m_sPageAction='';
$A24_COL_Contact_mobile->m_bLibelleRiche=true;

$A25_COL_Contact_domicile=&CreerChamp('CSaisieNumerique');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Contact_domicile','A25',$A25_COL_Contact_domicile,'A25_COL_Contact_domicile');
$A20_TABLE_Membres->AjouteColonne('A25_COL_Contact_domicile','COL_Contact_domicile','A25', 5601, 4,'Membres','contact_domicile');
$A20_TABLE_Membres->TabColonnes[5]->ChampFormat->Masque='+9 999 999 999';
$A20_TABLE_Membres->TabColonnes[5]->Visible=1;
$A20_TABLE_Membres->TabColonnes[5]->Etat=0;
$A20_TABLE_Membres->TabColonnes[5]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[5]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[5]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[5]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[5]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[5]->m_sBulle='';
$A25_COL_Contact_domicile->m_eAction=6;
$A25_COL_Contact_domicile->m_sPageAction='';
$A25_COL_Contact_domicile->m_bLibelleRiche=true;

$A26_COL_Proprietaire=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Proprietaire','A26',$A26_COL_Proprietaire,'A26_COL_Proprietaire');
$A20_TABLE_Membres->AjouteColonne('A26_COL_Proprietaire','COL_Proprietaire','A26', 5600, 5,'Membres','Proprietaire');
$A20_TABLE_Membres->TabColonnes[6]->Visible=1;
$A20_TABLE_Membres->TabColonnes[6]->Etat=0;
$A20_TABLE_Membres->TabColonnes[6]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[6]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[6]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[6]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[6]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[6]->m_sBulle='';
$A26_COL_Proprietaire->m_eAction=6;
$A26_COL_Proprietaire->m_sPageAction='';
$A26_COL_Proprietaire->m_bLibelleRiche=true;

$A27_COL_Titulaire=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Titulaire','A27',$A27_COL_Titulaire,'A27_COL_Titulaire');
$A20_TABLE_Membres->AjouteColonne('A27_COL_Titulaire','COL_Titulaire','A27', 5600, 6,'Membres','titulaire');
$A20_TABLE_Membres->TabColonnes[7]->Visible=1;
$A20_TABLE_Membres->TabColonnes[7]->Etat=0;
$A20_TABLE_Membres->TabColonnes[7]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[7]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[7]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[7]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[7]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[7]->m_sBulle='';
$A27_COL_Titulaire->m_eAction=6;
$A27_COL_Titulaire->m_sPageAction='';
$A27_COL_Titulaire->m_bLibelleRiche=true;

$A28_COL_Second=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Second','A28',$A28_COL_Second,'A28_COL_Second');
$A20_TABLE_Membres->AjouteColonne('A28_COL_Second','COL_Second','A28', 5600, 7,'Membres','second');
$A20_TABLE_Membres->TabColonnes[8]->Visible=1;
$A20_TABLE_Membres->TabColonnes[8]->Etat=0;
$A20_TABLE_Membres->TabColonnes[8]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[8]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[8]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[8]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[8]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[8]->m_sBulle='';
$A28_COL_Second->m_eAction=6;
$A28_COL_Second->m_sPageAction='';
$A28_COL_Second->m_bLibelleRiche=true;

$A29_COL_Sans_vehicule=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Sans_vehicule','A29',$A29_COL_Sans_vehicule,'A29_COL_Sans_vehicule');
$A20_TABLE_Membres->AjouteColonne('A29_COL_Sans_vehicule','COL_Sans_vehicule','A29', 5600, 8,'Membres','sans_vehicule');
$A20_TABLE_Membres->TabColonnes[9]->Visible=1;
$A20_TABLE_Membres->TabColonnes[9]->Etat=0;
$A20_TABLE_Membres->TabColonnes[9]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[9]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[9]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[9]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[9]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[9]->m_sBulle='';
$A29_COL_Sans_vehicule->m_eAction=6;
$A29_COL_Sans_vehicule->m_sPageAction='';
$A29_COL_Sans_vehicule->m_bLibelleRiche=true;

$A30_COL_Yango=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Yango','A30',$A30_COL_Yango,'A30_COL_Yango');
$A20_TABLE_Membres->AjouteColonne('A30_COL_Yango','COL_Yango','A30', 5600, 9,'Membres','yango');
$A20_TABLE_Membres->TabColonnes[10]->Visible=1;
$A20_TABLE_Membres->TabColonnes[10]->Etat=0;
$A20_TABLE_Membres->TabColonnes[10]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[10]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[10]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[10]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[10]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[10]->m_sBulle='';
$A30_COL_Yango->m_eAction=6;
$A30_COL_Yango->m_sPageAction='';
$A30_COL_Yango->m_bLibelleRiche=true;

$A31_COL_Heetch=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Heetch','A31',$A31_COL_Heetch,'A31_COL_Heetch');
$A20_TABLE_Membres->AjouteColonne('A31_COL_Heetch','COL_Heetch','A31', 5600, 10,'Membres','heetch');
$A20_TABLE_Membres->TabColonnes[11]->Visible=1;
$A20_TABLE_Membres->TabColonnes[11]->Etat=0;
$A20_TABLE_Membres->TabColonnes[11]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[11]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[11]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[11]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[11]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[11]->m_sBulle='';
$A31_COL_Heetch->m_eAction=6;
$A31_COL_Heetch->m_sPageAction='';
$A31_COL_Heetch->m_bLibelleRiche=true;

$A32_COL_Uber=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Uber','A32',$A32_COL_Uber,'A32_COL_Uber');
$A20_TABLE_Membres->AjouteColonne('A32_COL_Uber','COL_Uber','A32', 5600, 11,'Membres','uber');
$A20_TABLE_Membres->TabColonnes[12]->Visible=1;
$A20_TABLE_Membres->TabColonnes[12]->Etat=0;
$A20_TABLE_Membres->TabColonnes[12]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[12]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[12]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[12]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[12]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[12]->m_sBulle='';
$A32_COL_Uber->m_eAction=6;
$A32_COL_Uber->m_sPageAction='';
$A32_COL_Uber->m_bLibelleRiche=true;

$A33_COL_Photo_du_permis=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Photo_du_permis','A33',$A33_COL_Photo_du_permis,'A33_COL_Photo_du_permis');
$A20_TABLE_Membres->AjouteColonne('A33_COL_Photo_du_permis','COL_Photo_du_permis','A33', 5600, 12,'Membres','photo_du_permis');
$A20_TABLE_Membres->TabColonnes[13]->Visible=1;
$A20_TABLE_Membres->TabColonnes[13]->Etat=0;
$A20_TABLE_Membres->TabColonnes[13]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[13]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[13]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[13]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[13]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[13]->m_sBulle='';
$A33_COL_Photo_du_permis->m_eAction=6;
$A33_COL_Photo_du_permis->m_sPageAction='';
$A33_COL_Photo_du_permis->m_bLibelleRiche=true;

$A34_COL_Piece_identite=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Piece_identite','A34',$A34_COL_Piece_identite,'A34_COL_Piece_identite');
$A20_TABLE_Membres->AjouteColonne('A34_COL_Piece_identite','COL_Piece_identite','A34', 5600, 13,'Membres','piece_identite');
$A20_TABLE_Membres->TabColonnes[14]->Visible=1;
$A20_TABLE_Membres->TabColonnes[14]->Etat=0;
$A20_TABLE_Membres->TabColonnes[14]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[14]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[14]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[14]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[14]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[14]->m_sBulle='';
$A34_COL_Piece_identite->m_eAction=6;
$A34_COL_Piece_identite->m_sPageAction='';
$A34_COL_Piece_identite->m_bLibelleRiche=true;

$A35_COL_Photo=&CreerChamp('CSaisie');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('COL_Photo','A35',$A35_COL_Photo,'A35_COL_Photo');
$A20_TABLE_Membres->AjouteColonne('A35_COL_Photo','COL_Photo','A35', 5600, 14,'Membres','photo');
$A20_TABLE_Membres->TabColonnes[15]->Visible=1;
$A20_TABLE_Membres->TabColonnes[15]->Etat=0;
$A20_TABLE_Membres->TabColonnes[15]->bColonneLien=0;
$A20_TABLE_Membres->TabColonnes[15]->SetTriable(true);
$A20_TABLE_Membres->TabColonnes[15]->SetAvecLoupe(true);
$A20_TABLE_Membres->TabColonnes[15]->m_bAvecFiltre=true;
$A20_TABLE_Membres->TabColonnes[15]->m_eDeplaceInsere = 4;
$A20_TABLE_Membres->TabColonnes[15]->m_sBulle='';
$A35_COL_Photo->m_eAction=6;
$A35_COL_Photo->m_sPageAction='';
$A35_COL_Photo->m_bLibelleRiche=true;

$A19_BTN_Creer_un_utilisateur=&CreerChamp('CBouton');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('BTN_Créer_un_utilisateur','A19',$A19_BTN_Creer_un_utilisateur,'A19_BTN_Creer_un_utilisateur');
$A19_BTN_Creer_un_utilisateur->m_bLibelleRiche=true;

$A36_BTN_Se_connecter=&CreerChamp('CBouton');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('BTN_Se_connecter','A36',$A36_BTN_Se_connecter,'A36_BTN_Se_connecter');
$A36_BTN_Se_connecter->m_bLibelleRiche=true;

$A37_BTN_Deconnexion=&CreerChamp('CBouton');$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('BTN_Déconnexion','A37',$A37_BTN_Deconnexion,'A37_BTN_Deconnexion');
$A37_BTN_Deconnexion->m_bLibelleRiche=true;

$M6_IMG_Logo_Personnalise_2=&CreerChamp('CImage',207,57,15790320);$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('IMG_Logo_Personnalisé_2','M6',$M6_IMG_Logo_Personnalise_2,'M6_IMG_Logo_Personnalise_2');
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

$M5_IMG_Logo=&CreerChamp('CImage',853,241,15790320);$PAGE_INSCRPTION_MEMBRES->WB_AjouteChamp('IMG_Logo','M5',$M5_IMG_Logo,'M5_IMG_Logo');
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
$A2_SAI_Nom->Couleur = 0x403628;
$A2_SAI_Nom->CouleurInitiale = 0x403628;
$A2_SAI_Nom->CouleurFond = 0xFFFFFF;
$A2_SAI_Nom->CouleurFondInitiale = 0xFFFFFF;
$A2_SAI_Nom->Valeur = '';
$A2_SAI_Nom->Libelle = function_exists("construireTexteRiche_A2_SAI_Nom") ? null : 'Nom';
$A2_SAI_Nom->Masque = '0';
$A2_SAI_Nom->m_nHauteur = 21;
$A2_SAI_Nom->m_nLargeur = 440;
$A2_SAI_Nom->m_nOpacite = 100;
$A2_SAI_Nom->m_nCadrageHorizontal = -1;
$A2_SAI_Nom->m_nCadrageVertical = 1;
$A2_SAI_Nom->m_Police->m_bGras = false;
$A2_SAI_Nom->m_Police->m_bItalique = false;
$A2_SAI_Nom->m_Police->m_bSouligne = false;
$A2_SAI_Nom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A2_SAI_Nom->m_Police->m_nTaille = '9';
$A2_SAI_Nom->m_nX = 49;
$A2_SAI_Nom->m_nY = 442;
$A2_SAI_Nom->m_clCouleurJauge = 0x000000;
$A2_SAI_Nom->BoutonCalendrier = 0;
$A2_SAI_Nom->EtatInitial = 0;
$A2_SAI_Nom->VisibleInitial = 1;
$A2_SAI_Nom->YInitial = 0;
$A2_SAI_Nom->NombreColonne = 0;
$A2_SAI_Nom->BulleTitre = '';
$A2_SAI_Nom->JetonActif = false;
$A2_SAI_Nom->JetonListeSeparateur = '';
$A2_SAI_Nom->JetonAutoriseDoublon = false;
$A2_SAI_Nom->JetonSupprimable = true;

$A2_SAI_Nom->SetLiaisonFichier('Membres', 'Nom');

$A2_SAI_Nom->lierVM('PAGE_inscrption_membres','SAI_Nom','A2_SAI_Nom');
$A3_SAI_Prenom->Couleur = 0x403628;
$A3_SAI_Prenom->CouleurInitiale = 0x403628;
$A3_SAI_Prenom->CouleurFond = 0xFFFFFF;
$A3_SAI_Prenom->CouleurFondInitiale = 0xFFFFFF;
$A3_SAI_Prenom->Valeur = '';
$A3_SAI_Prenom->Libelle = function_exists("construireTexteRiche_A3_SAI_Prenom") ? null : 'Prénom';
$A3_SAI_Prenom->Masque = '0';
$A3_SAI_Prenom->m_nHauteur = 21;
$A3_SAI_Prenom->m_nLargeur = 440;
$A3_SAI_Prenom->m_nOpacite = 100;
$A3_SAI_Prenom->m_nCadrageHorizontal = -1;
$A3_SAI_Prenom->m_nCadrageVertical = 1;
$A3_SAI_Prenom->m_Police->m_bGras = false;
$A3_SAI_Prenom->m_Police->m_bItalique = false;
$A3_SAI_Prenom->m_Police->m_bSouligne = false;
$A3_SAI_Prenom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A3_SAI_Prenom->m_Police->m_nTaille = '9';
$A3_SAI_Prenom->m_nX = 49;
$A3_SAI_Prenom->m_nY = 473;
$A3_SAI_Prenom->m_clCouleurJauge = 0x000000;
$A3_SAI_Prenom->BoutonCalendrier = 0;
$A3_SAI_Prenom->EtatInitial = 0;
$A3_SAI_Prenom->VisibleInitial = 1;
$A3_SAI_Prenom->YInitial = 0;
$A3_SAI_Prenom->NombreColonne = 0;
$A3_SAI_Prenom->BulleTitre = '';
$A3_SAI_Prenom->JetonActif = false;
$A3_SAI_Prenom->JetonListeSeparateur = '';
$A3_SAI_Prenom->JetonAutoriseDoublon = false;
$A3_SAI_Prenom->JetonSupprimable = true;

$A3_SAI_Prenom->SetLiaisonFichier('Membres', 'Prenom');

$A3_SAI_Prenom->lierVM('PAGE_inscrption_membres','SAI_Prenom','A3_SAI_Prenom');
$A4_SAI_Contact_mobile->Couleur = 0x403628;
$A4_SAI_Contact_mobile->CouleurInitiale = 0x403628;
$A4_SAI_Contact_mobile->CouleurFond = 0xFFFFFF;
$A4_SAI_Contact_mobile->CouleurFondInitiale = 0xFFFFFF;
$A4_SAI_Contact_mobile->Valeur = '';
$A4_SAI_Contact_mobile->Libelle = function_exists("construireTexteRiche_A4_SAI_Contact_mobile") ? null : 'Contact mobile';
$A4_SAI_Contact_mobile->Masque = '+9 999 999 999';
$A4_SAI_Contact_mobile->m_nHauteur = 21;
$A4_SAI_Contact_mobile->m_nLargeur = 440;
$A4_SAI_Contact_mobile->m_nOpacite = 100;
$A4_SAI_Contact_mobile->m_nCadrageHorizontal = -1;
$A4_SAI_Contact_mobile->m_nCadrageVertical = 1;
$A4_SAI_Contact_mobile->m_Police->m_bGras = false;
$A4_SAI_Contact_mobile->m_Police->m_bItalique = false;
$A4_SAI_Contact_mobile->m_Police->m_bSouligne = false;
$A4_SAI_Contact_mobile->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A4_SAI_Contact_mobile->m_Police->m_nTaille = '9';
$A4_SAI_Contact_mobile->m_nX = 49;
$A4_SAI_Contact_mobile->m_nY = 504;
$A4_SAI_Contact_mobile->m_clCouleurJauge = 0x000000;
$A4_SAI_Contact_mobile->BoutonCalendrier = 0;
$A4_SAI_Contact_mobile->EtatInitial = 0;
$A4_SAI_Contact_mobile->VisibleInitial = 1;
$A4_SAI_Contact_mobile->YInitial = 0;
$A4_SAI_Contact_mobile->NombreColonne = 0;
$A4_SAI_Contact_mobile->BulleTitre = '';
$A4_SAI_Contact_mobile->JetonActif = false;
$A4_SAI_Contact_mobile->JetonListeSeparateur = '';
$A4_SAI_Contact_mobile->JetonAutoriseDoublon = false;
$A4_SAI_Contact_mobile->JetonSupprimable = true;

$A4_SAI_Contact_mobile->SetLiaisonFichier('Membres', 'contact_mobile');

$A4_SAI_Contact_mobile->lierVM('PAGE_inscrption_membres','SAI_Contact_mobile','A4_SAI_Contact_mobile');
$A5_SAI_Contact_domicile->Couleur = 0x403628;
$A5_SAI_Contact_domicile->CouleurInitiale = 0x403628;
$A5_SAI_Contact_domicile->CouleurFond = 0xFFFFFF;
$A5_SAI_Contact_domicile->CouleurFondInitiale = 0xFFFFFF;
$A5_SAI_Contact_domicile->Valeur = '';
$A5_SAI_Contact_domicile->Libelle = function_exists("construireTexteRiche_A5_SAI_Contact_domicile") ? null : 'Contact domicile';
$A5_SAI_Contact_domicile->Masque = '+9 999 999 999';
$A5_SAI_Contact_domicile->m_nHauteur = 21;
$A5_SAI_Contact_domicile->m_nLargeur = 440;
$A5_SAI_Contact_domicile->m_nOpacite = 100;
$A5_SAI_Contact_domicile->m_nCadrageHorizontal = -1;
$A5_SAI_Contact_domicile->m_nCadrageVertical = 1;
$A5_SAI_Contact_domicile->m_Police->m_bGras = false;
$A5_SAI_Contact_domicile->m_Police->m_bItalique = false;
$A5_SAI_Contact_domicile->m_Police->m_bSouligne = false;
$A5_SAI_Contact_domicile->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A5_SAI_Contact_domicile->m_Police->m_nTaille = '9';
$A5_SAI_Contact_domicile->m_nX = 49;
$A5_SAI_Contact_domicile->m_nY = 535;
$A5_SAI_Contact_domicile->m_clCouleurJauge = 0x000000;
$A5_SAI_Contact_domicile->BoutonCalendrier = 0;
$A5_SAI_Contact_domicile->EtatInitial = 0;
$A5_SAI_Contact_domicile->VisibleInitial = 1;
$A5_SAI_Contact_domicile->YInitial = 0;
$A5_SAI_Contact_domicile->NombreColonne = 0;
$A5_SAI_Contact_domicile->BulleTitre = '';
$A5_SAI_Contact_domicile->JetonActif = false;
$A5_SAI_Contact_domicile->JetonListeSeparateur = '';
$A5_SAI_Contact_domicile->JetonAutoriseDoublon = false;
$A5_SAI_Contact_domicile->JetonSupprimable = true;

$A5_SAI_Contact_domicile->SetLiaisonFichier('Membres', 'contact_domicile');

$A5_SAI_Contact_domicile->lierVM('PAGE_inscrption_membres','SAI_Contact_domicile','A5_SAI_Contact_domicile');
$A6_SAI_Proprietaire->Couleur = 0x403628;
$A6_SAI_Proprietaire->CouleurInitiale = 0x403628;
$A6_SAI_Proprietaire->CouleurFond = 0xFFFFFF;
$A6_SAI_Proprietaire->CouleurFondInitiale = 0xFFFFFF;
$A6_SAI_Proprietaire->Valeur = '';
$A6_SAI_Proprietaire->Libelle = function_exists("construireTexteRiche_A6_SAI_Proprietaire") ? null : 'Êtes vous Propriétaire ?';
$A6_SAI_Proprietaire->Masque = '0';
$A6_SAI_Proprietaire->m_nHauteur = 21;
$A6_SAI_Proprietaire->m_nLargeur = 440;
$A6_SAI_Proprietaire->m_nOpacite = 100;
$A6_SAI_Proprietaire->m_nCadrageHorizontal = -1;
$A6_SAI_Proprietaire->m_nCadrageVertical = 1;
$A6_SAI_Proprietaire->m_Police->m_bGras = false;
$A6_SAI_Proprietaire->m_Police->m_bItalique = false;
$A6_SAI_Proprietaire->m_Police->m_bSouligne = false;
$A6_SAI_Proprietaire->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A6_SAI_Proprietaire->m_Police->m_nTaille = '9';
$A6_SAI_Proprietaire->m_nX = 49;
$A6_SAI_Proprietaire->m_nY = 566;
$A6_SAI_Proprietaire->m_clCouleurJauge = 0x000000;
$A6_SAI_Proprietaire->BoutonCalendrier = 0;
$A6_SAI_Proprietaire->EtatInitial = 0;
$A6_SAI_Proprietaire->VisibleInitial = 1;
$A6_SAI_Proprietaire->YInitial = 0;
$A6_SAI_Proprietaire->NombreColonne = 0;
$A6_SAI_Proprietaire->BulleTitre = '';
$A6_SAI_Proprietaire->JetonActif = false;
$A6_SAI_Proprietaire->JetonListeSeparateur = '';
$A6_SAI_Proprietaire->JetonAutoriseDoublon = false;
$A6_SAI_Proprietaire->JetonSupprimable = true;

$A6_SAI_Proprietaire->SetLiaisonFichier('Membres', 'Proprietaire');

$A6_SAI_Proprietaire->lierVM('PAGE_inscrption_membres','SAI_Proprietaire','A6_SAI_Proprietaire');
$A7_SAI_Titulaire->Couleur = 0x403628;
$A7_SAI_Titulaire->CouleurInitiale = 0x403628;
$A7_SAI_Titulaire->CouleurFond = 0xFFFFFF;
$A7_SAI_Titulaire->CouleurFondInitiale = 0xFFFFFF;
$A7_SAI_Titulaire->Valeur = '';
$A7_SAI_Titulaire->Libelle = function_exists("construireTexteRiche_A7_SAI_Titulaire") ? null : 'Êtes vous titulaire ?';
$A7_SAI_Titulaire->Masque = '0';
$A7_SAI_Titulaire->m_nHauteur = 21;
$A7_SAI_Titulaire->m_nLargeur = 440;
$A7_SAI_Titulaire->m_nOpacite = 100;
$A7_SAI_Titulaire->m_nCadrageHorizontal = -1;
$A7_SAI_Titulaire->m_nCadrageVertical = 1;
$A7_SAI_Titulaire->m_Police->m_bGras = false;
$A7_SAI_Titulaire->m_Police->m_bItalique = false;
$A7_SAI_Titulaire->m_Police->m_bSouligne = false;
$A7_SAI_Titulaire->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A7_SAI_Titulaire->m_Police->m_nTaille = '9';
$A7_SAI_Titulaire->m_nX = 49;
$A7_SAI_Titulaire->m_nY = 597;
$A7_SAI_Titulaire->m_clCouleurJauge = 0x000000;
$A7_SAI_Titulaire->BoutonCalendrier = 0;
$A7_SAI_Titulaire->EtatInitial = 0;
$A7_SAI_Titulaire->VisibleInitial = 1;
$A7_SAI_Titulaire->YInitial = 0;
$A7_SAI_Titulaire->NombreColonne = 0;
$A7_SAI_Titulaire->BulleTitre = '';
$A7_SAI_Titulaire->JetonActif = false;
$A7_SAI_Titulaire->JetonListeSeparateur = '';
$A7_SAI_Titulaire->JetonAutoriseDoublon = false;
$A7_SAI_Titulaire->JetonSupprimable = true;

$A7_SAI_Titulaire->SetLiaisonFichier('Membres', 'titulaire');

$A7_SAI_Titulaire->lierVM('PAGE_inscrption_membres','SAI_Titulaire','A7_SAI_Titulaire');
$A8_SAI_Second->Couleur = 0x403628;
$A8_SAI_Second->CouleurInitiale = 0x403628;
$A8_SAI_Second->CouleurFond = 0xFFFFFF;
$A8_SAI_Second->CouleurFondInitiale = 0xFFFFFF;
$A8_SAI_Second->Valeur = '';
$A8_SAI_Second->Libelle = function_exists("construireTexteRiche_A8_SAI_Second") ? null : 'Êtes vous Second ?';
$A8_SAI_Second->Masque = '0';
$A8_SAI_Second->m_nHauteur = 21;
$A8_SAI_Second->m_nLargeur = 440;
$A8_SAI_Second->m_nOpacite = 100;
$A8_SAI_Second->m_nCadrageHorizontal = -1;
$A8_SAI_Second->m_nCadrageVertical = 1;
$A8_SAI_Second->m_Police->m_bGras = false;
$A8_SAI_Second->m_Police->m_bItalique = false;
$A8_SAI_Second->m_Police->m_bSouligne = false;
$A8_SAI_Second->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A8_SAI_Second->m_Police->m_nTaille = '9';
$A8_SAI_Second->m_nX = 49;
$A8_SAI_Second->m_nY = 628;
$A8_SAI_Second->m_clCouleurJauge = 0x000000;
$A8_SAI_Second->BoutonCalendrier = 0;
$A8_SAI_Second->EtatInitial = 0;
$A8_SAI_Second->VisibleInitial = 1;
$A8_SAI_Second->YInitial = 0;
$A8_SAI_Second->NombreColonne = 0;
$A8_SAI_Second->BulleTitre = '';
$A8_SAI_Second->JetonActif = false;
$A8_SAI_Second->JetonListeSeparateur = '';
$A8_SAI_Second->JetonAutoriseDoublon = false;
$A8_SAI_Second->JetonSupprimable = true;

$A8_SAI_Second->SetLiaisonFichier('Membres', 'second');

$A8_SAI_Second->lierVM('PAGE_inscrption_membres','SAI_Second','A8_SAI_Second');
$A9_SAI_Sans_vehicule->Couleur = 0x403628;
$A9_SAI_Sans_vehicule->CouleurInitiale = 0x403628;
$A9_SAI_Sans_vehicule->CouleurFond = 0xFFFFFF;
$A9_SAI_Sans_vehicule->CouleurFondInitiale = 0xFFFFFF;
$A9_SAI_Sans_vehicule->Valeur = '';
$A9_SAI_Sans_vehicule->Libelle = function_exists("construireTexteRiche_A9_SAI_Sans_vehicule") ? null : 'Êtes vous sans véhicule ?';
$A9_SAI_Sans_vehicule->Masque = '0';
$A9_SAI_Sans_vehicule->m_nHauteur = 21;
$A9_SAI_Sans_vehicule->m_nLargeur = 440;
$A9_SAI_Sans_vehicule->m_nOpacite = 100;
$A9_SAI_Sans_vehicule->m_nCadrageHorizontal = -1;
$A9_SAI_Sans_vehicule->m_nCadrageVertical = 1;
$A9_SAI_Sans_vehicule->m_Police->m_bGras = false;
$A9_SAI_Sans_vehicule->m_Police->m_bItalique = false;
$A9_SAI_Sans_vehicule->m_Police->m_bSouligne = false;
$A9_SAI_Sans_vehicule->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A9_SAI_Sans_vehicule->m_Police->m_nTaille = '9';
$A9_SAI_Sans_vehicule->m_nX = 517;
$A9_SAI_Sans_vehicule->m_nY = 442;
$A9_SAI_Sans_vehicule->m_clCouleurJauge = 0x000000;
$A9_SAI_Sans_vehicule->BoutonCalendrier = 0;
$A9_SAI_Sans_vehicule->EtatInitial = 0;
$A9_SAI_Sans_vehicule->VisibleInitial = 1;
$A9_SAI_Sans_vehicule->YInitial = 0;
$A9_SAI_Sans_vehicule->NombreColonne = 0;
$A9_SAI_Sans_vehicule->BulleTitre = '';
$A9_SAI_Sans_vehicule->JetonActif = false;
$A9_SAI_Sans_vehicule->JetonListeSeparateur = '';
$A9_SAI_Sans_vehicule->JetonAutoriseDoublon = false;
$A9_SAI_Sans_vehicule->JetonSupprimable = true;

$A9_SAI_Sans_vehicule->SetLiaisonFichier('Membres', 'sans_vehicule');

$A9_SAI_Sans_vehicule->lierVM('PAGE_inscrption_membres','SAI_Sans_vehicule','A9_SAI_Sans_vehicule');
$A10_SAI_Yango->Couleur = 0x403628;
$A10_SAI_Yango->CouleurInitiale = 0x403628;
$A10_SAI_Yango->CouleurFond = 0xFFFFFF;
$A10_SAI_Yango->CouleurFondInitiale = 0xFFFFFF;
$A10_SAI_Yango->Libelle = function_exists("construireTexteRiche_A10_SAI_Yango") ? null : 'Avez vous un compte yango ?';
$A10_SAI_Yango->Masque = '0';
$A10_SAI_Yango->m_nHauteur = 21;
$A10_SAI_Yango->m_nLargeur = 440;
$A10_SAI_Yango->m_nOpacite = 100;
$A10_SAI_Yango->m_nCadrageHorizontal = -1;
$A10_SAI_Yango->m_nCadrageVertical = 1;
$A10_SAI_Yango->m_Police->m_bGras = false;
$A10_SAI_Yango->m_Police->m_bItalique = false;
$A10_SAI_Yango->m_Police->m_bSouligne = false;
$A10_SAI_Yango->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A10_SAI_Yango->m_Police->m_nTaille = '9';
$A10_SAI_Yango->m_nX = 517;
$A10_SAI_Yango->m_nY = 475;
$A10_SAI_Yango->m_clCouleurJauge = 0x000000;
$A10_SAI_Yango->BoutonCalendrier = 0;
$A10_SAI_Yango->EtatInitial = 0;
$A10_SAI_Yango->VisibleInitial = 1;
$A10_SAI_Yango->YInitial = 0;
$A10_SAI_Yango->NombreColonne = 0;
$A10_SAI_Yango->BulleTitre = '';
$A10_SAI_Yango->JetonActif = false;
$A10_SAI_Yango->JetonListeSeparateur = '';
$A10_SAI_Yango->JetonAutoriseDoublon = false;
$A10_SAI_Yango->JetonSupprimable = true;

$A10_SAI_Yango->SetLiaisonFichier('Membres', 'yango');

$A10_SAI_Yango->lierVM('PAGE_inscrption_membres','SAI_Yango','A10_SAI_Yango');
$A11_SAI_Heetch->Couleur = 0x403628;
$A11_SAI_Heetch->CouleurInitiale = 0x403628;
$A11_SAI_Heetch->CouleurFond = 0xFFFFFF;
$A11_SAI_Heetch->CouleurFondInitiale = 0xFFFFFF;
$A11_SAI_Heetch->Valeur = '';
$A11_SAI_Heetch->Libelle = function_exists("construireTexteRiche_A11_SAI_Heetch") ? null : 'Avez vous un compte heetch ?';
$A11_SAI_Heetch->Masque = '0';
$A11_SAI_Heetch->m_nHauteur = 21;
$A11_SAI_Heetch->m_nLargeur = 440;
$A11_SAI_Heetch->m_nOpacite = 100;
$A11_SAI_Heetch->m_nCadrageHorizontal = -1;
$A11_SAI_Heetch->m_nCadrageVertical = 1;
$A11_SAI_Heetch->m_Police->m_bGras = false;
$A11_SAI_Heetch->m_Police->m_bItalique = false;
$A11_SAI_Heetch->m_Police->m_bSouligne = false;
$A11_SAI_Heetch->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A11_SAI_Heetch->m_Police->m_nTaille = '9';
$A11_SAI_Heetch->m_nX = 517;
$A11_SAI_Heetch->m_nY = 508;
$A11_SAI_Heetch->m_clCouleurJauge = 0x000000;
$A11_SAI_Heetch->BoutonCalendrier = 0;
$A11_SAI_Heetch->EtatInitial = 0;
$A11_SAI_Heetch->VisibleInitial = 1;
$A11_SAI_Heetch->YInitial = 0;
$A11_SAI_Heetch->NombreColonne = 0;
$A11_SAI_Heetch->BulleTitre = '';
$A11_SAI_Heetch->JetonActif = false;
$A11_SAI_Heetch->JetonListeSeparateur = '';
$A11_SAI_Heetch->JetonAutoriseDoublon = false;
$A11_SAI_Heetch->JetonSupprimable = true;

$A11_SAI_Heetch->SetLiaisonFichier('Membres', 'heetch');

$A11_SAI_Heetch->lierVM('PAGE_inscrption_membres','SAI_Heetch','A11_SAI_Heetch');
$A12_SAI_Uber->Couleur = 0x403628;
$A12_SAI_Uber->CouleurInitiale = 0x403628;
$A12_SAI_Uber->CouleurFond = 0xFFFFFF;
$A12_SAI_Uber->CouleurFondInitiale = 0xFFFFFF;
$A12_SAI_Uber->Valeur = '';
$A12_SAI_Uber->Libelle = function_exists("construireTexteRiche_A12_SAI_Uber") ? null : 'Avez vous un compte Uber?';
$A12_SAI_Uber->Masque = '0';
$A12_SAI_Uber->m_nHauteur = 21;
$A12_SAI_Uber->m_nLargeur = 440;
$A12_SAI_Uber->m_nOpacite = 100;
$A12_SAI_Uber->m_nCadrageHorizontal = -1;
$A12_SAI_Uber->m_nCadrageVertical = 1;
$A12_SAI_Uber->m_Police->m_bGras = false;
$A12_SAI_Uber->m_Police->m_bItalique = false;
$A12_SAI_Uber->m_Police->m_bSouligne = false;
$A12_SAI_Uber->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A12_SAI_Uber->m_Police->m_nTaille = '9';
$A12_SAI_Uber->m_nX = 517;
$A12_SAI_Uber->m_nY = 541;
$A12_SAI_Uber->m_clCouleurJauge = 0x000000;
$A12_SAI_Uber->BoutonCalendrier = 0;
$A12_SAI_Uber->EtatInitial = 0;
$A12_SAI_Uber->VisibleInitial = 1;
$A12_SAI_Uber->YInitial = 0;
$A12_SAI_Uber->NombreColonne = 0;
$A12_SAI_Uber->BulleTitre = '';
$A12_SAI_Uber->JetonActif = false;
$A12_SAI_Uber->JetonListeSeparateur = '';
$A12_SAI_Uber->JetonAutoriseDoublon = false;
$A12_SAI_Uber->JetonSupprimable = true;

$A12_SAI_Uber->SetLiaisonFichier('Membres', 'uber');

$A12_SAI_Uber->lierVM('PAGE_inscrption_membres','SAI_Uber','A12_SAI_Uber');
$A13_SAI_Photo_du_permis->Couleur = 0x403628;
$A13_SAI_Photo_du_permis->CouleurInitiale = 0x403628;
$A13_SAI_Photo_du_permis->CouleurFond = 0xFFFFFF;
$A13_SAI_Photo_du_permis->CouleurFondInitiale = 0xFFFFFF;
$A13_SAI_Photo_du_permis->Valeur = '';
$A13_SAI_Photo_du_permis->Libelle = function_exists("construireTexteRiche_A13_SAI_Photo_du_permis") ? null : 'photo du permis';
$A13_SAI_Photo_du_permis->Masque = '0';
$A13_SAI_Photo_du_permis->m_nHauteur = 21;
$A13_SAI_Photo_du_permis->m_nLargeur = 440;
$A13_SAI_Photo_du_permis->m_nOpacite = 100;
$A13_SAI_Photo_du_permis->m_nCadrageVertical = 1;
$A13_SAI_Photo_du_permis->m_Police->m_bGras = false;
$A13_SAI_Photo_du_permis->m_Police->m_bItalique = false;
$A13_SAI_Photo_du_permis->m_Police->m_bSouligne = false;
$A13_SAI_Photo_du_permis->m_Police->m_sNom = '\'Open Sans\', Helvetica, Arial, sans-serif';
$A13_SAI_Photo_du_permis->m_Police->m_nTaille = '9';
$A13_SAI_Photo_du_permis->m_nX = 517;
$A13_SAI_Photo_du_permis->m_nY = 574;
$A13_SAI_Photo_du_permis->m_clCouleurJauge = 0x000000;
$A13_SAI_Photo_du_permis->BoutonCalendrier = 0;
$A13_SAI_Photo_du_permis->EtatInitial = 0;
$A13_SAI_Photo_du_permis->VisibleInitial = 1;
$A13_SAI_Photo_du_permis->YInitial = 0;
$A13_SAI_Photo_du_permis->NombreColonne = 0;
$A13_SAI_Photo_du_permis->BulleTitre = '';
$A13_SAI_Photo_du_permis->JetonActif = false;
$A13_SAI_Photo_du_permis->JetonListeSeparateur = '';
$A13_SAI_Photo_du_permis->JetonAutoriseDoublon = false;
$A13_SAI_Photo_du_permis->JetonSupprimable = true;

$A13_SAI_Photo_du_permis->SetLiaisonFichier('Membres', 'photo_du_permis');

$A13_SAI_Photo_du_permis->lierVM('PAGE_inscrption_membres','SAI_Photo_du_permis','A13_SAI_Photo_du_permis');
$A14_SAI_Piece_identite->Couleur = 0x403628;
$A14_SAI_Piece_identite->CouleurInitiale = 0x403628;
$A14_SAI_Piece_identite->CouleurFond = 0xFFFFFF;
$A14_SAI_Piece_identite->CouleurFondInitiale = 0xFFFFFF;
$A14_SAI_Piece_identite->Libelle = function_exists("construireTexteRiche_A14_SAI_Piece_identite") ? null : 'pièce identité';
$A14_SAI_Piece_identite->Masque = '0';
$A14_SAI_Piece_identite->m_nHauteur = 21;
$A14_SAI_Piece_identite->m_nLargeur = 440;
$A14_SAI_Piece_identite->m_nOpacite = 100;
$A14_SAI_Piece_identite->m_nCadrageVertical = 1;
$A14_SAI_Piece_identite->m_Police->m_bGras = false;
$A14_SAI_Piece_identite->m_Police->m_bItalique = false;
$A14_SAI_Piece_identite->m_Police->m_bSouligne = false;
$A14_SAI_Piece_identite->m_Police->m_sNom = '\'Open Sans\', Helvetica, Arial, sans-serif';
$A14_SAI_Piece_identite->m_Police->m_nTaille = '9';
$A14_SAI_Piece_identite->m_nX = 517;
$A14_SAI_Piece_identite->m_nY = 607;
$A14_SAI_Piece_identite->m_clCouleurJauge = 0x000000;
$A14_SAI_Piece_identite->BoutonCalendrier = 0;
$A14_SAI_Piece_identite->EtatInitial = 0;
$A14_SAI_Piece_identite->VisibleInitial = 1;
$A14_SAI_Piece_identite->YInitial = 0;
$A14_SAI_Piece_identite->NombreColonne = 0;
$A14_SAI_Piece_identite->BulleTitre = '';
$A14_SAI_Piece_identite->JetonActif = false;
$A14_SAI_Piece_identite->JetonListeSeparateur = '';
$A14_SAI_Piece_identite->JetonAutoriseDoublon = false;
$A14_SAI_Piece_identite->JetonSupprimable = true;

$A14_SAI_Piece_identite->SetLiaisonFichier('Membres', 'piece_identite');

$A14_SAI_Piece_identite->lierVM('PAGE_inscrption_membres','SAI_Piece_identite','A14_SAI_Piece_identite');
$A15_SAI_Photo->Couleur = 0x403628;
$A15_SAI_Photo->CouleurInitiale = 0x403628;
$A15_SAI_Photo->CouleurFond = 0xFFFFFF;
$A15_SAI_Photo->CouleurFondInitiale = 0xFFFFFF;
$A15_SAI_Photo->Valeur = '';
$A15_SAI_Photo->Libelle = function_exists("construireTexteRiche_A15_SAI_Photo") ? null : 'photo';
$A15_SAI_Photo->Masque = '0';
$A15_SAI_Photo->m_nHauteur = 21;
$A15_SAI_Photo->m_nLargeur = 440;
$A15_SAI_Photo->m_nOpacite = 100;
$A15_SAI_Photo->m_nCadrageVertical = 1;
$A15_SAI_Photo->m_Police->m_bGras = false;
$A15_SAI_Photo->m_Police->m_bItalique = false;
$A15_SAI_Photo->m_Police->m_bSouligne = false;
$A15_SAI_Photo->m_Police->m_sNom = '\'Open Sans\', Helvetica, Arial, sans-serif';
$A15_SAI_Photo->m_Police->m_nTaille = '9';
$A15_SAI_Photo->m_nX = 517;
$A15_SAI_Photo->m_nY = 640;
$A15_SAI_Photo->m_clCouleurJauge = 0x000000;
$A15_SAI_Photo->BoutonCalendrier = 0;
$A15_SAI_Photo->EtatInitial = 0;
$A15_SAI_Photo->VisibleInitial = 1;
$A15_SAI_Photo->YInitial = 0;
$A15_SAI_Photo->NombreColonne = 0;
$A15_SAI_Photo->BulleTitre = '';
$A15_SAI_Photo->JetonActif = false;
$A15_SAI_Photo->JetonListeSeparateur = '';
$A15_SAI_Photo->JetonAutoriseDoublon = false;
$A15_SAI_Photo->JetonSupprimable = true;

$A15_SAI_Photo->SetLiaisonFichier('Membres', 'photo');

$A15_SAI_Photo->lierVM('PAGE_inscrption_membres','SAI_Photo','A15_SAI_Photo');
$A16_BTN_ENVOYER->Libelle = function_exists("construireTexteRiche_A16_BTN_ENVOYER") ? null : 'ENVOYER';
$A16_BTN_ENVOYER->JetonActif = false;


$A16_BTN_ENVOYER->lierVM('PAGE_inscrption_membres','BTN_ENVOYER','A16_BTN_ENVOYER');
$A17_BTN_MODIFIER->Visible = true;
$A17_BTN_MODIFIER->Couleur = 0xFFFFFF;
$A17_BTN_MODIFIER->CouleurInitiale = 0xFFFFFF;
$A17_BTN_MODIFIER->CouleurFond = 0x0383E3;
$A17_BTN_MODIFIER->CouleurFondInitiale = 0x0383E3;
$A17_BTN_MODIFIER->Libelle = function_exists("construireTexteRiche_A17_BTN_MODIFIER") ? null : 'MODIFIER';
$A17_BTN_MODIFIER->m_nHauteur = 24;
$A17_BTN_MODIFIER->m_nLargeur = 120;
$A17_BTN_MODIFIER->m_nOpacite = 100;
$A17_BTN_MODIFIER->m_nCadrageHorizontal = 1;
$A17_BTN_MODIFIER->m_nCadrageVertical = 1;
$A17_BTN_MODIFIER->m_Police->m_bGras = false;
$A17_BTN_MODIFIER->m_Police->m_bItalique = false;
$A17_BTN_MODIFIER->m_Police->m_bSouligne = false;
$A17_BTN_MODIFIER->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A17_BTN_MODIFIER->m_Police->m_nTaille = '9';
$A17_BTN_MODIFIER->m_nX = 351;
$A17_BTN_MODIFIER->m_nY = 685;
$A17_BTN_MODIFIER->m_clCouleurJauge = 0x000000;
$A17_BTN_MODIFIER->BoutonCalendrier = 0;
$A17_BTN_MODIFIER->EtatInitial = 0;
$A17_BTN_MODIFIER->VisibleInitial = 1;
$A17_BTN_MODIFIER->YInitial = 0;
$A17_BTN_MODIFIER->NombreColonne = 0;
$A17_BTN_MODIFIER->BulleTitre = '';
$A17_BTN_MODIFIER->JetonActif = false;
$A17_BTN_MODIFIER->JetonListeSeparateur = '';
$A17_BTN_MODIFIER->JetonAutoriseDoublon = false;
$A17_BTN_MODIFIER->JetonSupprimable = false;


$A17_BTN_MODIFIER->lierVM('PAGE_inscrption_membres','BTN_MODIFIER','A17_BTN_MODIFIER');
$A18_BTN_SUPPRIMER->Visible = true;
$A18_BTN_SUPPRIMER->Couleur = 0xFFFFFF;
$A18_BTN_SUPPRIMER->CouleurInitiale = 0xFFFFFF;
$A18_BTN_SUPPRIMER->CouleurFond = 0x0383E3;
$A18_BTN_SUPPRIMER->CouleurFondInitiale = 0x0383E3;
$A18_BTN_SUPPRIMER->Libelle = function_exists("construireTexteRiche_A18_BTN_SUPPRIMER") ? null : 'SUPPRIMER';
$A18_BTN_SUPPRIMER->m_nHauteur = 24;
$A18_BTN_SUPPRIMER->m_nLargeur = 120;
$A18_BTN_SUPPRIMER->m_nOpacite = 100;
$A18_BTN_SUPPRIMER->m_nCadrageHorizontal = 1;
$A18_BTN_SUPPRIMER->m_nCadrageVertical = 1;
$A18_BTN_SUPPRIMER->m_Police->m_bGras = false;
$A18_BTN_SUPPRIMER->m_Police->m_bItalique = false;
$A18_BTN_SUPPRIMER->m_Police->m_bSouligne = false;
$A18_BTN_SUPPRIMER->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A18_BTN_SUPPRIMER->m_Police->m_nTaille = '9';
$A18_BTN_SUPPRIMER->m_nX = 477;
$A18_BTN_SUPPRIMER->m_nY = 685;
$A18_BTN_SUPPRIMER->m_clCouleurJauge = 0x000000;
$A18_BTN_SUPPRIMER->BoutonCalendrier = 0;
$A18_BTN_SUPPRIMER->EtatInitial = 0;
$A18_BTN_SUPPRIMER->VisibleInitial = 1;
$A18_BTN_SUPPRIMER->YInitial = 0;
$A18_BTN_SUPPRIMER->NombreColonne = 0;
$A18_BTN_SUPPRIMER->BulleTitre = '';
$A18_BTN_SUPPRIMER->JetonActif = false;
$A18_BTN_SUPPRIMER->JetonListeSeparateur = '';
$A18_BTN_SUPPRIMER->JetonAutoriseDoublon = false;
$A18_BTN_SUPPRIMER->JetonSupprimable = false;


$A18_BTN_SUPPRIMER->lierVM('PAGE_inscrption_membres','BTN_SUPPRIMER','A18_BTN_SUPPRIMER');
$A20_TABLE_Membres->Visible = true;
$A20_TABLE_Membres->Couleur = 0x403628;
$A20_TABLE_Membres->CouleurInitiale = 0x403628;
$A20_TABLE_Membres->CouleurFond = 0xF9F9F9;
$A20_TABLE_Membres->CouleurFondInitiale = 0xF9F9F9;
$A20_TABLE_Membres->Valeur = '';
$A20_TABLE_Membres->Libelle = 'Liste des Membres';
$A20_TABLE_Membres->m_nHauteur = 191;
$A20_TABLE_Membres->m_nLargeur = 962;
$A20_TABLE_Membres->m_nOpacite = 100;
$A20_TABLE_Membres->m_Police->m_bGras = false;
$A20_TABLE_Membres->m_Police->m_bItalique = false;
$A20_TABLE_Membres->m_Police->m_bSouligne = false;
$A20_TABLE_Membres->m_nX = 12;
$A20_TABLE_Membres->m_nY = 754;
$A20_TABLE_Membres->m_clCouleurJauge = 0x000000;
$A20_TABLE_Membres->BoutonCalendrier = 0;
$A20_TABLE_Membres->EtatInitial = 0;
$A20_TABLE_Membres->VisibleInitial = 1;
$A20_TABLE_Membres->YInitial = 0;
$A20_TABLE_Membres->NombreColonne = 15;
$A20_TABLE_Membres->BulleTitre = '';
$A20_TABLE_Membres->JetonActif = false;
$A20_TABLE_Membres->JetonListeSeparateur = '';
$A20_TABLE_Membres->JetonAutoriseDoublon = false;
$A20_TABLE_Membres->JetonSupprimable = false;


$A20_TABLE_Membres->lierVM('PAGE_inscrption_membres','TABLE_Membres','A20_TABLE_Membres');
$A21_COL_IDMembres->Couleur = 0x403628;
$A21_COL_IDMembres->CouleurInitiale = 0x403628;
$A21_COL_IDMembres->Libelle = function_exists("construireTexteRiche_A21_COL_IDMembres") ? null : 'Id';
$A21_COL_IDMembres->Masque = '+9 999 999 999 999 999 999';
$A21_COL_IDMembres->m_nHauteur = 191;
$A21_COL_IDMembres->m_nLargeur = 42;
$A21_COL_IDMembres->m_nOpacite = 100;
$A21_COL_IDMembres->m_nCadrageHorizontal = 2;
$A21_COL_IDMembres->m_nCadrageVertical = -1;
$A21_COL_IDMembres->m_Police->m_bGras = false;
$A21_COL_IDMembres->m_Police->m_bItalique = false;
$A21_COL_IDMembres->m_Police->m_bSouligne = false;
$A21_COL_IDMembres->m_nX = 0;
$A21_COL_IDMembres->m_nY = 0;
$A21_COL_IDMembres->m_clCouleurJauge = 0x000000;
$A21_COL_IDMembres->BoutonCalendrier = 0;
$A21_COL_IDMembres->EtatInitial = 0;
$A21_COL_IDMembres->VisibleInitial = 1;
$A21_COL_IDMembres->YInitial = 0;
$A21_COL_IDMembres->NombreColonne = 0;
$A21_COL_IDMembres->BulleTitre = '';
$A21_COL_IDMembres->JetonActif = false;
$A21_COL_IDMembres->JetonListeSeparateur = '';
$A21_COL_IDMembres->JetonAutoriseDoublon = false;
$A21_COL_IDMembres->JetonSupprimable = true;


$A21_COL_IDMembres->lierVM('PAGE_inscrption_membres','COL_IDMembres','A21_COL_IDMembres');
$A22_COL_Nom->Couleur = 0x403628;
$A22_COL_Nom->CouleurInitiale = 0x403628;
$A22_COL_Nom->Libelle = function_exists("construireTexteRiche_A22_COL_Nom") ? null : 'Nom';
$A22_COL_Nom->Masque = '0';
$A22_COL_Nom->m_nHauteur = 191;
$A22_COL_Nom->m_nLargeur = 60;
$A22_COL_Nom->m_nOpacite = 100;
$A22_COL_Nom->m_nCadrageVertical = -1;
$A22_COL_Nom->m_Police->m_bGras = false;
$A22_COL_Nom->m_Police->m_bItalique = false;
$A22_COL_Nom->m_Police->m_bSouligne = false;
$A22_COL_Nom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A22_COL_Nom->m_Police->m_nTaille = '9';
$A22_COL_Nom->m_nX = 0;
$A22_COL_Nom->m_nY = 0;
$A22_COL_Nom->m_clCouleurJauge = 0x000000;
$A22_COL_Nom->BoutonCalendrier = 0;
$A22_COL_Nom->EtatInitial = 0;
$A22_COL_Nom->VisibleInitial = 1;
$A22_COL_Nom->YInitial = 0;
$A22_COL_Nom->NombreColonne = 0;
$A22_COL_Nom->BulleTitre = '';
$A22_COL_Nom->JetonActif = false;
$A22_COL_Nom->JetonListeSeparateur = '';
$A22_COL_Nom->JetonAutoriseDoublon = false;
$A22_COL_Nom->JetonSupprimable = true;


$A22_COL_Nom->lierVM('PAGE_inscrption_membres','COL_Nom','A22_COL_Nom');
$A23_COL_Prenom->Couleur = 0x403628;
$A23_COL_Prenom->CouleurInitiale = 0x403628;
$A23_COL_Prenom->Libelle = function_exists("construireTexteRiche_A23_COL_Prenom") ? null : 'Prénom';
$A23_COL_Prenom->Masque = '0';
$A23_COL_Prenom->m_nHauteur = 191;
$A23_COL_Prenom->m_nLargeur = 60;
$A23_COL_Prenom->m_nOpacite = 100;
$A23_COL_Prenom->m_nCadrageVertical = -1;
$A23_COL_Prenom->m_Police->m_bGras = false;
$A23_COL_Prenom->m_Police->m_bItalique = false;
$A23_COL_Prenom->m_Police->m_bSouligne = false;
$A23_COL_Prenom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A23_COL_Prenom->m_Police->m_nTaille = '9';
$A23_COL_Prenom->m_nX = 0;
$A23_COL_Prenom->m_nY = 0;
$A23_COL_Prenom->m_clCouleurJauge = 0x000000;
$A23_COL_Prenom->BoutonCalendrier = 0;
$A23_COL_Prenom->EtatInitial = 0;
$A23_COL_Prenom->VisibleInitial = 1;
$A23_COL_Prenom->YInitial = 0;
$A23_COL_Prenom->NombreColonne = 0;
$A23_COL_Prenom->BulleTitre = '';
$A23_COL_Prenom->JetonActif = false;
$A23_COL_Prenom->JetonListeSeparateur = '';
$A23_COL_Prenom->JetonAutoriseDoublon = false;
$A23_COL_Prenom->JetonSupprimable = true;


$A23_COL_Prenom->lierVM('PAGE_inscrption_membres','COL_Prenom','A23_COL_Prenom');
$A24_COL_Contact_mobile->Couleur = 0x403628;
$A24_COL_Contact_mobile->CouleurInitiale = 0x403628;
$A24_COL_Contact_mobile->Libelle = function_exists("construireTexteRiche_A24_COL_Contact_mobile") ? null : 'Contact mobile';
$A24_COL_Contact_mobile->Masque = '+9 999 999 999';
$A24_COL_Contact_mobile->m_nHauteur = 191;
$A24_COL_Contact_mobile->m_nLargeur = 61;
$A24_COL_Contact_mobile->m_nOpacite = 100;
$A24_COL_Contact_mobile->m_nCadrageHorizontal = 2;
$A24_COL_Contact_mobile->m_nCadrageVertical = -1;
$A24_COL_Contact_mobile->m_Police->m_bGras = false;
$A24_COL_Contact_mobile->m_Police->m_bItalique = false;
$A24_COL_Contact_mobile->m_Police->m_bSouligne = false;
$A24_COL_Contact_mobile->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A24_COL_Contact_mobile->m_Police->m_nTaille = '9';
$A24_COL_Contact_mobile->m_nX = 0;
$A24_COL_Contact_mobile->m_nY = 0;
$A24_COL_Contact_mobile->m_clCouleurJauge = 0x000000;
$A24_COL_Contact_mobile->BoutonCalendrier = 0;
$A24_COL_Contact_mobile->EtatInitial = 0;
$A24_COL_Contact_mobile->VisibleInitial = 1;
$A24_COL_Contact_mobile->YInitial = 0;
$A24_COL_Contact_mobile->NombreColonne = 0;
$A24_COL_Contact_mobile->BulleTitre = '';
$A24_COL_Contact_mobile->JetonActif = false;
$A24_COL_Contact_mobile->JetonListeSeparateur = '';
$A24_COL_Contact_mobile->JetonAutoriseDoublon = false;
$A24_COL_Contact_mobile->JetonSupprimable = true;


$A24_COL_Contact_mobile->lierVM('PAGE_inscrption_membres','COL_Contact_mobile','A24_COL_Contact_mobile');
$A25_COL_Contact_domicile->Couleur = 0x403628;
$A25_COL_Contact_domicile->CouleurInitiale = 0x403628;
$A25_COL_Contact_domicile->Libelle = function_exists("construireTexteRiche_A25_COL_Contact_domicile") ? null : 'Contact domicile';
$A25_COL_Contact_domicile->Masque = '+9 999 999 999';
$A25_COL_Contact_domicile->m_nHauteur = 191;
$A25_COL_Contact_domicile->m_nLargeur = 57;
$A25_COL_Contact_domicile->m_nOpacite = 100;
$A25_COL_Contact_domicile->m_nCadrageHorizontal = 2;
$A25_COL_Contact_domicile->m_nCadrageVertical = -1;
$A25_COL_Contact_domicile->m_Police->m_bGras = false;
$A25_COL_Contact_domicile->m_Police->m_bItalique = false;
$A25_COL_Contact_domicile->m_Police->m_bSouligne = false;
$A25_COL_Contact_domicile->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A25_COL_Contact_domicile->m_Police->m_nTaille = '9';
$A25_COL_Contact_domicile->m_nX = 0;
$A25_COL_Contact_domicile->m_nY = 0;
$A25_COL_Contact_domicile->m_clCouleurJauge = 0x000000;
$A25_COL_Contact_domicile->BoutonCalendrier = 0;
$A25_COL_Contact_domicile->EtatInitial = 0;
$A25_COL_Contact_domicile->VisibleInitial = 1;
$A25_COL_Contact_domicile->YInitial = 0;
$A25_COL_Contact_domicile->NombreColonne = 0;
$A25_COL_Contact_domicile->BulleTitre = '';
$A25_COL_Contact_domicile->JetonActif = false;
$A25_COL_Contact_domicile->JetonListeSeparateur = '';
$A25_COL_Contact_domicile->JetonAutoriseDoublon = false;
$A25_COL_Contact_domicile->JetonSupprimable = true;


$A25_COL_Contact_domicile->lierVM('PAGE_inscrption_membres','COL_Contact_domicile','A25_COL_Contact_domicile');
$A26_COL_Proprietaire->Couleur = 0x403628;
$A26_COL_Proprietaire->CouleurInitiale = 0x403628;
$A26_COL_Proprietaire->Libelle = function_exists("construireTexteRiche_A26_COL_Proprietaire") ? null : 'Êtes vous Propriétaire ?';
$A26_COL_Proprietaire->Masque = '0';
$A26_COL_Proprietaire->m_nHauteur = 191;
$A26_COL_Proprietaire->m_nLargeur = 75;
$A26_COL_Proprietaire->m_nOpacite = 100;
$A26_COL_Proprietaire->m_nCadrageVertical = -1;
$A26_COL_Proprietaire->m_Police->m_bGras = false;
$A26_COL_Proprietaire->m_Police->m_bItalique = false;
$A26_COL_Proprietaire->m_Police->m_bSouligne = false;
$A26_COL_Proprietaire->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A26_COL_Proprietaire->m_Police->m_nTaille = '9';
$A26_COL_Proprietaire->m_nX = 0;
$A26_COL_Proprietaire->m_nY = 0;
$A26_COL_Proprietaire->m_clCouleurJauge = 0x000000;
$A26_COL_Proprietaire->BoutonCalendrier = 0;
$A26_COL_Proprietaire->EtatInitial = 0;
$A26_COL_Proprietaire->VisibleInitial = 1;
$A26_COL_Proprietaire->YInitial = 0;
$A26_COL_Proprietaire->NombreColonne = 0;
$A26_COL_Proprietaire->BulleTitre = '';
$A26_COL_Proprietaire->JetonActif = false;
$A26_COL_Proprietaire->JetonListeSeparateur = '';
$A26_COL_Proprietaire->JetonAutoriseDoublon = false;
$A26_COL_Proprietaire->JetonSupprimable = true;


$A26_COL_Proprietaire->lierVM('PAGE_inscrption_membres','COL_Proprietaire','A26_COL_Proprietaire');
$A27_COL_Titulaire->Couleur = 0x403628;
$A27_COL_Titulaire->CouleurInitiale = 0x403628;
$A27_COL_Titulaire->Libelle = function_exists("construireTexteRiche_A27_COL_Titulaire") ? null : 'Êtes vous titulaire ?';
$A27_COL_Titulaire->Masque = '0';
$A27_COL_Titulaire->m_nHauteur = 191;
$A27_COL_Titulaire->m_nLargeur = 58;
$A27_COL_Titulaire->m_nOpacite = 100;
$A27_COL_Titulaire->m_nCadrageVertical = -1;
$A27_COL_Titulaire->m_Police->m_bGras = false;
$A27_COL_Titulaire->m_Police->m_bItalique = false;
$A27_COL_Titulaire->m_Police->m_bSouligne = false;
$A27_COL_Titulaire->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A27_COL_Titulaire->m_Police->m_nTaille = '9';
$A27_COL_Titulaire->m_nX = 0;
$A27_COL_Titulaire->m_nY = 0;
$A27_COL_Titulaire->m_clCouleurJauge = 0x000000;
$A27_COL_Titulaire->BoutonCalendrier = 0;
$A27_COL_Titulaire->EtatInitial = 0;
$A27_COL_Titulaire->VisibleInitial = 1;
$A27_COL_Titulaire->YInitial = 0;
$A27_COL_Titulaire->NombreColonne = 0;
$A27_COL_Titulaire->BulleTitre = '';
$A27_COL_Titulaire->JetonActif = false;
$A27_COL_Titulaire->JetonListeSeparateur = '';
$A27_COL_Titulaire->JetonAutoriseDoublon = false;
$A27_COL_Titulaire->JetonSupprimable = true;


$A27_COL_Titulaire->lierVM('PAGE_inscrption_membres','COL_Titulaire','A27_COL_Titulaire');
$A28_COL_Second->Couleur = 0x403628;
$A28_COL_Second->CouleurInitiale = 0x403628;
$A28_COL_Second->Libelle = function_exists("construireTexteRiche_A28_COL_Second") ? null : 'Êtes vous Second ?';
$A28_COL_Second->Masque = '0';
$A28_COL_Second->m_nHauteur = 191;
$A28_COL_Second->m_nLargeur = 62;
$A28_COL_Second->m_nOpacite = 100;
$A28_COL_Second->m_nCadrageVertical = -1;
$A28_COL_Second->m_Police->m_bGras = false;
$A28_COL_Second->m_Police->m_bItalique = false;
$A28_COL_Second->m_Police->m_bSouligne = false;
$A28_COL_Second->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A28_COL_Second->m_Police->m_nTaille = '9';
$A28_COL_Second->m_nX = 0;
$A28_COL_Second->m_nY = 0;
$A28_COL_Second->m_clCouleurJauge = 0x000000;
$A28_COL_Second->BoutonCalendrier = 0;
$A28_COL_Second->EtatInitial = 0;
$A28_COL_Second->VisibleInitial = 1;
$A28_COL_Second->YInitial = 0;
$A28_COL_Second->NombreColonne = 0;
$A28_COL_Second->BulleTitre = '';
$A28_COL_Second->JetonActif = false;
$A28_COL_Second->JetonListeSeparateur = '';
$A28_COL_Second->JetonAutoriseDoublon = false;
$A28_COL_Second->JetonSupprimable = true;


$A28_COL_Second->lierVM('PAGE_inscrption_membres','COL_Second','A28_COL_Second');
$A29_COL_Sans_vehicule->Couleur = 0x403628;
$A29_COL_Sans_vehicule->CouleurInitiale = 0x403628;
$A29_COL_Sans_vehicule->Libelle = function_exists("construireTexteRiche_A29_COL_Sans_vehicule") ? null : 'Êtes vous sans véhicule ?';
$A29_COL_Sans_vehicule->Masque = '0';
$A29_COL_Sans_vehicule->m_nHauteur = 191;
$A29_COL_Sans_vehicule->m_nLargeur = 61;
$A29_COL_Sans_vehicule->m_nOpacite = 100;
$A29_COL_Sans_vehicule->m_nCadrageVertical = -1;
$A29_COL_Sans_vehicule->m_Police->m_bGras = false;
$A29_COL_Sans_vehicule->m_Police->m_bItalique = false;
$A29_COL_Sans_vehicule->m_Police->m_bSouligne = false;
$A29_COL_Sans_vehicule->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A29_COL_Sans_vehicule->m_Police->m_nTaille = '9';
$A29_COL_Sans_vehicule->m_nX = 0;
$A29_COL_Sans_vehicule->m_nY = 0;
$A29_COL_Sans_vehicule->m_clCouleurJauge = 0x000000;
$A29_COL_Sans_vehicule->BoutonCalendrier = 0;
$A29_COL_Sans_vehicule->EtatInitial = 0;
$A29_COL_Sans_vehicule->VisibleInitial = 1;
$A29_COL_Sans_vehicule->YInitial = 0;
$A29_COL_Sans_vehicule->NombreColonne = 0;
$A29_COL_Sans_vehicule->BulleTitre = '';
$A29_COL_Sans_vehicule->JetonActif = false;
$A29_COL_Sans_vehicule->JetonListeSeparateur = '';
$A29_COL_Sans_vehicule->JetonAutoriseDoublon = false;
$A29_COL_Sans_vehicule->JetonSupprimable = true;


$A29_COL_Sans_vehicule->lierVM('PAGE_inscrption_membres','COL_Sans_vehicule','A29_COL_Sans_vehicule');
$A30_COL_Yango->Couleur = 0x403628;
$A30_COL_Yango->CouleurInitiale = 0x403628;
$A30_COL_Yango->Libelle = function_exists("construireTexteRiche_A30_COL_Yango") ? null : 'Avez vous un compte yango ?';
$A30_COL_Yango->Masque = '0';
$A30_COL_Yango->m_nHauteur = 191;
$A30_COL_Yango->m_nLargeur = 58;
$A30_COL_Yango->m_nOpacite = 100;
$A30_COL_Yango->m_nCadrageVertical = -1;
$A30_COL_Yango->m_Police->m_bGras = false;
$A30_COL_Yango->m_Police->m_bItalique = false;
$A30_COL_Yango->m_Police->m_bSouligne = false;
$A30_COL_Yango->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A30_COL_Yango->m_Police->m_nTaille = '9';
$A30_COL_Yango->m_nX = 0;
$A30_COL_Yango->m_nY = 0;
$A30_COL_Yango->m_clCouleurJauge = 0x000000;
$A30_COL_Yango->BoutonCalendrier = 0;
$A30_COL_Yango->EtatInitial = 0;
$A30_COL_Yango->VisibleInitial = 1;
$A30_COL_Yango->YInitial = 0;
$A30_COL_Yango->NombreColonne = 0;
$A30_COL_Yango->BulleTitre = '';
$A30_COL_Yango->JetonActif = false;
$A30_COL_Yango->JetonListeSeparateur = '';
$A30_COL_Yango->JetonAutoriseDoublon = false;
$A30_COL_Yango->JetonSupprimable = true;


$A30_COL_Yango->lierVM('PAGE_inscrption_membres','COL_Yango','A30_COL_Yango');
$A31_COL_Heetch->Couleur = 0x403628;
$A31_COL_Heetch->CouleurInitiale = 0x403628;
$A31_COL_Heetch->Libelle = function_exists("construireTexteRiche_A31_COL_Heetch") ? null : 'Avez vous un compte heetch ?';
$A31_COL_Heetch->Masque = '0';
$A31_COL_Heetch->m_nHauteur = 191;
$A31_COL_Heetch->m_nLargeur = 57;
$A31_COL_Heetch->m_nOpacite = 100;
$A31_COL_Heetch->m_nCadrageVertical = -1;
$A31_COL_Heetch->m_Police->m_bGras = false;
$A31_COL_Heetch->m_Police->m_bItalique = false;
$A31_COL_Heetch->m_Police->m_bSouligne = false;
$A31_COL_Heetch->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A31_COL_Heetch->m_Police->m_nTaille = '9';
$A31_COL_Heetch->m_nX = 0;
$A31_COL_Heetch->m_nY = 0;
$A31_COL_Heetch->m_clCouleurJauge = 0x000000;
$A31_COL_Heetch->BoutonCalendrier = 0;
$A31_COL_Heetch->EtatInitial = 0;
$A31_COL_Heetch->VisibleInitial = 1;
$A31_COL_Heetch->YInitial = 0;
$A31_COL_Heetch->NombreColonne = 0;
$A31_COL_Heetch->BulleTitre = '';
$A31_COL_Heetch->JetonActif = false;
$A31_COL_Heetch->JetonListeSeparateur = '';
$A31_COL_Heetch->JetonAutoriseDoublon = false;
$A31_COL_Heetch->JetonSupprimable = true;


$A31_COL_Heetch->lierVM('PAGE_inscrption_membres','COL_Heetch','A31_COL_Heetch');
$A32_COL_Uber->Couleur = 0x403628;
$A32_COL_Uber->CouleurInitiale = 0x403628;
$A32_COL_Uber->Libelle = function_exists("construireTexteRiche_A32_COL_Uber") ? null : 'Avez vous un compte Uber?';
$A32_COL_Uber->Masque = '0';
$A32_COL_Uber->m_nHauteur = 191;
$A32_COL_Uber->m_nLargeur = 48;
$A32_COL_Uber->m_nOpacite = 100;
$A32_COL_Uber->m_nCadrageVertical = -1;
$A32_COL_Uber->m_Police->m_bGras = false;
$A32_COL_Uber->m_Police->m_bItalique = false;
$A32_COL_Uber->m_Police->m_bSouligne = false;
$A32_COL_Uber->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A32_COL_Uber->m_Police->m_nTaille = '9';
$A32_COL_Uber->m_nX = 0;
$A32_COL_Uber->m_nY = 0;
$A32_COL_Uber->m_clCouleurJauge = 0x000000;
$A32_COL_Uber->BoutonCalendrier = 0;
$A32_COL_Uber->EtatInitial = 0;
$A32_COL_Uber->VisibleInitial = 1;
$A32_COL_Uber->YInitial = 0;
$A32_COL_Uber->NombreColonne = 0;
$A32_COL_Uber->BulleTitre = '';
$A32_COL_Uber->JetonActif = false;
$A32_COL_Uber->JetonListeSeparateur = '';
$A32_COL_Uber->JetonAutoriseDoublon = false;
$A32_COL_Uber->JetonSupprimable = true;


$A32_COL_Uber->lierVM('PAGE_inscrption_membres','COL_Uber','A32_COL_Uber');
$A33_COL_Photo_du_permis->Couleur = 0x403628;
$A33_COL_Photo_du_permis->CouleurInitiale = 0x403628;
$A33_COL_Photo_du_permis->Libelle = function_exists("construireTexteRiche_A33_COL_Photo_du_permis") ? null : 'photo du permis';
$A33_COL_Photo_du_permis->Masque = '0';
$A33_COL_Photo_du_permis->m_nHauteur = 191;
$A33_COL_Photo_du_permis->m_nLargeur = 67;
$A33_COL_Photo_du_permis->m_nOpacite = 100;
$A33_COL_Photo_du_permis->m_nCadrageVertical = -1;
$A33_COL_Photo_du_permis->m_Police->m_bGras = false;
$A33_COL_Photo_du_permis->m_Police->m_bItalique = false;
$A33_COL_Photo_du_permis->m_Police->m_bSouligne = false;
$A33_COL_Photo_du_permis->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A33_COL_Photo_du_permis->m_Police->m_nTaille = '9';
$A33_COL_Photo_du_permis->m_nX = 0;
$A33_COL_Photo_du_permis->m_nY = 0;
$A33_COL_Photo_du_permis->m_clCouleurJauge = 0x000000;
$A33_COL_Photo_du_permis->BoutonCalendrier = 0;
$A33_COL_Photo_du_permis->EtatInitial = 0;
$A33_COL_Photo_du_permis->VisibleInitial = 1;
$A33_COL_Photo_du_permis->YInitial = 0;
$A33_COL_Photo_du_permis->NombreColonne = 0;
$A33_COL_Photo_du_permis->BulleTitre = '';
$A33_COL_Photo_du_permis->JetonActif = false;
$A33_COL_Photo_du_permis->JetonListeSeparateur = '';
$A33_COL_Photo_du_permis->JetonAutoriseDoublon = false;
$A33_COL_Photo_du_permis->JetonSupprimable = true;


$A33_COL_Photo_du_permis->lierVM('PAGE_inscrption_membres','COL_Photo_du_permis','A33_COL_Photo_du_permis');
$A34_COL_Piece_identite->Couleur = 0x403628;
$A34_COL_Piece_identite->CouleurInitiale = 0x403628;
$A34_COL_Piece_identite->Libelle = function_exists("construireTexteRiche_A34_COL_Piece_identite") ? null : 'pièce identité';
$A34_COL_Piece_identite->Masque = '0';
$A34_COL_Piece_identite->m_nHauteur = 191;
$A34_COL_Piece_identite->m_nLargeur = 77;
$A34_COL_Piece_identite->m_nOpacite = 100;
$A34_COL_Piece_identite->m_nCadrageVertical = -1;
$A34_COL_Piece_identite->m_Police->m_bGras = false;
$A34_COL_Piece_identite->m_Police->m_bItalique = false;
$A34_COL_Piece_identite->m_Police->m_bSouligne = false;
$A34_COL_Piece_identite->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A34_COL_Piece_identite->m_Police->m_nTaille = '9';
$A34_COL_Piece_identite->m_nX = 0;
$A34_COL_Piece_identite->m_nY = 0;
$A34_COL_Piece_identite->m_clCouleurJauge = 0x000000;
$A34_COL_Piece_identite->BoutonCalendrier = 0;
$A34_COL_Piece_identite->EtatInitial = 0;
$A34_COL_Piece_identite->VisibleInitial = 1;
$A34_COL_Piece_identite->YInitial = 0;
$A34_COL_Piece_identite->NombreColonne = 0;
$A34_COL_Piece_identite->BulleTitre = '';
$A34_COL_Piece_identite->JetonActif = false;
$A34_COL_Piece_identite->JetonListeSeparateur = '';
$A34_COL_Piece_identite->JetonAutoriseDoublon = false;
$A34_COL_Piece_identite->JetonSupprimable = true;


$A34_COL_Piece_identite->lierVM('PAGE_inscrption_membres','COL_Piece_identite','A34_COL_Piece_identite');
$A35_COL_Photo->Couleur = 0x403628;
$A35_COL_Photo->CouleurInitiale = 0x403628;
$A35_COL_Photo->Libelle = function_exists("construireTexteRiche_A35_COL_Photo") ? null : 'photo';
$A35_COL_Photo->Masque = '0';
$A35_COL_Photo->m_nHauteur = 191;
$A35_COL_Photo->m_nLargeur = 100;
$A35_COL_Photo->m_nOpacite = 100;
$A35_COL_Photo->m_nCadrageVertical = -1;
$A35_COL_Photo->m_Police->m_bGras = false;
$A35_COL_Photo->m_Police->m_bItalique = false;
$A35_COL_Photo->m_Police->m_bSouligne = false;
$A35_COL_Photo->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A35_COL_Photo->m_Police->m_nTaille = '9';
$A35_COL_Photo->m_nX = 0;
$A35_COL_Photo->m_nY = 0;
$A35_COL_Photo->m_clCouleurJauge = 0x000000;
$A35_COL_Photo->BoutonCalendrier = 0;
$A35_COL_Photo->EtatInitial = 0;
$A35_COL_Photo->VisibleInitial = 1;
$A35_COL_Photo->YInitial = 0;
$A35_COL_Photo->NombreColonne = 0;
$A35_COL_Photo->BulleTitre = '';
$A35_COL_Photo->JetonActif = false;
$A35_COL_Photo->JetonListeSeparateur = '';
$A35_COL_Photo->JetonAutoriseDoublon = false;
$A35_COL_Photo->JetonSupprimable = true;


$A35_COL_Photo->lierVM('PAGE_inscrption_membres','COL_Photo','A35_COL_Photo');
$A19_BTN_Creer_un_utilisateur->Visible = true;
$A19_BTN_Creer_un_utilisateur->Couleur = 0xFFFFFF;
$A19_BTN_Creer_un_utilisateur->CouleurInitiale = 0xFFFFFF;
$A19_BTN_Creer_un_utilisateur->CouleurFond = 0x0383E3;
$A19_BTN_Creer_un_utilisateur->CouleurFondInitiale = 0x0383E3;
$A19_BTN_Creer_un_utilisateur->Libelle = function_exists("construireTexteRiche_A19_BTN_Creer_un_utilisateur") ? null : 'Créer un utilisateur';
$A19_BTN_Creer_un_utilisateur->m_nHauteur = 24;
$A19_BTN_Creer_un_utilisateur->m_nLargeur = 120;
$A19_BTN_Creer_un_utilisateur->m_nOpacite = 100;
$A19_BTN_Creer_un_utilisateur->m_nCadrageHorizontal = 1;
$A19_BTN_Creer_un_utilisateur->m_nCadrageVertical = 1;
$A19_BTN_Creer_un_utilisateur->m_Police->m_bGras = false;
$A19_BTN_Creer_un_utilisateur->m_Police->m_bItalique = false;
$A19_BTN_Creer_un_utilisateur->m_Police->m_bSouligne = false;
$A19_BTN_Creer_un_utilisateur->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A19_BTN_Creer_un_utilisateur->m_Police->m_nTaille = '9';
$A19_BTN_Creer_un_utilisateur->m_nX = 602;
$A19_BTN_Creer_un_utilisateur->m_nY = 18;
$A19_BTN_Creer_un_utilisateur->m_clCouleurJauge = 0x000000;
$A19_BTN_Creer_un_utilisateur->BoutonCalendrier = 0;
$A19_BTN_Creer_un_utilisateur->EtatInitial = 0;
$A19_BTN_Creer_un_utilisateur->VisibleInitial = 1;
$A19_BTN_Creer_un_utilisateur->YInitial = 0;
$A19_BTN_Creer_un_utilisateur->NombreColonne = 0;
$A19_BTN_Creer_un_utilisateur->BulleTitre = '';
$A19_BTN_Creer_un_utilisateur->JetonActif = false;
$A19_BTN_Creer_un_utilisateur->JetonListeSeparateur = '';
$A19_BTN_Creer_un_utilisateur->JetonAutoriseDoublon = false;
$A19_BTN_Creer_un_utilisateur->JetonSupprimable = false;


$A19_BTN_Creer_un_utilisateur->lierVM('PAGE_inscrption_membres','BTN_Créer_un_utilisateur','A19_BTN_Creer_un_utilisateur');
$A36_BTN_Se_connecter->Visible = true;
$A36_BTN_Se_connecter->Couleur = 0xFFFFFF;
$A36_BTN_Se_connecter->CouleurInitiale = 0xFFFFFF;
$A36_BTN_Se_connecter->CouleurFond = 0x0383E3;
$A36_BTN_Se_connecter->CouleurFondInitiale = 0x0383E3;
$A36_BTN_Se_connecter->Libelle = function_exists("construireTexteRiche_A36_BTN_Se_connecter") ? null : '&nbsp;Se connecter';
$A36_BTN_Se_connecter->m_nHauteur = 24;
$A36_BTN_Se_connecter->m_nLargeur = 120;
$A36_BTN_Se_connecter->m_nOpacite = 100;
$A36_BTN_Se_connecter->m_nCadrageHorizontal = 1;
$A36_BTN_Se_connecter->m_nCadrageVertical = 1;
$A36_BTN_Se_connecter->m_Police->m_bGras = false;
$A36_BTN_Se_connecter->m_Police->m_bItalique = false;
$A36_BTN_Se_connecter->m_Police->m_bSouligne = false;
$A36_BTN_Se_connecter->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A36_BTN_Se_connecter->m_Police->m_nTaille = '9';
$A36_BTN_Se_connecter->m_nX = 728;
$A36_BTN_Se_connecter->m_nY = 18;
$A36_BTN_Se_connecter->m_clCouleurJauge = 0x000000;
$A36_BTN_Se_connecter->BoutonCalendrier = 0;
$A36_BTN_Se_connecter->EtatInitial = 0;
$A36_BTN_Se_connecter->VisibleInitial = 1;
$A36_BTN_Se_connecter->YInitial = 0;
$A36_BTN_Se_connecter->NombreColonne = 0;
$A36_BTN_Se_connecter->BulleTitre = '';
$A36_BTN_Se_connecter->JetonActif = false;
$A36_BTN_Se_connecter->JetonListeSeparateur = '';
$A36_BTN_Se_connecter->JetonAutoriseDoublon = false;
$A36_BTN_Se_connecter->JetonSupprimable = false;


$A36_BTN_Se_connecter->lierVM('PAGE_inscrption_membres','BTN_Se_connecter','A36_BTN_Se_connecter');
$A37_BTN_Deconnexion->Visible = true;
$A37_BTN_Deconnexion->Couleur = 0xFFFFFF;
$A37_BTN_Deconnexion->CouleurInitiale = 0xFFFFFF;
$A37_BTN_Deconnexion->CouleurFond = 0x0383E3;
$A37_BTN_Deconnexion->CouleurFondInitiale = 0x0383E3;
$A37_BTN_Deconnexion->Libelle = function_exists("construireTexteRiche_A37_BTN_Deconnexion") ? null : 'Déconnexion';
$A37_BTN_Deconnexion->m_nHauteur = 24;
$A37_BTN_Deconnexion->m_nLargeur = 120;
$A37_BTN_Deconnexion->m_nOpacite = 100;
$A37_BTN_Deconnexion->m_nCadrageHorizontal = 1;
$A37_BTN_Deconnexion->m_nCadrageVertical = 1;
$A37_BTN_Deconnexion->m_Police->m_bGras = false;
$A37_BTN_Deconnexion->m_Police->m_bItalique = false;
$A37_BTN_Deconnexion->m_Police->m_bSouligne = false;
$A37_BTN_Deconnexion->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A37_BTN_Deconnexion->m_Police->m_nTaille = '9';
$A37_BTN_Deconnexion->m_nX = 854;
$A37_BTN_Deconnexion->m_nY = 18;
$A37_BTN_Deconnexion->m_clCouleurJauge = 0x000000;
$A37_BTN_Deconnexion->BoutonCalendrier = 0;
$A37_BTN_Deconnexion->EtatInitial = 0;
$A37_BTN_Deconnexion->VisibleInitial = 1;
$A37_BTN_Deconnexion->YInitial = 0;
$A37_BTN_Deconnexion->NombreColonne = 0;
$A37_BTN_Deconnexion->BulleTitre = '';
$A37_BTN_Deconnexion->JetonActif = false;
$A37_BTN_Deconnexion->JetonListeSeparateur = '';
$A37_BTN_Deconnexion->JetonAutoriseDoublon = false;
$A37_BTN_Deconnexion->JetonSupprimable = false;


$A37_BTN_Deconnexion->lierVM('PAGE_inscrption_membres','BTN_Déconnexion','A37_BTN_Deconnexion');
$M6_IMG_Logo_Personnalise_2->Valeur = '../ext/logo (Personnalisé) (2).jpg';
$M6_IMG_Logo_Personnalise_2->JetonActif = false;


$M6_IMG_Logo_Personnalise_2->lierVM('PAGE_inscrption_membres','IMG_Logo_Personnalisé_2','M6_IMG_Logo_Personnalise_2');
$M5_IMG_Logo->Valeur = '../ext/logo.jpg';
$M5_IMG_Logo->JetonActif = false;


$M5_IMG_Logo->lierVM('PAGE_inscrption_membres','IMG_Logo','M5_IMG_Logo');


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
function& PAGE_inscrption_membres28_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','PAGE_inscrption_membres');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& PAGE_inscrption_membres28()
{
	ExecuteAncetre('PAGE_inscrption_membres28_0');
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','PAGE_inscrption_membres');
	global $A17_BTN_MODIFIER;
	global $A18_BTN_SUPPRIMER;
	global $A37_BTN_Deconnexion;
	global $A19_BTN_Creer_un_utilisateur;
	global $A20_TABLE_Membres;
	global $A36_BTN_Se_connecter;
	
	
	Operateur(95,GetProp($A17_BTN_MODIFIER,'Visible'),getRef(false));
	Operateur(95,GetProp($A18_BTN_SUPPRIMER,'Visible'),getRef(false));
	Operateur(95,GetProp($A37_BTN_Deconnexion,'Visible'),getRef(false));
	Operateur(95,GetProp($A19_BTN_Creer_un_utilisateur,'Visible'),getRef(false));
	Operateur(95,GetProp($A20_TABLE_Membres,'Visible'),getRef(false));
	if (VersBooleen(Operateur(24866,Rubrique('Utilisateurs','admin'),getRef(2))))
	{
		Operateur(95,GetProp($A17_BTN_MODIFIER,'Visible'),getRef(true));
		Operateur(95,GetProp($A18_BTN_SUPPRIMER,'Visible'),getRef(true));
		Operateur(95,GetProp($A37_BTN_Deconnexion,'Visible'),getRef(true));
		Operateur(95,GetProp($A36_BTN_Se_connecter,'Visible'),getRef(false));
		Operateur(95,GetProp($A20_TABLE_Membres,'Visible'),getRef(true));
	}
	if (VersBooleen(Operateur(24866,Rubrique('Utilisateurs','admin'),getRef(3))))
	{
		Operateur(95,GetProp($A17_BTN_MODIFIER,'Visible'),getRef(true));
		Operateur(95,GetProp($A18_BTN_SUPPRIMER,'Visible'),getRef(true));
		Operateur(95,GetProp($A37_BTN_Deconnexion,'Visible'),getRef(true));
		Operateur(95,GetProp($A19_BTN_Creer_un_utilisateur,'Visible'),getRef(true));
		Operateur(95,GetProp($A36_BTN_Se_connecter,'Visible'),getRef(false));
		Operateur(95,GetProp($A20_TABLE_Membres,'Visible'),getRef(true));
	}
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page
function& PAGE_inscrption_membres151_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','PAGE_inscrption_membres');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& PAGE_inscrption_membres151()
{
	ExecuteAncetre('PAGE_inscrption_membres151_0');
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','PAGE_inscrption_membres');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_ENVOYER (serveur) :: (PCode de Clic sur %1!s!)
function& A16_BTN_ENVOYER16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','A16_BTN_ENVOYER');
	global $A4_SAI_Contact_mobile;
	global $A5_SAI_Contact_domicile;
	global $A11_SAI_Heetch;
	global $A15_SAI_Photo;
	global $A2_SAI_Nom;
	global $A3_SAI_Prenom;
	global $A13_SAI_Photo_du_permis;
	global $A6_SAI_Proprietaire;
	global $A9_SAI_Sans_vehicule;
	global $A8_SAI_Second;
	global $A7_SAI_Titulaire;
	global $A12_SAI_Uber;
	global $A20_TABLE_Membres;
	
	
	if (VersBooleen(Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(39224,Operateur(24868,$A4_SAI_Contact_mobile,getRef('')),Operateur(24868,$A5_SAI_Contact_domicile,getRef(''))),Operateur(24868,$A11_SAI_Heetch,getRef(''))),Operateur(24868,$A15_SAI_Photo,getRef(''))),Operateur(24868,$A2_SAI_Nom,getRef(''))),Operateur(24868,$A3_SAI_Prenom,getRef(''))),Operateur(24868,$A13_SAI_Photo_du_permis,getRef(''))),Operateur(24868,$A3_SAI_Prenom,getRef(''))),Operateur(24868,$A6_SAI_Proprietaire,getRef(''))),Operateur(24868,$A9_SAI_Sans_vehicule,getRef(''))),Operateur(24868,$A8_SAI_Second,getRef(''))),Operateur(24868,$A7_SAI_Titulaire,getRef(''))),Operateur(24868,$A12_SAI_Uber,getRef('')))))
	{
		EcranVersFichier(VersPrimitif('PAGE_inscrption_membres'), VersPrimitif(Fichier('Membres')));
		HAjoute(getRef('Membres'));
		VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_ENVOYER (serveur)',"Table",$A20_TABLE_Membres,getRef('Reexecute'));
		Info(getRef('Vous avez bien été inscrit'));
		if (VersBooleen(Operateur(24866,Rubrique('Utilisateurs','admin'),getRef(false))))
		{
			PageAffiche(VersPrimitif('PAGE_whatapp'));
		}
		else 
		{
			RAZ();
		}
	}
	else 
	{
		Info(getRef('Vous n\'avez rempli tous les champs'));
		return _return ($_PHP_VAR_RETURN_);
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_MODIFIER (serveur) :: (PCode de Clic sur %1!s!)
function& A17_BTN_MODIFIER16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','A17_BTN_MODIFIER');
	global $A20_TABLE_Membres;
	
	
	EcranVersFichier(VersPrimitif('PAGE_inscrption_membres'), VersPrimitif(Fichier('Membres')));
	HModifie(getRef('Membres'));
	VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_MODIFIER (serveur)',"Table",$A20_TABLE_Membres,getRef('Reexecute'));
	Info(getRef('Membres modifier avec succès'));
	RAZ();
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_SUPPRIMER (serveur) :: (PCode de Clic sur %1!s!)
function& A18_BTN_SUPPRIMER16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','A18_BTN_SUPPRIMER');
	global $A20_TABLE_Membres;
	
	
	EcranVersFichier(VersPrimitif('PAGE_Utilisateurs'), VersPrimitif(Fichier('Membres')));
	HSupprime(getRef('Membres'));
	VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_SUPPRIMER (serveur)',"Table",$A20_TABLE_Membres,getRef('Reexecute'));
	Info(getRef('Membres supprimer avec succès'));
	RAZ();
	return _return ($_PHP_VAR_RETURN_);
}
//Sélection d'une ligne de TABLE_Membres (serveur) :: (PCode de Sélection d'une ligne)
function& A20_TABLE_Membres27()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','A20_TABLE_Membres');
	
	
	FichierVersEcran();
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Créer_un_utilisateur (serveur) :: (PCode de Clic sur %1!s!)
function& A19_BTN_Creer_un_utilisateur16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','A19_BTN_Creer_un_utilisateur');
	
	
	PageAffiche(VersPrimitif('PAGE_Utilisateurs'));
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Se_connecter (serveur) :: (PCode de Clic sur %1!s!)
function& A36_BTN_Se_connecter16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','A36_BTN_Se_connecter');
	
	
	PageAffiche(VersPrimitif('PAGE_Connexion'));
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Déconnexion (serveur) :: (PCode de Clic sur %1!s!)
function& A37_BTN_Deconnexion16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','A37_BTN_Deconnexion');
	
	
	PageAffiche(VersPrimitif('PAGE_Connexion'));
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_INSCRPTION_MEMBRES','PAGE_inscrption_membres');
$A20_TABLE_Membres->SetSourceRemplissage("Membres", "IDMembres", "", "", 1, "", 0);

// Code de déclaration des globales de page
function& PAGE_inscrption_membres0_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','PAGE_inscrption_membres');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_inscrption_membres
	PAGE_inscrption_membres0_0();
function& PAGE_inscrption_membres0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_inscrption_membres','PAGE_inscrption_membres');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_inscrption_membres
	PAGE_inscrption_membres0();


$A20_TABLE_Membres->InitRemplissage();

// Code d'initialisation de page
	PAGE_inscrption_membres28();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_INSCRPTION_MEMBRES','PAGE_inscrption_membres');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_INSCRPTION_MEMBRES)){
$_BTNACTION = TrouveBouton( $PAGE_INSCRPTION_MEMBRES );
if ($_BTNACTION=='A16') { 
//-------------------------------------------------------------------
//  PCodes de A16_BTN_ENVOYER
//-------------------------------------------------------------------
	A16_BTN_ENVOYER16();

}
if ($_BTNACTION=='A17') { 
//-------------------------------------------------------------------
//  PCodes de A17_BTN_MODIFIER
//-------------------------------------------------------------------
	A17_BTN_MODIFIER16();

}
if ($_BTNACTION=='A18') { 
//-------------------------------------------------------------------
//  PCodes de A18_BTN_SUPPRIMER
//-------------------------------------------------------------------
	A18_BTN_SUPPRIMER16();

}
if ($_BTNACTION=='A19') { 
//-------------------------------------------------------------------
//  PCodes de A19_BTN_Creer_un_utilisateur
//-------------------------------------------------------------------
	A19_BTN_Creer_un_utilisateur16();

}
if ($_BTNACTION=='A36') { 
//-------------------------------------------------------------------
//  PCodes de A36_BTN_Se_connecter
//-------------------------------------------------------------------
	A36_BTN_Se_connecter16();

}
if ($_BTNACTION=='A37') { 
//-------------------------------------------------------------------
//  PCodes de A37_BTN_Deconnexion
//-------------------------------------------------------------------
	A37_BTN_Deconnexion16();

}

}
if ( !bRenvoitCodeHTML($PAGE_INSCRPTION_MEMBRES,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_inscrption_membres 17/05/2023 03:18 WEBDEV 24 24.0.206.1 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal; color:#1b9174;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}*::-moz-selection{color:#283640;background-color:#D1DCE3;}::selection{color:#283640;background-color:#D1DCE3;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001d59b7de3">
<link rel="stylesheet" type="text/css" href="res/static.css?100027ffa6337">
<link rel="stylesheet" type="text/css" href="Spatiumn230SpatiumnBlueGreeniumn.css?100006a654128">
<link rel="stylesheet" type="text/css" href="MUCP_VTCCI230SpatiumnBlueGreeniumn.css?10000b78ad86f">
<link rel="stylesheet" type="text/css" href="palette-BlueGreeniumn.css?100008c22b6e0">
<link rel="stylesheet" type="text/css" href="PAGE_inscrption_membres_style.css?1000003a841d4">
<style type="text/css">
body{line-height:normal;width:100%;margin:0 auto;width:100%;height:1231px;position:relative; color:#283640;} body{}html,body {background-color:#f0f0f0;position:relative;}#page{position:relative; background-color:#ffffff;min-height:1231px;height:auto !important; height:1231px; min-width:980px;width:auto !important;width:980px;}.l-2{text-align:right;}.l-38{background-color:#FFC040;}#lzA13,#lztzA13{font-family:'Open Sans', Helvetica, Arial, sans-serif;}#A13{font-family:'Open Sans', Helvetica, Arial, sans-serif;text-align:left;}#lzA14,#lztzA14{font-family:'Open Sans', Helvetica, Arial, sans-serif;}#A14{font-family:'Open Sans', Helvetica, Arial, sans-serif;text-align:left;}#lzA15,#lztzA15{font-family:'Open Sans', Helvetica, Arial, sans-serif;}#A15{font-family:'Open Sans', Helvetica, Arial, sans-serif;text-align:left;}
#b-A20{border-style:solid;border-width:1px;border-color:#b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}#lzA20{border-style:solid;border-width:1px;border-color:#b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA21,.ttA21{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA22,.ttA22,#ttA23,.ttA23,#ttA24,.ttA24,#ttA25,.ttA25,#ttA26,.ttA26,#ttA27,.ttA27,#ttA28,.ttA28,#ttA29,.ttA29,#ttA30,.ttA30,#ttA31,.ttA31,#ttA32,.ttA32,#ttA33,.ttA33,#ttA34,.ttA34,#ttA35,.ttA35{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzclzA20{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:none;border-left:solid 1px #b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzdlzA20{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:solid 1px #b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}.communbc-A21{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA21{width:42px;}.communbc-A22{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA22{width:58px;}.communbc-A23{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA23{width:58px;}.communbc-A24{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA24{width:59px;}.communbc-A25{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA25{width:55px;}.communbc-A26{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA26{width:73px;}.communbc-A27{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA27{width:56px;}.communbc-A28{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA28{width:60px;}.communbc-A29{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA29{width:59px;}.communbc-A30{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA30{width:56px;}.communbc-A31{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA31{width:55px;}.communbc-A32{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA32{width:46px;}.communbc-A33{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA33{width:65px;}.communbc-A34{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA34{width:75px;}.communbc-A35{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA35{width:100%;min-width:98px;}.dzM6{width:207px;height:57px;;overflow-x:hidden;;overflow-y:hidden;position:static;}#M2,#tzM2{font-family:'Open Sans', Helvetica, Arial, sans-serif;background-color:#FFFFFF;}.dzM5{width:853px;height:241px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',15,void 0)(event); " onunload="clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',16,'_COM')(event); "><form name="PAGE_INSCRPTION_MEMBRES" enctype="multipart/form-data" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',18,void 0)(event); " method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_INSCRPTION_MEMBRES->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:980px"><tr style="height:100%"><td><table style="width:980px;height:1231px"><tr style="height:1231px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  id="page" class="clearfix pos1"><table style="width:100.00%;height:1231px"><tr style="height:967px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  class="pos2"><div  class="pos3"><table id="M3">
<tr><td style=" height:967px; width:980px;"><div  class="pos4"><div  class="pos5"><div  class="pos6"><div  class="pos7"><div class="lh0 dzSpan dzM6" id="dzM6" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo%20%28Personnalis%C3%A9%29%20%282%29.jpg" alt="" id="M6" class="Image padding" style=" width:207px; height:57px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div><div  class="pos8"><div  class="pos9"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',18,void 0)()){_JSL(_PAGE_,'A19','_self','','');} " id="A19" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;<?php if (($A19_BTN_Creer_un_utilisateur->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>">Créer un utilisateur</button></div></div><div  class="pos10"><div  class="pos11"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',18,void 0)()){_JSL(_PAGE_,'A36','_self','','');} " id="A36" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;<?php if (($A36_BTN_Se_connecter->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>">&nbsp;Se connecter</button></div></div><div  class="pos12"><div  class="pos13"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',18,void 0)()){_JSL(_PAGE_,'A37','_self','','');} " id="A37" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;<?php if (($A37_BTN_Deconnexion->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>">Déconnexion</button></div></div></div><div  class="pos14"><table style=" background-color:#ffc040;" id="M1">
<tr><td style=" height:317px; width:980px; background-color:#ffc040;"><div  class="pos15"><div  class="lh0 pos16"><table style=" width:678px;"><tr><td id="M2" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 2.3125rem;"><strong style="color: rgb(0, 255, 0);">MUTUELLE DE CONDUCTEUR PROFESSIONNEL DE VTC</strong></p></td></tr></table></div></div></td></tr></table></div><div  class="pos17"><div  class="lh0 pos18"><table style=" width:441px;"><tr><td id="A1" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 1.6875rem;">INSCRIPTIONS DES MEMBRES</p></td></tr></table></div></div><div  class="pos19"><div  class="pos20"><div  class="pos21"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA2">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA2">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA2" class="Normal padding webdevclass-riche"><?php echo $A2_SAI_Nom->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA2"><tr><td style="border:none;" id="tzA2" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A2" VALUE="<?php echo $A2_SAI_Nom->GetValeurHTML(); ?>" id="A2" class="SAI A2 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos22"><div  class="pos23"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA9">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA9">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA9" class="Normal padding webdevclass-riche"><?php echo $A9_SAI_Sans_vehicule->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA9"><tr><td style="border:none;" id="tzA9" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A9" VALUE="<?php echo $A9_SAI_Sans_vehicule->GetValeurHTML(); ?>" id="A9" class="SAI A9 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></div><div  class="pos24"><div  class="pos25"><div  class="pos26"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA3">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA3">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA3" class="Normal padding webdevclass-riche"><?php echo $A3_SAI_Prenom->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA3"><tr><td style="border:none;" id="tzA3" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A3" VALUE="<?php echo $A3_SAI_Prenom->GetValeurHTML(); ?>" id="A3" class="SAI A3 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos27"><div  class="pos28"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA10">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA10">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA10" class="Normal padding webdevclass-riche"><?php echo $A10_SAI_Yango->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA10"><tr><td style="border:none;" id="tzA10" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A10" VALUE="<?php echo $A10_SAI_Yango->GetValeurHTML(); ?>" id="A10" class="SAI A10 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></div><div  class="pos29"><div  class="pos30"><div  class="pos31"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA4">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA4">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA4" class="Normal padding webdevclass-riche"><?php echo $A4_SAI_Contact_mobile->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA4"><tr><td style="border:none;" id="tzA4" class="valignmiddle"><INPUT TYPE="text" SIZE="26" NAME="A4" VALUE="<?php echo $A4_SAI_Contact_mobile->GetValeurHTML(); ?>" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999');VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,13}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A4" class="SAI A4 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos32"><div  class="pos33"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA11">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA11">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA11" class="Normal padding webdevclass-riche"><?php echo $A11_SAI_Heetch->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA11"><tr><td style="border:none;" id="tzA11" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A11" VALUE="<?php echo $A11_SAI_Heetch->GetValeurHTML(); ?>" id="A11" class="SAI A11 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></div><div  class="pos34"><div  class="pos35"><div  class="pos36"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA5">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA5">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA5" class="Normal padding webdevclass-riche"><?php echo $A5_SAI_Contact_domicile->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA5"><tr><td style="border:none;" id="tzA5" class="valignmiddle"><INPUT TYPE="text" SIZE="26" NAME="A5" VALUE="<?php echo $A5_SAI_Contact_domicile->GetValeurHTML(); ?>" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999');VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,13}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A5" class="SAI A5 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos37"><div  class="pos38"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA12">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA12">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA12" class="Normal padding webdevclass-riche"><?php echo $A12_SAI_Uber->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA12"><tr><td style="border:none;" id="tzA12" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A12" VALUE="<?php echo $A12_SAI_Uber->GetValeurHTML(); ?>" id="A12" class="SAI A12 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></div><div  class="pos39"><div  class="pos40"><div  class="pos41"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA6">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA6">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA6" class="Normal padding webdevclass-riche"><?php echo $A6_SAI_Proprietaire->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA6"><tr><td style="border:none;" id="tzA6" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A6" VALUE="<?php echo $A6_SAI_Proprietaire->GetValeurHTML(); ?>" id="A6" class="SAI A6 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos42"><div  class="pos43"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA13">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA13">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA13" class="Normal padding webdevclass-riche"><?php echo $A13_SAI_Photo_du_permis->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:345px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA13"><tr><td style="border:none;" id="tzA13" class="valignmiddle"><INPUT TYPE="file" SIZE="34" MAXLENGTH="50" NAME="A13" VALUE="<?php echo $A13_SAI_Photo_du_permis->GetValeurHTML(); ?>" id="A13" class="SAI A13 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></div><div  class="pos44"><div  class="pos45"><div  class="pos46"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA7">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA7">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA7" class="Normal padding webdevclass-riche"><?php echo $A7_SAI_Titulaire->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA7"><tr><td style="border:none;" id="tzA7" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A7" VALUE="<?php echo $A7_SAI_Titulaire->GetValeurHTML(); ?>" id="A7" class="SAI A7 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos47"><div  class="pos48"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA14">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA14">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA14" class="Normal padding webdevclass-riche"><?php echo $A14_SAI_Piece_identite->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:345px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA14"><tr><td style="border:none;" id="tzA14" class="valignmiddle"><INPUT TYPE="file" SIZE="34" MAXLENGTH="50" NAME="A14" VALUE="<?php echo $A14_SAI_Piece_identite->GetValeurHTML(); ?>" id="A14" class="SAI A14 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></div><div  class="pos49"><div  class="pos50"><div  class="pos51"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA8">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA8">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA8" class="Normal padding webdevclass-riche"><?php echo $A8_SAI_Second->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:269px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA8"><tr><td style="border:none;" id="tzA8" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A8" VALUE="<?php echo $A8_SAI_Second->GetValeurHTML(); ?>" id="A8" class="SAI A8 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos52"><div  class="pos53"><TABLE style=" width:440px;border-collapse:separate;">
<TR><TD style=" width:440px;"><table id="czA15">
<tr><td style=" height:21px; width:440px;"><ul style=" width:440px;" class="wbLibChamp wbLibChampA15">
<li style=" height:21px;"><table style=" width:440px;height:21px;"><tr><td id="lzA15" class="Normal padding webdevclass-riche"><?php echo $A15_SAI_Photo->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:345px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA15"><tr><td style="border:none;" id="tzA15" class="valignmiddle"><INPUT TYPE="file" SIZE="34" MAXLENGTH="50" NAME="A15" VALUE="<?php echo $A15_SAI_Photo->GetValeurHTML(); ?>" id="A15" class="SAI A15 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div></div><div  class="pos54"><div  class="pos55"><div  class="pos56"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',18,void 0)()){_JSL(_PAGE_,'A16','_self','','');} " id="A16" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;">ENVOYER</button></div></div><div  class="pos57"><div  class="pos58"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',18,void 0)()){_JSL(_PAGE_,'A17','_self','','');} " id="A17" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;<?php if (($A17_BTN_MODIFIER->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>">MODIFIER</button></div></div><div  class="pos59"><div  class="pos60"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INSCRPTION_MEMBRES',18,void 0)()){_JSL(_PAGE_,'A18','_self','','');} " id="A18" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;<?php if (($A18_BTN_SUPPRIMER->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>">SUPPRIMER</button></div></div></div><div  class="pos61"><div  class="pos62"><input type=hidden name="A20" value="<?php echo $A20_TABLE_Membres->Valeur ?>"><input type=hidden name="A20_DEB" value="<?php echo $A20_TABLE_Membres->GetFirstIndex()+1 ?>"><input type=hidden name="_A20_OCC" value="<?php echo $A20_TABLE_Membres->GetNbEnregAffiche() ?>"><INPUT TYPE="hidden" SIZE="1" NAME="A20_FORMAT_0" VALUE="" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999 999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,25}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A20_FORMAT_0" class="A20_FORMAT_0 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" SIZE="1" NAME="A20_FORMAT_3" VALUE="" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,13}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A20_FORMAT_3" class="A20_FORMAT_3 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" SIZE="1" NAME="A20_FORMAT_4" VALUE="" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,13}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A20_FORMAT_4" class="A20_FORMAT_4 wbgrise padding" DISABLED autocomplete="off"><table id="ctzA20" style="border-spacing:0; width:962px;;<?php if (($A20_TABLE_Membres->Visible)==0) {
 ?>border-collapse:separate;<?php if (($A20_TABLE_Membres->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?><?php 
 } ?>" class="cellpadding0">
 <tr><td colspan=1  style="height:17px;" id="lzA20" class="aligncenter Normal-Centre padding"><?php echo $A20_TABLE_Membres->Libelle; ?></td><td></td></tr><tr style="border:0;height:0;" id="ttA20"><td id="tzclzA20" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;position:relative;width:962px;"><table id="A20_TITRES_POS" style="border-spacing:0; width:100%;<?php if (($A20_TABLE_Membres->Visible)==0) {
 ?>border-collapse:separate;<?php 
 } ?>"><tr id="A20_TITRES"><td id="ttA21" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A21_COL_IDMembres->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA21"><div id="A20_TITRES_0" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA21"><?php echo $A21_COL_IDMembres->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_0" onclick="oGetObjetChamp('A20').OnTriColonne(0,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_0" alt=""></div></td><td style="<?php if (($A21_COL_IDMembres->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,0,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA22" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A22_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA22"><div id="A20_TITRES_1" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA22"><?php echo $A22_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_1" onclick="oGetObjetChamp('A20').OnTriColonne(1,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_1" alt=""></div></td><td style="<?php if (($A22_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,1,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA23" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A23_COL_Prenom->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA23"><div id="A20_TITRES_2" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA23"><?php echo $A23_COL_Prenom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_2" onclick="oGetObjetChamp('A20').OnTriColonne(2,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_2" alt=""></div></td><td style="<?php if (($A23_COL_Prenom->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,2,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA24" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A24_COL_Contact_mobile->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA24"><div id="A20_TITRES_3" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA24"><?php echo $A24_COL_Contact_mobile->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_3" onclick="oGetObjetChamp('A20').OnTriColonne(3,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_3" alt=""></div></td><td style="<?php if (($A24_COL_Contact_mobile->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,3,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA25" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A25_COL_Contact_domicile->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA25"><div id="A20_TITRES_4" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA25"><?php echo $A25_COL_Contact_domicile->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_4" onclick="oGetObjetChamp('A20').OnTriColonne(4,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_4" alt=""></div></td><td style="<?php if (($A25_COL_Contact_domicile->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,4,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA26" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A26_COL_Proprietaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA26"><div id="A20_TITRES_5" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA26"><?php echo $A26_COL_Proprietaire->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_5" onclick="oGetObjetChamp('A20').OnTriColonne(5,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_5" alt=""></div></td><td style="<?php if (($A26_COL_Proprietaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,5,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA27" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A27_COL_Titulaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA27"><div id="A20_TITRES_6" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA27"><?php echo $A27_COL_Titulaire->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_6" onclick="oGetObjetChamp('A20').OnTriColonne(6,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_6" alt=""></div></td><td style="<?php if (($A27_COL_Titulaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,6,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA28" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A28_COL_Second->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA28"><div id="A20_TITRES_7" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA28"><?php echo $A28_COL_Second->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_7" onclick="oGetObjetChamp('A20').OnTriColonne(7,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_7" alt=""></div></td><td style="<?php if (($A28_COL_Second->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,7,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA29" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A29_COL_Sans_vehicule->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA29"><div id="A20_TITRES_8" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA29"><?php echo $A29_COL_Sans_vehicule->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_8" onclick="oGetObjetChamp('A20').OnTriColonne(8,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_8" alt=""></div></td><td style="<?php if (($A29_COL_Sans_vehicule->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,8,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA30" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A30_COL_Yango->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA30"><div id="A20_TITRES_9" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA30"><?php echo $A30_COL_Yango->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_9" onclick="oGetObjetChamp('A20').OnTriColonne(9,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_9" alt=""></div></td><td style="<?php if (($A30_COL_Yango->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,9,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA31" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A31_COL_Heetch->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA31"><div id="A20_TITRES_10" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA31"><?php echo $A31_COL_Heetch->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_10" onclick="oGetObjetChamp('A20').OnTriColonne(10,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_10" alt=""></div></td><td style="<?php if (($A31_COL_Heetch->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,10,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA32" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A32_COL_Uber->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA32"><div id="A20_TITRES_11" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA32"><?php echo $A32_COL_Uber->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_11" onclick="oGetObjetChamp('A20').OnTriColonne(11,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_11" alt=""></div></td><td style="<?php if (($A32_COL_Uber->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,11,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA33" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A33_COL_Photo_du_permis->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA33"><div id="A20_TITRES_12" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA33"><?php echo $A33_COL_Photo_du_permis->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_12" onclick="oGetObjetChamp('A20').OnTriColonne(12,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_12" alt=""></div></td><td style="<?php if (($A33_COL_Photo_du_permis->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,12,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA34" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A34_COL_Piece_identite->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA34"><div id="A20_TITRES_13" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA34"><?php echo $A34_COL_Piece_identite->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_13" onclick="oGetObjetChamp('A20').OnTriColonne(13,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_13" alt=""></div></td><td style="<?php if (($A34_COL_Piece_identite->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,13,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td><td id="ttA35" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A35_COL_Photo->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA35"><div id="A20_TITRES_14" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:119px;" class="Titre-Colonne ttA35"><?php echo $A35_COL_Photo->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A20_TITRES_TRI_14" onclick="oGetObjetChamp('A20').OnTriColonne(14,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A20_TITRES_RECH_14" alt=""></div></td><td style="<?php if (($A35_COL_Photo->Visible)==0) {
 ?>display:none;<?php 
 } ?>border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A20').OnRedimCol(event,14,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:128px"><!-- --></div></td></tr>
<tr style="border:0;height:0;"><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A21_COL_IDMembres->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA21"></td><td style="<?php if (($A21_COL_IDMembres->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A22_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA22"></td><td style="<?php if (($A22_COL_Nom->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A23_COL_Prenom->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA23"></td><td style="<?php if (($A23_COL_Prenom->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A24_COL_Contact_mobile->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA24"></td><td style="<?php if (($A24_COL_Contact_mobile->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A25_COL_Contact_domicile->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA25"></td><td style="<?php if (($A25_COL_Contact_domicile->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A26_COL_Proprietaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA26"></td><td style="<?php if (($A26_COL_Proprietaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A27_COL_Titulaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA27"></td><td style="<?php if (($A27_COL_Titulaire->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A28_COL_Second->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA28"></td><td style="<?php if (($A28_COL_Second->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A29_COL_Sans_vehicule->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA29"></td><td style="<?php if (($A29_COL_Sans_vehicule->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A30_COL_Yango->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA30"></td><td style="<?php if (($A30_COL_Yango->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A31_COL_Heetch->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA31"></td><td style="<?php if (($A31_COL_Heetch->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A32_COL_Uber->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA32"></td><td style="<?php if (($A32_COL_Uber->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A33_COL_Photo_du_permis->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA33"></td><td style="<?php if (($A33_COL_Photo_du_permis->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A34_COL_Piece_identite->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA34"></td><td style="<?php if (($A34_COL_Piece_identite->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A35_COL_Photo->Visible)==0) {
 ?>display:none;<?php 
 } ?>" class="wbcolA35"></td><td style="<?php if (($A35_COL_Photo->Visible)==0) {
 ?>display:none;<?php 
 } ?>border:0;" class="wbtablesep Titre-Colonne"></td></tr></table></div></td><td></td></tr>
<tr><td id="tzdlzA20" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;width:962px;position:relative;z-index:1"><table id="A20_TB" style=" width:100%;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0;height:0;\" id=\"ttA20\">",contenu :  [ "<td id=\"ttA21\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A21_COL_IDMembres->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA21\"><div id=\"A20_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA21\"><?php echo $A21_COL_IDMembres->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_0\" onclick=\"oGetObjetChamp('A20').OnTriColonne(0,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_0\" alt=\"\"></div></td><td style=\"<?php if (($A21_COL_IDMembres->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA22\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A22_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA22\"><div id=\"A20_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA22\"><?php echo $A22_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_1\" onclick=\"oGetObjetChamp('A20').OnTriColonne(1,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_1\" alt=\"\"></div></td><td style=\"<?php if (($A22_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA23\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A23_COL_Prenom->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA23\"><div id=\"A20_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA23\"><?php echo $A23_COL_Prenom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_2\" onclick=\"oGetObjetChamp('A20').OnTriColonne(2,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_2\" alt=\"\"></div></td><td style=\"<?php if (($A23_COL_Prenom->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA24\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A24_COL_Contact_mobile->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA24\"><div id=\"A20_TITRES_3\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA24\"><?php echo $A24_COL_Contact_mobile->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_3\" onclick=\"oGetObjetChamp('A20').OnTriColonne(3,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_3\" alt=\"\"></div></td><td style=\"<?php if (($A24_COL_Contact_mobile->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,3,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA25\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A25_COL_Contact_domicile->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA25\"><div id=\"A20_TITRES_4\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA25\"><?php echo $A25_COL_Contact_domicile->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_4\" onclick=\"oGetObjetChamp('A20').OnTriColonne(4,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_4\" alt=\"\"></div></td><td style=\"<?php if (($A25_COL_Contact_domicile->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,4,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA26\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A26_COL_Proprietaire->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA26\"><div id=\"A20_TITRES_5\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA26\"><?php echo $A26_COL_Proprietaire->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_5\" onclick=\"oGetObjetChamp('A20').OnTriColonne(5,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_5\" alt=\"\"></div></td><td style=\"<?php if (($A26_COL_Proprietaire->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,5,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA27\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A27_COL_Titulaire->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA27\"><div id=\"A20_TITRES_6\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA27\"><?php echo $A27_COL_Titulaire->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_6\" onclick=\"oGetObjetChamp('A20').OnTriColonne(6,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_6\" alt=\"\"></div></td><td style=\"<?php if (($A27_COL_Titulaire->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,6,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA28\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A28_COL_Second->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA28\"><div id=\"A20_TITRES_7\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA28\"><?php echo $A28_COL_Second->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_7\" onclick=\"oGetObjetChamp('A20').OnTriColonne(7,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_7\" alt=\"\"></div></td><td style=\"<?php if (($A28_COL_Second->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,7,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA29\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A29_COL_Sans_vehicule->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA29\"><div id=\"A20_TITRES_8\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA29\"><?php echo $A29_COL_Sans_vehicule->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_8\" onclick=\"oGetObjetChamp('A20').OnTriColonne(8,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_8\" alt=\"\"></div></td><td style=\"<?php if (($A29_COL_Sans_vehicule->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,8,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA30\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A30_COL_Yango->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA30\"><div id=\"A20_TITRES_9\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA30\"><?php echo $A30_COL_Yango->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_9\" onclick=\"oGetObjetChamp('A20').OnTriColonne(9,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_9\" alt=\"\"></div></td><td style=\"<?php if (($A30_COL_Yango->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,9,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA31\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A31_COL_Heetch->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA31\"><div id=\"A20_TITRES_10\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA31\"><?php echo $A31_COL_Heetch->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_10\" onclick=\"oGetObjetChamp('A20').OnTriColonne(10,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_10\" alt=\"\"></div></td><td style=\"<?php if (($A31_COL_Heetch->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,10,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA32\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A32_COL_Uber->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA32\"><div id=\"A20_TITRES_11\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA32\"><?php echo $A32_COL_Uber->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_11\" onclick=\"oGetObjetChamp('A20').OnTriColonne(11,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_11\" alt=\"\"></div></td><td style=\"<?php if (($A32_COL_Uber->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,11,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA33\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A33_COL_Photo_du_permis->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA33\"><div id=\"A20_TITRES_12\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA33\"><?php echo $A33_COL_Photo_du_permis->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_12\" onclick=\"oGetObjetChamp('A20').OnTriColonne(12,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_12\" alt=\"\"></div></td><td style=\"<?php if (($A33_COL_Photo_du_permis->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,12,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA34\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A34_COL_Piece_identite->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA34\"><div id=\"A20_TITRES_13\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA34\"><?php echo $A34_COL_Piece_identite->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_13\" onclick=\"oGetObjetChamp('A20').OnTriColonne(13,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_13\" alt=\"\"></div></td><td style=\"<?php if (($A34_COL_Piece_identite->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,13,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>" , "<td id=\"ttA35\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;<?php if (($A35_COL_Photo->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA35\"><div id=\"A20_TITRES_14\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:119px;\" class=\"Titre-Colonne ttA35\"><?php echo $A35_COL_Photo->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A20_TITRES_TRI_14\" onclick=\"oGetObjetChamp('A20').OnTriColonne(14,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A20_TITRES_RECH_14\" alt=\"\"></div></td><td style=\"<?php if (($A35_COL_Photo->Visible)==0) { ?>display:none;<?php  } ?>border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,14,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:128px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0;height:0;\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A21_COL_IDMembres->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA21\"></td><td style=\"<?php if (($A21_COL_IDMembres->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A22_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA22\"></td><td style=\"<?php if (($A22_COL_Nom->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A23_COL_Prenom->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA23\"></td><td style=\"<?php if (($A23_COL_Prenom->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A24_COL_Contact_mobile->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA24\"></td><td style=\"<?php if (($A24_COL_Contact_mobile->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A25_COL_Contact_domicile->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA25\"></td><td style=\"<?php if (($A25_COL_Contact_domicile->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A26_COL_Proprietaire->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA26\"></td><td style=\"<?php if (($A26_COL_Proprietaire->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A27_COL_Titulaire->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA27\"></td><td style=\"<?php if (($A27_COL_Titulaire->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A28_COL_Second->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA28\"></td><td style=\"<?php if (($A28_COL_Second->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A29_COL_Sans_vehicule->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA29\"></td><td style=\"<?php if (($A29_COL_Sans_vehicule->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A30_COL_Yango->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA30\"></td><td style=\"<?php if (($A30_COL_Yango->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A31_COL_Heetch->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA31\"></td><td style=\"<?php if (($A31_COL_Heetch->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A32_COL_Uber->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA32\"></td><td style=\"<?php if (($A32_COL_Uber->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A33_COL_Photo_du_permis->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA33\"></td><td style=\"<?php if (($A33_COL_Photo_du_permis->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A34_COL_Piece_identite->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA34\"></td><td style=\"<?php if (($A34_COL_Piece_identite->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;<?php if (($A35_COL_Photo->Visible)==0) { ?>display:none;<?php  } ?>\" class=\"wbcolA35\"></td><td style=\"<?php if (($A35_COL_Photo->Visible)==0) { ?>display:none;<?php  } ?>border:0;\" class=\"wbtablesep Titre-Colonne\"></td>", ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Impaires padding\" id=\"A20_[%_INDICE_%]\" style=\"visibility:hidden;height:23px\">",contenu :  [ "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A21\" class=\"alignright l-2 wbcolA21 communbc-A21 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA21\"><div id=\"A20_[%_INDICE_%]_0\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A22\" class=\"TXT-Normal wbcolA22 communbc-A22 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA22\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_1\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A23\" class=\"TXT-Normal wbcolA23 communbc-A23 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA23\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_2\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],3,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A24\" class=\"alignright TXT-Normal wbcolA24 communbc-A24 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA24\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_3\" style=\"padding-right:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,3,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],4,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A25\" class=\"alignright TXT-Normal wbcolA25 communbc-A25 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA25\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_4\" style=\"padding-right:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,4,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],5,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A26\" class=\"TXT-Normal wbcolA26 communbc-A26 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA26\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_5\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,5,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],6,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A27\" class=\"TXT-Normal wbcolA27 communbc-A27 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA27\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_6\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,6,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],7,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A28\" class=\"TXT-Normal wbcolA28 communbc-A28 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA28\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_7\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,7,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],8,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A29\" class=\"TXT-Normal wbcolA29 communbc-A29 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA29\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_8\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,8,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],9,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A30\" class=\"TXT-Normal wbcolA30 communbc-A30 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA30\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_9\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,9,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],10,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A31\" class=\"TXT-Normal wbcolA31 communbc-A31 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA31\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_10\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,10,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],11,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A32\" class=\"TXT-Normal wbcolA32 communbc-A32 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA32\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_11\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,11,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],12,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A33\" class=\"TXT-Normal wbcolA33 communbc-A33 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA33\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_12\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,12,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],13,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A34\" class=\"TXT-Normal wbcolA34 communbc-A34 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA34\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_13\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,13,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A20').OnSelectLigne([%_INDICE_%],14,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A35\" class=\"TXT-Normal wbcolA35 communbc-A35 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA35\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A20_[%_INDICE_%]_14\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A20').OnRedimCol(event,14,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #b2b2b2;height:100%;visibility:hidden;z-index:100" id="A20_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/Timer230%20Spatiumn.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A20_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td></tr>
</table></div></div></div></td></tr></table></div></div></div></td></tr><tr style="height:264px"><td class="ancragecenter" style="width:100.00%"><table style="margin:0 auto;;width:980px;height:264px"><tr style="height:264px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><table style=" background-color:#2c3c46;" id="M4">
<tr><td style=" height:264px; width:980px;"><div  class="pos63"><div  class="pos64"><div class="lh0 dzSpan dzM5" id="dzM5" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo.jpg" alt="" id="M5" class="Image padding" style=" width:853px; height:241px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div></td></tr></table></div></td></tr></table></td></tr></table></div></div></td></tr></table></td></tr></table><?php function construireTexteRiche_A35_COL_Photo($j){ global $A35_COL_Photo,$A35_COL_Photo,$A20_TABLE_Membres;$s="photo";return $s;}function construireTexteRiche_A34_COL_Piece_identite($j){ global $A34_COL_Piece_identite,$A34_COL_Piece_identite,$A20_TABLE_Membres;$s="pièce identité";return $s;}function construireTexteRiche_A33_COL_Photo_du_permis($j){ global $A33_COL_Photo_du_permis,$A33_COL_Photo_du_permis,$A20_TABLE_Membres;$s="photo du permis";return $s;}function construireTexteRiche_A32_COL_Uber($j){ global $A32_COL_Uber,$A32_COL_Uber,$A20_TABLE_Membres;$s="Avez vous un compte Uber?";return $s;}function construireTexteRiche_A31_COL_Heetch($j){ global $A31_COL_Heetch,$A31_COL_Heetch,$A20_TABLE_Membres;$s="Avez vous un compte heetch ?";return $s;}function construireTexteRiche_A30_COL_Yango($j){ global $A30_COL_Yango,$A30_COL_Yango,$A20_TABLE_Membres;$s="Avez vous un compte yango ?";return $s;}function construireTexteRiche_A29_COL_Sans_vehicule($j){ global $A29_COL_Sans_vehicule,$A29_COL_Sans_vehicule,$A20_TABLE_Membres;$s="Êtes vous sans véhicule ?";return $s;}function construireTexteRiche_A28_COL_Second($j){ global $A28_COL_Second,$A28_COL_Second,$A20_TABLE_Membres;$s="Êtes vous Second ?";return $s;}function construireTexteRiche_A27_COL_Titulaire($j){ global $A27_COL_Titulaire,$A27_COL_Titulaire,$A20_TABLE_Membres;$s="Êtes vous titulaire ?";return $s;}function construireTexteRiche_A26_COL_Proprietaire($j){ global $A26_COL_Proprietaire,$A26_COL_Proprietaire,$A20_TABLE_Membres;$s="Êtes vous Propriétaire ?";return $s;}function construireTexteRiche_A25_COL_Contact_domicile($j){ global $A25_COL_Contact_domicile,$A25_COL_Contact_domicile,$A20_TABLE_Membres;$s="Contact domicile";return $s;}function construireTexteRiche_A24_COL_Contact_mobile($j){ global $A24_COL_Contact_mobile,$A24_COL_Contact_mobile,$A20_TABLE_Membres;$s="Contact mobile";return $s;}function construireTexteRiche_A23_COL_Prenom($j){ global $A23_COL_Prenom,$A23_COL_Prenom,$A20_TABLE_Membres;$s="Prénom";return $s;}function construireTexteRiche_A22_COL_Nom($j){ global $A22_COL_Nom,$A22_COL_Nom,$A20_TABLE_Membres;$s="Nom";return $s;}function construireTexteRiche_A21_COL_IDMembres($j){ global $A21_COL_IDMembres,$A21_COL_IDMembres,$A20_TABLE_Membres;$s="Id";return $s;}function construireTexteRiche_A15_SAI_Photo(){ global $A15_SAI_Photo,$A15_SAI_Photo;$s="photo";return $s;}function construireTexteRiche_A8_SAI_Second(){ global $A8_SAI_Second,$A8_SAI_Second;$s="Êtes vous Second ?";return $s;}function construireTexteRiche_A14_SAI_Piece_identite(){ global $A14_SAI_Piece_identite,$A14_SAI_Piece_identite;$s="pièce identité";return $s;}function construireTexteRiche_A7_SAI_Titulaire(){ global $A7_SAI_Titulaire,$A7_SAI_Titulaire;$s="Êtes vous titulaire ?";return $s;}function construireTexteRiche_A13_SAI_Photo_du_permis(){ global $A13_SAI_Photo_du_permis,$A13_SAI_Photo_du_permis;$s="photo du permis";return $s;}function construireTexteRiche_A6_SAI_Proprietaire(){ global $A6_SAI_Proprietaire,$A6_SAI_Proprietaire;$s="Êtes vous Propriétaire ?";return $s;}function construireTexteRiche_A12_SAI_Uber(){ global $A12_SAI_Uber,$A12_SAI_Uber;$s="Avez vous un compte Uber?";return $s;}function construireTexteRiche_A5_SAI_Contact_domicile(){ global $A5_SAI_Contact_domicile,$A5_SAI_Contact_domicile;$s="Contact domicile";return $s;}function construireTexteRiche_A11_SAI_Heetch(){ global $A11_SAI_Heetch,$A11_SAI_Heetch;$s="Avez vous un compte heetch ?";return $s;}function construireTexteRiche_A4_SAI_Contact_mobile(){ global $A4_SAI_Contact_mobile,$A4_SAI_Contact_mobile;$s="Contact mobile";return $s;}function construireTexteRiche_A10_SAI_Yango(){ global $A10_SAI_Yango,$A10_SAI_Yango;$s="Avez vous un compte yango ?";return $s;}function construireTexteRiche_A3_SAI_Prenom(){ global $A3_SAI_Prenom,$A3_SAI_Prenom;$s="Prénom";return $s;}function construireTexteRiche_A9_SAI_Sans_vehicule(){ global $A9_SAI_Sans_vehicule,$A9_SAI_Sans_vehicule;$s="Êtes vous sans véhicule ?";return $s;}function construireTexteRiche_A2_SAI_Nom(){ global $A2_SAI_Nom,$A2_SAI_Nom;$s="Nom";return $s;} ?>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?3fffe8f3e2d2f"></script>
<script type="text/javascript" src="./res/WDUtil.js?3ffff9b98d7a2"></script>
<script type="text/javascript" src="./res/StdAction.js?30000c29f1e24"></script>
<script type="text/javascript" src="./res/WDChamp.js?30001e5c14185"></script>
<script type="text/javascript" src="./res/WDXML.js?30003326b94c5"></script>
<script type="text/javascript" src="./res/WDDrag.js?300069b98d7a2"></script>
<script type="text/javascript" src="./res/WDAJAX.js?3000b9b98d7a2"></script>
<script type="text/javascript" src="./res/WDTableZRCommun.js?3000c99a3caf7"></script>
<script type="text/javascript" src="./res/WDTable.js?3000de5c14185"></script>
<script type="text/javascript" src="./res/WD.js?30028d23c8a89"></script>
<script type="text/javascript">
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/MUCP_VTCCI_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _WW_SEPMILLIER_="<?php echo ($_gszSEPMIL) ?>";
var _WW_SEPDECIMAL_="<?php echo ($_gszSEPDEC) ?>";
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PU_="index.php";
var _PAGE_=document["PAGE_INSCRPTION_MEMBRES"];
clWDUtil.DeclareChamp("A20",void 0,void 0,void 0,WDTable,["<?php echo $A20_TABLE_Membres->pszGetAjaxInitInline(); ?>",1,23,2,4,1,["Lignes-Impaires wbImpaire","Lignes-Impaires wbPaire","Selection"],[["res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png","res/TABLE_Sorting_Increasing230_SpatiumnBlueGreeniumn.png","res/TABLE_Sorting_Decreasing230_SpatiumnBlueGreeniumn.png"],["res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png","res/TABLE_Search_Hover230_SpatiumnBlueGreeniumn.png","res/TABLE_Search_Active230_SpatiumnBlueGreeniumn.png"],["res/TABLE_Filter_Normal230_SpatiumnBlueGreeniumn.png","res/TABLE_Filter_Hover230_SpatiumnBlueGreeniumn.png","res/TABLE_Filter_Active230_SpatiumnBlueGreeniumn.png"],["./res/TableDeplaceDroite.png","./res/TableDeplaceGauche.png"]],true],true,true);
<!--
var _COL={0:"#ffffff",5:"#d1dce3",9:"#ffc3b9",10:"#283640",15:"#283640",16:"#b2b2b2",21:"#d1d1d1",66:"#ca232a"};
function _GET_A21_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A21_1_I_C(){return arguments[0];}
function _GET_A24_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A24_1_I_C(){return arguments[0];}
function _GET_A25_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A25_1_I_C(){return arguments[0];}
clWDUtil.DeclareTraitementEx("PAGE_INSCRPTION_MEMBRES",true,[15,function(event){clWDUtil.pfGetTraitement("PAGE_INSCRPTION_MEMBRES",15,"_COM")(event);if(false===clWDUtil.pfGetTraitement("PAGE_INSCRPTION_MEMBRES",15,"_0")(event)){return;};var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,1);{}},void 0,true,15,function(event){var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,1);{}},"_0",true,18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_INSCRPTION_MEMBRES",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript">function chfocus(){window.focus();if(_PAGE_["A2"]!=null)try{_PAGE_["A2"].focus();}catch(e){}}</script>
<script type="text/javascript"><!--if (navigator.appName == "Microsoft Internet Explorer") {allInps = _PAGE_.all.tags("INPUT");for (i=0;i<allInps.length;i++) {tempInp = allInps(i);if(tempInp.type.toUpperCase()=="FILE") {if((tempInp.offsetWidth>tempInp.style.pixelWidth)&&(tempInp.style.pixelWidth>0)){widthDiff = tempInp.offsetWidth-tempInp.style.pixelWidth;tempInp.style.pixelWidth-=widthDiff;}}}}//--></script><script type="text/javascript">var bPCSFR=true;</script><script type="text/javascript" charset="windows-1252" src="res/WDLIB.JS?20007c9381558"></script><script type="text/javascript" src="res/jquery-3.js?20000cd554760"></script><script type="text/javascript" src="res/jquery-ui.js?2000680761b69"></script><script type="text/javascript" src="res/jquery-effet.js?200044659718a"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200058ec00af2"></script><style type="text/css">.wbTooltip{font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:9pt;color:#FFFFFF;text-align:left;vertical-align:middle;background-color:#1B9174;border-radius:2px;padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ 	items: "[title]", position : {my: 'left top+20',collision: 'flip'},	track : true, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">if (bOpr) document.getElementsByTagName("head")[0].innerHTML+='\x3cstyle type="text/css"\x3e.wbtablesep{position:static !important;}\x3c/style\x3e';</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_24=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_24); ?>