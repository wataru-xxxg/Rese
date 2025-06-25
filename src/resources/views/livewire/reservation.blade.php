<div>
    <form action="{{ route('reservation', $shop->id) }}" method="post" id="reservation-form">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">

        <div class="form-group">
            <input type="date" value="{{ date('Y/m/d') }}" class="date-input" name="date" wire:model="date">
        </div>

        <div class="form-group">
            <select class="form-input" name="time" wire:model="time">
                <option>17:00</option>
                <option>17:30</option>
                <option>18:00</option>
                <option>18:30</option>
                <option>19:00</option>
                <option>19:30</option>
                <option>20:00</option>
                <option>20:30</option>
                <option>21:00</option>
                <option>21:30</option>
            </select>
        </div>

        <div class="form-group">
            <select class="form-input" name="number" wire:model="number">
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
                <option value="5">5人</option>
                <option value="6">6人</option>
                <option value="7">7人</option>
                <option value="8">8人</option>
                <option value="9">9人</option>
                <option value="10">10人</option>
            </select>
        </div>

        <div class="reservation-summary">
            <div class="summary-row">
                <span class="shop-label">Shop</span>
                <span class="value">{{ $shop->name }}</span>
            </div>
            <div class="summary-row">
                <span class="date-label">Date</span>
                <span class="value">{{ $date }}</span>
            </div>
            <div class="summary-row">
                <span class="time-label">Time</span>
                <span class="value">{{ $time }}</span>
            </div>
            <div class="summary-row">
                <span class="number-label">Number</span>
                <span class="value">{{ $number }}人</span>
            </div>
        </div>
    </form>
</div>