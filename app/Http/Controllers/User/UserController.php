<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\HumanName;
use App\Models\User;
use App\Models\Identifier;
use App\Models\ContactPoint;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {

        $permissions = Permission::OrderBy('name')->get();
        return view('users.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $newUser = new User($request->all());

        $newUser->password = bcrypt($newUser->password);
        $newUser->active = 1;
        $newUser->claveunica = 1;

        $newUser->syncPermissions(is_array($request->input('permissions')) ? $request->input('permissions') : array());

        $newUser->save();

        $newHumanName = new HumanName($request->all());
        $newHumanName->user_id = $newUser->id;
        $newHumanName->use = 'official';
        $newHumanName->save();

        $newIdentifier = new Identifier($request->all());
        $newIdentifier->cod_con_identifier_type_id = 1;
        $newIdentifier->value = $request->run;
        $newIdentifier->user_id = $newUser->id;
        $newHumanName->use = 'official';
        $newIdentifier->save();

        $newContactPoint = new ContactPoint();
        $newContactPoint->value = $request->email;
        $newContactPoint->system = 'email';
        $newContactPoint->use = 'work';
        $newContactPoint->user_id = $newUser->id;
        $newContactPoint->save();

        $newContactPoint = new ContactPoint();
        $newContactPoint->value = $request->phone;
        $newContactPoint->system = 'phone';
        $newContactPoint->use = 'work';
        $newContactPoint->user_id = $newUser->id;
        $newContactPoint->save();

        session()->flash('success', 'El usuario ' . $newHumanName->name . ' ha sido creado.');
        return view('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = Permission::OrderBy('name')->get();
        return view('users.edit', compact('user', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        // $user->password = bcrypt($user->password);

        $user->syncPermissions(is_array($request->input('permissions')) ? $request->input('permissions') : array());

        if (
            $user->actualOfficialHumanName->use != $request->human_name_use ||
            $user->actualOfficialHumanName->given != $request->given ||
            $user->actualOfficialHumanName->fathers_family != $request->fathers_family ||
            $user->actualOfficialHumanName->mothers_family != $request->mothers_family
        ) {
            $oldHumanName = HumanName::find($user->actualOfficialHumanName->id);
            $oldHumanName->period_end = now();
            $oldHumanName->save();
            $newHumanName = new HumanName($request->all());
            $newHumanName->use = $request->human_name_use;
            $newHumanName->user_id = $user->id;
            $newHumanName->save();
        }

        if (
            $user->officialEmail != $request->email 
        ) {
            $user->officialContactPointEmail->delete();
            $newContactPoint = new ContactPoint();
            $newContactPoint->system = 'email';
            $newContactPoint->user_id = $user->id;
            $newContactPoint->value = $request->email;
            $newContactPoint->use = 'work';
            $newContactPoint->save();
        }

        if (
            $user->officialPhone != $request->phone 
        ) {
            $user->officialContactPointPhone->delete();
            $newContactPoint = new ContactPoint();
            $newContactPoint->system = 'phone';
            $newContactPoint->user_id = $user->id;
            $newContactPoint->value = $request->phone;
            $newContactPoint->use = 'work';
            $newContactPoint->save();
        }

        $user->save();

        session()->flash('success', 'El usuario ' . $user->name . ' ha sido actualizado.');

        return redirect()->back();
    }

    public function searchByName(Request $request)
    {
        $term = $request->get('term');

        $querys = HumanName::where('text', 'LIKE', '%' . $term . '%')
            ->orwhere('fathers_family', 'LIKE', '%' . $term . '%')
            ->orwhere('mothers_family', 'LIKE', '%' . $term . '%')
            ->get();

        $data = [];

        foreach ($querys as $query) {
            $data[] = [
                'label' => $query->text . " " . $query->fathers_family . " " . $query->mothers_family,
                'id' => $query->user_id
            ];
        }

        return $data;
    }
}
