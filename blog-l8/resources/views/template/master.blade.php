<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title_web')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('template/assets/img/visa.svg') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('template/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('template/assets/css/fonts.min.css') }}">
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/atlantis.min.css') }}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/demo.css') }}">
    @stack('link')
</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <div class="wrapper sidebar_minimize">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="#" class="logo">
                    <img src="{{ asset('template/assets/img/logoalternatif.svg') }}"
                        alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            @include('template.layouts.navbar')
        </div>

        @include('template.layouts.sidebar')

        <div class="main-panel">
            <div class="content" id="content">
                @yield('dashboard')
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">@yield('title_content')</h4>
                        @yield('breadcrumbs')
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- LOGOUT MODAL -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Yakin Ingin Keluar?
                    </h5>
                    <button class="close text-danger" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout di bawah ini jika anda siap untuk mengakhiri sesi anda saat ini.
                    Pilih Cancel jika tidak ingin mengakhiri sesi.</div>
                <div class="modal-footer">

                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary mr-2" type="submit" data-dismiss="modal"><i
                                class="fas fa-window-close has-icon mr-2"></i>Cancel</button>
                        <a class="btn btn-danger" href="{{ url('/logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="fa fa-power-off has-icon mr-2"></i>Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ck Editor -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <!--   Core JS Files   -->
    <script src="{{ asset('template/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script
        src="{{ asset('template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}">
    </script>
    <script
        src="{{ asset('template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}">
    </script>

    <!-- jQuery Scrollbar -->
    <script
        src="{{ asset('template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}">
    </script>

    <!-- Datatables -->
    <script src="{{ asset('template/assets/js/plugin/datatables/datatables.min.js') }}">
    </script>

    <!-- Atlantis JS -->
    <script src="{{ asset('template/assets/js/atlantis.min.js') }}"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('template/assets/js/setting-demo2.js') }}"></script>

    <!-- Searching with highliht -->
    <script>
        const contentEle = document.getElementById("content");
        const searchInput = document.getElementById("searchInput");
        const foundEle = document.getElementById('found')
        const searchBtn = document.getElementById("searchBtn");
        const positionEle = document.getElementById('position')
        const totalEle = document.getElementById('total')
        const highlightsEle = document.getElementsByClassName('highlight')
        const originalString = contentEle.innerHTML //original content

        function highlight(element, originalString, search) {
            if (search.length > 0) {
                let regex = new RegExp(search, "gi");
                let newString = originalString.replace(regex, "<span class='highlight'> " + search + "</span>")
                element.innerHTML = newString
            } else {
                //tidak mencari apapun
                element.innerHTML = originalString
            }
        }

        function foundWord() {
            if (highlightsEle.length > 0) {
                foundEle.style.display = 'inline';
                totalEle.innerText = highlightsEle.length //jumlah kata yg di temukan
                indicator(1) //default set indicator 1
            } else {
                foundEle.style.display = 'none';
            }
        }

        function indicator(currentPosition) {
            if (currentPosition > highlightsEle.length || currentPosition == 0) {
                return false; //kalau di akhir atau di awal pencarian tidak bisa next atau prev lagi
            }

            removeCurrentIndicator()

            highlightsEle[currentPosition - 1].id = currentPosition
            highlightsEle[currentPosition - 1].classList.add('active');
            positionEle.innerText = currentPosition
            window.location.hash = '#' + currentPosition //move location
        }

        function prev() {
            indicator(parseInt(positionEle.innerText) - 1)
        }

        function next() {
            indicator(parseInt(positionEle.innerText) + 1)
        }

        function removeCurrentIndicator(currentPosition) {
            if (highlightsEle[parseInt(positionEle.innerText) - 1]) {
                highlightsEle[parseInt(positionEle.innerText) - 1].classList.remove('active');
            }
        }

        searchBtn.addEventListener("click", function () {
            highlight(content, originalString, searchInput.value)
            foundWord() //hitung jumlah kata yang di temukan
        });
    </script>

    @include('sweetalert::alert')
    @stack('script')
</body>

</html>