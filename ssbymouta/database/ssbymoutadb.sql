CREATE SCHEMA IF NOT EXISTS ssbymoutadb;
SET search_path TO ssbymoutadb;

DROP TABLE IF EXISTS story CASCADE;
DROP TABLE IF EXISTS author CASCADE;
DROP TABLE IF EXISTS users CASCADE;

CREATE TABLE users(
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL /*this password will be encrypted before enter the database*/
);

CREATE TABLE author(
    author_id INT REFERENCES users(id) ON DELETE CASCADE PRIMARY KEY,
    author_name VARCHAR(100),
    author_username VARCHAR(100) REFERENCES users(username) ON DELETE CASCADE,
    email VARCHAR(255) REFERENCES users(email) ON DELETE CASCADE,
    story_count INT DEFAULT 0
);

CREATE TABLE story (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    author_id INT REFERENCES author(author_id) ON DELETE CASCADE,
    title VARCHAR(100) UNIQUE NOT NULL,
    subtitle VARCHAR(100),
    content TEXT NOT NULL,
    rating FLOAT DEFAULT 0.0 CHECK (rating >= 0.0 AND rating <= 10.0),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, name, email, password) VALUES
('franciscomouta', 'Francisco Mouta', 'francisco28mouta@gmail.com', '$2a$15$.zklhn5xGJ3/LbQghfoU0uubZdcwPDSys4FC4EFVmGDjTHhDGpquO');

INSERT INTO author(author_id, author_name, author_username, email) VALUES
(1, 'mouta', 'franciscomouta', 'francisco28mouta@gmail.com');

INSERT INTO story(author_id, title, subtitle, content) VALUES
(1, 'The Pit', 'Sci-Fy', 'Dustin Fall is in a room, it seems a simple and humble room, with a bed, a window to the outside and a wood desk. He is writing a letter for Lucia, while the walls were sweating and vibrating with the outside explosions. Dustin knows he has no time to lose, his thoughts are faster than his handwriting, he’s tense and writing non stop, the environment is putting pressure on him, he’s sensing something troubling and avoids lift his head, he knows there are too much things to say and tell Lucia, but doesn’t know how to do it anymore. So much time and blood had been shedding, he knows there’s no turning back.

	“Dear Lucia,

	This is my goodbye letter to you, I hope you’re happy with the man that took you from me. It’s the Day today, and I don’t have much more time, they are hunting me, they are coming, the Pit is vibrating and everything is falling apart outside, they are coming from the future. 
	I want you to know that everything we had been through were not a regret, but the happiest moments of my life, I want to ask you something important. I want you to name your upcoming child after our Melissa, our daughter, please.
	One more thing, I lo-”

Dustin is smashed by the walls of the room, his eyeballs left the head, his skull exploded and the body completely smashed. Only a photograph rested in peace on the floor, a picture of Dustin, Lucia, this was a perfect woman with a doll face, too good to be true, and Melissa, however, their daughter was a hand drawing. The year was 2050, the AI war has started and Dustin was one of the Humanity fighters, or this was what he thought, when the sky clears we see a billboard nominated “The Pit”, an AI concentration camp to torture people.'),

(1, 'Wasted Life', 'Drama', 'He’s walking through the forest, while he tastes with his own hands each tree’s texture, the temperature and the nature itself. He seeks nothing, but peace, a new life, that’s why he’s walking with no destination, each mistake and illusion are forgotten by the wind’s god. He knew he never wanted to grab the knife, nor to be the king, he just wanted to help and save them, but, while the time was passing through him, he noticed, his wish was already dead before it could even exist.
	
	When he gets out of the forest it starts raining and the dirt below his feet started to become mud, he feels his feet slowly drowning into the ground, his hair and face started to become wet and he just remembered something, he remembered the time his life ended before it could even begin, when she died in the middle of his mistakes, in the middle of his war with the “enemy”: that was the moment his wish died, and, with it, his soul.
	
	He started glazing the landscape in front of him and founds it familiar, that reminded him of her. He wanted to talk to her, but now it’s late, because their lives were destroyed by him.
	
	- What have I done? - he starts mumbling - What have I fought for? Isabelle, forgive me, forgive m… - he kneels against the landscape and starts crying, for the first time in his life.
	
	He was sobbing, with a dead look, while the landscape was even beautiful with that rain. The boy got up and turn around to start walking back. When he sees on the tree trunk two names: “Lucas + Isabelle”. That tree was the beginning of everything, the love, the sadness, the happiness, the angry and the hate. That site was the moment he had met the love of his life. But this life was wasted, by the ideology that he couldn’t even remember one of the best places of his entire life.');