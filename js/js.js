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
function landingPageEffect(){
    // Wrap every letter in a span
var textWrapper = document.querySelector('.ml12');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml12 .letter',
    translateX: [40,0],
    translateZ: 0,
    opacity: [0,1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i
  }).add({
    targets: '.ml12 .letter',
    translateX: [0,-30],
    opacity: [1,0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i
  });
}

