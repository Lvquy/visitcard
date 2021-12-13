DROP TABLE coins ;
DROP TABLE active_codes;
DROP TABLE skill;
DROP TABLE social;
DROP TABLE users ;


CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    fullname varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    mobile varchar(15),
    email varchar(100),
    address varchar(100),
    reg_date datetime,
    avata varchar(255),
    intro varchar(255),
    slug varchar(25) NOT NULL,
    top_bg_color varchar(15),
    top_bg_img varchar(255),
    top_text_color varchar(15),
    active boolean DEFAULT 0,
    status_email varchar(10) DEFAULT 'none',
    active_code varchar(20),
    bank_name varchar(30),
    bank_num varchar(20),
    bank_sub varchar(30),
    bank_user varchar(40),
    visit int DEFAULT 0,
    admin boolean DEFAULT 0 NOT NULL,
    PRIMARY KEY (id)

)AUTO_INCREMENT=100;
CREATE TABLE social (
    id int NOT NULL AUTO_INCREMENT,
    social_name varchar(25),
    social_link varchar(50),
    of_user int,
    is_active boolean DEFAULT FALSE,
    icon_url varchar(60),
    clicked int DEFAULT 0,
    PRIMARY KEY (id),
    CONSTRAINT FK_SocialUsers FOREIGN KEY (of_user)
    REFERENCES users(id)
)AUTO_INCREMENT=200;

CREATE TABLE skill (
    id int NOT NULL AUTO_INCREMENT,
    skill_name varchar(30),
    skill_value int,
    of_user int,
    bg_color_skill varchar(10),
    is_active boolean DEFAULT TRUE,
    PRIMARY KEY (id),
    CONSTRAINT FK_SkillUsers FOREIGN KEY (of_user)
    REFERENCES users(id)
)AUTO_INCREMENT =300;


CREATE TABLE coins (
    id int NOT NULL AUTO_INCREMENT,
    logo_url varchar(255),
    coin_name varchar(50),
    wallet varchar(255),
    is_active boolean DEFAULT TRUE,
    of_user int,
    PRIMARY KEY (id),
    CONSTRAINT FK_CoinsUsers FOREIGN KEY (of_user)
    REFERENCES users(id)
)AUTO_INCREMENT = 200;

CREATE TABLE active_codes (
    id int NOT NULL AUTO_INCREMENT,
    code varchar(50),
    status varchar(8),
    for_user int,
    active_date datetime,
    PRIMARY KEY (id),
    CONSTRAINT FK_CodeUsers FOREIGN KEY (for_user)
    REFERENCES users(id)
)AUTO_INCREMENT = 500;

CREATE TABLE sale_order (
    so int NOT NULL AUTO_INCREMENT,
    cus_name varchar(30),
    cus_add varchar(255),
    cus_mobile int,
    card_type varchar(20),
    price int,
    qty int DEFAULT 0,
    note varchar(100),
    order_date date,
    saler varchar(30),
    state int DEFAULT 0,
    text_color varchar(10),
    PRIMARY KEY (so)
)AUTO_INCREMENT = 1;