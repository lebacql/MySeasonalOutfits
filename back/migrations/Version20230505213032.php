<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505213032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE outfit_answer (outfit_id INT NOT NULL, answer_id INT NOT NULL, INDEX IDX_6E443006AE96E385 (outfit_id), INDEX IDX_6E443006AA334807 (answer_id), PRIMARY KEY(outfit_id, answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE outfit_answer ADD CONSTRAINT FK_6E443006AE96E385 FOREIGN KEY (outfit_id) REFERENCES outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit_answer ADD CONSTRAINT FK_6E443006AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit_user_answer DROP FOREIGN KEY FK_4F07ACF7AAD3C5E3');
        $this->addSql('ALTER TABLE outfit_user_answer DROP FOREIGN KEY FK_4F07ACF7AE96E385');
        $this->addSql('DROP TABLE outfit_user_answer');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE outfit_user_answer (outfit_id INT NOT NULL, user_answer_id INT NOT NULL, INDEX IDX_4F07ACF7AE96E385 (outfit_id), INDEX IDX_4F07ACF7AAD3C5E3 (user_answer_id), PRIMARY KEY(outfit_id, user_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE outfit_user_answer ADD CONSTRAINT FK_4F07ACF7AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit_user_answer ADD CONSTRAINT FK_4F07ACF7AE96E385 FOREIGN KEY (outfit_id) REFERENCES outfit (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit_answer DROP FOREIGN KEY FK_6E443006AE96E385');
        $this->addSql('ALTER TABLE outfit_answer DROP FOREIGN KEY FK_6E443006AA334807');
        $this->addSql('DROP TABLE outfit_answer');
    }
}
