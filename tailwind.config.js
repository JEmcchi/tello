/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/js/**/*.js"
  ],
  theme: {
    extend: {
      space:{
        '40rem':'40rem'
      },
      margin:{
        '20rem':'20rem',
        '25rem':'25rem',
        '30rem':'30rem',
        '35rem':'35rem',
        '60rem':'60rem',
        '70rem':'70rem',
      },
      colors: {
        'regal-blue': '#243c5a',
      },
      gradientColorStopPositions: {
        33: '33%',
      }
    },
  },
  darkMode: "class",
  plugins: [require("tw-elements/plugin.cjs")]
};