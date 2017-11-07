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

//-- reverse magic_quote effect
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

//-- find tclass name
define( 'TCLASS_NAME', substr( PATH_TCLASS, strlen( dirname( PATH_TCLASS ) ) + 1, -1 ) );

//-- cp include
define( 'FOLDER_CPINCLUDE', 'cp.include' );
include( dirname(__FILE__) . "/" . FOLDER_CPINCLUDE . "/common.inc.php" );

//----------------------------------------------------------------
// CSystem
//----------------------------------------------------------------
class CSystem extends CSystemBase
{
	//----------------------------------------------------------------
	// setup()
	//----------------------------------------------------------------
	function setup()
	{
		parent::setup();
		$this->base_tclass = "ajax-poll";
	}

	//----------------------------------------------------------------
	// printHeadSection()
	//----------------------------------------------------------------
	function printHeadSection()
	{
		parent::printHeadSection();
?>
	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="../ajax-poll.php"></script>
<?php
	}

	//----------------------------------------------------------------
	// printArticle()
	//----------------------------------------------------------------
	function printArticle()
	{
		try 
		{
			$this->checkVersion();
			$this->checkMbString();
			$this->checkAppDataFolder();
			$this->printTitle();
			$this->printTClass();
			$this->sectPreview();
			$this->sectAddPollToWebPage();
		}
		catch( Exception $e )
		{

		}
	}

	//----------------------------------------------------------------
	// sectPreview()
	//----------------------------------------------------------------
	function sectPreview()
	{
?>

<?php $this->printSectTitle( self::$lng_front["preview:title"] ); ?>

<?php
	//-- [BEGIN] width control
	if ( isset($_REQUEST['width']) ) {
		$width = intval($_REQUEST['width']);
		if ( $width <= 0 ) {
			$width = 320;
		}
	} else {
		$width = 450;
		$_REQUEST['specify-width'] = 'Y';
	}

	$specify_width = "";
	$width_str = "";
	$this->width_str2 = "";
	if ( isset($_REQUEST['specify-width']) && ($_REQUEST['specify-width'] == 'Y')) {
		$specify_width = "checked";
		$width_str = "width:{$width}px;";
		$this->width_str2 = " style='width:{$width}px;'";
	}
	//-- [END] width control
?>

<div class='<?php echo $this->base_tclass; ?>' tclass='<?php echo $this->tclass_name; ?>' style='margin:0 auto;<?php echo $width_str; ?>'></div>

<!-- [BEGIN] width control -->
<script>
(function($){
	$(document).ready(function(){
		var form = $('#width-form');
		var swidth = form.find('input:checkbox[name="specify-width"]');

		function specify_width(){
			if ( swidth.is(':checked') ) {
				$('#width-box').show();
			} else {
				$('#width-box').hide();
			}
		}

		swidth.change(function(){
			specify_width();
		});

		specify_width();

	})
}(jQuery));
</script>

<div style='
	margin:40px 0 0 0;
	padding:15px;
	border:1px solid #888;
	border-radius:5px;
	text-align:left;
	background-color:#eee;
'>

	<form id='width-form' action='index.php' method='post'>
		<label><input type='checkbox' name='specify-width' value='Y' <?php echo $specify_width; ?>>
			<?php echo self::$lng_front["preview:specify-width"]; ?></label>
		<span id='width-box'>
			<input type='text' name='width' value='<?php echo $width; ?>' size='5' style='text-align:right;'> px
		</span>
		<input type='submit' value='<?php echo self::$lng_front["preview:update"]; ?>'/>
	</form>
	<div style='margin:10px 0 0 0;padding:0 10px;font-size:90%;font-style:italic;'>
	<?php echo self::$lng_front["preview:note"]; ?>
	</div>
</div>
<!-- [END] width control -->

<?php

	}

	//----------------------------------------------------------------
	// sectAddPollToWebPage()
	//----------------------------------------------------------------
	function sectAddPollToWebPage()
	{
?>

<?php $this->printSectTitle( self::$lng_front["install:title"] ); ?>

<p>
<?php echo self::$lng_front["install:step1"]; ?>
</p>


<?php
		$txt=<<<_EOM_
[gray%]<head>
...
...[gray]
[hlls#]<script type="text/javascript" src="{$this->url_app_root}jquery.js"></script>
<script type="text/javascript" src="{$this->url_app_root}ajax-poll.php"></script>[hlls][gray%]...
...
</head>[gray]
_EOM_;
		$this->printSourceCode( $txt );
?>

<p><br/></p>

<p>
<?php echo self::$lng_front["install:step2"]; ?>
</p>

<p><?php echo self::$lng_front["install:step2.2"]; ?></p>

<?php
		$class = $this->base_tclass;
		$txt=<<<_EOM_
[gray%]<body>
...
...[gray]
[hlls#]<div class='{$class}' tclass='{$this->tclass_name}'{$this->width_str2}></div>[hlls][gray%]...
...
</body>[gray]
_EOM_;
		$this->printSourceCode( $txt );
?>

<p><br/></p>

<p>
<span class='step-number'><?php echo self::$lng_front["install:note:title"]; ?></span>
<?php echo self::$lng_front["install:note:text"]; ?></p>

<?php
		$class = $this->base_tclass;
		$txt=<<<_EOM_
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
[hlls%]<script type="text/javascript" src="{$this->url_app_root}jquery.js"></script>
<script type="text/javascript" src="{$this->url_app_root}ajax-poll.php"></script>[hlls]
</head>
<body>
[hlls%]<div class='{$class}' tclass='{$this->tclass_name}'{$this->width_str2}></div>[hlls]
</body>
</html>
_EOM_;
		$this->printSourceCode( $txt );
	}

	//----------------------------------------------------------------
	// END OF SECT
	//----------------------------------------------------------------
}

?>