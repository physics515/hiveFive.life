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

$_lng[ 'err:oops' ] = "(o_o)...Oops! ";

$_lng[ 'err:cannot-read' ] = "Access Denied: read permisson is required.";
$_lng[ 'err:cannot-write' ] = "Access Denied: write permisson is required.";
$_lng[ 'err:permissions' ] =<<<_EOM_
<p>Well, it looks like your data folder [app.data] doesn't have proper permissions for reading and/or writing.</p>
<p>But don't panic. This is not the end of the world!</p>
<p>Just give the read and write permissions to the path shown above, and then refresh this page.</p>
<p>Everything is gonna be just fine!</p>
_EOM_;


$_lng[ 'err:php-version' ] = 
	"This script requires PHP #ver_req# or later\r\n" . 
	"Unfortunately, your PHP version is #ver_cur#.\r\n" . 
	"Please upgrade your PHP and try again!";

$_lng[ 'err:mb-string' ] = 
	"This script requires Multibyte Support (mbstring) extension.\r\n" .
	"Unfortunately, it's not installed in your PHP.\r\n" .
	"Please install it and try again!";

?>