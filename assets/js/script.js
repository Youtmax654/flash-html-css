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





function passwordStrength(password) {
    let strengthBar = document.getElementById("password-strength-bar");
    let strengthBarText = document.getElementById("password-text");

    var minChar = /.{8,}/;
    var uppercase = /[A-Z]/;
    var numbers = /[0-9]/;
    var specialChar = /[@$!%*?&/]/;

    strengthBar.style.visibility ="visible";
    strengthBarText.style.visibility ="visible";

    strengthBar.style.width = "100%";

     if (password.length === 0) {
        strengthBar.style.width = "0%";
        strengthBar.style.background = "linear-gradient(to right,#ccc 0%,#ccc 100%)";
        strengthBarText.innerText = "";
        
    } else if (minChar.test(password) && uppercase.test(password) && numbers.test(password) && specialChar.test(password)) {
        strengthBarText.innerText = "Strong";
        strengthBarText.style.color = "green";
        strengthBar.style.background = "linear-gradient(to right,green 66.66%,green 100%)";

    } else if (minChar.test(password) && uppercase.test(password) && numbers.test(password)) {
        strengthBarText.innerText = "Medium";
        strengthBarText.style.color = "orange";
        strengthBar.style.background = "linear-gradient(to right,orange 33.33%,orange 66.66%,#ccc 66.66%)";

    } else if (password.match(/.{1,}/))  {
        strengthBarText.innerText = "Weak";
        strengthBarText.style.color = "red";
        strengthBar.style.background = "linear-gradient(to right,red 0%,red 33.33%,#ccc 33.33%)";

    } 
}




























let buttonShow = document.getElementById("chat_lab");
let rick = ["ArrowUp","ArrowUp","ArrowDown","ArrowDown","ArrowLeft","ArrowRight","ArrowLeft","ArrowRight","b","a"];
let MotherLode = ["m","o","t","h","e","r","l","o","d","e"];
let EndInternet = ["e","n","d","i","n","t","e","r","n","e","t"];
let snap = ["t","h","a","n","o","s","s","n","a","p"];
let cheatCode = [];
let cheatCode11 = [];
let rickrolled = false;
let motherlodeded = false;
window.addEventListener("keydown", function(event){
    if(cheatCode.length >= 10){
        cheatCode.shift();
    }
    if(cheatCode11.length >= 11){
        cheatCode11.shift();
    }
    cheatCode.push(event.key);
    cheatCode11.push(event.key);
    if(isEqual(rick, cheatCode)){
        document.location.href="https://www.youtube.com/watch?v=xvFZjo5PgG0";
    }
    if(isEqual(MotherLode, cheatCode)){
        this.document.querySelector("body").style.rotate = "180deg";
    }
    if(isEqual(EndInternet, cheatCode11)){
        document.location.href="https://hmpg.net/";
    }
    if(isEqual(snap, cheatCode)){
        this.document.querySelector("body").classList.add("snap");
    }
});
buttonShow.addEventListener("click", function(){
    buttonShow.classList.toggle("show");
});