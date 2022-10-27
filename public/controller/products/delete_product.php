<?php

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Factory\AppFactory;
	
	$app->delete("/Product/{product_id}", function (Request $request, Response $response, $args) {

		//Check the client's authentication.
		require "controller/require_authentication.php";

		$product = delete_product($args["product_id"]);

		if (is_string($product)) {
			error($products, 500);
		}
		else if (!$product) {
			error("There exists no product with the id '" . $args["product_id"] . "'.", 404);
		}
		else {
			echo json_encode($product);
		}
		return $response;
	});
?>