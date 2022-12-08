import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


twemoji.parse(document.body, {
	folder: 'svg',
	ext: '.svg'
})
