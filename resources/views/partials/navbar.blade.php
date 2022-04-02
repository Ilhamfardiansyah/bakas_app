<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">BAKAS STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" id="clock">Home</a>
                    <script type="text/javascript">
                        <!--
                        function showTime() {
                            var a_p = "";
                            var today = new Date();
                            var curr_hour = today.getHours();
                            var curr_minute = today.getMinutes();
                            var curr_second = today.getSeconds();
                            if (curr_hour < 12) {
                                a_p = "AM";
                            } else {
                                a_p = "PM";
                            }
                            if (curr_hour == 0) {
                                curr_hour = 12;
                            }
                            if (curr_hour > 12) {
                                curr_hour = curr_hour - 12;
                            }
                            curr_hour = checkTime(curr_hour);
                            curr_minute = checkTime(curr_minute);
                            curr_second = checkTime(curr_second);
                            document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                        }

                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i;
                            }
                            return i;
                        }
                        setInterval(showTime, 500);
                        //
                        -->
                    </script>
                </li>
            </ul>
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
