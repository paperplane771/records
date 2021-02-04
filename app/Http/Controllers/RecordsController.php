<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function index()
    {
        return Record::all()->toArray();
    }

    public function add(Request $request)
    {
        $record = new Record([
            'name' => $request->input('name'),
            'size' => $request->input('size'),
            'year' => $request->input('year')
        ]);
        $record->save();
        return response()->json('Пластинка добавлена');
    }

    public function edit($id)
    {
        $record = Record::find($id);
        return response()->json($record);
    }

    public function update($id, Request $request)
    {
        $record = Record::find($id);
        $record->update($request->all());
        return response()->json('Данные о пластинке изменены');
    }

    public function delete($id)
    {
        $record = Record::find($id);
        $record->delete();
        return response()->json('Пластинка удалена');
    }
}
