<?php
if (defined('CONFIG_PAGEERREUR') && !defined('CONFIG_PAGEERREUR_DEJA_FAIT')) { define('CONFIG_PAGEERREUR_DEJA_FAIT',true); 
}//CONFIG_PAGEERREUR 
if (defined('CONFIG_EXTENSION') && !defined('CONFIG_EXTENSION_DEJA_FAIT')) { define('CONFIG_EXTENSION_DEJA_FAIT',true); 
EnvSet('EXTENSION_STATIQUE','.html');
}//CONFIG_EXTENSION 
?>