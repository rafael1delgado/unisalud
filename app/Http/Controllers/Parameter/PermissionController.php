<?php

namespace App\Http\Controllers\Parameter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::OrderBy('name')->get();
        return view('parameters.permissions.index', compact('permissions'));
    }

    public function create() {
        return view('parameters.permissions.create');
    }

    public function store(Request $request) {
        $permission = new Permission($request->All());
        $permission->save();

        return redirect()->route('parameter.permission.index');
    }

    public function edit(Permission $permission) {
        return view('parameters.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission) {
        $permission->fill($request->all());
        $permission->save();
        session()->flash('success', 'Permiso: '.$permission->name.' ha sido actualizado.');

        return redirect()->route('parameter.permission.index');
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        session()->flash('success', 'Permiso: '.$permission->name.' ha sido eliminado.');

        return redirect()->route('parameter.permission.index');
    }
}
