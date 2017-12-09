<?php 
	//BEGIN INCLUDES
	$poll =& $this->poll;
	include($_SERVER['DOCUMENT_ROOT']."/hivefive/nosync/hush/dimwit.php");

	// BEGIN DEFINITIONS
	$pollResultsClass = $poll->prt->getTClassName();
	$pollTitle = $poll->attr( "title" );
	$item = $poll->getAllItems();
	$msgCMDOutput="";



	//BEGIN RETRIEVE PAYOUTS
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
	//END RETRIEVE PAYOUTS


	//BEGIN RETRIEVE SITE STATS
	$sitecurl = curl_init();
	curl_setopt_array($sitecurl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'https://api.coinhive.com/stats/site?secret='.$secret, CURLOPT_CONNECTTIMEOUT => 3, CURLOPT_TIMEOUT => 5 ));
	$siteresult = curl_exec($sitecurl);
	//echo $siteresult;
	curl_close($sitecurl);
	///Deocde Json
	$sitedata = json_decode($siteresult,true);
	//END RETRIEVE SITE STATS

	function buildTable($item, $sitedata, $payoutdata){
		foreach( $item as $key ) { 
			$percent=$key->getPercent(1);
			$money= round((($sitedata['xmrPending']+$sitedata['xmrPaid'])*$percent/100)*$payoutdata['xmrToUsd'],2);

			echo "
				<tr>
					<td align='right' class='poll-caption-cont'>
						<span";
			if($key->isVoted()){ 
				echo "style='font-weight:bold;'";
			}
				
			echo "
				>".$key->getName()."</span>
					</td>
					<td></td>
					<td align='left'>
						<div>
							<div class='ap-bar poll-bar' ap-wratio='".$key->getWRatio()."' style='width: calc(10%/".$key->getWRatio().");'></div>
						</div>
					</td>
					<td></td>
					<td align='right' >".$key->getPercent(1)."%&nbsp;($".$money.")</td>
					<td></td>
					<td align='right'>".$key->getCount()."</td>
				</tr>
			";
		}
	}

	//BEGIN MORE DEFINITIONS
	$totalMoney=round((($sitedata['xmrPending']+$sitedata['xmrPaid'])*$payoutdata['xmrToUsd']),2);
	$totalMoneyFormat = number_format((float)$totalMoney, 2, '.', '');
	$totalString="A total of $".$totalMoneyFormat."USD has been raised and a total of ".$poll->getTotal()." votes have been placed.";
	$msgThankYou = $poll->attr( "msg-thank-you" );
	$msgReturn = $poll->attr( "msg-return" );

	if ( $poll->ended() ){
		$msgCMDOutput = $poll->attr( "msg-ended" );
		sleep(10);
		$msgCMDOutput = "";
	}

	$msgCMDOutput=$totalString;
	//END MORE DEFINITIONS

?>
<script>
	var cmdOutput = '<?php echo $msgCMDOutput; ?>';

	setInterval(function(){
		if(cmdOutput != ""){
			document.getElementById("results-cmd-output").innerHTML = cmdOutput;
		}
	}, 3000);


</script>

<div class='poll-result <?php echo $poll->prt->getTClassName(); ?>'>
	<div class='poll-inner'>
		<form class='poll-form'>
			<div class='poll-title'>
				<?php echo $pollTitle; ?>
			</div>
			<table class='poll-table results-table'>
				<?php buildTable($item, $sitedata, $payoutdata); ?>
			</table>
			<div class='ap-ref-tipbox'>
				<input type='button' class='ap-front poll-button button' value='<?php echo $msgReturn; ?>'>
			</div>
			<input type='hidden' name='msg-thank-you' value='<?php echo $poll->attr( "msg-thank-you" ); ?>' />
		</form>
		<div class="poll-cmd" id="results-cmd-output"></div>
	</div>
</div>
