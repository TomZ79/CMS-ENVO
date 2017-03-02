<?php

/*
    PHP Form Class from Dynamic Web Coding at dyn-web.com
    Copyright 2001-2013 by Sharon Paine
    For demos, documentation and updates, visit http://www.dyn-web.com/code/form_builder/

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// version date: May 2013

class HTML
{

  private $tag;
  private $xhtml;

  function __construct($xhtml = TRUE)
  {
    $this->xhtml = $xhtml;
  }

  function startForm($action = '#', $method = 'post', $id = '', $attr_ar = array())
  {
    $str = "<form action=\"$action\" method=\"$method\"";
    if (!empty($id)) {
      $str .= " id=\"$id\"";
    }
    $str .= $attr_ar ? $this->addAttributes($attr_ar) . '>' : '>';

    return $str;
  }

  private function addAttributes($attr_ar)
  {
    $str = '';
    // check minimized (boolean) attributes
    $min_atts = array('checked', 'disabled', 'readonly', 'multiple',
      'required', 'autofocus', 'novalidate', 'formnovalidate'); // html5
    foreach ($attr_ar as $key => $val) {
      if (in_array($key, $min_atts)) {
        if (!empty($val)) {
          $str .= $this->xhtml ? " $key=\"$key\"" : " $key";
        }
      } else {
        $str .= " $key=\"$val\"";
      }
    }

    return $str;
  }

  function addInput($type, $name, $id, $class, $value, $checked, $attr_ar = array())
  {

    $str = "<input type=\"$type\"" .
      (empty($name) ? '' : 'name="' . $name . '"') .
      (empty($id) ? '' : 'id="' . $id . '"') .
      (empty($class) ? '' : 'class="' . $class . '"') .
      'value="' . $value . '"' . "";

    if (($type == 'radio') && ($checked == 'yes')) {
      $str .= " checked=\"checked\"";
    }

    if ($attr_ar) {
      $str .= $this->addAttributes($attr_ar);
    }
    $str .= $this->xhtml ? ' />' : '>';

    return $str;
  }

  function addTextarea($name, $rows = 4, $cols = 30, $value = '', $attr_ar = array())
  {
    $str = "<textarea name=\"$name\" rows=\"$rows\" cols=\"$cols\"";
    if ($attr_ar) {
      $str .= $this->addAttributes($attr_ar);
    }
    $str .= ">$value</textarea>";

    return $str;
  }

  function addSimpleDiv($id, $value = '', $attr_ar = array())
  {
    $str = "<div id=\"$id\"";
    if ($attr_ar) {
      $str .= $this->addAttributes($attr_ar);
    }
    $str .= ">$value</div>";

    return $str;
  }

  function addAnchor($link, $id, $class, $text = '', $attr_ar = array())
  {
    $str = "<a href=\"$link\" id=\"$id\" class=\"$class\"";
    if ($attr_ar) {
      $str .= $this->addAttributes($attr_ar);
    }
    $str .= ">$text</a>";

    return $str;
  }

  public function addButtonSubmit($name = 'submit', $id, $class, $value = 'Submit', $attr_ar = array())
  {
    $html = "<button type=\"submit\"" . (empty($name) ? ' name="submit"' : ' name="' . $name . '"') . (empty($id) ? '' : 'id="' . $id . '"') . " class=\"$class\"";
    if ($attr_ar) {
      $html .= $this->addAttributes($attr_ar);
    }
    $html .= ">" . (empty($value) ? 'Submit' : $value) . "</button>";

    return $html;
  }

  // for attribute refers to id of associated form element
  function addLabelFor($forID, $text, $attr_ar = array())
  {
    $str = "<label for=\"$forID\"";
    if ($attr_ar) {
      $str .= $this->addAttributes($attr_ar);
    }
    $str .= ">$text</label>";

    return $str;
  }

  // from parallel arrays for option values and text
  function addSelectListArrays($name, $val_list, $txt_list, $selected_value = NULL,
                               $header = NULL, $attr_ar = array())
  {
    $option_list = array_combine($val_list, $txt_list);
    $str = $this->addSelectList($name, $option_list, TRUE, $selected_value, $header, $attr_ar);

    return $str;
  }

  // option values and text come from one array (can be assoc)
  // $bVal false if text serves as value (no value attr)
  function addSelectList($name, $option_list, $bVal = TRUE, $selected_value = NULL,
                         $header = NULL, $attr_ar = array())
  {
    $str = "<select name=\"$name\"";
    if ($attr_ar) {
      $str .= $this->addAttributes($attr_ar);
    }
    $str .= ">\n";
    if (isset($header)) {
      $str .= "  <option value=\"\">$header</option>\n";
    }
    foreach ($option_list as $val => $text) {
      $str .= $bVal ? "  <option value=\"$val\"" : "  <option";
      if (isset($selected_value) && ($selected_value === $val || $selected_value === $text)) {
        $str .= $this->xhtml ? ' selected="selected"' : ' selected';
      }
      $str .= ">$text</option>\n";
    }
    $str .= "</select>";

    return $str;
  }

  function endForm()
  {
    return "</form>";
  }

  /**
   * Create a form start tag
   *
   * @param   string $tag     Tag Element
   * @param   array  $attr_ar Array with more tag attribute settings
   *
   * @return  string
   */
  function startTag($tag, $attr_ar = array())
  {
    $this->tag = $tag;
    $str = "<$tag";
    if ($attr_ar) {
      $str .= $this->addAttributes($attr_ar);
    }
    $str .= '>';

    return $str;
  }

  /**
   * Create a form close tag
   *
   * @param   string $tag Tag Element
   *
   * @return  string
   */
  function endTag($tag = '')
  {
    $str = $tag ? "</$tag>" : "</$this->tag>";
    $this->tag = '';

    return $str;
  }
}

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
   * Creates an html link
   *
   * @param    string         | $href       - Source 'href' of anchor
   * @param    string           $text       - Text value of anchor
   * @param    array            $attributes - Array with more tag attribute settings
   * @param    bool             $secure     - True to force https, false to force http
   *
   * @return  string
   */

  public function addAnchorFuel($href, $text = NULL, $attributes = array(), $secure = NULL)
  {
    if (!preg_match('#^(\w+://|javascript:|\#)# i', $href)) {
      $urlparts = explode('?', $href, 2);
      $href = \Uri::create($urlparts[0], array(), isset($urlparts[1]) ? $urlparts[1] : array(), $secure);
    } elseif (!preg_match('#^(javascript:|\#)# i', $href) and is_bool($secure)) {
      $href = http_build_url($href, array('scheme' => $secure ? 'https' : 'http'));

      // Trim the trailing slash
      $href = rtrim($href, '/');
    }

    // Create and display a URL hyperlink
    is_null($text) and $text = $href;

    $attributes['href'] = $href;

    return html_tag('a', $attributes, $text);
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
  public function addImgFuel($src, $attributes = array())
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
  public function addButtonFuel($fieldname, $value = NULL, array $attributes = array())
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
   * @param   string            $name       - Name of Button
   * @param   string            $text       - Text for Button
   * @param   string            $id         - Id for Button
   * @param   string            $class      - Class for Button
   * @param   array             $attributes - Array with more tag attribute settings
   *
   * @return  string
   */
  public function addButton($type, $text, $name = NULL, $id = NULL, $class = NULL, $attributes = array())
  {
    $name = (empty($name) ? '' : ' name="' . $name . '"');
    $id = (empty($id) ? '' : ' id="' . $id . '"');
    $class = (empty($class) ? '' : ' class="' . $class . '"');

    $html = "<button type=\"$type\"" . $name . $id . $class . "";
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
  public function addSubmitFuel($fieldname = 'submit', $value = 'Submit', array $attributes = array())
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
  public function addTextareaFuel($fieldname, $value = NULL, array $attributes = array())
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
  public function addRadioFuel($fieldname, $value = NULL, $id = NULL, $checked = NULL, array $attributes = array())
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
  public function addCheckboxFuel($fieldname, $value = NULL, $id = NULL, $checked = NULL, array $attributes = array())
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
  public function addLabelFuel($label, $id = NULL, array $attributes = array())
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
    $value = (empty($value) ? '' : ' value="' . $value . '"');
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