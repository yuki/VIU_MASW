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
    title VARCHAR(50),
    url varchar(100),
    platform_id INTEGER NOT NULL REFERENCES platform(id)
);

CREATE TABLE episodes (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50),
    released DATE,
    tvshow_id INTEGER NOT NULL REFERENCES tvshow(id)
);


CREATE TABLE episodes_languages (
    episode_id  INTEGER NOT NULL REFERENCES episode(id),
    language_id INTEGER NOT NULL REFERENCES language(id),
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
    episode_id INTEGER NOT NULL REFERENCES episode(id),
    person_id  INTEGER NOT NULL REFERENCES person(id),
    perform_as ENUM('director','actor'),
    PRIMARY KEY (episode_id,person_id,perform_as)
);