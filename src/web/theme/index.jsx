import { useCallback, useEffect, useMemo, useState } from 'react'
import { createTheme, ThemeProvider, StyledEngineProvider } from '@mui/material/styles'
import { CssBaseline } from '@mui/material'
import getVariants from './variants'
import palette from './palette'

export default function ThemeConfig({ children }) {
  const [xAxisUnit, setXAxisUnit] = useState(`vh`)
  const [yAxisUnit, setYAxisUnit] = useState(`vw`)
  const [isVertical, setIsVertical] = useState(false)

  const handleOrientationChange = useCallback(() => {
    const isVertical = window.innerHeight > window.innerWidth
    setXAxisUnit(isVertical ? `vh` : `vw`)
    setYAxisUnit(isVertical ? `vw` : `vh`)
    setIsVertical(isVertical)
  }, [])

  useEffect(() => {
    handleOrientationChange()

    window.addEventListener(`resize`, handleOrientationChange)

    return () => {
      window.removeEventListener(`resize`, handleOrientationChange)
    }
  }, [])

  const theme = useMemo(() => {
    const themeOptions = {
      palette,
      responsive: {
        xAxisUnit,
        yAxisUnit,
        isVertical,
      },
    }
    const theme = createTheme(themeOptions)
    theme.components = getVariants(theme)
    return theme
  }, [xAxisUnit, yAxisUnit, isVertical])

  return (
    <StyledEngineProvider injectFirst>
      <CssBaseline />
      <ThemeProvider theme={theme}>{children}</ThemeProvider>
    </StyledEngineProvider>
  )
}
