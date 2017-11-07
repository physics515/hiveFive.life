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
<script>
(function($){

//----------------------------------------------------------------
// CPage
//----------------------------------------------------------------
function CPage( app ) {

	this.name = "app.result";
	this.app = app;
	app.addChild( this );
	this.front = app.getChild( "app.front" );
	this.run();
}

CPage.prototype = {

	//-----------------------------------------------
	// hc_front
	//-----------------------------------------------
	hc_front : function( e ) {
		e.preventDefault();

		var _this = this;
		this.front.enabled = true;

		this.app.jobj.find('.poll-result').hide();
		this.app.jobj.find('.poll-result').remove();
		this.app.jobj.find('.poll-front').show();
	},

	//-----------------------------------------------
	// run
	//-----------------------------------------------
	run : function() {
		var _this = this;

		//-- tipbox
		var jqo_outer = this.app.jobj.find('.poll-result .poll-inner');
		$('<div>')
			.attr('class','poll-tipbox')
			.append($('<div>')
				.attr('class','poll-tipbox-thankyou')
			)
			.appendTo(jqo_outer);

		//-- switch pages
		this.app.jobj.find('.poll-front').hide();
		this.app.jobj.find('.poll-result').show();

		//-- IE8
		if ( this.app.leIE8() ) {
			this.app.jobj.find( ".poll-bar" )
			.css("background-color","#888");
		}

		//-- Animate Bars
		var w100 = this.app.jobj.find( ".ap-bar" ).eq(0).parent().width();
		this.app.jobj.find( ".ap-bar" ).each( function() {
			var wratio = $(this).attr( 'ap-wratio' );
			var wpx = Math.floor(w100*wratio);
			$(this).css( 'width', 0 );
			$(this).show();
			$(this).animate({
				width: wpx
			}, 300 );
		});

		//-- Back button
		this.app.jobj.find( ".ap-front" ).click( function(e) {
			_this.app.hideTipBox();
			_this.hc_front( e );
		});
	},

	//-----------------------------------------------
	// thankYou
	//-----------------------------------------------
	thankYou : function() {
		var jqo_ref = this.app.jobj.find('.poll-result .ap-ref-tipbox');
		var cfg = { "class":"thankyou", "period":this.front.tip_box_duration };
		var txt = this.app.jobj.find( 'input[name="msg-thank-you"]').val();
		if ( typeof(txt) != 'undefined' ) {
			cfg["txt"] = txt;
			this.app.showTipBox( jqo_ref, cfg );
		}

		return true;
	},

	//-----------------------------------------------
	// msgProc
	//-----------------------------------------------
	msgProc : function( msg ) {
		switch( msg.cmd ) {
		case "thank_you":
			var _this = this;
			var f = function(){ _this.thankYou(); };
			setTimeout( f, 1000 );
			return 1;
		}

		return 0;
	}
}

//----------------------------------------------------------------
// main
//----------------------------------------------------------------
var page = new CPage( window['<?php echo $this->appid; ?>'] ); 

}(window['<?php echo $this->appid; ?>'].jQueryX));

</script>
<?php /* -- END OF FILE -- */ ?>
