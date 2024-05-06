/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        "open-sans": ['Open Sans', 'sans-serif'],
        "poppins": ['Poppins', 'sans-serif']
      }
    },
  },
  plugins: [],
}

