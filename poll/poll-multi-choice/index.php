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

	define( 'PATH_TCLASS', dirname(__FILE__) . "/" );
	$path = dirname(dirname(__FILE__)) . "/app.ajax-poll/";
	if ( !file_exists( $path ) ) {
		echo "<h3>Please put this folder inside Ajax Poll Script folder!</h3>";
		exit;
	}
	include( $path . "cp.inc.php" );

//----------------------------------------------------------------
// CIndexPage
//----------------------------------------------------------------
class CIndexPage extends CSystem {

}

//----------------------------------------------------------------
// _main
//----------------------------------------------------------------
function _main() {
	$obj = new CIndexPage();
	$obj->setup();
	$obj->run();
}

//----------------------------------------------------------------
// start-up
//----------------------------------------------------------------
_main();

?>