
//import article from './js/article.js';
import log from './js/log.js';
import ui from './js/ui.js';
import articles from './js/article.js';
//import logout from './js/login';


window.addEventListener('load', () => {
    //logTest();
    // getArticles(printer);
    // getArticles(cardFiller, 'test-pen', 'small');
    //log.logStatus();
    log.Setup();
    ui.setup();
    articles.setup();
    articles.getArticles('rec-tiles');
    // talk();
    // var comments = SetUpComments();
    // var articles = SetupArticles();
    // renderItems(articles, 'article-pen');
    // renderItems(comments, 'comment-pen');
    // comments.forEach(comment => {
    //     console.log(comment);
    //     comment.buildComment('pen');
    // });
   var body = document.getElementById("doc-body");
   body.onclick = function (e) {
    //    let t = e.target.parentElement;
    //     if(t.className == 'small-tile'){
    //         console.log(t.id);
    //         gotoArticle(t.id);
    //     }
        detectArticle(e.target);
        
   }

});


function printer(data){
    console.log(data);
}


function getArticles(callback, location, type){
    let articles;
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getArticles', true);
    xhr.onload = function(){
        if(this.status == 200){
            //console.log(this.responseText);
            articles = JSON.parse(this.responseText);
            callback(location, type, articles);
        }else{
            console.log('Article request Failed');
        }
        
    }

    xhr.send();
}

function logTest(){
    let instruct = 'Post value';
    var params = 'name='+instruct;


    var xhr = new XMLHttpRequest();
    xhr.open('Post', 'xhr.inc.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
      console.log(this.responseText);
    }
     xhr.send( params);
     console.log('Sent');
    
}


function talk(){
    let Ted = new person();
    Ted.speak();
}


function gotoArticle(id){
    console.log(id);
    window.document.location = 'articlepage.php'+'?article=' + id;
}

function detectArticle(target){
      if(target.id == 'card' || target.id == 'card-body'){
          gotoArticle(target.id);
      }else{
          if(target.parentElement.className == 'card-body'){
              gotoArticle(target.parentElement.id);
          }
      }
}




function cardFiller(loc, size, objs){
    var destination = document.getElementById(loc);

    objs.forEach(item =>{
        var card = document.createElement('div');
        var cardBody = document.createElement('div');
        var cardTitle = document.createElement('h3');
        var cardAuthor = document.createElement('h4');
        
        card.id = item.article_id;
        card.className = 'card';
        cardBody.className = 'card-body';
        cardBody.id = item.article_id;
        cardTitle.className = 'card-title';
        cardAuthor.className = 'card-subtitle';


        cardTitle.innerText = item.article_title;
        cardAuthor.innerText = item.author_name;

        switch (size) {
            case 'small':
                card.style="width: 15rem;";
                break;
        
            case 'medium':
                card.style="width: 20rem;";
                break;
        }

        destination.appendChild(card);
        card.appendChild(cardBody);
        cardBody.appendChild(cardTitle);
        cardBody.appendChild(cardAuthor);
        //console.log('Card '+card.id + ' appended');
    });

}