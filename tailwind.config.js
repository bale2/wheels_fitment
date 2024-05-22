import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'deep-sky-blue': '#2ec0f9ff',
                'ruddy-blue': '#67aaf9ff',
                'jordy-blue': '#9bbdf9ff',
                'columbia-blue': '#c4e0f9ff',
                'mulberry': '#b95f89ff',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },

    },

    plugins: [forms],
};
