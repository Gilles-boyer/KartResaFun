<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\PaymentRequest as StorePaymentRequest;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return PaymentResource::collection(Payment::all());
    }

    public function show(int $id)
    {
        $payment = Payment::find($id);

        if(!$payment) {
            return [
                "error" => true,
                "message" => "Le Payement n'existe pas"
            ];
        }

        return $payment;
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->validated());

        return new PaymentResource($payment);
    }

    public function update(StorePaymentRequest $request, int $id)
    {

        $payment = $this->show($id);

        if($payment["error"]) {
            return $payment;
        }

        $payment->update($request->validated());

        return new PaymentResource($payment);
    }

    public function destroy(int $id)
    {
        $payment = $this->show($id);

        if($payment["error"]) {
            return $payment;
        }

        $payment->delete();

        return response()->noContent();
    }
}
