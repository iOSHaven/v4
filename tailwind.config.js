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
    zIndex: {
      '-1': '-1',
      '1': 1,
      '2': 2,
    },
    extend: {
      colors: {
        'transparent': 'transparent'
      }
    }
  },
  variants: {},
  plugins: [],
}
