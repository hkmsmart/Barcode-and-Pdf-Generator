<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;


class CreateBarcodeRequest
{
    public function handle($request, Closure $next)
    {
        $rules = [
            'value' => 'Required',
        ];

        $validator = Validator::make($request->all(), $rules);

        //$a = implode(" ",$validator->errors());
        if ($validator->fails()) {
            $errorResponse = Array('status'=>'error','message'=>$validator->errors());
            return response()->json($errorResponse, 400);
        }
        else{
            $request->type    = ($request->type ?? 'QRCODE');
            $request->width   = ($request->width ?? -4);
            $request->height  = ($request->height ?? -4);
            $request->color   = ($request->color ?? 'black');
            $request->padding = ($request->padding ?? '0,0,0,0');
            $request->output  = ($request->white ?? 'pngBase64');
            $request->backgroundColor  = ($request->backgroundColor ?? 'white');
        }
        return $next($request);
    }
}
