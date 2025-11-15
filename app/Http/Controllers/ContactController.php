<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\ContactRequest;

class ContactController extends Controller
{
    public function insertContactReq(Request $request) {

        $locale = request()->cookie('locale', config('app.locale'));

        if($locale == 'ar') {
            $success_msg = 'تم استلام طلبك وسنتواصل معك في أقرب وقت ممكن.';
            $failed_msg = 'نأسف، حدثت مشكلة أثناء استلام طلبك، برجاء المحاولة لاحقاً.';
        } else {
            $success_msg = 'Your request has been received. We will contact you as soon as possible.';
            $failed_msg = 'Sorry, there was a problem receiving your request. Please try again later.';
        }


        $validation = $this->request_validation($request);

        if($validation['success']) {

            $insert = ContactRequest::create($request->except('_token'));

            if($insert) {
                return response()->json([
                    'success' => true,
                    'message' => $success_msg,
                ]);

            } else {
                return response()->json([
                    'success' => false,
                    'message' => $failed_msg,
                ]);
            }

        } else {
            return response()->json([
                'success' => false,
                'message' => $validation['error'],
                'request' => $request->all(),
            ]);
        }
    }

    public function request_validation(Request $request) {

        $locale = request()->cookie('locale', config('app.locale'));

        if($locale == 'ar') {
            $messages = [
                'fullname.required' => 'يرجى إدخال الاسم كاملاً.',
                'fullname.string' => 'يجب أن يكون الاسم نصًا.',
                'fullname.max' => 'يجب ألا يزيد الاسم عن 128 حرفًا.',
        
                'phone.required' => 'يرجى إدخال رقم الهاتف.',
                'phone.string' => 'يجب أن يكون رقم الهاتف نصًا.',
                'phone.max' => 'يجب ألا يزيد رقم الهاتف عن 25 رقمًا.',
        
                'email.required' => 'يرجى إدخال البريد الإلكتروني.',
                'email.email' => 'يرجى إدخال بريد إلكتروني صحيح.',
                'email.max' => 'يجب ألا يزيد البريد الإلكتروني عن 255 حرفًا.',
        
                'message.required' => 'يرجى إدخال الرسالة.',
                'message.string' => 'يجب أن تكون الرسالة نصًا.',
            ];

        } else {
            $messages = [
                'fullname.required' => 'Please enter the full name.',
                'fullname.string' => 'The name must be a string.',
                'fullname.max' => 'The name must not exceed 128 characters.',

                'phone.required' => 'Please enter the phone number.',
                'phone.string' => 'The phone number must be a string.',
                'phone.max' => 'The phone number must not exceed 25 digits.',

                'email.required' => 'Please enter the email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => 'The email address must not exceed 255 characters.',

                'message.required' => 'Please enter the message.',
                'message.string' => 'The message must be a string.',
            ];
        }
    
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:128',
            'phone' => 'required|string|max:25',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ], $messages);
    
        if ($validator->fails()) {
            return [
                'success' => false,
                'error' => $validator->errors()->first(),
            ];
        }
    
        return [
            'success' => true,
            'error' => '',
        ];
    }
    
}
