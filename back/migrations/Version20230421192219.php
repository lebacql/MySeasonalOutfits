<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421192219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE outfit (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, top_img VARCHAR(255) NOT NULL, top_brand VARCHAR(255) NOT NULL, top_price VARCHAR(255) NOT NULL, top_link VARCHAR(255) NOT NULL, bottom_img VARCHAR(255) NOT NULL, bottom_brand VARCHAR(255) NOT NULL, bottom_price VARCHAR(255) NOT NULL, bottom_link VARCHAR(255) NOT NULL, shoes_img VARCHAR(255) NOT NULL, shoes_brand VARCHAR(255) NOT NULL, shoes_price VARCHAR(255) NOT NULL, shoes_link VARCHAR(255) NOT NULL, accessories_img VARCHAR(255) NOT NULL, accessories_brand VARCHAR(255) NOT NULL, accessories_price VARCHAR(255) NOT NULL, accessories_link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outfit_user_answer (outfit_id INT NOT NULL, user_answer_id INT NOT NULL, INDEX IDX_4F07ACF7AE96E385 (outfit_id), INDEX IDX_4F07ACF7AAD3C5E3 (user_answer_id), PRIMARY KEY(outfit_id, user_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_answer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE outfit_user_answer ADD CONSTRAINT FK_4F07ACF7AE96E385 FOREIGN KEY (outfit_id) REFERENCES outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit_user_answer ADD CONSTRAINT FK_4F07ACF7AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answers DROP FOREIGN KEY FK_50D0C6061E27F6BF');
        $this->addSql('DROP TABLE answers');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answers (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, answer VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_50D0C6061E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C6061E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE outfit_user_answer DROP FOREIGN KEY FK_4F07ACF7AE96E385');
        $this->addSql('ALTER TABLE outfit_user_answer DROP FOREIGN KEY FK_4F07ACF7AAD3C5E3');
        $this->addSql('DROP TABLE outfit');
        $this->addSql('DROP TABLE outfit_user_answer');
        $this->addSql('DROP TABLE user_answer');
    }
}
