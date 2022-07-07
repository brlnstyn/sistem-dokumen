@extends('layout.king')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Document</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('documents.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Document No</th>
            <th>Document Subject</th>
            <th>Nama Nasabah</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($documents as $document)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $document->document_no }}</td>
                <td>{{ $document->document_subject }}</td>
                <td>{{ $document->nama_nasabah }}</td>
                <td>{{ $document->status }}</td>
                <td>
                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST">

                        {{-- <a class="btn btn-primary" href="{{ route('documents.edit', $document->id) }}">Edit</a> --}}

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"
                            onclick="confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $documents->links() !!}
@endsection
