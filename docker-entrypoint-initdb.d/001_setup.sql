ALTER USER `root`@`%` IDENTIFIED WITH mysql_native_password BY 'secret';
ALTER USER root@localhost IDENTIFIED WITH mysql_native_password BY 'secret';

-- 1. ユーザーテーブル
CREATE TABLE `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
    `name` VARCHAR(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
    `created_at` DATETIME NOT NULL COMMENT '作成日',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ユーザー';

-- 2. ペットテーブル
CREATE TABLE `pets` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
    `name` VARCHAR(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '名前',
    `birth_year` SMALLINT UNSIGNED NOT NULL COMMENT '誕生年',
    `birth_month` TINYINT UNSIGNED NULL COMMENT '誕生月',
    `birth_day` TINYINT UNSIGNED NULL COMMENT '誕生日',
    `sex` TINYINT(1) COMMENT '性別(0:♂, 1:♀)',
    `breed` VARCHAR(128) COMMENT '犬種',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ペット';

-- 3. 日記(一日まとめ)テーブル
CREATE TABLE `diaries` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '日記id',
    `pet_id` INT UNSIGNED NOT NULL COMMENT 'ペットid',
    `date` DATE NOT NULL COMMENT '対象日付',
    `weather_code` TINYINT COMMENT '天気。二桁表記',
    `max_temp` TINYINT COMMENT '最高気温',
    `min_temp` TINYINT COMMENT '最低気温',
    `has_special_notes` TINYINT(1) DEFAULT 0 COMMENT '特記事項があるかどうか',
    `notes` JSON COMMENT '備考',
    `created_at` DATETIME NOT NULL COMMENT '作成日',
    `updated_at` DATETIME NOT NULL COMMENT '更新日',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='日記テーブル';

-- 4. 散歩アクティビティテーブル
CREATE TABLE `walk_activities` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '散歩id',
    `diary_id` INT UNSIGNED NOT NULL COMMENT '日記id',
    `urine` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '排泄(尿)', 
    `stool` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '排泄(便)',
    `created_at` TIME NOT NULL COMMENT '記録した時間',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='散歩アクティビティテーブル';

-- 5. ご飯テーブル
CREATE TABLE `meals_and_medicines` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ご飯id',
    `food_name` VARCHAR(255) NOT NULL COMMENT 'ご飯等の名前',
    `default_amount` INT UNSIGNED COMMENT 'デフォルトのご飯の量',
    `is_medicine` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '薬かどうか',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ごはんマスタテーブル';

-- 6. ご飯アクティビティテーブル
CREATE TABLE `meal_activities` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ご飯アクティビティid',
    `diary_id` INT UNSIGNED NOT NULL COMMENT '日記id',
    `food_id` INT UNSIGNED NOT NULL COMMENT 'ご飯設定id',
    `amount` INT UNSIGNED COMMENT 'グラム上書き',
    `created_at` TIME NOT NULL COMMENT '記録した時間',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ごはんアクティビティテーブル';