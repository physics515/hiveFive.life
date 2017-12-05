<?php $poll =& $this->poll; ?>
<!--
<style>
<?php include( "css/style.css" ); ?>
</style>
-->

<div class='poll-front <?php echo $poll->prt->getTClassName(); ?>' style='display:none;'>
	<div class='poll-inner'>
		<img class="poll-input-img" src="<?php echo $poll->getFolderUrl(); ?>images/<?php echo $poll->attr( "vote-input" ); ?>.png" />
		<form class='poll-form'>
			<div class='poll-title' id="fittext-poll-title">
				<?php echo $poll->attr( "title" ); ?>
			</div>

			<!-- [BEGIN] Looping through all the items -->

			<div style='margin-bottom:20px;text-align:center;'>
				<table class='poll-table' border="0" cellpadding="0" cellspacing="0" style='100%'>
					<?php foreach( $poll->getAllItems() as $item ) { ?>
						<tr>
							<td align='left'>
								<label style='cursor:pointer;'>
									<input type="<?php echo $poll->attr( "vote-input" ); ?>" class="poll-input" name="answer" value="<?php echo $item->getName(); ?>" />
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





			<!-- BEGIN CAPTCHA -->




			<div class='ap-ref-tipbox' style='text-align:center;margin-bottom:20px;'>
				<script src="https://authedmine.com/lib/captcha.min.js" async></script>
				<script>
					function myCaptchaCallback(token) {
						//alert('Hashes reached. Token is: ' + token);
					}
				</script>
				<div class="coinhive-captcha" data-hashes="1024" data-key="jh99H4UZ9RDIM3OF5E6wZO7fLQkNBmWK" data-whitelabel="true" data-disable-elements="input[type=submit]" data-callback="myCaptchaCallback">
					<em>Loading Captcha...<br>
					If it doesn't load, please disable Adblock!</em>
				</div>




				<!-- END CAPTCHA -->

				<!-- submit button will be automatically disabled and later enabled again when the captcha is solved -->
				<input type="submit" class="ap-vote poll-button" value="<?php echo $poll->attr( "msg-vote" ); ?>"/>
				<!--
					<button class="ap-vote poll-button">
						<?php //echo $poll->attr( "msg-vote" ); ?>
					</button>
				-->
				<input type="button" class="ap-result poll-button" value="<?php echo $poll->attr( "msg-view-result" ); ?>"/>
				<!--
				<button class="ap-result poll-button">
					<?php echo $poll->attr( "msg-view-result" ); ?>
				</button>
				-->
				<input class="ap-clear-block" type="submit" value="<?php echo $poll->attr( "msg-reset-block" ); ?>" onclick="window.location.reload();" />
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

	<!--<input class="ap-clear-block" type="submit" value="<?php //echo $poll->attr( "msg-reset-block" ); ?>" onclick="window.location.reload();" />-->
	<!-- <button class="ap-clear-block"><?php //echo $poll->attr( "msg-reset-block" ); ?></button> -->

	<!-- [END] Reset Button -->

	<?php endif; ?>

</div>
