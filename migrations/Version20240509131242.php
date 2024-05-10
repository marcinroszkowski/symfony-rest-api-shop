<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240509131242 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE orders (
                id INT AUTO_INCREMENT NOT NULL,
                client_id INT NOT NULL,
                value INT NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                PRIMARY KEY(id)
            )
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        $this->addSql(
            'ALTER TABLE orders ADD CONSTRAINT fk_client_id FOREIGN KEY (client_id) REFERENCES clients (id);'
        );

        $this->addSql(
            'CREATE TABLE products (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(255) NOT NULL,
                price INT NOT NULL,
                weight INT NOT NULL,
                PRIMARY KEY(id)
            )
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        $this->addSql(
            'CREATE TABLE orders_items (
                id INT AUTO_INCREMENT NOT NULL,
                order_id INT NOT NULL,
                product_id INT NOT NULL,
                quantity INT NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                PRIMARY KEY(id)
            )
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        $this->addSql(
            'ALTER TABLE orders_items ADD CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES products (id);
             ALTER TABLE orders_items ADD CONSTRAINT fk_order_id FOREIGN KEY (order_id) REFERENCES orders (id);'
        );

        $this->addSql(
            'CREATE INDEX idx_multi_col_order_id_product_id ON orders_items (order_id, product_id)'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE orders_items');
    }
}
