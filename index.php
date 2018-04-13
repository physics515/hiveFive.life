<!doctype HTML>
<html lang="en" width="100%" height="100%">
    <head>

        <!-- BEGIN META TAGS -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="manifest" href="/manifest.json">
        <meta name="theme-color" content="#362A0B">
        <!-- END META TAGS -->


        <!-- BEGIN BRANDING -->
        <title>HiveFive.Life</title>
        <!-- END BRANDING -->

        <!-- BENGIN LINK STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- BENGIN LINK STYLE SHEETS -->


        <!-- BEGIN POLL DEPENDENCIES -->
        <script type="text/javascript" src="poll/jquery.js" async></script>
        <script type="text/javascript" src="poll/ajax-poll.php" async></script>
        <!-- END POLL DEPENDENCIES -->
        
        <!-- BEGIN MINER DEPENDENCIES -->
        <!-- <script src="https://authedmine.com/lib/simple-ui.min.js" async></script> -->
        <script src="https://authedmine.com/lib/authedmine.min.js"></script>
        <!-- END MINER DEPENDENCIES -->


        <!-- BEGIN GOOGLE FONT DEPENDENCIES -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" async></script>
        <!-- END GOOGLE FONT DEPENDENCIES -->


        <!-- BEGIN SITE-WIDE DEPENDENCIES -->
        <script type="text/javascript" src="hiveFive.js" async></script>
        <!-- END SITE-WIDE DEPENDENCIES -->

        <!-- BEGIN LOAD SERVICE WORKER -->
        <script type="text/javascript">
                if ('serviceWorker' in navigator) {
                        window.addEventListener('load', function() {
                                navigator.serviceWorker.register('/serviceWorker.js').then(function(registration) {
                                        // Registration was successful
                                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                                }, function(err) {
                                        // registration failed :(
                                        console.log('ServiceWorker registration failed: ', err);
                                });
                        });
                }                
        </script>
        <!-- END LOAD SERVICE WORKER -->

    </head>

    <body>

        <!-- BEGIN HEADER CONTENT SPACE -->
        <header id="header" style="display: none;">
                <b>Miner Status:</b> &nbsp;&nbsp;|&nbsp;&nbsp;<small id="tcount"></small>&nbsp;&nbsp;|&nbsp;&nbsp;<small id="hps"/></small>&nbsp;&nbsp;|&nbsp;&nbsp;<small id="ths"/></small>&nbsp;&nbsp;|&nbsp;&nbsp;<small id="tah"></small>
        </header>
        <!-- END HEADER HEADER CONTENT SPACE -->

        <!-- BEGIN MAIN CONTENT SPACE -->
        
        <div id="mine-settings" onclick="mineSettingsClick()">
                <img src="images/gear-icon.svg">
        </div> 

        <main>
                <center>

                        <!-- BEGIN ELEMENTS FOR MINE PAGE -->
                        <img class="logo-mine" id="logo-mine" alt="hiveFive|life Logo" src="images/hivefivelogo-02-10-2018.svg">
                        <!-- BEGIN MONERO (COINHIVE) MINER -->

                        <div id="EQ">
                                <div id="EQ-container">
                                        <div id="coinhive-miner">
                                                <?php echo file_get_contents("images/equalizer/equalizer.svg"); ?>
                                        </div>

                                        <div id="divPlayPause">
                                                <?php echo file_get_contents("images/equalizer/playPause-01.svg"); ?>
                                        </div>
                                </div>
                        </div>
                        <!-- END MONERO (COINHIVE) MINER -->
                        <!-- END ELEMENTS FOR MINE PAGE -->


                        <!-- BEGIN ELEMENTS FOR POLL PAGE -->
                        <img class="logo-vote" id="logo-vote" src="images/hivefivelogo-02-10-2018.svg" style="display:none;">
                        <div id="ajax-poll" class='ajax-poll' tclass='poll-simple' style="display:none;"></div>
                        <!-- END ELEMENTS FOR POLL PAGE -->


                        <!-- BEGIN ELEMENTS FOR COMMUNITY PAGE -->
                        <div id="community-display" style="display:none;">
                                <iframe src="https://hivefive.life/community/forum/" seamless="seamless" seamless><title>Forum</title></iframe>
                        </div>
                        <!-- END ELEMENTS FOR COMMUNITY PAGE -->


                        <!-- BEGIN ELEMENTS FOR MANIFEST PAGE -->
                        <div id="manifest" style="display:none;">
                                <iframe src="/manifest/manifest.php" seamless="seamless" seamless><title>Manifest</title></iframe>
                        </div>
                        <!-- END ELEMENTS FOR MANIFEST PAGE -->

                </center>
        </main>
        <!-- END MAIN CONTENT SPACE -->

        <!-- BEGIN FOOTER CONTENT SPACE -->
        <footer class="mainfoot" style="display:table !important;">

                <!-- BEGIN NAVIGATION MENU -->
                <div class="buttonPanel">
                        <input class="button" id="minePage" onclick="mineClick()" type="button" value="MINE!">  
                        <input class="button" id="votePage" onclick="pollClick()" type="button" value="VOTE!">
                        <input class="button" id="manifestPage" onclick="manifestClick()" type="button" value="MANIFEST!">
                        <input class="button" id="forum" onclick="forumClick()" type="button" value="COMMUNITY!">
                </div>
                <!-- END NAVIGATION MENU -->

        </footer>
        <!-- END FOOTER CONTENT SPACE -->

    </body>

        <!-- BEGIN FIREBASE SCRIPT -->
        <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
        <script>
                // Initialize Firebase
                var config = {
                        apiKey: "AIzaSyDPRiYV-OB9N3syJccVKdTNaAnMl4qU0_I",
                        authDomain: "hivefivelife.firebaseapp.com",
                        databaseURL: "https://hivefivelife.firebaseio.com",
                        projectId: "hivefivelife",
                        storageBucket: "hivefivelife.appspot.com",
                        messagingSenderId: "738568223165"
                };
                firebase.initializeApp(config);
        </script>
        <!-- END FIREBASE SCRIPT -->
</html>