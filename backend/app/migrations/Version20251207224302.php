<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251207224302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contratacion (id INT AUTO_INCREMENT NOT NULL, comentarios LONGTEXT DEFAULT NULL, coste_total NUMERIC(10, 2) DEFAULT NULL, fecha_contratacion DATE NOT NULL, fecha_inicio_servicio DATE NOT NULL, fecha_fin_servicio DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contratacion_mascota (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuidador (id INT AUTO_INCREMENT NOT NULL, info_experiencia LONGTEXT DEFAULT NULL, ninos SMALLINT DEFAULT NULL, tiempo_experiencia INT NOT NULL, tipo_vivienda SMALLINT DEFAULT NULL, admin_medicamentos SMALLINT DEFAULT NULL, coche SMALLINT DEFAULT NULL, fuma SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dips_cuidador (id INT AUTO_INCREMENT NOT NULL, fecha DATE NOT NULL, disponible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE especie (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estado_contratacion (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mascota (id INT AUTO_INCREMENT NOT NULL, alimentacion SMALLINT NOT NULL, comp_gatos SMALLINT NOT NULL, comp_ninos SMALLINT NOT NULL, comp_perros SMALLINT NOT NULL, edad INT NOT NULL, energia SMALLINT NOT NULL, esterilizado TINYINT(1) NOT NULL, fecha_adopcion DATE NOT NULL, info_extra LONGTEXT DEFAULT NULL, info_vet LONGTEXT DEFAULT NULL, medicacion SMALLINT DEFAULT NULL, microchip TINYINT(1) NOT NULL, nombre VARCHAR(100) NOT NULL, sexo TINYINT(1) NOT NULL, sobre_mascota LONGTEXT DEFAULT NULL, tiempo_solo SMALLINT NOT NULL, tiempo_necesidades SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metodo_pago (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE necesidades (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opinion (id INT AUTO_INCREMENT NOT NULL, texto LONGTEXT DEFAULT NULL, valoracion SMALLINT NOT NULL, fecha_hora DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paseo (id INT AUTO_INCREMENT NOT NULL, dias SMALLINT NOT NULL, fecha_fin DATE NOT NULL, fecha_inicio DATE NOT NULL, intervalo_semanas INT DEFAULT NULL, repite SMALLINT DEFAULT NULL, nombre VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, apellidos VARCHAR(100) NOT NULL, fecha_nac DATE NOT NULL, telefono VARCHAR(15) NOT NULL, direccion VARCHAR(255) NOT NULL, dni VARCHAR(11) NOT NULL, contrasena VARCHAR(255) NOT NULL, email VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raza (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servicio (id INT AUTO_INCREMENT NOT NULL, direccion VARCHAR(255) NOT NULL, experiencia INT NOT NULL, mas_mascotas SMALLINT NOT NULL, tarifa_base NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tamano_mascota (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarifa_extra (id INT AUTO_INCREMENT NOT NULL, valor NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_servicio (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_tarifa (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE contratacion');
        $this->addSql('DROP TABLE contratacion_mascota');
        $this->addSql('DROP TABLE cuidador');
        $this->addSql('DROP TABLE dips_cuidador');
        $this->addSql('DROP TABLE especie');
        $this->addSql('DROP TABLE estado_contratacion');
        $this->addSql('DROP TABLE mascota');
        $this->addSql('DROP TABLE metodo_pago');
        $this->addSql('DROP TABLE necesidades');
        $this->addSql('DROP TABLE opinion');
        $this->addSql('DROP TABLE paseo');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE raza');
        $this->addSql('DROP TABLE servicio');
        $this->addSql('DROP TABLE tamano_mascota');
        $this->addSql('DROP TABLE tarifa_extra');
        $this->addSql('DROP TABLE tipo_servicio');
        $this->addSql('DROP TABLE tipo_tarifa');
    }
}
