@extends('admin.layouts.admin')

@section('title')
    Send Mail
@endsection

@section('underhead')
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor/plugin/samples/css/samples.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor/plugin/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/multiselect/dist/filter_multi_select.css') }}" />
@endsection

@section('main')
    <!-- Main content -->
    <section>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                 <div class="box">
                    <div class="box-header">
                         <a href="{{ url('admin/mailinfo') }}"><h4><i class="fa fa-mail-reply fa-th-large"></i></h4></a>
                         <center><h3>Sending Mail</h3></center>
                     </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="nav nav-tabs nav-justified nav-pills" style="margin: 20px 0 20px 0;">
                            @foreach($mailerCategories as $category)
                                <li @if($category->id == $defaultCategoryId) class="active" @endif>
                                    <a href="{{ url('admin/mailinfo/send-message?category_id=' . $category->id) }}">
                                        @if($category->id == 1)
                                            <i class="fa fa-shopping-bag"></i>{{ $category->title }}
                                        @elseif($category->id == 2)
                                            <i class="fa fa-users"></i>{{ $category->title }}
                                        @else
                                            <i class="fa fa-user"></i>{{ $category->title }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <form method="POST" action="{{ route('mailinfo.store-message') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="title">Subject</label>
                                <input class="form-control py-4" id="title" type="text" name="subject" placeholder="Enter Subject" required/>
                                @if ($errors->has('subject'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('subject') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="emailList">Email List</label>
                                <select name="emailList[]" id="emailList" multiple required>
                                    @for($i=0;$i<count($allMailers);$i++)
                                        <option value="{{ $allMailers[$i] }}">{{ $allMailers[$i] }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label class="small mb-1" for="accept-editor">Content</label>
                                <textarea id="accept-editor" name="contents"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="file_url">Attempt File</label>
                                <input class="form-control py-4" id="file_url" type="file" name="fileUrl" placeholder="Pls Select File"/>
                                @if ($errors->has('fileUrl'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('fileUrl') }}
                                    </small>
                                @endif
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Send Mail</button>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('customjs')

    <script src="{{ asset('plugins/ckeditor/plugin/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/multiselect/dist/filter-multi-select-bundle.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            var shapes = $('#emailList').filterMultiSelect({
                selectAllText: 'all...',
                placeholderText: 'click to select a Email',
                filterText: 'search',
                caseSensitive: true,
            });

            CKEDITOR.replace( 'accept-editor' );
        });
    </script>

@endsection