import Service from "./pages/service";
import team from "/img/team_2.png";
import logo from "/img/logo-blanco.png";
import indexcss from "./css/index.module.css";
import whatsapp from "/img/whatsapp.png";
import instagram from "/img/insta.png";
import gmail from "/img/gmail.png";
const Index = () => {
  return (
    <>
      <header className={indexcss.cabecera}>
        <nav className="navbar navbar-expand-lg navbar-dark bg-transparent container">
          <div className="container">
            <a className="navbar-brand" href="#">
              <img src={logo} className={indexcss.logo} alt="" />
            </a>
            {/* <button
              className="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span className="navbar-toggler-icon"></span>
            </button> */}
            {/* <div
              className="collapse navbar-collapse"
              id="navbarSupportedContent"
            >
              <ul className="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li className="nav-item">
                  <a className="nav-link text-white" href="#service">
                    Nuestros Servicios
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link text-white" href="#">
                    Contacto
                  </a>
                </li>
              </ul>
              <span className="navbar-text text-white">+56949109970</span>
              <button className="btn btn-info text-white ms-4">
                Contactanos
              </button>
            </div> */}
          </div>
        </nav>
        <section className="d-flex justify-content-sm-center justify-content-md-between container banner">
          <article className="d-flex flex-column justify-content-center align-content-center text-white mt-5 p-2 col-md-6 col-sm-12 col-xs-12 gap-4 welcome">
            <h1 className="display-4 text-center text-md-start">
              Excelencia en Ingeniería
              <p className="display-6 text-center text-md-start">
                Y pasión por la tecnología!
              </p>
            </h1>

            <p className="text-wrap">
              En <b>SysifosWeb</b>, ofrecemos software a medida que no solo
              cumple, sino que supera expectativas
            </p>
            <div className="text-center text-md-start mb-4">
              <a
                className={"btn btn-success btn-lg " + indexcss.btnContact}
                aria-label="Chat on WhatsApp"
                href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20porfavor"
              >
                <img src={whatsapp} style={{ height: "3rem" }} />
                Contactanos
              </a>
            </div>
          </article>
          <article className="d-flex justify-content-center align-self-end d-none d-md-block">
            <img src={team} className={indexcss.bannerImg} alt="" />
          </article>
        </section>
      </header>
      <Service></Service>
      <section className={indexcss.prefooter}>
        <div className="container">
          <p className={indexcss.font300}>
            La calidad no es negociable en <b>SysifosWeb</b>. Nos comprometemos
            a entregar software que no solo funcione bien, sino que también sea
            robusto, seguro y sostenible a largo plazo. Nuestro equipo sigue las
            mejores prácticas de la industria y está constantemente innovando
            para asegurar que cada línea de código contribuya al éxito de
            nuestros clientes.
          </p>
        </div>
      </section>
      <footer>
        <div className="container d-flex flex-column flex-md-row justify-content-center justify-content-md-between">
          <div className="d-flex justify-content-md-end align-items-center pb-4">
            <img src={logo} alt="" />
          </div>
          <div className="d-flex flex-column justify-content-md-start dir">
            <h4 className="mb-3 text-start">Contactanos</h4>
            <div className="d-flex align-items-center">
              <span className="material-icons me-2">phone_in_talk </span>
              +56949109970
            </div>
            <div className="d-flex align-items-center">
              <img src={gmail} alt="" className="me-1" />
              sysifosweb@gmail.com
            </div>
            <div className="d-flex align-items-center">
              <img src={instagram} alt="" className="me-1" />
              sysifosweb_
            </div>
          </div>
        </div>
      </footer>
    </>
  );
};

export default Index;
