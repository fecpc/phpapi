<?php

require_once('../dbController.php');

class PostController
{
    //create a post    
    /**
     * create
     *
     * @param  String $title
     * @param  String $slug
     * @param  String $content
     * @param  Integer $likes
     * 
     * @return Post
     */
    public function create($title, $slug, $content, $likes)
    {
        $db = new Db();
        $conn = $db->connect();

        $sql = "INSERT INTO `posts` (title, slug, content, likes) VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $slug, $content, $likes);
        $stmt->execute();

        $last_id = $conn->insert_id;

        $post = $this->findById($last_id);
        $stmt->close();
        $conn->close();

        return $post;

    }
    //get all post    
    /**
     * get all post
     *
     * @return Array
     */
    public function get_all()
    {
        $db = new DB();
        $conn = $db->connect();

        $sql = "SELECT * FROM posts";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        
        $response = array();

        while($row = $result->fetch_object()){
            array_push($response, $row);
        }

        

        return $response;
        

        
    }
    //find post by id    
        
    /**
     * findById
     *
     * @param  mixed $id
     * 
     * @return void
     */
    public function findById($id)
    {
        $db = new Db();
        $conn = $db->connect();

        $sql = "SELECT * FROM `posts` WHERE id='$id'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object();
        $stmt->close();
        $conn->close();

        return $result;
    }



}