@extends('layouts.default')

@section('content')
    <x-container>
        <div class="max-w-md mx-auto my-12 space-y-6">
            <livewire:im-feeling-lucky :uuid="$uuid" />

            <livewire:history :uuid="$uuid" />
        </div>
    </x-container>
@stop

