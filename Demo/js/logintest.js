window.addEventListener('load', () =>{
       postTest('Hello');

       var logInbtn = document.getElementById('logIn-btn');
       logInbtn.addEventListener('click', (e) => {
           e.preventDefault();
            let eInput = document.getElementById('email-input').value;
            let pInput = document.getElementById('password-input').value;
             login(eInput, pInput, printer);
           
       });
});


function postTest(intruct) {
    var params = 'instruct='+intruct;
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

function printer(input){
    console.log(input) 

}

function login(inputE, inputP, callback){
    if(inputE.length > 0 && inputP.length > 0 ){
            var params = 'instruct=logIn&eInfo='+inputE+'&pInfo='+inputP;

            var xhr = new XMLHttpRequest();
            xhr.open('Post', 'xhr.inc.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
              if (this.status == 200) {
                 
                   callback(this.responseText);
                  
             
              }
            }
             xhr.send(params);
             
    }
    
}
export function logout(){
    var params = 'instruct=logout';

            var xhr = new XMLHttpRequest();
            xhr.open('Post', 'xhr.inc.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
              if (this.status == 200) {
                  console.log(this.responseText);
              }
            }
             xhr.send(params);
             
    }

