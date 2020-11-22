const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['active', 'responsive', 'hover', 'focus', 'disabled'],
		backgroundColor: ['active', 'responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
		require('@tailwindcss/ui'),
		require('@tailwindcss/custom-forms')
	],
};
