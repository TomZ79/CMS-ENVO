<?php

/* Create custom exception classes */

class ConnectException extends Exception
{
}

class QueryException extends Exception
{
}

class ENVO_mysql extends mysqli
{

	private $host;
	private $username;
	private $passwd;
	private $dbname;
	private $dbport;

	/**
	 * ENVO_mysql constructor.
	 * @param string $host
	 * @param string $username
	 * @param string $passwd
	 * @param string $dbname
	 * @param int $dbport
	 */
	function __construct ($host, $username, $passwd, $dbname, $dbport)
	{
		parent ::__construct($host, $username, $passwd, $dbname, $dbport);

		/* Throw an error if the connection fails */
		if (mysqli_connect_error()) {
			//throw new ConnectException(mysqli_connect_error(), mysqli_connect_errno());
			$this -> envo_throw_error(mysqli_connect_error(), mysqli_connect_errno());
		}
	}

	/**
	 * @param string $msg
	 */
	public function envo_throw_error ($msg = '')
	{
		?>
		<table align="center" border="1" cellspacing="0" style="background:white;color:black;width:80%;">
			<tr>
				<th colspan=2>DB Error</th>
			</tr>
			<tr>
				<td align="right" valign="top">Message:</td>
				<td><?= $msg ?></td>
			</tr>
			<?php if (strlen($this -> error) > 0) echo '<tr><td align="right" valign="top" nowrap>MySQL Error:</td><td>' . $this -> error . '</td></tr>'; ?>
			<tr>
				<td align="right">Date:</td>
				<td><?= date("l, F j, Y \a\\t g:i:s A") ?></td>
			</tr>
			<tr>
				<td align="right">Script:</td>
				<td><a href="<?= @$_SERVER['REQUEST_URI'] ?>"><?= @$_SERVER['REQUEST_URI'] ?></a></td>
			</tr>
			<?php if (strlen(@$_SERVER['HTTP_REFERER']) > 0) echo '<tr><td align="right">Referer:</td><td><a href="' . @$_SERVER['HTTP_REFERER'] . '">' . @$_SERVER['HTTP_REFERER'] . '</a></td></tr>'; ?>
		</table>
		<?php
		exit;
	}

	/**
	 * @param $query
	 * @return array|null
	 */
	public function queryRow ($query)
	{
		$result   = parent ::query($query);
		$envodata = mysqli_fetch_array($result, MYSQLI_BOTH);

		return $envodata;
	}

	/**
	 * @param string $sql | SQL to execute
	 * @param null $resultmode
	 * @return bool|mysqli_result
	 */
	public function query ($sql, $resultmode = NULL)
	{
		// on with query execution, call the parent query method
		// call it with @ operator, to supress error messages
		$result = parent ::query($sql);
		//
		if (mysqli_error($this)) {
			// throw new QueryException(mysqli_error($this), mysqli_errno($this));
			$this -> envo_throw_error("<b>MySQL Query fail:</b> $sql");
		}
		// if everything is OK, return the mysqli_result object
		// that is returned from parent query method
		return $result;
	}

	/**
	 * @return mixed
	 */
	public function envo_last_id ()
	{
		return $this -> insert_id;
	}

	/**
	 *
	 */
	public function envo_close ()
	{
		if (!@mysqli_close($this)) {
			$this -> envo_throw_error("<b>MySQL Close failed</b>");
		}
	}
}

?>