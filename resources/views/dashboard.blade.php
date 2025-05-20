<x-app-layout>
    @php
        // Simulação de stacks fictícias
        $stacks = collect([
            (object)[ 'nome' => 'WordPress - Cliente A', 'dominio' => 'clientea.cloudwings.com.br', 'status' => 'provisionado' ],
            (object)[ 'nome' => 'Nextcloud - Cliente A', 'dominio' => 'drive.clientea.com', 'status' => 'aguardando' ],
            (object)[ 'nome' => 'Loja Virtual', 'dominio' => 'loja.clientea.com', 'status' => 'erro' ],
        ]);
    @endphp

    <!-- Cards superiores -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-indigo-600 text-white p-5 rounded-lg shadow-md">
            <h3 class="text-sm opacity-90">Stacks Ativas</h3>
            <p class="text-3xl font-bold mt-2">{{ $stacks->count() }}</p>
        </div>
        <div class="bg-emerald-500 text-white p-5 rounded-lg shadow-md">
            <h3 class="text-sm opacity-90">Pedidos</h3>
            <p class="text-3xl font-bold mt-2">3</p>
        </div>
        <div class="bg-yellow-500 text-white p-5 rounded-lg shadow-md">
            <h3 class="text-sm opacity-90">Plano</h3>
            <p class="text-lg font-bold mt-2">Profissional</p>
        </div>
        <div class="bg-pink-500 text-white p-5 rounded-lg shadow-md">
            <h3 class="text-sm opacity-90">Status</h3>
            <p class="text-lg font-bold mt-2">Ativo</p>
        </div>
    </div>

    <!-- Lista de Stacks -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4 text-indigo-700">Minhas Stacks</h2>

        @if ($stacks->isEmpty())
            <p class="text-gray-500">Nenhuma stack provisionada ainda.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($stacks as $stack)
                    <div class="p-4 border rounded-lg bg-gray-50 hover:shadow transition">
                        <h3 class="font-semibold text-indigo-700 text-lg">{{ $stack->nome }}</h3>
                        <p class="text-sm text-gray-700 mt-1">🌐 {{ $stack->dominio }}</p>
                        <p class="text-sm mt-1">
                            Status:
                            <span class="font-semibold
                                @if($stack->status === 'provisionado') text-green-600
                                @elseif($stack->status === 'aguardando') text-yellow-600
                                @else text-red-600 @endif">
                                {{ ucfirst($stack->status) }}
                            </span>
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
