CREATE TABLE `redesigned-fiesta`.`client_voitures` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `client_id` INT NOT NULL , 
    `voiture_id` INT NOT NULL , 
    `status` TINYINT NOT NULL DEFAULT '1' , PRIMARY KEY (`id`)
) ENGINE = InnoDB;