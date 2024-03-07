/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#055EA8",
                secondary: {
                    100: "",
                    200: "",
                },
                kuning: "#E59B0C",
                netral: "#45484F",
                "primary-blue": "#ACC9E2",
                merah: "#CB3D10",
                "blue-border": "#215784",
                text : "#263238"
            },
        },
    },
    plugins: [],
};
