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
// CJson
//----------------------------------------------------------------
class CJson
{
	//----------------------------------------------------------------
	// dqstr
	//----------------------------------------------------------------
	static function dqstr( $txt )
	{
		$txt = str_replace( "\\", "\\\\", $txt );
		$txt = str_replace( "\r", "\\r", $txt );
		$txt = str_replace( "\n", "\\n", $txt );
		$txt = str_replace( "\"", "\\\"", $txt );
		return $txt;
	}

	//----------------------------------------------------------------
	// encode
	//
	// type:
	//   '' : associative array
	//   @  : non-associative array
	//   -  : direct json string ( e.g. '{ "a":"aaa", "b":"bbb" }' )
	//----------------------------------------------------------------
	static function encode( &$data, $type = '' )
	{
		if ( $type == '-' )
		{
			return $data;
		}

		$ax = array();
		foreach( $data as $key => $val )
		{
			$type2 = ( substr($key,0,1) );
			switch( $type2 )
			{
			case "@":
			case "-":
				$key = substr($key,1);
				break;
			default:
				$type2 = '';
				break;
			}

			if ( $type == '' )
			{
				$s = "\"{$key}\":";
			}
			else
				$s = "";

			if ( is_array( $val ) )
				$s .= CJson::encode( $val, $type2 );
			elseif ( $type2 == '-' )
				$s .= $val;
			else
				$s .= '"' . CJson::dqstr( $val ) . '"';

			$ax[] = $s;
		}

		$s = implode( ",", $ax );
		if ( $type == '' )
			$s = "{" . $s . "}";
		else
			$s = "[" . $s . "]";

		return $s;
	}

	//----------------------------------------------------------------
	// decode
	//----------------------------------------------------------------
	static function decode( $json )
	{
		return json_decode( $json, true );
	}
}

?>