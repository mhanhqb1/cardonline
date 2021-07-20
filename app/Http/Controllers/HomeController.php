<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Theme;

class HomeController extends Controller
{
    /**
     * Show user backend dashboard
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('users.admin_dashboard', compact(
            'user'
        ));
    }

    /**
     * Show user theme
     *
     * @return \Illuminate\View\View
     */
    public function userTheme()
    {
        $user = Auth::user();
        $themes = Theme::get();
        return view('users.admin_theme', compact(
            'user',
            'themes'
        ));
    }

    /**
     * Update user info
     *
     * @return \Illuminate\View\View
     */
    public function updateInfo(Request $request)
    {
        $result = [
            'status' => 'OK',
            'data' => ''
        ];
        $user = Auth::user();
        $u = User::find($user->id);
        $um = new User();
        $fields = $um->getFillable();
        $params = $request->all();
        foreach ($params as $k => $v) {
            if (in_array($k, $fields)) {
                $u->$k = $v;
            }
        }
        $u->save();
        echo json_encode($result);
        die();
    }

    /**
     * Get user info
     *
     * @return \Illuminate\View\View
     */
    public function userInfo($userName)
    {
        $user = User::where('user_name', $userName)->first();
        if (!empty($user)) {
            return view('users.temp_1', compact(
                'user'
            ));
        }
        return abort(404);
    }
}
