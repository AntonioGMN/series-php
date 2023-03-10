<x-layout title="Séries">
	<a href="/series/create" class="btn btn-dark mb-2">Adicionar nova série</a>

	<ul class="list-group">
		@foreach ($series as $serie)
		<li class="list-group-item">{{ $serie->name }}</li>
		@endforeach
	</ul>
</x-layout>