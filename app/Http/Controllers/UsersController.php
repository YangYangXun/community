<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    // ¹ïÀ³©ó Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    public function show(User $user)
    {
        // Laravel ·|¦Û°Ê¸ÑªR©w¸q¦b Controller ¤èªk¤¤ªº Eloquent «¬§O«Å§i
        // ÅÜ¼Æ¦WºÙ $user ·|¹ïÀ³¨ì¸ô¥Ñ¦WºÙ¤¤ªº {user}
        // ³o¼Ë¤@¨Ó¡ALaravel ·|¦Û°Êª`¤J»P½Ð¨D URI ¤¤¶Ç¤Jªº ID ¹ïÀ³ªº¥Î¤á¼Ò«¬¹êÅé
        // ¦¹¥\¯àºÙ§@ < Áô©Ê¸ô¥Ñ¼Ò«¬¸j©w > ¬O³]­p¼Ò¦¡:¡u ¬ù©wÀu©ó°t¸m ¡vªº¹ê²{
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * update
     *
     * @param UserRequest $request ¥u¦³»{ÃÒ³q¹L¤~·|°õ¦æ update() ¤ºªº¤èªk¡A§_«h©ß¥X²§±`¨Ã­«©w¦V¨ì¤W¤@­¶­±
     * @param User $user
     * @return void
     * ¬ÛÃö°Q½×
     * ªí³æ½Ð¨DÅçÃÒ: Laravel ³B²zªí³æ½Ð¨DÅçÃÒ¥D­n¦³¨âºØ¤è¦¡
     * 1. ¨Ï¥Î FormRequest -> ±ÀÂË
     * 2. ¤â¤u½Õ¥Î validator
     */
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', 'ŸÄ¤H?®Æ§ó·s¦¨¥\¡I');
    }

}
