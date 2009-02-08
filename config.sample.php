<?php

foreach($_POST as $name => $value) {
    $_GET[$name] = $value;
}
if (!isset($_GET['Frame']) && !isset($_GET['Ajax'])) {
    $_GET['Ajax'] = 'blog';
}

define('CORE_PATH'  ,'/data/www/sygil/www');
define('CORE_URL'   ,'http://www.sygil.org');
define('CORE_CONFIG','/data/www/sygil/www/site');

define('DEFAULT_LANGUE'  , 'french');
define('DEFAULT_THEME'   , 'glossy');
define('DEFAULT_TEMPLATE', 'sygil');
define('DEFAULT_ICON'	 , 'dropline-neu');
define('DEFAULT_LEFT'    , 'left');
define('DEFAULT_CENTER'  , null);
define('DEFAULT_RIGHT'   , null);

define('SITE_SHORT_NAME'  	, 'Sygil.org');
define('SITE_LONG_NAME'   	, 'Sygil Experimental Portal and CMS');
define('SITE_LONG_NAME_FR'	, 'Portail Experimental Sygil.org');
define('SITE_DESCRIPTION'	, '');
define('SITE_SEARCH_KEYWORDS' 	, '');

define('DATABASE_HOST','localhost');
define('DATABASE_NAME','sygil_base');
define('DATABASE_USER','sygil.org');
define('DATABASE_PASS','Y6YHXJdMMfxAvpzz');
define('DATABASE_PRE' ,'');
define('DATABASE_TYPE','mysqli');

// Override Official Theme List dans Config 
/**
 * $configThemeList = array(
 *	'glossy' 		=> 'Gnome Glossy Theme',
 *	'aurora-midnight'	=> 'Gnome Aurora Midnight Theme'
 *   )
 * );
 */

// Override Official Langue List
/**
 * $configLangList = array(
 *	'french' 		=> '##french##',
 *	'english'		=> '##english##'
 *   )
 * );
 */

?>
