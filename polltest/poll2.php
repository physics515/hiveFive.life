<?php
    #define variables
    $cmd = "";
    $txt = "";
    $n = 0;
    $path = "votes.txt";
    $pollTotalMoney = 0;
    $pollTotalVotes = 0;
    $pollTotalPercent = 0;
    $pollTitle = "hiveFive|life Demo Beta";
    $pollHead = array(
        '1' => "*",
        '2' => "CAUSE",
        '3' => "VOTES",
        '4' => "%",
        '5' => "USD");

    # open file
    $handle = fopen( $path, "r+" );

    # aquire exclusive lock
    if ( !( flock( $handle, LOCK_EX ) ) ) {
        echo "Can not write data.";
    }
    else{

        # check file contains data
        $size = filesize( $path );
        if ( $size > 0 ) {

            # read file
            $txt = fread( $handle, $size );
        }

        # remove return characters
        $txt = str_replace( "\r", "", $txt );

        # explode into an array by line
        $pollRow = explode( "\n", $txt );

        # explode each row into cell data
        foreach( $pollRow as $data){
            $i = 0;
            $data = explode( "|", $data);
            $pollItem['name'.$n] = $data[$i++];
            $pollItem['votes'.$n] = $data[$i++];
            $pollItem['percent'.$n] = $data[$i++];
            $pollItem['money'.$n] = $data[$i++];
            $pollItem['ratio'.$n] = $data[$i++];
            $n++;
        }
    }

    function addVote($voted){
        global $pollItem, $pollRow;

        # is 'pollanswer' posted
        $answer = isset( $_REQUEST['pollanswer'] ) ? $_REQUEST['pollanswer'] : "";

        # decode json to php variable
        $answer = json_decode( $answer, true );


        if ( $voted && !empty($answer) ) {
            $voted = false;
            if ( isset( $pollItem['votes' . $answer] ) ) {
                $$pollItem['votes' . $answer] = $pollItem['votes' . $answer]++;
                $found = true;
            }

            if ( $found ) {
                # truncate file
                fseek( $handle, 0 );
                ftruncate( $handle, 0 );

                $n=0;
                $ax=array();
                while($n < count($pollRow)){
                    $ax[] = $pollItem['name' . $n] . "|" . $pollItem['votes'. $n] . "|" . $pollItem['percent'. $n] . "|" . $pollItem['money'. $n] . "|" . $pollItem['ratio'. $n];
                    $n++;
                }

                # write votes to txt file
                fwrite( $handle, implode( "\r\n", $ax ) );
            } else {
                echo "Item ({$answer}) not declared";
            }
        }
    }
    
    # release exclusive lock
    flock( $handle, LOCK_UN );

    # close datafile
    fclose($handle);

    function testpage(){
        global $pollTitle, $pollHead, $n, $pollRow, $pollItem, $pollTotalMoney, $pollTotalVotes, $pollTotalPercent;

        echo '
        <link rel="stylesheet" type="text/css" href="style.css">
        <div id="captchaPanel" style="display:none;"><div class="coinhive-captcha" data-hashes="1024" data-key="jh99H4UZ9RDIM3OF5E6wZO7fLQkNBmWK" data-whitelabel="false" data-disable-elements="input[type=submit]" data-callback="captchaComplete"> Hello World!</div></div>
        <form id="pollForm" class="pollForm">
            <div class="pollTable">
                <div class="pollTableCaption"><h1>' . $pollTitle . '</h1></div>
                <div class="pollTableHeaderRow">
                        <div class="pollTableCell"><h2>' . $pollHead['1']. '</h2></div>
                        <div class="pollTableCell"><h2>' . $pollHead['2'] . '</h2></div>
                        <div class="pollTableCell"><h2>' . $pollHead['3'] . '</h2></div>
                        <div class="pollTableCell"><h2>' . $pollHead['4'] . '</h2></div>
                        <div class="pollTableCell"><h2>' . $pollHead['5'] . '</h2></div>
                </div>
            ';

            $n=0;
            while($n < count($pollRow)){
                if($n %2 == 0){
                    $bgColor = "background-color: lightgrey;";
                }
                else{
                    $bgColor = "";
                }
                $oppositePercent = 100 - $pollItem['percent'. $n];

                echo '  <div class="pollTableRow">
                            <div class="pollTableCell" style="'. $bgColor .'">
                                <input class="pollItemSelector" type="radio" name="cause" id="pollSelectedItem'. $n .'" value="'. $pollItem['name'. $n] .'">
                            </div>
                            <div class="pollTableCell" style="text-align: left; '. $bgColor .'">'. $pollItem['name'. $n] .'</div>
                            <div class="pollTableCell pollVote" style="'. $bgColor .'"><div class="pollResult" style="display:none;">'. $pollItem['votes'. $n] .'</div></div>
                            <div class="pollTableCell pollPercent" style="'. $bgColor .'"><div class="pollResult" style="display:none;">'. $pollItem['percent'. $n] .'%</div></div>
                            <div class="pollTableCell pollMoney" style="'. $bgColor .'"><div class="pollResult" style="display:none;">$'. $pollItem['money'. $n] .'</div></div>
                        </div>
                        <div class="pollTableRow" style="column-span: all;">
                            <span style="width:100%; display: block; position: absolute; height: 7pt; background: linear-gradient(left, lightgrey '. $pollItem['percent'. $n] .'%, white '. $oppositePercent .'%); background: -webkit-linear-gradient(left, lightgrey '. $pollItem['percent'. $n] .'%, white '. $oppositePercent .'%);"></span>
                        </div>
                ';
                $n++;
            }

                echo '
                <div class="pollTableFooterRow">
                        <div class="pollTableCell"></div>
                        <div class="pollTableCell" style="text-align: left;">Total:</div>
                        <div class="pollTableCell">';

                        $n=0;
                        $pollTotalVotes = 0;
                        while($n < count($pollRow)){
                            $pollTotalVotes += $pollItem['votes'. $n];
                            $n++;
                        }
                        echo $pollTotalVotes;

                echo '  </div>
                        <div class="pollTableCell">';

                        $n=0;
                        $pollTotalPercent = 0;
                        while($n < count($pollRow)){
                            $pollTotalPercent += $pollItem['percent'. $n];
                            $n++;
                        }
                        echo $pollTotalPercent . '%';


                echo '  </div>
                        <div class="pollTableCell">';

                        $n=0;
                        $pollTotalMoney = 0;
                        while($n < count($pollRow)){
                            $pollTotalMoney += $pollItem['money'. $n];
                            $n++;
                        }
                        $pollTotalMoney = number_format((float)$pollTotalMoney, 2, '.', '');
                        echo '$' . $pollTotalMoney;
                    
                echo '  </div>
                </div>
            </div>
            <div class="buttonPanel">
                <input class="button" type="submit" value="Submit">
                <input class="button" type="button" value="Vote Again">
                <input class="button" type="button" value="View Results" onclick="pollViewResults()">
            </div>
        </form>

        ';
    }

    testpage();
?>

<script src="https://authedmine.com/lib/captcha.min.js" async></script>


<script type="text/javascript">
function pollViewResults(){
    var voteElements = document.getElementsByClassName('pollResult');

    for(var i = 0, length = voteElements.length; i < length; i++) {
        if( voteElements[i].style.display == 'none'){
            voteElements[i].style.display = 'block';
        }
        else{
            voteElements[i].style.display = 'none';
        }
    }
}

function displayCaptcha(captcha){
    if(!captcha){
        var width = document.getElementById('pollForm').clientWidth;
        var height = document.getElementById('pollForm').clientHeight;

        document.getElementById('captchaPanel').style.width = width;
        document.getElementById('captchaPanel').style.height = height;
        document.getElementById('captchaPanel').style.lineHeight = height;
        document.getElementById('captchaPanel').style.paddingTop = height/8;
        document.getElementById('pollForm').style.display = "none";
        document.getElementById('captchaPanel').style.display = "block";
        document.getElementById('captchaPanel').style.textAlign = "center";
    }
    else{
        document.getElementById('pollForm').style.display = "table";
        document.getElementById('captchaPanel').style.display = "none";
    }
}

function captchaComplete(){
    displayCaptcha(true);
}
</script>

<script type="text/javascript">
    window.onload = displayCaptcha(false);
</script>