<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresettingsRequest;
use App\Http\Requests\UpdatesettingsRequest;
use App\Models\settings;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $settings = settings::first(); 
        return view('smedan.settings', compact('settings'));
    }

    public function enableLogin(){
        $settings = settings::first(); 
        $settings->update(['staff_login'=>1]);

        return redirect()->route('settings')->with('success','Staff login has been enabled');
    }
    public function disableLogin(){
        $settings = settings::first(); 
        $settings->update(['staff_login'=>0]);

        return redirect()->route('settings')->with('success','Staff login has been disabled');
    }

    public function enableVisitation(){
        $settings = settings::first(); 
        $settings->update(['allow_visitation'=>1]);

        return redirect()->route('settings')->with('success','Business visitation review has been enabled');
    }
    public function disableVisitation(){
        $settings = settings::first(); 
        $settings->update(['allow_visitation'=>0]);

        return redirect()->route('settings')->with('success','Business visitation review has been disabled');
    }


    public function enableReview(){
        $settings = settings::first(); 
        $settings->update(['plan_approval'=>1]);

        return redirect()->route('settings')->with('success','Business plan review has been enabled');
    }
    public function disableReview(){
        $settings = settings::first(); 
        $settings->update(['plan_approval'=>0]);

        return redirect()->route('settings')->with('success','Business plan review has been disabled');
    }


    public function enableRegistration(){
        $settings = settings::first(); 
        $settings->update(['staff_registration'=>1]);

        return redirect()->route('settings')->with('success','Staff Registration has been enabled');
    }
    public function disableRegistration(){
        $settings = settings::first(); 
        $settings->update(['staff_registration'=>0]);

        return redirect()->route('settings')->with('success','Staff Registration has been enabled');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresettingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesettingsRequest $request, settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(settings $settings)
    {
        //
    }
}
