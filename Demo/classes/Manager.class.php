<?php 
include_once 'keywordEngine.class.php';

class Manager extends Dbh{
    // Test functions

    function testGET(){
        $text = 'test';
        return $text;
    }
    
    
    // User functions 
    function getUser($name){
        $sql = 'SELECT * FROM users WHERE user_name = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                return $row['user_name'];
            }
        }
    }

    protected function getUserInfo($email){
            $sql = 'SELECT * FROM users WHERE user_email = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);

            if($stmt->rowCount()){
                $row = $stmt->fetch();
                $results = array($row['user_id'], $row['user_name']);
                return $results;
            }
    } 
    function getEmail($email){
        $sql = 'SELECT * FROM users WHERE user_email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        if($stmt->rowCount()){
            $row = $stmt->fetch();
            return $row['user_email'];
        }

    
    }

    function getPass($email){
        $sql = 'SELECT * FROM users WHERE user_email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                return $row['user_password'];
            }
        }
    }
   


    function getAllUsers(){
        $sql = 'SELECT * FROM users';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchALL();

        return $result;
    } 

    function insertUser($name, $email, $password){
        $sql = 'INSERT INTO users( user_name, user_email, user_password) VALUES ( ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email, $password]);
        
    }


    // Article functions 
    function getAllArticles(){
        $sql = 'SELECT * FROM articles';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $result;
    }

    function getArticle($id){
        $sql = 'SELECT * FROM articles WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = json_encode($stmt->fetchAll());
        return $result;
    }


    function insertArticle($userId, $author, $title, $interest, $opinion, $content, $keywords){
        $sql = 'INSERT INTO articles(user_id, author_name, article_title, article_interest, article_opinion, article_content, article_keywords) VALUES ( ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId, $author, $title, $interest, $opinion, $content, $keywords]);

    }

    protected function articleKeywords($content){
        $keywordFinder = new keywordEngine;
        $keywords = $keywordFinder->findKeywords($content);
        return $keywords; 
    }

    function addRead($id){
        $sql = 'UPDATE articles SET article_reads = article_reads + 1 WHERE  article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 'Success!';
    }


    function likeArticle($id){
        $sql = 'UPDATE articles SET article_likes = article_likes + 1 WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 'success';

    }


    function dislikeArticle($id){
        $sql = 'UPDATE articles SET article_dislikes = article_dislikes + 1 WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 'success';
    }

    function getArticleInfo($id){
        $sql = 'SELECT * FROM articles WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                $info = array($row['author_name'], $row['article_interest'], $row['article_keywords']);
                return $info;
            }
        }
    }

    function getArticlesInfo(){
        $sql = 'SELECT * FROM articles';
        $stmt = $this->connect()->prepare($sql);
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = array();
        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                $info = array($row['article_id'],$row['author_name'], $row['article_interest'], $row['article_keywords']);
                $str = implode(",",$info);
                $result = explode(",", $str);
                array_push($results, $result);
            }
            return $results;
        }
    }
    // Comment functions 

    protected function insertComment($authorId, $articleId, $author, $content ){
        $sql = 'INSERT INTO comments ( user_id, article_id, comment_author, comment_content) VALUES (?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$authorId, $articleId, $author, $content]);
    }


    protected function getComment($id){
        $sql = 'SELECT * FROM comments WHERE comment_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function commentsByArticle($id){
        $sql = 'SELECT * FROM comments WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = json_encode($stmt->fetchAll());
        return $result;
    }

    //Search query 
    protected function searchArticles($input){
        $sql = 'SELECT * FROM articles  WHERE article_title LIKE ? OR author_name LIKE ? OR article_content LIKE ?';
        $params = array("%$input%", "%$input%", "%$input%");
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);
        $result = json_encode($stmt->fetchAll());
        return $result;
    }


    //Event Functions
    protected function insertEvent($user, $article, $type){
        $sql = 'INSERT INTO evnts ( user_id, article_id, event_type) VALUES ( ?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user, $article, $type] );
    }

    protected fileHandler($file){
        
    }

}