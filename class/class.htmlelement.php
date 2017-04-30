<?php

// ---------------------------------------------------------------------------------------------------------------------
//			HTML ELEMENT
// ---------------------------------------------------------------------------------------------------------------------
/**
 * Html Class
 *
 */
class HTML_Element
{

  /**
   * Generates a html doctype tag
   *
   * @param  string    | $type - Doctype declaration key from doctypes config
   *
   * @return  string
   */

  public function addDoctype($type = 'html5')
  {

    $doctypes = array(
      'xhtml11'       => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
      'xhtml1-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
      'xhtml1-trans'  => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
      'xhtml1-frame'  => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
      'html5'         => '<!DOCTYPE html>',
      'html4-strict'  => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
      'html4-trans'   => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
      'html4-frame'   => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">',
    );

    if (is_array($doctypes) and isset($type)) {
      return $doctypes[$type];
    } else {
      return FALSE;
    }
  }

  /**
   * Generates a html meta tag
   *
   * @param    string|array    | $name    - Multiple inputs or name/http-equiv value
   * @param    string            $content - Content value
   * @param    string            $type    - Name or http-equiv
   *
   * @return  string
   */
  public function addMeta($name = '', $content = '', $type = 'name')
  {
    if (!is_array($name)) {
      $result = html_tag('meta', array($type => $name, 'content' => $content));
    } elseif (is_array($name)) {
      $result = "";
      foreach ($name as $array) {
        $meta = $array;
        $result .= "\n\t" . html_tag('meta', $meta);
      }
    }

    return $result;
  }

  /**
   * Generates a stylesheet tag
   *
   * @param    string|array    | $href
   * @param    string            $media
   * @param    array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addStylesheet($href, $media = NULL, $attributes = array())
  {
    $media = (empty($media) ? '' : ' media="' . $media . '"');

    $html = "\n\t<link href=\"$href\" rel=\"stylesheet\" type=\"text/css\"" . $media . "";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= "/>";

    return $html;

  }

  /**
   * Generates a script tag
   *
   * @param    string|array    | $src
   * @param    array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addScript($src, $attributes = array())
  {

    $html = "\n<script src=\"$src\"";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= "></script>";

    return $html;

  }

  /**
   * Create a form start tag
   *
   * @param   string          | $tag        - Tag Element
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function startTag($tag, $attributes = array())
  {
    $this->tag = $tag;
    $html = "<$tag";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= '>';

    return $html;
  }

  /**
   * Create a form close tag
   *
   * @param   string          | $tag - Tag Element
   *
   * @return  string
   */
  function endTag($tag = NULL)
  {
    $html = $tag ? "</$tag>" : "</$this->tag>";
    $this->tag = '';

    return $html;
  }

  /**
   * Creates an html link
   *
   * @param   string          | $href       - Source 'href' of anchor
   * @param   string            $text       - Text value of anchor
   * @param   string            $id         - Id of anchor
   * @param   string            $class      - Class of anchor
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */

  public function addAnchor($href, $text, $id = NULL, $class = NULL, $attributes = array())
  {
    $id = (empty($id) ? '' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<a href=\"$href\"" . $id . $class . "";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ">$text</a>";

    return $html;
  }

  /**
   * Creates an html image tag
   *
   * Sets the alt attribute to filename of it is not supplied.
   *
   * @param    string         | $src        - Source of image
   * @param    array            $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addImg($src, $attributes = array())
  {
    if (!preg_match('#^(\w+://)# i', $src)) {

      // Trim the trailing slash
      $src = ltrim($src, "/ \t\n\r");

      $src = BASE_URL_ORIG . $src;
    }
    $attributes['src'] = $src;
    $attributes['alt'] = (isset($attributes['alt'])) ? $attributes['alt'] : pathinfo($src, PATHINFO_FILENAME);

    return html_tag('img', $attributes);
  }

  /**
   * Create a button
   *
   * @param   string|array    | $fieldname  - Either fieldname or full attributes array (when array other params are ignored)
   * @param   string            $value      - Value for Button
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addButtonF($fieldname, $value = NULL, array $attributes = array())
  {
    if (is_array($fieldname)) {
      $attributes = $fieldname;
      $value = isset($attributes['value']) ? $attributes['value'] : $value;
    } else {
      $attributes['name'] = (string)$fieldname;
      $value = isset($value) ? $value : $attributes['name'];
    }

    return html_tag('button', $this->attr_to_string($attributes), $value);
  }

  /**
   * Create a button
   *
   * @param   string          | $type       - Type of Button
   * @param   string            $value      - Value for Button
   * @param   string            $text       - Text for Button
   * @param   string            $name       - Name of Button
   * @param   string            $id         - Id for Button
   * @param   string            $class      - Class for Button
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addButton($type, $value, $text, $name = NULL, $id = NULL, $class = NULL, $attributes = array())
  {
    $name = (empty($name) ? '' : ' name="' . $name . '"');
    $value = (empty($value) ? '' : ' value="' . $value . '"');
    $id = (empty($id) ? '' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<button type=\"$type\"" . $name . $value . $id . $class . "";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ">" . $text . "</button>";

    return $html;
  }

  /**
   * Create a submit button
   *
   * @param   string|array    | $fieldname  - Either fieldname or full attributes array (when array other params are ignored)
   * @param   string            $value      - Value for Button
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addSubmitF($fieldname = 'submit', $value = 'Submit', array $attributes = array())
  {
    if (is_array($fieldname)) {
      $attributes = $fieldname;
    } else {
      $attributes['name'] = (string)$fieldname;
      $attributes['value'] = (string)$value;
    }
    $attributes['type'] = 'submit';

    return html_tag('button', $this->attr_to_string($attributes), $value);
  }

  /**
   * Create a submit button
   *
   * @param   string          | $name       - Name of Button
   * @param   string            $value      - Value for Button
   * @param   string            $id         - Id for Button
   * @param   string            $class      - Class for Button
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addButtonSubmit($name = 'submit', $value = 'Submit', $id = NULL, $class = NULL, $attributes = array())
  {
    $name = (empty($name) ? '' : ' name="' . $name . '"');
    $value = (empty($value) ? '' : $value);
    $id = (empty($id) ? '' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<button type=\"submit\"" . $name . $id . $class . "";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ">" . $value . "</button>";

    return $html;
  }

  /**
   * Create a textarea field
   *
   * @param   string|array    | $fieldname  - Either fieldname or full attributes array (when array other params are ignored)
   * @param   string            $value      - Value for Texarea
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addTextareaF($fieldname, $value = NULL, array $attributes = array())
  {
    if (is_array($fieldname)) {
      $attributes = $fieldname;
    } else {
      $attributes['name'] = (string)$fieldname;
      $attributes['value'] = (string)$value;
    }
    $value = is_scalar($attributes['value']) ? $attributes['value'] : '';
    unset($attributes['value']);

    return html_tag('textarea', $this->attr_to_string($attributes), $value);
  }

  /**
   * Create a textarea field
   *
   * @param   string          | $name       - Name of Taxtarea
   * @param   string            $value      - Value for Texarea
   * @param   string            $rows       - Rows in Textarea
   * @param   string            $cols       - Column in Textarea
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addTextarea($name, $value, $rows = NULL, $cols = NULL, $attributes = array())
  {
    $rows = (empty($rows) ? '' : ' rows="' . $rows . '"');
    $cols = (empty($cols) ? '' : ' cols="' . $cols . '"');

    $html = "<textarea name=\"$name\"" . $rows . $cols . "";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ">$value</textarea>";

    return $html;
  }

  /**
   * Create a radio button
   *
   * @param   string|array    | $fieldname  - Either fieldname or full attributes array (when array other params are ignored)
   * @param   string            $value      - Value for Radio
   * @param   string            $id         - Id of Radio
   * @param   mixed             $checked    - Either attributes (array) or bool/string to set checked status
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addRadioF($fieldname, $value = NULL, $id = NULL, $checked = NULL, array $attributes = array())
  {
    if (is_array($fieldname)) {
      $attributes = $fieldname;
    } else {
      is_array($checked) and $attributes = $checked;
      $attributes['name'] = (string)$fieldname;
      $attributes['value'] = (string)$value;

      # Added for 1.2 to allow checked true/false. in 3rd argument, used to be attributes
      if (!is_array($checked)) {
        // If it's true, then go for it
        if (is_bool($checked)) {
          if ($checked === TRUE) {
            $attributes['checked'] = 'checked';
          }
        } // Otherwise, if the string/number/whatever matches then do it
        elseif (is_scalar($checked) and $checked == $value) {
          $attributes['checked'] = 'checked';
        }
      }
    }
    if (empty($id)) {
      $attributes['id'] = $fieldname;
    } else {
      $attributes['id'] = $id;
    }

    $attributes['type'] = 'radio';

    return html_tag('input', $this->attr_to_string($attributes));
  }

  /**
   * Create a checkbox
   *
   * @param   string|array    | $fieldname  - Either fieldname or full attributes array (when array other params are ignored)
   * @param   string            $value      - Value for Checkbox
   * @param   string            $id         - Id of Checkbox
   * @param   mixed             $checked    - Either attributes (array) or bool/string to set checked status
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addCheckboxF($fieldname, $value = NULL, $id = NULL, $checked = NULL, array $attributes = array())
  {
    if (is_array($fieldname)) {
      $attributes = $fieldname;
    } else {
      is_array($checked) and $attributes = $checked;
      $attributes['name'] = (string)$fieldname;
      $attributes['value'] = (string)$value;

      # Added for 1.2 to allow checked true/false. in 3rd argument, used to be attributes
      if (!is_array($checked)) {
        // If it's true, then go for it
        if (is_bool($checked)) {
          if ($checked === TRUE) {
            $attributes['checked'] = 'checked';
          }
        } // Otherwise, if the string/number/whatever matches then do it
        elseif (is_scalar($checked) and $checked == $value) {
          $attributes['checked'] = 'checked';
        }
      }

      if (empty($id)) {
        $attributes['id'] = $fieldname;
      } else {
        $attributes['id'] = $id;
      }
    }

    $attributes['type'] = 'checkbox';

    return html_tag('input', $this->attr_to_string($attributes));
  }

  /**
   * Create a label field
   *
   * @param   string|array    | $label      - Either fieldname or full attributes array (when array other params are ignored)
   * @param   string            $id         - Id of Label
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addLabelF($label, $id = NULL, array $attributes = array())
  {
    if (is_array($label)) {
      $attributes = $label;
      $label = $attributes['label'];
      isset($attributes['id']) and $id = $attributes['id'];
    }

    $attributes['for'] = $id;

    unset($attributes['label']);

    return html_tag('label', $this->attr_to_string($attributes), $label);
  }

  /**
   * Create a radio button
   *
   * @param   string    | $name       - Name of Radio
   * @param   string      $value      - Value of Radio
   * @param   mixed       $checked    - Either attributes (array) or bool/string to set checked status
   * @param   string      $id         - Id of Radio
   * @param   string      $class      - Class of Radio
   * @param   array       $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addRadio($name, $value, $checked = NULL, $id = NULL, $class = NULL, $attributes = array())
  {

    $id = (empty($id) ? ' id="' . $name . '"' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<input type=\"radio\" name=\"" . $name . '"' . $id . $class . ' value="' . $value . '"' . "";

    if (is_bool($checked)) {
      if ($checked === TRUE) {
        $html .= " checked=\"checked\"";
      }
    }

    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ' >';

    return $html;
  }

  /**
   * Create a checkbox
   *
   * @param   string    | $name       - Name of Checkbox
   * @param   string      $value      - Value of Checkbox
   * @param   mixed       $checked    - Either attributes (array) or bool/string to set checked status
   * @param   string      $id         - Id of Checkbox
   * @param   string      $class      - Class of Checkbox
   * @param   array       $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addCheckbox($name, $value, $checked = NULL, $id = NULL, $class = NULL, $attributes = array())
  {
    $nameA = (empty($name) ? '' : ' name="' . $name . '"');
    $value = (empty($value) ? '' : ' value="' . $value . '"');
    $id = (empty($id) ? ' id="' . $name . '"' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<input type=\"checkbox\"" . $nameA . $id . $class . $value . "";

    if (is_bool($checked)) {
      if ($checked === TRUE) {
        $html .= " checked=\"checked\"";
      }
    }

    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= '>';

    return $html;
  }

  /**
   * Create a label field
   *
   * @param   string    | $for
   * @param   string      $label
   * @param   array       $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addLabel($for, $label, $attributes = array())
  {
    $html = "<label for=\"$for\"";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ">$label</label>";

    return $html;
  }

  /**
   * Create a input
   *
   * @param   string    | $type       - Type of Input
   * @param   string      $name       - Name of Input
   * @param   string      $value      - Value of Input
   * @param   string      $id         - Id of Input
   * @param   string      $class      - Class of Input
   * @param   array       $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addInput($type, $name = NULL, $value = NULL, $id = NULL, $class = NULL, $attributes = array())
  {

    $name = (empty($name) ? '' : ' name="' . $name . '"');
    $value = ((empty($value) && $value != '0') ? '' : ' value="' . $value . '"');
    $id = (empty($id) ? '' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<input type=\"$type\"" . $name . $id . $class . $value . "";

    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ' >';

    return $html;
  }

  /**
   * Create a div
   *
   * @param   string    | $value
   * @param   string      $id
   * @param   array       $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addDiv($value = NULL, $id = NULL, $attributes = array())
  {
    $id = (empty($id) ? '' : 'id="' . $id . '"');
    $value = (empty($value) ? '' : $value);

    $html = "<div " . $id . "";
    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ">$value</div>";

    return $html;
  }

  /**
   * Create a tag
   *
   * @param   string    | $tag
   * @param   string      $text
   * @param   string      $class
   * @param   array       $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addTag($tag, $text = NULL, $class = NULL, $attributes = array())
  {
    $text = (empty($text) ? '' : $text);
    $class = (empty($class) ? '' : ' class="' . $class . '"');
    $_valid_inputs = array(
      'caption', 'code', 'del', 'figcaption', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'i', 'iframe', 'ins', 'label', 'legend',
      'option', 'p', 'pre', 'q', 's', 'samp', 'small', 'span', 'strong', 'sub', 'sup', 'th', 'td', 'textarea',
      'title', 'u',
    );

    if (!in_array($tag, $_valid_inputs)) {
      $html = (sprintf('"%s" is not a valid tags type.', $tag));
    } else {
      $html = "<" . $tag . $class . "";
      if ($attributes) {
        $html .= $this->addAttributes($attributes);
      }
      $html .= ">$text</" . $tag . ">";
    }

    return $html;
  }

  /**
   * Create a option
   *
   * @param   string      $value      - Value of Option
   * @param   string      $text       - Text of Option
   * @param   string      $selected   - Selected of Option
   * @param   string      $id         - Id of Option
   * @param   string      $class      - Class of Option
   * @param   array       $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  function addOption($value, $text, $selected = NULL, $id = NULL, $class = NULL, $attributes = array())
  {

    $id = (empty($id) ? '' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<option value=\"$value\"" . $id . $class . "";

    // If it's true, then go for it
    if ($selected === TRUE) {
      $html .= " selected=\"selected\"";
    }

    if ($attributes) {
      $html .= $this->addAttributes($attributes);
    }
    $html .= ">$text</option>";

    return $html;
  }

  /**
   * Generates a html un-ordered list tag
   *
   * @param  array|string      | $list - List items, may be nested
   * @param  array|string        $attr - Outer list attributes
   *
   * @return  string
   */
  public function addUl(array $list = array(), $attr = FALSE)
  {
    return static::build_list('ul', $list, $attr);
  }

  /**
   * Generates a html ordered list tag
   *
   * @param  array|string      | $list - List items, may be nested
   * @param  array|string        $attr - Outer list attributes
   *
   * @return  string
   */
  public function addOl(array $list = array(), $attr = FALSE)
  {
    return static::build_list('ol', $list, $attr);
  }


  /**
   * Generates the html for the list methods
   *
   * @param  string  $type   list type (ol or ul)
   * @param  array   $list   list items, may be nested
   * @param  boolean $attr   tag attributes
   * @param  string  $indent indentation
   *
   * @return  string
   */
  protected function build_list($type = 'ul', array $list = array(), $attr = FALSE, $indent = '')
  {
    if (!is_array($list)) {
      $result = FALSE;
    }

    $out = '';
    foreach ($list as $key => $val) {
      if (!is_array($val)) {
        $out .= $indent . "\t" . html_tag('li', array(), $val) . PHP_EOL;
      } else {
        $out .= $indent . "\t" . html_tag('li', array(), $key . PHP_EOL . static::build_list($type, $val, '', $indent . "\t\t") . $indent . "\t") . PHP_EOL;
      }
    }
    $result = $indent . html_tag($type, $attr, PHP_EOL . $out . $indent) . PHP_EOL;

    return $result;
  }

  /**
   * Attr to String
   *
   * Wraps the global attributes function and does some form specific work
   *
   * @param   array $attr
   *
   * @return  string
   */
  protected function attr_to_string($attr)
  {
    unset($attr['label']);

    return array_to_attr($attr);
  }

  protected function addAttributes($attr_ar)
  {
    $html = '';
    // check minimized (boolean) attributes
    $min_atts = array('checked', 'disabled', 'readonly', 'multiple',
      'required', 'autofocus', 'novalidate', 'formnovalidate'); // html5
    foreach ($attr_ar as $key => $val) {
      if (in_array($key, $min_atts)) {
        if (!empty($val)) {
          $html .= $this->xhtml ? " $key=\"$key\"" : " $key";
        }
      } else {
        $html .= " $key=\"$val\"";
      }
    }

    return $html;
  }

}


?>