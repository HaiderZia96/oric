@extends('admin.layouts.app')
@section('title','Success_Stories')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-4">
            <p class="page-title">Success_Stories</p>
            <a class="btn btn-sm btn-success" href="{{route('success_story.create')}}">Add New</a>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">image</th>
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
                ajax: "{{route('getSuccessStories')}}",
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'designation' }, 
                    { data: null,orderable:false  },
                    { data: null}
                ],
                columnDefs: [
                    {
                        render: function (data,type,row,meta) {
                            var Images ='{{ asset('/front/img/Success_Story/')}}/'+data.image;
                            if(data.image){
                                return '<img src="' + Images + '" height="50" width="50" alt="No Image Uploaded"/>';
                                }else{
                                return 'Image Not Uploaded';
                            }
                        },
                        searchable:false,
                        orderable:false,
                        targets: 3
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
                        // render: function (data,type,row,meta) {
                        //     var edit ='{{ route("success_story.edit", ":id") }}';
                        //     edit = edit.replace(':id', data.id);
                        //     var del ='{{ route("success_story.destroy", ":id") }}';
                        //     del = del.replace(':id', data.id);

                        //     return '<div class="d-flex">' +
                        //         @can('success_story-edit')
                        //             '<a href="'+edit+'" class="btn btn-sm btn-warning mx-2"><i class="fa fa-edit"></i></a>'+
                        //         @endcan
                        //             @can('success_story-delete')
                        //             '<form action="'+del+'" method="POST">'+
                        //         '<input type="hidden" name="_token" value="{{ csrf_token() }}">'+
                        //         '<input type="hidden" name="_method" value="delete" />'+
                        //         '<button type="submit" class="btn btn-sm btn-danger mx-2" onclick="return confirm(`Are you sure?`)"><i class="fa fa-trash"></i></button>'+
                        //         '</form>'+
                        //         @endcan
                        //             '</div>';
                        // },
                        render: function (data,type,row,meta) {
                            var edit ='{{ route("success_story.edit", ":id") }}';
                            edit = edit.replace(':id', data.id);
                            var del ='{{ route("success_story.delete", ":id") }}';
                            del = del.replace(':id', data.id);
                            var sdel ='{{ route("success_story.destroy", ":id") }}';
                            sdel = sdel.replace(':id', data.id);
                            var restore ='{{ route("success_story.restore", ":id") }}';
                            restore = restore.replace(':id', data.id);

                            if(data.deleted_at =='1'){
                                return '<div class="d-flex">'+  
                                @can('success_story-restore')
                                    '<a href="'+restore+'" class="btn btn-sm btn-warning mx-2">restore</a>'+
                                @endcan
                                @can('success_story-delete')
                                    '<form action="'+del+'" method="POST">'+
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">'+
                                    '<input type="hidden" name="_method" value="delete" />'+
                                    '<button type="submit" class="btn btn-sm btn-danger mx-2" onclick="return confirm(Are you sure?)"><i class="fa fa-trash"></i></button>'+
                                    '</form>'+
                                @endcan
                                 '</div>';
                                }
                                if(data.deleted_at=='0'){ 
                                return  '<div class="d-flex">'+
                                @can('success_story-edit')
                                    '<a href="'+edit+'" class="btn btn-sm btn-warning mx-2"><i class="fa fa-edit"></i></a>'+
                                @endcan
                                @can('success_story-softdelete')
                                    '<form action="'+sdel+'" method="POST">'+
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">'+
                                    '<input type="hidden" name="_method" value="delete" />'+
                                    '<button type="submit" class="btn btn-sm btn-danger mx-2" onclick="return confirm(Are you sure?)"><i class="fa fa-trash"></i></button>'+
                                    '</form>'+
                                @endcan
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
