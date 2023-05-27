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
        "primary": "#277BC0",
        "secondary": "#FFB200",
        "light": "#EFEFEF",
        "red": "#DE3838",
        "light-gray": "#E0E0E0",
        "disabled-text": "#535353",
        "disabled-bg": "#EDEEF1"
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

