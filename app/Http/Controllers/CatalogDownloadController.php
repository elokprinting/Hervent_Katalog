<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CatalogDownloadController extends Controller
{
    public function __invoke(Request $request): BinaryFileResponse
    {
        $data = $request->validate([
            'salutation' => ['nullable', 'in:Bapak,Ibu'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:30'],
            'job_title' => ['nullable', 'string', 'max:100'],
            'company' => ['nullable', 'string', 'max:150'],
        ]);

        Log::info('Company catalog downloaded', $data);

        $path = public_path('Brand Identity HERVENT.pdf');
        abort_unless(is_file($path), 404, 'Katalog tidak ditemukan.');

        return response()->download($path, 'Brand Identity HERVENT.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
