<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Artisan - ArtisanIvoire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f97316, #f59e0b);
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="index.html" class="flex items-center">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <span class="ml-2 text-xl font-bold text-orange-600">Artisan<span class="text-green-600 text-xl font-bold">Ivoire</span></span>
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="connexion.html" class="text-orange-600 hover:text-orange-700 font-medium">
                        Déjà inscrit ? <span class="font-bold">Se connecter</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left Column - Illustration -->
            <div class="hidden md:block animate-fadeIn">
                <div class="gradient-bg rounded-2xl p-8 text-white">
                    <h2 class="text-3xl font-bold mb-4">Rejoignez Artisan<span class="text-green-600">Ivoire</span></h2>
                    <p class="text-xl mb-6">Créez votre profil d'artisan et commencez à développer votre activité dès aujourd'hui.</p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-white text-orange-600 rounded-full p-2 mr-4">
                                <i class="fas fa-users text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Trouvez plus de clients</h3>
                                <p class="opacity-90">Augmentez votre visibilité auprès des clients locaux</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-white text-orange-600 rounded-full p-2 mr-4">
                                <i class="fas fa-star text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Créez votre réputation</h3>
                                <p class="opacity-90">Collectez des avis et construisez votre notoriété</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-white text-orange-600 rounded-full p-2 mr-4">
                                <i class="fas fa-chart-pie text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Gérez votre activité</h3>
                                <p class="opacity-90">Organisez vos projets et suivez vos revenus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Form -->
            <div class="animate-fadeIn" style="animation-delay: 0.2s;">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">Créer un compte Artisan</h1>
                        <p class="text-gray-600">Inscrivez-vous pour rejoindre notre plateforme et proposer vos services</p>
                    </div>

                    <form class="space-y-4" id="inscriptionForm">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" id="nom" name="nom" required 
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        placeholder="Votre nom">
                                </div>
                            </div>
                            <div>
                                <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" id="prenom" name="prenom" required 
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                        placeholder="Votre prénom">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" id="email" name="email" required 
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    placeholder="votre@gmail.com">
                            </div>
                        </div>

                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                                <input type="tel" id="telephone" name="telephone" required 
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    placeholder="Votre numéro de téléphone">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" id="password" name="password" required 
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    placeholder="Créez un mot de passe">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Minimum 8 caractères avec des chiffres et lettres</p>
                        </div>

                        <div>
                            <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <input type="text" id="adresse" name="adresse" required 
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    placeholder="Votre adresse complète">
                            </div>
                        </div>

                        <div>
                            <label for="secteur" class="block text-sm font-medium text-gray-700 mb-1">Secteur d'activité</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-briefcase text-gray-400"></i>
                                </div>
                                <select id="secteur" name="secteur" required
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent appearance-none">
                                    <option value="">-- Choisissez un secteur --</option>
                                    <option>Menuisier</option>
                                    <option>Plombier</option>
                                    <option>Électricien</option>
                                    <option>Couturier</option>
                                    <option>Peintre</option>
                                    <option value="autre">Autre (précisez ci-dessous)</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div id="secteur_autre_container" class="hidden transition-all duration-300 ease-in-out">
                            <label for="secteur_autre" class="block text-sm font-medium text-gray-700 mb-1">Précisez votre secteur</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-pen text-gray-400"></i>
                                </div>
                                <input type="text" id="secteur_autre" name="secteur_autre"
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                    placeholder="Ex: Sculpteur, Potier, Forgeron...">
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="conditions" name="conditions" type="checkbox" required
                                    class="focus:ring-orange-500 h-4 w-4 text-orange-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="conditions" class="font-medium text-gray-700">
                                    J'accepte les <a href="legal.html?page=conditions" class="text-orange-600 hover:text-orange-500">conditions d'utilisation</a> et la <a href="legal.html?page=confidentialite" class="text-orange-600 hover:text-orange-500">politique de confidentialité</a>
                                </label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" 
                                class="w-full gradient-bg text-white py-3 px-4 rounded-lg font-bold text-lg hover:opacity-90 transition duration-300 flex items-center justify-center">
                                <i class="fas fa-user-plus mr-2"></i> S'inscrire
                            </button>
                        </div>

                        <div class="text-center text-sm text-gray-600">
                            Déjà inscrit ? 
                            <a href="connexion.html" class="font-medium text-orange-600 hover:text-orange-500">
                                Connectez-vous ici
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
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
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for elements
            const elements = document.querySelectorAll('.animate-fadeIn');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });

            // Gestion du champ "Autre secteur"
            const secteurSelect = document.getElementById('secteur');
            const autreSecteurContainer = document.getElementById('secteur_autre_container');
            const secteurAutreInput = document.getElementById('secteur_autre');
            const inscriptionForm = document.getElementById('inscriptionForm');

            // Afficher/masquer le champ "Autre secteur"
            secteurSelect.addEventListener('change', function() {
                if (this.value === 'autre') {
                    autreSecteurContainer.classList.remove('hidden');
                    secteurAutreInput.required = true;
                } else {
                    autreSecteurContainer.classList.add('hidden');
                    secteurAutreInput.required = false;
                }
            });

            // Validation du formulaire
            inscriptionForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Vérification du secteur
                let secteurValue;
                if (secteurSelect.value === 'autre') {
                    secteurValue = secteurAutreInput.value.trim();
                    if (secteurValue === '') {
                        alert('Veuillez préciser votre secteur d\'activité');
                        return;
                    }
                } else {
                    secteurValue = secteurSelect.value;
                }

                // Ici vous pouvez ajouter la logique de soumission du formulaire
                console.log('Formulaire soumis avec le secteur:', secteurValue);
                
                // Redirection après inscription réussie
                // window.location.href = 'tableau-de-bord.html';
            });
        });
    </script>
</body>
</html>