CREATE TABLE `redesigned-fiesta`.`clients` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `created_at` DATETIME NOT NULL , 
    `nom` VARCHAR(255) NOT NULL , 
    `prenom` VARCHAR(255) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    PRIMARY KEY (`id`), 
    UNIQUE (`email`)
) ENGINE = InnoDB;