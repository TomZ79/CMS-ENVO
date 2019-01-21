<?php

header('Content-Type: application/rss+xml; charset=utf-8');
echo '<?xml version="1.0" encoding="utf-8"?>';

?>

<rss version="2.0">
	<channel>
		<?php
		// Channel Title - The name of the channel
		// Example: <title>TutorialsPoint</title>
		echo '<title>' . $ENVO_RSS_TITLE . '</title>';

		// Channel Title Link (URL) - This is the link to your home page and required for a channel
		// Example: <link>http://www.tutorialspoint.com</link>
		echo '<link>' . BASE_URL . '</link>';

		// Channel Description - A channel will have a description tag
		echo '<description><![CDATA[' . $ENVO_RSS_DESCRIPTION . ']]></description>';

		// Channel Language - This specifies the language of your channel (website).
		// Example: <language>en-us</language>
		echo '<language>' . $site_language . '</language>';

		// Publication Date - This tag is allowed in an RSS 2.0 file. The publication date for the content in the channel.
		// Example: <pubDate>Fri, 30 May 2003 11:06:42 GMT</pubDate>
		echo '<pubDate>' . $ENVO_RSS_DATE . '</pubDate>';

		//
		// Example: <generator>Weblog Editor 2.0</generator>
		echo '<generator>' . BASE_URL . '</generator>';

		if (isset($ENVO_GET_RSS_ITEM) && is_array($ENVO_GET_RSS_ITEM)) foreach ($ENVO_GET_RSS_ITEM as $rss) {

			// Start Item Tag
			echo '<item>';

			// Item Title - The title of the item. It is optional to use this tag.
			echo '<title>' . $rss["title"] . '</title>';

			// Item Link (URL) - The URL of the item. It is optional to use this tag.
			echo '<link>' . $rss["link"] . '</link>';

			// Item Description - The item synopsis. It is optional to use this tag.
			echo '<description><![CDATA[' . $rss["description"] . ']]></description>';

			// Item Publication Date - Its value is a date, indicating when the item was published. If it's a date in the future, aggregators may choose not to display the item until that date.
			echo '<pubDate>' . $rss["created"] . '</pubDate>';

			// End Item Tag
			echo '</item>';
		}

		?>

	</channel>
</rss>