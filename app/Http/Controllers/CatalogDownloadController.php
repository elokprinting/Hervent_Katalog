<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class CatalogDownloadController extends Controller
{
    public function __invoke(Request $request): BinaryFileResponse
    {
        $data = $request->validate([
            'salutation' => ['nullable', 'in:Bapak,Ibu'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:30'],
            'job_title' => ['nullable', 'string', 'max:100'],
            'company' => ['required', 'string', 'max:150'],
        ]);

        $path = public_path('Brand Identity HERVENT.pdf');
        abort_unless(is_file($path), 404, 'Katalog tidak ditemukan.');

        Log::info('Company catalog downloaded', $data);

        try {
            Mail::raw(implode("\n", [
                'Ada permintaan download katalog HERVENT.',
                '',
                'Nama: ' . trim(($data['salutation'] ?? '') . ' ' . $data['name']),
                'Email: ' . $data['email'],
                'Perusahaan: ' . $data['company'],
                'WhatsApp: ' . ($data['whatsapp'] ?? '-'),
                'Jabatan: ' . ($data['job_title'] ?? '-'),
            ]), function ($message) use ($data) {
                $message->to(config('mail.catalog_recipient'))
                    ->subject('Permintaan Download Katalog HERVENT')
                    ->replyTo($data['email'], $data['name']);
            });
        } catch (Throwable $exception) {
            Log::error('Catalog download email failed', [
                'email' => $data['email'],
                'error' => $exception->getMessage(),
            ]);
        }

        return response()->download($path, 'Brand Identity HERVENT.pdf', [
            'Content-Type' => 'application/pdf',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
