

function printer(b){
  console.log(b);
}

export function logStatus(){
        console.log('Checking login.....');
        var menuBtn = document.getElementById('login');
        var params = 'instruct=logstatus';
        var xhr = new XMLHttpRequest();
        xhr.open('Post', 'xhr.inc.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
          if (this.status == 200) {
              let info = JSON.parse(this.responseText);
              console.log(this.responseText);
              if(info[0] === 'Y'){
                let status = document.getElementById('status-txt');
                status.innerText = 'Hi '+info[1]+'!';  
                menuBtn.innerText = 'Logout';
              }else{
                console.log('not logged in');
                menuBtn.innerText = 'Login';
              }
          }
        }
         xhr.send(params);
                 
 }

 export function logIn(email, pswd){
        var params = 'instruct=logIn&eInfo='+email+'&pInfo='+pswd;
        var xhr = new XMLHttpRequest();
        xhr.open('Post', 'xhr.inc.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
          if (this.status == 200) {
             console.log(this.responseText);
             if(this.responseText === 'correct'){
                location.reload();
             }else{
                alert('incorrect password or email try again');
             }                      
         
          }
        }
         xhr.send(params);             
}

export function logOut(){
    var params = 'instruct=logout';

    var xhr = new XMLHttpRequest();
    xhr.open('Post', 'xhr.inc.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
      if (this.status == 200) {
          console.log(this.responseText);
          location.reload();
      }
    }
     xhr.send(params);
}


export function Setup(){
    
    logStatus();
    
    let loginBtn = document.getElementById('login-btn');
    loginBtn.addEventListener('click', () => {
        
        let email = document.getElementById('email-input').value;
        let pswd = document.getElementById('pswd-input').value;
        logIn(email, pswd);
    });


    let logoutBtn = document.getElementById('logout-btn');
    logoutBtn.addEventListener('click', () =>{
      logOut();
    });
}

 export default {logStatus, logIn, logOut, Setup}