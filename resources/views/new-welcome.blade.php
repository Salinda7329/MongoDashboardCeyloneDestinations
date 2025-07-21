<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEYLONE DESTINATIONS Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/newwelcome.css') }}">
    <!-- Favicon for most browsers -->
    <link rel="icon" href="{{ asset('assets/compiled/png/destination-logo.png') }}" type="image/png">

    <!-- Fallback shortcut icon -->
    <link rel="shortcut icon" href="{{ asset('assets/compiled/png/destination-logo.png') }}" type="image/png">
</head>

<body>
    <!-- Background Pattern -->
    <div class="bg-pattern">
        <div class="bg-orb"></div>
        <div class="bg-orb"></div>
        <div class="bg-orb"></div>
    </div>

    <div class="container">
        <!-- Header Navigation -->
        <header class="header">
            <nav class="nav">
                <div class="logo">
                    <img src="{{ asset('assets/compiled/png/destination-logo.png') }}" alt="CEYLONE Logo"
                        class="logo-image">
                </div>


                <div class="nav-buttons">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-secondary">Log in</a>
                        @if (Route::has('register'))
                            <a href="#" class="btn btn-outline">Register</a>
                        @endif
                    @endguest

                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            Dashboard
                        </a>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Logout</button>
                        </form>
                    @endauth
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <div class="main-content">
            <main class="content-wrapper">
                <!-- Animated Welcome Text -->
                <div class="welcome-text">
                    <span class="welcome-line">Welcome to</span>
                    <span class="welcome-line gradient-text">CEYLONE</span>
                    <span class="welcome-line gradient-text">DESTINATIONS</span>
                    <span class="welcome-line admin-text">Admin Dashboard</span>
                </div>

                <!-- Description -->
                <p class="description">
                    Manage your travel destinations, bookings, and customer experiences with our comprehensive admin
                    platform.
                </p>

                <!-- Feature Cards -->
                <div class="features">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                </path>
                            </svg>
                        </div>
                        <h3 class="feature-title">Destination Management</h3>
                        <p class="feature-description">Create and manage beautiful travel destinations with detailed
                            information and media.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="feature-title">Customer Management</h3>
                        <p class="feature-description">Track customer bookings, preferences, and provide exceptional
                            service.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="feature-title">Analytics & Reports</h3>
                        <p class="feature-description">Get insights into your business performance with detailed
                            analytics and reports.</p>
                    </div>
                </div>

                <!-- CTA Button for Guests -->
                @guest
                    <div class="cta-section">
                        <a href="{{ route('register') }}" class="cta-button">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Get Started
                        </a>
                    </div>
                @endguest
            </main>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="floating-element floating-1"></div>
    <div class="floating-element floating-2"></div>
    <div class="floating-element floating-3"></div>
    <div class="floating-element floating-4"></div>
</body>

</html>
