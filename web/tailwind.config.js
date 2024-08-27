/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
        container: {
            center: true,
        },
        maxWidth: {
            container: '85rem',
        },
        fontFamily: {
            sans: ['Figtree', 'Arial', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji',
                'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
        },
    },
  },
  plugins: [],
}

