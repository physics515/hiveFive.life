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
        <form class="pollForm">
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
                echo '  <div class="pollTableRow">
                            <div class="pollTableCell">
                                <input class="pollItemSelector" type="radio" name="cause" id="pollSelectedItem'. $n .'" value="'. $pollItem['name'. $n] .'">
                            </div>
                            <div class="pollTableCell">'. $pollItem['name'. $n] .'</div>
                            <div class="pollTableCell">'. $pollItem['votes'. $n] .'</div>
                            <div class="pollTableCell">'. $pollItem['percent'. $n] .'%</div>
                            <div class="pollTableCell">$'. $pollItem['money'. $n] .'</div>
                        </div>
                ';
                $n++;
            }

                echo '
                <div class="pollTableFooterRow">
                        <div class="pollTableCell"></div>
                        <div class="pollTableCell">Total:</div>
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
        </form>';
    }



    testpage();
?>