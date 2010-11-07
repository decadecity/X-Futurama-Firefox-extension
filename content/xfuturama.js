var XFuturama = function () { this.onLoad() };
XFuturama.Singleton = function() {
	if (typeof window['FUTURAMA'] == 'undefined') {
		window['FUTURAMA'] = new XFuturama();
	}
};

XFuturama.SkinPath = 'chrome://xfuturama/skin/';

XFuturama.Icons = {
	bender:	XFuturama.SkinPath + 'bender-16.png',
	leela:	XFuturama.SkinPath + 'leela-16.png',
	fry:	XFuturama.SkinPath + 'fry-16.png',
  zapp:  XFuturama.SkinPath + 'zapp-16.png',
  professor:  XFuturama.SkinPath + 'professor-16.png'
};

XFuturama.Images = {
	bender:	XFuturama.SkinPath + 'bender.png',
	leela:	XFuturama.SkinPath + 'leela.png',
	fry:	XFuturama.SkinPath + 'fry.png',
  zapp:  XFuturama.SkinPath + 'zapp.png',
  professor:  XFuturama.SkinPath + 'professor.png'
};

XFuturama.prototype = {
	/* constructorishness */
	onLoad: function() {
		this.initialized = true;
		this.character = '';
		this.quote = '';
		this.popup = null;
		this.panel = document.getElementById('x-futurama-panel');

		this.register();
	},

	register: function() {
		var obs = Components.classes["@mozilla.org/observer-service;1"].
			getService(Components.interfaces.nsIObserverService);
		obs.addObserver(this, "http-on-examine-response", false);
	},

	unregister: function() {
		var obs = Components.classes["@mozilla.org/observer-service;1"].
			getService(Components.interfaces.nsIObserverService);
		obs.removeObserver(this, "http-on-examine-response");
	},

	/* observe response objects */
	observe: function(subject, topic, data) {
		var channel = subject.QueryInterface(Components.
			interfaces.nsIChannel);
		var request = subject.QueryInterface(Components.
			interfaces.nsIRequest);

		if (topic == 'http-on-examine-response') {
			if ((channel.contentType != 'text/html') ||
			   !(request.loadFlags & request.LOAD_INITIAL_DOCUMENT_URI))
				return;

			this.resetQuote();
			var http = subject.QueryInterface(Components.
				interfaces.nsIHttpChannel);
			http.visitResponseHeaders(this);
		}
	},

	/* iterator for response headers */
	visitHeader: function(header, value) {
		var match;
		if (match = header.match(/^X-(Bender|Leela|Fry|Zapp|Professor)/i)) {
			this.setupQuote(match[1], value);
		}
	},

	resetQuote: function() {
		this.character = this.quote = '';
		this.panel.setAttribute('hidden', true);
	},

	setupQuote: function(character, quote) {
                quote = quote;
		this.character = character;
		this.quote = quote;

		this.panel.setAttribute('src', XFuturama.Icons[character.toLowerCase()]);
		this.panel.setAttribute('tooltiptext', character + ': ' + quote);
		this.panel.setAttribute('label', quote);
		this.panel.setAttribute('hidden', false);
	},

	showQuote: function() {
		if (this.character == '' || this.quote == '')
			return;

		if (this.popup != null) {
			this.popup.close();
			this.popup = null;
		}

		this.popup = window.open('chrome://xfuturama/content/quote.xul', 
			'xfuturama', 'chrome');

		this.popup.quote = this.quote;
		this.popup.character = this.character;
		this.popup.onload = function() {
			var image = this.document.getElementById('character-image');
			image.setAttribute('src', XFuturama.Images[this.character.toLowerCase()]);
			var desc = this.document.getElementById('quote-text');
			desc.textContent = this.quote;
		};
		this.popup.onkeypress = function(ev) {
			if (ev.keyCode == ev.DOM_VK_ESCAPE) {
				this.close();
			} else if (ev.ctrlKey && (ev.charCode == 'c'.charCodeAt(0) 
				|| ev.charCode == 'C'.charCodeAt(0))) {
				this.copyToClipboard();
			}
		};
	},
}


window.addEventListener("load", function(e) { XFuturama.Singleton(); }, false); 
window.addEventListener("unload", function(e) { FUTURAMA.unregister(); }, false); 
