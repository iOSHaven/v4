const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    // important: true,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        fontFamily: {
            display: ['Archivo Black', 'ui-sans-serif'],
            body: ['Roboto', 'ui-sans-serif'],
            mono: ['ui-monospace', 'SFMono-Regular', 'monospace']
        },
        aspectRatio: {
            auto: 'auto',
            square: '1 / 1',
            video: '16 / 9',
            gw: '3.2361',
            gh: '2',
            1: '1',
            2: '2',
            3: '3',
            4: '4',
            5: '5',
            6: '6',
            7: '7',
            8: '8',
            9: '9',
            10: '10',
            11: '11',
            12: '12',
            13: '13',
            14: '14',
            15: '15',
            16: '16',
        },
        extend: {
            zIndex: {
                '-1': '-1',
                '1': 1,
                '2': 2,
            },
            colors: {
                'transparent': 'transparent',
                'white-light': 'white',
                'black-light': 'black'
            }
        }
    },
    variants: {
        aspectRatio: ['responsive']
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio')
    ],
};
