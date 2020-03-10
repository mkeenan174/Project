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
        let imageInput = document.getElementById('img-Input');
        //console.log(imageInput.files);
        let image = imageInput.files[0];
        console.log(image);
        publish(titleInput, interestInput, opinionInput, contentInput, image);


    });
});


function inputCheck(title, interest, opinion, content){
    if(title === undefined || interest === undefined || opinion === undefined || content === undefined ){
        return false;
    }else{
        return true;
    }

}



// function publish(title, interest, opinion, content, image){
//     if(inputCheck(title, interest, opinion, content) === true){
//         const xhr = new XMLHttpRequest();
//         var params = 'instruct=publish&title='+title+'&interest='+interest+'&opinion='+opinion+'&content='+content+'&file='+image;
//             xhr.open('Post', 'xhr.inc.php', true);
//             xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//             xhr.onload = function(){
//               if (this.status == 200) {
//                   console.log(this.responseText);
//               }
//             }
//              xhr.send(params);
             
//     }
// }

function publish(title, interest, opinion, content, image){
    var formData = new FormData();
    formData.append('instruct', 'publish');
    formData.append('title', title);
    formData.append('interest', interest);
    formData.append('opinion', opinion);
    formData.append('content', content);
    formData.append('file', image);

    console.log(formData);

    const xhr = new XMLHttpRequest();

    xhr.open('Post', 'xhr.inc.php', true);
    xhr.onload = function(){
        if (this.status == 200) {
            console.log(this.responseText);
         }
    }
    xhr.send(formData);    


}
