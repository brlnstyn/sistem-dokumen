@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Document</h2>
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
            <th>Nama Nasabah</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Remark</th>
        </tr>
        @foreach ($details as $detail)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $detail->document_no }}</td>
                <td>{{ $detail->nama_nasabah }}</td>
                <td>{{ $detail->amount }}</td>
                <td>{{ $detail->status }}</td>
                <td>{{ $detail->remark }}</td>
            </tr>
        @endforeach
    </table>

    {!! $details->links() !!}
@endsection
