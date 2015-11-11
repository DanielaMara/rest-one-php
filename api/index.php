<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() use ( $app ) {
    echo "Welcome to REST API";
});

$app->get('/hello/:name', function($name) use ( $app ) {
    echo "Hi $name, welcome to the REST API's";
});


$app->get('/tasksIsnack/', function() use ( $app ) {
    $app->response()->header("Content-Type", "aplication/json");
    $tasks = Array(
            "id" => "1",
            "description" => "LearnRest",
            "done" => "false"
        );
    echo json_encode($tasks);
});


$app->get('/tasksEdy/', function() use ( $app ) {
    $tasks = getTasks(); 
    //Define what kind this response
    $app->response()->header("Content-Type", "aplication/json");
    echo json_encode($tasks);
});


$app->get('/tasks/:id', function($id) use ( $app ) {
    $tasks = getTasks(); 
    $index = array_search($id, array_column($tasks, 'id'));
    
    if($index > -1)
    {
        $app->response()->header("Content-Type", "aplication/json");
        echo json_encode($tasks[$index]);
    }
    else
    {
        $app->response()->setStatus(204);
    }
});

$app->post('/tasks', function() use ($app) {
    $taskJson = $app->request()->getBody();
    $task = json_decode($taskJson);
    echo $task->description;
});


function getTasks()
{
    $tasks = array(
            array('id'=>1,'description'=>'LearnRest','done'=>false),
            array('id'=>2,'description'=>'LearnRest1','done'=>true),
            array('id'=>3,'description'=>'LearnRest2','done'=>false),
            array('id'=>4,'description'=>'LearnRest3','done'=>true),
            array('id'=>5,'description'=>'LearnRest4','done'=>false),
            array('id'=>6,'description'=>'LearnRest5','done'=>true),
            array('id'=>7,'description'=>'LearnRest7','done'=>true)
        );
        
    return $tasks;
}

$app->run();
?>