<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200505001449 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE user_lab_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ordem_servico_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE exame_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE especialidade_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ordem_servico_exame_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE convenio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE medico_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE paciente_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE posto_coleta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_lab (id INT NOT NULL, posto_coleta_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nome VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8AC0D04FF85E0677 ON user_lab (username)');
        $this->addSql('CREATE INDEX IDX_8AC0D04FCE458A2B ON user_lab (posto_coleta_id)');
        $this->addSql('CREATE TABLE usuario (id INT NOT NULL, posto_coleta_id INT NOT NULL, nome VARCHAR(255) NOT NULL, login VARCHAR(20) NOT NULL, senha VARCHAR(8) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2265B05DCE458A2B ON usuario (posto_coleta_id)');
        $this->addSql('CREATE TABLE ordem_servico (id INT NOT NULL, paciente_id INT DEFAULT NULL, medico_id INT DEFAULT NULL, user_lab_id INT NOT NULL, data_os DATE NOT NULL, data_retirada DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_844B57277310DAD4 ON ordem_servico (paciente_id)');
        $this->addSql('CREATE INDEX IDX_844B5727A7FB1C0C ON ordem_servico (medico_id)');
        $this->addSql('CREATE INDEX IDX_844B57277DB08E8 ON ordem_servico (user_lab_id)');
        $this->addSql('CREATE TABLE exame (id INT NOT NULL, descricao VARCHAR(255) NOT NULL, preco NUMERIC(10, 2) NOT NULL, dias_resultado INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE especialidade (id INT NOT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ordem_servico_exame (id INT NOT NULL, ordem_servico_id INT NOT NULL, exame_id INT NOT NULL, preco NUMERIC(10, 2) NOT NULL, data_resultado VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2D6E00D04FB7C65A ON ordem_servico_exame (ordem_servico_id)');
        $this->addSql('CREATE INDEX IDX_2D6E00D0155C9BEA ON ordem_servico_exame (exame_id)');
        $this->addSql('CREATE TABLE convenio (id INT NOT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE medico (id INT NOT NULL, especialidade_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_34E5914C3BA9BFA5 ON medico (especialidade_id)');
        $this->addSql('CREATE TABLE paciente (id INT NOT NULL, convenio_id INT NOT NULL, nome VARCHAR(255) NOT NULL, data_nascimento DATE DEFAULT NULL, sexo VARCHAR(1) DEFAULT NULL, endereco VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C6CBA95EF9D43F2A ON paciente (convenio_id)');
        $this->addSql('CREATE TABLE posto_coleta (id INT NOT NULL, descricao VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE user_lab ADD CONSTRAINT FK_8AC0D04FCE458A2B FOREIGN KEY (posto_coleta_id) REFERENCES posto_coleta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05DCE458A2B FOREIGN KEY (posto_coleta_id) REFERENCES posto_coleta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ordem_servico ADD CONSTRAINT FK_844B57277310DAD4 FOREIGN KEY (paciente_id) REFERENCES paciente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ordem_servico ADD CONSTRAINT FK_844B5727A7FB1C0C FOREIGN KEY (medico_id) REFERENCES medico (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ordem_servico ADD CONSTRAINT FK_844B57277DB08E8 FOREIGN KEY (user_lab_id) REFERENCES user_lab (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ordem_servico_exame ADD CONSTRAINT FK_2D6E00D04FB7C65A FOREIGN KEY (ordem_servico_id) REFERENCES ordem_servico (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ordem_servico_exame ADD CONSTRAINT FK_2D6E00D0155C9BEA FOREIGN KEY (exame_id) REFERENCES exame (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE medico ADD CONSTRAINT FK_34E5914C3BA9BFA5 FOREIGN KEY (especialidade_id) REFERENCES especialidade (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE paciente ADD CONSTRAINT FK_C6CBA95EF9D43F2A FOREIGN KEY (convenio_id) REFERENCES convenio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ordem_servico DROP CONSTRAINT FK_844B57277DB08E8');
        $this->addSql('ALTER TABLE ordem_servico_exame DROP CONSTRAINT FK_2D6E00D04FB7C65A');
        $this->addSql('ALTER TABLE ordem_servico_exame DROP CONSTRAINT FK_2D6E00D0155C9BEA');
        $this->addSql('ALTER TABLE medico DROP CONSTRAINT FK_34E5914C3BA9BFA5');
        $this->addSql('ALTER TABLE paciente DROP CONSTRAINT FK_C6CBA95EF9D43F2A');
        $this->addSql('ALTER TABLE ordem_servico DROP CONSTRAINT FK_844B5727A7FB1C0C');
        $this->addSql('ALTER TABLE ordem_servico DROP CONSTRAINT FK_844B57277310DAD4');
        $this->addSql('ALTER TABLE user_lab DROP CONSTRAINT FK_8AC0D04FCE458A2B');
        $this->addSql('ALTER TABLE usuario DROP CONSTRAINT FK_2265B05DCE458A2B');
        $this->addSql('DROP SEQUENCE user_lab_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuario_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ordem_servico_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE exame_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE especialidade_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ordem_servico_exame_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE convenio_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE medico_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE paciente_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE posto_coleta_id_seq CASCADE');
        $this->addSql('DROP TABLE user_lab');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE ordem_servico');
        $this->addSql('DROP TABLE exame');
        $this->addSql('DROP TABLE especialidade');
        $this->addSql('DROP TABLE ordem_servico_exame');
        $this->addSql('DROP TABLE convenio');
        $this->addSql('DROP TABLE medico');
        $this->addSql('DROP TABLE paciente');
        $this->addSql('DROP TABLE posto_coleta');
    }
}
