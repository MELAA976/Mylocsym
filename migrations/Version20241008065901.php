<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241008065901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt ADD objet_id INT NOT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7F520CF5A FOREIGN KEY (objet_id) REFERENCES objet (id)');
        $this->addSql('CREATE INDEX IDX_364071D7F520CF5A ON emprunt (objet_id)');
        $this->addSql('ALTER TABLE objet ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C38BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_46CD4C38BCF5E72D ON objet (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7F520CF5A');
        $this->addSql('DROP INDEX IDX_364071D7F520CF5A ON emprunt');
        $this->addSql('ALTER TABLE emprunt DROP objet_id');
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C38BCF5E72D');
        $this->addSql('DROP INDEX IDX_46CD4C38BCF5E72D ON objet');
        $this->addSql('ALTER TABLE objet DROP categorie_id');
    }
}
