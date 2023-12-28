<tr class="hover:shadow-lg hover:scale-x-110 transition-transform duration-300 ease-in-out">
    <td class="px-12 ">{{ $withdrawal->id }}</td>
    <td class="px-12">{{ $withdrawal->amount }}</td>
    <td class="px-12 ">{{ $withdrawal->payment_method }}</td>
    <td class="px-16">{{ $withdrawal->status }}</td>
    <td class="px-16 hover:shadow-lg hover:scale-x-110 transition-transform duration-300 ease-in-out">{{ $withdrawal->user->name }} ({{ $withdrawal->user->phone }})</td>
    <td class="px-8">{{ $withdrawal->created_at }}</td>
    <td class="px-8 ">{{ $withdrawal->updated_at }}</td>
    @if ($withdrawal->status != 'Validée')
        <td class="px-8 flex py-2">
            <a href="{{ route('withdrawals.validate', $withdrawal->id) }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Valider</a>
            <a href="{{ route('withdrawals.reject', $withdrawal->id) }}"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Rejeter</a>
        </td>
    @endif
</tr>
