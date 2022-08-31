/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.{html,js,blade.php,php}",
        "./resources/*.{html,js,blade.php,php}",
        "./public/**/*.{html,js,blade.php,php}",
    ],
    theme: {
        screens: {
            mobile: "320px",
            // => @media (min-width: 320px) { ... }

            tablet: "768px",
            // => @media (min-width: 768px) { ... }

            laptop: "1024px",
            // => @media (min-width: 1040px) { ... }

            desktop: "1280px",
            // => @media (min-width: 1280px) { ... }
        },
        extend: {},
    },
    plugins: [],
};
