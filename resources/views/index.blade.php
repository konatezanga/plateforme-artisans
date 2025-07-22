<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtisanIvoire - Plateforme pour Artisans Locaux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f97316, #f59e0b);
        }
        .artisan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .active-tab {
            border-bottom: 3px solid #f97316;
            color: #f97316;
            font-weight: 600;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .mobile-menu {
            transition: all 0.3s ease;
            max-height: 0;
            overflow: hidden;
        }
        .mobile-menu.open {
            max-height: 500px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <span class="ml-2 text-xl font-bold text-orange-600">Artisan<span class="text-green-600 text-xl font-bold">Ivoire</span></span>
                    </div>
                    <div class="hidden md:flex space-x-8">
                        <a href="#" class="text-gray-700 hover:text-orange-600 px-3 py-2 font-medium active-tab">Accueil</a>
                        <a href="#categories" class="text-gray-700 hover:text-orange-600 px-3 py-2 font-medium">Catégories</a>
                        <a href="#about" class="text-gray-700 hover:text-orange-600 px-3 py-2 font-medium">À propos</a>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <section class="hidden md:block bg-orange-50 border border-orange-200 rounded-lg px-4 py-2 flex items-center space-x-3">
                        <i class="fas fa-user-tie text-orange-600 text-lg"></i>
                        <span class="text-gray-800 text-sm font-medium">
                            Vous êtes artisan ? 
                            <a href="inscription.blade.php" class="text-orange-600 font-semibold hover:underline ml-1">Inscrivez-vous ici</a>
                            pour gérer votre activité.
                        </span>
                    </section>
                    <button id="mobile-menu-button" class="md:hidden text-gray-700 hover:text-orange-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu md:hidden bg-white">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50">Accueil</a>
                    <a href="#categories" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50">Catégories</a>
                    <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-orange-600 hover:bg-orange-50">À propos</a>
                    <div class="px-3 py-2">
                        <div class="bg-orange-50 border border-orange-200 rounded-lg px-4 py-2 flex items-center space-x-3">
                            <i class="fas fa-user-tie text-orange-600 text-lg"></i>
                            <span class="text-gray-800 text-sm font-medium">
                                Vous êtes artisan ? 
                                <a href="inscription.html" class="text-orange-600 font-semibold hover:underline ml-1">Inscrivez-vous ici</a>
                                pour gérer votre activité.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="animate-fadeIn">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Promouvez votre artisanat en Côte d'Ivoire</h1>
                    <p class="text-xl mb-8">La plateforme qui connecte les artisans talentueux à leur clientèle locale. Augmentez votre visibilité et trouvez plus de clients.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="inscription.html">
                            <button class="bg-white text-orange-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-bold text-lg transition duration-300">
                                <i class="fas fa-user-tie mr-2"></i>Créer un profil Artisan
                            </button>
                        </a>
                        <a href="#recherche">
                            <button class="bg-transparent border-2 border-white hover:bg-white hover:text-orange-600 px-6 py-3 rounded-lg font-bold text-lg transition duration-300">
                                <i class="fas fa-search mr-2"></i>Trouver un Artisan
                            </button>
                        </a>
                    </div>
                </div>
                <div class="hidden md:block animate-fadeIn relative" style="animation-delay: 0.2s; left: 1.5rem;">
                    <img id="hero-carousel-img"
                        src="assets/images/img1.jpg"
                        alt="Artisanat ivoirien"
                        class="rounded-xl shadow-2xl w-72 h-72 object-cover transition-opacity duration-700"
                        style="opacity: 1;"
                    >
                </div>
                <script>
                    // Carousel for hero images
                    const heroImages = [
                        'assets/images/img1.jpg',
                        'assets/images/img2.jpg',
                        'assets/images/img3.jpg',
                        'assets/images/img4.jpg',
                        'assets/images/img5.jpg'
                    ];
                    let heroIndex = 0;
                    const heroImg = document.getElementById('hero-carousel-img');
                    let isTransitioning = false;
                    setInterval(() => {
                        if (isTransitioning) return;
                        isTransitioning = true;
                        heroImg.style.transition = 'opacity 0.7s';
                        heroImg.style.opacity = 0;
                        setTimeout(() => {
                            heroIndex = (heroIndex + 1) % heroImages.length;
                            heroImg.src = heroImages[heroIndex];
                            heroImg.onload = () => {
                                heroImg.style.opacity = 1;
                                setTimeout(() => { isTransitioning = false; }, 700);
                            };
                        }, 700);
                    }, 3500);
                </script>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="bg-white py-8 shadow-md -mt-8 relative z-10 mx-4 rounded-xl max-w-6xl mx-auto flex justify-center" id="recherche">
        <div class="w-full max-w-4xl px-4">
            <div class="relative">
                <input type="text" placeholder="Rechercher un artisan (charpentier, couturier, sculpteur...)" class="w-full px-8 py-4 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-lg">
                <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-orange-600 text-white p-3 rounded-full hover:bg-orange-700 transition duration-300">
                    <i class="fas fa-search"></i>
                </button>
                <i class="fas fa-map-marker-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">Abidjan</span>
                <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">Bouaké</span>
                <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">Yamoussoukro</span>
                <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">San-Pédro</span>
                <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">Korhogo</span>
                <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">etc</span>
            </div>
             <!-- Les artisans recherchés doivent s'afficher ici -->
            <div id="artisans-results" class="mt-6 space-y-4">
                <!-- Artisan 1 -->
                <a href="artisan-profile.html?id=1" class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition duration-300 border border-gray-200 hover:border-orange-300">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center text-white text-xl font-bold mr-4">
                                MK
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Marie Koné</h3>
                                <p class="text-sm text-gray-600">Peintre professionnelle</p>
                                <p class="text-sm text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>Cocody, Abidjan</p>
                            </div>
                        </div>
                        <div class="ml-4 text-orange-500 text-3xl flex-shrink-0">
                            &gt;
                        </div>
                    </div>
                </a>

                <!-- Artisan 2 -->
                <a href="artisan-profile.html?id=2" class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition duration-300 border border-gray-200 hover:border-orange-300">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center text-white text-xl font-bold mr-4">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Jean Kouassi</h3>
                                <p class="text-sm text-gray-600">Peintre en bâtiment</p>
                                <p class="text-sm text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>Yopougon, Abidjan</p>
                            </div>
                        </div>
                        <div class="ml-4 text-orange-500 text-3xl flex-shrink-0">
                            &gt;
                        </div>
                    </div>
                </a>

                <!-- Artisan 3 -->
                <a href="artisan-profile.html?id=3" class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition duration-300 border border-gray-200 hover:border-orange-300">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center text-white text-xl font-bold mr-4">
                                AD
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Aminata Diarra</h3>
                                <p class="text-sm text-gray-600">Décoratrice d'intérieur</p>
                                <p class="text-sm text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-1"></i>Marcory, Abidjan</p>
                            </div>
                        </div>
                        <div class="ml-4 text-orange-500 text-3xl flex-shrink-0">
                            &gt;
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Catégories d'Artisans</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Découvrez les différents métiers de l'artisanat ivoirien à travers nos principales catégories</p>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Category Card 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-cut text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="font-medium text-gray-800">Couture</h3>
                        <p class="text-sm text-gray-500 mt-1">125 artisans</p>
                    </div>
                </div>
                
                <!-- Category Card 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-utensils text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="font-medium text-gray-800">Cuisine</h3>
                        <p class="text-sm text-gray-500 mt-1">89 artisans</p>
                    </div>
                </div>
                
                <!-- Category Card 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tshirt text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="font-medium text-gray-800">Textile</h3>
                        <p class="text-sm text-gray-500 mt-1">72 artisans</p>
                    </div>
                </div>
                
                <!-- Category Card 4 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-gem text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="font-medium text-gray-800">Bijouterie</h3>
                        <p class="text-sm text-gray-500 mt-1">58 artisans</p>
                    </div>
                </div>
                
                <!-- Category Card 5 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hammer text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="font-medium text-gray-800">Menuiserie</h3>
                        <p class="text-sm text-gray-500 mt-1">112 artisans</p>
                    </div>
                </div>
                
                <!-- Category Card 6 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-paint-roller text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="font-medium text-gray-800">Peinture</h3>
                        <p class="text-sm text-gray-500 mt-1">64 artisans</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="text-orange-600 font-medium cursor-not-allowed">
                    Et bien d'autres encore
                </a>
            </div>
        </div>
    </section>
       
    <!-- comment ça marche -->
    <section id="marche" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Comment ça marche</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">La plateforme simple et efficace pour connecter artisans et clients</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center transition duration-300 hover:shadow-lg">
                    <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Inscrivez-vous</h3>
                    <p class="text-gray-600">Créez un compte d'artisan en quelques minutes seulement. Si client, pas besoin de créer un compte </p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center transition duration-300 hover:shadow-lg">
                    <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Trouver/Proposer</h3>
                    <p class="text-gray-600">Cherchez des artisans locaux ou proposez vos services en quelques clics.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center transition duration-300 hover:shadow-lg">
                    <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Collaborez</h3>
                    <p class="text-gray-600">Mettez-vous en relation et réalisez votre projet ensemble.</p>
                </div>
            </div>
            
            
        </div>
    </section>

    <!-- Témoignages -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Ce qu'ils disent de nous</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Témoignages d'artisans et clients satisfaits</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-orange-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div>
                            <h4 class="font-bold text-gray-800">Fatoumata Kéita</h4>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"Grâce à ArtisanIvoire, j'ai pu développer mon atelier de couture et toucher plus de clients. Le système de fiche artisan est très complet et j'ai reçu plusieurs demandes chaque semaine depuis mon inscription."</p>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-user-tie mr-2"></i> Couturière, Abidjan
                    </div>
                </div>
                
                <!-- Témoignage 2 -->
                <div class="bg-orange-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div>
                            <h4 class="font-bold text-gray-800">Jean-Luc Martin</h4>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"Je cherchais un artisan sérieux pour réaliser une pièce unique pour ma résidence. J'ai trouvé plusieurs profils qualifiés sur la plateforme et finalisé un contrat avec un excellent menuisier. Tout s'est très bien passé."</p>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-home mr-2"></i> Client, Cocody
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Trouvez des artisans près de chez vous</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Utilisez notre carte interactive pour localiser les artisans dans votre région</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="h-80 md:h-96 relative">
                    <!-- Placeholder for map -->
                    <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-orange-600 text-5xl mb-4"></i>
                            <p class="text-gray-700 font-medium">Carte interactive des artisans en Côte d'Ivoire</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:p-6 bg-orange-100">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <h3 class="font-bold text-gray-800">Recherche par localisation</h3>
                            <p class="text-sm text-gray-600">Activer la géolocalisation pour trouver les artisans les plus proches</p>
                        </div>
                        <button class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg font-medium transition duration-300 inline-flex items-center">
                            <i class="fas fa-location-arrow mr-2"></i> Activer la géolocalisation
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Prêt à développer votre activité artisanale ?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Rejoignez dès maintenant la meilleure plateforme de mise en relation dédiée aux artisans ivoiriens.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="inscription.html">
                    <button class="bg-white text-orange-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-bold text-lg transition duration-300">
                        <i class="fas fa-user-plus mr-3"></i>S'inscrire comme Artisan
                    </button>
                </a>
                <a href="#">
                    <button class="bg-transparent border-2 border-white hover:bg-white hover:text-orange-600 px-8 py-4 rounded-lg font-bold text-lg transition duration-300">
                        <i class="fas fa-info-circle mr-3"></i>En savoir plus
                    </button>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold text-orange-600 mb-2">2</div>
                        <div class="text-gray-600">Artisans inscrits</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-orange-600 mb-2">1</div>
                        <div class="text-gray-600">Projets réalisés</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-orange-600 mb-2">+25</div>
                        <div class="text-gray-600">Métiers représentés</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="about" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Questions fréquentes</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Trouvez des réponses aux questions les plus courantes</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="mb-4">
                    <button class="faq-item flex items-center justify-between w-full px-6 py-4 bg-white rounded-lg shadow-sm text-left focus:outline-none">
                        <span class="font-medium text-gray-800">Comment puis-je m'inscrire en tant qu'artisan ?</span>
                        <i class="fas fa-plus text-orange-600"></i>
                    </button>
                    <div class="faq-content hidden px-6 pt-4 pb-6 bg-white border-t border-gray-200 rounded-b-lg">
                        <p class="text-gray-600">L'inscription est simple et gratuite. Cliquez sur "Créer un profil Artisan" en haut de la page, remplissez le formulaire avec vos coordonnées et informations professionnelles, puis validez votre email. Notre équipe examine chaque inscription avant validation (sous 48h).</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="mb-4">
                    <button class="faq-item flex items-center justify-between w-full px-6 py-4 bg-white rounded-lg shadow-sm text-left focus:outline-none">
                        <span class="font-medium text-gray-800">Comment fonctionne le système de contact avec les artisans ?</span>
                        <i class="fas fa-plus text-orange-600"></i>
                    </button>
                    <div class="faq-content hidden px-6 pt-4 pb-6 bg-white border-t border-gray-200 rounded-b-lg">
                        <p class="text-gray-600">Pour contacter un artisan :</p>
                        <ol class="list-decimal pl-5 mt-2 text-gray-600">
                            <li>Trouvez un artisan via la recherche ou les catégories</li>
                            <li>Consultez son profil et son portfolio</li>
                            <li>Cliquez sur "Contacter"</li>
                            <li>Remplissez le formulaire avec votre demande</li>
                            <li>Votre message est envoyé directement à l'artisan qui vous répondra par téléphone</li>
                        </ol>
                        <p class="mt-4 text-gray-600">Nous ne partageons jamais vos coordonnées sans votre permission.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="mb-4">
                    <button class="faq-item flex items-center justify-between w-full px-6 py-4 bg-white rounded-lg shadow-sm text-left focus:outline-none">
                        <span class="font-medium text-gray-800">Comment les artisans sont-ils évalués sur la plateforme ?</span>
                        <i class="fas fa-plus text-orange-600"></i>
                    </button>
                    <div class="faq-content hidden px-6 pt-4 pb-6 bg-white border-t border-gray-200 rounded-b-lg">
                        <p class="text-gray-600">Après chaque collaboration, les clients peuvent évaluer l'artisan sur plusieurs critères : qualité du travail, respect des délais, professionnalisme et communication. Ces avis contribuent à la note globale visible sur le profil de l'artisan. Notre algorithme détecte et filtre les évaluations suspectes pour garantir la fiabilité du système.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-12 bg-white" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Contactez-nous</h2>
                    <p class="text-gray-600 mb-8">Vous avez des questions ou des suggestions ? Notre équipe est à votre écoute pour vous aider.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="text-orange-600 mr-4 mt-1">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Bureau principal</h4>
                                <p class="text-gray-600">Abidjan, Côte d'Ivoire</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-orange-600 mr-4 mt-1">
                                <i class="fas fa-phone-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Téléphone</h4>
                                <p class="text-gray-600">+225 01 01 98 48 88 (Service client)</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h3>
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nom complet</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Votre nom">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Adresse email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="votre@email.com">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 text-sm font-medium mb-2">Sujet</label>
                            <select id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option>Question générale</option>
                                <option>Problème avec mon compte</option>
                                <option>Partenariat</option>
                                <option>Autre</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 text-sm font-medium mb-2">Message</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-none rounded-md" placeholder="Votre message..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-medium transition duration-300">
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-12 gradient-bg text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex flex-col items-center">
                <h2 class="text-3xl font-bold mb-6">Restez informé</h2>
                <p class="text-xl mb-8 max-w-2xl">Abonnez-vous à notre newsletter pour recevoir les actualités et conseils pour artisans.</p>
                
                <div class="w-full max-w-lg">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input type="email" placeholder="Votre adresse email" class="flex-grow px-4 py-3 rounded-lg focus:outline-none text-gray-900">
                        <button class="bg-orange-800 hover:bg-orange-900 text-white px-6 py-3 rounded-lg font-medium transition duration-300">
                            S'abonner
                        </button>
                    </div>
                    <p class="mt-3 text-sm opacity-80">Nous ne partagerons jamais votre email avec des tiers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mx-auto w-max">
                <div>
                    <h3 class="text-lg font-bold mb-4">À propos</h3>
                    <ul class="space-y-2">
                        <li><a href="legal.html?page=mission" class="text-gray-400 hover:text-white transition">Notre mission</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li> 
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Pour les Artisans</h3>
                    <ul class="space-y-2">
                        <li><a href="inscription.html" class="text-gray-400 hover:text-white transition">Créer un profil</a></li>
                        <li><a href="legal.html?page=avantages" class="text-gray-400 hover:text-white transition">Avantages</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Pour les Clients</h3>
                    <ul class="space-y-2">
                        <li><a href="#recherche" class="text-gray-400 hover:text-white transition">Trouver un artisan</a></li>
                        <li><a href="#marche" class="text-gray-400 hover:text-white transition">Comment ça marche</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Légal</h3>
                    <ul class="space-y-2">
                        <li><a href="legal.html?page=conditions" class="text-gray-400 hover:text-white transition">Conditions d'utilisation</a></li>
                        <li><a href="legal.html?page=confidentialite" class="text-gray-400 hover:text-white transition">Politique de confidentialité</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <span class="ml-2 text-lg font-bold text-orange-600">Artisan<span class="text-green-600 text-xl font-bold">Ivoire</span></span>
                </div>
                <div class="text-gray-400 text-sm">
                    &copy; 2025 ArtisanIvoire. Tous droits réservés.
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button id="backToTop" class="fixed bottom-8 right-8 bg-orange-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const icon = this.querySelector('i');
                
                if (answer.classList.contains('hidden')) {
                    answer.classList.remove('hidden');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                } else {
                    answer.classList.add('hidden');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                }
                
                // Close other FAQs
                document.querySelectorAll('.faq-content').forEach(content => {
                    if (content !== answer && !content.classList.contains('hidden')) {
                        content.classList.add('hidden');
                        const otherIcon = content.previousElementSibling.querySelector('i');
                        otherIcon.classList.remove('fa-minus');
                        otherIcon.classList.add('fa-plus');
                    }
                });
            });
        });
        
        // Back to top button
        window.addEventListener('scroll', function() {
            const backToTopButton = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });
        
        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('open');
            
            // Change icon
            const icon = this.querySelector('i');
            if (mobileMenu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                mobileMenuButton.querySelector('i').classList.remove('fa-times');
                mobileMenuButton.querySelector('i').classList.add('fa-bars');
            });
        });
    </script>
</body>
</html>