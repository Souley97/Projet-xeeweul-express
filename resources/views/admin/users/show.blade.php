<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Détails de l'Utilisateur</h2>
    
        <div class="bg-white shadow-md p-4 rounded mb-4">
            <p class="text-lg font-semibold mb-2">Nom: {{ $user->name }}</p>
            <p class="text-lg font-semibold mb-2">Adresse e-mail: {{ $user->email }}</p>
            <p class="text-lg font-semibold mb-2">Telephone: {{ $user->phone }}</p>
            <!-- Ajoutez d'autres détails de l'utilisateur si nécessaire -->
        </div>
    </div>
</x-app-layout>