import * as React from 'react'
import logo from '../web/assets/images/logo.png'
import AppBar from '@mui/material/AppBar'
import Box from '@mui/material/Box'
import Toolbar from '@mui/material/Toolbar'
import IconButton from '@mui/material/IconButton'
import Typography from '@mui/material/Typography'
import Menu from '@mui/material/Menu'
import MenuIcon from '@mui/icons-material/Menu'
import Container from '@mui/material/Container'
import Button from '@mui/material/Button'
import MenuItem from '@mui/material/MenuItem'
import { useNavigate } from 'react-router-dom'

const pages = [
  { page: `Nuestros Servicios`, link: `/` },
  { page: `Nosotros`, link: `/` },
  { page: `Contactanos`, link: `/` },
]

function ResponsiveAppBar() {
  const navigate = useNavigate()
  const [anchorElNav, setAnchorElNav] = React.useState(null)

  const handleOpenNavMenu = (event) => {
    setAnchorElNav(event.currentTarget)
  }

  const handleCloseNavMenu = (link) => {
    navigate(link)
    setAnchorElNav(null)
  }

  return (
    <AppBar position="static" sx={{ background: `none`, boxShadow: `none` }}>
      <Container maxWidth="xl">
        <Toolbar disableGutters>
          <img src={logo} alt="Logo" width={`230px`} />

          <Box
            sx={{ flexGrow: 1, display: { xs: `flex`, md: `none` }, justifyContent: `flex-end` }}
          >
            <IconButton
              size="large"
              aria-label="account of current user"
              aria-controls="menu-appbar"
              aria-haspopup="true"
              onClick={handleOpenNavMenu}
              color="inherit"
            >
              <MenuIcon />
            </IconButton>
            <Menu
              id="menu-appbar"
              anchorEl={anchorElNav}
              anchorOrigin={{
                vertical: `bottom`,
                horizontal: `left`,
              }}
              keepMounted
              transformOrigin={{
                vertical: `top`,
                horizontal: `left`,
              }}
              open={Boolean(anchorElNav)}
              onClose={handleCloseNavMenu}
              sx={{
                display: { xs: `block`, md: `none` },
              }}
            >
              {pages.map(({ page, link }) => (
                <MenuItem key={page} onClick={() => handleCloseNavMenu(link)}>
                  <Typography>{page}</Typography>
                </MenuItem>
              ))}
            </Menu>
          </Box>
          <Box
            sx={{ flexGrow: 1, display: { xs: `none`, md: `flex` }, justifyContent: `flex-end` }}
          >
            {pages.map(({ page, link }) => (
              <Button
                variant="text"
                key={page}
                onClick={() => handleCloseNavMenu(link)}
                color={`white`}
                sx={{}}
              >
                {page}
              </Button>
            ))}
          </Box>
        </Toolbar>
      </Container>
    </AppBar>
  )
}
export default ResponsiveAppBar
