drop database if exists GamesDatabase;

create database if not exists GamesDatabase;

use GamesDatabase;


drop table if exists UsersTable;

create table if not exists UsersTable(
	userId int NOT NULL AUTO_INCREMENT,
	Username varchar(100) NOT NULL,
	Password varchar(100) NOT NULL,
    isAdmin boolean NOT NULL,
	PRIMARY KEY (userId)
);
INSERT INTO UsersTable (Username, Password, isAdmin)
VALUES ("admin", "admin", true);
INSERT INTO UsersTable (Username, Password, isAdmin)
VALUES ("test", "test", false);
INSERT INTO UsersTable (Username, Password, isAdmin)
VALUES ("test2", "test2", false);

select * from UsersTable;


drop table if exists GamesTable;

create table if not exists GamesTable(
	gameId int NOT NULL AUTO_INCREMENT,
	Name varchar(100) NOT NULL,
	Creator varchar(100) NOT NULL,
    Genre varchar(100) NOT NULL,
    Description varchar(500) NOT NULL,
	PRIMARY KEY (gameId)
);

 INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Final Fantasy 14", "Square Enix", "MMORPG", 
"In this massively multiplayer online RPG, you'll share your experience with countless other players who populate the world, either passing them a wave as you scoot by on your own errands, or teaming up to conquer dungeons or fell powerful enemies together.");

 INSERT INTO GamesTable (Name, Creator, Genre, Description)
 VALUES ("The Witcher 3: Wild Hunt", "CD Projekt Red", "Action RPG", 
"In this open-world RPG, you take on the role of Geralt of Rivia, a monster hunter known as a Witcher. Traverse a beautifully crafted world, take on contracts, and make choices that shape the story and the world around you.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Minecraft", "Mojang", "Sandbox", 
"Minecraft is a sandbox game where players can build and explore their own virtual worlds. Gather resources, craft tools, and create structures to survive and thrive in both creative and survival modes.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Overwatch", "Blizzard Entertainment", "First-Person Shooter", 
"Overwatch is a team-based shooter where players select from a roster of unique heroes, each with their own abilities and roles. Teamwork and strategy are key as you work together to complete objectives and secure victories.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Stardew Valley", "ConcernedApe", "Simulation RPG", 
"In Stardew Valley, players inherit a run-down farm and must restore it to its former glory. Engage in activities like farming, fishing, and mining, build relationships with the townsfolk, and participate in seasonal events.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Hades", "Supergiant Games", "Roguelike", 
"Hades is a roguelike dungeon crawler where you play as Zagreus, the son of Hades, attempting to escape the Underworld. Battle through procedurally generated levels, encounter unique characters, and uncover the story with each attempt.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Animal Crossing: New Horizons", "Nintendo", "Life Simulation", 
"Animal Crossing: New Horizons lets players create their own island paradise. Customize your home, engage with charming animal villagers, participate in seasonal events, and enjoy a relaxing and creative gameplay experience.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Celeste", "Matt Makes Games", "Platformer", 
"Celeste is a challenging platformer where you guide Madeline as she climbs Celeste Mountain. With tight controls, beautiful pixel art, and a touching story about overcoming mental challenges, it's a rewarding and emotional journey.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Dark Souls III", "FromSoftware", "Action RPG", 
"Dark Souls III is a dark and challenging action RPG known for its punishing difficulty and deep lore. Explore intricate environments, battle formidable foes, and uncover the secrets of a dying world.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("Among Us", "InnerSloth", "Social Deduction", 
"Among Us is a multiplayer game of teamwork and betrayal. Crewmates work together to complete tasks on a spaceship while impostors attempt to sabotage and eliminate them. Use deduction and deception to achieve your goals.");

INSERT INTO GamesTable (Name, Creator, Genre, Description)
VALUES ("The Legend of Zelda: Breath of the Wild", "Nintendo", "Action-Adventure", 
"In Breath of the Wild, players explore a vast and open world as Link, the hero of Hyrule. Solve puzzles, defeat enemies, and discover secrets as you work to save Princess Zelda and the kingdom from the threat of Calamity Ganon.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Red Dead Redemption 2", "Rockstar Games", "Action-Adventure", 
"Red Dead Redemption 2 is an epic tale of life in America’s unforgiving heartland. The game's vast and atmospheric world also provides the foundation for a brand new online multiplayer experience.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Hollow Knight", "Team Cherry", "Metroidvania", 
"Hollow Knight is a challenging, beautiful action-adventure game set in a vast, interconnected world. Explore caverns, ancient cities, and deadly wastes as you uncover the mysteries of a fallen kingdom.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Fortnite", "Epic Games", "Battle Royale", 
"Fortnite is a battle royale game where 100 players fight to be the last person standing. Build structures, scavenge for weapons, and outlast your opponents in this fast-paced, action-packed game.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Doom Eternal", "id Software", "First-Person Shooter", 
"Doom Eternal is a fast-paced first-person shooter where you take on the role of the Doom Slayer. Battle demonic forces across dimensions with a vast array of powerful weapons and abilities.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Sekiro: Shadows Die Twice", "FromSoftware", "Action-Adventure", 
"In Sekiro: Shadows Die Twice, you play as a shinobi on a quest for revenge. Utilize stealth, skill, and a variety of deadly weapons to defeat your enemies in this challenging action-adventure game.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Cyberpunk 2077", "CD Projekt Red", "Action RPG", 
"Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour, and body modification. Play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Genshin Impact", "miHoYo", "Action RPG", 
"Genshin Impact is an open-world action RPG that allows players to explore the fantastical world of Teyvat. Solve puzzles, engage in elemental combat, and discover the secrets of the land with a party of diverse characters.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Persona 5", "Atlus", "JRPG", 
"Persona 5 is a JRPG that follows the story of a group of high school students who become the Phantom Thieves. Balance everyday life with exploring dungeons and battling enemies to change the hearts of corrupt adults.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Monster Hunter: World", "Capcom", "Action RPG", 
"Monster Hunter: World is an action RPG where players take on the role of a hunter tasked with slaying or trapping large monsters. Use a variety of weapons and strategies to take down powerful creatures and explore a vibrant ecosystem.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Bloodborne", "FromSoftware", "Action RPG", 
"Bloodborne is an action RPG set in the gothic, horror-filled city of Yharnam. Players assume the role of a Hunter, battling nightmarish creatures and uncovering the dark secrets of the city.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Ghost of Tsushima", "Sucker Punch Productions", "Action-Adventure", 
"Ghost of Tsushima is an open-world action-adventure game set in feudal Japan. Play as Jin Sakai, a samurai warrior, who must master new fighting techniques to free Tsushima Island from Mongol invaders.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Assassin's Creed Valhalla", "Ubisoft", "Action RPG", 
"In Assassin's Creed Valhalla, you play as Eivor, a Viking raider, leading your clan from icy desolation in Norway to a new home amid the lush farmlands of ninth-century England. Establish your settlement and conquer this hostile land by any means to earn a place in Valhalla.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Control", "Remedy Entertainment", "Action-Adventure", 
"Control is an action-adventure game that combines supernatural abilities and reactive environments. Play as Jesse Faden as she explores the mysterious Federal Bureau of Control, uncovering its strange experiments and battling enigmatic forces.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Horizon Zero Dawn", "Guerrilla Games", "Action RPG", 
"Horizon Zero Dawn is an action RPG set in a post-apocalyptic world dominated by robotic creatures. Players control Aloy, a young hunter, as she ventures through the stunning world, discovering secrets of her past and the fate of the old world.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Apex Legends", "Respawn Entertainment", "Battle Royale", 
"Apex Legends is a free-to-play battle royale game featuring unique Legends with powerful abilities. Form strategic squads, outsmart your opponents, and fight for victory in this fast-paced, tactical shooter.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Resident Evil Village", "Capcom", "Survival Horror", 
"Resident Evil Village continues the story of Ethan Winters as he searches for his kidnapped daughter in a mysterious village. Encounter terrifying creatures and uncover dark secrets in this gripping survival horror game.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("The Elder Scrolls V: Skyrim", "Bethesda Game Studios", "Action RPG", 
"Skyrim is an open-world action RPG where players take on the role of the Dragonborn, a hero prophesied to save the world from destruction. Explore the vast land of Skyrim, complete quests, and master powerful spells and weapons.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Final Fantasy VII Remake", "Square Enix", "JRPG", 
"Final Fantasy VII Remake is a reimagining of the classic JRPG. Follow Cloud Strife and his allies as they fight against the oppressive Shinra Corporation and uncover deep conspiracies in the dystopian city of Midgar.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Valorant", "Riot Games", "First-Person Shooter", 
"Valorant is a team-based tactical shooter where precision shooting meets unique agent abilities. Strategize, communicate, and outplay your opponents in this competitive and highly strategic game.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("League of Legends", "Riot Games", "MOBA", 
"League of Legends is a fast-paced, competitive online game blending the speed and intensity of an RTS with RPG elements. Two teams of powerful champions, each with unique designs and playstyles, battle head-to-head across multiple battlefields and game modes.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("The Last of Us Part II", "Naughty Dog", "Action-Adventure", 
"The Last of Us Part II is an intense, harrowing experience that follows Ellie as she embarks on a relentless journey of retribution. Explore a beautifully crafted post-apocalyptic world, face emotional conflicts, and engage in visceral combat.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Nier: Automata", "PlatinumGames", "Action RPG", 
"Nier: Automata is an action RPG set in a dystopian future where androids fight to reclaim Earth from powerful machine lifeforms. Experience an intricate story, fast-paced combat, and multiple endings.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Destiny 2", "Bungie", "First-Person Shooter", 
"Destiny 2 is a first-person shooter that offers a rich, evolving world of cooperative, competitive, and solo adventures. Customize your Guardian, embark on challenging missions, and join forces with friends in this ever-expanding universe.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("The Sims 4", "Maxis", "Life Simulation", 
"The Sims 4 is a life simulation game that allows players to create and control people, build homes, and develop unique stories. Customize your Sims' appearances, personalities, and aspirations to guide them through their lives.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Divinity: Original Sin 2", "Larian Studios", "RPG", 
"Divinity: Original Sin 2 is a critically acclaimed RPG that offers deep tactical combat and a rich, immersive story. Gather your party, master elemental forces, and explore the open world of Rivellon in this epic adventure.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Splatoon 2", "Nintendo", "Third-Person Shooter", 
"Splatoon 2 is a colorful and competitive third-person shooter where players control Inklings who can transform between human and squid forms. Participate in turf wars, rank battles, and cooperative modes in this vibrant, ink-splattering game.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Fall Guys: Ultimate Knockout", "Mediatonic", "Party Game", 
"Fall Guys: Ultimate Knockout is a massively multiplayer party game where players compete in hilarious obstacle courses and mini-games. Only the most skilled and lucky beans will reach the end and claim the crown.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Cuphead", "Studio MDHR", "Platformer", 
"Cuphead is a run-and-gun platformer known for its challenging gameplay and hand-drawn, 1930s cartoon-inspired visuals. Battle unique bosses, dodge intricate patterns, and uncover hidden secrets in this beautifully animated world.");

INSERT INTO GamesTable (Name, Creator, Genre, Description) 
VALUES ("Super Mario Odyssey", "Nintendo", "Platformer", 
"Super Mario Odyssey is a 3D platformer where Mario travels across various worlds on his quest to save Princess Peach from Bowser's wedding plans. Use Mario's new friend, Cappy, to capture and control objects and enemies for creative puzzle-solving and exploration.");


select * from GamesTable;

SELECT JSON_OBJECT(
	'gameId', g.gameId,
    'Name', g.Name,
    'Creator', g.Creator,
    'Genre', g.Genre,
    'Description', g.Description
) 
FROM GamesTable AS g;


drop table if exists ImagesTable;

create table if not exists ImagesTable(
	imageId int NOT NULL AUTO_INCREMENT,
	gameImage blob NOT NULL,
	gameName varchar(100) NOT NULL,,
    gameId int NOT NULL REFERENCES GamesTable(gameID),
	PRIMARY KEY (imageId)
);