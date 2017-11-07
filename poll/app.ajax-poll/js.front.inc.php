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
	this.name = "app.front";
	this.app = app;
	app.addChild( this );
	this.enabled = true;
	this.run();
}

CPage.prototype = {

	//-----------------------------------------------
	// hc_result
	//-----------------------------------------------
	hc_result : function( e ) {
		e.preventDefault();
		if ( this.enabled ) {
			this.enabled = false;
			this.app.showWaitIcon( e );
			this.app.send( { "cmd": "result" } );
		}
	},

	//-----------------------------------------------
	// hc_vote
	//-----------------------------------------------
	hc_vote : function( e ) {
		e.preventDefault();

		var answer = [];
		this.app.jobj.find( 'input[name="answer"]:checked').each( function(){
			answer.push( '"' + $(this).val().replace( '"', '\"') + '"' );
		});
		if ( answer.length > 0 ) {//-- send a vote
			answer = '[' + answer.join( "," ) + ']';
			this.app.showWaitIcon( e );
			this.app.send( { "cmd": "vote", "answer":answer } );
		} else {//-- show 'select one' message
			var jqo_ref = this.app.jobj.find('.poll-front .ap-ref-tipbox');
			var cfg = { "class":"selectone", "period":this.tip_box_duration };
			var txt = this.app.jobj.find( 'input[name="msg-select-one"]').val();
			if ( typeof(txt) != 'undefined' ) {
				cfg["txt"] = txt;
				this.app.showTipBox( jqo_ref, cfg );
			}
		}
	},

	//-----------------------------------------------
	// hc_clear_block
	//-----------------------------------------------
	hc_clear_block : function( e ) {
		e.preventDefault();
		this.app.send( { "cmd": "clear_block" } );
	},

	//-----------------------------------------------
	// run
	//-----------------------------------------------
	run : function() {
		var jqo = this.app.jobj.find( 'input[name="tip-box-duration"]').eq(0);
		this.tip_box_duration = ( jqo.length ? jqo.val() : 300 );

		this.app.jobj.find('.poll-front').show();

		var _this = this;

		//-- tipbox
		var jqo_outer = this.app.jobj.find('.poll-front .poll-inner');
		$('<div>')
			.attr('class','poll-tipbox')
			.append($('<div>')
				.attr('class','poll-tipbox-selectone')
			)
			.appendTo(jqo_outer);
		$('<div>')
			.attr('class','poll-tipbox')
			.append($('<div>')
				.attr('class','poll-tipbox-havevoted')
			)
			.appendTo(jqo_outer);

		//-- Set cursor to pointer
		this.app.jobj.find( ".poll-caption-cont" )
			.css( "cursor", "pointer" )
			.click(function(e){
				$(this).parents("tr").eq(0).find(".poll-input")
					.trigger("click");
			});

		//-- View button
		this.app.jobj.find( ".ap-result" ).click( function(e) {
			_this.app.hideTipBox();
			_this.hc_result( e );
		});

		//-- Vote button
		this.app.jobj.find( ".ap-vote" ).click( function(e) {
			_this.app.hideTipBox();
			_this.hc_vote( e );
		});

		//-- Clear button
		this.app.jobj.find( ".ap-clear-block" ).click( function(e) {
			_this.app.hideTipBox();
			_this.hc_clear_block( e );
		});

		//-- checkbox/radio button
		if ( this.app.leIE8() ) {
			this.app.jobj.find('.poll-input').show();
		} else {
			this.app.jobj.find('.poll-input').wrap("<div class='poll-input-cont'></div>");
			this.app.jobj.find('.poll-input-cont')
				.append($("<div>")
					.attr("class","poll-input-inner")
					.html($("<img>")
						.attr("class","poll-input-mark")
						.attr("src",this.app.jobj.find('.poll-input-img').attr('src'))
					)
				);

			//-- select/deselect checkbox/radio button
			var _this = this;
			var b_multi = ( this.app.jobj.find(".poll-input").attr("type") == "checkbox" );
			this.app.jobj.find(".poll-input").change(function(e){
				if  ( !b_multi ) {
					_this.app.jobj.find('.poll-input-cont').removeClass('poll-input-cont-on');
					_this.app.jobj.find('.poll-input-inner').removeClass('poll-input-inner-on');
					_this.app.jobj.find('.poll-input-mark').removeClass('poll-input-mark-on');
				}
				var jqo_input_cont = $(this).parents(".poll-input-cont");
				var jqo_input_inner = jqo_input_cont.find('.poll-input-inner');
				var jqo_input_mark = jqo_input_cont.find('.poll-input-mark');
				if ( $(this).is(':checked') ) {
					jqo_input_cont.addClass('poll-input-cont-on');
					jqo_input_inner.addClass('poll-input-inner-on');
					jqo_input_mark.addClass('poll-input-mark-on');
				} else {
					if  ( b_multi ) {
						jqo_input_cont.removeClass('poll-input-cont-on');
						jqo_input_inner.removeClass('poll-input-inner-on');
						jqo_input_mark.removeClass('poll-input-mark-on');
					}
				}
			});
		}
	},

	//-----------------------------------------------
	// msgProc
	//-----------------------------------------------
	msgProc : function( msg ) {
		switch( msg.cmd ) {
		case "already_voted":
			var jqo_ref = this.app.jobj.find('.poll-front .ap-ref-tipbox');
			var cfg = { "class":"havevoted", "period":this.tip_box_duration };
			var txt = this.app.jobj.find( 'input[name="msg-already-voted"]').val();
			if ( typeof(txt) != 'undefined' ) {
				cfg["txt"] = txt;
				this.app.showTipBox( jqo_ref, cfg );
			}

			return true;
		}

		return false;
	}
}

//----------------------------------------------------------------
// start-up
//----------------------------------------------------------------
var page = new CPage( window['<?php echo $this->appid; ?>'] ); 

}(window['<?php echo $this->appid; ?>'].jQueryX));

</script>
<?php /* -- END OF FILE -- */ ?>
