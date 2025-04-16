<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cart;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Mail;

class ClientAuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the     request data
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6',
            'phone'      => 'required|string|unique:users,phone',
            'country_id' => 'required',
        ]);
        $validated['role'] = 'client';
        $validated['country_id'] = 1;
    
        DB::beginTransaction();
    
        try {
            // Create the user
            $user = User::create([
                'name'       => $validated['name'],
                'email'      => $validated['email'],
                'password'   => Hash::make($validated['password']),
                'role'       => 'client',
                'phone'      => $validated['phone'],
                'country_id' => $validated['country_id'],
            ]);
    
            // Create the cart linked to the user
            Cart::create([
                'user_id' => $user->id,
            ]);
    
            // Queue the registration email (non-blocking)
            Mail::to($user->email)->queue(new RegistrationSuccessMail($user));
    
            DB::commit();
    
            return response()->json([
                'message' => 'Client registered successfully with cart.',
                'user'    => $user,
            ], 201);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Registration failed.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
