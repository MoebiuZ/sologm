CREATE TABLE users (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT "user",
    name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(70);
    enabled BOOL NOT NULL DEFAULT false,
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP DEFAULT NULL,
    last_login TIMESTAMP DEFAULT NULL,
    activation_nonce VARCHAR(65),
    pref_theme ENUM("light", "dark") NOT NULL DEFAULT "light",
    pref_language ENUM("en_US", "es_ES") NOT NULL DEFAULT "en_US",
    PRIMARY KEY (id)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;  


CREATE TABLE campaigns (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    current_chaos TINYINT NOT NULL DEFAULT 5,
    adventurelist_char_1_1 VARCHAR(255),
    adventurelist_char_1_3 VARCHAR(255),
    adventurelist_char_1_5 VARCHAR(255),
    adventurelist_char_1_7 VARCHAR(255),
    adventurelist_char_1_9 VARCHAR(255),
    adventurelist_char_3_1 VARCHAR(255),
    adventurelist_char_3_3 VARCHAR(255),
    adventurelist_char_3_5 VARCHAR(255),
    adventurelist_char_3_7 VARCHAR(255),
    adventurelist_char_3_9 VARCHAR(255),
    adventurelist_char_5_1 VARCHAR(255),
    adventurelist_char_5_3 VARCHAR(255),
    adventurelist_char_5_5 VARCHAR(255),
    adventurelist_char_5_7 VARCHAR(255),
    adventurelist_char_5_9 VARCHAR(255),
    adventurelist_char_7_1 VARCHAR(255),
    adventurelist_char_7_3 VARCHAR(255),
    adventurelist_char_7_5 VARCHAR(255),
    adventurelist_char_7_7 VARCHAR(255),
    adventurelist_char_7_9 VARCHAR(255),
    adventurelist_char_9_1 VARCHAR(255),
    adventurelist_char_9_3 VARCHAR(255),
    adventurelist_char_9_5 VARCHAR(255),
    adventurelist_char_9_7 VARCHAR(255),
    adventurelist_char_9_9 VARCHAR(255),
    adventurelist_thread_1_1 VARCHAR(255),
    adventurelist_thread_1_3 VARCHAR(255),
    adventurelist_thread_1_5 VARCHAR(255),
    adventurelist_thread_1_7 VARCHAR(255),
    adventurelist_thread_1_9 VARCHAR(255),
    adventurelist_thread_3_1 VARCHAR(255),
    adventurelist_thread_3_3 VARCHAR(255),
    adventurelist_thread_3_5 VARCHAR(255),
    adventurelist_thread_3_7 VARCHAR(255),
    adventurelist_thread_3_9 VARCHAR(255),
    adventurelist_thread_5_1 VARCHAR(255),
    adventurelist_thread_5_3 VARCHAR(255),
    adventurelist_thread_5_5 VARCHAR(255),
    adventurelist_thread_5_7 VARCHAR(255),
    adventurelist_thread_5_9 VARCHAR(255),
    adventurelist_thread_7_1 VARCHAR(255),
    adventurelist_thread_7_3 VARCHAR(255),
    adventurelist_thread_7_5 VARCHAR(255),
    adventurelist_thread_7_7 VARCHAR(255),
    adventurelist_thread_7_9 VARCHAR(255),
    adventurelist_thread_9_1 VARCHAR(255),
    adventurelist_thread_9_3 VARCHAR(255),
    adventurelist_thread_9_5 VARCHAR(255),
    adventurelist_thread_9_7 VARCHAR(255),
    adventurelist_thread_9_9 VARCHAR(255),
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP DEFAULT NULL,
    user_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;


CREATE TABLE listitems (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    content TEXT NOT NULL,
    list_type ENUM('threads', 'characters') NOT NULL DEFAULT "threads",
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP NOT NULL,
    campaign_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;


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
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;


CREATE TABLE blocks (
    id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
    content TEXT NOT NULL,
    blocktype ENUM('text', 'fate', 'eventfocus', 'other') NOT NULL DEFAULT "text",
    pos FLOAT NOT NULL,
    hidden BOOL NOT NULL DEFAULT false,
    created TIMESTAMP NOT NULL,
    modified TIMESTAMP NOT NULL,
    scene_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (scene_id) REFERENCES scenes(id) ON DELETE CASCADE
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;