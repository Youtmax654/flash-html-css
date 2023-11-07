// Script pour tourner les cartes lorsqu'il y a un click
var cards = document.querySelectorAll(".card");
var nbClick = 0;
var selectedCards = [];
var isFlipped = [];
var timerStarted = false;
var intervalId = 0;

if (document.querySelectorAll("tr")) {
    cards.forEach(function (card) {
        card.addEventListener("click", function () {
            if (nbClick < 2 && !card.classList.contains("flipCard")) {
                nbClick++;
                card.classList.add("flipCard");
                selectedCards.push(card);
                isFlipped.push(card);

                if (nbClick === 2) {
                    let firstImage = selectedCards[0].querySelector(".backCard img");
                    let secondImage = selectedCards[1].querySelector(".backCard img");

                    if (firstImage.getAttribute("src") === secondImage.getAttribute("src")) {
                        selectedCards[0].classList.add("isFlipped");
                        selectedCards[1].classList.add("isFlipped");
                        nbClick = 0;
                        selectedCards = [];
                    } else {
                        setTimeout(function () {
                            selectedCards[0].classList.remove("flipCard");
                            selectedCards[1].classList.remove("flipCard");
                            nbClick = 0;
                            selectedCards = [];
                        }, 800);
                        for (let i = 0; i < 2; i++) {
                            isFlipped.pop(card);
                        }
                    }
                }

                // Lance le timer si la variable timerStarted à pour valeur faux (donc le lance 1 fois)
                if (timerStarted === false) {
                    intervalId = setInterval(timer, 10);
                    timerStarted = true;
                }
                let cardsLength = cards.length;
                let isFlippedLength = isFlipped.length;
                if (isFlippedLength === cardsLength) {
                    clearInterval(intervalId);
                    setTimeout(function () {
                        let usersMemoryScoresText = "Vous avez un score de " + minutes + " minutes, " + sec + " secondes et " + time + " ms";
                        let usersMemoryScores = (minutes * 60 + sec) * 100 + time;
                        let popup = document.getElementById("popup");
                        let popupScores = document.getElementById("score");
                        popupScores.innerText = usersMemoryScoresText;
                        popup.classList.add('appear');
                    }, 800);
                }
            }
        });
    });
}

// Script pour le timer
var timerElement = document.getElementById("timer");
var time = 0;
var sec = 0;
var minutes = 0;

function timer() {
    if (time == 100) {
        sec++;
        time = 0;
    }
    if (sec == 60) {
        minutes++;
        sec = 0;
    }
    timerElement.innerText = (minutes < 10 ? "0" : "") + minutes + ":" + (sec < 10 ? "0" : "") + sec + ":" + (time < 10 ? "0" : "") + time;
    time++;
}

function replayMemory() {
    document.querySelector('.tableGame').innerHTML = "";
    createTable();
    cards.forEach(function (card) {
    card.classList.remove("flipCard");
    isFlipped.pop(card);
    nbClick = 0;
    selectedCards = [];
    time = 0;
    sec = 0;
    minutes = 0;
    timerElement.innerText = "00:00:00";
    popup.classList.remove('appear');
    timerStarted = false;
    })
}