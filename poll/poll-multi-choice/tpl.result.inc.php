<?php $poll =& $this->poll; ?>
<?php include( "css/style.inc.php" ); ?>

<div class='poll-result <?php echo $poll->prt->getTClassName(); ?>' style='display:none;'>
<div class='poll-inner'>

<form class='poll-form'>

<div class='poll-title'>
	<?php echo $poll->attr( "title" ); ?>
</div>

<!-- [BEGIN] Looping through all the items -->
<div style='margin-bottom:20px;'>
<?php foreach( $poll->getAllItems() as $item ) { ?>
<div class='poll-item'>
	<div style='margin:3px 0;'>
		<?php echo $item->getName(); ?>:
		<span><?php echo $item->getPercent(); ?>%</span>
		<span><?php echo $item->getCount(); ?></span>
		<?php if ( $item->isVoted() ): ?>
			<span style='color:red;'>«««</span>
		<?php endif; ?>
	</div>
	<div class='ap-bar poll-bar' ap-wratio='<?php echo $item->getWRatio(); ?>'></div>
</div>
<?php } ?>
</div>
<!-- [END] Looping through all the items -->

<!-- [BEGIN] Show total vote counts -->
<div class='ap-ref-tipbox' style='text-align:center;margin-bottom:10px;'>
	<span style='color:white;font-weight:bold;font-size:16px;'>
		<?php echo $poll->attr( "msg-total" ); ?>
		<?php echo $poll->getTotal(); ?>
	</span>
</div>
<!-- [END] Show total vote counts -->

<?php if ( $poll->ended() ): ?>
<div class='poll-time-msg'>
	<?php echo $poll->attr( "msg-ended" ); ?>
</div>
<?php else: ?>
<!-- [BEGIN] Back button -->
<div style='text-align:center;margin-bottom:20px;'>
	<button class="ap-front ap-ref-tipbox poll-button">
		<?php echo $poll->attr( "msg-return" ); ?>
	</button>
</div>
<!-- [END] Back button -->
<?php endif; ?>

<input type='hidden' name='msg-thank-you' value='<?php echo $poll->attr( "msg-thank-you" ); ?>' />
</form>

</div>
</div>
