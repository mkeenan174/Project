<?php
include_once 'includes/ClassLoader.inc.php';
include_once 'includes/Switch.inc.php';



// $object = new ManagerView;
// echo $object->getSearchResults('one');


    
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
    <script src="search.js" type="module"></script>
    <script src="main.js" type="module"></script>

    <title>Search page </title>
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
        <a class="signup-link"href="signup.html">Sign up Here!</a>
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
    <li><a href="home.php">Home</a></li>
    <li> 
      <button id="login">Login</button>
    </li>
    <li>
      <div>
        <div class="search-container-small">
          <input type="search" id="search-input-menu" class="search-small" placeholder="Search..."> 
          <button id="menu-search-btn" class="search-button"><i class="material-icons">search</i></button>
        </div>
      </div>
    
    </li>
    <li><a href="publish.html">Publish</a></li>
    <li><a href="profilepage.html">Profile</a></li>
    

  </ul>
</div>

<div class="search-utilities">
    <input type="search" placeholder="Search..." id="search-input" class='search-bar'>
    <button id="search-button" class="search-button-L"><i class="material-icons">search</i></button>

</div>

<div id="search-results"class="results-container">
    <div class="tile-l">
        <div class="tile-l-img"></div>
        <div class="tile-l-title"></div>
    </div>

</div>


    
</body>
</html>