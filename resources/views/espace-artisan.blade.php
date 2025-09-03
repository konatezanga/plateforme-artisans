<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Artisan - ArtisanIvoire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrapper {
            flex: 1;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f97316, #f59e0b);
        }
        .portfolio-item {
            transition: all 0.3s ease;
        }
        .portfolio-item:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .sidebar-link {
            transition: all 0.3s ease;
        }
        .sidebar-link:hover {
            transform: translateX(5px);
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .star-rating {
            direction: rtl;
            unicode-bidi: bidi-override;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            font-size: 1.5rem;
            padding: 0 3px;
            cursor: pointer;
        }
        .star-rating input:checked ~ label {
            color: #f59e0b;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f59e0b;
        }
        
        /* Styles pour le modal */
        .fullscreen-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 1rem;
        }

        .modal-content {
            background-color: white;
            border-radius: 0.5rem;
            width: 100%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Empêcher le défilement du body quand le modal est ouvert */
        body.modal-open {
            overflow: hidden;
        }

        /* Nouveau style pour le positionnement du footer */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrapper {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="content-wrapper">
        <!-- Header -->
        <header class="gradient-bg text-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-orange-600 font-bold">
                        <i class="fas fa-hammer"></i> 
                    </div>
                    <h1 class="text-base font-bold md:text-xl">Espace Artisan</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-xl cursor-pointer hover:text-orange-200"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </div>
                    <form class="p-4" method="POST" action="{{ route('artisan.logout') }}">
                        @csrf
                        <button type="submit" class="bg-white text-orange-600 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-1">Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 py-8 flex flex-col md:flex-row gap-8">
            <!-- Sidebar -->
            <aside class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-8">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full gradient-bg mx-auto flex items-center justify-center text-white text-2xl mb-3">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="font-bold text-gray-800">Marie Koné</h3>
                        <p class="text-sm text-gray-600">Peintre professionnelle</p>
                    </div>

                    <nav class="space-y-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg bg-orange-50 text-orange-600 font-medium" data-tab="dashboard">
                            <i class="fas fa-tachometer-alt mr-3"></i>Tableau de bord
                        </a>
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-gray-100 text-gray-700" data-tab="profile">
                            <i class="fas fa-user-edit mr-3"></i>Mon profil
                        </a>
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-gray-100 text-gray-700" data-tab="ads">
                            <i class="fas fa-bullhorn mr-3"></i>Mes annonces
                        </a>
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-gray-100 text-gray-700" data-tab="create-ad">
                            <i class="fas fa-plus-circle mr-3"></i>Créer une annonce
                        </a>
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-gray-100 text-gray-700" data-tab="portfolio">
                            <i class="fas fa-images mr-3"></i>Mon portfolio
                        </a>
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-gray-100 text-gray-700" data-tab="stats">
                            <i class="fas fa-chart-line mr-3"></i>Statistiques
                        </a>   
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-grow">
                <!-- Dashboard Tab -->
                <div id="dashboard" class="tab-content active">
                    <!-- Welcome Section -->
                    <section class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">Bienvenue dans votre espace Artisan</h2>
                        <p class="text-gray-600 mb-4">
                            Gérez facilement votre activité et développez votre clientèle grâce à notre plateforme. 
                            Publiez vos réalisations, répondez aux demandes et suivez votre croissance.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-orange-50 p-8 rounded-lg flex flex-col items-center justify-center mx-auto w-full h-20">
                                <div class="text-orange-600 font-bold text-2xl mb-2">12</div>
                                <div class="text-gray-600 text-base">Annonces actives</div>
                            </div>
                            <div class="bg-orange-50 p-8 rounded-lg flex flex-col items-center justify-center mx-auto w-full h-20">
                                <div class="text-orange-600 font-bold text-2xl mb-2">5</div>
                                <div class="text-gray-600 text-base">Nouvelles demandes</div>
                            </div>
                        </div>
                    </section>

                    <!-- Quick Actions -->
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-bullhorn text-orange-600 mr-2"></i>Créer une nouvelle annonce
                            </h3>
                            <p class="text-gray-600 mb-4">Publiez vos services pour toucher plus de clients</p>
                            <button class="gradient-bg text-white px-4 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300" onclick="showTab('create-ad')">
                                <i class="fas fa-plus mr-2"></i>Nouvelle annonce
                            </button>
                        </div>
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-images text-orange-600 mr-2"></i>Ajouter à votre portfolio
                            </h3>
                            <p class="text-gray-600 mb-4">Montrez vos réalisations pour impressionner vos clients</p>
                            <button class="gradient-bg text-white px-4 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300" onclick="showTab('portfolio')">
                                <i class="fas fa-upload mr-2"></i>Ajouter des photos
                            </button>
                        </div>
                    </section>

                    <!-- Portfolio Gallery -->
                    <section class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-800">
                                <i class="fas fa-images text-orange-600 mr-2"></i>Mon Portfolio
                            </h2>
                            <button class="text-orange-600 hover:text-orange-700 font-medium" onclick="showTab('portfolio')">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="portfolio-item rounded-lg overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Projet 1" class="w-full h-40 object-cover">
                                <div class="p-3 bg-gray-50">
                                    <h4 class="font-medium">Peinture murale</h4>
                                    <p class="text-sm text-gray-600">Abidjan, 2023</p>
                                </div>
                            </div>
                            <div class="portfolio-item rounded-lg overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Projet 2" class="w-full h-40 object-cover">
                                <div class="p-3 bg-gray-50">
                                    <h4 class="font-medium">Décoration intérieure</h4>
                                    <p class="text-sm text-gray-600">Yamoussoukro, 2024</p>
                                </div>
                            </div>
                            <div class="portfolio-item rounded-lg overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Projet 3" class="w-full h-40 object-cover">
                                <div class="p-3 bg-gray-50">
                                    <h4 class="font-medium">Rénovation façade</h4>
                                    <p class="text-sm text-gray-600">Bouaké, 2023</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Profile Tab -->
                <div id="profile" class="tab-content">
                    <section class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">
                            <i class="fas fa-user-edit text-orange-600 mr-2"></i>Modifier mon profil
                        </h2>
                        
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="firstname">Prénom</label>
                                    <input type="text" id="firstname" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" value="Marie">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="lastname">Nom</label>
                                    <input type="text" id="lastname" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" value="Koné">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" value="mariekone@gmail.com">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="phone">Téléphone</label>
                                    <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" value="+225 07 12 34 56 78">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="address">Adresse</label>
                                    <input type="text" id="address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" value="Abidjan, Cocody">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2" for="profession">Profession</label>
                                    <select id="profession" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                        <option>Peintre</option>
                                        <option>Menuisier</option>
                                        <option>Couturier</option>
                                        <option>Sculpteur</option>
                                        <option>Bijoutier</option>
                                        <option>Autre</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2" for="description">Description</label>
                                <textarea id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">Artisan peintre professionnelle avec 10 ans d'expérience dans la décoration intérieure et extérieure. Spécialisée dans les finitions haut de gamme et les peintures murales artistiques.</textarea>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Photo de profil</label>
                                <div class="flex items-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-200 mr-4 overflow-hidden">
                                        <img src="" alt="Photo de profil" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <input type="file" id="profile-photo" class="hidden">
                                        <label for="profile-photo" class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-lg cursor-pointer transition duration-300">
                                            <i class="fas fa-upload mr-2"></i>Changer la photo
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-medium transition duration-300 mr-4">
                                    Annuler
                                </button>
                                <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300">
                                    <i class="fas fa-save mr-2"></i>Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </section>
                    
                    <section class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">
                            <i class="fas fa-lock text-orange-600 mr-2"></i>Changer le mot de passe
                        </h2>
                        
                        <form class="max-w-lg">
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2" for="current-password">Mot de passe actuel</label>
                                <input type="password" id="current-password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2" for="new-password">Nouveau mot de passe</label>
                                <input type="password" id="new-password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2" for="confirm-password">Confirmer le nouveau mot de passe</label>
                                <input type="password" id="confirm-password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300">
                                    <i class="fas fa-key mr-2"></i>Mettre à jour le mot de passe
                                </button>
                            </div>
                        </form>
                    </section>
                </div>

                <!-- Ads Tab -->
                <div id="ads" class="tab-content">
                    <section class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800">
                                <i class="fas fa-bullhorn text-orange-600 mr-2"></i>Mes annonces
                            </h2>
                            <button class="gradient-bg text-white px-4 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300" onclick="showTab('create-ad')">
                                <i class="fas fa-plus mr-2"></i>Nouvelle annonce
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="px-4 py-3 text-left text-gray-700">Titre</th>
                                        <th class="px-4 py-3 text-left text-gray-700">Statut</th>
                                        <th class="px-4 py-3 text-left text-gray-700">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-3">Peinture intérieure</td>
                                        <td class="px-4 py-3"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Active</span></td>
                                        <td class="px-4 py-3"> 
                                            <button class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-3">Décoration murale</td>
                                        <td class="px-4 py-3"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Active</span></td>
                                        <td class="px-4 py-3">
                                            <button class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-3">Rénovation façade</td>
                                        <td class="px-4 py-3"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">En attente</span></td>
                                        <td class="px-4 py-3">
                                            <button class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3">Peinture artistique</td>
                                        <td class="px-4 py-3"><span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Rejetée</span></td>
                                        <td class="px-4 py-3">
                                            <button class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6 flex justify-between items-center">
                            <div class="text-sm text-gray-600">
                                Affichage de 1 à 4 sur 12 annonces
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border border-gray-300 rounded-lg bg-gray-100 text-gray-700">
                                    <i class="fas fa-angle-left"></i>
                                </button>
                                <button class="px-3 py-1 border border-gray-300 rounded-lg bg-orange-600 text-white">
                                    1
                                </button>
                                <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100 text-gray-700">
                                    2
                                </button>
                                <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100 text-gray-700">
                                    3
                                </button>
                                <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-100 text-gray-700">
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Create Ad Tab -->
                <div id="create-ad" class="tab-content">
                    <section class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">
                            <i class="fas fa-plus-circle text-orange-600 mr-2"></i>Créer une nouvelle annonce
                        </h2>
                        
                        <form>
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2" for="ad-title">Titre de l'annonce</label>
                                <input type="text" id="ad-title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Ex: Peinture intérieure professionnelle">
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2" for="ad-category">Catégorie</label>
                                <select id="ad-category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option>Sélectionnez une catégorie</option>
                                    <option>Peinture</option>
                                    <option>Menuiserie</option>
                                    <option>Couture</option>
                                    <option>Sculpture</option>
                                    <option>Bijouterie</option>
                                    <option>Autre</option>
                                </select>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2" for="ad-description">Description détaillée</label>
                                <textarea id="ad-description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Décrivez en détail vos services, vos spécialités, vos matériaux utilisés, etc."></textarea>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Tarification</label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">Type de tarif</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                            <option>Par projet</option>
                                            <option>À l'heure</option>
                                            <option>Au m²</option>
                                            <option>Sur devis</option>
                                            <option>Par pièce</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Localisation</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">Ville</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                            <option>Abidjan</option>
                                            <option>Bouaké</option>
                                            <option>Yamoussoukro</option>
                                            <option>San-Pédro</option>
                                            <option>Partout ou Autre</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">Localité/Commune</label>
                                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Ex: Cocody, Plateau...">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Photos (3 maximum)</label>
                                <div class="grid grid-cols-3 gap-4">
                                    <label class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex flex-col items-center justify-center cursor-pointer hover:border-orange-500 transition duration-300">
                                        <input type="file" accept="image/*" class="hidden" name="ad-photos[]" onchange="this.parentNode.querySelector('img').src = window.URL.createObjectURL(this.files[0])">
                                        <div class="text-center">
                                            <i class="fas fa-camera text-gray-400 text-2xl mb-1"></i>
                                            <p class="text-sm text-gray-500">Ajouter une photo</p>
                                            <img src="" alt="" class="mt-2 w-16 h-16 object-cover rounded hidden" onload="this.classList.remove('hidden')">
                                        </div>
                                    </label>
                                    <label class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex flex-col items-center justify-center cursor-pointer hover:border-orange-500 transition duration-300">
                                        <input type="file" accept="image/*" class="hidden" name="ad-photos[]" onchange="this.parentNode.querySelector('img').src = window.URL.createObjectURL(this.files[0])">
                                        <div class="text-center">
                                            <i class="fas fa-camera text-gray-400 text-2xl mb-1"></i>
                                            <p class="text-sm text-gray-500">Ajouter une photo</p>
                                            <img src="" alt="" class="mt-2 w-16 h-16 object-cover rounded hidden" onload="this.classList.remove('hidden')">
                                        </div>
                                    </label>
                                    <label class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex flex-col items-center justify-center cursor-pointer hover:border-orange-500 transition duration-300">
                                        <input type="file" accept="image/*" class="hidden" name="ad-photos[]" onchange="this.parentNode.querySelector('img').src = window.URL.createObjectURL(this.files[0])">
                                        <div class="text-center">
                                            <i class="fas fa-camera text-gray-400 text-2xl mb-1"></i>
                                            <p class="text-sm text-gray-500">Ajouter une photo</p>
                                            <img src="" alt="" class="mt-2 w-16 h-16 object-cover rounded hidden" onload="this.classList.remove('hidden')">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="flex justify-end space-x-4">
                                <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-medium transition duration-300">
                                    Annuler
                                </button>
                                <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300">
                                    <i class="fas fa-save mr-2"></i>Publier l'annonce
                                </button>
                            </div>
                        </form>
                    </section>
                </div>

                <!-- Portfolio Tab -->
                <div id="portfolio" class="tab-content">
                    <section class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800">
                                <i class="fas fa-images text-orange-600 mr-2"></i>Mon Portfolio
                            </h2>
                            <button class="gradient-bg text-white px-4 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300" onclick="openPortfolioModal()">
                                <i class="fas fa-plus mr-2"></i>Ajouter des réalisations
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <div class="portfolio-item rounded-lg overflow-hidden relative group">
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Projet 1" class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                    <button class="text-white bg-red-500 hover:bg-red-600 p-2 rounded-full mr-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    
                                </div>
                                <div class="p-3 bg-gray-50">
                                    <h4 class="font-medium">Peinture murale</h4>
                                    <p class="text-sm text-gray-600">Abidjan, 2023</p>
                                </div>
                            </div>
                            <div class="portfolio-item rounded-lg overflow-hidden relative group">
                                <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Projet 2" class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                    <button class="text-white bg-red-500 hover:bg-red-600 p-2 rounded-full mr-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    
                                </div>
                                <div class="p-3 bg-gray-50">
                                    <h4 class="font-medium">Décoration intérieure</h4>
                                    <p class="text-sm text-gray-600">Yamoussoukro, 2024</p>
                                </div>
                            </div>
                            <div class="portfolio-item rounded-lg overflow-hidden relative group">
                                <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Projet 3" class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                    <button class="text-white bg-red-500 hover:bg-red-600 p-2 rounded-full mr-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    
                                </div>
                                <div class="p-3 bg-gray-50">
                                    <h4 class="font-medium">Rénovation façade</h4>
                                    <p class="text-sm text-gray-600">Bouaké, 2023</p>
                                </div>
                            </div>
                            <div class="portfolio-item rounded-lg overflow-hidden relative group">
                                <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Projet 4" class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                    <button class="text-white bg-red-500 hover:bg-red-600 p-2 rounded-full mr-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    
                                </div>
                                <div class="p-3 bg-gray-50">
                                    <h4 class="font-medium">Peinture artistique</h4>
                                    <p class="text-sm text-gray-600">Abidjan, 2024</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Stats Tab -->
                <div id="stats" class="tab-content">
                    <section class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">
                            <i class="fas fa-chart-line text-orange-600 mr-2"></i>Statistiques
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-gray-50 p-6 rounded-lg flex flex-col items-center shadow">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                                    <i class="fas fa-eye text-orange-500 mr-2"></i>Vues du profil
                                </h3>
                                <span class="text-gray-600 mb-1">Total</span>
                                <span class="font-bold text-orange-600 text-3xl">1 245</span>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-lg flex flex-col items-center shadow">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                                    <i class="fas fa-user-check text-orange-500 mr-2"></i>Contacts reçus
                                </h3>
                                <span class="text-gray-600 mb-1">Total</span>
                                <span class="font-bold text-orange-600 text-3xl">134</span>
                            </div>
                        </div>                    
                    </section>
                </div>              
            </main>
        </div>
        <!-- Add Portfolio Modal -->
        <div id="portfolio-modal" class="fullscreen-modal hidden">
            <div class="modal-content">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-xl font-bold text-gray-800">Ajouter des réalisations</h3>
                    <button class="text-gray-500 hover:text-gray-700" type="button" onclick="closePortfolioModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form class="p-6">
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Photos (3 maximum)</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            <label class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex items-center justify-center cursor-pointer hover:border-orange-500 transition duration-300">
                                <input type="file" class="hidden">
                                <div class="text-center">
                                    <i class="fas fa-camera text-gray-400 text-2xl mb-1"></i>
                                    <p class="text-sm text-gray-500">Ajouter une photo</p>
                                </div>
                            </label>
                            <label class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex items-center justify-center cursor-pointer hover:border-orange-500 transition duration-300">
                                <input type="file" class="hidden">
                                <div class="text-center">
                                    <i class="fas fa-camera text-gray-400 text-2xl mb-1"></i>
                                    <p class="text-sm text-gray-500">Ajouter une photo</p>
                                </div>
                            </label>
                            <label class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex items-center justify-center cursor-pointer hover:border-orange-500 transition duration-300">
                                <input type="file" class="hidden">
                                <div class="text-center">
                                    <i class="fas fa-camera text-gray-400 text-2xl mb-1"></i>
                                    <p class="text-sm text-gray-500">Ajouter une photo</p>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="portfolio-title">Titre</label>
                        <input type="text" id="portfolio-title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Ex: Peinture murale moderne">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="portfolio-description">Description</label>
                        <textarea id="portfolio-description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Décrivez votre réalisation..."></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="portfolio-date">Date de réalisation</label>
                        <input type="date" id="portfolio-date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2" for="portfolio-location">Localisation</label>
                        <input type="text" id="portfolio-location" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Ex: Abidjan, Cocody">
                    </div>
                    
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-medium transition duration-300" onclick="closePortfolioModal()">
                            Annuler
                        </button>
                        <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg font-medium hover:opacity-90 transition duration-300">
                            <i class="fas fa-save mr-2"></i>Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center mb-4">
                <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                    <i class="fas fa-hammer"></i>
                </div>
                <span class="ml-2 text-lg font-bold text-orange-600">Artisan<span class="text-green-600 text-xl font-bold">Ivoire</span></span>
            </div>
            <p class="text-gray-400 text-sm">
                &copy; 2025 ArtisanIvoire. Tous droits réservés.
            </p>
        </div>
    </footer>

    <script>
        // Tab navigation
        function showTab(tabId) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected tab content
            document.getElementById(tabId).classList.add('active');
            
            // Update active link in sidebar
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('bg-orange-50', 'text-orange-600');
                if (link.getAttribute('data-tab') === tabId) {
                    link.classList.add('bg-orange-50', 'text-orange-600');
                }
            });
        }
        
        // Initialize first tab as active
        document.addEventListener('DOMContentLoaded', function() {
            showTab('dashboard');
            
            // Add click event to sidebar links
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('data-tab');
                    showTab(tabId);
                });
            });
        });   
           // Portfolio Modal functions
            function openPortfolioModal() {
                document.getElementById('portfolio-modal').classList.remove('hidden');
                document.body.classList.add('modal-open');
            }

            function closePortfolioModal() {
                document.getElementById('portfolio-modal').classList.add('hidden');
                document.body.classList.remove('modal-open');
            }

            // Fermer le modal en cliquant à l'extérieur
            document.getElementById('portfolio-modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closePortfolioModal();
                }
            });
        
    </script>
</body>
</html>