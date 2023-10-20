let buttonShow = document.querySelector("#chat_lab");
let rick = ["ArrowUp","ArrowUp","ArrowDown","ArrowDown","ArrowLeft","ArrowRight","ArrowLeft","ArrowRight","b","a"];
let possibleRick = [];
let rickrolled = false;
window.addEventListener("keydown", function(event){
    if(possibleRick.length >= 10){
        possibleRick.shift();
    }
    possibleRick.push(event.key);
    if(rick.length == possibleRick.length){
        for(let i = 0; i < rick.length; i++){
            if(rick[i] == possibleRick[i]){
                rickrolled = true;
            }
            else{
                rickrolled = false;
            }
        }
        if(rickrolled){
            document.location.href="https://www.youtube.com/watch?v=xvFZjo5PgG0";
        }
    }
});
buttonShow.addEventListener("click", function(){
    buttonShow.classList.toggle("show");
});