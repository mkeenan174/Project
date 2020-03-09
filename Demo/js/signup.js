window.addEventListener('click', (e) =>{
    e.preventDefault();
    console.log(e.target.id);
    if(e.target.id === 'signup-btn'){
        let name = document.getElementById('name-input').value;
        let email = document.getElementById('email-input').value;
        let pswd = document.getElementById('password-input').value;
        if(name !== undefined && email !== undefined && pswd !== undefined){
            signUp(name, email, pswd);
        }else{
            alert('All filed must bed filled!');
        }

    }
});


function signUp(name, email, pswd){
    var params = 'instruct=signup&name='+name+'&email='+email+'&pswd='+pswd;
    var xhr = new XMLHttpRequest();
    
    xhr.open('Post', 'xhr.inc.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(this.status == 200){
            let res = this.responseText;
            console.log(res);
        }
    }
    xhr.send(params);
    
}