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
    $app->response()->header("Content-Type", "aplication-json");
    $tasks = Array(
            "id" => "1",
            "description" => "LearnRest",
            "done" => "false"
        );
    echo json_encode($tasks);
});

$app->get('/tasksEdy/', function() use ( $app ) {
    $tasks = getTasks();   
    echo json_encode($tasks);
});

function getTasks()
{
    $tasks[] = array(
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