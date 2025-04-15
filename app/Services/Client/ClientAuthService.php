<?php

namespace App\Services\Client;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientAuthService
{
    public function register(array $data)
    {
        DB::beginTransaction();

        try {
            // إنشاء المستخدم
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'client',
                'phone' => $data['phone'],
            ]);

            // إنشاء الكارت المرتبط بالمستخدم
            Cart::create([
                'user_id' => $user->id,
            ]);

            DB::commit();

            return $user;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
