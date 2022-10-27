<?php

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Factory\AppFactory;

	$app->get("/Products", function (Request $request, Response $response, $args) {

		//Check the client's authentication.
		require "controller/require_authentication.php";

		$products = get_all_products();

		if (is_string($products)) {
			error($products, 500);
		}
		else {
			echo json_encode($products);
		}
		return $response;
	});
?>