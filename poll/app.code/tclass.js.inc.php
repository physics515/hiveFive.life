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

(function($){

CUWait = {

	//init_delay:0,//(debug)
	init_delay:1000,

	cnt : 0,
	panel : null,
	timer_id : null,
	dice_id : 0,

	rand : function( min, max ) {
		return Math.floor((Math.random() * max) + min);
	},

	randColor : function() {
		var px = ["00","33","66","99","FF"];
		return "#" +
			px[this.rand(0,px.length)] +
			px[this.rand(0,px.length)] +
			px[this.rand(0,px.length)];
	},

	createInner : function() {
		var nx = 2;
		var ny = 2;
		var dx = 20;
		var dy = 20;
		var w = 20-2;
		var h = 20-2;
		this.dice = [];
		for ( var y = 0; y < ny; y++ ) {
			for ( var x = 0; x < nx; x++ ) {
				this.dice.push(
					$("<div>")
					.css({
						position:"absolute",
						left:(x*dx)+"px",
						top:(y*dy)+"px",
						width:w+"px",
						height:h+"px"
					})
					.appendTo(this.panel)
				);
			}
		}
	},

	animateInner : function() {
		if ( this.dice_id >= this.dice.length ) {
			this.dice_id = 0;
		}
		var die = this.dice[this.dice_id];
		this.dice_id++;

		die.css({
			"background-color":this.randColor()
		});
	},

	create : function(e) {
		if ( this.cnt == 0 ) { return; }

		var z = 10000;

		var w = 40;
		var h = 40;
		var left = (e.pageX - w/2);
		var top = (e.pageY - h/2);

		//-- panel
		this.panel = $("<div>")
			.css({
				position:"absolute",
				left:left+"px",
				top:top+"px",
				width:"40px",
				height:"40px",
				margin:0,
				padding:0,
				opacity:0,
				filter:"alpha(opacity=0)",
				"z-index":z
			})
			.appendTo('body');

		//-- panel inner
		this.createInner();

		//-- show
		this.panel.show();

		//-- make it visible after init_delay
		var _this = this;
		setTimeout(function(){
			_this.visible();
		},this.init_delay);
	},

	visible : function() {
		if ( this.cnt == 0 ) { return; }

		//-- panel
		this.panel
			.css({
				opacity:0.5,
				filter:"alpha(opacity=50)"
			});

		//-- panel inner
		var _this = this;
		this.timer_id = setInterval(function(){
			_this.animateInner();
		},50);
	},

	destroy : function() {
		if ( this.panel == null ) { return; }

		//-- panel inner
		if ( this.timer_id != null ) {
			clearInterval(this.timer_id);
			this.timer_id = null;
		}

		//-- panel
		this.panel.fadeOut(function(){
			$(this).remove();
		});
		this.panel = null;

	},

	start : function( e ) {
		this.cnt++;
		if ( this.cnt == 1 ) {
			this.create( e );
		}
	},

	stop : function() {
		if ( this.cnt > 0 ) {
			this.cnt--;
			if ( this.cnt == 0 ) {
				this.destroy();
			}
		}
	}
};

//----------------------------------------------------------------
// CApp
//----------------------------------------------------------------
var app_object_selector = '<?php echo $this->app_object_selector; ?>';
function CApp( jobj )
{
	this.children = [];

	this.jQueryX = $;
	this.jobj = jobj;
	this.tclass = this.getAttr( 'tclass', jobj );
	this.tid = this.getAttr( 'tid', jobj );
	this.url_app_entry = '<?php echo $this->url_app_entry; ?>';
	this.url_app_root = '<?php echo $this->url_app_root; ?>';
	this.url_app_img = '<?php echo $this->url_app_img; ?>';
	this.appid = this.makeRandomString( 64 );
	this.app_init_cmd = '<?php echo $this->app_init_cmd; ?>'; 
	this.tipbox = null;
	if ( this.app_init_cmd != '' )
	{
		this.send( { "cmd" : this.app_init_cmd } );
	}
}

CApp.prototype =
{
	isIE7 : function() {
		return (navigator.appVersion.indexOf("MSIE 7.")!=-1);
	},

	isIE8 : function() {
		return (navigator.appVersion.indexOf("MSIE 8.")!=-1);
	},

	leIE8 : function() {
		return this.isIE7() || this.isIE8();
	},

	isTouchDevice : function() {
		return (('ontouchstart' in window) ||
			(navigator.MaxTouchPoints > 0) ||
			(navigator.msMaxTouchPoints > 0));
	},

	showWaitIcon: function( e )
	{
		CUWait.start(e);
	},

	showTipBox: function( jqo_ref, cfg ) {

		var _this = this;

		//-- tipbox timer id
		if ( "tipbox_timer" in this ) {
			if ( this.tipbox_timer != -1 ) {
				clearTimeout(this.tipbox_timer);
			}
		}
		this.tipbox_timer = -1;
		this.hideTipBox();

		var jqo_cont = jqo_ref.parents("."+this.tclass);
		var jqo_inner = jqo_cont.find('.poll-inner');
		//-- tipbox
		var jqo = jqo_cont.find('.poll-tipbox-'+cfg['class'])
			.html(cfg["txt"]);
		this.tipbox = jqo.parent('.poll-tipbox');
		this.tipbox.stop(true,true)
		this.tipbox.show();

		//-- animate
		var ref_pos = jqo_ref.position();
		var xt = parseInt((jqo_inner.width()-this.tipbox.width())/2);

		var ht = this.tipbox.height() + 10;
		var yt = ref_pos.top - ht;

		var xm = 0;
		var ym = 30;

		var period = ( "period" in cfg ) ? cfg["period"] : 2500;

		var opa = this.tipbox.css("opacity");
		this.tipbox
			.css({
				"left":(xt - xm) + "px",
				"top":(yt - ym) + "px",
				"opacity":0
			})
			.animate({
				"left": "+=" + xm + "px",
				"top": "+=" + ym + "px",
				"opacity":"+=" + opa
			}, 300, function(){
				_this.tipbox_timer = setTimeout(function(){
					_this.tipbox.fadeOut( 500, function() {
						_this.hideTipBox();
					});
				},period);
			});
	},

	hideTipBox: function() {
		if ( this.tipbox != null ) {
			this.tipbox.hide();
		}
	},

	//-----------------------------------------------
	// makeRandomString( n )
	//-----------------------------------------------
	makeRandomString : function ( n )
	{
		var s = "";
		var src = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		for( var i=0; i < n; i++ )
		{
			s += src.charAt( Math.floor( Math.random() * src.length ) );
		}
		return s;
	},

	//-----------------------------------------------
	// errBox
	//-----------------------------------------------
	errBox : function( data )
	{
		var errbox_sig = "<!--(ERRBOX)-->";
		if ( data.substring( 0, errbox_sig.length ) == errbox_sig )
		{// prevent double errbox
			return data;
		}
		else
		{
			var msg = '';
			msg += "<div style='padding:0px;border:1px solid red;";
			msg += "background-color:#fff0f0;'>";
			msg += "<div style='color:white;font-size:80%;font-weight:bold;";
			msg += "background-color:#ff0000;'>ERROR</div>";
			msg += "<div style='padding:10px;'>";
			msg += data;
			msg += "</div>";
			msg += "</div>";
			return msg;
		}
	},

	//-----------------------------------------------
	// getAttr
	//-----------------------------------------------
	getAttr : function( id_name, jobj )
	{
		if (
			( typeof( jobj.attr( id_name ) ) == 'undefined' ) || 
			( jobj.attr( id_name ) == '' ) // for Opera
		) return '';
		return jobj.attr( id_name );
	},

	//-----------------------------------------------
	// send
	//-----------------------------------------------
	send : function( json )
	{
		json['appid'] = this.appid;
		json['tclass'] = this.tclass;
		json['tid'] = this.tid;

		var _this = this;
		$.post( this.url_app_entry,
			json,
			function(data) {
				_this.process(data);
		});
	},

	//-----------------------------------------------
	// addChild
	//-----------------------------------------------
	addChild : function( child )
	{
		this.children[child.name] = child;
		return child;
	},

	//-----------------------------------------------
	// getChild
	//-----------------------------------------------
	getChild : function( name )
	{
		return this.children[name];
	},

	//-----------------------------------------------
	// sendMsg
	//-----------------------------------------------
	sendMsg : function( msg )
	{
		if ( typeof( msg.receiver ) !== 'undefined' )
		{
			if( Object.prototype.toString.call( msg.receiver ) === '[object Array]' )
			{
				for ( var i = 0; i < msg.receiver.length; i++ )
				{
					var ret = this.children[ msg.receiver[i] ].msgProc( msg );
					if ( ret != 0 ) return ret;
				}
			}
			else
			{
				return this.children[msg.receiver].msgProc( msg );
			}
		}
		else
		{
			for( name in this.children )
			{
				var ret = this.children[name].msgProc( msg );
				if ( ret != 0 ) return ret;
			}
		}
	},

	//-----------------------------------------------
	// process
	//-----------------------------------------------
	process : function( data )
	{
		CUWait.stop();

		var b_evaled = false;
		try
		{
			this.res = eval('(' + data + ')');
			b_evaled = true;
		}
		catch(e)
		{
			var msg = "[ERROR]:" + "\r\n\r\n" + data.substring(0,1000);
			//alert( msg );
			this.jobj.html( this.errBox(data) );
		}

		try
		{
			if ( b_evaled )
			{
				if ( this.res.result == 'OK' )
				{
					window[this.appid] = this;
					switch( this.res.cmd )
					{
					case "alert":
						alert(this.res.html);
						break;
					case "load":
						this.jobj.append( this.res.html );
						break;
					}

					if ( typeof( this.res.msg ) !== 'undefined' )
					{
						this.sendMsg( this.res.msg );
					}
				}
				else
				{//-- code error
					alert( "^" + this.res.result );
					this.jobj.html( this.res.result );
				}
			}
		}
		catch(e)
		{
			var msg = "{ERROR}:" + e.message;
			alert( msg );
		}
	}
}

//----------------------------------------------------------------
// ready
//----------------------------------------------------------------
$(document).ready(function() {
	if (!( 'ajax-poll-script-9009' in window )) {
		window['ajax-poll-script-9009'] = true;
		$( app_object_selector ).each( function(){
			var app = new CApp( $(this) ); 
		});
	}
});

}(jQuery));
<?php /* -- END OF FILE -- */ ?>
