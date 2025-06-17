App\Models\User::with('role')->get()->pluck('role.name', 'email');
