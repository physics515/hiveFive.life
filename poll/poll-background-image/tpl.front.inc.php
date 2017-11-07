<?php $poll =& $this->poll; ?>
<?php include( "css/style.inc.php" ); ?>

<div class='poll-front <?php echo $poll->prt->getTClassName(); ?>' style='display:none;
	background-position:center center;
	background-image:url(<?php echo $poll->getFolderUrl(); ?>images/bg-front.jpg);'>
<div class='poll-inner'>

<img class="poll-input-img" src="<?php echo $poll->getFolderUrl();
?>images/<?php echo $poll->attr( "vote-input" ); ?>.png" />

<form class='poll-form'>

<div class='poll-title'>
	<?php echo $poll->attr( "title" ); ?>
</div>

<!-- [BEGIN] Looping through all the items -->
<div style='margin-bottom:20px;'>
<table class='poll-table' border="0" cellpadding="0" cellspacing="0" style='width:auto;'>
<?php foreach( $poll->getAllItems() as $item ) { ?>
<tr>
	<td align='left'>
		<label style='cursor:pointer;'>
		<input type="<?php echo $poll->attr( "vote-input" ); ?>"
			class="poll-input"
			name="answer"
			value="<?php echo $item->getName(); ?>"　/>
		</label>
	</td>
	<td class='poll-caption-cont' align='left'>
		<?php echo $item->getName(); ?>
	</td>
</tr>
<?php } ?>
</table>
</div>
<!-- [END] Looping through all the items -->

<?php if ( $poll->started() ): ?>
<!-- [BEGIN] Vote & View Buttons -->
<div class='ap-ref-tipbox' style='text-align:center;height:20px;margin-bottom:20px;'>
	<div class="ap-vote poll-button"
	><?php echo $poll->attr( "msg-vote" ); ?></div>
</div>

<div style='text-align:left;margin-bottom:20px;'>
	<a href='#' class="ap-result poll-link"><?php echo $poll->attr( "msg-view-result" ); ?></a>
</div>
<!-- [END] Vote & View Buttons -->
<?php else: ?>
<div class='poll-time-msg'>
	<?php echo $poll->attr( "msg-not-started" ); ?>
</div>
<?php endif; ?>

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

<!-- [BEGIN] preload background on the result page -->
<script>
	setTimeout(function(){
		if (document.images) {
			img1 = new Image();
			img1.src = "<?php echo $poll->getFolderUrl(); ?>images/bg-result.jpg";
		}
	},300);
</script>
<!-- [END] preload background on the result page -->

