/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
document.addEventListener('DOMContentLoaded', function () {
    gameDropdownBtn = document.getElementById("gameDropdownBtn");
    gameDropdownBtn.addEventListener("click", function () {
        document.getElementById("gameDropdown").classList.toggle("showDropdown");
        document.getElementById("difficultyDropdown").classList.remove("showDropdown");
        document.getElementById("pseudoDropdown").classList.remove("showDropdown");
        if (document.getElementById("gameDropdown").classList.contains("showDropdown")) {
            document.querySelector("i.game").classList.replace("fa-chevron-down", "fa-chevron-up");
            gameDropdownBtn.classList.add("focus");
            document.querySelector("i.pseudo").classList.replace("fa-chevron-up", "fa-chevron-down")
            pseudoDropdownBtn.classList.remove("focus");
            document.querySelector("i.difficulty").classList.replace("fa-chevron-up", "fa-chevron-down")
            difficultyDropdownBtn.classList.remove("focus");
        } else {
            document.querySelector("i.game").classList.replace("fa-chevron-up", "fa-chevron-down")
            gameDropdownBtn.classList.remove("focus");
        }
        let firstGame = document.getElementById("firstGame");
        let secondGame = document.getElementById("secondGame");
        console.log(firstGame)
        firstGame.addEventListener("click", function () {
            firstGame.classList.toggle("checked")
            secondGame.classList.remove("checked")
            $.ajax({
                type: "POST",
                url: "/flash_memory/games/scoresAjax.php",
                data: "gameId=1",
                success: function (data) {
                    $("#scoresTable").html(data);
                }
            });

        })
        secondGame.addEventListener("click", function () {
            secondGame.classList.toggle("checked")
            firstGame.classList.remove("checked")
            $.ajax({
                type: "POST",
                url: "/flash_memory/games/scoresAjax.php",
                data: "gameId=2",
                success: function (data) {
                    $("#scoresTable").html(data);
                }
            });
        })
    })

    let difficultyDropdownBtn = document.getElementById("difficultyDropdownBtn")
    difficultyDropdownBtn.addEventListener("click", function () {
        document.getElementById("difficultyDropdown").classList.toggle("showDropdown");
        document.getElementById("gameDropdown").classList.remove("showDropdown");
        document.getElementById("pseudoDropdown").classList.remove("showDropdown");
        if (document.getElementById("difficultyDropdown").classList.contains("showDropdown")) {
            document.querySelector("i.difficulty").classList.replace("fa-chevron-down", "fa-chevron-up");
            difficultyDropdownBtn.classList.add("focus");
            document.querySelector("i.game").classList.replace("fa-chevron-up", "fa-chevron-down")
            gameDropdownBtn.classList.remove("focus");
            document.querySelector("i.pseudo").classList.replace("fa-chevron-up", "fa-chevron-down")
            pseudoDropdownBtn.classList.remove("focus");
        } else {
            document.querySelector("i.difficulty").classList.replace("fa-chevron-up", "fa-chevron-down")
            difficultyDropdownBtn.classList.remove("focus");
        }
        let easyDifficulty = document.getElementById("easyDifficulty")
        easyDifficulty.addEventListener("click", function () {
            easyDifficulty.classList.toggle("checked")
            mediumDifficulty.classList.remove("checked")
            hardDifficulty.classList.remove("checked")
            $.ajax({
                type: "POST",
                url: "/flash_memory/games/scoresAjax.php",
                data: "gameDifficulty=1",
                success: function (data) {
                    $("#scoresTable").html(data);
                }
            });
        })
        let mediumDifficulty = document.getElementById("mediumDifficulty")
        mediumDifficulty.addEventListener("click", function () {
            mediumDifficulty.classList.toggle("checked")
            easyDifficulty.classList.remove("checked")
            hardDifficulty.classList.remove("checked")
            $.ajax({
                type: "POST",
                url: "/flash_memory/games/scoresAjax.php",
                data: "gameDifficulty=2",
                success: function (data) {
                    $("#scoresTable").html(data);
                }
            });
        })
        let hardDifficulty = document.getElementById("hardDifficulty")
        hardDifficulty.addEventListener("click", function () {
            hardDifficulty.classList.toggle("checked")
            mediumDifficulty.classList.remove("checked")
            easyDifficulty.classList.remove("checked")
            $.ajax({
                type: "POST",
                url: "/flash_memory/games/scoresAjax.php",
                data: "gameDifficulty=3",
                success: function (data) {
                    $("#scoresTable").html(data);
                }
            });
        })
    })

    let pseudoDropdownBtn = document.getElementById("pseudoDropdownBtn")
    pseudoDropdownBtn.addEventListener("click", function () {
        document.getElementById("pseudoDropdown").classList.toggle("showDropdown");
        document.getElementById("difficultyDropdown").classList.remove("showDropdown");
        document.getElementById("gameDropdown").classList.remove("showDropdown");
        if (document.getElementById("pseudoDropdown").classList.contains("showDropdown")) {
            document.querySelector("i.pseudo").classList.replace("fa-chevron-down", "fa-chevron-up");
            pseudoDropdownBtn.classList.add("focus");
            document.querySelector("i.game").classList.replace("fa-chevron-up", "fa-chevron-down")
            gameDropdownBtn.classList.remove("focus");
            document.querySelector("i.difficulty").classList.replace("fa-chevron-up", "fa-chevron-down")
            difficultyDropdownBtn.classList.remove("focus");
        } else {
            document.querySelector("i.pseudo").classList.replace("fa-chevron-up", "fa-chevron-down")
            pseudoDropdownBtn.classList.remove("focus");
        }
        let scoresSearch = document.getElementById("scoresSearch");
        scoresSearch.addEventListener("keyup", function () {
            let scoresSearchValue = scoresSearch.value;
            $.ajax({
                type: "POST",
                url: "/flash_memory/games/scoresAjax.php",
                data: "searchValue=" + scoresSearchValue,
                success: function (data) {
                    $("#scoresTable").html(data);
                }
            });
        })
    })
})



// Close the dropdown menu if the user clicks outside of it
// window.onclick = function (event) {
//     if (!event.target.matches('.dropbtn')) {
//         var dropdowns = document.getElementsByClassName("dropdown-content");
//         var i;
//         for (i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.classList.contains('showDropdown')) {
//                 openDropdown.classList.remove('showDropdown');
//             }
//         }
//     }
// }