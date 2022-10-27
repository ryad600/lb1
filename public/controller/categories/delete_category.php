<?php

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Factory\AppFactory;
	
	$app->delete("/Category/{category_id}", function (Request $request, Response $response, $args) {

		//Check the client's authentication.
		require "controller/require_authentication.php";

		$category = delete_category($args["category_id"]);

		if (is_string($category)) {
			error($categorys, 500);
		}
		else if (!$category) {
			error("There exists no category with the id '" . $args["category_id"] . "'.", 404);
		}
		else {
			echo json_encode($category);
		}
		return $response;
	});
?>