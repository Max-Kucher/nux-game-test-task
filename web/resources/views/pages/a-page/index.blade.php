@extends('layouts.default')

@section('content')
    <x-container>
        <div class="max-w-md mx-auto my-12 space-y-6">
            <livewire:im-feeling-lucky :uuid="$uuid" />

            <livewire:history :uuid="$uuid" />

            <div class="flex gap-4">
                <livewire:regenerate-a-page-link :uuid="$uuid" />

                <livewire:deactivate-a-page-link :uuid="$uuid" />
            </div>
        </div>
    </x-container>
@stop

