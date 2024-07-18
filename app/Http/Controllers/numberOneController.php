<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class numberOneController extends Controller
{
    public function loop(Request $request)
    {
        $resultLoop = [];
        
        if (!empty($request->all()['jumlah'])) {
            $countLoop = intval($request->all()['jumlah']);

            for ($i = 1; $i <= $countLoop; $i++) {
                if (count($resultLoop) >= 5) {
                    break;
                }

                if ($i % 3 == 0 && $i % 5 == 0) {
                    $resultLoop[] = "Kompak Cipta";
                } elseif (count($resultLoop) >= 2) {
                    if ($i % 3 == 0) {
                        $resultLoop[] = "Cipta";
                    } elseif ($i % 5 == 0) {
                        $resultLoop[] = "Kompak";
                    }
                } else {
                    if ($i % 3 == 0) {
                        $resultLoop[] = "Kompak";
                    } elseif ($i % 5 == 0) {
                        $resultLoop[] = "Cipta";
                    }
                }
            }
        }


        return view('loop',compact('resultLoop'));
    }
}
