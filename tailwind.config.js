/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        "primary": "#0078AA",
        "secondary": "#19A7CE",
        "light": "#efefef",
      }
    },
  },
  plugins: [],
}

