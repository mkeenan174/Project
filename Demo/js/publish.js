import log from './log.js';
import ui from './ui.js';

window.addEventListener('load', () =>{
    ui.setup();
    log.Setup();
    const btn = document.getElementById('pub-btn');
    btn.addEventListener('click', () =>{
        let titleInput = document.getElementById('title-Input').value;
        let interestInput = document.getElementById('interest-Input').value;
        let opinionInput = document.getElementById('opinion-Input').value;
        let contentInput = document.getElementById('content-Input').value;
        publish(titleInput, interestInput, opinionInput, contentInput);


    });
});


function inputCheck(title, interest, opinion, content){
    if(title === undefined || interest === undefined || opinion === undefined || content === undefined ){
        return false;
    }else{
        return true;
    }

}

function publish(title, interest, opinion, content){
    if(inputCheck(title, interest, opinion, content) === true){
        const xhr = new XMLHttpRequest();
        var params = 'instruct=publish&title='+title+'&interest='+interest+'&opinion='+opinion+'&content='+content;

            xhr.open('Post', 'xhr.inc.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
              if (this.status == 200) {
                  console.log(this.responseText);
              }
            }
             xhr.send(params);
             
    }
}
