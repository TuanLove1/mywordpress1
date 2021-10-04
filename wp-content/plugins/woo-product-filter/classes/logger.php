<?php
//define( 'WPF_LOG', true );

class LoggerWpf {

	public static function getInstance() {
		static $instance;
		if ( ! $instance ) {
			if ( ! class_exists( 'WP_Filesystem' ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}

			if ( ! \WP_Filesystem() ) {
				echo '<script>console.log("Ошибка подключения WP_Filesystem")</script>';
			}
			global $wp_filesystem;
			$uploadDir = wp_upload_dir();
			$logDir    = "{$uploadDir['basedir']}/wc-logs/";
			if ( ! $wp_filesystem->is_dir( $logDir ) && ! $wp_filesystem->mkdir( $logDir, FS_CHMOD_DIR ) ) {
				echo esc_js("<script>console.log('Не удалось создать каталог {$logDir}')</script>");
			}
			$instance = new LoggerWpf();
		}

		return $instance;
	}

	public static function _() {
		return self::getInstance();
	}

	public function log( $message, $data = '' ) {
		if ( defined( 'WPF_LOG' ) && WPF_LOG === true ) {
			if ( ! is_string( $data ) && ! is_numeric( $data ) ) {
				$data = var_export( $data, true );
			}
			if ( ! function_exists( 'wc_get_logger' ) ) {
				include_once( ABSPATH . PLUGINDIR . '/woocommerce/woocommerce.php' );
			}
			$message = "{$message} \n\n {$data} \n";
			wc_get_logger()->debug( $message, array( '_legacy' => true ) );
			echo esc_js("<script>console.log('{$message}')</script>");
		}
	}
}
