function sessionKiller(){       //kill any previous sessions
    sessionStorage.removeItem('email');
}
function sessionStored(){ //get a new session stored
    var input = document.getElementById("email");
    sessionStorage.setItem("email", input.value); 
}
function hide(id){
    document.getElementById(id).style.display = 'none';
}
function show(id){
    document.getElementById(id).style.display = 'block';
}