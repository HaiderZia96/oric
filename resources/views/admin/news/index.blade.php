@extends('admin.layouts.app')
@section('title','All News & Events')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-4">
            <p class="page-title">News & Events</p>
            <a class="btn btn-sm btn-success" href="{{route('news-event.create')}}">Add New</a>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">category</th>     
                            <th scope="col">Project</th>     
                            <th scope="col">Tags</th>     
                            <th scope="col">Thumbnail</th>    
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
                order:[[0,'desc']],
                ajax: "{{route('getIndex')}}",
                columns: [
                    { data: 'id',orderable:false },
                    { data: 'name' },
                    { data: 'event_date' },
                    { data: 'news_categories_id' },
                    { data: 'project_id' },
                    { data: 'tag' },
                    { data: null },
                    { data: null}
                ],
                columnDefs: [
                    {
                        render: function (data,type,row,meta) {
                            var Imagess ='https://tuf.edu.pk/Main/frontend/images/NewsAndEvents/thumbnail/'+data.thumbnail;
                                return '<img src="' + Imagess + '" height="50" width="50" alt="No Image Uploaded"/>';
                        },
                        searchable:false,
                        orderable:false,
                        targets: 6
                    },
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
                            var edit ='{{ route("news-event.edit", ":id") }}';
                            edit = edit.replace(':id', data.id);
                            var del ='{{ route("news-event.delete", ":id") }}';
                            del = del.replace(':id', data.id);
                            var sdel ='{{ route("news-event.destroy", ":id") }}';
                            sdel = sdel.replace(':id', data.id);
                            var restore ='{{ route("news-event.restore", ":id") }}';
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
