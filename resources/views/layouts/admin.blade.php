<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
       <!-- Template CSS -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <!-- Navbar -->
            @include('layouts.partials.navbar')

            <!-- Sidebar -->
            @include('layouts.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $halaman }}</h1>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    @if (Session::has('sweet_alert'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{ Session::get('sweet_alert') }}",
            type: "error",
            confirmButtonText: "OK"
        });
    </script>
@endif

    @include('sweetalert::alert')
    @include('layouts.partials.script')
    @stack('js')
    <script src="{{ asset('assets/js/page/modules-ion-icons.js') }}"></script>
<script src="{{ asset('node_modules/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/page/components-table.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    //ini untuk tabel siswa
    $(document).ready(function(){
        $('#siswaTable').DataTable();
    })
    //ini petugas
    $(document).ready(function(){
        $('#petugasTable').DataTable();
    })
    //kelas
    $(document).ready(function(){
        $('#kelasTable').DataTable();
    })
    //spp
    $(document).ready(function(){
        $('#sppTable').DataTable();
    })
    
    //sweet alert data siswa
    function deleteData(nisn){
    Swal.fire({
  title: 'Peringatan',
  text: "yakin ingin hapus?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Batal',
  confirmButtonText: 'Yakin!'
}).then((result) => {
    if(result.value){
        $('#delete'+nisn).submit();
    }
})
    }
    //sweet alert data kelas
    function deleteData(id_kelas){
    Swal.fire({
  title: 'Peringatan',
  text: "yakin ingin hapus?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Batal',
  confirmButtonText: 'Yakin!'
}).then((result) => {
    if(result.value){
        $('#delete'+id_kelas).submit();
    }
})
    }
    //sweet alert data petugas
    function deleteData(id){
    Swal.fire({
  title: 'Peringatan',
  text: "yakin ingin hapus?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Batal',
  confirmButtonText: 'Yakin!'
}).then((result) => {
    if(result.value){
        $('#delete'+id).submit();
    }
})
    }
    //sweet alert data spp
    function deleteData(id_spp){
    Swal.fire({
  title: 'Peringatan',
  text: "yakin ingin hapus?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Batal',
  confirmButtonText: 'Yakin!'
}).then((result) => {
    if(result.value){
        $('#delete'+id_spp).submit();
    }
})
    }
    
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>