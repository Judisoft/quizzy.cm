<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Level;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);//->with('level')->get();
        $user_level = Level::find($user->level)->name;
        return view('users.profile', compact('user', 'user_level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $levels = Level::all();
        return view('users.edit', compact('user', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'telephone' => 'required|max:9',
            'institution' => 'required',
            'level' => 'required',
            'bio' => 'nullable|max:100',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable'
            ],
            [
                'telephone.required'=> 'Telephone is required',
                'telephone.max'=> 'Telephone must not exceed 9 digits',
                'institution.required' => 'Institution is required',
                'level.required' => 'Level is required',
                'bio.max' => 'Bio cannot exceed 100 characters'
            ]);
        if ($validator->fails())
        {
            // return back()->with('error', 'Something went wrong. Please check the form' );
            return back()->withErrors($validator)->withInput($request->all());

        } else {
            
            $user = User::find($id);
            $user->telephone = $request->input('telephone');
            $user->institution = $request->input('institution');
            $user->level = $request->input('level');
            $user->bio = $request->input('bio');
            $user->facebook = $request->input('facebook');
            $user->instagram = $request->input('instagram');
            $user->twitter = $request->input('twitter');

            $user->save();

            return redirect()->route('dashboard')->with('success', 'Profile Updated successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
