self.CoinHive = self.CoinHive || {};

self.CoinHive.CONFIG = {
    LIB_URL: "https://authedmine.com/lib/",
    ASMJS_NAME: "worker-asmjs.min.js?v7",
    REQUIRES_AUTH: true,
    WEBSOCKET_SHARDS: [
        ["wss://ws001.authedmine.com/proxy", "wss://ws002.authedmine.com/proxy", "wss://ws003.authedmine.com/proxy", "wss://ws004.authedmine.com/proxy", "wss://ws005.authedmine.com/proxy", "wss://ws006.authedmine.com/proxy", "wss://ws007.authedmine.com/proxy", "wss://ws008.authedmine.com/proxy"],
        ["wss://ws009.authedmine.com/proxy", "wss://ws010.authedmine.com/proxy", "wss://ws011.authedmine.com/proxy", "wss://ws012.authedmine.com/proxy", "wss://ws013.authedmine.com/proxy", "wss://ws014.authedmine.com/proxy", "wss://ws015.authedmine.com/proxy", "wss://ws016.authedmine.com/proxy"],
        ["wss://ws017.authedmine.com/proxy", "wss://ws018.authedmine.com/proxy", "wss://ws019.authedmine.com/proxy", "wss://ws020.authedmine.com/proxy", "wss://ws021.authedmine.com/proxy", "wss://ws022.authedmine.com/proxy", "wss://ws023.authedmine.com/proxy", "wss://ws024.authedmine.com/proxy"],
        ["wss://ws025.authedmine.com/proxy", "wss://ws026.authedmine.com/proxy", "wss://ws027.authedmine.com/proxy", "wss://ws028.authedmine.com/proxy", "wss://ws029.authedmine.com/proxy", "wss://ws030.authedmine.com/proxy", "wss://ws031.authedmine.com/proxy", "wss://ws032.authedmine.com/proxy"]
    ],
    CAPTCHA_URL: "https://authedmine.com/captcha/",
    MINER_URL: "https://authedmine.com/media/miner.html",
    AUTH_URL: "https://authedmine.com/authenticate.html"
};

(function (window) {
    "use strict";
    var Captcha = function (div) {
        this.div = div;
        this.goal = parseInt(this.div.dataset.hashes, 10) || 1024;
        this.key = this.div.dataset.key;
        this.callback = this.div.dataset.callback;
        this.disableSelector = this.div.dataset.disableElements;
        this.autostart = div.dataset.autostart === "true";
        this.whitelabel = div.dataset.whitelabel === "true";
        this.div.innerHTML = "";
        this.iframe = document.createElement("iframe");
        this.iframe.style.width = "304px";
        this.iframe.style.height = "78px";
        this.iframe.style.border = "none";
        this.iframe.src = CoinHive.CONFIG.CAPTCHA_URL + "?goal=" + this.goal + "&key=" + this.key + "&autostart=" + (this.autostart ? "1" : "0") + "&whitelabel=" + (this.whitelabel ? "1" : "0");
        this.div.appendChild(this.iframe);
        this.input = document.createElement("input");
        this.input.type = "hidden";
        this.input.name = "coinhive-captcha-token";
        this.div.appendChild(this.input);
        window.addEventListener("message", this.onMessage.bind(this));
        if (this.disableSelector) {
            var elements = document.querySelectorAll(this.disableSelector);
            for (var i = 0; i < elements.length; i++) {
                elements[i].disabled = true
            }
        }
    };
    Captcha.prototype.onMessage = function (ev) {
        if (ev.source !== this.iframe.contentWindow) {
            return
        }
        if (ev.data.type === "coinhive-goal-reached" && ev.data.params) {
            this.input.value = ev.data.params.token;
            if (this.callback) {
                var callback = window[this.callback];
                if (typeof callback === "function") {
                    callback(ev.data.params.token)
                }
            }
            if (this.disableSelector) {
                var elements = document.querySelectorAll(this.disableSelector);
                for (var i = 0; i < elements.length; i++) {
                    elements[i].disabled = false
                }
            }
        }
    };
    Captcha.ElementsCreated = false;
    Captcha.CreateElements = function () {
        if (Captcha.ElementsCreated) {
            return
        }
        Captcha.ElementsCreated = true;
        var elements = document.querySelectorAll(".coinhive-captcha");
        for (var i = 0; i < elements.length; i++) {
            new Captcha(elements[i])
        }
    };
    window.CoinHive = window.CoinHive || {};
    window.CoinHive.Captcha = Captcha;
    if (document.readyState === "complete" || document.readyState === "interactive") {
        Captcha.CreateElements()
    } else {
        document.addEventListener("readystatechange", function () {
            if (document.readyState === "complete" || document.readyState === "interactive") {
                Captcha.CreateElements()
            }
        })
    }
})(window);