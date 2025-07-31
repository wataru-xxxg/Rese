<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attributeを承認してください。',
    'accepted_if' => ':otherが:valueの場合、:attributeを承認してください。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeは:dateより後の日付である必要があります。',
    'after_or_equal' => ':attributeは:date以降の日付である必要があります。',
    'alpha' => ':attributeは文字のみを含む必要があります。',
    'alpha_dash' => ':attributeは文字、数字、ダッシュ、アンダースコアのみを含む必要があります。',
    'alpha_num' => ':attributeは文字と数字のみを含む必要があります。',
    'array' => ':attributeは配列である必要があります。',
    'before' => ':attributeは:dateより前の日付である必要があります。',
    'before_or_equal' => ':attributeは:date以前の日付である必要があります。',
    'between' => [
        'numeric' => ':attributeは:minから:maxの間である必要があります。',
        'file' => ':attributeは:minから:maxキロバイトの間である必要があります。',
        'string' => ':attributeは:minから:max文字の間である必要があります。',
        'array' => ':attributeは:minから:max個のアイテムを含む必要があります。',
    ],
    'boolean' => ':attributeフィールドはtrueまたはfalseである必要があります。',
    'confirmed' => ':attributeの確認が一致しません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと等しい日付である必要があります。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'declined' => ':attributeは拒否される必要があります。',
    'declined_if' => ':otherが:valueの場合、:attributeは拒否される必要があります。',
    'different' => ':attributeと:otherは異なる必要があります。',
    'digits' => ':attributeは:digits桁である必要があります。',
    'digits_between' => ':attributeは:minから:max桁の間である必要があります。',
    'dimensions' => ':attributeは無効な画像サイズです。',
    'distinct' => ':attributeフィールドに重複した値があります。',
    'email' => ':attributeは有効なメールアドレスである必要があります。',
    'ends_with' => ':attributeは以下のいずれかで終わる必要があります: :values',
    'enum' => '選択された:attributeは無効です。',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルである必要があります。',
    'filled' => ':attributeフィールドには値が必要です。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きい必要があります。',
        'file' => ':attributeは:valueキロバイトより大きい必要があります。',
        'string' => ':attributeは:value文字より大きい必要があります。',
        'array' => ':attributeは:value個以上のアイテムを含む必要があります。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上である必要があります。',
        'file' => ':attributeは:valueキロバイト以上である必要があります。',
        'string' => ':attributeは:value文字以上である必要があります。',
        'array' => ':attributeは:value個以上のアイテムを含む必要があります。',
    ],
    'image' => ':attributeは画像である必要があります。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeフィールドは:otherに存在しません。',
    'integer' => ':attributeは整数である必要があります。',
    'ip' => ':attributeは有効なIPアドレスである必要があります。',
    'ipv4' => ':attributeは有効なIPv4アドレスである必要があります。',
    'ipv6' => ':attributeは有効なIPv6アドレスである必要があります。',
    'json' => ':attributeは有効なJSON文字列である必要があります。',
    'lt' => [
        'numeric' => ':attributeは:valueより小さい必要があります。',
        'file' => ':attributeは:valueキロバイトより小さい必要があります。',
        'string' => ':attributeは:value文字より小さい必要があります。',
        'array' => ':attributeは:value個未満のアイテムを含む必要があります。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下である必要があります。',
        'file' => ':attributeは:valueキロバイト以下である必要があります。',
        'string' => ':attributeは:value文字以下である必要があります。',
        'array' => ':attributeは:value個以下のアイテムを含む必要があります。',
    ],
    'mac_address' => ':attributeは有効なMACアドレスである必要があります。',
    'max' => [
        'numeric' => ':attributeは:max以下である必要があります。',
        'file' => ':attributeは:maxキロバイト以下である必要があります。',
        'string' => ':attributeは:max文字以下である必要があります。',
        'array' => ':attributeは:max個以下のアイテムを含む必要があります。',
    ],
    'mimes' => ':attributeは以下のタイプのファイルである必要があります: :values',
    'mimetypes' => ':attributeは以下のタイプのファイルである必要があります: :values',
    'min' => [
        'numeric' => ':attributeは:min以上である必要があります。',
        'file' => ':attributeは:minキロバイト以上である必要があります。',
        'string' => ':attributeは:min文字以上である必要があります。',
        'array' => ':attributeは:min個以上のアイテムを含む必要があります。',
    ],
    'multiple_of' => ':attributeは:valueの倍数である必要があります。',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数値である必要があります。',
    'password' => 'パスワードが正しくありません。',
    'present' => ':attributeフィールドが存在する必要があります。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeフィールドは禁止されています。',
    'prohibited_unless' => ':otherが:valuesに含まれない限り、:attributeフィールドは禁止されています。',
    'prohibits' => ':attributeフィールドは:otherの存在を禁止しています。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeフィールドは必須です。',
    'required_array_keys' => ':attributeフィールドには以下のエントリが含まれる必要があります: :values',
    'required_if' => ':otherが:valueの場合、:attributeフィールドは必須です。',
    'required_unless' => ':otherが:valuesに含まれない限り、:attributeフィールドは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_with_all' => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeフィールドは必須です。',
    'required_without_all' => ':valuesが存在しない場合、:attributeフィールドは必須です。',
    'same' => ':attributeと:otherは一致する必要があります。',
    'size' => [
        'numeric' => ':attributeは:sizeである必要があります。',
        'file' => ':attributeは:sizeキロバイトである必要があります。',
        'string' => ':attributeは:size文字である必要があります。',
        'array' => ':attributeは:size個のアイテムを含む必要があります。',
    ],
    'starts_with' => ':attributeは以下のいずれかで始まる必要があります: :values',
    'string' => ':attributeは文字列である必要があります。',
    'timezone' => ':attributeは有効なタイムゾーンである必要があります。',
    'unique' => ':attributeは既に使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは有効なURLである必要があります。',
    'uuid' => ':attributeは有効なUUIDである必要があります。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'current_password' => '現在のパスワード',
        'phone' => '電話番号',
        'address' => '住所',
        'city' => '市区町村',
        'state' => '都道府県',
        'zip' => '郵便番号',
        'country' => '国',
        'title' => 'タイトル',
        'content' => '内容',
        'description' => '説明',
        'price' => '価格',
        'quantity' => '数量',
        'image' => '画像',
        'file' => 'ファイル',
        'url' => 'URL',
        'username' => 'ユーザー名',
        'first_name' => '名',
        'last_name' => '姓',
        'middle_name' => 'ミドルネーム',
        'birth_date' => '生年月日',
        'gender' => '性別',
        'company' => '会社名',
        'position' => '役職',
        'department' => '部署',
        'website' => 'ウェブサイト',
        'bio' => '自己紹介',
        'avatar' => 'アバター',
        'remember' => 'ログイン情報を記憶する',
        'terms' => '利用規約',
        'privacy' => 'プライバシーポリシー',
    ],

];
