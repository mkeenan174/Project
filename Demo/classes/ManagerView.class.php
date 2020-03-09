<?php

class ManagerView extends Manager{

    public function test(){
        $result = $this->testGET();
        echo $result;
    }

    public function showUser($name){
        $result = $this->getUser($name);
        //echo var_dump($result);
        echo $result;

    }

    public function showArticles(){
        $articles = $this->getAllArticles();
        return $articles;
    }

    public function fetchArticle($id){
        $article = $this->getArticle($id);
        return $article;
    }

    public function fetchComments($id){
        $comments = $this->commentsByArticle($id);
        return $comments;
    }

    public function getSearchResults($input){
        $articles = $this->searchArticles($input);
        return $articles;
    }

    public function userExists($email){
        if($this->getEmail($email) != null){
            return true;
        }else{
            return false;
        }
    }

    public function logIn($email, $password){
        if($this->userExists($email) != false){
            if($password == $this->getPass($email)){
                echo 'correct';
                $this->initSession($email);
            }else{
                echo 'incorrect';
            }
        }else{
            echo 'user doesnt exist';
        }
    }

    public function initSession($email){
        $info = $this->getUserInfo($email);
        if($info != null){
            $_SESSION['uid'] = $info[0];
            $_SESSION['username'] = $info[1];
            $_SESSION['email'] = $email;

            return $_SESSION['username'];
        }
    }

   
}