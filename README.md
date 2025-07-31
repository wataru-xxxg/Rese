# Rese

## アプリケーション概要

「Rese」は、飲食店などの店舗を検索・予約できる Web アプリケーションです。ユーザーはエリアやジャンル、キーワードで店舗を探し、予約やレビュー投稿、お気に入り登録が可能です。店舗オーナーは自身の店舗情報や予約を管理でき、管理者はオーナーの管理ができます。オンライン決済や QR コード発行、リマインダーメール送信など、実用的な機能を備えています。

## 作成の背景・目的

外部の飲食店予約サービスは手数料を取られるため、自社で予約サービスを持ちたいというニーズに応えるために本アプリケーションを開発しました。これにより、手数料コストを削減し、顧客との直接的な関係構築や独自のサービス展開が可能となります。

## 機能一覧

- ユーザー登録・ログイン（メール認証対応）
- 店舗一覧・検索（エリア・ジャンル・キーワード）
- 店舗詳細表示
- 店舗予約（日時・人数指定、予約変更・キャンセル）
- お気に入り店舗登録
- レビュー投稿・編集
- 予約ごとの QR コード発行
- Stripe によるオンライン決済
- 予約リマインダーメール・お知らせメール送信
- 権限別（管理者・オーナー・一般ユーザー）機能
  - 管理者：店舗オーナーの作成
  - オーナー：自身の店舗管理（新規作成・編集）、予約管理、ユーザーへの通知
  - 一般ユーザー：予約・レビュー・お気に入り管理

## 使用技術

- バックエンド: Laravel 8.x, PHP 7.3/8.0
- フロントエンド: Blade, Livewire, JavaScript, Axios, Laravel Mix, Lodash, PostCSS
- インフラ: Docker, docker-compose, Nginx, MySQL 8, phpMyAdmin
- 認証: Laravel Fortify, Laravel Sanctum
- 決済: Stripe
- その他: AWS S3（画像保存）, QR コード生成（simple-qrcode）

## テーブル仕様書（主要テーブル）

### USERS

| カラム名 | 型     | 主キー | 外部キー | 説明           |
| :------- | :----- | :----: | :------: | :------------- |
| id       | int    |   ○    |          | ユーザー ID    |
| name     | string |        |          | ユーザー名     |
| email    | string |        |          | メールアドレス |
| password | string |        |          | パスワード     |
| role_id  | int    |        |    ○     | 権限 ID        |

### ROLES

| カラム名 | 型     | 主キー | 外部キー | 説明    |
| :------- | :----- | :----: | :------: | :------ |
| id       | int    |   ○    |          | 権限 ID |
| name     | string |        |          | 権限名  |

### SHOPS

| カラム名    | 型     | 主キー | 外部キー | 説明        |
| :---------- | :----- | :----: | :------: | :---------- |
| id          | int    |   ○    |          | 店舗 ID     |
| name        | string |        |          | 店舗名      |
| area_id     | int    |        |    ○     | エリア ID   |
| genre_id    | int    |        |    ○     | ジャンル ID |
| description | string |        |          | 店舗説明    |
| image_path  | string |        |          | 画像パス    |
| owner_id    | int    |        |    ○     | オーナー ID |

### AREAS

| カラム名 | 型     | 主キー | 外部キー | 説明      |
| :------- | :----- | :----: | :------: | :-------- |
| id       | int    |   ○    |          | エリア ID |
| name     | string |        |          | エリア名  |

### GENRES

| カラム名 | 型     | 主キー | 外部キー | 説明        |
| :------- | :----- | :----: | :------: | :---------- |
| id       | int    |   ○    |          | ジャンル ID |
| name     | string |        |          | ジャンル名  |

### RESERVATIONS

| カラム名 | 型   | 主キー | 外部キー | 説明        |
| :------- | :--- | :----: | :------: | :---------- |
| id       | int  |   ○    |          | 予約 ID     |
| shop_id  | int  |        |    ○     | 店舗 ID     |
| user_id  | int  |        |    ○     | ユーザー ID |
| date     | date |        |          | 予約日      |
| time     | time |        |          | 予約時間    |
| number   | int  |        |          | 予約人数    |

### REVIEWS

| カラム名       | 型   | 主キー | 外部キー | 説明        |
| :------------- | :--- | :----: | :------: | :---------- |
| id             | int  |   ○    |          | レビュー ID |
| reservation_id | int  |        |    ○     | 予約 ID     |
| shop_id        | int  |        |    ○     | 店舗 ID     |
| user_id        | int  |        |    ○     | ユーザー ID |
| rating         | int  |        |          | 評価        |
| comment        | text |        |          | コメント    |

### FAVORITES

| カラム名 | 型  | 主キー | 外部キー | 説明          |
| :------- | :-- | :----: | :------: | :------------ |
| id       | int |   ○    |          | お気に入り ID |
| shop_id  | int |        |    ○     | 店舗 ID       |
| user_id  | int |        |    ○     | ユーザー ID   |

## モデル一覧

| モデル名    | 対応テーブル | 主な役割               | 主なリレーション例                                                                                                 |
| :---------- | :----------- | :--------------------- | :----------------------------------------------------------------------------------------------------------------- |
| User        | users        | ユーザー情報・認証管理 | hasMany(Reservation), hasMany(Review), belongsTo(Role), hasMany(Favorite), isAdmin/isOwner/isUser                  |
| Role        | roles        | ユーザー権限管理       | hasMany(User)                                                                                                      |
| Shop        | shops        | 店舗情報管理           | belongsTo(Area), belongsTo(Genre), belongsTo(User/owner), hasMany(Reservation), hasMany(Review), hasMany(Favorite) |
| Area        | areas        | エリア情報管理         | hasMany(Shop)                                                                                                      |
| Genre       | genres       | ジャンル情報管理       | hasMany(Shop)                                                                                                      |
| Reservation | reservations | 予約情報管理           | belongsTo(User), belongsTo(Shop), hasOne(Review)                                                                   |
| Review      | reviews      | レビュー情報管理       | belongsTo(User), belongsTo(Shop), belongsTo(Reservation)                                                           |
| Favorite    | favorites    | お気に入り店舗管理     | belongsTo(User), belongsTo(Shop)                                                                                   |
| Payment     | payments     | 決済情報管理           | belongsTo(User), belongsTo(Shop), belongsTo(Reservation)                                                           |

## 主なルート一覧

| パス                             | メソッド | コントローラ/アクション                     | 概要                     | 認証/権限                |
| :------------------------------- | :------- | :------------------------------------------ | :----------------------- | :----------------------- |
| /                                | GET      | ShopController@index                        | トップページ（店舗一覧） | なし                     |
| /detail/{id}                     | GET      | ShopController@detail                       | 店舗詳細                 | なし                     |
| /done/{message?}                 | GET      | ShopController@done                         | 完了メッセージ表示       | なし                     |
| /detail/{id}                     | POST     | ShopController@reservation                  | 店舗予約                 | ログイン・メール認証     |
| /reservation-change/{id}         | GET      | ShopController@reservationChangePage        | 予約変更画面             | ログイン・メール認証     |
| /reservation-change/{id}         | POST     | ShopController@reservationChange            | 予約変更処理             | ログイン・メール認証     |
| /review/{id}                     | GET      | ShopController@reviewPage                   | レビュー投稿画面         | ログイン・メール認証     |
| /review/{id}                     | POST     | ShopController@review                       | レビュー投稿処理         | ログイン・メール認証     |
| /mypage                          | GET      | ShopController@mypage                       | ユーザーマイページ       | ログイン・メール認証     |
| /qrcode/generate                 | GET      | QrCodeController@generate                   | QR コード生成            | ログイン・メール認証     |
| /qrcode/reservation/{id}         | GET      | QrCodeController@reservationQrCode          | 予約用 QR コード表示     | ログイン・メール認証     |
| /stripe/payment/{id}             | GET      | StripeController@payment                    | 予約決済開始             | ログイン・メール認証     |
| /stripe/success/{id}             | GET      | StripeController@success                    | 決済成功時               | ログイン・メール認証     |
| /stripe/cancel/{id}              | GET      | StripeController@cancel                     | 決済キャンセル時         | ログイン・メール認証     |
| /admin/register/owner            | GET      | AdminController@createOwner                 | オーナー登録画面         | 管理者                   |
| /admin/register/owner            | POST     | AdminController@storeOwner                  | オーナー登録処理         | 管理者                   |
| /owner/mypage                    | GET      | OwnerController@mypage                      | オーナーマイページ       | オーナー                 |
| /owner/shops/create              | GET      | OwnerController@createShop                  | 店舗新規作成画面         | オーナー                 |
| /owner/shops/create              | POST     | OwnerController@storeShop                   | 店舗新規作成処理         | オーナー                 |
| /owner/shops/{id}                | GET      | OwnerController@shopDetail                  | 店舗詳細（オーナー用）   | オーナー                 |
| /owner/shops/{id}/edit           | GET      | OwnerController@editShop                    | 店舗編集画面             | オーナー                 |
| /owner/shops/{id}                | PUT      | OwnerController@updateShop                  | 店舗編集処理             | オーナー                 |
| /owner/notification/{id}         | GET      | NotificationController@showNotificationForm | お知らせメール作成       | オーナー                 |
| /owner/notification/{id}         | POST     | NotificationController@sendNotification     | お知らせメール送信       | オーナー                 |
| /management/analytics            | GET      |                                             | 分析画面                 | 管理者・オーナー         |
| /email/verify                    | GET      | EmailVerificationController@show            | メール認証案内           | ログイン                 |
| /email/verify/{id}/{hash}        | GET      | EmailVerificationController@verify          | メール認証処理           | ログイン・署名付き       |
| /email/verification-notification | POST     | EmailVerificationController@resend          | 認証メール再送信         | ログイン・スロットル制限 |
| /api/user                        | GET      |                                             | ログインユーザー情報取得 | API 認証                 |

## View ファイル一覧

| ファイル名                   | ディレクトリ | 主な用途・画面例         |
| :--------------------------- | :----------- | :----------------------- |
| index.blade.php              | /            | トップページ（店舗一覧） |
| detail.blade.php             | layouts/     | 店舗詳細（レイアウト）   |
| done.blade.php               | /            | 完了メッセージ           |
| reservation.blade.php        | /            | 予約画面                 |
| reservation-change.blade.php | /            | 予約変更画面             |
| mypage.blade.php             | /            | ユーザーマイページ       |
| review.blade.php             | /            | レビュー投稿画面         |
| shop.blade.php               | livewire/    | 店舗カード（Livewire）   |
| reservation.blade.php        | livewire/    | 予約（Livewire）         |
| grid.blade.php               | livewire/    | 店舗グリッド表示         |
| search.blade.php             | livewire/    | 店舗検索                 |
| favorite.blade.php           | livewire/    | お気に入り店舗           |
| mypage.blade.php             | owner/       | オーナーマイページ       |
| notification.blade.php       | owner/       | お知らせメール作成・送信 |
| edit.blade.php               | owner/       | 店舗情報編集             |
| reservation.blade.php        | qrcode/      | 予約用 QR コード表示     |
| verify-email.blade.php       | auth/        | メール認証案内           |
| login.blade.php              | auth/        | ログイン画面             |
| register.blade.php           | auth/        | ユーザー登録画面         |
| restaurant-card.blade.php    | components/  | 店舗カードコンポーネント |
| menu.blade.php               | components/  | メニューコンポーネント   |
| search.blade.php             | components/  | 検索コンポーネント       |
| register.blade.php           | admin/       | オーナー登録画面         |
| app.blade.php                | layouts/     | アプリ全体レイアウト     |

## バリデーションファイル一覧

| ファイル名              | 主な用途・説明       | バリデーション対象                   |
| :---------------------- | :------------------- | :----------------------------------- |
| ShopRequest.php         | 店舗情報の登録・編集 | 店舗名・エリア・ジャンル・説明・画像 |
| ReviewRequest.php       | レビュー投稿・編集   | 評価・コメント                       |
| NotificationRequest.php | お知らせメール送信   | メッセージ種別・カスタムメッセージ   |
| ReservationRequest.php  | 予約作成・変更       | 日付・時間                           |
| LoginRequest.php        | ログイン             | メールアドレス・パスワード           |
| RegisterRequest.php     | ユーザー登録         | 名前・メール・パスワード             |

## バリデーションルール一覧

| ファイル名              | フィールド名   | ルール内容                                                         |
| :---------------------- | :------------- | :----------------------------------------------------------------- |
| ShopRequest.php         | name           | 必須、30 文字以内                                                  |
| ShopRequest.php         | area_id        | 必須                                                               |
| ShopRequest.php         | genre_id       | 必須                                                               |
| ShopRequest.php         | description    | 必須、1000 文字以内                                                |
| ShopRequest.php         | image          | 新規作成時必須、画像ファイル（jpeg, png, jpg, gif, svg）、2MB 以内 |
| ReviewRequest.php       | rating         | 必須                                                               |
| ReviewRequest.php       | comment        | 必須、1000 文字以内                                                |
| NotificationRequest.php | message_type   | 必須、info/reminder/change/cancel のいずれか                       |
| NotificationRequest.php | custom_message | 任意、文字列、500 文字以内                                         |
| ReservationRequest.php  | date           | 必須、明日以降の日付                                               |
| ReservationRequest.php  | time           | 必須                                                               |
| LoginRequest.php        | email          | 必須、メールアドレス形式                                           |
| LoginRequest.php        | password       | 必須、8 文字以上                                                   |
| RegisterRequest.php     | name           | 必須                                                               |
| RegisterRequest.php     | email          | 必須、厳格なメールアドレス形式                                     |
| RegisterRequest.php     | password       | 必須、8 文字以上                                                   |
