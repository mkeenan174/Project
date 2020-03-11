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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/articlepage.js" type="module"></script>

    <title>Article Page</title>
</head>
<body id="article-body">
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
<li><a href="home.php">Home</a></li>
<li> 
  <button id="login">Login</button>
</li>
<li>Search</li>
<li><a href="publish.html">Publish</a></li>
<li>Profile</li>


</ul>
</div>

    <div id="article-image" class="image-container"></div>

    <div id="title-container" class="title-div">
    <h1 id="title">Article Title</h1>
    </div>
    <div id="author-container" class="author-div">
    <h3 id="author">Author name</h3>
    </div>

    <div id="info-container" class="info-div">
        <div id="reads-container">
            <h4 id="reads">Reads: 0</h4>
        </div>



        <div>    
            <div id="likes-container" class="likes-div">
                <button id="Like-btn">Like</button>
                <h5 id="Likes">0</h5>
            </div>

            <div id="dislikes-container" class="dislikes-div">
                <button id="Dislike-btn">Dislike</button>
                <h5 id="Dislikes">0</h5>
            </div>
        </div>
    </div>    


    <div id="content-conatainer" class="content-div">
        <p id="content">Article content goes here</p>
    </div>
  
    <!-- <div id="likes pen">
        <button id="Like-btn">Like</button>
        <span id="Likes"></span>
        <button id="Dislike-btn">Dislike</button>
        <span id="Dislikes"></span>
    </div> -->
    <button id='rev-comments'>Reveal Comments</button>
    <div id='comments-section'>
        <input id='comment-input' type="text" placeholder="Comment....">
        <button id='comment-btn'>Comment</button>
        <div id="comment-pen"></div>

    </div>
</body>
</html>