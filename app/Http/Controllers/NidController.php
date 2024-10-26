<?php

namespace App\Http\Controllers;

use App\Models\NID;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Spatie\Image\Image;
class NidController extends Controller
{
    public function showForm()
    {
        return view('upload-nid');
    }

    public function processUpload(Request $request)
    {
        $request->validate([
            'nid_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('nid_image')->store('nid_images', 'public');

        $ocr = new TesseractOCR(storage_path('app/public/' . $imagePath));
        $text = $ocr->run();

        $nidData = $this->parseNidData($text);

        if (!empty($nidData['nid'])) {
            NID::create([
                'nid_number' => $nidData['nid'],
                'name' => $nidData['name'] ?? null,
                'dob' => $nidData['dob'] ?? null,
            ]);
        }

        return view('nid-result', ['nidData' => $nidData]);
    }


    private function parseNidData($text)
    {
        $data = [];

        // Parse NID number
        if (preg_match('/ID\s*(NO\:)?\s*(\d+)(?=\n|$)/i', $text, $matches)) {
            $data['nid'] = $matches[2];
        }

        // Parse Name (captures only until a newline or the end of the line)
        if (preg_match('/Name\s*:\s*([A-Za-z\s]+)(?=\n|$)/i', $text, $matches)) {
            $data['name'] = trim($matches[1]);
        }

        // Parse Date of Birth (stops at newline or end of line)
        if (preg_match('/Date\s*of\s*Birth\s*:\s*(\d{2}\s+[A-Za-z]{3}\s+\d{4})(?=\n|$)/i', $text, $matches)) {
            $data['dob'] = trim($matches[1]);
        }

        return $data;
    }

}