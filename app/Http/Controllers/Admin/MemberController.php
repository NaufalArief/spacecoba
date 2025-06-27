<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::latest('npm')->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|integer|unique:member,npm',
            'nama' => 'required|string|max:255',
            'quotes' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'qr' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'role' => 'required|string|max:20',
        ]);

        $data = $request->only(['npm', 'nama', 'quotes', 'role']);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('members/photos', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('qr')) {
            $path = $request->file('qr')->store('members/qrs', 'public');
            $data['qr'] = $path;
        }

        Member::create($data);

        return redirect()->route('admin.members.index')->with('success', 'Member created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'quotes' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'qr' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'role' => 'required|string|max:20',
        ]);

        $data = $request->only(['nama', 'quotes', 'role']);

        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $path = $request->file('photo')->store('members/photos', 'public');
            $data['photo'] = $path;
        }

        if ($request->hasFile('qr')) {
            // Delete old qr if it exists
            if ($member->qr) {
                Storage::disk('public')->delete($member->qr);
            }
            $path = $request->file('qr')->store('members/qrs', 'public');
            $data['qr'] = $path;
        }

        $member->update($data);

        return redirect()->route('admin.members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        // Delete files from storage first
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        if ($member->qr) {
            Storage::disk('public')->delete($member->qr);
        }

        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member deleted successfully.');
    }
}
