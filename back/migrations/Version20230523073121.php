<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230523073121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proposal (id INT AUTO_INCREMENT NOT NULL, quiz_id INT NOT NULL, outfit_id INT NOT NULL, UNIQUE INDEX UNIQ_BFE59472853CD175 (quiz_id), UNIQUE INDEX UNIQ_BFE59472AE96E385 (outfit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE59472853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE59472AE96E385 FOREIGN KEY (outfit_id) REFERENCES outfit (id)');
        $this->addSql('ALTER TABLE outfit_answer DROP FOREIGN KEY FK_6E443006AA334807');
        $this->addSql('ALTER TABLE outfit_answer DROP FOREIGN KEY FK_6E443006AE96E385');
        $this->addSql('DROP TABLE outfit_answer');
        $this->addSql('ALTER TABLE answer ADD proposal_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25F4792058 FOREIGN KEY (proposal_id) REFERENCES proposal (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A25F4792058 ON answer (proposal_id)');
        $this->addSql('ALTER TABLE question ADD proposal_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EF4792058 FOREIGN KEY (proposal_id) REFERENCES proposal (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EF4792058 ON question (proposal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25F4792058');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EF4792058');
        $this->addSql('CREATE TABLE outfit_answer (outfit_id INT NOT NULL, answer_id INT NOT NULL, INDEX IDX_6E443006AA334807 (answer_id), INDEX IDX_6E443006AE96E385 (outfit_id), PRIMARY KEY(outfit_id, answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE outfit_answer ADD CONSTRAINT FK_6E443006AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit_answer ADD CONSTRAINT FK_6E443006AE96E385 FOREIGN KEY (outfit_id) REFERENCES outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE59472853CD175');
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE59472AE96E385');
        $this->addSql('DROP TABLE proposal');
        $this->addSql('DROP INDEX IDX_DADD4A25F4792058 ON answer');
        $this->addSql('ALTER TABLE answer DROP proposal_id');
        $this->addSql('DROP INDEX IDX_B6F7494EF4792058 ON question');
        $this->addSql('ALTER TABLE question DROP proposal_id');
    }
}
