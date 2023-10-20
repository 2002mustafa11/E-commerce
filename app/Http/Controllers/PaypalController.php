<?php
namespace App\Http\Controllers;
use  Srmklive\PayPal\Facades\PayPal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function showPaymentPage()
    {
        $amount = 100; // المبلغ المطلوب
        $description = 'منتجات الدفع'; // وصف المنتجات

        $provider = PayPal::setProvider();
        $checkoutData = [
            'items' => [
                [
                    'name' => 'منتجات الدفع',
                    'price' => $amount,
                    'qty' => 1
                ]
            ],
            'invoice_id' => uniqid(),
            'invoice_description' => $description,
            'return_url' => url('/paypal/success'),
            'cancel_url' => url('/paypal/cancel'),
            'total' => $amount
        ];


            $response = $provider->setExpressCheckout($checkoutData);
            return redirect($response['paypal_link']);

    }


    public function processPayment(Request $request)
    {
        $token = $request->input('token');
        $payerId = $request->input('PayerID');

        $provider = PayPal::setProvider();
        $checkoutData = [
            'token' => $token,
            'payer_id' => $payerId,
            'amount' => 100, // المبلغ المدفوع
            'currency' => 'USD',
        ];

        
            $response = $provider->doExpressCheckoutPayment($checkoutData);

            if ($response['ACK'] == 'Success') {
                // تنفيذ الإجراءات اللازمة لمعالجة الدفع الناجح هنا
            } else {
                // تنفيذ الإجراءات اللازمة لمعالجة الدفع الفاشل هنا
            }

    }

    public function success()
    {
        // تعامل مع الاستجابة بعد اكتمال عملية الدفع بنجاح
    }

    public function cancel()
    {
        // تعامل مع الاستجابة عند إلغاء عملية الدفع
    }
}
