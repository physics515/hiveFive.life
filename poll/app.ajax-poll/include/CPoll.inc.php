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
// CPollItem
//----------------------------------------------------------------
class CPollItem
{
	function attr( $key, $val = null ) {
		if ( is_null( $val ) ) {
			if ( isset( $this->_attr_[$key] ) ) {
				return $this->_attr_[$key];
			} else {
				return null;
			}
		} else {
			$this->_attr_[$key] = $val;
		}
	}

	function getName() {
		return $this->name;
	}

	function getCount() {
		return $this->cnt;
	}

	function getPercent( $precision = 0 ) {
		$total = $this->prt->getTotal();
		if ( $total == 0 ) {
			$v = 0;
		} else {
			$v = ( 100 * $this->getCount() ) / $total;
		}
		$v = round( $v, $precision );
		$v = sprintf( "%01.{$precision}f", $v );
		return $v;
	}

	function getWRatio() {
		$max_count = $this->prt->getMaxCount();
		if ( $max_count == 0 ) { return 0; }
		return round( $this->getCount() / $max_count, 2 );
	}

	function isVoted() {
		return $this->prt->hasVoted( $this->getName() );
	}

	function setCount( $cnt ) {
		if ( !$this->isInteger( $cnt ) ) { $cnt = 0; }
		$this->cnt = intval( $cnt );
	}

	function incCount( $d = 1 ) {
		$this->cnt += $d;
	}

	function isInteger( $v ) {
		if ( strlen( $v ) == 0 ) { return false; }
		if ( !is_numeric( $v ) ) { return false; }
		if ( doubleval( $v ) - intval( $v ) != 0 ) { return false; }
		return true;
	}

	function setup( $sys, $prt, $name ) {
		//-- pointers
		$this->sys =& $sys;
		$this->prt =& $prt;
		$this->name = $name;

		//-- attributes
		$this->_attr_ = array();

		//-- count
		$this->cnt = 0;
	}
}

//----------------------------------------------------------------
// CPoll
//----------------------------------------------------------------
class CPoll {

	function attr( $key, $val = null ) {
		if ( is_null( $val ) ) {
			if ( isset( $this->_attr_[$key] ) ) {
				return $this->_attr_[$key];
			} else {
				return null;
			}
		} else {
			$this->_attr_[$key] = $val;
		}
	}

	function hasVoted( $name = null ) {
		return $this->prt->checkCkBlock( $name );
	}

	function getTotal() {
		return $this->total;
	}

	function setMaxWidth( $max_width ) {
		$this->max_width = $max_width;
	}

	function getMaxWidth() {
		return $this->max_width;
	}

	function getMaxCount() {
		return $this->max_count;
	}

	function getNumOfItems() {
		return count( $this->items );
	}

	function getAllItems() {
		return $this->items;
	}

	function getItem( $key = null ) {
		$err_msg = array();

		if ( is_null($key) ) {
			if ( !isset( $this->item_idx ) ) {
				$this->item_idx = 0;
			}

			if ( $this->item_idx >= count($this->item_key_list) ) {
				return $this->dummy_item;
			} else {
				$key = $this->item_key_list[$this->item_idx];
				$this->item_idx++;
				return $this->items[$key];
			}
		} else if ( !isset( $this->items[$key] ) ) {
			$err_msg[] = "getItem( key ) : Unknown Item Key ({$key})";
		}

		if ( count( $err_msg ) > 0 ) {
			$this->prt->showErrorMsg( $err_msg );
		}

		return $this->items[$key];
	}

	function addItem( $key ) {
		$item = new CPollItem();
		$item->setup( $this->sys, $this, $key );
		$this->items[$key] = $item;
		$this->item_key_list[$this->item_key_idx] = $key;
		$this->item_key_idx++;
		return $item;
	}

	function calcStats() {
		$total = 0;
		$max_count = 0;
		foreach( $this->items as $key => $item ) {
			$count = $item->getCount();
			$total += $count;
			if ( $max_count < $count ) $max_count = $count;
		}
		$this->total = $total;
		$this->max_count = $max_count;
	}

	function getFolderUrl() {
		return $this->prt->getFolderUrl();
	}

	function started() {
		return !(
			( !empty( $this->_attr_[ 'dt-start' ] ) ) &&
			( strtotime( $this->_attr_[ 'dt-start' ] ) > time() )
		);
	}

	function ended() {
		return (
			( !empty( $this->_attr_[ 'dt-end' ] ) ) &&
			( strtotime( $this->_attr_[ 'dt-end' ] ) < time() )
		);
	}

	function setup( $sys, $prt ) {
		//-- pointers
		$this->sys =& $sys;
		$this->prt =& $prt;

		//-- attributes
		$this->_attr_ = array();

		//-- poll items
		$this->items = array();
		$this->item_key_list = array();
		$this->item_key_idx = 0;

		//-- dummy item
		$this->dummy_item = new CPollItem();
		$this->dummy_item->setup( $sys, $this, null );

		//-- default max width
		$this->setMaxWidth( 100 );

		return true;
	}

	function getDataFilePath() {
		return $this->prt->getDataFolderPath() . "votes.txt";
	}

	function load( $b_vote = false ) {
		$path = $this->getDataFilePath();
		if ( !file_exists( $path ) ) touch( $path );
		if ( !$this->prt->checkPermission( 'rw', $path ) ) return false;

		$handle = @fopen( $path, "r+" );

		//-- do an exclusive lock
		if ( !( @flock( $handle, LOCK_EX ) ) ) {
			$this->prt->showErrorMsg( "Can not write [app.data] ({$path})" .
				" (Could not get the lock!)" );
			return false;
		}

		$txt = '';
		$size = filesize( $path );
		if ( $size > 0 ) {
			$txt = fread( $handle, $size );
		}

		//-- load into CPollItem
		$txt = str_replace( "\r", "", $txt );
		$ax = explode( "\n", $txt );
		foreach( $ax as $ln ) {
			if ( strpos( $ln, "=" ) !== false ) {
				$bx = explode( "=", $ln );
				if ( array_key_exists( $bx[0], $this->items ) ) {
					$item = $this->items[ $bx[0] ];
					$item->setCount( $bx[1] );
				}
			}
		}

		//-- add votes
		$answer = isset( $_REQUEST['answer'] ) ? $_REQUEST['answer'] : "";
		$answer = json_decode( $answer, true );
		if ( $b_vote && !empty($answer) ) {
			$b_found = false;
			foreach( $answer as $ans ) {
				if ( isset( $this->items[$ans] ) ) {
					$item = $this->items[$ans];
					$item->incCount();
					$b_found = true;
				}
			}

			if ( $b_found ) {
				//-- truncate file
				fseek( $handle, 0 );
				ftruncate( $handle, 0 );

				//-- write votes to txt file
				fwrite( $handle, $this->getDataTxt() );
			} else {
				$this->prt->showErrorMsg( "Item ({$answer}) not declared" );
			}
		}

		//-- release the lock
		flock( $handle, LOCK_UN );

		//-- close the file
		fclose($handle);

		return true;
	}

	function getDataTxt() {
		$ax = array();
		foreach( $this->items as $key => $item ) {
			$ax[] = "{$key}=" . $item->getCount();
		}
		return implode( "\r\n", $ax );
	}
}

?>