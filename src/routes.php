<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

// $app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });


$app->get('/', function (Request $request, Response $response, array $args) {
	return $this->renderer->render($response, 'index.phtml', $args);	
});

$app->get('/md5', function (Request $request, Response $response, array $args) {
	return $this->renderer->render($response, 'md5.phtml' , $args);
});

$app->post('/md5', function (Request $request, Response $response, array $args) {
	$body = $request->getParsedBody();
	$strings = explode("\n",$body['string']);
	$md5 = [];
	foreach($strings as $one){
		$md5[] = md5($one);
	}
	return $response->withJson(['md5' => $md5 ]);
});