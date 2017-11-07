<?php $poll =& $this->poll; ?>
<?php 
	include( "css/style.inc.php" ); 
	include($_SERVER['DOCUMENT_ROOT']."/hivefive/nosync/hush/dimwit.php");
?>

<!--  BEGIN RETRIEVE PAYOUTS -->
<?php

	$payoutcurl = curl_init();
	curl_setopt_array($payoutcurl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'https://api.coinhive.com/stats/payout?secret='.$secret, CURLOPT_CONNECTTIMEOUT => 3, CURLOPT_TIMEOUT => 5 ));
	$payoutresult = curl_exec($payoutcurl);
	//echo $payoutresult;
	curl_close($payoutcurl);

	///Deocde Json
	$payoutdata = json_decode($payoutresult,true);

	///Count
	$total=count($payoutdata);
	$Str='<h1>Total : '.$total.'</h1><br>';
	//echo $Str;

	///You Can Also Make In Table:
	foreach ($payoutdata as $key => $value){
		//echo 'Key:&nbsp;'.$key.'&nbsp; Value:&nbsp;'.$value.'<br>';
	}

?>
<!--  END RETRIEVE PAYOUTS -->





<!--  BEGIN RETRIEVE SITE STATS -->
<?php

	$sitecurl = curl_init();
	curl_setopt_array($sitecurl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'https://api.coinhive.com/stats/site?secret='.$secret, CURLOPT_CONNECTTIMEOUT => 3, CURLOPT_TIMEOUT => 5 ));
	$siteresult = curl_exec($sitecurl);
	//echo $siteresult;
	curl_close($sitecurl);

	///Deocde Json
	$sitedata = json_decode($siteresult,true);

	/*
		///Count
		$total=count($sitedata);
		$Str='<h1>Total : '.$total.'</h1><br>';
		echo $Str;

		///You Can Also Make In Table:
		foreach ($sitedata as $key => $value){
			echo 'Key:&nbsp;'.$key.'&nbsp; Value:&nbsp;'.$value.'<br>';
		}
	*/


?>
<!--  END RETRIEVE SITE STATS -->




<div class='poll-result <?php echo $poll->prt->getTClassName(); ?>' style='display:none;'>
	<div class='poll-inner'>
		<form class='poll-form'>
			<div class='poll-title'>
				<?php echo $poll->attr( "title" ); ?>
			</div>

<!-- [BEGIN] Looping through all the items -->

			<div style='margin-bottom:20px;align:center;'>
				<center>
					<table class='poll-table' border='0' cellpadding="0" cellspacing="0" width='500px'>
						<?php 
							foreach( $poll->getAllItems() as $item ) { 
							$percent=$item->getPercent(1);
							$money= round((($sitedata['xmrPending']+$sitedata['xmrPaid'])*$percent/100)*$payoutdata['xmrToUsd'],2);
						?>
						<tr>
							<td width="50%" align='right' class='poll-caption-cont'>
								<span <?php if ( $item->isVoted() ){ ?> style='font-weight:bold;' <?php } ?>>
									<?php echo $item->getName(); ?>
								</span>
							</td>
							<td width='8'></td>
							<td align='left'>
								<div>
									<div class='ap-bar poll-bar' ap-wratio='<?php echo $item->getWRatio(); ?>'></div>
								</div>
							</td>
							<td width='8'></td>
							<td width='40' align='right' ><?php echo $item->getPercent(1); ?>%&nbsp;($<?php echo $money; ?>)</td>
							<td width='8'></td>
							<td width='30' align='right'><?php echo $item->getCount(); ?></td>
						</tr>
						<?php } ?>
					</table>
				</center>
			</div>
<!-- [END] Looping through all the items -->


<!-- [BEGIN] Show total vote counts -->
			<center>
				<div style='text-align:center;margin-bottom:20px; align:center;'>
					<span style='font-weight:bold; font-size:14pt;'>
						<?php echo "Total:" ?>
						<?php
							$totalMoney=round((($sitedata['xmrPending']+$sitedata['xmrPaid'])*$payoutdata['xmrToUsd']),2);
							echo "$".$totalMoney."USD raised and a total of ".$poll->getTotal()." votes have been placed."; 
						?>
					</span>
				</div>
			</center>
<!-- [END] Show total vote counts -->



			<?php if ( $poll->ended() ): ?>
			<div class='poll-time-msg'>
				<?php echo $poll->attr( "msg-ended" ); ?>
			</div>
			<?php else: ?>
<!-- [BEGIN] Back button -->
			<div class='ap-ref-tipbox' style='text-align:center;margin-bottom:20px;'>
				<button class="ap-front poll-button">
					<?php echo $poll->attr( "msg-return" ); ?>
				</button>
			</div>
<!-- [END] Back button -->
			<?php endif; ?>

			<input type='hidden' name='msg-thank-you' value='<?php echo $poll->attr( "msg-thank-you" ); ?>' />
		</form>

	</div>
</div>