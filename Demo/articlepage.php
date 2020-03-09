<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/articlepage.js" type="module"></script>
    <title>Article Page</title>
</head>
<body id="article-body">

    <div id="title-container">
    <h1 id="title">Article Title</h1>
    </div>
    <div id="author-container">
    <h3 id="author">Author name</h3>
    </div>

    <div id="info-container">
        <div id="reads-container">
            <span id="reads">Reads: 0</span>
        </div>



        <div id="likes-container">
            <button id="Like-btn">Like</button>
            <span id="Likes">0</span>
            <button id="Dislike-btn">Dislike</button>
            <span id="Dislikes">0</span>
        </div>

    
    </div>

    <div id="content-conatainer">
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