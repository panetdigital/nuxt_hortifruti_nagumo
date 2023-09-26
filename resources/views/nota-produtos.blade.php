@extends('templates.template')
<!--title dinamico-->
@section('title') {{'Busca Produto'}} @endsection
@section('content')



<div class="container">
<head>
    <!-- ... outras tags de cabeçalho<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> ... -->
    
	
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>
<body>

<h1>Lista de Frutas</h1>
    
    <ul id="frutas-lista">
        <!-- A lista de frutas será preenchida aqui -->
    </ul>

    <input type="text" id="nova-fruta" placeholder="Digite uma nova fruta">
    <button id="adicionar-fruta">Adicionar</button>

    <script>


if ('serviceWorker' in navigator) { 
    window.addEventListener('load', () => {
         navigator.serviceWorker.register('service -worker.js') . then(registration => {
             console.log('Service Worker registrado com sucesso:', registration); }) .catch(error => { 
    console.log('Falha ao registrar o Service Worker:', error); }) ; }); }

    self.addEventListener('install', event => {
  event.waitUntil(
    caches.open('cache-v1').then(cache => {
      return cache.addAll([
        '/',
        '/index.html',
        '/styles.css',
        '/script.js',
        '/images/logo.png',
        // Adicione outros recursos que você deseja armazenar em cache
      ]);
    })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => {
      return response || fetch(event.request);
    })
  );
});

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


        // Referências aos elementos do DOM
        const frutasLista = document.getElementById('frutas-lista');
        const novaFrutaInput = document.getElementById('nova-fruta');
        const adicionarFrutaButton = document.getElementById('adicionar-fruta');

        // Array para armazenar as frutas
        const frutas = [];

        // Função para adicionar uma nova fruta
        function adicionarFruta() {
            const novaFruta = novaFrutaInput.value.trim();
            if (novaFruta !== '') {
                frutas.push(novaFruta);
                atualizarLista();
                novaFrutaInput.value = '';
            }
        }

        // Função para atualizar a lista de frutas no DOM
        function atualizarLista() {
            frutasLista.innerHTML = frutas.map(fruta => `<li>${fruta}</li>`).join('');
        }

        // Adiciona um ouvinte de evento para o botão de adicionar fruta
        adicionarFrutaButton.addEventListener('click', adicionarFruta);

        // Atualiza a lista inicialmente (se houver frutas no array)
        atualizarLista();
    </script>

    <div id="app">
        <h1>Lista de Frutas</h1>
        
        <ul>
            <li v-for="fruta in frutas"></li>
        </ul>

        <form @submit.prevent="adicionarFruta">
            <input type="text" v-model="novaFruta" placeholder="Adicionar nova fruta">
            <button type="submit">Adicionar</button>
        </form>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                frutas: ['Maçã', 'Banana', 'Laranja', 'Uva', 'Morango'],
                novaFruta: ''
            },
            methods: {
                adicionarFruta() {
                    if (this.novaFruta.trim() !== '') {
                        this.frutas.push(this.novaFruta);
                        this.novaFruta = '';
                    }
                }
            }
        });
    </script>
</body><br>
            
	<!--Footer--> 
	
	
</div>
@endsection