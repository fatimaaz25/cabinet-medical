<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet Médical</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: white;
        }
        .sidebar a { color: white; text-decoration: none; }
        .sidebar a:hover { background: rgba(255,255,255,0.1); border-radius: 8px; }
        .nav-link { padding: 10px 15px; display: block; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary px-4">
        <span class="navbar-brand fw-bold">
            <i class="fas fa-hospital me-2"></i>Cabinet Médical
        </span>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('lang.switch', 'fr') }}" 
               class="btn btn-sm {{ app()->getLocale() == 'fr' ? 'btn-light' : 'btn-outline-light' }}">
                FR
            </a>
            <a href="{{ route('lang.switch', 'ar') }}" 
               class="btn btn-sm {{ app()->getLocale() == 'ar' ? 'btn-light' : 'btn-outline-light' }}">
                AR
            </a>
            <span class="text-white me-3">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-sign-out-alt"></i> {{ __('messages.logout') }}
                </button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar py-4">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="fas fa-home me-2"></i> {{ __('messages.dashboard') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('appointments.index') }}" class="nav-link">
                            <i class="fas fa-calendar me-2"></i> {{ __('messages.appointments') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="nav-link">
                            <i class="fas fa-stethoscope me-2"></i> {{ __('messages.services') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 py-4 px-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <footer class="bg-primary text-white text-center py-3 mt-4">
        <p class="mb-0">&copy; 2026 Cabinet Médical - Tous droits réservés</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>