var cacheQ = new Array();
var apl = document.location.pathname.match(/\/(\w+)\/.*/);
if (apl != null)
  apl = apl[1];

function checkQuery (form) {
  var i, elem;
  var finger = "";
  var now = new Date().getTime();
  for (i = 0; i < form.elements.length; i++) {
    elem = form.elements[i];
    switch (elem.type) {
      case "checkbox":
        finger += elem.checked + "$";
        break;
      case "radio":
        finger += elem.checked + "$";
        break;
      case "select-one":
        finger += elem.selectedIndex + "$";
        break;
      case "select-multiple":
        for (var j = 0; j < elem.options.length; j++)
          if (elem.options[j].selected)
            finger += j + ",";
        finger += "$";
        break;
      case "text":
        if (elem.value != "") finger += elem.value; else finger += ".";
        finger += "$";
        break;
      case "hidden":
        finger += elem.value + "$";
        break;
    }
  }
  for (i = 0; i < cacheQ.length; i++) {
    if (cacheQ[i][0] == finger) {
      if (now - cacheQ[i][1] < 60000) {
        return true;
      } else {
        cacheQ[i][1] = now;
        return true;
      }
    }
  }
  cacheQ.push(new Array(finger, now));
  return true;
}


function checkIC (ic) {
  var nuly = "00000000";
  if (ic == "") return true;
  try {
    if (ic.length != 8)
      ic = nuly.substr(0, 8 - ic.length) + ic;
    var a = 0;
    if (ic.length == 0) return true;
    var b = ic.split('');
    var c = 0;
    for (var i = 0; i < 7; i++) a += (parseInt(b[i]) * (8 - i));
    a = a % 11;
    c = 11 - a;
    if (a == 1) c = 0;
    if (a == 0) c = 1;
    if (a == 10) c = 1;
    if (parseInt(b[7]) != c) throw(1);
  }
  catch (e) {
    return confirm('Zadané IÈ není korektní! Odeslat dotaz?'.replace(/<\/?cz>/g, ""));
  }
  return true;
}


function checkRC (rc) {
  if (rc == "") return true;
  for (var i = 0; i < rc.length; i++)
    if (rc[i] < "0" || rc[i] > "9") {
      alert('Zadané RÈ není korektní!'.replace(/<\/?cz>/g, ""));
      return false;
    }
  return true;
}


function fncSubmit () {
  var res;
  var elem;

  if (document.body.id == "FZL") // aresds_zl_form.html.cz
  {
    elem = document.getElementById("k_fu");
    if (elem != null)
      setCookie(apl + "_kfu", elem.value, expireDate(90));
    elem.onchange = function () {
      setCookie(apl + "_kfu", this.value, expireDate(90));
    }
  }


  if (document.body.id == "FOL") // darv_off_form.html.cz
  {
    // kontrola datumu (pouze v pripade volby 1 ve "zpracovani")
    zpracovani = document.getElementById("zpr");
    if (zpracovani.options[zpracovani.selectedIndex].value == 1) {
      dat_od = document.getElementById("dat_od");
      dat_do = document.getElementById("dat_do");
      if (!KontrolaDatumu(dat_od.value)) {
        dat_od.select();
        dat_od.focus();
        return false;
      }
      if (!KontrolaDatumu(dat_do.value)) {
        dat_do.select();
        dat_do.focus();
        return false;
      }
      diffDat(dat_od.value, dat_do.value);
    }
    // ulozeni cookies
    elem = document.getElementById("mail");
    if (elem != null) setCookie(apl + "_mail", elem.value, expireDate(90));
    elem = document.getElementById("k_fu");
    if (elem != null) setCookie(apl + "_kfu", elem.value, expireDate(90));


  }

  if (document.body.id == "FES") {
    //e_okec   = document.getElementById("ok1");                                                              
    //e_okec_h = document.getElementById("ok2");                         
    e_nace = document.getElementById("na1");
    //e_nace_h = document.getElementById("na2");

    //if ((e_nace.value != "") || (e_nace_h.value != ""))
    //{
    //  e_okec.value = "";
    //  e_okec_h.value = "";
    //}
  }

  elem = document.getElementById("ic");
  if (elem != null)
    if (!checkIC(elem.value)) {
      elem.focus();
      return false;
    }

  elem = document.getElementById("ic1");
  if (elem != null)
    if (!checkIC(elem.value)) {
      elem.focus();
      return false;
    }

  elem = document.getElementById("ic2");
  if (elem != null)
    if (!checkIC(elem.value)) {
      elem.focus();
      return false;
    }

  elem = document.getElementById("rc");
  if (elem != null)
    if (!checkRC(elem.value)) {
      elem.focus();
      return false;
    }

  elem = document.getElementById("rc1");
  if (elem != null)
    if (!checkRC(elem.value)) {
      elem.focus();
      return false;
    }

  elem = document.getElementById("rc2");
  if (elem != null)
    if (!checkRC(elem.value)) {
      elem.focus();
      return false;
    }

  res = checkQuery(this);
  if (!res) return false;

  if (document.body.id != "FOL") {
    if (window.JS_DATUM_LOAD) {
      res = tstOdDo();
      if (!res) return false;
    }
  }
  WaitPage();
  //window.setInterval(QueryTimerUpdate(), 100);

  return true;
}

function fncReset () {
  var elem, value;

  elem = document.getElementById("vyst");
  if (elem != null) {
    value = getCookie(apl + "_vyst");
    if (value != null)
      elem.selectedIndex = value;
    elem.onchange = function () {
      setCookie(apl + "_vyst", this.selectedIndex, expireDate(90));
    }
  }

  if (document.body.id == "FZL") {
    elem = document.getElementById("k_fu");
    if (elem != null) {
      value = getCookie(apl + "_kfu");
      if (value != null)
        elem.value = value;
    }
  }


  if (document.body.id == "FOL") {
    elem = document.getElementById("mail");
    if (elem != null) {
      value = getCookie(apl + "_mail");
      if (value != null) elem.value = value;
    }

    elem = document.getElementById("k_fu");
    if (elem != null) {
      value = getCookie(apl + "_kfu");
      if (value != null) elem.value = value;
    }
  }

  if ((document.getElementsByName("datum").length > 0) &&
    (document.getElementsByName("denOD").length > 0) &&
    (document.getElementsByName("mesOD").length > 0) &&
    (document.getElementsByName("rokOD").length > 0) &&
    (document.getElementsByName("denDO").length > 0) &&
    (document.getElementsByName("mesDO").length > 0) &&
    (document.getElementsByName("rokDO").length > 0))
    setTimeout("setToday()", 12);
}

function changeTyp () {
  var elem;
  var disable = true;

  elem = document.getElementsByName("typ");
  if (elem.length > 0)
    disable = !elem[0].checked;

  elem = document.getElementsByName("redukce");
  if (elem.length > 0)
    elem[0].disabled = disable;

  elem = document.getElementsByName("cestina");
  if (elem.length > 0)
    elem[0].disabled = disable;

  elem = document.getElementsByName("maxpoc");
  if (elem.length > 0)
    elem[0].disabled = disable;

  elem = document.getElementById("l_redukce");
  if (elem != null)
    elem.className = disable ? "ttld" : "ttl";

  elem = document.getElementById("l_cestina");
  if (elem != null)
    elem.className = disable ? "ttld" : "ttl";

  elem = document.getElementById("l_maxpoc");
  if (elem != null)
    elem.className = disable ? "ttld" : "ttl";
}

function changeOkNa () {
  var elem;

  if ((this.id == "ok1") || (this.id == "ok2")) {
    elem = document.getElementById("na1");
    elem.value = "";
    elem = document.getElementById("na2");
    elem.value = "";
  }

  if ((this.id == "na1") || (this.id == "na2")) {
    elem = document.getElementById("ok1");
    elem.value = "";
    elem = document.getElementById("ok2");
    elem.value = "";
  }
}

function initForm () {
  var elem, e_ang;

  fncReset();

  elem = document.getElementsByTagName("form");
  if (elem.length > 0) {
    elem[0].onsubmit = fncSubmit;
    elem[0].onreset = function () {
      setTimeout("fncReset()", 12);
    }

    if (window.JS_DATUM_LOAD != undefined) {
      if ((document.getElementsByName("datum").length > 0) &&
        (document.getElementsByName("denOD").length > 0) &&
        (document.getElementsByName("mesOD").length > 0) &&
        (document.getElementsByName("rokOD").length > 0) &&
        (document.getElementsByName("denDO").length > 0) &&
        (document.getElementsByName("mesDO").length > 0) &&
        (document.getElementsByName("rokDO").length > 0)) ;

      calendar("dor");
      calendar("odr");

      {
        //elem[0].onreset = function(){ setTimeout("setToday()", 12); }
        setToday();
        document.getElementsByName("datum")[0].onchange = setOdDo;
        document.getElementsByName("denOD")[0].onchange = setInterval;
        document.getElementsByName("mesOD")[0].onchange = setInterval;
        document.getElementsByName("rokOD")[0].onchange = setInterval;
        document.getElementsByName("denDO")[0].onchange = setInterval;
        document.getElementsByName("mesDO")[0].onchange = setInterval;
        document.getElementsByName("rokDO")[0].onchange = setInterval;
      }
    }

    for (i = 0; i < elem[0].elements.length; i++) {
      if (elem[0].elements[i].className.indexOf("FFocus") != -1) {
        elem[0].elements[i].focus();
        break;
      }
    }

    e_ang = document.getElementById("ang");
    if (e_ang != null) {
      e_ang.disabled = true;
      e_ang.className = e_ang.className + " FDisabled";
      e_ang.value = "v¹echna".replace(/<\/?cz>/g, "");
    }
  }

  if (document.body.id == "FStdAdr") {
    elem = document.getElementsByName("typ");
    if (elem.length > 0) {
      changeTyp();
      elem[0].onclick = changeTyp;
    }
  }

  if (document.body.id == "FES") {
    //e_okec   = document.getElementById("ok1");
    //e_okec_h = document.getElementById("ok2");
    e_nace = document.getElementById("na1");
    //e_nace_h = document.getElementById("na2");

    //e_okec.onchange   = changeOkNa;
    //e_okec_h.onchange = changeOkNa;
    e_nace.onchange = changeOkNa;
    //e_nace_h.onchange = changeOkNa;
  }
}

function QueryTimerStop () {
  window.clearInterval(QTimer);
  c = 0;
}

function calendar (id) {
  var today = new Date();
  var rok;
  var sel = document.getElementById(id);

  while (sel.childNodes.length >= 1) {
    sel.removeChild(sel.firstChild);
  }
  for (rok = today.getFullYear() + 1; rok > 1992; rok--) {
    newOption = document.createElement('option');
    newOption.value = rok;
    newOption.text = rok;
    newOption.innerText = rok;
    sel.appendChild(newOption);
  }

}

function QueryTimerUpdate () {
  var qtText;
  var qtElm = top.window.vstup.document.getElementById('qInfo');
  var sec, qtText, time;

  c++;
  sec = c / 10;
  if (sec < 10) time = "0" + sec.toFixed(1);
  else time = sec.toFixed(1);
  qtText = "Doba trvání dotazu: " + time + " sekund";
  qtElm.innerHTML = qtText;
}


var QTimer;
var c = 0;

window.onload = initForm;

