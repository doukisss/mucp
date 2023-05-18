<?php
TYPE_Include(TYPEWL_STRUCTURE);
Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
TYPE_Include(TYPEWL_ENTIER);

function DeclMonProjet() { 


CreerType($GLOBALS['_gnid'],'gnid',TYPEWL_ENTIER,array(4,0));
if (isset($GLOBALS['MonProjet']))$GLOBALS['MonProjet']->WB_DeclareVarGlobale('gnid','_gnid');

}
?>