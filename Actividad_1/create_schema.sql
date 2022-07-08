CREATE TABLE platforms (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE
);

CREATE TABLE languages (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50),
    iso_code VARCHAR(2)
);

CREATE TABLE tvshows (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    url varchar(100),
    platform_id INTEGER NOT NULL,
    FOREIGN KEY (platform_id) REFERENCES platforms(id) ON DELETE CASCADE
);

CREATE TABLE episodes (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    released DATE,
    tvshow_id INTEGER NOT NULL,
    FOREIGN KEY (tvshow_id) REFERENCES tvshows(id) ON DELETE CASCADE
);


CREATE TABLE episodes_languages (
    episode_id  INTEGER NOT NULL,
    FOREIGN KEY (episode_id) REFERENCES episodes(id) ON DELETE CASCADE,
    language_id INTEGER DEFAULT 0,
    FOREIGN KEY (language_id) REFERENCES languages(id) ON DELETE SET DEFAULT,
    type ENUM('audio','subtitle'),
    PRIMARY KEY (episode_id,language_id,type)
);

CREATE TABLE persons (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    surname VARCHAR(50),
    born DATE,
    nation VARCHAR(50)
);


CREATE TABLE episodes_persons(
    episode_id INTEGER NOT NULL, 
    FOREIGN KEY (episode_id) REFERENCES episodes(id) ON DELETE CASCADE,
    person_id  INTEGER NOT NULL,
    FOREIGN KEY (person_id) REFERENCES persons(id) ON DELETE CASCADE,
    perform_as ENUM('director','actor'),
    PRIMARY KEY (episode_id,person_id,perform_as)
);
