<?php

namespace App\Jobs;

use App\Mail\ProductNotificationMail;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendProductNotification implements ShouldQueue
{
    use Queueable;

    public Product $product;
    public string $action;

    /**
     * Create a new job instance.
     */
    public function __construct(Product $product, string $action)
    {
        $this->product = $product;
        $this->action = $action;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->product->loadMissing('user', 'category');
        Mail::to($this->product->user->email)->send(new ProductNotificationMail($this->product, $this->action));
    }
}
