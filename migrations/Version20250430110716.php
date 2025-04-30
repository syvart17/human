<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250430110716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE need_skill (need_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_B865F73F624AF264 (need_id), INDEX IDX_B865F73F5585C142 (skill_id), PRIMARY KEY(need_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE need_skill ADD CONSTRAINT FK_B865F73F624AF264 FOREIGN KEY (need_id) REFERENCES need (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE need_skill ADD CONSTRAINT FK_B865F73F5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE need ADD author_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE need ADD CONSTRAINT FK_E6F46C44F675F31B FOREIGN KEY (author_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E6F46C44F675F31B ON need (author_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE need DROP FOREIGN KEY FK_E6F46C44F675F31B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE need_skill DROP FOREIGN KEY FK_B865F73F624AF264
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE need_skill DROP FOREIGN KEY FK_B865F73F5585C142
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE need_skill
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE skill
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_E6F46C44F675F31B ON need
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE need DROP author_id
        SQL);
    }
}
