<?php

namespace App\Http\Controllers\Subscriber;

use App\Payment;
use App\RegisteredIds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('subscriber');
    }

    public function index() {
        $user = Auth::user();
        $title = "Home";

        $reg = RegisteredIds::where('idnum', $user->idnum)->first();
        if($reg->status == 0) {
            return redirect()->route('survey');
        } else if($reg->status == 1) {
            $title = "Payment Information";
            $payment = Payment::where('idnum', $user->idnum)->first();

            return view('subscriber/payment', ['title' => $title, 'role' => 'Subscriber', 'payment' => $payment]);
        }
    }

    public function status(Payment $payment) {
        $count = 0;

        if($payment->yearbookStatus == 1)
            $count++;
        if($payment->photoStatus == 1)
            $count++;
        if($payment->deliveryStatus == 1)
            $count++;

        if($count == 3)
            $payment->status = 1; // Paid
        else if ($count < 3 && $count > 0)
            $payment->status = 0; // Partial
        else if ($count == 0)
            $payment->status = -1; // Not Paid
        $payment->save();
    }

    public function updateYearbook(Request $request) {
        $user = Auth::user();
        $payment = Payment::where('idnum', $user->idnum)->first();

        if($payment->yearbookStatus == -1) {
            // not paid
            $payment->yearbookOR = $request->yearbookOR;
            $payment->yearbookStatus = 0;
        } else if ($payment->yearbookStatus == 0) {
            // pending
            $payment->yearbookOR = $request->yearbookOR;
            $payment->yearbookStatus = 0;
        }

        if($request->has('isPartial')) {
            $payment->isPartial = "yes";
            if($request->partialOR != "") {
                $payment->partialOR = $request->partialOR;
            }
        } else {
            $payment->isPartial = "no";
        }

        $payment->save();
        $this->status($payment);
        return redirect()->route('sub.payment');
    }

    public function updatePhoto(Request $request) {
        $user = Auth::user();
        $payment = Payment::where('idnum', $user->idnum)->first();

        if($payment->photoStatus == -1) {
            // not paid
            $payment->photoOR = $request->photoOR;
            $payment->photoStatus = 0;
        } else if($payment->photoStatus == 0) {
            // pending
            $payment->photoOR = $request->photoOR;
            $payment->photoStatus = 0;
        }

        $payment->photoPackage = $request->package;

        $payment->save();
        $this->status($payment);
        return redirect()->route('sub.payment');
    }

    public function updateDelivery(Request $request) {
        $user = Auth::user();
        $payment = Payment::where('idnum', $user->idnum)->first();

        if($payment->deliveryStatus == -1) {
            // not paid
            $payment->deliveryOR = $request->deliveryOR;
            $payment->deliveryStatus = 0;
            $payment->save();
        } else if($payment->deliveryStatus == 0) {
            // pending
            $payment->deliveryOR = $request->deliveryOR;
            $payment->deliveryStatus = 0;
            $payment->save();
        }
        $this->status($payment);
        return redirect()->route('sub.payment');
    }

    public function updateStatus(Request $request) {
        $payment = Payment::where('idnum', $request->idnum)->first();

        if($request->yearbookStatus != null)
            $payment->yearbookStatus = $request->yearbookStatus;
        else $payment->yearbookStatus = 0;

        if($request->photoStatus != null)
            $payment->photoStatus = $request->photoStatus;
        else $payment->photoStatus = 0;

        if($request->deliveryStatus != null)
            $payment->deliveryStatus = $request->deliveryStatus;
        else $payment->deliveryStatus = 0;
        
        $payment->save();

        $this->status($payment);
        return redirect()->route('admin.manage.payments');
    }
}
