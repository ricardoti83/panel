<x-app-layout>
    <h1 class="text-2xl font-bold text-indigo-700 mb-6">Painel do Administrador</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <a href="{{ route('admin.planos.index') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-indigo-600 text-lg font-semibold mb-2">📦 Gerenciar Planos</div>
            <p class="text-gray-600 text-sm">Visualize, edite e crie novos planos disponíveis para os clientes.</p>
        </a>

        <a href="#" class="block p-6 bg-white rounded-lg shadow opacity-50 cursor-not-allowed">
            <div class="text-gray-400 text-lg font-semibold mb-2">👤 Gerenciar Usuários</div>
            <p class="text-gray-500 text-sm">Em breve: controle de contas de usuários.</p>
        </a>

        <a href="#" class="block p-6 bg-white rounded-lg shadow opacity-50 cursor-not-allowed">
            <div class="text-gray-400 text-lg font-semibold mb-2">📊 Estatísticas</div>
            <p class="text-gray-500 text-sm">Módulo em desenvolvimento.</p>
        </a>

    </div>
</x-app-layout>
