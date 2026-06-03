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
		$this->ip_hashes = null;
		$this->hash_salt = null;
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
			file_put_contents( $this->path_data, "=" . $this->getIpHash() . "\r\n", FILE_APPEND | LOCK_EX );
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
			$txt = str_replace( "\r", "", $txt );
			$ax = explode( "\n", $txt );
			$ip_hashes = $this->getAllIpHashes();
			foreach ( $ax as $ln )
			{
				if ( empty( $ln ) )
				{
					continue;
				}
				$ln = ltrim( $ln, "=" );
				if ( array_key_exists( $ln, $ip_hashes ) )
				{
					return true;
				}
			}
			return false;
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
			$txt = str_replace( "\r", "", $txt );
			$ax = explode( "\n", $txt );
			$bx = array();
			$ip_hashes = $this->getAllIpHashes();
			foreach ( $ax as $ln )
			{
				if ( empty( $ln ) )
				{
					continue;
				}
				$val = ltrim( $ln, "=" );
				if ( array_key_exists( $val, $ip_hashes ) )
				{
					continue;
				}
				$bx[] = "={$val}";
			}
			$txt = implode( "\r\n", $bx );
			if ( !empty( $txt ) )
			{
				$txt .= "\r\n";
			}
			file_put_contents( $this->path_data, $txt, LOCK_EX );
		}
		return true;
	}

	function getAllIpHashes()
	{
		if ( is_null( $this->ip_hashes ) )
		{
			$this->ip_hashes = array_flip(
				array_merge( array( $this->getIpHash() ), $this->getLegacyIpHashes() )
			);
		}
		return $this->ip_hashes;
	}

	function getIpHash()
	{
		return hash_hmac( 'sha256', $this->getIpToken(), $this->getHashSalt() );
	}

	function getLegacyIpHashes()
	{
		$raw_hash = hash( 'sha256', $this->ipaddr );
		$token_hash = hash( 'sha256', $this->getIpToken() );
		if ( $raw_hash === $token_hash )
		{
			return array( $raw_hash );
		}
		return array( $raw_hash, $token_hash );
	}

	function getIpToken()
	{
		$ip_bin = inet_pton( $this->ipaddr );
		if ( $ip_bin === false )
		{
			return hash( 'sha256', strtolower( trim( $this->ipaddr ) ) );
		}
		return bin2hex( $ip_bin );
	}

	function getHashSalt()
	{
		if ( !is_null( $this->hash_salt ) )
		{
			return $this->hash_salt;
		}

		$salt = getenv( 'POLL_IP_HASH_SALT' );
		if ( $salt === false || $salt === '' )
		{
			if ( isset( $_SERVER['POLL_IP_HASH_SALT'] ) )
			{
				$salt = $_SERVER['POLL_IP_HASH_SALT'];
			}
		}

		if ( $salt === false || $salt === '' )
		{
			$salt_path = "{$this->path_data}.salt";
			if ( file_exists( $salt_path ) )
			{
				$salt = trim( file_get_contents( $salt_path ) );
			}

			if ( $salt === false || $salt === '' )
			{
				try
				{
					$salt = bin2hex( random_bytes( 32 ) );
				}
				catch ( Exception $e )
				{
					$salt = hash( 'sha256', uniqid( '', true ) );
				}
				file_put_contents( $salt_path, $salt, LOCK_EX );
			}
		}

		$this->hash_salt = $salt;
		return $this->hash_salt;
	}
}

?>