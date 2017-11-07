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

class CTClass extends CTClassBase
{
	function setupPoll( $poll ) {

		//-- Poll Title
		$poll->attr( "title", "VOTE FOR A CAUSE!" );

		//-- Poll Options
		$poll->addItem( "AMERICAN RED CROSS" );
		$poll->addItem( "HOUSTON FOOD BANK" );
		$poll->addItem( "SAMARITAN'S PURSE" );
		$poll->addItem( "DIRECT RELIEF" );
		$poll->addItem( "HOUSTON HUMANE SOCIETY" );

		//-- Text used in polls
		$poll->attr( "msg-vote", "VOTE!" );
		$poll->attr( "msg-select-one", "PLEASE SELECT AN OPTION." );
		$poll->attr( "msg-already-voted", "YOU HAVE ALREADY VOTED! CLICK THE VOTE AGAIN BUTTON TO VOTE MORE TIMES!" );
		$poll->attr( "msg-view-result", "VEIW RESULTS!" );
		$poll->attr( "msg-thank-you", "THANK YOU FOR VOTING!" );
		$poll->attr( "msg-return", "BACK" );
		$poll->attr( "msg-total", "TOTAL" );
		$poll->attr( "msg-reset-block", "VOTE AGAIN!" );
		$poll->attr( "msg-not-started", "VOTING HAS NOT YEST BEGUN." );
		$poll->attr( "msg-ended", "VOTING HAS ENDED, THANK YOU!" );

		//-- Display "Reset IP & Cookie Block" button
		//--	Show: true
		//--	Hide: false
		$poll->attr( "b-reset-block", true );

		//-- Single selection or multiple selection
		//--	single selection: "radio"
		//--	multiple selection: "checkbox"
		$poll->attr( "vote-input", "radio" );

		//-- Specify the time delay on tool tips in milliseconds
		$poll->attr( "tip-box-duration", 2000 );

		//-- Prevent users from voting more than once by IP address
		//--	"true" or "false"
		$poll->attr( "enable-ip-block", true );

		//-- Prevent users from voting more than once by Cookie
		//--	"true" or "false"
		$poll->attr( "enable-cookie-block", true );

		//-- Specifiy the cookie's life span in seconds
		//--	(e.g.)　60*60*24 => One Day
		//--	(e.g.)　60*60*24*365 => One Year
		$poll->attr( "cookie-block-period", 60*60*24*30*5 );

		//-- Specifiy Start and End Date&Time:
		//-- Enter an empty string ("") if you don't need to specify it.
		//--	(e.g.)　"2010-01-02"
		//--	(e.g.)　"2015-03-01 15:20"
		$poll->attr( "dt-start", "" );
		$poll->attr( "dt-end", "" );

		//-- end
		return true;
	}
}

?>