<?php

namespace App\Exports;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItensExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $userId = Auth::user()->id;

        if (Auth::user()->profile == 'admin') {
            $query = Item::query();
        } else {
            $query = Item::where('user_id', $userId);
        }

        return $query->get(['id', 'title', 'description', 'author', 'publishing_company', 'img_url']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Titulo',
            'Descrição',
            'Autor',
            'Editora',
            'url_capa'
        ];
    }
}
