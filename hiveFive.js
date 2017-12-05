
/*
      BEGIN: WHEN THE "VOTE!" BUTTON IS CLICKED
*/

function voteClick() {

    // Check if the poll is NOT visible.
    if (document.getElementById("ajax-poll").style.display === "none") {

        // If the poll is NOT visible then make it visible.
        document.getElementById("ajax-poll").style.display = "block";
    } else {

        // Else make the poll invisible
        document.getElementById("ajax-poll").style.display = "none";
    }


    // Check if the equalizer is NOT visible.
    if (document.getElementById("EQ").style.display === "none") {

        // If the equalizer is NOT visible then make it visible.
        document.getElementById("EQ").style.display = "block";
    } else {

        //Else make the equalizer invisible
        document.getElementById("EQ").style.display = "none";
    }


    // Check if the if the button text is "VOTE!".
    if (document.getElementById("votePage").value === "VOTE!") {

        // If the button text is "VOTE!" then change the text to "MINE!"
        document.getElementById("votePage").value = "MINE!";
    } else {

        // Else change the button text to "VOTE!"
        document.getElementById("votePage").value = "VOTE!";
    }


    // If the logo that is displayed on the poll page is NOT visible
    if (document.getElementById("logo-vote").style.display == "none") {

        // Then make the logo visible.
        document.getElementById("logo-vote").style.display = "block";
    } else {

        // Else make the logo invisible.
        document.getElementById("logo-vote").style.display = "none";
    }


    // If the logo that is displayed on the main page is NOT visible
    if ( document.getElementById("logo-mine").style.display == "none") {

        // Then make the logo visible.
        document.getElementById("logo-mine").style.display = "block";
    } else {

        // Else make the logo invisible.
        document.getElementById("logo-mine").style.display = "none";
    }
}

/*
      END: WHEN THE "VOTE!" BUTTON IS CLICKED
*/



/*
      BEGIN: GOOGLE WEB FONTS
*/

// Load Google Fonts Roboto family to be used throughout site
WebFont.load({ google: {families: ['Roboto', 'Roboto Bold', 'Roboto Black']} });

/*
        END: GOOGLE WEB FONTS
*/



/*
        BEGIN: COINHIVE MINER RELATED FUNCTIONS
*/

// Define a new coinHive miner using the hiveFive.Life public key
// [autoThreads] Whether to automatically adjust the number of threads for optimal performance. This feature is experimental. The default is false.
// [throttle] The fraction of time that threads should be idle. See miner.setThrottle() for a detailed explanation. The default is 0. [currently set to 30% of CPU usage]
// [forceASMJS] If true, the miner will always use the asm.js implementation of the hashing algorithm. If false, the miner will use the faster WebAssembly version if supported and otherwise fall back to asm.js. The default is false.
// [theme] The color theme for the opt-in screen - AuthedMine only. "light" or "dark". The default is "light".
// [language] 	The language (ISO 639-1 code) to use for the opt-in screen - AuthedMine only. The default is "auto" which selects the language based on the user's "accept-language" browser setting. Currently supported: ab, af, ar, be, bg, bs, ca, cs, da, de, el, en, eo, es, et, eu, fa, fi, fr, he, hi, hr, hu, id, it, ja, ka, ko, lt, lv, mr, ms, nb, nl, nn, no, os, pl, pt, pt-BR, ro, ru, si, sl, sq, sr, sv, ta, th, tr, uk, vi, yo, zh.
miner = new CoinHive.User('jh99H4UZ9RDIM3OF5E6wZO7fLQkNBmWK', 'HiveFiveLife', {
    autoThreads: true,
    throttle: 0.3,
    forceASMJS: false,
    theme: 'light',
    language: 'auto'
  });

// Start mining
// [CoinHive.IF_EXCLUSIVE_TAB] The miner will only start if no other tabs are already mining. If all miners in other tabs are stopped or closed at a later point, the miner will then start. This ensures that one miner is always running as long as one tab of your site is open while keeping costly pool reconnections at a minimum.
// [CoinHive.FORCE_EXCLUSIVE_TAB] The miner will always start and immediately kill all miners in other tabs that have not specified CoinHive.FORCE_MULTI_TAB.
// [CoinHive.FORCE_MULTI_TAB] The miner will always start. It will not announce its presence to other tabs, will not kill any other miners and can't be killed by other miners. This mode is used by the captcha and shortlinks.
miner.start(CoinHive.FORCE_EXCLUSIVE_TAB);

// Update stats once per second
setInterval(function() {

    // Get variables from miner
    var threadCount = miner.getNumThreads();
    var hashesPerSecond = Math.round(miner.getHashesPerSecond() * 100) / 100;
    var totalHashes = miner.getTotalHashes();
    var acceptedHashes = miner.getAcceptedHashes() / 256;

    // Output to HTML elements
    if (miner.isRunning()) {
        document.getElementById("tcount").innerHTML = "Threads: " + threadCount;
        document.getElementById("hps").innerHTML = "Hashes/sec: " + hashesPerSecond;
        document.getElementById("ths").innerHTML = "Total Hashes: " + totalHashes;
        document.getElementById("tah").innerHTML = "Accepted Hashes: " + acceptedHashes;
        //document.getElementById("minebutton").innerHTML = "<button onclick=\"miner.stop()\">Stop Mining</button>";
    } else {
        //document.getElementById("hps").innerHTML = "Please click start";
        //document.getElementById("ths").innerHTML = "to support";
        //document.getElementById("tah").innerHTML = "this site";
        //document.getElementById("minebutton").innerHTML = "<button onclick='miner.start(CoinHive.FORCE_EXCLUSIVE_TAB)'>Start Mining</button>";
    }
}, 1000);

// When the page has fully loaded check to see if the miner is running.

document.addEventListener("load", 
function(){

    // If the miner is running
    setTimeout(function(){
        if(miner.isRunning()){

            // Set the "Play/Pause" button to display "Pause"
            document.getElementById("circle").setAttribute("class", "");
            document.getElementById("circle1").setAttribute("class", "play");
            document.getElementById("from_play_to_pause").beginElement();
        }
        else{
    
            // Else set the "Play/Pause" Button to "Play"
            document.getElementById("mineAnni").style.display = "none";
        }
    }, 3000);
}
, false);

// If the "Play/Pause" is clicked.
function startMining(){

    // If the miner is already running
    if(miner.isRunning())
    {
        // Stop the miner
        miner.stop();

        // Set the "Play/ Pause" button to "Play"
        document.getElementById("circle").setAttribute("class", "play");
        document.getElementById("circle1").setAttribute("class", "");
        document.getElementById("from_pause_to_play").beginElement();

        // Fade the Equalizer out
        fade(document.getElementById("mineAnni"));
    } else {

        // Else set the "Play/Pause" button to "Pause"
        document.getElementById("circle").setAttribute("class", "");
        document.getElementById("circle1").setAttribute("class", "play");
        document.getElementById("from_play_to_pause").beginElement();

        // Start the miner
        miner.start(CoinHive.FORCE_EXCLUSIVE_TAB);

        // Fade the Equalizer in
        unfade(document.getElementById("mineAnni"));
    }
}



/*
      END: COINHIVE MINER RETLATED FUNCTIONS
*/



/*
        BEGIN: EQUALIZER RELATED FUNCTIONS
*/

// Every 1/2 second set variable THNew with the current Accepted hash count
setInterval(function() {
    // [getAcceptedHashes()] Returns the total number of hashes this miner has solved. Note that this number is typically updated only once per second.
    // [interpolate] If interpolate is true, the miner will estimate the current number of hashes down to the millisecond. This can be useful if you want to display a fast increasing number to the user, such as in the miner on Coinhive's start page.
    THNew = miner.getAcceptedHashes() / 256;
}, 500);

// Once a second check see if the THNew variable is different than the current accepted hashes. If it is this means that the current accepted hashes has increased.
setInterval(function() {
    
    // If the THNew variable is different than the current accepted hash count
    if((miner.getAcceptedHashes(true) / 256) > THNew){
        
        // Update the run counter to prove the function is running.
        //document.getElementById("run").innerHTML++;

        // Change the color of the stroke of the Miner Equalizer
        document.getElementById("mineAnni").setAttribute("stroke", "#FFC920");

        // Wait 1 second and change the stroke back to the original color
        setTimeout(function(){
            document.getElementById("mineAnni").setAttribute("stroke", "#FFE57A");
        }, 1000);
    }
}, 1000);

// Update start times of animation elements once per second
setInterval(function() {

    // Get variables from miner
    var hashesPerSecond = Math.round(miner.getHashesPerSecond() * 100) / 100;

    // Output to HTML elements
    if (miner.isRunning()) {
        if((Math.round(hashesPerSecond) * .1) > 0){
          document.getElementById("p2").setAttribute("begin", "p1.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 1 + "s");
          document.getElementById("p2-1").setAttribute("begin", "p1.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 1 + "s");
          document.getElementById("p3").setAttribute("begin", "p2.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 2 + "s");
          document.getElementById("p3-1").setAttribute("begin", "p2.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 2 + "s");
          document.getElementById("p4").setAttribute("begin", "p3.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 3 + "s");
          document.getElementById("p4-1").setAttribute("begin", "p3.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 3 + "s");
          document.getElementById("p5").setAttribute("begin", "p4.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 4 + "s");
          document.getElementById("p5-1").setAttribute("begin", "p4.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 4 + "s");
          document.getElementById("p6").setAttribute("begin", "p5.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 5 + "s");
          document.getElementById("p6-1").setAttribute("begin", "p5.begin+" + Math.round(10 / (hashesPerSecond*.1)) + 5 + "s");
        }
    } else {
        document.getElementById("p1").setAttribute("fill", "freeze");
        document.getElementById("p1-1").setAttribute("fill", "freeze");
        document.getElementById("p2").setAttribute("fill", "freeze");
        document.getElementById("p2-1").setAttribute("fill", "freeze");
        document.getElementById("p3").setAttribute("fill", "freeze");
        document.getElementById("p3-1").setAttribute("fill", "freeze");
        document.getElementById("p4").setAttribute("fill", "freeze");
        document.getElementById("p4-1").setAttribute("fill", "freeze");
        document.getElementById("p5").setAttribute("fill", "freeze");
        document.getElementById("p5-1").setAttribute("fill", "freeze");
        document.getElementById("p6").setAttribute("fill", "freeze");
        document.getElementById("p6-1").setAttribute("fill", "freeze");
    }
}, 1000);

// Fade any elements opacity to transparent and remove it from page
function fade(element) {
    var op = 1;
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 50);
}

// Add any element to page and fade its opacity from .1 to 1
function unfade(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 50);
}

/*
        END: EQUALIZER RETATED FUNCTIONS
*/
