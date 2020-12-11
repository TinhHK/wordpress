<?php
define('WP_SITEURL', 'http://theme.local'); // back-end
define('WP_HOME', 'http://theme.local'); // front-end

define('WP_PLUGIN_DIR', dirname(__FILE__).'/wp-content/plugins');
define('WP_PLUGIN_URL', 'http://theme.local/wp-content/plugins');

define('WP_POST_REVISIONS', 2);
define('AUTOSAVE_INTERVAL', 150);
//display query
define('SAVEQUERIES', true);
// set memory, notice that u must set memory_limit in php.ini first
define('WP_MEMORY_LIMIT', '128M');
define('WPLANG', 'en-US');
define('DISALLOW_FILE_EDIT', false);
