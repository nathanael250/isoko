/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.{php,html,js}",
    "./src/**/*.{php,html,js}",
    "./includes/**/*.{php}"
  ],
  theme: {
    extend: {
      colors: {
        primary: "#ec6952",
        secondary: "#222d32",
      },
    },
  },
  plugins: [
    require('tailwind-scrollbar'),
  ],
};
