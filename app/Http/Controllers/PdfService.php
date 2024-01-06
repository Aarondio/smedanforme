<?php

namespace App\Http\Controllers;

use App\Models\Businessinfo;
use App\Models\Expenses;
use App\Models\Product;
use \Mpdf\Mpdf as PDF;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfService extends Controller
{
    public function viewPdf()
    {
        $user = Auth::user();

        if (!$user) {
            redirect()->route('login');
        } else {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', 1)
                ->first();

            $expenses = Expenses::where('businessinfo_id', $businessinfo->id)->where('expense_type', 'Annual')->first();
            $products = Product::where('businessinfo_id', $businessinfo->id)->get();
            $currentYear = date('Y');
            $loanAmountFormatted = "₦" . number_format($businessinfo->loan_amount);
            $documentFileName = "Business plan.pdf";
            $qrCodeSvg = QrCode::size(80)
                ->color(0, 0, 0)
                ->generate(asset('applications/' . $businessinfo->id));
            $svgContent = str_replace(['<?xml version="1.0" encoding="UTF-8"?>', "\n"], '', $qrCodeSvg);
            $document = new PDF([
                'mode' => 'utf-8',
                'format' => 'A4',
                'margin_header' => '3',
                'margin_top' => '10',
                'margin_bottom' => '20',
                'margin_footer' => '20',

            ]);

            // Set some header information for output
            $header = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
            ];

            // HTML content with an image as the background
            $htmlContent = '
                <html>
                <head>
                <link href="' . public_path('asset/css/style.css') . '" rel="stylesheet">
                <link rel="preconnect" href="https://fonts.googleapis.com">

                    <style>
                        body{
                       
                        background-image: url(' . public_path('asset/img/businessplancover.png') . ');
                        background-image-resize: 6;
                        width:100%;
                        background-repeat: no-repeat;
                        background-position: center;
                        font-family: "Jost", sans-serif;
                    }
                        .content {
                           
                            padding: 20px;
                            color: black !important;
                           
                        }

                        .page-number {
                            text-align: center;
                            font-style: italic;
                          
                        }
                    </style>
                    <title>Business Plan </title>
                </head>
                <body >
                    <div class="content ">
                          <h1 style="color:#164E63;font-size:26px;font-weight:light;margi-top:0px">Business Plan</h1>
                           <p style="font-size:30; font-weight: light;">' . $currentYear .  ' </p>

                           <div style="margin-top:25%;">
                           <img src="' . public_path('asset/img/g1.png') . '" alt="Your Image" width="" height=""> 
                           <h2 style="font-size:30px;color:#0096A7; font-weight: bold;" class="pe-20">' . $businessinfo->business_name . '</h2>
                           </div>
                        
                       
                        </div>
                    <div class="content" style="margin-top:30%">
                   
                            <p class="fs-22 fw-bold " style="color:164E63"><img src="' . public_path('asset/img/user.svg') . '" alt="Your Image" width="20" height="20"> &nbsp;' . $user->firstname . ' ' . $user->surname . '</p>
                                   <p class="fs-22 fw-bold"><img src="' . public_path('asset/img/call.svg') . '" alt="Your Image" width="20" height="20"> &nbsp;' . $user->phone . '</p>
                                   <p class="fs-22 fw-bold"><img src="' . public_path('asset/img/email.svg') . '" alt="Your Image" width="20" height="20"> &nbsp;' . $user->email . '</p>
                                   <p class="fs-22 fw-bold text-lowercase pe-10"> <img src="' . public_path('asset/img/location.svg') . '" alt="Your Image" width="20" height="20"> &nbsp;' . $user->address . '</p>
                                   ' . ($businessinfo->website == null ? '' : '<p class="fs-22 fw-bold text-lowercase pe-10"><img src="' . public_path('asset/img/website.svg') . '" alt="Your Image" width="20" height="20">&nbsp;' . $businessinfo->website . '</p>') . '

                                  
                                  <p class="mt-12 fs-19">This document contains confidential and proprietary information created by ' . $businessinfo->business_name . '. This document is issued exclusively for informational purposes  and should not be reproduced  without the consent of ' . $businessinfo->business_name . '.</p>
                    </div>
                   
                </body>
                </html>
            ';


            $document->WriteHTML($htmlContent);
            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentBusiness = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-image: url(' . public_path('asset/img/white.png') . ');
                            }
                            .content {
                                
                                color: black; 
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 10px; /* Example margin */
                            }
                            th, td {
                                border: 1px solid black;
                                padding: 8px; /* Example padding */
                                text-align: left;
                            }
                        </style>
                    </head>
                    <body class="position-relative">
                        <div class="content " >
                        
                 
                        <h1 class="fs-24 " style="font-size:20px;color:#818181;">Business Information</b></h1>
                        <div style="width:100%;height:1px;background-color:black"></div>
                             <div class="container text-center" style="margin-top:45%">
                            
                                  ' . $svgContent . '
                                  
                             <div  style="text-align:center;margin-top:15%">
                                 <table style="border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto;">
                                    <tr style="border: 1px solid #818181;">
                                        <td style="border: 1px solid #818181; text-align: left; padding: 8px;">Business Name</td> 
                                        <td style="border: 1px solid #818181; text-align: right; padding: 8px;">' . $businessinfo->business_name . '</td>
                                    </tr>
                                    <tr style="border: 1px solid #818181;">
                                        <td style="border: 1px solid #818181; text-align: left; padding: 8px;">SUIN</td> 
                                        <td style="border: 1px solid #818181; text-align: right; padding: 8px;">' . $businessinfo->suin . '</td>
                                    </tr>
                                    <tr style="border: 1px solid #818181;">
                                        <td style="border: 1px solid #818181; text-align: left; padding: 8px;">Business Age</td> 
                                        <td style="border: 1px solid #818181; text-align: right; padding: 8px;">' . $businessinfo->business_age . '</td>
                                    </tr>
                                 
                                    <tr style="border: 1px solid #818181;">
                                        <td style="border: 1px solid #818181; text-align: left; padding: 8px;">Business Sector</td> 
                                        <td style="border: 1px solid #818181; text-align: right; padding: 8px;">' . $businessinfo->sector . '</td>
                                    </tr>
                                    <tr style="border: 1px solid #818181;">
                                        <td style="border: 1px solid #818181; text-align: left; padding: 8px;">Employees</td> 
                                        <td style="border: 1px solid #818181; text-align: right; padding: 8px;">' . $businessinfo->emp_no . '</td>
                                    </tr>
                                 </table> 

                                   <p style="margin-top: 15%;font-weight:bold;">Business Address</p>
                                   <p style="margin-top: 10px;">' . $businessinfo->address . '</p>
                                  </div>
                             <div>
                        </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentBusiness);


            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage1 = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-image: url(' . public_path('asset/img/white.png') . ');
                            }
                            .content {
                                
                                color: black; 
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 10px; /* Example margin */
                            }
                            th, td {
                                border: 1px solid black;
                                padding: 8px; /* Example padding */
                                text-align: left;
                            }
                        </style>
                    </head>
                    <body class="position-relative">
                        <div class="content " >
                        
                 
                      
                             <div class="container " style="margin-top:3%">
                            
                                 
                                   <h1 class="fs-24 fw-bold text-center" style="font-size:20px;font-weight: bold;color:#1c1c1c;margin-bottom:5%">Table of Content</b></h1>
                                <table class="table table-striped">
                                     <tr>
                                       <td style="font-weight:bold" class="text-capitalize">Executive Summary</td>
                                       <td class="text-end">4</td>
                                     </tr>
                                     <tr>
                                       <td style="padding-left:20px">Overview</td>
                                       <td class="text-end">4</td>
                                     </tr>
                                     <tr>
                                       <td style="padding-left:20px" class="text-capitalize">Executive summary</td>
                                       <td class="text-end">4</td>
                                     </tr>

                                     <tr>
                                     <td style="font-weight:bold" class="text-capitalize">Company Description</td>
                                     <td class="text-end">4</td>
                                   </tr>
                                   <tr>
                                     <td style="padding-left:20px" class="text-capitalize">Company Overview</td>
                                     <td class="text-end">4</td>
                                   </tr>
                                   <tr>
                                     <td style="padding-left:20px" class="text-capitalize">Company mission statement</td>
                                     <td class="text-end">4</td>
                                   </tr>
                                   <tr>
                                   <td style="font-weight:bold" class="text-capitalize">Products and services</td>
                                   <td class="text-end">4</td>
                                 </tr>
                                 <tr>
                                 <td style="font-weight:bold" class="text-capitalize">Management and Organization</td>
                                 <td class="text-end">4</td>
                                
                               </tr>
                               <tr>
                               <td style="padding-left:20px" class="text-capitalize">Organizational Chart</td>
                               <td class="text-end">4</td>
                               </tr>
                               <br>
                               <tr> <td style="font-weight:bold" class="text-capitalize">Financial plans</td>
                               <td class="text-end">4</td>
                               </tr>
                               <tr>
                               <td style="padding-left:20px" class="text-capitalize">Cash flow</td>
                               <td class="text-end">4</td>
                             </tr>
                             <tr>
                             <td style="padding-left:20px" class="text-capitalize">Profit and loss projection</td>
                             <td class="text-end">4</td>
                           </tr>
                           <tr>
                           <td style="padding-left:20px" class="text-capitalize">Sales Plan</td>
                           <td class="text-end">4</td>
                         </tr>
                         <tr> <td style="font-weight:bold" class="text-capitalize">Appendices</td>
                         <td class="text-end">4</td>
                         </tr>

                                </table>
                                   
                                  
                             <div>
                        </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage1);


            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage2 = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-image: url(' . public_path('asset/img/summary.png') . ');
                                background-color: #f2f2f2;
                            }
                            .content {
                                padding: 20px;
                                color: black; /* Change text color or other styles as needed */
                            }
                            @page {
                                background-image: url(' . public_path('asset/img/white.png') . ');
                            }
                        </style>
                    </head>
                    <body >
                        <div class="content " >
                        <h1 style="color:#1C1C1C;font-size:46px;font-weight:bold;margin-top:0px">Executive Summary</h1>
                        <div style="width:15%;height:4px;background-color:#0096A7;margin-top:2px"></div>
                       
                             <div class="container" style="margin-top:2%">
                            
                             <h1 style="color:#0096A7;font-size:26px;font-weight:bolder;margin-top:0px">Business Objectives</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>
                             <h1 style="color:#0096A7;font-size:26px;font-weight:bolder;margin-top:0px">Target Audience</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#0096A7;font-size:26px;font-weight:bolder;margin-top:0px">Competitive Analysis</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#0096A7;font-size:26px;font-weight:bolder;margin-top:0px">Marketing Plan</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
        
                                   
                                  
                             <div>
                        </div>
                        <div class="page-number">
                        Page {PAGENO} of {nb}
                    </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage2);


            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage22 = '
                    <html>
                    <head>
                        <style>
                            body {
                                background-image: url(' . public_path('asset/img/summary.png') . ');
                            }
                           
                        </style>
                    </head>
                    <body >
                        <div class="content " >
                       
                             <div class="container" >
                            
                                
                             <h1 style="color:#0096A7;font-size:18px;font-weight:bolder;margin-top:0px">Management team</h1>
                             <p class=" text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#0096A7;font-size:18px;font-weight:bolder;margin-top:0px">Why we need Funding</h1>
                             <p class=" text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                                   
                                  
                             <div>
                        </div>
                        <div class="page-number">
                        Page {PAGENO} of {nb}
                    </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage22);

            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage3 = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-image: url(' . public_path('asset/img/about.png') . ');
                            }
                            .content {
                                padding: 20px;
                                color: black; /* Change text color or other styles as needed */
                            }
                        </style>
                    </head>
                    <body >
                        <div class="content " >
                        <h1 style="color:#1c1c1c;font-size:66px;font-weight:bolder;margin-top:40px;m-0 p-0">About Our<br> Business</h1>
                        <div style="width:10%;height:4px;background-color:#0096A7;margin-top:5px"></div>
                        <p class="fs-22 text-black" style="text-align: justify;margin-top:20p">' . $businessinfo->about . '</p>
                             <div class="container" style="margin-top:2%">
                            
                                 
                             <h1 style="color:#0096A7;font-size:18px;font-weight:bolder;margin-top:0px">' . $businessinfo->business_age . ' Years Dedicated to Service</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->journey . '</p>
                                   
                                  
                             <div>
                        </div>
                        <div class="page-number">
                        Page {PAGENO} of {nb}
                    </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage3);

            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage4 = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-image: url(' . public_path('asset/img/whitebg.png') . ');
                            }
                            .content {
                                padding: 20px;
                                color: black; /* Change text color or other styles as needed */
                            }
                        </style>
                    </head>
                    <body class="">
                    <h1 class="fs-24 " style="font-size:20px;color:#818181;">Cash Expenditures</b></h1>
                    <div style="width:100%;height:1px;background-color:black"></div>

                             <table class="table table-bordered table-striped" style="margin-top:2%">
                             <tbody>
                                 <tr class="bg-dark ">
                                     <td colspan="2" class=" fw-bold m-0 p-1">Income statement for the year ' . $expenses->year . '</td>
                                 </tr>
                                 <tr class="">
                                     <td colspan="2" class=" fw-bold m-0 p-1 text-dark">Revenues</td>
                                 </tr>';

            if ($products->isNotEmpty()) {
                $total = 0;

                foreach ($products as $product) {
                    $total += ($product->quantity * $product->price) - ($product->quantity - $product->cost);
                    $htmlContentPage4 .= '
                                                                <tr>
                                                                     <td class="text-dark p-1">' . $product->name . '</td>
                                                                    <td class="text-dark text-end p-1">₦' . number_format(($product->quantity * $product->price) - ($product->quantity - $product->cost)) . '</td>
                                                                                                    </tr>';
                }
            }
            $htmlContentPage4 .= '
                                 <tr class="bg-soft-primary">
                                     <td class="text-dark text-capitalize p-1 fw-bold">Total Revenues</td>
                                     <td class="text-dark text-end p-1 fw-bold">
                                         ' . "₦" . number_format($total) . '
                                     </td>
                                 </tr>
                                 <tr class="bg-white">
                                     <td colspan="2" class=" fw-bold m-0 p-1">Cash Expenditures</td>
                                 </tr>
                                 <tr>';

            $revyear = $expenses->year;


            $htmlContentPage4 .= '   <td class="text-dark p-1">Rent</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->rent) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark p-1">Utilities</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->utilities) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">salary</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->salary) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">Social securities</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->securities) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">website / Softwares</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->website) . '</td>
                                 </tr>
     
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">admin expenses</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->adminexpenses) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">marketing </td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->marketing) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">supplies and other purchases</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->supplies) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">licenses</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->licences) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">internet & Telephone</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->internet) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">legal fees</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->legal) . '</td>
                                 </tr>
     
     
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">Consultants</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->consultation) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">miscellaneous</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->miscell) . '</td>
                                 </tr>
                                 <tr>
                                     <td class="text-dark text-capitalize p-1">insurance</td>
                                     <td class="text-dark text-end p-1">' . "₦" . number_format($expenses->insurance) . '</td>
                                 </tr>
                                 <tr class="bg-dark">
                                     <td class="text-dark text-capitalize p-1 fw-bold">Total Expenses</td>
                                     <td class="text-dark text-end p-1">
                                         <strong>' . "₦" .

                number_format(
                    $totalexp =
                        $expenses->rent +
                        $expenses->utilities +
                        $expenses->salary +
                        $expenses->securities +
                        $expenses->website +
                        $expenses->adminexpenses +
                        $expenses->marketing +
                        $expenses->supplies +
                        $expenses->licences +
                        $expenses->internet +
                        $expenses->legal +
                        $expenses->consultation +
                        $expenses->miscell +
                        $expenses->insurance,
                ) . '</strong>
                                     </td>
                                 </tr>
                                 
     
                             </tbody>
                         </table>
                         

                         
                             </div>
                        </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage4);

            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentpands = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-image: url(' . public_path('asset/img/white.png') . ');
                            }
                            .content {
                                
                                color: black; 
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 10px; /* Example margin */
                            }
                            th, td {
                                border: 1px solid black;
                                padding: 8px; /* Example padding */
                                text-align: left;
                            }
                        </style>
                    </head>
                    <body class="">
                        <div class="content " >
                        
                 
                        <h1 class="fs-24 " style="font-size:20px;color:#818181;">Products and Services</b></h1>
                        <div style="width:100%;height:1px;background-color:black"></div>
                             <div class="container text-center" style="margin-top:2%">
                            
                             
                                  
                             <div  style="text-align:center;margin-top:5%">

                                 <table style="border-collapse: collapse; margin-left: auto; margin-right: auto;">
                                   <tr style="background-color:black;color:white;border: 1px solid #1c1c1c;">
                                       <td style="color:white;border: 1px solid #fff;text-align:center;">Name</td>
                                       <td style="color:white;border: 1px solid #fff;text-align:center;">Unit price</td>
                                       <td style="color:white;border: 1px solid #fff;text-align:center;">Cost Per unit</td>
                                       <td style="color:white;border: 1px solid #fff;text-align:center;">QTY produced</td>
                                       <td style="color:white;border: 1px solid #fff;text-align:center;">Profit</td>
                                   </tr>';

            foreach ($products as $product) {

                $htmlContentpands .= '<tr style="border: 1px solid #1c1c1c;">
                                        <td style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . $product->name . '</td> 
                                        <td style="border: 1px solid #1c1c1c; text-align: center; padding: 8px;">₦' . number_format($product->price) . '</td>
                                        <td style="border: 1px solid #1c1c1c; text-align: center; padding: 8px;">₦' . number_format($product->cost) . '</td>
                                        <td style="border: 1px solid #1c1c1c; text-align: center; padding: 8px;">' . number_format($product->quantity) . '</td>
                                        <td style="border: 1px solid #1c1c1c; text-align: center; padding: 8px;">₦' . number_format(($product->quantity * $product->price) - ($product->quantity - $product->cost)) . '</td>
                                    </tr>';
            }

            $htmlContentpands .= '    </table>';

            $htmlContentpands .= '<table class="table table-bordered">
                             <thead>
                                 <tr class=" text-white" style="border: 1px solid #1c1c1c;background-color:#D9D9D9">
                                     <th class="text-dark text-capitalize p-1 text-center fw-bold" style="border: 1px solid #1c1c1c; ">Year</th>
                                     <th class="text-dark text-capitalize p-1 text-center fw-bold" style="border: 1px solid #1c1c1c; ">Revenue</th>
                                     <th class="text-dark text-capitalize p-1 text-center fw-bold" style="border: 1px solid #1c1c1c; ">Expenses</th>
                                     <th class="text-dark text-capitalize p-1 text-center fw-bold" style="border: 1px solid #1c1c1c; ">Profit</th>
                                 </tr>
                             </thead>
                             <tbody>';


            $currentYear = date("Y");
            $initialRevenue = $total; //initial revenue here;
            $initialExpenses = $totalexp; // initial expenses here;
            $growthRate = 0.3; // growth rate here;
            $expenseGrowthRate = 0.19; //expense growth rate here;

            $revenue = $initialRevenue;
            $expenses = $initialExpenses;
            // $revyear = 2020;

            $htmlContentpands .= '<tr class="bg-soft-orange" style="border: 1px solid #1c1c1c;">
                                     <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . $revyear . '</td>
                                     <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . "₦" . number_format($total) . '</td>
                                     <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . "₦" . number_format($totalexp) . '</td>
                                     <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . "₦" . number_format($total - $totalexp) . '</td>
                                 </tr>';
            for ($i = 1; $i < 4; $i++) {

                // $year = $currentYear + $i;
                $year = $revyear + $i;

                // Adjust the growth rates based on certain conditions or factors
                if ($year == 2024) {
                    $growthRate = 0.51;
                    $expenseGrowthRate = 0.25;
                } elseif ($year == 2025) {
                    $growthRate = 0.61;
                    $expenseGrowthRate = 0.35;
                }

                // Calculate projected revenue for the next year based on growth rate
                $revenue *= 1 + $growthRate;

                // Projected expenses (assuming variable expenses growth rate)
                $expenses *= 1 + $expenseGrowthRate;

                // Calculate projected profit
                $projectedProfit = $revenue - $expenses;


                $htmlContentpands .= '  <tr style="border: 1px solid #1c1c1c;">
                                         <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . $year . '</td>
                                         <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . "₦" . number_format($revenue) . '</td>
                                         <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . "₦" . number_format($expenses) . '</td>
                                         <td class="text-dark text-center p-1" style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . "₦" . number_format($projectedProfit) . '</td>
                                     </tr>';
            }

            $htmlContentpands .= '   </tbody>

                                 </table>


                                 <table style="border-collapse: collapse; margin-left: auto; margin-right: auto;">
                                 <tr style="background-color:black;color:white;border: 1px solid #1c1c1c;"><td style="color:white;border: 1px solid #fff;text-align:center;"></td>';

            for ($i = 0; $i < 4; $i++) {

                $htmlContentpands .= '<td style="color:white;border: 1px solid #fff;text-align:center;">' . ($year = $revyear + $i) . '</td>
                                 
                                      </tr>';
            }
            $htmlContentpands .= ' <tr style="background-color:#D9D9D9;color:black;border: 1px solid #1c1c1c;"><td colspan="5" style="color:black;border: 1px solid #fff;text-align:left;">Cash Flow</td>';
            foreach ($products as $product) {
                $revenue = ($product->quantity * $product->price) - ($product->quantity - $product->cost);

                $htmlContentpands .= '<tr style="border: 1px solid #1c1c1c;">
                                      <td style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">' . $product->name . '</td>';
                $htmlContentpands .= '<td style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">₦' . number_format($revenue) . '</td>';
                for ($i = 1; $i < 4; $i++) {
                    $growthRate = 0.18; // Set your growth rate here dynamically
                    $revenue *= (1 + $growthRate);
                    $htmlContentpands .= '<td style="border: 1px solid #1c1c1c; text-align:center; padding: 8px;">₦' . number_format($revenue) . '</td>';
                }
                $htmlContentpands .= '   </tr>';
            }

            $htmlContentpands .= '    </table>
                                  </div>
                             <div>


                        </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentpands);

            $document->AddPage();
            $data = [
                'Category 1' => 30,
                'Category 2' => 50,
                'Category 3' => 20,
                // Add more categories and values as needed
            ];

            // Create a canvas element to draw the chart
            $chartData = json_encode([
                'labels' => array_keys($data),
                'datasets' => [
                    [
                        'label' => 'Sample Data',
                        'data' => array_values($data),
                        'backgroundColor' => [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            // Add more colors as needed
                        ],
                        'borderColor' => [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 206, 86)',
                            // Add more colors as needed
                        ],
                        'borderWidth' => 1,
                    ],
                ],
            ]);

            // Generate HTML content for the bar chart
            $html = '
    <h1>Bar Chart Example</h1>
    <canvas id="myBarChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById("myBarChart").getContext("2d");
        var chartData = ' . $chartData . ';
        var myChart = new Chart(ctx, {
            type: "bar",
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
            },
        });
    </script>
';

            // Add the HTML content to the PDF
            $document->WriteHTML($html);


            // Output the PDF as a download (change 'I' to 'D' if you want to force download)
            return response($document->Output('', 'I'), 200, $header);
        }
    }
}
