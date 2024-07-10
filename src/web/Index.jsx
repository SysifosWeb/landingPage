import { Outlet } from 'react-router-dom'
import Header from './Header'
import Footer from './Footer'
import { Box, Container } from '@mui/material'
import { useTheme } from '@emotion/react'

const Index = () => {
  const {
    palette,
    palette: { primary, secondary, white },
  } = useTheme()

  return (
    <Box>
      <Box
        sx={{
          background: `linear-gradient(1deg, ${white.main} 30%, ${secondary.main} 50%, ${primary.main} 80%, ${primary.main} 100%)`,
        }}
      >
        <Container>
          <Header palette={palette} />
          <Outlet />
        </Container>
      </Box>
      <Footer palette={palette} />
    </Box>
  )
}

export default Index
