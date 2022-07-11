CREATE TABLE platforms (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE
);

CREATE TABLE languages (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50),
    rfc_code VARCHAR(8)
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

CREATE TABLE celebrities (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    surname VARCHAR(50),
    born DATE,
    nation VARCHAR(50),
    url VARCHAR(100)
);


CREATE TABLE episodes_celebrities(
    episode_id INTEGER NOT NULL, 
    FOREIGN KEY (episode_id) REFERENCES episodes(id) ON DELETE CASCADE,
    celebrity_id  INTEGER NOT NULL,
    FOREIGN KEY (celebrity_id) REFERENCES celebrities(id) ON DELETE CASCADE,
    perform_as ENUM('director','actor'),
    PRIMARY KEY (episode_id,celebrity_id,perform_as)
);
