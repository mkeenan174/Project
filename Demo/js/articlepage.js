

var liked = false;
var disliked = false;
var commentsRevealed = false;

window.addEventListener('load', () => {
    const articleId = document.location.search.replace(/^.*?\=/,'');
    loadArticle(articleId);


     //Adding event listener
     window.addEventListener('click', (e) => {
         e.preventDefault();
        const t = e.target;
        switch (t.id) {
            case 'Like-btn':
                like(articleId, getUpdate, updateArticle);
            break;

            case 'Dislike-btn':
                dislike(articleId, getUpdate, updateArticle);
            break;

            case 'rev-comments':
                if(commentsRevealed === false){
                    loadComments(paintComments, articleId);
                    commentsRevealed = true;
                    }
            break;
        
            case 'comment-btn':
                    let comment = document.getElementById('comment-input').value;
                    if(comment !== undefined){
                        addComment(articleId, comment);
                    }
            break;
        }

      });

});






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



function loadArticle(id){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getArticle&info='+id, true);
    xhr.onload = function(){
        if(this.status == 200){
          let article = JSON.parse(this.responseText);
          console.log(article);
          drawArticle(article); 
          readArticle(id); 
        }
    }
    xhr.send();
}


function drawArticle(article){
    let titleHolder = document.getElementById('title');
    let authorHolder = document.getElementById('author');
    let readsHolder = document.getElementById('reads');
    let likesHolder = document.getElementById('Likes');
    let dislikesHolder = document.getElementById('Dislikes');
    let contentHolder = document.getElementById('content');

    titleHolder.innerText =  article[0].article_title;
    authorHolder.innerText = article[0].author_name;
    readsHolder.innerText  = 'Reads: '+article[0].article_reads;
    likesHolder.innerText = article[0].article_likes;
    dislikesHolder.innerText = article[0].article_dislikes;
    contentHolder.innerText  = article[0].article_content;
}

 function like(id,callback, callback2){
           if(liked === false){
               let res;
               var xhr = new XMLHttpRequest();
               xhr.open('GET','xhr.inc.php?instruct=likeArticle&info='+id, true);
               xhr.onload = function(){
                   if(this.status == 200){
                      //console.log(this.responseText);
                      res = this.responseText;
                      console.log(res);
                      if(res === 'success'){
                          callback(id,callback2);
                      }
                   }
               }
               xhr.send();
           }      
}

function dislike(id,callback, callback2){
    if(liked === false){
        let res;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=dislikeArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               res = this.responseText;
               console.log(res);
               if(res === 'success'){
                   callback(id,callback2);
               }
            }
        }
        xhr.send();
    }      
}

function getUpdate(id,callback){
    let article;
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getArticle&info='+id, true);
    xhr.onload = function(){
        if(this.status == 200){
           //console.log(this.responseText);
           article = JSON.parse(this.responseText);
           callback(article[0].article_reads, article[0].article_likes,article[0].article_dislikes);
        }
    }
    xhr.send();
}        

function updateArticle(reads, likes, dislikes){
    let readHolder = document.getElementById('reads');
    let likeHolder = document.getElementById('Likes');
    let dislikeHolder = document.getElementById('Dislikes');
    readHolder.innerText = reads;
    likeHolder.innerText = likes;
    dislikeHolder.innerText = dislikes;
}


function loadComments( id){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getComments&info='+id, true);
    xhr.onload = function(){
        if(this.status == 200){
           let comments = JSON.parse(this.responseText);
           console.log(comments);
           paintComments(comments); 
        }
    }
    xhr.send();

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

function addComment(id, comment){
    var params = 'instruct=addComment&id='+id+'&content='+comment;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'xhr.inc.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(this.status == 200){
            updateComments(id);
        }
    }
    xhr.send(params);
}    


function updateComments(id){
   let parent = document.getElementById('comment-pen');
   while(parent.firstChild){
       parent.removeChild(parent.firstChild);
   }
    loadComments(id);
}
