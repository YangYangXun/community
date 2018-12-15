<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    // 對應於 Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    public function show(User $user)
    {
        // Laravel 會自動解析定義在 Controller 方法中的 Eloquent 型別宣告
        // 變數名稱 $user 會對應到路由名稱中的 {user}
        // 這樣一來，Laravel 會自動注入與請求 URI 中傳入的 ID 對應的用戶模型實體
        // 此功能稱作 < 隱性路由模型綁定 > 是設計模式:「 約定優於配置 」的實現
        return view('users.show', compact('user'));
    }

}
