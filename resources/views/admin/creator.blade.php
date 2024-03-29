@extends('admin.layout.main')
@push('css')
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sl-1.6.2/datatables.min.css"
        rel="stylesheet" />
    <style>
        .card img {
            width: 80%;
            height: 100%;
            margin: auto;
        }
    </style>
@endpush
@section('title')
クリエイター管理  
@endsection
@section('content')
    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="d35d4be0-e396-b0b7-ac3a-caab03415c00">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="orange">
                                <i class="material-icons">assignment</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">クリエイター</h4>
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    
                                </div>
                                <div class="material-datatables">
                                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatables"
                                                    class="table table-striped table-no-bordered table-hover dataTable dtr-inline"
                                                    cellspacing="0" width="100%" style="width: 100%;" role="grid"
                                                    aria-describedby="datatables_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="datatables"
                                                                rowspan="1" colspan="1" style="width: 100px;"
                                                                aria-label="Name: activate to sort column ascending">画像
                                                            </th>
                                                            <th class="sorting_desc" tabindex="0"
                                                                aria-controls="datatables" rowspan="1" colspan="1"
                                                                style="width: 100px;"
                                                                aria-label="Position: activate to sort column ascending"
                                                                aria-sort="descending">名前</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatables"
                                                                rowspan="1" colspan="1" style="width: 150px;"
                                                                aria-label="Office: activate to sort column ascending">
                                                                メール</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatables"
                                                                rowspan="1" colspan="1" style="width: 300px;"
                                                                aria-label="Age: activate to sort column ascending">プロジェクト
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end content-->
                        </div>
                        <!--  end card  -->
                    </div>
                    <!-- end col-md-12 -->
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sl-1.6.2/datatables.min.js">
    </script>
    <script>
        let table = new DataTable('#datatables', {
            language: {
                "sEmptyTable": "データテーブルに利用できるデータがありません",
                "sInfo": "_TOTAL_ 件中 _START_ から _END_ まで表示",
                "sInfoEmpty": "0 件中 0 から 0 まで表示",
                "sInfoFiltered": "（全 _MAX_ 件より抽出）",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "_MENU_ 件表示",
                "sLoadingRecords": "ローディング...",
                "sProcessing": "処理中...",
                "sSearch": "検索:",
                "sZeroRecords": "一致するレコードがありません",
                "oPaginate": {
                    "sFirst": "最初",
                    "sLast": "最後",
                    "sNext": "次",
                    "sPrevious": "前"
                },
                "oAria": {
                    "sSortAscending": ": 昇順でソート",
                    "sSortDescending": ": 降順でソート"
                },
                "select": {
                    "rows": {
                        "_": "%d 件のレコードが選択されています",
                        "0": "",
                        "1": "1 件のレコードが選択されています"
                    }
                }
            },
            responsive: true,
            processing: true,
            serverSide: true,
            pageLength: 3,
            ajax: "{{ route('admin.getAllUsers') }}",
            columns: [{
                    data: 'avatar',
                    name: 'avatar',
                    render: function(data) {
                        return `
                        <div class="card-avatar">
                                            <a href="#pablo">
                                                <img class="img" src="${data}">
                                            <div class="ripple-container"></div></a>
                                        </div>`;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'project',
                    name: 'project',
                }
            ],


        })
    </script>
@endpush
