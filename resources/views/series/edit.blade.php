<x-layout title="Edite a série {{ $serie->name }}">
  <x-series.form :action="route('series.update', $serie->id)" :name="$serie->name" />
</x-layout>