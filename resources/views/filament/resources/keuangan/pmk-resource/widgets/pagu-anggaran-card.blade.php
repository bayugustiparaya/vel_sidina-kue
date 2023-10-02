<x-filament::widget>
    <x-filament::card>
        {{-- Widget content --}}
    <x-slot name="heading">
        <p>Total Keperluan</p>
            {{-- {{ $widgetData["custom_title"] }} --}}
        </x-slot>
 
        <p>Biaya yang dianggarkan : </p><strong>Rp. {{ $total_keperluan }}</strong>
        <p>Pagu anggaran tersedia : </p><strong>Rp. {{ $total_pagu_anggaran }}</strong>
    </x-filament::card>
</x-filament::widget>
