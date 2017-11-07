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

class CSystemBase {

	public static $cfg_params = array();
	public static $lng_front = array();
	public static $lng_info = array();
	public static $lng_requirements = array();

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

	function setup() {
		//-- load configurations
		$_cfg =& self::$cfg_params;
		require( dirname(dirname(dirname(__FILE__))) .
			'/app.config/config.env.inc.php' );

		//-- load front locale
		self::loadLang( "app.front", self::$lng_front );
		self::loadLang( "app.info", self::$lng_info );
		self::loadLang( "app.requirements", self::$lng_requirements );

		//-- params
		$this->tclass_name = TCLASS_NAME;
		$script_name = isset( $_SERVER['SCRIPT_NAME'] ) ? $_SERVER['SCRIPT_NAME'] : '';
		$this->url_tclass_root = dirname( $script_name ) . '/';
		$this->url_app_root = dirname( $this->url_tclass_root ) . '/';

		$this->app_title = self::$lng_info[ 'app:title' ];
		$this->app_version = "v" . self::$lng_info[ 'app:version' ];
		$this->app_tver = $this->app_title . ' ' . $this->app_version;
		$this->app_pid = self::$lng_info[ 'app:pid' ];

		$this->url_site = self::$lng_info[ 'app:homepage' ] . "?pid={$this->app_pid}";
		$this->title = $this->app_title;
	}

	//----------------------------------------------------------------
	// printHeadSection()
	//----------------------------------------------------------------
	function printHeadSection() {
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->title; ?></title>

<?php
		include( dirname(__FILE__) . "/style.inc.php" );
	}

	//----------------------------------------------------------------
	// printTitle()
	//----------------------------------------------------------------
	function printTitle() {
?>

<div class='pd-pid'><?php echo $this->app_pid; ?></div>
<div class='clear'></div>
<div class='article-title'><?php echo $this->app_tver; ?></div>
<div class='tclass-name'><?php echo $this->tclass_name; ?></div>
<div class='clear'></div>

<?php
	}

	//----------------------------------------------------------------
	// printTClass()
	//----------------------------------------------------------------
	function printTClass() {
?>
<?php
	}

	//----------------------------------------------------------------
	// printHeader()
	//----------------------------------------------------------------
	function printHeader() {
?>

<div id='page-header'>
	<div class='page-title'><?php echo $this->title; ?></div>
	<a class='site-link' href='<?php echo $this->url_site; ?>' target='_blank'>phpkobo &gt;&gt;</a>
	<div class='clear'></div>
</div>

<?php
	}

	//----------------------------------------------------------------
	// printFooter()
	//----------------------------------------------------------------
	function printFooter() {
?>

<div id='page-footer'>
	<a class='top-link' href='#top'>TOP</a>
	<div class='copyright'>©2013-2016 phpkobo. All Rights Reserved</div>
	<div class='clear'></div>
</div>

<?php
	}

	//----------------------------------------------------------------
	// printSectTitle()
	//----------------------------------------------------------------
	function printSectTitle( $title ) {
		$title = htmlspecialchars( $title );
		echo "<div class='sect-title'>{$title}</div>";
	}

	//----------------------------------------------------------------
	// printSourceCode()
	//----------------------------------------------------------------
	function printSourceCode( $txt ) {
		$txt = $this->enc( $txt );
		echo "<pre class='doc-code'>{$txt}</pre>";
	}

	//----------------------------------------------------------------
	// printHTML()
	//----------------------------------------------------------------
	function printHTML() {
?>
<!doctype html>
<html>
<head>
	<?php $this->printHeadSection(); ?>
</head>
<body>
	<div class='contents'>
		<?php $this->printHeader(); ?>
		<div class='article'>
			<?php $this->printArticle(); ?>
		</div>
		<?php $this->printFooter(); ?>
	</div>
</body>
</html>
<?php
	}

	//----------------------------------------------------------------
	// printFatalError()
	//----------------------------------------------------------------
	function printFatalError( $msg ) {

		if ( is_array( $msg ) ) {
			$msg = implode( "<br/>", $msg );
		}

		$s = "";
		$s .= "<div style='margin:30px auto 0 auto;width:500px;padding:20px;font-size:18px;";
		$s .= "color:#ff0000;font-weight:bold;text-align:left;'>";
		$s .= "<div style='margin-bottom:20px;font-style:italicx;color:#808080;font-size:40px;'>";
		$s .= self::$lng_requirements[ 'err:oops' ] . "</div>";
		$s .= $msg;
		$s .= "</div>";
		echo $s;
	}

	//----------------------------------------------------------------
	// checkAppDataFolder()
	//----------------------------------------------------------------
	function checkAppDataFolder() {
		if ( !$this->checkPermission( "rw", self::$cfg_params['path-data'] ) ) {
			echo "<div style='font-size:20px;'>";
			echo self::$lng_requirements[ 'err:permissions' ];
			echo "</div>";
			throw new Exception( 'failed in checkAppDataFolder()' );
		}
	}

	//----------------------------------------------------------------
	// checkPermission
	//----------------------------------------------------------------
	function checkPermission( $ptype, $path ) {
		$msg = array();

		if ( strpos( $ptype, 'r' ) !== false ) {
			if ( !is_readable( $path ) ) {
				$verb = "read";
				$msg[] = self::$lng_requirements[ 'err:cannot-read' ] . " ( {$path} ).";
			}
		}

		if ( strpos( $ptype, 'w' ) !== false ) {
			if ( !is_writeable( $path ) ) {
				$verb = "write";
				$msg[] = self::$lng_requirements[ 'err:cannot-write' ] . " ( {$path} ).";
			}
		}

		$b_success = ( count( $msg ) == 0 );

		if ( !$b_success ) {
			$this->printFatalError( $msg );
		}

		return $b_success;
	}

	//----------------------------------------------------------------
	// checkVersion()
	//----------------------------------------------------------------
	function checkVersion() {
		$ver_req = "5.2";
		$ver_cur = phpversion();
		if ( strnatcmp( $ver_cur, $ver_req ) >= 0 ) { 
			# equal or newer 
		} else  { 
			$msg = self::$lng_requirements[ 'err:php-version' ];
			$msg = str_replace( '#ver_req#', $ver_req, $msg );
			$msg = str_replace( '#ver_cur#', $ver_cur, $msg );
			$this->printFatalError( $msg );
			throw new Exception( 'failed in checkVersion()' );
		}
		return true;
	}

	//----------------------------------------------------------------
	// checkMbString()
	//----------------------------------------------------------------
	function checkMbString() {
		if ( !function_exists( 'mb_strlen' ) ) { 
			$msg = self::$lng_requirements[ 'err:mb-string' ];
			$this->printFatalError( $msg );
			throw new Exception( 'failed in checkMbString()' );
		}
	}

	//----------------------------------------------------------------
	// enc()
	//----------------------------------------------------------------
	//=================================================================
	// enc( $txt );
	//
	// [aaa%]...[aaa] ==> <span class='aaa'>...</span>
	// [aaa#]...[aaa] ==> <div class='aaa'>...</div>
	//
	function enc2( $txt, $pattern ) {
		preg_match_all($pattern, $txt, $matches );
		if ( count($matches) == 2 )
		{
			foreach( $matches[1] as $v )
			{
				$type = substr( $v, -1, 1 );
				$name = substr( $v, 0, strlen($v)-1 );
				switch ( $type )
				{
				case '%': $tag = 'span'; break;
				case '#': $tag = 'div'; break;
				}
				$tag_open = "<{$tag} class='{$name}'>";
				$tag_close = "</{$tag}>";
				$txt = str_replace( "[{$v}]", $tag_open, $txt );
				$txt = str_replace( "[{$name}]", $tag_close, $txt );
			}
		}
		return $txt;
	}

	function enc( $txt ) {
		$txt = htmlspecialchars( $txt );
		$txt = $this->enc2( $txt, '/\[(\w+%)\]/' );
		$txt = $this->enc2( $txt, '/\[(\w+#)\]/' );
		return $txt;
	}

	//----------------------------------------------------------------
	// run()
	//----------------------------------------------------------------
	function run() {
		$this->printHTML();
	}
}

?>