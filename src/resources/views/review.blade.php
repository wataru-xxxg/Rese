@extends('layouts.detail')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
<link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
@endsection

@section('livewire')
@livewireStyles
@endsection

@section('right-section')
<div class="reservation-form">
    <h2 class="reservation-title">レビュー</h2>

    <form action="{{ route('review', $reservation->id) }}" method="post" id="review-form">
        @csrf

        <div class="reservation-summary">
            <div class="summary-row">
                <span class="shop-label">Shop</span>
                <span class="value">{{ $reservation->shop->name }}</span>
            </div>
            <div class="summary-row">
                <span class="date-label">Date</span>
                <span class="value">{{ date('Y-m-d', strtotime($reservation->date)) }}</span>
            </div>
            <div class="summary-row">
                <span class="time-label">Time</span>
                <span class="value">{{ $reservation->time }}</span>
            </div>
            <div class="summary-row">
                <span class="number-label">Number</span>
                <span class="value">{{ $reservation->number }}人</span>
            </div>
        </div>

        <div class="review-section">
            <div class="rating-section">
                <label for="rating" class="rating-label">評価</label>
                @if($reservation->date < date('Y-m-d'))
                    <div class="star-rating">
                    <input type="radio" name="rating" value="5" id="star5" class="star-input" @if(old('rating') == 5) checked @elseif($existingReview && $existingReview->rating == 5) checked @endif>
                    <label for="star5" class="star-label">★</label>
                    <input type="radio" name="rating" value="4" id="star4" class="star-input" @if(old('rating') == 4) checked @elseif($existingReview && $existingReview->rating == 4) checked @endif>
                    <label for="star4" class="star-label">★</label>
                    <input type="radio" name="rating" value="3" id="star3" class="star-input" @if(old('rating') == 3) checked @elseif($existingReview && $existingReview->rating == 3) checked @endif>
                    <label for="star3" class="star-label">★</label>
                    <input type="radio" name="rating" value="2" id="star2" class="star-input" @if(old('rating') == 2) checked @elseif($existingReview && $existingReview->rating == 2) checked @endif>
                    <label for="star2" class="star-label">★</label>
                    <input type="radio" name="rating" value="1" id="star1" class="star-input" @if(old('rating') == 1) checked @elseif($existingReview && $existingReview->rating == 1) checked @endif>
                    <label for="star1" class="star-label">★</label>
            </div>
            @endif
            @error('rating')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="comment-section">
            <label for="comment" class="comment-label">コメント</label>
            @if($reservation->date < date('Y-m-d'))
                <textarea name="comment" id="comment" class="comment-textarea" placeholder="お店の感想を教えてください" rows="5">@if(old('comment')) {{ old('comment') }} @elseif($existingReview) {{ $existingReview->comment }} @endif</textarea>
                @endif
                @error('comment')
                <span class="error-message">{{ $message }}</span>
                @enderror
        </div>
</div>
</form>
</div>

@if($reservation->date < date('Y-m-d'))
    <button form="review-form" type="submit" class="reserve-button">{{ $existingReview ? '更新する' : '投稿する' }}</button>
    @else
    <p>レビューは過去の予約に対してのみ投稿できます。</p>
    @endif
    @endsection