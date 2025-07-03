# ロールベースルーティング管理

このプロジェクトでは、ユーザーのロールに応じてルーティングを管理するシステムを実装しています。

## 実装されたロール

1. **admin** - 管理者
2. **owner** - 店舗オーナー
3. **user** - 一般ユーザー
4. **shop** - 店舗（既存）

## ルーティング構造

### 一般公開ルート

- `/` - ホームページ
- `/detail/{id}` - 店舗詳細ページ
- `/done/{message?}` - 完了ページ

### 認証が必要なルート（一般ユーザー）

- `/detail/{id}` (POST) - 予約作成
- `/reservation-change/{id}` - 予約変更ページ
- `/reservation-change/{id}` (POST) - 予約変更処理
- `/review/{id}` - レビューページ
- `/review/{id}` (POST) - レビュー投稿
- `/mypage` - マイページ

### 管理者専用ルート (`/admin`)

- `/admin/dashboard` - 管理者ダッシュボード
- `/admin/shops` - 店舗一覧
- `/admin/shops/create` - 店舗作成
- `/admin/shops/{id}/edit` - 店舗編集
- `/admin/users` - ユーザー一覧
- `/admin/users/{id}/edit` - ユーザー編集
- `/admin/reservations` - 予約一覧
- `/admin/reviews` - レビュー一覧

### 店舗オーナー専用ルート (`/owner`)

- `/owner/dashboard` - オーナーダッシュボード
- `/owner/shops` - 自分の店舗一覧
- `/owner/shops/{id}` - 店舗詳細
- `/owner/shops/{id}/edit` - 店舗編集
- `/owner/reservations` - 予約一覧
- `/owner/reservations/{id}` - 予約詳細
- `/owner/reviews` - レビュー一覧
- `/owner/reviews/{id}` - レビュー詳細

### 複数ロールでアクセス可能なルート (`/management`)

- `/management/analytics` - 分析ページ（管理者・オーナー共通）

## ミドルウェアの使用方法

### 単一ロールチェック

```php
Route::middleware('role:admin')->group(function () {
    // 管理者のみアクセス可能
});
```

### 複数ロールチェック

```php
Route::middleware('role:admin,owner')->group(function () {
    // 管理者またはオーナーがアクセス可能
});
```

### コントローラーでの使用

```php
public function __construct()
{
    $this->middleware('role:admin');
}
```

## モデルの使用方法

### User モデルのロールチェックメソッド

```php
// 特定のロールを持っているかチェック
$user->hasRole('admin');
$user->hasRole('owner');

// 複数のロールのいずれかを持っているかチェック
$user->hasAnyRole(['admin', 'owner']);

// 便利なメソッド
$user->isAdmin();
$user->isOwner();
$user->isUser();
```

### ロールとのリレーション

```php
// ユーザーのロールを取得
$user->role;

// ロールを持つユーザーを取得
$role->users;
```

## セットアップ手順

1. **マイグレーション実行**

   ```bash
   php artisan migrate
   ```

2. **シーダー実行**

   ```bash
   php artisan db:seed
   ```

3. **ユーザーにロールを割り当て**
   ```php
   $user = User::find(1);
   $user->role_id = Role::where('name', 'admin')->first()->id;
   $user->save();
   ```

## 注意事項

- 店舗オーナー機能を使用するには、shops テーブルに`owner_id`フィールドを追加する必要があります
- 既存のユーザーには適切なロールを割り当ててください
- セキュリティのため、ロールチェックは必ずサーバーサイドで行ってください
