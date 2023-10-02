{{ \Filament\Facades\Filament::renderHook('footer.before') }}

<div class="filament-footer flex items-center justify-center">
  {{ \Filament\Facades\Filament::renderHook('footer.start') }}

  @if (config('filament.layout.footer.should_show_logo'))
    <label class="text-gray-300 transition hover:text-primary-500">
      {{ config('app.name') . ' - ' . config('app.desc') }}
    </label>
  @endif

  {{ \Filament\Facades\Filament::renderHook('footer.end') }}
</div>

{{ \Filament\Facades\Filament::renderHook('footer.after') }}
