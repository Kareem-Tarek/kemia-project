<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::get();
        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', 'active')->get();
        return view('dashboard.settings.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting              = new Setting();

        $setting->phone     = $request->phone;
        $setting->phone2    = $request->phone2;
        $setting->email     = $request->email;
        $setting->whatsApp  = $request->whatsApp;
        $setting->facebook  = $request->facebook;
        $setting->twitter   = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->user_id   = $request->user_id;


        $setting->setTranslation('title', 'en', $request->title_en)
            ->setTranslation('title', 'ar', $request->title_ar);

        $setting->setTranslation('description', 'en', $request->description_en)
            ->setTranslation('description', 'ar', $request->description_ar);

        $setting->setTranslation('short_description', 'en', $request->short_description_en)
            ->setTranslation('short_description', 'ar', $request->short_description_ar);

        $setting->save();

        return redirect()->route('settings.index')
            ->with('success', __('master.messages_save'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        $users   = User::get();
        return view('dashboard.settings.edit', compact('setting', 'users'));
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
        $setting            = Setting::findOrFail($id);

        $setting->phone     = $request->phone;
        $setting->phone2    = $request->phone2;
        $setting->email     = $request->email;
        $setting->whatsApp  = $request->whatsApp;
        $setting->facebook  = $request->facebook;
        $setting->twitter   = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->user_id   = $request->user_id;


        $setting->setTranslation('title', 'en', $request->title_en)
            ->setTranslation('title', 'ar', $request->title_ar);

        $setting->setTranslation('description', 'en', $request->description_en)
            ->setTranslation('description', 'ar', $request->description_ar);

        $setting->setTranslation('short_description', 'en', $request->short_description_en)
            ->setTranslation('short_description', 'ar', $request->short_description_ar);

        $setting->save();

        return redirect()->route('settings.index')
            ->with('success', __('master.messages_edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::FindOrFail($id);
        $setting->delete();
        return redirect()->back()
            ->with('success', __('master.messages_delete'));
    }

    public function delete()
    {
        $settings = Setting::orderBy('created_at', 'asc')->onlyTrashed()->paginate(30);

        return view('dashboard.settings.delete', compact('settings'));
    }

    public function restore($id)
    {
        Setting::withTrashed()->find($id)->restore();
        $settings = Setting::findOrFail($id);
        return redirect()->route('settings.delete')
            ->with('success', __('master.messages_restore'));
    }

    public function forceDelete($id)
    {
        Setting::where('id', $id)->forceDelete();
        return redirect()->route('settings.delete')
            ->with('success', __('master.messages_permanent_delete'));
    }
}
