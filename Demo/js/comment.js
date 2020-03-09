export default class comment{
    constructor(id, author, time, content){
        this.id = id;
        this.author = author;
        this.time = time;
        this.content = content;
    }

    buildComment(location){

        //Creating elements
        var destination = document.getElementById(location);
        var commentHolder = document.createElement('div');
        var authorHolder = document.createElement('h4');
        var timeHolder = document.createElement('span');
        var contentHolder = document.createElement('p');

        // Setting Element Attributes
        commentHolder.className = 'comment-container';
        authorHolder.className = 'comment-author';
        authorHolder.innerText = this.author;
        timeHolder.className = 'comment-time';
        timeHolder.innerText = this.time;
        contentHolder.className = 'comment-content';
        contentHolder.innerText = this.content;

        //Appending Elements

        commentHolder.appendChild(authorHolder);
        commentHolder.appendChild(timeHolder);
        commentHolder.appendChild(contentHolder);
        destination.appendChild(commentHolder);

        console.log('Comment successfully built!');


    }
}