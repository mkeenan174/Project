

// export default function readArticle(id){
//     console.log(id);
//     window.document.location = 'articlepage.php'+'?article=' + id;
// }


// export default function clickDetect(target){
//     if(target.id == 'card' || target.id == 'card-body'){
//         gotoArticle(target.id);
//     }else{
//         if(target.parentElement.className == 'card-body'){
//             gotoArticle(target.parentElement.id);
//         }
//     }

// }
//  export default function fetchArticles(){

//  }

// export default function cardBuilder(loc, size, objs){
//     var destination = document.getElementById(loc);

//     objs.forEach(item =>{
//         var card = document.createElement('div');
//         var cardBody = document.createElement('div');
//         var cardTitle = document.createElement('h3');
//         var cardAuthor = document.createElement('h4');
        
//         card.id = item.article_id;
//         card.className = 'card';
//         cardBody.className = 'card-body';
//         cardBody.id = item.article_id;
//         cardTitle.className = 'card-title';
//         cardAuthor.className = 'card-subtitle';


//         cardTitle.innerText = item.article_title;
//         cardAuthor.innerText = item.author_name;

//         switch (size) {
//             case 'small':
//                 card.style="width: 15rem;";
//                 break;
        
//             case 'medium':
//                 card.style="width: 20rem;";
//                 break;
//         }

//         destination.appendChild(card);
//         card.appendChild(cardBody);
//         cardBody.appendChild(cardTitle);
//         cardBody.appendChild(cardAuthor);
//         console.log('Card '+card.id + ' appended');
//     });

// }





// export default class Article{
//     constructor(id, title, author, reads, likes, dislikes, content){
//         this.id = id;
//         this.author = author;
//         this.title = title;
//         this.reads = reads;
//         this.dislikes = dislikes;
//         this.likes = likes;
//         this.content = content;
//         this.liked = false;
//         this.disliked = false;
//         this.commentsRevealed = false;
//     }


//     info(){
//         console.log('Title: '+this.title);
//         console.log('Author: '+this.author);
//         console.log('Likes: '+this.likes);
//         console.log('Dislikes: '+this.dislikes);
//         console.log('Reads: '+this.reads);
//         console.log('Content: '+this.content);


//     }

//     draw(){
//         let titleHolder = document.getElementById('title');
//         let authorHolder = document.getElementById('author');
//         let readsHolder = document.getElementById('reads');
//         let likesHolder = document.getElementById('Likes');
//         let dislikesHolder = document.getElementById('Dislikes');
//         let contentHolder = document.getElementById('content');

//         titleHolder.innerText = this.title;
//         authorHolder.innerText = this.author;
//         readsHolder.innerText = 'Reads: '+ this.reads;
//         likesHolder.innerText = this.likes;
//         dislikesHolder.innerText = this.dislikes;
//         contentHolder.innerText = this.content;
 
//     }

//     like(callback, callback2){
//         if(this.liked === false){
//             let res;
//             var xhr = new XMLHttpRequest();
//             xhr.open('GET','xhr.inc.php?instruct=likeArticle&info='+this.id, true);
//             xhr.onload = function(){
//                 if(this.status == 200){
//                    //console.log(this.responseText);
//                    res = this.responseText;
//                    console.log(res);
//                    if(res === 'success'){
//                        callback(callback2);
//                    }
//                 }
//             }
//             xhr.send();
//         }

           
//     }

   
//     dislike(){
//         if(this.disliked === false){
//                 let res;
//                     var xhr = new XMLHttpRequest();
//                     xhr.open('GET','xhr.inc.php?instruct=dislikeArticle&info='+this.id, true);
//                     xhr.onload = function(){
//                         if(this.status == 200){
//                            //console.log(this.responseText);
//                            res = this.responseText;
//                            console.log(res);
//                            if(res === 'success'){
//                                this.disliked = true;
//                            }
//                         }
//                     }
//                 xhr.send();
//         }
//     }


//     getUpdate(callback){
//         let article;
//         var xhr = new XMLHttpRequest();
//         xhr.open('GET','xhr.inc.php?instruct=getArticle&info='+this.id, true);
//         xhr.onload = function(){
//             if(this.status == 200){
//                //console.log(this.responseText);
//                article = JSON.parse(this.responseText);
//                callback(article[0].article_reads, article[0].article_likes,article[0].article_dislikes);
//             }
//         }
//         xhr.send();
//     }

//     update(updatedLikes, updatedDislikes, updatedReads){
//         this.like = updatedLikes;
//         this.dislikes = updatedDislikes;
//         this.reads = updatedReads;
//         this.updateDisplay();
//     }

//     updateDisplay(){
//         let readHolder = document.getElementById('reads');
//         let likeHolder = document.getElementById('Likes');
//         let dislikeHolder = document.getElementById('Dislikes');

//         readHolder.innerText = this.reads;
//         likeHolder.innerText = this.likes;
//         dislikeHolder.innerText = this.dislikes;
//     }



// }

export function formatImage(path, width, height, destination){
    const img = new Image();
    

    if(path.length > 27){
        let source = './'+path;
        img.src = source;
        console.log('uploaded img');
    }else{
        img.src = './img/default.jpg';

    }
    img.onload = () =>{
        const elem = document.createElement('canvas');
        elem.width = width;
        elem.height = height;
        const ctx = elem.getContext('2d');
        ctx.drawImage(img, 0, 0, width, height);
        destination.appendChild(elem);
    }

}

export function getArticles(location){
    let articles;
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getArticles', true);
    xhr.onload = function(){
        if(this.status == 200){
            articles = JSON.parse(this.responseText);
            drawCards(articles, location);
        }else{
            console.log('Article request Failed');
        } 
    }

    xhr.send();
}

export function drawCards(articles, location){
    var destination = document.getElementById(location);
    var Counter = 0;
    for (let item of articles){
        if(Counter === 6){
            break;
        }
        let tile = document.createElement('div');
        let img = document.createElement('div');
        let titleHolder = document.createElement('div');
        let tileTitle = document.createElement('h3');

        tile.appendChild(img);
        tile.appendChild(titleHolder);
        titleHolder.appendChild(tileTitle);
        tileTitle.innerText = item.article_title;
        titleHolder.style.backgroundColor = '#333';
        //Setting class
        tile.className = 'tile';
        img.className = 'tile-image-holder';
        titleHolder.className = 'tile-title-holder';
        tileTitle.className = 'tile-title';

        //Setting id attribute
        tile.id = item.article_id;
        img.id = item.article_id;
        titleHolder.id = item.article_id;
        tileTitle.id = item.article_id;

        formatImage(item.img_path, 250, 100, img);
        destination.appendChild(tile);

        Counter++
        
    }
 }

 function gotoArticle(id){
    console.log(id);
    window.document.location = 'articlepage.php'+'?article=' + id;
}

function detectClick(target){
    console.log(target.className);
    console.log(target.parentElement.className);
    if(target.className == 'tile' || target.class == 'tile-title' || target.class == 'tile-title-holder'|| target.class == 'tile-image-holder'){
        gotoArticle(target.id);
    }else{
        if(target.parentElement.className == 'tile' || target.parentElement.className == 'tile-image-holder'|| target.parentElement.className == 'tile-title-holder'){
            gotoArticle(target.parentElement.id);
        }
    }
}


export function setup(){
    var body = document.getElementById("doc-body");
    body.addEventListener('click', (e) =>{
        detectClick(e.target);

    });
}

 export default {getArticles, drawCards, setup, formatImage};