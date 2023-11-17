<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gramed cabang</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/ample-admin-lite/"
    />
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href=" {{asset('images/favicon.png')}}"
    />

    <!-- Custom CSS -->
    <link href=" {{asset('css/style.min.css')}}" rel="stylesheet" />

    <!-- DataTables CSS CDN -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"
    />
  </head>

  <body>

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="dashboard.html">
              <b class="logo-icon">
                <img src="{{asset('images/logo-icon.png')}}" alt="homepage" />
              </b>
              <span class="logo-text">
                <img src="{{asset('images/logo-text.png')}}" alt="homepage" width="80%" />
              </span>
            </a>
            <a
              class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <ul class="navbar-nav ms-auto d-flex align-items-center"></ul>
          </div>
        </nav>
      </header>
      <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
          <nav class="sidebar-nav">
            <ul id="sidebarnav">

              <li class="sidebar-item pt-2">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="dashboard.html"
                  aria-expanded="false"
                >
                  <i class="far fa-clock" aria-hidden="true"></i>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h4 class="page-title">Barang masuk</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"></div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="alert alert-primary">
             <span> <b>Konsep crud API sederhana</b>  ketika status di rubah menjadi "diterima" maka status pada aplikasi Gramed Pusat ikut berubah menjadi "diterima"</span>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="white-box">
                <div class="table-responsive">
                  <table id="tabel-data" class="table no-wrap">
                    <thead>
                      <tr>
                        <th class="border-top-0">id</th>
                        <th class="border-top-0">Tanggal</th>
                        <th class="border-top-0">No.jalan</th>
                        <th class="border-top-0">Judul</th>
                        <th class="border-top-0">Penerbit</th>
                        <th class="border-top-0">QTY</th>
                        <th class="border-top-0">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <!-- format json yang diterima memiliki key data -->
                        @foreach ($data['data'] as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['tanggal'] }}</td>
                            <td>{{ $item['nojalan'] }}</td>
                            <td>{{ $item['judul'] }}</td>
                            <td>{{ $item['penerbit'] }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>
                                @if ($item['status'] == 'diterima')
                                    <span class="text-success" style="margin-left:10px;">diterima</span>
                                @else
                                    <form id="myForm{{ $item['id'] }}" action="{{ route('data.update', ['id' => $item['id']]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <select name="status" id="statusSelect{{ $item['id'] }}" class="form-control" style="width: 80px;" onchange="submitForm('{{ $item['id'] }}')">
                                            <option value="{{ $item['status'] }}">{{ $item['status'] }}</option>
                                            <option value="diterima">diterima</option>
                                        </select>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer text-center">
            Gramed cabang mall cipanaz (Laravel api)  
        </footer>
      </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables JS CDN -->
    <script
      type="text/javascript"
      charset="utf8"
      src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"
    ></script>

    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>

    <script>
      $(document).ready(function () {
        $("#tabel-data").DataTable();
      });
    </script>

   <!-- inisialiasi form yang di looping dengan menambahkan itemId  -->
    <script>
        function submitForm(itemId) {
            document.getElementById('myForm' + itemId).submit();
        }
    </script>    
  </body>
</html>
