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
// CCookieBlock
//----------------------------------------------------------------
class CCookieBlock
{
	function setup( $cookie_key, $period = null ) {
		//-- cookie name must not contain '.'
		$cookie_key = str_replace( '.', '-', $cookie_key );

		$this->cookie_key = $cookie_key;
		if ( is_null($period) ) {
			$period = 60*60*24*365;
		}
		$this->period = $period;
	}

	function add( $val = 'yes' ) {
		setcookie( $this->cookie_key, $val, time() + $this->period );
		$_COOKIE[$this->cookie_key] = $val;
		return true;
	}

	function get() {
		if ( isset($_COOKIE[$this->cookie_key]) ) {
			return $_COOKIE[$this->cookie_key];
		} else {
			return '';
		}
	}

	function exists() {
		return ( isset($_COOKIE[$this->cookie_key]) );
	}

	function validate() {
		if ( $this->exists() ) {
			return false;
		} else {
			return true;
		}
	}

	function clear() {
		setcookie( $this->cookie_key, "", time()-3600 );
		return true;
	}
}

?>