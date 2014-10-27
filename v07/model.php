<?php

/**
 * Created by PhpStorm.
 * User: Zaniyar
 * Date: 27.10.2014
 * Time: 20:13
 */


/*
 * Database connection wrapper
 */
class Connection {
    /**
     * @var Connection single instance
     */
    private static $instance = null;
    /**
     * @var PDO
     */
    private $pdoConnection;

    public function __construct(){
        $this->connect();
    }

    public static function getInstance() {
        if(self::$instance == null) {
            // Lazy create
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    private function connect(){
        $this->pdoConnection = new PDO("mysql:host=localhost;dbname=loc_orm","root","root");
        $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($statement) {
        return $this->pdoConnection->prepare($statement);
    }
}

/**
 * Raw Post data container
 */
class Post {
    public $id;
    public $title;
    public $content;
    public $created;
}

class PostRow extends Post {

    public function __construct(){

    }

    /**
     * @param $id
     * @return PostRow
     */
    public static function findById($id) {
        // If used frequently, cache prepared statement
        $statement = Connection::getInstance()->prepare("select * from tbl_person where id = :id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchObject('PostRow');
    }

    public function insert() {
        $statement = Connection::getInstance()->prepare("INSERT INTO tbl_person (title, content, created) VALUES( :title, :content, now())");
        $statement->execute(array(
            ':title' => $this->title,
            ':content' => $this->content
        ));
    }

    public function update() {
        $statement = Connection::getInstance()->prepare("UPDATE tbl_person SET title = :title, content= :content where id = :id");
        $statement->execute(array(
            ':id'   => $this->id,
            ':title' => $this->title,
            ':content' => $this->content
        ));
    }

    public function delete() {
        $statement = Connection::getInstance()->prepare("DELETE FROM tbl_person where id = :id");
        $statement->bindValue('id', $this->id, PDO::PARAM_INT);
        $statement->execute();
    }
}

class PostTable {

    public function __construct(){

    }

    /**
     * @param $id
     * @return Post post
     */
    public function findById($id) {
        // If used frequently, cache prepared statement
        $statement = Connection::getInstance()->prepare("select * from tbl_person where id = :id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchObject('Post');
    }

    /*
       * @returns array of Posts
       */
    public function findByAttribute($title="",$content="") {
        $statement = Connection::getInstance()->prepare("select * from tbl_person where $title LIKE :title AND $content LIKE :content");
        $statement->execute(array(
            ':title' => $title,
            ':content' => $content
        ));

        return $statement->fetchObject('Post');
    }

    public function create(Post $post) {
        $statement = Connection::getInstance()->prepare("INSERT INTO tbl_person VALUES( :title, :content, now())");
        $statement->execute(array(
            ':title' => $post->title,
            ':content' => $post->content
        ));
    }

    public function update(Post $post) {
        $statement = Connection::getInstance()->prepare("UPDATE tbl_person SET title = :title, content= :content where id = :id");
        $statement->execute(array(
            ':id'   => $post->id,
            ':title' => $post->title,
            ':content' => $post->content
        ));

    }

    public function delete(Post $post) {
        $statement = Connection::getInstance()->prepare("DELETE FROM tbl_person where id = :id");
        $statement->bindValue('id', $post->id, PDO::PARAM_INT);
        $statement->execute();
    }
}

?>