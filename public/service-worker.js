// service-worker.js

// Evento de instalação: armazenar recursos em cache
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open('cache-v1').then(cache => {
      return cache.addAll([
        '/',
	      '/public/',
        '/public/offline',
        '/public/frutas.json',
        '/public/vendor/img/fundofrutas2.jpg',
        '/public/vendor/img/logo_nagumo.png',
        
        'https://nagumo.marketingonline.click/public/vendor/adminlte/dist/css/adminlte.min.css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        '/public/vendor/fontawesome-free/css/all.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css',
        
        // Adicione outros recursos que deseja armazenar em cache
      ]);
    }).catch(error => {
      console.error('Falha ao armazenar em cache:', error);
  })
  );
});

// Evento de busca: responder com recursos armazenados em cache ou fazer uma solicitação de rede
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => {
      return response || fetch(event.request);
    })
  );
});

// Evento de ativação: limpar caches antigos
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.filter(cacheName => {
          // Remova caches antigos, mantendo apenas o cache atual
          return cacheName.startsWith('cache-') && cacheName !== 'cache-v1';
        }).map(cacheName => {
          return caches.delete(cacheName);
        })
      );
    })
  );
});
