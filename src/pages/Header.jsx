import logo from '../img/logo-blanco.webp'
import indexcss from '../css/index.module.css'
import { WhatsApp } from '@mui/icons-material'

export default function Header() {
  return (
    <header className={indexcss.cabecera}>
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
