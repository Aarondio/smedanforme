<?php

namespace App\Http\Controllers;

use App\Models\Businessinfo;
use App\Models\Expenses;
use App\Models\Product;
use App\Models\User;
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
            $totalProducts = Product::where('businessinfo_id', $businessinfo->id)->count();
            $currentYear = date('Y');
            $loanAmountFormatted = "₦" . number_format($businessinfo->loan_amount);
            $documentFileName = "Business plans.pdf";
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
                           <h2 style="font-size:30px;color:#1c1c1c; font-weight: bold;" class="pe-20">' . $businessinfo->business_name . '</h2>
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
                                  
                             <div  style="text-align:center;margin-top:5%">
                                 <table style="border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto;">
                              
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

                                 <h1 style="font-size:16px;font-weight:bold;margin-top:10%" class="text-center">Business Address</h1>
                                 <p class="fs-20 text-black text-center" style="text-align: center;margin-top:10px">' . $businessinfo->address . '</p>
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
                                       <td class="text-end"></td>
                                     </tr>
                                     <tr>
                                       <td style="padding-left:20px">Overview</td>
                                       <td class="text-end"></td>
                                     </tr>
                                     <tr>
                                       <td style="padding-left:20px" class="text-capitalize">Executive summary</td>
                                       <td class="text-end"></td>
                                     </tr>
                                     <tr>
                                     <td style="font-weight:bold" class="">Swot Analysis</td>
                                     <td class="text-end"></td>
                                   </tr>
                                     <tr>
                                     <td style="font-weight:bold" class="text-capitalize">Company Description</td>
                                     <td class="text-end"></td>
                                   </tr>
                                   <tr>
                                     <td style="padding-left:20px" class="text-capitalize">Overview</td>
                                     <td class="text-end"></td>
                                   </tr>
                                   <tr>
                                     <td style="padding-left:20px" class="text-capitalize">Mission statement</td>
                                     <td class="text-end"></td>
                                   </tr>
                                   <tr>
                                   <td style="font-weight:bold" class="text-capitalize">Products and services</td>
                                   <td class="text-end"></td>
                                 </tr>
                               
                              
                               <br>
                               <tr> <td style="font-weight:bold" class="text-capitalize">Financial plans</td>
                               <td class="text-end"></td>
                               </tr>
                               <tr>
                               <td style="padding-left:20px" class="text-capitalize">Cash flow</td>
                               <td class="text-end"></td>
                             </tr>
                             <tr>
                             <td style="padding-left:20px" class="text-capitalize">Profit and loss projection</td>
                             <td class="text-end"></td>
                           </tr>
                           <tr>
                         
                         </tr>
                         <tr> <td style="font-weight:bold" class="text-capitalize">Conclusion</td>
                         <td class="text-end"></td>
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
                        <h1 style="color:#1C1C1C;font-size:26px;font-weight:bold;margin-top:0px">Executive Summary</h1>
                      
                       
                             <div class="container" style="margin-top:2%">
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Business Name</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->business_name . '</p>
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Business Model</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->business_model . '</p>
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Audience Need</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Management team</h1>
                             <p class=" text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->management_team. '</p>  
                            

                             <h1 style="color:#1C1C1C;font-size:22px;font-weight:bold;margin-top:30px">Market Analysis</h1>

                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Target market</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->target_market . '</p>    
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Competitive advantage</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->competition_ad . '</p>    
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Marketing Plan</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                           
                         
                             <div>
                        </div>
                        <div class="page-number">
                        
                    </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage2);


            // $document->AddPage();

            // // HTML content for the second page without the background image
            // $htmlContentPage22 = '
            //         <html>
            //         <head>
            //             <style>
            //                 body {
            //                     background-image: url(' . public_path('asset/img/summary.png') . ');
            //                 }
                           
            //             </style>
            //         </head>
            //         <body >
            //             <div class="content " >
                       
            //                  <div class="container" >
                            
                                
                              
                          
                        
            //                  <div>
            //             </div>
            //             <div class="page-number">
                        
            //         </div>
            //         </body>
            //         </html>
            //     ';

            // // Write HTML content to the second page
            // $document->WriteHTML($htmlContentPage22);
            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage33 = '
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
                    <body >
                    <h1 class="fs-24 " style="font-size:20px;color:#818181;">S.W.O.T Analysis</b></h1>
                    <div style="width:100%;height:1px;background-color:#818181"></div>
                        <div class="content " >
                        <h1 style="color:#1c1c1c;font-size:18px;font-weight:bold;margin-top:20px;m-0 p-0">Strength</h1>
                        
                        <p class="fs-22 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->strength . '</p>
                             <div class="container" style="margin-top:2%">
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Weaknesses</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->weakness . '</p>
                                 
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Opportunity</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->opportunity . '</p>
                                   <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Threats</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->threats . '</p>
                                     
                                  
                             <div>
                        </div>
                        <div class="page-number">
                        
                    </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage33);
            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage3 = '
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
                    <body >
                    <h1 class="fs-24 " style="font-size:20px;color:#818181;">Company Description</b></h1>
                    <div style="width:100%;height:1px;background-color:#818181"></div>
                        <div class="content " >
                        <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:20px;m-0 p-0">Overview</h1>
                        
                        <p class="fs-22 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->about . '</p>
                             <div class="container" style="margin-top:2%">
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px"> Our Mission</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->mission . '</p>
                                 
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">' . $businessinfo->business_age . ' Years Dedicated to Service</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->journey . '</p>
                                   
                                  
                             <div>
                        </div>
                        <div class="page-number">
                        
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
                    <h1 class="fs-24 " style="font-size:20px;color:#818181;">Income statement and cash Expenditures for the year ' . $expenses->year . '</b></h1>
                    <div style="width:100%;height:1px;background-color:black"></div>

                             <table class="table table-bordered table-striped" style="margin-top:2%">
                             <tbody>
                                 <tr style="background-color:#000000;color:#fff">
                                     <td colspan="2" class=" fw-bold m-0 p-1 text-white">Income statement</td>
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
                                 <tr class="bg-dark" >
                                     <td class="text-dark text-capitalize p-1 fw-bold" style="font-weight:bold">Total Revenues</td>
                                     <td class="text-dark text-end p-1 fw-bold" style="font-weight:bold">
                                         ' . "₦" . number_format($total) . '
                                     </td>
                                 </tr>
                                 <tr style="background-color:#000000;color:#fff">
                                     <td colspan="2" class=" fw-bold m-0 p-1 text-white">Cash Expenditures</td>
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
                                     <td class="text-dark text-capitalize p-1 fw-bold" style="font-weight:bold">Total Expenses</td>
                                     <td class="text-dark text-end p-1" style="font-weight:bold">
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
                             <div class="container text-center" style="margin-top:2%"><p style="text-align:left"> ';


            $htmlContentpands .= '       ' . $businessinfo->business_name  . ' produces <span style="font-weight:bold">' . $totalProducts . '  </span>Unique products and services namely.</p><ol style="text-align:left">';
            foreach ($products as $product) {
                $htmlContentpands .= '<li>' .  $product->name . '</li> ';
            }


            $htmlContentpands .= '  </ol><p style="text-align:left">The table below provides the summary of the product and services.</p><div  style="text-align:center;margin-top:5%">
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
            $htmlContentpands .= '   
            </table>';







            $htmlContentpands .= '
              <h1 style="font-size: 18px;font-weight:bold;text-align:left;margin-top:40px;margin-bottom:20px">Projected cash inflow by year</h1>
              </tr>   <table style="border-collapse: collapse; margin-left: auto; margin-right: auto;">
                                 <tr style="background-color:black;color:white;border: 1px solid #1c1c1c;"><td style="color:white;border: 1px solid #fff;text-align:center;"></td>';

            for ($i = 0; $i < 4; $i++) {

                $htmlContentpands .= '<td style="color:white;border: 1px solid #fff;text-align:center;">' . ($year = $revyear + $i) . '</td>
                                 
                                      </tr>
                                      
                                      ';
            }


            $htmlContentpands .= ' <tr style="background-color:#D9D9D9;color:black;border: 1px solid #1c1c1c;"><td colspan="5" style="color:black;border: 1px solid #fff;text-align:left;">Cash inflow</td>';
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


            $htmlContentpands .= '   </table>';



            $htmlContentpands .= '
            <h1 style="font-size: 18px;font-weight:bold;text-align:left;margin-top:40px;margin-bottom:20px">Profit And Loss Projection</h1>
            <table class="table table-bordered">
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

            $htmlContentpands .= '   </tbody></table>';

            $htmlContentpands .= ' <table class="table table-bordered ">
            <thead class="bg-success">
                <th class="text-dark px-2 py-1 border-0">Asset</th>
                <th class="text-dark px-2 py-1 text-end border-0">{{ $revyear }}</th>
            </thead>
            <tbody>';
            $htmlContentpands .= '   <tr class="border-0">
                    <td class="fw-bold text-black border-0 px-2 py-1" colspan="2">Curent Asset
                    </td>
                </tr>';

                $htmlContentpands .= '   <tr class="border-0">
                    <td class="border-0 px-2 py-1">Cash and cash Equivalent </td>
                    <td class="text-end border-0 px-2 py-1">'.
                        number_format($businessinfo->cash) ?? "Not specified" .'</td>
                </tr>';

            $htmlContentpands .= '    <tr class="border-0 ">
                    <td class="border-0 px-2 py-1">Account Recievable </td>
                    <td class="text-end border-0 px-2 py-1">
                      '. number_format($businessinfo->cashown) ?? "Not specified" .'</td>
                </tr>';
                $htmlContentpands .= '  <tr class="border-0">
                    <td class="border-0 px-2 py-1">Inventories </td>
                    <td class="text-end border-0 px-2 py-1">
                        '. number_format($businessinfo->inventory) ?? "Not specified" .'</td>
                </tr>';
                
                $totalCurrentAsset = $businessinfo->cash + $businessinfo->cashown + $businessinfo->inventory;
              
                $htmlContentpands .= '  <tr class="border-bottom-0">
                    <td class="fw-bold px-2 py-1 border-0">Total Current Asset </td>
                    <td class="fw-bold px-2 py-1 border-0"><span
                          
                            class="float-end">'. number_format($totalCurrentAsset) .'
                        </span> </td>

                </tr>';

               
                    $totalCurrent = $businessinfo->cash + $businessinfo->cashown + $businessinfo->inventory;
             
                    $htmlContentpands .='  <tr class="border-0">
                    <td class="border-0 py-2"></td>
                </tr>';
                $htmlContentpands .='   <tr class="border-0">
                    <td class="fw-bold border-0 px-2 py-1" colspan="2">Fixed Asset</td>
                </tr>
                <tr class="border-0">
                    <td class="px-2 py-1 border-0">Plants and Machineries </td>
                    <td class="text-end px-2 py-1 border-0">'. number_format($businessinfo->plants) ?? "Not specified" .'</td>
                </tr>';

                $htmlContentpands .='     <tr class="border-0">
                    <td class="px-2 py-1 border-0">Lands</td>
                    <td class="text-end px-2 py-1 border-0">
                        '.number_format($businessinfo->lands) ?? "Not specified" .'</td>
                </tr> ';
              
                $htmlContentpands .='   <tr class="border-0">
                    <td class="px-2 py-1 border-0">Intangible Asset</td>
                    <td class="text-end px-2 py-1 border-0">
                        '. number_format($businessinfo->intangible) ?? "Not specified" .'</td>
                </tr>';

                $totalFixedAsset = ($businessinfo->plants + $businessinfo->lands + $businessinfo->intangible + $totalCurrent) - ($businessinfo->depreciation);
                $htmlContentpands .='   <tr class="bg-soft-primary border-0">
                   
                    <td class="fw-bold border-0 px-2 py-1" colspan="2">Total Assets<span
                            class="float-end">'. number_format($totalFixedAsset) .'
                        </span> </td>


                </tr>';
                    $totalAsset = $totalCurrentAsset + $totalFixedAsset;
                
                    $htmlContentpands .='   <tr class="border-0">
                    <td class="border-0 py-2"></td>
                </tr>
                <tr class="border-0 px-2 py-1">
                    <td class=" border-0 px-2 py-1 fw-bold">Liabilities and Capitals</td>

                </tr>
                <tr class="border-0 px-2 py-1">
                    <td class="border-0 px-2 py-1">Account Payable</td>
                    <td class="border-0 px-2 py-1"> <span
                            class="float-end">'. number_format($businessinfo->debt) ?? "Not specified" .'
                        </span> </td>
                </tr>';

                $htmlContentpands .='  <tr class="border-0 px-2 py-1">
                    <td class="border-0 px-2 py-1">Taxes payable </td>
                    <td class="border-0 px-2 py-1"><span
                            class="float-end">'.number_format($businessinfo->tax) ?? "Not specified" .'
                        </span> </td>
                </tr>';

                $htmlContentpands .='  <tr class="border-0 px-2 py-1">
                    <td class="border-0 px-2 py-1">Long term Loans </td>
                    <td class="border-0 px-2 py-1"><span
                            class="float-end">'. number_format($businessinfo->loan) ?? "Not specified".'
                        </span> </td>
                </tr>';
                
                $totalCurrentLiabilities = $businessinfo->debt + $businessinfo->tax + $businessinfo->loan;
               $htmlContentpands .='   <tr class="border-bottom-0">
                   
                       
                   
                    <td class="fw-bold px-2 py-1 border-0">Total Liabilities</td>
                    <td class="fw-bold px-2 py-1 border-0 text-end">
                        '.number_format($totalCurrentLiabilities) .'</td>
                </tr>';
                $htmlContentpands .='     <tr class="border-0">
                    <td class="border-0 py-2"></td>
                </tr>
                <tr class="border-0 px-2 py-1">
                    <td class="border-0 px-2 py-1">Capital </td>
                    <td class="border-0 px-2 py-1"><span
                            class="float-end">'. number_format($businessinfo->capital) ?? "Not specified".'
                        </span> </td>
                </tr>';
                
                $htmlContentpands .='  <td class="border-0 px-2 py-1">Net Profit </td>
                <td class="border-0 px-2 py-1"><span
                        class="float-end">'. number_format($revenue) ?? "Not specified".'
                    </span> </td>
                </tr>';

                $totalSharedEquity  = $totalCurrentLiabilities + $businessinfo->capital + $revenue;  
                $htmlContentpands .='  <tr class="bg-soft-primary">
                   
                    <td class="fw-bold">Liabilities and shareholder Equities </td>
                    <td class="fw-bold text-end">'.
                         number_format($totalSharedEquity) .'
                    </td>
                </tr>';

                $htmlContentpands .='   </tbody>
                        </table>




                                  </div>
                             <div>


                        </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentpands);

            $document->AddPage();
            $profit = '
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
            <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Conclusion</h1>
            <p class=" text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->loan_reason . '</p>    
                              
            <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Loan Amount</h1>
            <p class=" text-black" style="text-align: justify;margin-top:10px;font-weight:bold">₦' . number_format($businessinfo->loan_amount) . '</p>     
                
            </body>
            </html>';
            $document->WriteHTML($profit);
            // Output the PDF as a download (change 'I' to 'D' if you want to force download)
            return response($document->Output($businessinfo->business_name.' '.'Business plan.pdf', 'I'), 200, $header);
        }
    }


    public function businessplan($bizid)
    {
        

        if (!Auth::guard('staff')->check()) {
            redirect()->route('staff.login');
        } 
            $businessinfo = Businessinfo::where('id', $bizid)
                ->where('plan_type', 1)
                ->first();
            $user = User::find($businessinfo->user_id);

            $expenses = Expenses::where('businessinfo_id', $businessinfo->id)->where('expense_type', 'Annual')->first();
            $products = Product::where('businessinfo_id', $businessinfo->id)->get();
            $totalProducts = Product::where('businessinfo_id', $businessinfo->id)->count();
            $currentYear = date('Y');
            $loanAmountFormatted = "₦" . number_format($businessinfo->loan_amount);
            $documentFileName = "Business plans.pdf";
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
                           <h2 style="font-size:30px;color:#1c1c1c; font-weight: bold;" class="pe-20">' . $businessinfo->business_name . '</h2>
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
                                  
                             <div  style="text-align:center;margin-top:5%">
                                 <table style="border-collapse: collapse; width: 80%; margin-left: auto; margin-right: auto;">
                              
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

                                 <h1 style="font-size:16px;font-weight:bold;margin-top:10%" class="text-center">Business Address</h1>
                                 <p class="fs-20 text-black text-center" style="text-align: center;margin-top:10px">' . $businessinfo->address . '</p>
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
                                       <td class="text-end"></td>
                                     </tr>
                                     <tr>
                                       <td style="padding-left:20px">Overview</td>
                                       <td class="text-end"></td>
                                     </tr>
                                     <tr>
                                       <td style="padding-left:20px" class="text-capitalize">Executive summary</td>
                                       <td class="text-end"></td>
                                     </tr>
                                     <tr>
                                     <td style="font-weight:bold" class="">Swot Analysis</td>
                                     <td class="text-end"></td>
                                   </tr>
                                     <tr>
                                     <td style="font-weight:bold" class="text-capitalize">Company Description</td>
                                     <td class="text-end"></td>
                                   </tr>
                                   <tr>
                                     <td style="padding-left:20px" class="text-capitalize">Overview</td>
                                     <td class="text-end"></td>
                                   </tr>
                                   <tr>
                                     <td style="padding-left:20px" class="text-capitalize">Mission statement</td>
                                     <td class="text-end"></td>
                                   </tr>
                                   <tr>
                                   <td style="font-weight:bold" class="text-capitalize">Products and services</td>
                                   <td class="text-end"></td>
                                 </tr>
                               
                              
                               <br>
                               <tr> <td style="font-weight:bold" class="text-capitalize">Financial plans</td>
                               <td class="text-end"></td>
                               </tr>
                               <tr>
                               <td style="padding-left:20px" class="text-capitalize">Cash flow</td>
                               <td class="text-end"></td>
                             </tr>
                             <tr>
                             <td style="padding-left:20px" class="text-capitalize">Profit and loss projection</td>
                             <td class="text-end"></td>
                           </tr>
                           <tr>
                         
                         </tr>
                         <tr> <td style="font-weight:bold" class="text-capitalize">Conclusion</td>
                         <td class="text-end"></td>
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
                        <h1 style="color:#1C1C1C;font-size:26px;font-weight:bold;margin-top:0px">Executive Summary</h1>
                      
                       
                             <div class="container" style="margin-top:2%">
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Business Name</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->business_name . '</p>
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Business Model</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->business_model . '</p>
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Audience Need</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Management team</h1>
                             <p class=" text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->management_team. '</p>  
                            

                             <h1 style="color:#1C1C1C;font-size:22px;font-weight:bold;margin-top:30px">Market Analysis</h1>

                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Target market</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->target_market . '</p>    
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Competitive advantage</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->competition_ad . '</p>    
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Marketing Plan</h1>
                             <p class="fs-20 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->audience_need . '</p>    
                           
                         
                             <div>
                        </div>
                        <div class="page-number">
                        
                    </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage2);


            // $document->AddPage();

            // // HTML content for the second page without the background image
            // $htmlContentPage22 = '
            //         <html>
            //         <head>
            //             <style>
            //                 body {
            //                     background-image: url(' . public_path('asset/img/summary.png') . ');
            //                 }
                           
            //             </style>
            //         </head>
            //         <body >
            //             <div class="content " >
                       
            //                  <div class="container" >
                            
                                
                              
                          
                        
            //                  <div>
            //             </div>
            //             <div class="page-number">
                        
            //         </div>
            //         </body>
            //         </html>
            //     ';

            // // Write HTML content to the second page
            // $document->WriteHTML($htmlContentPage22);
            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage33 = '
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
                    <body >
                    <h1 class="fs-24 " style="font-size:20px;color:#818181;">S.W.O.T Analysis</b></h1>
                    <div style="width:100%;height:1px;background-color:#818181"></div>
                        <div class="content " >
                        <h1 style="color:#1c1c1c;font-size:18px;font-weight:bold;margin-top:20px;m-0 p-0">Strength</h1>
                        
                        <p class="fs-22 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->strength . '</p>
                             <div class="container" style="margin-top:2%">
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Weaknesses</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->weakness . '</p>
                                 
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Opportunity</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->opportunity . '</p>
                                   <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Threats</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->threats . '</p>
                                     
                                  
                             <div>
                        </div>
                        <div class="page-number">
                        
                    </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentPage33);
            $document->AddPage();

            // HTML content for the second page without the background image
            $htmlContentPage3 = '
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
                    <body >
                    <h1 class="fs-24 " style="font-size:20px;color:#818181;">Company Description</b></h1>
                    <div style="width:100%;height:1px;background-color:#818181"></div>
                        <div class="content " >
                        <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:20px;m-0 p-0">Overview</h1>
                        
                        <p class="fs-22 text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->about . '</p>
                             <div class="container" style="margin-top:2%">
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px"> Our Mission</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->mission . '</p>
                                 
                             <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">' . $businessinfo->business_age . ' Years Dedicated to Service</h1>
                                   <p class="fs-22 fw-bold" style="text-align: justify">' . $businessinfo->journey . '</p>
                                   
                                  
                             <div>
                        </div>
                        <div class="page-number">
                        
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
                    <h1 class="fs-24 " style="font-size:20px;color:#818181;">Income statement and cash Expenditures for the year ' . $expenses->year . '</b></h1>
                    <div style="width:100%;height:1px;background-color:black"></div>

                             <table class="table table-bordered table-striped" style="margin-top:2%">
                             <tbody>
                                 <tr style="background-color:#000000;color:#fff">
                                     <td colspan="2" class=" fw-bold m-0 p-1 text-white">Income statement</td>
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
                                 <tr class="bg-dark" >
                                     <td class="text-dark text-capitalize p-1 fw-bold" style="font-weight:bold">Total Revenues</td>
                                     <td class="text-dark text-end p-1 fw-bold" style="font-weight:bold">
                                         ' . "₦" . number_format($total) . '
                                     </td>
                                 </tr>
                                 <tr style="background-color:#000000;color:#fff">
                                     <td colspan="2" class=" fw-bold m-0 p-1 text-white">Cash Expenditures</td>
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
                                     <td class="text-dark text-capitalize p-1 fw-bold" style="font-weight:bold">Total Expenses</td>
                                     <td class="text-dark text-end p-1" style="font-weight:bold">
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
                             <div class="container text-center" style="margin-top:2%"><p style="text-align:left"> ';


            $htmlContentpands .= '       ' . $businessinfo->business_name  . ' produces <span style="font-weight:bold">' . $totalProducts . '  </span>Unique products and services namely.</p><ol style="text-align:left">';
            foreach ($products as $product) {
                $htmlContentpands .= '<li>' .  $product->name . '</li> ';
            }


            $htmlContentpands .= '  </ol><p style="text-align:left">The table below provides the summary of the product and services.</p><div  style="text-align:center;margin-top:5%">
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
            $htmlContentpands .= '   
            </table>';







            $htmlContentpands .= '
              <h1 style="font-size: 18px;font-weight:bold;text-align:left;margin-top:40px;margin-bottom:20px">Projected cash inflow by year</h1>
              </tr>   <table style="border-collapse: collapse; margin-left: auto; margin-right: auto;">
                                 <tr style="background-color:black;color:white;border: 1px solid #1c1c1c;"><td style="color:white;border: 1px solid #fff;text-align:center;"></td>';

            for ($i = 0; $i < 4; $i++) {

                $htmlContentpands .= '<td style="color:white;border: 1px solid #fff;text-align:center;">' . ($year = $revyear + $i) . '</td>
                                 
                                      </tr>
                                      
                                      ';
            }


            $htmlContentpands .= ' <tr style="background-color:#D9D9D9;color:black;border: 1px solid #1c1c1c;"><td colspan="5" style="color:black;border: 1px solid #fff;text-align:left;">Cash inflow</td>';
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


            $htmlContentpands .= '   </table>';



            $htmlContentpands .= '
            <h1 style="font-size: 18px;font-weight:bold;text-align:left;margin-top:40px;margin-bottom:20px">Profit And Loss Projection</h1>
            <table class="table table-bordered">
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




                                  </div>
                             <div>


                        </div>
                    </body>
                    </html>
                ';

            // Write HTML content to the second page
            $document->WriteHTML($htmlContentpands);

            $document->AddPage();
            $profit = '
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
            <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Conclusion</h1>
            <p class=" text-black" style="text-align: justify;margin-top:10px">' . $businessinfo->loan_reason . '</p>    
                              
            <h1 style="color:#1c1c1c;font-size:16px;font-weight:bold;margin-top:0px">Loan Amount</h1>
            <p class=" text-black" style="text-align: justify;margin-top:10px;font-weight:bold">₦' . number_format($businessinfo->loan_amount) . '</p>     
                
            </body>
            </html>';
            $document->WriteHTML($profit);
            // Output the PDF as a download (change 'I' to 'D' if you want to force download)
            return response($document->Output($businessinfo->business_name.' '.'Business plan', 'I'), 200, $header);
        
    }
}
