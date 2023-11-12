CREATE TABLE users(
  `id` VARCHAR(16) NOT NULL PRIMARY KEY,
  `username` VARCHAR(30) NOT NULL UNIQUE,
  `password` VARCHAR(200) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (`id`, `username`, `password`, `nama`)
  VALUES ('syj9AUTpXoQsgU6n', 'admin', '$2y$10$OD.BmC4pHuhxUZ8hoQvo3eZhOWEYtcac8Di3PAjlhhJYTbXWrmqHG', 'Administrator');

CREATE TABLE amils(
  `id` VARCHAR(16) NOT NULL PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `no_hp` VARCHAR(16) NULL,
  `alamat` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE muzakkis(
  `id` VARCHAR(16) NOT NULL PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `no_hp` VARCHAR(16) NULL,
  `alamat` TEXT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pembayarans(
  `id` VARCHAR(16) NOT NULL PRIMARY KEY,
  `amil_id` VARCHAR(16) NOT NULL,
  `muzakki_id` VARCHAR(16) NOT NULL,
  `jumlah_tanggungan` INT NOT NULL,
  `jenis_bayar` ENUM('Beras', 'Tunai') NOT NULL DEFAULT "Tunai",
  `beras`FLOAT NOT NULL DEFAULT 0,
  `tunai`INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  FOREIGN KEY (`amil_id`) REFERENCES amils(`id`),
  FOREIGN KEY (`muzakki_id`) REFERENCES muzakkis(`id`)
);
