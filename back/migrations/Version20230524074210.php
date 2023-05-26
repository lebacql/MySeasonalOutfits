<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524074210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal_answer DROP FOREIGN KEY FK_7BCB2E92AA334807');
        $this->addSql('ALTER TABLE proposal_answer DROP FOREIGN KEY FK_7BCB2E92F4792058');
        $this->addSql('ALTER TABLE proposal_question DROP FOREIGN KEY FK_57AC7566F4792058');
        $this->addSql('ALTER TABLE proposal_question DROP FOREIGN KEY FK_57AC75661E27F6BF');
        $this->addSql('DROP TABLE proposal_answer');
        $this->addSql('DROP TABLE proposal_question');
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE59472853CD175');
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE59472AE96E385');
        $this->addSql('DROP INDEX IDX_BFE59472AE96E385 ON proposal');
        $this->addSql('DROP INDEX IDX_BFE59472853CD175 ON proposal');
        $this->addSql('ALTER TABLE proposal DROP quiz_id, DROP outfit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proposal_answer (proposal_id INT NOT NULL, answer_id INT NOT NULL, INDEX IDX_7BCB2E92F4792058 (proposal_id), INDEX IDX_7BCB2E92AA334807 (answer_id), PRIMARY KEY(proposal_id, answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE proposal_question (proposal_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_57AC7566F4792058 (proposal_id), INDEX IDX_57AC75661E27F6BF (question_id), PRIMARY KEY(proposal_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE proposal_answer ADD CONSTRAINT FK_7BCB2E92AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposal_answer ADD CONSTRAINT FK_7BCB2E92F4792058 FOREIGN KEY (proposal_id) REFERENCES proposal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposal_question ADD CONSTRAINT FK_57AC7566F4792058 FOREIGN KEY (proposal_id) REFERENCES proposal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposal_question ADD CONSTRAINT FK_57AC75661E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proposal ADD quiz_id INT NOT NULL, ADD outfit_id INT NOT NULL');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE59472853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE59472AE96E385 FOREIGN KEY (outfit_id) REFERENCES outfit (id)');
        $this->addSql('CREATE INDEX IDX_BFE59472AE96E385 ON proposal (outfit_id)');
        $this->addSql('CREATE INDEX IDX_BFE59472853CD175 ON proposal (quiz_id)');
    }
}
