<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126112511 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_7A5BC50599C4036B');
        $this->addSql('DROP INDEX IDX_7A5BC5058B71AC85');
        $this->addSql('CREATE TEMPORARY TABLE __temp__match AS SELECT id, player_a_id, player_b_id, status, score_player_a, score_player_b FROM "match"');
        $this->addSql('DROP TABLE "match"');
        $this->addSql('CREATE TABLE "match" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, player_a_id INTEGER DEFAULT NULL, player_b_id INTEGER DEFAULT NULL, status VARCHAR(255) NOT NULL COLLATE BINARY, score_player_a DOUBLE PRECISION DEFAULT NULL, score_player_b DOUBLE PRECISION DEFAULT NULL, CONSTRAINT FK_7A5BC50599C4036B FOREIGN KEY (player_a_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7A5BC5058B71AC85 FOREIGN KEY (player_b_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO "match" (id, player_a_id, player_b_id, status, score_player_a, score_player_b) SELECT id, player_a_id, player_b_id, status, score_player_a, score_player_b FROM __temp__match');
        $this->addSql('DROP TABLE __temp__match');
        $this->addSql('CREATE INDEX IDX_7A5BC50599C4036B ON "match" (player_a_id)');
        $this->addSql('CREATE INDEX IDX_7A5BC5058B71AC85 ON "match" (player_b_id)');
        $this->addSql('ALTER TABLE player ADD COLUMN ratio DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_7A5BC50599C4036B');
        $this->addSql('DROP INDEX IDX_7A5BC5058B71AC85');
        $this->addSql('CREATE TEMPORARY TABLE __temp__match AS SELECT id, player_a_id, player_b_id, score_player_a, score_player_b, status FROM "match"');
        $this->addSql('DROP TABLE "match"');
        $this->addSql('CREATE TABLE "match" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, player_a_id INTEGER DEFAULT NULL, player_b_id INTEGER DEFAULT NULL, score_player_a DOUBLE PRECISION DEFAULT NULL, score_player_b DOUBLE PRECISION DEFAULT NULL, status VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO "match" (id, player_a_id, player_b_id, score_player_a, score_player_b, status) SELECT id, player_a_id, player_b_id, score_player_a, score_player_b, status FROM __temp__match');
        $this->addSql('DROP TABLE __temp__match');
        $this->addSql('CREATE INDEX IDX_7A5BC50599C4036B ON "match" (player_a_id)');
        $this->addSql('CREATE INDEX IDX_7A5BC5058B71AC85 ON "match" (player_b_id)');
        $this->addSql('DROP INDEX UNIQ_98197A65F85E0677');
        $this->addSql('CREATE TEMPORARY TABLE __temp__player AS SELECT id, username, roles, password FROM player');
        $this->addSql('DROP TABLE player');
        $this->addSql('CREATE TABLE player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO player (id, username, roles, password) SELECT id, username, roles, password FROM __temp__player');
        $this->addSql('DROP TABLE __temp__player');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_98197A65F85E0677 ON player (username)');
    }
}
