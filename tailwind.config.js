const defaultTheme = require("tailwindcss/defaultTheme");

const colors = require('tailwindcss/colors');
/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
        //"./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        //"./vendor/laravel/jetstream/**/*.blade.php",
        //"./storage/framework/views/*.php",
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        "./resources/views/**/*.blade.php",
       // "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",

        './app/Http/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],

    options: {
        safelist: [
          'sm:max-w-2xl'
        ]
      },

      darkMode: true, // or 'media' or 'class'

     // optional
     theme: {
        extend: {
            colors: {
                "pg-primary": colors.gray,
            },
        },
    },

    presets: [
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],

    plugins: [
        /* require("@tailwindcss/forms")({
          strategy: 'class',
        }), */

        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
      ]
};
