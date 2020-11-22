<?php

//global varriabl

require_once('postController.php');

$controller = new PostController();

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $post = $controller->findById($id);
        jsonresponse($post);
        return;
    }

    $posts = $controller->get_all();

    jsonresponse($posts);

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $likes = isset($_POST['likes']) ? $_POST['likes'] : 0;
    $content = isset($_POST['content']) ? $_POST['content'] : "";

    jsonresponse($controller->create($_POST['title'], $_POST['slug'], $content, $likes));
}


function jsonresponse($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
}