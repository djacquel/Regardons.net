CREATE TABLE `user`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(255) NOT NULL DEFAULT 'hashed',
    `role_id` INT UNSIGNED NOT NULL,
    `avatar` VARCHAR(255) NULL,
    `bio` TEXT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE
    `user` ADD UNIQUE `user_username_unique`(`username`);
ALTER TABLE
    `user` ADD UNIQUE `user_email_unique`(`email`);
CREATE TABLE `role`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `description` VARCHAR(255) NULL
);
ALTER TABLE
    `role` ADD UNIQUE `role_name_unique`(`name`);
CREATE TABLE `token`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `token` VARCHAR(64) NOT NULL,
    `expires_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE
    `token` ADD UNIQUE `token_token_unique`(`token`);
CREATE TABLE `article`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `category_id` INT UNSIGNED NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `slug` VARCHAR(200) NOT NULL,
    `status` ENUM('draft', 'pending', 'published') NOT NULL DEFAULT 'draft',
    `published_at` DATETIME NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE
    `article` ADD UNIQUE `article_slug_unique`(`slug`);
CREATE TABLE `category`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `description` VARCHAR(255) NULL
);
ALTER TABLE
    `category` ADD UNIQUE `category_name_unique`(`name`);
CREATE TABLE `comment`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `content` TEXT NOT NULL,
    `user-id` BIGINT UNSIGNED NOT NULL,
    `article_id` INT UNSIGNED NOT NULL,
    `status` ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `gallery`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `description` TEXT NULL,
    `created-by` INT UNSIGNED NOT NULL
);
CREATE TABLE `photo`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `gallery_id` INT UNSIGNED NOT NULL,
    `title` VARCHAR(200) NULL,
    `image_url` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `photographer_id` INT UNSIGNED NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `social_connect`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `article_id` INT UNSIGNED NOT NULL,
    `platform` ENUM('facebook', 'instagram', 'x') NOT NULL,
    `status` ENUM('pending', 'published', 'failed') NOT NULL DEFAULT 'pending',
    `published_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `tag`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL
);
ALTER TABLE
    `tag` ADD UNIQUE `tag_name_unique`(`name`);
CREATE TABLE `reply`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `content` TEXT NOT NULL,
    `user_id` INT UNSIGNED NOT NULL,
    `comment_id` INT UNSIGNED NOT NULL,
    `status` ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `articles_tag`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `article_id` BIGINT UNSIGNED NOT NULL,
    `tag_id` INT UNSIGNED NOT NULL
);
CREATE TABLE `location`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(200) NOT NULL,
    `description` TEXT NULL,
    `region` VARCHAR(100) NULL,
    `latitude` DECIMAL(10, 7) NULL,
    `longitude` DECIMAL(10, 7) NULL,
    `image` VARCHAR(255) NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `like`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `article_id` INT UNSIGNED NULL,
    `photo_id` INT UNSIGNED NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `notification`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `type` ENUM('comment', 'reply', 'like') NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `link` VARCHAR(255) NULL,
    `is_read` BOOLEAN NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE
    `comment` ADD CONSTRAINT `comment_article_id_foreign` FOREIGN KEY(`article_id`) REFERENCES `article`(`id`);
ALTER TABLE
    `user` ADD CONSTRAINT `user_role_id_foreign` FOREIGN KEY(`role_id`) REFERENCES `role`(`id`);
ALTER TABLE
    `article` ADD CONSTRAINT `article_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `notification` ADD CONSTRAINT `notification_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `social_connect` ADD CONSTRAINT `social_connect_article_id_foreign` FOREIGN KEY(`article_id`) REFERENCES `article`(`id`);
ALTER TABLE
    `like` ADD CONSTRAINT `like_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `photo` ADD CONSTRAINT `photo_gallery_id_foreign` FOREIGN KEY(`gallery_id`) REFERENCES `gallery`(`id`);
ALTER TABLE
    `token` ADD CONSTRAINT `token_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `reply` ADD CONSTRAINT `reply_comment_id_foreign` FOREIGN KEY(`comment_id`) REFERENCES `comment`(`id`);
ALTER TABLE
    `reply` ADD CONSTRAINT `reply_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `photo` ADD CONSTRAINT `photo_photographer_id_foreign` FOREIGN KEY(`photographer_id`) REFERENCES `user`(`id`);
ALTER TABLE
    `articles_tag` ADD CONSTRAINT `articles_tag_tag_id_foreign` FOREIGN KEY(`tag_id`) REFERENCES `tag`(`id`);
ALTER TABLE
    `gallery` ADD CONSTRAINT `gallery_created_by_foreign` FOREIGN KEY(`created-by`) REFERENCES `user`(`id`);
ALTER TABLE
    `article` ADD CONSTRAINT `article_category_id_foreign` FOREIGN KEY(`category_id`) REFERENCES `category`(`id`);
ALTER TABLE
    `articles_tag` ADD CONSTRAINT `articles_tag_article_id_foreign` FOREIGN KEY(`article_id`) REFERENCES `article`(`id`);
ALTER TABLE
    `comment` ADD CONSTRAINT `comment_user_id_foreign` FOREIGN KEY(`user-id`) REFERENCES `user`(`id`);