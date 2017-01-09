/*
 *
 * BLUESAT.CZ
 * Extra Custom JS for Admin Control Panel with custom modification
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Written by: Bluesat.cz - (http://www.bluesat.cz)
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */

/* 00. INITIALIZES SEARCH OVERLAY PLUGIN
 ========================================================================*/
$(function () {
	// Initializes search overlay plugin.
	// Replace onSearchSubmit() and onKeyEnter() with
	// your logic to perform a search and display results
	$('[data-pages="search"]').search({
		searchField: '#overlay-search',
		closeButton: '.overlay-close',
		suggestions: '#overlay-suggestions',
		brand: '.brand',
		onSearchSubmit: function (searchString) {
			console.log("Search for: " + searchString);
		},
		onKeyEnter: function (searchString) {
			console.log("Live search for: " + searchString);
			var searchField = $('#overlay-search');
			var searchResults = $('.search-results');
			clearTimeout($.data(this, 'timer'));
			searchResults.fadeOut("fast");
			var wait = setTimeout(function () {
				searchResults.find('.result-name').each(function () {
					if (searchField.val().length != 0) {
						$(this).html(searchField.val());
						searchResults.fadeIn("fast");
					}
				});
			}, 500);
			$(this).data('timer', wait);
		}
	});
});

/* 00. MODIFICATION - Bootbox confirm - settings for each button
 ========================================================================*/
$(function () {

	// Bootbox - Confirm dialog for Delete button
	$('[data-confirm]').click(function (e) {
		// Init
		var links = $(this).attr("href");
		$("a").tooltip('destroy');
		e.preventDefault();
		// Show Message
		bootbox.setLocale('<?php echo $site_language;?>');
		bootbox.confirm({
			title: "Potvrzení o odstranění!",
			message: "<i class='fa fa-trash'></i><span>" + $(this).attr('data-confirm') + "</span>",
			className: "bootbox-confirm-del",
			buttons: {
				confirm: {
					className: 'btn-success'
				},
				cancel: {
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if (result == true) {
					window.location = links;
				}
			}
		});
		// Add div to Bootbox Body
		$(".bootbox-body i").wrap("<div class='col-md-2'></div>");
	});

	// Bootbox - Confirm dialog for Delete button
	$("#button_delete").on("click", function (e) {
		// Init
		var self = $(this);
		e.preventDefault();
		// Show Message
		bootbox.setLocale('<?php echo $site_language;?>');
		bootbox.confirm({
			title: "Potvrzení o odstranění!",
			message: "<i class='fa fa-trash'></i><span>" + $(this).attr('data-confirm-del') + "</span>",
			className: "bootbox-confirm-del",
			buttons: {
				confirm: {
					className: 'btn-success'
				},
				cancel: {
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if (result) {
					self.off("click");
					self.click();
				}
			}
		});
	});

	// Bootbox - Confirm dialog for Truncate button
	$("#button_truncate").on("click", function (e) {
		// Init
		var links = $(this).attr("href");
		$("a").tooltip('destroy');
		e.preventDefault();
		// Show Message
		bootbox.setLocale('<?php echo $site_language;?>');
		bootbox.confirm({
			title: "Potvrzení o odstranění!",
			message: "<i class='fa fa-exclamation-triangle'></i><span>" + $(this).attr('data-confirm-trunc') + "</span>",
			className: "bootbox-confirm-trunc",
			buttons: {
				confirm: {
					className: 'btn-success'
				},
				cancel: {
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if (result == true) {
					window.location = links;
				}
			}
		});
	});

	// Bootbox - Confirm dialog for Logout
	$('[data-confirm-logout]').click(function (e) {
		// Init
		var links = $(this).attr("href");
		$("a").tooltip('destroy');
		e.preventDefault();
		// Show Message
		bootbox.setLocale('<?php echo $site_language;?>');
		bootbox.confirm({
			title: "Odhlášení!",
			message: "<i class='fa fa-sign-out'></i><span>" + $(this).attr('data-confirm-logout') + "</span>",
			className: "bootbox-confirm-logout",
			buttons: {
				confirm: {
					className: 'btn-info'
				},
				cancel: {
					className: 'btn-default'
				}
			},
			callback: function (result) {
				if (result == true) {
					window.location = links;
				}
			}
		});
	});

});

/* 00. FUNCTION - INSERT BLOCK and RESTORE CONTENT
 ========================================================================*/

function insert_javascript() {
	return '<script type="text/javascript">\n$(document).ready(function() {\n\n$("#myID").myfunction();\n\n});\n</script>\n';
}

function insert_cssblock() {
	return '<style type="text/css">\n.className {\n\n float:left; width:400px; height:200px; \n\n}\n</style>\n';
}

function restoreContent(fieldname, backupid, advedit, id) {

	$.ajax({
		type: "POST",
		url: jakWeb.jak_url + 'ajax/loadcontent.php',
		data: "backupid=" + backupid + "&contentid=" + id + "&eid=1&fid=" + fieldname,
		dataType: 'json',
		beforeSend: function (x) {
			$('.loader').show();
		},
		success: function (msg) {

			$('.loader').hide();

			if (parseInt(msg.status) != 1) {
				return false;

			} else {

				$("#restorcontent").val(0);

				$("#jakEditor").text(msg.rcontent);
				if (advedit) {
					htmlACE.session.setValue(msg.rcontent);
				} else {
					tinyMCE.get('jakEditor').setContent(msg.rcontent);
				}
			}

		}
	});
}

/* 00. MODIFICATION - Bootstrap Tooltip
 ========================================================================*/
$(function () {
	$('.icon_legend i').tooltip({
		container: 'body',
		placement: 'bottom',
		trigger: 'hover'
	});
});

/* 00. MODIFICATION - BOOTSTRAP-EXPAND table rows
 ========================================================================*/
(function ($) {
	$(function () {
		$('.table-expandable').each(function () {
			var table = $(this);
			table.children('thead').children('tr').append('<th></th>');
			table.children('tbody').children('tr').filter(':odd').hide();
			table.children('tbody').children('tr').filter(':even').click(function (e) {
				var element = $(this);
				// Show detail without TD with buttons
				if (!$(e.target).closest('.call-button').length) {
					element.toggleClass('active')
					element.next('tr').toggle();
					element.find(".table-expandable-arrow").toggleClass("up");
				}
			});
			table.children('tbody').children('tr').filter(':even').each(function () {
				var element = $(this);
				element.append('<td><div class="table-expandable-arrow"></div></td>');
			});
		});
	});
})(jQuery);

/* 00. BOOSTRAP TABS - keep current tab after page reload
 ========================================================================*/
$(function() {
	// for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
	if ($('ul[id^="cmsTab"]').length ) {

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			// save the latest tab; use cookies if you like 'em better:
			var thisId = $(this).closest('ul').attr('id');
			var thisId = thisId.replace('cmsTab','');
			localStorage.setItem('lastTab' + thisId , $(this).attr('href'));
		});

		// go to the latest tab, if it exists:
		var parentID = $('ul[id^="cmsTab"]').attr('id');
		var shortID = parentID.replace('cmsTab','');
		var lastTab = localStorage.getItem('lastTab' + shortID);
		if (lastTab) { $('#' + parentID + ' a[href="' + lastTab + '"]').tab('show'); }

	}
});

/* 00. JQUERY PASSY - Generating and analazing passwords, realtime.
 ========================================================================*/
/*
 * Generating and analazing passwords, realtime.
 * http://timseverien.nl
 */

(function($) {
	var passy = {
		character: { DIGIT: 1, LOWERCASE: 2, UPPERCASE: 4, PUNCTUATION: 8 },
		strength: { LOW: 0, MEDIUM: 1, HIGH: 2, EXTREME: 3 },

		dictionary: [],

		patterns: [
			'0123456789',
			'abcdefghijklmnopqrstuvwxyz',
			'qwertyuiopasdfghjklzxcvbnm',
			'azertyuiopqsdfghjklmwxcvbn',
			'!#$*+-.:?@^'
		],

		threshold: {
			medium: 16,
			high: 22,
			extreme: 36
		}
	};

	passy.requirements = {
		characters: passy.character.DIGIT | passy.character.LOWERCASE | passy.character.UPPERCASE,
		length: {
			min: 6,
			max: Infinity
		}
	};

	if(Object.seal) {
		Object.seal(passy.character);
		Object.seal(passy.strength);
	}

	if(Object.freeze) {
		Object.freeze(passy.character);
		Object.freeze(passy.strength);
	}

	passy.analize = function(password) {
		var score = Math.floor(password.length * 2);
		var i = password.length;

		score += $.passy.analizePatterns(password);
		score += $.passy.analizeDictionary(password);

		while(i--) score += $.passy.analizeCharacter(password.charAt(i));

		return $.passy.analizeScore(score);
	};

	passy.analizeCharacter = function(character) {
		var code = character.charCodeAt(0);

		if(code >= 97 && code <= 122) return 1;   // lower case
		if(code >= 48 && code <= 57) return 2;    // numeric
		if(code >= 65 && code <= 90) return 3;    // capital
		if(code <= 126) return 4;                 // punctuation
		return 5;                                 // foreign characters etc
	};

	passy.analizePattern = function(password, pattern) {
		var lastmatch = -1;
		var score = -2;

		for(var i = 0; i < password.length; i++) {
			var match = pattern.indexOf(password.charAt(i));

			if(lastmatch === match - 1) {
				lastmatch = match;
				score++;
			}
		}

		return Math.max(0, score);
	};

	passy.analizePatterns = function(password) {
		var chars = password.toLowerCase();
		var score = 0;

		for(var i in $.passy.patterns) {
			var pattern = $.passy.patterns[i].toLowerCase();
			score += $.passy.analizePattern(chars, pattern);
		}

		// patterns are bad man!
		return score * -5;
	};

	passy.analizeDictionary = function(password) {
		var chars = password.toLowerCase();
		var score = 0;

		for(var i in $.passy.dictionary) {
			var word = $.passy.dictionary[i].toLowerCase();

			if(password.indexOf(word) >= 0) score++;
		}

		// using words are bad too!
		return score * -5;
	};

	passy.analizeScore = function(score) {
		if(score >= $.passy.threshold.extreme) return $.passy.strength.EXTREME;
		if(score >= $.passy.threshold.high) return $.passy.strength.HIGH;
		if(score >= $.passy.threshold.medium) return $.passy.strength.MEDIUM;

		return $.passy.strength.LOW;
	};

	passy.generate = function(len) {
		var chars = [
			'0123456789',
			'abcdefghijklmnopqrstuvwxyz',
			'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'!#$&()*+<=>@[]^'
		];

		var password = [];
		var type, index;

		len = Math.max(len, $.passy.requirements.length.min);
		len = Math.min(len, $.passy.requirements.length.max);

		while(len--) {
			type = len % chars.length;
			index = Math.floor(Math.random() * chars[type].length);
			password.push(chars[type].charAt(index));
		}

		password.sort(function() {
			return Math.random() * 2 - 1;
		});

		return password.join('');
	};

	passy.contains = function(str, character) {
		if(character === $.passy.character.DIGIT) {
			return /\d/.test(str);
		} else if(character === $.passy.character.LOWERCASE) {
			return /[a-z]/.test(str);
		} else if(character === $.passy.character.UPPERCASE) {
			return /[A-Z]/.test(str);
		} else if(character === $.passy.character.PUNCTUATION) {
			return /[!"#$%&'()*+,\-./:;<=>?@[\\]\^_`{\|}~]/.test(str);
		}
	};

	passy.valid = function(str) {
		var valid = true;

		if(!$.passy.requirements) return true;

		if(str.length < $.passy.requirements.length.min) return false;
		if(str.length > $.passy.requirements.length.max) return false;

		for(var i in $.passy.character) {
			if($.passy.requirements.characters & $.passy.character[i]) {
				valid = $.passy.contains(str, $.passy.character[i]) && valid;
			}
		}

		return valid;
	};

	var methods = {
		init: function(callback) {
			var $this = $(this);

			$this.on('change keyup', function() {
				if(typeof callback !== 'function') return;

				var value = $this.val();
				callback.call($this, $.passy.analize(value), methods.valid.call($this));
			});
		},

		generate: function(len) {
			this.val($.passy.generate(len));
			this.change();
		},

		valid: function() {
			return $.passy.valid(this.val());
		}
	};

	$.fn.passy = function(opt) {
		if(methods[opt]) {
			return methods[opt].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof opt === 'function' || !opt) {
			return methods.init.apply(this, arguments);
		}

		return this;
	};

	$.extend({ passy: passy });
})(jQuery);

// Passy - password generator
// ------------------------------

$(function() {
	// Input labels
	var $inputLabelAbsolute = $('.label-indicator-absolute input');

	// Output labels
	var $outputLabelAbsolute = $('.label-indicator-absolute > span');

	// Min input length
	$.passy.requirements.length.min = 4;

	// Strength meter
	var feedback = [
		{color: '#D55757', text: 'Weak', textColor: '#fff'},
		{color: '#EB7F5E', text: 'Normal', textColor: '#fff'},
		{color: '#3BA4CE', text: 'Good', textColor: '#fff'},
		{color: '#40B381', text: 'Strong', textColor: '#fff'}
	];

	// Absolute positioned label
	$inputLabelAbsolute.passy(function(strength) {
		$outputLabelAbsolute.text(feedback[strength].text);
		$outputLabelAbsolute.css('background-color', feedback[strength].color).css('color', feedback[strength].textColor);
	});

	// Absolute label
	$('.generate-label-absolute').click(function() {
		$inputLabelAbsolute.passy( 'generate', 10 );
	});
});

/* 00. AUTOGROW TEXTAREA PLUGIN
 ========================================================================
 *
 * Autogrow Textarea Plugin Version v3.0
 * http://www.technoreply.com/autogrow-textarea-plugin-3-0
 * https://sites.fastspring.com/technoreply/instant/autogrowtextareaplugin
 * Date: October 15, 2012
 */

jQuery.fn.autoGrow = function () {
	return this.each(function () {
		var createMirror = function (textarea) {
			jQuery(textarea).after('<div class="autogrow-textarea-mirror"></div>');
			return jQuery(textarea).next(".autogrow-textarea-mirror")[0]
		};
		var sendContentToMirror = function (textarea) {
			mirror.innerHTML = String(textarea.value).replace(/&/g, "&amp;").replace(/"/g, "&quot;").replace(/'/g, "&#39;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\n/g, "<br />") + ".<br/>.";
			if (jQuery(textarea).height() != jQuery(mirror).height())jQuery(textarea).height(jQuery(mirror).height())
		};
		var growTextarea = function () {
			sendContentToMirror(this)
		};
		var mirror = createMirror(this);
		mirror.style.display = "none";
		mirror.style.wordWrap = "break-word";
		mirror.style.padding = jQuery(this).css("padding");
		mirror.style.width = jQuery(this).css("width");
		mirror.style.fontFamily = jQuery(this).css("font-family");
		mirror.style.fontSize = jQuery(this).css("font-size");
		mirror.style.lineHeight = jQuery(this).css("line-height");
		this.style.overflow = "hidden";
		this.style.minHeight = this.rows + "em";
		this.onkeyup = growTextarea;
		sendContentToMirror(this)
	})
};
