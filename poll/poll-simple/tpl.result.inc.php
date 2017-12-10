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
			$money= number_format((float)(round((($sitedata['xmrPending']+$sitedata['xmrPaid'])*$percent/100)*$payoutdata['xmrToUsd'],2)),2,'.','');

			
			echo "
			<span class='poll-result-row' ";
			if($key->isVoted()){
				echo "style='font-weight:bold;'";
			}
			echo "> <span class='poll-result-cell name'>".$key->getName()."</span>
			<span class='poll-result-cell count'>".$key->getCount()."</span>
			<span class='poll-result-cell percent'>".$key->getPercent(1)."%</span>
			<span class='poll-result-cell money'>$".$money."USD</span>
			<div class='ap-bar poll-bar' ap-wratio='".$key->getWRatio()."' style='width: calc(100%*".$key->getWRatio().");'></div>
			</span>
			<div class='poll-result-row spacer'></div>
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
			<br>
			<div class="poll-results-table">
				<span class="poll-result-row header">
					<span class='poll-result-cell name'><b>NAME</b></span>
					<span class='poll-result-cell count'><b>VOTES</b></span>
					<span class='poll-result-cell percent'><b>%</b></span>
					<span class='poll-result-cell money'><b>RAISED</b></span>
				</span>
				<br>
				<?php buildTable($item, $sitedata, $payoutdata); ?>
				<br>
			</div>
			<div class='ap-ref-tipbox'>
				<input type='button' class='ap-front poll-button button' value='<?php echo $msgReturn; ?>'>
			</div>
			<input type='hidden' name='msg-thank-you' value='<?php echo $poll->attr( "msg-thank-you" ); ?>' />
		</form>
		<div class="poll-cmd" id="results-cmd-output"></div>
	</div>
</div>
