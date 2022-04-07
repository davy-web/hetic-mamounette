const plugin = require("tailwindcss/plugin");
const _ = require("lodash");
const tailpress = require("./tailpress.json");

module.exports = {
  important: true,
  // Active dark mode on class basis
  darkMode: "class",
  mode: "jit",
  tailpress,
  purge: {
    content: require("fast-glob").sync([
      "./*.php",
      "./*/*.php",
      "./safelist.txt",
    ]),
  },
  theme: {
    fontFamily: {
      pacifico: ["pacifico", "sans-serif"],
      quicksand: ["quicksand", "sans-serif"],
    },
    fontSize: {
      xs: "0.8rem",
      sm: "0.9rem",
      base: "1rem",
      md: "1.1rem",
      lg: "1.4rem",
      xl: "1.6rem",
      "2xl": "1.8rem",
      "3xl": "2rem",
      "4xl": "2.4rem",
      "5xl": "2.8rem",
      "6xl": "3.2rem",
      "7xl": "4rem",
      "8xl": "4.8rem",
      "9xl": "6rem",
    },
    container: {
      center: true,
      padding: {
        0: "0rem",
        xs: "0.4rem",
        DEFAULT: "0.8rem",
        sm: "1.6rem",
        lg: "2.4rem",
        xl: "3.2rem",
        xxl: "4.8rem",
        xxxl: "6rem",
      },
      margin: {
        0: "0rem",
        xs: "0.4rem",
        DEFAULT: "0.8rem",
        sm: "1.6rem",
        lg: "2.4rem",
        xl: "3.2rem",
        xxl: "4.8rem",
        xxxl: "6rem",
      },
    },
    borderRadius: {
      none: "0",
      sm: "4px",
      DEFAULT: "8px",
      md: "25px",
      lg: "50px",
      xl: "100px",
    },
    boxShadow: {
      DEFAULT: "0px 4px 4px rgba(0, 0, 0, 0.25)",
      blueSmall: "0px 2px 4px rgba(5, 150, 222, 0.2)",
      blueMedium: "0px 4px 8px rgba(5, 150, 222, 0.2)",
      greyDarkerMedium: "0px 0px 16px rgba(34, 67, 88, 0.1)",
      none: "none",
    },
    linearGradientDirections: {
      // defaults to these values
      t: "to top",
      tr: "to top right",
      r: "to right",
      br: "to bottom right",
      b: "to bottom",
      bl: "to bottom left",
      l: "to left",
      tl: "to top left",
    },
    linearGradientColors: {
      // defaults to {}
      "blue-to-turquoise": ["#03BDDF", "#0596DE"],
      "blue-light-hover": ["#019dba", "#11689e"],
      "gradient-primary": ["#60EDE5", "#107ACA"],
      // 'black-white-with-stops': ['#000', '#000 45%', '#fff 55%', '#fff'],
    },
    repeatingLinearGradientDirections: (theme) =>
      theme("linearGradientDirections"), // defaults to this value
    repeatingLinearGradientColors: (theme) => theme("linearGradientColors"), // defaults to {}
    repeatingLinearGradientLengths: {
      // defaults to {}
      sm: "25px",
      md: "50px",
      lg: "100px",
    },
    extend: {
      colors: tailpress.colors,
      keyframes: {
        wiggle: {
          "0%, 100%": {
            transform: "rotate(-5deg)",
          },
          "50%": {
            transform: "rotate(5deg)",
          },
        },
      },
      animation: {
        wiggle: "wiggle 700ms ease-in-out infinite",
      },
      scale: {
        flip: "-1",
      },
    },
  },
  plugins: [
    plugin(function ({
      addUtilities,
      addComponents,
      e,
      prefix,
      config,
      theme,
    }) {
      const colors = theme("colors");
      const margin = theme("margin");
      const screens = theme("screens");
      const fontSize = theme("fontSize");

      const editorColorText = _.map(
        config("tailpress.colors", {}),
        (value, key) => {
          return {
            [`.has-${key}-text-color`]: {
              color: value,
            },
          };
        }
      );

      const editorColorBackground = _.map(
        config("tailpress.colors", {}),
        (value, key) => {
          return {
            [`.has-${key}-background-color`]: {
              backgroundColor: value,
            },
          };
        }
      );

      const editorFontSizes = _.map(
        config("tailpress.fontSizes", {}),
        (value, key) => {
          return {
            [`.has-${key}-font-size`]: {
              fontSize: value[0],
              fontWeight: `${value[1] || "normal"}`,
            },
          };
        }
      );

      const alignmentUtilities = {
        ".alignfull": {
          margin: `${margin[2] || "0.5rem"} calc(50% - 50vw)`,
          maxWidth: "100vw",
          "@apply w-screen": {},
        },
        ".alignwide": {
          "@apply -mx-16 my-2 max-w-screen-xl": {},
        },
        ".alignnone": {
          "@apply h-auto max-w-full mx-0": {},
        },
        ".aligncenter": {
          margin: `${margin[2] || "0.5rem"} auto`,
          "@apply block": {},
        },
        [`@media (min-width: ${screens.sm || "640px"})`]: {
          ".alignleft:not(.wp-block-button)": {
            marginRight: margin[2] || "0.5rem",
            "@apply float-left": {},
          },
          ".alignright:not(.wp-block-button)": {
            marginLeft: margin[2] || "0.5rem",
            "@apply float-right": {},
          },
          ".wp-block-button.alignleft a": {
            "@apply float-left mr-4": {},
          },
          ".wp-block-button.alignright a": {
            "@apply float-right ml-4": {},
          },
        },
      };

      const imageCaptions = {
        ".wp-caption": {
          "@apply inline-block": {},
          "& img": {
            marginBottom: margin[2] || "0.5rem",
            "@apply leading-none": {},
          },
        },
        ".wp-caption-text": {
          fontSize: (fontSize.sm && fontSize.sm[0]) || "0.9rem",
          color: (colors.gray && colors.gray[600]) || "#718096",
        },
      };

      addUtilities(
        [
          editorColorText,
          editorColorBackground,
          alignmentUtilities,
          editorFontSizes,
          imageCaptions,
        ],
        {
          respectPrefix: false,
          respectImportant: false,
        }
      );
    }),
  ],
};
