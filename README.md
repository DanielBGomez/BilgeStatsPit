##BilgeStatsPit - Riot Games API Challenge 2.0 Entry
######by Daniel BGomez (LAN: DanielGomez) & Natalia (LAN: Natyy9923)

This app let you know the stats of every champion played while the Black Market Brawlers Games; Champions, items and summoner spells popularity; Multi Kills, etc.
 
*Note: Sorry for my bad english (if so)* 
 
###Live Url
You can see this project live now in
http://www.danielbgomez.com/bilgestatspit/

Project details in plain language at the "About" section.

###How I got the Data?
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

Once all the information was saved, we began to apply the processed information.
First we start with the "**Popular Champions**" ( **Most Picked** ) section on the home page, by requesting the information:
```
championId,count(*),sum(kills),sum(deaths),sum(assists),count(winner),sum(minionsKilled),sum(goldEarned)
```
Grouped by '**championId**' and ordered by the number of times that data were found ( '**Count (*)**' ) within each group, limited by 10.

To avoid the repeatedly request of the same information at making the design of the page, we stored the results in JSON plaintexts that were left within the code that decoded to become arrays.

Upon completion of that section, we continue with the "**Best Champions**" section by requesting the same information but ordered by the '**winrate**' ( **'sum (wins) * 100 / $ allgames'** ) also limited by 10. Then with the **Summary Table** that contain the same information requested above but this time for each existing champion, adding the most picked **Summoner Spells** and **items**.

And with all the information stored that way, the other sections took much less time to request information.

### Summoner Spells and Items query
To get the most popular items and Summoner Spells, create four more tables in the database:
```
Items - Using the information of each item:
id, name, description, plaintext.

ItemCount - With a record of the times that items (by ID) were used for each champion.
itemId, championId, count

SummonerSpells - With the information in Summoner Spell:
id, name, reference

SpellCount - With a record of the times that SummonerSpells (By ID) were used for each champion.
spellid, championId, count
```
As in the general data, the items and Summoner Spells were stored in **6** and **2** sections respectively, we had to save for each section the ammount in the database and add it the values for each other section where the ids match.


###Technologies used
The core of the application is write in **PHP OOP** language; to print information it's **html** and **css** as if a simple website concerned, and **jQuery** for dynamic interactions.
