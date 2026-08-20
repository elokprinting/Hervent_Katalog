<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;

class CatalogDownloadController extends Controller
{
    public function __invoke(): Response
    {
        $lines = [
            'HERVENT - PRODUCT CATALOG',
            'Corporate gifts and custom office souvenirs',
            'PT Aventama Hervent Solusindo | cs@hervent.co.id | 0811-912-502',
            '',
        ];

        foreach (Product::query()->orderByDesc('is_featured')->orderBy('name')->get() as $product) {
            $lines[] = sprintf(
                '%s | %s | Starting from Rp %s',
                $product->name,
                $product->category_label,
                number_format($product->price_min, 0, ',', '.')
            );
        }

        $content = "BT\n/F1 16 Tf\n50 790 Td\n";
        foreach ($lines as $index => $line) {
            if ($index > 0) $content .= "0 -24 Td\n";
            $content .= '(' . $this->escapePdfText($line) . ") Tj\n";
        }
        $content .= "ET\n";

        $objects = [
            1 => '<< /Type /Catalog /Pages 2 0 R >>',
            2 => '<< /Type /Pages /Kids [3 0 R] /Count 1 >>',
            3 => '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 4 0 R >> >> /Contents 5 0 R >>',
            4 => '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>',
            5 => "<< /Length " . strlen($content) . " >>\nstream\n" . $content . "endstream",
        ];

        $pdf = "%PDF-1.4\n";
        $offsets = [0];
        foreach ($objects as $number => $object) {
            $offsets[$number] = strlen($pdf);
            $pdf .= $number . " 0 obj\n" . $object . "\nendobj\n";
        }
        $xrefOffset = strlen($pdf);
        $pdf .= "xref\n0 " . (count($objects) + 1) . "\n0000000000 65535 f \n";
        for ($number = 1; $number <= count($objects); $number++) {
            $pdf .= sprintf("%010d 00000 n \n", $offsets[$number]);
        }
        $pdf .= "trailer\n<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\nstartxref\n" . $xrefOffset . "\n%%EOF";

        return response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="hervent-product-catalog.pdf"',
        ]);
    }

    private function escapePdfText(string $text): string
    {
        $text = preg_replace('/[^\\x20-\\x7E]/', '', $text) ?? '';
        return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
    }
}
