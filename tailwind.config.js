import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import theme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: (mediaQuery) => mediaQuery("prefers-color-scheme: white"),
    prefix: "tw-",
    important: true,
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/HTTP/Controllers/**/*.php",
        "./app/Models/**/*.php",
        "./routes/**/*.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                theme: "linear-gradient(90deg,rgb(185, 104, 104) 0%,rgb(32, 192, 144) 100%)",
            },
            backgroundColor: {
                theme: "#f9f9f9",
            },
            textColor: {
                theme: "#1CBC9B",
            },
        },
    },

    plugins: [forms],
};
