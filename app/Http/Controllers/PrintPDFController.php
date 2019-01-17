<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//*********************************
// IMPORTANT NOTE
// ==============
// If your website requires user authentication, then
// THIS FILE MUST be set to ALLOW ANONYMOUS access!!!
//
//*********************************

//Includes WebClientPrint classes
include_once(app_path() . '\WebClientPrint\WebClientPrint.php');
use Neodynamic\SDK\Web\WebClientPrint;
use Neodynamic\SDK\Web\Utils;
use Neodynamic\SDK\Web\DefaultPrinter;
use Neodynamic\SDK\Web\InstalledPrinter;
use Neodynamic\SDK\Web\PrintFile;
use Neodynamic\SDK\Web\PrintFilePDF;
use Neodynamic\SDK\Web\ClientPrintJob;

use Session;

class PrintPDFController extends Controller
{
    public function index(){

        $wcpScript = WebClientPrint::createScript(action('WebClientPrintController@processRequest'), action('PrintPDFController@printFile'), Session::getId());

        return view('home.printPDF', ['wcpScript' => $wcpScript]);
    }

    public function printFile(Request $request){

        if ($request->exists(WebClientPrint::CLIENT_PRINT_JOB)) {

            $useDefaultPrinter = ($request->input('useDefaultPrinter') === 'checked');
            $printerName = urldecode($request->input('printerName'));

            //the PDF file to be printed, supposed to be in files folder
            $filePath = 'files/LoremIpsum.pdf';
            //create a temp file name for our PDF file...
            $fileName = uniqid();

            //Create a ClientPrintJob obj that will be processed at the client side by the WCPP
            $cpj = new ClientPrintJob();
            //Create a PrintFilePDF object with the PDF file
            $cpj->printFile = new PrintFilePDF($filePath, $fileName, null);
            if ($useDefaultPrinter || $printerName === 'null'){
                $cpj->clientPrinter = new DefaultPrinter();
            }else{
                $cpj->clientPrinter = new InstalledPrinter($printerName);
            }

            //Send ClientPrintJob back to the client
            return response($cpj->sendToClient())
                ->header('Content-Type', 'application/octet-stream');


        }
    }

}
