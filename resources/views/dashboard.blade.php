<x-app-layout>
   <!-- New Users Section -->
   @if( Auth::user()->is_admin==1)
    
   
   <div class="new-users">
    <h2>Mes Parraines</h2>
    <div class="user-list">
        @foreach ($users as $user)
        <div class="user">
            <a href="{{ route('users.show',$user->id) }} "class='z-50 '> <img src="{{ $user->profile_photo_url }}"></a>
            <h2>{{$user->name}}</h2>
            <p>{{$user->email}}</p>
        </div>
        @endforeach
     
        <div class="user">
            <img src="/images/bg/images/xe/te.jpeg">
            <h2>Souleymane</h2>
            <p>souley@bd.co</p>
        </div>

     
        
        {{-- <form action="{{ route('referral.generate') }}" method="post">
        <button wire:click="generateReferralCode">Générer un nouveau code</button>
        </form> --}}
    </div>
</div>


{{-- @include('admin.surveys.list') --}}
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Liste des Utilisateurs</h2>

    <table class="min-w-full">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Nom</th>
                <th class="text-left">Adresse e-mail</th>
                <th class="text-left">Telephone</th>
                <th class="text-left">Comptes</th>
                <th class="text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->payment }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 mr-2">Voir</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 mr-2">Éditer</a>
                        <button class="text-red-500 delete-user" data-id="{{ $user->id }}">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Boîte de dialogue de confirmation de suppression -->
<div id="deleteConfirmation" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Confirmation de Suppression
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
                        Supprimer
                    </button>
                </form>
                <button id="cancelDelete" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                    Annuler
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Gestion de la boîte de dialogue de confirmation de suppression
    const deleteButtons = document.querySelectorAll('.delete-user');
    const deleteConfirmation = document.getElementById('deleteConfirmation');
    const cancelDelete = document.getElementById('cancelDelete');
    const deleteForm = document.getElementById('deleteForm');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const userId = e.target.getAttribute('data-id');
            deleteForm.action = `/users/${userId}`;
            deleteConfirmation.classList.remove('hidden');
        });
    });

    cancelDelete.addEventListener('click', () => {
        deleteConfirmation.classList.add('hidden');
    });
</script>



@endif
<!-- End of New Users Section -->

<!-- End of Recent Orders -->

</main>

<!-- End of Main Content -->
</x-app-layout>
