<?php

class ENVO_usergroup
{
  private $data;
  private $envovar = 0;

  public function __construct($row)
  {
    /*
    /	The constructor
    */

    $this->data = $row;
  }

  function getVar($envovar)
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    if (!empty($d[$envovar])) return $d[$envovar];

  }

}

?>