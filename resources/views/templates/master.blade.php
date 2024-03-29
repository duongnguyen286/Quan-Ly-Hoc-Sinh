<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    {{--    <link href="/{!! url('public/css/bootstrap.min.css') !!}" type="text/css" rel="stylesheet"/>--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>

    {{--    https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css--}}
    {{--    <link href="/{!! url('public/css/dataTables.bootstrap.min.css') !!}" type="text/css" rel="stylesheet"/>--}}
    <link href="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js" type="text/css" rel="stylesheet"/>


    <link href="/{!! url('public/css/bootstrap-custom.css') !!}" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="container">

    @section('content')
    @show
</div>

{{--<script type="text/javascript" src="/{!! url('public/js/jquery.min.js') !!}"></script>--}}
{{--<script type="text/javascript" src="/{!! url('public/js/bootstrap.min.js') !!}"></script>--}}
{{--<script type="text/javascript" src="/{!! url('public/js/jquery.dataTables.min.js') !!}"></script>--}}
{{--<script type="text/javascript" src="/{!! url('public/js/dataTables.bootstrap.min.js') !!}"></script>--}}


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/{!! url('public/js/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#DataList").DataTable({
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tất cả"]],
            "iDisplayLength": 10,
            "oLanguage": {
                "sLengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
                "oPaginate": {
                    "sFirst": "<span class='glyphicon glyphicon-step-backward' aria-hidden='true'></span>",
                    "sLast": "<span class='glyphicon glyphicon-step-forward' aria-hidden='true'></span>",
                    "sNext": "<span class='glyphicon glyphicon-triangle-right' aria-hidden='true'></span>",
                    "sPrevious": "<span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span>"
                },
                "sEmptyTable": "Không có dữ liệu",
                "sSearch": "Tìm kiếm:",
                "sZeroRecords": "Không có dữ liệu",
                "sInfo": "Hiển thị từ _START_ đến _END_ trong tổng số _TOTAL_ dòng được tìm thấy",
                "sInfoEmpty": "Không tìm thấy",
                "sInfoFiltered": " (trong tổng số _MAX_ dòng)"
            }
        });
    });
</script>
</body>
</html>
