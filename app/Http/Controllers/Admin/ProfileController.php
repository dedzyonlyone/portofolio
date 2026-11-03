<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function create()
    {
        if (Profile::count() > 0) {
            return redirect()->route('admin.profile.index')->with('success', 'Profil sudah ada, tinggal edit aja.');
        }
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'about' => 'required',
            'kelebihan' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'about', 'kelebihan']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Profile::create($data);
        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil dibuat!');
    }

    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'about' => 'required',
            'kelebihan' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'about', 'kelebihan']);

        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $profile->update($data);
        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diupdate!');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->photo) {
            Storage::disk('public')->delete($profile->photo);
        }
        $profile->delete();
        return redirect()->route('admin.profile.index')->with('success', 'Profil dihapus!');
    }
}