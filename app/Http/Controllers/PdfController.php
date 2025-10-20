<?php

namespace App\Http\Controllers;

use App\Models\ToolAttribute;
use App\Models\ToolClass;
use App\Models\ToolType;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

use function Livewire\store;

class PdfController extends Controller
{
    public function exportPdfClasses()
    {
        $toolClasses = ToolClass::all();

        $html = view('livewire.view.pdf.pdf-listClasses', compact('toolClasses'))->render();

        $pdfPath = storage_path('app/public/pdf/reportClasses.pdf');

        Browsershot::html($html)
            ->setOption('args', ['--no-sanbox'])
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(false);
    }

    public function exportPdfClass($id)
    {
        $toolClass = ToolClass::findOrFail($id);

        $html = view('livewire.view.pdf.pdf-showClass', compact('toolClass'))->render();
        
        $pdfPath = storage_path('app/public/pdf/reportClass.pdf');

        Browsershot::html($html)
            ->setOption('args', ['--no-sanbox'])
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(false);
    }

    public function exportPdfToolTypes()
    {
        $toolTypes = ToolType::all();

        $html = view('livewire.view.pdf.pdf-listToolTypes', compact('toolTypes'))->render();

        $pdfPath = storage_path('app/public/pdf/reportToolTypes.pdf');

        Browsershot::html($html)
            ->setOption('args', ['--no-sanbox'])
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(false);
    }

    public function exportPdfToolType($id)
    {
        $toolType = ToolType::findOrFail($id);

        $html = view('livewire.view.pdf.pdf-showToolType', compact('toolType'))->render();

        $pdfPath = storage_path('app/public/pdf/reportToolType.pdf');

        Browsershot::html($html)
            ->setOption('args', ['--no-sanbox'])
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(false);
    }

    public function exportPdfToolAttributes()
    {
        $toolAttributes = ToolAttribute::all();

        $html = view('livewire.view.pdf.pdf-listToolAttributes', compact('toolAttributes'))->render();

        $pdfPath = storage_path('app/public/pdf/reportToolAttributes.pdf');

         Browsershot::html($html)
            ->setOption('args', ['--no-sanbox'])
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(false);

    }
}
