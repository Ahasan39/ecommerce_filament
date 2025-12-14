/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/**/*.vue',
    './storage/framework/views/*.php',
    'node_modules/preline/dist/*.js',
  ],
  darkMode: 'class', // Needed for dark classes to work
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
    require('@tailwindcss/typography'),
  ],
}
