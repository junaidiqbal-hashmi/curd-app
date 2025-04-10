<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Users';
        $page_title = 'Users';
        $users=User::all();
        return view('users.list', compact('users', 'title', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Users';
        $page_title = 'Users';
        return view('users.create', compact('title', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|unique:users|max:255',
            'phone' => 'string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            } else {
                return redirect()->back()
                    ->withErrors($validator->errors())
                    ->withInput();
            }
        }
        if ($request->hasFile('profile_picture')) {
            $fileName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/profile_pictures'), $fileName);
        } else {
            $fileName = 'default.png'; // Set a default image if no upload
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id ?? 3,
            'epo_id' => $request->epo_id,
            'district' => $request->district,
            'password' => Hash::make($request->password),
            'cnic' => $request->cnic,
            'phone' => $request->phone,
            'license_no' => $request->license_no,
            'address' => $request->address,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'profile_picture' => $fileName,
        ]);

        if ($request->expectsJson()) {
            return response()->json(
                [
                    'user' => $user
                ],
                200
            );
        }
        return redirect('user');
    } catch (ValidationException $e) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } else {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        }
    } catch (QueryException $e) {
        if ($request->expectsJson()) {
            return response()->json(
                [
                    'error' => 'Database error',
                    'errors' => $e->getMessage()
                ],
                500
            );
        } else {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        }
    } catch (Exception $e) {
        if ($request->expectsJson()) {
            return response()->json(
                [
                    'error' => 'An unexpected error occurred',
                    'errors' => $e->getMessage()
                ],
                500
            );
        } else {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        }
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
