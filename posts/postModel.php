<?php

class Post
{

    public $id, $title, $slug, $content, $likes, $created_at;

    
    /**
     * __construct
     *
     * @param  mixed $id
     * @param  mixed $postTitle
     * @param  mixed $slug
     * @param  mixed $content
     * @param  mixed $likes
     * @param  mixed $created_at
     * 
     * @return void
     */
    public function __construct($id, $postTitle, $slug, $content, $likes, $created_at) {
        $this->id = $id;
        $this->title = $postTitle;
        $this->slug = $slug;
        $this->content = $content;
        $this->likes = $likes;
        $this->created_at = $created_at;

    }


}