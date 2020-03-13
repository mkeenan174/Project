
import articles from './js/article.js';

window.addEventListener('load', () => {
    let loadSearch = document.location.search.replace(/^.*?\=/,'');
    console.log(loadSearch);
    const searchBtn = document.getElementById('search-button');
    const searchBar = document.getElementById('search-input'); 
    searchBar.value = loadSearch;
    //getSearchResults(searchBar.value, painter);

  

    searchBtn.addEventListener('click', () =>{
        //printer(document.getElementById('search-input').value);
        getSearchResults(document.getElementById('search-input').value, painter);
        let parent = document.getElementById('search-results');
        while(parent.firstChild){
       parent.removeChild(parent.firstChild);
   }

    });

});


function printer(item){
    console.log(item);
}


function getSearchResults(input, callback){
    let articles;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=Search&info='+input, true);
        xhr.onload = function(){
            if(this.status == 200){
               articles = JSON.parse(this.responseText);
               console.log(articles);
               callback(articles); 
            }
        }
        xhr.send();
}


function painter(objs){
        const destination = document.getElementById('search-results');

        objs.forEach(item =>{


            //Setup elements

            var tile = document.createElement('div');
            var title = document.createElement('h3');
            var author = document.createElement('h4');
            
            tile.id = item.article_id;
           


            //Set id
            



            //Attribute Switch
           
                
            tile.className = 'small-tile'; 
            title.innerText = item.article_title;
            title.className = 'small-tile-title';
            author.innerText = item.author_name;
            author.className = 'small-tile-author';
                   
                
                  
            
               
            
           
    
            //Appending elements
            tile.appendChild(title);
            tile.appendChild(author);
            destination.appendChild(tile);
            
            console.log('tile appended successfully');

        });
}