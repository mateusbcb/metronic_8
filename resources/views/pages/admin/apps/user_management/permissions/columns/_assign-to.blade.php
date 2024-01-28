@foreach($roles as $role)
    <a href="{{ route('admin_user_management.roles.show', $role) }}" class="badge fs-7 m-1 {{ app(\App\Actions\GetThemeType::class)->handle('badge-light-?', $role->name) }}">
        {{ $role->name }}
    </a>
@endforeach
