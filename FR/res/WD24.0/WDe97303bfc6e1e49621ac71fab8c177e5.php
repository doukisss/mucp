<?php
//24.0.30.0 FMK/Dessin/Style.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 define('FMK_Dessin_Style',true); if (!defined('__INC__FMK/Dessin/Couleur.php')) { define('__INC__FMK/Dessin/Couleur.php',true); include_once(WB_INCLUDE_PATH.'WD2521e084cbaf10ef8d5f4ede4dc6baa2.php'); } class FMK_Dessin_Style { var $Couleur; var $CouleurFond; var $CouleurInitiale; var $CouleurFondInitiale; function FMK_Dessin_Style($dwCoul = -1, $dwCoulFond = -1) { $this->Couleur = $dwCoul; $this->CouleurFond = $dwCoulFond; $this->CouleurInitiale = $dwCoul; $this->CouleurFondInitiale = $dwCoulFond; } function SetCouleur($dwCoul) { if ($dwCoul == iCouleurDefaut) { $this->Couleur = $this->CouleurInitiale; } else { $this->Couleur = $dwCoul; } } function SetCouleurFond($dwCoul) { if ($dwCoul == iCouleurDefaut) { $this->CouleurFond = $this->CouleurFondInitiale; } else { $this->CouleurFond = $dwCoul; } } function& GetCouleur() { return $this->Couleur; } function& GetCouleurFond() { return $this->CouleurFond; } } ?>