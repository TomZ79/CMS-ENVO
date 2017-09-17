/*
 * CMS ENVO
 * JS for Media Sharing - Admin
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Initialisation fo Sollist Plugin
 *
 */

/** 01. Initialisation of Sollist Plugin
 ========================================================================*/

$(function () {

  $("#sollist-sharing").sollist({
    pixelsBetweenItems: sollist.pixels,
    size: sollist.size,
    theme: sollist.theme,
    hoverEffect: sollist.hoverEffect,
    profiles: {
      facebook: '',
      googleplus: '',
      instagram: '',
      twitter: '',
      youtube: '',
      vimeo: '',
      email: ''
    }
  });

});