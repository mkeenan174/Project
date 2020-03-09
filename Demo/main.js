
function ajaxReq(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?what-do=setup', true);

    xhr.onload = function(){
        console.log(this.responseText);
    }

    xhr.send();
}

function login(){
    
    var params = "name=ted";

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'xhr.inc.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
      console.log(this.responseText);
    }

    xhr.send("name=ted");
  }


function postName(e){
    e.preventDefault();

    var name = document.getElementById('name2').value;
    var params = "name="+name;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
      console.log(this.responseText);
    }

    xhr.send(params);
  }


function compTest(){
  var div = document.getElementById('test');
  var comp = document.createElement('test-comp');
  div.appendChild(comp);
  console.log('compTest');

}

function creator(){
  var div = document.getElementById('test');
  var p = document.createElement('p');
  p.textContent = ' This is a test paragraph';
  div.appendChild(p);
  console.log('creator');
}



function displayArticles(){
  
}