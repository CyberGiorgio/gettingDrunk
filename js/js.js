function sessionKiller(){       //kill any previous sessions
    sessionStorage.removeItem('user');
}
function sessionStored(){ //get a new session stored
    var input = document.getElementById('user');
    sessionStorage.setItem("user", input.value); 
}
function hide(id){
    document.getElementById(id).style.display = 'none';
}
function show(id){
    document.getElementById(id).style.display = 'block';
}
function hideError(classError){
    document.getElementByClass(classError).style.display = 'none';
}
