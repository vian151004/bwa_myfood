// /** @type {import('tailwindcss').Config} */
// export default {
//   content: [],
//   theme: {
//     extend: {},
//   },
//   plugins: [],
// }

import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
              sans: ["Figtree", ...defaultTheme.fontFamily.sans],
              poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
              primary: {
                100: "#5C2500",
                90: "#853500",
                80: "#AD4500",
                70: "#D65600",
                60: "#FF6600",
                50: "#FF812E",
                40: "#FF9D5C",
                30: "#FFB88A",
                20: "#FFD4B7",
                10: "#FFEFE5",
              },
              warning: {
                100: "#5C4F00",
                90: "#857200",
                80: "#AD9500",
                70: "#D6B800",
                60: "#FFD000",
                50: "#FFE12E",
                40: "#FFEB5C",
                30: "#FFEEBA",
                20: "#FFF5B7",
                10: "#FFFEF5",
              },
              success: {
                100: "#274800",
                90: "#3E7000",
                80: "#549900",
                70: "#6EC207",
                60: "#8EEB1D",
                50: "#ADFF48",
                40: "#BFFF70",
                30: "#D1FF98",
                20: "#E3FFC0",
                10: "#F5FFE8",
              },
              error: {
                100: "#570000",
                90: "#800000",
                80: "#A91212",
                70: "#D22D2D",
                60: "#FA5050",
                50: "#FF7171",
                40: "#FF9090",
                30: "#FFAFAF",
                20: "#FFCECE",
                10: "#FFDEDE",
              },
              info: {
                100: "#021848",
                90: "#08266A",
                80: "#12388C",
                70: "#1F4BAE",
                60: "#2F61D0",
                50: "#4379F2",
                40: "#709CFF",
                30: "#99B9FF",
                20: "#C3D5FF",
                10: "#ECF2FF",
              },
              black: {
                100: "#424242",
                90: "#565656",
                80: "#6B6B6B",
                70: "#7F7F7F",
                60: "#939393",
                50: "#A8A8A8",
                40: "#BCBCBC",
                30: "#D1D1D1",
                20: "#E5E5E5",
                10: "#FFFFFF",
              },
            },
        },
        container: {
            center: true,
            padding: "1rem",
        },
    },
    plugins: [],
};