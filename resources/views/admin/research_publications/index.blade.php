@extends('admin.layouts.app')
@section('title','All Researches')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-4">
            <p class="page-title">Researches & Publications</p>
            <a class="btn btn-sm btn-success" href="{{route('research-publication.create')}}">Add New</a>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm dataTable">
                        <thead>
                        <tr>
                                <th scope="col">#</th>
                                <th scope="col">Author</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>     
                                <th scope="col">Volume No</th>     
                                <th scope="col">DOI</th>     
                                <th scope="col">Impact Factor</th>     
                                <th scope="col">Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function (){
            var t = $('.dataTable').DataTable({
                processing: true,
                serverSide: true,
                "lengthMenu": [[10,25,50,100,500,1000,100000000], [10,25,50,100,500,1000,"All"]],
                order:[[0,'desc']],
                ajax: "{{route('getResearchIndex')}}",
                dom: 'lBfrtip',
                buttons: [
                    'copy', // Copy to clipboard
                    'csv',  // Export as CSV
                    'excel',
                    'pdf',
                    'print' // Export as Excel
                ],
                columns: [
                    { data: 'id',orderable:false },
                    { data: 'author' },
                    { data: 'name' },
                    { data: 'title' },
                    { data: 'volume_no' },
                    { data: 'DOI' },
                    { data: 'impact_factor' },
                    { data: null },
                ],
                columnDefs: [
                    {
                        render: function ( data, type, row,meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        searchable:false,
                        orderable:true,
                        targets: 0  
                    },
                    {
                        render: function (data,type,row,meta) {
                            var edit ='{{ route("research-publication.edit", ":id") }}';
                            edit = edit.replace(':id', data.id);
                            var del ='{{ route("research-publication.delete", ":id") }}';
                            del = del.replace(':id', data.id);
                            var sdel ='{{ route("research-publication.destroy", ":id") }}';
                            sdel = sdel.replace(':id', data.id);
                            var restore ='{{ route("research-publication.restore", ":id") }}';
                            restore = restore.replace(':id', data.id);

                            if(data.deleted_at =='1'){
                                return '<div class="d-flex">'+  
                                    '<a href="'+restore+'" class="btn btn-sm btn-warning mx-2">restore</a>'+
                                    '<form action="'+del+'" method="POST">'+
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">'+
                                    '<input type="hidden" name="_method" value="delete" />'+
                                    '<button type="submit" class="btn btn-sm btn-danger mx-2" onclick="return confirm(Are you sure?)"><i class="fa fa-trash"></i></button>'+
                                    '</form>'+
                                 '</div>';
                                }
                                if(data.deleted_at=='0'){ 
                                return  '<div class="d-flex">'+
                                    '<a href="'+edit+'" class="btn btn-sm btn-warning mx-2"><i class="fa fa-edit"></i></a>'+
                                    '<form action="'+sdel+'" method="POST">'+
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">'+
                                    '<input type="hidden" name="_method" value="delete" />'+
                                    '<button type="submit" class="btn btn-sm btn-danger mx-2" onclick="return confirm(Are you sure?)"><i class="fa fa-trash"></i></button>'+
                                    '</form>'+
                                 '</div>';
                                }    
                        },
                        searchable:false,
                        orderable:false,
                        targets: -1
                    }
                ]
            });
          
        });
    </script>
@endpush
