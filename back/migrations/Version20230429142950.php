<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230429142950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, date DATETIME NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outfit (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, top_img VARCHAR(255) NOT NULL, top_brand VARCHAR(255) NOT NULL, top_price VARCHAR(255) NOT NULL, top_link VARCHAR(255) NOT NULL, bottom_img VARCHAR(255) NOT NULL, bottom_brand VARCHAR(255) NOT NULL, bottom_price VARCHAR(255) NOT NULL, bottom_link VARCHAR(255) NOT NULL, shoes_img VARCHAR(255) NOT NULL, shoes_brand VARCHAR(255) NOT NULL, shoes_price VARCHAR(255) NOT NULL, shoes_link VARCHAR(255) NOT NULL, accessories_img VARCHAR(255) NOT NULL, accessories_brand VARCHAR(255) NOT NULL, accessories_price VARCHAR(255) NOT NULL, accessories_link VARCHAR(255) NOT NULL, INDEX IDX_32029601A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outfit_user_answer (outfit_id INT NOT NULL, user_answer_id INT NOT NULL, INDEX IDX_4F07ACF7AE96E385 (outfit_id), INDEX IDX_4F07ACF7AAD3C5E3 (user_answer_id), PRIMARY KEY(outfit_id, user_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, quiz_id INT NOT NULL, question VARCHAR(255) NOT NULL, answer_a VARCHAR(255) NOT NULL, answer_b VARCHAR(255) NOT NULL, answer_c VARCHAR(255) NOT NULL, answer_d VARCHAR(255) DEFAULT NULL, INDEX IDX_B6F7494E853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_user_answer (question_id INT NOT NULL, user_answer_id INT NOT NULL, INDEX IDX_5C8B8E951E27F6BF (question_id), INDEX IDX_5C8B8E95AAD3C5E3 (user_answer_id), PRIMARY KEY(question_id, user_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, season VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_answer (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, INDEX IDX_BF8F5118A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE outfit ADD CONSTRAINT FK_32029601A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE outfit_user_answer ADD CONSTRAINT FK_4F07ACF7AE96E385 FOREIGN KEY (outfit_id) REFERENCES outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit_user_answer ADD CONSTRAINT FK_4F07ACF7AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE question_user_answer ADD CONSTRAINT FK_5C8B8E951E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_user_answer ADD CONSTRAINT FK_5C8B8E95AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_answer ADD CONSTRAINT FK_BF8F5118A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outfit DROP FOREIGN KEY FK_32029601A76ED395');
        $this->addSql('ALTER TABLE outfit_user_answer DROP FOREIGN KEY FK_4F07ACF7AE96E385');
        $this->addSql('ALTER TABLE outfit_user_answer DROP FOREIGN KEY FK_4F07ACF7AAD3C5E3');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('ALTER TABLE question_user_answer DROP FOREIGN KEY FK_5C8B8E951E27F6BF');
        $this->addSql('ALTER TABLE question_user_answer DROP FOREIGN KEY FK_5C8B8E95AAD3C5E3');
        $this->addSql('ALTER TABLE user_answer DROP FOREIGN KEY FK_BF8F5118A76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE outfit');
        $this->addSql('DROP TABLE outfit_user_answer');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE question_user_answer');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_answer');
    }
}
