/*
 * CMS ENVO
 * Extra Custom JS for Admin Control Panel with custom modification
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. PACE.js config
 * 02. Basic admin ENVO config
 *
 */

/* 01. PACE.js config
 ========================================================================*/

$(function () {

  Pace.on('done', function () {
    // Animate Background
    $("#pace").animate({
      opacity: 0
    }, 800, function () {
      $('#pace').removeClass('active').addClass('inactive').hide();
    });
  });

});

/* 02. Basic admin ENVO config
 ========================================================================*/
$.AdminEnvo = {};
/* --------------------
 * - AdminEnvo Options -
 * --------------------
 * Modify these options to suit your implementation
 */
$.AdminEnvo.options = {
  //Bootstrap.js tooltip for Icon
  enableBSToppltipIcon: true,
  BSTooltipSelectorIcon: '[data-toggle="tooltipEnvo"]',
  //Bootbox confirm dialog
  BootboxLang: envoWeb.envo_lang

};

/* ------------------
 * - Implementation -
 * ------------------
 * The next block of code implements AdminEnvo's
 * functions and plugins as specified by the
 * options above.
 */
$(function () {
  "use strict";

  //Easy access to options
  var o = $.AdminEnvo.options;

  /* Activate Bootstrap tooltip
   ====================================================== */
  if (o.enableBSToppltipIcon) {
    $('body').tooltip({
      selector: o.BSTooltipSelectorIcon,
      placement: 'bottom',
      trigger: 'hover',
      container: 'body',
      animation: false
    });
  }

  /* Set global settings for Datetimepicker
   ====================================================== */
  $.AdminEnvo.DateTimepicker = {
    tooltips: function () {
      if (envoWeb.envo_lang = 'cs') {
        var tooltip = {
          today: 'Dnešní Datum',
          clear: 'Smazat Datum',
          close: 'Zavřít Picker',
          selectMonth: 'Vybrat Měsíc',
          prevMonth: 'Předchozí Měsíc',
          nextMonth: 'Následující Měsíc',
          selectYear: 'Vybrat Rok',
          prevYear: 'Předchozí Rok',
          nextYear: 'Následující Rok',
          selectDecade: 'Vybrat Dekádu',
          prevDecade: 'Předchozí Dekáda',
          nextDecade: 'Následující Dekáda',
          prevCentury: 'Předchozí Století',
          nextCentury: 'Následující Století',
          pickHour: 'Vybrat Hodinu',
          incrementHour: 'Přidat Hodinu',
          decrementHour: 'Ubrat Hodinu',
          pickMinute: 'Vybrat Minuty',
          incrementMinute: 'Přidat Minuty',
          decrementMinute: 'Ubrat Minuty',
          pickSecond: 'Vybrat Vteřiny',
          incrementSecond: 'Přidat Vteřiny',
          decrementSecond: 'Ubrat Vteřiny',
          togglePeriod: 'Přepnout Dobu',
          selectTime: 'Vybrat Čas'
        }
      } else {
        var tooltip = {}
      }

      return tooltip;
    },

    icons: function () {
      var icon = {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down",
        previous: "fa fa-chevron-left",
        next: "fa fa-chevron-right",
        today: "fa fa-check-circle-o",
        clear: "fa fa-trash",
        close: "fa fa-times"
      };

      return icon;
    }

  };


  /* Activate Bootbox confirm - settings for each button
   ====================================================== */
  // Bootbox - Confirm dialog for Delete button
  $('[data-confirm]').click(function (e) {
    // Init
    var links = $(this).attr("href");
    e.preventDefault();
    // Show Message
    bootbox.setLocale(o.BootboxLang);
    bootbox.confirm({
      title: "Potvrzení o odstranění!",
      message: $(this).attr('data-confirm'),
      className: "bootbox-confirm-del",
      animate: true,
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

  // Bootbox - Confirm dialog for Delete All button
  $('#button_delete').on("click", function (e) {
    // Init
    var self = $(this);
    e.preventDefault();
    // Show Message
    bootbox.setLocale(o.BootboxLang);
    bootbox.confirm({
      title: "Potvrzení o odstranění!",
      message: $(this).attr('data-confirm-del'),
      className: "bootbox-confirm-del",
      animate: true,
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
  $('#button_truncate').on("click", function (e) {
    // Init
    var links = $(this).attr("href");
    e.preventDefault();
    // Show Message
    bootbox.setLocale(o.BootboxLang);
    bootbox.confirm({
      title: "Potvrzení o odstranění!",
      message: $(this).attr('data-confirm-trunc'),
      className: "bootbox-confirm-trunc",
      animate: true,
      buttons: {
        confirm: {
          className: 'btn-success'
        },
        cancel: {
          className: 'btn-warning'
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
    e.preventDefault();
    // Show Message
    bootbox.setLocale(o.BootboxLang);
    bootbox.confirm({
      title: "Odhlášení!",
      message: $(this).attr('data-confirm-logout'),
      className: "bootbox-confirm-logout",
      animate: true,
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

/* 00. DATA LOADING TEXT IN BUTTON
 ========================================================================*/
$(function () {
  // Button 'Save'
  $('button[name = "btnSave"]').on('click', function () {
    var $this = $(this);
    $this.button('loading');
    setTimeout(function () {
      $this.button('reset');
    }, 1000);
  });

  // Button 'Send Test Mail'
  $('button[name = "btnTestMail"]').on('click', function () {
    var $this = $(this);
    $this.button('loading');
    setTimeout(function () {
      $this.button('reset');
    }, 1000);
  });

  // Anchor
  $('a[data-loading-text]').click(function () {
    $(this).button('loading');
    setTimeout(function () {
      $this.button('reset');
    }, 1000);
  });

});

/* 00. INITIALIZES SEARCH OVERLAY PLUGIN
 ========================================================================*/
(function ($) {

  'use strict';

  // Initializes search overlay plugin.
  // Replace onSearchSubmit() and onKeyEnter() with
  // your logic to perform a search and display results
  $('[data-pages="search"]').search({
    // Bind elements that are included inside search overlay
    searchField: '#overlay-search',
    closeButton: '.overlay-close',
    suggestions: '#overlay-suggestions',
    brand: '.brand',

    // Callback that will be run when you hit ENTER button on search box
    onSearchSubmit: function (searchString) {

    },

    // Callback that will be run whenever you enter a key into search box.
    // Perform any live search here.
    onKeyEnter: function (searchString) {
      console.log("Live search for: " + searchString);

      var searchField = $('#overlay-search');
      var searchResults = $('.search-results');
      var resultsContainer = searchResults.find('.results-container');

      // hide previously returned results until server returns new results
      resultsContainer.html('');

      $.ajax({
        url: 'ajax/overlay-search.php',
        type: 'POST',
        datatype: 'html',
        data: {
          search: searchString
        },
        success: function (data) {
          // successful request; do something with the data
          resultsContainer.html(data);
        }
      });
      return false;
    }
  });
})(window.jQuery);

/* 00. Show iFrame in modal - Filemanger and Search overlay
 ========================================================================*/
$(function () {

  var element = $('#ENVOModal');

  // Initializes TinyMce Filemanger plugin.
  $('.ifManager').on('click', function (e) {
    e.preventDefault();
    $frameSrc = $(this).attr('href');

    element.on('shown.bs.modal', function (e) {

      $(this).find('.modal-dialog').addClass('modal-w-95p');
      $(this).find('.body-content').html('<iframe src="' + $frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');

    }).on('hidden.bs.modal', function (e) {

      $(this).find('.body-content').html('');

    }).modal('show');

  });

  // Initializes search overlay plugin for editor help.php
  $('.contentHelp').on('click', function (e) {
    e.preventDefault();
    $frameSrc = $(this).attr('href');

    element.on('shown.bs.modal', function (e) {

      $(this).find('.modal-dialog').addClass('modal-w-90p');
      $(this).find('.body-content').html('<iframe src="' + $frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');

    }).on('hidden.bs.modal', function (e) {

      $(this).find('.body-content').html('');

    }).modal('show');

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

function insert_code_member_guest() {
  return '{{if members}}\n\n For Members \n\n{{endif}}\n\n\n{{if notmembers}}\n\n For Guest \n\n{{endif}}\n\n';
}

function insert_code_member() {
  return '{{if members}}\n\n For Members \n\n{{endif}}\n\n';
}

function insert_code_guest() {
  return '{{if notmembers}}\n\n For Guest \n\n{{endif}}\n\n';
}

function restoreContent(fieldname, backupid, id) {

  $.ajax({
    type: "POST",
    url: envoWeb.envo_url + 'ajax/loadcontent.php',
    data: "backupid=" + backupid + "&contentid=" + id + "&eid=1&fid=" + fieldname,
    dataType: 'json',
    beforeSend: function (x) {
      $('#spinner').css('visibility', 'visible');
    },
    success: function (data) {

      setTimeout(function () {
        $('#spinner').css('visibility', 'hidden');
      }, 2000);

      if (parseInt(data.status) != 1) {
        return false;

      } else {

        $("#restorcontent").val(0);

        $("#envoEditor").text(data.rcontent);

        if (globalSettings.advEditor > 0) {
          htmlACE.session.setValue(data.rcontent);
        } else {
          tinyMCE.get('envoEditor').setContent(data.rcontent);
        }
      }

    }
  });
}

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
$(function () {
  // For bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
  // Uses:
  // Add ' id="cmsTabNAMEOFTABS" in ul of bootstrap tabs
  // Add ' id="cmsTabContent" to main div of bootstrap tabs content
  if ($('ul[id^="cmsTab"]').length) {

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      // save the latest tab; use cookies if you like 'em better:
      var thisId = $(this).closest('ul').attr('id');
      var thisId = thisId.replace('cmsTab', '');
      localStorage.setItem('lastTab' + thisId, $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var parentID = $('ul[id^="cmsTab"]').attr('id');
    var shortID = parentID.replace('cmsTab', '');
    var lastTab = localStorage.getItem('lastTab' + shortID);
    if (lastTab) {
      $('#' + parentID + ' a[href="' + lastTab + '"]').tab('show');
    }

  }
});


/* 00. MODIFICATION - INIT and CONFIG BOOTSTRAP TAGSINPUT PLUGIN
 ========================================================================*/
$(function () {
  // Add value from Bootstrap Select to Bootstrap TagsInput
  $('#selecttags1').on('changed.bs.select', function (e) {
    $("input[name='envo_tags']").tagsinput('add', $(this).val());
  });
  $('#selecttags2').on('changed.bs.select', function (e) {
    $("input[name='envo_tags']").tagsinput('add', $(this).val());
  });

  // Init Booststrap TagsInput for all Tags
  $("input[name='envo_tags'].tags").tagsinput('items');

  /* Init Booststrap TagsInput for metakey in ACP
   * confirm key code
   * 13 - enter
   * 44 - comma ' , '
   * 32 - space bar
   *
   */
  $("input[name='envo_keywords']#metakey").tagsinput({
    confirmKeys: [13, 44]
  });

  $("input[name='envo_lcontent_meta_key']#envo_editor_light_meta_key").tagsinput({
    confirmKeys: [13, 44]
  });

  /* Init Booststrap TagsInput for metakey in ACP
   * confirm key code
   * 13 - enter
   * 44 - comma ' , '
   * 32 - space bar
   *
   */
  $("input[name='envo_extension']#fileextension").tagsinput({
    tagClass: 'label label-default ext',
    confirmKeys: [13, 44, 32]
  });
});

/* 00. JQUERY PASSY - Generating and analazing passwords, realtime.
 ========================================================================*/
/*
 * Generating and analazing passwords, realtime.
 * http://timseverien.nl
 */

(function ($) {
  var passy = {
    character: {DIGIT: 1, LOWERCASE: 2, UPPERCASE: 4, PUNCTUATION: 8},
    strength: {LOW: 0, MEDIUM: 1, HIGH: 2, EXTREME: 3},

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

  if (Object.seal) {
    Object.seal(passy.character);
    Object.seal(passy.strength);
  }

  if (Object.freeze) {
    Object.freeze(passy.character);
    Object.freeze(passy.strength);
  }

  passy.analize = function (password) {
    var score = Math.floor(password.length * 2);
    var i = password.length;

    score += $.passy.analizePatterns(password);
    score += $.passy.analizeDictionary(password);

    while (i--) score += $.passy.analizeCharacter(password.charAt(i));

    return $.passy.analizeScore(score);
  };

  passy.analizeCharacter = function (character) {
    var code = character.charCodeAt(0);

    if (code >= 97 && code <= 122) return 1;   // lower case
    if (code >= 48 && code <= 57) return 2;    // numeric
    if (code >= 65 && code <= 90) return 3;    // capital
    if (code <= 126) return 4;                 // punctuation
    return 5;                                 // foreign characters etc
  };

  passy.analizePattern = function (password, pattern) {
    var lastmatch = -1;
    var score = -2;

    for (var i = 0; i < password.length; i++) {
      var match = pattern.indexOf(password.charAt(i));

      if (lastmatch === match - 1) {
        lastmatch = match;
        score++;
      }
    }

    return Math.max(0, score);
  };

  passy.analizePatterns = function (password) {
    var chars = password.toLowerCase();
    var score = 0;

    for (var i in $.passy.patterns) {
      var pattern = $.passy.patterns[i].toLowerCase();
      score += $.passy.analizePattern(chars, pattern);
    }

    // patterns are bad man!
    return score * -5;
  };

  passy.analizeDictionary = function (password) {
    var chars = password.toLowerCase();
    var score = 0;

    for (var i in $.passy.dictionary) {
      var word = $.passy.dictionary[i].toLowerCase();

      if (password.indexOf(word) >= 0) score++;
    }

    // using words are bad too!
    return score * -5;
  };

  passy.analizeScore = function (score) {
    if (score >= $.passy.threshold.extreme) return $.passy.strength.EXTREME;
    if (score >= $.passy.threshold.high) return $.passy.strength.HIGH;
    if (score >= $.passy.threshold.medium) return $.passy.strength.MEDIUM;

    return $.passy.strength.LOW;
  };

  passy.generate = function (len) {
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

    while (len--) {
      type = len % chars.length;
      index = Math.floor(Math.random() * chars[type].length);
      password.push(chars[type].charAt(index));
    }

    password.sort(function () {
      return Math.random() * 2 - 1;
    });

    return password.join('');
  };

  passy.contains = function (str, character) {
    if (character === $.passy.character.DIGIT) {
      return /\d/.test(str);
    } else if (character === $.passy.character.LOWERCASE) {
      return /[a-z]/.test(str);
    } else if (character === $.passy.character.UPPERCASE) {
      return /[A-Z]/.test(str);
    } else if (character === $.passy.character.PUNCTUATION) {
      return /[!"#$%&'()*+,\-./:;<=>?@[\\]\^_`{\|}~]/.test(str);
    }
  };

  passy.valid = function (str) {
    var valid = true;

    if (!$.passy.requirements) return true;

    if (str.length < $.passy.requirements.length.min) return false;
    if (str.length > $.passy.requirements.length.max) return false;

    for (var i in $.passy.character) {
      if ($.passy.requirements.characters & $.passy.character[i]) {
        valid = $.passy.contains(str, $.passy.character[i]) && valid;
      }
    }

    return valid;
  };

  var methods = {
    init: function (callback) {
      var $this = $(this);

      $this.on('change keyup', function () {
        if (typeof callback !== 'function') return;

        var value = $this.val();
        callback.call($this, $.passy.analize(value), methods.valid.call($this));
      });
    },

    generate: function (len) {
      this.val($.passy.generate(len));
      this.change();
    },

    valid: function () {
      return $.passy.valid(this.val());
    }
  };

  $.fn.passy = function (opt) {
    if (methods[opt]) {
      return methods[opt].apply(this, Array.prototype.slice.call(arguments, 1));
    } else if (typeof opt === 'function' || !opt) {
      return methods.init.apply(this, arguments);
    }

    return this;
  };

  $.extend({passy: passy});
})(jQuery);

// Passy - password generator
// ------------------------------

$(function () {
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
  $inputLabelAbsolute.passy(function (strength) {
    $outputLabelAbsolute.text(feedback[strength].text);
    $outputLabelAbsolute.css('background-color', feedback[strength].color).css('color', feedback[strength].textColor);
  });

  // Absolute label
  $('.generate-label-absolute').click(function () {
    $inputLabelAbsolute.passy('generate', 10);
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

/*! ========================================================================
 * Live Filter: livefilter.js v2.0.0
 * ========================================================================
 * Copyright 2015, Salvatore Di Salvo (disalvo-infographiste[dot].be)
 * ======================================================================== */

(function ($) {
  'use strict';

  // FILTER PUBLIC CLASS DEFINITION
  // ====================================

  var Filter = function (element, options) {
    this.$element = $(element)
    this.options = $.extend({}, this.defaults(), options)
    this.structure = $.extend({}, this.parts())
    this.keywords = null
    this.init()
  }

  Filter.VERSION = '2.1.0'

  Filter.DEFAULTS = {
    clearbtn: false,
    textinfo: true,
    autocomplete: false,   // Allow auto-completion
    hint: "placeholder",    // "placeholder", "select", false
    arrowKeys: false,       // Allow the use of <up> and <down> keys to iterate
    matches: false,         // Show the number the number of elements in the list which match the filter
    caseSensitive: false,
    minLength: 1,
    wrapInput: true
  }

  Filter.prototype.parts = function () {
    return {
      $input: $('.live-search', this.$element),
      $filter: $('.list-to-filter', this.$element),
      $clear: $('.filter-clear', this.$element),
      $no_results: $('.no-search-results', this.$element),
      $info: $('.filter-info', this.$element),
      $val: $('.filter-val', this.$element),
      $items: $('.filter-item', this.$element),
      $matches: $('.matches', this.$element)
    }
  }

  Filter.prototype.defaults = function () {
    return {
      clearbtn: this.$element.attr('data-clear') || Filter.DEFAULTS.clearbtn,
      textinfo: this.$element.attr('data-textinfo') || Filter.DEFAULTS.textinfo,
      autocomplete: this.$element.attr('data-autocomplete') || Filter.DEFAULTS.autocomplete,
      hint: this.$element.attr('data-hint') || Filter.DEFAULTS.hint,
      arrowKeys: this.$element.attr('data-keys') || Filter.DEFAULTS.arrowKeys,
      matches: this.$element.attr('data-matches') || Filter.DEFAULTS.arrowKeys,
      caseSensitive: Filter.DEFAULTS.caseSensitive,
      minLength: Filter.DEFAULTS.minLength,
      wrapInput: Filter.DEFAULTS.wrapInput
    }
  }

  Filter.prototype.getKeywords = function () {
    var keywords = [];
    this.structure.$items.each(function (i) {
      if (!$(this).hasClass('disabled'))
        keywords = keywords.concat($(this).attr('data-filter').split('|'));
    });
    return keywords;
  }

  Filter.prototype.init = function () {
    var $filter = this;

    if ($filter.options.autocomplete) {
      $filter.initAC();
    }

    if ($filter.options.clearbtn) {
      $filter.structure.$clear.click(function (e) {
        e.preventDefault();
        $filter.clear()
      });
    }

    $filter.structure.$input.on('keyup', function () {
      var val = $(this).val().toLowerCase();

      $filter.structure.$val.text(val);

      if ($filter.options.clearbtn)
        $filter.structure.$clear.toggleClass('hide', !val).prev('span').toggle(!val);

      var resultsCount = $filter.searchAndFilter(val);

      if (resultsCount == 0 && val.length != 0) {
        $filter.structure.$no_results.show();
      } else {
        $filter.structure.$no_results.hide();
      }

      if ($filter.options.textinfo) {
        if ((val.length == 0 || val == '') || resultsCount == 0) {
          $filter.structure.$info.hide();
        } else {
          $filter.structure.$info.show();
        }
      }
    });

    $filter.structure.$input
      .val('')
      .trigger('input')
      .trigger('keyup');

    if ($filter.structure.$clear && $filter.options.clearbtn) {
      $filter.structure.$clear.addClass('hide').prev('span').show(); // Hide clear button
    }

    if ($filter.structure.$info) {
      $filter.structure.$info.hide(); // Hide no resutls msg
    }

    if ($filter.structure.$no_results) {
      $filter.structure.$no_results.hide(); // Hide no resutls msg
    }
  }

  Filter.prototype.initAC = function () {
    var $filter = this;
    $filter.keywords = $filter.getKeywords();

    if ($filter.keywords != undefined && $filter.keywords != null) {

      // Add tab completion
      $filter.structure.$input.tabcomplete($filter.keywords, {
        hint: $filter.options.hint,
        arrowKeys: $filter.options.arrowKeys,
        caseSensitive: $filter.options.caseSensitive,
        minLength: $filter.options.minLength,
        wrapInput: $filter.options.wrapInput
      });

      if ($filter.options.matches) {
        $filter.structure.$input
          .on(
            "match",
            function (e, num) {
              $filter.structure.$matches.css("opacity", (num == 0 ? 0 : 1)).find("span").html(num);
            }
          )
          .on(
            "blur",
            function () {
              $filter.structure.$matches.css("opacity", 0);
            }
          );
      }
    }
    else {
      console.log('no keywords defined!');
    }
  }

  Filter.prototype.searchAndFilter = function (val) {
    var $filter = this,
      resultsCount = 0;

    if (!val) {
      this.structure.$items.each(function () {
        if (!$(this).hasClass('disabled')) {
          $(this).show();
        }
      });
    } else {
      this.structure.$items.each(function () {
        if (!$(this).hasClass('disabled')) {
          var filters = $(this).attr('data-filter').split('|');
          var show = $filter.inFilter(val, filters);
          if (show) resultsCount++;
          $(this).toggle(!!show);
        }
      });
    }

    return resultsCount;
  }

  Filter.prototype.clear = function () {
    this.structure.$input
      .val('')
      .trigger('input')
      .trigger('keyup');

    this.structure.$clear.addClass('hide'); // Hide clear button
  }

  Filter.prototype.inFilter = function (val, filter) {
    for (var i = 0; i < filter.length; i++) {
      var toParse = filter[i].toLowerCase();
      if (toParse.match(val)) return true;
    }
    return false;
  }

  //Todo Select on enter key

  // FILTER PLUGIN DEFINITION
  // ==============================

  function Plugin() {
    var arg = arguments;
    return this.each(function () {
      var $this = $(this),
        data = $this.data('liveFilter'),
        method = arg[0];

      if (typeof(method) == 'object' || !method) {
        var options = typeof method == 'object' && method;
        $this.data('liveFilter', (data = new Filter(this, options)));
      } else {
        if (data[method]) {
          method = data[method];
          arg = Array.prototype.slice.call(arg, 1);
          if (arg != null || arg != undefined || arg != [])  method.apply(data, arg);
        } else {
          $.error('Method ' + method + ' does not exist on jQuery.Filter');
          return this;
        }
      }
    })
  }

  var old = $.fn.liveFilter

  $.fn.liveFilter = Plugin
  $.fn.liveFilter.Constructor = Filter

  // FILTER NO CONFLICT
  // ========================

  $.fn.toggle.noConflict = function () {
    $.fn.liveFilter = old
    return this
  }

  // FILTER DATA-API
  // =====================

  $(function () {
    $('.livefilter').liveFilter();
  });
}(jQuery));
// PREVENT INSIDE MEGA DROPDOWN
$('.dropdown-menu.livefilter .search-box').on("click.bs.dropdown", function (e) {
  e.stopPropagation();
  e.preventDefault();
});

/* Jak Move - Sortable and Draggable
 ========================================================================*/
$(".envo_widget_move").sortable({
  placeholder: "ui-state-highlight",
  axis: 'y',
  revert: 250,
  tolerance: 'pointer',
  containment: 'parent',
  forcePlaceholderSize: true,
  start: function (e, ui) {

    ui.placeholder.height(ui.item.height());
    ui.item.css('opacity', '0.6');
    ui.placeholder.css('background-color', '#CFF5F2');

  },
  update: function () {

    // Get the new order into the hidden input
    var position = 1;
    $('.sorder').each(function () {
      $(this).val(position);
      position += 1;
    });

    $(".envowidget").animate({backgroundColor: '#C9FFC9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);

  },
  stop: function (e, ui) {
    /* Opera fix: */
    ui.item.css({'top': '0', 'left': '0'});
    ui.item.css('opacity', '1');
  }
});

$(".envo_content_move").sortable({
  placeholder: "ui-state-highlight",
  axis: 'y',
  revert: 250,
  tolerance: 'pointer',
  containment: 'parent',
  forcePlaceholderSize: true,
  start: function (e, ui) {

    ui.placeholder.height(ui.item.height());
    ui.item.css('opacity', '0.6');
    ui.placeholder.css('background-color', '#CFF5F2');

  },
  update: function () {

    // Get the new order into the hidden input
    var position = 1;
    $('.corder').each(function () {
      $(this).val(position);
      position += 1;
    });

    $(".envocontent").animate({backgroundColor: '#C9FFC9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);

  },
  stop: function (e, ui) {
    /* Opera fix: */
    ui.item.css({'top': '0', 'left': '0'});
    ui.item.css('opacity', '1');
  }
});

$("#cform_sort").sortable({
  placeholder: "ui-state-highlight",
  axis: 'y',
  revert: 250,
  tolerance: 'pointer',
  containment: 'parent',
  forcePlaceholderSize: true,
  start: function (e, ui) {

    ui.placeholder.height(ui.item.height());
    ui.item.css('opacity', '0.6');
    ui.placeholder.css('background-color', '#CFF5F2');

  },
  update: function (event, ui) {

    ui.item.removeClass('ui-state-highlight').addClass('envocform');
    ui.item.find(".envoread").removeAttr("readonly").val("");
    ui.item.find(".cforder-orig").removeClass('cforder-orig').addClass('cforder');
    $(".envocform").animate({backgroundColor: '#C9FFC9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);

    // Get the new order into the hidden input
    var position = 1;
    $('.cforder').each(function () {
      $(this).val(position);
      position += 1;
    });
  },
  stop: function (e, ui) {
    /* Opera fix: */
    ui.item.css({'top': '0', 'left': '0'});
    ui.item.css('opacity', '1');

  }
});


$("#cform_drag").draggable({
  connectToSortable: '#cform_sort',
  helper: 'clone',
  revert: 'invalid',
  axis: 'y',
  /* Add custom class */
  start: function (event, ui) {
    $(ui.helper).addClass("ui-helper");
  }
});

/* jQuery countdown status to show in button
 ========================================================================*/
/* Example:
 * $('#btnContinue').timedDisable(20);
 */
$.fn.timedDisable = function (time) {
  if (time == null) {
    time = 5;
  }
  var seconds = Math.ceil(time); // Calculate the number of seconds
  return $(this).each(function () {
    $(this).attr('disabled', 'disabled');
    var disabledElem = $(this);
    var originalText = this.innerHTML; // Remember the original text content

    // append the number of seconds to the text
    disabledElem.text(originalText + ' (' + seconds + ')');

    // do a set interval, using an interval of 1000 milliseconds
    //     and clear it after the number of seconds counts down to 0
    var interval = setInterval(function () {
      seconds = seconds - 1;
      // decrement the seconds and update the text
      disabledElem.text(originalText + ' (' + seconds + ')');
      if (seconds === 0) { // once seconds is 0...
        disabledElem.removeAttr('disabled')
          .text(originalText); //reset to original text
        clearInterval(interval); // clear interval
      }
    }, 1000);
  });
};

/* 00. OTHER FUNCTION
 ======================================================================== */
$('.cms-help').popover({
  container: 'body',
  placement: 'top',
  trigger: 'focus',
  html: true,
  template: '<div class="popover style-1">' +
  '<div class="arrow"></div>' +
  '<h3 class="popover-title"></h3>' +
  '<div class="popover-content"></div>' +
  '</div>'
});

/* 00. Counter trigger
 ======================================================================== */
if ($('.counter').length) {
  $('.counter').each(function (index, val) {
    var $this = $(this);
    if ($(window).width() > 1024) {
      $this.html(0);
      increment($this);
    }
  });

}

/* Counter Increment */
function increment(obj) {
  $({increment: 0}).animate({increment: obj.data('counterend')}, {
    duration: (obj.data('counterduration')) ? obj.data('counterduration') : 3000,
    easing: 'swing',
    step: function () {
      if (obj.data('countertype') === 'float') {
        obj.html(Math.abs(this.increment).toFixed(1));
      } else {
        obj.html(Math.ceil(this.increment));
      }

    }
  });
}
