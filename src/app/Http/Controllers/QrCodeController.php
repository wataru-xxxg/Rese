<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    /**
     * QRコードを画像として返す
     */
    public function generate(Request $request)
    {
        $data = $request->get('data', 'https://example.com');

        $qrCode = QrCode::size(300)
            ->format('svg')
            ->generate($data);

        return response($qrCode)
            ->header('Content-Type', 'image/svg+xml');
    }

    /**
     * 予約用QRコードを表示
     */
    public function reservationQrCode($reservationId)
    {
        // 予約情報を取得
        $reservation = \App\Models\Reservation::findOrFail($reservationId);

        // QRコードに含めるデータ（予約情報）
        $data = json_encode([
            'reservation_id' => $reservation->id,
            'shop_name' => $reservation->shop->name,
            'date' => $reservation->date,
            'time' => $reservation->time,
            'number' => $reservation->number,
            'user_name' => $reservation->user->name
        ]);

        $qrCode = QrCode::size(200)
            ->format('svg')
            ->generate($data);

        return view('qrcode.reservation', compact('qrCode', 'reservation'));
    }
}
