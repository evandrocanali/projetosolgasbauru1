document.addEventListener('DOMContentLoaded', () => {
    console.log('Newmania App Iniciado');

    const btn = document.getElementById('btnAction');
    const output = document.getElementById('output');

    if(btn) {
        btn.addEventListener('click', () => {
            output.innerHTML = '<p>Ação executada com sucesso!</p>';
        });
    }

    // Registro do Service Worker para PWA
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js')
            .then(reg => {
                console.log('Service Worker registrado:', reg.scope);
            }).catch(err => {
                console.error('Falha ao registrar Service Worker:', err);
            });
    }
});