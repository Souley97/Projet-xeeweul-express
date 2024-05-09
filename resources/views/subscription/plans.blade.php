<x-app-layout>

{{-- @section('content') --}}
    <h1>Plans d'abonnement disponibles</h1>
    <ul>
        @foreach ($plans as $plan)
            <li>
                <strong>{{ $plan->name }}</strong>: {{ $plan->description }} ({{ $plan->price }} €)
                <form action="{{ route('subscribe', $plan) }}" method="post">
                    @csrf
                    <button type="submit">S'abonner</button>
                </form>
            </li>
        @endforeach
    </ul>
{{-- @endsection --}}
</x-app-layout>
