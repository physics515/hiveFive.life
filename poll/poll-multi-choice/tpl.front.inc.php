<?php $poll =& $this->poll; ?>
<?php include( "css/style.inc.php" ); ?>

<div class='poll-front <?php echo $poll->prt->getTClassName(); ?>' style='display:none;'>
<div class='poll-inner'>

<img class="poll-input-img" src="<?php echo $poll->getFolderUrl();
?>images/<?php echo $poll->attr( "vote-input" ); ?>.png" />

<form class='poll-form'>

<div class='poll-title'>
<?php echo $poll->attr( "title" ); ?>
</div>

<!-- [BEGIN] Looping through all the items -->
<div style='margin-bottom:20px;'>
<?php foreach( $poll->getAllItems() as $item ) { ?>
	<label style='cursor:pointer;width:100%;'>
		<div class='ap-container poll-item'>
			<input type="<?php echo $poll->attr( "vote-input" ); ?>"
				class="poll-input"
				name="answer"
				value="<?php echo $item->getName(); ?>" />
			<span style='margin-left:0px;'>
			<?php echo $item->getName(); ?>
			</span>
		</div>
	</label>
<?php } ?>
</div>
<!-- [END] Looping through all the items -->

<?php if ( $poll->started() ): ?>
<!-- [BEGIN] Vote & View Buttons -->
<div class='ap-ref-tipbox' style='text-align:center;margin-bottom:20px;position:relative;'>
	<button class="ap-vote poll-button">
		<?php echo $poll->attr( "msg-vote" ); ?>
	</button>

	<div style='position:absolute;left:0;bottom:0;width:60px;line-height:80%;text-align:left;'>
		<a href='#' class="ap-result poll-link"><?php echo $poll->attr( "msg-view-result" ); ?></a>
	</div>
</div>
<!-- [END] Vote & View Buttons -->
<?php else: ?>
<div class='poll-time-msg'>
	<?php echo $poll->attr( "msg-not-started" ); ?>
</div>
<?php endif; ?>

<!-- [BEGIN] Mouse Over -->
<script>
(function($){
	function isTouchDevice() {
		return (('ontouchstart' in window) ||
			(navigator.MaxTouchPoints > 0) ||
			(navigator.msMaxTouchPoints > 0));
	};
	$(document).ready(function() {
		if ( !isTouchDevice() ) {
			$( '.poll-multi-choice .poll-item' ).mouseover( function() {
				$( this ).addClass( "poll-item-sel" );
			}).mouseout( function() {
				$( this ).removeClass( "poll-item-sel" );
			});
		}
	});
}(jQuery));
</script>
<!-- [END] Mouse Over -->

<input type='hidden' name='msg-select-one' value='<?php echo $poll->attr( "msg-select-one" ); ?>' />
<input type='hidden' name='msg-already-voted' value='<?php echo $poll->attr( "msg-already-voted" ); ?>' />
<input type='hidden' name='tip-box-duration' value='<?php echo $poll->attr( "tip-box-duration" ); ?>' />
</form>

</div>

<?php if ( $poll->attr( "b-reset-block" ) ): ?>
<!-- [BEGIN] Reset Button -->
<button class="ap-clear-block"><?php echo $poll->attr( "msg-reset-block" ); ?></button>
<!-- [END] Reset Button -->
<?php endif; ?>

</div>
