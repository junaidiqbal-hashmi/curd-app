<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Users';
        $page_title = 'Users';
        $users = User::with('role')->get(); # $users=User::all();
        // dd($users);
        return view('users.list', compact('users', 'title', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Users';
        $page_title = 'Users';
        $roles = Role::all(); # Added this
        return view('users.create', compact('title', 'page_title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        try {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|unique:users|max:255',
            'phone' => 'string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id', // added
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
            // 'epo_id' => $request->epo_id,
            // 'district' => $request->district,
            'password' => Hash::make($request->password),
            // 'cnic' => $request->cnic,
            'phone' => $request->phone,
            // 'license_no' => $request->license_no,
            // 'address' => $request->address,
            // 'otp_expires_at' => Carbon::now()->addMinutes(10),
            // 'profile_picture' => $fileName,
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
                ->withErrors(['database' => 'A database error occurred: ' . $e->getMessage()])   #($e->errors())
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
                ->withErrors(['unexpected' => 'Something went wrong: ' . $e->getMessage()]) #($e->errors())
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
    
            // Validation
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
                'phone' => 'string|max:255|unique:users,phone,' . $id,
                'role_id' => 'required|exists:roles,id',
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
    
            // Update fields
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role_id = $request->role_id;
    
            $user->save();
    
            if ($request->expectsJson()) {
                return response()->json(['user' => $user], 200);
            }
    
            return redirect()->route('user.index')->with('success', 'User updated successfully.');
        } catch (ValidationException $e) {
            return $this->handleValidationException($e, $request);
        } catch (QueryException $e) {
            return $this->handleQueryException($e, $request);
        } catch (Exception $e) {
            return $this->handleGenericException($e, $request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
