<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\AdminUser;

class GithubLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $adminUser;

    public function __construct(AdminUser $adminUser)
    {
        $this->middleware('guest:admin')->except('logout');
        $this->adminUser = $adminUser;
    }

    protected function guard()
    {
        return \Auth::guard('admin');
    }

    /**
     * github認証画面に遷移
     *
     * @return void
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * github認証に成功したuserの登録しログインさせる
     *
     * @return void
     */
    public function handleProviderCallback()
    {
        $githubUser = Socialite::with('github')->user();
        $adminUser = $this->adminUser->firstOrCreate([
            'github_id' => $githubUser->id,
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'avatar' => $githubUser->avatar
        ]);

        // if ($adminUser->github_id !== $githubUser->id) {
        //     // 一般user画面にリダイレクト
        // }

        // ログイン
        auth()->login($adminUser);
        return redirect()->to('/admin/home');
    }
}
