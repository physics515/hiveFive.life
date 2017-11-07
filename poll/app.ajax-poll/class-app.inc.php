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

include( dirname(__FILE__) . '/include/common.inc.php' );

class CTClassApp extends CTClassObject {

	function setup( $sys ) {
		if ( !parent::setup( $sys ) ) { return false; }

		//-- setup data folder
		if ( !$this->setupDataFolder() ) { return false; }

		//-- setup poll & poll items
		$this->poll = new CPoll();
		if ( !$this->poll->setup( $sys, $this ) ) { return false; }
		if ( !$this->setupPoll( $this->poll ) ) { return false; }

		//-- Cookie Block
		$name = $this->getCookieBlockName();
		$this->ckblock = new CCookieBlock();
		$this->ckblock->setup( $name );

		//-- cmdpsec
		$this->cmdspec = array();
		if ( !$this->setupCmdSpec( $this->cmdspec ) ) { return false; }

		return true;
	}

	function checkCkBlock( $name = null ) {
		if ( $this->poll->attr( "enable-cookie-block" ) ) {
			if ( is_null( $name ) ) {
				return $this->ckblock->exists();
			} else {
				if ( $this->ckblock->exists() ) {
					return in_array( $name,
						explode( "\t", $this->ckblock->get() ) );
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}

	function setupDataFolder() {
		//-- check app data folder
		$path = $this->getAppDataPath();
		if ( !$this->checkPermission( "rw", $path ) ) {
			return false;
		}

		//-- tclass data folder exists?
		$path = $this->getDataFolderPath();
		if ( !file_exists( $path ) ) {
			@mkdir( $path );
			@chmod( $path, TCLASS_DATA_FOLDER_PERMISSION );
			if ( !file_exists( $path ) ) {
				$err_msg = "Can not create a folder in [app.data]";
				$this->showErrorMsg( $err_msg );
				return false;
			}
		}

		return true;
	}

	function setupCmdSpec( &$cmdspec ) {
		parent::setupCmdSpec( $cmdspec );

		if ( $this->poll->ended() ) {
			$cmdspec["init"] = "result";
		} else {
			$cmdspec["init"] = "front";
		}

		$cmdspec["front"] = array(
			"@hd_front",
			"tpl.front.inc.php",
			"js.front.inc.php",
		);

		$cmdspec["result"] = array(
			"@hd_result",
			"tpl.result.inc.php",
			"js.result.inc.php",
		);

		$cmdspec["vote"] = array(
			"@hd_vote",
			"tpl.result.inc.php",
			"js.result.inc.php",
		);

		$cmdspec["clear_block"] = array(
			"@hd_clear_block",
		);

		return true;
	}

	function addStyle( $style ) {
		$style = str_replace( "%tclass%", $this->getTClassName(), $style );
		$style = str_replace( "\r", "\\r", $style );
		$style = str_replace( "\n", "\\n", $style );
		$style = str_replace( "\"", "\\\"", $style );
		$s = "";
		$s .= "<script>(function(\$){";
		$s .= "\$('head').append( \"{$style}\" );";
		$s .= "}(jQuery));</script>";
		echo $s;
	}

	function checkDataFilePerm( $path ) {
		if ( !file_exists( $path ) ) {
			if ( is_writable( dirname($path) ) ) {
				touch( $path );
			} else {
				return $this->checkPermission( 'rw', dirname($path) );
			}
		}
		return $this->checkPermission( 'rw', $path );
	}

	function getIPBlockFilePath() {
		return $this->getDataFolderPath() . "ip-block.txt";
	}

	function getCookieBlockName() {
		return $this->getIdName() . ".cookie-block";
	}

	function hd_front( &$ret ) {
		return true;
	}

	function hd_result( &$ret ) {
		$this->poll->load();
		$this->poll->calcStats();
		return true;
	}

	function hd_vote( &$ret ) {

		//-- IP Block
		if ( $this->poll->attr( "enable-ip-block" ) ) {
			$path = $this->getIPBlockFilePath();
			if ( !$this->checkDataFilePerm( $path ) ) { return false; }

			$ipblock = new CIPBlock();
			$ipblock->setup( $path );
			if ( !$ipblock->validate() ) {
				$ret["cmd"] = "none";
				$ret["msg"] = array( "cmd" => "already_voted" );
				return false;
			}
		}

		//-- Cookie Block
		if ( $this->poll->attr( "enable-cookie-block" ) ) {
			$cookie_name = $this->getCookieBlockName();
			$cookie_block = new CCookieBlock();
			$cookie_block->setup( $cookie_name,
				$this->poll->attr( "cookie-block-period" ) );
			if ( !$cookie_block->validate() ) {
				$ret["cmd"] = "none";
				$ret["msg"] = array( "cmd" => "already_voted" );
				return false;
			}
		}

		//-- Load Data
		$this->poll->load(true);
		$this->poll->calcStats();

		//-- store choice in cookie
		if ( isset( $cookie_block ) ) {
			$answer = isset( $_REQUEST['answer'] ) ? $_REQUEST['answer'] : "";
			$answer = json_decode( $answer, true );
			$val = implode( "\t", $answer );
			$cookie_block->add( $val );
		}

		//-- return response
		$ret["msg"] = array( "cmd" => "thank_you" );
		return true;
	}

	function hd_clear_block( &$ret ) {
		$ret["cmd"] = "alert";

		if ( $this->poll->attr( "b-reset-block" ) ) {

			CTClassSys::loadLang('ajax.block',$lng);
			$msg_ip_block_reset = $lng[ 'msg:ip-block-reset' ];
			$msg_ip_block_not_reset = $lng[ 'msg:ip-block-not-reset' ];
			$msg_cookie_block_reset = $lng[ 'msg:cookie-block-reset' ];
			$msg_cookie_block_not_reset = $lng[ 'msg:cookie-block-not-reset' ];

			//-- IP Block
			$path = $this->getIPBlockFilePath();
			if ( !$this->checkDataFilePerm( $path ) ) return false;
			$ipblock = new CIPBlock();
			$ipblock->setup( $path );
			if ( $ipblock->clear() ) {
				echo $msg_ip_block_reset . "\r\n";
			} else {
				echo $msg_ip_block_not_reset . "\r\n";
			}

			//-- Cookie Block
			$cookie_name = $this->getCookieBlockName();
			$cookie_block = new CCookieBlock();
			$cookie_block->setup( $cookie_name,
				$this->poll->attr( "cookie-block-period" ) );
			if ( $cookie_block->clear() ) {
				echo $msg_cookie_block_reset . "\r\n";
			} else {
				echo $msg_cookie_block_not_reset . "\r\n";
			}
		} else {
			echo "Unauthorized Access\r\n";
		}

		return true;
	}
}

?>