## Laravel Blueprint dan filament

<h1>Stepnya</h1>
<p>
Dengan menggunakan laravel blueprint dan filament cukup 5 menit untuk membuat aplikasi payroll
</p>
<ol>
<li>
 install laravel pastikan sudah terinstall php dan composer
</li>
<li>
 laravel cli
    <pre>composer global require laravel/installer </pre>
    </li>
    <li>
 buat proyek baru
    <pre>laravel new payroll</pre>
    </li>
    <li>
install laravel blueprint
    <pre>composer require -W --dev laravel-shift/blueprint</pre>
    </li>
    <li>
 buka di vscode, buka terminal lalu 
    <pre>php artisan migrate</pre>
    </li>
    <li>
 buat file draft.yaml dengan 
    <pre>php artisan blueprint:new</pre>
    </li>
    <li>
atur file draft.yamlnya
<pre>
    models:
        Departement:
            nama: string
            description: string
            relationships:
                hasmany: Employee

        Position:
            name: string
            description: text
            relationships:
                hasmany: Employee

        Employee:
            Departement_id: foreign
            Position_id: foreign
            name: string
            email: string
            joined: date
            status: enum: aktif,tidak aktif default:tidak aktif
            relationships:
                hasmany: Leaverequest,sallary

        LeaveRequest:
            Employee_id: foreign
            start_date: date
            end_date: date
            type: enum: aktif,tidak aktif default:tidak aktif
            status: enum: pending,accepted,rejected default:pending
            reason: text nullable

        sallary:
            Employee_id: foreign
            amount: double
            effective_date: date

</pre>
</li>
<li>
jangan lupa untuk migrate baru
    <pre>php artisan migrate:fresh --seed</pre>
    </li>
<li>
<pre>php artisan blueprint:build</pre>
</li>
<li>
 install laravel filament
    <pre>composer require filament/filament:"^3.2" -W</pre>
    </li>
<li>
buat halaman panel admin
    <pre>php artisan filament:install --panels</pre>
    berinama panel
    </li>
<li>
 buat user baru
    <pre>php artisan make:filament-user</pre>
    </li>
<li>
   <pre> nama: nama_kamu
    email:a@a.com
    password:123</pre>
    </li>
<li>
 buat filament berdasarkan nama tabel, contoh
    <pre>php artisan make:filament-resource Departement --generate</pre>
    </li>
<li>
    <pre>
         composer require spatie/laravel-permission<br>
        'providers' => [
            // ...
            Spatie\Permission\PermissionServiceProvider::class,
        ];
        php artisan migrate:fresh --seed
    </pre>
</li>
<li>
Jalanakan perintah publish vendor spatie
<pre>
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"<br>
php artisan optimize:clear<br>
 php artisan migrate
</pre>
</li>
<li>
    Jalankan perintah update composer
    <pre>
        php artisan vendor:publish --tag="filament-spatie-roles-permissions-config" --force
    </pre>
</li>
<li>
    Install spatie filament
    <pre>
    composer require althinect/filament-spatie-roles-permissions<br>
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    </pre>
</li>
<li>
    Tambahkan ini pada admin panel filament<br>
    App/Filament/AdminPanelProvider.php
    <pre>
        use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;<br>
        $panel
    ...
    ->plugin(FilamentSpatieRolesPermissionsPlugin::make())

    </pre>
</li>
<li>
    jika ingin membuat customnya maka jalankan perintah ini
    <pre>
        php artisan vendor:publish --tag="filament-spatie-roles-permissions-config" --force
    </pre>
</li>
<li>
Jika ingin membuat formnya bisa multiple seleksi gunakan kode ini
<pre>
    return $form->schema([
    Select::make('roles')->multiple()->relationship('roles', 'name')
])
</pre>
</li>
</ol>
<hr/>
selanjutnya akses panelnya
    http://localhost/panel/login.
<hr/>
selanjutnya bisa ke 
https://filamentphp.com/docs/3.x/panels/installation<br>
https://blueprint.laravelshift.com/docs/installation/<br>
https://github.com/filamentphp/filament<br>
https://www.youtube.com/watch?v=BiH-XUnO2ZQ&list=PLSrCeSrrFkMXFyT7gwBXw9jxSjhGztroA&index=1
