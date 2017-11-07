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
		$poll->attr( "title", "Where would you most like to visit?" );

		//-- Poll Options
		$poll->addItem( "London" );
		$poll->addItem( "Barcelona" );
		$poll->addItem( "Paris" );
		$poll->addItem( "New York" );
		$poll->addItem( "Berlin" );
		$poll->addItem( "Athens" );
		$poll->addItem( "Vancouver" );
		$poll->addItem( "Rome" );
		$poll->addItem( "Edinburgh" );

		//-- Text used in polls
		$poll->attr( "msg-vote", "Vote" );
		$poll->attr( "msg-select-one", "Please select one option" );
		$poll->attr( "msg-already-voted", "You have already voted!" );
		$poll->attr( "msg-view-result", "View Results" );
		$poll->attr( "msg-thank-you", "Thank you for voting!" );
		$poll->attr( "msg-return", "Back" );
		$poll->attr( "msg-total", "Total" );
		$poll->attr( "msg-reset-block", "Reset IP & Cookie Block" );
		$poll->attr( "msg-not-started", "Voting has not begun yet." );
		$poll->attr( "msg-ended", "Voting has ended, thank you!" );

		//-- Display "Reset IP & Cookie Block" button
		//--	Show: true
		//--	Hide: false
		$poll->attr( "b-reset-block", true );

		//-- Single selection or multiple selection
		//--	single selection: "radio"
		//--	multiple selection: "checkbox"
		$poll->attr( "vote-input", "radio" );

		//-- Specify the time delay on tool tips in milliseconds
		$poll->attr( "tip-box-duration", 2500 );

		//-- Prevent users from voting more than once by IP address
		//--	"true" or "false"
		$poll->attr( "enable-ip-block", true );

		//-- Prevent users from voting more than once by Cookie
		//--	"true" or "false"
		$poll->attr( "enable-cookie-block", true );

		//-- Specifiy the cookie's life span in seconds
		//--	(e.g.)　60*60*24 => One Day
		//--	(e.g.)　60*60*24*365 => One Year
		$poll->attr( "cookie-block-period", 60*60*24*365 );

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