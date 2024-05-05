<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function userIndex(): View
    {
        $currentUserId = Auth::id();
        $users         = User::where('id', '!=', $currentUserId)->get();

        return view('admin.userIndex', [
            'users' => $users,
        ]);
    }

    public function deleteIndex(): View
    {
        $teams = Team::all();

        return view('admin.deleteIndex', [
            'teams' => $teams,
        ]);
    }
    public function destroy($teamId)
    {
        $team = Team::findOrFail($teamId);
        $team->delete();

        return redirect('/delete/admin')->with('success', 'Team successfully deleted.');
    }

}
