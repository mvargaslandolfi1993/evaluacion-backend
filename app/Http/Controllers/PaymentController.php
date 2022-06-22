<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Events\PaymentStatusChanged;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PaymentResource::collection(
            Payment::orderBy('created_at', 'desc')->with('assistants', 'responsible', 'event')->paginate(25)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $payment = Payment::create($request->validated());

        $payment->assistants()->createMany($request->get('assistants'));

        return new PaymentResource(
            $payment->load('assistants', 'responsible', 'event')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return new PaymentResource(
            $payment->load('assistants', 'responsible', 'event')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->status = $request->get('status');
        $payment->save();


        PaymentStatusChanged::dispatch($payment);

        return new PaymentResource($payment->load('assistants', 'responsible', 'event'));
    }
}
