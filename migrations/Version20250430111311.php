<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250430111311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE need DROP created_at, CHANGE author_id author_id INT NOT NULL, CHANGE url url VARCHAR(255) NOT NULL, CHANGE info summary LONGTEXT NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE need ADD created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', CHANGE author_id author_id INT DEFAULT NULL, CHANGE url url VARCHAR(255) DEFAULT NULL, CHANGE summary info LONGTEXT NOT NULL
        SQL);
    }
}
