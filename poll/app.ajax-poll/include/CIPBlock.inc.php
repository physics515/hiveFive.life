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
// CIPBlock
//----------------------------------------------------------------
class CIPBlock
{
	function setup( $path_data )
	{
		$this->path_data = $path_data;
		$this->ipaddr = null;
		if ( isset($_SERVER['REMOTE_ADDR']) )
			$this->ipaddr = $_SERVER['REMOTE_ADDR'];
	}

	function add()
	{
		if ( is_null($this->ipaddr) )
		{
			return false;
		}
		else
		{
			file_put_contents( $this->path_data, "={$this->ipaddr}\r\n", FILE_APPEND | LOCK_EX );
			return true;
		}
	}

	function exists()
	{
		if ( is_null($this->ipaddr) )
		{
			return false;
		}
		else if ( !file_exists( $this->path_data ) )
		{
			return true;
		}
		else
		{
			$txt = file_get_contents( $this->path_data );
			return ( strpos( $txt, "={$this->ipaddr}\r\n" ) !== false );
		}
	}

	function validate()
	{
		if ( $this->exists() )
			return false;
		else
			return $this->add();
	}

	function clear()
	{
		if ( file_exists( $this->path_data ) )
		{
			$txt = file_get_contents( $this->path_data, LOCK_EX );
			$txt = str_replace( "={$this->ipaddr}\r\n", "", $txt );
			file_put_contents( $this->path_data, $txt, LOCK_EX );
		}
		return true;
	}
}

?>