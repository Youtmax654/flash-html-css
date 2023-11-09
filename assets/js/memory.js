// Script pour la génération du tableau 
let tableVideoGames = ["amogus.png", "assassin.png", "automata.png", "csgo.png", "detroitBecomeHuman.jpeg", "fifa.jpeg", "fortnite.png", "ghostOfTsushima.jpg", "Gmod.png", "goatSimulator.png", "godOfWars.jpg", "golfIt.png", "gta.jpg", "halfLife.png", "helloNeighbor.png", "lol.jpg", "mario.png", "minecraft.png", "osu.png", "overwatch.jpg", "portal.png", "ratchetAndClank.jpeg", "roblox.jpeg", "seaOfThieves.jpeg", "shadowOfTheColossus.png", "skyrim.jpeg", "slimeRancher.png", "splatoon.jpeg", "valorant.jpg", "watchDogs.png", "WOW.jpeg", "zelda.jpeg"];
let tableAnimaux = ["aigle.png", "araigné.png", "baleine.png", "chat.png", "chenille.png", "chien.png", "cochon.png", "crabe.png", "éléphant.png", "étoile de mer.png", "girafe.png", "herisson.png", "jaguar.png", "lion.png", "mouche.png", "mouton.png", "oiseau.png", "ours.png", "panda.png", "panthère.png", "papillon.png", "pigeon.png", "pingouin.jpeg", "poisson.png", "poule.png", "renard.png", "requin.png", "serpent.png", "tatou.png", "tortue.png", "vache.png", "zebre.png"];
let tableFruits = ["abricot.png", "ananas.png", "banane.png", "canneberge.png", "carambola.png", "cerise.png", "citron.png", "coco.png", "datte.jpeg", "durian.png", "figue.png", "fraise.png", "framboise.png", "goyave.png", "grenade.jpeg", "kiwi.png", "litchi.png", "mandarine.png", "mangue.png", "melon.png", "murres.png", "myrtille.png", "orange.png", "pamplemousse.png", "papaye.png", "passion.png", "pasteque.png", "peche.png", "poire.png", "pomelo.png", "pomme.jpeg", "raisin.png"];
let theme = document.getElementById("theme");
let difficulty = document.getElementById("difficulty");
let submit = document.getElementById("submitGame");
let TableauDeJeu = document.querySelectorAll(".tableGame")[0];
let gameChoice = document.getElementById("gameChoice");
submit.addEventListener("click", createTable)

function createTable() {
    gameChoice.classList.add("hidden");
    let ChoiceTheme;
    let TailleGrille;
    let addBig = false;
    switch (difficulty.value) {
        case "1":
            TailleGrille = 4;
            break;
        case "2":
            TailleGrille = 6;
            break;
        case "3":
            TailleGrille = 8;
            addBig = true;
            break;
        default:
            break;
    }
    switch (theme.value) {
        case "JV":
            ChoiceTheme = tableVideoGames;
            break;
        case "Fruit":
            ChoiceTheme = tableFruits;
            break;
        case "Animaux":
            ChoiceTheme = tableAnimaux;
            break;
        default:
            break;
    }
    if (addBig) {
        TableauDeJeu.setAttribute("id", "big")
    }
    let tempsCard = [];
    let which = Math.floor(Math.random() * ChoiceTheme.length);
    tempsCard.push(ChoiceTheme[which]);
    while (tempsCard.length < TailleGrille * TailleGrille / 2) {
        let already = true;
        tempsCard.forEach(function (card) {
            if (card == ChoiceTheme[which]) {
                already = false;
            }
        });
        if (already) {
            tempsCard.push(ChoiceTheme[which]);
        } else {
            which = Math.floor(Math.random() * ChoiceTheme.length);
        }
    }
    let TakingCard = [];
    for (let i = 0; i < tempsCard.length; i++) {
        TakingCard.push([tempsCard[i], 0]);
    }
    for (let i = 0; i < TailleGrille; i++) {
        let newTr = document.createElement("tr");
        TableauDeJeu.appendChild(newTr);
        for (let j = 0; j < TailleGrille; j++) {
            let newTd = document.createElement("td");
            let FrontCard = document.createElement("div");
            let BackCard = document.createElement("div");
            newTd.classList.add("card");
            FrontCard.classList.add("frontCard");
            BackCard.classList.add("backCard");
            let newImg = document.createElement("img");
            let newImgBack = document.createElement("img");
            newImg.src = "/flash_memory/assets/images/carte.png";
            let link;
            switch (theme.value) {
                case "JV":
                    link = "/jeux-videos/";
                    break;
                case "Fruit":
                    link = "/Fruit/";
                    break;
                case "Animaux":
                    link = "/animaux/";
                    break;
                default:
                    break;
            }
            let showed = true;
            while (showed) {
                let randomChose = Math.floor(Math.random() * tempsCard.length);
                if (TakingCard[randomChose][1] < 2) {
                    newImgBack.src = "/flash_memory/assets/images" + link + tempsCard[randomChose];
                    TakingCard[randomChose][1]++;
                    FrontCard.appendChild(newImg);
                    BackCard.appendChild(newImgBack);
                    newTd.appendChild(FrontCard);
                    newTd.appendChild(BackCard);
                    newTr.appendChild(newTd);
                    showed = false;
                }
            }
        }
    }
    let newScript = document.createElement("script");
    newScript.src = "/flash_memory/assets/js/flipCard.js";
    document.body.appendChild(newScript);

    // Afficher le timer
    let timer = document.getElementById('timer');
    timer.style.visibility = "visible";
}

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
                        let difficulty = document.getElementById("difficulty");
                        popupScores.innerText = usersMemoryScoresText;
                        popup.classList.add('appear');
                        // Partie AJAX pour envoyer les données vers la base de données
                        let memoryDifficulty = difficulty.value;
                        $.ajax({
                            type: "POST",
                            url: "/flash_memory/games/memory/index.php",
                            data: "usersMemoryScores=" + usersMemoryScores + "&memoryDifficulty=" + memoryDifficulty,
                        });
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