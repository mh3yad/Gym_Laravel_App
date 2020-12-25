<?php

namespace App\Http\Controllers;



use App\Member;
use App\Money;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{

    public function generate(){
        $members = Member::all();
        $money= Money::all();
        $n = strval(now());
        $fileName = 'customers' . $n . '.pdf';

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $html = \View::make('pdf.demo', ['members' => $members,'money'=>$money]);
        $html = $html->render();
        $mpdf->useSubstitutions = false;
        $mpdf->simpleTables = true;
        $stylesheet = file_get_contents(asset('https://raw.githubusercontent.com/mh3yad/Android/master/mpdf.css'));
        $mpdf->writeHTML($stylesheet, 1);
        $mpdf->writeHTML($html);

        $fileName = 'المشتركين_' . $n . '.html';
        Storage::disk('google')->put($fileName,$html);

    }
    public function generate2(){
        $members = Member::all();
        $money= Money::all();

        $n = strval(now());
        $fileName = 'customers' . $n . '.pdf';

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $html = \View::make('pdf.demo', ['members' => $members,'money'=>$money]);
        $html = $html->render();
        $mpdf->useSubstitutions = false;
        $mpdf->simpleTables = true;
        $stylesheet = file_get_contents(asset('https://raw.githubusercontent.com/mh3yad/Android/master/mpdf.css'));
        $mpdf->writeHTML($stylesheet, 1);
        $mpdf->writeHTML($html);
        $mpdf->Output($fileName,'D');



    }
}
