module.exports = {
  mode: "jit",
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        orangef8: "#F85A47",
        grayf1: "#F1F1F1",
        gray33: "#333333",
        blue03: "#0352C0",
      },
    },
  },
  plugins: [],
};
