/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundColor: {
        'custom-yellow': '#ffe000',
        'dark-orange': '#ff8c00',
      },
      fontFamily: {
      sans: ['Noto Sans JP', 'sans-serif']
      },
    },
  },
  plugins: [],
}

