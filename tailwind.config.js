/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      padding: {
        'navbar' : '80px'
      },
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
      },
      colors: {
        "primary": "#0078AA",
        "secondary": "#19A7CE",
        "light": "#EFEFEF",
        "red": "#DE3838",
        "light-gray": "#E0E0E0",
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

