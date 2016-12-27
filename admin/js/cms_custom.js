/*
 *
 * BLUESAT.CZ
 * Extra Custom JS for Admin Control Panel with custom modification
 * Copyright © 2016 Bluesat.cz
 *
 * -----------------------------------------------------------------------
 * Author: Almsaeed Studio
 * Website: Almsaeed Studio <http://almsaeedstudio.com>
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Written by: Bluesat.cz - (http://www.bluesat.cz)
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */

/* 01. MODIFICATION - INIT and CONFIG BOOTSTRAP TAGSINPUT PLUGIN
 ========================================================================*/
$(function() {
  // Add value from Bootstrap Select to Bootstrap TagsInput
  $('#selecttags1').on('changed.bs.select', function (e) {
    $("input[name='jak_tags']").tagsinput('add', $(this).val());
  });
  $('#selecttags2').on('changed.bs.select', function (e) {
    $("input[name='jak_tags']").tagsinput('add', $(this).val());
  });

  // Init Booststrap TagsInput for all Tags
  $("input[name='jak_tags'].tags").tagsinput('items');

  /* Init Booststrap TagsInput for metakey in ACP
    * confirm key code
    * 13 - enter
    * 44 - comma ' , '
    * 32 - space bar
    *
     */
  $("input[name='jak_keywords']#metakey").tagsinput({
    confirmKeys: [13, 44, 32]
  });

  $("input[name='jak_lcontent_meta_key']#jak_editor_light_meta_key").tagsinput({
    confirmKeys: [13, 44, 32]
  });
});

/* 02. MODIFICATION - SHOW/HIDE Help for each page
 ========================================================================*/
$(function() {
  if( $('.control-sidebar').length ) {
    $('#control-sb').removeClass('hidden');
  }
});

/* 03. MODIFICATION - INIT and CONFIG BOOTSTRAP TOOLTIP
 ========================================================================*/
$(function() {
  $('[data-toggle="tooltip"]').tooltip();
});

/* 04. JQUERY PASSY - Generating and analazing passwords, realtime.
 ========================================================================*/
/*
 * jQuery Passy
 * Generating and analazing passwords, realtime.
 *
 * Tim Severien
 * http://timseverien.nl
 *
 * Copyright (c) 2013 Tim Severien
 * Released under the GPLv2 license.
 *
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


/* 05. BOOTBOX
 ========================================================================*/
/* http://bootboxjs.com/license.txt */

!function(a,b){"use strict";"function"==typeof define&&define.amd?define(["jquery"],b):"object"==typeof exports?module.exports=b(require("jquery")):a.bootbox=b(a.jQuery)}(this,function a(b,c){"use strict";function d(a){var b=q[o.locale];return b?b[a]:q.en[a]}function e(a,c,d){a.stopPropagation(),a.preventDefault();var e=b.isFunction(d)&&d.call(c,a)===!1;e||c.modal("hide")}function f(a){var b,c=0;for(b in a)c++;return c}function g(a,c){var d=0;b.each(a,function(a,b){c(a,b,d++)})}function h(a){var c,d;if("object"!=typeof a)throw new Error("Please supply an object of options");if(!a.message)throw new Error("Please specify a message");return a=b.extend({},o,a),a.buttons||(a.buttons={}),c=a.buttons,d=f(c),g(c,function(a,e,f){if(b.isFunction(e)&&(e=c[a]={callback:e}),"object"!==b.type(e))throw new Error("button with key "+a+" must be an object");e.label||(e.label=a),e.className||(e.className=2>=d&&f===d-1?"btn-primary":"btn-default")}),a}function i(a,b){var c=a.length,d={};if(1>c||c>2)throw new Error("Invalid argument length");return 2===c||"string"==typeof a[0]?(d[b[0]]=a[0],d[b[1]]=a[1]):d=a[0],d}function j(a,c,d){return b.extend(!0,{},a,i(c,d))}function k(a,b,c,d){var e={className:"bootbox-"+a,buttons:l.apply(null,b)};return m(j(e,d,c),b)}function l(){for(var a={},b=0,c=arguments.length;c>b;b++){var e=arguments[b],f=e.toLowerCase(),g=e.toUpperCase();a[f]={label:d(g)}}return a}function m(a,b){var d={};return g(b,function(a,b){d[b]=!0}),g(a.buttons,function(a){if(d[a]===c)throw new Error("button key "+a+" is not allowed (options are "+b.join("\n")+")")}),a}var n={dialog:"<div class='bootbox modal' tabindex='-1' role='dialog'><div class='modal-dialog'><div class='modal-content'><div class='modal-body'><div class='bootbox-body'></div></div></div></div></div>",header:"<div class='modal-header'><h4 class='modal-title'></h4></div>",footer:"<div class='modal-footer'></div>",closeButton:"<button type='button' class='bootbox-close-button close' data-dismiss='modal' aria-hidden='true'>&times;</button>",form:"<form class='bootbox-form'></form>",inputs:{text:"<input class='bootbox-input bootbox-input-text form-control' autocomplete=off type=text />",textarea:"<textarea class='bootbox-input bootbox-input-textarea form-control'></textarea>",email:"<input class='bootbox-input bootbox-input-email form-control' autocomplete='off' type='email' />",select:"<select class='bootbox-input bootbox-input-select form-control'></select>",checkbox:"<div class='checkbox'><label><input class='bootbox-input bootbox-input-checkbox' type='checkbox' /></label></div>",date:"<input class='bootbox-input bootbox-input-date form-control' autocomplete=off type='date' />",time:"<input class='bootbox-input bootbox-input-time form-control' autocomplete=off type='time' />",number:"<input class='bootbox-input bootbox-input-number form-control' autocomplete=off type='number' />",password:"<input class='bootbox-input bootbox-input-password form-control' autocomplete='off' type='password' />"}},o={locale:"en",backdrop:"static",animate:!0,className:null,closeButton:!0,show:!0,container:"body"},p={};p.alert=function(){var a;if(a=k("alert",["ok"],["message","callback"],arguments),a.callback&&!b.isFunction(a.callback))throw new Error("alert requires callback property to be a function when provided");return a.buttons.ok.callback=a.onEscape=function(){return b.isFunction(a.callback)?a.callback.call(this):!0},p.dialog(a)},p.confirm=function(){var a;if(a=k("confirm",["cancel","confirm"],["message","callback"],arguments),a.buttons.cancel.callback=a.onEscape=function(){return a.callback.call(this,!1)},a.buttons.confirm.callback=function(){return a.callback.call(this,!0)},!b.isFunction(a.callback))throw new Error("confirm requires a callback");return p.dialog(a)},p.prompt=function(){var a,d,e,f,h,i,k;if(f=b(n.form),d={className:"bootbox-prompt",buttons:l("cancel","confirm"),value:"",inputType:"text"},a=m(j(d,arguments,["title","callback"]),["cancel","confirm"]),i=a.show===c?!0:a.show,a.message=f,a.buttons.cancel.callback=a.onEscape=function(){return a.callback.call(this,null)},a.buttons.confirm.callback=function(){var c;switch(a.inputType){case"text":case"textarea":case"email":case"select":case"date":case"time":case"number":case"password":c=h.val();break;case"checkbox":var d=h.find("input:checked");c=[],g(d,function(a,d){c.push(b(d).val())})}return a.callback.call(this,c)},a.show=!1,!a.title)throw new Error("prompt requires a title");if(!b.isFunction(a.callback))throw new Error("prompt requires a callback");if(!n.inputs[a.inputType])throw new Error("invalid prompt type");switch(h=b(n.inputs[a.inputType]),a.inputType){case"text":case"textarea":case"email":case"date":case"time":case"number":case"password":h.val(a.value);break;case"select":var o={};if(k=a.inputOptions||[],!b.isArray(k))throw new Error("Please pass an array of input options");if(!k.length)throw new Error("prompt with select requires options");g(k,function(a,d){var e=h;if(d.value===c||d.text===c)throw new Error("given options in wrong format");d.group&&(o[d.group]||(o[d.group]=b("<optgroup/>").attr("label",d.group)),e=o[d.group]),e.append("<option value='"+d.value+"'>"+d.text+"</option>")}),g(o,function(a,b){h.append(b)}),h.val(a.value);break;case"checkbox":var q=b.isArray(a.value)?a.value:[a.value];if(k=a.inputOptions||[],!k.length)throw new Error("prompt with checkbox requires options");if(!k[0].value||!k[0].text)throw new Error("given options in wrong format");h=b("<div/>"),g(k,function(c,d){var e=b(n.inputs[a.inputType]);e.find("input").attr("value",d.value),e.find("label").append(d.text),g(q,function(a,b){b===d.value&&e.find("input").prop("checked",!0)}),h.append(e)})}return a.placeholder&&h.attr("placeholder",a.placeholder),a.pattern&&h.attr("pattern",a.pattern),a.maxlength&&h.attr("maxlength",a.maxlength),f.append(h),f.on("submit",function(a){a.preventDefault(),a.stopPropagation(),e.find(".btn-primary").click()}),e=p.dialog(a),e.off("shown.bs.modal"),e.on("shown.bs.modal",function(){h.focus()}),i===!0&&e.modal("show"),e},p.dialog=function(a){a=h(a);var d=b(n.dialog),f=d.find(".modal-dialog"),i=d.find(".modal-body"),j=a.buttons,k="",l={onEscape:a.onEscape};if(b.fn.modal===c)throw new Error("$.fn.modal is not defined; please double check you have included the Bootstrap JavaScript library. See http://getbootstrap.com/javascript/ for more details.");if(g(j,function(a,b){k+="<button data-bb-handler='"+a+"' type='button' class='btn "+b.className+"'>"+b.label+"</button>",l[a]=b.callback}),i.find(".bootbox-body").html(a.message),a.animate===!0&&d.addClass("fade"),a.className&&d.addClass(a.className),"large"===a.size?f.addClass("modal-lg"):"small"===a.size&&f.addClass("modal-sm"),a.title&&i.before(n.header),a.closeButton){var m=b(n.closeButton);a.title?d.find(".modal-header").prepend(m):m.css("margin-top","-10px").prependTo(i)}return a.title&&d.find(".modal-title").html(a.title),k.length&&(i.after(n.footer),d.find(".modal-footer").html(k)),d.on("hidden.bs.modal",function(a){a.target===this&&d.remove()}),d.on("shown.bs.modal",function(){d.find(".btn-primary:first").focus()}),"static"!==a.backdrop&&d.on("click.dismiss.bs.modal",function(a){d.children(".modal-backdrop").length&&(a.currentTarget=d.children(".modal-backdrop").get(0)),a.target===a.currentTarget&&d.trigger("escape.close.bb")}),d.on("escape.close.bb",function(a){l.onEscape&&e(a,d,l.onEscape)}),d.on("click",".modal-footer button",function(a){var c=b(this).data("bb-handler");e(a,d,l[c])}),d.on("click",".bootbox-close-button",function(a){e(a,d,l.onEscape)}),d.on("keyup",function(a){27===a.which&&d.trigger("escape.close.bb")}),b(a.container).append(d),d.modal({backdrop:a.backdrop?"static":!1,keyboard:!1,show:!1}),a.show&&d.modal("show"),d},p.setDefaults=function(){var a={};2===arguments.length?a[arguments[0]]=arguments[1]:a=arguments[0],b.extend(o,a)},p.hideAll=function(){return b(".bootbox").modal("hide"),p};var q={bg_BG:{OK:"Ок",CANCEL:"Отказ",CONFIRM:"Потвърждавам"},br:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Sim"},cs:{OK:"OK",CANCEL:"Zrušit",CONFIRM:"Potvrdit"},da:{OK:"OK",CANCEL:"Annuller",CONFIRM:"Accepter"},de:{OK:"OK",CANCEL:"Abbrechen",CONFIRM:"Akzeptieren"},el:{OK:"Εντάξει",CANCEL:"Ακύρωση",CONFIRM:"Επιβεβαίωση"},en:{OK:"OK",CANCEL:"Cancel",CONFIRM:"OK"},es:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Aceptar"},et:{OK:"OK",CANCEL:"Katkesta",CONFIRM:"OK"},fa:{OK:"قبول",CANCEL:"لغو",CONFIRM:"تایید"},fi:{OK:"OK",CANCEL:"Peruuta",CONFIRM:"OK"},fr:{OK:"OK",CANCEL:"Annuler",CONFIRM:"D'accord"},he:{OK:"אישור",CANCEL:"ביטול",CONFIRM:"אישור"},hu:{OK:"OK",CANCEL:"Mégsem",CONFIRM:"Megerősít"},hr:{OK:"OK",CANCEL:"Odustani",CONFIRM:"Potvrdi"},id:{OK:"OK",CANCEL:"Batal",CONFIRM:"OK"},it:{OK:"OK",CANCEL:"Annulla",CONFIRM:"Conferma"},ja:{OK:"OK",CANCEL:"キャンセル",CONFIRM:"確認"},lt:{OK:"Gerai",CANCEL:"Atšaukti",CONFIRM:"Patvirtinti"},lv:{OK:"Labi",CANCEL:"Atcelt",CONFIRM:"Apstiprināt"},nl:{OK:"OK",CANCEL:"Annuleren",CONFIRM:"Accepteren"},no:{OK:"OK",CANCEL:"Avbryt",CONFIRM:"OK"},pl:{OK:"OK",CANCEL:"Anuluj",CONFIRM:"Potwierdź"},pt:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Confirmar"},ru:{OK:"OK",CANCEL:"Отмена",CONFIRM:"Применить"},sq:{OK:"OK",CANCEL:"Anulo",CONFIRM:"Prano"},sv:{OK:"OK",CANCEL:"Avbryt",CONFIRM:"OK"},th:{OK:"ตกลง",CANCEL:"ยกเลิก",CONFIRM:"ยืนยัน"},tr:{OK:"Tamam",CANCEL:"İptal",CONFIRM:"Onayla"},zh_CN:{OK:"OK",CANCEL:"取消",CONFIRM:"确认"},zh_TW:{OK:"OK",CANCEL:"取消",CONFIRM:"確認"}};return p.addLocale=function(a,c){return b.each(["OK","CANCEL","CONFIRM"],function(a,b){if(!c[b])throw new Error("Please supply a translation for '"+b+"'")}),q[a]={OK:c.OK,CANCEL:c.CANCEL,CONFIRM:c.CONFIRM},p},p.removeLocale=function(a){return delete q[a],p},p.setLocale=function(a){return p.setDefaults("locale",a)},p.init=function(c){return a(c||b)},p});