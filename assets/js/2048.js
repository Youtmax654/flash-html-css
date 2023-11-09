let tableGame = document.getElementById("tableGame2048");
let difficulty = document.getElementById("difficulty2048");
let submitGame = document.getElementById("submitGame2048");
let GameChoice = document.getElementById("gameChoice2048");
let scoreZone = document.getElementById("score");
let playable = false;
let AllCase = [];
let ColorNumber = {};
let score = 0;
function ChangeClass(){
    let p = document.querySelectorAll("#tableGame2048 tr td p");
    let randomColor = (Math.floor(Math.random()*0xFFFFFF)).toString(16).padStart(6, 0);
    p.forEach((element) => {
        if(element.innerText != ""){
            if(ColorNumber[element.innerHTML] == undefined){
                ColorNumber[element.innerHTML] = randomColor;
            }
            element.parentElement.style.background = "#" + ColorNumber[element.innerHTML];
        }else{
            element.parentElement.style.background = "";
        }
    });
}
function Move(Table, direction){
    let canChange = true;
    switch(direction){
        case "left":
            Table.forEach((element) => {
                for(let i = 0; i < element.length; i++){
                    if(element[i].firstChild.innerText != ""){
                        let continuer = true;
                        let tempI = i;
                        while(continuer){
                            if(element[tempI-1] != undefined && element[tempI-1].firstChild.innerText == ""){
                                element[tempI-1].firstChild.innerText = element[tempI].firstChild.innerText;
                                element[tempI].firstChild.innerText = "";
                            }else{
                                continuer = false;
                                canChange = true;
                            }
                            if(canChange && element[tempI-1] != undefined && element[tempI-1].firstChild.innerText == element[tempI].firstChild.innerText){
                                element[tempI-1].firstChild.innerText = element[tempI].firstChild.innerText * 2;
                                element[tempI].firstChild.innerText = "";
                                canChange = false;
                                score += parseInt(element[tempI-1].firstChild.innerText);
                            }
                            tempI--;
                        }
                    }
                }
            });
        break;
        case "right":
            Table.forEach((element) => {
                for(let i = 0; i < element.length; i++){
                    let rowIndex = element.length - 1 - i;
                    if(element[rowIndex].firstChild.innerText != ""){
                        let continuer = true;
                        let tempI = rowIndex;
                        while(continuer){
                            if(element[tempI+1] !== undefined && element[tempI+1].firstChild.innerText == ""){
                                element[tempI+1].firstChild.innerText = element[tempI].firstChild.innerText;
                                element[tempI].firstChild.innerText = "";
                            }
                            else{
                                continuer = false;
                                canChange = true;
                            }
                            if(canChange && element[tempI+1] != undefined && element[tempI+1].firstChild.innerText == element[tempI].firstChild.innerText){
                                element[tempI+1].firstChild.innerText = element[tempI].firstChild.innerText * 2;
                                element[tempI].firstChild.innerText = "";
                                canChange = false;
                                score += parseInt(element[tempI+1].firstChild.innerText);
                            }
                            tempI++;
                        }
                    }
                }
            });
            break;
        case "up":
            for(let j = 0; j < Table.length; j++){
                for(let i = 0; i < Table[j].length; i++){
                    if(Table[j][i].firstChild.innerText != ""){
                        let continuer = true;
                        let tempJ = j;
                        while(continuer){
                            if(Table[tempJ-1] != undefined && Table[tempJ-1][i].firstChild.innerText == ""){
                                Table[tempJ-1][i].firstChild.innerText = Table[tempJ][i].firstChild.innerText;
                                Table[tempJ][i].firstChild.innerText = "";
                            }else{
                                continuer = false;
                                canChange = true;
                            }
                            if(canChange && Table[tempJ-1] != undefined && Table[tempJ-1][i].firstChild.innerText == Table[tempJ][i].firstChild.innerText){
                                Table[tempJ-1][i].firstChild.innerText = Table[tempJ][i].firstChild.innerText * 2;
                                Table[tempJ][i].firstChild.innerText = "";
                                canChange = false;
                                score += parseInt(Table[tempJ-1][i].firstChild.innerText);
                            }
                            tempJ--;
                        }
                    }
                }
            }
            break;
        case "down":
            for (let i = 0; i < Table[0].length; i++) {
                for (let j = 0; j < Table.length; j++) {
                    let rowIndex = Table.length - 1 - j;
                    if (Table[rowIndex][i].firstChild.innerText != "") {
                        let continuer = true;
                        let tempJ = rowIndex;
                        while (continuer) {
                            if (Table[tempJ + 1] != undefined && Table[tempJ + 1][i].firstChild.innerText == "") {
                                Table[tempJ + 1][i].firstChild.innerText = Table[tempJ][i].firstChild.innerText;
                                Table[tempJ][i].firstChild.innerText = "";
                            } else {
                                continuer = false;
                                canChange = true;
                            }
                            if (canChange && Table[tempJ + 1] != undefined && Table[tempJ + 1][i].firstChild.innerText == Table[tempJ][i].firstChild.innerText) {
                                Table[tempJ + 1][i].firstChild.innerText = Table[tempJ][i].firstChild.innerText * 2;
                                Table[tempJ][i].firstChild.innerText = "";
                                canChange = false;
                                score += parseInt(Table[tempJ + 1][i].firstChild.innerText);
                            }
                            tempJ++;
                        }
                    }
                }
            }
            break;
        default:
            break;
    }
    
}
function GenerateRandom(Table){
    let possible = [];
    Table.forEach((element) => {
        element.forEach((SubElement) => {
            if(SubElement.firstChild.innerText == ""){
                possible.push(SubElement);
            }
            
        })
    })
    let randomCase = Math.floor(Math.random() * possible.length);
    let pourcent = Math.floor(Math.random() * 100);
    if(pourcent >= 90){
        possible[randomCase].firstChild.innerText = "4";
    }else{
        possible[randomCase].firstChild.innerText = "2";
    }
}

submitGame.addEventListener("click", function(){
    let sizeTable;
    switch(difficulty.value){
        case "1":
            sizeTable = 3;
            break;
        case "2":
            sizeTable = 4;
            break;
        case "3":
            sizeTable = 5;
            break;
        default:
            break;
    }
    for(let i = 0; i < sizeTable; i++){
        let tr = document.createElement("tr");
        for(let j = 0; j < sizeTable; j++){
            let td = document.createElement("td");
            let p = document.createElement("p");
            td.classList.add("case2048");
            td.appendChild(p);
            tr.appendChild(td);
        }
        tableGame.appendChild(tr);
    }
    GameChoice.classList.add("hidden");
    let Case = document.querySelectorAll("tr");
    Case.forEach((FuturCase) =>
        AllCase.push(FuturCase.querySelectorAll("td"))
    );
    playable = true;
    let older;
    for(let i = 0; i < 2; i++){
        let randomPlace = AllCase[Math.floor(Math.random() * AllCase.length)][Math.floor(Math.random() * AllCase.length)];
        if(randomPlace != older){
            randomPlace.firstChild.innerText = "2";
            older = randomPlace;
        }else{
            i--;
        }
    }
    ChangeClass();
})
document.addEventListener("keyup", function(){
    if(playable){
        switch(event.key){
            case "z":
            case "i":
            case "ArrowUp":
                Move(AllCase,"up");
                GenerateRandom(AllCase);
                break;
            case "s":
            case "k":
            case "ArrowDown":
                Move(AllCase, "down");
                GenerateRandom(AllCase);
                break;
            case "q":
            case "j":
            case "ArrowLeft":
                Move(AllCase, "left");
                GenerateRandom(AllCase);
                break;
            case "d":
            case "l":
            case "ArrowRight":
                Move(AllCase, "right");
                GenerateRandom(AllCase);
                break;
            default:
                break;
        }
    }
    ChangeClass();
    scoreZone.innerText = "Score = " + score;
})