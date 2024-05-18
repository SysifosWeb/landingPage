export default function ButtonVariants({ palette, responsive: { xAxisUnit } }) {
  return {
    MuiButton: {
      variants: [
        {
          props: { variant: `primary` },
          style: {
            fontSize: `3${xAxisUnit}`,
            borderRadius: `0.9${xAxisUnit}`,
            backgroundColor: palette.primary.main,
            color: palette.white.main,
            height: `100%`,
            boxShadow: `4px 4px 8px 0px rgba(0, 0, 0, 0.24)`,
            '&:hover': {
              backgroundColor: palette.primary.main,
            },
          },
        },
        {
          props: { variant: `primary`, color: `error` },
          style: {
            backgroundColor: palette.error.main,
            '&:hover': {
              backgroundColor: palette.error.main,
            },
          },
        },
      ],
    },
  }
}
