function isEqual(a, b)
{
    if (a instanceof Array && b instanceof Array)
    {
        if (a.length !== b.length) {
            return false;
        }
 
        for (let i = 0; i < a.length; i++)
        {
            if (!isEqual(a[i], b[i])) {
                return false;
            }
        }
 
        return true;
    }
 
    return a === b;
}
let buttonShow = document.getElementById("chat_lab");
let rick = ["ArrowUp","ArrowUp","ArrowDown","ArrowDown","ArrowLeft","ArrowRight","ArrowLeft","ArrowRight","b","a"];
let MotherLode = ["m","o","t","h","e","r","l","o","d","e"];
let EndInternet = ["e","n","d","i","n","t","e","r","n","e","t"];
let snap = ["t","h","a","n","o","s","s","n","a","p"];
let vomitron = ["v","o","m","i","t","r","o","n"]
let cheatCode = [];
let cheatCode11 = [];
let cheatCode8 = [];
let rickrolled = false;
let motherlodeded = false;
window.addEventListener("keydown", function(event){
    if(cheatCode.length >= 10){
        cheatCode.shift();
    }
    if(cheatCode11.length >= 11){
        cheatCode11.shift();
    }
    if(cheatCode8.length >= 9){
        cheatCode8.shift();
    }
    cheatCode.push(event.key);
    cheatCode11.push(event.key);
    cheatCode8.push(event.key);
    if(isEqual(rick, cheatCode)){
        document.location.href="https://www.youtube.com/watch?v=xvFZjo5PgG0";
    }
    if(isEqual(MotherLode, cheatCode)){
        this.document.querySelector("body").style.rotate = "180deg";
    }
    if(isEqual(vomitron, cheatCode8)){
        let deg = 0;
        setInterval(function(){
            deg += 100;
            this.document.querySelector("body").style.rotate = deg + "deg";
        }, 100)
    }
    if(isEqual(EndInternet, cheatCode11)){
        document.location.href="https://hmpg.net/";
    }
    if(isEqual(snap, cheatCode)){
        this.document.querySelector("body").classList.add("snap");
    }
});
if(buttonShow != null){
    buttonShow.addEventListener("click", function(){
        buttonShow.classList.toggle("show");
    });
}

let showPass = document.querySelectorAll(".showPassword");

showPass.forEach((element) => {
    element.addEventListener("click", function(){
        let div = element.parentElement;
        if(div.children[0].type == "password"){
            div.children[0].type = "text";
        }else{
            div.children[0].type = "password";
        }
        
    })

})