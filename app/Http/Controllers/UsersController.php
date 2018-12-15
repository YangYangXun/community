<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    // ������ Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    public function show(User $user)
    {
        // Laravel �|�۰ʸѪR�w�q�b Controller ��k���� Eloquent ���O�ŧi
        // �ܼƦW�� $user �|��������ѦW�٤��� {user}
        // �o�ˤ@�ӡALaravel �|�۰ʪ`�J�P�ШD URI ���ǤJ�� ID �������Τ�ҫ�����
        // ���\��٧@ < ���ʸ��Ѽҫ��j�w > �O�]�p�Ҧ�:�u ���w�u��t�m �v����{
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * update
     *
     * @param UserRequest $request �u���{�ҳq�L�~�|���� update() ������k�A�_�h�ߥX���`�í��w�V��W�@����
     * @param User $user
     * @return void
     * �����Q��
     * ���ШD����: Laravel �B�z���ШD���ҥD�n����ؤ覡
     * 1. �ϥ� FormRequest -> ����
     * 2. ��u�ե� validator
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '�ӤH��Ƨ�s���\!');
    }

}
