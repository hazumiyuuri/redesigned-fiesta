CREATE TABLE `redesigned-fiesta`.`voitures` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `created_at` DATETIME NOT NULL , 
    `marque` VARCHAR(255) NOT NULL , 
    `type_moteur` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`id`)) 
ENGINE = InnoDB;