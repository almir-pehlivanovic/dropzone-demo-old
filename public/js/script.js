document.querySelector("#sidebarCollapse").addEventListener('click', function(){
    document.querySelector("#sidebar").classList.toggle('active');
    document.querySelector(".content").classList.toggle('active-content');
});


let message     = document.querySelector('#session-message');
let messageText = document.querySelector('#sesion-text');
if(sessionStorage.getItem("message")){
    message.classList.remove('d-none');
    messageText.innerHTML = sessionStorage.getItem("message");
}

// Clear message session storage
var logoutTimer = setTimeout(function() { sessionStorage.removeItem('message'); }, 1000); 