<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;

class EmailVerificationController extends Controller
{
    /**
     * メール認証の通知ページを表示
     */
    public function show()
    {
        return view('auth.verify-email');
    }

    /**
     * メール認証を実行
     */
    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('done', ['message' => 'メールアドレスは既に認証済みです']);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->route('done', ['message' => 'メールアドレスの認証が完了しました']);
    }

    /**
     * 認証メールを再送信
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return back()->with('message', 'メールアドレスは既に認証済みです。');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', '認証メールを再送信しました。');
    }
}
