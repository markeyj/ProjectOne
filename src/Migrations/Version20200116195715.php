<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200116195715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, street VARCHAR(255) NOT NULL, INDEX IDX_D4E6F818BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, zip_code VARCHAR(20) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2D5B0234F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, code_iso VARCHAR(6) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, customer_code VARCHAR(10) NOT NULL, name VARCHAR(255) NOT NULL, mail_address VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_81398E09F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, mail_address VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, birthday DATETIME DEFAULT NULL, INDEX IDX_5D9F75A1F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, model_code_id INT NOT NULL, supplier_code_id INT NOT NULL, item_code VARCHAR(30) NOT NULL, description VARCHAR(255) NOT NULL, buying_price DOUBLE PRECISION NOT NULL, selling_price DOUBLE PRECISION NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_1F1B251E474997E6 (model_code_id), INDEX IDX_1F1B251EA6BF8A08 (supplier_code_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_setting (id INT AUTO_INCREMENT NOT NULL, id_item_id INT NOT NULL, minimum_stock INT DEFAULT NULL, maximum_stock INT DEFAULT NULL, quantity_per_order INT DEFAULT NULL, quantity_to_order INT DEFAULT NULL, promotion_price DOUBLE PRECISION DEFAULT NULL, promotion_start_date DATETIME DEFAULT NULL, promotion_end_date DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_94299ECCCCF2FB2E (id_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_web (id INT AUTO_INCREMENT NOT NULL, id_item_id INT NOT NULL, description_web VARCHAR(255) DEFAULT NULL, web TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_F2DC4363CCF2FB2E (id_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, supplier_id INT NOT NULL, model_code VARCHAR(20) NOT NULL, name VARCHAR(255) NOT NULL, internal_name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_D79572D92ADD6D8C (supplier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, supplier_id INT NOT NULL, purchase_number INT NOT NULL, status VARCHAR(3) NOT NULL, total DOUBLE PRECISION NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_6117D13BB03A8386 (created_by_id), INDEX IDX_6117D13B2ADD6D8C (supplier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase_line (id INT AUTO_INCREMENT NOT NULL, purchase_number_id INT NOT NULL, quantity INT NOT NULL, unit_price DOUBLE PRECISION NOT NULL, line_number INT NOT NULL, INDEX IDX_A1A77C95B5ED2CDB (purchase_number_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, created_by_id INT NOT NULL, sale_number INT NOT NULL, status VARCHAR(3) NOT NULL, total DOUBLE PRECISION DEFAULT NULL, creation_date DATETIME NOT NULL, INDEX IDX_E54BC0059395C3F3 (customer_id), INDEX IDX_E54BC005B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale_line (id INT AUTO_INCREMENT NOT NULL, sale_number_id INT NOT NULL, line_number INT NOT NULL, quantity INT NOT NULL, unit_price DOUBLE PRECISION NOT NULL, INDEX IDX_6D5AC0136BCE00A (sale_number_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_detail (id INT AUTO_INCREMENT NOT NULL, id_item_id INT NOT NULL, id_location_id INT NOT NULL, purchase_number_id INT NOT NULL, sale_number_id INT DEFAULT NULL, sale_line_id INT DEFAULT NULL, purchase_line_id INT DEFAULT NULL, quantity INT NOT NULL, status VARCHAR(3) NOT NULL, historical_buying_price DOUBLE PRECISION NOT NULL, INDEX IDX_E420AD05CCF2FB2E (id_item_id), INDEX IDX_E420AD051E5FEC79 (id_location_id), INDEX IDX_E420AD05B5ED2CDB (purchase_number_id), INDEX IDX_E420AD056BCE00A (sale_number_id), INDEX IDX_E420AD053865B7D0 (sale_line_id), INDEX IDX_E420AD0556A1BF3B (purchase_line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_location (id INT AUTO_INCREMENT NOT NULL, location_code VARCHAR(6) NOT NULL, description VARCHAR(255) NOT NULL, showroom TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplier (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, order_adress_id INT DEFAULT NULL, supplier_code VARCHAR(10) NOT NULL, name VARCHAR(255) NOT NULL, mail_address VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_9B2A6C7EF5B7AF75 (address_id), INDEX IDX_9B2A6C7E38018254 (order_adress_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, employee_id INT NOT NULL, user_right_id INT NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D6498C03F15C (employee_id), INDEX IDX_8D93D649B41A8C35 (user_right_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_right (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(2) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F818BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E474997E6 FOREIGN KEY (model_code_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EA6BF8A08 FOREIGN KEY (supplier_code_id) REFERENCES supplier (id)');
        $this->addSql('ALTER TABLE item_setting ADD CONSTRAINT FK_94299ECCCCF2FB2E FOREIGN KEY (id_item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_web ADD CONSTRAINT FK_F2DC4363CCF2FB2E FOREIGN KEY (id_item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D92ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13BB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id)');
        $this->addSql('ALTER TABLE purchase_line ADD CONSTRAINT FK_A1A77C95B5ED2CDB FOREIGN KEY (purchase_number_id) REFERENCES purchase (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC0059395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC005B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sale_line ADD CONSTRAINT FK_6D5AC0136BCE00A FOREIGN KEY (sale_number_id) REFERENCES sale (id)');
        $this->addSql('ALTER TABLE stock_detail ADD CONSTRAINT FK_E420AD05CCF2FB2E FOREIGN KEY (id_item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE stock_detail ADD CONSTRAINT FK_E420AD051E5FEC79 FOREIGN KEY (id_location_id) REFERENCES stock_location (id)');
        $this->addSql('ALTER TABLE stock_detail ADD CONSTRAINT FK_E420AD05B5ED2CDB FOREIGN KEY (purchase_number_id) REFERENCES purchase (id)');
        $this->addSql('ALTER TABLE stock_detail ADD CONSTRAINT FK_E420AD056BCE00A FOREIGN KEY (sale_number_id) REFERENCES sale (id)');
        $this->addSql('ALTER TABLE stock_detail ADD CONSTRAINT FK_E420AD053865B7D0 FOREIGN KEY (sale_line_id) REFERENCES sale_line (id)');
        $this->addSql('ALTER TABLE stock_detail ADD CONSTRAINT FK_E420AD0556A1BF3B FOREIGN KEY (purchase_line_id) REFERENCES purchase_line (id)');
        $this->addSql('ALTER TABLE supplier ADD CONSTRAINT FK_9B2A6C7EF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE supplier ADD CONSTRAINT FK_9B2A6C7E38018254 FOREIGN KEY (order_adress_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B41A8C35 FOREIGN KEY (user_right_id) REFERENCES user_right (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09F5B7AF75');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1F5B7AF75');
        $this->addSql('ALTER TABLE supplier DROP FOREIGN KEY FK_9B2A6C7EF5B7AF75');
        $this->addSql('ALTER TABLE supplier DROP FOREIGN KEY FK_9B2A6C7E38018254');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F818BAC62AF');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F92F3E70');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC0059395C3F3');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498C03F15C');
        $this->addSql('ALTER TABLE item_setting DROP FOREIGN KEY FK_94299ECCCCF2FB2E');
        $this->addSql('ALTER TABLE item_web DROP FOREIGN KEY FK_F2DC4363CCF2FB2E');
        $this->addSql('ALTER TABLE stock_detail DROP FOREIGN KEY FK_E420AD05CCF2FB2E');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E474997E6');
        $this->addSql('ALTER TABLE purchase_line DROP FOREIGN KEY FK_A1A77C95B5ED2CDB');
        $this->addSql('ALTER TABLE stock_detail DROP FOREIGN KEY FK_E420AD05B5ED2CDB');
        $this->addSql('ALTER TABLE stock_detail DROP FOREIGN KEY FK_E420AD0556A1BF3B');
        $this->addSql('ALTER TABLE sale_line DROP FOREIGN KEY FK_6D5AC0136BCE00A');
        $this->addSql('ALTER TABLE stock_detail DROP FOREIGN KEY FK_E420AD056BCE00A');
        $this->addSql('ALTER TABLE stock_detail DROP FOREIGN KEY FK_E420AD053865B7D0');
        $this->addSql('ALTER TABLE stock_detail DROP FOREIGN KEY FK_E420AD051E5FEC79');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EA6BF8A08');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D92ADD6D8C');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B2ADD6D8C');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13BB03A8386');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC005B03A8386');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B41A8C35');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_setting');
        $this->addSql('DROP TABLE item_web');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE purchase');
        $this->addSql('DROP TABLE purchase_line');
        $this->addSql('DROP TABLE sale');
        $this->addSql('DROP TABLE sale_line');
        $this->addSql('DROP TABLE stock_detail');
        $this->addSql('DROP TABLE stock_location');
        $this->addSql('DROP TABLE supplier');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_right');
    }
}
