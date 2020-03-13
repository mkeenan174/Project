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


    function insertArticle($userId, $author, $title, $interest, $opinion, $content, $keywords, $path){
        $sql = 'INSERT INTO articles(user_id, author_name, article_title, article_interest, article_opinion, article_content, article_keywords, img_path) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId, $author, $title, $interest, $opinion, $content, $keywords,$path]);

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

    protected function getUserEvents($user){
        $sql = 'SELECT * FROM evnts WHERE user_id =? ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        $results = json_encode($stmt->fetchAll());
        return $results;
    }

    protected function getUserPolitics($user){
        $results = array();

        $sql1 = "SELECT articles.article_id, evnts.event_type from articles join evnts on articles.article_id = evnts.article_ID where evnts.user_id = ? AND articles.article_opinion = 'Left'";
        $stmt1 = $this->connect()->prepare($sql1);
        $stmt1->execute([$user]);
        $result1 = $stmt1->fetchAll();
        $left = count($result1);
        

        $sql2 = "SELECT articles.article_id, evnts.event_type from articles join evnts on articles.article_id = evnts.article_ID where evnts.user_id = ? AND articles.article_opinion = 'Right'";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute([$user]);
        $result2 = $stmt2->fetchAll();
        
        $right = count($result2);

        $total = $right + $left;

        $leftPercent = ($left / $total) * 100;
        array_push($results, $leftPercent);

        $rightPercent = ($right / $total) * 100;
        array_push($results, $rightPercent);

        return json_encode($results);
    }


    function getLikesInfo($user){
        $sql = "SELECT articles.article_id, articles.author_name, articles.article_interest, articles.article_opinion, articles.article_keywords 
        from articles join evnts on articles.article_id = evnts.article_ID where evnts.user_id = ? AND evnts.event_type = 'Like'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        $result = $stmt->fetchAll();
        return $result;
    }

    function getUserDislikesInfo($user){
        $sql = "SELECT articles.article_id, articles.author_name, articles.article_interest, articles.article_opinion, articles.article_keywords 
        from articles join evnts on articles.article_id = evnts.article_ID where evnts.user_id = ? AND evnts.event_type = 'Dislike'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        $result = $stmt->fetchAll();
        return $result;
    }

    function getUserReadsInfo($user){
        $sql = "SELECT articles.article_id, articles.author_name, articles.article_interest, articles.article_opinion, articles.article_keywords 
        from articles join evnts on articles.article_id = evnts.article_ID where evnts.user_id = ? AND evnts.event_type = 'Read'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        $result = $stmt->fetchAll();
        return $result;
    }

    function getUserCommentInfo($user){
        $sql = "SELECT articles.article_id, articles.author_name, articles.article_interest, articles.article_opinion, articles.article_keywords 
        from articles join evnts on articles.article_id = evnts.article_ID where evnts.user_id = ? AND evnts.event_type = 'Comment'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        $result = $stmt->fetchAll();
        return $result;
    }

    function getInfo($user, $col, $type){
        $pool = array();
        switch($col){
            case 'author':
                $column = 'articles.author_name';
                $header = 'author_name';
            break;

            case 'interest':
                $column = 'articles.article_interest';
                $header = 'article_interest';
            break;

            case 'opinion':
                $column = 'articles.article_opinion';
                $header = 'article_opinion';
            break;

            case 'keywords':
                $column = 'articles.article_keywords';
                $header = 'article_keywords';
            break;

        }

        $sql = "SELECT $column 
        from articles join evnts on articles.article_id = evnts.article_ID where evnts.user_id = ? AND evnts.event_type = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user, $type]);
        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                  array_push($pool, $row[$header]);        
            }
            return $pool;   
        }
    }


    function calcFavouriteAuthor($user){
       $authorpool = array();
       $authorpool = array_merge($authorpool, $this->getInfo($user, 'author', 'Like'));
       $authorpool = array_merge($authorpool, $this->getInfo($user, 'author', 'Read'));
       $authorpool = array_merge($authorpool, $this->getInfo($user, 'author', 'Comment'));
       return array_count_values($authorpool);
    }

    function calcFavouriteInterests($user){
       $interestpool = array();
       $interestpool = array_merge($interestpool, $this->getInfo($user, 'interest', 'Like'));
       $interestpool = array_merge($interestpool, $this->getInfo($user, 'interest', 'Read'));
       $interestpool = array_merge($interestpool, $this->getInfo($user, 'interest', 'Comment'));
       return array_count_values($interestpool);
    }

    function calcFavouriteKeywords($user){
        $keywordpool = array();
        $keywordpool = array_merge($keywordpool, $this->getInfo($user, 'keywords', 'Like'));
        $keywordpool = array_merge($keywordpool, $this->getInfo($user, 'keywords', 'Read'));
        $keywordpool = array_merge($keywordpool, $this->getInfo($user, 'keywords', 'Comment'));
        return array_count_values($keywordpool);
    }

    function calcOpinion($user){
        $opinionpool = array();
        $opinionpool = array_merge($opinionpool, $this->getInfo($user, 'opinion', 'Like'));
        $opinionpool = array_merge($opinionpool, $this->getInfo($user, 'opinion', 'Read'));
        $opinionpool = array_merge($opinionpool, $this->getInfo($user, 'opinion', 'Comment'));
        return array_count_values($opinionpool);
    }

    // Random Key Generation
    protected function insertKey($key){
        $sql = "INSERT INTO keystrings VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$key]);
    }

    protected function checkKeys($randStr){
        $keyExists = false;
        $sql = 'SELECT * FROM keystrings';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
               if($row['keystringKey'] == $randStr){
                    $keyExists = true;
                    break;
                }
            }
        }
        return $keyExists;
    }

    function generateKey(){
        $keyLength = 10;
        $str = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ()/$";
        $randStr = substr(str_shuffle($str), 0, $keyLength);

        $checkKey = $this->checkKeys($randStr);

        while ($checkKey == true){
            $randStr = substr(str_shuffle($str), 0, $keyLength);
            $checkKey = $this->checkKeys();
        }

        $this->insertKey($randStr);
        return $randStr;
    }
}