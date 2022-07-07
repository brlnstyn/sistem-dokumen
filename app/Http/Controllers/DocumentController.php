<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Detail;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::latest()->paginate(5);
        return view('documents.index', compact('documents'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'document_no' => 'required',
            'document_subject' => 'required',
            'nama_nasabah' => 'required',
        ]);

        Document::create($validate);
        // Detail::create([
        //     'document_no' => $validate['document_no'],
        //     'document_subject' => $validate['document_subject'],
        //     'nama_nasabah' => $validate['nama_nasabah'],
        //     // 'status' => $request['status'],
        //     // 'remark' => $request['remark'],
        // ]);
        return redirect()->route('documents.index')
            ->with('success', 'Berhasil menyimpan');

        // $request->validate([
        //     'document_no' => 'required',
        //     'document_subject' => 'required',
        // ]);

        // Document::create($request->all());
        // return redirect()->route('documents.index')
        //     ->with('success', 'Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('details.create', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $validate = $request->validate([
            'document_no' => 'required',
            'document_subject' => 'required',
            'nama_nasabah' => 'required',
            'status' => 'required',
            'remark' => 'required'
        ]);

        Detail::create([
            'document_no' => $validate['document_no'],
            'nama_nasabah' => $validate['nama_nasabah'],
            'status' => $validate['status'],
            'remark' => $validate['remark']
        ]);

        $document->update($request->all());
        return redirect()->route('details.index')
            ->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index')
            ->with('success', 'Berhasil Hapus');
    }
}
