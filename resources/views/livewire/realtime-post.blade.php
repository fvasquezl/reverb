<div class="w-full h-full bg-black">
    {{-- Imagen a pantalla completa --}}
    @if($latestPost && !empty($latestPost['image']))
        <img src="{{ $latestPost['image'] }}" alt="Post Image" class="w-full h-full object-contain" loading="lazy">
    @else
        <div class="flex items-center justify-center h-full">
            <p class="text-white text-2xl">No hay imagen disponible</p>
        </div>
    @endif

    {{-- Script para Echo --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                console.log('Componente RealtimePosts cargado');

                // Verificar Echo periódicamente
                let attempts = 0;
                const maxAttempts = 20;

                const checkEcho = setInterval(() => {
                    attempts++;

                    if (typeof window.Echo !== 'undefined') {
                        console.log('✅ Laravel Echo conectado en RealtimePosts');
                        clearInterval(checkEcho);

                        // Suscribirse al canal privado de la casa del usuario
                        const houseId = @js(auth()->user()->house_id);
                        window.Echo.private('house.' + houseId)
                            .listen('.post.created', (data) => {
                                console.log('📨 Nuevo post recibido:', data);
                                const component = @this;
                                if (component) {
                                    component.call('handleNewPost', data);
                                }
                            });
                    } else if (attempts >= maxAttempts) {
                        console.warn('⚠️ Laravel Echo no pudo ser cargado después de ' + maxAttempts + ' intentos');
                        clearInterval(checkEcho);
                    }
                }, 500);
            });

            // Manejar el evento de ocultar notificación
            document.addEventListener('livewire:initialized', () => {
                window.Livewire.on('hide-notification', () => {
                    setTimeout(() => {
                        if (window.Livewire.find(@js($this->getId()))) {
                            window.Livewire.find(@js($this->getId())).hideNotification();
                        }
                    }, 5000);
                });
            });
        </script>
    @endpush
</div>