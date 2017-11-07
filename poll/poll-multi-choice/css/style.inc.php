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
.%tclass% button {
	font-family: "Verdana", "Arial", "Helvetica", "serif";
}

.%tclass% {
	box-sizing:content-box;
	position:relative;
	overflow:hidden;

	-moz-box-shadow:    3px 3px 5px 2px #ccc;
	-webkit-box-shadow: 3px 3px 5px 2px #ccc;
	box-shadow:         3px 3px 5px 2px #ccc;

	border:0;
	-moz-border-radius: 0px;
	-webkit-border-radius: 0px;
	-khtml-border-radius: 0px;
	border-radius: 0px;

	/* for webkit browsers */
	background: -webkit-gradient(linear, left top, left bottom, from(#362A0B), to(#362A0B)); 
	/* for firefox 3.6+ */
	background: -moz-linear-gradient(top,  #362A0B,  #362A0B); 
	/* for IE */
	background: -ms-linear-gradient(top,  #362A0B, #362A0B);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#362A0B', endColorstr='#362A0B'); 

	/* for opera */

	background-image: -o-linear-gradient(-90deg, #362A0B, #362A0B);
	/* catch all */
	background-color:#362A0B;
}
.%tclass% .poll-inner {
	position:relative;

	margin:20px;
	margin-bottom:0;
	padding:0;
	text-align: left;
	font-size:16px;
	color:#FFE57A;
	letter-spacing:normal;
	line-height: normal;
	word-spacing: 0px;
}

.%tclass% .poll-title {
	margin-bottom:20px;
	padding:0;
	text-align:center;

	color:#FFE57A;
	font-weight:bold;
	font-size:12px;
	line-height:20px;
}

.%tclass% .poll-bar {
	display:none;
	width:0;
	height:6px;
	background-color:#5cb9fb;
	box-shadow:2px 2px 5px 0 #3e7fac;

	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	-khtml-border-radius: 2px;
	border-radius: 2px;
}

.%tclass% .poll-button {
	cursor:pointer;
	color:white;
	border:0;
	margin:0;
	padding:10px;
	width:130px;

	-moz-box-shadow: rgba(0, 0, 0, 0.277344) 0px 0px 13px 2px;
	-webkit-box-shadow: rgba(0, 0, 0, 0.277344) 0px 0px 13px 2px;
	box-shadow: rgba(0, 0, 0, 0.277344) 0px 0px 13px 2px;

	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-khtml-border-radius: 10px;
	border-radius: 10px;

	/* for webkit browsers */
	background: -webkit-gradient(linear, left top, left bottom, from(#265AC5), to(#5DBBFC)); 
	/* for firefox 3.6+ */
	background: -moz-linear-gradient(top,  #265AC5,  #5DBBFC); 
	/* for IE */
	background: -ms-linear-gradient(top,  #265AC5, #5DBBFC);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#265AC5', endColorstr='#5DBBFC'); 
	/* for opera */
	background-image: -o-linear-gradient(-90deg, #265AC5, #5DBBFC);
	/* catch all */
	background-color:#265AC5;
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

.%tclass% .poll-item {
	border:0;
	margin:0;
	padding:3px;
	padding-top:4px;
	padding-left:8px;

	color:white;
	font-size:16px;
	line-height:20px;
}

.%tclass% .poll-item input {
	margin-top: 0px;
	vertical-align: middle;
}

.%tclass% .poll-item-sel {

	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-khtml-border-radius: 10px;
	border-radius: 10px;

	/* for webkit browsers */
	background: -webkit-gradient(linear, left top, left bottom, from(#265AC5), to(#5DBBFC)); 
	/* for firefox 3.6+ */
	background: -moz-linear-gradient(top,  #265AC5,  #5DBBFC); 
	/* for IE */
	background: -ms-linear-gradient(top,  #265AC5, #5DBBFC);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#265AC5', endColorstr='#5DBBFC'); 
	/* for opera */
	background-image: -o-linear-gradient(-90deg, #265AC5, #5DBBFC);
	/* catch all */
	background-color:#265AC5;
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
	padding:10px 20px;

	text-align:center;
	font-size:18px;
	font-weight:normal;
	font-style:normal;

	color:#fff;
	background-color:#888;

	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;

	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
}
.%tclass% .poll-tipbox .poll-tipbox-selectone {
	background-color:rgba(0,0,0,0.5);
}
.%tclass% .poll-tipbox .poll-tipbox-havevoted {
	background-color:rgba(255,0,0,0.5);
}
.%tclass% .poll-tipbox .poll-tipbox-thankyou {
	background-color:rgba(0,128,0,0.7);
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
}
.%tclass% .poll-input-inner {
	margin:20%;
	padding:0;
	width:60%;
	height:60%;
	background-color:white;
	border-radius:2px;
}
.%tclass% .poll-input-cont-on,
.%tclass% .poll-input-inner-on {
	background-color:#5cb9fb;
}
.%tclass% .poll-input-mark {
	pointer-events:none;/* for IE11 */
	width:100%;
	height:100%;
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
