<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Businessinfo;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function justifiedText($text, $maxWidth, $font = 'Arial', $fontSize = 12)
    {
        $words = explode(' ', $text);
        $this->fpdf->SetFont($font, '', $fontSize);
        $currentWidth = 0;
        $line = '';

        foreach ($words as $word) {
            $wordWidth = $this->fpdf->GetStringWidth($word);

            if ($currentWidth + $wordWidth <= $maxWidth) {
                $line .= $word . ' ';
                $currentWidth += $wordWidth + $this->fpdf->GetStringWidth(' ');
            } else {
                $this->fpdf->Cell(0, $fontSize, $line, 0, 1, 'J');
                $line = $word . ' ';
                $currentWidth = $wordWidth + $this->fpdf->GetStringWidth(' ');
            }
        }

        if ($line !== '') {
            $this->fpdf->Cell(0, $fontSize, $line, 0, 1, 'J');
        }
    }

    public function index(Request $request, $bizno)
    {
        $user = User::find(Auth::user()->id); // Example data retrieval, replace this with your logic
        $businessinfo = Businessinfo::where('business_no', $bizno)->first();

        $this->fpdf->AddPage();
        $imagePath = 'http:://127.0.0.1:8000/assets/img/cover.png';
        $img =  asset('assets/img/cover.png');
        $this->fpdf->Image('https://eappointment.com.ng/public/assets/cover.png', 0, 0, $this->fpdf->GetPageWidth(), $this->fpdf->GetPageHeight());
        $this->fpdf->SetFont('Arial', '', 32);
        $this->fpdf->Cell(0, 150, '', 0, 1); // Empty cell to create space


        $this->fpdf->SetTextColor(255, 255, 255); // Set text color to white
        $this->fpdf->Cell(0, 10, 'Business Plan', 0, 1);
        $this->fpdf->SetFont('Arial', '', 16);
        $this->fpdf->Cell(0, 10, ($businessinfo->business_name ?? ''), 0, 1);
        $this->fpdf->Cell(0, 30, '', 0, 1);

        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(0, 10, ($user->firstname ?? '') . ' ' . ($user->middlename ?? '') . ' ' . ($user->surname ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, ($user->address ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, ($businessinfo->address ?? ''), 0, 1);

        $this->fpdf->Cell(0, 10, ($user->phone ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, ($user->email ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, ($user->website ?? ''), 0, 1);
        $this->fpdf->Ln();
        $this->fpdf->SetTextColor(0, 0, 0); // Set 
        $this->fpdf->AddPage();

        // $this->fpdf->Cell(0, 10, 'Surname: ' . ($user->surname ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'State: ' . ($user->state ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Local gov.: ' . ($user->lga ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Address: ' . ($user->address ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Phone: ' . ($user->phone ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Email: ' . ($user->email ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Marital status: ' . ($user->marital_status ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Gender: ' . ($user->gender ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Country: ' . ($user->nationality ?? ''), 0, 1);


        // $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 18);
        $this->fpdf->Cell(0, 10, 'Executive Summary', 0, 1);

        $startX = $this->fpdf->GetX(); // Get current X position
        $startY = $this->fpdf->GetY(); // Get current Y position

        $this->fpdf->Line($startX, $startY, $startX + 190, $startY); // Draw a line after the text

        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Cell(0, 10, 'Problem Worth Solving', 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->audience_need ?? ''), 0, 'L');
        // $this->justifiedText($businessinfo->audience_need ?? '', 190);
        // Width of A4 paper in millimeters
        $A4WidthMM = 190;
        $fpdfConversionFactor = $A4WidthMM / 190; // Assuming width in FPDF units is 210

        // Usage in justifiedText function
        $this->justifiedText($businessinfo->audience_need ?? '', $A4WidthMM / $fpdfConversionFactor, 'Arial', 12);


        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Cell(0, 10, 'Our Advantages', 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->business_model ?? ''), 0, 'L');
        $this->justifiedText($businessinfo->business_model ?? '', 192);



        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Cell(0, 10, 'Target Market', 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->MultiCell(0, 10, ($businessinfo->target_market ?? ''), 0, 'L');

        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Cell(0, 10, 'Management Team', 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->management_team ?? ''), 0, 'L');
        $this->justifiedText($businessinfo->management_team ?? '', 190);

        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Cell(0, 10, 'Loan Reason', 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->loan_reason ?? ''), 0, 'L');
        $this->justifiedText($businessinfo->loan_reason ?? '', 190);


        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Cell(0, 10, 'Profit Generation', 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->loan_reason ?? ''), 0, 'L');
        $this->justifiedText($businessinfo->business_model  ?? '', 190);


        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Cell(0, 10, 'Loan Amount', 0, 1);
        $this->fpdf->SetFont('Arial', '', 13);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->loan_reason ?? ''), 0, 'L');
        $loanAmount = number_format($businessinfo->loan_amount ?? 0, 0, '.', ',');
       
        // $this->justifiedText($amount, 190);
        $this->fpdf->MultiCell(0, 10, $loanAmount, 0, 'L');



        // $this->fpdf->Cell(0, 10, 'SUIN: ' . ($businessinfo->suin ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Business sector: ' . ($businessinfo->sector ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'No. of Employees: ' . ($businessinfo->emp_no ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Business Age: ' . ($businessinfo->business_age ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Biz Registered?: ' . ($businessinfo->is_registered ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Loan Amount: ' . ($businessinfo->loan_amount ?? ''), 0, 1);
        // $this->fpdf->Cell(0, 10, 'Business Address: ' . ($businessinfo->address ?? ''), 0, 1);

        // $this->fpdf->Ln();

        // $this->fpdf->Cell(0, 10, 'Executive Summary', 0, 1);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->audience_need ?? ''), 0, 'L');
        // $this->fpdf->Ln();

        // $this->fpdf->Cell(0, 10, 'Our Advantages', 0, 1);
        // $this->fpdf->MultiCell(0, 10, ($businessinfo->competition_ad ?? ''), 0, 'L');
        // ... Add other sections similarly

        //    $this->fpdf->Output('application.pdf', 'D');
        $this->fpdf->Output();

        exit;
    }
}
