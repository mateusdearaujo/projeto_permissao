<?php

	class Documentos {

		private $pdo;

		public function __construct($pdo) {
			$this->pdo = $pdo;
		}

		public function getDocumentos() {
			$array = array();

			$sql = $this->pdo->query("SELECT * FROM documentos");
			$sql->execute();

			if($sql->rowCount() > 0) {
				$array = $sql->fetchAll();
			}

			return $array;
		}

	}

?>