<?php

class ENVO_todo
{

  /* An array that stores the todo item data: */

  private $data;

  /* The constructor */
  public function __construct($par)
  {
    if (is_array($par))
      $this->data = $par;
  }

  /*
    This is an in-build "magic" method that is automatically called
    by PHP when we output the ToDo objects with echo.
  */

  public static function edit($id, $text)
  {

    $text = smartsql($text);
    if (!$text) throw new Exception("Wrong update text!");

    global $envodb;
    $envodb->query('UPDATE ' . DB_PREFIX . 'todo_list SET text="' . $text . '" WHERE id=' . $id);

    if ($envodb->affected_rows != 1)
      throw new Exception("Couldn't update item!");
  }


  /*
    The following are static methods. These are available
    directly, without the need of creating an object.
  */


  /*
    The edit method takes the ToDo item id and the new text
    of the ToDo. Updates the database.
  */

  public static function done($id)
  {

    global $envodb;
    $envodb->query('UPDATE ' . DB_PREFIX . 'todo_list SET work_done = IF (work_done = 1, 0, 1) WHERE id=' . $id);

    if ($envodb->affected_rows != 1)
      throw new Exception("Couldn't update item!");
  }

  /* Done mode marks the ToDo as done */

  public static function delete($id)
  {

    global $envodb;
    $envodb->query('DELETE FROM ' . DB_PREFIX . 'todo_list WHERE id=' . $id);

    if ($envodb->affected_rows != 1)
      throw new Exception("Couldn't delete item!");
  }

  /*
    The delete method. Takes the id of the ToDo item
    and deletes it from the database.
  */

  public static function rearrange($key_value)
  {

    $updateVals = array();
    foreach ($key_value as $k => $v) {
      $strVals[] = 'WHEN ' . (int)$v . ' THEN ' . ((int)$k + 1) . PHP_EOL;
    }

    if (!$strVals) throw new Exception("No data!");

    // We are using the CASE SQL operator to update the ToDo positions en masse:
    global $envodb;
    $result = $envodb->query('UPDATE ' . DB_PREFIX . 'todo_list SET position = CASE id
						' . join($strVals) . '
						ELSE position
						END');

    if (!$result)
      throw new Exception("Error updating positions!");
  }

  /*
    The rearrange method is called when the ordering of
    the todos is changed. Takes an array parameter, which
    contains the ids of the todos in the new order.
  */

  public static function createNew($text)
  {

    $text = smartsql($text);
    if (!$text) throw new Exception("Wrong input data!");

    global $envodb;
    $posResult = $envodb->queryRow('SELECT MAX(position) + 1 FROM ' . DB_PREFIX . 'todo_list');

    if ($envodb->affected_rows > 0)
      list($position) = $posResult;

    if (!$position) $position = 1;

    $envodb->query('INSERT INTO ' . DB_PREFIX . 'todo_list SET text = "' . $text . '", position = ' . $position . ', adminid = ' . ENVO_USERID);

    if ($envodb->affected_rows != 1)
      throw new Exception("Error inserting ToDo!");

    // Creating a new ToDo and outputting it directly:
    echo(new ENVO_todo(array(
      'id'      => $envodb->envo_last_id(),
      'adminid' => ENVO_USERID,
      'text'    => $text
    )));

    exit;
  }

  /*
    The createNew method takes only the text of the todo,
    writes to the databse and outputs the new todo back to
    the AJAX front-end.
  */

  public function __toString()
  {

    // The string we return is outputted by the echo statement

    $actionB = '<div class="pull-right actions">';

    if ($this->data['adminid'] == ENVO_USERID) {

      $actionB .= '<a href="#" class="btn btn-default btn-xs edit"><i class="fa fa-pencil"></i></a><a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i></a>';

    }

    if (isset($this->data['work_done']) && $this->data['work_done'] == 1) {

      $actionB .= '<a href="#" class="btn btn-default btn-xs done"><i class="fa fa-check"></i></a>';

    } else {

      $actionB .= '<a href="#" class="btn btn-default btn-xs notdone"><i class="fa fa-check"></i></a>';

    }

    $actionB .= '</div>';


    if (isset($this->data['work_done']) && $this->data['work_done'] == 1) {

      $textT = '<div class="pull-left text"><span style="text-decoration: line-through; color: #CCC;">' . $this->data['text'] . '</span></div>';

    } else {

      $textT = '<div class="pull-left text"><span>' . $this->data['text'] . '</span></div>';

    }

    return '<li id="todo-' . $this->data['id'] . '" class="row todo">

				<div class="col-md-12">

				' . $textT . $actionB . '

				</div>

			</li>';
  }

} // closing the class definition

?>