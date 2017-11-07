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
.%tclass% table {
}
.%tclass% label {
	margin:2px 0;
	font-style:normal;
	font-weight:normal;
}
.%tclass% button {
	color:black;
}
/* [END] CSS Reset */

.%tclass%,
.%tclass% button {
	font-family: "Verdana", "Arial", "Helvetica", "serif";
}

.%tclass% {
	box-sizing:content-box;
	position:relative;
	overflow:hidden;
}

.%tclass% .poll-inner {
	position:relative;

	margin:20px;
	margin-bottom:0;
	padding:0;
	font-size:12px;
	color:#FFE57A;
	letter-spacing:normal;
	line-height: normal;
	word-spacing: 0px;
}

.%tclass% .poll-form {
	margin:0;
}

.%tclass% .poll-title {
	margin-bottom:20px;
	padding:0;
	text-align:center;

	color:black;
	font-weight:bold;
	font-size:36px;
	line-height:40px;
	color:#FFE57A;
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
	color:#FFE57A;
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
	height:12px;
	background-color:#FFE57A;

	-moz-border-radius: 0px;
	-webkit-border-radius: 0px;
	-khtml-border-radius: 0px;
	border-radius: 0px;
}

.%tclass% .poll-button {
	right:0px;
	top:0px;
	width:40%;
	height:40px;
	color:#FFE57A;
	font-weight:bold;
	font-size:12px;
	background-color:#362A0B;
	border:1px solid #FFC90D;
	border-radius:0px;
	cursor:pointer;
}

.%tclass% .poll-button:focus {
	outline: 0;
}

.%tclass% .poll-time-msg {
	color:#000000;
	text-align:center;
	font-weight:bold;
	margin-bottom:20px;
	padding:3px 0;

	border:1px solid #000000;
	-moz-border-radius: 0px;
	-webkit-border-radius: 0px;
	-khtml-border-radius: 0px;
	border-radius: 0px;
}

.%tclass% .ap-clear-block {
	position:static;
	right:0px;
	top:0px;
	width:80%;
	height:40px;
	color:#FFE57A;
	font-weight:bold;
	font-size:12px;
	background-color:#362A0B;
	border:1px solid #FFC90D;
	border-radius:0px;
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
	background-color:transparent;
}
.%tclass% .poll-tipbox .poll-tipbox-selectone,
.%tclass% .poll-tipbox .poll-tipbox-havevoted,
.%tclass% .poll-tipbox .poll-tipbox-thankyou {
	margin:0;
	padding:5px 5px;

	text-align:center;
	font-size:12px;
	font-weight:normal;
	font-style:normal;

	color:#704A00;
	background-color:#FFC90D;
	border:0 solid transparent;
	border-width:5px 0;

	-moz-box-shadow: 0px 0px 0px #000;
	-webkit-box-shadow: 0px 0px 0px #000;
}
.%tclass% .poll-tipbox .poll-tipbox-selectone {
	background-color:#FFE57A;
}
.%tclass% .poll-tipbox .poll-tipbox-havevoted {
	background-color:#FFC90D;
}
.%tclass% .poll-tipbox .poll-tipbox-thankyou {
	background-color:#FFC90D;
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
	width:15px;
	height:15px;
	border-radius:15px;
	vertical-align:middle;
	text-align:center;
	cursor:pointer;
	background-color:#704A00;
}
.%tclass% .poll-input-inner {
	margin:10%;
	padding:0;
	width:10px;
	height:10px;
	background-color:#FFE57A;
	border-radius:2px;
}
.%tclass% .poll-input-cont-on,
.%tclass% .poll-input-inner-on {
	background-color:#FFE57A;
}
.%tclass% .poll-input-mark {
	pointer-events:none;/* for IE11 */
	width:10px;
	height:10px;
	visibility:hidden;
}
.%tclass% .poll-input-mark-on {
	visibility:visible;
}
.%tclass% .poll-input-img {
	display:none;
}
</style>
_EOM_;
$this->addStyle($style);

?>
