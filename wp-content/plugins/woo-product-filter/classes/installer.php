<?php
class InstallerWpf {
	public static $update_to_version_method = '';
	private static $_firstTimeActivated = false;
	public static function init( $isUpdate = false ) {
		global $wpdb;
		$wpPrefix = $wpdb->prefix; /* add to 0.0.3 Versiom */
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$current_version = get_option($wpPrefix . WPF_DB_PREF . 'db_version', 0);
		if (!$current_version) {
			self::$_firstTimeActivated = true;
		}
		/**
		 * Table modules 
		 */
		if (!DbWpf::exist('@__modules')) {
			dbDelta(DbWpf::prepareQuery("CREATE TABLE IF NOT EXISTS `@__modules` (
			  `id` smallint(3) NOT NULL AUTO_INCREMENT,
			  `code` varchar(32) NOT NULL,
			  `active` tinyint(1) NOT NULL DEFAULT '0',
			  `type_id` tinyint(1) NOT NULL DEFAULT '0',
			  `label` varchar(64) DEFAULT NULL,
			  `ex_plug_dir` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`id`),
			  UNIQUE INDEX `code` (`code`)
			) DEFAULT CHARSET=utf8;"));
			DbWpf::query("INSERT INTO `@__modules` (id, code, active, type_id, label) VALUES
				(NULL, 'adminmenu',1,1,'Admin Menu'),
				(NULL, 'options',1,1,'Options'),
				(NULL, 'user',1,1,'Users'),
				(NULL, 'pages',1,1,'Pages'),
				(NULL, 'templates',1,1,'templates'),
				(NULL, 'promo',1,1,'promo'),
				(NULL, 'admin_nav',1,1,'admin_nav'),			  
				(NULL, 'woofilters',1,1,'woofilters'),
				(NULL, 'woofilters_widget',1,1,'woofilters_widget'),
				(NULL, 'mail',1,1,'mail');");
		}
		/**
		 *  Table modules_type 
		 */
		if (!DbWpf::exist('@__modules_type')) {
			dbDelta(DbWpf::prepareQuery('CREATE TABLE IF NOT EXISTS `@__modules_type` (
			  `id` smallint(3) NOT NULL AUTO_INCREMENT,
			  `label` varchar(32) NOT NULL,
			  PRIMARY KEY (`id`)
			) AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;'));
			DbWpf::query("INSERT INTO `@__modules_type` VALUES
				(1,'system'),
				(6,'addons');");
		}
		/**
		 * Table filters
		 */
		if (!DbWpf::exist('@__filters')) {
			dbDelta(DbWpf::prepareQuery('CREATE TABLE IF NOT EXISTS `@__filters` (
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				`title` VARCHAR(128) NULL DEFAULT NULL,
				`setting_data` MEDIUMTEXT NOT NULL,
				PRIMARY KEY (`id`)
			) DEFAULT CHARSET=utf8;'));
		}
		if (version_compare($current_version, '1.3.6') != 1) {
			DbWpf::query('ALTER TABLE `@__filters` MODIFY setting_data MEDIUMTEXT;');
		}
		/**
		* Plugin usage statistwpf
		*/
		if (!DbWpf::exist('@__usage_stat')) {
			dbDelta(DbWpf::prepareQuery("CREATE TABLE `@__usage_stat` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `code` varchar(64) NOT NULL,
			  `visits` int(11) NOT NULL DEFAULT '0',
			  `spent_time` int(11) NOT NULL DEFAULT '0',
			  `modify_timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			  UNIQUE INDEX `code` (`code`),
			  PRIMARY KEY (`id`)
			) DEFAULT CHARSET=utf8"));
			DbWpf::query("INSERT INTO `@__usage_stat` (code, visits) VALUES ('installed', 1)");
		}
		InstallerDbUpdaterWpf::runUpdate();
		if ($current_version && !self::$_firstTimeActivated) {
			self::setUsed();
			// For users that just updated our plugin - don't need tp show step-by-step tutorial
			update_user_meta(get_current_user_id(), WPF_CODE . '-tour-hst', array('closed' => 1));
		}
		update_option($wpPrefix . WPF_DB_PREF . 'db_version', WPF_VERSION);
		add_option($wpPrefix . WPF_DB_PREF . 'db_installed', 1);
	}
	public static function setUsed() {
		update_option(WPF_DB_PREF . 'plug_was_used', 1);
	}
	public static function isUsed() {
		return (int) get_option(WPF_DB_PREF . 'plug_was_used');
	}
	public static function delete() {
		self::_checkSendStat('delete');
		global $wpdb;
		$wpPrefix = $wpdb->prefix;
		$wpdb->query('DROP TABLE IF EXISTS `' . $wpdb->prefix . esc_sql(WPF_DB_PREF) . 'modules`');
		$wpdb->query('DROP TABLE IF EXISTS `' . $wpdb->prefix . esc_sql(WPF_DB_PREF) . 'modules_type`');
		$wpdb->query('DROP TABLE IF EXISTS `' . $wpdb->prefix . esc_sql(WPF_DB_PREF) . 'usage_stat`');
		delete_option($wpPrefix . WPF_DB_PREF . 'db_version');
		delete_option($wpPrefix . WPF_DB_PREF . 'db_installed');
	}
	public static function deactivate() {
		self::_checkSendStat('deactivate');
	}
	private static function _checkSendStat( $statCode ) {
		if (class_exists('FrameWpf') && FrameWpf::_()->getModule('promo') && FrameWpf::_()->getModule('options')) {
			FrameWpf::_()->getModule('promo')->getModel()->saveUsageStat( $statCode );
			FrameWpf::_()->getModule('promo')->getModel()->checkAndSend( true );
		}
	}
	public static function update() {
		global $wpdb;
		$wpPrefix = $wpdb->prefix; /* add to 0.0.3 Versiom */
		$currentVersion = get_option($wpPrefix . WPF_DB_PREF . 'db_version', 0);
		if (!$currentVersion || version_compare(WPF_VERSION, $currentVersion, '>')) {
			self::init( true );
			update_option($wpPrefix . WPF_DB_PREF . 'db_version', WPF_VERSION);
		}
	}
}
