window.addEventListener('load', () => {
    var articleId = document.location.search.replace(/^.*?\=/,'');
    console.log(articleId);
    loadArticle(paintArticle, readArticle, articleId);     
    var body = document.getElementById('pen'); 
    var commentsRevealed = false;
    let array = [printer, 'Callback'];
    calls(array);

    body.addEventListener('click', (e) => {
        t = e.target;
        console.log(t);
        if(t.id == 'Dislike-btn' || t.id == 'Like-btn'){
            switch (t.id) {
                case 'Dislike-btn':
                       dislikeArticle(articleId);
                    break;
                
                case 'Like-btn':
                        likeArticle(articleId);
                    break;    
            
               
            }
        }

        if(t.id == 'rev-comments'){
            console.log(commentsRevealed);
            if(commentsRevealed === false){
            loadComments(paintComments, articleId);
            commentsRevealed = true;
            }
        }

        if(t.id === 'comment-btn'){
           let cInput = document.getElementById('comment-input').value;
           if(cInput !== null){
               let args =[articleId, cInput, printer];
               loginCheck(addComment, args);
           }
        }
    });
});


// Testing 

function calls(args){
    args[0](args[1]);
}

function printer(args){
   console.log(args);
    
}








function addComment(args){
    var params = 'instruct=addComment&id='+args[0]+'&content='+args[1];
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'xhr.inc.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(this.status == 200){
            args[2](this.responseText);
        }
    }
    xhr.send(params);
}


function loadComments(callback, id){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getComments&info='+id, true);
    xhr.onload = function(){
        if(this.status == 200){
           let comments = JSON.parse(this.responseText);
           console.log(comments);
           callback(comments);
           
        }
    }
    xhr.send();

}

function loadArticle(callback1, callback2, id){
        let article;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=getArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               article = JSON.parse(this.responseText);
               callback1(article); 
               callback2(id);
            }
        }
        xhr.send();
}

function loginCheck(callback, args){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'xhr.inc.php?instruct=loginCheck', true);
    xhr.onload = function(){
        if(this.status == 200){
            console.log('Login check');
            if(this.responseText === 'Y'){
                callback(args);
            }else{
            alert('You must be logged in to comment!');
            }
        }
    }
    xhr.send();
}

function logout(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'xhr.inc.php?instruct=logout', true);
    xhr.onload = function(){
        if(this.status == 200){
            console.log('Logout');
            console.log(this.responseText);
        }
    }
    xhr.send();
}


function readArticle(id){
    let res;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=readArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               res = this.responseText;
               console.log(res);
            }
        }
        
        xhr.send();
}

function likeArticle(id){
    let res;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=likeArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               res = this.responseText;
               console.log(res);
            }
        }
    
    xhr.send();
}


function dislikeArticle(id){
    let res;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=dislikeArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               res = this.responseText;
               console.log(res);
            }
        }
    
    xhr.send();
}
function printer(item){
    console.log(item);
}

function paintComments(comments){
    var destination = document.getElementById('comment-pen');

    comments.forEach(item =>{
        var card = document.createElement('div');
        var cardBody = document.createElement('div');
        var cardAuthor = document.createElement('h4');
        var cardContent = document.createElement('p');
        

        card.id = item.comment_id;
        card.className = 'card bg-secondary text-white';
        cardBody.className = 'card-body';
        cardAuthor.className = 'card-subtitle';
        cardContent.className = 'card-text';


        
        cardAuthor.innerText = item.comment_author;
        cardContent.innerText = item.comment_content;

       
        card.style="width: 15rem;"; 

        destination.appendChild(card);
        card.appendChild(cardBody);
        cardBody.appendChild(cardAuthor);
        cardBody.appendChild(cardContent);
        console.log('Card '+card.id + ' appended');
    });
}

function paintArticle(article){


    printer(article[0].article_title);

    var destination = document.getElementById('article-pen');
    var titleHolder = document.createElement('h2');
    var authorHolder = document.createElement('h4');
    var contentHolder = document.createElement('p');
    var readHolder = document.createElement('span');
    var likeHolder = document.getElementById('Likes');
    var dislikeHolder = document.getElementById('Dislikes');

    titleHolder.innerText = article[0].article_title;
    authorHolder.innerText = article[0].author_name;
    contentHolder.innerText = article[0].article_content;
    readHolder.innerText = article[0].article_reads;
    likeHolder.innerText = article[0].article_likes;
    dislikeHolder.innerText = article[0].article_dislikes;

    destination.appendChild(titleHolder);
    destination.appendChild(authorHolder);
    destination.appendChild(contentHolder);
    destination.appendChild(readHolder);
    
}