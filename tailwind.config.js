import colors from "tailwindcss/colors";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

export default {
    content: ["./resources/**/*.blade.php", "./vendor/filament/**/*.blade.php"],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                gray: colors.zinc,
                danger: colors.red,
                primary: colors.emerald,
                success: colors.blue,
                warning: colors.yellow,
            },
        },
    },
    plugins: [forms, typography],
};
