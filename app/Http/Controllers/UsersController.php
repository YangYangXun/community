<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * update
     *
     * @param UserRequest $request 只有認證通過才會執行 update() 內的方法，否則拋出異常並重定向到上一頁面
     * @param User $user
     * @return void
     * 相關討論
     * 表單請求驗證: Laravel 處理表單請求驗證主要有兩種方式
     * 1. 使用 FormRequest -> 推薦
     * 2. 手工調用 validator
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '個人資料更新成功!');
    }

}
