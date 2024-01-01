<?php

namespace App\Http\Controllers;
use Com\Tecnick\Barcode\Barcode;
use Illuminate\Http\Request;

class BarocdeController extends Controller
{
    /**
     * Create a new controller instance.
     * https://github.com/tecnickcom/tc-lib-barcode/blob/main/example/index.php
     * @return void
     *
     * output type : pngBase64,getHtmlDiv,getSvgCode,getGrid,getGrid2 (gridVal:val1,val2)
     */
    public $bobj;
    public $gridVal = Array('\u00Aa0','\u25a84');
    public function __construct()
    {
        //TODO örnek request response cıkar her barcode turu için
    }

    public function create(Request $request){
        try { //Menlo, Monaco, 'Courier New', monospace
            $typeArr = Array('pngBase64','getSvgCode','getHtmlDiv','getGrid','getGridCustom');
            if (!in_array($request->output, $typeArr)){
                return response()->json(['status'=>'error','message'=>'undefined: output'],400);
            }


            $barcode    = new Barcode();
            $this->bobj = $barcode->getBarcodeObj($request->type,$request->value,$request->width,
                                $request->height,$request->color,explode(",",$request->padding))
                                ->setBackgroundColor('#f0f0f0');

            if($request->output == 'getGridCustom'){
                if(isset($request->grid2Value)){
                    $this->gridVal = explode(',',$request->grid2Value);
                }
                $this->gridVal[0] = '"'.$this->gridVal[0].'"';
                $this->gridVal[1] = '"'.$this->gridVal[1].'"';
                $data = $this->bobj->getGrid(json_decode($this->gridVal[0]), json_decode($this->gridVal[1]));
            }
            elseif($request->output == 'pngBase64'){
                $data = base64_encode($this->bobj->getPngData());
            }
            else{
                $output = $request->output;
                $data   = str_replace('"',"'",str_replace(array("\r", "\n","\t"), '', $this->bobj->$output()));
            }

            return response()->json(['status'=>'success','data'=>[$request->output => $data]]);
        }
        catch (\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()],400);
        }

    }
}
