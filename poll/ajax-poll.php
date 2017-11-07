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

//----------------------------------------------------------------
// reverse magic_quote effect
//----------------------------------------------------------------
if ( get_magic_quotes_gpc() ) {

	function stripslashes_deep( $value ) {
		$value = is_array( $value ) ?
			array_map( 'stripslashes_deep', $value ) :
			stripslashes( $value );
		return $value;
	}

	$_POST = array_map( 'stripslashes_deep', $_POST );
	$_GET = array_map( 'stripslashes_deep', $_GET );
	$_COOKIE = array_map( 'stripslashes_deep', $_COOKIE );
	$_REQUEST = array_map( 'stripslashes_deep', $_REQUEST );
}

//----------------------------------------------------------------
// URL_APP_ROOT
//----------------------------------------------------------------
//
// Specifies the url that points to the root folder of this
// application. Set it only when this entry page is placed
// outside of the application folder.
//
// (default) Commented out for automatic detection
//

//define( 'URL_APP_ROOT', '' );

//-- jQuery selector to be processed
define( 'APP_OBJECT_SELECTOR', '.ajax-poll' );

//-- default tclass value
define( 'APP_DEFAULT_TCLASS', 'app.ajax-poll' );

//-- default tid value
define( 'APP_DEFAULT_TID', 'def' );

//-- start-up command from client side
define( 'APP_INIT_CMD', 'init' );

//-- the permission to be assigned for a new tclass data folder 
define( 'TCLASS_DATA_FOLDER_PERMISSION', 0777 );

//----------------------------------------------------------------
// Start-Up
//----------------------------------------------------------------

include( dirname(__FILE__) . "/app.code/common.inc.php" );

?>