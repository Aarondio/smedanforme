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

    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id); // Example data retrieval, replace this with your logic
        $businessinfo = Businessinfo::find($request->businessinfo_id);

        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', '', 12);

        $this->fpdf->Cell(0, 10, 'Personal Information', 0, 1);
        $this->fpdf->Ln();

        $this->fpdf->Cell(0, 10, 'First name: ' . ($user->firstname ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Middle name: ' . ($user->middlename ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Surname: ' . ($user->surname ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'State: ' . ($user->state ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Local gov.: ' . ($user->lga ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Address: ' . ($user->address ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Phone: ' . ($user->phone ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Email: ' . ($user->email ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Marital status: ' . ($user->marital_status ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Gender: ' . ($user->gender ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Country: ' . ($user->nationality ?? ''), 0, 1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(0, 10, 'Business Information', 0, 1);
        $this->fpdf->Ln();

        $this->fpdf->Cell(0, 10, 'Business name: ' . ($businessinfo->business_name ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Registration Type: ' . ($businessinfo->register_type ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'SUIN: ' . ($businessinfo->suin ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Business sector: ' . ($businessinfo->sector ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'No. of Employees: ' . ($businessinfo->emp_no ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Business Age: ' . ($businessinfo->business_age ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Biz Registered?: ' . ($businessinfo->is_registered ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Loan Amount: ' . ($businessinfo->loan_amount ?? ''), 0, 1);
        $this->fpdf->Cell(0, 10, 'Business Address: ' . ($businessinfo->address ?? ''), 0, 1);

        $this->fpdf->Ln();

        $this->fpdf->Cell(0, 10, 'Executive Summary', 0, 1);
        $this->fpdf->MultiCell(0, 10, ($businessinfo->audience_need ?? ''), 0, 'L');
        $this->fpdf->Ln();

        $this->fpdf->Cell(0, 10, 'Our Advantages', 0, 1);
        $this->fpdf->MultiCell(0, 10, ($businessinfo->competition_ad ?? ''), 0, 'L');
        // ... Add other sections similarly

        //    $this->fpdf->Output('application.pdf', 'D');
        $this->fpdf->Output();

        exit;
    }
}
