<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ArtisanAuthController extends Controller
{
    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('inscription');
    }

    // Traiter l'inscription - VERSION CORRIGÉE
    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|digits:10',
            'password' => 'required|string|min:8|confirmed',
            'adresse' => 'required|string|max:255',
            'secteur' => 'required|string',
            'secteur_autre' => 'required_if:secteur,autre',
            'conditions' => 'accepted'
        ], [
            'secteur_autre.required_if' => 'Veuillez préciser votre secteur d\'activité',
            'conditions.accepted' => 'Vous devez accepter les conditions d\'utilisation'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Déterminer le secteur d'activité
        $secteurActivite = $request->secteur;
        $secteurPersonnalise = null;

        if ($request->secteur === 'autre') {
            $secteurActivite = 'autre';
            $secteurPersonnalise = $request->secteur_autre;
        }

        // Créer l'utilisateur - CORRECTION ICI
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'adresse' => $request->adresse,
            'secteur_activite' => $secteurActivite,
            'secteur_personnalise' => $secteurPersonnalise,
            'est_artisan' => true
        ]);

        // Debug: Vérifier si l'utilisateur est créé
        if (!$user) {
            return redirect()->back()
                ->with('error', 'Erreur lors de la création du compte. Veuillez réessayer.')
                ->withInput();
        }

        // Connecter automatiquement l'utilisateur
        Auth::login($user);

        return redirect()->route('artisan.dashboard')->with('success', 'Inscription réussie !');
    }

    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('connexion');
    }

    // Traiter la connexion - VERSION CORRIGÉE
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'secteur' => 'required'
        ]);

        // Tentative de connexion
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();
            
            // Vérifier que l'utilisateur est bien un artisan
            if (!$user->est_artisan) {
                Auth::logout();
                return back()->withErrors(['email' => 'Accès réservé aux artisans.'])->withInput();
            }

            // Vérifier le secteur d'activité
            $secteurDisplay = $user->secteur_activite === 'autre' 
                ? $user->secteur_personnalise 
                : $user->secteur_activite;
                
            if ($secteurDisplay !== $request->secteur) {
                Auth::logout();
                return back()->withErrors(['secteur' => 'Le secteur d\'activité ne correspond pas.'])->withInput();
            }

            $request->session()->regenerate();
            return redirect()->route('artisan.dashboard');
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas à nos enregistrements.',
        ])->withInput();
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}