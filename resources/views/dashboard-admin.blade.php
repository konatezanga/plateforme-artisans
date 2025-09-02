<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - ArtisanIvoire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f97316, #f59e0b);
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        /* Mobile menu styles */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.open {
            transform: translateX(0);
        }
        .overlay {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .overlay.open {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans min-h-screen">
    <!-- Mobile Header -->
    <header class="bg-white shadow-lg p-4 flex justify-between items-center lg:hidden sticky top-0 z-50">
        <button id="mobileMenuButton" class="text-gray-700">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <h1 class="text-xl font-bold text-gray-800">Tableau de Bord</h1>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <i class="fas fa-bell text-gray-500 text-xl"></i>
                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="overlay fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="mobile-menu fixed inset-y-0 left-0 w-64 bg-gray-900 text-white z-50 flex flex-col lg:hidden">
        <div class="p-4 flex items-center justify-between border-b border-gray-700">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span class="ml-3 font-bold">Artisan<span class="text-green-600 font-bold">Ivoire</span></span>
            </div>
            <button id="closeMobileMenu" class="text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="flex-grow p-4 overflow-y-auto">
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg bg-gray-800 text-white">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="ml-3">Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white">
                            <i class="fas fa-users"></i>
                            <span class="ml-3">Utilisateurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white">
                            <i class="fas fa-bullhorn"></i>
                            <span class="ml-3">Annonces</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white">
                            <i class="fas fa-chart-line"></i>
                            <span class="ml-3">Statistiques</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <form class="p-4 border-t border-gray-700" method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center p-2 rounded-lg hover:bg-gray-800 text-red-400 hover:text-red-300">
            <i class="fas fa-sign-out-alt"></i>
            <span class="ml-3">Déconnexion</span>
            </button>
        </form>
    </div>

    <!-- Main Content (visible on all screens) -->
    <div class="lg:ml-64"> <!-- Add margin for desktop sidebar -->
        <div class="content">
            <!-- Desktop Header (hidden on mobile) -->
            <header class="bg-white shadow-lg p-4 hidden lg:flex justify-between items-center sticky top-0 z-50">
                <h1 class="text-2xl font-bold text-gray-800">Tableau de Bord Administrateur</h1>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-gray-500 hover:text-orange-600 cursor-pointer text-xl"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="ml-2">Admin</span>
                    </div>
                </div>
            </header>

            <main class="p-4 lg:p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6 mb-6 lg:mb-8">
                    <div class="stat-card bg-white rounded-xl shadow-md p-4 lg:p-6 text-center transition duration-300">
                        <div class="text-2xl lg:text-3xl font-bold text-orange-600 mb-2">124</div>
                        <div class="text-gray-600 text-sm lg:text-base">Artisans inscrits</div>
                        <div class="mt-2 text-xs lg:text-sm text-green-600">
                        </div>
                    </div>
                    <div class="stat-card bg-white rounded-xl shadow-md p-4 lg:p-6 text-center transition duration-300">
                        <div class="text-2xl lg:text-3xl font-bold text-orange-600 mb-2">87</div>
                        <div class="text-gray-600 text-sm lg:text-base">Annonces actives</div>
                        <div class="mt-2 text-xs lg:text-sm text-green-600">
                        </div>
                    </div>
                    <div class="stat-card bg-white rounded-xl shadow-md p-4 lg:p-6 text-center transition duration-300">
                        <div class="text-2xl lg:text-3xl font-bold text-orange-600 mb-2">3,248</div>
                        <div class="text-gray-600 text-sm lg:text-base">Visites totales</div>
                        <div class="mt-2 text-xs lg:text-sm text-green-600">
                        </div>
                    </div>
                </div>

                <!-- Gestion Utilisateurs -->
                <div class="bg-white rounded-xl shadow-md p-4 lg:p-6 mb-6 lg:mb-8">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 lg:mb-6 gap-4">
                        <h2 class="text-lg lg:text-xl font-bold text-gray-800">
                            <i class="fas fa-users mr-2 text-orange-600"></i>Gestion des Artisans
                        </h2>
                        <div class="relative w-full md:w-auto">
                            <input type="text" placeholder="Rechercher..." class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm lg:text-base">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 lg:px-4 py-2 lg:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th class="px-3 lg:px-4 py-2 lg:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Email</th>
                                    <th class="px-3 lg:px-4 py-2 lg:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Téléphone</th>
                                    <th class="px-3 lg:px-4 py-2 lg:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-3 lg:px-4 py-2 lg:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-3 lg:px-4 py-3 lg:py-4 whitespace-nowrap text-sm">Wilfred Zanga</td>
                                    <td class="px-3 lg:px-4 py-3 lg:py-4 whitespace-nowrap text-sm hidden sm:table-cell">wilfred@example.com</td>
                                    <td class="px-3 lg:px-4 py-3 lg:py-4 whitespace-nowrap text-sm hidden md:table-cell">00 00 00 00 00</td>
                                    <td class="px-3 lg:px-4 py-3 lg:py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                    </td>
                                    <td class="px-3 lg:px-4 py-3 lg:py-4 whitespace-nowrap">
                                        <div class="flex flex-col sm:flex-row gap-1">
                                            <!--Lorsque l'ouverture du compte de l'artisans est validé alors ce bouton disparait, 
                                            la condition c'est qu'on doit être vraiment sur que c'est un artisan en le contactant par mail ou appel  -->
                                            <button class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded-md text-xs">
                                                <i class="fas fa-check sm:mr-1"></i><span class="hidden sm:inline">Valider</span>
                                            </button> 
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded-md text-xs">
                                                <i class="fas fa-trash sm:mr-1"></i><span class="hidden sm:inline">Supprimer</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Plus d'utilisateurs... -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modération Annonces -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <div class="bg-white rounded-xl shadow-md p-4 lg:p-6">
                        <h2 class="text-lg lg:text-xl font-bold text-gray-800 mb-4 lg:mb-6">
                            <i class="fas fa-bullhorn mr-2 text-orange-600"></i>Annonces en attente
                        </h2>
                        <div class="space-y-3 lg:space-y-4">
                            <div class="border border-gray-200 rounded-lg p-3 lg:p-4 hover:bg-gray-50 transition duration-300">
                                <div class="flex flex-col sm:flex-row sm:justify-between">
                                    <div>
                                        <h3 class="font-medium text-sm lg:text-base">Peinture Façade</h3>
                                        <p class="text-xs lg:text-sm text-gray-600">Service de peinture professionnelle...</p>
                                    </div>
                                    <span class="text-xs lg:text-sm text-gray-500 mt-1 lg:mt-0">Marie Koné</span>
                                </div>
                                <div class="mt-2 lg:mt-3 flex flex-wrap gap-1 lg:gap-2">
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-2 lg:px-3 py-1 rounded-md text-xs lg:text-sm flex-1 sm:flex-none">
                                        <i class="fas fa-check lg:mr-1"></i><span class="hidden lg:inline">Approuver</span>
                                    </button>
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-2 lg:px-3 py-1 rounded-md text-xs lg:text-sm flex-1 sm:flex-none">
                                        <i class="fas fa-times lg:mr-1"></i><span class="hidden lg:inline">Rejeter</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Plus d'annonces... -->
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-4 lg:p-6">
                        <h2 class="text-lg lg:text-xl font-bold text-gray-800 mb-4 lg:mb-6">
                            <i class="fas fa-chart-pie mr-2 text-orange-600"></i>Statistiques récentes
                        </h2>
                        <div class="grid grid-cols-2 gap-3 lg:gap-4">
                            <div class="bg-orange-50 p-3 lg:p-4 rounded-lg">
                                <div class="text-orange-600 font-bold text-lg lg:text-xl">24</div>
                                <div class="text-gray-600 text-xs lg:text-sm">Nouveaux utilisateurs (7j)</div>
                            </div>
                            <div class="bg-orange-50 p-3 lg:p-4 rounded-lg">
                                <div class="text-orange-600 font-bold text-lg lg:text-xl">18</div>
                                <div class="text-gray-600 text-xs lg:text-sm">Nouvelles annonces (7j)</div>
                            </div>
                            <div class="bg-orange-50 p-3 lg:p-4 rounded-lg">
                                <div class="text-orange-600 font-bold text-lg lg:text-xl">156</div>
                                <div class="text-gray-600 text-xs lg:text-sm">Visites (7j)</div>
                            </div>
                            <div class="bg-orange-50 p-3 lg:p-4 rounded-lg">
                                <div class="text-orange-600 font-bold text-lg lg:text-xl">87%</div>
                                <div class="text-gray-600 text-xs lg:text-sm">Taux d'engagement</div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Desktop Sidebar (hidden on mobile) -->
    <div class="sidebar hidden lg:block fixed inset-y-0 left-0 w-64 bg-gray-900 text-white z-30">
        <div class="p-4 flex items-center justify-between border-b border-gray-700">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span class="ml-3 font-bold">Artisan<span class="text-green-600 font-bold">Ivoire</span></span>
            </div>
        </div>
        
        <div class="flex-grow p-4 overflow-y-auto">
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg bg-gray-800 text-white">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="ml-3">Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white">
                            <i class="fas fa-users"></i>
                            <span class="ml-3">Utilisateurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white">
                            <i class="fas fa-bullhorn"></i>
                            <span class="ml-3">Annonces</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white">
                            <i class="fas fa-chart-line"></i>
                            <span class="ml-3">Statistiques</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <form class="p-4 border-t border-gray-700" method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center p-2 rounded-lg hover:bg-gray-800 text-red-400 hover:text-red-300">
            <i class="fas fa-sign-out-alt"></i>
            <span class="ml-3">Déconnexion</span>
            </button>
        </form>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');

        mobileMenuButton.addEventListener('click', function() {
            mobileSidebar.classList.add('open');
            mobileOverlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        });

        closeMobileMenu.addEventListener('click', function() {
            mobileSidebar.classList.remove('open');
            mobileOverlay.classList.remove('open');
            document.body.style.overflow = '';
        });

        mobileOverlay.addEventListener('click', function() {
            mobileSidebar.classList.remove('open');
            mobileOverlay.classList.remove('open');
            document.body.style.overflow = '';
        });

        // Desktop sidebar toggle (only for desktop)
        const toggleSidebar = document.getElementById('toggleSidebar');
        if (toggleSidebar) {
            toggleSidebar.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('sidebar-collapsed');
                document.querySelector('.content').classList.toggle('ml-64');
                document.querySelector('.content').classList.toggle('ml-20');
            });
        }

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobileSidebar a').forEach(link => {
            link.addEventListener('click', () => {
                mobileSidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
                document.body.style.overflow = '';
            });
        });
    </script>
</body>
</html>