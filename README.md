# Proyecto Laravel de Manejo de Roles y Permisos

## Configuración e Implementación

### Instalación de Spatie Permission
```bash

composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan optimize:clear
php artisan config:clear
```

### Configuración Adicional

#### En `config/app.php`
```php
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];
```

#### Modelo User

```php
use HasRoles; //import class.
```

#### Seeder de Roles y Permisos

```php
$adminRole = Role::create(['name' => 'admin']);
$sellerRole = Role::create(['name' => 'seller']);
$clientRole = Role::create(['name' => 'client']);

$permissions = ['create', 'read', 'update', 'delete'];

foreach ($permissions as $permission) {
    Permission::create(['name' => $permission]);
}

$adminRole->syncPermissions($permissions);
$sellerRole->syncPermissions(['create', 'read', 'update']);
$clientRole->syncPermissions(['read', 'update']);
```

#### Seeder de Usuarios

```php
User::create([
    'name' => 'Admin',
    'email' => 'admin@admin.com',
    'email_verified_at' => Carbon::now(),
    'password' => Hash::make('12345678'),
])->assignRole(['admin','seller','client']);

User::create([
    'name' => 'seller',
    'email' => 'seller@seller.com',
    'email_verified_at' => Carbon::now(),
    'password' => Hash::make('12345678'),
])->assignRole('seller');

User::create([
    'name' => 'client',
    'email' => 'client@client.com',
    'email_verified_at' => Carbon::now(),
    'password' => Hash::make('12345678'),
])->assignRole('client');
```

#### Seeder de Base de Datos

```php
$this->call([
    RolePermissionSeeder::class,
    UserSeeder::class,
]);
```

#### Middleware en `app\Http\Kernel.php`

```php
'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
```

### Uso en Rutas

En `routes/web.php`:

```php
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/a', function () {
        return 'a';
    })->name('a');
});
```

### Uso en Vistas

Ejemplo de cómo usar los roles en las vistas:

```blade
<div class="card-text text-center col">
    @role('admin')
    <a href="{{route('a')}}">A</a>
    @endrole
            
    @role('seller')
    <a href="{{route('s')}}">S</a>
    @endrole

    @role('client')
    <a href="{{route('c')}}">C</a>
    @endrole
</div>
```

¡Espero que esta estructura y corrección del código sea lo que necesitas!
