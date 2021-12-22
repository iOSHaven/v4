module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/views/*.blade.php',
      './resources/assets/**/*.vue'
  ],
  theme: {
    fontFamily: {
      display: ['Archivo Black', 'sans-serif'],
      body: ['Roboto', 'sans-serif'],
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
  plugins: [require('@tailwindcss/aspect-ratio')],
}
