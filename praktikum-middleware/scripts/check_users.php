<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$emails = ['admin@example.com', 'user@example.com'];
foreach ($emails as $email) {
    $u = User::where('email', $email)->first();
    if (! $u) {
        echo "$email => NOT_FOUND\n";
        continue;
    }
    $check = Hash::check('password', $u->password) ? 'OK' : 'BAD';
    echo "$email => role={$u->role} password_check={$check} hashed_length=" . strlen($u->password) . "\n";
}
