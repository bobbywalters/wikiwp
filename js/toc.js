var wwp_toc = {
	headers : null,
	createSection : function(i) {
		var s, v;
		s = document.createElement('div');
		s.setAttribute('class', 'wwp-toc-section-' + this.headers[i].nodeName.toLowerCase());
		v = document.createElement('span');
		v.setAttribute('onclick', 'wwp_toc.scroll(' + i + ')');
		v.appendChild(document.createTextNode(this.headers[i].innerText));
		s.appendChild(v);

		return s;
	},
	createTitle : function() {
		var t, v;
		t = document.createElement('div');
		t.setAttribute('class', 'wwp-toc-title');
		v = document.createElement('span');
		v.appendChild(document.createTextNode(wwp_toc_i18n.contents));
		t.appendChild(v);

		return t;
	},
	createToc : function(p) {
		var i, toc, ss;
		toc = document.createElement('div');
		toc.appendChild(this.createTitle());
		toc.setAttribute('class', 'wwp-toc');
		ss = document.createElement('div');
		ss.setAttribute('class', 'wwp-toc-sections');
		for (i = 0; i < this.headers.length; ++i) {
			ss.appendChild(this.createSection(i));
		}
		toc.appendChild(ss);
		p.parentNode.insertBefore(toc, p);
	},
	init : function() {
		var c, p;
		p = document.querySelector('.container .content');
		if (p.classList.contains('fee-post')) {
			c = p.querySelector('.fee-content > .fee-content-original');
		} else {
			c = p;
		}
		this.headers = c.querySelectorAll('h2, h3, h4');
		if (this.headers && this.headers.length) {
			this.createToc(p);
		}
	},
	scroll : function(i) {
		window.location.hash = 'wwp-toc-' + i;
		wwp_toc.headers[i].scrollIntoView();
	}
};
wwp_toc.init();
