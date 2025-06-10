/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
<<<<<<< HEAD
=======
    "./node_modules/@tremor/**/*.{js,ts,jsx,tsx}",
>>>>>>> event-repo/main
  ],
  theme: {
    extend: {
      colors: {
<<<<<<< HEAD
        'dark-navy': '#1a1a1a',
        'accent-purple': '#8B5CF6',
        'card-bg': '#2D2D2D',
      },
      spacing: {
        '64': '16rem',
        '72': '18rem',
=======
        'dark-navy': '#0D0E12',
        'accent-purple': ' #855BFC',
        'accent-blue': '#0D0E12',
        'card-bg': '#111C44',
        'dark': '#121317',
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
>>>>>>> event-repo/main
      },
    },
  },
  plugins: [],
} 