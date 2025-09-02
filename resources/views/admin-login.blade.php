<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - ArtisanIvoire</title>
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
<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="text-center mb-8 animate-fadeIn">
            <div class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center text-white font-bold mx-auto mb-4">
                <i class="fas fa-lock text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Espace Administrateur</h1>
            <p class="text-gray-600">Accédez au panneau d'administration d'ArtisanIvoire</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8 animate-fadeIn" style="animation-delay: 0.2s;">
            <form class="space-y-6" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email administratif</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" required 
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            placeholder="admin@artisanivoire.com">
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
                            placeholder="Votre mot de passe">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                            class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Se souvenir de moi
                        </label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-orange-600 hover:text-orange-500">
                            Mot de passe oublié ?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="w-full gradient-bg text-white py-3 px-4 rounded-lg font-bold text-lg hover:opacity-90 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Connexion
                    </button>
                </div>

                <div class="text-center text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-medium text-orange-600 hover:text-orange-500">
                        <i class="fas fa-arrow-left mr-1"></i> Retour au site principal
                    </a>
                </div>
            </form>
            

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="mt-8 text-center text-gray-500 text-sm animate-fadeIn" style="animation-delay: 0.4s;">
            <p>&copy; 2025 ArtisanIvoire. Tous droits réservés.</p>
            <p class="mt-1">Accès réservé au personnel autorisé</p>
        </div>
    </div>

    <script>
        // Animation for elements
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-fadeIn');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>