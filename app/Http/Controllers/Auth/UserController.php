<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // 設定全部UserController皆使用auth中介層
    }

    public function modifyUser()
    {
        return view('auth.modify-user', ['hint' => '0']);  // 回傳修改會員資料介面，設定'hint'為0，代表不須顯示任何提示資訊在網頁中
    }

    public function modifyUserData(Request $data)
    {
        $user = User::findOrFail($data['id']);
        if (!(Hash::check($data['password'], $user->password)))  // 如果密碼錯誤
            return view('auth.modify-user', ['hint' => '2']);  // 設置 'hint'為2代表網頁中提示密碼錯誤訊息
        else {  // 密碼正確及更新
            $update_data = [
                'name' => $data['name'],
                'sex' => $data['sex'],
                'telephone' => $data['telephone'],
                'birthday' => $data['birthday'],
                'memo' => $data['memo']
            ];
            $user->update($update_data);
        };
        return view('auth.modify-user', ['hint', '1']);
    }

    public function modifyUserPwd()
    {
        return view('auth.modify-pwd', ['hint', '0']);  // 回傳修改會員資料的網頁介面
    }

    public function modifyUserPwdData(Request $data)
    {
        $user = User::findOrFail($data['id']);  // 找到要更改會員id
        if (!(Hash::check($data['password-old'], $user->password)))  // 確認密碼是否正確才給予修改
            return view('auth.modify-pwd', ['hint' => '2']);
        else {
            if ($data['password-new'] === $data['password-conf']) {
                $update_data = [
                    'password' => Hash::make($data['password-new']),  // 對新密碼進行雜湊
                ];
                $user->update($update_data);
                return view('auth.modify-pwd', ['hint', '1']);  // 'hint'為'1'提示密碼修改完成
            } else {
                return view('auth.modify-pwd', ['hint', '3']);  // 'hint'為'3'提示確認密碼不符訊息
            }
        }
    }

    public function deleteUser()
    {
        return view('auth.delete-user', ['hint' => '0']);  // 回傳刪除會員的網頁
    }

    public function deleteUserData(Request $data)
    {
        $user = User::findOrFail($data['id']);
        if (!(Hash::check($data['password'], $user->password))) {
            return view('auth.delete-user', ['hint' => '2']);
        } else {
            $user->delete();
            return view('auth.delete-user', ['hint', '1']);
        }
    }
}
