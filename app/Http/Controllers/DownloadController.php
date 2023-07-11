<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use PDF;

class DownloadController extends Controller
{

    public function previewPdf(Quiz $quiz)
    {
        $questions = Quiz::find($quiz->id)->questions;
        
        return view('preview-pdf', compact('questions', 'quiz'));
    }

    public function downloadPdf(Quiz $quiz)
    {
        $questions = Quiz::find($quiz->id)->questions;

        $pdf = PDF::loadView('preview-pdf', compact('questions', 'quiz'))->setOptions(['defaultFont' => 'sans-serif']);

        $pdf->setPaper('L');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'Quizzy.com', null,
        55, array(0,0,0),2,2,-30);

        $pdf_name = $quiz->slug.'.'.'pdf';

        return $pdf->download($pdf_name);

    }
}
