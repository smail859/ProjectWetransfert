DROP TABLE IF EXISTS `statistics`;
DROP TABLE IF EXISTS `file`;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);



CREATE TABLE `file`(
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100),
    `extension` VARCHAR(7),
    `userId` INT,
    CONSTRAINT FK_FILE_USER
    FOREIGN KEY (`userId`) REFERENCES `user`(id)
);





CREATE TABLE `statistics` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `nbDownload` INT,
    `weekNumber` INT,
    `yearNumber` INT,
    `fileId` INT,
    CONSTRAINT FK_STATISTICS_FILE
    FOREIGN KEY (`fileId`) REFERENCES `file`(id)
);


