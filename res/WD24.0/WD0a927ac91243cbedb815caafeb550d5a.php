<?php
//24.0.30.0 FMK/Dessin/Couleur/WLangage.php GF
//VersionVI: 01F240077f
//(c) 2005-2012 PC SOFT - Release
 define('FMK_Dessin_Couleur_WLangage',true); if (!defined('__INC__FMK/Dessin/Couleur.php')) { define('__INC__FMK/Dessin/Couleur.php',true); include_once(WB_INCLUDE_PATH.'WD2521e084cbaf10ef8d5f4ede4dc6baa2.php'); } class FMK_Dessin_Couleur_WLangage extends FMK_Dessin_Couleur { function FMK_Dessin_Couleur_WLangage($nRouge=null, $nVert=null, $nBeu=null, $nAlpha=null) { $this->m_nFormat = CouleurFormatWL; parent::FMK_Dessin_Couleur(0,255,0,255,$nRouge, $nVert, $nBeu, $nAlpha); } function getCouleur() { return F4f6e8051($this->m_nRouge,$this->m_nVert,$this->m_nBleu,$this->m_nAlpha); } function setCouleur($nCouleur) { $this->Fe78b4064(Fadb05a7c($nCouleur,$this->m_nFormat),F88bb47e1($nCouleur,$this->m_nFormat),F72d1dde6($nCouleur,$this->m_nFormat), F4db7eeed(F8ef357dc($nCouleur,$this->m_nFormat)) ); } } $_FMK_Dessin_Couleur_WLangage = null; ?>