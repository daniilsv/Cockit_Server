<?php

	class Config {

		private static $data = [
			"db_host" => "localhost",
		];

		public static function get($name) {
			if (!ake($name, self::$data)) {
				return "";
			}

			return self::$data[$name];
		}

		public static function set($name, $value) {
			self::$data[$name] = $value;
		}

	}
