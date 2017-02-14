/*
 *
 * CMS ENVO
 * JS for Admin Control Panel and Site with custom modification
 * Copyright © 2016 Bluesat.cz
 *
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Written by: Bluesat.cz - (http://www.bluesat.cz)
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */

$(function () {
	$(".jaktip").tooltip();

	$('.quickedit').on('click', function (e) {
		e.preventDefault();
		frameSrc = $(this).attr("href");
		$('#JAKModalLabel').html(jakWeb.jak_quickedit);
		$('#JAKModal').on('show.bs.modal', function () {
			$('<iframe src="' + frameSrc + '" width="100%" height="450" frameborder="0">').appendTo('.modal-body');
		});
		$('#JAKModal').on('hidden.bs.modal', function () {
			window.location.reload();
		});
		$('#JAKModal').modal({show: true});
	});

	$('.commedit').on('click', function (e) {
		e.preventDefault();
		frameSrc = $(this).attr("href");
		$('#JAKModalLabel').html(jakWeb.jak_quickedit);
		$('#JAKModal').on('show.bs.modal', function () {
			$('<iframe src="' + frameSrc + '" width="100%" height="400" frameborder="0">').appendTo('.modal-body');
		});
		$('#JAKModal').on('hidden.bs.modal', function () {
			window.location.reload();
		});
		$('#JAKModal').modal({show: true});
	});

	$('.lightbox').on('click', function (e) {
		e.preventDefault();
		$(this).jakBox();
	});

});

/* 00. GET THE LIKE BUTTON
 ========================================================================*/
// Get the like button
var elems = document.getElementsByClassName('jak-like');
var likeBox = likebox_result = likeBoxLink = likebox_div = false;

document.addEventListener('DOMContentLoaded', function () {

	// get all elements on the page
	[].forEach.call(elems, function (el) {

		// Get the button
		likeBoxLink = el.getElementsByClassName("jak-like-link")[0];

		// listen to hover
		likeBoxLink.addEventListener("click", function () {

			// get the button bubble
			likeBox = el.getElementsByClassName("jak-like-btn likeanimated")[0];

			if (likeBox.style.display === '') {
				addLikeCSS(likeBox);
			} else {
				removeLikeCSS(likeBox);
			}

		});

	});

});

// Run the server sent events
function getLikeCounter(aid, locid) {

	var request = new XMLHttpRequest();
	request.open('GET', jakWeb.jak_url + 'include/ajax/like_results.php?aid=' + aid + '&locid=' + locid, true);

	request.onload = function () {
		if (request.status >= 200 && request.status < 400) {
			// Success!
			var data = JSON.parse(request.responseText);
			handleLikeResults(aid, data);
		} else {
			// We reached our target server, but it returned an error

		}
	};

	request.onerror = function () {
		// There was a connection error of some sort
	};

	request.send();

}

// Write the new results
function handleLikeResults(aid, msg) {

	// We have a like
	if (msg.status) {

		// Select the correct container
		likebox_result = document.getElementById("likebutton" + aid);
		likebox_div = likebox_result.querySelector('.jak-like-results');

		// Finally insert the correct result
		likebox_div.innerHTML = msg.content;

	}

}

function updateLikeCounter(aid, locid, feelid) {

	likebox_result = document.getElementById("likebutton" + aid);

	// now let's do call the results
	var likebox_uid = likebox_result.getAttribute("data-userid");
	var likebox_uname = likebox_result.getAttribute("data-username");
	var likebox_email = likebox_result.getAttribute("data-email");

	var request = new XMLHttpRequest();
	request.open('GET', jakWeb.jak_url + 'include/ajax/like_update.php?aid=' + aid + '&locid=' + locid + '&feelid=' + feelid, true);

	request.onload = function () {
		if (request.status >= 200 && request.status < 400) {
			// Success!
			var data = JSON.parse(request.responseText);

			if (data.status == 1) {
				getLikeCounter(aid, locid);

			}

			likebox_div = likebox_result.querySelector('.jak-like-btn');
			removeLikeCSS(likeBox);
		} else {
			// We reached our target server, but it returned an error

		}
	};

	request.onerror = function () {
		// There was a connection error of some sort
	};

	request.send();

}

function addLikeCSS(lb) {
	lb.style.display = 'block';
	// add class
	if (lb.classList) {
		lb.classList.add("fadeInUp");
	} else {
		lb.className = lb.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
	}
}

function removeLikeCSS(lb) {
	// remove class
	if (lb.classList) {
		lb.classList.remove("fadeInUp");
	} else {
		lb.className = lb.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
	}
	lb.style.display = '';
}

(function () {
	jakWeb = {
		jak_lang: "",
		jak_url: "",
		jak_url_orig: "",
		request_uri: "",
		jak_search_link: "",
		jak_template: "",
		jak_heatmap: "",
		jak_quickedit: "",
		jak_acp_nav: false
	}
})();

/* 00. BROWSER DETECION FOR JQUERY v1.9
 ========================================================================*/
(function ($) {
	var ua = navigator.userAgent.toLowerCase(),
		match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
			/(webkit)[ \/]([\w.]+)/.exec(ua) ||
			/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
			/(msie) ([\w.]+)/.exec(ua) ||
			ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) || [],
		browser = match[1] || "",
		version = match[2] || "0";

	jQuery.browser = {};

	if (browser) {
		jQuery.browser[browser] = true;
		jQuery.browser.version = version;
	}

	// Chrome is Webkit, but Webkit is also Safari.
	if (jQuery.browser.chrome) {
		jQuery.browser.webkit = true;
	} else if (jQuery.browser.webkit) {
		jQuery.browser.safari = true;
	}
})(jQuery);




/* 00. XXX
 ========================================================================*/
(function ($) {

	$.fn.alphanumeric = function (p) {

		p = $.extend({
			ichars: "öäüéàèô£†Ω°¡øπœ∑€®¢æ§¨!@#$%^&*()+=[]\\\';,/{}|:<>?~`. ",
			nchars: "",
			allow: ""
		}, p);

		return this.each
		(
			function () {

				if (p.nocaps) p.nchars += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				if (p.allcaps) p.nchars += "abcdefghijklmnopqrstuvwxyz";

				s = p.allow.split('');
				for (i = 0; i < s.length; i++) if (p.ichars.indexOf(s[i]) != -1) s[i] = "\\" + s[i];
				p.allow = s.join('|');

				var reg = new RegExp(p.allow, 'gi');
				var ch = p.ichars + p.nchars;
				ch = ch.replace(reg, '');

				$(this).keypress
				(
					function (e) {

						if (!e.charCode) k = String.fromCharCode(e.which);
						else k = String.fromCharCode(e.charCode);

						if (ch.indexOf(k) != -1) e.preventDefault();
						if (e.ctrlKey && k == 'v') e.preventDefault();

					}
				);

				$(this).bind('contextmenu', function () {
					return false
				});

			}
		);

	};

	$.fn.numeric = function (p) {

		var az = "abcdefghijklmnopqrstuvwxyz";
		az += az.toUpperCase();

		p = $.extend({
			nchars: az
		}, p);

		return this.each(function () {
				$(this).alphanumeric(p);
			}
		);

	};

	$.fn.alpha = function (p) {

		var nm = "1234567890";

		p = $.extend({
			nchars: nm
		}, p);

		return this.each(function () {
				$(this).alphanumeric(p);
			}
		);

	};

})(jQuery);

/* 00. AJAX SEARCH
 ========================================================================*/
// Ajax Search
(function ($) {

	$.fn.ajaxSearch = function (settings) {

		var defaultSettings = {
			apiURL: '',
			resultsDiv: $('#ajaxsearchR'),
			seo: '',
			searchid: '',
			msgtypeid: '',
			msg: 'No result were found',
			working: false,
			append: false
		}

		$('#ajaxsearchForm').submit(function () {

			/* Combining the default settings object with the supplied one */
			sett = $.extend(defaultSettings, settings);

			if (sett.working) return false;

			// Input id
			usrinput = $('#Jajaxs').val();

			sett.working = true;
			$('.loadSearchResult').fadeIn();

			// Get the result
			$.get(sett.apiURL, {
				q: usrinput,
				url: jakWeb.jak_url,
				url_detail: jakWeb.jak_search_link,
				seo: sett.seo,
				searchid: sett.searchid,
				msgtypeid: sett.msgtypeid
			}, function (r) {

				sett.working = false;
				$('.loadSearchResult').fadeOut();

				if (r.length) {

					// If results were returned, add them to a pageContainer div,
					// after which append them to the #resultsDiv:

					var pageContainer = $('<div>').addClass('ajaxspageContainer');


					pageContainer.append(r);

					if (!sett.append) {
						// This is executed when running a new search,
						// instead of clicking on the More button:
						sett.resultsDiv.empty();
					}

					pageContainer.append('<div class="clearfix"></div>').hide().appendTo(sett.resultsDiv).fadeIn('slow');

					$('.hideSearchResult').fadeIn();
					$('.hideAdvSearchResult').fadeOut();

				}
				// No result display the nothing found message
				else {

					$('.hideSearchResult').fadeOut();

					// No results were found for this search.

					sett.resultsDiv.empty();
					$('<div>', {html: sett.msg}).addClass('alert bg-danger').hide().appendTo(sett.resultsDiv).fadeIn();
				}
			});

			return false;

		});

		$('.hideSearchResult a').click(function (e) {
			e.preventDefault();
			defaultSettings.resultsDiv.empty();
			$('.hideSearchResult').fadeOut();
			$('.hideAdvSearchResult').fadeIn();
			$('#Jajaxs').val('');
		});
	};

})(jQuery);

/* 00. PASSWORD STRENGTH INDICATOR
 ========================================================================*/
/* Password strength indicator */
function passwordStrength(password) {

	var desc = [{'width': '0px'}, {'width': '20%'}, {'width': '40%'}, {'width': '60%'}, {'width': '80%'}, {'width': '100%'}];

	var descClass = ['', 'progress-bar-danger', 'progress-bar-danger', 'progress-bar-warning', 'progress-bar-success', 'progress-bar-success'];

	var score = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point
	if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if (password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))    score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 10) score++;

	// display indicator
	$("#jak_pstrength").removeClass(descClass[score - 1]).addClass(descClass[score]).css(desc[score]);
}

/* 00. Jasny Bootstrap v3.0.1-p7, maintained by @ArnoldDaniels
 ========================================================================*/

if ("undefined" == typeof jQuery)throw new Error("Bootstrap requires jQuery");
+function (a) {
	"use strict";
	var b = function (c, d) {
		this.$element = a(c), this.$canvas = d.canvas ? a(d.canvas) : this.$element, this.options = a.extend({}, b.DEFAULTS, d), this.transitioning = null, this.calcTransform(), this.transform || (this.$canvas = this.$element), "auto" === this.options.placement && (this.options.placement = this.calcPlacement()), this.options.recalc && (this.calcClone(), a(window).on("resize.bs.offcanvas", a.proxy(this.recalc, this))), this.options.autohide && a(document).on("click.bs.offcanvas", a.proxy(this.autohide, this));
		var e = "Microsoft Internet Explorer" == window.navigator.appName;
		if (e && this.$canvas !== this.$element) {
			var f = this.$canvas.find("*").filter(function () {
				return "fixed" === a(this).css("position")
			});
			this.$canvas = this.$canvas.add(f)
		}
		this.options.toggle && this.toggle()
	};
	b.DEFAULTS = {toggle: !0, placement: "auto", autohide: !0, recalc: !0}, b.prototype.calcTransform = function () {
		if (this.transform = !1, a.support.transition || this.$canvas !== this.$element) {
			var b = a('<div style="visibility: hidden"></div>'), c = {
				transform: "transform",
				webkitTransform: "-webkit-transform",
				OTransform: "-o-transform",
				msTransform: "-ms-transform",
				MozTransform: "-moz-transform"
			};
			b.appendTo(a("body"));
			for (var d in c)if (void 0 !== b[0].style[d]) {
				b[0].style[d] = "translate3d(1px,1px,1px)";
				var e = window.getComputedStyle(b[0]).getPropertyValue(c[d]);
				this.transform = c[d], this.translate = e.match(/^matrix3d/) ? "translate3d" : "translate";
				break
			}
			b.remove()
		}
	}, b.prototype.calcPlacement = function () {
		function b(a, b) {
			if ("auto" === e.css(b))return a;
			if ("auto" === e.css(a))return b;
			var c = parseInt(e.css(a), 10), d = parseInt(e.css(b), 10);
			return c > d ? b : a
		}

		var c = a(window).width() / this.$element.width(), d = a(window).height() / this.$element.height(), e = this.$element;
		return c > d ? b("left", "right") : b("top", "bottom")
	}, b.prototype.offset = function () {
		switch (this.options.placement) {
			case"left":
			case"right":
				return this.$element.outerWidth();
			case"top":
			case"bottom":
				return this.$element.outerHeight()
		}
	}, b.prototype.slideTransform = function (b, c) {
		var d = this.options.placement, e = this.transform;
		b *= "right" === d || "bottom" === d ? -1 : 1;
		var f = "left" === d || "right" === d ? "{}px, 0" : "0, {}px";
		return "translate3d" === this.translate && (f += ", 0"), f = this.translate + "(" + f + ")", a.support.transition ? (this.$canvas.css(e, f.replace("{}", b)), this.$element.one(a.support.transition.end, c).emulateTransitionEnd(350), void 0) : this.$canvas.animate({borderSpacing: b}, {
			step: function (b) {
				a(this).css(e, f.replace("{}", b))
			}, complete: c, duration: 350
		})
	}, b.prototype.slidePosition = function (b, c) {
		if (!a.support.transition) {
			var d = {};
			return d[this.options.placement] = b, this.$canvas.animate(d, 350, c)
		}
		this.$canvas.css(this.options.placement, b), this.$element.one(a.support.transition.end, c).emulateTransitionEnd(350)
	}, b.prototype.show = function () {
		if (!this.transitioning && !this.$canvas.hasClass("canvas-slid")) {
			var b = a.Event("show.bs.offcanvas");
			if (this.$element.trigger(b), !b.isDefaultPrevented()) {
				var c = function () {
					this.$canvas.addClass("canvas-slid").removeClass("canvas-sliding"), this.transitioning = 0, this.$element.trigger("shown.bs.offcanvas")
				};
				this.$element.is(":visible") && this.transform || this.$element.css(this.options.placement, -1 * this.offset() + "px"), this.$element.addClass("in"), this.$canvas.addClass("canvas-sliding"), this.$canvas != this.$element && a("body").css("overflow-x", "hidden"), this.transitioning = 1, this.transform ? this.slideTransform(this.offset(), a.proxy(c, this)) : this.slidePosition(0, a.proxy(c, this))
			}
		}
	}, b.prototype.hide = function (b) {
		if (!this.transitioning && this.$canvas.hasClass("canvas-slid")) {
			var c = a.Event("hide.bs.offcanvas");
			if (this.$element.trigger(c), !c.isDefaultPrevented()) {
				var d = function () {
					this.transitioning = 0, this.$element.removeClass("in").css("left", "").css("right", "").css("top", "").css("bottom", ""), this.$canvas.removeClass("canvas-sliding canvas-slid").css("transform", ""), a("body").css("overflow-x", ""), this.$element.trigger("hidden.bs.offcanvas")
				};
				if (b)return d.call(this);
				this.$canvas.removeClass("canvas-slid").addClass("canvas-sliding"), this.transitioning = 1, this.transform ? this.slideTransform(0, a.proxy(d, this)) : this.slidePosition(-1 * this.offset(), a.proxy(d, this))
			}
		}
	}, b.prototype.toggle = function () {
		this[this.$canvas.hasClass("canvas-slid") ? "hide" : "show"]()
	}, b.prototype.calcClone = function () {
		this.$calcClone = this.$element.clone().html("").addClass("offcanvas-clone").removeClass("in").appendTo(a("body"))
	}, b.prototype.recalc = function () {
		"none" !== this.$calcClone.css("display") && this.hide(!0)
	}, b.prototype.autohide = function (b) {
		0 === a(b.target).closest(this.$element).length && this.hide()
	};
	var c = a.fn.offcanvas;
	a.fn.offcanvas = function (c) {
		return this.each(function () {
			var d = a(this), e = d.data("bs.offcanvas"), f = a.extend({}, b.DEFAULTS, d.data(), "object" == typeof c && c);
			e || d.data("bs.offcanvas", e = new b(this, f)), "string" == typeof c && e[c]()
		})
	}, a.fn.offcanvas.Constructor = b, a.fn.offcanvas.noConflict = function () {
		return a.fn.offcanvas = c, this
	}, a(document).on("click.bs.offcanvas.data-api", "[data-toggle=offcanvas]", function (b) {
		var c, d = a(this), e = d.attr("data-target") || b.preventDefault() || (c = d.attr("href")) && c.replace(/.*(?=#[^\s]+$)/, ""), f = a(e), g = f.data("bs.offcanvas"), h = g ? "toggle" : d.data();
		b.stopPropagation(), g ? g.toggle() : f.offcanvas(h)
	})
}(window.jQuery), +function (a) {
	"use strict";
	var b = function (c, d) {
		this.$element = a(c), this.options = a.extend({}, b.DEFAULTS, d), this.$element.on("click.bs.rowlink", "td:not(.rowlink-skip)", a.proxy(this.click, this))
	};
	b.DEFAULTS = {target: "a"}, b.prototype.click = function (b) {
		var c = a(b.currentTarget).closest("tr").find(this.options.target)[0];
		if (a(b.target)[0] !== c)if (b.preventDefault(), c.click)c.click(); else if (document.createEvent) {
			var d = document.createEvent("MouseEvents");
			d.initMouseEvent("click", !0, !0, window, 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), c.dispatchEvent(d)
		}
	}, a.fn.rowlink = function (c) {
		return this.each(function () {
			var d = a(this), e = d.data("rowlink");
			e || d.data("rowlink", e = new b(this, c))
		})
	}, a.fn.rowlink.Constructor = b, a.fn.rowlink.noConflict = function () {
		return a.fn.inputmask = old, this
	}, a(document).on("click.bs.rowlink.data-api", '[data-link="row"]', function (b) {
		var c = a(this);
		c.data("rowlink") || (c.rowlink(c.data()), a(b.target).trigger("click.bs.rowlink"))
	})
}(window.jQuery), +function (a) {
	"use strict";
	var b = void 0 !== window.orientation, c = navigator.userAgent.toLowerCase().indexOf("android") > -1, d = "Microsoft Internet Explorer" == window.navigator.appName, e = function (b, d) {
		c || (this.$element = a(b), this.options = a.extend({}, e.DEFAULS, d), this.mask = String(this.options.mask), this.init(), this.listen(), this.checkVal())
	};
	e.DEFAULS = {
		mask: "",
		placeholder: "_",
		definitions: {9: "[0-9]", a: "[A-Za-z]", "?": "[A-Za-z0-9]", "*": "."}
	}, e.prototype.init = function () {
		var b = this.options.definitions, c = this.mask.length;
		this.tests = [], this.partialPosition = this.mask.length, this.firstNonMaskPos = null, a.each(this.mask.split(""), a.proxy(function (a, d) {
			"?" == d ? (c--, this.partialPosition = a) : b[d] ? (this.tests.push(new RegExp(b[d])), null === this.firstNonMaskPos && (this.firstNonMaskPos = this.tests.length - 1)) : this.tests.push(null)
		}, this)), this.buffer = a.map(this.mask.split(""), a.proxy(function (a) {
			return "?" != a ? b[a] ? this.options.placeholder : a : void 0
		}, this)), this.focusText = this.$element.val(), this.$element.data("rawMaskFn", a.proxy(function () {
			return a.map(this.buffer, function (a, b) {
				return this.tests[b] && a != this.options.placeholder ? a : null
			}).join("")
		}, this))
	}, e.prototype.listen = function () {
		if (!this.$element.attr("readonly")) {
			var b = (d ? "paste" : "input") + ".mask";
			this.$element.on("unmask.bs.inputmask", a.proxy(this.unmask, this)).on("focus.bs.inputmask", a.proxy(this.focusEvent, this)).on("blur.bs.inputmask", a.proxy(this.blurEvent, this)).on("keydown.bs.inputmask", a.proxy(this.keydownEvent, this)).on("keypress.bs.inputmask", a.proxy(this.keypressEvent, this)).on(b, a.proxy(this.pasteEvent, this))
		}
	}, e.prototype.caret = function (a, b) {
		if (0 !== this.$element.length) {
			if ("number" == typeof a)return b = "number" == typeof b ? b : a, this.$element.each(function () {
				if (this.setSelectionRange)this.setSelectionRange(a, b); else if (this.createTextRange) {
					var c = this.createTextRange();
					c.collapse(!0), c.moveEnd("character", b), c.moveStart("character", a), c.select()
				}
			});
			if (this.$element[0].setSelectionRange)a = this.$element[0].selectionStart, b = this.$element[0].selectionEnd; else if (document.selection && document.selection.createRange) {
				var c = document.selection.createRange();
				a = 0 - c.duplicate().moveStart("character", -1e5), b = a + c.text.length
			}
			return {begin: a, end: b}
		}
	}, e.prototype.seekNext = function (a) {
		for (var b = this.mask.length; ++a <= b && !this.tests[a];);
		return a
	}, e.prototype.seekPrev = function (a) {
		for (; --a >= 0 && !this.tests[a];);
		return a
	}, e.prototype.shiftL = function (a, b) {
		var c = this.mask.length;
		if (!(0 > a)) {
			for (var d = a, e = this.seekNext(b); c > d; d++)if (this.tests[d]) {
				if (!(c > e && this.tests[d].test(this.buffer[e])))break;
				this.buffer[d] = this.buffer[e], this.buffer[e] = this.options.placeholder, e = this.seekNext(e)
			}
			this.writeBuffer(), this.caret(Math.max(this.firstNonMaskPos, a))
		}
	}, e.prototype.shiftR = function (a) {
		for (var b = this.mask.length, c = a, d = this.options.placeholder; b > c; c++)if (this.tests[c]) {
			var e = this.seekNext(c), f = this.buffer[c];
			if (this.buffer[c] = d, !(b > e && this.tests[e].test(f)))break;
			d = f
		}
	}, e.prototype.unmask = function () {
		this.$element.unbind(".mask").removeData("inputmask")
	}, e.prototype.focusEvent = function () {
		this.focusText = this.$element.val();
		var a = this.mask.length, b = this.checkVal();
		this.writeBuffer();
		var c = this, d = function () {
			b == a ? c.caret(0, b) : c.caret(b)
		};
		d(), setTimeout(d, 50)
	}, e.prototype.blurEvent = function () {
		this.checkVal(), this.$element.val() !== this.focusText && this.$element.trigger("change")
	}, e.prototype.keydownEvent = function (a) {
		var c = a.which;
		if (8 == c || 46 == c || b && 127 == c) {
			var d = this.caret(), e = d.begin, f = d.end;
			return 0 === f - e && (e = 46 != c ? this.seekPrev(e) : f = this.seekNext(e - 1), f = 46 == c ? this.seekNext(f) : f), this.clearBuffer(e, f), this.shiftL(e, f - 1), !1
		}
		return 27 == c ? (this.$element.val(this.focusText), this.caret(0, this.checkVal()), !1) : void 0
	}, e.prototype.keypressEvent = function (a) {
		var b = this.mask.length, c = a.which, d = this.caret();
		if (a.ctrlKey || a.altKey || a.metaKey || 32 > c)return !0;
		if (c) {
			0 !== d.end - d.begin && (this.clearBuffer(d.begin, d.end), this.shiftL(d.begin, d.end - 1));
			var e = this.seekNext(d.begin - 1);
			if (b > e) {
				var f = String.fromCharCode(c);
				if (this.tests[e].test(f)) {
					this.shiftR(e), this.buffer[e] = f, this.writeBuffer();
					var g = this.seekNext(e);
					this.caret(g)
				}
			}
			return !1
		}
	}, e.prototype.pasteEvent = function () {
		var a = this;
		setTimeout(function () {
			a.caret(a.checkVal(!0))
		}, 0)
	}, e.prototype.clearBuffer = function (a, b) {
		for (var c = this.mask.length, d = a; b > d && c > d; d++)this.tests[d] && (this.buffer[d] = this.options.placeholder)
	}, e.prototype.writeBuffer = function () {
		return this.$element.val(this.buffer.join("")).val()
	}, e.prototype.checkVal = function (a) {
		for (var b = this.mask.length, c = this.$element.val(), d = -1, e = 0, f = 0; b > e; e++)if (this.tests[e]) {
			for (this.buffer[e] = this.options.placeholder; f++ < c.length;) {
				var g = c.charAt(f - 1);
				if (this.tests[e].test(g)) {
					this.buffer[e] = g, d = e;
					break
				}
			}
			if (f > c.length)break
		} else this.buffer[e] == c.charAt(f) && e != this.partialPosition && (f++, d = e);
		return !a && d + 1 < this.partialPosition ? (this.$element.val(""), this.clearBuffer(0, b)) : (a || d + 1 >= this.partialPosition) && (this.writeBuffer(), a || this.$element.val(this.$element.val().substring(0, d + 1))), this.partialPosition ? e : this.firstNonMaskPos
	};
	var f = a.fn.inputmask;
	a.fn.inputmask = function (b) {
		return this.each(function () {
			var c = a(this), d = c.data("inputmask");
			d || c.data("inputmask", d = new e(this, b))
		})
	}, a.fn.inputmask.Constructor = e, a.fn.inputmask.noConflict = function () {
		return a.fn.inputmask = f, this
	}, a(document).on("focus.bs.inputmask.data-api", "[data-mask]", function () {
		var b = a(this);
		b.data("inputmask") || b.inputmask(b.data())
	})
}(window.jQuery), +function (a) {
	"use strict";
	var b = "Microsoft Internet Explorer" == window.navigator.appName, c = function (b, c) {
		if (this.$element = a(b), this.$input = this.$element.find(":file"), 0 !== this.$input.length) {
			this.name = this.$input.attr("name") || c.name, this.$hidden = this.$element.find('input[type=hidden][name="' + this.name + '"]'), 0 === this.$hidden.length && (this.$hidden = a('<input type="hidden" />'), this.$element.prepend(this.$hidden)), this.$preview = this.$element.find(".fileinput-preview");
			var d = this.$preview.css("height");
			"inline" != this.$preview.css("display") && "0px" != d && "none" != d && this.$preview.css("line-height", d), this.original = {
				exists: this.$element.hasClass("fileinput-exists"),
				preview: this.$preview.html(),
				hiddenVal: this.$hidden.val()
			}, this.listen()
		}
	};
	c.prototype.listen = function () {
		this.$input.on("change.bs.fileinput", a.proxy(this.change, this)), a(this.$input[0].form).on("reset.bs.fileinput", a.proxy(this.reset, this)), this.$element.find('[data-trigger="fileinput"]').on("click.bs.fileinput", a.proxy(this.trigger, this)), this.$element.find('[data-dismiss="fileinput"]').on("click.bs.fileinput", a.proxy(this.clear, this))
	}, c.prototype.change = function (b) {
		if (void 0 === b.target.files && (b.target.files = b.target && b.target.value ? [{name: b.target.value.replace(/^.+\\/, "")}] : []), 0 !== b.target.files.length) {
			this.$hidden.val(""), this.$hidden.attr("name", ""), this.$input.attr("name", this.name);
			var c = b.target.files[0];
			if (this.$preview.length > 0 && ("undefined" != typeof c.type ? c.type.match("image.*") : c.name.match(/\.(gif|png|jpe?g)$/i)) && "undefined" != typeof FileReader) {
				var d = new FileReader, e = this.$preview, f = this.$element;
				d.onload = function (d) {
					var g = a("<img>").attr("src", d.target.result);
					b.target.files[0].result = d.target.result, f.find(".fileinput-filename").text(c.name), "none" != e.css("max-height") && g.css("max-height", parseInt(e.css("max-height"), 10) - parseInt(e.css("padding-top"), 10) - parseInt(e.css("padding-bottom"), 10) - parseInt(e.css("border-top"), 10) - parseInt(e.css("border-bottom"), 10)), e.html(g), f.addClass("fileinput-exists").removeClass("fileinput-new"), f.trigger("change.bs.fileinput", b.target.files)
				}, d.readAsDataURL(c)
			} else this.$element.find(".fileinput-filename").text(c.name), this.$preview.text(c.name), this.$element.addClass("fileinput-exists").removeClass("fileinput-new"), this.$element.trigger("change.bs.fileinput")
		}
	}, c.prototype.clear = function (a) {
		if (a && a.preventDefault(), this.$hidden.val(""), this.$hidden.attr("name", this.name), this.$input.attr("name", ""), b) {
			var c = this.$input.clone(!0);
			this.$input.after(c), this.$input.remove(), this.$input = c
		} else this.$input.val("");
		this.$preview.html(""), this.$element.find(".fileinput-filename").text(""), this.$element.addClass("fileinput-new").removeClass("fileinput-exists"), a !== !1 && (this.$input.trigger("change"), this.$element.trigger("clear.bs.fileinput"))
	}, c.prototype.reset = function () {
		this.clear(!1), this.$hidden.val(this.original.hiddenVal), this.$preview.html(this.original.preview), this.$element.find(".fileinput-filename").text(""), this.original.exists ? this.$element.addClass("fileinput-exists").removeClass("fileinput-new") : this.$element.addClass("fileinput-new").removeClass("fileinput-exists"), this.$element.trigger("reset.bs.fileinput")
	}, c.prototype.trigger = function (a) {
		this.$input.trigger("click"), a.preventDefault()
	}, a.fn.fileinput = function (b) {
		return this.each(function () {
			var d = a(this), e = d.data("fileinput");
			e || d.data("fileinput", e = new c(this, b)), "string" == typeof b && e[b]()
		})
	}, a.fn.fileinput.Constructor = c, a(document).on("click.fileinput.data-api", '[data-provides="fileinput"]', function (b) {
		var c = a(this);
		if (!c.data("fileinput")) {
			c.fileinput(c.data());
			var d = a(b.target).closest('[data-dismiss="fileinput"],[data-trigger="fileinput"]');
			d.length > 0 && (b.preventDefault(), d.trigger("click.bs.fileinput"))
		}
	})
}(window.jQuery);

/* 00. Generated by CoffeeScript 1.6.3
 *  https://github.com/ashleydw/lightbox
 ========================================================================*/

eval(function (p, a, c, k, e, r) {
	e = function (c) {
		return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
	};
	if (!''.replace(/^/, String)) {
		while (c--)r[e(c)] = k[c] || e(c);
		k = [function (e) {
			return r[e]
		}];
		e = function () {
			return '\\w+'
		};
		c = 1
	}
	;
	while (c--)if (k[c])p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
	return p
}('(5(){"1F 1G";o d;d=5(a,b){o c,t,O,p;3.8=$.1a({P:Q,t:Q,q:Q,1H:z,1b:5(){},1c:5(){},1d:5(){},1e:5(){7(3.A){$(R).1I(\'1f.D\')}6 3.4.1J()},1g:S},b||{});3.$l=$(a);c=\'\';3.E=3.8.E?3.8.E:\'D-\'+1h.1K((1h.1L()*1M)+1);O=3.8.P?\'<9 r="4-O"><Z 1N="Z" r="1i" j-1O="4" 1P-1j="z">&1Q;</Z><1k r="4-P">\'+3.8.P+\'</1k></9>\':\'\';t=3.8.t?\'<9 r="4-t">\'+3.8.t+\'</9>\':\'\';$(R.12).1R(\'<9 1g="\'+3.E+\'" r="4 1S" 1T="-1"><9 r="4-1l"><9 r="4-1m">\'+O+\'<9 r="4-12"></9>\'+t+\'</9></9></9>\');3.4=$(\'#\'+3.E);3.m=3.4.F(\'.4-12\').13();3.k={G:T(3.m.B(\'k-G\'),10),H:T(3.m.B(\'k-H\'),10),1n:T(3.m.B(\'k-1n\'),10),1o:T(3.m.B(\'k-1o\'),10)};7(!3.8.q){3.14(\'1U q 1V 1W\')}x{7(3.I(3.8.q)){3.J(3.8.q,z)}x 7(p=3.U(3.8.q)){3.V(p)}x 7(3.1p(3.8.q)){1X.1Y(\'1Z\')}3.A=3.$l.j(\'A\');7(3.A){3.y=3.$l.21(\'*:22(.23)\').13().F(\'*[j-1q="1r"][j-A="\'+3.A+\'"]\');3.s=3.y.24(3.$l);$(R).K(\'1f.D\',3.1s.L(3))}}3.4.K(\'1t.W.4\',3.8.1b.L(3)).K(\'25.W.4\',3.8.1c.L(3)).K(\'15.W.4\',3.8.1d.L(3)).K(\'1j.W.4\',3.8.1e.L(3)).4(\'1t\',b);6 3.4};d.26={I:5(a){6 a.16(/(^j:1u\\/.*,)|(\\.(27(e|g|28)|29|2a|2b|2c|2d)((\\?|#).*)?$)/i)},1p:5(a){6 a.16(/\\.(2e)((\\?|#).*)?$/i)},U:5(a){o b;b=a.16(/^.*(2f.2g\\/|v\\/|u\\/\\w\\/|1v\\/|2h\\?v=|\\&v=)([^#\\&\\?]*).*/);7(b&&b[2].17===11){6 b[2]}x{6 S}},1s:5(a){o b,f,p;a=a||1w.2i;7(a.X===1x||a.X===1y){7(a.X===1x&&3.s+1<3.y.17){3.s++;3.$l=$(3.y.18(3.s));f=3.$l.n(\'j-M\')||3.$l.n(\'N\');7(3.I(f)){3.J(f,z)}x 7(p=3.U(f)){3.V(p)}7(3.s+1<3.y.17){b=$(3.y.18(3.s+1),S);f=b.n(\'j-M\')||b.n(\'N\');7(3.I(f)){6 3.J(f,S)}}}x 7(a.X===1y&&3.s>0){3.s--;3.$l=$(3.y.18(3.s));f=3.$l.n(\'j-M\')||3.$l.n(\'N\');7(3.I(f)){6 3.J(f,z)}x 7(p=3.U(f)){6 3.V(p)}}}},2j:5(){6 3.m.Y(\'<9 r="4-2k">2l..</9>\')},V:5(a){3.19(1z,1A);6 3.m.Y(\'<1B h="1z" 1C="1A" f="//2m.p.2n/1v/\'+a+\'?2o=1" 2p="0" 2q></1B>\')},14:5(a){6 3.m.Y(a)},J:5(a,b){o c,C=3;c=1D 2r();7((b==Q)||b===z){c.2s=5(){o i,h;C.1E(c);C.m.Y(c);i=C.m.F(\'2t\').13();h=i&&i.h()>0?i.h():c.h;6 C.19(h,i.1C())};c.2u=5(){6 C.14(\'2v 2w 2x 1u: \'+a)}}6 c.f=a},1i:5(){6 3.4.4(\'15\')},19:5(a,b){a=a+3.k.G+3.k.H;3.4.F(\'.4-1m\').B({\'h\':a});6 3.4.F(\'.4-1l\').B({\'h\':a+20})},1E:5(a){o w;w=$(1w);7((a.h+(3.k.G+3.k.H+20))>w.h()){6 a.h=w.h()-(3.k.G+3.k.H+20)}}};$.2y.D=5(b){6 3.2z(5(){o a;a=$(3);b=$.1a({q:a.n(\'j-M\')||a.n(\'N\')},a.j());1D d(3,b);6 3})};$(R).2A(\'*[j-1q="1r"]\',\'2B\',5(a){o b;a.2C();b=$(3);6 b.D({q:b.n(\'j-M\')||b.n(\'N\')}).2D(\'15\',5(){6 b.2E(\':2F\')&&b.2G()})})}).2H(3);', 62, 168, '|||this|modal|function|return|if|options|div||||||src||width||data|padding|element|modal_body|attr|var|youtube|remote|class|gallery_index|footer||||else|gallery_items|true|gallery|css|_this|jakBox|modal_id|find|left|right|isImage|preloadImage|on|bind|source|href|header|title|null|document|false|parseFloat|getYoutubeId|showYoutubeVideo|bs|keyCode|html|button|||body|first|error|hide|match|length|get|resize|extend|onShow|onShown|onHide|onHidden|keydown|id|Math|close|hidden|h4|dialog|content|bottom|top|isSwf|toggle|lightbox|navigate|show|image|embed|window|39|37|560|315|iframe|height|new|checkImageDimensions|use|strict|keyboard|off|remove|floor|random|1000|type|dismiss|aria|times|append|fade|tabindex|No|target|given|console|log|todo||parents|not|row|index|shown|prototype|jp|eg|gif|png|bmp|webp|svg|swf|youtu|be|watch|event|showLoading|loading|Loading|www|com|autoplay|frameborder|allowfullscreen|Image|onload|img|onerror|Failed|to|load|fn|each|delegate|click|preventDefault|one|is|visible|focus|call'.split('|'), 0, {}));

!function (t) {
	"function" == typeof define && define.amd ? define(["jquery"], t) : t("object" == typeof exports ? require("jquery") : jQuery)
}(function (t) {
	function s(s) {
		var e = !1;
		return t('[data-notify="container"]').each(function (i, n) {
			var a = t(n), o = a.find('[data-notify="title"]').text().trim(), r = a.find('[data-notify="message"]').html().trim(), l = o === t("<div>" + s.settings.content.title + "</div>").html().trim(), d = r === t("<div>" + s.settings.content.message + "</div>").html().trim(), g = a.hasClass("alert-" + s.settings.type);
			return l && d && g && (e = !0), !e
		}), e
	}

	function e(e, n, a) {
		var o = {
			content: {
				message: "object" == typeof n ? n.message : n,
				title: n.title ? n.title : "",
				icon: n.icon ? n.icon : "",
				url: n.url ? n.url : "#",
				target: n.target ? n.target : "-"
			}
		};
		a = t.extend(!0, {}, o, a), this.settings = t.extend(!0, {}, i, a), this._defaults = i, "-" === this.settings.content.target && (this.settings.content.target = this.settings.url_target), this.animations = {
			start: "webkitAnimationStart oanimationstart MSAnimationStart animationstart",
			end: "webkitAnimationEnd oanimationend MSAnimationEnd animationend"
		}, "number" == typeof this.settings.offset && (this.settings.offset = {
			x: this.settings.offset,
			y: this.settings.offset
		}), (this.settings.allow_duplicates || !this.settings.allow_duplicates && !s(this)) && this.init()
	}

	var i = {
		element: "body",
		position: null,
		type: "info",
		allow_dismiss: !0,
		allow_duplicates: !0,
		newest_on_top: !1,
		showProgressbar: !1,
		placement: {from: "top", align: "right"},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 5e3,
		timer: 1e3,
		url_target: "_blank",
		mouse_over: null,
		animate: {enter: "animated fadeInDown", exit: "animated fadeOutUp"},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: "class",
		template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'
	};
	String.format = function () {
		for (var t = arguments[0], s = 1; s < arguments.length; s++)t = t.replace(RegExp("\\{" + (s - 1) + "\\}", "gm"), arguments[s]);
		return t
	}, t.extend(e.prototype, {
		init: function () {
			var t = this;
			this.buildNotify(), this.settings.content.icon && this.setIcon(), "#" != this.settings.content.url && this.styleURL(), this.styleDismiss(), this.placement(), this.bind(), this.notify = {
				$ele: this.$ele,
				update: function (s, e) {
					var i = {};
					"string" == typeof s ? i[s] = e : i = s;
					for (var n in i)switch (n) {
						case"type":
							this.$ele.removeClass("alert-" + t.settings.type), this.$ele.find('[data-notify="progressbar"] > .progress-bar').removeClass("progress-bar-" + t.settings.type), t.settings.type = i[n], this.$ele.addClass("alert-" + i[n]).find('[data-notify="progressbar"] > .progress-bar').addClass("progress-bar-" + i[n]);
							break;
						case"icon":
							var a = this.$ele.find('[data-notify="icon"]');
							"class" === t.settings.icon_type.toLowerCase() ? a.removeClass(t.settings.content.icon).addClass(i[n]) : (a.is("img") || a.find("img"), a.attr("src", i[n]));
							break;
						case"progress":
							var o = t.settings.delay - t.settings.delay * (i[n] / 100);
							this.$ele.data("notify-delay", o), this.$ele.find('[data-notify="progressbar"] > div').attr("aria-valuenow", i[n]).css("width", i[n] + "%");
							break;
						case"url":
							this.$ele.find('[data-notify="url"]').attr("href", i[n]);
							break;
						case"target":
							this.$ele.find('[data-notify="url"]').attr("target", i[n]);
							break;
						default:
							this.$ele.find('[data-notify="' + n + '"]').html(i[n])
					}
					var r = this.$ele.outerHeight() + parseInt(t.settings.spacing) + parseInt(t.settings.offset.y);
					t.reposition(r)
				},
				close: function () {
					t.close()
				}
			}
		}, buildNotify: function () {
			var s = this.settings.content;
			this.$ele = t(String.format(this.settings.template, this.settings.type, s.title, s.message, s.url, s.target)), this.$ele.attr("data-notify-position", this.settings.placement.from + "-" + this.settings.placement.align), this.settings.allow_dismiss || this.$ele.find('[data-notify="dismiss"]').css("display", "none"), (this.settings.delay > 0 || this.settings.showProgressbar) && this.settings.showProgressbar || this.$ele.find('[data-notify="progressbar"]').remove()
		}, setIcon: function () {
			"class" === this.settings.icon_type.toLowerCase() ? this.$ele.find('[data-notify="icon"]').addClass(this.settings.content.icon) : this.$ele.find('[data-notify="icon"]').is("img") ? this.$ele.find('[data-notify="icon"]').attr("src", this.settings.content.icon) : this.$ele.find('[data-notify="icon"]').append('<img src="' + this.settings.content.icon + '" alt="Notify Icon" />')
		}, styleDismiss: function () {
			this.$ele.find('[data-notify="dismiss"]').css({
				position: "absolute",
				right: "10px",
				top: "5px",
				zIndex: this.settings.z_index + 2
			})
		}, styleURL: function () {
			this.$ele.find('[data-notify="url"]').css({
				backgroundImage: "url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)",
				height: "100%",
				left: 0,
				position: "absolute",
				top: 0,
				width: "100%",
				zIndex: this.settings.z_index + 1
			})
		}, placement: function () {
			var s = this, e = this.settings.offset.y, i = {
				display: "inline-block",
				margin: "0px auto",
				position: this.settings.position ? this.settings.position : "body" === this.settings.element ? "fixed" : "absolute",
				transition: "all .5s ease-in-out",
				zIndex: this.settings.z_index
			}, n = !1, a = this.settings;
			switch (t('[data-notify-position="' + this.settings.placement.from + "-" + this.settings.placement.align + '"]:not([data-closing="true"])').each(function () {
				e = Math.max(e, parseInt(t(this).css(a.placement.from)) + parseInt(t(this).outerHeight()) + parseInt(a.spacing))
			}), this.settings.newest_on_top === !0 && (e = this.settings.offset.y), i[this.settings.placement.from] = e + "px", this.settings.placement.align) {
				case"left":
				case"right":
					i[this.settings.placement.align] = this.settings.offset.x + "px";
					break;
				case"center":
					i.left = 0, i.right = 0
			}
			this.$ele.css(i).addClass(this.settings.animate.enter), t.each(["webkit-", "moz-", "o-", "ms-", ""], function (t, e) {
				s.$ele[0].style[e + "AnimationIterationCount"] = 1
			}), t(this.settings.element).append(this.$ele), this.settings.newest_on_top === !0 && (e = parseInt(e) + parseInt(this.settings.spacing) + this.$ele.outerHeight(), this.reposition(e)), t.isFunction(s.settings.onShow) && s.settings.onShow.call(this.$ele), this.$ele.one(this.animations.start, function () {
				n = !0
			}).one(this.animations.end, function () {
				t.isFunction(s.settings.onShown) && s.settings.onShown.call(this)
			}), setTimeout(function () {
				n || t.isFunction(s.settings.onShown) && s.settings.onShown.call(this)
			}, 600)
		}, bind: function () {
			var s = this;
			if (this.$ele.find('[data-notify="dismiss"]').on("click", function () {
					s.close()
				}), this.$ele.mouseover(function () {
					t(this).data("data-hover", "true")
				}).mouseout(function () {
					t(this).data("data-hover", "false")
				}), this.$ele.data("data-hover", "false"), this.settings.delay > 0) {
				s.$ele.data("notify-delay", s.settings.delay);
				var e = setInterval(function () {
					var t = parseInt(s.$ele.data("notify-delay")) - s.settings.timer;
					if ("false" === s.$ele.data("data-hover") && "pause" === s.settings.mouse_over || "pause" != s.settings.mouse_over) {
						var i = (s.settings.delay - t) / s.settings.delay * 100;
						s.$ele.data("notify-delay", t), s.$ele.find('[data-notify="progressbar"] > div').attr("aria-valuenow", i).css("width", i + "%")
					}
					t > -s.settings.timer || (clearInterval(e), s.close())
				}, s.settings.timer)
			}
		}, close: function () {
			var s = this, e = parseInt(this.$ele.css(this.settings.placement.from)), i = !1;
			this.$ele.data("closing", "true").addClass(this.settings.animate.exit), s.reposition(e), t.isFunction(s.settings.onClose) && s.settings.onClose.call(this.$ele), this.$ele.one(this.animations.start, function () {
				i = !0
			}).one(this.animations.end, function () {
				t(this).remove(), t.isFunction(s.settings.onClosed) && s.settings.onClosed.call(this)
			}), setTimeout(function () {
				i || (s.$ele.remove(), s.settings.onClosed && s.settings.onClosed(s.$ele))
			}, 600)
		}, reposition: function (s) {
			var e = this, i = '[data-notify-position="' + this.settings.placement.from + "-" + this.settings.placement.align + '"]:not([data-closing="true"])', n = this.$ele.nextAll(i);
			this.settings.newest_on_top === !0 && (n = this.$ele.prevAll(i)), n.each(function () {
				t(this).css(e.settings.placement.from, s), s = parseInt(s) + parseInt(e.settings.spacing) + t(this).outerHeight()
			})
		}
	}), t.notify = function (t, s) {
		var i = new e(this, t, s);
		return i.notify
	}, t.notifyDefaults = function (s) {
		return i = t.extend(!0, {}, i, s)
	}, t.notifyClose = function (s) {
		void 0 === s || "all" === s ? t("[data-notify]").find('[data-notify="dismiss"]').trigger("click") : t('[data-notify-position="' + s + '"]').find('[data-notify="dismiss"]').trigger("click")
	}
});