# Host: localhost  (Version 5.7.29)
# Date: 2020-02-06 19:57:38
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "articles"
#

CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publication` text,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `author` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "articles"
#


#
# Structure for table "comments"
#

CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `body` text,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "comments"
#

INSERT INTO `comments` VALUES (1,NULL,'2020-02-06','2020-02-06',NULL),(2,NULL,'2020-02-06','2020-02-06',NULL),(3,'fsfs','2020-02-06','2020-02-06',2),(4,'ada','2020-02-06','2020-02-06',NULL),(5,'ada z','2020-02-06','2020-02-06',NULL);

#
# Structure for table "posts"
#

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "posts"
#

INSERT INTO `posts` VALUES (2,'A title once again','And the post body follows.','2020-02-05 17:52:51',NULL,NULL),(3,'Title strikes back','This is really exciting! Not.','2020-02-05 17:52:51',NULL,NULL),(4,'teste 1','teste 1','2020-02-05 18:50:26','2020-02-05 18:50:26',NULL),(5,'teste 1','teste 1','2020-02-05 18:51:05','2020-02-05 18:51:05',NULL),(6,'teste 1','teste 1','2020-02-05 18:51:10','2020-02-05 18:51:10',NULL),(7,'teste 1','teste 1','2020-02-05 18:51:33','2020-02-05 18:51:33',NULL);

#
# Structure for table "users"
#

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'teste eduardo','845dd47c64d5d62aec00180190f7b100bf4baf2d','admin','2020-02-05 19:30:51','2020-02-05 19:30:51'),(2,'teste eduardo','845dd47c64d5d62aec00180190f7b100bf4baf2d','admin','2020-02-05 19:31:16','2020-02-05 19:31:16'),(3,'teste eduardo','845dd47c64d5d62aec00180190f7b100bf4baf2d','admin','2020-02-05 19:31:37','2020-02-05 19:31:37'),(4,'teste123','1b33e5a39128e410a7d5989010c544cce9ae3d35','admin','2020-02-05 19:32:58','2020-02-05 19:32:58'),(5,'adad','$2a$10$y4th0eiFFn7OnfrerTWXFe6rUXv7mN1PlfVZewvrP.r1/otIeO2fC','admin','2020-02-05 21:03:41','2020-02-05 21:03:41'),(6,'teste5','$2a$10$.hLlgR4/N4dGryeU8kE0.O6JVeUtjVoWUOiLWD3JlqqR22aLMJj0u','admin','2020-02-05 21:03:56','2020-02-05 21:03:56'),(7,'asd','$2a$10$VwtA4.vmPK8g2iGRSflFL.oeSKbxnIYt0T.9rD6XoKNyIcq.nOuAa','admin','2020-02-05 21:17:04','2020-02-05 21:17:04'),(8,'a','$2a$10$Uuln4IH0sHXlQz0t5GTWMO6c6F.YuoRPfgUeywH0TnEd.akancQme','admin','2020-02-05 21:18:22','2020-02-05 21:18:22'),(9,'a','$2a$10$tuz1B.TCZrJBRmW3apVrBeTBGSFs.4TGB2AhqUXfNnb.sYA4Z4nGS','admin','2020-02-05 21:28:18','2020-02-05 21:28:18'),(10,'b','$2a$10$KfFn011KQhdl3/KFLR9mCO9.NCzzJtdhnAiED/trk/NkyUhMXdQgK','admin','2020-02-05 21:28:53','2020-02-05 21:28:53');
