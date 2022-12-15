import './bootstrap';

import Alpine from 'alpinejs';

twemoji.parse(document.body, {
	folder: 'svg',
	ext: '.svg'
})

window.Alpine = Alpine;

Alpine.start();
