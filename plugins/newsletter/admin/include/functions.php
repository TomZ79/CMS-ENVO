<?php
// EN:
// CZ:
function envo_get_themes($styledir)
{

  if ($handle = opendir($styledir)) {

    /* This is the correct way to loop over the directory. */
    while (FALSE !== ($template = readdir($handle))) {
      if ($template != '.' && $template != '..' && is_dir($styledir . '/' . $template)) {
        $getstyle[] = $template;

      }
    }

    return $getstyle;
    clearstatcache();
    closedir($handle);
  }
}

?>