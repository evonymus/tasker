<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/vendor/autoload.php';

$config['displayErrorDetails']= true;
$config['addContentLengthHeader']=false;

$config['db']['host']="ortoklaz";
$config['db']['user']='asarum';
$config['db']['pass']='y00da01';
$config['db']['dbname']='asarum';
 

$app = new \Slim\App(["settings"=>$config]);

$container = $app->getContainer();
$container['logger']= function($c) {
  $logger = new \Monolog\Logger("my_logger");
  $file_handler = new  \Monolog\Handler\StreamHandler("../logs/app.log");
  $logger->pushHandler($file_handler);
  return $logger;
};

$container['db']=function($c) {
  $db = $c['settings']['db'];
  $pdo = new PDO("mysql:host=".$db['host'].";dbname=".$db['dbname'], $db['user'], $db['pass']);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  return $pdo;
};

  //routes
$app->get("/", function($request, $response, $args) {
    $response->write("Hello from my slim app");
    return $response;
});

$app->get("/hello/{name}", function(Request $request, Response $response) {
  $this->logger->addInfo("Called get hello");
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");
    return $response;
});

//menu

$app->get('/menu/{id}', function(Request $request, Response $response) {
  $this->logger->addInfo("get menu called");
  $mapper = new MenuMapper($this->db);
  $items = $mapper->getMenu($id);

  /* $response->getBody()->write(var_export($items, true)); */
  $response->write(json_encode($items));
  return $response;
});

$app->run();
