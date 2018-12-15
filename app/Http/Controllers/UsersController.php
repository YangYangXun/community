<?php

namespace App\Http\Controllers;

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

}
