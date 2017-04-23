@extends('admin.layout')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2>产品管理 - 添加</h2>
                    </div>
                </div>
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body pt0 pb0">
                                {{ Form::open(array('route' => ['item.store'], 'class'=>'form-horizontal group-border stripped', 'id'=>'form')) }}
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">产品名称</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" name="name" class="form-control" value="">
                                            <label class="help-block" for="name"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">产品分类</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select name="categories[]" class="select2 form-control" multiple="multiple">
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <label class="help-block" for="categories[]"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">产品描述</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea name="description" class="form-control" rows="5" placeholder="请输入"></textarea>
                                            <label class="help-block" for="description"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    @foreach ($attributes as $name=>$attribute)
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">{{$attribute}}</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" name="{{$name}}_title" class="form-control" value="" placeholder="输入标题">
                                            <textarea name="{{$name}}_content" class="form-control" rows="5" placeholder="内容"></textarea>
                                            <label class="help-block" for="{{$name}}_title"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    @endforeach
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">天猫链接</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" name="tmall_url" class="form-control" value="">
                                            <label class="help-block" for="tmall_url"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">产品缩略图</label>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="thumb-preview">
                                            </div>
                                            <input type="file" name="thumbnail" class="filestyle" data-buttonText="Find file" data-buttonName="btn-danger" data-iconName="fa fa-plus">
                                            <label class="help-block" for="thumbnail"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">产品详图</label>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="thumb-preview">
                                            </div>
                                            <input type="file" name="image" class="filestyle" data-buttonText="Find file" data-buttonName="btn-danger" data-iconName="fa fa-plus">
                                            <label class="help-block" for="image"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">页面模板</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select name="template" class="select2 form-control">
                                                <option value="">选择页面模板</option>
                                                @foreach ($templates as $key=>$template)
                                                <option value="{{$key}}">{{$template}}</option>
                                                @endforeach
                                            </select>
                                            <label class="help-block" for="template"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label"></label>
                                        <div class="col-lg-10 col-md-9">
                                            <button class="btn btn-default ml15" type="submit">提 交</button>
                                            <a class="btn btn-default ml15" href="{{url('admin/page/index')}}">返回</a>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    {{ Form::close() }}
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
                    <!-- col-lg-12 end here -->
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
    $('.select2').select2();
    $('#form').ajaxForm({
        dataType: 'json',
        success: function() {
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            location.href='{{route("item.index")}}';
        },
        error: function(xhr){
            var json = jQuery.parseJSON(xhr.responseText);
            var keys = Object.keys(json);
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            $('#form .form-group').each(function(){
                var name = $(this).find('select').attr('name') || $(this).find('input,textarea').attr('name');
                console.log(name);
                if( jQuery.inArray(name, keys) != -1){
                    $(this).addClass('has-error');
                    $(this).find('.help-block').html(json[name]);
                }
            })
        }
    });
    $('.filestyle').change(function(){
        var preview = $(this).parent().find('.thumb-preview');
        preview.html('');
        var reader = new FileReader();
        reader.onload = function (event) {
            preview.append('<img src="'+event.target.result+'" />');
        }
        reader.readAsDataURL(this.files[0]);
    })

});
</script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
    $('.article-ckeditor').ckeditor({
        filebrowserBrowseUrl: '{!! url('filemanager/index.html') !!}'
    });
</script>
@endsection
