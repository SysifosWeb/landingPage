export default function TextFieldVariants({ palette, responsive: { xAxisUnit } }) {
  return {
    MuiTextField: {
      styleOverrides: {
        root: {
          '&.keyboardInput': {
            background: palette.white.main,
            borderRadius: `0.40${xAxisUnit}`,
            '.MuiInputBase-input': {
              fontSize: `3.3${xAxisUnit}`,
              textAlign: `center`,
            },
            '.MuiInputBase-input + fieldset': {
              borderRadius: `0.40${xAxisUnit}`,
            },
          },
        },
      },
    },
  }
}
