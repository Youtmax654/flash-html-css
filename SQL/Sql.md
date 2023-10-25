# Story 1
## Création de la base de données
```sql
CREATE DATABASE PowerOfMemory; 
```
##0 Sélection de la base de données
```sql
USE PowerOfMemory;
```
## Création de la table users
```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    usersId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usersEmail VARCHAR(50) NOT NULL,
    usersPassword VARCHAR(255) NOT NULL,
    usersPseudo VARCHAR(50) NOT NULL,
    usersCreatedDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usersLastConnexion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
```
## Création de la table game
```sql
DROP TABLE IF EXISTS game;
CREATE TABLE game (
    gameId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gameName VARCHAR(50) NOT NULL
);
```
## Création de la table scores
```sql
DROP TABLE IF EXISTS scores;
CREATE TABLE scores (
    scoresId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usersId INT,
    gameId INT,
    scoresDifficulty INT NOT NULL,
    scoresPoints INT NOT NULL,
    scoresDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_scores_users FOREIGN KEY(usersId) REFERENCES users(usersId),
    CONSTRAINT fk_scores_game FOREIGN KEY(gameId) REFERENCES game(gameId)
); 
```
## Création de la table chat
```sql
DROP TABLE IF EXISTS chat;
CREATE TABLE chat (
    chatId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gameId INT,
    usersId INT,
    chatMessage TEXT NOT NULL,
    chatDate DATETIME NOT NULL,
    CONSTRAINT fk_chat_game FOREIGN KEY(gameId) REFERENCES game(gameId),
    CONSTRAINT fk_chat_users FOREIGN KEY(usersId) REFERENCES users(usersId)
)
```
# Story 2
## Insertion des données dans la BDD

### Users
```sql
INSERT INTO users (`usersEmail`,`usersPassword`,`usersPseudo`) 
VALUES  ("jacque@gmail.com","1234","Jaquie"),
        ("maxime@gmail.com","1234","Youtmax654"),
        ("charles@gmail.com","1234","charles.zbr"),
        ("killian@gmail.com","1234","Lomudru"),
        ("thibault@gmail.com","1234","thibault");
```

### Game
```sql
INSERT INTO game (`gameName`) 
VALUES ("Power Of Memory");
```

### Scores
```sql
INSERT INTO scores (`usersId`,`gameId`,`scoresDifficulty`,`scoresPoints`,`scoresDate`) 
VALUES 	(4, 1, 1, 1000, "2020-12-24"),
		(4, 1, 2, 10000, "2020-07-14"),
        (4, 1, 3, 30000, "2022-06-23"),
        (4, 1, 2, 5000, "2024-08-30"),
        (4, 1, 2, 1, "2023-11-11"),
        (3,1,2,8000,'2009-05-22'),
        (3,1,1,12000,'2020-02-12'),
        (3,1,3,40000,'2020-07-02'),
        (3,1,2,25000,'2007-01-30'),
        (3,1,1,5000,'2021-10-28'),
        (2,1,3,1002,"2023-10-23"),
        (2,1,3,1224,"2023-10-23"),
        (2,1,1,142,"2023-10-23"),
        (2,1,2,298,"2023-10-23"),
        (2,1,3,965,"2023-10-23"),
        (1,1,3,2956,"2023-09-23"),
        (1,1,2,2345,"2022-09-23"),
        (1,1,1,1974,"2013-03-14"),
        (1,1,2,4964,"2023-04-23"),
        (1,1,1,4444,"2010-09-23"),
        (5,1,2,5122,'2021-02-21'),
        (5,1,1,13468,'2023-12-22'),
        (5,1,3,35826,'2023-07-02'),
        (5,1,2,25989, "2022-02-18"),
        (5,1,1,2534,"2020-09-27");
```

### Chat
```sql
INSERT INTO chat(`gameId`,`usersId`,`chatMessage`,`chatDate`)
VALUES 	(1, 2, "Salut tout le monde, ça va ?", "2023-10-23 12:00"),
		(1, 4, "Salut Youtmax, ça va bien, merci. Et toi ?", "2023-10-23 12:01"),
        (1, 2, "Ça va, merci. Je suis un peu stressée pour mon examen de demain.", "2023-10-23 12:02"),
        (1, 3, "Ah oui, j'ai eu un examen hier, c'était pas facile.", "2023-10-23 12:03"),
        (1, 5, "Moi aussi j'ai un examen demain, mais je suis plutôt confiant.", "2023-10-23 12:04"),
        (1, 1, "Bon courage à tous pour vos examens !", "2023-10-23 12:05"),
        (1, 2, "Merci Jaquie !", "2023-10-23 12:06"),
        (1, 4, "On a qu'à se motiver ensemble !", "2023-10-23 12:07"),
        (1, 3, "Oui, c'est ça !", "2023-10-23 12:08"),
        (1,4,"Ouais, c'est un film que j'attends avec impatience.","2023-10-23 12:18"),
        (1,3,"Et toi, Jaquie, c'est quoi la pièce ?","2023-10-23 12:19"),
        (1,1,"C'est une pièce de théâtre classique, ça s'appelle Le Cid.","2023-10-23 12:20"),
        (1,2,"Ah oui, je connais, c'est une pièce très belle.","2023-10-23 12:21"),
        (1,4,"Je vais essayer de la voir un de ces jours.","2023-10-23 12:22"),
        (1,3,"Moi aussi, ça a l'air intéressant.","2023-10-23 12:23"),
        (1,5,"Bon, je vais vous laisser, je dois aller réviser.","2023-10-23 12:24"),
        (1,4,"Salut Thibault, bon courage !","2023-10-23 12:25"),
        (1,5,"On va le faire !", "2023-10-23 12:09"),
        (1,1,"Je vous crois !", "2023-10-23 12:10"),
        (1,2,"Et sinon, vous avez prévu quoi ce soir ?", "2023-10-23 12:11"),
        (1,4,"Lomudru: Je vais sortir avec des amis.", "2023-10-23 12:12"),
        (1,3,"Moi je vais réviser pour mon examen de demain.", "2023-10-23 12:13"),
        (1,5,"Moi je vais regarder un film.", "2023-10-23 12:14"),
        (1,1,"Moi je vais aller au théâtre.!", "2023-10-23 12:15"),
        (1,2,"Ça a l'air cool, Thibault.", "2023-10-23 12:16"),
        (1,4,"Ouais, c'est un film que j'attends avec impatience.", "2023-10-23 12:17")
```
# Story 3
## Rendre les emails et les pseudos uniques dans la BDD
```sql 
CREATE UNIQUE INDEX index_email
ON users (usersEmail);
CREATE UNIQUE INDEX index_pseudo
ON users (usersPseudo);
```
## Ajout d'un nouvel utilisateur dans la BDD
```sql
INSERT INTO users (`usersEmail`,`usersPassword`,`usersPseudo`,`usersCreatedDate`)
VALUES ("ceciestunnouveaucompte@gmail.com","1234","NewAccount","2023-10-23 21:00")
```

# Story 4
## Modification des informations de l'utilisateur
### Le mot de passe
```sql
UPDATE users SET usersPassword = "4321" WHERE `usersId` = 4;
```

### L'email
```sql
UPDATE users SET usersEmail = "newemail@gmail.com" WHERE usersId = 5 AND usersPassword = "1234"
```

# Story 5
## Recherche les informations de l'utilisateur à partir de son email et de son mot de passe
```sql
SELECT * FROM users WHERE usersEmail = "newemail@gmail.com" AND usersPassword = "1234"
```
# Story 6
## Insertion d'un nouveau jeu dans la BDD
```sql
INSERT INTO game (`gameName`) 
VALUES ("The Power Of Memory");
```
# Story 7
## Affichage des scores des utilisateurs
```sql
SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints
FROM scores
INNER JOIN game
ON scores.gameId = game.gameId
INNER JOIN users
ON scores.usersId = users.usersId
ORDER BY gameName ASC, scoresDifficulty ASC, scoresPoints ASC
```
# Story 8
## Affichage des scores des utilisateurs avec des filtres
```sql
SELECT gameName, usersPseudo, scoresDifficulty, scoresPoints
FROM scores
INNER JOIN game
ON scores.gameId = game.gameId
INNER JOIN users
ON scores.usersId = users.usersId
WHERE gameName = "Power Of Memory" AND usersPseudo = "Youtmax654" AND scoresDifficulty = 3
ORDER BY gameName ASC, scoresDifficulty ASC, scoresPoints ASC
```
# Story 9
## Vérification pour savoir si il existe des doublons dans la table scores
```sql
SELECT COUNT(*) AS nbr_doublon, usersId, gameId, scoresDifficulty
FROM scores
GROUP BY usersId, gameId, scoresDifficulty
HAVING COUNT(*) > 1
```
## Suppression des doublons de la table scores
```sql
DELETE t1 
FROM scores AS t1, scores AS t2
WHERE t1.scoresId > t2.scoresId
AND t1.usersId = t2.usersId
AND t1.gameId = t2.gameId
AND t1.scoresDifficulty = t2.scoresDifficulty
```


## Insertion ou modification du score de l'utilisateur qui a terminé sa partie
```sql
UPDATE scores SET scoresPoints = 4521, scoresDate = DEFAULT
WHERE usersId = 2 AND gameId = 1 AND scoresDifficulty = 1;

INSERT INTO scores (`usersId`,`gameId`,`scoresDifficulty`,`scoresPoints`)
SELECT 2,1,1,4521
WHERE NOT EXISTS (SELECT 1
                  FROM scores
                  WHERE usersId = 2
                  AND gameId = 1
                  AND scoresDifficulty = 1)
```
# Story 10
## Insertion d'un nouveau message dans la BDD
```sql
INSERT INTO chat (`gameId`,`usersId`,`chatMessage`,`chatDate`)
VALUES (1,2,"Hello Word!", "2023-10-22 20:03")
```
# Story 11
## Affichage des messages des dernières 24h
```sql
SELECT chatMessage, usersPseudo, chatDate,
	CASE 
		WHEN chat.usersId = 1 THEN 'true'
		ELSE 'false'
	END AS isSender
FROM chat
LEFT JOIN users
ON chat.usersId = users.usersId
WHERE chatDate >= NOW() - INTERVAL 1 DAY
```
# Story 12
## Insertion de données pour l'exemple
```sql 
UPDATE users
SET usersPseudo = "Thibaud"
WHERE usersId = 1;
UPDATE users
SET usersPseudo = "Aurélien"
WHERE usersId = 5;
UPDATE users
SET usersPseudo = "Maud"
WHERE usersId = 6;
INSERT INTO scores (`usersId`,`gameId`,`scoresDifficulty`,`scoresPoints`,`scoresDate`) 
VALUES 	(6, 2, 1, 10065, "2021-11-22");
```
## Effectuer une recherche à partir d'un nom d'utilisateur
```sql
SELECT `scoresId`, scores.usersId, `gameId`, `scoresDifficulty`, `scoresPoints`, `scoresDate`
FROM `scores`
INNER JOIN users
ON scores.usersId = users.usersId
WHERE usersPseudo LIKE "%au%"
```

# Story 13

## Création de la table PrivateChat
```sql
DROP TABLE IF EXISTS privateChat;
CREATE TABLE privateChat (
    privateChatId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstUsersId INT NOT NULL,
    secondUsersId INT NOT NULL,
    privateChatMessage TEXT NOT NULL,
    isRead boolean NOT NULL DEFAULT FALSE,
    privateChatSendDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    privateChatReadDate DATETIME NULL,
    CONSTRAINT fk_privateChat_firstUsersId FOREIGN KEY (firstUsersId) REFERENCES users(usersId),
    CONSTRAINT fk_privateChat_secondUsersId FOREIGN KEY (secondUsersId) REFERENCES users(usersId)
)
```
# Story 14
## Ajout de données de test
```sql
INSERT INTO privatechat (`firstUsersId`,`secondUsersId`,`privateChatMessage`,`isRead`,`privateChatSendDate`,`privateChatReadDate`)
VALUES     (4,5,"Salut Aurélien, ça va ?",true,"2023-10-24 10:21:32","2023-10-24 10:21:54"),
        (5,4,"Salut Lomudru, ça va bien, merci. Et toi ?",true,"2023-10-24 10:22:12","2023-10-24 10:22:15"),
        (4,5,"Moi aussi, ça va. Je suis en train de préparer un examen, et ça me stresse un peu.",true,"2023-10-24                         10:22:34","2023-10-24 10:22:59"),
        (5,4,"Ah, je comprends. Les examens, c'est toujours stressant.",true,"2023-10-24 10:23:08","2023-10-24 10:23:14"),
        (4,5,"Oui, surtout celui-là. C'est un examen important pour mon orientation.",true,"2023-10-24 10:23:30","2023-10-24             10:23:35"),
        (5,6,"Salut Maud, comment vas-tu ?",true,"2023-10-24 10:25:34","2023-10-24 10:25:57"),
        (6,5,"Salut Aurélien, ça va et toi ?",true,"2023-10-24 10:26:08","2023-10-24 10:26:35"),    
        (5,6,"Je vais bien merci.",true,"2023-10-24 10:26:41","2023-10-24 10:26:49"),
        (6,5,"Que fais-tu ?",true,"2023-10-24 10:26:56","2023-10-24 10:27:00"),  
        (5,6,"Je prépare un examen.",true,"2023-10-24 10:27:10","2023-10-24 10:27:20"),
        (1,3,"Salut",true,"2023-10-23 20:34:17" , "2023-10-23 21:56:12"),
        (3,1,"Comment tu vas ?",true,"2023-10-23 21:56:20" , "2023-10-23 21:56:22"),
        (1,3,"Ca va super, j'ai fini de régler le problème sur le chat",true,"2023-10-23 21:56:30" , "2023-10-23 21:56:31"),
        (3,1,"Parfait alors moi je dois finir ma partie et je te redis ça demain",true,"2023-10-23 21:56:50" , "2023-10-23 21:56:52"),
        (1,3,"Vasy à demain",true,"2023-10-23 21:57:00" , "2023-10-23 21:59:00"),
        (3,1,"Ouais",true,"2023-10-23 21:59:17" , "2023-10-23 21:59:43"),

        (3,4, "Salut Thibaud tu en es où sur le projet ?",true,"2023-10-23 22:02:18" , "2023-10-23 22:10:39"),
        (4,3, "Hola, j'ai bientot fini il me reste deux-trois trucs à poffiner",true,"2023-10-23 22:11:04" , "2023-10-23 22:11:05"),
        (3,4, "Super tu nous montrera ça, j'ai de mon coté ajouté quelques petites fonctions bonus",true,"2023-10-23 22:20:59" , "2023-10-23 23:08:12"),
        (4,3, "Ok on regarde tout ça demain",true,"2023-10-23 23:10:32" , "2023-10-23 23:54:41");
```
## Gérer la création, modification et suppression d'un message
### Création d'un message
```sql
INSERT INTO privateChat(`firstUsersId`,`secondUsersId`,`privateChatMessage`)
VALUES (2,3,"salut")
```
### Modification d'un message
```sql
UPDATE privateChat
SET `privateChatMessage` = "salut encore"
WHERE `privateChatId` = 1
```
### Suppression d'un message
```sql
DELETE FROM privateChat
WHERE `privateChatId` = 1
```

# Story 15
## Affichage du dernier message envoyé ou reçu par l'utilisateur connecté
```sql
SELECT `privateChatMessage`, U1.usersPseudo AS SenderPseudo, U2.usersPseudo AS ReceiverPseudo, `privateChatSendDate`, `privateChatReadDate`, `isRead`
FROM privateChat
LEFT JOIN users AS U1 
ON privateChat.firstUsersId = U1.usersId
LEFT JOIN users AS U2 
ON privateChat.secondUsersId = U2.usersId
WHERE (`firstUsersId` = 3 XOR `secondUsersId` = 3)
AND `privateChatSendDate` = (
        SELECT MAX(`privateChatSendDate`)
        FROM privateChat AS pc
        WHERE CONCAT(LEAST(pc.firstUsersId, pc.secondUsersId), GREATEST(pc.firstUsersId, pc.secondUsersId)) =                 CONCAT(LEAST(privateChat.firstUsersId, privateChat.secondUsersId), GREATEST(privateChat.firstUsersId, privateChat.secondUsersId))
)
ORDER BY `privateChatSendDate` DESC;
```

# Story 16
## Affichage de la discussion entre 2 utilisateurs
```sql
SELECT privateChatMessage AS Message, U1.usersPseudo AS SenderPseudo, U2.usersPseudo AS ReceiverPseudo, `privateChatSendDate`,`privateChatReadDate`,`isRead`, (
    SELECT COUNT(scoresId)
    FROM scores AS S
    WHERE s.usersId = U1.usersId
) AS SenderPlayedGame,(
    SELECT COUNT(scoresId)
    FROM scores AS S
    WHERE s.usersId = U2.usersId
) AS ReceiverPlayedGame,(
    SELECT G.gameName
    FROM scores AS S
    INNER JOIN game AS G
    ON S.gameId = G.gameId
    WHERE s.usersId = U1.usersId
    GROUP BY G.gameName
    ORDER BY COUNT(S.scoresId) DESC
    LIMIT 1
) AS SenderMostPlayedGame,(
    SELECT G.gameName
    FROM scores AS S
    INNER JOIN game AS G
    ON S.gameId = G.gameId
    WHERE s.usersId = U2.usersId
    GROUP BY G.gameName 
    ORDER BY COUNT(S.scoresId) DESC
    LIMIT 1
) AS ReceiverMostPlayedGame
FROM privateChat
LEFT JOIN users AS U1
ON privateChat.firstUsersId = U1.usersId
LEFT JOIN users AS U2
ON privateChat.secondUsersId = U2.usersId
WHERE `firstUsersId` = 1 XOR `secondUsersId` = 1
ORDER BY `privateChatSendDate` ASC
```

# Story 17
## Ajout de données de test pour vérifier le bon fonctionnement des requêtes suivantes
```sql
INSERT INTO scores (`usersId`,`gameId`,`scoresDifficulty`,`scoresPoints`,`scoresDate`)
VALUES 
(1,2,1,12645,"2023-01-19"),
(1,2,2,52375,"2023-05-01"),
(1,1,3,42535,"2023-03-30"),
(1,2,3,24356,"2023-08-07"),
(1,1,1,21486,"2023-03-07"),
(1,2,2,58763,"2023-09-21"),
(1,1,3,5021,"2023-02-28"),
(2,2,1,12736,"2023-02-18"),
(2,2,3,25536,"2023-12-19"),
(2,2,2,73465,"2023-06-30"),
(2,2,1,26357,"2023-09-14"),
(2,2,3,12846,"2023-11-19"),
(2,2,3,62345,"2023-03-27"),
(2,2,2,17894,"2023-05-17"),
(3,1,2,27831,"2023-08,30"),
(3,1,1,7364,"2023-12,17"),
(3,2,2,27819,"2023-11,24"),
(3,1,2,24563,"2023-10,26"),
(3,1,3,62734,"2023-04,15"),
(3,2,1,2768,"2023-01,31"),
(3,2,1,5003,"2023-12,13"),
(4,1,3,25364,"2023-02-15"),
(4,2,1,12435,"2023-11-27"),
(4,2,1,11625,"2023-06-24"),
(4,1,2,9023,"2023-12-19"),
(4,1,3,35467,"2023-02-28"),
(4,1,1,5637,"2023-03-12"),
(4,1,1,4763,"2023-06-01"),
(5,2,3,23645,"2023-07-09"),
(5,1,2,12734,"2023-01-04"),
(5,2,1,35467,"2023-03-23"),
(5,2,3,23985,"2023-03-27"),
(5,2,3,12369,"2023-06-02"),
(5,2,3,27835,"2023-11-08"),
(5,2,3,9245,"2023-09-12"),
(6,1,2,53642,"2023-03-17"),
(6,2,2,7124,"2023-09-17"),
(6,1,2,9710,"2023-05-17"),
(6,2,2,27610,"2023-10-17"),
(6,1,2,6650,"2023-09-17"),
(6,2,2,15693,"2023-01-17"),
(6,1,2,27001,"2023-12-17")
```

## Affichage des stats de tous les joueurs en fonction d'une année
```sql
SELECT "2023" AS Annee, @mois := @mois + 1 AS Mois, (
    SELECT u.usersPseudo
    FROM scores AS S
    LEFT JOIN users AS U
    ON s.usersId = u.usersId
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee
    ORDER BY scoresPoints ASC
    LIMIT 1
) AS TOP_1, (
    SELECT u.usersPseudo
    FROM scores AS S
    LEFT JOIN users AS U
    ON s.usersId = u.usersId
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee AND u.usersPseudo != TOP_1
    ORDER BY scoresPoints ASC
    LIMIT 1
) AS TOP_2, (
    SELECT u.usersPseudo
    FROM scores AS S
    LEFT JOIN users AS U
    ON s.usersId = u.usersId
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee AND u.usersPseudo != TOP_1 AND u.usersPseudo != TOP_2
    ORDER BY scoresPoints ASC
    LIMIT 1
) AS TOP_3,(
    SELECT COUNT(scoresId)
    FROM scores
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee
) AS "Total parties",(
    SELECT G.gameName
    FROM scores AS S
    INNER JOIN game AS G
    ON S.gameId = G.gameId
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee
    GROUP BY G.gameName
    ORDER BY COUNT(S.scoresId) DESC
    LIMIT 1
) AS "Jeu le plus joué"
FROM scores, (SELECT @mois := 0) AS m
GROUP BY scoresId
LIMIT 12
```

# Story 18
## Affichage des stats d'un seul joueur en fonction d'une année
```sql
SELECT "2023" AS Annee, @mois := @mois + 1 AS Mois, (
    SELECT COUNT(scoresId)
    FROM scores
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee
    AND usersId = 1
) AS "Total parties", (
    SELECT G.gameName
    FROM scores AS S
    INNER JOIN game AS G
    ON S.gameId = G.gameId
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee
    AND usersId = 1
    GROUP BY G.gameName
    ORDER BY COUNT(S.scoresId) DESC
    LIMIT 1
) AS "Jeu le plus joué", (
    SELECT ROUND(AVG(`scoresPoints`))
    FROM scores
    WHERE MONTH(scoresDate) = @mois AND YEAR(scoresDate) = Annee
    AND usersId = 1
) AS "Score moyen"
FROM scores, (SELECT @mois := 0) AS m
GROUP BY scoresId
LIMIT 12
```

## Suppression des doublons de la table scores
```sql
DELETE t1 
FROM scores AS t1, scores AS t2
WHERE t1.scoresId > t2.scoresId
AND t1.usersId = t2.usersId
AND t1.gameId = t2.gameId
AND t1.scoresDifficulty = t2.scoresDifficulty
```