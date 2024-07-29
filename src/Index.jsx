/* eslint-disable max-len */
import Service from './pages/service'
import logo from './img/logo-blanco.png'
import indexcss from './css/index.module.css'
import { Instagram, LocalPhone, MailOutline, WhatsApp } from '@mui/icons-material'

const Index = () => {
  return (
    <>
      <header className={indexcss.cabecera}>
        <nav className="navbar navbar-expand-lg navbar-dark bg-transparent container">
          <div className="container">
            <a className="navbar-brand" href="#">
              <img src={logo} className={indexcss.logo} alt="" />
            </a>
          </div>
        </nav>
        <section className="d-flex justify-content-center align-items-center container banner mt-5">
          <article className="d-flex flex-column justify-content-center align-items-center text-white pb-5 mt-5 gap-2 welcome">
            <b>Desarrollo web y aplicaciones a medida</b>
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
      <Service></Service>
      <section className={indexcss.prefooter}>
        <div className="container d-flex flex-column align-items-center">
          <h2> No lo pienses más!</h2>
          <p className={indexcss.font300}>
            Contactanos y hablemos sobre el proyecto que tienes en mente
          </p>
          <a
            className={`btn btn-success btn-lg ${indexcss.btnContact} ${indexcss.btnContactBody}`}
            aria-label="Chat on WhatsApp"
            href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20porfavor"
          >
            <WhatsApp fontSize="large" sx={{ mr: 1, my: 0.8 }} />
            Contactanos
          </a>
        </div>
      </section>
      <footer>
        <div className="container d-flex flex-column flex-md-row justify-content-center justify-content-md-between">
          <div className="d-flex justify-content-md-end align-items-center pb-4">
            <img src={logo} alt="" />
          </div>
          <div className="d-flex flex-column justify-content-md-start dir">
            <h4 className="mb-3 text-start">Contactanos</h4>
            <div className="d-flex align-items-center mb-3">
              <LocalPhone fontSize="large" sx={{ mr: 1 }} />
              +56949109970
            </div>
            <div className="d-flex align-items-center mb-3">
              <MailOutline fontSize="large" sx={{ mr: 1 }} />
              sysifosweb@gmail.com
            </div>
            <div className="d-flex align-items-center mb-3">
              <Instagram fontSize="large" sx={{ mr: 1 }} />
              sysifosweb_
            </div>
          </div>
        </div>
      </footer>
    </>
  )
}

export default Index
