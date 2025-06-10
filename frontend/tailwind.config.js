/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'dark-navy': '#1a1a1a',
        'accent-purple': '#8B5CF6',
        'card-bg': '#2D2D2D',
      },
      spacing: {
        '64': '16rem',
        '72': '18rem',
      },
    },
  },
  plugins: [],
} 