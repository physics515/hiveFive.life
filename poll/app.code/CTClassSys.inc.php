<?php
//==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>
//
// Ajax Poll Script v3.18 [ GPL ]
// Copyright (c) phpkobo.com ( http://www.phpkobo.com/ )
// Email : admin@phpkobo.com
// ID : APSMX-318
// URL : http://www.phpkobo.com/ajax_poll.php
//
//==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<

define( 'APP_CLASS_TAG', 'tclass' );
define( 'APP_ID_TAG', 'tid' );

//----------------------------------------------------------------
// CTClassSys
//----------------------------------------------------------------
class CTClassSys {

	public static $cfg_params = array();

	public static function getConfigPath() {
		return self::$cfg_params['path-config'];
	}

	public static function getLangPath() {
		$path = self::$cfg_params['path-locale'];
		if ( !empty( self::$cfg_params['lang-code'] ) ) {
			$path .= self::$cfg_params['lang-code'] . '/';
		}
		return $path;
	}

	public static function loadConfig( $name, &$_cfg ) {
		include( self::getConfigPath() .
			"config.{$name}.inc.php" );
	}

	public static function loadLang( $name, &$_lng ) {
		include( self::getLangPath() .
			"locale.{$name}.inc.php" );
	}

	//----------------------------------------------------------------
	// fatalError
	//----------------------------------------------------------------
	function fatalError( $msg ) {
		$json = array( "result" => $msg );
		echo CJson::encode( $json );
		exit;
	}

	//----------------------------------------------------------------
	// getThisPageURL
	//----------------------------------------------------------------
	function getThisPageURL() {

		$pageURL = 'http';

		if (( isset($_SERVER["HTTPS"]) ) && ( $_SERVER["HTTPS"] == "on" )) {
			$pageURL .= "s";
		}
		$pageURL .= "://" . $_SERVER["SERVER_NAME"];

		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= ":" . $_SERVER["SERVER_PORT"];
		}

		$pageURL .= $_SERVER['SCRIPT_NAME'];

		return $pageURL;
	}

	//----------------------------------------------------------------
	// sanitizeFilename
	//----------------------------------------------------------------
	static function sanitizeFilename( $str ) {
		$str = substr( $str, 0, 255 );

		$res = '';
		$len = strlen( $str );
		for( $i = 0; $i < $len; $i++ ) {
			$ch = mb_substr( $str, $i, 1 );
			if (
				ctype_alnum( $ch ) ||
				( $ch == '_' ) ||
				( $ch == '-' )
			) {
				$res .= $ch;
			} else {
				$res .= '-';
			}
		}
		return $res;
	}

	//----------------------------------------------------------------
	// loadTClassFile
	//----------------------------------------------------------------
	function loadTClassFile( $fn ) {
		$path1 = $this->path_tclass . $fn;
		if ( file_exists( $path1 ) ) {
			$path = $path1;
		} else {
			$path2 = $this->path_base_tclass . $fn;
			if ( file_exists( $path2 ) ) {
				$path = $path2;
			} else {
				$this->fatalError( "file ({$fn}) does not exist{$path1}" );
			}
		}
		include( $path );
	}

	//----------------------------------------------------------------
	// run
	//----------------------------------------------------------------
	function run() {
		//-- load configurations
		$_cfg =& self::$cfg_params;
		require( dirname(dirname(__FILE__)) .
			'/app.config/config.env.inc.php' );

		//-- url
		$this->url_app_entry = $this->getThisPageURL();
		if ( defined( 'URL_APP_ROOT' ) ) {
			$this->url_app_root = URL_APP_ROOT;
		} else {
			$this->url_app_root = dirname($this->url_app_entry) . '/';
		}

		$this->url_app_img = $this->url_app_root . FOLDER_APP_IMG . '/';

		//-- path
		$this->path_app_root = dirname(dirname(__FILE__)) . '/';

		//-- js params
		$this->app_object_selector = APP_OBJECT_SELECTOR;
		$this->app_init_cmd = APP_INIT_CMD;

		//-- run
		if ( isset( $_REQUEST['cmd'] ) ) {

			//-- tclass name
			if ( isset( $_REQUEST[APP_CLASS_TAG] ) && !empty( $_REQUEST[APP_CLASS_TAG] ) ) {
				$this->tclass = $this->sanitizeFilename( $_REQUEST[APP_CLASS_TAG] );
			} else {
				$this->tclass = APP_DEFAULT_TCLASS;
			}

			//-- tid name
			if ( isset( $_REQUEST[APP_ID_TAG] ) && !empty( $_REQUEST[APP_ID_TAG] ) ) {
				$this->tid = $this->sanitizeFilename( $_REQUEST[APP_ID_TAG] );
			} else {
				$this->tid = APP_DEFAULT_TID;
			}

			//-- app.data path
			$this->path_app_data = $_cfg['path-data'];

			//-- tclass path
			$this->path_tclass = $this->path_app_root . $this->tclass . "/"; 

			//-- base tclass
			$this->base_tclass = "ajax-poll";

			//-- base tclass folder
			$this->folder_base_tclass = "app." . $this->base_tclass;

			//-- base tclass path
			$this->path_base_tclass = $this->path_app_root . $this->folder_base_tclass . "/"; 

			//-- load CTClassApp
			$this->loadTClassFile( "class-app.inc.php" ); 

			//-- load CTClassBase
			$this->loadTClassFile( "class-base.inc.php" ); 

			//-- load CTClass
			$this->loadTClassFile( "class.inc.php" ); 

			//-- start-up
			$obj = new CTClass();
			$obj->run( $this );

		} else {
			header('Content-Type: application/javascript');
			include( PATH_APP_CODE . 'tclass.js.inc.php' );
		}
	}
}

$sys = new CTClassSys();
$sys->run();

?>