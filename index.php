<!doctype HTML>
<html lang="en" width="100%" height="100%">
    <head>

        <!-- BEGIN META TAGS -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- END META TAGS -->


        <!-- BEGIN BRANDING -->
        <title>HiveFive.Life</title>
        <!-- END BRANDING -->

        <!-- BENGIN LINK STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- BENGIN LINK STYLE SHEETS -->


        <!-- BEGIN POLL DEPENDENCIES -->
        <script type="text/javascript" src="poll/jquery.js"></script>
        <script type="text/javascript" src="poll/ajax-poll.php"></script>
        <!-- END POLL DEPENDENCIES -->
        
        <!-- BEGIN MINER DEPENDENCIES -->
        <!-- <script src="https://authedmine.com/lib/simple-ui.min.js" async></script> -->
        <script src="https://authedmine.com/lib/authedmine.min.js"></script>
        <!-- END MINER DEPENDENCIES -->


        <!-- BEGIN GOOGLE FONT DEPENDENCIES -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <!-- END GOOGLE FONT DEPENDENCIES -->


        <!-- BEGIN SITE-WIDE DEPENDENCIES -->
        <script type="text/javascript" src="hiveFive.js"></script>
        <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
        <!-- END SITE-WIDE DEPENDENCIES -->

    </head>

    <body>

        <!-- BEGIN HEADER CONTENT SPACE -->
        <header>
                Miner Status: &nbsp;//<small id="tcount"></small> &nbsp;//<small id="hps"/></small> &nbsp;//<small id="ths"/></small> &nbsp;//<small id="tah"></small>
        </header>
        <!-- END HEADER HEADER CONTENT SPACE -->

        <!-- BEGIN MAIN CONTENT SPACE -->
        <main>
                <center>

                        <!-- BEGIN ELEMENTS FOR MINE PAGE -->
                        <img class="logo-mine" id="logo-mine" src="images/hivefivelogo-02-02.svg">
                        <!-- BEGIN MONERO (COINHIVE) MINER -->

                        <div id="EQ">
                                <div id="coinhive-miner">
                                        <?php echo file_get_contents("images/equalizer/equalizer.svg"); ?>
                                </div>

                                <div id="divPlayPause">
                                        <?php echo file_get_contents("images/equalizer/playPause-01.svg"); ?>
                                </div>
                        </div>
                        <!-- END MONERO (COINHIVE) MINER -->
                        <!-- END ELEMENTS FOR MINE PAGE -->

                        <!-- BEGIN ELEMENTS FOR POLL PAGE -->
                        <img class="logo-vote" id="logo-vote" src="images/hivefivelogo-02-02.svg" style="display:none;">
                        <div id="ajax-poll" class='ajax-poll' tclass='poll-simple' style="display:none;"></div>
                        <!-- END ELEMENTS FOR POLL PAGE -->

                </center>
        </main>
        <!-- END MAIN CONTENT SPACE -->

        <!-- BEGIN FOOTER CONTENT SPACE -->
        <footer>

                <!-- BEGIN NAVIGATION MENU -->
                <input class="button" id="votePage" onclick="pollClick()" type="button" value="VOTE!">
                <input class="button" id="forum" onclick="window.open('http://hivefive.life/forum/','_blank');" type="button" value="COMMUNITY!">
                <!-- END NAVIGATION MENU -->

        </footer>
        <!-- END FOOTER CONTENT SPACE -->

    </body>
</html>