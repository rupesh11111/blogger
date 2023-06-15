@extends('layout')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h2 class="box-title" class="pull-left">
                                Lists of {{ (Auth::user())?->role?->name == 'admin' ? 'All ' : 'Your ' }} Blogs
                            </h2>

                            <br/>
                            <div>
                            <a href="{{ route('blog.create') }}" class="ajaxModalPopup pull-right btn btn-sm btn-primary"
                                data-modal_size="modal-lg" data-modal_title="ADD NEW BLOG">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> ADD NEW BLOG
                            </a>
                            <a href="{{ route('logout') }}" class="ajaxModalPopup pull-right btn btn-sm btn-primary" style="float:right;"
                                data-modal_size="modal-lg" data-modal_title="ADD NEW BLOG">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> LOGOUT
                            </a>
                        </div>

                        </div>
                        <br/>
                        <div style="clear: both;"></div>
                        <div class="box-body">
                            <table id="ajaxDataTable"
                                class="table table-striped table-bordered table-hover order-column dataTable ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>BLOG IMAGE</th>
                                        <th>BLOG TITLE</th>
                                        <th>BLOGGER NAME</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
@section('js')
    <script type="text/javascript">
         url = "{{ route('dashboard') }}"
         columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'image',
                name: 'image'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'blogger.name',
                name: 'blogger.name'
            },
        ];
    </script>
@stop
