CREATE TABLE users (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT "user",
    name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(70),
    enabled BOOL NOT NULL DEFAULT false,
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP DEFAULT NULL,
    last_login TIMESTAMP DEFAULT NULL,
    activation_nonce VARCHAR(65),
    pref_theme ENUM("light", "dark") NOT NULL DEFAULT "light",
    pref_language ENUM("en_US", "es_ES") NOT NULL DEFAULT "en_US",
    PRIMARY KEY (id)
) DEFAULT CHARSET=utf8mb4 ENGINE=InnoDB;  


CREATE TABLE campaigns (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    current_chaos TINYINT NOT NULL DEFAULT 5,
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP DEFAULT NULL,
    user_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8mb4 ENGINE=InnoDB;


CREATE TABLE listitems (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    content TEXT NOT NULL,
    list_type ENUM('threads', 'characters') NOT NULL DEFAULT "threads",
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP NOT NULL,
    campaign_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8mb4 ENGINE=InnoDB;


CREATE TABLE scenes (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    pos FLOAT NOT NULL,
    chaos TINYINT NOT NULL,
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP DEFAULT NULL,
    campaign_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8mb4 ENGINE=InnoDB;


CREATE TABLE blocks (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    content TEXT NOT NULL,
    blocktype ENUM('text', 'fate', 'randomevent', 'eventmeaning', 'other') NOT NULL DEFAULT "text",
    pos FLOAT NOT NULL,
    hidden BOOL NOT NULL DEFAULT false,
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP NOT NULL,
    scene_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (scene_id) REFERENCES scenes(id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8mb4 ENGINE=InnoDB;