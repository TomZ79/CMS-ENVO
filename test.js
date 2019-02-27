function JTSK () {
  var t = function () {
    this.distPoints = function (t, e, a, n) {
      var o = this.hypot(t - a, e - n);
      return o < this.EPS ? 0 : o
    }, this.transformCoords = function (t, e, a) {
      var n = 4.99821 / 3600 * Math.PI / 180, o = 1.58676 / 3600 * Math.PI / 180, r = 5.2611 / 3600 * Math.PI / 180,
        i = -3543e-9;
      return [(1 + i) * (+t + r * e - o * a) - 570.69, (1 + i) * (-r * t + e + n * a) - 85.69, (1 + i) * (+o * t - n * e + a) - 462.84]
    }, this.deg2rad = function (t) {
      return t / 180 * Math.PI
    }, this.rad2deg = function (t) {
      return t / Math.PI * 180
    }, this.hypot = function (t, e) {
      return Math.sqrt(t * t + e * e) || 0
    }
  };
  return t.prototype.EPS = 1e-4, t.prototype.JTSKtoWGS84 = function (t, e) {
    if (!t || !e) return {lat: 0, lon: 0};
    for (var a, n, o, r, i, s = 5, l = 49, c = 14, u = 0; n = (a = this.WGS84toJTSK(l - s, c - s)).x && a.y ? this.distPoints(a.x, a.y, t, e) : 1e32, o = (a = this.WGS84toJTSK(l - s, c + s)).x && a.y ? this.distPoints(a.x, a.y, t, e) : 1e32, r = (a = this.WGS84toJTSK(l + s, c - s)).x && a.y ? this.distPoints(a.x, a.y, t, e) : 1e32, i = (a = this.WGS84toJTSK(l + s, c + s)).x && a.y ? this.distPoints(a.x, a.y, t, e) : 1e32, n <= o && n <= r && n <= i && (l -= s / 2, c -= s / 2), o <= n && o <= r && o <= i && (l -= s / 2, c += s / 2), r <= n && r <= o && r <= i && (l += s / 2, c -= s / 2), i <= n && i <= o && i <= r && (l += s / 2, c += s / 2), !((s *= .55) < 1e-5 || 1e3 < (u += 4));) ;
    return {lat: l, lon: c}
  }, t.prototype.WGS84toJTSK = function (t, e) {
    if (t < 40 || 60 < t || e < 5 || 25 < e) return {x: 0, y: 0};
    var a = this.WGS84toBessel(t, e);
    return this.BesseltoJTSK(a[0], a[1])
  }, t.prototype.WGS84toBessel = function (t, e, a) {
    var n = this.deg2rad(t), o = this.deg2rad(e), r = a || 0, i = this.BLHToGeoCoords(n, o, r),
      s = this.transformCoords(i[0], i[1], i[2]), l = this.geoCoordsToBLH(s[0], s[1], s[2]);
    return [t = this.rad2deg(l[0]), e = this.rad2deg(l[1])]
  }, t.prototype.BesseltoJTSK = function (t, e) {
    var a = .081696831215303, n = .97992470462083, o = .420215144586493, r = .907424504992097, i = 1.000597498371542,
      s = this.deg2rad(t), l = this.deg2rad(e), c = Math.sin(s), u = (1 - a * c) / (1 + a * c);
    u = Math.pow(1 + c, 2) / (1 - Math.pow(c, 2)) * Math.exp(a * Math.log(u));
    var p = ((u = 1.00685001861538 * Math.exp(i * Math.log(u))) - 1) / (u + 1), d = Math.sqrt(1 - p * p), m = i * l,
      v = Math.sin(m), h = Math.cos(m), y = o * h - r * v,
      w = .863499969506341 * p + .504348889819882 * d * (r * h + o * v), k = Math.sqrt(1 - w * w), g = y * d / k,
      f = Math.sqrt(1 - g * g), z = n * Math.atan(g / f), b = 12310230.12797036 * Math.exp(-n * Math.log((1 + w) / k));
    return {x: b * Math.cos(z), y: b * Math.sin(z)}
  }, t.prototype.BLHToGeoCoords = function (t, e, a) {
    var n = 1 - Math.pow(.9966471893352525, 2), o = 6378137 / Math.sqrt(1 - n * Math.pow(Math.sin(t), 2));
    return [(o + a) * Math.cos(t) * Math.cos(e), (o + a) * Math.cos(t) * Math.sin(e), ((1 - n) * o + a) * Math.sin(t)]
  }, t.prototype.geoCoordsToBLH = function (t, e, a) {
    var n = 6377397.15508, o = 299.152812853, r = o / (o - 1), i = Math.sqrt(Math.pow(t, 2) + Math.pow(e, 2)),
      s = 1 - Math.pow(1 - 1 / o, 2), l = Math.atan(a * r / i), c = Math.sin(l), u = Math.cos(l),
      p = (a + s * r * n * Math.pow(c, 3)) / (i - s * n * Math.pow(u, 3)), d = Math.atan(p),
      m = Math.sqrt(1 + p * p) * (i - n / Math.sqrt(1 + (1 - s) * p * p));
    return [d, 2 * Math.atan(e / (i + t)), m]
  }, new t
}

function geoutils () {
  var t = {}, e = null;
  return t.setCookie = function (t, e, a) {
    var n = new Date;
    n.setTime(n.getTime() + 24 * a * 60 * 60 * 1e3);
    var o = "expires=" + n.toUTCString();
    document.cookie = t + "=" + e + ";" + o + ";path=/"
  }, t.getCookie = function (t) {
    for (var e = t + "=", a = document.cookie.split(";"), n = 0; n < a.length; n++) {
      for (var o = a[n]; " " == o.charAt(0);) o = o.substring(1);
      if (0 == o.indexOf(e)) return o.substring(e.length, o.length)
    }
    return ""
  }, t.log = function (t) {
    -1 == window.location.hostname.indexOf("localhost") && -1 == window.location.hash.indexOf("log=1") || console.log(t)
  }, t.loadScript = function (t, e) {
    var a = document.createElement("script");
    a.charset = "utf-8", a.onload = e, a.attachEvent && a.attachEvent("onreadystatechange", function (t) {
      "loaded" != t.srcElement.readyState && "complete" != t.srcElement.readyState || e()
    }), document.head.appendChild(a), a.src = t, a.type = "text/javascript"
  }, t.isMobile = function () {
    if (null != e) return e;
    var t = navigator.userAgent.toLowerCase();
    return e = -1 < t.indexOf("iphone") || -1 < t.indexOf("ipod") || -1 < t.indexOf("ipad") || -1 < t.indexOf("android") || -1 < t.indexOf("windows phone os") || -1 < t.indexOf("blackberry") || -1 < t.indexOf("windows ce") || -1 < t.indexOf("series60") || -1 < t.indexOf("symbian") || -1 < t.indexOf("palm") || -1 < t.indexOf("IEMobile") || -1 < t.indexOf("Opera Mini")
  }, t.isAndroid = function () {
    return -1 < navigator.userAgent.toLowerCase().indexOf("android")
  }, t.isiOS = function () {
    var t = navigator.userAgent.toLowerCase();
    return -1 < t.indexOf("iphone") || -1 < t.indexOf("ipod") || -1 < t.indexOf("ipad")
  }, t.formatArea = function (t) {
    var e;
    return e = 1e6 < t ? (t /= 1e6, "kmÂ˛") : "mÂ˛", t < 100 ? t.toFixed(1) + " " + e : Math.round(t) + " " + e
  }, t.singleClickHandler = function () {
    var e, a = {}, n = 0, o = !1, r = function () {
    };
    return a.onSingleClick = function (t) {
      return arguments.length ? (r = t, a) : r
    }, a.clickReceiver = function (t) {
      return 1 == ++n ? (o = !0, e = setTimeout(function () {
        1 == o && (r(t), n = 0)
      }, 250)) : (clearTimeout(e), n = 0, o = !1), a
    }, a.dblClickReceiver = function (t) {
      o = !1
    }, a
  }, t
}

function geolocation (t) {
  var e, a, n = {}, o = function () {
    }, r = function () {
    }, i = function () {
    }, s = function () {
    }, l = document.getElementById(t), c = document.getElementById(t + "_cancel"), u = document.getElementById(t + "Btn"),
    p = document.getElementById(t + "Setting"), d = geoutils(), m = !0;

  function v (t) {
    if (!isNaN(t.coords.latitude) && !isNaN(t.coords.longitude)) return a = t, "visible" != u.style.visibility && (u.style.visibility = "visible"), "white" != u.style.color && (u.style.color = "white"), u.onclick = function (t) {
      return i(a, null), !1
    }, o(t), m = !1, n
  }

  function h (t) {
    return d.log(t), "visible" != u.style.visibility && (u.style.visibility = "visible"), "grey" != u.style.color && (u.style.color = "grey"), u.onclick = function (t) {
      k() ? y() : w(t)
    }, m && -1 == window.location.href.indexOf("#") && 1 == d.isMobile() && w(), r(t.code, function (t) {
      var e;
      switch (t.code) {
        case t.PERMISSION_DENIED:
          e = "User denied the request for Geolocation.";
          break;
        case t.POSITION_UNAVAILABLE:
          e = "Location information is unavailable.";
          break;
        case t.TIMEOUT:
          e = "The request to get user location timed out.";
          break;
        case t.UNKNOWN_ERROR:
        case t.UNKNOWN_ERROR:
          e = "An unknown error occurred."
      }
      return e
    }(t)), m = !1, n
  }

  function y (t) {
    l.style.display = "none"
  }

  function w (t) {
    d.isMobile() ? p.innerHTML = d.isiOS() ? "Zkontrolujte prosĂ­m, Ĺľe mĂˇte pro web  <u>zapnutĂ˝</u> pĹ™istup k poloze:<p><b> nastavenĂ­ > soukromĂ­ > polohovĂ© sluĹľby <p> + zvolit (tamtĂ©Ĺľ nĂ­Ĺľe) StrĂˇnky v Safari: PĹ™i pouĹľĂ­vĂˇni aplikace</p>" : "Zkontrolujte prosĂ­m, Ĺľe mĂˇte pro web  <u>zapnutĂ˝</u> pĹ™istup k poloze:<p><b> nastavenĂ­ > pĹ™ipojenĂ­ > umĂ­stÄ›nĂ­, resp. pĹ™Ă­stup k mĂ© poloze, apod...</b></p>" : p.innerHTML = "Zkontrolujte prosĂ­m, Ĺľe mĂˇte pro web  <u>zapnutĂ˝</u> pĹ™istup k poloze:<p><b> nastavenĂ­ prohlĂ­ĹľeÄŤe > polohovĂ© sluĹľby, apod...</b></p>", s(), l.style.display = "block", t && t.stopPropagation()
  }

  function k () {
    return "none" != l.style.display
  }

  return c.addEventListener("click", function (t) {
    y(), t.preventDefault()
  }), n.onSuccess = function (t) {
    return arguments.length ? (o = t, n) : o
  }, n.onFailure = function (t) {
    return arguments.length ? (r = t, n) : r
  }, n.onGoTo = function (t) {
    return arguments.length ? (i = t, n) : i
  }, n.onShow = function (t) {
    return arguments.length ? (s = t, n) : s
  }, n.watchId = e, n.show = w, n.hide = y, n.isVisible = k, navigator.geolocation && (e = navigator.geolocation.watchPosition(v, h, {enableHighAccuracy: !0})), n
}

function geosearch (a) {
  var e, o, r = {}, n = document.getElementById(a), i = document.getElementById(a + "_input"),
    s = document.getElementById(a + "_cancel"), t = document.getElementById(a + "_submit"), l = "showSearchUI",
    c = geoutils(), u = function () {
    }, p = function () {
    }, d = function () {
    }, m = function () {
    }, v = function () {
    }, h = function () {
    }, y = function (t) {
      t.lon = 16, t.lat = 49.6, t.zoom = 10, t.enableCategories = 0, t.lang = "cs"
    };

  function w () {
    i.style.background = "", i.value = "", i.focus(), s.innerHTML = "<i class='icon icon-left-open-micro'></i>", d.call(r), e && e.isActive() && e.close()
  }

  function k (n) {
    return new SMap.Geocoder(n, function (t) {
      if (!t.getResults()[0].results.length) return c.log(n + "  nenalezena. (MAPY API) "), i.style.background = i.style.background + " url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAADAQMAAACOOjyFAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA5gAAdS4AAOpfAAA6lwAAF29p5MQrAAAABlBMVEX/AAD///9BHTQRAAAAAnRSTlP/AOW3MEoAAAAOSURBVAgdYyhgWMBwAQAE5gHhhS1wdAAAAABJRU5ErkJggg==')   bottom repeat-x", void(o ? o.call(r, null) : d.call(r));
      var e = t.getResults()[0].results, a = [e[0].coords.y, e[0].coords.x];
      i.style.background = "", p.call(r, a)
    }), !1
  }

  function g () {
    n.style.display = "none", c.setCookie(l, "no", 365), v()
  }

  function f (t) {
    e || (e = new SMap.Suggest(i, {
      provider: new SMap.SuggestProvider({
        updateParams: function (t) {
          y.call(r, t)
        }
      })
    }).addListener("enter", function () {
      k(this.getPhrase())
    }).addListener("suggest", function (t) {
      k(t.phrase), s.innerHTML = "" == i.value ? "<i class='icon icon-left-open-micro'></i>" : "<i class='icon icon-cancel'></i>"
    }).addListener("open", function () {
      var t = document.getElementsByClassName("smap-suggest")[0];
      i.style.background = "", t.style.zIndex = "850", t.style.position = "absolute", t.style.left = "50px", t.style.width = "267px", u.call(r, t)
    })), c.setCookie(l, "yes", 365), m(), n.style.display = "inline-block", i.focus(), t && t.stopPropagation()
  }

  function z () {
    return "none" != n.style.display
  }

  return n.onsubmit = function () {
    return event.preventDefault(), !1
  }, n.addEventListener("touchmove", function (t) {
    e && !e.isActive() && t.preventDefault()
  }, !1), s.addEventListener("click", function (t) {
    "" == i.value ? g() : w(), t.preventDefault()
  }), i.addEventListener("keydown", function (t) {
    27 == t.keyCode ? ("" == i.value ? g() : w(), t.preventDefault()) : s.innerHTML = "" == i.value ? "<i class='icon icon-left-open-micro'></i>" : "<i class='icon icon-cancel'></i>"
  }), t.addEventListener("click", function (t) {
    "" != i.value && k(i.value), g(), t.preventDefault()
  }), r.onGeocode = function (t) {
    return arguments.length ? (p = t, r) : p
  }, r.onFailure = function (t) {
    return arguments.length ? (o = t, r) : o
  }, r.onStyling = function (t) {
    return arguments.length ? (u = t, r) : u
  }, r.onClear = function (t) {
    return arguments.length ? (d = t, r) : d
  }, r.onConfig = function (t) {
    return arguments.length ? (y = t, r) : y
  }, r.onHide = function (t) {
    return arguments.length ? (v = t, r) : v
  }, r.onShow = function (t) {
    return arguments.length ? (m = t, r) : m
  }, r.onLoaded = function (t) {
    return arguments.length ? (h = t, r) : h
  }, r.isVisible = z, r.hide = g, r.show = f, r.input = i, function (t) {
    if ("undefined" != typeof SMap) {
      var e = document.getElementById(a + "Btn");
      e.style.visibility = "visible", e.addEventListener("click", function (t) {
        return 0 == z() && f(t), !1
      }), 0 == c.isMobile() && (c.getCookie(l) || c.setCookie(l, "yes", 365), "yes" == c.getCookie(l) && f())
    }
  }(), r
}

function geolayersUI (o, t) {
  var e = {}, a = document.getElementById(t), n = document.getElementById(t + "_cancel"),
    r = document.getElementById(t + "Btn"), i = "showLayersUI", s = geoutils(), l = function () {
    }, c = function () {
    };
  L.TileLayer.Carto = L.TileLayer.extend({
    initialize: function (e, t, a, n) {
      var o = {
        version: "1.3.1",
        layers: [{type: "cartodb", options: {cartocss_version: "2.1.1", sql: t, cartocss: a}}]
      }, r = this;
      n = L.Util.setOptions(this, n);
      var i = new XMLHttpRequest;
      i.open("POST", "https://" + e + ".cartodb.com/api/v1/map", !0), i.setRequestHeader("Content-Type", "application/json"), i.onload = function () {
        if (200 <= i.status && i.status < 400) {
          var t = JSON.parse(i.responseText);
          r.setUrl("https://" + t.cdn_url.https + "/" + e + "/api/v1/map/" + t.layergroupid + "/{z}/{x}/{y}.png"), s.log("carto request successful")
        } else s.log("request error")
      }, i.onerror = function () {
        s.log("request connection error")
      }, i.send(JSON.stringify(o)), r.setUrl("https://ikatastr.cz/img/void.png")
    }
  });
  var u = document.getElementById("zakladni");
  u.layer = new L.tileLayer("https://mapserver.mapy.cz/base-m/{z}-{x}-{y}", {
    attribution: "Â© Mapy.cz",
    maxZoom: 21,
    maxNativeZoom: 18
  });
  var p = document.getElementById("letecka");
  p.layer = new L.tileLayer("https://mapserver.mapy.cz/ophoto-m/{z}-{x}-{y}", {
    attribution: "Â© Mapy.cz",
    maxZoom: 21,
    maxNativeZoom: 20
  });
  var d = document.getElementById("geograficka");
  d.layer = new L.tileLayer("http://geoportal.cuzk.cz/WMTS_ZM_900913/WMTService.aspx?service=WMTS&request=GetTile&version=1.0.0&layer=zm&style=default&format=image/jpeg&TileMatrixSet=googlemapscompatibleext2:epsg:3857&TileMatrix={z}&TileRow={y}&TileCol={x}", {
    attribution: "Â© ÄŚĂšZK",
    maxZoom: 21,
    maxNativeZoom: 19
  });
  var m = document.getElementById("osm");
  m.layer = new L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "Â© OSM",
    maxZoom: 21,
    maxNativeZoom: 18
  });
  var v = document.getElementById("parcelybudovy");
  v.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "prehledky,KN",
    version: "1.3.0",
    transparent: "true",
    minZoom: 8,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  });
  var h = document.getElementById("lombody");
  h.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "podrobne_body_barevne",
    version: "1.3.0",
    transparent: "true",
    minZoom: 20,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  });
  var y = document.getElementById("cislaparcel");
  y.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "DEF_PARCELY",
    version: "1.3.0",
    transparent: "true",
    minZoom: 19,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  });
  var w = document.getElementById("cislabudov");
  w.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "DEF_BUDOVY",
    version: "1.3.0",
    transparent: "true",
    minZoom: 19,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  });
  var k = document.getElementById("bodpole");
  k.layer = L.tileLayer.wms("https://geoportal.cuzk.cz/WMS_BODPOLE/WMService.aspx", {
    format: "image/png",
    layers: "Stanice_site_CZEPOS,Polohove_bodove_pole,Vyskove_bodove_pole,Tihove_bodove_pole",
    version: "1.3.0",
    transparent: "true",
    maxZoom: 21,
    minZoom: 14,
    attribution: "Â© ÄŚĂšZK"
  });
  var g = document.getElementById("vb_ostatni");
  g.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "vb_plochy_cast_ostatni,vb_plochy_parcela_ostatni",
    version: "1.3.0",
    transparent: "true",
    minZoom: 17,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  }), g.layer.setOpacity(.5);
  var f = document.getElementById("vb_uzivani");
  f.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "vb_plochy_cast_uzivani,vb_plochy_parcela_uzivani",
    version: "1.3.0",
    transparent: "true",
    minZoom: 17,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  }), f.layer.setOpacity(.5);
  var z = document.getElementById("vb_vedeni");
  z.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "vb_plochy_cast_vedeni,vb_plochy_parcela_vedeni",
    version: "1.3.0",
    transparent: "true",
    minZoom: 17,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  }), z.layer.setOpacity(.5);
  var b = document.getElementById("vb_chuze");
  b.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "vb_plochy_cast_chuze,vb_plochy_parcela_chuze",
    version: "1.3.0",
    transparent: "true",
    minZoom: 17,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  }), b.layer.setOpacity(.5);
  var K = document.getElementById("vb_listina");
  K.layer = L.tileLayer.wms("https://services.cuzk.cz/wms/wms.asp", {
    format: "image/png",
    layers: "vb_plochy_cast_listina,vb_plochy_parcela_listina",
    version: "1.3.0",
    transparent: "true",
    minZoom: 17,
    maxZoom: 21,
    attribution: "Â© ÄŚĂšZK"
  }), K.layer.setOpacity(.5);
  var _ = document.getElementById("zaplavy5");
  _.layer = new L.TileLayer.Carto("e32alive", "select * from floods5merc", "#floods5merc{ polygon-fill: #00BEF3;  polygon-opacity: 0.5; line-color: #FFF;  line-width: 0.5;    line-opacity: 1; }", {
    minZoom: 10,
    maxZoom: 21,
    attribution: "Â© DIBAVOD"
  });
  var M = document.getElementById("zaplavy20");
  M.layer = new L.TileLayer.Carto("e32alive", "select * from floods20merc", "#floods20merc{ polygon-fill: #2167AB;  polygon-opacity: 0.5; line-color: #FFF;  line-width: 0.5;    line-opacity: 1; }", {
    minZoom: 10,
    maxZoom: 21,
    attribution: "Â© DIBAVOD"
  });
  var x = document.getElementById("zaplavy100");
  x.layer = new L.TileLayer.Carto("e32alive", "select * from floods100merc", "#floods100merc{ polygon-fill: #AB212F;  polygon-opacity: 0.5; line-color: #FFF;  line-width: 0.5;    line-opacity: 1; }", {
    minZoom: 10,
    maxZoom: 21,
    attribution: "Â© DIBAVOD"
  });
  var P = [u, p, d, m], T = [x, M, _, K, b, z, f, g, h, v, y, w, k];

  function O () {
    if (S(P)) for (var t = 0; t < T.length; t++) o.removeLayer(T[t].layer);
    S(T)
  }

  function S (t) {
    for (var e = !1, a = 0; a < t.length; a++) o.removeLayer(t[a].layer);
    for (a = 0; a < t.length; a++) {
      var n = t[a];
      n.checked && (o.addLayer(n.layer), e = !0)
    }
    return e
  }

  function B () {
    for (var t = [], e = 0; e < P.length; e++) P[e].checked && t.push(P[e].id);
    return t
  }

  function E () {
    for (var t = [], e = 0; e < T.length; e++) T[e].checked && t.push(T[e].id);
    return t
  }

  var A = document.getElementById("layers"), j = document.getElementById("layers_select"),
    I = document.getElementsByClassName("layers_section");

  function C (t) {
    v.layer.wmsParams.layers = t ? "prehledky,KN_I" : "prehledky,KN", v.layer.redraw()
  }

  function N (t) {
    for (var e = 0; e < T.length; e++) {
      var a = T[e];
      t < a.layer.options.minZoom || t > a.layer.options.maxZoom ? a.parentNode.style.color = "#c1c1c1" : a.parentNode.style.color = "black"
    }
  }

  function H () {
    a.style.display = "none", r.style.color = "", s.setCookie(i, "no", 365)
  }

  function R (t) {
    l(), a.style.display = "block", r.style.color = "rgb(115, 162, 203)", s.setCookie(i, "yes", 365), t && t.stopPropagation()
  }

  function Z () {
    return "none" != a.style.display
  }

  return A.addEventListener("change", function (t) {
    if (t.target == j) return [].forEach.call(I, function (t) {
      t.style.display = "none"
    }), void(I[j.selectedIndex].style.display = "block");
    O(), t.preventDefault();
    var e = B(), a = E();
    c(e, a)
  }), A.addEventListener("touchmove", function (t) {
    t.preventDefault()
  }, !1), p.layer.on("add", function () {
    C(!0)
  }), d.layer.on("add", function () {
    C(!1)
  }), u.layer.on("add", function () {
    C(!1)
  }), m.layer.on("add", function () {
    C(!1)
  }), o.on("zoomend", function () {
    N(o.getZoom())
  }), r.addEventListener("click", function (t) {
    Z() ? H() : R(t)
  }), n.addEventListener("click", function (t) {
    H(), t.preventDefault()
  }), O(), N(o.getZoom()), e.onChange = function (t) {
    return arguments.length ? (c = t, e) : c
  }, e.onShow = function (t) {
    return arguments.length ? (l = t, e) : l
  }, e.setLayers = function (t, e) {
    t = t || ["zakladni"], null == e && (e = ["parcelybudovy"]);
    var a = B(), n = E();
    if (JSON.stringify(t) != JSON.stringify(a) || JSON.stringify(e) != JSON.stringify(n)) {
      for (var o = 0; o < t.length; o++) for (var r = 0; r < P.length; r++) P[r].id == t[o] && (P[r].checked = !0);
      for (r = 0; r < T.length; r++) T[r].checked = !1;
      for (o = 0; o < e.length; o++) for (r = 0; r < T.length; r++) T[r].id == e[o] && (T[r].checked = !0);
      O()
    }
  }, e.show = R, e.hide = H, e.isVisible = Z, 0 == s.isMobile() && (s.getCookie(i) || s.setCookie(i, "no", 365), "yes" == s.getCookie(i) && R()), e
}

function geoquery () {
  var n = {}, o = {}, m = geoutils(), a = function () {
  }, r = function () {
  }, i = function () {
  }, s = function () {
  }, l = function () {
  }, u = function () {
  };

  function p (e) {
    m.log("query GetFeatureInfo Parcel"), k("GET", "https://services.cuzk.cz/wms/wms.asp?SERVICE=WMS&VERSION=1.3.0&REQUEST=GetFeatureInfo&QUERY_LAYERS=polygony_parcel,DEF_PARCELY&LAYERS=polygony_parcel,DEF_PARCELY&INFO_FORMAT=text/html&CRS=EPSG:3857&" + e.gfi, "document", function () {
      var t = function (t) {
        var e, a, n = t.documentElement.innerHTML, o = "ParcelnĂ­ ÄŤĂ­slo</td>", r = n.indexOf(o);
        if (-1 != r) {
          var i = n.substr(r + o.length);
          e = i.substring(i.indexOf("<td>") + 4, i.indexOf("</td>"))
        }
        if (o = "VĂ˝mÄ›ra [m<sup>2</sup>]</td>", -1 != (r = n.indexOf(o))) {
          var i = n.substr(r + o.length);
          a = i.substring(i.indexOf("<td>") + 4, i.indexOf("</td>"))
        }
        var s, l, c = t.getElementsByTagName("a");
        if (!c || !c[0]) return null;
        var u = c[0].innerHTML.indexOf("["), p = c[0].innerHTML.indexOf("]");
        -1 != u && -1 != p && (s = c[0].innerHTML.substring(0, u - 1), l = c[0].innerHTML.substring(u + 1, p));
        var d = g(c[1], "href", "/");
        return m.log("parcelid = " + d + " parcel name : " + e + " vymera : " + a), {
          cpId: d,
          cpTag: e,
          cpArea: a,
          kuId: l,
          kuTag: s
        }
      }(this.responseXML);
      a(t, e)
    }, function () {
      a(null, e)
    })
  }

  function d (e) {
    m.log("query GetFeatureInfo Building"), k("GET", "https://services.cuzk.cz/wms/wms.asp&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetFeatureInfo&QUERY_LAYERS=polygony_budov,DEF_BUDOVY&LAYERS=polygony_budov,DEF_BUDOVY&INFO_FORMAT=text/html&CRS=EPSG:3857&" + e.gfi, "document", function () {
      var t = function (t) {
        var e, a = t.documentElement.innerHTML, n = "<td>Stavba</td>", o = a.indexOf(n);
        if (-1 != o) {
          var r = a.substr(o + n.length);
          e = r.substring(r.indexOf("<td>"), r.indexOf("</td>"))
        }
        var i = t.getElementsByTagName("a");
        if (!i || !i[0]) return null;
        var s, l, c = g(i[0], "href", "/"), u = i[0].innerHTML.indexOf(",");
        -1 != u && i[0].innerHTML.substr(0, u);
        var p = i[0].innerHTML.indexOf("k.Ăş."), d = i[0].innerHTML.indexOf("["), m = i[0].innerHTML.indexOf("]");
        -1 != p && -1 != d && -1 != m && (s = i[0].innerHTML.substring(p + 4, d), l = i[0].innerHTML.substring(d + 1, m));
        var v = g(i[1], "href", "/"), h = i[1].innerHTML, y = g(i[2], "href", "/");
        return {buTag: e, buVdpId: y, cpId: c, kuId: l, kuTag: s, adCastObceId: v, adCastObceTag: h, adObecTag: h}
      }(this.responseXML);
      t && (r(t, e), 1 == m.isMobile() && w(e))
    })
  }

  function v (e) {
    m.log("query GetFeatureInfo Zoning"), k("GET", "https://services.cuzk.cz/wms/wms.asp&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetFeatureInfo&QUERY_LAYERS=polygony_k_u,DEF_BUDOVY&LAYERS=polygony_k_u,DEF_BUDOVY&INFO_FORMAT=text/html&CRS=EPSG:3857&" + e.gfi, "document", function () {
      var t = function (t) {
        var e, a, n = t.documentElement.innerHTML, o = "<td>NĂˇzev k.Ăş.</td>", r = n.indexOf(o);
        {
          if (-1 == r) return null;
          var i = n.substr(r + o.length);
          e = i.substring(i.indexOf("<td>") + 4, i.indexOf("</td>"))
        }
        if (o = "<td>KĂłd k.Ăş.</td>", -1 != (r = n.indexOf(o))) {
          var i = n.substr(r + o.length);
          a = i.substring(i.indexOf("<td>") + 4, i.indexOf("</td>"))
        }
        var s = t.getElementsByTagName("a"), l = s[1] ? s[1].innerHTML : "", c = g(s[1], "href", "/");
        return {kuId: a, kuTag: e, adObecId: c, adObecTag: l}
      }(this.responseXML);
      t && (!function (e, a) {
        if (null != o[e]) return s(o[e].ku_office, a);
        m.log("query zoning for id  " + e), k("GET", "https://e32alive.carto.com/api/v2/sql?q=SELECT ku_office FROM ku where ku_id=" + e + " LIMIT 1", "json", function () {
          if (this.response && !this.response.error) {
            var t = void 0 !== this.response.total_rows ? this.response : JSON.parse(this.response);
            void 0 !== t.rows[0] && (o[e] = t.rows[0], s(o[e].ku_office, a))
          }
        })
      }(t.kuId, e), i({kuId: t.kuId, kuTag: t.kuTag}, e), l({adObecId: t.adObecId, adObecTag: t.adObecTag}, e))
    })
  }

  function h (e) {
    m.log("query parcel on coord " + e.lat + "," + e.lng), k("GET", "https://services.cuzk.cz/wfs/inspire-cp-wfs.asp?service=WFS&version=2.0.0&request=GetFeature&StoredQuery_id=GetFeatureByPoint&srsName=urn:ogc:def:crs:EPSG::4326&POINT=" + e.lat + "," + e.lng + "&FEATURE_TYPE=CadastralParcel", "document", function () {
      var t = function (t, e) {
        var a = t.getElementsByTagName("base:localId")[0];
        if (!a) return null;
        var n = z(t.getElementsByTagName("gml:posList"));
        if (!b(n, e.lat, e.lng)) return null;
        var o = f(t, "cp:zoning", "xlink:href", "CZ."), r = f(t, "cp:administrativeUnit", "xlink:href", "AU.");
        return {
          cpId: a.childNodes[0].nodeValue.substr(3),
          cpTag: t.getElementsByTagName("cp:label")[0].childNodes[0].nodeValue,
          cpArea: t.getElementsByTagName("cp:areaValue")[0].childNodes[0].nodeValue,
          cpPoint: t.getElementsByTagName("gml:pos")[0].childNodes[0].nodeValue.split(" "),
          cpNcr: t.getElementsByTagName("cp:nationalCadastralReference")[0].childNodes[0].nodeValue,
          kuId: o,
          adObecId: r,
          cpPolygon: n
        }
      }(this.responseXML, e);
      t ? a(t, e) : p(e)
    }, function (t) {
      p(e)
    })
  }

  function y (e) {
    m.log("query building on coord " + e.lat + "," + e.lng), k("GET", "https://services.cuzk.cz/wfs/inspire-bu-wfs.asp?service=WFS&version=2.0.0&request=GetFeature&StoredQuery_id=GetFeatureByPoint&srsName=urn:ogc:def:crs:EPSG::4326&POINT=" + e.lat + "," + e.lng + "&FEATURE_TYPE=Building", "document", function () {
      var t = function (t, e) {
        var a = t.getElementsByTagName("base:localId")[0];
        if (!a) return null;
        var n = z(t.getElementsByTagName("gml:posList"));
        if (!b(n, e.lat, e.lng)) return null;
        var o = f(t, "bu-ext:cadastralParcel", "xlink:href", "CP.");
        m.log("building parcel id = " + o);
        var r = t.getElementsByTagName("bu-base:name")[0];
        r && (r = (r = r.getElementsByTagName("gn:text")) ? r[0].textContent : null);
        var i = t.getElementsByTagName("ad:adminUnit")[0],
          s = i ? i.getElementsByTagName("gn:text")[0].textContent : null,
          l = t.getElementsByTagName("ad:addressArea")[0],
          c = l.firstChild ? l.getElementsByTagName("gn:text")[0].textContent : null;
        return {
          buId: a.childNodes[0].nodeValue,
          buTag: r,
          buVdpId: t.getElementsByTagName("bu-base:reference")[0].textContent,
          adObecTag: s,
          adCastObceTag: c,
          cpId: o,
          buPolygon: n
        }
      }(this.responseXML, e);
      t ? (r(t, e), 1 == m.isMobile() && w(e)) : d(e)
    })
  }

  function w (n) {
    m.log("query address on coord " + n.lat + "," + n.lng), k("GET", "https://services.cuzk.cz/wfs/inspire-ad-wfs.asp?service=WFS&version=2.0.0&request=GetFeature&StoredQuery_id=GetFeatureByPoint&srsName=urn:ogc:def:crs:EPSG::4326&POINT=" + n.lat + "," + n.lng + "&FEATURE_TYPE=Address", "document", function () {
      var t, e, a = (t = this.responseXML, (e = t.getElementsByTagName("base:localId")[0]) ? {
        adId: e.childNodes[0].nodeValue,
        adTag: t.getElementsByTagName("ad:alternativeIdentifier")[0].childNodes[0].nodeValue,
        adPoint: t.getElementsByTagName("gml:pos")[0].childNodes[0].nodeValue.split(" "),
        cpId: f(t, "ad:parcel", "xlink:href", "CP."),
        buId: f(t, "ad:building", "xlink:href", "BU.")
      } : null);
      a && u(a, n)
    })
  }

  function k (t, e, a, n, o) {
    m.log(e);
    var r = new XMLHttpRequest;
    r.onload = n, r.onerror = o || function (t) {
      m.log(" query " + e + " failed")
    }, r.open(t, e), r.responseType = a, r.send()
  }

  function g (t, e, a) {
    if (!t) return null;
    var n = t.getAttribute(e);
    return n ? n.substring(n.lastIndexOf(a) + a.length) : null
  }

  function f (t, e, a, n) {
    return g(t.getElementsByTagName(e)[0], a, n)
  }

  function z (t) {
    var e = [];
    for (c = 0; c < t.length; c++) {
      var a = t[c].textContent;
      if (a) {
        var n = a.split(" "), o = [];
        if (0 == c) for (var r = 0; r <= n.length / 2 - 1; r++) o.push([n[2 * r + 0], n[2 * r + 1]]); else for (r = n.length / 2 - 1; 0 <= r; r--) o.push([n[2 * r + 0], n[2 * r + 1]])
      }
      e.push(o)
    }
    return e
  }

  function b (t, e, a) {
    if (!t || 0 == t.length) return !1;
    if (!K(t[0], e, a)) return null;
    if (1 < t.length) for (var n = 1; n < t.length; n++) if (K(t[n], e, a)) return !1;
    return !0
  }

  function K (t, e, a) {
    for (var n = 0, o = t[t.length - 1][0], r = t[t.length - 1][1], i = 0; i < t.length; i++) {
      var s = t[i][0], l = t[i][1];
      r <= a ? a < l && 0 < (s - o) * (a - r) - (e - o) * (l - r) && n++ : l <= a && (s - o) * (a - r) - (e - o) * (l - r) < 0 && n--, o = s, r = l
    }
    return 0 !== n
  }

  return n.queryParcelBuilding = function (t) {
    t.gfi = "I=" + t.pX.toFixed(0) + "&J=" + t.pY.toFixed(0) + "&BBOX=" + t.bbox + "&WIDTH=" + t.width + "&HEIGHT=" + t.height, v(t), h(t), y(t), 0 == m.isMobile() && w(t);
    var e = n.jtsk.WGS84toJTSK(t.lat, t.lng),
      a = "http://nahlizenidokn.cuzk.cz/MapaIdentifikace.aspx?l=KN&x=-" + Math.round(e.y) + "&y=-" + Math.round(e.x);
    return t.knUrl = a
  }, n.onParcel = function (t) {
    return arguments.length ? (a = t, n) : a
  }, n.onBuilding = function (t) {
    return arguments.length ? (r = t, n) : r
  }, n.onAdminUnit = function (t) {
    return arguments.length ? (l = t, n) : l
  }, n.onAddress = function (t) {
    return arguments.length ? (u = t, n) : u
  }, n.onZoning = function (t) {
    return arguments.length ? (i = t, n) : i
  }, n.onOffice = function (t) {
    return arguments.length ? (s = t, n) : s
  }, n.jtsk = JTSK(), n
}

function geoqueryUI (u, t) {
  var a, p, n, e = function (t) {
      return document.getElementById(t)
    }, d = 0, o = e(t), r = e(t + "_cancel"), i = e(t + "Btn"), s = e("knTable"), l = e("knEmpty"),
    m = e(t + "_vlastnici"), c = e(t + "_title"), v = e(t + "_parcela"), h = e(t + "_parcela_area"),
    y = e(t + "_parcela_label"), w = e(t + "_stavba"), k = e(t + "_stavba_area"), g = e(t + "_ku"),
    f = e(t + "_ku_label"), z = e(t + "_urad"), b = e(t + "_misto_label"), K = e(t + "_misto"), _ = e("queryClick"),
    M = e("queryClickLabel"), x = "directClick", P = [0, 0], T = !1, O = geoutils(), S = function () {
    }, B = function () {
    }, E = function () {
    }, A = function () {
    }, j = function () {
    }, I = function () {
    }, C = function () {
    }, N = {}, H = L.marker([0, 0], {
      icon: L.icon({
        iconUrl: "dist/ikl.images/arrow.png",
        iconSize: [20, 20],
        iconAnchor: [10, 10]
      }), rotationAngle: 0, rotationOrigin: "center center"
    }), R = !1;

  function Z () {
    1 != N.started && (N.started = !0, u.on("moveend", U), u.on("zoomend ", V), 1 == O.isMobile() && u.on("contextmenu", G), i.style.color = "rgb(237, 165, 113)", U(), V(), R && Q(), S())
  }

  function U () {
    var t = a || p, e = !1;
    return t && (t.redraw(), 0 == (e = u.getBounds().overlaps(t.getBounds())) && 1 == X() && O.isMobile() && Y()), e
  }

  function V (t) {
    16.5 <= u.getZoom() ? (T = _.checked, M.style.color = "black", L.DomUtil.addClass(u._container, "pointer-cursor-enabled")) : (T = !1, M.style.color = "grey", L.DomUtil.removeClass(u._container, "pointer-cursor-enabled"))
  }

  i.addEventListener("click", function (t) {
    if (0 != N.started) if (0 == X()) {
      Q();
      var e = a || p;
      e && 0 == u.getBounds().overlaps(e.getBounds()) && (u.fitBounds(e.getBounds()), j())
    } else Y(); else Z()
  }), y.addEventListener("click", function (t) {
    var e = a || p;
    return e && (u.fitBounds(e.getBounds()), j()), t.preventDefault(), !1
  }), h.addEventListener("click", function (t) {
    return a && a._measurementLayer ? a.hideMeasurements() : (n && n._measurementLayer && n.hideMeasurements(), a && a.showMeasurements()), t.preventDefault(), !1
  }), k.addEventListener("click", function (t) {
    return n && n._measurementLayer ? n.hideMeasurements() : (a && a._measurementLayer && a.hideMeasurements(), n && n.showMeasurements()), t.preventDefault(), !1
  });
  var D = geoquery().onParcel(function (t, e) {
    if (d == e.id) {
      if (!t) return o.style.bottom = "-140.px", void(c.style.color = "rgb(237, 165, 113)");
      o.style.bottom = "0.px", c.style.color = "white", t.cpPolygon && (n && u.removeLayer(n), p && u.removeLayer(p), a = L.polygon(t.cpPolygon, {
        color: "red",
        interactive: !1
      }).addTo(u), X() || 1 == e.id ? W(a) : q(a), n && n.addTo(u)), v.innerHTML = "<a href='http://vdp.cuzk.cz/vdp/ruian/parcely/" + t.cpId + "' target='_blank'>" + t.cpTag + "</a>", h.innerHTML = "<a href=''>" + O.formatArea(parseFloat(t.cpArea)) + "</a>", y.innerHTML = "<a href='https://nahlizenidokn.cuzk.cz/ZobrazObjekt.aspx?typ=parcela&id=" + t.cpId + "'  target='_blank'> Parcela</a>"
    }
  }).onBuilding(function (t, e) {
    if (d == e.id) {
      var a = 0;
      t.buPolygon && ((n = L.polygon(t.buPolygon, {
        color: "yellow",
        interactive: !1
      }).addTo(u)).showMeasurements().updateMeasurements(), n.hideMeasurements(), a = n.getTotalArea(), X() || 1 == e.id ? W(n) : q(n)), w.innerHTML = "<a href='http://vdp.cuzk.cz/vdp/ruian/stavebniobjekty/" + t.buVdpId + "' target='_blank'>" + t.buTag + "</a>", k.innerHTML = 0 != a ? "<a href=''>" + a + "</a>" : ""
    }
  }).onZoning(function (t, e) {
    d == e.id && (g.innerHTML = "k.Ăş.<a href='https://www.cuzk.cz/Dokument.aspx?AKCE=META:SESTAVA:MDR002_XSLT:WEBCUZK_ID:" + t.kuId + "' target='_blank'>" + t.kuTag + "</a>", O.log(" *** zoning : " + t.kuId + "  Nzev k.u.: " + t.kuTag))
  }).onOffice(function (t, e) {
    d == e.id && (z.innerHTML = "ĂşĹ™ad  <a href='https://www.cuzk.cz/Urady/Katastralni-urady/Katastralni-urady/" + katastralni_urady[t] + "' target='_blank'>" + t + "</a>", O.log(" *** urad : " + t))
  }).onAdminUnit(function (t, e) {
    if (d == e.id && (t.adObecTag && uzemni_plany[t.adObecTag] && (f.innerHTML = "<a href='" + uzemni_plany[t.adObecTag] + "' target='_blank'>Ăşz plĂˇn</a>"), "" == K.innerHTML)) {
      var a = "Obec: " + t.adObecTag;
      t.adOkresTag && (a += ", okres: " + t.adOkresTag), K.innerHTML = a
    }
  }).onAddress(function (t, e) {
    d == e.id && (O.log(" *** address : " + t.adId + " Adresa: " + t.adTag), K.innerHTML = t.adTag)
  });

  function F () {
    "inline-table" != s.style.display && (s.style.display = "inline-table"), "none" != l.style.display && (l.style.display = "none"), m.innerHTML = "", v.innerHTML = "..............", h.innerHTML = "", y.innerHTML = "Parcela", w.innerHTML = "  -  ", k.innerHTML = "", g.innerHTML = "", f.innerHTML = "K.ĂşzemĂ­", z.innerHTML = "", b.innerHTML = "MĂ­sto", K.innerHTML = "", a && (a._measurementLayer && a.hideMeasurements(), u.removeLayer(a), a = null), n && (n._measurementLayer && n.hideMeasurements(), u.removeLayer(n), n = null), p && (u.removeLayer(p), p = null), u.removeLayer(H)
  }

  function J (t, e) {
    if (P[0] == t && P[1] == e) return null;
    F();
    var a = u.getSize(), n = u.latLngToContainerPoint({lat: t, lng: e}, u.getZoom()),
      o = new L.Bounds(u.options.crs.project(u.getBounds()._southWest), u.options.crs.project(u.getBounds()._northEast)),
      r = o.min, i = o.max, s = [r.x, r.y, i.x, i.y].join(","),
      l = {id: ++d, lat: t, lng: e, pX: n.x, pY: n.y, width: a.x, height: a.y, bbox: s}, c = D.queryParcelBuilding(l);
    return m.innerHTML = "<a href='" + c + "' target='_blank'>NahlĂ­ĹľenĂ­/vlastnĂ­ci</a>", P = [t, e], p = L.circle([t, e], {
      radius: 1,
      color: "red",
      fillColor: "red",
      stroke: !0
    }).addTo(u), X() || 1 == l.id ? W(p) : q(p), 1 == d && (1 == U() ? Q() : Y()), function (n) {
      if ("undefined" == typeof SMap) return;
      SMap.Pano.getBest(SMap.Coords.fromWGS84(n.lng, n.lat), 50).then(function (t) {
        var e = "https://en.mapy.cz/zakladni?x=" + n.lng + "&y=" + n.lat + "&z=19&pano=1&base=ophoto&pid=" + t._data.pid + "&yaw=" + t._lookDir * Math.PI / 180,
          a = 1 == O.isMobile() ? "target='_blank'" : "target='panorama'";
        b.innerHTML = "<a href='" + e + "' " + a + "> MĂ­sto â©ą </a>", O.log(t), 0 == O.isMobile() && (H.setLatLng([t._data.mark.lat, t._data.mark.lon]), H.setRotationAngle(t._lookDir), H.addTo(u), H.off("click"), H.on("click", function (t) {
          window.open(e, 1 == O.isMobile() ? "_blank" : "panorama"), L.DomEvent.stopPropagation(t)
        }))
      })
    }(l), l
  }

  function G (t) {
    0 != N.started && (P[0], P[1] = 0, J(t.latlng.lat, t.latlng.lng) && (Q(), I(t.latlng.lat, t.latlng.lng)))
  }

  function q (t) {
    t && t.setStyle({fillOpacity: 0})
  }

  function W (t) {
    t && t.setStyle({fillOpacity: .2})
  }

  function Y () {
    o.style.display = "none", U(), q(a), q(n), q(p), A()
  }

  function Q () {
    E.call(this), o.style.display = "block", W(a), W(n), W(p)
  }

  function X () {
    return "none" != o.style.display
  }

  r.addEventListener("click", function (t) {
    Y(), t.preventDefault()
  });
  var $ = O.getCookie(x);
  return $ ? _.checked = "yes" == $ : (_.checked = !O.isMobile(), O.setCookie(x, _.checked ? "yes" : "no", 365)), _.addEventListener("change", function (t) {
    T = _.checked, O.setCookie(x, _.checked ? "yes" : "no", 365), V()
  }), N.onStart = function (t) {
    return arguments.length ? (S = t, N) : S
  }, N.onStop = function (t) {
    return arguments.length ? (B = t, N) : B
  }, N.onShow = function (t) {
    return arguments.length ? (E = t, N) : E
  }, N.onHide = function (t) {
    return arguments.length ? (A = t, N) : A
  }, N.onFit = function (t) {
    return arguments.length ? (j = t, N) : j
  }, N.onQuery = function (t) {
    return arguments.length ? (I = t, N) : I
  }, N.onCleanup = function (t) {
    return arguments.length ? (C = t, N) : C
  }, N.start = Z, N.stop = function () {
    0 != N.started && (N.started = !1, u.off("moveend", U), u.off("zoomend ", V), 1 == O.isMobile() && u.off("contextmenu", G), i.style.color = "", R = X(), Y(), B())
  }, N.show = Q, N.hide = Y, N.isVisible = X, N.query = D, N.queryOnLatLng = J, N.cleanup = function () {
    1 == X() && Y(), F(), s.style.display = "none", l.style.display = "block", P[0], P[1] = 0
  }, N.onClick = function (t) {
    if (0 != N.started) {
      P[0], P[1] = 0;
      var e = J(t.latlng.lat, t.latlng.lng);
      e && (Q(), T && window.open(e.knUrl, "Katastr", "width=600,height=700,status=yes,scrollbars=yes,resizable=yes"), I(t.latlng.lat, t.latlng.lng))
    }
  }, N.started = !1, N
}

!function () {
  var t = L.Marker.prototype._initIcon, e = L.Marker.prototype._setPos, a = "msTransform" === L.DomUtil.TRANSFORM;
  L.Marker.addInitHook(function () {
    var t = this.options.icon && this.options.icon.options && this.options.icon.options.iconAnchor;
    t && (t = t[0] + "px " + t[1] + "px"), this.options.rotationOrigin = this.options.rotationOrigin || t || "center bottom", this.options.rotationAngle = this.options.rotationAngle || 0, this.on("drag", function (t) {
      t.target._applyRotation()
    })
  }), L.Marker.include({
    _initIcon: function () {
      t.call(this)
    }, _setPos: function (t) {
      e.call(this, t), this._applyRotation()
    }, _applyRotation: function () {
      this.options.rotationAngle && (this._icon.style[L.DomUtil.TRANSFORM + "Origin"] = this.options.rotationOrigin, a ? this._icon.style[L.DomUtil.TRANSFORM] = "rotate(" + this.options.rotationAngle + "deg)" : this._icon.style[L.DomUtil.TRANSFORM] += " rotateZ(" + this.options.rotationAngle + "deg)")
    }, setRotationAngle: function (t) {
      return this.options.rotationAngle = t, this.update(), this
    }, setRotationOrigin: function (t) {
      return this.options.rotationOrigin = t, this.update(), this
    }
  })
}(), function () {
  "use strict";
  L.Marker.Measurement = L[L.Layer ? "Layer" : "Class"].extend({
    options: {pane: "markerPane"},
    initialize: function (t, e, a, n, o) {
      L.setOptions(this, o), this._latlng = t, this._measurement = e, this._title = a, this._rotation = n
    },
    addTo: function (t) {
      return t.addLayer(this), this
    },
    onAdd: function (t) {
      this._map = t;
      var e = this.getPane ? this.getPane() : t.getPanes().markerPane,
        a = this._element = L.DomUtil.create("div", "leaflet-zoom-animated leaflet-measure-path-measurement", e),
        n = L.DomUtil.create("div", "", a);
      n.title = this._title, n.innerHTML = this._measurement, t.on("zoomanim", this._animateZoom, this), this._setPosition()
    },
    onRemove: function (t) {
      t.off("zoomanim", this._animateZoom, this), (this.getPane ? this.getPane() : t.getPanes().markerPane).removeChild(this._element), this._map = null
    },
    _setPosition: function () {
      L.DomUtil.setPosition(this._element, this._map.latLngToLayerPoint(this._latlng)), this._element.style.transform += " rotate(" + this._rotation + "rad)"
    },
    _animateZoom: function (t) {
      var e = this._map._latLngToNewLayerPoint(this._latlng, t.zoom, t.center).round();
      L.DomUtil.setPosition(this._element, e), this._element.style.transform += " rotate(" + this._rotation + "rad)"
    }
  }), L.marker.measurement = function (t, e, a, n, o) {
    return new L.Marker.Measurement(t, e, a, n, o)
  };
  var t = function (t) {
    var e;
    return e = this._measurementOptions.imperial ? 404.685642 < t ? (t /= 4046.85642, "ac") : (t /= .09290304, "ftÂ˛") : 1e6 < t ? (t /= 1e6, "kmÂ˛") : "mÂ˛", t < 1e3 ? t.toFixed(1) + " " + e : Math.round(t) + " " + e
  }, u = 6378137, y = function (t) {
    var e, a, n, o, r, i = function (t) {
      return t * Math.PI / 180
    }, s = 0, l = t.length;
    if (2 < l) {
      for (var c = 0; c < l; c++) r = c === l - 2 ? (n = l - 2, o = l - 1, 0) : c === l - 1 ? (n = l - 1, o = 0, 1) : (o = (n = c) + 1, c + 2), e = t[n], a = t[o], s += (i(t[r].lng) - i(e.lng)) * Math.sin(i(a.lat));
      s = s * u * u / 2
    }
    return Math.abs(s)
  }, e = function (t, e, a) {
    return a ? function () {
      return e.apply(this, arguments), t.apply(this, arguments)
    } : function () {
      return t.apply(this, arguments), e.apply(this, arguments)
    }
  };
  L.Polyline.include({
    showMeasurements: function (t) {
      return !this._map || this._measurementLayer || (this._measurementOptions = L.extend({
        showOnHover: !1,
        minPixelDistance: 30,
        showDistances: !0,
        showArea: !0,
        lang: {totalLength: "Total length", totalArea: "Total area", segmentLength: "Segment length"}
      }, t || {}), this._measurementLayer = L.layerGroup().addTo(this._map), this.updateMeasurements(), this._map.on("zoomend", this.updateMeasurements, this)), this
    }, hideMeasurements: function () {
      return this._map.off("zoomend", this.updateMeasurements, this), this._measurementLayer && (this._map.removeLayer(this._measurementLayer), this._measurementLayer = null), this
    }, onAdd: e(L.Polyline.prototype.onAdd, function () {
      this.options.showMeasurements && this.showMeasurements(this.options.measurementOptions)
    }), onRemove: e(L.Polyline.prototype.onRemove, function () {
      this.hideMeasurements()
    }, !0), setLatLngs: e(L.Polyline.prototype.setLatLngs, function () {
      return this.updateMeasurements()
    }), spliceLatLngs: e(L.Polyline.prototype.spliceLatLngs, function () {
      return this.updateMeasurements()
    }), formatDistance: function (t) {
      var e, a;
      return e = this._measurementOptions.imperial ? 3e3 < (a = t / .3048) ? (t /= 1609.344, "mi") : (t = a, "ft") : 1e3 < t ? (t /= 1e3, "km") : "m", t < 1e3 ? t.toFixed(1) + " " + e : Math.round(t) + " " + e
    }, formatArea: t, updateMeasurements: function (t) {
      if (this._measurementLayer) {
        var e, a, n, o, r, i, s = this.getLatLngs(), l = this instanceof L.Polygon, c = this._measurementOptions, u = 0,
          p = [];
        s && s.length && L.Util.isArray(s[0]) ? p = s : s && p.push(s), this._measurementLayer.clearLayers();
        for (var d = 0, m = 0; d < p.length;) {
          if (s = p[d], this._measurementOptions.showDistances && 1 < s.length) {
            e = this._measurementOptions.formatDistance || L.bind(this.formatDistance, this);
            for (var v = 1, h = s.length; l && v <= h || v < h; v++) a = s[v - 1], n = s[v % h], u += i = a.distanceTo(n), o = this._map.latLngToLayerPoint(a), r = this._map.latLngToLayerPoint(n), o.distanceTo(r) >= c.minPixelDistance && L.marker.measurement(this._map.layerPointToLatLng([(o.x + r.x) / 2, (o.y + r.y) / 2]), e(i), c.lang.segmentLength, this._getRotation(a, n), c).addTo(this._measurementLayer);
            t && t.prevLength && (u += t.prevLength), this._totalLength = u, l || L.marker.measurement({
              lat: n.lat + 1e-5,
              lng: n.lng
            }, e(u), c.lang.totalLength, 0, c).addTo(this._measurementLayer)
          }
          l && c.showArea && 2 < s.length && (e = c.formatArea || L.bind(this.formatArea, this), 0 < d ? m -= y(s) : m += y(s), this._totalArea = m, L.marker.measurement(this.getBounds().getCenter(), e(m), c.lang.totalArea, 0, c).addTo(this._measurementLayer)), d += 1
        }
        return this
      }
    }, getTotalLength: function () {
      return this._totalLength
    }, getTotalArea: function () {
      return (this._measurementOptions.formatArea || L.bind(this.formatArea, this))(this._totalArea)
    }, _getRotation: function (t, e) {
      var a = this._map.project(t), n = this._map.project(e);
      return Math.atan((n.y - a.y) / (n.x - a.x))
    }
  }), L.Polyline.addInitHook(function () {
    this.options.showMeasurements && this.showMeasurements()
  }), L.Circle.include({
    showMeasurements: function (t) {
      return !this._map || this._measurementLayer || (this._measurementOptions = L.extend({
        showOnHover: !1,
        showArea: !0,
        lang: {totalArea: "Total area"}
      }, t || {}), this._measurementLayer = L.layerGroup().addTo(this._map), this.updateMeasurements(), this._map.on("zoomend", this.updateMeasurements, this)), this
    }, hideMeasurements: function () {
      return this._map.on("zoomend", this.updateMeasurements, this), this._measurementLayer && (this._map.removeLayer(this._measurementLayer), this._measurementLayer = null), this
    }, onAdd: e(L.Circle.prototype.onAdd, function () {
      this.options.showMeasurements && this.showMeasurements(this.options.measurementOptions)
    }), onRemove: e(L.Circle.prototype.onRemove, function () {
      this.hideMeasurements()
    }, !0), setLatLng: e(L.Circle.prototype.setLatLng, function () {
      this.updateMeasurements()
    }), setRadius: e(L.Circle.prototype.setRadius, function () {
      this.updateMeasurements()
    }), formatArea: t, updateMeasurements: function () {
      if (this._measurementLayer) {
        var t, e, a = this.getLatLng(), n = this._measurementOptions, o = n.formatArea || L.bind(this.formatArea, this);
        if (this._measurementLayer.clearLayers(), n.showArea) {
          o = n.formatArea || L.bind(this.formatArea, this);
          var r = (t = this.getRadius(), e = t / u, 2 * Math.PI * u * u * (1 - Math.cos(e)));
          L.marker.measurement(a, o(r), n.lang.totalArea, 0, n).addTo(this._measurementLayer)
        }
      }
    }
  }), L.Circle.addInitHook(function () {
    this.options.showMeasurements && this.showMeasurements()
  })
}();
var katastralni_urady = {
  Praha: "Katastralni-urad-pro-hlavni-mesto-Prahu/Katastralni-pracoviste/KP-Praha.aspx",
  "ÄŚeskĂ© BudÄ›jovice": "Katastralni-urad-pro-Jihocesky-kraj/Katastralni-pracoviste/KP-Ceske-Budejovice.aspx",
  "ÄŚeskĂ˝ Krumlov": "Katastralni-urad-pro-Jihocesky-kraj/Katastralni-pracoviste/KP-Cesky-Krumlov.aspx",
  "JindĹ™ichĹŻv Hradec": "Katastralni-urad-pro-Jihocesky-kraj/Katastralni-pracoviste/KP-Jindrichuv-Hradec.aspx",
  "PĂ­sek": "Katastralni-urad-pro-Jihocesky-kraj/Katastralni-pracoviste/KP-Pisek.aspx",
  Prachatice: "Katastralni-urad-pro-Jihocesky-kraj/Katastralni-pracoviste/KP-Prachatice.aspx",
  Strakonice: "Katastralni-urad-pro-Jihocesky-kraj/Katastralni-pracoviste/KP-Strakonice.aspx",
  "TĂˇbor": "Katastralni-urad-pro-Jihocesky-kraj/Katastralni-pracoviste/KP-Tabor.aspx",
  Blansko: "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Blansko.aspx",
  Boskovice: "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Boskovice.aspx",
  "Brno-mÄ›sto": "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Brno-mesto.aspx",
  "Brno-venkov": "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Brno-venkov.aspx",
  "BĹ™eclav": "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Breclav.aspx",
  "HodonĂ­n": "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Hodonin.aspx",
  "HustopeÄŤe": "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Hustopece.aspx",
  Kyjov: "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Kyjov.aspx",
  "VyĹˇkov": "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Vyskov.aspx",
  Znojmo: "Katastralni-urad-pro-Jihomoravsky-kraj/Katastralni-pracoviste/KP-Znojmo.aspx",
  Cheb: "Katastralni-urad-pro-Karlovarsky-kraj/Katastralni-pracoviste/KP-Cheb.aspx",
  "Karlovy Vary": "Katastralni-urad-pro-Karlovarsky-kraj/Katastralni-pracoviste/KP-Karlovy-Vary.aspx",
  Sokolov: "Katastralni-urad-pro-Karlovarsky-kraj/Katastralni-pracoviste/KP-Sokolov.aspx",
  "Hradec KrĂˇlovĂ©": "Katastralni-urad-pro-Kralovehradecky-kraj/Katastralni-pracoviste/KP-Hradec-Kralove.aspx",
  "JiÄŤĂ­n": "Katastralni-urad-pro-Kralovehradecky-kraj/Katastralni-pracoviste/KP-Jicin.aspx",
  "NĂˇchod": "Katastralni-urad-pro-Kralovehradecky-kraj/Katastralni-pracoviste/KP-Nachod.aspx",
  "Rychnov nad KnÄ›Ĺľnou": "Katastralni-urad-pro-Kralovehradecky-kraj/Katastralni-pracoviste/KP-Rychnov-nad-Kneznou.aspx",
  Trutnov: "Katastralni-urad-pro-Kralovehradecky-kraj/Katastralni-pracoviste/KP-Trutnov.aspx",
  "ÄŚeskĂˇ LĂ­pa": "Katastralni-urad-pro-Liberecky-kraj/Katastralni-pracoviste/KP-Ceska-Lipa.aspx",
  "FrĂ˝dlant": "Katastralni-urad-pro-Liberecky-kraj/Katastralni-pracoviste/KP-Frydlant.aspx",
  "Jablonec nad Nisou": "Katastralni-urad-pro-Liberecky-kraj/Katastralni-pracoviste/KP-Jablonec-nad-Nisou.aspx",
  Liberec: "Katastralni-urad-pro-Liberecky-kraj/Katastralni-pracoviste/KP-Liberec.aspx",
  Semily: "Katastralni-urad-pro-Liberecky-kraj/Katastralni-pracoviste/KP-Semily.aspx",
  "BruntĂˇl": "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Bruntal.aspx",
  "FrĂ˝dek-MĂ­stek": "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Frydek-Mistek.aspx",
  "KarvinĂˇ": "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Karvina.aspx",
  Krnov: "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Krnov.aspx",
  "NovĂ˝ JiÄŤĂ­n": "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Novy-Jicin.aspx",
  Opava: "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Opava.aspx",
  Ostrava: "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Ostrava.aspx",
  "TĹ™inec": "Katastralni-urad-pro-Moravskoslezsky-kraj/Katastralni-pracoviste/KP-Trinec.aspx",
  Hranice: "Katastralni-urad-pro-Olomoucky-kraj/Katastralni-pracoviste/KP-Hranice.aspx",
  "JesenĂ­k": "Katastralni-urad-pro-Olomoucky-kraj/Katastralni-pracoviste/KP-Jesenik.aspx",
  Olomouc: "Katastralni-urad-pro-Olomoucky-kraj/Katastralni-pracoviste/KP-Olomouc.aspx",
  "ProstÄ›jov": "Katastralni-urad-pro-Olomoucky-kraj/Katastralni-pracoviste/KP-Prostejov.aspx",
  "PĹ™erov": "Katastralni-urad-pro-Olomoucky-kraj/Katastralni-pracoviste/KP-Prerov.aspx",
  "Ĺ umperk": "Katastralni-urad-pro-Olomoucky-kraj/Katastralni-pracoviste/KP-Sumperk.aspx",
  Chrudim: "Katastralni-urad-pro-Pardubicky-kraj/Katastralni-pracoviste/KP-Chrudim.aspx",
  Pardubice: "Katastralni-urad-pro-Pardubicky-kraj/Katastralni-pracoviste/KP-Pardubice.aspx",
  Svitavy: "Katastralni-urad-pro-Pardubicky-kraj/Katastralni-pracoviste/KP-Svitavy.aspx",
  "ĂšstĂ­ nad OrlicĂ­": "Katastralni-urad-pro-Pardubicky-kraj/Katastralni-pracoviste/KP-Usti-nad-Orlici.aspx",
  "DomaĹľlice": "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Domazlice.aspx",
  Klatovy: "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Klatovy.aspx",
  Kralovice: "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Kralovice.aspx",
  "PlzeĹ-jih": "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Plzen-jih.aspx",
  "PlzeĹ-mÄ›sto": "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Plzen-mesto.aspx",
  "PlzeĹ-sever": "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Plzen-sever.aspx",
  Rokycany: "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Rokycany.aspx",
  Tachov: "Katastralni-urad-pro-Plzensky-kraj/Katastralni-pracoviste/KP-Tachov.aspx",
  "BeneĹˇov": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Benesov.aspx",
  Beroun: "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Beroun.aspx",
  Kladno: "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Kladno.aspx",
  "KolĂ­n": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Kolin.aspx",
  "KutnĂˇ Hora": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Kutna-Hora.aspx",
  "MÄ›lnĂ­k": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Melnik.aspx",
  "MladĂˇ Boleslav": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Mlada-Boleslav.aspx",
  Nymburk: "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Nymburk.aspx",
  "Praha-vĂ˝chod": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Praha-vychod.aspx",
  "Praha-zĂˇpad": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Praha-zapad.aspx",
  "PĹ™Ă­bram": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Pribram.aspx",
  "RakovnĂ­k": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Rakovnik.aspx",
  "SlanĂ˝": "Katastralni-urad-pro-Stredocesky-kraj/Katastralni-pracoviste/KP-Slany.aspx",
  "DÄ›ÄŤĂ­n": "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Decin.aspx",
  Chomutov: "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Chomutov.aspx",
  "LitomÄ›Ĺ™ice": "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Litomerice.aspx",
  Louny: "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Louny.aspx",
  Most: "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Most.aspx",
  Rumburk: "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Rumburk.aspx",
  Teplice: "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Teplice.aspx",
  "ĂšstĂ­ nad Labem": "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Usti-nad-Labem.aspx",
  "Ĺ˝atec": "Katastralni-urad-pro-Ustecky-kraj/Katastralni-pracoviste/KP-Zatec.aspx",
  Jihlava: "Katastralni-urad-pro-Vysocinu/Katastralni-pracoviste/KP-Jihlava.aspx",
  "HavlĂ­ÄŤkĹŻv Brod": "Katastralni-urad-pro-Vysocinu/Katastralni-pracoviste/KP-Havlickuv-Brod.aspx",
  "MoravskĂ© BudÄ›jovice": "Katastralni-urad-pro-Vysocinu/Katastralni-pracoviste/KP-Moravske-Budejovice.aspx",
  "PelhĹ™imov": "Katastralni-urad-pro-Vysocinu/Katastralni-pracoviste/KP-Pelhrimov.aspx",
  "TĹ™ebĂ­ÄŤ": "Katastralni-urad-pro-Vysocinu/Katastralni-pracoviste/KP-Trebic.aspx",
  "VelkĂ© MeziĹ™Ă­ÄŤĂ­": "Katastralni-urad-pro-Vysocinu/Katastralni-pracoviste/KP-Velke-Mezirici.aspx",
  "Ĺ˝ÄŹĂˇr nad SĂˇzavou": "Katastralni-urad-pro-Vysocinu/Katastralni-pracoviste/KP-Zdar-nad-Sazavou.aspx",
  "HoleĹˇov": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Holesov.aspx",
  "KromÄ›Ĺ™Ă­Ĺľ": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Kromeriz.aspx",
  "UherskĂ© HradiĹˇtÄ›": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Uher-Hradiste.aspx",
  "UherskĂ˝ Brod": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Uher-Brod.aspx",
  "ValaĹˇskĂ© Klobouky": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Valas-Klobouky.aspx",
  "ValaĹˇskĂ© MeziĹ™Ă­ÄŤĂ­": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Val-Mezirici.aspx",
  "VsetĂ­n": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Vsetin.aspx",
  "ZlĂ­n": "Katastralni-urad-pro-Zlinsky-kraj/Katastralni-pracoviste/KP-Zlin.aspx"
}, uzemni_plany = {
  "AĹˇ": "http://www.muas.cz/uzemni-plan-as/d-226243/p1=19878",
  "BeneĹˇov": "http://www.benesov-city.cz/vismo/zobraz_dok.asp?id_org=219&id_ktg=1116&p1=2130",
  Beroun: "http://www.mesto-beroun.cz/obcan/uzemni-planovani-1/obce-orp-beroun/",
  "BĂ­lina": "http://bilina.cz/urad/uzemni-plan-bilina",
  "BĂ­lovec": "http://www.bilovec.cz/vismo/zobraz_dok.asp?id_org=442&id_ktg=9464&p1=16981",
  Blansko: "http://www.blansko.cz/meu/odbor-stavebni-urad/uzemni-plany",
  "BlatnĂˇ": "http://www.mesto-blatna.cz/mestsky-urad/uzemni-planovani-1/",
  Blovice: "http://www.blovice-mesto.cz/mestsky-urad/odbory-a-oddeleni/odbor-stavebni-a-dopravni/stavebni-odbor/gis/",
  "BohumĂ­n": "http://www.mesto-bohumin.cz/cz/o-meste/samosprava/uzemni-plan/",
  Boskovice: "http://www.boskovice.cz/uzemni-planovani/d-23698/p1=23478",
  "BrandĂ˝s nad Labem-StarĂˇ Boleslav": "http://www.brandysko.cz/uzemni-planovani/d-6227/p1=1030",
  "BĹ™eclav": "http://breclav.eu/dokumenty/mapy-a-uzemni-plan",
  Brno: "https://www.brno.cz/sprava-mesta/magistrat-mesta-brna/usek-rozvoje-mesta/odbor-uzemniho-planovani-a-rozvoje/",
  Broumov: "http://www.broumov.net/vismo/dokumenty2.asp?id_org=1276&id=2566&p1=1038",
  "BruntĂˇl": "http://www.mubruntal.cz/uzemni-planovani/ds-38646/p1=32567",
  "BuÄŤovice": "http://www.bucovice.cz/odbor-uzemni-planovani-rozvoje-a-investic/ds-1025/archiv=0",
  "BystĹ™ice nad PernĹˇtejnem": "http://www.bystricenp.cz/uzemni-plan",
  "BystĹ™ice pod HostĂ˝nem": "http://www.mubph.cz/clanek.php?id=1447&menu=6&web=1&pageID=3476fcf5fcfdfbc35560228e157ad969",
  "ÄŚĂˇslav": "http://www.meucaslav.cz/obcan/mesto-caslav/zakladni-informace/uzemni-plan-mesta/",
  "ÄŚernoĹˇice": "http://www.mestocernosice.cz/mesto/uzemni-planovani/",
  "ÄŚeskĂˇ LĂ­pa": "http://www.mucl.cz/usek-urad-uzemniho-planovani/ds-2252/archiv=0&p1=1208",
  "ÄŚeskĂˇ TĹ™ebovĂˇ": "http://www.ceska-trebova.cz/uzemni-plan-mesta-ceska-trebova/d-2612/p1=2661",
  "ÄŚeskĂ© BudÄ›jovice": "http://www.c-budejovice.cz/cz/magistrat/odbory/oup/stranky/odbor-uzemniho-planovani.aspx",
  "ÄŚeskĂ˝ Brod": "http://www.cesbrod.cz/category/uzemni-plan",
  "ÄŚeskĂ˝ Krumlov": "http://obcan.ckrumlov.info/docs/cz/uzpl.xml",
  "ÄŚeskĂ˝ TÄ›ĹˇĂ­n": "http://www.tesin.cz/obcane/uzemni-planovani/",
  Cheb: "http://www.cheb.cz/uzemni-planovani/ms-61363/p1=61363",
  Chomutov: "http://www.chomutov-mesto.cz/cz/uzemni-plan",
  "ChotÄ›boĹ™": "http://www.chotebor.cz/dokumenty/ms-1388/p1=1388",
  Chrudim: "http://www.chrudim.eu/obcan/odbory-meu/odbor-uzemniho-planovani-a-regionalniho-rozvoje.html",
  "DaÄŤice": "http://www.dacice.cz/radnice/mestsky-urad/odbory-mestskeho-uradu/odbor-stavebni-urad/uzemni-planovani/",
  "DÄ›ÄŤĂ­n": "http://www.mmdecin.cz/dokumenty/cat_view/9-rozvoj-uzemni-planovani",
  "DobĹ™Ă­Ĺˇ": "http://www.mestodobris.cz/platny-uzemni-plan/d-459477/p1=44533",
  "DobruĹˇka": "http://www.mestodobruska.cz/urad/uzemni-planovani/",
  "DomaĹľlice": "http://www.domazlice.info/uzemni-planovani/",
  "DvĹŻr KrĂˇlovĂ© nad Labem": "http://www.mudk.cz/cs/radnice/uzemni-planovani/",
  "FrenĹˇtĂˇt pod RadhoĹˇtÄ›m": "http://www.mufrenstat.cz/vismo/dokumenty2.asp?id_org=3471&id=94071&p1=30247",
  "FrĂ˝dek-MĂ­stek": "http://www.frydekmistek.cz/cz/obcan/organy-mesta/magistrat-mesta/odbor-uzemniho-rozvoje-a-stavebniho-radu/uzemni-plany-a-uap/",
  "FrĂ˝dlant": "http://www.mesto-frydlant.cz/cs/obcan/podpora-podnikani/uzemni-planovani/",
  "FrĂ˝dlant nad OstravicĂ­": "http://www.frydlantno.cz/uzemni-planovani/ds-1384/p1=16874",
  "HavĂ­Ĺ™ov": "http://www.havirov-city.cz/dokumenty/uzemni-planovani/uzemni-plan-havirova.html",
  "HavlĂ­ÄŤkĹŻv Brod": "http://www.muhb.cz/uzemni-plany/ds-27613/p1=73840",
  Hlinsko: "http://www.hlinsko.cz/mestsky-urad/uzemni-planovani",
  "HluÄŤĂ­n": "http://www.hlucin.cz/cs/urad-a-samosprava/uzemni-planovani-inzenyrske-site/",
  "HodonĂ­n": "http://www.hodonin.eu/uzemni-planovani/ds-48287/p1=53387",
  "HoleĹˇov": "https://www.holesov.cz/utvar-uzemniho-planovani",
  Holice: "http://www.holice.eu/urad-online/dokumenty-ke-stazeni/category/34-uzemni-plan-holice.html",
  "HoraĹľÄŹovice": "http://www.sumavanet.cz/muhd/uzemniplan.asp",
  "HoĹ™ice": "http://www.horice.org/cz/urad-uzemniho-planovani/",
  "HoĹ™ovice": "http://www.mesto-horovice.eu/radnice/organizacni-struktura/mesto-horovice/mestsky-urad-horovice/odbor-vystavby-a-zivotniho-prostredi/urad-uzemniho-planovani/",
  "HorĹˇovskĂ˝ TĂ˝n": "http://www.horsovskytyn.cz/obcan/mestsky-urad/odbory-mu-informuji/odbor-vystavby-a-uzemniho-planovani-1/",
  "Hradec KrĂˇlovĂ©": "http://www.hradeckralove.org/urad/odbor-hlavniho-architekta",
  Hranice: "http://www.mesto-hranice.cz/cs/mapa-hranic/",
  Humpolec: "http://mesto-humpolec.cz/uzemni-plan/ds-8342/p1=32137",
  "HustopeÄŤe": "http://www.hustopece.cz/upd",
  "IvanÄŤice": "http://www.ivancice.cz/a_meu_odbor_orr.php",
  "Jablonec nad Nisou": "http://www.mestojablonec.cz/cs/uzemni-planovani/",
  Jablunkov: "http://www.jablunkov.cz/mestsky-urad/struktura-uradu/odbor-uzemniho-planovani-a-stavebniho-radu/urad-uzemniho-planovani/",
  "JaromÄ›Ĺ™": "http://www.jaromer-josefov.cz/mestsky-urad/odbory-mu-1/odbor-vystavby/uzemni-planovani/",
  "JesenĂ­k": "https://www.jesenik.org/podnikatel/4-uzemni-planovani.html",
  "JiÄŤĂ­n": "https://www.mujicin.cz/jicin-uzemne-planovaci-dokumentace/ds-20020/p1=58553",
  Jihlava: "http://www.jihlava.cz/uvod/d-474607/p1=75643",
  Jilemnice: "http://www.mestojilemnice.cz/cz/infoserver/odbory-uradu/odbor-uzemni-planovani-stavebni-urad/uzemni-planovani/upd-orp/",
  "JindĹ™ichĹŻv Hradec": "http://www.jh.cz/cs/uzemni-plan-a-regulacni-plan/uzemni-plan-jindrichuv-hradec.html",
  "KadaĹ": "http://gis.mesto-kadan.cz/kadan/up.html",
  Kaplice: "http://www.mestokaplice.cz/mestsky-urad-23/uzemni-plany-obci/",
  "Karlovy Vary": "https://mmkv.cz/cs/uzemni-planovani",
  "KarvinĂˇ": "http://portal.karvina.org/portal/page/portal/uvodni_stranka/magistrat/gis/uplany",
  Kladno: "http://www.mestokladno.cz/uzemni-plany-a-mapy/ms-2100019631/p1=2100019631",
  Klatovy: "http://www.klatovynet.cz/mukt/uzemniplan.asp",
  "KolĂ­n": "http://www.mukolin.cz/cz/obcan/samosprava/strategicke-dokumenty/uzemni-plan-kolin/",
  Konice: "http://www.konice.cz/uzemni-planovani/ds-1063/archiv=0&p1=2521",
  "KopĹ™ivnice": "http://www.koprivnice.cz/index.php?id=uzemni-plan-koprivnice",
  "Kostelec nad OrlicĂ­": "http://www.kostelecno.cz/uzemni-plany/ds-1028/p1=4699",
  "KrĂˇlĂ­ky": "http://www.kraliky.eu/index.php?nazev=uzemni-planovani-215&ids=215",
  Kralovice: "http://www.kralovice.cz/vismo/zobraz_dok.asp?u=7264&id_org=7264&id_ktg=8202&archiv=0&p1=&p2=&p3=",
  "Kralupy nad Vltavou": "http://www.mestokralupy.cz/mestsky-urad/uzemni-plany-obci-v-orp-kralupy-nad-vltavou/",
  Kraslice: "http://www.kraslice.cz/obcan/mestsky-urad/vyznamne-dokumenty/uzemni-plan-kraslice/",
  "KravaĹ™e": "http://www.kravare.cz/obcan/uzemni-planovani/",
  Krnov: "http://www.krnov.cz/uzemni-planovani/ms-1414/p1=1414",
  "KromÄ›Ĺ™Ă­Ĺľ": "http://www.mesto-kromeriz.cz/urad/dokumenty-a-informace/uzemni-plan/",
  "KuĹ™im": "http://www.kurim.cz/cs/samosprava/rozvoj-mesta/",
  "KutnĂˇ Hora": "http://mu.kutnahora.cz/mu/uzemni-plan",
  Kyjov: "http://www.mestokyjov.cz/vismo/o_utvar.asp?id_org=7843&id_u=1094&p1=2661",
  "LanĹˇkroun": "http://www.lanskroun.eu/uzemni-planovani/ds-1046/p1=1364",
  Liberec: "http://www.liberec.cz/cz/prakticke-informace/uzemni-planovani/",
  "LipnĂ­k nad BeÄŤvou": "http://www.mesto-lipnik.cz/vismo/zobraz_dok.asp?id_org=8426&id_ktg=1119&n=uzemni%2Dplany&p1=2534",
  "LitomÄ›Ĺ™ice": "https://www.litomerice.cz/uzemni-plany",
  "LitomyĹˇl": "http://www.litomysl.cz/?lang=cz&co=uzemni_planovani&akce=",
  Litovel: "http://www.litovel.eu/cs/urad/mestsky-urad-litovel/odbory-uradu/odbor-vystavby/",
  "LitvĂ­nov": "http://www.mulitvinov.cz/uzemni-planovani/ds-53549/p1=82148",
  Louny: "http://www.mulouny.cz/cs/mestsky-urad/informace-odboru/odbor-stavebniho-uradu/uzemni-planovani/",
  Lovosice: "http://www.meulovo.cz/urad-uzemniho-planovani/ds-1107/p1=24483",
  "LuhaÄŤovice": "http://www.mesto.luhacovice.cz/21850-dokumenty-mesta",
  "LysĂˇ nad Labem": "http://www.mestolysa.cz/cz/uzemni-planovani",
  "MariĂˇnskĂ© LĂˇznÄ›": "http://www.muml.cz/uzemni-planovani/",
  "MÄ›lnĂ­k": "http://www.melnik.cz/uzemni-plany-obci/ds-1179/p1=1853",
  Mikulov: "http://www.mikulov.cz/mesto-mikulov/samosprava-mesta/koncepcni-a-rozvojove-materialy/",
  Milevsko: "http://www.milevsko-mesto.cz/uzemni-planovani",
  "MladĂˇ Boleslav": "http://www.mb-net.cz/uzemni-plany-uzemne-analyticke-podklady-zastavena-uzemi/ms-923/p1=923",
  "Mnichovo HradiĹˇtÄ›": "http://www.mnhradiste.cz/radnice/strategicke-dokumenty/upo",
  Mohelnice: "http://www.mohelnice.cz/uzemni-plan-mohelnice/d-218110",
  "MoravskĂˇ TĹ™ebovĂˇ": "http://www.moravskatrebova.cz/cs/rozvoj/strategicke-rozvojove-dokumenty/uzemni-plan-mesta.html",
  "MoravskĂ© BudÄ›jovice": "http://mbudejovice.cz/vismo/dokumenty2.asp?id_org=9890&id=243636",
  "MoravskĂ˝ Krumlov": "http://www.mkrumlov.cz/uzemni-plan.html",
  Most: "http://www.mesto-most.cz/uzemni-plan-mesta-mostu/ds-1256/p1=1071",
  "NĂˇchod": "https://www.mestonachod.cz/urad/vystavba/usek-planovani.asp",
  "NĂˇmÄ›ĹˇĹĄ nad Oslavou": "http://www.namestnosl.cz/uredni-deska/2/p1=51",
  Nepomuk: "https://www.nepomuk.cz/obcan/uzemni-planovani/",
  Neratovice: "http://www.neratovice.cz/rozvoj-mesta/ms-26865/p1=26865",
  "NovĂˇ Paka": "http://www.munovapaka.cz/index.asp",
  "NovĂ© MÄ›sto na MoravÄ›": "https://radnice.nmnm.cz/r/mestsky-urad/uzemni-planovani/",
  "NovĂ© MÄ›sto nad MetujĂ­": "http://www.novemestonm.cz/obcan/uzemni-planovani/",
  "NovĂ˝ Bor": "http://www.novy-bor.cz/cz/mesto-novy-bor/planovani-a-rozvoj-mesta/",
  "NovĂ˝ BydĹľov": "http://www.novybydzov.cz/VismoOnline_ActionScripts/File.ashx?id_org=10716&id_dokumenty=9638",
  "NovĂ˝ JiÄŤĂ­n": "https://www.novyjicin.cz/uzemni-planovani/",
  Nymburk: "http://www.mesto-nymburk.cz/index.php?sekce=1&zobraz=uzemni-plan",
  "NĂ˝Ĺ™any": "http://www.nyrany.cz/mesto/uzemni-plan-mesta/",
  Odry: "http://www.odry.cz/uzemni-planovani/ds-10674/p1=23668",
  Olomouc: "http://www.olomouc.eu/o-meste/uzemni-planovani",
  Opava: "http://www.opava-city.cz/cs/uzemni-planovani",
  "OrlovĂˇ": "http://www.mesto-orlova.cz/cz/radnice/uzemni-planovani/",
  Ostrava: "http://gisova.ostrava.cz/uzemni-plan.php",
  Ostrov: "http://www.ostrov.cz/dokumenty-orup/ds-1167/archiv=0&p1=2532",
  Otrokovice: "http://www.otrokovice.cz/uzemni-planovani/ms-3763/p1=3763",
  Pacov: "http://www.mestopacov.cz/mestsky-urad/odbor-vystavby/informace/uzemni-planovani/",
  Pardubice: "http://www.pardubice.eu/urad/radnice/uzemni-planovani/",
  "PelhĹ™imov": "http://www.mupe.cz/gis-a-uzemni-plany/ms-1414/p1=1414",
  "PĂ­sek": "http://www.mesto-pisek.cz/uzemni-plan-pisek/ds-1302/archiv=0&p1=1036",
  "PlzeĹ": "http://ukr.plzen.eu/uzemni-planovani/uzemni-plan-plzen/",
  "PodboĹ™any": "http://www.podborany.net/mestsky-urad/odbory-uradu/stavebni-a-vyvlastnovaci-urad-1/urad-uzemniho-planovani/",
  "PodÄ›brady": "http://www.mesto-podebrady.cz/vismo/zobraz_dok.asp?id_org=12349&id_ktg=1326&p1=1099",
  "PohoĹ™elice": "http://www.pohorelice.cz/uzemni-planovani",
  "PoliÄŤka": "http://www.policka.org/info/mestsky-urad/uzemni-planovani/",
  Prachatice: "http://www.prachatice.eu/mestsky-urad/uzemni-planovani/uzemni-plan-sidelniho-utvaru-prachatice",
  Praha: "http://www.iprpraha.cz/",
  "PĹ™elouÄŤ": "http://www.mestoprelouc.cz/mesto/uzemne-planovaci-dokumentace/",
  "PĹ™erov": "http://www.prerov.eu/cs/magistrat/rozvoj-mesta/uzemni-planovani/",
  "PĹ™eĹˇtice": "http://www.prestice-mesto.cz/mesto/uzemne-planovaci-dokumentace-mesta/uzemni-plan/",
  "PĹ™Ă­bram": "http://pribram.eu/mesto-pribram/rozvoj-mesta-a-uzemni-plan.html",
  "ProstÄ›jov": "https://www.prostejov.eu/cs/obcan/informace-z-odboru/odbor-uzemniho-planovani-a-pamatkove-pece/uzemni-planovani/",
  "RakovnĂ­k": "http://www.mesto-rakovnik.cz/uzemni-planovani/",
  "ĹĂ­ÄŤany": "http://info.ricany.cz/mesto/uzemni-planovani-ve-meste-ricany",
  Rokycany: "http://www.rokycany.cz/vismo/zobraz_dok.asp?u=14069&id_org=14069&id_ktg=6937&archiv=0&p1=&p2=&p3=",
  Rosice: "http://www1.rosice.cz/mapy-uzemni-plan/ms-1088/p1=1088",
  "Roudnice nad Labem": "http://www.roudnicenl.cz/urad/uzemni-plany-obci",
  "RoĹľnov pod RadhoĹˇtÄ›m": "http://www.roznov.cz/uzemni-plan-mesta/ds-1062/p1=1491",
  Rumburk: "http://www.rumburk.cz/index.php?page=1&id=129",
  "Rychnov nad KnÄ›Ĺľnou": "http://www.rychnov-city.cz/uzemni-plan-rk/ds-1314/p1=1005",
  "RĂ˝maĹ™ov": "http://www.rymarov.cz/uzemni-planovani",
  "SedlÄŤany": "http://mesto-sedlcany.cz/node/7685",
  Semily: "http://www.semily.cz/uzemni-planovani/ms-2273/p1=2273",
  "SlanĂ˝": "http://www.meuslany.cz/cs/mestsky-urad-a-odbory/stavebni/uzemni-plan-slany/",
  "Ĺ lapanice": "http://www.slapanice.cz/uzemni-plan-slapanice/",
  "Slavkov u Brna": "http://www.slavkov.cz/index.php/radnice/urad/dokumenty/uzemni-plany-a-uap",
  "SobÄ›slav": "http://www.musobeslav.cz/mestsky-urad/uzemni-planovani/up-sobeslav/",
  Sokolov: "http://www.sokolov.cz/urad/odbory/odbor_stavebni_a_uzemniho_planovani/uzemni_plany/informace-o-uzemnich-planech-27115",
  "Ĺ ternberk": "http://www.sternberk.eu/zakladni-informace-o-sternberku/uzemni-planovani.html",
  Stod: "http://www.mestostod.cz/vismo/zobraz_dok.asp?id_org=15551&id_ktg=1140&p1=3166",
  Strakonice: "http://www.strakonice.eu/upd-mesta",
  "StĹ™Ă­bro": "http://www.mustribro.cz/ruzne/uzemni_plan_mesta.php",
  "Ĺ umperk": "http://www.sumperk.cz/cs/obcan/mapovy-portal.html",
  "SuĹˇice": "http://www.sumavanet.cz/mususice/uzemniplan.asp",
  "SvÄ›tlĂˇ nad SĂˇzavou": "http://www.svetlans.cz/uzemni-planovani/ds-1036/p1=1277",
  Svitavy: "http://www.svitavy.cz/cs/m-412-odbor-vystavby/",
  "TĂˇbor": "http://www.mutabor.cz/vismo/dokumenty2.asp?id_org=16470&id=1813&p1=1150",
  Tachov: "http://www.tachov-mesto.cz/uzemni-planovani.html",
  Tanvald: "http://www.tanvald.cz/mestskyurad/uzemniplanmestatanvald/",
  "TelÄŤ": "http://www.telc.eu/mesto_a_samosprava/portal_uzemniho_planovani",
  Teplice: "http://www.teplice.cz/uzemni-plan-mesta-teplice/ds-1010/p1=2586",
  "TiĹˇnov": "http://www.tisnov-mesto.cz/urad/dokumenty/uzemne-planovaci-dokumentace-upd/platna-upd-obci",
  "TĹ™ebĂ­ÄŤ": "http://www.trebic.cz/uzemni-plan/ms-30350/p1=30350",
  "TĹ™eboĹ": "http://www.mesto-trebon.cz/cz/mestsky-urad-trebon/uzemni-plany-a-studie.html",
  "TrhovĂ© Sviny": "http://www.tsviny.cz/uzemne-planovaci-dokumentace/ms-1077/p1=1077",
  "TĹ™inec": "http://www.trinecko.cz/sraup/index.php?id=uz_plan",
  Trutnov: "http://upd.trutnov.cz/upd/",
  Turnov: "http://www.turnov.cz/cs/mesto/uzemni-plany-rozvoj-a-mpz/",
  "TĂ˝n nad Vltavou": "http://www.tnv.cz/odbor-regionalniho-rozvoje-stavebni-urad/ds-1208/p1=2911",
  "UherskĂ© HradiĹˇtÄ›": "http://www.mesto-uh.cz/Folders/134100-1-Uzemni+planovani.aspx",
  "UherskĂ˝ Brod": "http://www.uherskybrod.cz/pages.aspx?rp=2.1&idd=43&showDetail=true",
  "UniÄŤov": "http://www.unicov.cz/uzemni-plan-mesta-unicova/ds-1141/p1=13439",
  "ĂšstĂ­ nad Labem": "http://www.usti-nad-labem.cz/cz/verejna-sprava/magistrat/odbory-oddeleni/odbor-rozvoje-mesta/",
  "ĂšstĂ­ nad OrlicĂ­": "http://www.ustinadorlici.cz/cs/mesto/strategicke-dokumenty/novy-uzemni-plan",
  "ValaĹˇskĂ© Klobouky": "http://www.valasskeklobouky.cz/dokumenty-stavebniho-odboru/ds-4887/archiv=0&p1=36599",
  "ValaĹˇskĂ© MeziĹ™Ă­ÄŤĂ­": "http://www.valasskemezirici.cz/mesto-valasske-mezirici/ms-902/uzemni-planovani/ds-1143/archiv=1&p1=17897",
  Varnsdorf: "http://www.varnsdorf.cz/cz/urad/uzemni-planovani/",
  "VelkĂ© MeziĹ™Ă­ÄŤĂ­": "http://www.velkemezirici.cz/mestsky-urad/uzemni-planovani",
  "VeselĂ­ nad Moravou": "http://www.veseli-nad-moravou.cz/odbor-zpup-oddeleni-uzemniho-planovani/ds-39016/archiv=0&p1=77452",
  Vimperk: "http://www.vimperk.cz/927/cz/normal/uzemni-planovani/",
  "VĂ­tkov": "http://www.vitkov.info/mestsky-urad/uzemni-planovani/",
  Vizovice: "http://www.mestovizovice.cz/obcan/uzemni-planovani/",
  "VlaĹˇim": "http://www.mesto-vlasim.cz/uzemni-planovani",
  "VodĹany": "http://www.vodnany.eu/platna-upd-orp-vodnany/ds-26559/p1=21805",
  Votice: "http://www.votice.cz:90/",
  "VrchlabĂ­": "http://www.muvrchlabi.cz/uzemni-plan-mesta-vrchlabi/ds-1090/p1=1762",
  "VsetĂ­n": "http://www.mestovsetin.cz/vismo/zobraz_dok.asp?id_org=18676&id_ktg=11674&query=%C3%BAzemn%C3%AD+pl%C3%A1n",
  "VyĹˇkov": "http://www.vyskov-mesto.cz/vismo/zobraz_dok.asp?id_org=18857&id_ktg=14930&query=%C3%BAzemn%C3%AD+pl%C3%A1n",
  "VysokĂ© MĂ˝to": "http://urad.vysoke-myto.cz/uzemni-plany",
  "ZĂˇbĹ™eh": "http://meu.zabreh.cz/index.php?option=com_content&view=category&layout=blog&id=20232&Itemid=30286",
  "Ĺ˝amberk": "http://www.zamberk.cz/index.php?ids=13&idkz=60",
  "Ĺ˝atec": "http://www.mesto-zatec.cz/mestsky-urad/odbory-uradu/odbor-rozvoje-a-majetku-mesta/urad-uzemniho-planovani/",
  "Ĺ˝ÄŹĂˇr nad SĂˇzavou": "http://www.zdarns.cz/obce/uzemni-plany-obci.asp",
  "Ĺ˝eleznĂ˝ Brod": "http://www.zeleznybrod.cz/cz/obcan/dokumenty/uzemni-plan/",
  "Ĺ˝idlochovice": "http://www.zidlochovice.cz/cs/mesto-zidlochovice/mestsky-urad/odbory-mestskeho-uradu/odbor-zivotniho-prostredi-a-stavebni-urad/usek-uzemniho-planovani-a-stavebni-urad.html",
  "ZlĂ­n": "http://www.zlin.eu/architektura-a-uzemni-planovani-cl-15.html",
  Znojmo: "http://www.znojmocity.cz/msp/id_osnovy=9385&p1=60548"
};

function geostate () {
  var e = {}, a = !1, r = !1, n = function () {
  }, o = function () {
  }, i = function () {
  }, s = {kde: [0, 0, 0, ""], mapa: [], vrstvy: [], info: [0, 0]};

  function p (t, e) {
    return -1 != t.indexOf(e)
  }

  function l (t) {
    var e = [];
    for (var a in t) {
      var n = t[a];
      if (null != n && "function" != typeof n) {
        var o;
        if ("object" == typeof n && n.constructor == Array) {
          for (var r, i = [], s = 0, l = n.length; s < l; s++) r = n[s], i.push(encodeURIComponent(null == r ? "" : r));
          o = i.join(",")
        } else o = encodeURIComponent(n);
        e.push(encodeURIComponent(a) + "=" + o)
      }
    }
    return e.join("&")
  }

  function c (t) {
    var e = "";
    if (p(t = t || window.location.href, "#")) {
      var a = t.indexOf("#") + 1, n = t.length;
      e = t.substring(a, n)
    } else if (p(t, "?")) {
      a = t.indexOf("?") + 1, n = p(t, "#") ? t.indexOf("#") : t.length;
      e = t.substring(a, n)
    }
    for (var o = {}, r = e.split(/[&;]/), i = 0, s = r.length; i < s; ++i) {
      var l = r[i].split("=");
      if (l[0]) {
        var c = decodeURIComponent(l[0]), u = l[1] || "";
        1 == (u = decodeURIComponent(u.replace(/\+/g, " ")).split(",")).length && (u = u[0]), o[c] = u
      }
    }
    return o
  }

  function u (t, e) {
    return Math.floor(t * e) / e
  }

  function d (t) {
    a = !0, window.location.hash = t
  }

  function m (t) {
    var e = c(window.location.href);
    n(e.kde), e && e.mapa && null != e.vrstvy && (e.mapa = "string" == typeof e.mapa ? [e.mapa] : e.mapa, e.vrstvy = "string" == typeof e.vrstvy ? [e.vrstvy] : e.vrstvy), o(e.mapa, e.vrstvy), e && i(e.info)
  }

  return window.addEventListener("hashchange", function (t) {
    a || (r = !0, m(window.location.href)), a = !1
  }), e.storePosition = function (t, e, a, n) {
    if (!r || n) {
      var o = c(window.location.href);
      o.kde = [u(t, 1e5), u(e, 1e5), u(a, 10)], JSON.stringify(o.kde) != JSON.stringify(s.kde) && (s.kde = o.kde, d("#" + l(o)))
    }
    r = !1
  }, e.storeLayers = function (t, e) {
    var a = c(window.location.href);
    a.mapa = t, a.vrstvy = e, JSON.stringify(a.mapa) == JSON.stringify(s.mapa) && JSON.stringify(a.vrstvy) == JSON.stringify(s.vrstvy) || (s.mapa = t, s.vrstvy = e, d("#" + l(a)))
  }, e.storeInfo = function (t, e) {
    var a = c(window.location.href);
    a.info = [u(t, 1e5), u(e, 1e5)], JSON.stringify(a.info) != JSON.stringify(s.info) && (s.info = a.info, d("#" + l(a)))
  }, e.removeInfo = function () {
    var t = c(window.location.href);
    delete t.info, d("#" + l(t))
  }, e.readStateFromUrl = m, e.onPositionChanged = function (t) {
    return arguments.length ? (n = t, e) : n
  }, e.onLayersChanged = function (t) {
    return arguments.length ? (o = t, e) : o
  }, e.onInfoChanged = function (t) {
    return arguments.length ? (i = t, e) : i
  }, e
}

function geomeasureUI (e, t) {
  var a, n = {}, o = document.getElementById(t + "Btn"), r = document.getElementById(t + "AreaBtn"), i = geoutils(),
    s = function () {
    }, l = function () {
    };

  function c () {
    u(), p()
  }

  function u () {
    o.style.color = "", o.selected = !1, r.style.color = "", r.selected = !1, e.off("editable:drawing:end"), e.off("editable:vertex:new"), e.off("editable:drawing:move"), e.editTools && e.editTools.stopDrawing(), a && (a.disableEdit(), e.removeLayer(a), a = null), e.doubleClickZoom.enable(), l()
  }

  function p () {
    e.on("editable:vertex:new", d), e.on("editable:drawing:move", m), e.on("editable:drawing:end", v), e.doubleClickZoom.disable(), s()
  }

  function d (t) {
    0 == t.vertex.getIndex() && 1 == t.layer._latlngs.length && (a && (a.disableEdit(), e.removeLayer(a), a = null), a = t.layer), t.layer.showMeasurements(), t.layer.updateMeasurements()
  }

  function m (t) {
    e.editTools.forwardLineGuide.showMeasurements(), t.layer && (e.editTools.forwardLineGuide.updateMeasurements({prevLength: t.layer.getTotalLength()}), t.layer.updateMeasurements())
  }

  function v (t) {
    o.selected ? e.editTools.startPolyline() : e.editTools.startPolygon()
  }

  return o.selected = !1, o.addEventListener("click", function (t) {
    0 == o.selected ? (c(), e.editTools.startPolyline(), o.style.color = "rgb(237, 165, 113)", o.selected = !0) : u()
  }), r.selected = !1, r.addEventListener("click", function (t) {
    0 == r.selected ? (c(), e.editTools.startPolygon(), r.style.color = "rgb(237, 165, 113)", r.selected = !0) : u()
  }), 0 == i.isMobile() && i.loadScript("dist/Leaflet.Editable.min.js", function () {
    o.style.display = "block", r.style.display = "block", e.editTools = new L.Editable(e, {})
  }), n.onStart = function (t) {
    return arguments.length ? (s = t, n) : s
  }, n.onStop = function (t) {
    return arguments.length ? (l = t, n) : l
  }, n.start = p, n.stop = u, n.started = !1, n
}

function appM () {
  var e, a, t, n, o = {}, r = geoutils(), i = "lastState", s = document.getElementById("cookies_agreeBtn"),
    l = {lat: 49.747, lng: 15.7673, zoom: 8}, c = document.getElementById("plusBtn"),
    u = document.getElementById("minusBtn");
  if (r.getCookie("agreeM") || (document.getElementById("agreement").style.display = "block", s.onclick = function () {
      r.setCookie("agreeM", "yes", 365), document.getElementById("agreement").style.display = "none"
    }), 0 == r.isMobile()) {
    var p = r.getCookie(i);
    p && -1 == window.location.href.indexOf("#") && (window.location.hash = p)
  }
  window.onload = function (t) {
    -1 == window.location.href.indexOf("#") ? m.setView([l.lat, l.lng], l.zoom) : y.readStateFromUrl(window.location.href);
    setTimeout(function () {
      e = L.marker([0, 0]), a = geosearch("search").onGeocode(function (t) {
        w(t[0], t[1]), m.hasLayer(e) || e.addTo(m), e.setLatLng(t), m._container.focus()
      }).onConfig(function (t) {
        var e = m.getCenter();
        t.lon = e.lng, t.lat = e.lat, t.zoom = m.getZoom(), t.enableCategories = 0, t.lang = "cs"
      }).onClear(function () {
        m.removeLayer(e)
      }).onShow(function () {
        z()
      }).onLoaded(function () {
      })
    }, 1 == r.isMobile() ? 800 : 200), setTimeout(function () {
      r.loadScript("https://www.googletagmanager.com/gtag/js?id=UA-194652-4", function () {
        r.log("Analytics loaded")
      })
    }, 1 == r.isMobile() ? 1e4 : 0), m.on("moveend", v), m.on("click", d.clickReceiver), m.on("dblclick", d.dblClickReceiver)
  };
  var d = r.singleClickHandler().onSingleClick(function (t) {
    r.isMobile() && 1 == f([g, a, k]) || n.onClick(t)
  });
  var m = new L.map("map", {minZoom: 8, maxZoom: 21, zoomSnap: 1 == r.isMobile() ? .1 : 1, zoomControl: !1});

  function v () {
    var t = m.getCenter();
    t.lat != l.lat && t.lng != l.lng && m._zoom != l.zoom && (y.storePosition(t.lat, t.lng, m._zoom), r.setCookie(i, window.location.hash, 365))
  }

  m.attributionControl.setPrefix(""), -1 != window.navigator.userAgent.indexOf("Edge") && L.DomUtil.removeClass(m._container, "leaflet-grab");
  var h, y = geostate().onPositionChanged(function (t) {
    null != t ? m.setView([t[0], t[1]], t[2]) : m.setView([49.747, 15.7673], 8)
  }).onLayersChanged(function (t, e) {
    g.setLayers(t, e)
  }).onInfoChanged(function (t) {
    t && t[0] && t[1] ? n.queryOnLatLng(t[0], t[1]) : n.cleanup()
  });

  function w (t, e) {
    var a = m.getZoom() < 18 ? 18 : m.getZoom();
    m.setView([t, e], a)
  }

  m.on("zoomend zoomlevelschange", function () {
    c.style.color = m._zoom == m.getMaxZoom() ? "grey" : "white", u.style.color = m._zoom == m.getMinZoom() ? "grey" : "white"
  }, this), c.addEventListener("click", function (t) {
    return m.zoomIn(), !1
  }), u.addEventListener("click", function (t) {
    return m.zoomOut(), !1
  }), n = geoqueryUI(m, "kn").onQuery(function (t, e) {
    y.storeInfo(t, e), v()
  }).onShow(function () {
    z()
  }).onFit(function () {
    v()
  }).onCleanup(function () {
    y.removeInfo(), v()
  }).onStart(function () {
    t.stop()
  }).onStop(function () {
  }), document.body.addEventListener("touchmove", function (t) {
    t.preventDefault()
  }, !1);
  var k = geolocation("position").onGoTo(function (t) {
    w(t.coords.latitude, t.coords.longitude)
  }).onSuccess(function (t) {
    h || ((h = L.marker([t.coords.latitude, t.coords.longitude], {
      icon: L.icon({
        iconUrl: "dist/ikl.images/location.png",
        iconSize: [18, 18],
        iconAnchor: [9, 9]
      })
    })).addTo(m), -1 == window.location.href.indexOf("#") && w(t.coords.latitude, t.coords.longitude)), h.setLatLng([t.coords.latitude, t.coords.longitude])
  }).onFailure(function (t, e) {
    h && m.removeLayer(h)
  }).onShow(function () {
    z()
  });
  var g = geolayersUI(m, "layers").onChange(function (t, e) {
    y.storeLayers(t, e), v()
  }).onShow(function () {
    z()
  });

  function f (t) {
    for (var e = !1, a = 0; a < t.length; a++) t[a] && t[a].isVisible() && (t[a].hide(), e = !0);
    return e
  }

  function z () {
    f([g, n, a, k])
  }

  return t = geomeasureUI(m, "measure").onStart(function () {
    n.stop()
  }).onStop(function () {
    n.start()
  }), n.start(), o.map = m, o
}