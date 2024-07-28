<?php

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// Load Composer's autoloader
require __DIR__.'/vendor/autoload.php';

// Bootstraps the application and prepares it for use
$app = require_once __DIR__.'/bootstrap/app.php';

// Initialize the Laravel application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Ensure the application is properly bootstrapped
$kernel->bootstrap();

broadcast(new App\Events\StatusLiked("hello"));
// 
// broadcast(new App\Events\MessageSent(User::first(),Message::first()));

broadcast(new App\Events\GoalScored("hello"));