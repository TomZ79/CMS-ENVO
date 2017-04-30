<?php include "header.php"; ?>

  <div class="row">
    <div class="col-md-12">
      <?php

      // returns <!DOCTYPE html>
      echo $Html->addDoctype('html5');

      echo '<hr>';
      // Add Html Element -> endTag (Arguments: name, content)

      // returns <meta name="description" content="Meta Example!" />
      echo $Html->addMeta('description', 'Meta Example!');

      // returns <meta name="robots" content="no-cache" />
      echo $Html->addMeta('robots', 'no-cache');

      $meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'content' => 'Meta Example'),
        array('name' => 'keywords', 'content' => 'fuel, rocks'),
      );

      //returns <meta name="robots" content="no-cache" />
      //returns <meta name="description" content="Meta Example!" />
      //returns <meta name="keywords" content="fuel, rocks" />
      echo $Html->addMeta($meta);

      echo '<hr>';

      // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)

      // returns <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css">
      echo $Html->addStylesheet('assets/plugins/pace/pace-theme-flash.css');

      echo '<hr>';

      // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
      // Add Html Element -> endTag (Arguments: tag)

      // returns <strong>Text in tag</strong>
      echo $Html->startTag('strong') . 'Text in tag' . $Html->endTag('strong');

      // returns <strong style="color:red">Text in tag</strong>
      echo $Html->startTag('strong', array ('style' => 'color:red')) . 'Text in tag' . $Html->endTag('strong');

      echo '<hr>';

      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)

      // returns <a href="http://www.antenykarlovyvary.cz/admin/">Text in anchor</a>
      echo $Html->addAnchor(BASE_URL, 'Text in anchor');

      // returns <a href="http://www.antenykarlovyvary.cz/admin/" class="plugHelp">Text in anchor</a>
      echo $Html->addAnchor(BASE_URL, 'Text in anchor', '', 'plugHelp');

      // returns <a href="http://www.antenykarlovyvary.cz/admin/" id="cmshelp" class="plugHelp">Text in anchor</a>
      echo $Html->addAnchor(BASE_URL, 'Text in anchor', 'cmshelp', 'plugHelp');

      // returns <a href="http://www.antenykarlovyvary.cz/admin/" id="cmshelp" class="plugHelp" style="color:red">Text in anchor</a>
      echo $Html->addAnchor(BASE_URL, 'Text in anchor', 'cmshelp', 'plugHelp',  array ('style' => 'color:red'));


      echo '<hr>';

      // Add Html Element -> addImg (Arguments: src, optional assoc. array)

      // returns <img src="http://example.com/path/to/image.png" alt="image.png" />
      echo $Html->addImg('/_files/swiss_made.jpg');

      // returns <img src="http://example.com/path/to/image.png" alt="Alt Message" class="myclass" />
      echo $Html->addImg('/_files/red_dragon.jpg', array("alt" => "Alt Message", 'class' => "myclass"));

      echo '<hr>';

      // Add Html Element -> addButtonF (Arguments: fieldname, value, optional assoc. array)

      // returns <button type="button" class="btn btn-success" name="subject">Value</button>
      echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success'));

      // returns <button type="button" class="btn btn-success" style="color:black" name="subject">Value</button>
      echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success', 'style' => 'color:black'));

      // returns <button type="button" class="btn btn-success" disabled="disabled" name="subject">Value</button>
      echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success', 'disabled' => 'disabled'));

      echo '<hr>';

      // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)

      // returns <button type="button" name="button" class="btn btn-success">Button</button>
      echo $Html->addButton('button', '', 'Button', 'button', 'btn btn-success');


      echo '<hr>';

      // Add Html Element -> addSubmitF (Arguments: fieldname, value, optional assoc. array)

      // returns <button name="submit" value="Submit" type="submit">Submit</button>
      echo $Html->addSubmitF();

      // returns <button name="submit" value="Submit" id="a1" class="sample" style="color:red" type="submit">Submit</button>
      echo $Html->addSubmitF('submit', 'Submit', array('id' => 'a1', 'class' => 'sample', 'style' => 'color:red'));

      echo '<hr>';

      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)

      // returns <button type="submit" name="submit">Submit</button>
      echo $Html->addButtonSubmit();

      // returns <button type="submit" name="save" class="btn btn-success"><i class="fa fa-save m-r-5"></i> Submit</button>
      echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i> Submit', '', 'btn btn-success');

      // returns <button type="submit" name="save" class="btn btn-success" style="color:red"><i class="fa fa-save m-r-5"></i> Submit</button>
      echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i> Submit', '', 'btn btn-success', array('style' => 'color:red'));

      echo '<hr>';

      // Add Html Element -> addTextareaF (Arguments: fieldname, value, optional assoc. array)

      //returns <textarea rows="4" cols="12" name="editor">Text for textarea</textarea>
      echo $Html->addTextareaF('editor', 'Text for textarea', array('rows' => 4, 'cols' => 12));

      //returns <textarea id="editor" class="form-control" maxlength="400" name="editor">Text for textarea</textarea>
      echo $Html->addTextareaF('editor', 'Text for textarea', array('id' => 'editor', 'class' => 'form-control', 'maxlength' => '400'));

      echo '<hr>';

      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)

      // returns <textarea name="content">Text for textarea</textarea>
      echo $Html->addTextarea('content', 'Text for textarea');

      // returns <textarea name="content" id="editor" class="form-control">Text for textarea</textarea>
      echo $Html->addTextarea('content', 'Text for textarea', '', '', array('id' => 'editor', 'class' => 'form-control'));

      echo '<hr>';

      // Add Html Element -> addLabelF (Arguments: label, id, optional assoc. array)
      // Add Html Element -> addRadioF (Arguments: fieldname, value, id, checked, optional assoc. array)

      // returns
      // <label for="gender1">Male</label>
      // <input name="gender" value="Female" id="gender1" type="radio">
      echo $Html->addLabelF('Male', 'gender1');
      echo $Html->addRadioF('gender', 'Female','gender1');

      // returns
      // <label for="gender2">Female</label>
      // <input name="gender" value="Male" checked="checked" id="gender2" type="radio">
      echo $Html->addLabelF('Female', 'gender2');
      echo $Html->addRadioF('gender', 'Male', 'gender2', true);

      echo '<hr>';

      // Add Html Element -> addLabelF (Arguments: label, id, optional assoc. array)
      // Add Html Element -> addCheckboxF (Arguments: fieldname, value, id, checked, optional assoc. array)

      // returns
      // <label for="gender3">Male</label>
      // <input name="gender" value="Male" id="gender3" type="checkbox">
      echo $Html->addLabelF('Male', 'gender3');
      echo $Html->addCheckboxF('gender', 'Male', 'gender3');

      // returns
      // <label for="gender4">Female</label>
      // <input name="gender" value="Female" checked="checked" id="gender4" type="checkbox">
      echo $Html->addLabelF('Female', 'gender4');
      echo $Html->addCheckboxF('gender', 'Female', 'gender4', true);

      echo '<hr>';

      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)

      // returns
      // <label for="gender5">Female</label>
      // <input name="gender" id="gender5" value="Female" checked="checked" type="radio">
      echo $Html->addLabel('gender5', 'Female');
      echo $Html->addRadio('gender', 'Female', true, 'gender5');

      // returns
      // <label for="gender6">Male</label>
      // <input name="gender" id="gender6" value="Male" type="radio">
      echo $Html->addLabel('gender6', 'Male');
      echo $Html->addRadio('gender', 'Male', '', 'gender6');

      echo '<hr>';

      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)

      // returns
      // <label for="gender7">Female</label>
      // <input name="gender" id="gender7" value="Female" checked="checked" type="checkbox">
      echo $Html->addLabel('gender7', 'Female');
      echo $Html->addCheckbox('gender', 'Female', true, 'gender7');

      // returns
      // <label for="gender8">Male</label>
      // <input name="gender" id="gender8" value="Male" type="checkbox">
      echo $Html->addLabel('gender8', 'Male');
      echo $Html->addCheckbox('gender', 'Male', '', 'gender8');

      echo '<hr>';

      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)

      // returns <input name="text" id="text" value="Text for textinput" type="text">
      echo $Html->addInput('text', 'text', 'Text for textinput');

      echo '<hr>';

      /* returns
      <ul id="todo" class="pending">
        <li>red</li>
        <li>blue</li>
        <li>green</li>
        <li>yellow</li>
      </ul>
      */
      $items = array('red', 'blue', 'green', 'yellow');
      $attr = array('id' => 'todo','class' => 'pending');
      echo $Html->addUl($items, $attr);

      echo '<hr>';

      /* returns
      <ul class="order">
          <li>colors
              <ul>
                  <li>blue</li>
                  <li>red</li>
                  <li>green</li>
              </ul>
          </li>
          <li>sky</li>
          <li>tools
              <ul>
                  <li>screwdriver</li>
                  <li>hammer</li>
              </ul>
          </li>
      </ul>
      */
      $items = array(
        'colors' => array('blue', 'red', 'green'),
        'sky',
        'tools' => array('screwdriver','hammer')
      );
      $attr = array('class' => 'order');
      echo $Html->addUl($items, $attr);

      echo '<hr>';

      /* returns
      <ol id="todo" class="pending">
          <li>red</li>
          <li>blue</li>
          <li>green</li>
          <li>yellow</li>
      </ol>
      */
      $items = array('red', 'blue', 'green', 'yellow');
      $attr = array('id' => 'todo','class' => 'pending');
      echo $Html->addOl($items, $attr);

      echo '<hr>';

      /* returns
      <ol class="order">
          <li>colors
              <ol>
                  <li>blue</li>
                  <li>red</li>
                  <li>green</li>
              </ol>
          </li>
          <li>sky</li>
          <li>tools
              <ol>
                  <li>screwdriver</li>
                  <li>hammer</li>
              </ol>
          </li>
      </ol>
      */
      $items = array(
        'colors' => array('blue', 'red', 'green'),
        'sky',
        'tools' => array('screw driver','hammer'));
      $attr = array('class' => 'order');
      echo $Html->addOl($items, $attr);

      echo '<hr>';

      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)

      // returns <div></div>
      echo $Html->addDiv();

      // returns <div>Text in div</div>
      echo $Html->addDiv('Text in div');

      // returns <div id="color">Text in div</div>
      echo $Html->addDiv('Text in div', 'color');

      // returns <div id="color" style="color:red">Text in div</div>
      echo $Html->addDiv('Text in div', 'color',  array ('style' => 'color:red'));

      // returns <div id="color" style="color:red">Text in div</div>
      echo $Html->addDiv('Text in div', 'color',  array ('style' => 'color:red'));

      echo '<hr>';

      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)

      // returns Defines a table caption
      echo $Html->addTag('caption', 'Defines a table caption');

      // returns <code>Defines a piece of computer code</code>
      echo $Html->addTag('code', 'Defines a piece of computer code');

      // returns <del>Defines text that has been deleted from a document</del>
      echo $Html->addTag('del', 'Defines text that has been deleted from a document');

      // returns <figcaption>Defines a caption for a &lt;figure&gt; element</figcaption>
      echo $Html->addTag('figcaption', 'Defines a caption for a &lt;figure&gt; element');

      // returns <h1>Defines HTML headings</h1>
      echo $Html->addTag('h1', 'Defines HTML headings');

      // returns <h2>Defines HTML headings</h2>
      echo $Html->addTag('h2', 'Defines HTML headings');

      // returns <h3>Defines HTML headings</h3>
      echo $Html->addTag('h3', 'Defines HTML headings');

      // returns <h4>Defines HTML headings</h4>
      echo $Html->addTag('h4', 'Defines HTML headings');

      // returns <h5>Defines HTML headings</h5>
      echo $Html->addTag('h5', 'Defines HTML headings');

      // returns <h6>Defines HTML headings</h6>
      echo $Html->addTag('h6', 'Defines HTML headings');

      // returns <i>Defines a part of text in an alternate voice or mood</i>
      echo $Html->addTag('i', 'Defines a part of text in an alternate voice or mood');

      // returns <iframe src="https://www.w3schools.com"></iframe>
      echo $Html->addTag('iframe', '', '',  array ('src' => 'https://www.w3schools.com'));

      // returns <ins>Defines a text that has been inserted into a document</ins>
      echo $Html->addTag('ins', 'Defines a text that has been inserted into a document');

      // returns <ins>Defines a text that has been inserted into a document</ins>
      echo $Html->addTag('label', 'Defines a label for an &lt;input&gt; element', '',  array ('for' => 'male'));

      // returns <legend>Defines a caption for a &lt;fieldset&gt; element</legend>
      echo $Html->addTag('legend', 'Defines a caption for a &lt;fieldset&gt; element');

      // returns <option value="volvo">Defines an option in a drop-down list</option>
      echo $Html->addTag('option', 'Defines an option in a drop-down list', '',  array ('value' => 'volvo'));

      // returns <p>Defines a paragraph</p>
      echo $Html->addTag('p', 'Defines a paragraph');

      // returns <pre>Defines preformatted text</pre>
      echo $Html->addTag('pre', 'Defines preformatted text');

      // returns <q>Defines a short quotation</q>
      echo $Html->addTag('q', 'Defines a short quotation');

      // returns <s>Defines text that is no longer correct</s>
      echo $Html->addTag('s', 'Defines text that is no longer correct');

      // returns <samp>Defines sample output from a computer program</samp>
      echo $Html->addTag('samp', 'Defines sample output from a computer program');

      // returns <small>Defines smaller text</small>
      echo $Html->addTag('small', 'Defines smaller text');

      // returns <span>Defines a section in a document</span>
      echo $Html->addTag('span', 'Defines a section in a document');

      // returns <strong>Defines important text</strong>
      echo $Html->addTag('strong', 'Defines important text');

      // returns <sub>Defines subscripted text</sub>
      echo $Html->addTag('sub', 'Defines subscripted text');

      // returns <sup>Defines superscripted text</sup>
      echo $Html->addTag('sup', 'Defines superscripted text');

      // returns <th>Defines a header cell in a table</th>
      echo $Html->addTag('th', 'Defines a header cell in a table');

      // returns <td>Defines a cell in a table</td>
      echo $Html->addTag('td', 'Defines a cell in a table');

      // returns <textarea>Defines a cell in a table</textarea>
      echo $Html->addTag('textarea', 'Defines a multiline input control (text area)');

      // returns <u>Defines text that should be stylistically different from normal text</u>
      echo $Html->addTag('u', 'Defines text that should be stylistically different from normal text');

      ?>

    </div>
  </div>

<?php include "footer.php"; ?>
