<?php header ("Content-Type: text/xml; charset=utf-8"); ?>
<rss version="2.0">
	<channel>
		<title><?=$ENVO_RSS_TITLE?></title>
		<link><?=BASE_URL?></link>
		<description><![CDATA[<?=$ENVO_RSS_DESCRIPTION?>]]></description>
		<language><?=$site_language?></language>
		<pubDate><?=$ENVO_RSS_DATE?></pubDate>
		<generator><?=BASE_URL?></generator>

		<?php if (isset($ENVO_GET_RSS_ITEM) && is_array ($ENVO_GET_RSS_ITEM)) foreach ($ENVO_GET_RSS_ITEM as $rss) { ?>
			<item>
				<title><?=$rss["title"]?></title>
				<link><?=$rss["link"]?></link>
				<description><![CDATA[<?=$rss["description"]?>]]></description>
				<pubDate><?=$rss["created"]?></pubDate>
			</item>
		<?php } ?>

	</channel>
</rss>