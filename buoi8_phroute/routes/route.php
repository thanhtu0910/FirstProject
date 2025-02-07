<?php
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use App\Controllers\HomeController;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

// Khu vực cần quan tâm -----------
// định nghĩa các đường dẫn
// cú pháp:
// $router->phương thức http('tên đường dẫn',công việc cần làm)
$router->get('/', function () {
    return "chào mừng các bạn";
});

$router->get('/home',[HomeController::class, 'index']);

$router->group(['prefix' => 'admin'], function ($router){
    // định nghĩa các đường dẫn trong nhom admin
    $router->get('/home',function(){
        return "Chào mừng các bạn đến trang home admin";
    });
});
// Khu vực cần quan tâm -----------

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
?>