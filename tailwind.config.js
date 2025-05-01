import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      backgroundImage: {
        'custom-pattern': "url('../images/hollowed-boxes.png')",
      },
      fontFamily: {
        sans: ['Roboto slab', 'Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        madera: {
          claro: '#8d6e63',
          medio: '#6d4c41',
          oscuro: '#4e342e',
          profundo: '#3e2723',
        },
        verde: {
          claro: '#8fbc8f',
          medio: '#199447',
          oscuro: '#638263',
          profundo: '#213821',
        },
        amarillo: {
          claro: '#fade32',
          medio: '#E9CC1B',
          oscuro: '#273B09',
          profundo: '#002400',
        },
        gris: {
          claro: '#F2EFE9',
          medio: '#564E58',
          oscuro: '#403D39',
          profundo: '#252422',
        },
        naranja: {
          claro: '#fade32',
          medio: '#FF7F11',
          oscuro: '#EB5E28',
          profundo: '#FF7300',
        },
        arena: "#EDCBB1",
      },
      keyframes: {
        'fade-in-up': {
          '0%': {
            opacity: '0',
            transform: 'translateY(20px)',
          },
          '100%': {
            opacity: '1',
            transform: 'translateY(0)',
          },
        },
      },
      animation: {
        'fade-in-up': 'fade-in-up 0.7s ease-out forwards',
      },
    },
    plugins: [],
  }
}
