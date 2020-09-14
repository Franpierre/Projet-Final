#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: 3xf90_cities
#------------------------------------------------------------

CREATE TABLE `3xf90_cities`(
        `id`         Int  Auto_increment  NOT NULL ,
        `name`       Varchar (100) NOT NULL ,
        `postalCode` Text NOT NULL
	,CONSTRAINT cities_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 3xf90_sportLevels
#------------------------------------------------------------

CREATE TABLE `3xf90_sportLevels`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (15) NOT NULL
	,CONSTRAINT sportLevels_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 3xf90_genders
#------------------------------------------------------------

CREATE TABLE `3xf90_genders`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (10) NOT NULL
	,CONSTRAINT genders_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 3xf90_users
#------------------------------------------------------------

CREATE TABLE `3xf90_users`(
        `id`               Int  Auto_increment  NOT NULL ,
        `lastName`         Varchar (50) NOT NULL ,
        `firstName`        Varchar (50) NOT NULL ,
        `mail`             Varchar (100) NOT NULL ,
        `phone`            Int ,
        `password`         Varchar (100) NOT NULL ,
        `birthdate`        Date NOT NULL ,
        `description`      Text NOT NULL ,
        `avatar`           Varchar (255) NOT NULL ,
        `id_genders` Int NOT NULL ,
        `id_cities`  Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (`id`)

	,CONSTRAINT users_genders_FK FOREIGN KEY (`id_genders`) REFERENCES `3xf90_genders`(`id`)
	,CONSTRAINT users_cities0_FK FOREIGN KEY (`id_cities`) REFERENCES `3xf90_cities`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 3xf90_sports
#------------------------------------------------------------

CREATE TABLE `3xf90_sports`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (100) NOT NULL
	,CONSTRAINT sports_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 3xf90_posts
#------------------------------------------------------------

CREATE TABLE `3xf90_posts`(
        `id`                  Int  Auto_increment  NOT NULL ,
        `title`               Varchar (40) NOT NULL ,
        `text`                Text NOT NULL ,
        `publicationDateTime` Datetime NOT NULL ,
        `displayMail`         Bool NOT NULL ,
        `displayPhone`        Bool NOT NULL ,
        `id_users`      Int NOT NULL ,
        `id_sports`     Int NOT NULL
	,CONSTRAINT posts_PK PRIMARY KEY (`id`)

	,CONSTRAINT posts_users_FK FOREIGN KEY (`id_users`) REFERENCES `3xf90_users`(`id`)
	,CONSTRAINT posts_sports_FK FOREIGN KEY (`id_sports`) REFERENCES `3xf90_sports`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 3xf90_postsCities
#------------------------------------------------------------

CREATE TABLE `3xf90_postsCities`(
        `id`              Int  Auto_increment  NOT NULL ,
        `id_cities` Int NOT NULL ,
        `id_posts`  Int NOT NULL
	,CONSTRAINT postsCities_PK PRIMARY KEY (`id`)

	,CONSTRAINT postsCities_cities_FK FOREIGN KEY (`id_cities`) REFERENCES `3xf90_cities`(`id`)
	,CONSTRAINT postsCities_posts_FK FOREIGN KEY (`id_posts`) REFERENCES `3xf90_posts`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: 3xf90_postsLevels
#------------------------------------------------------------

CREATE TABLE `3xf90_postsLevels`(
        `id`                   Int  Auto_increment  NOT NULL ,
        `id_posts`       Int NOT NULL ,
        `id_sportLevels` Int NOT NULL
	,CONSTRAINT postsLevels_PK PRIMARY KEY (id)

	,CONSTRAINT postsLevels_posts_FK FOREIGN KEY (`id_posts`) REFERENCES `3xf90_posts`(`id`)
	,CONSTRAINT postsLevels_sportLevels_FK FOREIGN KEY (`id_sportLevels`) REFERENCES `3xf90_sportLevels`(`id`)
)ENGINE=InnoDB;


