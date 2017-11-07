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
// CTClassObject
//----------------------------------------------------------------
class CTClassObject
{
	//----------------------------------------------------------------
	// setup
	//----------------------------------------------------------------
	function setup( $sys )
	{
		$this->sys =& $sys;

		return true;
	}

	//----------------------------------------------------------------
	// setupCmdSpec
	//----------------------------------------------------------------
	function setupCmdSpec( &$cmdspec )
	{
	}

	//----------------------------------------------------------------
	// getTClassName()
	//----------------------------------------------------------------
	function getTClassName()
	{
		return $this->sys->tclass;
	}

	//----------------------------------------------------------------
	// getIdName()
	//----------------------------------------------------------------
	function getIdName()
	{
		return $this->sys->tclass . '.' . $this->sys->tid;
	}

	//----------------------------------------------------------------
	// getFolderUrl()
	//----------------------------------------------------------------
	function getFolderUrl()
	{
		$url = $this->sys->url_app_root . $this->sys->tclass . '/';
		return $url;
	}

	//----------------------------------------------------------------
	// getFolderPath()
	//----------------------------------------------------------------
	function getFolderPath()
	{
		return $this->path_tclass;
	}

	//----------------------------------------------------------------
	// getDataFolderPath()
	//----------------------------------------------------------------
	function getDataFolderPath()
	{
		return $this->getAppDataPath() . $this->getIdName() . '/';
	}

	//----------------------------------------------------------------
	// getAppDataPath()
	//----------------------------------------------------------------
	function getAppDataPath()
	{
		return $this->sys->path_app_data;
	}

	//----------------------------------------------------------------
	// showErrorMsg
	//----------------------------------------------------------------
	function showErrorMsg( $err_msg )
	{
		if ( is_array( $err_msg ) )
		{
			$err_msg = implode( "<br/>", $err_msg );
		}

		$msg = '';
		$msg .= "<!--(ERRBOX)-->";
		$msg .= "<div style='padding:0px;border:1px solid red;";
		$msg .= "background-color:#fff0f0;'>";
		$msg .= "<div style='color:white;font-size:80%;font-weight:bold;";
		$msg .= "background-color:#ff0000;'>ERROR</div>";
		$msg .= "<div style='padding:10px;'>";
		$msg .= $err_msg;
		$msg .= "</div>";
		$msg .= "</div>";
		echo $msg;
	}

	//----------------------------------------------------------------
	// checkPermission
	//----------------------------------------------------------------
	function checkPermission( $ptype, $path ) {

		$msg = array();

		if ( strpos( $ptype, 'r' ) !== false ) {
			if ( !is_readable( $path ) ) {
				CTClassSys::loadLang("app.requirements",$lng);
				$msg[] = $lng[ 'err:cannot-read' ] . " [{$path}]";
			}
		}

		if ( strpos( $ptype, 'w' ) !== false ) {
			if ( !is_writeable( $path ) ) {
				CTClassSys::loadLang("app.requirements",$lng);
				$msg[] = $lng[ 'err:cannot-write' ] . " [{$path}]";
			}
		}

		$b_success = ( count( $msg ) == 0 );

		if ( !$b_success ) {
			$this->showErrorMsg( $msg );
		}

		return $b_success;
	}

	//----------------------------------------------------------------
	// process
	//----------------------------------------------------------------
	function processCmdSpec( &$spec, &$ret )
	{
		foreach( $spec as $cmd )
		{
			if ( substr( $cmd, 0, 1 ) == '@' )
			{
				$cmd = substr( $cmd, 1 );
				if ( method_exists( $this, $cmd ) )
				{
					if ( !call_user_func_array( array( $this, $cmd ), array( &$ret ) ) )
					{
						break;
					}
				}
				else
				{
					$this->showErrorMsg( "method does not exist ({$cmd})" );
					return false;
				}
			}
			else
			{
				$path1 = $this->sys->path_tclass . $cmd;
				if ( file_exists( $path1 ) )
				{
					include( $path1 );
				}
				else
				{
					$path2 = $this->sys->path_base_tclass . $cmd;
					if ( file_exists( $path2 ) )
					{
						include( $path2 );
					}
					else
					{
						$this->showErrorMsg(
							"file does not exist ({$path1}), ({$path2})" );
						return false;
					}
				}
			}
		}

		return true;
	}

	//----------------------------------------------------------------
	// run
	//----------------------------------------------------------------
	function run( $sys )
	{
		ob_start();

		if ( !$this->setup( $sys ) ) return false;

		//-- run the requested command
		$this->appid = $_REQUEST['appid'];
		$this->cmd = $_REQUEST['cmd'];

		$this->result = "OK";
		$ret = array();

		if (  array_key_exists( $this->cmd, $this->cmdspec ) )
		{
			$ret["cmd"] = "load";

			//-- get command spec
			$spec = $this->cmdspec[$this->cmd];

			//-- command redirection
			if ( !is_array( $spec ) )
			{
				$spec = $this->cmdspec[$spec];
			}

			$this->processCmdSpec( $spec, $ret );
		}
		else
		{
			$ret["cmd"] = "alert";
			echo "Unknown Command [{$this->cmd}]";
		}

		$ret["html"] = ob_get_contents();
		ob_end_clean();
		$ret["result"] = $this->result;

		echo CJson::encode( $ret );

		return true;
	}
}

?>