<?php
//#24.0.156.0 MUCP_VTCCI
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='MUCP_VTCCI	PAGE_UTILISATEURS	20230517032416';
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
IHM_Include('CCombo');
IHM_Include('CImage');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('WL/HF/HF.php');
WB_Include('HF.php');
WB_Include('WL/PAGE/Page.php');
WB_Include('IHM/Champ/Liste/Table/Table.php');
WB_Include('Engine.php');
// Equivalent de [%URL()%]
$gszURL='Utilisateurs.php';
$j=1;$i=1;
session_start();
// protection contre register_globals = on
unset($PAGE_UTILISATEURS);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(1,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gtabCheminPage['PAGE_WHATAPP']=array(5=>array('NOM'=>'whatapp','URL'=>'./'));
$gszCheminPageInverse='./';
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
RechargementPageSiBesoin('PAGE_UTILISATEURS');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_UTILISATEURS']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_UTILISATEURS= $gTabVarSession['PAGE_UTILISATEURS'];
	$PAGE_UTILISATEURS->WB_RestaureContexte();
$MaPage = &$PAGE_UTILISATEURS;
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_UTILISATEURS)) {
$PAGE_UTILISATEURS= new CPage(false);
$PAGE_UTILISATEURS->Nom = 'PAGE_Utilisateurs';
$PAGE_UTILISATEURS->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_UTILISATEURS->Alias = 'PAGE_UTILISATEURS';
$PAGE_UTILISATEURS->m_sNomPHP = 'PAGE_UTILISATEURS';
$PAGE_UTILISATEURS->Libelle = 'Utilisateurs';
$PAGE_UTILISATEURS->bUTF8 = true;
$PAGE_UTILISATEURS->bHTML5 = true;
$PAGE_UTILISATEURS->bAvecContexte = true;
$PAGE_UTILISATEURS->sFichierPalette = '.\\res\\BlueGreeniumn.wpc';
$PAGE_UTILISATEURS->Plan = 1;
$PAGE_UTILISATEURS->ImageFond = '';
$MaPage = &$PAGE_UTILISATEURS;
$A1_SAI_Nom=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('SAI_Nom','A1',$A1_SAI_Nom,'A1_SAI_Nom');
$A1_SAI_Nom->SetATTMISEABLANC(true);
$A1_SAI_Nom->SetChampFormate(false);
$A1_SAI_Nom->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A1_SAI_Nom->m_eBarreOutilsMode = 0;
$A1_SAI_Nom->m_bLibelleRiche=true;

$A2_SAI_Prenom=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('SAI_Prenom','A2',$A2_SAI_Prenom,'A2_SAI_Prenom');
$A2_SAI_Prenom->SetATTMISEABLANC(true);
$A2_SAI_Prenom->SetChampFormate(false);
$A2_SAI_Prenom->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A2_SAI_Prenom->m_eBarreOutilsMode = 0;
$A2_SAI_Prenom->m_bLibelleRiche=true;

$A3_SAI_Contact_mobile=&CreerChamp('CSaisieNumerique');$PAGE_UTILISATEURS->WB_AjouteChamp('SAI_Contact_mobile','A3',$A3_SAI_Contact_mobile,'A3_SAI_Contact_mobile');
$A3_SAI_Contact_mobile->SetATTMISEABLANC(true);
$A3_SAI_Contact_mobile->SetChampFormate(false);
$A3_SAI_Contact_mobile->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A3_SAI_Contact_mobile->m_eBarreOutilsMode = 0;
$A3_SAI_Contact_mobile->m_bLibelleRiche=true;

$A4_SAI_Poste=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('SAI_Poste','A4',$A4_SAI_Poste,'A4_SAI_Poste');
$A4_SAI_Poste->SetATTMISEABLANC(true);
$A4_SAI_Poste->SetChampFormate(false);
$A4_SAI_Poste->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A4_SAI_Poste->m_eBarreOutilsMode = 0;
$A4_SAI_Poste->m_bLibelleRiche=true;

$A5_SAI_Email=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('SAI_Email','A5',$A5_SAI_Email,'A5_SAI_Email');
$A5_SAI_Email->SetATTMISEABLANC(true);
$A5_SAI_Email->SetChampFormate(false);
$A5_SAI_Email->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A5_SAI_Email->m_eBarreOutilsMode = 0;
$A5_SAI_Email->m_bLibelleRiche=true;

$A6_SAI_Mdp=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('SAI_Mdp','A6',$A6_SAI_Mdp,'A6_SAI_Mdp');
$A6_SAI_Mdp->SetATTMISEABLANC(true);
$A6_SAI_Mdp->SetChampFormate(false);
$A6_SAI_Mdp->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A6_SAI_Mdp->m_eBarreOutilsMode = 0;
$A6_SAI_Mdp->m_bLibelleRiche=true;

$A7_SAI_Confirmer_mdp=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('SAI_Confirmer_mdp','A7',$A7_SAI_Confirmer_mdp,'A7_SAI_Confirmer_mdp');
$A7_SAI_Confirmer_mdp->SetATTMISEABLANC(true);
$A7_SAI_Confirmer_mdp->SetChampFormate(false);
$A7_SAI_Confirmer_mdp->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A7_SAI_Confirmer_mdp->m_eBarreOutilsMode = 0;
$A7_SAI_Confirmer_mdp->m_bLibelleRiche=true;

$A9_BTN_Creer=&CreerChamp('CBouton');$PAGE_UTILISATEURS->WB_AjouteChamp('BTN_Créer','A9',$A9_BTN_Creer,'A9_BTN_Creer');
$A9_BTN_Creer->m_bLibelleRiche=true;

$A10_BTN_Modifier=&CreerChamp('CBouton');$PAGE_UTILISATEURS->WB_AjouteChamp('BTN_Modifier','A10',$A10_BTN_Modifier,'A10_BTN_Modifier');
$A10_BTN_Modifier->m_bLibelleRiche=true;

$A11_BTN_Supprimer=&CreerChamp('CBouton');$PAGE_UTILISATEURS->WB_AjouteChamp('BTN_Supprimer','A11',$A11_BTN_Supprimer,'A11_BTN_Supprimer');
$A11_BTN_Supprimer->m_bLibelleRiche=true;

$A12_TABLE_Utilisateurs=&CreerChamp('CTableAjax');$PAGE_UTILISATEURS->WB_AjouteChamp('TABLE_Utilisateurs','A12',$A12_TABLE_Utilisateurs,'A12_TABLE_Utilisateurs');
$A12_TABLE_Utilisateurs->m_bHauteurLigneVariable=true;
$A12_TABLE_Utilisateurs->m_nNbColonnesOuAttributs=10;
$A12_TABLE_Utilisateurs->Visible=1;
$A12_TABLE_Utilisateurs->Etat=0;
$A12_TABLE_Utilisateurs->nModeSelection=1;

$A13_COL_IDUtilisateurs=&CreerChamp('CSaisieNumerique');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_IDUtilisateurs','A13',$A13_COL_IDUtilisateurs,'A13_COL_IDUtilisateurs');
$A12_TABLE_Utilisateurs->AjouteColonne('A13_COL_IDUtilisateurs','COL_IDUtilisateurs','A13', 5601, 0,'Utilisateurs','IDUtilisateurs');
$A12_TABLE_Utilisateurs->TabColonnes[1]->ChampFormat->Masque='+9 999 999 999 999 999 999';
$A12_TABLE_Utilisateurs->TabColonnes[1]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[1]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[1]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[1]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[1]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[1]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[1]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[1]->m_sBulle='';
$A13_COL_IDUtilisateurs->m_eAction=6;
$A13_COL_IDUtilisateurs->m_sPageAction='';
$A13_COL_IDUtilisateurs->m_bLibelleRiche=true;

$A14_COL_Nom=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Nom','A14',$A14_COL_Nom,'A14_COL_Nom');
$A12_TABLE_Utilisateurs->AjouteColonne('A14_COL_Nom','COL_Nom','A14', 5600, 1,'Utilisateurs','Nom');
$A12_TABLE_Utilisateurs->TabColonnes[2]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[2]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[2]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[2]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[2]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[2]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[2]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[2]->m_sBulle='';
$A14_COL_Nom->m_eAction=6;
$A14_COL_Nom->m_sPageAction='';
$A14_COL_Nom->m_bLibelleRiche=true;

$A15_COL_Prenom=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Prenom','A15',$A15_COL_Prenom,'A15_COL_Prenom');
$A12_TABLE_Utilisateurs->AjouteColonne('A15_COL_Prenom','COL_Prenom','A15', 5600, 2,'Utilisateurs','Prenom');
$A12_TABLE_Utilisateurs->TabColonnes[3]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[3]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[3]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[3]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[3]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[3]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[3]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[3]->m_sBulle='';
$A15_COL_Prenom->m_eAction=6;
$A15_COL_Prenom->m_sPageAction='';
$A15_COL_Prenom->m_bLibelleRiche=true;

$A16_COL_Contact_mobile=&CreerChamp('CSaisieNumerique');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Contact_mobile','A16',$A16_COL_Contact_mobile,'A16_COL_Contact_mobile');
$A12_TABLE_Utilisateurs->AjouteColonne('A16_COL_Contact_mobile','COL_Contact_mobile','A16', 5601, 3,'Utilisateurs','contact_mobile');
$A12_TABLE_Utilisateurs->TabColonnes[4]->ChampFormat->Masque='+9 999 999 999';
$A12_TABLE_Utilisateurs->TabColonnes[4]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[4]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[4]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[4]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[4]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[4]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[4]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[4]->m_sBulle='';
$A16_COL_Contact_mobile->m_eAction=6;
$A16_COL_Contact_mobile->m_sPageAction='';
$A16_COL_Contact_mobile->m_bLibelleRiche=true;

$A17_COL_Poste=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Poste','A17',$A17_COL_Poste,'A17_COL_Poste');
$A12_TABLE_Utilisateurs->AjouteColonne('A17_COL_Poste','COL_Poste','A17', 5600, 4,'Utilisateurs','poste');
$A12_TABLE_Utilisateurs->TabColonnes[5]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[5]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[5]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[5]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[5]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[5]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[5]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[5]->m_sBulle='';
$A17_COL_Poste->m_eAction=6;
$A17_COL_Poste->m_sPageAction='';
$A17_COL_Poste->m_bLibelleRiche=true;

$A18_COL_Email=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Email','A18',$A18_COL_Email,'A18_COL_Email');
$A12_TABLE_Utilisateurs->AjouteColonne('A18_COL_Email','COL_Email','A18', 5600, 5,'Utilisateurs','email');
$A12_TABLE_Utilisateurs->TabColonnes[6]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[6]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[6]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[6]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[6]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[6]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[6]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[6]->m_sBulle='';
$A18_COL_Email->m_eAction=6;
$A18_COL_Email->m_sPageAction='';
$A18_COL_Email->m_bLibelleRiche=true;

$A19_COL_Mdp=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Mdp','A19',$A19_COL_Mdp,'A19_COL_Mdp');
$A12_TABLE_Utilisateurs->AjouteColonne('A19_COL_Mdp','COL_Mdp','A19', 5600, 6,'Utilisateurs','mdp');
$A12_TABLE_Utilisateurs->TabColonnes[7]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[7]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[7]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[7]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[7]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[7]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[7]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[7]->m_sBulle='';
$A19_COL_Mdp->m_eAction=6;
$A19_COL_Mdp->m_sPageAction='';
$A19_COL_Mdp->m_bLibelleRiche=true;

$A20_COL_Confirmer_mdp=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Confirmer_mdp','A20',$A20_COL_Confirmer_mdp,'A20_COL_Confirmer_mdp');
$A12_TABLE_Utilisateurs->AjouteColonne('A20_COL_Confirmer_mdp','COL_Confirmer_mdp','A20', 5600, 7,'Utilisateurs','confirmer_mdp');
$A12_TABLE_Utilisateurs->TabColonnes[8]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[8]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[8]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[8]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[8]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[8]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[8]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[8]->m_sBulle='';
$A20_COL_Confirmer_mdp->m_eAction=6;
$A20_COL_Confirmer_mdp->m_sPageAction='';
$A20_COL_Confirmer_mdp->m_bLibelleRiche=true;

$A21_COL_Admin=&CreerChamp('CSaisie');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_Admin','A21',$A21_COL_Admin,'A21_COL_Admin');
$A12_TABLE_Utilisateurs->AjouteColonne('A21_COL_Admin','COL_Admin','A21', 5600, 8,'Utilisateurs','admin');
$A12_TABLE_Utilisateurs->TabColonnes[9]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[9]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[9]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[9]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[9]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[9]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[9]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[9]->m_sBulle='';
$A21_COL_Admin->m_eAction=6;
$A21_COL_Admin->m_sPageAction='';
$A21_COL_Admin->m_bLibelleRiche=true;

$A22_COL_IDMembres=&CreerChamp('CSaisieNumerique');$PAGE_UTILISATEURS->WB_AjouteChamp('COL_IDMembres','A22',$A22_COL_IDMembres,'A22_COL_IDMembres');
$A12_TABLE_Utilisateurs->AjouteColonne('A22_COL_IDMembres','COL_IDMembres','A22', 5601, 9,'Utilisateurs','IDMembres');
$A12_TABLE_Utilisateurs->TabColonnes[10]->ChampFormat->Masque='+9 999 999 999 999 999 999';
$A12_TABLE_Utilisateurs->TabColonnes[10]->Visible=1;
$A12_TABLE_Utilisateurs->TabColonnes[10]->Etat=0;
$A12_TABLE_Utilisateurs->TabColonnes[10]->bColonneLien=0;
$A12_TABLE_Utilisateurs->TabColonnes[10]->SetTriable(true);
$A12_TABLE_Utilisateurs->TabColonnes[10]->SetAvecLoupe(true);
$A12_TABLE_Utilisateurs->TabColonnes[10]->m_bAvecFiltre=true;
$A12_TABLE_Utilisateurs->TabColonnes[10]->m_eDeplaceInsere = 4;
$A12_TABLE_Utilisateurs->TabColonnes[10]->m_sBulle='';
$A22_COL_IDMembres->m_eAction=6;
$A22_COL_IDMembres->m_sPageAction='';
$A22_COL_IDMembres->m_bLibelleRiche=true;

$A25_COMBO_droitadmin=&CreerChamp('CCombo');$PAGE_UTILISATEURS->WB_AjouteChamp('COMBO_droitadmin','A25',$A25_COMBO_droitadmin,'A25_COMBO_droitadmin');
$A25_COMBO_droitadmin->m_bLibelleRiche=true;

$M6_IMG_Logo_Personnalise_2=&CreerChamp('CImage',207,57,15790320);$PAGE_UTILISATEURS->WB_AjouteChamp('IMG_Logo_Personnalisé_2','M6',$M6_IMG_Logo_Personnalise_2,'M6_IMG_Logo_Personnalise_2');
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

$M5_IMG_Logo=&CreerChamp('CImage',853,241,15790320);$PAGE_UTILISATEURS->WB_AjouteChamp('IMG_Logo','M5',$M5_IMG_Logo,'M5_IMG_Logo');
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

$A8_BTN_Deconnexion=&CreerChamp('CBouton');$PAGE_UTILISATEURS->WB_AjouteChamp('BTN_Déconnexion','A8',$A8_BTN_Deconnexion,'A8_BTN_Deconnexion');
$A8_BTN_Deconnexion->m_bLibelleRiche=true;

$A24_BTN_Membres=&CreerChamp('CBouton');$PAGE_UTILISATEURS->WB_AjouteChamp('BTN_Membres','A24',$A24_BTN_Membres,'A24_BTN_Membres');
$A24_BTN_Membres->m_bLibelleRiche=true;



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A1_SAI_Nom->Couleur = 0x403628;
$A1_SAI_Nom->CouleurInitiale = 0x403628;
$A1_SAI_Nom->CouleurFond = 0xFFFFFF;
$A1_SAI_Nom->CouleurFondInitiale = 0xFFFFFF;
$A1_SAI_Nom->Libelle = function_exists("construireTexteRiche_A1_SAI_Nom") ? null : 'Nom';
$A1_SAI_Nom->Masque = '0';
$A1_SAI_Nom->m_nHauteur = 21;
$A1_SAI_Nom->m_nLargeur = 399;
$A1_SAI_Nom->m_nOpacite = 100;
$A1_SAI_Nom->m_nCadrageHorizontal = -1;
$A1_SAI_Nom->m_nCadrageVertical = 1;
$A1_SAI_Nom->m_Police->m_bGras = false;
$A1_SAI_Nom->m_Police->m_bItalique = false;
$A1_SAI_Nom->m_Police->m_bSouligne = false;
$A1_SAI_Nom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A1_SAI_Nom->m_Police->m_nTaille = '9';
$A1_SAI_Nom->m_nX = 263;
$A1_SAI_Nom->m_nY = 455;
$A1_SAI_Nom->m_clCouleurJauge = 0x000000;
$A1_SAI_Nom->BoutonCalendrier = 0;
$A1_SAI_Nom->EtatInitial = 0;
$A1_SAI_Nom->VisibleInitial = 1;
$A1_SAI_Nom->YInitial = 0;
$A1_SAI_Nom->NombreColonne = 0;
$A1_SAI_Nom->BulleTitre = '';
$A1_SAI_Nom->JetonActif = false;
$A1_SAI_Nom->JetonListeSeparateur = '';
$A1_SAI_Nom->JetonAutoriseDoublon = false;
$A1_SAI_Nom->JetonSupprimable = true;

$A1_SAI_Nom->SetLiaisonFichier('Utilisateurs', 'Nom');

$A1_SAI_Nom->lierVM('PAGE_Utilisateurs','SAI_Nom','A1_SAI_Nom');
$A2_SAI_Prenom->Couleur = 0x403628;
$A2_SAI_Prenom->CouleurInitiale = 0x403628;
$A2_SAI_Prenom->CouleurFond = 0xFFFFFF;
$A2_SAI_Prenom->CouleurFondInitiale = 0xFFFFFF;
$A2_SAI_Prenom->Libelle = function_exists("construireTexteRiche_A2_SAI_Prenom") ? null : 'Prénom';
$A2_SAI_Prenom->Masque = '0';
$A2_SAI_Prenom->m_nHauteur = 21;
$A2_SAI_Prenom->m_nLargeur = 399;
$A2_SAI_Prenom->m_nOpacite = 100;
$A2_SAI_Prenom->m_nCadrageHorizontal = -1;
$A2_SAI_Prenom->m_nCadrageVertical = 1;
$A2_SAI_Prenom->m_Police->m_bGras = false;
$A2_SAI_Prenom->m_Police->m_bItalique = false;
$A2_SAI_Prenom->m_Police->m_bSouligne = false;
$A2_SAI_Prenom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A2_SAI_Prenom->m_Police->m_nTaille = '9';
$A2_SAI_Prenom->m_nX = 263;
$A2_SAI_Prenom->m_nY = 483;
$A2_SAI_Prenom->m_clCouleurJauge = 0x000000;
$A2_SAI_Prenom->BoutonCalendrier = 0;
$A2_SAI_Prenom->EtatInitial = 0;
$A2_SAI_Prenom->VisibleInitial = 1;
$A2_SAI_Prenom->YInitial = 0;
$A2_SAI_Prenom->NombreColonne = 0;
$A2_SAI_Prenom->BulleTitre = '';
$A2_SAI_Prenom->JetonActif = false;
$A2_SAI_Prenom->JetonListeSeparateur = '';
$A2_SAI_Prenom->JetonAutoriseDoublon = false;
$A2_SAI_Prenom->JetonSupprimable = true;

$A2_SAI_Prenom->SetLiaisonFichier('Utilisateurs', 'Prenom');

$A2_SAI_Prenom->lierVM('PAGE_Utilisateurs','SAI_Prenom','A2_SAI_Prenom');
$A3_SAI_Contact_mobile->Couleur = 0x403628;
$A3_SAI_Contact_mobile->CouleurInitiale = 0x403628;
$A3_SAI_Contact_mobile->CouleurFond = 0xFFFFFF;
$A3_SAI_Contact_mobile->CouleurFondInitiale = 0xFFFFFF;
$A3_SAI_Contact_mobile->Libelle = function_exists("construireTexteRiche_A3_SAI_Contact_mobile") ? null : 'Contact mobile';
$A3_SAI_Contact_mobile->Masque = '+9 999 999 999';
$A3_SAI_Contact_mobile->m_nHauteur = 21;
$A3_SAI_Contact_mobile->m_nLargeur = 399;
$A3_SAI_Contact_mobile->m_nOpacite = 100;
$A3_SAI_Contact_mobile->m_nCadrageHorizontal = -1;
$A3_SAI_Contact_mobile->m_nCadrageVertical = 1;
$A3_SAI_Contact_mobile->m_Police->m_bGras = false;
$A3_SAI_Contact_mobile->m_Police->m_bItalique = false;
$A3_SAI_Contact_mobile->m_Police->m_bSouligne = false;
$A3_SAI_Contact_mobile->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A3_SAI_Contact_mobile->m_Police->m_nTaille = '9';
$A3_SAI_Contact_mobile->m_nX = 263;
$A3_SAI_Contact_mobile->m_nY = 511;
$A3_SAI_Contact_mobile->m_clCouleurJauge = 0x000000;
$A3_SAI_Contact_mobile->BoutonCalendrier = 0;
$A3_SAI_Contact_mobile->EtatInitial = 0;
$A3_SAI_Contact_mobile->VisibleInitial = 1;
$A3_SAI_Contact_mobile->YInitial = 0;
$A3_SAI_Contact_mobile->NombreColonne = 0;
$A3_SAI_Contact_mobile->BulleTitre = '';
$A3_SAI_Contact_mobile->JetonActif = false;
$A3_SAI_Contact_mobile->JetonListeSeparateur = '';
$A3_SAI_Contact_mobile->JetonAutoriseDoublon = false;
$A3_SAI_Contact_mobile->JetonSupprimable = true;

$A3_SAI_Contact_mobile->SetLiaisonFichier('Utilisateurs', 'contact_mobile');

$A3_SAI_Contact_mobile->lierVM('PAGE_Utilisateurs','SAI_Contact_mobile','A3_SAI_Contact_mobile');
$A4_SAI_Poste->Couleur = 0x403628;
$A4_SAI_Poste->CouleurInitiale = 0x403628;
$A4_SAI_Poste->CouleurFond = 0xFFFFFF;
$A4_SAI_Poste->CouleurFondInitiale = 0xFFFFFF;
$A4_SAI_Poste->Libelle = function_exists("construireTexteRiche_A4_SAI_Poste") ? null : 'Poste occupé';
$A4_SAI_Poste->Masque = '0';
$A4_SAI_Poste->m_nHauteur = 21;
$A4_SAI_Poste->m_nLargeur = 399;
$A4_SAI_Poste->m_nOpacite = 100;
$A4_SAI_Poste->m_nCadrageHorizontal = -1;
$A4_SAI_Poste->m_nCadrageVertical = 1;
$A4_SAI_Poste->m_Police->m_bGras = false;
$A4_SAI_Poste->m_Police->m_bItalique = false;
$A4_SAI_Poste->m_Police->m_bSouligne = false;
$A4_SAI_Poste->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A4_SAI_Poste->m_Police->m_nTaille = '9';
$A4_SAI_Poste->m_nX = 263;
$A4_SAI_Poste->m_nY = 539;
$A4_SAI_Poste->m_clCouleurJauge = 0x000000;
$A4_SAI_Poste->BoutonCalendrier = 0;
$A4_SAI_Poste->EtatInitial = 0;
$A4_SAI_Poste->VisibleInitial = 1;
$A4_SAI_Poste->YInitial = 0;
$A4_SAI_Poste->NombreColonne = 0;
$A4_SAI_Poste->BulleTitre = '';
$A4_SAI_Poste->JetonActif = false;
$A4_SAI_Poste->JetonListeSeparateur = '';
$A4_SAI_Poste->JetonAutoriseDoublon = false;
$A4_SAI_Poste->JetonSupprimable = true;

$A4_SAI_Poste->SetLiaisonFichier('Utilisateurs', 'poste');

$A4_SAI_Poste->lierVM('PAGE_Utilisateurs','SAI_Poste','A4_SAI_Poste');
$A5_SAI_Email->Couleur = 0x403628;
$A5_SAI_Email->CouleurInitiale = 0x403628;
$A5_SAI_Email->CouleurFond = 0xFFFFFF;
$A5_SAI_Email->CouleurFondInitiale = 0xFFFFFF;
$A5_SAI_Email->Valeur = '';
$A5_SAI_Email->Libelle = function_exists("construireTexteRiche_A5_SAI_Email") ? null : 'Email';
$A5_SAI_Email->Masque = '0';
$A5_SAI_Email->m_nHauteur = 21;
$A5_SAI_Email->m_nLargeur = 399;
$A5_SAI_Email->m_nOpacite = 100;
$A5_SAI_Email->m_nCadrageHorizontal = -1;
$A5_SAI_Email->m_nCadrageVertical = 1;
$A5_SAI_Email->m_Police->m_bGras = false;
$A5_SAI_Email->m_Police->m_bItalique = false;
$A5_SAI_Email->m_Police->m_bSouligne = false;
$A5_SAI_Email->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A5_SAI_Email->m_Police->m_nTaille = '9';
$A5_SAI_Email->m_nX = 263;
$A5_SAI_Email->m_nY = 567;
$A5_SAI_Email->m_clCouleurJauge = 0x000000;
$A5_SAI_Email->BoutonCalendrier = 0;
$A5_SAI_Email->EtatInitial = 0;
$A5_SAI_Email->VisibleInitial = 1;
$A5_SAI_Email->YInitial = 0;
$A5_SAI_Email->NombreColonne = 0;
$A5_SAI_Email->BulleTitre = '';
$A5_SAI_Email->JetonActif = false;
$A5_SAI_Email->JetonListeSeparateur = '';
$A5_SAI_Email->JetonAutoriseDoublon = false;
$A5_SAI_Email->JetonSupprimable = true;

$A5_SAI_Email->SetLiaisonFichier('Utilisateurs', 'email');

$A5_SAI_Email->lierVM('PAGE_Utilisateurs','SAI_Email','A5_SAI_Email');
$A6_SAI_Mdp->Couleur = 0x403628;
$A6_SAI_Mdp->CouleurInitiale = 0x403628;
$A6_SAI_Mdp->CouleurFond = 0xFFFFFF;
$A6_SAI_Mdp->CouleurFondInitiale = 0xFFFFFF;
$A6_SAI_Mdp->Libelle = function_exists("construireTexteRiche_A6_SAI_Mdp") ? null : 'Mot de passe';
$A6_SAI_Mdp->Masque = '0';
$A6_SAI_Mdp->m_nHauteur = 21;
$A6_SAI_Mdp->m_nLargeur = 399;
$A6_SAI_Mdp->m_nOpacite = 100;
$A6_SAI_Mdp->m_nCadrageHorizontal = -1;
$A6_SAI_Mdp->m_nCadrageVertical = 1;
$A6_SAI_Mdp->m_Police->m_bGras = false;
$A6_SAI_Mdp->m_Police->m_bItalique = false;
$A6_SAI_Mdp->m_Police->m_bSouligne = false;
$A6_SAI_Mdp->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A6_SAI_Mdp->m_Police->m_nTaille = '9';
$A6_SAI_Mdp->m_nX = 263;
$A6_SAI_Mdp->m_nY = 595;
$A6_SAI_Mdp->m_clCouleurJauge = 0x000000;
$A6_SAI_Mdp->BoutonCalendrier = 0;
$A6_SAI_Mdp->EtatInitial = 0;
$A6_SAI_Mdp->VisibleInitial = 1;
$A6_SAI_Mdp->YInitial = 0;
$A6_SAI_Mdp->NombreColonne = 0;
$A6_SAI_Mdp->BulleTitre = '';
$A6_SAI_Mdp->JetonActif = false;
$A6_SAI_Mdp->JetonListeSeparateur = '';
$A6_SAI_Mdp->JetonAutoriseDoublon = false;
$A6_SAI_Mdp->JetonSupprimable = true;

$A6_SAI_Mdp->SetLiaisonFichier('Utilisateurs', 'mdp');

$A6_SAI_Mdp->lierVM('PAGE_Utilisateurs','SAI_Mdp','A6_SAI_Mdp');
$A7_SAI_Confirmer_mdp->Couleur = 0x403628;
$A7_SAI_Confirmer_mdp->CouleurInitiale = 0x403628;
$A7_SAI_Confirmer_mdp->CouleurFond = 0xFFFFFF;
$A7_SAI_Confirmer_mdp->CouleurFondInitiale = 0xFFFFFF;
$A7_SAI_Confirmer_mdp->Libelle = function_exists("construireTexteRiche_A7_SAI_Confirmer_mdp") ? null : 'Confirmer mot de passe';
$A7_SAI_Confirmer_mdp->Masque = '0';
$A7_SAI_Confirmer_mdp->m_nHauteur = 21;
$A7_SAI_Confirmer_mdp->m_nLargeur = 399;
$A7_SAI_Confirmer_mdp->m_nOpacite = 100;
$A7_SAI_Confirmer_mdp->m_nCadrageHorizontal = -1;
$A7_SAI_Confirmer_mdp->m_nCadrageVertical = 1;
$A7_SAI_Confirmer_mdp->m_Police->m_bGras = false;
$A7_SAI_Confirmer_mdp->m_Police->m_bItalique = false;
$A7_SAI_Confirmer_mdp->m_Police->m_bSouligne = false;
$A7_SAI_Confirmer_mdp->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A7_SAI_Confirmer_mdp->m_Police->m_nTaille = '9';
$A7_SAI_Confirmer_mdp->m_nX = 263;
$A7_SAI_Confirmer_mdp->m_nY = 623;
$A7_SAI_Confirmer_mdp->m_clCouleurJauge = 0x000000;
$A7_SAI_Confirmer_mdp->BoutonCalendrier = 0;
$A7_SAI_Confirmer_mdp->EtatInitial = 0;
$A7_SAI_Confirmer_mdp->VisibleInitial = 1;
$A7_SAI_Confirmer_mdp->YInitial = 0;
$A7_SAI_Confirmer_mdp->NombreColonne = 0;
$A7_SAI_Confirmer_mdp->BulleTitre = '';
$A7_SAI_Confirmer_mdp->JetonActif = false;
$A7_SAI_Confirmer_mdp->JetonListeSeparateur = '';
$A7_SAI_Confirmer_mdp->JetonAutoriseDoublon = false;
$A7_SAI_Confirmer_mdp->JetonSupprimable = true;

$A7_SAI_Confirmer_mdp->SetLiaisonFichier('Utilisateurs', 'confirmer_mdp');

$A7_SAI_Confirmer_mdp->lierVM('PAGE_Utilisateurs','SAI_Confirmer_mdp','A7_SAI_Confirmer_mdp');
$A9_BTN_Creer->Libelle = function_exists("construireTexteRiche_A9_BTN_Creer") ? null : 'Créer';
$A9_BTN_Creer->JetonActif = false;


$A9_BTN_Creer->lierVM('PAGE_Utilisateurs','BTN_Créer','A9_BTN_Creer');
$A10_BTN_Modifier->Visible = true;
$A10_BTN_Modifier->Couleur = 0xFFFFFF;
$A10_BTN_Modifier->CouleurInitiale = 0xFFFFFF;
$A10_BTN_Modifier->CouleurFond = 0x0383E3;
$A10_BTN_Modifier->CouleurFondInitiale = 0x0383E3;
$A10_BTN_Modifier->Libelle = function_exists("construireTexteRiche_A10_BTN_Modifier") ? null : 'Modifier';
$A10_BTN_Modifier->m_nHauteur = 24;
$A10_BTN_Modifier->m_nLargeur = 120;
$A10_BTN_Modifier->m_nOpacite = 100;
$A10_BTN_Modifier->m_nCadrageHorizontal = 1;
$A10_BTN_Modifier->m_nCadrageVertical = 1;
$A10_BTN_Modifier->m_Police->m_bGras = false;
$A10_BTN_Modifier->m_Police->m_bItalique = false;
$A10_BTN_Modifier->m_Police->m_bSouligne = false;
$A10_BTN_Modifier->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A10_BTN_Modifier->m_Police->m_nTaille = '9';
$A10_BTN_Modifier->m_nX = 408;
$A10_BTN_Modifier->m_nY = 728;
$A10_BTN_Modifier->m_clCouleurJauge = 0x000000;
$A10_BTN_Modifier->BoutonCalendrier = 0;
$A10_BTN_Modifier->EtatInitial = 0;
$A10_BTN_Modifier->VisibleInitial = 1;
$A10_BTN_Modifier->YInitial = 0;
$A10_BTN_Modifier->NombreColonne = 0;
$A10_BTN_Modifier->BulleTitre = '';
$A10_BTN_Modifier->JetonActif = false;
$A10_BTN_Modifier->JetonListeSeparateur = '';
$A10_BTN_Modifier->JetonAutoriseDoublon = false;
$A10_BTN_Modifier->JetonSupprimable = false;


$A10_BTN_Modifier->lierVM('PAGE_Utilisateurs','BTN_Modifier','A10_BTN_Modifier');
$A11_BTN_Supprimer->Visible = true;
$A11_BTN_Supprimer->Couleur = 0xFFFFFF;
$A11_BTN_Supprimer->CouleurInitiale = 0xFFFFFF;
$A11_BTN_Supprimer->CouleurFond = 0x0383E3;
$A11_BTN_Supprimer->CouleurFondInitiale = 0x0383E3;
$A11_BTN_Supprimer->Libelle = function_exists("construireTexteRiche_A11_BTN_Supprimer") ? null : 'Supprimer';
$A11_BTN_Supprimer->m_nHauteur = 24;
$A11_BTN_Supprimer->m_nLargeur = 120;
$A11_BTN_Supprimer->m_nOpacite = 100;
$A11_BTN_Supprimer->m_nCadrageHorizontal = 1;
$A11_BTN_Supprimer->m_nCadrageVertical = 1;
$A11_BTN_Supprimer->m_Police->m_bGras = false;
$A11_BTN_Supprimer->m_Police->m_bItalique = false;
$A11_BTN_Supprimer->m_Police->m_bSouligne = false;
$A11_BTN_Supprimer->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A11_BTN_Supprimer->m_Police->m_nTaille = '9';
$A11_BTN_Supprimer->m_nX = 534;
$A11_BTN_Supprimer->m_nY = 728;
$A11_BTN_Supprimer->m_clCouleurJauge = 0x000000;
$A11_BTN_Supprimer->BoutonCalendrier = 0;
$A11_BTN_Supprimer->EtatInitial = 0;
$A11_BTN_Supprimer->VisibleInitial = 1;
$A11_BTN_Supprimer->YInitial = 0;
$A11_BTN_Supprimer->NombreColonne = 0;
$A11_BTN_Supprimer->BulleTitre = '';
$A11_BTN_Supprimer->JetonActif = false;
$A11_BTN_Supprimer->JetonListeSeparateur = '';
$A11_BTN_Supprimer->JetonAutoriseDoublon = false;
$A11_BTN_Supprimer->JetonSupprimable = false;


$A11_BTN_Supprimer->lierVM('PAGE_Utilisateurs','BTN_Supprimer','A11_BTN_Supprimer');
$A12_TABLE_Utilisateurs->Couleur = 0x403628;
$A12_TABLE_Utilisateurs->CouleurInitiale = 0x403628;
$A12_TABLE_Utilisateurs->CouleurFond = 0xF9F9F9;
$A12_TABLE_Utilisateurs->CouleurFondInitiale = 0xF9F9F9;
$A12_TABLE_Utilisateurs->Valeur = '';
$A12_TABLE_Utilisateurs->Libelle = 'Liste Utilisateurs';
$A12_TABLE_Utilisateurs->m_nHauteur = 173;
$A12_TABLE_Utilisateurs->m_nLargeur = 932;
$A12_TABLE_Utilisateurs->m_nOpacite = 100;
$A12_TABLE_Utilisateurs->m_Police->m_bGras = false;
$A12_TABLE_Utilisateurs->m_Police->m_bItalique = false;
$A12_TABLE_Utilisateurs->m_Police->m_bSouligne = false;
$A12_TABLE_Utilisateurs->m_nX = 29;
$A12_TABLE_Utilisateurs->m_nY = 781;
$A12_TABLE_Utilisateurs->m_clCouleurJauge = 0x000000;
$A12_TABLE_Utilisateurs->BoutonCalendrier = 0;
$A12_TABLE_Utilisateurs->EtatInitial = 0;
$A12_TABLE_Utilisateurs->VisibleInitial = 1;
$A12_TABLE_Utilisateurs->YInitial = 0;
$A12_TABLE_Utilisateurs->NombreColonne = 10;
$A12_TABLE_Utilisateurs->BulleTitre = '';
$A12_TABLE_Utilisateurs->JetonActif = false;
$A12_TABLE_Utilisateurs->JetonListeSeparateur = '';
$A12_TABLE_Utilisateurs->JetonAutoriseDoublon = false;
$A12_TABLE_Utilisateurs->JetonSupprimable = false;


$A12_TABLE_Utilisateurs->lierVM('PAGE_Utilisateurs','TABLE_Utilisateurs','A12_TABLE_Utilisateurs');
$A13_COL_IDUtilisateurs->Couleur = 0x403628;
$A13_COL_IDUtilisateurs->CouleurInitiale = 0x403628;
$A13_COL_IDUtilisateurs->Libelle = function_exists("construireTexteRiche_A13_COL_IDUtilisateurs") ? null : 'Id Utilisateurs';
$A13_COL_IDUtilisateurs->Masque = '+9 999 999 999 999 999 999';
$A13_COL_IDUtilisateurs->m_nHauteur = 173;
$A13_COL_IDUtilisateurs->m_nLargeur = 79;
$A13_COL_IDUtilisateurs->m_nOpacite = 100;
$A13_COL_IDUtilisateurs->m_nCadrageHorizontal = 2;
$A13_COL_IDUtilisateurs->m_nCadrageVertical = -1;
$A13_COL_IDUtilisateurs->m_Police->m_bGras = false;
$A13_COL_IDUtilisateurs->m_Police->m_bItalique = false;
$A13_COL_IDUtilisateurs->m_Police->m_bSouligne = false;
$A13_COL_IDUtilisateurs->m_nX = 0;
$A13_COL_IDUtilisateurs->m_nY = 0;
$A13_COL_IDUtilisateurs->m_clCouleurJauge = 0x000000;
$A13_COL_IDUtilisateurs->BoutonCalendrier = 0;
$A13_COL_IDUtilisateurs->EtatInitial = 0;
$A13_COL_IDUtilisateurs->VisibleInitial = 1;
$A13_COL_IDUtilisateurs->YInitial = 0;
$A13_COL_IDUtilisateurs->NombreColonne = 0;
$A13_COL_IDUtilisateurs->BulleTitre = '';
$A13_COL_IDUtilisateurs->JetonActif = false;
$A13_COL_IDUtilisateurs->JetonListeSeparateur = '';
$A13_COL_IDUtilisateurs->JetonAutoriseDoublon = false;
$A13_COL_IDUtilisateurs->JetonSupprimable = true;


$A13_COL_IDUtilisateurs->lierVM('PAGE_Utilisateurs','COL_IDUtilisateurs','A13_COL_IDUtilisateurs');
$A14_COL_Nom->Couleur = 0x403628;
$A14_COL_Nom->CouleurInitiale = 0x403628;
$A14_COL_Nom->Libelle = function_exists("construireTexteRiche_A14_COL_Nom") ? null : 'Nom';
$A14_COL_Nom->Masque = '0';
$A14_COL_Nom->m_nHauteur = 173;
$A14_COL_Nom->m_nLargeur = 100;
$A14_COL_Nom->m_nOpacite = 100;
$A14_COL_Nom->m_nCadrageVertical = -1;
$A14_COL_Nom->m_Police->m_bGras = false;
$A14_COL_Nom->m_Police->m_bItalique = false;
$A14_COL_Nom->m_Police->m_bSouligne = false;
$A14_COL_Nom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A14_COL_Nom->m_Police->m_nTaille = '9';
$A14_COL_Nom->m_nX = 0;
$A14_COL_Nom->m_nY = 0;
$A14_COL_Nom->m_clCouleurJauge = 0x000000;
$A14_COL_Nom->BoutonCalendrier = 0;
$A14_COL_Nom->EtatInitial = 0;
$A14_COL_Nom->VisibleInitial = 1;
$A14_COL_Nom->YInitial = 0;
$A14_COL_Nom->NombreColonne = 0;
$A14_COL_Nom->BulleTitre = '';
$A14_COL_Nom->JetonActif = false;
$A14_COL_Nom->JetonListeSeparateur = '';
$A14_COL_Nom->JetonAutoriseDoublon = false;
$A14_COL_Nom->JetonSupprimable = true;


$A14_COL_Nom->lierVM('PAGE_Utilisateurs','COL_Nom','A14_COL_Nom');
$A15_COL_Prenom->Couleur = 0x403628;
$A15_COL_Prenom->CouleurInitiale = 0x403628;
$A15_COL_Prenom->Libelle = function_exists("construireTexteRiche_A15_COL_Prenom") ? null : 'Prénom';
$A15_COL_Prenom->Masque = '0';
$A15_COL_Prenom->m_nHauteur = 173;
$A15_COL_Prenom->m_nLargeur = 100;
$A15_COL_Prenom->m_nOpacite = 100;
$A15_COL_Prenom->m_nCadrageVertical = -1;
$A15_COL_Prenom->m_Police->m_bGras = false;
$A15_COL_Prenom->m_Police->m_bItalique = false;
$A15_COL_Prenom->m_Police->m_bSouligne = false;
$A15_COL_Prenom->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A15_COL_Prenom->m_Police->m_nTaille = '9';
$A15_COL_Prenom->m_nX = 0;
$A15_COL_Prenom->m_nY = 0;
$A15_COL_Prenom->m_clCouleurJauge = 0x000000;
$A15_COL_Prenom->BoutonCalendrier = 0;
$A15_COL_Prenom->EtatInitial = 0;
$A15_COL_Prenom->VisibleInitial = 1;
$A15_COL_Prenom->YInitial = 0;
$A15_COL_Prenom->NombreColonne = 0;
$A15_COL_Prenom->BulleTitre = '';
$A15_COL_Prenom->JetonActif = false;
$A15_COL_Prenom->JetonListeSeparateur = '';
$A15_COL_Prenom->JetonAutoriseDoublon = false;
$A15_COL_Prenom->JetonSupprimable = true;


$A15_COL_Prenom->lierVM('PAGE_Utilisateurs','COL_Prenom','A15_COL_Prenom');
$A16_COL_Contact_mobile->Couleur = 0x403628;
$A16_COL_Contact_mobile->CouleurInitiale = 0x403628;
$A16_COL_Contact_mobile->Libelle = function_exists("construireTexteRiche_A16_COL_Contact_mobile") ? null : 'Contact mobile';
$A16_COL_Contact_mobile->Masque = '+9 999 999 999';
$A16_COL_Contact_mobile->m_nHauteur = 173;
$A16_COL_Contact_mobile->m_nLargeur = 100;
$A16_COL_Contact_mobile->m_nOpacite = 100;
$A16_COL_Contact_mobile->m_nCadrageHorizontal = 2;
$A16_COL_Contact_mobile->m_nCadrageVertical = -1;
$A16_COL_Contact_mobile->m_Police->m_bGras = false;
$A16_COL_Contact_mobile->m_Police->m_bItalique = false;
$A16_COL_Contact_mobile->m_Police->m_bSouligne = false;
$A16_COL_Contact_mobile->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A16_COL_Contact_mobile->m_Police->m_nTaille = '9';
$A16_COL_Contact_mobile->m_nX = 0;
$A16_COL_Contact_mobile->m_nY = 0;
$A16_COL_Contact_mobile->m_clCouleurJauge = 0x000000;
$A16_COL_Contact_mobile->BoutonCalendrier = 0;
$A16_COL_Contact_mobile->EtatInitial = 0;
$A16_COL_Contact_mobile->VisibleInitial = 1;
$A16_COL_Contact_mobile->YInitial = 0;
$A16_COL_Contact_mobile->NombreColonne = 0;
$A16_COL_Contact_mobile->BulleTitre = '';
$A16_COL_Contact_mobile->JetonActif = false;
$A16_COL_Contact_mobile->JetonListeSeparateur = '';
$A16_COL_Contact_mobile->JetonAutoriseDoublon = false;
$A16_COL_Contact_mobile->JetonSupprimable = true;


$A16_COL_Contact_mobile->lierVM('PAGE_Utilisateurs','COL_Contact_mobile','A16_COL_Contact_mobile');
$A17_COL_Poste->Couleur = 0x403628;
$A17_COL_Poste->CouleurInitiale = 0x403628;
$A17_COL_Poste->Libelle = function_exists("construireTexteRiche_A17_COL_Poste") ? null : 'Poste occupé';
$A17_COL_Poste->Masque = '0';
$A17_COL_Poste->m_nHauteur = 173;
$A17_COL_Poste->m_nLargeur = 100;
$A17_COL_Poste->m_nOpacite = 100;
$A17_COL_Poste->m_nCadrageVertical = -1;
$A17_COL_Poste->m_Police->m_bGras = false;
$A17_COL_Poste->m_Police->m_bItalique = false;
$A17_COL_Poste->m_Police->m_bSouligne = false;
$A17_COL_Poste->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A17_COL_Poste->m_Police->m_nTaille = '9';
$A17_COL_Poste->m_nX = 0;
$A17_COL_Poste->m_nY = 0;
$A17_COL_Poste->m_clCouleurJauge = 0x000000;
$A17_COL_Poste->BoutonCalendrier = 0;
$A17_COL_Poste->EtatInitial = 0;
$A17_COL_Poste->VisibleInitial = 1;
$A17_COL_Poste->YInitial = 0;
$A17_COL_Poste->NombreColonne = 0;
$A17_COL_Poste->BulleTitre = '';
$A17_COL_Poste->JetonActif = false;
$A17_COL_Poste->JetonListeSeparateur = '';
$A17_COL_Poste->JetonAutoriseDoublon = false;
$A17_COL_Poste->JetonSupprimable = true;


$A17_COL_Poste->lierVM('PAGE_Utilisateurs','COL_Poste','A17_COL_Poste');
$A18_COL_Email->Couleur = 0x403628;
$A18_COL_Email->CouleurInitiale = 0x403628;
$A18_COL_Email->Libelle = function_exists("construireTexteRiche_A18_COL_Email") ? null : 'Email';
$A18_COL_Email->Masque = '0';
$A18_COL_Email->m_nHauteur = 173;
$A18_COL_Email->m_nLargeur = 100;
$A18_COL_Email->m_nOpacite = 100;
$A18_COL_Email->m_nCadrageVertical = -1;
$A18_COL_Email->m_Police->m_bGras = false;
$A18_COL_Email->m_Police->m_bItalique = false;
$A18_COL_Email->m_Police->m_bSouligne = false;
$A18_COL_Email->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A18_COL_Email->m_Police->m_nTaille = '9';
$A18_COL_Email->m_nX = 0;
$A18_COL_Email->m_nY = 0;
$A18_COL_Email->m_clCouleurJauge = 0x000000;
$A18_COL_Email->BoutonCalendrier = 0;
$A18_COL_Email->EtatInitial = 0;
$A18_COL_Email->VisibleInitial = 1;
$A18_COL_Email->YInitial = 0;
$A18_COL_Email->NombreColonne = 0;
$A18_COL_Email->BulleTitre = '';
$A18_COL_Email->JetonActif = false;
$A18_COL_Email->JetonListeSeparateur = '';
$A18_COL_Email->JetonAutoriseDoublon = false;
$A18_COL_Email->JetonSupprimable = true;


$A18_COL_Email->lierVM('PAGE_Utilisateurs','COL_Email','A18_COL_Email');
$A19_COL_Mdp->Couleur = 0x403628;
$A19_COL_Mdp->CouleurInitiale = 0x403628;
$A19_COL_Mdp->Libelle = function_exists("construireTexteRiche_A19_COL_Mdp") ? null : 'Mot de passe';
$A19_COL_Mdp->Masque = '0';
$A19_COL_Mdp->m_nHauteur = 173;
$A19_COL_Mdp->m_nLargeur = 100;
$A19_COL_Mdp->m_nOpacite = 100;
$A19_COL_Mdp->m_nCadrageVertical = -1;
$A19_COL_Mdp->m_Police->m_bGras = false;
$A19_COL_Mdp->m_Police->m_bItalique = false;
$A19_COL_Mdp->m_Police->m_bSouligne = false;
$A19_COL_Mdp->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A19_COL_Mdp->m_Police->m_nTaille = '9';
$A19_COL_Mdp->m_nX = 0;
$A19_COL_Mdp->m_nY = 0;
$A19_COL_Mdp->m_clCouleurJauge = 0x000000;
$A19_COL_Mdp->BoutonCalendrier = 0;
$A19_COL_Mdp->EtatInitial = 0;
$A19_COL_Mdp->VisibleInitial = 1;
$A19_COL_Mdp->YInitial = 0;
$A19_COL_Mdp->NombreColonne = 0;
$A19_COL_Mdp->BulleTitre = '';
$A19_COL_Mdp->JetonActif = false;
$A19_COL_Mdp->JetonListeSeparateur = '';
$A19_COL_Mdp->JetonAutoriseDoublon = false;
$A19_COL_Mdp->JetonSupprimable = true;


$A19_COL_Mdp->lierVM('PAGE_Utilisateurs','COL_Mdp','A19_COL_Mdp');
$A20_COL_Confirmer_mdp->Couleur = 0x403628;
$A20_COL_Confirmer_mdp->CouleurInitiale = 0x403628;
$A20_COL_Confirmer_mdp->Libelle = function_exists("construireTexteRiche_A20_COL_Confirmer_mdp") ? null : 'Confirmer mot de passe';
$A20_COL_Confirmer_mdp->Masque = '0';
$A20_COL_Confirmer_mdp->m_nHauteur = 173;
$A20_COL_Confirmer_mdp->m_nLargeur = 100;
$A20_COL_Confirmer_mdp->m_nOpacite = 100;
$A20_COL_Confirmer_mdp->m_nCadrageVertical = -1;
$A20_COL_Confirmer_mdp->m_Police->m_bGras = false;
$A20_COL_Confirmer_mdp->m_Police->m_bItalique = false;
$A20_COL_Confirmer_mdp->m_Police->m_bSouligne = false;
$A20_COL_Confirmer_mdp->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A20_COL_Confirmer_mdp->m_Police->m_nTaille = '9';
$A20_COL_Confirmer_mdp->m_nX = 0;
$A20_COL_Confirmer_mdp->m_nY = 0;
$A20_COL_Confirmer_mdp->m_clCouleurJauge = 0x000000;
$A20_COL_Confirmer_mdp->BoutonCalendrier = 0;
$A20_COL_Confirmer_mdp->EtatInitial = 0;
$A20_COL_Confirmer_mdp->VisibleInitial = 1;
$A20_COL_Confirmer_mdp->YInitial = 0;
$A20_COL_Confirmer_mdp->NombreColonne = 0;
$A20_COL_Confirmer_mdp->BulleTitre = '';
$A20_COL_Confirmer_mdp->JetonActif = false;
$A20_COL_Confirmer_mdp->JetonListeSeparateur = '';
$A20_COL_Confirmer_mdp->JetonAutoriseDoublon = false;
$A20_COL_Confirmer_mdp->JetonSupprimable = true;


$A20_COL_Confirmer_mdp->lierVM('PAGE_Utilisateurs','COL_Confirmer_mdp','A20_COL_Confirmer_mdp');
$A21_COL_Admin->Couleur = 0x403628;
$A21_COL_Admin->CouleurInitiale = 0x403628;
$A21_COL_Admin->Libelle = function_exists("construireTexteRiche_A21_COL_Admin") ? null : 'Admin';
$A21_COL_Admin->Masque = '0';
$A21_COL_Admin->m_nHauteur = 173;
$A21_COL_Admin->m_nLargeur = 61;
$A21_COL_Admin->m_nOpacite = 100;
$A21_COL_Admin->m_nCadrageVertical = -1;
$A21_COL_Admin->m_Police->m_bGras = false;
$A21_COL_Admin->m_Police->m_bItalique = false;
$A21_COL_Admin->m_Police->m_bSouligne = false;
$A21_COL_Admin->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A21_COL_Admin->m_Police->m_nTaille = '9';
$A21_COL_Admin->m_nX = 0;
$A21_COL_Admin->m_nY = 0;
$A21_COL_Admin->m_clCouleurJauge = 0x000000;
$A21_COL_Admin->BoutonCalendrier = 0;
$A21_COL_Admin->EtatInitial = 0;
$A21_COL_Admin->VisibleInitial = 1;
$A21_COL_Admin->YInitial = 0;
$A21_COL_Admin->NombreColonne = 0;
$A21_COL_Admin->BulleTitre = '';
$A21_COL_Admin->JetonActif = false;
$A21_COL_Admin->JetonListeSeparateur = '';
$A21_COL_Admin->JetonAutoriseDoublon = false;
$A21_COL_Admin->JetonSupprimable = true;


$A21_COL_Admin->lierVM('PAGE_Utilisateurs','COL_Admin','A21_COL_Admin');
$A22_COL_IDMembres->Couleur = 0x403628;
$A22_COL_IDMembres->CouleurInitiale = 0x403628;
$A22_COL_IDMembres->Libelle = function_exists("construireTexteRiche_A22_COL_IDMembres") ? null : 'Id Membres';
$A22_COL_IDMembres->Masque = '+9 999 999 999 999 999 999';
$A22_COL_IDMembres->m_nHauteur = 173;
$A22_COL_IDMembres->m_nLargeur = 71;
$A22_COL_IDMembres->m_nOpacite = 100;
$A22_COL_IDMembres->m_nCadrageHorizontal = 2;
$A22_COL_IDMembres->m_nCadrageVertical = -1;
$A22_COL_IDMembres->m_Police->m_bGras = false;
$A22_COL_IDMembres->m_Police->m_bItalique = false;
$A22_COL_IDMembres->m_Police->m_bSouligne = false;
$A22_COL_IDMembres->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A22_COL_IDMembres->m_Police->m_nTaille = '9';
$A22_COL_IDMembres->m_nX = 0;
$A22_COL_IDMembres->m_nY = 0;
$A22_COL_IDMembres->m_clCouleurJauge = 0x000000;
$A22_COL_IDMembres->BoutonCalendrier = 0;
$A22_COL_IDMembres->EtatInitial = 0;
$A22_COL_IDMembres->VisibleInitial = 1;
$A22_COL_IDMembres->YInitial = 0;
$A22_COL_IDMembres->NombreColonne = 0;
$A22_COL_IDMembres->BulleTitre = '';
$A22_COL_IDMembres->JetonActif = false;
$A22_COL_IDMembres->JetonListeSeparateur = '';
$A22_COL_IDMembres->JetonAutoriseDoublon = false;
$A22_COL_IDMembres->JetonSupprimable = true;


$A22_COL_IDMembres->lierVM('PAGE_Utilisateurs','COL_IDMembres','A22_COL_IDMembres');
$A25_COMBO_droitadmin->Couleur = 0x403628;
$A25_COMBO_droitadmin->CouleurInitiale = 0x403628;
$A25_COMBO_droitadmin->CouleurFond = 0xFFFFFF;
$A25_COMBO_droitadmin->CouleurFondInitiale = 0xFFFFFF;
$A25_COMBO_droitadmin->Libelle = function_exists("construireTexteRiche_A25_COMBO_droitadmin") ? null : 'Droit administrateur';
$A25_COMBO_droitadmin->m_nHauteur = 24;
$A25_COMBO_droitadmin->m_nLargeur = 399;
$A25_COMBO_droitadmin->m_nOpacite = 100;
$A25_COMBO_droitadmin->m_nCadrageHorizontal = -1;
$A25_COMBO_droitadmin->m_nCadrageVertical = 1;
$A25_COMBO_droitadmin->m_Police->m_bGras = false;
$A25_COMBO_droitadmin->m_Police->m_bItalique = false;
$A25_COMBO_droitadmin->m_Police->m_bSouligne = false;
$A25_COMBO_droitadmin->m_Police->m_sNom = 'Open Sans,Helvetica,Arial,sans-serif';
$A25_COMBO_droitadmin->m_Police->m_nTaille = '9';
$A25_COMBO_droitadmin->m_nX = 263;
$A25_COMBO_droitadmin->m_nY = 651;
$A25_COMBO_droitadmin->m_clCouleurJauge = 0x000000;
$A25_COMBO_droitadmin->BoutonCalendrier = 0;
$A25_COMBO_droitadmin->EtatInitial = 0;
$A25_COMBO_droitadmin->VisibleInitial = 1;
$A25_COMBO_droitadmin->YInitial = 0;
$A25_COMBO_droitadmin->NombreColonne = 0;
$A25_COMBO_droitadmin->BulleTitre = '';
$A25_COMBO_droitadmin->JetonActif = false;
$A25_COMBO_droitadmin->JetonListeSeparateur = '';
$A25_COMBO_droitadmin->JetonAutoriseDoublon = false;
$A25_COMBO_droitadmin->JetonSupprimable = false;
$A25_COMBO_droitadmin->ListeAjoute( 'user' );
$A25_COMBO_droitadmin->ListeAjoute( 'admin' );
$A25_COMBO_droitadmin->ListeAjoute( 'super admin' );

$A25_COMBO_droitadmin->SetLiaisonFichier('Utilisateurs', 'admin');

$A25_COMBO_droitadmin->lierVM('PAGE_Utilisateurs','COMBO_droitadmin','A25_COMBO_droitadmin');
$M6_IMG_Logo_Personnalise_2->Valeur = '../ext/logo (Personnalisé) (2).jpg';
$M6_IMG_Logo_Personnalise_2->JetonActif = false;


$M6_IMG_Logo_Personnalise_2->lierVM('PAGE_Utilisateurs','IMG_Logo_Personnalisé_2','M6_IMG_Logo_Personnalise_2');
$M5_IMG_Logo->Valeur = '../ext/logo.jpg';
$M5_IMG_Logo->JetonActif = false;


$M5_IMG_Logo->lierVM('PAGE_Utilisateurs','IMG_Logo','M5_IMG_Logo');
$A8_BTN_Deconnexion->Libelle = function_exists("construireTexteRiche_A8_BTN_Deconnexion") ? null : 'Déconnexion';
$A8_BTN_Deconnexion->JetonActif = false;


$A8_BTN_Deconnexion->lierVM('PAGE_Utilisateurs','BTN_Déconnexion','A8_BTN_Deconnexion');
$A24_BTN_Membres->Libelle = function_exists("construireTexteRiche_A24_BTN_Membres") ? null : 'Membres';
$A24_BTN_Membres->JetonActif = false;


$A24_BTN_Membres->lierVM('PAGE_Utilisateurs','BTN_Membres','A24_BTN_Membres');


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
function& PAGE_Utilisateurs28_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','PAGE_Utilisateurs');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Code de chaque affichage de page
function& PAGE_Utilisateurs151_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','PAGE_Utilisateurs');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& PAGE_Utilisateurs151()
{
	ExecuteAncetre('PAGE_Utilisateurs151_0');
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','PAGE_Utilisateurs');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Créer (serveur) :: (PCode de Clic sur %1!s!)
function& A9_BTN_Creer16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','A9_BTN_Creer');
	global $A5_SAI_Email;
	global $A12_TABLE_Utilisateurs;
	
	
	HLitRecherchePremier(getRef('Utilisateurs'),Rubrique('Utilisateurs','email'),VersPrimitif($A5_SAI_Email),getRef(524288));
	if (VersBooleen(HTrouve(getRef('Utilisateurs'))))
	{
		Info(getRef('L\'utilisateur existe dejà'));
	}
	else 
	{
		EcranVersFichier(VersPrimitif('PAGE_Utilisateurs'), VersPrimitif(Fichier('Utilisateurs')));
		HAjoute(getRef('Utilisateurs'));
		RAZ();
		VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_Créer (serveur)',"Table",$A12_TABLE_Utilisateurs,getRef('Reexecute'));
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Modifier (serveur) :: (PCode de Clic sur %1!s!)
function& A10_BTN_Modifier16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','A10_BTN_Modifier');
	global $A12_TABLE_Utilisateurs;
	
	
	EcranVersFichier(VersPrimitif('PAGE_Utilisateurs'), VersPrimitif(Fichier('Utilisateurs')));
	HModifie(getRef('Utilisateurs'));
	VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_Modifier (serveur)',"Table",$A12_TABLE_Utilisateurs,getRef('Reexecute'));
	Info(getRef('Utilisateur supprimer avec succès'));
	RAZ();
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Supprimer (serveur) :: (PCode de Clic sur %1!s!)
function& A11_BTN_Supprimer16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','A11_BTN_Supprimer');
	global $A12_TABLE_Utilisateurs;
	
	
	EcranVersFichier(VersPrimitif('PAGE_Utilisateurs'), VersPrimitif(Fichier('Utilisateurs')));
	HSupprime(getRef('Utilisateurs'));
	VerifieMethodeEtAppel("CTable",'TableAffiche','Clic sur BTN_Supprimer (serveur)',"Table",$A12_TABLE_Utilisateurs,getRef('Reexecute'));
	Info(VersPrimitif(getRef('L\'utilisateur a bien été supprimé')));
	RAZ();
	return _return ($_PHP_VAR_RETURN_);
}
//Sélection d'une ligne de TABLE_Utilisateurs (serveur) :: (PCode de Sélection d'une ligne)
function& A12_TABLE_Utilisateurs27()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','A12_TABLE_Utilisateurs');
	
	
	FichierVersEcran();
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Déconnexion (serveur) :: (PCode de Clic sur %1!s!)
function& A8_BTN_Deconnexion16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','A8_BTN_Deconnexion');
	
	
	PageAffiche(VersPrimitif('PAGE_Connexion'));
	return _return ($_PHP_VAR_RETURN_);
}
//Clic sur BTN_Membres (serveur) :: (PCode de Clic sur %1!s!)
function& A24_BTN_Membres16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','A24_BTN_Membres');
	
	
	PageAffiche(VersPrimitif('PAGE_inscrption_membres'));
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_UTILISATEURS','PAGE_Utilisateurs');
$A12_TABLE_Utilisateurs->SetSourceRemplissage("Utilisateurs", "IDUtilisateurs", "", "", 1, "", 0);

// Code de déclaration des globales de page
function& PAGE_Utilisateurs0_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','PAGE_Utilisateurs');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_Utilisateurs
	PAGE_Utilisateurs0_0();
function& PAGE_Utilisateurs0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Utilisateurs','PAGE_Utilisateurs');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_Utilisateurs
	PAGE_Utilisateurs0();


$A12_TABLE_Utilisateurs->InitRemplissage();

// Code d'initialisation de page
	PAGE_Utilisateurs28_0();

}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_UTILISATEURS','PAGE_Utilisateurs');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_UTILISATEURS)){
$_BTNACTION = TrouveBouton( $PAGE_UTILISATEURS );
if ($_BTNACTION=='A9') { 
//-------------------------------------------------------------------
//  PCodes de A9_BTN_Creer
//-------------------------------------------------------------------
	A9_BTN_Creer16();

}
if ($_BTNACTION=='A10') { 
//-------------------------------------------------------------------
//  PCodes de A10_BTN_Modifier
//-------------------------------------------------------------------
	A10_BTN_Modifier16();

}
if ($_BTNACTION=='A11') { 
//-------------------------------------------------------------------
//  PCodes de A11_BTN_Supprimer
//-------------------------------------------------------------------
	A11_BTN_Supprimer16();

}
if ($_BTNACTION=='A8') { 
//-------------------------------------------------------------------
//  PCodes de A8_BTN_Deconnexion
//-------------------------------------------------------------------
	A8_BTN_Deconnexion16();

}
if ($_BTNACTION=='A24') { 
//-------------------------------------------------------------------
//  PCodes de A24_BTN_Membres
//-------------------------------------------------------------------
	A24_BTN_Membres16();

}

}
if ( !bRenvoitCodeHTML($PAGE_UTILISATEURS,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_Utilisateurs 17/05/2023 03:24 WEBDEV 24 24.0.206.1 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal; color:#1b9174;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}*::-moz-selection{color:#283640;background-color:#D1DCE3;}::selection{color:#283640;background-color:#D1DCE3;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001d59b7de3">
<link rel="stylesheet" type="text/css" href="res/static.css?100027ffa6337">
<link rel="stylesheet" type="text/css" href="Spatiumn230SpatiumnBlueGreeniumn.css?100006a654128">
<link rel="stylesheet" type="text/css" href="MUCP_VTCCI230SpatiumnBlueGreeniumn.css?10000b78ad86f">
<link rel="stylesheet" type="text/css" href="palette-BlueGreeniumn.css?100008c22b6e0">
<link rel="stylesheet" type="text/css" href="PAGE_Utilisateurs_style.css?10000e812fdfa">
<style type="text/css">
body{line-height:normal;width:100%;margin:0 auto;width:100%;height:1402px;position:relative; color:#283640;} body{}html,body {background-color:#f0f0f0;position:relative;}#page{position:relative; background-color:#ffffff;min-height:1402px;height:auto !important; height:1402px; min-width:980px;width:auto !important;width:980px;}.l-1{text-align:right;}.l-28{background-color:#FFC040;}
#b-A12{border-style:solid;border-width:1px;border-color:#b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}#lzA12{border-style:solid;border-width:1px;border-color:#b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA13,.ttA13{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA14,.ttA14,#ttA15,.ttA15,#ttA16,.ttA16,#ttA17,.ttA17,#ttA18,.ttA18,#ttA19,.ttA19,#ttA20,.ttA20,#ttA21,.ttA21,#ttA22,.ttA22{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzclzA12{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:none;border-left:solid 1px #b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzdlzA12{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:solid 1px #b2b2b2;border-collapse:collapse;empty-cells:show;border-spacing:0;}.communbc-A13{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA13{width:81px;}.communbc-A14{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA14{width:98px;}.communbc-A15{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA15{width:98px;}.communbc-A16{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA16{width:98px;}.communbc-A17{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA17{width:98px;}.communbc-A18{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA18{width:98px;}.communbc-A19{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA19{width:98px;}.communbc-A20{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA20{width:98px;}.communbc-A21{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA21{width:59px;}.communbc-A22{border-top:none;border-right:solid 1px #b2b2b2;border-bottom:solid 1px #b2b2b2;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA22{width:100%;min-width:69px;}#M2,#tzM2{font-family:'Open Sans', Helvetica, Arial, sans-serif;background-color:#FFFFFF;}.dzM6{width:207px;height:57px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.dzM5{width:853px;height:241px;;overflow-x:hidden;;overflow-y:hidden;position:static;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_UTILISATEURS',15,void 0)(event); " onunload="clWDUtil.pfGetTraitement('PAGE_UTILISATEURS',16,'_COM')(event); "><form name="PAGE_UTILISATEURS" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_UTILISATEURS',18,void 0)(event); " method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_UTILISATEURS->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value=""><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:980px"><tr style="height:100%"><td><table style="width:980px;height:1402px"><tr style="height:1402px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  id="page" class="clearfix pos1"><table style="width:100.00%;height:1402px"><tr style="height:1119px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  class="pos2"><div  class="pos3"><table id="M3">
<tr><td style=" height:1119px; width:980px;"><div  class="pos4"><div  class="pos5"><div  class="pos6"><div  class="pos7"><div class="lh0 dzSpan dzM6" id="dzM6" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo%20%28Personnalis%C3%A9%29%20%282%29.jpg" alt="" id="M6" class="Image padding" style=" width:207px; height:57px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div><div  class="pos8"><div  class="pos9"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_UTILISATEURS',18,void 0)()){_JSL(_PAGE_,'A24','_self','','');} " id="A24" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;">Membres</button></div></div><div  class="pos10"><div  class="pos11"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_UTILISATEURS',18,void 0)()){_JSL(_PAGE_,'A8','_self','','');} " id="A8" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;">Déconnexion</button></div></div></div><div  class="pos12"><table style=" background-color:#ffc040;" id="M1">
<tr><td style=" height:317px; width:980px; background-color:#ffc040;"><div  class="pos13"><div  class="lh0 pos14"><table style=" width:678px;"><tr><td id="M2" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 2.3125rem;"><strong style="color: rgb(0, 255, 0);">MUTUELLE DE CONDUCTEUR PROFESSIONNEL DE VTC</strong></p></td></tr></table></div></div></td></tr></table></div><div  class="pos15"><div  class="lh0 pos16"><table style=" width:494px;"><tr><td id="A23" class="TXT-Normal padding webdevclass-riche"><p class="" style="text-align: center; font-size: 1.6875rem;"><strong>CREER DES UTILISATEURS</strong></p></td></tr></table></div></div><div  class="pos17"><div  class="pos18"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:399px;"><table id="czA1">
<tr><td style=" height:21px; width:399px;"><ul style=" width:399px;" class="wbLibChamp wbLibChampA1">
<li style=" height:21px;"><table style=" width:399px;height:21px;"><tr><td id="lzA1" class="Normal padding webdevclass-riche"><?php echo $A1_SAI_Nom->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:260px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA1"><tr><td style="border:none;" id="tzA1" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A1" VALUE="<?php echo $A1_SAI_Nom->GetValeurHTML(); ?>" id="A1" class="SAI A1 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos19"><div  class="pos20"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:399px;"><table id="czA2">
<tr><td style=" height:21px; width:399px;"><ul style=" width:399px;" class="wbLibChamp wbLibChampA2">
<li style=" height:21px;"><table style=" width:399px;height:21px;"><tr><td id="lzA2" class="Normal padding webdevclass-riche"><?php echo $A2_SAI_Prenom->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:260px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA2"><tr><td style="border:none;" id="tzA2" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A2" VALUE="<?php echo $A2_SAI_Prenom->GetValeurHTML(); ?>" id="A2" class="SAI A2 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos21"><div  class="pos22"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:399px;"><table id="czA3">
<tr><td style=" height:21px; width:399px;"><ul style=" width:399px;" class="wbLibChamp wbLibChampA3">
<li style=" height:21px;"><table style=" width:399px;height:21px;"><tr><td id="lzA3" class="Normal padding webdevclass-riche"><?php echo $A3_SAI_Contact_mobile->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:260px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA3"><tr><td style="border:none;" id="tzA3" class="valignmiddle"><INPUT TYPE="text" SIZE="26" NAME="A3" VALUE="<?php echo $A3_SAI_Contact_mobile->GetValeurHTML(); ?>" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999');VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,13}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A3" class="SAI A3 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos23"><div  class="pos24"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:399px;"><table id="czA4">
<tr><td style=" height:21px; width:399px;"><ul style=" width:399px;" class="wbLibChamp wbLibChampA4">
<li style=" height:21px;"><table style=" width:399px;height:21px;"><tr><td id="lzA4" class="Normal padding webdevclass-riche"><?php echo $A4_SAI_Poste->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:260px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA4"><tr><td style="border:none;" id="tzA4" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A4" VALUE="<?php echo $A4_SAI_Poste->GetValeurHTML(); ?>" id="A4" class="SAI A4 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos25"><div  class="pos26"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:399px;"><table id="czA5">
<tr><td style=" height:21px; width:399px;"><ul style=" width:399px;" class="wbLibChamp wbLibChampA5">
<li style=" height:21px;"><table style=" width:399px;height:21px;"><tr><td id="lzA5" class="Normal padding webdevclass-riche"><?php echo $A5_SAI_Email->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:260px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA5"><tr><td style="border:none;" id="tzA5" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A5" VALUE="<?php echo $A5_SAI_Email->GetValeurHTML(); ?>" id="A5" class="SAI A5 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos27"><div  class="pos28"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:399px;"><table id="czA6">
<tr><td style=" height:21px; width:399px;"><ul style=" width:399px;" class="wbLibChamp wbLibChampA6">
<li style=" height:21px;"><table style=" width:399px;height:21px;"><tr><td id="lzA6" class="Normal padding webdevclass-riche"><?php echo $A6_SAI_Mdp->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:260px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA6"><tr><td style="border:none;" id="tzA6" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A6" VALUE="<?php echo $A6_SAI_Mdp->GetValeurHTML(); ?>" id="A6" class="SAI A6 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos29"><div  class="pos30"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:399px;"><table id="czA7">
<tr><td style=" height:21px; width:399px;"><ul style=" width:399px;" class="wbLibChamp wbLibChampA7">
<li style=" height:21px;"><table style=" width:399px;height:21px;"><tr><td id="lzA7" class="Normal padding webdevclass-riche"><?php echo $A7_SAI_Confirmer_mdp->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:260px;border-spacing:0;height:21px;border-collapse:separate;border:0;outline:none;" id="bzA7"><tr><td style="border:none;" id="tzA7" class="valignmiddle"><INPUT TYPE="text" SIZE="26" MAXLENGTH="50" NAME="A7" VALUE="<?php echo $A7_SAI_Confirmer_mdp->GetValeurHTML(); ?>" id="A7" class="SAI A7 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos31"><div  class="pos32"><TABLE style=" width:399px;border-collapse:separate;">
<TR><TD style=" width:139px; height:24px;" id="lzA25" class="Normal padding webdevclass-riche"><?php echo $A25_COMBO_droitadmin->pszGetLibelleHTML(); ?></TD><TD style=" width:260px;"><table style=" width:260px;border-spacing:0;height:24px;border-collapse:separate;_border-collapse:collapse;border:0;outline:none;" id="bzA25"><tr><td style="border:none;" id="tzA25" class="valignmiddle"><select NAME="A25" SIZE=1 id="A25" class="SAI A25 padding webdevclass-riche"><?php $i = 0;while(isset($A25_COMBO_droitadmin->TabLigne[++$i])) { ?><option<?php if ($A25_COMBO_droitadmin->Selected($i)) {echo ' SELECTED';}  ?> VALUE="<?PHP echo $i; ?>"><?PHP echo $A25_COMBO_droitadmin->TabLigne[$i]->GetValeurHTML(); ?></option><?php } ?></select></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos33"><div  class="pos34"><div  class="pos35"><button type="button" onclick="clWDUtil.pfGetTraitement('A9',0,void 0)(event); " id="A9" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;">Créer</button></div></div><div  class="pos36"><div  class="pos37"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_UTILISATEURS',18,void 0)()){_JSL(_PAGE_,'A10','_self','','');} " id="A10" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;<?php if (($A10_BTN_Modifier->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>">Modifier</button></div></div><div  class="pos38"><div  class="pos39"><button type="button" onclick="clWDUtil.pfGetTraitement('A11',0,void 0)(event); " id="A11" class="BTN-Defaut wblien padding webdevclass-riche" style="width:100%;height:auto;min-height:24px;width:auto;min-width:120px;width:120px\9;height:auto;min-height:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box;display:inline-block;<?php if (($A11_BTN_Supprimer->Visible)==0) {
 ?>visibility:hidden;<?php 
 } ?>">Supprimer</button></div></div></div><div  class="pos40"><div  class="pos41"><input type=hidden name="A12" value="<?php echo $A12_TABLE_Utilisateurs->Valeur ?>"><input type=hidden name="A12_DEB" value="<?php echo $A12_TABLE_Utilisateurs->GetFirstIndex()+1 ?>"><input type=hidden name="_A12_OCC" value="<?php echo $A12_TABLE_Utilisateurs->GetNbEnregAffiche() ?>"><INPUT TYPE="hidden" SIZE="1" NAME="A12_FORMAT_0" VALUE="" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999 999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,25}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A12_FORMAT_0" class="A12_FORMAT_0 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" SIZE="1" NAME="A12_FORMAT_3" VALUE="" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,13}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A12_FORMAT_3" class="A12_FORMAT_3 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" SIZE="1" NAME="A12_FORMAT_9" VALUE="" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999 999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,25}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A12_FORMAT_9" class="A12_FORMAT_9 wbgrise padding" DISABLED autocomplete="off"><table id="ctzA12" style="border-spacing:0; width:932px;;" class="cellpadding0">
 <tr><td colspan=1  style="height:17px;" id="lzA12" class="aligncenter Normal-Centre padding">Liste Utilisateurs</td><td></td></tr><tr style="border:0;height:0;" id="ttA12"><td id="tzclzA12" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;position:relative;width:932px;"><table id="A12_TITRES_POS" style=" width:100%;"><tr id="A12_TITRES"><td id="ttA13" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA13"><div id="A12_TITRES_0" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA13"><?php echo $A13_COL_IDUtilisateurs->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_0" onclick="oGetObjetChamp('A12').OnTriColonne(0,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_0" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,0,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA14" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA14"><div id="A12_TITRES_1" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA14"><?php echo $A14_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_1" onclick="oGetObjetChamp('A12').OnTriColonne(1,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_1" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,1,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA15" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA15"><div id="A12_TITRES_2" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA15"><?php echo $A15_COL_Prenom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_2" onclick="oGetObjetChamp('A12').OnTriColonne(2,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_2" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,2,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA16" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA16"><div id="A12_TITRES_3" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA16"><?php echo $A16_COL_Contact_mobile->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_3" onclick="oGetObjetChamp('A12').OnTriColonne(3,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_3" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,3,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA17" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA17"><div id="A12_TITRES_4" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA17"><?php echo $A17_COL_Poste->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_4" onclick="oGetObjetChamp('A12').OnTriColonne(4,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_4" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,4,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA18" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA18"><div id="A12_TITRES_5" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA18"><?php echo $A18_COL_Email->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_5" onclick="oGetObjetChamp('A12').OnTriColonne(5,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_5" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,5,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA19" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA19"><div id="A12_TITRES_6" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA19"><?php echo $A19_COL_Mdp->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_6" onclick="oGetObjetChamp('A12').OnTriColonne(6,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_6" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,6,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA20" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA20"><div id="A12_TITRES_7" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA20"><?php echo $A20_COL_Confirmer_mdp->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_7" onclick="oGetObjetChamp('A12').OnTriColonne(7,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_7" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,7,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA21" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA21"><div id="A12_TITRES_8" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA21"><?php echo $A21_COL_Admin->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_8" onclick="oGetObjetChamp('A12').OnTriColonne(8,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_8" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,8,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td><td id="ttA22" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA22"><div id="A12_TITRES_9" style=""><table style="width:100%"><tr><td style="padding:0;border:0;height:51px;" class="Titre-Colonne ttA22"><?php echo $A22_COL_IDMembres->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A12_TITRES_TRI_9" onclick="oGetObjetChamp('A12').OnTriColonne(9,event)" alt="none"><img src="res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A12_TITRES_RECH_9" alt=""></div></td><td style="border-bottom:1px solid #b2b2b2" class="wbtablesep Titre-Colonne"><div onmousedown="oGetObjetChamp('A12').OnRedimCol(event,9,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:60px"><!-- --></div></td></tr>
<tr style="border:0;height:0;"><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA13"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA14"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA15"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA16"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA17"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA18"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA19"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA20"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA21"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA22"></td><td style="border:0;" class="wbtablesep Titre-Colonne"></td></tr></table></div></td><td></td></tr>
<tr><td id="tzdlzA12" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;width:932px;position:relative;z-index:1"><table id="A12_TB" style=" width:100%;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0;height:0;\" id=\"ttA12\">",contenu :  [ "<td id=\"ttA13\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA13\"><div id=\"A12_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA13\"><?php echo $A13_COL_IDUtilisateurs->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_0\" onclick=\"oGetObjetChamp('A12').OnTriColonne(0,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_0\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA14\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA14\"><div id=\"A12_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA14\"><?php echo $A14_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_1\" onclick=\"oGetObjetChamp('A12').OnTriColonne(1,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_1\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA15\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA15\"><div id=\"A12_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA15\"><?php echo $A15_COL_Prenom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_2\" onclick=\"oGetObjetChamp('A12').OnTriColonne(2,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_2\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA16\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA16\"><div id=\"A12_TITRES_3\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA16\"><?php echo $A16_COL_Contact_mobile->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_3\" onclick=\"oGetObjetChamp('A12').OnTriColonne(3,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_3\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,3,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA17\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA17\"><div id=\"A12_TITRES_4\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA17\"><?php echo $A17_COL_Poste->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_4\" onclick=\"oGetObjetChamp('A12').OnTriColonne(4,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_4\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,4,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA18\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA18\"><div id=\"A12_TITRES_5\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA18\"><?php echo $A18_COL_Email->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_5\" onclick=\"oGetObjetChamp('A12').OnTriColonne(5,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_5\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,5,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA19\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA19\"><div id=\"A12_TITRES_6\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA19\"><?php echo $A19_COL_Mdp->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_6\" onclick=\"oGetObjetChamp('A12').OnTriColonne(6,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_6\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,6,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA20\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA20\"><div id=\"A12_TITRES_7\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA20\"><?php echo $A20_COL_Confirmer_mdp->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_7\" onclick=\"oGetObjetChamp('A12').OnTriColonne(7,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_7\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,7,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA21\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA21\"><div id=\"A12_TITRES_8\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA21\"><?php echo $A21_COL_Admin->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_8\" onclick=\"oGetObjetChamp('A12').OnTriColonne(8,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_8\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,8,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>" , "<td id=\"ttA22\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA22\"><div id=\"A12_TITRES_9\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;height:51px;\" class=\"Titre-Colonne ttA22\"><?php echo $A22_COL_IDMembres->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A12_TITRES_TRI_9\" onclick=\"oGetObjetChamp('A12').OnTriColonne(9,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A12_TITRES_RECH_9\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,9,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:60px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0;height:0;\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA13\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA14\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA15\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA16\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA17\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA18\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA19\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA20\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA21\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA22\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne\"></td>", ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Impaires padding\" id=\"A12_[%_INDICE_%]\" style=\"visibility:hidden;height:23px\">",contenu :  [ "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A13\" class=\"alignright l-1 wbcolA13 communbc-A13 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA13\"><div id=\"A12_[%_INDICE_%]_0\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A14\" class=\"TXT-Normal wbcolA14 communbc-A14 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA14\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_1\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A15\" class=\"TXT-Normal wbcolA15 communbc-A15 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA15\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_2\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],3,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A16\" class=\"alignright TXT-Normal wbcolA16 communbc-A16 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA16\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_3\" style=\"padding-right:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,3,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],4,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A17\" class=\"TXT-Normal wbcolA17 communbc-A17 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA17\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_4\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,4,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],5,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A18\" class=\"TXT-Normal wbcolA18 communbc-A18 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA18\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_5\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,5,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],6,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A19\" class=\"TXT-Normal wbcolA19 communbc-A19 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA19\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_6\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,6,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],7,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A20\" class=\"TXT-Normal wbcolA20 communbc-A20 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA20\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_7\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,7,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],8,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A21\" class=\"TXT-Normal wbcolA21 communbc-A21 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA21\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_8\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,8,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A12').OnSelectLigne([%_INDICE_%],9,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A22\" class=\"alignright TXT-Normal wbcolA22 communbc-A22 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA22\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A12_[%_INDICE_%]_9\" style=\"padding-right:2px;\"></div></td></tr></table></div></td><td style=\"border-bottom:1px solid #b2b2b2\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A12').OnRedimCol(event,9,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #b2b2b2;height:100%;visibility:hidden;z-index:100" id="A12_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/Timer230%20Spatiumn.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A12_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td></tr>
</table></div></div></div></td></tr></table></div></div></div></td></tr><tr style="height:283px"><td class="ancragecenter" style="width:100.00%"><table style="margin:0 auto;;width:980px;height:283px"><tr style="height:283px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><table style=" background-color:#2c3c46;" id="M4">
<tr><td style=" height:283px; width:980px;"><div  class="pos42"><div  class="pos43"><div class="lh0 dzSpan dzM5" id="dzM5" style=""><i class="wbHnImg" style="opacity:0;" data-wbModeHomothetique="15"><img src="../ext/logo.jpg" alt="" id="M5" class="Image padding" style=" width:853px; height:241px;display:block;border:0;" onload="(window.wbImgHomNav ? window.wbImgHomNav(this,15) : (window['wbImgHomNav_DejaLoaded'] = (window['wbImgHomNav_DejaLoaded']||[]).concat([  [this,15]  ]))); "></i></div></div></div></td></tr></table></div></td></tr></table></td></tr></table></div></div></td></tr></table></td></tr></table><?php function construireTexteRiche_A22_COL_IDMembres($j){ global $A22_COL_IDMembres,$A22_COL_IDMembres,$A12_TABLE_Utilisateurs;$s="Id Membres";return $s;}function construireTexteRiche_A21_COL_Admin($j){ global $A21_COL_Admin,$A21_COL_Admin,$A12_TABLE_Utilisateurs;$s="Admin";return $s;}function construireTexteRiche_A20_COL_Confirmer_mdp($j){ global $A20_COL_Confirmer_mdp,$A20_COL_Confirmer_mdp,$A12_TABLE_Utilisateurs;$s="Confirmer mot de passe";return $s;}function construireTexteRiche_A19_COL_Mdp($j){ global $A19_COL_Mdp,$A19_COL_Mdp,$A12_TABLE_Utilisateurs;$s="Mot de passe";return $s;}function construireTexteRiche_A18_COL_Email($j){ global $A18_COL_Email,$A18_COL_Email,$A12_TABLE_Utilisateurs;$s="Email";return $s;}function construireTexteRiche_A17_COL_Poste($j){ global $A17_COL_Poste,$A17_COL_Poste,$A12_TABLE_Utilisateurs;$s="Poste occupé";return $s;}function construireTexteRiche_A16_COL_Contact_mobile($j){ global $A16_COL_Contact_mobile,$A16_COL_Contact_mobile,$A12_TABLE_Utilisateurs;$s="Contact mobile";return $s;}function construireTexteRiche_A15_COL_Prenom($j){ global $A15_COL_Prenom,$A15_COL_Prenom,$A12_TABLE_Utilisateurs;$s="Prénom";return $s;}function construireTexteRiche_A14_COL_Nom($j){ global $A14_COL_Nom,$A14_COL_Nom,$A12_TABLE_Utilisateurs;$s="Nom";return $s;}function construireTexteRiche_A13_COL_IDUtilisateurs($j){ global $A13_COL_IDUtilisateurs,$A13_COL_IDUtilisateurs,$A12_TABLE_Utilisateurs;$s="Id Utilisateurs";return $s;}function construireTexteRiche_A25_COMBO_droitadmin(){ global $A25_COMBO_droitadmin,$A25_COMBO_droitadmin;$s="Droit administrateur";return $s;}function construireTexteRiche_A7_SAI_Confirmer_mdp(){ global $A7_SAI_Confirmer_mdp,$A7_SAI_Confirmer_mdp;$s="Confirmer mot de passe";return $s;}function construireTexteRiche_A6_SAI_Mdp(){ global $A6_SAI_Mdp,$A6_SAI_Mdp;$s="Mot de passe";return $s;}function construireTexteRiche_A5_SAI_Email(){ global $A5_SAI_Email,$A5_SAI_Email;$s="Email";return $s;}function construireTexteRiche_A4_SAI_Poste(){ global $A4_SAI_Poste,$A4_SAI_Poste;$s="Poste occupé";return $s;}function construireTexteRiche_A3_SAI_Contact_mobile(){ global $A3_SAI_Contact_mobile,$A3_SAI_Contact_mobile;$s="Contact mobile";return $s;}function construireTexteRiche_A2_SAI_Prenom(){ global $A2_SAI_Prenom,$A2_SAI_Prenom;$s="Prénom";return $s;}function construireTexteRiche_A1_SAI_Nom(){ global $A1_SAI_Nom,$A1_SAI_Nom;$s="Nom";return $s;} ?>
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
var _PU_="Utilisateurs.php";
var _PAGE_=document["PAGE_UTILISATEURS"];
clWDUtil.DeclareChamp("A12",void 0,void 0,void 0,WDTable,["<?php echo $A12_TABLE_Utilisateurs->pszGetAjaxInitInline(); ?>",1,23,2,4,1,["Lignes-Impaires wbImpaire","Lignes-Impaires wbPaire","Selection"],[["res/TABLE_Sorting_Normal230_SpatiumnBlueGreeniumn.png","res/TABLE_Sorting_Increasing230_SpatiumnBlueGreeniumn.png","res/TABLE_Sorting_Decreasing230_SpatiumnBlueGreeniumn.png"],["res/TABLE_Search_Normal230_SpatiumnBlueGreeniumn.png","res/TABLE_Search_Hover230_SpatiumnBlueGreeniumn.png","res/TABLE_Search_Active230_SpatiumnBlueGreeniumn.png"],["res/TABLE_Filter_Normal230_SpatiumnBlueGreeniumn.png","res/TABLE_Filter_Hover230_SpatiumnBlueGreeniumn.png","res/TABLE_Filter_Active230_SpatiumnBlueGreeniumn.png"],["./res/TableDeplaceDroite.png","./res/TableDeplaceGauche.png"]],true],true,true);
<!--
var _COL={0:"#ffffff",5:"#d1dce3",9:"#ffc3b9",10:"#283640",15:"#283640",16:"#b2b2b2",21:"#d1d1d1",66:"#ca232a"};
function _GET_A13_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A13_1_I_C(){return arguments[0];}
function _GET_A16_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A16_1_I_C(){return arguments[0];}
function _GET_A22_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A22_1_I_C(){return arguments[0];}
function _GET_A6_1(){return document.getElementsByName("A6")[0].value;}
function _SET_A6_1(){document.getElementsByName("A6")[0].value=arguments[0];}
function _GET_A7_1(){return document.getElementsByName("A7")[0].value;}
function _SET_A7_1(){document.getElementsByName("A7")[0].value=arguments[0];}
clWDUtil.DeclareTraitementEx("PAGE_UTILISATEURS",true,[15,function(event){clWDUtil.pfGetTraitement("PAGE_UTILISATEURS",15,"_COM")(event);if(false===clWDUtil.pfGetTraitement("PAGE_UTILISATEURS",15,"_0")(event)){return;};var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,1);{}},void 0,true,15,function(event){var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,1);{}},"_0",true,18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("A9",false,[0,function(event){var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,1);try{clWDUtil.Try();{if(NSPCS.NSOperations.bComparaison(NSPCS.NSChamps.oGetChamp("A6",2),NSPCS.NSChamps.oGetChamp("A7",2),true,true,false,false)){NSPCS.NSOperations.Info("Les mots de passe sont différent. Veuillez confirmer le même mot de passe");}}}catch(_E){clWDUtil.xbCatchThrow(_E,event);return;}finally{clWDUtil&&clWDUtil.oFinally();}if(!clWDUtil.pfGetTraitement("PAGE_UTILISATEURS",18,void 0)(event)){return;}{_JSL(_PAGE_,"A9","_self","","");}},void 0,true]);
clWDUtil.DeclareTraitementEx("A11",false,[0,function(event){if(!clWDUtil.pfGetTraitement("PAGE_UTILISATEURS",18,void 0)(event)){return;}{_JSL(_PAGE_,"A11","_self","","");}},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_UTILISATEURS",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript">function chfocus(){window.focus();if(_PAGE_["A1"]!=null)try{_PAGE_["A1"].focus();}catch(e){}}</script>
<script type="text/javascript">var bPCSFR=true;</script><script type="text/javascript" charset="windows-1252" src="res/WDLIB.JS?20007c9381558"></script><script type="text/javascript" src="res/jquery-3.js?20000cd554760"></script><script type="text/javascript" src="res/jquery-ui.js?2000680761b69"></script><script type="text/javascript" src="res/jquery-effet.js?200044659718a"></script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-sup-epingle.js?200058ec00af2"></script><style type="text/css">.wbTooltip{font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:9pt;color:#FFFFFF;text-align:left;vertical-align:middle;background-color:#1B9174;border-radius:2px;padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ 	items: "[title]", position : {my: 'left top+20',collision: 'flip'},	track : true, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">if (bOpr) document.getElementsByTagName("head")[0].innerHTML+='\x3cstyle type="text/css"\x3e.wbtablesep{position:static !important;}\x3c/style\x3e';</script><script type="text/javascript">
<!--
if (window["_gtabPostTrt"]!==undefined){for(var i=window["_gtabPostTrt"].length-1; i>-1; --i){var domCible = window["_gtabPostTrt"][i].cible;for(pcode in window["_gtabPostTrt"][i].pcode){var tmp=domCible[pcode.toString()]; var f = window["_gtabPostTrt"][i].pcode[pcode];  domCible[pcode.toString()] = function() { if (tmp) tmp.apply(this,arguments); return f.apply(this,arguments); };if (pcode.toString()=='onload'){if (domCible.complete || domCible.getAttribute("data-onload-posttrt")=="true") domCible[pcode.toString()]();domCible.removeAttribute("data-onload-posttrt");}}}}
//-->
</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_26=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_26); ?>