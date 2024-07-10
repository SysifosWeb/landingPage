import { Box, Container, Grid, Typography } from '@mui/material'
import logo from '../web/assets/images/logo.png'

const Footer = ({ palette: { white, secondary } }) => {
  return (
    <Box
      sx={{
        width: `100%`,
        height: `auto`,
        backgroundColor: {
          background: `linear-gradient(1deg, ${secondary.main} 30%, ${secondary.main} 50%, ${white.main} 80%, ${white.main} 100%)`,
        },
        paddingY: `14rem`,
        paddingBottom: `3rem`,
      }}
    >
      <Container>
        <Grid container direction="column" paddingX={`2rem`}>
          <Grid item marginLeft={`-13px`} marginBottom={`-30px`}>
            <img src={logo} alt="Logo" width={`230px`} />
          </Grid>
          <Grid item>
            <Typography color="textSecondary" variant="subtitle1">
              Dirección
            </Typography>
          </Grid>
          <Grid item>
            <Typography color="textSecondary" variant="subtitle1">
              Redes Sociales
            </Typography>
          </Grid>
          <Grid item>
            <Typography color="textSecondary" variant="subtitle1">
              Redes Sociales
            </Typography>
          </Grid>
          <Grid item>
            <Typography color="textSecondary" variant="subtitle1">
              Redes Sociales
            </Typography>
          </Grid>
        </Grid>
      </Container>
    </Box>
  )
}

export default Footer
