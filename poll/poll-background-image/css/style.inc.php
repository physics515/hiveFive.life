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
// <style>
//----------------------------------------------------------------
$style=<<<_EOM_
<style>
/* [BEGIN] CSS Reset */
.%tclass% tbody,
.%tclass% tfoot,
.%tclass% thead,
.%tclass% tr,
.%tclass% th,
.%tclass% td {
	margin:0;
	padding:0;
	border:0;
	font-size:100%;
	font-style:normal;
	font-weight:normal;
	vertical-align:middle;
	background-color:transparent;
	box-shadow:none;
}
.%tclass% img {
	margin:0;
	padding:0;
	border:0;
	background-color:transparent;
	box-shadow:none;
}
.%tclass% label {
	margin:0;
	padding:0;
	font-style:normal;
	font-weight:normal;
}
.%tclass% button {
	color:black;
}
/* [END] CSS Reset */

.%tclass%,
.%tclass% a,
.%tclass% button {
	font-family: "Verdana", "Arial", "Helvetica", "serif";
}

.%tclass% {
	box-sizing:content-box;
	position:relative;
	overflow:hidden;

	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-khtml-border-radius: 10px;
	border-radius: 10px;

	background-color:rgba(0,0,0,0.8);
}
.%tclass% .poll-inner {
	position:relative;

	margin:20px;
	margin-bottom:0;
	padding:0;
	font-size:16px;
	color:white;
	letter-spacing:normal;
	line-height: normal;
	word-spacing: 0px;
}
.%tclass% .poll-form {
	margin:0;
	padding:0;
}

.%tclass% .poll-title {
	margin-bottom:20px;
	padding:0;
	text-align:center;

	color:#ffe;
	font-weight:bold;
	font-size:18px;
	line-height:20px;
}

.%tclass% .poll-table {
	margin:0 auto;
	border-collapse:collapse;
}

.%tclass% .poll-table tr {
}

.%tclass% .poll-table td {
	margin:0;
	padding:0;
	font-size:16px;
	color:white;
	*border:1px solid transparent;
	vertical-align:middle;
}

.%tclass% .poll-table td.poll-caption-cont {
	padding:10px;
	padding-right:0;
}

.%tclass% .poll-bar {
	display:none;
	width:0;
	height:0.4em;
	background-color:rgba(234,111,22,0.7);
	box-shadow:0 0 20px 1px #fff;

	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	-khtml-border-radius: 2px;
	border-radius: 2px;
}

.%tclass% .poll-button {
	margin:0 auto;
	padding:0;
	width:150px;
	font-size:20px;
	font-weight:bold;
	border-radius:10px;
	color:white;
	text-shadow:3px 3px 3px black;
	border:3px solid rgba(255,255,255,0.0);
	cursor:pointer;
}

.%tclass% .poll-button:focus {
	outline: 0;
}

.%tclass% .poll-button:active {
	text-shadow:none;
	position:relative;
	top:2px;
	left:2px;
}

.%tclass% .poll-link:link,
.%tclass% .poll-link:visited {
	cursor:pointer;
	color:white;
	font-size:12px;
	text-decoration:none;
}

.%tclass% .poll-link:hover,
.%tclass% .poll-link:active {
	color:yellow;
	text-decoration:underline;
}

.%tclass% .poll-time-msg {
	color:yellow;
	text-align:center;
	font-weight:bold;
	margin-bottom:20px;
	padding:3px 0;

	border:1px solid yellow;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	-khtml-border-radius: 3px;
	border-radius: 3px;
}

.%tclass% .ap-clear-block {
	position:absolute;
	right:15px;
	bottom:0;
	height:16px;
	color:black;
	font-size:8px;
	background-color:#eee;
	border:1px solid #aaa;
	border-bottom-width:0;
	border-radius:10px 10px 0 0;
	cursor:pointer;
}

/*-- tipbox --*/
.%tclass% .poll-tipbox {
	box-sizing:content-box;
	z-index:10000;
	display:none;
	position:absolute;
	top:0;
	left:0;
	margin:0;
	padding:0
	background-color:yellow;
}
.%tclass% .poll-tipbox .poll-tipbox-selectone,
.%tclass% .poll-tipbox .poll-tipbox-havevoted,
.%tclass% .poll-tipbox .poll-tipbox-thankyou {
	margin:0;
	padding:10px 15px;

	text-align:center;
	font-size:16px;
	font-weight:normal;
	font-style:normal;

	color:#fff;
	background-color:#080;
	border:2px solid #cfcfcf;

	-moz-border-radius: 15px;
	-webkit-border-radius: 15px;
	border-radius: 15px;

	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
}
.%tclass% .poll-tipbox .poll-tipbox-selectone {
	background-color:rgba(0,0,0,0.6);
}
.%tclass% .poll-tipbox .poll-tipbox-havevoted {
	background-color:rgba(255,0,0,0.8);
}
.%tclass% .poll-tipbox .poll-tipbox-thankyou {
	background-color:rgba(0,128,0,0.8);
}

/*-- checkbox --*/
.%tclass% .poll-input {
	display:none;
}
.%tclass% .poll-input-cont {
	position:relative;
	display:inline-block;
	*zoom:1;
	*display:inline;
	margin:0;
	padding:0;
	width:35px;
	height:35px;
	border-radius:5px;
	vertical-align:middle;
	text-align:center;
	cursor:pointer;
	background-color:rgba(0,0,0,0.2);
}
.%tclass% .poll-input-inner {
	margin:20%;
	padding:0;
	width:60%;
	height:60%;
	background-color:rgba(255,255,255,0.4);
	border-radius:2px;
}
.%tclass% .poll-input-inner-on {
	visibility:hidden;
}
.%tclass% .poll-input-mark {
	pointer-events:none;/* for IE11 */
	width:100%;
	height:100%;
	visibility:hidden;
}
.%tclass% .poll-input-mark-on {
	opacity:1;
	visibility:visible;
}
.%tclass% .poll-input-img {
	display:none;
}

</style>
_EOM_;
$this->addStyle($style);

?>
