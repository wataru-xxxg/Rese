# Rese
「Rese」は、飲食店などの店舗を検索・予約できるWebアプリケーションです。ユーザーはエリアやジャンル、キーワードで店舗を探し、予約やレビュー投稿、お気に入り登録が可能です。店舗オーナーは自身の店舗情報や予約を管理でき、管理者はオーナーの管理ができます。オンライン決済やQRコード発行、リマインダーメール送信など、実用的な機能を備えています。
![トップ画面](top.png "トップ画面")

## 作成した目的
外部の飲食店予約サービスは手数料を取られるため、自社で予約サービスを持ちたいというニーズに応えるために本アプリケーションを開発しました。これにより、手数料コストを削減し、顧客との直接的な関係構築や独自のサービス展開が可能となります。

## アプリケーションURL
http://ec2-18-183-15-145.ap-northeast-1.compute.amazonaws.com/

## 機能一覧
- ユーザー登録・ログイン（メール認証対応）
- 店舗一覧・検索（エリア・ジャンル・キーワード）
- 店舗詳細表示
- 店舗予約（日時・人数指定、予約変更・キャンセル）
- お気に入り店舗登録
- レビュー投稿・編集
- 予約ごとのQRコード発行
- Stripeによるオンライン決済
- 予約リマインダーメール・お知らせメール送信
- 権限別（管理者・オーナー・一般ユーザー）機能
  - 管理者：店舗オーナーの作成
  - オーナー：自身の店舗管理（新規作成・編集）、予約管理、ユーザーへの通知
  - 一般ユーザー：予約・レビュー・お気に入り管理

## 使用技術

- PHP 8.3.23
- Laravel 8.83.29
- MYSQL 8.0.26
- nginx 1.21.1
- AWS
  - VPC 
  - EC2
  - S3
  - RDS
  - Route53
  - SES



## テーブル設計
### users
| カラム名           | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| name              | varchar(255) |             |            | ○        |             |
| email             | varchar(255) |             | ○          | ○        |             |
| email_verified_at | timestamp    |             |            |          |             |
| password          | varchar(255) |             |            | ○        |             |
| role_id           | bigint       |             |            | ○        | roles(id)   |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

### roles
| カラム名           | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| name              | varchar(255) |             |            | ○        |             |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

### shops
| カラム名           | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| name              | varchar(255) |             |            | ○        |             |
| area_id           | bigint       |             |            | ○        | areas(id)   |
| genre_id          | bigint       |             |            | ○        | genres(id)  |
| description       | varchar(255) |             |            | ○        |             |
| image_path        | varchar(255) |             |            | ○        |             |
| owner_id          | bigint       |             |            | ○        | users(id)   |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

### areas
| カラム名           | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| name              | varchar(255) |             |            | ○        |             |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

### genres
| カラム名           | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| name              | varchar(255) |             |            | ○        |             |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

### reservations
| カラム名          | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| shop_id           | bigint       |             |            | ○        | shops(id)   |
| user_id           | bigint       |             |            | ○        | users(id)  |
| date              | date         |             |            | ○        |             |
| time              | time         |             |            | ○        |             |
| number            | int          |             |            | ○        |             |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

### reviews
| カラム名          | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| reservation_id    | bigint       |             |            | ○        | reservations(id)|
| user_id           | bigint       |             |            | ○        | users(id)   |
| shop_id           | bigint       |             |            | ○        | shops(id)   |
| rating            | inte         |             |            | ○        |             |
| comment           | text         |             |            | ○        |             |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

### favorites
| カラム名          | 型           | primary key | unique key | not null | foreign key |
| ----------------- | ------------ | ----------- | ---------- | -------- | ----------- |
| id                | bigint       | ○           |            | ○        |             |
| shop_id           | bigint       |             |            | ○        | shops(id)   |
| user_id           | bigint       |             |            | ○        | users(id)   |
| created_at        | timestamp    |             |            |          |             |
| updated_at        | timestamp    |             |            |          |             |

## ER図
![ER図](er.png "ER図")

## 環境構築
Docker ビルド  
1.git clone https://github.com/wataru-xxxg/Rese.git
2.docker-compose up -d --build

Lavaral 環境構築  
1.docker-compose exec php bash  
2.composer install  
3.cp .env.example .env  
4..env ファイルの変更

```
　DB_HOSTをmysqlに変更
　DB_DATABASEをlaravel_dbに変更
　DB_USERNAMEをlaravel_userに変更
　DB_PASSをlaravel_passに変更
　MAIL_FROM_ADDRESSに送信元アドレスを設定
```

5.php artisan key:generate  
6.php artisan migrate  
7.php artisan db:seed  
8.php artisan test

## ログイン情報
一般ユーザー  
　 id：test@test.com
　 pass：password  
管理者  
　 id：admin@admin.com  
　 pass：password
オーナー  
　 id：owner@owner.com  
　 pass：password