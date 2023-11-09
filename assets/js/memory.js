let tableVideoGames = ["amogus.png","assassin.png","automata.png","csgo.png","detroitBecomeHuman.jpeg",
                    "fifa.jpeg","fortnite.png","ghostOfTsushima.jpg","Gmod.png","goatSimulator.png",
                    "godOfWars.jpg","golfIt.png","gta.jpg","halfLife.png","helloNeighbor.png","lol.jpg",
                    "mario.png","minecraft.png","osu.png","overwatch.jpg","portal.png","ratchetAndClank.jpeg",
                    "roblox.jpeg","seaOfThieves.jpeg","shadowOfTheColossus.png","skyrim.jpeg","slimeRancher.png",
                    "splatoon.jpeg","valorant.jpg","watchDogs.png","WOW.jpeg","zelda.jpeg"];

let tableAnimaux = ["aigle.png","araigné.png","baleine.png","chat.png","chenille.png","chien.png",
                    "cochon.png","crabe.png","éléphant.png","étoile de mer.png","girafe.png",
                    "herisson.png","jaguar.png","lion.png","mouche.png","mouton.png","oiseau.png",
                    "ours.png","panda.png","panthère.png","papillon.png","pigeon.png","pingouin.jpeg",
                    "poisson.png","poule.png","renard.png","requin.png","serpent.png","tatou.png",
                    "tortue.png","vache.png","zebre.png"];

let tableFruits = ["abricot.png","ananas.png","banane.png","canneberge.png","carambola.png",
                "cerise.png","citron.png","coco.png","datte.jpeg","durian.png",
                "figue.png","fraise.png","framboise.png","goyave.png","grenade.jpeg",
                "kiwi.png","litchi.png","mandarine.png","mangue.png","melon.png",
                "murres.png","myrtille.png","orange.png","pamplemousse.png","papaye.png",
                "passion.png","pasteque.png","peche.png","poire.png","pomelo.png",
                "pomme.jpeg","raisin.png"];

let theme = document.getElementById("theme");
let difficulty = document.getElementById("difficulty");
let submit = document.getElementById("submit");
let TableauDeJeu = document.querySelectorAll(".tableGame")[0];
submit.addEventListener("click", function(){
    let TailleGrille = 0;
    let addBig = false;
    switch(difficulty.value){
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
    if(addBig){
        TableauDeJeu.setAttribute("id", "big")
    }
    for(let i = 0; i < TailleGrille; i++){
        let newTr = document.createElement("tr");
        TableauDeJeu.appendChild(newTr);
        for(let j = 0; j < TailleGrille; j++){
            let newTd = document.createElement("td");
            newTd.classList.add("card");
            let newImg = document.createElement("img");
            newImg.src = "/flash_memory/assets/images/carte.png";
            newTd.appendChild(newImg);
            newTr.appendChild(newTd);
        }
    }
});

