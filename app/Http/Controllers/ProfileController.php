<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Activity;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show', [
            'profileUser' => $user,
            //'activities' => $this->getActivity($user)
            'activities' => Activity::feed($user)
        ]);
    }
}
