<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$u = User::where('email', 'admin@example.com')->first();
if (! $u) {
    echo "admin@example.com not found\n";
    exit(1);
}
$u->password = Hash::make('password');
$u->save();

echo "admin password reset to 'password'\n";
