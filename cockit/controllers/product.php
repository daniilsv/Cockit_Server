<?php

	class product extends Controller {

		public function actionGet($search) {
			setJson();
			return $this->getAp(urldecode($search));
		}

		private function getAp($value) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, [
				"Host" => "calorizator.ru",
				"Origin" => "http://www.calorizator.ru",
				"X-Requested-With" => "XMLHttpRequest",
				"Referer" => "http://www.calorizator.ru/analyzer/products"
			]);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, [
				"value" => $value
			]);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36");
			curl_setopt($ch, CURLOPT_URL, "http://www.calorizator.ru/widgets/c_ap.php");
			$return = curl_exec($ch);
			curl_close($ch);
			return json_decode($return, true);
		}

	}