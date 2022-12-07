const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

	theme: {
		
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
			},
			colors: {
			twitter: {
				DEFAULT: '#1D9BF0',
				'50': '#C9E7FB',
				'100': '#B6DFFA',
				'200': '#90CEF8',
				'300': '#6ABDF5',
				'400': '#43ACF3',
				'500': '#1D9BF0',
				'600': '#0D7DC8',
				'700': '#0A5C93',
				'800': '#063B5E',
				'900': '#031A2A'
				},
			},
        },
    },

	plugins: [require('@tailwindcss/forms')],
	
	safelist: [
		'h-12',
		'w-12',
		'h-32',
		'w-32',
	]
};
