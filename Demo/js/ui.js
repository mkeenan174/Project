

export function show(){
    document.getElementById('sidebar').classList.toggle('active');
}


export function setUpLogin(){
    window.addEventListener('load', () =>{
        document.getElementById('login').addEventListener('click', () =>{
            document.querySelector('.log-modal').style.display = 'flex';
        });
    });
}


function setup(){
        let menuBtn = document.getElementById('menuBtn');
        menuBtn.addEventListener('click', () => {
            show();
        });

        let login = document.getElementById('login');
        login.addEventListener('click', () => {
            if(login.innerText == 'Login'){
                document.querySelector('.login-modal').style.display = 'flex';
            }else{
                document.querySelector('.logout-modal').style.display = 'flex';
            }
        });

        let loginClose = document.querySelector('.close');
        loginClose.addEventListener('click', () => {
            document.querySelector('.login-modal').style.display = 'none';
        });

     

        let logoutClose = document.getElementById('out-close');
        logoutClose.addEventListener('click', () => {
            document.querySelector('.logout-modal').style.display = 'none';
        });
        

}


export default { show, setUpLogin, setup}