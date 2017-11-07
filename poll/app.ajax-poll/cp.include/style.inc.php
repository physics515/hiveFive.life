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
?>
<style>
body {
	font-family:'Lucida Grande','Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
	font-size: 16px;
	margin:0;
	padding:0;
} 

input, select, textarea {
	font-family:'Lucida Grande','Hiragino Kaku Gothic ProN', Meiryo, sans-serif;
}

input:focus, select:focus, textarea:focus { background-color: #F2FAFD;}

p {
	padding: 0;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
}

#contents {
	margin:0px auto;
}

.clear {
	clear:both;
}
</style>

<style>
/*-- [BEGIN] Product --*/
.pd-pverx {
	float:right;
	padding:3px 10px 3px 10px;
	color:gray;
	font-weight:bold;
}

.pd-pid {
	float:left;
	margin-right:5px;

	padding:3px 10px 3px 10px;
	color:white;
	background-color:#d0d0d0;
	font-weight:bold;

	-moz-border-radius: 0 0 5px 5px;
	-webkit-border-radius: 0 0 5px 5px;
	-khtml-border-radius: 0 0 5px 5px;
	border-radius: 0 0 5px 5px;
}
/*-- [END] Product --*/
</style>

<style>
*html #page-header {
	width:100%;
}

#page-header {
	padding:10px 20px;

	background-color:#3e83c9;
	/* for IE */
	background: -ms-linear-gradient(top, #3e83c9, #9bbee2);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3e83c9', endColorstr='#9bbee2'); 
	/* for webkit browsers */
	background: -webkit-gradient(linear, left top, left bottom, from(#3e83c9), to(#9bbee2)); 
	/* for firefox 3.6+ */
	background: -moz-linear-gradient(top,  #3e83c9,  #9bbee2); 
	/* for opera */
	background-image: -o-linear-gradient(90deg, #9bbee2,  #3e83c9);
}
	.page-title {
		float:left;
		color:white;
		font-weight:bolder;
		font-size:26px;
		font-style:italic;
	}

	.site-link {
		float:right;
		color:white;
		font-weight:normal;
		font-size:13px;
		font-style:italic;
		text-decoration:none;
		padding-top:4px;
	}

*html #page-footer {
	width:100%;
}

#page-footer {
	padding:5px 20px;
	background-color:#3e83c9;

	/* for IE */
	background: -ms-linear-gradient(top, #9bbee2, #3e83c9);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9bbee2', endColorstr='#3e83c9'); 
	/* for webkit browsers */
	background: -webkit-gradient(linear, left top, left bottom, from(#9bbee2), to(#3e83c9)); 
	/* for firefox 3.6+ */
	background: -moz-linear-gradient(top,  #9bbee2,  #3e83c9); 
	/* for opera */
	background-image: -o-linear-gradient(90deg, #9bbee2,  #3e83c9);
}
	.top-link {
		float:left;
		color:white;
		font-weight:normal;
		font-size:13px;
		padding-top:5px;
		text-decoration:none;
	}

	.copyright {
		float:center;
		color:white;
		padding-top:3px;
		font-size:12px;
		text-align:center;
		font-style:italic;
	}
</style>

<style>
.article { /* total width = 800 = 760 + 20 + 20 */
	margin:30px auto;
	padding:0 20px 20px 20px;
	width:760px;
	border:1px solid #c0c0c0;
}

.article-title {
	margin:20px 0 0px 0;
	float:left;
	color:#808080;
	font-weight:bold;
	text-align:left;
	padding:5px 10px;
	font-size:28px;
}

*html .sect-title {
	width:100%
}

.sect-title {
	margin:40px 0 30px 0;
	background-color:#3e83c9;
	color:white;
	font-weight:bold;
	text-align:left;
	padding:7px 20px;
	font-size:16px;

	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-khtml-border-radius: 10px;
	border-radius: 10px;

	background-color:#3e83c9;
	/* for ie */
	background: -ms-linear-gradient(top, #3e83c9, #9bbee2);
	filter: progid:DXImageTransform.Microsoft.gradient(GradientType=1, startColorstr='#3e83c9', endColorstr='#9bbee2'); 
	/* for webkit browsers */
	background: -webkit-gradient(linear, left top, right top, from(#3e83c9), to(#9bbee2)); 
	/* for firefox 3.6+ */
	background: -moz-linear-gradient(left, #3e83c9, #9bbee2); 
	/* for opera */
	background-image: -o-linear-gradient(0deg, #3e83c9, #9bbee2);
}

.step-number {
	margin:0 10px 0 10px;
	padding:0px 10px;
	color:white;
	font-weight:bold;

	background-color:#3e83c9;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px
}
.doc-name {
	font-weight:bold;
}
.doc-kw {
	color:#008000;
	font-weight:bold;
}
.doc-path {
	color:#008000;
	font-weight:bold;
}
.doc-code {
	margin:0 auto;
	width:680px;
	border:1px solid #c0c0c0;
	-moz-box-shadow:    3px 3px 5px 2px #ccc;
	-webkit-box-shadow: 3px 3px 5px 2px #ccc;
	box-shadow:         3px 3px 5px 2px #ccc;

	padding:20px 20px;
	font-family :"courier";
	font-size:14px;
	overflow: auto;
	overflow-y: hidden;
	-ms-overflow-y: hidden;
}
.doc-note {
	color:#800000;
	font-weight:bold;
}
.tclass-name {
	margin:25px 0 0 10px;
	padding:5px 20px;
	float:right;
	color:#008000;
	border:1px solid #008000;
	background-color:#e0ffe0;

	-moz-border-radius: 20px;
	-webkit-border-radius: 20px;
	-khtml-border-radius: 20px;
	border-radius: 20px;
}
</style>

<style>
.hlls {
	color:#3e83c9;
	font-weight:bold;
}
.bold {
	font-weight:bold;
}
.gray {
	color:#606060;
}
.bbk {
	font-weight:bold;
	color:white;
	background-color:#6060ff;
	padding:0 2px;
}
</style>
<?php /* -- END OF FILE -- */ ?>