@extends('admin.layout')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2></h2>
                        <span class="txt"></span>
                    </div>

                </div>
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-heading white-bg">
                                <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="fa fa-circle-o"></i></a><a href="#" class="toggle panel-minimize"><i class="fa fa-angle-up"></i></a><a href="#" class="panel-close"><i class="fa fa-times"></i></a></div></div>
                            <div class="panel-body">
                                <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>分类名</th>
                                        <th>排序</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($rows as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->sort_id }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row-> updated_at }}</td>
                                            <td>
                                                <a href="{{route('category.edit',['id'=>$row->id])}}" class="label label-info">编辑</a>
                                                <a href="{{route('category.destroy',['id'=>$row->id])}}" class="delete label label-info">删除</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="dataTables_paginate paging_bootstrap" id="basic-datatables_paginate">
                                            {!! $rows->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
                </div>
                <!-- End .row -->
            </div>
            <!-- End .page-content-inner -->
        </div>
        <!-- / page-content-wrapper -->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            //$('.select2').select2();
            $('.delete').click(function(){
                var url = $(this).attr('href');
                var obj = $(this).parents('td').parent('tr');
                if( confirm('该操作无法返回,是否继续?')){
                    $.ajax(url, {
                        dataType: 'json',
                        type: 'delete',
                        success: function(json){
                            if(json.ret == 0){
                                obj.remove();
                            }
                        },
                        error: function(){
                            alert('请求失败~');
                        }
                    });
                }
                return false;
            })
        });
    </script>
@endsection
