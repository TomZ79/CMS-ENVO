<?php

include_once 'class.rewrite.php';

class ENVO_base
{
	protected $table = '', $itemid = '', $select = '', $where = '', $dseo        = '';
	private                                                         $data        = array ();
	private                                                         $usraccesspl = array ();
	private                                                         $case;
	private                                                         $envovar;
	private                                                         $envovar1;


	/**
	 * EN: ENVO_base constructor. This constructor can be used for all classes
	 * CZ: ENVO_base constructor.
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param array $options
	 *
	 */
	public function __construct (array $options)
	{

		foreach ($options as $k => $v) {
			if (isset($this -> $k)) {
				$this -> $k = $v;
			}
		}
	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $str
	 * @param array $options
	 * @return string
	 *
	 */
	public static function envoCleanurl ($str, $options = array ())
	{

		$defaults = array (
			'delimiter'     => '-',
			'limit'         => NULL,
			'lowercase'     => TRUE,
			'replacements'  => array (),
			'transliterate' => TRUE,
		);

		// Merge options
		$options = array_merge($defaults, $options);

		$char_map = array (
			// Latin
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
			'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
			'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
			'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
			'ß' => 'ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
			'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
			'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
			'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
			'ÿ' => 'y',

			// Latin symbols
			'©' => '(c)',

			// Greek
			'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
			'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
			'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
			'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
			'Ϋ' => 'Y',
			'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
			'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
			'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
			'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
			'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

			// Turkish
			'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
			'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

			// Russian
			'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
			'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
			'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
			'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
			'Я' => 'Ya',
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
			'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
			'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
			'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
			'я' => 'ya',

			// Ukrainian
			'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
			'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

			// Czech
			'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
			'Ž' => 'Z',
			'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
			'ž' => 'z',

			// Polish
			'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
			'Ż' => 'Z',
			'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
			'ż' => 'z',

			// Latvian
			'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
			'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
			'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
			'š' => 's', 'ū' => 'u', 'ž' => 'z'
		);

		// Make custom replacements
		if (!empty($options['replacements'])) {
			$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
		}

		// Transliterate characters to ASCII
		if ($options['transliterate']) {
			$str = str_replace(array_keys($char_map), $char_map, $str);
		}

		// Replace non-alphanumeric characters with our delimiter
		$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

		// Remove duplicate delimiters
		$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

		// Truncate slug to max. characters
		$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

		// Remove delimiter from ends
		$str = trim($str, $options['delimiter']);

		return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;

	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $envovar
	 * @return mixed|string
	 *
	 */
	public static function envoUnCleanurl ($envovar)
	{

		$envovar = strip_tags($envovar);
		$envovar = strtolower($envovar);
		$crepl   = array ("ä", "ö", "ü", "Ä", "Ü", "Ö", "é", "à", "è", "ô");
		$cfin    = array ('au', 'oe', 'ue', 'au', 'oe', 'ue', 'e', 'a', 'e', 'o');
		$envovar = str_replace($cfin, $crepl, $envovar);

		return $envovar;

	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $mysqlstamp
	 * @param $date
	 * @param $time
	 * @param $lang
	 * @return false|string
	 *
	 */
	public static function envoTimesince ($mysqlstamp, $date, $time, $lang)
	{

		global $setting;

		$today    = time(); /* Current unix time  */
		$unixtime = strtotime($mysqlstamp);
		$since    = $today - $unixtime;

		if ($setting["time_ago_show"] && $since < 900000) {

			$lang = explode(",", $lang);
			// Parse custom date format similar to original question
			$replydate = new DateTime($mysqlstamp);

			// Calculate DateInterval (www.php.net/manual/en/class.dateinterval.php)
			$diff = $replydate -> diff(new DateTime());

			if ($diff -> m >= 1) {
				return date($date . $time, $mysqlstamp);
			}

			if ($v = $diff -> d >= 1) {
				$timeago = ENVO_base ::pluralize($diff -> d, $lang[0], $lang[4]);
			} elseif ($v = $diff -> h >= 1) {
				$timeago = ENVO_base ::pluralize($diff -> h, $lang[1], $lang[5]);
			} elseif ($v = $diff -> i >= 1) {
				$timeago = ENVO_base ::pluralize($diff -> i, $lang[2], $lang[6]);
			} else {
				$timeago = ENVO_base ::pluralize($diff -> s, $lang[3], $lang[7]);
			}

			return sprintf($lang[8], $timeago);

		} else {
			return date($date . $time, $unixtime);
		}

	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $count
	 * @param $text
	 * @param $plural
	 * @return string
	 *
	 */
	public static function pluralize ($count, $text, $plural)
	{
		return $count . (($count == 1) ? (" $text") : (" ${plural}"));
	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @return array
	 *
	 */
	public static function envoGetallcategories ()
	{

		global $envodb;
		$result = $envodb -> query('SELECT id, name, varname, exturl, catimg, content, metadesc, metakey, showmenu, showfooter, catparent, catorder, pageid, activeplugin, permission, pluginid FROM ' . DB_PREFIX . 'categories WHERE ((pageid > 0 AND activeplugin = 1) OR (pageid = 0 AND pluginid > 0) OR (exturl != "" AND pageid = 0 AND pluginid = 0)) ORDER BY catorder ASC');

		while ($row = $result -> fetch_assoc()) {

			$permission = explode(',', $row['permission']);

			if (in_array(ENVO_USERGROUPID, $permission) || $row['permission'] == 0) {

				if ($row['catorder'] == 1 && $row['showmenu'] == 1 && $row['catparent'] == 0) {
					$parseurl = ENVO_rewrite ::envoParseurl('', '', '', '', '');
				} else if ($row['varname'] && !$row['exturl']) {
					$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], '', '', '', '');
				} else if ($row['exturl']) {
					$parseurl = $row['exturl'];
				} else {
					$parseurl = ENVO_rewrite ::envoParseurl('', '', '', '', '');
				}

				$envodata[] = array (
					'id'           => $row['id'],
					'name'         => $row['name'],
					'varname'      => $parseurl,
					'pagename'     => $row['varname'],
					'content'      => $row['content'],
					'metadesc'     => $row['metadesc'],
					'metakey'      => $row['metakey'],
					'showmenu'     => $row['showmenu'],
					'showfooter'   => $row['showfooter'],
					'catorder'     => $row['catorder'],
					'catimg'       => $row['catimg'],
					'catparent'    => $row['catparent'],
					'activeplugin' => $row['activeplugin'],
					'pluginid'     => $row['pluginid'],
					'pageid'       => $row['pageid']
				);
			}

		}

		return $envodata;

	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $where
	 * @param $where1
	 * @param $table
	 * @param $usergroup
	 * @param $dseo
	 * @return array
	 *
	 */
	public static function envoGetcatmix ($where, $where1, $table, $usergroup, $dseo)
	{

		$envodata = array ();
		global $envodb;
		$result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE active = 1 ORDER BY catorder ASC');
		while ($row = $result -> fetch_assoc()) {

			if (envo_get_access($usergroup, $row['permission']) || $row['permission'] == 0) {

				// There should be always a varname in categories and check if seo is valid
				$seo = '';
				if ($dseo) {
					$seo = $row['varname'];
				}

				$row['parseurl'] = ENVO_rewrite ::envoParseurl($where, 'category', $row['id'], $seo, '');

				if ($where1) {
					$row['parseurl1'] = ENVO_rewrite ::envoParseurl($where1, $where, $row['id'], '', '');
				}

				// EN: Insert each record into array
				// CZ: Vložení získaných dat do pole
				$envodata[] = $row;

			}
		}

		return $envodata;
	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $envovar
	 * @param $usraccesspl
	 * @param $catarray
	 * @return array
	 *
	 */
	public static function envoCatdisplay ($envovar, $usraccesspl, $catarray)
	{

		$case = array ();
		if (isset($catarray) && !empty($catarray)) foreach ($catarray as $c) {
			if ($c['pluginid'] == 0 || in_array($c['pluginid'], $usraccesspl))
				$case[] = $c;
		}

		return $case;

	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $id
	 * @param $catarray
	 * @return mixed
	 *
	 */
	public static function envoCatpluginvar ($id, $catarray)
	{

		$getc = $catarray;

		foreach ($getc as $c) {
			if ($c['id'] == $id)
				$case = $c['pagename'];

		}

		return $case;

	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $envovar
	 * @param $envovar1
	 *
	 */
	public static function envoUpdatehits ($envovar, $envovar1)
	{

		global $envodb;
		$result = $envodb -> query('UPDATE ' . $envovar1 . ' SET hits = hits + 1 WHERE id = "' . smartsql($envovar) . '"');

	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @return bool
	 *
	 */
	public static function envoSessionTimeLimit ()
	{

		// Start the session
		session_start();

		// Set new after 10 minutes
		$inactive = 600;

		// check to see if $_SESSION['timeout'] is set
		if (isset($_SESSION['timeout'])) {
			$session_life = time() - $_SESSION['timeout'];

			if ($session_life > $inactive) {

				$loadnew = FALSE;

				// Write the session timeout new, because the 10 minutes are over
				$_SESSION['timeout'] = time();
			} else {

				$loadnew = TRUE;
			}
		} else {

			// Write the session timeout new
			$_SESSION['timeout'] = time();

		}

		return $loadnew;
	}

	/**
	 * EN:
	 * CZ:
	 *
	 * @author  Thomas Zukal
	 * @version 1.0.0
	 * @date    09/2017
	 *
	 * @param $pass
	 * @param $table
	 * @param $id
	 * @return bool
	 *
	 */
	public static function envoCheckProtectedArea ($pass, $table, $id)
	{

		global $envodb;
		$envodb -> query('SELECT id FROM ' . DB_PREFIX . $table . ' WHERE password = "' . $pass . '" AND id = ' . $id . ' AND active = 1');
		if ($envodb -> affected_rows > 0) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

}

?>