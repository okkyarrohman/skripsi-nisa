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
            },
        },
    },
    plugins: [],
};
