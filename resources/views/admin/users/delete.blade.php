<x-app-layout>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">Supprimer</button>
    </form>
</x-app-layout>