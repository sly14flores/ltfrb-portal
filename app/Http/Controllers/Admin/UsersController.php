<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class UsersController extends Controller
{
    private $user;
    private $role;


    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $all_users = $this->user->latest()->get();
        $all_roles = $this->showRoles();

        $admin = User::ADMIN_ROLE_ID;
        $tech = User::TECH_ROLE_ID;
        $record = User::RECORDS_ROLE_ID;
        $client = User::CLIENT_ROLE_ID;

        return view('admin.users.index')->with('all_users', $all_users)
                                ->with('all_roles', $all_roles)
                                ->with('admin', $admin)
                                ->with('tech', $tech)
                                ->with('record', $record)
                                ->with('client', $client);
    }

    public function destroy($id)
    {
        $this->user->destroy($id);

        return back();
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        $user->role_id = $request->roles;

        $user->save();
        
        return back();
    }

    public function showRoles()
    {
        $all_roles = $this->role->all();

        return $all_roles;
    }
}
