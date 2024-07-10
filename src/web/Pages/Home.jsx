import { Box, Card, Container, Grid, Typography } from '@mui/material'
import MobileFriendlyIcon from '@mui/icons-material/MobileFriendly'
import WebIcon from '@mui/icons-material/Web'
import BusinessIcon from '@mui/icons-material/Business'
import LayersIcon from '@mui/icons-material/Layers'
import IMAGE_1 from '../assets/images/image_1.png'
import IMAGE_2 from '../assets/images/image_2.png'

const Banner = () => {
  return (
    <Container>
      <Box
        sx={{
          display: `flex`,
          justifyContent: `center`,
          alignItems: `center`,
          position: `relative`,
          marginTop: `-50px`,
        }}
      >
        <img src={IMAGE_1} alt="Logo" width={`700px`} />
        <Box sx={{ position: `absolute` }}>
          <Typography
            sx={{
              fontSize: `40px`,
              color: `white !important`,
              textAlign: `center`,
              textShadow: `2px 2px 4px #000000`,
              fontWeight: `800`,
            }}
          >
            En SysifosWeb, combinamos la pasión por la tecnología con la excelencia en ingeniería
            para ofrecer software a medida que no solo cumple, sino que supera las expectativas.
          </Typography>
        </Box>
      </Box>
    </Container>
  )
}

const services = [
  {
    icon: <MobileFriendlyIcon color="secondary" />,
    title: `Desarrollo de Aplicaciones Móviles`,
    content: `Creación de aplicaciones intuitivas y responsivas que ofrecen una experiencia de usuario excepcional en cualquier dispositivo.`,
  },
  {
    icon: <WebIcon color="secondary" />,
    title: `Desarrollo Web`,
    content: `Sitios web y aplicaciones web modernas, seguras y escalables que impulsan la presencia en línea de tu negocio.`,
  },
  {
    icon: <BusinessIcon color="secondary" />,
    title: `Soluciones Empresariales`,
    content: `Sistemas personalizados que optimizan los procesos de negocio, mejoran la productividad y fomentan el crecimiento.`,
  },
  {
    icon: <LayersIcon color="secondary" />,
    title: `Integración de Sistemas`,
    content: `Conectamos tus aplicaciones y sistemas existentes para crear un ecosistema tecnológico cohesivo y eficiente.`,
  },
]
const ServiceCard = ({ icon, title, content }) => (
  <Card
    elevation={3}
    sx={{
      display: `flex`,
      flexDirection: `column`,
      alignItems: `center`,
      justifyContent: `space-around`,
      paddingY: 3,
      width: `400px`,
      height: `200px`,
      borderRadius: `10px`,
    }}
  >
    {icon}
    <Typography align="center" variant="h6" gutterBottom>
      {title}
    </Typography>
    <Typography align="center" paddingX={3} variant="body2">
      {content}
    </Typography>
  </Card>
)

const OurServices = () => (
  <>
    <Container sx={{ marginTop: `100px` }}>
      <Typography
        align="center"
        variant="h5"
        paddingX={`170px`}
        paddingBottom="70px"
        color={`primary`}
        fontSize={`25px`}
        fontWeight={800}
      >
        Ofrecemos una gama completa de servicios de desarrollo de software que se adaptan a las
        necesidades únicas de cada cliente.
      </Typography>
    </Container>
    <Grid container spacing={3} wrap="wrap">
      {services.map((service, index) => (
        <Grid item xs={12} sm={6} key={index} sx={{ justifyContent: `center`, display: `flex` }}>
          <ServiceCard {...service} />
        </Grid>
      ))}
    </Grid>
  </>
)

const Legend = () => {
  return (
    <Container>
      <Box
        sx={{
          display: `flex`,
          justifyContent: `center`,
          alignItems: `center`,
          position: `relative`,
          marginTop: `50px`,
        }}
      >
        <img src={IMAGE_2} alt="Logo" width={`700px`} />
        <Box sx={{ position: `absolute` }}>
          <Typography
            sx={({ palette }) => ({
              fontSize: `25px`,
              color: `${palette.primary.main} !important`,
              textAlign: `center`,
              fontWeight: `800`,
            })}
          >
            La calidad no es negociable en SysifosWeb. Nos comprometemos a entregar software que no
            solo funcione bien, sino que también sea robusto, seguro y sostenible a largo plazo.
            Nuestro equipo sigue las mejores prácticas de la industria y está constantemente
            innovando para asegurar que cada línea de código contribuya al éxito de nuestros
            clientes.
          </Typography>
        </Box>
      </Box>
    </Container>
  )
}

const Home = () => {
  return (
    <Container>
      <Banner />
      <OurServices />
      <Legend />
    </Container>
  )
}
export default Home
