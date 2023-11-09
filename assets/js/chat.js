window.onload = () => {
    let TextPlace = document.getElementById("TextPlace");
    TextPlace.addEventListener("keyup", verifEntree);
    
    let valid = document.getElementById("submit");
    valid.addEventListener("click", ajoutMessage);
}
let lastId = 0;
setInterval(chargeMessages, 100);

function verifEntree(e){
    if(e.key == "Enter"){
        ajoutMessage();
    }
}


function ajoutMessage() {
    let message = document.getElementById("TextPlace").value;
    
    if(message.length >= 3){
        if (message != "") {
            let donnees = {};
            donnees["message"] = message;
    
            let donneesJson = JSON.stringify(donnees);
            let xmlhttp = new XMLHttpRequest();
    
            xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4) {
                    if(this.status == 201) {
                        document.getElementById("TextPlace").value = "";
                    }else{
                        let reponse = JSON.parse(this.response);
                        alert(reponse.message);
                    }
                }
            }
    
            xmlhttp.open("POST", "/flash_memory/utils/AddChat.php");
            xmlhttp.send(donneesJson);
        }
    }
}


function chargeMessages() {

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                let messages = JSON.parse(this.response);
                messages.reverse();

                let discussion = document.querySelector(".msger-tchat");
                discussion.innerHTML = "";
                for (let message of messages) {
                    if(message.isSender == true){
                        discussion.innerHTML = `
                                                <div class="msg-right-msg">
                                                    <div class="msg-bubble">
                                                        <div class="msg-info">
                                                            <div class="msg-info-name">Vous</div>
                                                            <div class="msg-text">
                                                                <span>` + message.chatMessage + `</span>
                                                            </div>
                                                            <div class="msg-info-time">` + message.DateChat + `</div>
                                                        </div>
                                                    </div>
                                                </div>` + discussion.innerHTML;
                    }else{
                        discussion.innerHTML = `
                                                <div class="msg-left-msg">
                                                    <img src="/flash_memory/userFiles/` + message.usersId + `/userProfilePicture.jpg" class="msg-img" alt="pp user">
                                                    <div class="msg-bubble">
                                                        <div class="msg-info">
                                                            <div class="msg-info-name">`+ message.usersPseudo + `</div>
                                                            <div class="msg-text">`+ message.chatMessage + `</div>
                                                            <div class="msg-info-time">`+ message.DateChat + `</div>
                                                        </div>
                                                    </div>
                                                </div>` + discussion.innerHTML;
                    }
                    
                }
            }else{
                let erreur = JSON.parse(this.response);
                console.log(erreur.message);
            }
        }
    }

    xmlhttp.open("GET", "/flash_memory/utils/ShowChat.php?lastId="+lastId);
    xmlhttp.send() 
}