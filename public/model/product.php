<?php
		require "database.php";

		function check_category_id($id_category) {
			global $database;
			$result = $database->query("SELECT * FROM category WHERE category_id = $id_category");

			if ($result->num_rows == 0) {
				return false;
			}
			else {
				return true;
				
			}
		}

		function create_new_product($sku, $active, $id_category, $name, $image, $description, $price, $stock) {
			global $database;

			$result = $database->query("INSERT INTO product(sku, active, id_category, name, image, description, price, stock) VALUES('$sku', $active, $id_category, '$name', '$image', '$description', $price, $stock)");

			if (!$result) {
				error("An error occured while saving the product", 500);
			}
			else {
				return true;
			}

		}

		function get_one_product() {
			
		}
?>