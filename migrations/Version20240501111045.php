<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240501111045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE items (id INTEGER NOT NULL, category_name VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, short_description VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, link VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, brand VARCHAR(255) NOT NULL, rating INTEGER DEFAULT NULL, caffeine_type VARCHAR(255) DEFAULT NULL, count INTEGER NOT NULL, flavored BOOLEAN NOT NULL, seasonal BOOLEAN NOT NULL, in_stock BOOLEAN NOT NULL, facebook INTEGER NOT NULL, is_kcup BOOLEAN NOT NULL, PRIMARY KEY(id))');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE items');
    
    }
}
