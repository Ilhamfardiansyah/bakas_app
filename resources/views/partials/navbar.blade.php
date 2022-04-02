<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">BAKAS STORE :</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" id="tanggalwaktu"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <script type="text/javascript">
                    var dt = new Date();
                    document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleString();
                </script>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
            </ul> --}}
            <ul class=" navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Selamat Datang ,{{ auth()->user()->username }} Nik: {{ auth()->user()->nik }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house-fill"></i> Warehouse</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                            <li>
                                <a type="submit" class="dropdown-item" href="/register"><i
                                        class="bi bi-person-plus-fill"></i>
                                    Tambah
                                    User
                                </a>
                            </li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-door-closed-fill"></i> Log
                                    Out</button>
                            </form>
                    </li>
                </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link"><i class="bi bi-door-open-fill"></i> Login</a>
                </li>
            @endauth
            </ul>
        </div>
    </div>
</nav>
