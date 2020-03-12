import articles from './article.js';
var leftArticles = [];
var rightArticles = [];

window.addEventListener('load', () =>{
   getOpinion();
});


function loadProfile(){
    const xhr = new XMLHttpRequest();
    console.log('test');
    const params = 'instruct=Profile';
    xhr.open('Post', 'xhr.inc.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(this.status == 200){
            console.log(this.responseText);
            let result = this.responseText;
            return result;
        }
    }
    xhr.send(params);
}




function paintPage(){
    
}



function getOpinion(){
    const xhr = new XMLHttpRequest();
    xhr.open('Get', 'xhr.inc.php?instruct=opinion', true);
    xhr.onload = function(){
        if(this.status == 200){
            console.log(this.responseText);
        }
    }
    xhr.send();
}