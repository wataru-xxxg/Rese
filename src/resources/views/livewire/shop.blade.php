<div>
    <div class="container">
        <section class="left-section">
            <header class="header">
                @include('components.menu')
                <div class="header-container">
                    <div class="logo">
                        <a class="menu-button" href="#modal-menu">
                            <img src="{{ asset('logo.png') }}" alt="ロゴ画像" class="logo-icon">
                        </a>
                        <h1 class="logo-text"><a class="logo-link" href="{{ route('index') }}">Rese</a></h1>
                    </div>
                </div>
            </header>

            <div class="restaurant-info">
                <a href="{{ route('owner.mypage') }}" class="back-button">
                    <span class="back-button-icon">&lt;</span>
                    <span>{{ $name }}</span>
                </a>

                <div class="image-container">
                    <img src="
    @if ($image)
    {{ $image->temporaryUrl() }}
    @elseif ($shop)
    @if(str_starts_with($shop->image_path, 'image/')){{ Storage::url($shop->image_path) }}@else{{ Storage::disk('s3')->url($shop->image_path) }}@endif
    @endif
    " alt="イメージ画像" class="restaurant-image">
                </div>

                <div class="tags">
                    <span class="tag">#{{ $areaName }}</span>
                    <span class="tag">#{{ $genreName }}</span>
                </div>

                <div class="description">
                    <p>{{ $description }}</p>
                </div>

                <div class="reviews-section">
                    <h3 class="reviews-title">レビュー</h3>
                    <p class="no-reviews">まだレビューがありません。</p>
                </div>
            </div>
        </section>
        <section class="right-section">
            <div class="reservation-form">
                <h2 class="reservation-title">編集</h2>

                <form action="@isset($shop)
                {{ route('owner.shops.update', $shop->id) }}
                @else
                {{ route('owner.shops.store') }}
                @endif" method="post" id="shop-form" enctype="multipart/form-data">
                    @csrf
                    @isset($shop)
                    @method('PUT')
                    <input type="hidden" name="create_flag" value="0">
                    @else
                    <input type="hidden" name="create_flag" value="1">
                    @endif

                    @error('name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                        <input type="text" class="form-input" name="name" placeholder="name" wire:model="name">
                    </div>

                    @error('image')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                        <input type="file" name="image" class="image-select-button" wire:model="image">
                    </div>

                    @error('area_id')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                        <select class="form-input" name="area_id" wire:model="area_id">
                            <option selected value="">area</option>
                            @foreach ($areas as $area)
                            <option value="{{ $area->id }}" @if(old('area_id')==$area->id) selected @endif>{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('genre_id')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                        <select class="form-input" name="genre_id" wire:model="genre_id">
                            <option selected value="">genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @if(old('genre_id')==$genre->id) selected @endif>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('description')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                        <textarea class="form-textarea" name="description" placeholder="description" wire:model="description" value="{{ old('description') }}"></textarea>
                    </div>
                </form>
            </div>

            @isset($shop)
            <button form="shop-form" type="submit" class="update-button">更新する</button>
            @else
            <button form="shop-form" type="submit" class="create-button">作成する</button>
            @endif
        </section>
    </div>
</div>