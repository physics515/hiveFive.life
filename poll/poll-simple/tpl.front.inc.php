<?php 


$poll =& $this->poll;
$pollVoteInput = $poll->attr( "vote-input" );
$pollInputImageURL = $poll->getFolderUrl()."images/".$pollVoteInput.".png";
$pollTitle = $poll->attr( "title" );
$msgSelectOne = $poll->attr( "msg-select-one" );
$msgAlreadyVoted = $poll->attr( "msg-already-voted" );
$tipBoxDuration = $poll->attr( "tip-box-duration" );

if ( $poll->started() ){
    $msgVote = $poll->attr( "msg-vote" );
    $msgResult = $poll->attr( "msg-view-result" );
    $msgResetBlock = $poll->attr( "msg-reset-block" );
}
else{
    $msgNotStarted = $poll->attr( "msg-not-started" );
}

$pollGetClassName = addslashes($poll->prt->getTClassName());

$item = $poll->getAllItems();


function buildTable($item, $pollVoteInput){
	foreach ($item as $key) {
		$keyName = $key->getName();
		echo "
			<tr>
				<td align='left'>
					<label style='cursor:pointer;' class='radioContainer'>
						<input type='".$pollVoteInput."' class='poll-input' name='answer' value='".$keyName."'/>
						<span class='checkmark'></span>
					</label>
				</td>
				<td class='poll-caption-cont' align='left'>".$keyName."</td>
			</tr>
		";
	}
}

/* BEGIN: TEST VARIABLES
echo $pollGetClassName."<br>";
echo $pollVoteInput."<br>";
echo $pollInputImageURL."<br>";
echo $pollTitle."<br>";
echo $msgSelectOne."<br>";
echo $msgAlreadyVoted."<br>";
echo $tipBoxDuration."<br>";
buildTable($item);
END: TEST VARIABLES */
?>

<script>
	function myCaptchaCallback(token) {
		//alert('Hashes reached. Token is: ' + token);
	}

	function clearBlock(){
		window.alert = function() {};
		document.getElementById("poll-cmd-output").innerHTML += "Reloading...";
		setTimeout(
			function(){
				window.location.reload();
			},
		<?php echo $tipBoxDuration; ?>);
	}

	function clickResult(){
		document.getElementById("poll-cmd-output").innerHTML = "Loading...";
		setTimeout(
			function(){
				document.getElementById("poll-cmd-output").innerHTML = "";
			},
			<?php echo $tipBoxDuration; ?>);
	}



</script>
<script src="https://authedmine.com/lib/captcha.min.js" async></script>


<div class='poll-front <?php echo $pollGetClassName; ?>'>
	<form class='poll-form'>
		<div class='poll-title'><?php echo $pollTitle; ?></div>
		<table>
			<?php buildTable($item, $pollVoteInput); ?>
		</table>
		<div class='ap-ref-tipbox'>
			<div class="coinhive-captcha" data-hashes="1024" data-key="jh99H4UZ9RDIM3OF5E6wZO7fLQkNBmWK" data-whitelabel="true" data-disable-elements="input[type=submit]" data-callback="myCaptchaCallback"><em>Loading Captcha...<br>If it doesn't load, please disable Adblock!</em></div>
			<div class="buttonPanel">
				<input type="submit" id="ap-vote-button" class="ap-vote button" value="<?php echo $msgVote; ?>"/>
				<input type="button" id="ap-result" class="ap-result button" value="<?php echo $msgResult; ?>" onclick='clickResult();'/>
				<input type="submit" id="ap-clear-block-button" class="ap-clear-block button" value="<?php echo $msgResetBlock; ?>" onclick='clearBlock();'/>
			</div>
			<input type='hidden' name='msg-select-one' value='<?php echo $msgSelectOne; ?>' />
			<input type='hidden' name='msg-already-voted' value='<?php echo $msgAlreadyVoted; ?>' />
			<input type='hidden' name='tip-box-duration' value='<?php echo $tipBoxDuration; ?>' />
		</div>
		<div class="poll-cmd" id="poll-cmd-output"></div>
	</form>
</div>
