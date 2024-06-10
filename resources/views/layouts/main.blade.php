<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Sistem Pengajuan Tugas Akhir</title>
    <link rel="shortcut icon" href="{{ url('') }}/assets/img/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/simple-calendar/simple-calendar.css">
</head>

<body>

    <div class="main-wrapper">

        @include('layouts.header')
        @can('dosen')
            @include('dosen.components.sidebar')
        @endcan
        @can('mahasiswa')
            @include('mahasiswa.components.sidebar')
        @endcan
        @can('staff')
            @include('staff.components.sidebar')
        @endcan

        <div class="page-wrapper">
            @yield('main-contents')

            @include('sweetalert::alert')

            @include('layouts.footer')
        </div>
    </div>

    <script src="{{ asset('') }}assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/js/feather.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/apexchart/chart-data.js"></script>
    <script src="{{ asset('') }}assets/js/script.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

    <script src="{{ asset('') }}assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
    <script src="{{ asset('') }}assets/js/calander.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $("#example").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    </script>
    <script>
        $(document).ready(function() {
            var table = $("#excelTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "dom": 'Bfrtip',
                "buttons": [{
                    extend: 'excelHtml5',
                    text: 'Export File Excel',
                    className: 'text-white rounded-2',
                    attr: {
                        style: 'background-color: #3d5ee1;'
                    },
                    filename: 'Daftar Monitoring Ujian',
                    title: null,
                    exportOptions: {
                        columns: '.excel-column',
                    }
                }]
            });

            table.buttons().container().appendTo('#excel-table_wrapper .col-md-6:eq(0)');
        });
    </script>

</body>

</html>
