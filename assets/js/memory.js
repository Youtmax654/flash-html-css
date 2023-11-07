let tableVideoGames = ["amogus.png", "assassin.png", "automata.png", "csgo.png", "detroitBecomeHuman.jpeg", "fifa.jpeg", "fortnite.png", "ghostOfTsushima.jpg", "Gmod.png", "goatSimulator.png", "godOfWars.jpg", "golfIt.png", "gta.jpg", "halfLife.png", "helloNeighbor.png", "lol.jpg", "mario.png", "minecraft.png", "osu.png", "overwatch.jpg", "portal.png", "ratchetAndClank.jpeg", "roblox.jpeg", "seaOfThieves.jpeg", "shadowOfTheColossus.png", "skyrim.jpeg", "slimeRancher.png", "splatoon.jpeg", "valorant.jpg", "watchDogs.png", "WOW.jpeg", "zelda.jpeg"];
let tableAnimaux = ["aigle.png", "araigné.png", "baleine.png", "chat.png", "chenille.png", "chien.png", "cochon.png", "crabe.png", "éléphant.png", "étoile de mer.png", "girafe.png", "herisson.png", "jaguar.png", "lion.png", "mouche.png", "mouton.png", "oiseau.png", "ours.png", "panda.png", "panthère.png", "papillon.png", "pigeon.png", "pingouin.jpeg", "poisson.png", "poule.png", "renard.png", "requin.png", "serpent.png", "tatou.png", "tortue.png", "vache.png", "zebre.png"];
let tableFruits = ["abricot.png", "ananas.png", "banane.png", "canneberge.png", "carambola.png", "cerise.png", "citron.png", "coco.png", "datte.jpeg", "durian.png", "figue.png", "fraise.png", "framboise.png", "goyave.png", "grenade.jpeg", "kiwi.png", "litchi.png", "mandarine.png", "mangue.png", "melon.png", "murres.png", "myrtille.png", "orange.png", "pamplemousse.png", "papaye.png", "passion.png", "pasteque.png", "peche.png", "poire.png", "pomelo.png", "pomme.jpeg", "raisin.png"];
let theme = document.getElementById("theme");
let difficulty = document.getElementById("difficulty");
let submit = document.getElementById("submit");
let TableauDeJeu = document.querySelectorAll(".tableGame")[0];
let gameChoice = document.getElementById("gameChoice");
submit.addEventListener("click", function () {
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
});