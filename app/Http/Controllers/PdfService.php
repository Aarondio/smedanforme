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
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                            color: white !important;
                           
                        }

                        .page-number {
                            text-align: center;
                            font-style: italic;
                          
                        }
                    </style>
                    <title>Business Plan </title>
                </head>
                <body >
                    <div class="content text-center">
                        <h2 style="font-size:30px;color:#164E63;margin:0px 0px; font-weight: bold;" >' . $businessinfo->business_name . '</h2>
                        <h1 style="color:#164E63;font-size:86px;font-weight:bold;margin-top:40px">Business <br> Plan</h1>
                        
                        <p style="font-size:40; font-weight: lighter;" class="text-white"> ' . $currentYear .  ' </p>
                        </div>
                    <div class="content" style="margin-top:50%">
                   
                            <p class="fs-24 fw-bold "><img src="' . public_path('asset/img/user.svg') . '" alt="Your Image" width="20" height="20"> ' . $user->firstname . ' ' . $user->surname . '</p>
                                   <p class="fs-24 fw-bold"><img src="' . public_path('asset/img/call.svg') . '" alt="Your Image" width="20" height="20"> ' . $user->phone . '</p>
                                   <p class="fs-24 fw-bold"><img src="' . public_path('asset/img/email.svg') . '" alt="Your Image" width="20" height="20"> ' . $user->email . '</p>
                                   <p class="fs-24 fw-bold text-lowercase"><img src="' . public_path('asset/img/location.svg') . '" alt="Your Image" width="17.75" height="20"> ' . $user->address . '</p>
                                   <div style="width:100%;height:2px;background-color:#EA8021;margin-top:35px"></div>
                    </div>
                   
                </body>
                </html>
            ';


            $document->WriteHTML($htmlContent);

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
                            
                                 
                                   <h1 class="fs-24 fw-bold text-center" style="font-size:20px;font-weight: bold;color:#987032;margin-bottom:5%">Table of Content</b></h1>
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
                        <h1 style="color:#fff;font-size:46px;font-weight:bold;margin-top:0px">Executive Summary</h1>
                        <div style="width:15%;height:4px;background-color:#987032;margin-top:5px"></div>
                       
                             <div class="container" style="margin-top:10%">
                            
                             <h1 style="color:#987032;font-size:26px;font-weight:bolder;margin-top:0px">Business Objectives</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>
                             <h1 style="color:#987032;font-size:26px;font-weight:bolder;margin-top:0px">Target Audience</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#987032;font-size:26px;font-weight:bolder;margin-top:0px">Competitive Analysis</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#987032;font-size:26px;font-weight:bolder;margin-top:0px">Marketing Plan</h1>
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
                                background-image: url(' . public_path('asset/img/white.png') . ');
                            }
                           
                        </style>
                    </head>
                    <body >
                        <div class="content " >
                       
                             <div class="container" >
                            
                                
                             <h1 style="color:#987032;font-size:26px;font-weight:bolder;margin-top:0px">Management team</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#987032;font-size:26px;font-weight:bolder;margin-top:0px">Why we need Funding</h1>
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
                        <h1 style="color:#fff;font-size:66px;font-weight:bolder;margin-top:40px">About Our<br> Company</h1>
                        <div style="width:10%;height:4px;background-color:#EA8021;margin-top:15px"></div>
                        <p class="fs-20 text-white" style="text-align: justify;margin-top:20p">' . $businessinfo->audience_need . '</p>
                             <div class="container" style="margin-top:25%">
                            
                                 
                                   <h1 class="fs-24 fw-bold" style="font-size:20px;color:#987032;font-weight: bold; margin-top:50px"><b>' . $businessinfo->business_age . ' Years Dedicated to Service</b></h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->audience_need . '</p>
                                   
                                  
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
                     
                             <h1 style="font-size:20px">Cash Flow</h1>
                             <table class="table table-bordered table-striped">
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
                                                $total += $product->price;
                                                $htmlContentPage4 .= '
                                                                <tr>
                                                                     <td class="text-dark p-1">' . $product->name . '</td>
                                                                    <td class="text-dark text-end p-1">' . "₦"  . number_format($product->price) . '</td>
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
                                     <td colspan="2" class=" fw-bold m-0 p-1">Expenses</td>
                                 </tr>
                                 <tr>
                                    @php
                                        $revyear = $expenses->year;
                                    @endphp
                                     <td class="text-dark p-1">Rent</td>
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

            // Output the PDF as a download (change 'I' to 'D' if you want to force download)
            return response($document->Output('', 'I'), 200, $header);
        }
    }
}
