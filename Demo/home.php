<?php
include_once 'includes/ClassLoader.inc.php';
include_once 'recommend/analyse.rec.php';

$a = [0,3,4,5];
$b = [7,3,3,-1];
// echo calcEuclid($a, $b);
// var_dump(calcJaccard($a, $b));
// echo calcCosine([3,2,0,5,0,0,0,2,0,0], [1,0,0,0,0,0,0,1,0,2]);
// echo calcManhattan([10, 20, 10], [10,20,20]);
// var_dump(extractKeywords('Some heroes take a vacation every now and then, even temporarily, a couple of beachfront condos in a movie world they hope, a la Rick James in “The Beautiful Daze,” won’t have to live through. Unfortunately, that has never happened to one of the most exceptional directors in the business, Anthony & Joe Russo, so the moment is altogether too good to spoil, at least for us Southern Californians.

// In “The Last Sharknado: It’s About Time,” which had its Los Angeles premiere at the Tower Theatre on Tuesday, we can expect the San Diego-born Anthony Russo to somehow make it through seven years without being inside a sharknado.

// Oh, he has a couple of other movies during that time, mostly that stupid’d-up New York “Avengers” picture, but they have nothing to do with sharks or serious action-film plotting.

// Don’t worry, he lives to fight another day.'));
//$vectorfile = fopen('text/wordvectors.txt', 'r') or die('Unable to open file!');
// $vectors = file('text/wordvectors.txt');
// echo $vectors[0];
// var_dump(preg_grep("/raccoons/", $vectors ));
// foreach($vectors as $word){
//   echo $word;
// }


// $obj = new Manager;
// $art1 = $obj->getArticleInfo(7);
// $art2 = $obj->getArticleInfo(6);
// $info1 = explode(",", $art1);
// $info2 = explode(",", $art2);
// echo $art1;
// echo $art2;
// // var_dump($info1);
// // var_dump($info2);
// echo calcJaccard($info1, $info2);
$man = new Manager;
$article = $man->getArticleInfo(6);
$articles = $man->getArticlesInfo();
//var_dump($articles);
$test =  $articles[10];
//ar_dump($test);
$rec = new recommendEngine;
$rec->setup($article, $articles);
$rec->jaccardCompare();




 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('./css/style.css');
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    <script src="main.js"></script>
    <script src="test.js" type="module"></script>
    <title>Document</title>
</head>
<body id="doc-body">
<header>
	
		<div class="top" >
			<a href="#" class="menu_icon" ><i id="menuBtn"class="material-icons">dehaze</i></a>
    </div>

    <div class="header-title">
      <h1 class="header-text">Telescopium</h1>
    </div>

    <div class="user-status">
     <h6 id="status-txt">Logged Out</h6> 
    </div> 
    
	</header>


<div class="login-modal">
  <div class="login-content">
    <div id="in-close" class="close">+</div>
    <form >
      <input class="log-input" type="email" id="email-input" placeholder="email...">
      <input class="log-input" type="password" id="pswd-input" placeholder="Password...">
      <div id="login-btn" class="login-btn" >Login</div>
    </form>
  </div>
</div>

<div class="logout-modal">
  <div class="logout-content">
  <div id="out-close"class="close">+</div>
    <span class="logout-text">Are you sure you you want to log out?</span>
    <button  id="logout-btn"class="logout-btn">Yes</button>
  </div>
</div>

<div id="sidebar">
  <ul>
    <li>Home</li>
    <li> 
      <button id="login">Login</button>
    </li>
    <li>Search</li>
    <li><a href="publish.html">Publish</a></li>
    <li>Profile</li>
    

  </ul>
</div>


<div class="card" style="width: 16rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>



   <div id="test-pen"></div>

   <div class="grid-holder">
       <div class="container carousel">Caroussel
       <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="la.jpg" alt="Los Angeles">
                  </div>
                  <div class="carousel-item">
                    <img src="chicago.jpg" alt="Chicago">
                  </div>
                  <div class="carousel-item">
                    <img src="ny.jpg" alt="New York">
                  </div>
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
            </div>
       </div>
       <div class="container recommended-cards">Recommended</div>
       <div class="container alternate-cards">Alternate</div>
   </div>
</body>
</html>