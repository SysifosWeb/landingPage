import logo from '../img/logo-blanco.webp'
import indexcss from '../css/index.module.css'
import { WhatsApp } from '@mui/icons-material'
import { Helmet } from 'react-helmet'

export default function Header() {
  return (
    <header className={indexcss.cabecera}>
      <Helmet>
        <title>Sysifos Web Soluciones digitales a tu medida</title>
        <meta name="rating" content="General" />
        <meta
          name="description"
          content="Desarrollamos aplicaciones web y software personalizados para impulsar tu negocio. Aumenta tus ventas, mejora la experiencia del cliente y diferencia tu marca."
        />
        <meta
          name="keywords"
          content="web, desarrollo web, programacion, movil, mobile, software, software a medida, pagina web, website, digital, sysifosweb, sysifos, sysifos web, html, javascript, react"
        />

        <meta name="robots" content="index,follow" />
        <meta name="googlebot" content="index,follow" />

        <meta name="google" content="nositelinkssearchbox" />

        <meta name="google" content="notranslate" />
        <meta
          name="google-site-verification"
          content="VTWOSSGGnktpmu96UQyQ2iQ7TYwRA2NJ8JkWQvH4-Xk"
        />
        <meta name="robots" content="max-snippet:20, max-image-preview:large"></meta>
        <meta
          property="og:description"
          content="Desarrollamos aplicaciones web y software personalizados para impulsar tu negocio. Aumenta tus ventas, mejora la experiencia del cliente y diferencia tu marca."
        />
        <meta name="author" content="SysifosWeb Soluciones Informáticas Limitada" />
        <meta property="og:title" content="Soluciones digitales a tu medida" />
        <meta property="og:url" content="https://sysifosweb.cl" />
        <meta
          property="og:image"
          content="https://www.sysifosweb.cl/assets/equipoMin-ijW4D7nV.webp"
        />
        <meta property="og:image:type" content="image/webp" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:locale" content="es_LA" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="SysifosWeb" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
        <link
          href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet"
        />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
      </Helmet>
      <nav className="navbar navbar-expand-lg navbar-dark bg-transparent container">
        <div className="container">
          <a className="navbar-brand" href="https://sysifosweb.cl/">
            <img src={logo} className={indexcss.logo} alt="Logo" aria-label="Go home" />
          </a>
        </div>
      </nav>
      <section
        style={{ display: `flex`, justifyContent: `center`, alignItems: `center` }}
        className="container banner mt-5 px-5"
      >
        <article
          style={{
            display: `flex`,
            flexDirection: `column`,
            justifyContent: `center`,
            alignItems: `center`,
          }}
          className={`text-white pb-5  mt-5 gap-2 ${indexcss.welcome}`}
        >
          <b className="text-center">Desarrollo web y aplicaciones a medida</b>
          <h1 className="text-center">Soluciones digitales a tu medida</h1>
          <p className="text-center">
            Desarrollamos aplicaciones web y software personalizados para impulsar tu negocio
          </p>
          <div className="d-flex justify-content-center align-items-center mb-md-4">
            <a
              className={`btn btn-success ${indexcss.btnContact} ${indexcss.btnContactHeader}`}
              aria-label="Chat on WhatsApp"
              href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20porfavor"
            >
              <WhatsApp fontSize="large" sx={{ mr: 1, my: 0.8 }} />
              Contactanos
            </a>
          </div>
        </article>
      </section>
    </header>
  )
}
