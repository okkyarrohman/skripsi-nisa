<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($user)
    {
        $users = Auth::user();
        // Mendapatkan peran dari pengguna
        $roles = $users->getRoleNames()->toArray();
        // Jika pengguna memiliki peran 'guru'
        if (in_array('guru', $roles)) {
            return redirect()->route('dashboard.guru');
        }
        // Jika pengguna memiliki peran 'murid'
        elseif (in_array('murid', $roles)) {
            // Lakukan sesuatu, seperti memperbarui catatan login
            $users->session_login_at = Carbon::now();
            $users->save();

            return redirect()->route('dashboard.murid');
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        if ($user->session_login_at) {
            $timeDiff = Carbon::parse($user->session_login_at)->diffInMinutes(Carbon::now());
            $user->total_login += $timeDiff;
        }
        // Reset Waktu login
        $user->session_login_at = null;
        $user->save();

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
