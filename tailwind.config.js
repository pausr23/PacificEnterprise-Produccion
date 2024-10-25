/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    screens: {
      'xxs': {'max': '430px'},
      'sm': {'min':'640px'},
      'md': {'min' :'768px'},
      'lg': {'min':'1024px'}
    },
    extend: {},
  },
  plugins: [
    require('tailwind-scrollbar-hide')
    // ...
  ],
}
