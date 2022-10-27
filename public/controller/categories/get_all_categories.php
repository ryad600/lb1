<?php

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Factory\AppFactory;

	$app->get("/Categories", function (Request $request, Response $response, $args) {

		//Check the client's authentication.
		require "controller/require_authentication.php";

		$categories = get_all_categories();

		if (is_string($categories)) {
			error($categories, 500);
		}
		else {
			echo json_encode($categories);
		}
		return $response;
	});
?>