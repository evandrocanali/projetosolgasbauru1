const CACHE_NAME = 'solgas-cache-v7';
const FILES_TO_CACHE = [
  './',
  './index.html',
  './style.css',
  './script.js',
  './manifest.json',
  './logo.png',
  './icon-192.png',
  './icon-512.png',
  './lazzuril.png',
  './brazilian.png',
  './farben.png',
  './indasa.png',
  './norton.png',
  './3m.png',
  './autoamerica.png',
  './lincoln.png',
  './dubboyz.png',
  './nobrecar.png',
  './soft99.png',
  './vonixx.png',
  './menzerna.png',
  './maxirubber.png',
  './finisher.png',
  './geloseco.png',
  './tintaspremium.png',
  './diluentesevernizes.png',
  './protecaoceramica.png',
  './produtosdelimpeza.png',
  './polidoresespeciais.png'
];

// Instalação do Service Worker e Cache dos arquivos
self.addEventListener('install', (evt) => {
  console.log('[ServiceWorker] Instalando');
  evt.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      console.log('[ServiceWorker] Fazendo cache dos arquivos');
      return cache.addAll(FILES_TO_CACHE);
    })
  );
  self.skipWaiting();
});

// Ativação e Limpeza de caches antigos (se necessário)
self.addEventListener('activate', (evt) => {
  console.log('[ServiceWorker] Ativado');
  evt.waitUntil(
    caches.keys().then((keyList) => {
      return Promise.all(keyList.map((key) => {
        if (key !== CACHE_NAME) {
          console.log('[ServiceWorker] Removendo cache antigo', key);
          return caches.delete(key);
        }
      }));
    })
  );
  self.clients.claim();
});

// Interceptação de requisições (Offline First)
self.addEventListener('fetch', (evt) => {
  evt.respondWith(
    caches.match(evt.request).then((response) => {
      return response || fetch(evt.request);
    })
  );
});