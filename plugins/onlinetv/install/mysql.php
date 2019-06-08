<?php

/**
 * @description Add data to table 'otv_settings_lang'  - Language of film (Jazykové mutace filmů)
 */
$envodb -> query("INSERT INTO " . DB_PREFIX . "otv_settings_lang VALUES
(1, 'English', 'Angličtina', 'EN'),
(2, 'Svenska', 'Švédština', 'SV'),
(3, 'Deutsch', 'Němčina', 'DE'),
(4, 'Français', 'Francouzština', 'FR'),
(5, 'Nederlands', 'Nizozemština', 'NL'),
(6, 'Pуccкий', 'Ruština', 'RU'),
(7, 'Italiano', 'Italština', 'IT'),
(8, 'Español', 'Španělština', 'ES'),
(9, 'Polski', 'Polština', 'PL'),
(10, 'Tiếng Việt', 'Vietnamština', 'VI'),
(11, '日本語', 'Japonština', 'JA'),
(12, '中文', 'Čínština', 'ZH'),
(13, ' 	Čeština', 'Čeština', 'CS'),
(14, ' 	Slovenčina', 'Slovenština', 'SK')");

/**
 * @description Add data to table 'otv_settings_lang'  - Genre of films (Žánry filmů)
 */
$envodb -> query("INSERT INTO " . DB_PREFIX . "otv_settings_genre VALUES
(1, 'Animation', 'Animovaný'),
(2, 'Action', 'Akční'),
(3, 'Children', 'Dětský'),
(4, 'Adventure', 'Dobrodružný'),
(5, 'Documentary', 'Dokumentární'),
(6, 'Drama', 'Drama'),
(7, 'Fantasy', 'Fantasy'),
(8, 'History', 'Historický'),
(9, 'Horror', 'Horor'),
(10, 'Music', 'Hudební'),
(11, 'Catastrophic', 'Katastrofický'),
(12, 'Comedy', 'Komedie'),
(13, 'Crime', 'Krimi'),
(14, 'Kung-fu', 'Kung-fu'),
(15, 'Musicals', 'Muzikály'),
(16, 'Mystery', 'Mysteriózny'),
(17, 'Psychological', 'Psychologický'),
(18, 'Family', 'Rodinný'),
(19, 'Romantic', 'Romantický'),
(20, 'Sci-Fi', 'Sci-Fi'),
(21, 'Sport', 'Sportovní'),
(22, 'Dancing', 'Taneční'),
(23, 'Thriller', 'Thriller'),
(24, 'War', 'Vojenský'),
(25, 'Western', 'Western'),
(26, 'Biographical', 'Životopisný')");

/**
 * @description Add data to table 'otv_settings_lang'  - Country of film (Země původu)
 */
$envodb -> query("INSERT INTO " . DB_PREFIX . "otv_settings_country VALUES
(1, 'xxxx', 'Česko'),
(2, 'xxxx', 'Francie'),
(3, 'xxxx', 'Hong Kong'),
(4, 'xxxx', 'Itálie'),
(5, 'xxxx', 'Kanada'),
(6, 'xxxx', 'Německo'),
(7, 'xxxx', 'Velká Británie'),
(8, 'xxxx', 'USA')");

?>