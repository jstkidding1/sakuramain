module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            spacing: {
                '2/3': '66.666667%'
            }
        }
    },
    variants: {
        extend: {}
    },
    plugins: [require('@tailwindcss/aspect-ratio')]
};
