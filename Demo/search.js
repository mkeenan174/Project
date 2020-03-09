window.addEventListener('load', () => {
   var searchBtn = document.getElementById('search-button');
  


    searchBtn.addEventListener('click', () =>{
        printer(document.getElementById('search-input').value);
        getSearchResults(document.getElementById('search-input').value, painter);

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
               callback(articles); 
            }
        }
        xhr.send();
}


function painter(objs){
        var destination = document.getElementById('search-results-pen');

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