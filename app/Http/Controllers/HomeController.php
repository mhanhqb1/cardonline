<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Theme;
use App\Models\UserSocial;

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
        $userSocials = UserSocial::where('user_id', $user->id)->orderBy('position', 'asc')->get();
        return view('users.admin_dashboard', compact(
            'user',
            'userSocials'
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
     * Update user social info
     *
     * @return \Illuminate\View\View
     */
    public function updateSocials(Request $request)
    {
        $result = [
            'status' => 'OK',
            'data' => ''
        ];
        $user = Auth::user();
        $userSocial = new UserSocial();
        $userSocial->user_id = $user->id;
        $userSocial->type = $request->social_type;
        $userSocial->url = $request->social_url;
        $userSocial->save();
        echo json_encode($result);
        die();
    }

    /**
     * Delete user social
     *
     * @return \Illuminate\View\View
     */
    public function deleteSocials(Request $request)
    {
        $result = [
            'status' => 'OK',
            'data' => ''
        ];
        $id = $request->id;
        $user = Auth::user();
        $userSocial = UserSocial::where('id', $id)->where('user_id', $user->id)->first();
        $userSocial->delete();
        echo json_encode($result);
        die();
    }

    /**
     * Save user social
     *
     * @return \Illuminate\View\View
     */
    public function saveSocials(Request $request)
    {
        $result = [
            'status' => 'OK',
            'data' => ''
        ];
        $id = $request->id;
        $val = $request->val;
        $user = Auth::user();
        $userSocial = UserSocial::where('id', $id)->where('user_id', $user->id)->first();
        $userSocial->url = $val;
        $userSocial->save();
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
        if (empty($user)) {
            return abort(404);
        }
        $userSocials = UserSocial::where('user_id', $user->id)->get();
        if (!empty($user)) {
            if (!empty($_GET['theme_id'])) {
                $userLogged = Auth::user();
                if (!empty($userLogged) && $user->id == $userLogged->id) {
                    $theme = Theme::find($_GET['theme_id']);
                    if (!empty($theme)) {
                        return view('themes.theme_'.$theme->code, compact(
                            'user',
                            'userSocials'
                        ));
                    }
                }
            }
            return view('users.temp_1', compact(
                'user',
                'userSocials'
            ));
        }
        return abort(404);
    }
}
