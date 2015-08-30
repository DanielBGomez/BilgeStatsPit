##BilgeStatsPit - Riot Games API Challenge 2.0 Entry
######by Daniel BGomez (LAN: DanielGomez)

This app let you know the stats of every champion played while the Black Market Brawlers Games; Champions, items and summoner spells popularity; Multi Kills, etc.
 
*Note: Sorry for my bad english (if so)* 
 
###Live Url
You can see this project live now in

http://danielbgomez.com/bilgestatspit/

Project details in plain language at the "About" section.

###how I got the Data?
Since I wanted to get information from most of the games offered in the contest, and doing calculations individually using only the API would make it very slow and clumsy, I used a local database where mainly kept the id of the games (**10,000** per region = **100,000** in total) and with an algorithm I began to get the information of each match 1-1, keeping the game information in a table where stored the information required for each game participant (Champions in this case ), it also updated the status of the games in the database to prevent duplicate values.

####Data Stored: 
######(The raw data isn't at the files)
```
Matchs:
* matchId 
* region
* matchDuration

Participants:
* matchid
* region
* teamId 
* spell1Id 
* spell2Id 
* championId 
* highestAchievedSeasonTier
* participantId 
* winner 
* champLevel 
* item0 
* item1 
* item2 
* item3 
* item4 
* item5 
* item6 
* kills 
* doubleKills
* tripleKills 
* quadraKills 
* pentaKills
* unrealKills 
* largestKillingSpree
* deaths 
* assists
* totalDamageDealt
* totalDamageDealtToChampions
* totalDamageTaken 
* largestCriticalStrike
* totalHeal 
* minionsKilled
* neutralMinionsKilled
* neutralMinionsKilledTeamJungle
* neutralMinionsKilledEnemyJungle 
* goldEarned
* goldSpent
* combatPlayerScore
* objectivePlayerScore
* totalPlayerScore
* totalScoreRank
* magicDamageDealtToChampions
* physicalDamageDealtToChampions 
* trueDamageDealtToChampions 
* visionWardsBoughtInGame
* sightWardsBoughtInGame 
* magicDamageDealt
* physicalDamageDealt 
* trueDamageDealt 
* magicDamageTaken
* physicalDamageTaken
* trueDamageTaken
* inhibitorKills 
* towerKills 
* wardsPlaced 
* wardsKilled
* largestMultiKill
* killingSprees
* totalUnitsHealed
* totalTimeCrowdControlDealt
```

As I could not store the information of the 100,000 games that worked 1 game per second, I stopped the process at **54.947 games**, resulting **549.470** times that a champion was played.

###Technologies used
The core of the application is write in **PHP OOP** language; to print information it's **html** and **css** as if a simple website concerned, and **jQuery** for dynamic interactions.
