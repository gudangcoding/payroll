## Laravel Blueprint dan filament

<h1>Stepnya</h1>
<ol>
<li>
1. install laravel pastikan sudah terinstall php dan composer
</li>
<li>
2. laravel cli
    <pre>composer global require laravel/installer </pre>
    </li>
    <li>
3. buat proyek baru
    <pre>laravel new payroll</pre>
    </li>
    <li>
4. install laravel blueprint
    <pre>composer require -W --dev laravel-shift/blueprint</pre>
    </li>
    <li>
5. buka di vscode, buka terminal lalu 
    <pre>php artisan migrate</pre>
    </li>
    <li>
6. buat file draft.yaml dengan 
    <pre>php artisan blueprint:new</pre>
    </li>
    <li>
7. atur file draft.yamlnya
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
9. jangan lupa untuk migrate baru
    <pre>php artisan migrate:fresh --seed</pre>
    </li>
<li>
8. <pre>php artisan blueprint:build</pre>
</li>
<li>
9. install laravel filament
    <pre>composer require filament/filament:"^3.2" -W</pre>
    </li>
<li>
10. buat halaman panel admin
    <pre>php artisan filament:install --panels</pre>
    berinama panel
    </li>
<li>
11. buat user baru
    <pre>php artisan make:filament-user</pre>
    </li>
<li>
   <pre> nama: nama_kamu
    email:a@a.com
    password:123</pre>
    </li>
<li>
12. buat filament berdasarkan nama tabel, contoh
    <pre>php artisan make:filament-resource Departement --generate</pre>
    </li>
</ol>
<hr/>
selanjutnya akses panelnya
    http://localhost/panel/login.
<hr/>
selanjutnya bisa ke 
https://filamentphp.com/docs/3.x/panels/installation
https://blueprint.laravelshift.com/docs/installation/
