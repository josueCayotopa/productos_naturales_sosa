<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Success - Don Bide ')]
class SuccessPage extends Component
{
    #[Url]
    public $session_id;
    public function render()
    {
        $lates_order = Order::with('address')->where('user_id', auth()->user()->id)->latest()->first();
        if ($this->session_id) {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $session_info = Session::retrieve($this->session_id);
            if ($session_info->payment_status != 'paid') {
                $lates_order->payment_status = 'failed';
                $lates_order->save();
                return redirect()->route('cancel');
            } else if ($session_info->payment_status == 'paid') {

                $lates_order->payment_status = 'paid';
                $lates_order->save();
            }
        }

        return view('livewire.success-page', ['order' => $lates_order]);
    }
}
