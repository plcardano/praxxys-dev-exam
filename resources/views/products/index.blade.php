@extends('layouts.admin')

@section('content')

    <div id="app">
        <index-prod :product="{{ $product }}" />
    </div>
    

    
    <script src="{{ asset('js/app.js') }}"></script>
@endsection



@section('scripts')

    <!-- Page level plugins -->
    <script src="{{ asset("vendor/datatables/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("vendor/datatables/dataTables.bootstrap4.js") }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset("js/demo/datatables-demo.js") }}"></script>

    
@endsection
