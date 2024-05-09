<x-app-layout>
    <div class="container mx-auto p-28 mt-12 bg-gray-50 shadow-xl drop-shadow-sm">

        <h2 class="text-2xl font-semibold mb-4">Liste des Utilisateurs</h2>

    @include('admin.users.liste')
    <a href="{{ route('users.admin') }}" class="text-blue-500 mr-2">les Admins</a>


</x-app-layout>
